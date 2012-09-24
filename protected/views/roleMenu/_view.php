<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rolemn')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rolemn), array('view', 'id'=>$data->id_rolemn)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role_id')); ?>:</b>
	<?php echo CHtml::encode($data->role->deskripsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_id')); ?>:</b>
	<?php echo CHtml::encode($data->menu->label); ?>
	<br />


</div>