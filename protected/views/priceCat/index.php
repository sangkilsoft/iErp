<?php
/* @var $this PriceCatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Price Cats',
);

$this->menu=array(
	array('label'=>'Create PriceCat', 'url'=>array('create')),
	array('label'=>'Manage PriceCat', 'url'=>array('admin')),
);
?>

<h1>Price Cats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
