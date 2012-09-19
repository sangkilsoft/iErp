<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_supplier')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_supplier), array('view', 'id'=>$data->id_supplier)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cd_supplier')); ?>:</b>
	<?php echo CHtml::encode($data->cd_supplier); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nm_supplier')); ?>:</b>
	<?php echo CHtml::encode($data->nm_supplier); ?>
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


</div>