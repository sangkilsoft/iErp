<?php
$this->breadcrumbs=array(
	'Gl Periodes'=>array('index'),
	$model->id_glperiode=>array('view','id'=>$model->id_glperiode),
	'Update',
);

$this->menu=array(
	array('label'=>'List GlPeriode', 'url'=>array('index')),
	array('label'=>'Create GlPeriode', 'url'=>array('create')),
	array('label'=>'View GlPeriode', 'url'=>array('view', 'id'=>$model->id_glperiode)),
	array('label'=>'Manage GlPeriode', 'url'=>array('admin')),
);
?>

<h1>Update GlPeriode <?php echo $model->id_glperiode; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>