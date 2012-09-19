<?php
$this->breadcrumbs=array(
	'Locators'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Locator', 'url'=>array('index')),
	array('label'=>'Manage Locator', 'url'=>array('admin')),
);
?>

<h1>Create Locator</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>