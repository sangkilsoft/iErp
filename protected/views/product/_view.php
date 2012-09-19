<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_product')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_product), array('view', 'id'=>$data->id_product)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cd_product')); ?>:</b>
	<?php echo CHtml::encode($data->cd_product); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nm_product')); ?>:</b>
	<?php echo CHtml::encode($data->nm_product); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_by')); ?>:</b>
	<?php echo CHtml::encode($data->create_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_by')); ?>:</b>
	<?php echo CHtml::encode($data->update_by); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_manfrs')); ?>:</b>
	<?php echo CHtml::encode($data->id_manfrs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_uoms')); ?>:</b>
	<?php echo CHtml::encode($data->id_uoms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_groups')); ?>:</b>
	<?php echo CHtml::encode($data->id_groups); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_category')); ?>:</b>
	<?php echo CHtml::encode($data->id_category); ?>
	<br />

	*/ ?>

</div>