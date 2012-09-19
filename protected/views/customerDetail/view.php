<?php
$this->breadcrumbs=array(
	'Customer Details'=>array('index'),
	$model->id_customer,
);

$this->menu=array(
	array('label'=>'List CustomerDetail', 'url'=>array('index')),
	array('label'=>'Create CustomerDetail', 'url'=>array('create')),
	array('label'=>'Update CustomerDetail', 'url'=>array('update', 'id'=>$model->id_customer)),
	array('label'=>'Delete CustomerDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_customer),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CustomerDetail', 'url'=>array('admin')),
);
?>

<h1>View CustomerDetail #<?php echo $model->id_customer; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_customer',
		'id_distric',
		'addr2',
		'latitude',
		'longtitude',
		'create_date',
		'create_by',
		'update_date',
		'update_by',
	),
)); ?>
