<?php

/**
 * This is the model class for table "tbl_role_menu".
 *
 * The followings are the available columns in table 'tbl_role_menu':
 * @property integer $id_rolemn
 * @property integer $role_id
 * @property integer $menu_id
 *
 * The followings are the available model relations:
 * @property Menu $menu
 * @property Role $role
 */
class RoleMenu extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return RoleMenu the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_role_menu';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('role_id, menu_id', 'required'),
            array('role_id, menu_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_rolemn, role_id, menu_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
            'role' => array(self::BELONGS_TO, 'Role', 'role_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_rolemn' => 'Id Rolemn',
            'role_id' => 'Role',
            'menu_id' => 'Menu',
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

        $criteria->compare('id_rolemn', $this->id_rolemn);
        $criteria->compare('role_id', $this->role_id);
        $criteria->compare('menu_id', $this->menu_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'pagination' => array(
                        'pageSize' => 50,
                    ),
                ));
    }

}