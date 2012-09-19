<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id_product
 * @property string $cd_product
 * @property string $nm_product
 * @property string $create_date
 * @property integer $create_by
 * @property string $update_date
 * @property integer $update_by
 * @property integer $id_manfrs
 * @property integer $id_uoms
 * @property integer $id_groups
 * @property integer $id_category
 */
class Product extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Product the static model class
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
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cd_product, nm_product, create_date, create_by, update_date, update_by, id_manfrs, id_uoms, id_groups, id_category', 'required'),
			array('create_by, update_by, id_manfrs, id_uoms, id_groups, id_category', 'numerical', 'integerOnly'=>true),
			array('cd_product', 'length', 'max'=>13),
			array('nm_product', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_product, cd_product, nm_product, create_date, create_by, update_date, update_by, id_manfrs, id_uoms, id_groups, id_category', 'safe', 'on'=>'search'),
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
			'id_product' => 'Id Product',
			'cd_product' => 'Cd Product',
			'nm_product' => 'Nm Product',
			'create_date' => 'Create Date',
			'create_by' => 'Create By',
			'update_date' => 'Update Date',
			'update_by' => 'Update By',
			'id_manfrs' => 'Id Manfrs',
			'id_uoms' => 'Id Uoms',
			'id_groups' => 'Id Groups',
			'id_category' => 'Id Category',
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

		$criteria->compare('id_product',$this->id_product);
		$criteria->compare('cd_product',$this->cd_product,true);
		$criteria->compare('nm_product',$this->nm_product,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('create_by',$this->create_by);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('update_by',$this->update_by);
		$criteria->compare('id_manfrs',$this->id_manfrs);
		$criteria->compare('id_uoms',$this->id_uoms);
		$criteria->compare('id_groups',$this->id_groups);
		$criteria->compare('id_category',$this->id_category);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}