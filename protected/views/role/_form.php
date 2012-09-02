<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'role-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'role'); ?>
		<?php echo $form->textField($model,'role',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deskripsi'); ?>
		<?php echo $form->textField($model,'deskripsi',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'deskripsi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->