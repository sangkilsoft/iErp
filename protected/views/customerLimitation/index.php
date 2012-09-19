<?php
$this->breadcrumbs=array(
	'Customer Limitations',
);

$this->menu=array(
	array('label'=>'Create CustomerLimitation', 'url'=>array('create')),
	array('label'=>'Manage CustomerLimitation', 'url'=>array('admin')),
);
?>

<h1>Customer Limitations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
