<?php
/* @var $this ConfigureController */
/* @var $data Configure */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_conf')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_conf), array('view', 'id'=>$data->id_conf)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conf_name')); ?>:</b>
	<?php echo CHtml::encode($data->conf_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conf_code')); ?>:</b>
	<?php echo CHtml::encode($data->conf_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_by')); ?>:</b>
	<?php echo CHtml::encode($data->update_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_by')); ?>:</b>
	<?php echo CHtml::encode($data->create_by); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	*/ ?>

</div>