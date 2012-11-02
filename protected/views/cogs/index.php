<?php
/* @var $this CogsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cogs',
);

$this->menu=array(
	array('label'=>'Create Cogs', 'url'=>array('create')),
	array('label'=>'Manage Cogs', 'url'=>array('admin')),
);
?>

<h1>Cogs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
