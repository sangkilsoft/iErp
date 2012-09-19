<?php
$this->breadcrumbs=array(
	'Uoms',
);

$this->menu=array(
	array('label'=>'Create Uoms', 'url'=>array('create')),
	array('label'=>'Manage Uoms', 'url'=>array('admin')),
);
?>

<h1>Uoms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
