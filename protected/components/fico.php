<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fico
 *
 * @author mujib
 */
class fico extends CComponent {

    //put your code here
    public function setGL($hdr = array(), $dtl = array()) {
        $mdl = new GlHeader;
        $mdl->attributes = $hdr;
        if ($mdl->save()) {
            $i = 0;
            if ($this->checkBalance($dtl)) {
                foreach ($dtl['id_acc'] as $value) {
                    $mdldtl = new GlDetail;
                    $mdldtl->id_glheader = $mdl->id_glheader;
                    $mdldtl->id_acc = $dtl['id_acc'][$i];
                    $mdldtl->nm_acc = $dtl['nm_acc'][$i];
                    $mdldtl->debet = $dtl['debet'][$i];
                    $mdldtl->kredit = $dtl['kredit'][$i];
                    if (!$mdldtl->save())
                        return array('type' => 'E', 'message' => 'Error on Insert', 'val' => $mdldtl->getErrors());
                    $i++;
                }
            } else {
                return array('type' => 'E', 'message' => 'Not Balance', 'val' => $mdl->getErrors());
            }
            return array('type' => 'S', 'message' => 'Successfully create receipt, doc.number:' . $mdl->id_glheader, 'val' => $mdl);
        }else
            return array('type' => 'E', 'message' => 'Error on Insert', 'val' => $mdl->getErrors());
    }

    public function createGL($hdr = array(), $dtl = array()) {
        $mdl = new GlHeader;
        $mdl->attributes = $hdr;
        $jumlahdikirim=count($dtl);
        if ($mdl->save()) {
            //$i = 0;
                if ($mdl->trans_type == 'PENJUALAN') {
                    $jumrecord=MappingCoa::model()->count('trans_type=\'PENJUALAN\'');
                    if($jumrecord!=$jumlahdikirim){
                        return array('type' => 'E', 'message' => 'Input Not Match', 'val' => $mdl->getErrors());
                    }                    
                    for ($i=0;$i<$jumrecord;$i++) {
                        $mdldtl = new GlDetail;
                        $mdldtl->id_glheader = $mdl->id_glheader;
                        $hasil=  MappingCoa::model()->find('trans_type=:tp and mappingname=:mn',Array('tp'=>'PENJUALAN','mn'=>$dtl[$i][0]));
                        if(count($hasil)<1){                            
                            return array('type' => 'E', 'message' => 'Data Not Found [Mapping] ', 'val' => $mdl->getErrors());
                        }
                        $mdldtl->id_acc = $hasil->id_acc; 
                        if($hasil->dk =='D'){
                            $mdldtl->debet = $dtl[$i][1];
                            $mdldtl->kredit = 0;
                        }else{
                            $mdldtl->debet = 0;
                            $mdldtl->kredit = $dtl[$i][1];
                        }                       
                        if (!$mdldtl->save())
                            return array('type' => 'E', 'message' => 'Error on Insert 3', 'val' => $mdldtl->getErrors());
                        //$i++;
                    }
                }else if($mdl->trans_type == 'PEMBELIAN'){
                    $jumrecord=MappingCoa::model()->count('trans_type=\'PEMBELIAN\'');
                    if($jumrecord!=$jumlahdikirim){
                        return array('type' => 'E', 'message' => 'Input Not Match', 'val' => $mdl->getErrors());
                    }                    
                    for ($i=0;$i<$jumrecord;$i++) {
                        $mdldtl = new GlDetail;
                        $mdldtl->id_glheader = $mdl->id_glheader;
                        $hasil=  MappingCoa::model()->find('trans_type=:tp and mappingname=:mn',Array('tp'=>'PEMBELIAN','mn'=>$dtl[$i][0]));
                        if(count($hasil)<1){                            
                            return array('type' => 'E', 'message' => 'Data Not Found [Mapping] ', 'val' => $mdl->getErrors());
                        }
                        $mdldtl->id_acc = $hasil->id_acc; 
                        if($hasil->dk =='D'){
                            $mdldtl->debet = $dtl[$i][1];
                            $mdldtl->kredit = 0;
                        }else{
                            $mdldtl->debet = 0;
                            $mdldtl->kredit = $dtl[$i][1];
                        }                       
                        if (!$mdldtl->save())
                            return array('type' => 'E', 'message' => 'Error on Insert 3', 'val' => $mdldtl->getErrors());
                        //$i++;
                    }
                }
                    
            return array('type' => 'S', 'message' => 'Successfully create receipt, doc.number:' . $mdl->id_glheader, 'val' => $mdl);
        }else
            return array('type' => 'E', 'message' => 'Error on Insert 4', 'val' => $mdl->getErrors());
    }

    public function updateGL($hdr = array(), $dtl = array()) {
        $mdl = new GlHeader;
        $mdl = $mdl->model()->findByPk($hdr['id_glheader']);
        $mdl->setAttribute('id_branch', $hdr['id_branch']);
        $mdl->setAttribute('id_orgn', $hdr['id_orgn']);
        $mdl->setAttribute('refnum', $hdr['refnum']);
        $mdl->setAttribute('tgl_trans', $hdr['tgl_trans']);
        $mdl->setAttribute('trans_type', $hdr['trans_type']);
        $mdl->setAttribute('description', $hdr['description']);
        //$mdl->attributes = $hdr;
        if ($mdl->save()) {
            $i = 0;
            if ($this->checkBalance($dtl)) {
                foreach ($dtl['id_acc'] as $value) {
                    $mdldtl = new GlDetail;
                    $mdldtl->id_glheader = $mdl->id_glheader;
                    $mdldtl->id_acc = $dtl['id_acc'][$i];
                    $mdldtl->nm_acc = $dtl['nm_acc'][$i];
                    $mdldtl->debet = $dtl['debet'][$i];
                    $mdldtl->kredit = $dtl['kredit'][$i];
                    if (!$mdldtl->save())
                        return array('type' => 'E', 'message' => 'Error on Insert', 'val' => $mdldtl->getErrors());
                    $i++;
                }
            } else {
                return array('type' => 'E', 'message' => 'Not Balance', 'val' => $mdl->getErrors());
            }
            return array('type' => 'S', 'message' => 'Successfully create receipt, doc.number:' . $mdl->id_glheader, 'val' => $mdl);
        }else
            return array('type' => 'E', 'message' => 'Error on Insert', 'val' => $mdl->getErrors());
    }

    public function checkBalance($dtl = array()) {
        $debet = 0.0;
        $kredit = 0.0;
        $hasil = FALSE;
        $i = 0;
        foreach ($dtl['id_acc'] as $value) {
            $debet+= floatval($dtl['debet'][$i]);
            $kredit+= floatval($dtl['kredit'][$i]);
            $i++;
        }
        if ($debet == $kredit) {
            $hasil = TRUE;
        } else {
            $hasil = FALSE;
        }
        return $hasil;
    }

    public function getGL($param) {
        
    }

    public function checkCreditLimit($cusnum = '') {
        
    }

    public function setPayIn($hdr = array(), $dtl = array()) {
        
    }

    public function getPayIn($param) {
        
    }

    public function setPayOut($hdr = array(), $dtl = array()) {
        
    }

    public function getPayOut($param) {
        
    }

    public function acc_list() {
        $sql = "SELECT 
                  coa.id_acc,
                  concat(coa.cd_acc,'-',coa.nm_acc,'-',coa.acc_normal) as nm_acc,
                  (select a.nm_acc from account a where a.id_acc=coa.parent) as parent,
                  coa.acc_normal
                FROM 
                  public.account coa
                WHERE coa.level=3
                ORDER BY 2
                ";
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $results = $command->queryAll();
        return CHtml::listData($results, 'id_acc', 'nm_acc', 'parent');
    }

}

?>
