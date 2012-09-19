<?php

/**
 * This is the model class for table "groups".
 *
 * The followings are the available columns in table 'groups':
 * @property integer $id_groups
 * @property string $cd_group
 * @property string $nm_group
 * @property integer $update_by
 * @property string $update_date
 * @property string $create_date
 * @property integer $create_by
 */
class Groups extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Groups the static model class
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
		return 'groups';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cd_group, nm_group, update_by, update_date, create_date, create_by', 'required'),
			array('update_by, create_by', 'numerical', 'integerOnly'=>true),
			array('cd_group', 'length', 'max'=>4),
			array('nm_group', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_groups, cd_group, nm_group, update_by, update_date, create_date, create_by', 'safe', 'on'=>'search'),
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
			'id_groups' => 'Id Groups',
			'cd_group' => 'Cd Group',
			'nm_group' => 'Nm Group',
			'update_by' => 'Update By',
			'update_date' => 'Update Date',
			'create_date' => 'Create Date',
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

		$criteria->compare('id_groups',$this->id_groups);
		$criteria->compare('cd_group',$this->cd_group,true);
		$criteria->compare('nm_group',$this->nm_group,true);
		$criteria->compare('update_by',$this->update_by);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('create_by',$this->create_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}