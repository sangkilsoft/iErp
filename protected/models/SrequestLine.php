<?php

/**
 * This is the model class for table "srequest_line".
 *
 * The followings are the available columns in table 'srequest_line':
 * @property string $id_line
 * @property integer $id_srequest
 *
 * The followings are the available model relations:
 * @property SalRequest $idSrequest
 */
class SrequestLine extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SrequestLine the static model class
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
		return 'srequest_line';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_line, id_srequest', 'required'),
			array('id_srequest', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_line, id_srequest', 'safe', 'on'=>'search'),
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
			'idSrequest' => array(self::BELONGS_TO, 'SalRequest', 'id_srequest'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_line' => 'Id Line',
			'id_srequest' => 'Id Srequest',
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

		$criteria->compare('id_line',$this->id_line,true);
		$criteria->compare('id_srequest',$this->id_srequest);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}