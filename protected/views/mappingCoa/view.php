<?php
$this->breadcrumbs=array(
	'Mapping Coas'=>array('index'),
	$model->id_mappingcoa,
);

$this->menu=array(
	array('label'=>'List MappingCoa', 'url'=>array('index')),
	array('label'=>'Create MappingCoa', 'url'=>array('create')),
	array('label'=>'Update MappingCoa', 'url'=>array('update', 'id'=>$model->id_mappingcoa)),
	array('label'=>'Delete MappingCoa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_mappingcoa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MappingCoa', 'url'=>array('admin')),
);
?>

<h1>View MappingCoa #<?php echo $model->id_mappingcoa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_mappingcoa',
		'trans_type',
		'mappingname',
		'id_acc',
		'dk',
		'create_date',
		'create_by',
		'update_by',
		'update_date',
	),
)); ?>
