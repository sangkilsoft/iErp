<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->id_groups,
);

$this->menu=array(
	array('label'=>'List Groups', 'url'=>array('index')),
	array('label'=>'Create Groups', 'url'=>array('create')),
	array('label'=>'Update Groups', 'url'=>array('update', 'id'=>$model->id_groups)),
	array('label'=>'Delete Groups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_groups),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Groups', 'url'=>array('admin')),
);
?>

<h1>View Groups #<?php echo $model->id_groups; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_groups',
		'cd_group',
		'nm_group',
		'update_by',
		'update_date',
		'create_date',
		'create_by',
	),
)); ?>
