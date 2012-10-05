<?php
$this->breadcrumbs=array(
	'Gl Headers',
);

$this->menu=array(
	array('label'=>'Create GlHeader', 'url'=>array('create')),
	array('label'=>'Manage GlHeader', 'url'=>array('admin')),
);
?>

<h1>Gl Headers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
