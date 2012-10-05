<?php
$this->breadcrumbs=array(
	'Gl Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GlDetail', 'url'=>array('index')),
	array('label'=>'Manage GlDetail', 'url'=>array('admin')),
);
?>

<h1>Create GlDetail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>