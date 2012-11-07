<?php
/* @var $this MvHistoryController */
/* @var $model MvHistory */

$this->breadcrumbs=array(
	'Mv Histories'=>array('index'),
	$model->id_movement,
);

$this->menu=array(
	array('label'=>'List MvHistory', 'url'=>array('index')),
	array('label'=>'Create MvHistory', 'url'=>array('create')),
	array('label'=>'Update MvHistory', 'url'=>array('update', 'id'=>$model->id_movement)),
	array('label'=>'Delete MvHistory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_movement),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MvHistory', 'url'=>array('admin')),
);
?>

<h1>View MvHistory #<?php echo $model->id_movement; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_movement',
		'id_locator',
		'id_branch',
		'id_orgn',
		'id_product',
		'qty_mvnt',
		'val_mvnt',
		'qty_current',
		'val_current',
		'trans_type',
		'trans_source',
		'ref_number',
		'update_date',
		'create_by',
		'update_by',
		'create_date',
	),
)); ?>
