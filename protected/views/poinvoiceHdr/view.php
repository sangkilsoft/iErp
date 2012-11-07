<?php
/* @var $this PoinvoiceHdrController */
/* @var $model PoinvoiceHdr */

$this->breadcrumbs=array(
	'Poinvoice Hdrs'=>array('index'),
	$model->id_invoice,
);

$this->menu=array(
	array('label'=>'List PoinvoiceHdr', 'url'=>array('index')),
	array('label'=>'Create PoinvoiceHdr', 'url'=>array('create')),
	array('label'=>'Update PoinvoiceHdr', 'url'=>array('update', 'id'=>$model->id_invoice)),
	array('label'=>'Delete PoinvoiceHdr', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_invoice),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PoinvoiceHdr', 'url'=>array('admin')),
);
?>

<h1>View PoinvoiceHdr #<?php echo $model->id_invoice; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_invoice',
		'invoice_num',
		'id_delivery',
		'id_orgn',
		'id_branch',
		'id_supplier',
		'description',
		'total_value',
		'total_discount',
		'total_tax',
		'total_paid',
		'status',
		'date_limit',
		'update_date',
		'create_date',
		'create_by',
		'update_by',
	),
)); ?>
