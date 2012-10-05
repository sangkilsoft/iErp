<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_acc')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_acc), array('view', 'id'=>$data->id_acc)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cd_acc')); ?>:</b>
	<?php echo CHtml::encode($data->cd_acc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nm_acc')); ?>:</b>
	<?php echo CHtml::encode($data->nm_acc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acc_normal')); ?>:</b>
	<?php echo CHtml::encode($data->acc_normal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent')); ?>:</b>
	<?php echo CHtml::encode($data->parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_by')); ?>:</b>
	<?php echo CHtml::encode($data->update_by); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('create_by')); ?>:</b>
	<?php echo CHtml::encode($data->create_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	*/ ?>

</div>