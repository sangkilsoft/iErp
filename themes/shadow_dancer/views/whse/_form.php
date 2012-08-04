<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'whse-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cd_whse'); ?>
		<?php echo $form->textField($model,'cd_whse',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'cd_whse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nm_whse'); ?>
		<?php echo $form->textField($model,'nm_whse',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'nm_whse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_by'); ?>
		<?php echo $form->textField($model,'create_by'); ?>
		<?php echo $form->error($model,'create_by'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->