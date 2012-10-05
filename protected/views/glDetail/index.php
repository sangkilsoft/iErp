<?php
$this->breadcrumbs=array(
	'Gl Details',
);

$this->menu=array(
	array('label'=>'Create GlDetail', 'url'=>array('create')),
	array('label'=>'Manage GlDetail', 'url'=>array('admin')),
);
?>

<h1>Gl Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
