<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cd_whse')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cd_whse), array('view', 'id'=>$data->cd_whse)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nm_whse')); ?>:</b>
	<?php echo CHtml::encode($data->nm_whse); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_by')); ?>:</b>
	<?php echo CHtml::encode($data->create_by); ?>
	<br />


</div>