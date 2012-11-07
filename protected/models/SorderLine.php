<?php

/**
 * This is the model class for table "sorder_line".
 *
 * The followings are the available columns in table 'sorder_line':
 * @property string $id_line
 * @property integer $id_sorder
 * @property integer $id_product
 * @property integer $id_uoms
 * @property double $qty_trans
 * @property double $value_trans
 * @property double $percent_disc
 * @property double $value_disc
 * @property double $percent_tax
 * @property double $value_tax
 * @property double $cogs
 * @property integer $create_by
 * @property string $create_date
 * @property string $update_date
 * @property integer $update_by
 *
 * The followings are the available model relations:
 * @property SalOrder $idSorder
 */
class SorderLine extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return SorderLine the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'sorder_line';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_sorder, id_product, id_uoms, qty_trans, value_trans, percent_tax, value_tax, cogs, create_by, create_date, update_date, update_by', 'required'),
            array('id_sorder, id_product, id_uoms, create_by, update_by', 'numerical', 'integerOnly' => true),
            array('qty_trans, value_trans, percent_disc, value_disc, percent_tax, value_tax, cogs', 'numerical'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_line, id_sorder, id_product, id_uoms, qty_trans, value_trans, percent_disc, value_disc, percent_tax, value_tax, cogs, create_by, create_date, update_date, update_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idSorder' => array(self::BELONGS_TO, 'SalOrder', 'id_sorder'),
            'product' => array(self::BELONGS_TO, 'Product', 'id_product'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_line' => 'Id Line',
            'id_sorder' => 'Id Sorder',
            'id_product' => 'Id Product',
            'id_uoms' => 'Id Uoms',
            'qty_trans' => 'Qty Trans',
            'value_trans' => 'Value Trans',
            'percent_disc' => 'Percent Disc',
            'value_disc' => 'Value Disc',
            'percent_tax' => 'Percent Tax',
            'value_tax' => 'Value Tax',
            'cogs' => 'Cogs',
            'create_by' => 'Create By',
            'create_date' => 'Create Date',
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

        $criteria->compare('id_line', $this->id_line, true);
        $criteria->compare('id_sorder', $this->id_sorder);
        $criteria->compare('id_product', $this->id_product);
        $criteria->compare('id_uoms', $this->id_uoms);
        $criteria->compare('qty_trans', $this->qty_trans);
        $criteria->compare('value_trans', $this->value_trans);
        $criteria->compare('percent_disc', $this->percent_disc);
        $criteria->compare('value_disc', $this->value_disc);
        $criteria->compare('percent_tax', $this->percent_tax);
        $criteria->compare('value_tax', $this->value_tax);
        $criteria->compare('cogs', $this->cogs);
        $criteria->compare('create_by', $this->create_by);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('update_by', $this->update_by);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}