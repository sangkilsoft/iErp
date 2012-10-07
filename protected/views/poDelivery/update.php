<?php
$this->breadcrumbs=array(
	'Po Deliveries'=>array('index'),
	$model->id_delivery=>array('view','id'=>$model->id_delivery),
	'Update',
);

$this->menu=array(
	array('label'=>'List PoDelivery', 'url'=>array('index')),
	array('label'=>'Create PoDelivery', 'url'=>array('create')),
	array('label'=>'View PoDelivery', 'url'=>array('view', 'id'=>$model->id_delivery)),
	array('label'=>'Manage PoDelivery', 'url'=>array('admin')),
);
?>

<h1>Update PoDelivery <?php echo $model->id_delivery; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>