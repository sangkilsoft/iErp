<?php
$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	$model->id_supplier,
);

$this->menu=array(
	array('label'=>'List Suppliers', 'url'=>array('index')),
	array('label'=>'Create Suppliers', 'url'=>array('create')),
	array('label'=>'Update Suppliers', 'url'=>array('update', 'id'=>$model->id_supplier)),
	array('label'=>'Delete Suppliers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_supplier),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Suppliers', 'url'=>array('admin')),
);
?>

<h1>View Suppliers #<?php echo $model->id_supplier; ?></h1>

<?php $this->widget('MCDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_supplier',
		'cd_supplier',
		'nm_supplier',
		'create_date',
		'create_by',
		'update_date',
		'update_by',
	),
)); ?>
