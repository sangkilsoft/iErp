<?php
/* @var $this PoinvoiceHdrController */
/* @var $data PoinvoiceHdr */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_invoice')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_invoice), array('view', 'id'=>$data->id_invoice)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_num')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_delivery')); ?>:</b>
	<?php echo CHtml::encode($data->id_delivery); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_orgn')); ?>:</b>
	<?php echo CHtml::encode($data->id_orgn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_branch')); ?>:</b>
	<?php echo CHtml::encode($data->id_branch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_supplier')); ?>:</b>
	<?php echo CHtml::encode($data->id_supplier); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('total_value')); ?>:</b>
	<?php echo CHtml::encode($data->total_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_discount')); ?>:</b>
	<?php echo CHtml::encode($data->total_discount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_tax')); ?>:</b>
	<?php echo CHtml::encode($data->total_tax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_paid')); ?>:</b>
	<?php echo CHtml::encode($data->total_paid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_limit')); ?>:</b>
	<?php echo CHtml::encode($data->date_limit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_by')); ?>:</b>
	<?php echo CHtml::encode($data->create_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_by')); ?>:</b>
	<?php echo CHtml::encode($data->update_by); ?>
	<br />

	*/ ?>

</div>