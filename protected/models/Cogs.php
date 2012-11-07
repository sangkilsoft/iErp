<?php

/**
 * This is the model class for table "cogs".
 *
 * The followings are the available columns in table 'cogs':
 * @property integer $id_cogs
 * @property integer $id_product
 * @property integer $id_orgn
 * @property integer $id_branch
 * @property double $cogs
 * @property integer $update_by
 * @property integer $create_by
 * @property string $create_date
 * @property string $update_date
 *
 * The followings are the available model relations:
 * @property Product $idProduct
 */
class Cogs extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Cogs the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cogs';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_product, id_orgn, id_branch', 'required'),
            array('id_product, id_orgn, id_branch, update_by, create_by', 'numerical', 'integerOnly' => true),
            array('cogs', 'numerical'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_cogs, id_product, id_orgn, id_branch, cogs, update_by, create_by, create_date, update_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idProduct' => array(self::BELONGS_TO, 'Product', 'id_product'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_cogs' => 'Id Cogs',
            'id_product' => 'Id Product',
            'id_orgn' => 'Id Orgn',
            'id_branch' => 'Id Branch',
            'cogs' => 'Cogs',
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
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_cogs', $this->id_cogs);
        $criteria->compare('id_product', $this->id_product);
        $criteria->compare('id_orgn', $this->id_orgn);
        $criteria->compare('id_branch', $this->id_branch);
        $criteria->compare('cogs', $this->cogs);
        $criteria->compare('update_by', $this->update_by);
        $criteria->compare('create_by', $this->create_by);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('update_date', $this->update_date, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->create_by = 0; //Yii::app()->user->Id;
            $this->create_date = new CDbExpression('NOW()');
            $this->update_by = 0; //Yii::app()->user->Id;
            $this->update_date = new CDbExpression('NOW()');
        } else {
            $this->update_by = 0; //Yii::app()->user->Id;
            $this->update_date = new CDbExpression('NOW()');
        }
        return parent::beforeSave();
    }

}