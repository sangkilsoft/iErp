<?php
$this->breadcrumbs=array(
	'Good Receipts',
);

$this->menu=array(
	array('label'=>'Create GoodReceipt', 'url'=>array('create')),
	array('label'=>'Manage GoodReceipt', 'url'=>array('admin')),
);
?>

<h1>Good Receipts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
