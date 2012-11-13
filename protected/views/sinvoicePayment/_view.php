<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pyment')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pyment), array('view', 'id'=>$data->id_pyment)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pyment_num')); ?>:</b>
	<?php echo CHtml::encode($data->pyment_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_branch')); ?>:</b>
	<?php echo CHtml::encode($data->id_branch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_orgn')); ?>:</b>
	<?php echo CHtml::encode($data->id_orgn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pyment_date')); ?>:</b>
	<?php echo CHtml::encode($data->pyment_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actual_pyment')); ?>:</b>
	<?php echo CHtml::encode($data->actual_pyment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency')); ?>:</b>
	<?php echo CHtml::encode($data->currency); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_num')); ?>:</b>
	<?php echo CHtml::encode($data->ref_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('py_method')); ?>:</b>
	<?php echo CHtml::encode($data->py_method); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deposit_to')); ?>:</b>
	<?php echo CHtml::encode($data->deposit_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cleared')); ?>:</b>
	<?php echo CHtml::encode($data->cleared); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_customer')); ?>:</b>
	<?php echo CHtml::encode($data->id_customer); ?>
	<br />

	*/ ?>

</div>