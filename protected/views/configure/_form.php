<?php
/* @var $this ConfigureController */
/* @var $model Configure */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'configure-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'conf_name'); ?>
		<?php echo $form->textField($model,'conf_name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'conf_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'conf_code'); ?>
		<?php echo $form->textField($model,'conf_code',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'conf_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_by'); ?>
		<?php echo $form->textField($model,'update_by'); ?>
		<?php echo $form->error($model,'update_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date'); ?>
		<?php echo $form->error($model,'update_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_by'); ?>
		<?php echo $form->textField($model,'create_by'); ?>
		<?php echo $form->error($model,'create_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->