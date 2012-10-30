<?php
/* @var $this PodeliveryHdrController */
/* @var $model PodeliveryHdr */

$this->breadcrumbs = array(
    'Podelivery Hdrs' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List PodeliveryHdr', 'url' => array('index')),
    array('label' => 'Create PodeliveryHdr', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('podelivery-hdr-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Podelivery Hdrs</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'podelivery-hdr-grid',
    'dataProvider' => $model->search(),
    //'filter' => $model,
    'columns' => array(
        array('header' => 'No',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row + 1)',
            'htmlOptions' => array('align' => 'center')),
        'do_num',
        'dosuppliers.nm_supplier',
        'description',
        'create_date',
        /*
          'id_delivery',
          'id_orgn',
          'id_branch',
          'po_num',
          'gr_num',
          'status',
          'create_by',
          'update_date',
          'update_by',
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
