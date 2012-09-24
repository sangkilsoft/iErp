<?php
$this->breadcrumbs = array(
    'Good Receipts' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List GoodReceipt', 'url' => array('index')),
    array('label' => 'Manage GoodReceipt', 'url' => array('admin')),
);
?>

<h1>Create GoodReceipt</h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'modeldtl' => $modeldtl)); ?>