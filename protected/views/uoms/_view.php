<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_uoms')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_uoms), array('view', 'id'=>$data->id_uoms)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cd_uom')); ?>:</b>
	<?php echo CHtml::encode($data->cd_uom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_by')); ?>:</b>
	<?php echo CHtml::encode($data->update_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nm_uom')); ?>:</b>
	<?php echo CHtml::encode($data->nm_uom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_by')); ?>:</b>
	<?php echo CHtml::encode($data->create_by); ?>
	<br />


</div>