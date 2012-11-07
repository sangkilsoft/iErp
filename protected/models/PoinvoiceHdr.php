<?php

/**
 * This is the model class for table "poinvoice_hdr".
 *
 * The followings are the available columns in table 'poinvoice_hdr':
 * @property integer $id_invoice
 * @property string $invoice_num
 * @property integer $id_delivery
 * @property integer $id_orgn
 * @property integer $id_branch
 * @property integer $id_supplier
 * @property string $description
 * @property double $total_value
 * @property double $total_discount
 * @property double $total_tax
 * @property double $total_paid
 * @property integer $status
 * @property string $date_limit
 * @property string $update_date
 * @property string $create_date
 * @property integer $create_by
 * @property integer $update_by
 *
 * The followings are the available model relations:
 * @property PoinvoicePayment[] $poinvoicePayments
 * @property PodeliveryHdr $idDelivery
 */
class PoinvoiceHdr extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PoinvoiceHdr the static model class
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
		return 'poinvoice_hdr';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('invoice_num, id_delivery, id_orgn, id_branch, id_supplier, description, total_value, status, date_limit, update_date, create_date, create_by, update_by', 'required'),
			array('id_delivery, id_orgn, id_branch, id_supplier, status, create_by, update_by', 'numerical', 'integerOnly'=>true),
			array('total_value, total_discount, total_tax, total_paid', 'numerical'),
			array('invoice_num', 'length', 'max'=>13),
			array('description', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_invoice, invoice_num, id_delivery, id_orgn, id_branch, id_supplier, description, total_value, total_discount, total_tax, total_paid, status, date_limit, update_date, create_date, create_by, update_by', 'safe', 'on'=>'search'),
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
			'poinvoicePayments' => array(self::HAS_MANY, 'PoinvoicePayment', 'id_invoice'),
			'idDelivery' => array(self::BELONGS_TO, 'PodeliveryHdr', 'id_delivery'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_invoice' => 'Id Invoice',
			'invoice_num' => 'Invoice Num',
			'id_delivery' => 'Id Delivery',
			'id_orgn' => 'Id Orgn',
			'id_branch' => 'Id Branch',
			'id_supplier' => 'Id Supplier',
			'description' => 'Description',
			'total_value' => 'Total Value',
			'total_discount' => 'Total Discount',
			'total_tax' => 'Total Tax',
			'total_paid' => 'Total Paid',
			'status' => 'Status',
			'date_limit' => 'Date Limit',
			'update_date' => 'Update Date',
			'create_date' => 'Create Date',
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

		$criteria->compare('id_invoice',$this->id_invoice);
		$criteria->compare('invoice_num',$this->invoice_num,true);
		$criteria->compare('id_delivery',$this->id_delivery);
		$criteria->compare('id_orgn',$this->id_orgn);
		$criteria->compare('id_branch',$this->id_branch);
		$criteria->compare('id_supplier',$this->id_supplier);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('total_value',$this->total_value);
		$criteria->compare('total_discount',$this->total_discount);
		$criteria->compare('total_tax',$this->total_tax);
		$criteria->compare('total_paid',$this->total_paid);
		$criteria->compare('status',$this->status);
		$criteria->compare('date_limit',$this->date_limit,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('create_by',$this->create_by);
		$criteria->compare('update_by',$this->update_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}