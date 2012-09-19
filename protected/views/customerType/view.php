<?php
$this->breadcrumbs=array(
	'Customer Types'=>array('index'),
	$model->id_ctype,
);

$this->menu=array(
	array('label'=>'List CustomerType', 'url'=>array('index')),
	array('label'=>'Create CustomerType', 'url'=>array('create')),
	array('label'=>'Update CustomerType', 'url'=>array('update', 'id'=>$model->id_ctype)),
	array('label'=>'Delete CustomerType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ctype),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CustomerType', 'url'=>array('admin')),
);
?>

<h1>View CustomerType #<?php echo $model->id_ctype; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_ctype',
		'cd_ctype',
		'create_by',
		'nm_ctype',
		'create_date',
		'update_date',
		'update_by',
	),
)); ?>
