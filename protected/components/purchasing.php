<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of purchasing
 *
 * @author mujib
 */
class purchasing extends CComponent {

    public function newPODelivery($hdr = array(), $dtl = array(), $rcpheader = array()) {
        $deliveryhdr = new PodeliveryHdr;
        $deliveryhdr->attributes = $hdr;
        if ($deliveryhdr->save()) {
            $i = 0;
            foreach ($dtl['id_product'] as $value) {
                $deliverydtl = new PodeliveryLine;
                //$deliverydtl->id_line = ($i + 1) * 10;
                $deliverydtl->id_delivery = $deliveryhdr->id_delivery;
                $deliverydtl->id_product = $dtl['id_product'][$i];
                $deliverydtl->id_uoms = $dtl['id_uoms'][$i];
                $deliverydtl->qty_trans = $dtl['qty_trans'][$i];
                $deliverydtl->value_trans = $dtl['value_trans'][$i];
                $deliverydtl->percent_tax = $dtl['percent_tax'][$i];
                $deliverydtl->value_tax = ($dtl['percent_tax'][$i] / 100) * ($dtl['value_trans'][$i] * $dtl['qty_trans'][$i]);

                $deliverydtl->value_disc = $dtl['value_disc'][$i];
                $deliverydtl->percent_disc = $dtl['value_disc'][$i] / $dtl['value_trans'][$i] * 100;

                $deliverydtl->create_by = 0; //Yii::app()->user->Id;
                $deliverydtl->create_date = new CDbExpression('NOW()');
                $deliverydtl->update_by = 0; //Yii::app()->user->Id;
                $deliverydtl->update_date = new CDbExpression('NOW()');

                if (!$deliverydtl->save())
                    return array('type' => 'E', 'message' => 'Error on Insert detail delivery', 'val' => $deliverydtl->getErrors());

                $i++;
            }

            if (count($rcpheader) > 0) {
                $rcpheader['gr_num'] = $deliveryhdr->do_num;
                $rcpheader['ref_number'] = $deliveryhdr->do_num;

                $inv = new inventory;
                $retvalgr = $inv->newReceipt($rcpheader, $dtl);
                if ($retvalgr['type'] == 'S') {
                    $deliveryhdr->gr_num = $retvalgr['val']->gr_num;
                    $deliveryhdr->save();
                } else
                    return array('type' => 'E', 'message' => 'Error on create receipt', 'val' => $retvalgr->getErrors());
            }

            return array('type' => 'S', 'message' => 'Successfully create po delivery, doc.number:' . $deliveryhdr->do_num, 'val' => $deliveryhdr);
        } else
            return array('type' => 'E', 'message' => 'Error on Insert header delivery', 'val' => $deliveryhdr->getErrors());
    }

}

?>
