<?php
$this->breadcrumbs=array(
	'Uoms'=>array('index'),
	$model->id_uoms=>array('view','id'=>$model->id_uoms),
	'Update',
);

$this->menu=array(
	array('label'=>'List Uoms', 'url'=>array('index')),
	array('label'=>'Create Uoms', 'url'=>array('create')),
	array('label'=>'View Uoms', 'url'=>array('view', 'id'=>$model->id_uoms)),
	array('label'=>'Manage Uoms', 'url'=>array('admin')),
);
?>

<h1>Update Uoms <?php echo $model->id_uoms; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>