<?php

/**
 * This is the model class for table "mv_history".
 *
 * The followings are the available columns in table 'mv_history':
 * @property integer $id_movement
 * @property integer $id_locator
 * @property integer $id_branch
 * @property integer $id_orgn
 * @property integer $id_product
 * @property double $qty_mvnt
 * @property double $val_mvnt
 * @property double $qty_current
 * @property double $val_current
 * @property string $trans_type
 * @property string $trans_source
 * @property string $ref_number
 * @property string $update_date
 * @property integer $create_by
 * @property integer $update_by
 * @property string $create_date
 *
 * The followings are the available model relations:
 * @property Locator $idLocator
 * @property Product $idProduct
 */
class MvHistory extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return MvHistory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'mv_history';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_locator, id_product, qty_mvnt, val_mvnt, qty_current, val_current', 'required'),
            array('id_locator, id_product, create_by, update_by', 'numerical', 'integerOnly' => true),
            array('qty_mvnt, val_mvnt, qty_current, val_current', 'numerical'),
            array('trans_type, trans_source', 'length', 'max' => 32),
            array('ref_number', 'length', 'max' => 13),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_movement, id_locator, id_branch, id_orgn, id_product, qty_mvnt, val_mvnt, qty_current, val_current, trans_type, trans_source, ref_number, update_date, create_by, update_by, create_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idLocator' => array(self::BELONGS_TO, 'Locator', 'id_locator'),
            'idProduct' => array(self::BELONGS_TO, 'Product', 'id_product'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_movement' => 'Id Movement',
            'id_locator' => 'Id Locator',
            'id_branch' => 'Id Branch',
            'id_orgn' => 'Id Orgn',
            'id_product' => 'Id Product',
            'qty_mvnt' => 'Qty Mvnt',
            'val_mvnt' => 'Val Mvnt',
            'qty_current' => 'Qty Current',
            'val_current' => 'Val Current',
            'trans_type' => 'Trans Type',
            'trans_source' => 'Trans Source',
            'ref_number' => 'Ref Number',
            'update_date' => 'Update Date',
            'create_by' => 'Create By',
            'update_by' => 'Update By',
            'create_date' => 'Create Date',
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

        $criteria->compare('id_movement', $this->id_movement);
        $criteria->compare('id_locator', $this->id_locator);
        $criteria->compare('id_branch', $this->id_branch);
        $criteria->compare('id_orgn', $this->id_orgn);
        $criteria->compare('id_product', $this->id_product);
        $criteria->compare('qty_mvnt', $this->qty_mvnt);
        $criteria->compare('val_mvnt', $this->val_mvnt);
        $criteria->compare('qty_current', $this->qty_current);
        $criteria->compare('val_current', $this->val_current);
        $criteria->compare('trans_type', $this->trans_type, true);
        $criteria->compare('trans_source', $this->trans_source, true);
        $criteria->compare('ref_number', $this->ref_number, true);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('create_by', $this->create_by);
        $criteria->compare('update_by', $this->update_by);
        $criteria->compare('create_date', $this->create_date, true);

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

}