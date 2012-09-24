<?php
$this->breadcrumbs = array(
    'Good Receipts' => array('index'),
    $model->id_receipt => array('view', 'id' => $model->id_receipt),
    'Update',
);

$this->menu = array(
    array('label' => 'List GoodReceipt', 'url' => array('index')),
    array('label' => 'Create GoodReceipt', 'url' => array('create')),
    array('label' => 'View GoodReceipt', 'url' => array('view', 'id' => $model->id_receipt)),
    array('label' => 'Manage GoodReceipt', 'url' => array('admin')),
);
?>

<h1>Update GoodReceipt <?php echo $model->id_receipt; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'modeldtl' => $modeldtl)); ?>