<?php

/**
 * This is the model class for table "greceipt_line".
 *
 * The followings are the available columns in table 'greceipt_line':
 * @property integer $id_line
 * @property integer $id_receipt
 * @property integer $id_product
 * @property double $qty_trans
 * @property integer $id_uoms
 * @property double $value_disc
 * @property double $percent_disc
 * @property double $percent_tax
 * @property double $value_tax
 * @property double $value_trans
 * @property string $create_date
 * @property integer $create_by
 * @property string $update_date
 * @property integer $update_by
 */
class GreceiptLine extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return GreceiptLine the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'greceipt_line';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_receipt, id_product, qty_trans, id_uoms, percent_tax, value_tax, value_trans', 'required'),
            array('id_receipt, id_product, id_uoms, create_by, update_by', 'numerical', 'integerOnly' => true),
            array('qty_trans, value_disc, percent_disc, percent_tax, value_tax, value_trans', 'numerical'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_line, id_receipt, id_product, qty_trans, id_uoms, value_disc, percent_disc, percent_tax, value_tax, value_trans, create_date, create_by, update_date, update_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'batch' => array(self::HAS_ONE, 'Batch', 'id_line'),
            'idReceipt' => array(self::BELONGS_TO, 'GreceiptHdr', 'id_receipt'),
            'product' => array(self::BELONGS_TO, 'Product', 'id_product'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_line' => 'Id Line',
            'id_receipt' => 'Id Receipt',
            'id_product' => 'Id Product',
            'qty_trans' => 'Qty Trans',
            'id_uoms' => 'Id Uoms',
            'value_disc' => 'Value Disc',
            'percent_disc' => 'Percent Disc',
            'percent_tax' => 'Percent Tax',
            'value_tax' => 'Value Tax',
            'value_trans' => 'Value Trans',
            'create_date' => 'Create Date',
            'create_by' => 'Create By',
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

        $criteria->compare('id_line', $this->id_line);
        $criteria->compare('id_receipt', $this->id_receipt);
        $criteria->compare('id_product', $this->id_product);
        $criteria->compare('qty_trans', $this->qty_trans);
        $criteria->compare('id_uoms', $this->id_uoms);
        $criteria->compare('value_disc', $this->value_disc);
        $criteria->compare('percent_disc', $this->percent_disc);
        $criteria->compare('percent_tax', $this->percent_tax);
        $criteria->compare('value_tax', $this->value_tax);
        $criteria->compare('value_trans', $this->value_trans);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('create_by', $this->create_by);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('update_by', $this->update_by);

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

    public function afterSave() {
        $conn = Yii::app()->db;
        $lctor = $this->idReceipt->id_locator;
        $prodct = $this->id_product;
        $branc = $this->idReceipt->id_branch;
        $orgn = $this->idReceipt->id_orgn;

        $writestock = $this->stockMvt($conn, $lctor, $prodct, $branc, $orgn);
        if ($writestock)
            $this->cogsUpdate($conn, $lctor, $prodct, $branc, $orgn);

        return parent::afterSave();
    }

    protected function stockMvt($conn, $lctor, $prodct, $branc, $orgn) {
        try {
            $stock_exist = MvHistory::model()->exists('id_branch=:id_branch AND id_orgn=:id_orgn AND id_product=:id_product AND id_locator=:id_locator', array(':id_product' => $prodct, ':id_locator' => $lctor, ':id_branch' => $branc, ':id_orgn' => $orgn));
            if (!$stock_exist) {
                $nstock = new MvHistory;
                $nstock->qty_mvnt = $this->qty_trans;
                $nstock->qty_current = $this->qty_trans;
                $nstock->ref_number = $this->idReceipt->gr_num;
                $nstock->id_locator = $lctor;
                $nstock->id_product = $prodct;
                $nstock->id_branch = $branc;
                $nstock->id_orgn = $orgn;
                $nstock->val_current = -1;
                $nstock->val_mvnt = -1;
                $nstock->trans_source = '';
                $nstock->trans_type = 'Good Receipt';
                if (!$nstock->save())
                    return false;
            } else {
                $sql = "SELECT qty_current FROM mv_history 
                    WHERE id_product = $prodct AND id_locator = $lctor AND
                        id_branch = $branc AND id_orgn = $orgn 
                            AND id_movement = (SELECT MAX(id_movement) FROM mv_history 
                            WHERE id_product = $prodct AND id_locator = $lctor AND 
                                id_branch = $branc AND id_orgn = $orgn )";
                $cmd = $conn->createCommand($sql);
                $stock_now = $cmd->queryScalar();

                $nstock = new MvHistory;
                $nstock->qty_mvnt = $this->qty_trans;
                $nstock->qty_current = $stock_now + $this->qty_trans;
                $nstock->ref_number = $this->idReceipt->gr_num;
                $nstock->id_locator = $lctor;
                $nstock->id_product = $prodct;
                $nstock->id_branch = $branc;
                $nstock->id_orgn = $orgn;
                $nstock->val_current = -1;
                $nstock->val_mvnt = -1;
                $nstock->trans_source = '';
                $nstock->trans_type = 'Good Receipt';
                if (!$nstock->save())
                    return false;
            }
            return true;
        } catch (Exception $exc) {
            return false;
        }
    }

    protected function cogsUpdate($conn, $lctor, $prodct, $branc, $orgn) {
        try {
            $cogs_exist = Cogs::model()->exists('id_branch=:id_branch AND id_orgn=:id_orgn AND id_product=:id_product', array(':id_product' => $prodct, ':id_branch' => $branc, ':id_orgn' => $orgn));
            if (!$cogs_exist) {
                $cogs = new Cogs;
                $cogs->id_product = $prodct;
                $cogs->id_orgn = $orgn;
                $cogs->id_branch = $branc;
                $cogs->cogs = $this->value_trans - $this->value_disc;
                if (!$cogs->save())
                    return false;
            }else {
                $sql = "SELECT qty_current FROM mv_history 
                    WHERE id_product = $prodct AND id_locator = $lctor AND
                        id_branch = $branc AND id_orgn = $orgn 
                            AND id_movement = (SELECT MAX(id_movement) FROM mv_history 
                            WHERE id_product = $prodct AND id_locator = $lctor AND 
                                id_branch = $branc AND id_orgn = $orgn )";
                $cmd = $conn->createCommand($sql);
                $oqty = $cmd->queryScalar();

                $sql = "SELECT cogs  FROM cogs 
                        WHERE id_product=$prodct AND id_orgn=$orgn AND id_branch=$branc ";
                $cmd = $conn->createCommand($sql);
                $ocogs = $cmd->queryScalar();

                $cogs = Cogs::model()->find('id_branch=:id_branch AND id_orgn=:id_orgn AND id_product=:id_product', array(':id_product' => $prodct, ':id_branch' => $branc, ':id_orgn' => $orgn));
                $cogs->id_product = $prodct;
                $cogs->id_orgn = $orgn;
                $cogs->id_branch = $branc;

                $npro = (($this->value_trans - $this->value_disc) * $this->qty_trans);
                $opro = $ocogs * $oqty;
                $cogs->cogs = ($npro + $opro) / ($oqty + $this->qty_trans);
                if (!$cogs->save())
                    return false;
            }
            return true;
        } catch (Exception $exc) {
            return false;
        }
    }

}