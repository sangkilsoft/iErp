<?php
$this->breadcrumbs=array(
	'Role Menus'=>array('index'),
	$model->id_rolemn,
);

$this->menu=array(
	array('label'=>'List RoleMenu', 'url'=>array('index')),
	array('label'=>'Create RoleMenu', 'url'=>array('create')),
	array('label'=>'Update RoleMenu', 'url'=>array('update', 'id'=>$model->id_rolemn)),
	array('label'=>'Delete RoleMenu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rolemn),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoleMenu', 'url'=>array('admin')),
);
?>

<h1>View RoleMenu #<?php echo $model->id_rolemn; ?></h1>

<?php $this->widget('MCDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_rolemn',
		'role.deskripsi',
		'menu.label',
	),
)); ?>
