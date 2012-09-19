<?php
$this->breadcrumbs=array(
	'Pcategories',
);

$this->menu=array(
	array('label'=>'Create PCategory', 'url'=>array('create')),
	array('label'=>'Manage PCategory', 'url'=>array('admin')),
);
?>

<h1>Pcategories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
