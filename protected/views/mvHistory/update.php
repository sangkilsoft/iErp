<?php
/* @var $this MvHistoryController */
/* @var $model MvHistory */

$this->breadcrumbs=array(
	'Mv Histories'=>array('index'),
	$model->id_movement=>array('view','id'=>$model->id_movement),
	'Update',
);

$this->menu=array(
	array('label'=>'List MvHistory', 'url'=>array('index')),
	array('label'=>'Create MvHistory', 'url'=>array('create')),
	array('label'=>'View MvHistory', 'url'=>array('view', 'id'=>$model->id_movement)),
	array('label'=>'Manage MvHistory', 'url'=>array('admin')),
);
?>

<h1>Update MvHistory <?php echo $model->id_movement; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>