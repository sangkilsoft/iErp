<?php
$this->breadcrumbs=array(
	'Gl Details'=>array('index'),
	$model->id_gldetail=>array('view','id'=>$model->id_gldetail),
	'Update',
);

$this->menu=array(
	array('label'=>'List GlDetail', 'url'=>array('index')),
	array('label'=>'Create GlDetail', 'url'=>array('create')),
	array('label'=>'View GlDetail', 'url'=>array('view', 'id'=>$model->id_gldetail)),
	array('label'=>'Manage GlDetail', 'url'=>array('admin')),
);
?>

<h1>Update GlDetail <?php echo $model->id_gldetail; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>