<?php

/**
 * This is the model class for table "locator".
 *
 * The followings are the available columns in table 'locator':
 * @property integer $id_locator
 * @property integer $id_warehouse
 * @property string $cd_locator
 * @property string $nm_locator
 * @property string $description
 * @property double $latitude
 * @property double $longitude
 * @property double $capacity
 * @property integer $create_by
 * @property integer $update_by
 * @property string $update_date
 * @property string $create_date
 */
class Locator extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Locator the static model class
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
		return 'locator';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_warehouse, cd_locator, nm_locator', 'required'),
			array('id_warehouse, create_by, update_by', 'numerical', 'integerOnly'=>true),
			array('latitude, longitude, capacity', 'numerical'),
			array('cd_locator', 'length', 'max'=>4),
			array('nm_locator', 'length', 'max'=>32),
			array('description', 'length', 'max'=>64),                    
                        array('cd_locator', 'unique', 'message' => 'Locator_code must in unique number'),
			array('id_warehouse','exist', 'attributeName' => 'id_warehouse', 'className' => 'Warehouse', 'message' => 'Id Warehose must in warehouse list'),
			
                        // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_locator, id_warehouse, cd_locator, nm_locator, description, latitude, longitude, capacity, create_by, update_by, update_date, create_date', 'safe', 'on'=>'search'),
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
                    'whse'=>array(self::BELONGS_TO, 'Warehouse', 'id_warehouse'),
                );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_locator' => 'Id Locator',
			'id_warehouse' => 'Id Warehouse',
			'cd_locator' => 'Cd Locator',
			'nm_locator' => 'Nm Locator',
			'description' => 'Description',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
			'capacity' => 'Capacity',
			'create_by' => 'Create By',
			'update_by' => 'Update By',
			'update_date' => 'Update Date',
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

		$criteria->compare('id_locator',$this->id_locator);
		$criteria->compare('id_warehouse',$this->id_warehouse);
		$criteria->compare('cd_locator',$this->cd_locator,true);
		$criteria->compare('nm_locator',$this->nm_locator,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('latitude',$this->latitude);
		$criteria->compare('longitude',$this->longitude);
		$criteria->compare('capacity',$this->capacity);
		$criteria->compare('create_by',$this->create_by);
		$criteria->compare('update_by',$this->update_by);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->create_by = Yii::app()->user->Id;
            $this->create_date = new CDbExpression('NOW()');
            $this->update_by = Yii::app()->user->Id;
            $this->update_date = new CDbExpression('NOW()');
        } else {
            $this->update_by = Yii::app()->user->Id;
            $this->update_date = new CDbExpression('NOW()');
        }
        return parent::beforeSave();
    }

}