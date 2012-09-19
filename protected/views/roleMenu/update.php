<?php
$this->breadcrumbs=array(
	'Role Menus'=>array('index'),
	$model->id_rolemn=>array('view','id'=>$model->id_rolemn),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoleMenu', 'url'=>array('index')),
	array('label'=>'Create RoleMenu', 'url'=>array('create')),
	array('label'=>'View RoleMenu', 'url'=>array('view', 'id'=>$model->id_rolemn)),
	array('label'=>'Manage RoleMenu', 'url'=>array('admin')),
);
?>

<h1>Update RoleMenu <?php echo $model->id_rolemn; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>