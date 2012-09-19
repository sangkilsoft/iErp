<?php
$this->breadcrumbs=array(
	'Customer Classes'=>array('index'),
	$model->id_cclass,
);

$this->menu=array(
	array('label'=>'List CustomerClass', 'url'=>array('index')),
	array('label'=>'Create CustomerClass', 'url'=>array('create')),
	array('label'=>'Update CustomerClass', 'url'=>array('update', 'id'=>$model->id_cclass)),
	array('label'=>'Delete CustomerClass', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cclass),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CustomerClass', 'url'=>array('admin')),
);
?>

<h1>View CustomerClass #<?php echo $model->id_cclass; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_cclass',
		'cd_cclass',
		'nm_cclass',
		'create_by',
		'create_date',
		'update_date',
		'update_by',
	),
)); ?>
