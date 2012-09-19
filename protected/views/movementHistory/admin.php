<?php
$this->breadcrumbs=array(
	'Mv Histories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MvHistory', 'url'=>array('index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mv-history-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Mv Histories</h1>

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
	'id'=>'mv-history-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_movement',
		'id_locator',
		'qty_mvnt',
		'val_mvnt',
		'qty_current',
		'val_current',
		/*
		'trans_type',
		'trans_source',
		'ref_number',
		'update_date',
		'create_by',
		'update_by',
		'create_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
