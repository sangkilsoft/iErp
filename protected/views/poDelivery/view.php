<?php
$this->breadcrumbs=array(
	'Po Deliveries'=>array('index'),
	$model->id_delivery,
);

$this->menu=array(
	array('label'=>'List PoDelivery', 'url'=>array('index')),
	array('label'=>'Create PoDelivery', 'url'=>array('create')),
	array('label'=>'Update PoDelivery', 'url'=>array('update', 'id'=>$model->id_delivery)),
	array('label'=>'Delete PoDelivery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_delivery),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PoDelivery', 'url'=>array('admin')),
);
?>

<h1>View PoDelivery #<?php echo $model->id_delivery; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_delivery',
		'do_num',
		'id_supplier',
		'id_orgn',
		'id_branch',
		'description',
		'id_warehouse',
		'ref_number',
		'status',
		'create_by',
		'create_date',
		'update_date',
		'update_by',
	),
)); ?>
