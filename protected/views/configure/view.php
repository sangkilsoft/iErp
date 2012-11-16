<?php
/* @var $this ConfigureController */
/* @var $model Configure */

$this->breadcrumbs=array(
	'Configures'=>array('index'),
	$model->id_conf,
);

$this->menu=array(
	array('label'=>'List Configure', 'url'=>array('index')),
	array('label'=>'Create Configure', 'url'=>array('create')),
	array('label'=>'Update Configure', 'url'=>array('update', 'id'=>$model->id_conf)),
	array('label'=>'Delete Configure', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_conf),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Configure', 'url'=>array('admin')),
);
?>

<h1>View Configure #<?php echo $model->id_conf; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_conf',
		'conf_name',
		'conf_code',
		'value',
		'update_by',
		'update_date',
		'create_by',
		'create_date',
	),
)); ?>
