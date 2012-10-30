<?php
/* @var $this GreceiptHdrController */
/* @var $model GreceiptHdr */

$this->breadcrumbs=array(
	'Greceipt Hdrs'=>array('index'),
	$model->id_receipt=>array('view','id'=>$model->id_receipt),
	'Update',
);

$this->menu=array(
	array('label'=>'List GreceiptHdr', 'url'=>array('index')),
	array('label'=>'Create GreceiptHdr', 'url'=>array('create')),
	array('label'=>'View GreceiptHdr', 'url'=>array('view', 'id'=>$model->id_receipt)),
	array('label'=>'Manage GreceiptHdr', 'url'=>array('admin')),
);
?>

<h1>Update GreceiptHdr <?php echo $model->id_receipt; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>