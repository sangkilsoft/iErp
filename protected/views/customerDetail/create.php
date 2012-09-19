<?php
$this->breadcrumbs=array(
	'Customer Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CustomerDetail', 'url'=>array('index')),
	array('label'=>'Manage CustomerDetail', 'url'=>array('admin')),
);
?>

<h1>Create CustomerDetail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>