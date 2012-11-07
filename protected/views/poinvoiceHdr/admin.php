<?php
/* @var $this PoinvoiceHdrController */
/* @var $model PoinvoiceHdr */

$this->breadcrumbs=array(
	'Poinvoice Hdrs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PoinvoiceHdr', 'url'=>array('index')),
	array('label'=>'Create PoinvoiceHdr', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('poinvoice-hdr-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Poinvoice Hdrs</h1>

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
	'id'=>'poinvoice-hdr-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_invoice',
		'invoice_num',
		'id_delivery',
		'id_orgn',
		'id_branch',
		'id_supplier',
		/*
		'description',
		'total_value',
		'total_discount',
		'total_tax',
		'total_paid',
		'status',
		'date_limit',
		'update_date',
		'create_date',
		'create_by',
		'update_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
