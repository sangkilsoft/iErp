<?php
$this->breadcrumbs=array(
	'Gl Headers'=>array('index'),
	$model->id_glheader=>array('view','id'=>$model->id_glheader),
	'Update',
);

$this->menu=array(
	array('label'=>'List GlHeader', 'url'=>array('index')),
	array('label'=>'Create GlHeader', 'url'=>array('create')),
	array('label'=>'View GlHeader', 'url'=>array('view', 'id'=>$model->id_glheader)),
	array('label'=>'Manage GlHeader', 'url'=>array('admin')),
);
?>

<h1>Update GlHeader <?php echo $model->id_glheader; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'modeldtl' => $modeldtl)); ?>