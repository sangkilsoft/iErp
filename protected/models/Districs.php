<?php

/**
 * This is the model class for table "districs".
 *
 * The followings are the available columns in table 'districs':
 * @property integer $id_distric
 * @property string $cd_distric
 * @property string $nm_distric
 * @property string $description
 * @property integer $create_by
 * @property string $create_date
 * @property string $update_date
 * @property integer $update_by
 */
class Districs extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Districs the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'districs';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cd_distric, nm_distric, description', 'required'),
            array('create_by, update_by', 'numerical', 'integerOnly' => true),
            array('cd_distric', 'length', 'max' => 4),
            array('nm_distric', 'length', 'max' => 32),
            array('description', 'length', 'max' => 64),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_distric, cd_distric, nm_distric, description, create_by, create_date, update_date, update_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_distric' => 'Id Distric',
            'cd_distric' => 'Cd Distric',
            'nm_distric' => 'Nm Distric',
            'description' => 'Description',
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
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_distric', $this->id_distric);
        $criteria->compare('cd_distric', $this->cd_distric, true);
        $criteria->compare('nm_distric', $this->nm_distric, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('create_by', $this->create_by);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('update_by', $this->update_by);

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