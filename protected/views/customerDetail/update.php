<?php
$this->breadcrumbs=array(
	'Customer Details'=>array('index'),
	$model->id_customer=>array('view','id'=>$model->id_customer),
	'Update',
);

$this->menu=array(
	array('label'=>'List CustomerDetail', 'url'=>array('index')),
	array('label'=>'Create CustomerDetail', 'url'=>array('create')),
	array('label'=>'View CustomerDetail', 'url'=>array('view', 'id'=>$model->id_customer)),
	array('label'=>'Manage CustomerDetail', 'url'=>array('admin')),
);
?>

<h1>Update CustomerDetail <?php echo $model->id_customer; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>