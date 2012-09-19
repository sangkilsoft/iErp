<?php

/**
 * This is the model class for table "customer_class".
 *
 * The followings are the available columns in table 'customer_class':
 * @property integer $id_cclass
 * @property string $cd_cclass
 * @property string $nm_cclass
 * @property integer $create_by
 * @property string $create_date
 * @property string $update_date
 * @property integer $update_by
 */
class CustomerClass extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return CustomerClass the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'customer_class';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cd_cclass, nm_cclass', 'required'),
            array('create_by, update_by', 'numerical', 'integerOnly' => true),
            array('cd_cclass', 'length', 'max' => 4),
            array('nm_cclass', 'length', 'max' => 32),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_cclass, cd_cclass, nm_cclass, create_by, create_date, update_date, update_by', 'safe', 'on' => 'search'),
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
            'id_cclass' => 'Id Cclass',
            'cd_cclass' => 'Cd Cclass',
            'nm_cclass' => 'Nm Cclass',
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

        $criteria->compare('id_cclass', $this->id_cclass);
        $criteria->compare('cd_cclass', $this->cd_cclass, true);
        $criteria->compare('nm_cclass', $this->nm_cclass, true);
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