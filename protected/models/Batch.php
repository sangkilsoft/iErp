<?php

/**
 * This is the model class for table "batch".
 *
 * The followings are the available columns in table 'batch':
 * @property integer $id_line
 * @property string $batch_num
 * @property string $date_expire
 * @property double $qty_receipt
 * @property double $qty_issued
 * @property string $create_date
 * @property string $update_date
 * @property integer $create_by
 * @property integer $update_by
 *
 * The followings are the available model relations:
 * @property GreceiptLine $idLine
 */
class Batch extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Batch the static model class
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
		return 'batch';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_line, batch_num, create_date, update_date, create_by, update_by', 'required'),
			array('id_line, create_by, update_by', 'numerical', 'integerOnly'=>true),
			array('qty_receipt, qty_issued', 'numerical'),
			array('batch_num', 'length', 'max'=>13),
			array('date_expire', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_line, batch_num, date_expire, qty_receipt, qty_issued, create_date, update_date, create_by, update_by', 'safe', 'on'=>'search'),
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
			'idLine' => array(self::BELONGS_TO, 'GreceiptLine', 'id_line'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_line' => 'Id Line',
			'batch_num' => 'Batch Num',
			'date_expire' => 'Date Expire',
			'qty_receipt' => 'Qty Receipt',
			'qty_issued' => 'Qty Issued',
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

		$criteria->compare('id_line',$this->id_line);
		$criteria->compare('batch_num',$this->batch_num,true);
		$criteria->compare('date_expire',$this->date_expire,true);
		$criteria->compare('qty_receipt',$this->qty_receipt);
		$criteria->compare('qty_issued',$this->qty_issued);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('create_by',$this->create_by);
		$criteria->compare('update_by',$this->update_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}