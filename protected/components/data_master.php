<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of data_master
 *
 * @author mujib
 */
class data_master extends CComponent {

    public function org_list() {
        $org = Organization::model()->findAll();
        return CHtml::listData($org, 'id_orgn', 'nm_orgn');
    }

    public function branch_list() {
        $branc = Branch::model()->findAll();
        return CHtml::listData($branc, 'id_branch', 'nm_branch');
    }

    public function warehouse_list() {
        $whase = Warehouse::model()->findAll();
        return CHtml::listData($whase, 'id_warehouse', 'nm_whse');
    }

    public function deliveryStatus_list() {
        $status_list = array(
            array('id_status' => 0, 'desc' => 'Draft'),
            array('id_status' => 1, 'desc' => 'Release'));
        return CHtml::listData($status_list, 'id_status', 'desc');
    }

    public function supplier_list() {
        $supply = Suppliers::model()->findAll();
        return CHtml::listData($supply, 'id_supplier', 'nm_supplier');
    }

}

?>
