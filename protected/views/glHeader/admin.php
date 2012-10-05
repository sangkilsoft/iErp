<?php
$this->breadcrumbs=array(
	'Gl Headers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GlHeader', 'url'=>array('index')),
	array('label'=>'Create GlHeader', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('gl-header-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Gl Headers</h1>

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
	'id'=>'gl-header-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_glheader',
		'id_branch',
		'id_orgn',
		'refnum',
		'tgl_trans',
		'trans_type',
		/*
		'description',
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
