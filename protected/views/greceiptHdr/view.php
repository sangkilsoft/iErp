<?php
/* @var $this GreceiptHdrController */
/* @var $model GreceiptHdr */

$this->breadcrumbs=array(
	'Greceipt Hdrs'=>array('index'),
	$model->id_receipt,
);

$this->menu=array(
	array('label'=>'List GreceiptHdr', 'url'=>array('index')),
	array('label'=>'Create GreceiptHdr', 'url'=>array('create')),
	array('label'=>'Update GreceiptHdr', 'url'=>array('update', 'id'=>$model->id_receipt)),
	array('label'=>'Delete GreceiptHdr', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_receipt),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GreceiptHdr', 'url'=>array('admin')),
);
?>

<h1>View GreceiptHdr #<?php echo $model->id_receipt; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_receipt',
		'gr_num',
		'id_orgn',
		'id_branch',
		'id_warehouse',
		'id_locator',
		'description',
		'status',
		'trans_type',
		'ref_number',
		'receipt_date',
		'update_date',
		'create_by',
		'update_by',
		'create_date',
	),
)); ?>
