<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_distric')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_distric), array('view', 'id'=>$data->id_distric)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cd_distric')); ?>:</b>
	<?php echo CHtml::encode($data->cd_distric); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nm_distric')); ?>:</b>
	<?php echo CHtml::encode($data->nm_distric); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_by')); ?>:</b>
	<?php echo CHtml::encode($data->create_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('update_by')); ?>:</b>
	<?php echo CHtml::encode($data->update_by); ?>
	<br />

	*/ ?>

</div>