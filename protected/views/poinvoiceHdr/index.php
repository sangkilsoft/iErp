<?php
/* @var $this PoinvoiceHdrController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Poinvoice Hdrs',
);

$this->menu = array(
    array('label' => 'Create PoinvoiceHdr', 'url' => array('create')),
    array('label' => 'Manage PoinvoiceHdr', 'url' => array('admin')),
);
?>

<h1>Poinvoice Hdrs</h1>
<div class="grid-view" cellpadding="0" cellspacing="0">
    <?php
    $this->widget('application.extensions.MTreeView.MTreeView', 
            array('url' => array('ajaxFillTree'),
            'animated' => 'fast',
            )
    );
    ?>
    <?php
//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//)); 
    ?>
</div>
