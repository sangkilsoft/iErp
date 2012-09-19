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
 * @property string $addrs
 * @property string $contact_name
 * @property string $contact_number
 * @property integer $status
 * @property string $create_date
 * @property string $update_date
 * @property integer $create_by
 * @property integer $update_by
 */
class Customers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Customers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cd_cust, nm_cust, id_ctype, id_cclass, create_date, update_date, create_by, update_by', 'required'),
			array('id_ctype, id_cclass, status, create_by, update_by', 'numerical', 'integerOnly'=>true),
			array('cd_cust', 'length', 'max'=>4),
			array('nm_cust', 'length', 'max'=>64),
			array('addrs, contact_name', 'length', 'max'=>32),
			array('contact_number', 'length', 'max'=>16),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_customer, cd_cust, nm_cust, id_ctype, id_cclass, addrs, contact_name, contact_number, status, create_date, update_date, create_by, update_by', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_customer' => 'Id Customer',
			'cd_cust' => 'Cd Cust',
			'nm_cust' => 'Nm Cust',
			'id_ctype' => 'Id Ctype',
			'id_cclass' => 'Id Cclass',
			'addrs' => 'Addrs',
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
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_customer',$this->id_customer);
		$criteria->compare('cd_cust',$this->cd_cust,true);
		$criteria->compare('nm_cust',$this->nm_cust,true);
		$criteria->compare('id_ctype',$this->id_ctype);
		$criteria->compare('id_cclass',$this->id_cclass);
		$criteria->compare('addrs',$this->addrs,true);
		$criteria->compare('contact_name',$this->contact_name,true);
		$criteria->compare('contact_number',$this->contact_number,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('create_by',$this->create_by);
		$criteria->compare('update_by',$this->update_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}