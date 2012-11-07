<?php

/**
 * This is the model class for table "customer_detail".
 *
 * The followings are the available columns in table 'customer_detail':
 * @property integer $id_customer
 * @property integer $id_distric
 * @property string $addr2
 * @property double $latitude
 * @property double $longtitude
 * @property string $create_date
 * @property integer $create_by
 * @property string $update_date
 * @property integer $update_by
 */
class CustomerDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CustomerDetail the static model class
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
		return 'customer_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_customer, id_distric, latitude, longtitude, create_date, create_by, update_date, update_by', 'required'),
			array('id_customer, id_distric, create_by, update_by', 'numerical', 'integerOnly'=>true),
			array('latitude, longtitude', 'numerical'),
			array('addr2', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_customer, id_distric, addr2, latitude, longtitude, create_date, create_by, update_date, update_by', 'safe', 'on'=>'search'),
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
			'id_distric' => 'Id Distric',
			'addr2' => 'Addr2',
			'latitude' => 'Latitude',
			'longtitude' => 'Longtitude',
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
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_customer',$this->id_customer);
		$criteria->compare('id_distric',$this->id_distric);
		$criteria->compare('addr2',$this->addr2,true);
		$criteria->compare('latitude',$this->latitude);
		$criteria->compare('longtitude',$this->longtitude);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('create_by',$this->create_by);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('update_by',$this->update_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}