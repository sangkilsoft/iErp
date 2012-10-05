<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_branch')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_branch), array('view', 'id'=>$data->id_branch)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cd_branch')); ?>:</b>
	<?php echo CHtml::encode($data->cd_branch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nm_branch')); ?>:</b>
	<?php echo CHtml::encode($data->nm_branch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_orgn')); ?>:</b>
	<?php echo CHtml::encode($data->id_orgn); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('create_by')); ?>:</b>
	<?php echo CHtml::encode($data->create_by); ?>
	<br />

	*/ ?>

</div>