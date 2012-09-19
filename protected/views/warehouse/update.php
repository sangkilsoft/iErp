<?php
$this->breadcrumbs=array(
	'Warehouses'=>array('index'),
	$model->id_warehouse=>array('view','id'=>$model->id_warehouse),
	'Update',
);

$this->menu=array(
	array('label'=>'List Warehouse', 'url'=>array('index')),
	array('label'=>'Create Warehouse', 'url'=>array('create')),
	array('label'=>'View Warehouse', 'url'=>array('view', 'id'=>$model->id_warehouse)),
	array('label'=>'Manage Warehouse', 'url'=>array('admin')),
);
?>

<h1>Update Warehouse <?php echo $model->id_warehouse; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>