<?php
$this->breadcrumbs=array(
	'Sinvoice Payments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SinvoicePayment', 'url'=>array('index')),
	array('label'=>'Create SinvoicePayment', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('sinvoice-payment-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sinvoice Payments</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sinvoice-payment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_pyment',
		'pyment_num',
		'id_branch',
		'id_orgn',
		'pyment_date',
		'actual_pyment',
		/*
		'currency',
		'ref_num',
		'py_method',
		'deposit_to',
		'cleared',
		'create_date',
		'create_by',
		'update_date',
		'update_by',
		'id_customer',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
