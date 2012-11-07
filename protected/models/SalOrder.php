<?php

/**
 * This is the model class for table "sal_order".
 *
 * The followings are the available columns in table 'sal_order':
 * @property integer $id_sorder
 * @property string $so_num
 * @property integer $id_orgn
 * @property integer $id_branch
 * @property integer $id_customer
 * @property string $py_method
 * @property integer $id_price_cat
 * @property integer $py_term
 * @property string $order_date
 * @property string $delivery_schdate
 * @property string $description
 * @property integer $status
 * @property integer $create_by
 * @property string $create_date
 * @property integer $update_by
 * @property string $update_date
 *
 * The followings are the available model relations:
 * @property SorderLine[] $sorderLines
 * @property SalDelivery[] $salDeliveries
 * @property Customers $idCustomer
 */
class SalOrder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SalOrder the static model class
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
		return 'sal_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('so_num, id_orgn, id_branch, id_customer, py_method, id_price_cat, py_term, order_date, delivery_schdate, description, status, create_by, create_date, update_by, update_date', 'required'),
			array('id_orgn, id_branch, id_customer, id_price_cat, py_term, status, create_by, update_by', 'numerical', 'integerOnly'=>true),
			array('so_num', 'length', 'max'=>13),
			array('py_method', 'length', 'max'=>32),
			array('description', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_sorder, so_num, id_orgn, id_branch, id_customer, py_method, id_price_cat, py_term, order_date, delivery_schdate, description, status, create_by, create_date, update_by, update_date', 'safe', 'on'=>'search'),
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
			'sorderLines' => array(self::HAS_MANY, 'SorderLine', 'id_sorder'),
			'salDeliveries' => array(self::HAS_MANY, 'SalDelivery', 'id_sorder'),
			'idCustomer' => array(self::BELONGS_TO, 'Customers', 'id_customer'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_sorder' => 'Id Sorder',
			'so_num' => 'So Num',
			'id_orgn' => 'Id Orgn',
			'id_branch' => 'Id Branch',
			'id_customer' => 'Id Customer',
			'py_method' => 'Py Method',
			'id_price_cat' => 'Id Price Cat',
			'py_term' => 'Py Term',
			'order_date' => 'Order Date',
			'delivery_schdate' => 'Delivery Schdate',
			'description' => 'Description',
			'status' => 'Status',
			'create_by' => 'Create By',
			'create_date' => 'Create Date',
			'update_by' => 'Update By',
			'update_date' => 'Update Date',
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

		$criteria->compare('id_sorder',$this->id_sorder);
		$criteria->compare('so_num',$this->so_num,true);
		$criteria->compare('id_orgn',$this->id_orgn);
		$criteria->compare('id_branch',$this->id_branch);
		$criteria->compare('id_customer',$this->id_customer);
		$criteria->compare('py_method',$this->py_method,true);
		$criteria->compare('id_price_cat',$this->id_price_cat);
		$criteria->compare('py_term',$this->py_term);
		$criteria->compare('order_date',$this->order_date,true);
		$criteria->compare('delivery_schdate',$this->delivery_schdate,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_by',$this->create_by);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_by',$this->update_by);
		$criteria->compare('update_date',$this->update_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}