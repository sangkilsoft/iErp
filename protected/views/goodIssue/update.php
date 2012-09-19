<?php
$this->breadcrumbs=array(
	'Good Issues'=>array('index'),
	$model->id_issue=>array('view','id'=>$model->id_issue),
	'Update',
);

$this->menu=array(
	array('label'=>'List GoodIssue', 'url'=>array('index')),
	array('label'=>'Create GoodIssue', 'url'=>array('create')),
	array('label'=>'View GoodIssue', 'url'=>array('view', 'id'=>$model->id_issue)),
	array('label'=>'Manage GoodIssue', 'url'=>array('admin')),
);
?>

<h1>Update GoodIssue <?php echo $model->id_issue; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>