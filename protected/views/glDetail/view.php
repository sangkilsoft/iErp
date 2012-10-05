<?php
$this->breadcrumbs=array(
	'Gl Details'=>array('index'),
	$model->id_gldetail,
);

$this->menu=array(
	array('label'=>'List GlDetail', 'url'=>array('index')),
	array('label'=>'Create GlDetail', 'url'=>array('create')),
	array('label'=>'Update GlDetail', 'url'=>array('update', 'id'=>$model->id_gldetail)),
	array('label'=>'Delete GlDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_gldetail),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GlDetail', 'url'=>array('admin')),
);
?>

<h1>View GlDetail #<?php echo $model->id_gldetail; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_gldetail',
		'id_glheader',
		'id_acc',
		'debet',
		'kredit',
		'create_date',
		'update_by',
		'create_by',
		'update_date',
	),
)); ?>
