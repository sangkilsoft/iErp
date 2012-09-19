<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->id_category=>array('view','id'=>$model->id_category),
	'Update',
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'View Category', 'url'=>array('view', 'id'=>$model->id_category)),
	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>

<h1>Update Category <?php echo $model->id_category; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>