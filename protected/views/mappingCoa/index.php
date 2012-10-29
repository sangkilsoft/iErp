<?php
$this->breadcrumbs=array(
	'Mapping Coas',
);

$this->menu=array(
	array('label'=>'Create MappingCoa', 'url'=>array('create')),
	array('label'=>'Manage MappingCoa', 'url'=>array('admin')),
);
?>

<h1>Mapping Coas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
