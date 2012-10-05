<?php

/**
 * This is the model class for table "account".
 *
 * The followings are the available columns in table 'account':
 * @property integer $id_acc
 * @property integer $cd_acc
 * @property string $nm_acc
 * @property string $acc_normal
 * @property integer $parent
 * @property string $create_date
 * @property string $update_by
 * @property string $create_by
 * @property string $update_date
 * @property integer $level
 *
 * The followings are the available model relations:
 * @property GlPeriode[] $glPeriodes
 * @property GlDetail[] $glDetails
 */
class Account extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Account the static model class
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
		return 'account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cd_acc, nm_acc, acc_normal', 'required'),
			array('cd_acc, parent, level', 'numerical', 'integerOnly'=>true),
			array('nm_acc', 'length', 'max'=>30),
			array('acc_normal', 'length', 'max'=>1),
			array('update_by, create_by', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_acc, cd_acc, nm_acc, acc_normal, parent, create_date, update_by, create_by, update_date, level', 'safe', 'on'=>'search'),
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
			'glPeriodes' => array(self::HAS_MANY, 'GlPeriode', 'id_acc'),
			'glDetails' => array(self::HAS_MANY, 'GlDetail', 'id_acc'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_acc' => 'Id Acc',
			'cd_acc' => 'Cd Acc',
			'nm_acc' => 'Nm Acc',
			'acc_normal' => 'Acc Normal',
			'parent' => 'Parent',
			'create_date' => 'Create Date',
			'update_by' => 'Update By',
			'create_by' => 'Create By',
			'update_date' => 'Update Date',
			'level' => 'Level',
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

		$criteria->compare('id_acc',$this->id_acc);
		$criteria->compare('cd_acc',$this->cd_acc);
		$criteria->compare('nm_acc',$this->nm_acc,true);
		$criteria->compare('acc_normal',$this->acc_normal,true);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_by',$this->update_by,true);
		$criteria->compare('create_by',$this->create_by,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('level',$this->level);

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