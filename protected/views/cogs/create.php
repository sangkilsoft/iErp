<?php
/* @var $this CogsController */
/* @var $model Cogs */

$this->breadcrumbs=array(
	'Cogs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cogs', 'url'=>array('index')),
	array('label'=>'Manage Cogs', 'url'=>array('admin')),
);
?>

<h1>Create Cogs</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>