<?php
$this->breadcrumbs=array(
	'Pcategories'=>array('index'),
	$model->id_category,
);

$this->menu=array(
	array('label'=>'List PCategory', 'url'=>array('index')),
	array('label'=>'Create PCategory', 'url'=>array('create')),
	array('label'=>'Update PCategory', 'url'=>array('update', 'id'=>$model->id_category)),
	array('label'=>'Delete PCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_category),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PCategory', 'url'=>array('admin')),
);
?>

<h1>View PCategory #<?php echo $model->id_category; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_category',
		'cd_category',
		'create_date',
		'nm_category',
		'create_by',
		'update_date',
		'update_by',
	),
)); ?>
