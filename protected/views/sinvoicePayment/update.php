<?php
$this->breadcrumbs=array(
	'Sinvoice Payments'=>array('index'),
	$model->id_pyment=>array('view','id'=>$model->id_pyment),
	'Update',
);

$this->menu=array(
	array('label'=>'List SinvoicePayment', 'url'=>array('index')),
	array('label'=>'Create SinvoicePayment', 'url'=>array('create')),
	array('label'=>'View SinvoicePayment', 'url'=>array('view', 'id'=>$model->id_pyment)),
	array('label'=>'Manage SinvoicePayment', 'url'=>array('admin')),
);
?>

<h1>Update SinvoicePayment <?php echo $model->id_pyment; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>