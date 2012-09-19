<?php
$this->breadcrumbs=array(
	'Uoms'=>array('index'),
	$model->id_uoms,
);

$this->menu=array(
	array('label'=>'List Uoms', 'url'=>array('index')),
	array('label'=>'Create Uoms', 'url'=>array('create')),
	array('label'=>'Update Uoms', 'url'=>array('update', 'id'=>$model->id_uoms)),
	array('label'=>'Delete Uoms', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_uoms),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Uoms', 'url'=>array('admin')),
);
?>

<h1>View Uoms #<?php echo $model->id_uoms; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_uoms',
		'cd_uom',
		'update_by',
		'nm_uom',
		'update_date',
		'create_date',
		'create_by',
	),
)); ?>
