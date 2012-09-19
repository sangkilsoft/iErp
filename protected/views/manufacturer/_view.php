<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_manfrs')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_manfrs), array('view', 'id'=>$data->id_manfrs)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cd_manf')); ?>:</b>
	<?php echo CHtml::encode($data->cd_manf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nm_manufacturer')); ?>:</b>
	<?php echo CHtml::encode($data->nm_manufacturer); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />


</div>