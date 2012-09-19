<?php
$this->breadcrumbs=array(
	'Districs',
);

$this->menu=array(
	array('label'=>'Create Districs', 'url'=>array('create')),
	array('label'=>'Manage Districs', 'url'=>array('admin')),
);
?>

<h1>Districs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
