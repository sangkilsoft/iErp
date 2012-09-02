<?php
$this->breadcrumbs=array(
	'Whses'=>array('index'),
	$model->cd_whse=>array('view','id'=>$model->cd_whse),
	'Update',
);

$this->menu=array(
	array('label'=>'List Whse', 'url'=>array('index')),
	array('label'=>'Create Whse', 'url'=>array('create')),
	array('label'=>'View Whse', 'url'=>array('view', 'id'=>$model->cd_whse)),
	array('label'=>'Manage Whse', 'url'=>array('admin')),
);
?>

<h1>Update Whse <?php echo $model->cd_whse; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>