<?php
$this->breadcrumbs=array(
	'Sinvoice Payments'=>array('index'),
	$model->id_pyment,
);

$this->menu=array(
	array('label'=>'List SinvoicePayment', 'url'=>array('index')),
	array('label'=>'Create SinvoicePayment', 'url'=>array('create')),
	array('label'=>'Update SinvoicePayment', 'url'=>array('update', 'id'=>$model->id_pyment)),
	array('label'=>'Delete SinvoicePayment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pyment),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SinvoicePayment', 'url'=>array('admin')),
);
?>

<h1>View SinvoicePayment #<?php echo $model->id_pyment; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pyment',
		'pyment_num',
		'id_branch',
		'id_orgn',
		'pyment_date',
		'actual_pyment',
		'currency',
		'ref_num',
		'py_method',
		'deposit_to',
		'cleared',
		'create_date',
		'create_by',
		'update_date',
		'update_by',
		'id_customer',
	),
)); ?>
