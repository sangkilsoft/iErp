<?php

/**
 * This is the model class for table "price_cat".
 *
 * The followings are the available columns in table 'price_cat':
 * @property integer $id_price_cat
 * @property string $description
 * @property integer $update_by
 * @property integer $create_by
 * @property string $create_date
 * @property string $update_date
 *
 * The followings are the available model relations:
 * @property Price[] $prices
 */
class PriceCat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PriceCat the static model class
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
		return 'price_cat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description', 'required'),
			array('update_by, create_by', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_price_cat, description, update_by, create_by, create_date, update_date', 'safe', 'on'=>'search'),
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
			'prices' => array(self::HAS_MANY, 'Price', 'id_price_cat'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_price_cat' => 'Id Price Cat',
			'description' => 'Description',
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

		$criteria->compare('id_price_cat',$this->id_price_cat);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('update_by',$this->update_by);
		$criteria->compare('create_by',$this->create_by);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_date',$this->update_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->create_by = 1;
            $this->create_date = new CDbExpression('NOW()');
            $this->update_by = 1;
            $this->update_date = new CDbExpression('NOW()');
        } else {
            $this->update_by = 1;
            $this->update_date = new CDbExpression('NOW()');
        }
        return parent::beforeSave();
    }

}