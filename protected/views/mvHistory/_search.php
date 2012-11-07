<?php
/* @var $this MvHistoryController */
/* @var $model MvHistory */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_movement'); ?>
		<?php echo $form->textField($model,'id_movement'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_locator'); ?>
		<?php echo $form->textField($model,'id_locator'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_branch'); ?>
		<?php echo $form->textField($model,'id_branch'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_orgn'); ?>
		<?php echo $form->textField($model,'id_orgn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_product'); ?>
		<?php echo $form->textField($model,'id_product'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qty_mvnt'); ?>
		<?php echo $form->textField($model,'qty_mvnt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'val_mvnt'); ?>
		<?php echo $form->textField($model,'val_mvnt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qty_current'); ?>
		<?php echo $form->textField($model,'qty_current'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'val_current'); ?>
		<?php echo $form->textField($model,'val_current'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trans_type'); ?>
		<?php echo $form->textField($model,'trans_type',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trans_source'); ?>
		<?php echo $form->textField($model,'trans_source',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_number'); ?>
		<?php echo $form->textField($model,'ref_number',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_by'); ?>
		<?php echo $form->textField($model,'create_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_by'); ?>
		<?php echo $form->textField($model,'update_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->