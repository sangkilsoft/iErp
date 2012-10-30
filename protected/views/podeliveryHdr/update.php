<?php
/* @var $this PodeliveryHdrController */
/* @var $model PodeliveryHdr */

$this->breadcrumbs=array(
	'Podelivery Hdrs'=>array('index'),
	$model->id_delivery=>array('view','id'=>$model->id_delivery),
	'Update',
);

$this->menu=array(
	array('label'=>'List PodeliveryHdr', 'url'=>array('index')),
	array('label'=>'Create PodeliveryHdr', 'url'=>array('create')),
	array('label'=>'View PodeliveryHdr', 'url'=>array('view', 'id'=>$model->id_delivery)),
	array('label'=>'Manage PodeliveryHdr', 'url'=>array('admin')),
);
?>

<h1>Update PodeliveryHdr <?php echo $model->id_delivery; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>