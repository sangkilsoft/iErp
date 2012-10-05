<?php

/**
 * This is the model class for table "gl_detail".
 *
 * The followings are the available columns in table 'gl_detail':
 * @property integer $id_gldetail
 * @property integer $id_glheader
 * @property integer $id_acc
 * @property double $debet
 * @property double $kredit
 * @property string $create_date
 * @property string $update_by
 * @property string $create_by
 * @property string $update_date
 *
 * The followings are the available model relations:
 * @property GlHeader $idGlheader
 * @property Account $idAcc
 */
class GlDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GlDetail the static model class
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
		return 'gl_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_glheader, id_acc, debet, kredit', 'required'),
			array('id_glheader, id_acc', 'numerical', 'integerOnly'=>true),
			array('debet, kredit', 'numerical'),
			array('update_by, create_by', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_gldetail, id_glheader, id_acc, debet, kredit, create_date, update_by, create_by, update_date', 'safe', 'on'=>'search'),
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
			'idGlheader' => array(self::BELONGS_TO, 'GlHeader', 'id_glheader'),
			'nm_acc' => array(self::BELONGS_TO, 'Account', 'id_acc'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_gldetail' => 'Id Gldetail',
			'id_glheader' => 'Id Glheader',
			'id_acc' => 'Id Acc',
			'debet' => 'Debet',
			'kredit' => 'Kredit',
			'create_date' => 'Create Date',
			'update_by' => 'Update By',
			'create_by' => 'Create By',
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

		$criteria->compare('id_gldetail',$this->id_gldetail);
		$criteria->compare('id_glheader',$this->id_glheader);
		$criteria->compare('id_acc',$this->id_acc);
		$criteria->compare('debet',$this->debet);
		$criteria->compare('kredit',$this->kredit);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_by',$this->update_by,true);
		$criteria->compare('create_by',$this->create_by,true);
		$criteria->compare('update_date',$this->update_date,true);

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