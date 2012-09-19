<?php
$this->breadcrumbs=array(
	'Role Menus',
);

$this->menu=array(
	array('label'=>'Create RoleMenu', 'url'=>array('create')),
	array('label'=>'Manage RoleMenu', 'url'=>array('admin')),
);
?>

<h1>Role Menus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
