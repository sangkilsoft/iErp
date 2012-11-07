<?php
/* @var $this MvHistoryController */
/* @var $model MvHistory */

$this->breadcrumbs=array(
	'Mv Histories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MvHistory', 'url'=>array('index')),
	array('label'=>'Manage MvHistory', 'url'=>array('admin')),
);
?>

<h1>Create MvHistory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>