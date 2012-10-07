<?php
$this->breadcrumbs=array(
	'Po Deliveries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PoDelivery', 'url'=>array('index')),
	array('label'=>'Manage PoDelivery', 'url'=>array('admin')),
);
?>

<h1>Purchasing Delivery</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modeldtl'=>$modeldtl)); ?>