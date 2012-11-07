<?php
/* @var $this MvHistoryController */
/* @var $data MvHistory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_movement')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_movement), array('view', 'id'=>$data->id_movement)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_locator')); ?>:</b>
	<?php echo CHtml::encode($data->id_locator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_branch')); ?>:</b>
	<?php echo CHtml::encode($data->id_branch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_orgn')); ?>:</b>
	<?php echo CHtml::encode($data->id_orgn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product')); ?>:</b>
	<?php echo CHtml::encode($data->id_product); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qty_mvnt')); ?>:</b>
	<?php echo CHtml::encode($data->qty_mvnt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('val_mvnt')); ?>:</b>
	<?php echo CHtml::encode($data->val_mvnt); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('qty_current')); ?>:</b>
	<?php echo CHtml::encode($data->qty_current); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('val_current')); ?>:</b>
	<?php echo CHtml::encode($data->val_current); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trans_type')); ?>:</b>
	<?php echo CHtml::encode($data->trans_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trans_source')); ?>:</b>
	<?php echo CHtml::encode($data->trans_source); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_number')); ?>:</b>
	<?php echo CHtml::encode($data->ref_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_by')); ?>:</b>
	<?php echo CHtml::encode($data->create_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_by')); ?>:</b>
	<?php echo CHtml::encode($data->update_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	*/ ?>

</div>