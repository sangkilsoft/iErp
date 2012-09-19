<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_locator')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_locator), array('view', 'id'=>$data->id_locator)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_warehouse')); ?>:</b>
	<?php echo CHtml::encode($data->id_warehouse); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cd_locator')); ?>:</b>
	<?php echo CHtml::encode($data->cd_locator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nm_locator')); ?>:</b>
	<?php echo CHtml::encode($data->nm_locator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('latitude')); ?>:</b>
	<?php echo CHtml::encode($data->latitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longitude')); ?>:</b>
	<?php echo CHtml::encode($data->longitude); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('capacity')); ?>:</b>
	<?php echo CHtml::encode($data->capacity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_by')); ?>:</b>
	<?php echo CHtml::encode($data->create_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_by')); ?>:</b>
	<?php echo CHtml::encode($data->update_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	*/ ?>

</div>