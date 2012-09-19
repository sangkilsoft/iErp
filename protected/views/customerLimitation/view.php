<?php
$this->breadcrumbs=array(
	'Customer Limitations'=>array('index'),
	$model->id_customer,
);

$this->menu=array(
	array('label'=>'List CustomerLimitation', 'url'=>array('index')),
	array('label'=>'Create CustomerLimitation', 'url'=>array('create')),
	array('label'=>'Update CustomerLimitation', 'url'=>array('update', 'id'=>$model->id_customer)),
	array('label'=>'Delete CustomerLimitation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_customer),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CustomerLimitation', 'url'=>array('admin')),
);
?>

<h1>View CustomerLimitation #<?php echo $model->id_customer; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_customer',
		'multi_invoice',
		'credit_limit',
		'blocked',
		'update_date',
		'create_date',
		'create_by',
		'update_by',
	),
)); ?>
