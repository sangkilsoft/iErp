<?php
$this->breadcrumbs=array(
	'Pcategories'=>array('index'),
	$model->id_category=>array('view','id'=>$model->id_category),
	'Update',
);

$this->menu=array(
	array('label'=>'List PCategory', 'url'=>array('index')),
	array('label'=>'Create PCategory', 'url'=>array('create')),
	array('label'=>'View PCategory', 'url'=>array('view', 'id'=>$model->id_category)),
	array('label'=>'Manage PCategory', 'url'=>array('admin')),
);
?>

<h1>Update PCategory <?php echo $model->id_category; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>