<?php
$this->breadcrumbs=array(
	'Gl Periodes'=>array('index'),
	$model->id_glperiode,
);

$this->menu=array(
	array('label'=>'List GlPeriode', 'url'=>array('index')),
	array('label'=>'Create GlPeriode', 'url'=>array('create')),
	array('label'=>'Update GlPeriode', 'url'=>array('update', 'id'=>$model->id_glperiode)),
	array('label'=>'Delete GlPeriode', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_glperiode),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GlPeriode', 'url'=>array('admin')),
        
);
?>

<h1>View GlPeriode #<?php echo $model->id_glperiode; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_glperiode',
		'bulan',
		'tahun',
		'id_branch',
		'id_orgn',
		'id_acc',
		'saldo',
		'create_date',
		'update_by',
		'create_by',
		'update_date',
	),
)); ?>
