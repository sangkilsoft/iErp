<?php

/**
 * This is the model class for table "gl_header".
 *
 * The followings are the available columns in table 'gl_header':
 * @property integer $id_glheader
 * @property integer $id_branch
 * @property integer $id_orgn
 * @property string $refnum
 * @property string $tgl_trans
 * @property string $trans_type
 * @property string $description
 * @property string $update_date
 * @property string $create_date
 * @property string $create_by
 * @property string $update_by
 *
 * The followings are the available model relations:
 * @property GlDetail[] $glDetails
 */
class GlHeader extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GlHeader the static model class
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
		return 'gl_header';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_branch, id_orgn, refnum, tgl_trans, trans_type, description', 'required'),
			array('id_branch, id_orgn', 'numerical', 'integerOnly'=>true),
			array('refnum', 'length', 'max'=>13),
			array('trans_type', 'length', 'max'=>32),
			array('description', 'length', 'max'=>128),
			array('create_by, update_by', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_glheader, id_branch, id_orgn, refnum, tgl_trans, trans_type, description, update_date, create_date, create_by, update_by', 'safe', 'on'=>'search'),
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
			'glDetails' => array(self::HAS_MANY, 'GlDetail', 'id_glheader'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_glheader' => 'Id Glheader',
			'id_branch' => 'Id Branch',
			'id_orgn' => 'Id Orgn',
			'refnum' => 'Refnum',
			'tgl_trans' => 'Tgl Trans',
			'trans_type' => 'Trans Type',
			'description' => 'Description',
			'update_date' => 'Update Date',
			'create_date' => 'Create Date',
			'create_by' => 'Create By',
			'update_by' => 'Update By',
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

		$criteria->compare('id_glheader',$this->id_glheader);
		$criteria->compare('id_branch',$this->id_branch);
		$criteria->compare('id_orgn',$this->id_orgn);
		$criteria->compare('refnum',$this->refnum,true);
		$criteria->compare('tgl_trans',$this->tgl_trans,true);
		$criteria->compare('trans_type',$this->trans_type,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('create_by',$this->create_by,true);
		$criteria->compare('update_by',$this->update_by,true);

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