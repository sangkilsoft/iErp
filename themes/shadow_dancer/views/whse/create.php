<?php
$this->breadcrumbs=array(
	'Whses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Whse', 'url'=>array('index')),
	array('label'=>'Manage Whse', 'url'=>array('admin')),
);
?>

<h1>Create Whse</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>