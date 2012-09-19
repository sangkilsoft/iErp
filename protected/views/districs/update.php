<?php
$this->breadcrumbs=array(
	'Districs'=>array('index'),
	$model->id_distric=>array('view','id'=>$model->id_distric),
	'Update',
);

$this->menu=array(
	array('label'=>'List Districs', 'url'=>array('index')),
	array('label'=>'Create Districs', 'url'=>array('create')),
	array('label'=>'View Districs', 'url'=>array('view', 'id'=>$model->id_distric)),
	array('label'=>'Manage Districs', 'url'=>array('admin')),
);
?>

<h1>Update Districs <?php echo $model->id_distric; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>