<?php

/**
 * This is the model class for table "porder_hdr".
 *
 * The followings are the available columns in table 'porder_hdr':
 * @property integer $id_po
 * @property string $po_num
 * @property integer $id_branch
 * @property integer $id_orgn
 * @property string $description
 * @property string $ref_number
 * @property integer $id_supplier
 * @property integer $status
 * @property integer $create_by
 * @property string $create_date
 * @property string $update_date
 * @property integer $update_by
 *
 * The followings are the available model relations:
 * @property PorderLine[] $porderLines
 * update by mujib
 */
class PorderHdr extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PorderHdr the static model class
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
		return 'porder_hdr';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('po_num, id_branch, id_orgn, description, id_supplier, status, create_by, create_date, update_date, update_by', 'required'),
			array('id_branch, id_orgn, id_supplier, status, create_by, update_by', 'numerical', 'integerOnly'=>true),
			array('po_num', 'length', 'max'=>13),
			array('description', 'length', 'max'=>64),
			array('ref_number', 'length', 'max'=>16),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_po, po_num, id_branch, id_orgn, description, ref_number, id_supplier, status, create_by, create_date, update_date, update_by', 'safe', 'on'=>'search'),
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
			'porderLines' => array(self::HAS_MANY, 'PorderLine', 'id_po'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_po' => 'Id Po',
			'po_num' => 'Po Num',
			'id_branch' => 'Id Branch',
			'id_orgn' => 'Id Orgn',
			'description' => 'Description',
			'ref_number' => 'Ref Number',
			'id_supplier' => 'Id Supplier',
			'status' => 'Status',
			'create_by' => 'Create By',
			'create_date' => 'Create Date',
			'update_date' => 'Update Date',
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

		$criteria->compare('id_po',$this->id_po);
		$criteria->compare('po_num',$this->po_num,true);
		$criteria->compare('id_branch',$this->id_branch);
		$criteria->compare('id_orgn',$this->id_orgn);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('ref_number',$this->ref_number,true);
		$criteria->compare('id_supplier',$this->id_supplier);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_by',$this->create_by);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('update_by',$this->update_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}