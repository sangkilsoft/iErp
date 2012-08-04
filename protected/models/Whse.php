<?php

/**
 * This is the model class for table "whse".
 *
 * The followings are the available columns in table 'whse':
 * @property string $cd_whse
 * @property string $nm_whse
 * @property integer $create_by
 */
class Whse extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Whse the static model class
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
		return 'whse';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cd_whse, nm_whse, create_by', 'required'),
			array('create_by', 'numerical', 'integerOnly'=>true),
			array('cd_whse', 'length', 'max'=>4),
			array('nm_whse', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cd_whse, nm_whse, create_by', 'safe', 'on'=>'search'),
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
			'cd_whse' => 'Cd Whse',
			'nm_whse' => 'Nm Whse',
			'create_by' => 'Create By',
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

		$criteria->compare('cd_whse',$this->cd_whse,true);
		$criteria->compare('nm_whse',$this->nm_whse,true);
		$criteria->compare('create_by',$this->create_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}