<?php
$this->breadcrumbs=array(
	'Uoms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Uoms', 'url'=>array('index')),
	array('label'=>'Manage Uoms', 'url'=>array('admin')),
);
?>

<h1>Create Uoms</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>