<?php

/**
 * This is the model class for table "organization".
 *
 * The followings are the available columns in table 'organization':
 * @property integer $id_orgn
 * @property string $cd_orgn
 * @property integer $update_by
 * @property string $nm_orgn
 * @property string $create_date
 * @property integer $create_by
 * @property string $update_date
 */
class Organization extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Organization the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'organization';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cd_orgn, nm_orgn', 'required'),
            array('update_by, create_by', 'numerical', 'integerOnly' => true),
            array('cd_orgn', 'length', 'max' => 4),
            array('nm_orgn', 'length', 'max' => 32),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_orgn, cd_orgn, update_by, nm_orgn, create_date, create_by, update_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Branches' => array(self::HAS_MANY, 'Branch', 'id_orgn'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_orgn' => 'Id Orgn',
            'cd_orgn' => 'Cd Orgn',
            'update_by' => 'Update By',
            'nm_orgn' => 'Nm Orgn',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
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

        $criteria->compare('id_orgn', $this->id_orgn);
        $criteria->compare('cd_orgn', $this->cd_orgn, true);
        $criteria->compare('update_by', $this->update_by);
        $criteria->compare('nm_orgn', $this->nm_orgn, true);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('create_by', $this->create_by);
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