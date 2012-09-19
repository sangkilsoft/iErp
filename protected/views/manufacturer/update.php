<?php
$this->breadcrumbs=array(
	'Manufacturers'=>array('index'),
	$model->id_manfrs=>array('view','id'=>$model->id_manfrs),
	'Update',
);

$this->menu=array(
	array('label'=>'List Manufacturer', 'url'=>array('index')),
	array('label'=>'Create Manufacturer', 'url'=>array('create')),
	array('label'=>'View Manufacturer', 'url'=>array('view', 'id'=>$model->id_manfrs)),
	array('label'=>'Manage Manufacturer', 'url'=>array('admin')),
);
?>

<h1>Update Manufacturer <?php echo $model->id_manfrs; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>