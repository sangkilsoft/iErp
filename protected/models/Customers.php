<?php

/**
 * This is the model class for table "customers".
 *
 * The followings are the available columns in table 'customers':
 * @property integer $id_customer
 * @property string $cd_cust
 * @property string $nm_cust
 * @property integer $id_ctype
 * @property integer $id_cclass
 * @property string $contact_name
 * @property string $contact_number
 * @property integer $status
 * @property string $create_date
 * @property string $update_date
 * @property integer $create_by
 * @property integer $update_by
 *
 * The followings are the available model relations:
 * @property CustomerClass $idCclass
 * @property CustomerType $idCtype
 * @property CustomerDetail $customerDetail
 * @property SalRequest[] $salRequests
 * @property SalOrder[] $salOrders
 * @property CustomerLimitation $customerLimitation
 */
class Customers extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Customers the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'customers';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cd_cust, nm_cust, id_ctype, id_cclass', 'required'),
            array('id_ctype, id_cclass, status, create_by, update_by', 'numerical', 'integerOnly' => true),
            array('cd_cust', 'length', 'max' => 4),
            array('nm_cust', 'length', 'max' => 64),
            array('contact_name', 'length', 'max' => 32),
            array('contact_number', 'length', 'max' => 16),
            array('cd_cust', 'unique', 'on'=> 'insert','message'=>'customer code must be unique...!'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_customer, cd_cust, nm_cust, id_ctype, id_cclass, contact_name, contact_number, status, create_date, update_date, create_by, update_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idCclass' => array(self::BELONGS_TO, 'CustomerClass', 'id_cclass'),
            'idCtype' => array(self::BELONGS_TO, 'CustomerType', 'id_ctype'),
            'customerDetail' => array(self::HAS_ONE, 'CustomerDetail', 'id_customer'),
            'salRequests' => array(self::HAS_MANY, 'SalRequest', 'id_customer'),
            'salOrders' => array(self::HAS_MANY, 'SalOrder', 'id_customer'),
            'customerLimitation' => array(self::HAS_ONE, 'CustomerLimitation', 'id_customer'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_customer' => 'Id Customer',
            'cd_cust' => 'Cust Code',
            'nm_cust' => 'Cust Name',
            'id_ctype' => 'Cust Type',
            'id_cclass' => 'Cust Class',
            'contact_name' => 'Contact Name',
            'contact_number' => 'Contact Number',
            'status' => 'Status',
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
            'create_by' => 'Create By',
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

        $criteria->compare('id_customer', $this->id_customer);
        $criteria->compare('cd_cust', $this->cd_cust, true);
        $criteria->compare('nm_cust', $this->nm_cust, true);
        $criteria->compare('id_ctype', $this->id_ctype);
        $criteria->compare('id_cclass', $this->id_cclass);
        $criteria->compare('contact_name', $this->contact_name, true);
        $criteria->compare('contact_number', $this->contact_number, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('create_by', $this->create_by);
        $criteria->compare('update_by', $this->update_by);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->create_by = 1;
            $this->create_date = new CDbExpression('NOW()');
            $this->update_by = 1;
            $this->update_date = new CDbExpression('NOW()');
        } else {
            $this->update_by = 1;
            $this->update_date = new CDbExpression('NOW()');
        }
        return parent::beforeSave();
    }

}