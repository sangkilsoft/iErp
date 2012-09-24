<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->id_product,
);

$this->menu=array(
	array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Product', 'url'=>array('create')),
	array('label'=>'Update Product', 'url'=>array('update', 'id'=>$model->id_product)),
	array('label'=>'Delete Product', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_product),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
?>

<h1>View Product #<?php echo $model->id_product; ?></h1>

<?php $this->widget('MCDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_product',
		'cd_product',
		'nm_product',
		'create_date',
		'create_by',
		'update_date',
		'update_by',
		'id_manfrs',
		'id_uoms',
		'id_groups',
		'id_category',
	),
)); ?>
