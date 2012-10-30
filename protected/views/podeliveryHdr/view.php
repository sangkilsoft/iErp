<?php
/* @var $this PodeliveryHdrController */
/* @var $model PodeliveryHdr */

$this->breadcrumbs = array(
    'Podelivery Hdrs' => array('index'),
    $model->id_delivery,
);

$this->menu = array(
    array('label' => 'List PodeliveryHdr', 'url' => array('index')),
    array('label' => 'Create PodeliveryHdr', 'url' => array('create')),
    array('label' => 'Update PodeliveryHdr', 'url' => array('update', 'id' => $model->id_delivery)),
    array('label' => 'Delete PodeliveryHdr', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_delivery), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage PodeliveryHdr', 'url' => array('admin')),
);
?>

<h1>View PodeliveryHdr #<?php echo $model->id_delivery; ?></h1>
<?php echo $this->renderPartial('_form', array('model' => $model, 'modeldtl' => $modeldtl, 'modelrcp' => $modelRcp, 'modelbatch' => $modelBatch, 'modelinv' => $modelinv, 'modified' => $modified)); ?>
<?php
//$this->widget('MCDetailView', array(
//    'data' => $model,
//    'attributes' => array(
//        'id_delivery',
//        'do_num',
//        'id_orgn',
//        'id_branch',
//        'id_supplier',
//        'description',
//        'po_num',
//        'gr_num',
//        'status',
//        'create_by',
//        'create_date',
//        'update_date',
//        'update_by',
//    ),
//));
?>
