<?php
$this->breadcrumbs=array(
	'Manufacturers'=>array('index'),
	$model->id_manfrs,
);

$this->menu=array(
	array('label'=>'List Manufacturer', 'url'=>array('index')),
	array('label'=>'Create Manufacturer', 'url'=>array('create')),
	array('label'=>'Update Manufacturer', 'url'=>array('update', 'id'=>$model->id_manfrs)),
	array('label'=>'Delete Manufacturer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_manfrs),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Manufacturer', 'url'=>array('admin')),
);
?>

<h1>View Manufacturer #<?php echo $model->id_manfrs; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_manfrs',
		'cd_manf',
		'nm_manufacturer',
		'create_by',
		'update_date',
		'update_by',
		'create_date',
	),
)); ?>
