<?php
$this->breadcrumbs=array(
	'Good Issues',
);

$this->menu=array(
	array('label'=>'Create GoodIssue', 'url'=>array('create')),
	array('label'=>'Manage GoodIssue', 'url'=>array('admin')),
);
?>

<h1>Good Issues</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
