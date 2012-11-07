<?php
/* @var $this PoinvoiceHdrController */
/* @var $model PoinvoiceHdr */

$this->breadcrumbs=array(
	'Poinvoice Hdrs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PoinvoiceHdr', 'url'=>array('index')),
	array('label'=>'Manage PoinvoiceHdr', 'url'=>array('admin')),
);
?>

<h1>Create PoinvoiceHdr</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>