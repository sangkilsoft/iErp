<?php
$this->breadcrumbs=array(
	'Gl Headers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GlHeader', 'url'=>array('index')),
	array('label'=>'Manage GlHeader', 'url'=>array('admin')),
);
?>

<h1>Create GlHeader</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'modeldtl' => $modeldtl)); ?>