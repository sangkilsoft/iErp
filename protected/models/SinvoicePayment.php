<?php

/**
 * This is the model class for table "sinvoice_payment".
 *
 * The followings are the available columns in table 'sinvoice_payment':
 * @property string $id_pyment
 * @property string $pyment_num
 * @property integer $id_branch
 * @property integer $id_orgn
 * @property string $pyment_date
 * @property double $actual_pyment
 * @property string $currency
 * @property string $ref_num
 * @property string $py_method
 * @property string $deposit_to
 * @property boolean $cleared
 * @property string $create_date
 * @property integer $create_by
 * @property string $update_date
 * @property integer $update_by
 * @property integer $id_customer
 */
class SinvoicePayment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SinvoicePayment the static model class
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
		return 'sinvoice_payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pyment_num, id_branch, id_orgn, pyment_date, create_date, create_by, update_date, update_by, id_customer', 'required'),
			array('id_branch, id_orgn, create_by, update_by, id_customer', 'numerical', 'integerOnly'=>true),
			array('actual_pyment', 'numerical'),
			array('pyment_num', 'length', 'max'=>13),
			array('ref_num', 'length', 'max'=>16),
			array('py_method, deposit_to', 'length', 'max'=>32),
			array('currency, cleared', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_pyment, pyment_num, id_branch, id_orgn, pyment_date, actual_pyment, currency, ref_num, py_method, deposit_to, cleared, create_date, create_by, update_date, update_by, id_customer', 'safe', 'on'=>'search'),
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
			'id_pyment' => 'Id Pyment',
			'pyment_num' => 'Pyment Num',
			'id_branch' => 'Id Branch',
			'id_orgn' => 'Id Orgn',
			'pyment_date' => 'Pyment Date',
			'actual_pyment' => 'Actual Pyment',
			'currency' => 'Currency',
			'ref_num' => 'Ref Num',
			'py_method' => 'Py Method',
			'deposit_to' => 'Deposit To',
			'cleared' => 'Cleared',
			'create_date' => 'Create Date',
			'create_by' => 'Create By',
			'update_date' => 'Update Date',
			'update_by' => 'Update By',
			'id_customer' => 'Id Customer',
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

		$criteria->compare('id_pyment',$this->id_pyment,true);
		$criteria->compare('pyment_num',$this->pyment_num,true);
		$criteria->compare('id_branch',$this->id_branch);
		$criteria->compare('id_orgn',$this->id_orgn);
		$criteria->compare('pyment_date',$this->pyment_date,true);
		$criteria->compare('actual_pyment',$this->actual_pyment);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('ref_num',$this->ref_num,true);
		$criteria->compare('py_method',$this->py_method,true);
		$criteria->compare('deposit_to',$this->deposit_to,true);
		$criteria->compare('cleared',$this->cleared);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('create_by',$this->create_by);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('update_by',$this->update_by);
		$criteria->compare('id_customer',$this->id_customer);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}