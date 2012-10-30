<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mappingcoa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_mappingcoa), array('view', 'id'=>$data->id_mappingcoa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trans_type')); ?>:</b>
	<?php echo CHtml::encode($data->trans_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mappingname')); ?>:</b>
	<?php echo CHtml::encode($data->mappingname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_acc')); ?>:</b>
	<?php echo CHtml::encode($data->id_acc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dk')); ?>:</b>
	<?php echo CHtml::encode($data->dk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_by')); ?>:</b>
	<?php echo CHtml::encode($data->create_by); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('update_by')); ?>:</b>
	<?php echo CHtml::encode($data->update_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	*/ ?>

</div>