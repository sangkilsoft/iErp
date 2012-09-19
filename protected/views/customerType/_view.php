<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ctype')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ctype), array('view', 'id'=>$data->id_ctype)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cd_ctype')); ?>:</b>
	<?php echo CHtml::encode($data->cd_ctype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_by')); ?>:</b>
	<?php echo CHtml::encode($data->create_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nm_ctype')); ?>:</b>
	<?php echo CHtml::encode($data->nm_ctype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_by')); ?>:</b>
	<?php echo CHtml::encode($data->update_by); ?>
	<br />


</div>