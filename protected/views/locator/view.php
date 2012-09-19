<?php
$this->breadcrumbs=array(
	'Locators'=>array('index'),
	$model->id_locator,
);

$this->menu=array(
	array('label'=>'List Locator', 'url'=>array('index')),
	array('label'=>'Create Locator', 'url'=>array('create')),
	array('label'=>'Update Locator', 'url'=>array('update', 'id'=>$model->id_locator)),
	array('label'=>'Delete Locator', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_locator),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Locator', 'url'=>array('admin')),
);
?>

<h1>View Locator #<?php echo $model->id_locator; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_locator',
		'id_warehouse',
		'cd_locator',
		'nm_locator',
		'description',
		'latitude',
		'longitude',
		'capacity',
		'create_by',
		'update_by',
		'update_date',
		'create_date',
	),
)); ?>
