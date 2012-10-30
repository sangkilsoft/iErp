<?php
/* @var $this GreceiptHdrController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Greceipt Hdrs',
);

$this->menu=array(
	array('label'=>'Create GreceiptHdr', 'url'=>array('create')),
	array('label'=>'Manage GreceiptHdr', 'url'=>array('admin')),
);
?>

<h1>Greceipt Hdrs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
