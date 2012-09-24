<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->id_category,
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'Update Category', 'url'=>array('update', 'id'=>$model->id_category)),
	array('label'=>'Delete Category', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_category),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>

<h1>View Category #<?php echo $model->id_category; ?></h1>

<?php $this->widget('MCDetailView', array(
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
