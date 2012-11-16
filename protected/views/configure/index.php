<?php
/* @var $this ConfigureController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Configures',
);

$this->menu=array(
	array('label'=>'Create Configure', 'url'=>array('create')),
	array('label'=>'Manage Configure', 'url'=>array('admin')),
);
?>

<h1>Configures</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
