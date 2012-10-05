<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_gldetail')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_gldetail), array('view', 'id'=>$data->id_gldetail)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_glheader')); ?>:</b>
	<?php echo CHtml::encode($data->id_glheader); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_acc')); ?>:</b>
	<?php echo CHtml::encode($data->id_acc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debet')); ?>:</b>
	<?php echo CHtml::encode($data->debet); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kredit')); ?>:</b>
	<?php echo CHtml::encode($data->kredit); ?>
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

	*/ ?>

</div>