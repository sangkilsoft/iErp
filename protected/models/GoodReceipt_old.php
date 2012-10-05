<?php

/**
 * This is the model class for table "good_receipt".
 *
 * The followings are the available columns in table 'good_receipt':
 * @property integer $id_receipt
 * @property string $gr_num
 * @property string $description
 * @property integer $status
 * @property string $receipt_date
 * @property string $update_date
 * @property integer $create_by
 * @property integer $update_by
 * @property string $create_date
 */
class GoodReceipt extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return GoodReceipt the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'good_receipt';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('description, status, receipt_date', 'required'),
            array('status, create_by, update_by', 'numerical', 'integerOnly' => true),
            array('gr_num', 'length', 'max' => 13),
            array('description', 'length', 'max' => 64),
            array('gr_num', 'unique', 'message' => 'GR Number must be unique..!'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_receipt, gr_num, description, status, receipt_date, update_date, create_by, update_by, create_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_receipt' => 'Id Receipt',
            'gr_num' => 'Gr Num',
            'description' => 'Description',
            'status' => 'Status',
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
        $criteria->compare('description', $this->description, true);
        $criteria->compare('status', $this->status);
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
            echo $rdate = CDateTimeParser::parse($this->receipt_date,'d-m-Y');                    
            $this->receipt_date = date('Y-m-d',$rdate);

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
        if ($this->isNewRecord)
            $this->gr_num = 'GR02'; //call number generator         

        return parent::beforeValidate();
    }

}