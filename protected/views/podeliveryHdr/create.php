<?php
/* @var $this PodeliveryHdrController */
/* @var $model PodeliveryHdr */

$this->breadcrumbs = array(
    'Podelivery Hdrs' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List PodeliveryHdr', 'url' => array('index')),
    array('label' => 'Manage PodeliveryHdr', 'url' => array('admin')),
);
?>

<h1>Create PodeliveryHdr</h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'modeldtl' => $modeldtl, 'modelrcp' => $modelRcp, 'modelbatch' => $modelBatch, 'modelinv' => $modelinv, 'modified' => $modified)); ?>