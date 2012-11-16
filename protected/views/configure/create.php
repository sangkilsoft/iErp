<?php
/* @var $this ConfigureController */
/* @var $model Configure */

$this->breadcrumbs=array(
	'Configures'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Configure', 'url'=>array('index')),
	array('label'=>'Manage Configure', 'url'=>array('admin')),
);
?>

<h1>Create Configure</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>