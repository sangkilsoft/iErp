<?php

/**
 * This is the model class for table "gr_line".
 *
 * The followings are the available columns in table 'gr_line':
 * @property integer $id_line
 * @property integer $id_receipt
 * @property integer $item_line
 * @property integer $id_product
 * @property integer $id_locator
 * @property double $qty_trans
 * @property double $value_trans
 * @property string $create_date
 * @property integer $create_by
 * @property string $update_date
 * @property integer $update_by
 * @property integer $id_uoms
 */
class GrLine extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return GrLine the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'gr_line';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_receipt, item_line, id_product, id_locator, qty_trans, value_trans, id_uoms', 'required'),
            array('id_receipt, item_line, id_product, id_locator, create_by, update_by, id_uoms', 'numerical', 'integerOnly' => true),
            array('qty_trans, value_trans', 'numerical'),            
            array('id_receipt','exist','allowEmpty' => true, 'attributeName' => 'id_receipt', 'className' => 'GoodReceipt','message'=>'Id Receipt Must be in GoodReceipt list'),
            array('id_locator','exist','allowEmpty' => true, 'attributeName' => 'id_locator', 'className' => 'Locator','message'=>'Locator Must be in Locators list'),
            
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_line, id_receipt, item_line, id_product, id_locator, qty_trans, value_trans, create_date, create_by, update_date, update_by, id_uoms', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'nm_product' => array(self::BELONGS_TO, 'Product', 'id_product'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_line' => 'Id Line',
            'id_receipt' => 'Id Receipt',
            'item_line' => 'Item Line',
            'id_product' => 'Id Product',
            'id_locator' => 'Id Locator',
            'qty_trans' => 'Qty Trans',
            'value_trans' => 'Value Trans',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
            'update_date' => 'Update Date',
            'update_by' => 'Update By',
            'id_uoms' => 'Id Uoms',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_line', $this->id_line);
        $criteria->compare('id_receipt', $this->id_receipt);
        $criteria->compare('item_line', $this->item_line);
        $criteria->compare('id_product', $this->id_product);
        $criteria->compare('id_locator', $this->id_locator);
        $criteria->compare('qty_trans', $this->qty_trans);
        $criteria->compare('value_trans', $this->value_trans);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('create_by', $this->create_by);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('update_by', $this->update_by);
        $criteria->compare('id_uoms', $this->id_uoms);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->create_by = Yii::app()->user->Id;
            $this->create_date = new CDbExpression('NOW()');
            $this->update_by = Yii::app()->user->Id;
            $this->update_date = new CDbExpression('NOW()');
        } else {
            $this->update_by = Yii::app()->user->Id;
            $this->update_date = new CDbExpression('NOW()');
        }
        return parent::beforeSave();
    }

    public function beforeValidate() {
        if ($this->isNewRecord) {
            $this->id_receipt = (int) $this->id_receipt;
            $this->item_line = (int) $this->item_line;
            $this->id_product = (int) $this->id_product;
            $this->id_locator = (int) $this->id_locator;
            $this->qty_trans = (int) $this->qty_trans;
            $this->value_trans = (int) $this->value_trans;
            $this->id_uoms = (int) $this->id_uoms;
        }
        return parent::beforeValidate();
    }

}