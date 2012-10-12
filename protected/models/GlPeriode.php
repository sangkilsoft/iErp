<?php

/**
 * This is the model class for table "gl_periode".
 *
 * The followings are the available columns in table 'gl_periode':
 * @property integer $id_glperiode
 * @property integer $bulan
 * @property integer $tahun
 * @property integer $id_branch
 * @property integer $id_orgn
 * @property integer $id_acc
 * @property double $saldo
 * @property string $create_date
 * @property string $update_by
 * @property string $create_by
 * @property string $update_date
 *
 * The followings are the available model relations:
 * @property Account $idAcc
 */
class GlPeriode extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GlPeriode the static model class
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
		return 'gl_periode';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bulan, tahun, id_branch, id_orgn, id_acc, saldo, create_date, update_by, create_by, update_date', 'required'),
			array('bulan, tahun, id_branch, id_orgn, id_acc', 'numerical', 'integerOnly'=>true),
			array('saldo', 'numerical'),
			array('update_by, create_by', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_glperiode, bulan, tahun, id_branch, id_orgn, id_acc, saldo, create_date, update_by, create_by, update_date', 'safe', 'on'=>'search'),
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
			'idAcc' => array(self::BELONGS_TO, 'Account', 'id_acc'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_glperiode' => 'Id Glperiode',
			'bulan' => 'Bulan',
			'tahun' => 'Tahun',
			'id_branch' => 'Id Branch',
			'id_orgn' => 'Id Orgn',
			'id_acc' => 'Id Acc',
			'saldo' => 'Saldo',
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

		$criteria->compare('id_glperiode',$this->id_glperiode);
		$criteria->compare('bulan',$this->bulan);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('id_branch',$this->id_branch);
		$criteria->compare('id_orgn',$this->id_orgn);
		$criteria->compare('id_acc',$this->id_acc);
		$criteria->compare('saldo',$this->saldo);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_by',$this->update_by,true);
		$criteria->compare('create_by',$this->create_by,true);
		$criteria->compare('update_date',$this->update_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}