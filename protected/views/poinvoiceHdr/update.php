<?php
/* @var $this PoinvoiceHdrController */
/* @var $model PoinvoiceHdr */

$this->breadcrumbs=array(
	'Poinvoice Hdrs'=>array('index'),
	$model->id_invoice=>array('view','id'=>$model->id_invoice),
	'Update',
);

$this->menu=array(
	array('label'=>'List PoinvoiceHdr', 'url'=>array('index')),
	array('label'=>'Create PoinvoiceHdr', 'url'=>array('create')),
	array('label'=>'View PoinvoiceHdr', 'url'=>array('view', 'id'=>$model->id_invoice)),
	array('label'=>'Manage PoinvoiceHdr', 'url'=>array('admin')),
);
?>

<h1>Update PoinvoiceHdr <?php echo $model->id_invoice; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>