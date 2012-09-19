<?php
$this->breadcrumbs=array(
	'Mv Histories'=>array('index'),
	$model->id_movement,
);

$this->menu=array(
	array('label'=>'List MvHistory', 'url'=>array('index')),
	array('label'=>'Manage MvHistory', 'url'=>array('admin')),
);
?>

<h1>View MvHistory #<?php echo $model->id_movement; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_movement',
		'id_locator',
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
