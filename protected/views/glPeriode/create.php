<?php
$this->breadcrumbs=array(
	'Gl Periodes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GlPeriode', 'url'=>array('index')),
	array('label'=>'Manage GlPeriode', 'url'=>array('admin')),
);
?>

<h1>Create GlPeriode</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'mdl' => $mdl)); ?>