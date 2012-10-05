<?php
$this->breadcrumbs=array(
	'Warehouses'=>array('index'),
	$model->id_warehouse,
);

$this->menu=array(
	array('label'=>'List Warehouse', 'url'=>array('index')),
	array('label'=>'Create Warehouse', 'url'=>array('create')),
	array('label'=>'Update Warehouse', 'url'=>array('update', 'id'=>$model->id_warehouse)),
	array('label'=>'Delete Warehouse', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_warehouse),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Warehouse', 'url'=>array('admin')),
);
?>

<h1>View Warehouse #<?php echo $model->id_warehouse; ?></h1>

<?php $this->widget('MCDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_warehouse',
		'cd_whse',
		'nm_whse',
		'create_date',
		'create_by',
		'update_by',
		'update_date',
	),
)); ?>
