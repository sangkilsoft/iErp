<?php
$this->breadcrumbs=array(
	'Customer Classes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CustomerClass', 'url'=>array('index')),
	array('label'=>'Manage CustomerClass', 'url'=>array('admin')),
);
?>

<h1>Create CustomerClass</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>