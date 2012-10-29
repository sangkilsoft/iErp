<?php

/**
 * This is the model class for table "mapping_coa".
 *
 * The followings are the available columns in table 'mapping_coa':
 * @property integer $id_mappingcoa
 * @property string $trans_type
 * @property string $mappingname
 * @property integer $id_acc
 * @property string $dk
 * @property string $create_date
 * @property string $create_by
 * @property string $update_by
 * @property string $update_date
 */
class MappingCoa extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return MappingCoa the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'mapping_coa';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('trans_type, mappingname, id_acc', 'required'),
            array('id_acc', 'numerical', 'integerOnly' => true),
            array('trans_type, mappingname', 'length', 'max' => 20),
            array('dk', 'length', 'max' => 2),
            array('create_by, update_by', 'length', 'max' => 10),
            array('create_date, update_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_mappingcoa, trans_type, mappingname, id_acc, dk, create_date, create_by, update_by, update_date', 'safe', 'on' => 'search'),
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
            'id_mappingcoa' => 'Id Mappingcoa',
            'trans_type' => 'Trans Type',
            'mappingname' => 'Mappingname',
            'id_acc' => 'Id Acc',
            'dk' => 'Dk',
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

        $criteria->compare('id_mappingcoa', $this->id_mappingcoa);
        $criteria->compare('trans_type', $this->trans_type, true);
        $criteria->compare('mappingname', $this->mappingname, true);
        $criteria->compare('id_acc', $this->id_acc);
        $criteria->compare('dk', $this->dk, true);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('create_by', $this->create_by, true);
        $criteria->compare('update_by', $this->update_by, true);
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