<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inventory
 *
 * @author mujib
 */
class inventory extends CComponent {

    //put your code here
    public function setReceipt($hdr = array(), $dtl = array()) {
        $mdl = new GoodReceipt;
        $mdl->attributes = $hdr;
        if ($mdl->save())
            return array('type'=>'S','message'=>'Successfully inserted','val'=>$mdl);
        else
            return array('type'=>'E','message'=>'Error on Insert','val'=>$mdl->getErrors());
    }

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
