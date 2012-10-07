<?php
$this->breadcrumbs=array(
	'Po Deliveries',
);

$this->menu=array(
	array('label'=>'Create PoDelivery', 'url'=>array('create')),
	array('label'=>'Manage PoDelivery', 'url'=>array('admin')),
);
?>

<h1>Po Deliveries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
