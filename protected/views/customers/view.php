<?php
/* @var $this CustomersController */
/* @var $model Customers */

$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->id_customer,
);

$this->menu=array(
	array('label'=>'List Customers', 'url'=>array('index')),
	array('label'=>'Create Customers', 'url'=>array('create')),
	array('label'=>'Update Customers', 'url'=>array('update', 'id'=>$model->id_customer)),
	array('label'=>'Delete Customers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_customer),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Customers', 'url'=>array('admin')),
);
?>

<h1>View Customers #<?php echo $model->id_customer; ?></h1>

<?php
//$this->widget('zii.widgets.CDetailView', array(
//	'data'=>$model,
//	'attributes'=>array(
//		'id_customer',
//		'cd_cust',
//		'nm_cust',
//		'id_ctype',
//		'id_cclass',
//		'contact_name',
//		'contact_number',
//		'status',
//		'create_date',
//		'update_date',
//		'create_by',
//		'update_by',
//	),
//)); 
?>

<?php echo $this->renderPartial('_form', array('model' => $model, 'limit' => $limit, 'dtl' => $dtl)); ?>
