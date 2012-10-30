<?php

/**
 * This is the model class for table "greceipt_hdr".
 *
 * The followings are the available columns in table 'greceipt_hdr':
 * @property integer $id_receipt
 * @property string $gr_num
 * @property integer $id_orgn
 * @property integer $id_branch
 * @property integer $id_warehouse
 * @property integer $id_locator
 * @property string $description
 * @property integer $status
 * @property string $trans_type
 * @property string $ref_number
 * @property string $receipt_date
 * @property string $update_date
 * @property integer $create_by
 * @property integer $update_by
 * @property string $create_date
 *
 * The followings are the available model relations:
 * @property GreceiptLine[] $greceiptLines
 * @property Warehouse $idWarehouse
 * @property Locator $idLocator
 */
class GreceiptHdr extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return GreceiptHdr the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'greceipt_hdr';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('gr_num, id_orgn, id_branch, id_warehouse, id_locator, description, status, receipt_date', 'required'),
            array('id_orgn, id_branch, id_warehouse, id_locator, status, create_by, update_by', 'numerical', 'integerOnly' => true),
            array('gr_num', 'length', 'max' => 13),
            array('description', 'length', 'max' => 64),
            array('ref_number', 'length', 'max' => 16),
            array('trans_type', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_receipt, gr_num, id_orgn, id_branch, id_warehouse, id_locator, description, status, trans_type, ref_number, receipt_date, update_date, create_by, update_by, create_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'greceiptLines' => array(self::HAS_MANY, 'GreceiptLine', 'id_receipt'),
            'idWarehouse' => array(self::BELONGS_TO, 'Warehouse', 'id_warehouse'),
            'idLocator' => array(self::BELONGS_TO, 'Locator', 'id_locator'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_receipt' => 'Id Receipt',
            'gr_num' => 'Gr Num',
            'id_orgn' => 'Id Orgn',
            'id_branch' => 'Id Branch',
            'id_warehouse' => 'Id Warehouse',
            'id_locator' => 'Id Locator',
            'description' => 'Description',
            'status' => 'Status',
            'trans_type' => 'Trans Type',
            'ref_number' => 'Ref Number',
            'receipt_date' => 'Receipt Date',
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

        $criteria->compare('id_receipt', $this->id_receipt);
        $criteria->compare('gr_num', $this->gr_num, true);
        $criteria->compare('id_orgn', $this->id_orgn);
        $criteria->compare('id_branch', $this->id_branch);
        $criteria->compare('id_warehouse', $this->id_warehouse);
        $criteria->compare('id_locator', $this->id_locator);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('trans_type', $this->trans_type, true);
        $criteria->compare('ref_number', $this->ref_number, true);
        $criteria->compare('receipt_date', $this->receipt_date, true);
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

    public function beforeDelete() {
        $exist = GreceiptLine::model()->exists('id_receipt=:id_receipt', array(':id_receipt' => $this->id_receipt));
        if ($exist){
            $delreceipt = new GreceiptLine;
            $delreceipt = $delreceipt->model()->deleteAll('id_receipt=:id_receipt', array(':id_receipt' => $this->id_receipt)); 
            if (!$delreceipt)
                throw new CHttpException('', $delreceipt->getErrors());
        }
        return parent::beforeDelete();
    }

}