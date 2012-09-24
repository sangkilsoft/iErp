<?php
$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	$model->id_acc=>array('view','id'=>$model->id_acc),
	'Update',
);

$this->menu=array(
	array('label'=>'List Account', 'url'=>array('index')),
	array('label'=>'Create Account', 'url'=>array('create')),
	array('label'=>'View Account', 'url'=>array('view', 'id'=>$model->id_acc)),
	array('label'=>'Manage Account', 'url'=>array('admin')),
);
?>

<h1>Update Account <?php echo $model->id_acc; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>