<?php
/* @var $this PriceCatController */
/* @var $model PriceCat */

$this->breadcrumbs=array(
	'Price Cats'=>array('index'),
	$model->id_price_cat=>array('view','id'=>$model->id_price_cat),
	'Update',
);

$this->menu=array(
	array('label'=>'List PriceCat', 'url'=>array('index')),
	array('label'=>'Create PriceCat', 'url'=>array('create')),
	array('label'=>'View PriceCat', 'url'=>array('view', 'id'=>$model->id_price_cat)),
	array('label'=>'Manage PriceCat', 'url'=>array('admin')),
);
?>

<h1>Update PriceCat <?php echo $model->id_price_cat; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>