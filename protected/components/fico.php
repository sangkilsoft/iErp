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
        $jumlahdikirim = count($dtl);
        if ($mdl->save()) {
            //$i = 0;
            if ($mdl->trans_type == 'PENJUALAN') {
                $jumrecord = MappingCoa::model()->count('trans_type=\'PENJUALAN\'');
                if ($jumrecord != $jumlahdikirim) {
                    return array('type' => 'E', 'message' => 'Input Not Match', 'val' => $mdl->getErrors());
                }
                for ($i = 0; $i < $jumrecord; $i++) {
                    $mdldtl = new GlDetail;
                    $mdldtl->id_glheader = $mdl->id_glheader;
                    $hasil = MappingCoa::model()->find('trans_type=:tp and mappingname=:mn', Array('tp' => 'PENJUALAN', 'mn' => $dtl[$i][0]));
                    if (count($hasil) < 1) {
                        return array('type' => 'E', 'message' => 'Data Not Found [Mapping] ', 'val' => $mdl->getErrors());
                    }
                    $mdldtl->id_acc = $hasil->id_acc;
                    if ($hasil->dk == 'D') {
                        $mdldtl->debet = $dtl[$i][1];
                        $mdldtl->kredit = 0;
                    } else {
                        $mdldtl->debet = 0;
                        $mdldtl->kredit = $dtl[$i][1];
                    }
                    if (!$mdldtl->save())
                        return array('type' => 'E', 'message' => 'Error on Insert', 'val' => $mdldtl->getErrors());
                    //$i++;
                }
            }else if ($mdl->trans_type == 'PEMBELIAN') {
                $jumrecord = MappingCoa::model()->count('trans_type=\'PEMBELIAN\'');
                if ($jumrecord != $jumlahdikirim) {
                    return array('type' => 'E', 'message' => 'Input Not Match', 'val' => $mdl->getErrors());
                }
                for ($i = 0; $i < $jumrecord; $i++) {
                    $mdldtl = new GlDetail;
                    $mdldtl->id_glheader = $mdl->id_glheader;
                    $hasil = MappingCoa::model()->find('trans_type=:tp and mappingname=:mn', Array('tp' => 'PEMBELIAN', 'mn' => $dtl[$i][0]));
                    if (count($hasil) < 1) {
                        return array('type' => 'E', 'message' => 'Data Not Found [Mapping] ', 'val' => $mdl->getErrors());
                    }
                    $mdldtl->id_acc = $hasil->id_acc;
                    if ($hasil->dk == 'D') {
                        $mdldtl->debet = $dtl[$i][1];
                        $mdldtl->kredit = 0;
                    } else {
                        $mdldtl->debet = 0;
                        $mdldtl->kredit = $dtl[$i][1];
                    }
                    if (!$mdldtl->save())
                        return array('type' => 'E', 'message' => 'Error on Insert', 'val' => $mdldtl->getErrors());
                    //$i++;
                }
            }

            return array('type' => 'S', 'message' => 'Successfully create receipt, doc.number:' . $mdl->id_glheader, 'val' => $mdl);
        }else
            return array('type' => 'E', 'message' => 'Error on Insert', 'val' => $mdl->getErrors());
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
                WHERE coa.level=4
                ORDER BY 2
                ";
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $results = $command->queryAll();
        return CHtml::listData($results, 'id_acc', 'nm_acc', 'parent');
    }

    public function acc_parent_list() {
        $sql = "SELECT 
                  acc.id_acc as parent, 
                  concat(acc.cd_acc,'-',acc.nm_acc) as nm_acc,
                  cd_acc
                FROM 
                  public.account acc
                 order by 3;
                ";
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $results = $command->queryAll();
        return CHtml::listData($results, 'parent', 'nm_acc');
    }

//    public function acc_subparent() {
//        $sql = "SELECT 
//                  acc.id_acc as id_parent, 
//                  concat(acc.cd_acc,'-',acc.nm_acc) as nm_acc
//                FROM 
//                  public.account acc
//                where level=2
//                 order by 3;
//                ";
//        $connection = Yii::app()->db;
//        $command = $connection->createCommand($sql);
//        $results = $command->queryAll();
//        return CHtml::listData($results, 'id_parent','nm_acc');
//    }

    public function tutupBuku($param=array()) {
        $sql = "Select
  account.id_acc As id_acc,
  account.cd_acc As cd_acc,
  account.nm_acc As nm_acc,
  Coalesce((Select
    gl_periode.saldo As gl_periode_saldo
  From
    gl_periode gl_periode
  Where
    gl_periode.bulan = " . (($param['bulan'] - 1) == 0 ? 12 : ($param['bulan'] - 1)) . " And
    gl_periode.tahun = " . (($param['bulan'] - 1) == 0 ? ($param['tahun']) - 1 : ($param['tahun'])) . " And
    gl_periode.id_acc = account.id_acc And
    gl_periode.id_branch = " . $param['id_branch'] . " And
    gl_periode.id_orgn = " . $param['id_orgn'] . "), 0) As saldo,
  Coalesce((Select
    Sum(gl_detail.debet) As debet
  From
    gl_header gl_header Inner Join
    gl_detail gl_detail On gl_header.id_glheader = gl_detail.id_glheader
  Where
    account.id_acc = gl_detail.id_acc And
    Extract(Month From gl_header.tgl_trans) = " . $param['bulan'] . " And
    Extract(Year From gl_header.tgl_trans) = " . $param['tahun'] . " And
    gl_header.id_branch = " . $param['id_branch'] . " And
    gl_header.id_orgn = " . $param['id_orgn'] . "), 0) As debet,
  Coalesce((Select
    Sum(gl_detail.kredit) As kredit
  From
    gl_header gl_header Inner Join
    gl_detail gl_detail On gl_header.id_glheader = gl_detail.id_glheader
  Where
    account.id_acc = gl_detail.id_acc And
    Extract(Month From gl_header.tgl_trans) = " . $param['bulan'] . " And
    Extract(Year From gl_header.tgl_trans) = " . $param['tahun'] . " And
    gl_header.id_branch = " . $param['id_branch'] . " And
    gl_header.id_orgn = " . $param['id_orgn'] . "),0 ) As kredit,
    Substr(account.cd_acc, 1, 1) as grup
From
  account account
Where
  account.level = 3 And
  Substr(account.cd_acc, 1, 1) In ('1', '2', '3')
Order By
  account.cd_acc";
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $results = $command->queryAll();
        $count = count($results);
        $saldo = 0;
        foreach ($results as $value) {
            $mdldtl = new GlPeriode;
            $mdldtl->bulan = $param['bulan'];
            $mdldtl->tahun = $param['tahun'];
            $mdldtl->id_branch = $param['id_branch'];
            $mdldtl->id_orgn = $param['id_orgn'];
            $mdldtl->id_acc = $value['id_acc'];
            if ($value['grup'] == 1) {
                $saldo = $value['saldo'] + $value['debet'] - $value['kredit'];
            } elseif ($value['grup'] == 2) {
                $saldo = $value['saldo'] - $value['debet'] + $value['kredit'];
            } elseif ($value['grup'] == 3) {
                $saldo = $value['saldo'] - $value['debet'] + $value['kredit'];
            }
            $mdldtl->saldo = $saldo;
            if (!$mdldtl->save())
                return array('type' => 'E', 'message' => 'Error on Insert', 'val' => $mdldtl->getErrors());
        }
        return array('type' => 'S', 'message' => 'Successfully create receipt, doc.number:', 'val' => $mdldtl);
    }

    public function split($delimiter='', $data='') {
        $temp = '';
        $c=0;
        for ($i = 0; $i < strlen($data) ; $i++) {
            if (substr($data, $i, 1)!=$delimiter) {
                $temp .= substr($data, $i, 1);
            }else{
                $t[$c]=$temp;
                $c++;
                $temp='';
            }
            if($i==(strlen($data)-1)){
                $t[$c]=$temp;
            }
        }
        return $t;
    }
}
?>
