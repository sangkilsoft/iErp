<?php
$this->breadcrumbs=array(
	'Districs'=>array('index'),
	$model->id_distric,
);

$this->menu=array(
	array('label'=>'List Districs', 'url'=>array('index')),
	array('label'=>'Create Districs', 'url'=>array('create')),
	array('label'=>'Update Districs', 'url'=>array('update', 'id'=>$model->id_distric)),
	array('label'=>'Delete Districs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_distric),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Districs', 'url'=>array('admin')),
);
?>

<h1>View Districs #<?php echo $model->id_distric; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_distric',
		'cd_distric',
		'nm_distric',
		'description',
		'create_by',
		'create_date',
		'update_date',
		'update_by',
	),
)); ?>
