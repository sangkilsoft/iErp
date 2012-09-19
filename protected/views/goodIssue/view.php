<?php
$this->breadcrumbs=array(
	'Good Issues'=>array('index'),
	$model->id_issue,
);

$this->menu=array(
	array('label'=>'List GoodIssue', 'url'=>array('index')),
	array('label'=>'Create GoodIssue', 'url'=>array('create')),
	array('label'=>'Update GoodIssue', 'url'=>array('update', 'id'=>$model->id_issue)),
	array('label'=>'Delete GoodIssue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_issue),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GoodIssue', 'url'=>array('admin')),
);
?>

<h1>View GoodIssue #<?php echo $model->id_issue; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_issue',
		'gi_num',
		'description',
		'status',
		'issue_date',
		'update_date',
		'create_by',
		'update_by',
		'create_date',
	),
)); ?>
