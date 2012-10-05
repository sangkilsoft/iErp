<?php

/**
 * This is the model class for table "branch".
 *
 * The followings are the available columns in table 'branch':
 * @property integer $id_branch
 * @property string $cd_branch
 * @property string $nm_branch
 * @property integer $id_orgn
 * @property string $create_date
 * @property string $update_date
 * @property integer $update_by
 * @property integer $create_by
 */
class Branch extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Branch the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'branch';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cd_branch, nm_branch, id_orgn', 'required'),
            array('id_orgn, update_by, create_by', 'numerical', 'integerOnly' => true),
            array('cd_branch', 'length', 'max' => 4),
            array('nm_branch', 'length', 'max' => 32),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_branch, cd_branch, nm_branch, id_orgn, create_date, update_date, update_by, create_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'orgn'=>array(self::BELONGS_TO, 'Organization', 'id_orgn'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_branch' => 'Id Branch',
            'cd_branch' => 'Cd Branch',
            'nm_branch' => 'Nm Branch',
            'id_orgn' => 'Id Orgn',
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
            'update_by' => 'Update By',
            'create_by' => 'Create By',
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

        $criteria->compare('id_branch', $this->id_branch);
        $criteria->compare('cd_branch', $this->cd_branch, true);
        $criteria->compare('nm_branch', $this->nm_branch, true);
        $criteria->compare('id_orgn', $this->id_orgn);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('update_by', $this->update_by);
        $criteria->compare('create_by', $this->create_by);

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