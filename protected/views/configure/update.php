<?php
/* @var $this ConfigureController */
/* @var $model Configure */

$this->breadcrumbs=array(
	'Configures'=>array('index'),
	$model->id_conf=>array('view','id'=>$model->id_conf),
	'Update',
);

$this->menu=array(
	array('label'=>'List Configure', 'url'=>array('index')),
	array('label'=>'Create Configure', 'url'=>array('create')),
	array('label'=>'View Configure', 'url'=>array('view', 'id'=>$model->id_conf)),
	array('label'=>'Manage Configure', 'url'=>array('admin')),
);
?>

<h1>Update Configure <?php echo $model->id_conf; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>