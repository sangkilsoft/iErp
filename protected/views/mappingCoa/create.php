<?php
$this->breadcrumbs=array(
	'Mapping Coas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MappingCoa', 'url'=>array('index')),
	array('label'=>'Manage MappingCoa', 'url'=>array('admin')),
);
?>

<h1>Create MappingCoa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>