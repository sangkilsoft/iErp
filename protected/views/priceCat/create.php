<?php
/* @var $this PriceCatController */
/* @var $model PriceCat */

$this->breadcrumbs=array(
	'Price Cats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PriceCat', 'url'=>array('index')),
	array('label'=>'Manage PriceCat', 'url'=>array('admin')),
);
?>

<h1>Create PriceCat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>