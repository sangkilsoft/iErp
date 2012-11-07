<?php
$this->breadcrumbs=array(
	'Gl Periodes',
);

$this->menu=array(
	array('label'=>'Create GlPeriode', 'url'=>array('create')),
	array('label'=>'Manage GlPeriode', 'url'=>array('admin')),
        array('label'=>'Report GlPeriode', 'url'=>array('showPDF')),
);
?>

<h1>Gl Periodes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
