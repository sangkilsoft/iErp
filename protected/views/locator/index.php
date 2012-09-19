<?php
$this->breadcrumbs=array(
	'Locators',
);

$this->menu=array(
	array('label'=>'Create Locator', 'url'=>array('create')),
	array('label'=>'Manage Locator', 'url'=>array('admin')),
);
?>

<h1>Locators</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
