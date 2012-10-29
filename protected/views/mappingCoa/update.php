<?php
$this->breadcrumbs=array(
	'Mapping Coas'=>array('index'),
	$model->id_mappingcoa=>array('view','id'=>$model->id_mappingcoa),
	'Update',
);

$this->menu=array(
	array('label'=>'List MappingCoa', 'url'=>array('index')),
	array('label'=>'Create MappingCoa', 'url'=>array('create')),
	array('label'=>'View MappingCoa', 'url'=>array('view', 'id'=>$model->id_mappingcoa)),
	array('label'=>'Manage MappingCoa', 'url'=>array('admin')),
);
?>

<h1>Update MappingCoa <?php echo $model->id_mappingcoa; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>