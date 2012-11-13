<?php
$this->breadcrumbs=array(
	'Sinvoice Payments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SinvoicePayment', 'url'=>array('index')),
	array('label'=>'Manage SinvoicePayment', 'url'=>array('admin')),
);
?>

<h1>Create SinvoicePayment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>