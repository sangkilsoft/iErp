<?php
$this->breadcrumbs=array(
	'Gl Headers',
);

$this->menu=array(
	array('label'=>'Create GlHeader', 'url'=>array('create')),
	array('label'=>'Manage GlHeader', 'url'=>array('admin')),
);
?>

<h1>Laporan Jurnal</h1>
<?php echo $this->renderPartial('_formrptBulan'); ?>
