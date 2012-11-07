<?php

/**
 * This is the model class for table "podelivery_hdr".
 *
 * The followings are the available columns in table 'podelivery_hdr':
 * @property integer $id_delivery
 * @property string $do_num
 * @property integer $id_orgn
 * @property integer $id_branch
 * @property integer $id_supplier
 * @property string $description
 * @property string $po_num
 * @property string $gr_num
 * @property integer $status
 * @property integer $create_by
 * @property string $create_date
 * @property string $update_date
 * @property integer $update_by
 * @property string $ref_number
 *
 * The followings are the available model relations:
 * @property PodeliveryLine[] $podeliveryLines
 * @property PoinvoiceHdr[] $poinvoiceHdrs
 */
class PodeliveryHdr extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return PodeliveryHdr the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'podelivery_hdr';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('do_num, id_orgn, id_branch, id_supplier, description, status', 'required'),
            array('id_orgn, id_branch, id_supplier, status, create_by, update_by', 'numerical', 'integerOnly' => true),
            array('do_num, po_num, gr_num', 'length', 'max' => 13),
            array('description', 'length', 'max' => 64),
            array('ref_number', 'length', 'max' => 16),
            array('do_num', 'unique', 'message' => 'DO Number must be unique..!'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_delivery, do_num, id_orgn, id_branch, id_supplier, description, po_num, gr_num, status, create_by, create_date, update_date, update_by, ref_number', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'podeliveryLines' => array(self::HAS_MANY, 'PodeliveryLine', 'id_delivery'),
            'poinvoiceHdrs' => array(self::HAS_MANY, 'PoinvoiceHdr', 'id_delivery'),
            'dosuppliers' => array(self::BELONGS_TO, 'Suppliers', 'id_supplier'),            
            'orgtodisplay' => array(self::BELONGS_TO, 'Organization', 'id_orgn'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_delivery' => 'Id Delivery',
            'do_num' => 'Do Num',
            'id_orgn' => 'Id Orgn',
            'id_branch' => 'Id Branch',
            'id_supplier' => 'Id Supplier',
            'description' => 'Description',
            'po_num' => 'Po Num',
            'gr_num' => 'Gr Num',
            'status' => 'Status',
            'create_by' => 'Create By',
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
            'update_by' => 'Update By',
            'ref_number' => 'Ref Number',
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

        $criteria->compare('id_delivery', $this->id_delivery);
        $criteria->compare('do_num', $this->do_num, true);
        $criteria->compare('id_orgn', $this->id_orgn);
        $criteria->compare('id_branch', $this->id_branch);
        $criteria->compare('id_supplier', $this->id_supplier);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('po_num', $this->po_num, true);
        $criteria->compare('gr_num', $this->gr_num, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('create_by', $this->create_by);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('update_by', $this->update_by);
        $criteria->compare('ref_number', $this->ref_number, true);

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

    public function beforeValidate() {
        if (empty($this->do_num))
            $this->do_num = (String) date('myhis');
        return parent::beforeValidate();
    }

    public function beforeDelete() {
        $exist = PodeliveryLine::model()->exists('id_delivery=:id_delivery', array(':id_delivery' => $this->id_delivery));
        if ($exist)
            if (!PodeliveryLine::model()->deleteAll('id_delivery=:id_delivery', array(':id_delivery' => $this->id_delivery)))
                throw new CHttpException('', 'Detail delivery can not be deleted..!');

        return parent::beforeDelete();
    }

}