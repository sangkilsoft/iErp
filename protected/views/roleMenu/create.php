<?php
$this->breadcrumbs=array(
	'Role Menus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoleMenu', 'url'=>array('index')),
	array('label'=>'Manage RoleMenu', 'url'=>array('admin')),
);
?>

<h1>Create RoleMenu</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>