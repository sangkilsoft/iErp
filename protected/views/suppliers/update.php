<?php
$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	$model->id_supplier=>array('view','id'=>$model->id_supplier),
	'Update',
);

$this->menu=array(
	array('label'=>'List Suppliers', 'url'=>array('index')),
	array('label'=>'Create Suppliers', 'url'=>array('create')),
	array('label'=>'View Suppliers', 'url'=>array('view', 'id'=>$model->id_supplier)),
	array('label'=>'Manage Suppliers', 'url'=>array('admin')),
);
?>

<h1>Update Suppliers <?php echo $model->id_supplier; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>