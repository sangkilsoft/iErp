<?php
/* @var $this GreceiptHdrController */
/* @var $model GreceiptHdr */

$this->breadcrumbs=array(
	'Greceipt Hdrs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GreceiptHdr', 'url'=>array('index')),
	array('label'=>'Manage GreceiptHdr', 'url'=>array('admin')),
);
?>

<h1>Create GreceiptHdr</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modeldtl' => $modeldtl)); ?>