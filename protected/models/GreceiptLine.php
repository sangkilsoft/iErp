<?php

/**
 * This is the model class for table "greceipt_line".
 *
 * The followings are the available columns in table 'greceipt_line':
 * @property integer $id_line
 * @property integer $id_receipt
 * @property integer $id_product
 * @property double $qty_trans
 * @property integer $id_uoms
 * @property string $create_date
 * @property integer $create_by
 * @property string $update_date
 * @property integer $update_by
 *
 * The followings are the available model relations:
 * @property Batch $batch
 * @property GreceiptHdr $idReceipt
 * @property Product $idProduct
 */
class GreceiptLine extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return GreceiptLine the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'greceipt_line';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_receipt, id_product, qty_trans, id_uoms', 'required'),
            array('id_receipt, id_product, id_uoms, create_by, update_by', 'numerical', 'integerOnly' => true),
            array('qty_trans', 'numerical'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_line, id_receipt, id_product, qty_trans, id_uoms, create_date, create_by, update_date, update_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'batch' => array(self::HAS_ONE, 'Batch', 'id_line'),
            'idReceipt' => array(self::BELONGS_TO, 'GreceiptHdr', 'id_receipt'),
            'idProduct' => array(self::BELONGS_TO, 'Product', 'id_product'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_line' => 'Id Line',
            'id_receipt' => 'Id Receipt',
            'id_product' => 'Id Product',
            'qty_trans' => 'Qty Trans',
            'id_uoms' => 'Id Uoms',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
            'update_date' => 'Update Date',
            'update_by' => 'Update By',
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
        $criteria->compare('id_product', $this->id_product);
        $criteria->compare('qty_trans', $this->qty_trans);
        $criteria->compare('id_uoms', $this->id_uoms);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('create_by', $this->create_by);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('update_by', $this->update_by);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->create_by = 0; //Yii::app()->user->Id;
            $this->create_date = new CDbExpression('NOW()');
            $this->update_by = 0; //Yii::app()->user->Id;
            $this->update_date = new CDbExpression('NOW()');
        } else {
            $this->update_by = 0; //Yii::app()->user->Id;
            $this->update_date = new CDbExpression('NOW()');
        }
        return parent::beforeSave();
    }

//    protected function afterSave() {
//        $stock_chg = MvHistory::model()->find('', $params);        
//        parent::afterSave();
//    }

}