<?php
$this->breadcrumbs=array(
	'Po Deliveries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PoDelivery', 'url'=>array('index')),
	array('label'=>'Create PoDelivery', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('po-delivery-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Po Deliveries</h1>

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
	'id'=>'po-delivery-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_delivery',
		'do_num',
		'id_supplier',
		'id_orgn',
		'id_branch',
		'description',
		/*
		'id_warehouse',
		'ref_number',
		'status',
		'create_by',
		'create_date',
		'update_date',
		'update_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
