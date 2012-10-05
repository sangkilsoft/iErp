<?php
$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	$model->id_acc,
);

$this->menu=array(
	array('label'=>'List Account', 'url'=>array('index')),
	array('label'=>'Create Account', 'url'=>array('create')),
	array('label'=>'Update Account', 'url'=>array('update', 'id'=>$model->id_acc)),
	array('label'=>'Delete Account', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_acc),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Account', 'url'=>array('admin')),
);
?>

<h1>View Account #<?php echo $model->id_acc; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_acc',
		'cd_acc',
		'nm_acc',
		'acc_normal',
		'parent',
		'create_date',
		'update_by',
		'create_by',
		'update_date',
		'level',
	),
)); ?>
