<?php
$this->breadcrumbs=array(
	'Districs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Districs', 'url'=>array('index')),
	array('label'=>'Manage Districs', 'url'=>array('admin')),
);
?>

<h1>Create Districs</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>