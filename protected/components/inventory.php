<?php

/**
 * Description of inventory
 *
 * @author mujib
 */
class inventory extends CComponent {

    public function newReceipt($hdr = array(), $dtl = array()) {
        $mdl = new GreceiptHdr;
        $mdl->attributes = $hdr;
        if ($mdl->save()) {
            $i = 0;
            foreach ($dtl['id_product'] as $value) {
                $mdldtl = new GreceiptLine;
                $mdldtl->id_receipt = $mdl->id_receipt;
                $mdldtl->id_product = $dtl['id_product'][$i];
                $mdldtl->id_uoms = $dtl['id_uoms'][$i];
                
                $mdldtl->qty_trans = $dtl['qty_trans'][$i];
                $mdldtl->value_trans = $dtl['value_trans'][$i];
                $mdldtl->percent_tax = $dtl['percent_tax'][$i];
                $mdldtl->value_tax = ($dtl['percent_tax'][$i] / 100) * $dtl['value_trans'][$i];

                $mdldtl->value_disc = $dtl['value_disc'][$i];
                $mdldtl->percent_disc = $dtl['value_disc'][$i] / $dtl['value_trans'][$i] * 100;

//                $mdldtl->create_by = 0; //Yii::app()->user->Id;
//                $mdldtl->create_date = new CDbExpression('NOW()');
//                $mdldtl->update_by = 0; //Yii::app()->user->Id;
//                $mdldtl->update_date = new CDbExpression('NOW()');

                if (!$mdldtl->save())
                    return array('type' => 'E', 'message' => 'Error on Insert', 'val' => $mdldtl->getErrors());
                $i++;
            }
            return array('type' => 'S', 'message' => 'Successfully create receipt, doc.number:' . $mdl->gr_num, 'val' => $mdl);
        }else
            return array('type' => 'E', 'message' => 'Error on Insert', 'val' => $mdl->getErrors());
    }

    /*
    public function updateReceipt($hdr = array(), $dtl = array()) {
        $mdl = new GoodReceipt;
        $mdl = $mdl->model()->findAllByPk($hdr['id_receipt']);
        $mdl->attributes = $hdr;
        if ($mdl->save()) {
            $i = 0;
            foreach ($dtl['id_product'] as $value) {
                $mdldtl = new GrLine;
                $mdldtl = $mdldtl->model()->findAllByPk($hdr['id_line']);
                $mdldtl->id_receipt = $mdl->id_receipt;
                $mdldtl->id_product = $dtl['id_product'][$i];
                $mdldtl->qty_trans = $dtl['qty_trans'][$i];
                $mdldtl->id_uoms = $dtl['id_uoms'][$i];
                $mdldtl->id_locator = $dtl['id_locator'][$i];
                $mdldtl->value_trans = $dtl['value_trans'][$i];
                if (!$mdldtl->save())
                    return array('type' => 'E', 'message' => 'Error on Insert', 'val' => $mdldtl->getErrors());
                $i++;
            }
            return array('type' => 'S', 'message' => 'Successfully create receipt, doc.number:' . $mdl->gr_num, 'val' => $mdl);
        }else
            return array('type' => 'E', 'message' => 'Error on Insert', 'val' => $mdl->getErrors());
    }
     * 
     */

    public function getReceipt($hdr = array(), $dtl = array()) {
        
    }

    public function setIssue($hdr = array(), $dtl = array()) {
        
    }

    public function getIssue($hdr = array(), $dtl = array()) {
        
    }

    public function getStock($whse = '', $loct = '', $product = array()) {
        
    }

}

?>
