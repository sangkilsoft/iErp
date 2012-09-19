<?php
$this->breadcrumbs=array(
	'Locators'=>array('index'),
	$model->id_locator=>array('view','id'=>$model->id_locator),
	'Update',
);

$this->menu=array(
	array('label'=>'List Locator', 'url'=>array('index')),
	array('label'=>'Create Locator', 'url'=>array('create')),
	array('label'=>'View Locator', 'url'=>array('view', 'id'=>$model->id_locator)),
	array('label'=>'Manage Locator', 'url'=>array('admin')),
);
?>

<h1>Update Locator <?php echo $model->id_locator; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>