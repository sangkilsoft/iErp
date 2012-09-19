<?php
$this->breadcrumbs=array(
	'Pcategories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PCategory', 'url'=>array('index')),
	array('label'=>'Manage PCategory', 'url'=>array('admin')),
);
?>

<h1>Create PCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>