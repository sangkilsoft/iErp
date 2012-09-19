<?php
$this->breadcrumbs=array(
	'Customer Classes',
);

$this->menu=array(
	array('label'=>'Create CustomerClass', 'url'=>array('create')),
	array('label'=>'Manage CustomerClass', 'url'=>array('admin')),
);
?>

<h1>Customer Classes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
