<?php
$this->breadcrumbs=array(
	'Good Receipts'=>array('index'),
	$model->id_receipt,
);

$this->menu=array(
	array('label'=>'List GoodReceipt', 'url'=>array('index')),
	array('label'=>'Create GoodReceipt', 'url'=>array('create')),
	array('label'=>'Update GoodReceipt', 'url'=>array('update', 'id'=>$model->id_receipt)),
	array('label'=>'Delete GoodReceipt', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_receipt),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GoodReceipt', 'url'=>array('admin')),
);
?>

<h1>View GoodReceipt #<?php echo $model->id_receipt; ?></h1>

<?php $this->widget('MCDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_receipt',
		'gr_num',
		'description',
		'status',
		'receipt_date',
		'update_date',
		'create_by',
		'update_by',
		'create_date',
	),
)); ?>
