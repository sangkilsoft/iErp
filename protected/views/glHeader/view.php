<?php
$this->breadcrumbs=array(
	'Gl Headers'=>array('index'),
	$model->id_glheader,
);

$this->menu=array(
	array('label'=>'List GlHeader', 'url'=>array('index')),
	array('label'=>'Create GlHeader', 'url'=>array('create')),
	array('label'=>'Update GlHeader', 'url'=>array('update', 'id'=>$model->id_glheader)),
	array('label'=>'Delete GlHeader', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_glheader),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GlHeader', 'url'=>array('admin')),
);
?>

<h1>View GlHeader #<?php echo $model->id_glheader; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_glheader',
		'id_branch',
		'id_orgn',
		'refnum',
		'tgl_trans',
		'trans_type',
		'description',
		'update_date',
		'create_date',
		'create_by',
		'update_by',
	),
)); ?>
