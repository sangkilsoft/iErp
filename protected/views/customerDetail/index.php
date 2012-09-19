<?php
$this->breadcrumbs=array(
	'Customer Details',
);

$this->menu=array(
	array('label'=>'Create CustomerDetail', 'url'=>array('create')),
	array('label'=>'Manage CustomerDetail', 'url'=>array('admin')),
);
?>

<h1>Customer Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
