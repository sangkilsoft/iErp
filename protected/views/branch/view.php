<?php
$this->breadcrumbs=array(
	'Branches'=>array('index'),
	$model->id_branch,
);

$this->menu=array(
	array('label'=>'List Branch', 'url'=>array('index')),
	array('label'=>'Create Branch', 'url'=>array('create')),
	array('label'=>'Update Branch', 'url'=>array('update', 'id'=>$model->id_branch)),
	array('label'=>'Delete Branch', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_branch),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Branch', 'url'=>array('admin')),
);
?>

<h1>View Branch #<?php echo $model->id_branch; ?></h1>

<?php $this->widget('MCDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_branch',
		'cd_branch',
		'nm_branch',
		'id_orgn',
		'create_date',
		'update_date',
		'update_by',
		'create_by',
	),
)); ?>
