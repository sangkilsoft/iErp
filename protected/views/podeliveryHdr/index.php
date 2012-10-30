<?php
/* @var $this PodeliveryHdrController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Podelivery Hdrs',
);

$this->menu=array(
	array('label'=>'Create PodeliveryHdr', 'url'=>array('create')),
	array('label'=>'Manage PodeliveryHdr', 'url'=>array('admin')),
);
?>

<h1>Podelivery Hdrs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
