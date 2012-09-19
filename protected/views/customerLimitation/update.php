<?php
$this->breadcrumbs=array(
	'Customer Limitations'=>array('index'),
	$model->id_customer=>array('view','id'=>$model->id_customer),
	'Update',
);

$this->menu=array(
	array('label'=>'List CustomerLimitation', 'url'=>array('index')),
	array('label'=>'Create CustomerLimitation', 'url'=>array('create')),
	array('label'=>'View CustomerLimitation', 'url'=>array('view', 'id'=>$model->id_customer)),
	array('label'=>'Manage CustomerLimitation', 'url'=>array('admin')),
);
?>

<h1>Update CustomerLimitation <?php echo $model->id_customer; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>