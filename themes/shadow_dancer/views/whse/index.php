<?php
$this->breadcrumbs=array(
	'Whses',
);

$this->menu=array(
	array('label'=>'Create Whse', 'url'=>array('create')),
	array('label'=>'Manage Whse', 'url'=>array('admin')),
);
?>

<h1>Whses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
