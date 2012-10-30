<?php

/**
 * This is the model class for table "podelivery_line".
 *
 * The followings are the available columns in table 'podelivery_line':
 * @property integer $id_line
 * @property integer $id_delivery
 * @property integer $id_product
 * @property integer $id_uoms
 * @property double $qty_trans
 * @property double $value_trans
 * @property double $percent_tax
 * @property double $value_tax
 * @property integer $create_by
 * @property string $create_date
 * @property string $update_date
 * @property integer $update_by
 * @property double $percent_disc
 * @property double $value_disc
 * @property double $ppn
 *
 * The followings are the available model relations:
 * @property PodeliveryHdr $idDelivery
 */
class PodeliveryLine extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return PodeliveryLine the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'podelivery_line';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_delivery, id_product, id_uoms, qty_trans, value_trans, percent_tax, value_tax', 'required'),
            array('id_delivery, id_product, id_uoms, create_by, update_by', 'numerical', 'integerOnly' => true),
            array('qty_trans, value_trans, percent_tax, value_tax, percent_disc, value_disc', 'numerical'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_line, id_delivery, id_product, id_uoms, qty_trans, value_trans, percent_tax, value_tax, create_by, create_date, update_date, update_by, percent_disc, value_disc', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idDelivery' => array(self::BELONGS_TO, 'PodeliveryHdr', 'id_delivery'),
            'product' => array(self::BELONGS_TO, 'Product', 'id_product'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_line' => 'Id Line',
            'id_delivery' => 'Id Delivery',
            'id_product' => 'Id Product',
            'id_uoms' => 'Id Uoms',
            'qty_trans' => 'Qty Trans',
            'value_trans' => 'Value Trans',
            'percent_tax' => 'Percent Tax',
            'value_tax' => 'Value Tax',
            'create_by' => 'Create By',
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
            'update_by' => 'Update By',
            'percent_disc' => 'Percent Disc',
            'value_disc' => 'Value Disc',
            'ppn' => 'PPN',
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
        $criteria->compare('id_delivery', $this->id_delivery);
        $criteria->compare('id_product', $this->id_product);
        $criteria->compare('id_uoms', $this->id_uoms);
        $criteria->compare('qty_trans', $this->qty_trans);
        $criteria->compare('value_trans', $this->value_trans);
        $criteria->compare('percent_tax', $this->percent_tax);
        $criteria->compare('value_tax', $this->value_tax);
        $criteria->compare('create_by', $this->create_by);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('update_by', $this->update_by);
        $criteria->compare('percent_disc', $this->percent_disc);
        $criteria->compare('value_disc', $this->value_disc);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->create_by = 0;//Yii::app()->user->Id;
            $this->create_date = new CDbExpression('NOW()');
            $this->update_by = 0;//Yii::app()->user->Id;
            $this->update_date = new CDbExpression('NOW()');
        } else {
            $this->update_by = 0;//Yii::app()->user->Id;
            $this->update_date = new CDbExpression('NOW()');
        }
        return parent::beforeSave();
    }

}