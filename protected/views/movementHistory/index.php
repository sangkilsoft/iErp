<?php
$this->breadcrumbs=array(
	'Mv Histories',
);

$this->menu=array(
	array('label'=>'Manage MvHistory', 'url'=>array('admin')),
);
?>

<h1>Mv Histories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
