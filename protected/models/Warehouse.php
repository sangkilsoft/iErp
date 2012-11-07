<?php

/**
 * This is the model class for table "warehouse".
 *
 * The followings are the available columns in table 'warehouse':
 * @property integer $id_warehouse
 * @property string $cd_whse
 * @property string $nm_whse
 * @property string $create_date
 * @property integer $create_by
 * @property integer $update_by
 * @property string $update_date
 */
class Warehouse extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Warehouse the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'warehouse';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cd_whse, nm_whse', 'required'),
            array('create_by, update_by', 'numerical', 'integerOnly' => true),
            array('cd_whse', 'length', 'max' => 4),
            array('nm_whse', 'length', 'max' => 32),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_warehouse, cd_whse, nm_whse, create_date, create_by, update_by, update_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'loctrs'=>array(self::HAS_MANY, 'Locator', 'id_warehouse'),    
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_warehouse' => 'Id Warehouse',
            'cd_whse' => 'Cd Whse',
            'nm_whse' => 'Nm Whse',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
            'update_by' => 'Update By',
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

        $criteria->compare('id_warehouse', $this->id_warehouse);
        $criteria->compare('cd_whse', $this->cd_whse, true);
        $criteria->compare('nm_whse', $this->nm_whse, true);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('create_by', $this->create_by);
        $criteria->compare('update_by', $this->update_by);
        $criteria->compare('update_date', $this->update_date, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
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