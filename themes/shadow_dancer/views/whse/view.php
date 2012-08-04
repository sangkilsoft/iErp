<?php
$this->breadcrumbs=array(
	'Whses'=>array('index'),
	$model->cd_whse,
);

$this->menu=array(
	array('label'=>'List Whse', 'url'=>array('index')),
	array('label'=>'Create Whse', 'url'=>array('create')),
	array('label'=>'Update Whse', 'url'=>array('update', 'id'=>$model->cd_whse)),
	array('label'=>'Delete Whse', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cd_whse),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Whse', 'url'=>array('admin')),
);
?>

<h1>View Whse #<?php echo $model->cd_whse; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cd_whse',
		'nm_whse',
		'create_by',
	),
)); ?>
