<?php

/**
 * This is the model class for table "configure".
 *
 * The followings are the available columns in table 'configure':
 * @property integer $id_conf
 * @property string $conf_name
 * @property string $conf_code
 * @property string $value
 * @property integer $update_by
 * @property string $update_date
 * @property integer $create_by
 * @property string $create_date
 */
class Configure extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Configure the static model class
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
		return 'configure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('conf_name, value, update_by, update_date, create_by, create_date', 'required'),
			array('update_by, create_by', 'numerical', 'integerOnly'=>true),
			array('conf_name', 'length', 'max'=>32),
			array('conf_code', 'length', 'max'=>16),
			array('value', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_conf, conf_name, conf_code, value, update_by, update_date, create_by, create_date', 'safe', 'on'=>'search'),
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
			'sorder' => array(self::HAS_MANY, 'SalOrder', 'conf_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_conf' => 'Id Conf',
			'conf_name' => 'Conf Name',
			'conf_code' => 'Conf Code',
			'value' => 'Value',
			'update_by' => 'Update By',
			'update_date' => 'Update Date',
			'create_by' => 'Create By',
			'create_date' => 'Create Date',
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

		$criteria->compare('id_conf',$this->id_conf);
		$criteria->compare('conf_name',$this->conf_name,true);
		$criteria->compare('conf_code',$this->conf_code,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('update_by',$this->update_by);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('create_by',$this->create_by);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}