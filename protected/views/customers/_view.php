<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_customer')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_customer), array('view', 'id'=>$data->id_customer)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cd_cust')); ?>:</b>
	<?php echo CHtml::encode($data->cd_cust); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nm_cust')); ?>:</b>
	<?php echo CHtml::encode($data->nm_cust); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ctype')); ?>:</b>
	<?php echo CHtml::encode($data->id_ctype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cclass')); ?>:</b>
	<?php echo CHtml::encode($data->id_cclass); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addrs')); ?>:</b>
	<?php echo CHtml::encode($data->addrs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_name')); ?>:</b>
	<?php echo CHtml::encode($data->contact_name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_number')); ?>:</b>
	<?php echo CHtml::encode($data->contact_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
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

	*/ ?>

</div>