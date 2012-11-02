<?php
/* @var $this CogsController */
/* @var $model Cogs */

$this->breadcrumbs=array(
	'Cogs'=>array('index'),
	$model->id_cogs=>array('view','id'=>$model->id_cogs),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cogs', 'url'=>array('index')),
	array('label'=>'Create Cogs', 'url'=>array('create')),
	array('label'=>'View Cogs', 'url'=>array('view', 'id'=>$model->id_cogs)),
	array('label'=>'Manage Cogs', 'url'=>array('admin')),
);
?>

<h1>Update Cogs <?php echo $model->id_cogs; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>