<?php
$this->breadcrumbs=array(
	'Customer Limitations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CustomerLimitation', 'url'=>array('index')),
	array('label'=>'Manage CustomerLimitation', 'url'=>array('admin')),
);
?>

<h1>Create CustomerLimitation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>