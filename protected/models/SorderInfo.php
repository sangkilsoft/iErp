<?php

/**
 * This is the model class for table "sorder_info".
 *
 * The followings are the available columns in table 'sorder_info':
 * @property integer $id_sorder
 * @property string $tax_name
 * @property string $npwp
 * @property string $sales
 * @property string $notes
 * @property integer $update_by
 * @property integer $create_by
 * @property string $create_date
 * @property string $update_date
 *
 * The followings are the available model relations:
 * @property SalOrder $idSorder
 * update by mujib manually
 */
class SorderInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SorderInfo the static model class
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
		return 'sorder_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_sorder, update_by, create_by, create_date, update_date', 'required'),
			array('id_sorder, update_by, create_by', 'numerical', 'integerOnly'=>true),
			array('tax_name', 'length', 'max'=>64),
			array('npwp, sales', 'length', 'max'=>32),
			array('notes', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_sorder, tax_name, npwp, sales, notes, update_by, create_by, create_date, update_date', 'safe', 'on'=>'search'),
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
			'idSorder' => array(self::BELONGS_TO, 'SalOrder', 'id_sorder'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_sorder' => 'Id Sorder',
			'tax_name' => 'Tax Name',
			'npwp' => 'Npwp',
			'sales' => 'Sales',
			'notes' => 'Notes',
			'update_by' => 'Update By',
			'create_by' => 'Create By',
			'create_date' => 'Create Date',
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
		$criteria->compare('tax_name',$this->tax_name,true);
		$criteria->compare('npwp',$this->npwp,true);
		$criteria->compare('sales',$this->sales,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('update_by',$this->update_by);
		$criteria->compare('create_by',$this->create_by);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_date',$this->update_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}