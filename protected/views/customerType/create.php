<?php
$this->breadcrumbs=array(
	'Customer Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CustomerType', 'url'=>array('index')),
	array('label'=>'Manage CustomerType', 'url'=>array('admin')),
);
?>

<h1>Create CustomerType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>