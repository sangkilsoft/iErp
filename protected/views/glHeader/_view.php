<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_glheader')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_glheader), array('view', 'id'=>$data->id_glheader)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_branch')); ?>:</b>
	<?php echo CHtml::encode($data->id_branch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_orgn')); ?>:</b>
	<?php echo CHtml::encode($data->id_orgn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('refnum')); ?>:</b>
	<?php echo CHtml::encode($data->refnum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_trans')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_trans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trans_type')); ?>:</b>
	<?php echo CHtml::encode($data->trans_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_by')); ?>:</b>
	<?php echo CHtml::encode($data->create_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_by')); ?>:</b>
	<?php echo CHtml::encode($data->update_by); ?>
	<br />

	*/ ?>

</div>