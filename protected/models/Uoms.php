<?php

/**
 * This is the model class for table "uoms".
 *
 * The followings are the available columns in table 'uoms':
 * @property integer $id_uoms
 * @property string $cd_uom
 * @property integer $update_by
 * @property string $nm_uom
 * @property string $update_date
 * @property string $create_date
 * @property integer $create_by
 */
class Uoms extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Uoms the static model class
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
		return 'uoms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cd_uom, update_by, nm_uom, update_date, create_date, create_by', 'required'),
			array('update_by, create_by', 'numerical', 'integerOnly'=>true),
			array('cd_uom', 'length', 'max'=>4),
			array('nm_uom', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_uoms, cd_uom, update_by, nm_uom, update_date, create_date, create_by', 'safe', 'on'=>'search'),
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
			'id_uoms' => 'Id Uoms',
			'cd_uom' => 'Cd Uom',
			'update_by' => 'Update By',
			'nm_uom' => 'Nm Uom',
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

		$criteria->compare('id_uoms',$this->id_uoms);
		$criteria->compare('cd_uom',$this->cd_uom,true);
		$criteria->compare('update_by',$this->update_by);
		$criteria->compare('nm_uom',$this->nm_uom,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('create_by',$this->create_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}