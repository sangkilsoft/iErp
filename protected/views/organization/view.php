<?php
$this->breadcrumbs=array(
	'Organizations'=>array('index'),
	$model->id_orgn,
);

$this->menu=array(
	array('label'=>'List Organization', 'url'=>array('index')),
	array('label'=>'Create Organization', 'url'=>array('create')),
	array('label'=>'Update Organization', 'url'=>array('update', 'id'=>$model->id_orgn)),
	array('label'=>'Delete Organization', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_orgn),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Organization', 'url'=>array('admin')),
);
?>

<h1>View Organization #<?php echo $model->id_orgn; ?></h1>

<?php $this->widget('MCDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_orgn',
		'cd_orgn',
		'update_by',
		'nm_orgn',
		'create_date',
		'create_by',
		'update_date',
	),
)); ?>
