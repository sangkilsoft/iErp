<?php
/* @var $this PriceCatController */
/* @var $model PriceCat */

$this->breadcrumbs=array(
	'Price Cats'=>array('index'),
	$model->id_price_cat,
);

$this->menu=array(
	array('label'=>'List PriceCat', 'url'=>array('index')),
	array('label'=>'Create PriceCat', 'url'=>array('create')),
	array('label'=>'Update PriceCat', 'url'=>array('update', 'id'=>$model->id_price_cat)),
	array('label'=>'Delete PriceCat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_price_cat),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PriceCat', 'url'=>array('admin')),
);
?>

<h1>View PriceCat #<?php echo $model->id_price_cat; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_price_cat',
		'description',
		'update_by',
		'create_by',
		'create_date',
		'update_date',
	),
)); ?>
