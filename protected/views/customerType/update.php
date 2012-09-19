<?php
$this->breadcrumbs=array(
	'Customer Types'=>array('index'),
	$model->id_ctype=>array('view','id'=>$model->id_ctype),
	'Update',
);

$this->menu=array(
	array('label'=>'List CustomerType', 'url'=>array('index')),
	array('label'=>'Create CustomerType', 'url'=>array('create')),
	array('label'=>'View CustomerType', 'url'=>array('view', 'id'=>$model->id_ctype)),
	array('label'=>'Manage CustomerType', 'url'=>array('admin')),
);
?>

<h1>Update CustomerType <?php echo $model->id_ctype; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>