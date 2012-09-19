<?php
$this->breadcrumbs=array(
	'Good Issues'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GoodIssue', 'url'=>array('index')),
	array('label'=>'Manage GoodIssue', 'url'=>array('admin')),
);
?>

<h1>Create GoodIssue</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>