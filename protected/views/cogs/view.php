<?php
/* @var $this CogsController */
/* @var $model Cogs */

$this->breadcrumbs=array(
	'Cogs'=>array('index'),
	$model->id_cogs,
);

$this->menu=array(
	array('label'=>'List Cogs', 'url'=>array('index')),
	array('label'=>'Create Cogs', 'url'=>array('create')),
	array('label'=>'Update Cogs', 'url'=>array('update', 'id'=>$model->id_cogs)),
	array('label'=>'Delete Cogs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cogs),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cogs', 'url'=>array('admin')),
);
?>

<h1>View Cogs #<?php echo $model->id_cogs; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_cogs',
		'id_product',
		'id_orgn',
		'id_branch',
		'cogs',
		'update_by',
		'create_by',
		'create_date',
		'update_date',
	),
)); ?>
