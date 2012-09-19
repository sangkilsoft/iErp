<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->id_product=>array('view','id'=>$model->id_product),
	'Update',
);

$this->menu=array(
	array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Product', 'url'=>array('create')),
	array('label'=>'View Product', 'url'=>array('view', 'id'=>$model->id_product)),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
?>

<h1>Update Product <?php echo $model->id_product; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>