<?php

/**
 * This is the model class for table "gissue_line".
 *
 * The followings are the available columns in table 'gissue_line':
 * @property integer $id_line
 * @property integer $id_issue
 * @property integer $item_line
 * @property double $qty_trans
 * @property double $value_trans
 * @property integer $id_product
 * @property string $create_date
 * @property integer $update_by
 * @property string $update_date
 * @property integer $create_by
 *
 * The followings are the available model relations:
 * @property GissueHdr $idIssue
 * @property Product $idProduct
 */
class GissueLine extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return GissueLine the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'gissue_line';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_issue, item_line, qty_trans, value_trans, id_product', 'required'),
            array('id_issue, item_line, id_product, update_by, create_by', 'numerical', 'integerOnly' => true),
            array('qty_trans, value_trans', 'numerical'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_line, id_issue, item_line, qty_trans, value_trans, id_product, create_date, update_by, update_date, create_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idIssue' => array(self::BELONGS_TO, 'GissueHdr', 'id_issue'),
            'idProduct' => array(self::BELONGS_TO, 'Product', 'id_product'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_line' => 'Id Line',
            'id_issue' => 'Id Issue',
            'item_line' => 'Item Line',
            'qty_trans' => 'Qty Trans',
            'value_trans' => 'Value Trans',
            'id_product' => 'Id Product',
            'create_date' => 'Create Date',
            'update_by' => 'Update By',
            'update_date' => 'Update Date',
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

        $criteria->compare('id_line', $this->id_line);
        $criteria->compare('id_issue', $this->id_issue);
        $criteria->compare('item_line', $this->item_line);
        $criteria->compare('qty_trans', $this->qty_trans);
        $criteria->compare('value_trans', $this->value_trans);
        $criteria->compare('id_product', $this->id_product);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('update_by', $this->update_by);
        $criteria->compare('update_date', $this->update_date, true);
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