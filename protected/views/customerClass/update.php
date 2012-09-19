<?php
$this->breadcrumbs=array(
	'Customer Classes'=>array('index'),
	$model->id_cclass=>array('view','id'=>$model->id_cclass),
	'Update',
);

$this->menu=array(
	array('label'=>'List CustomerClass', 'url'=>array('index')),
	array('label'=>'Create CustomerClass', 'url'=>array('create')),
	array('label'=>'View CustomerClass', 'url'=>array('view', 'id'=>$model->id_cclass)),
	array('label'=>'Manage CustomerClass', 'url'=>array('admin')),
);
?>

<h1>Update CustomerClass <?php echo $model->id_cclass; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>