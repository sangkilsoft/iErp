<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gl-detail-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_glheader'); ?>
		<?php echo $form->textField($model,'id_glheader'); ?>
		<?php echo $form->error($model,'id_glheader'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_acc'); ?>
		<?php echo $form->textField($model,'id_acc'); ?>
		<?php echo $form->error($model,'id_acc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debet'); ?>
		<?php echo $form->textField($model,'debet'); ?>
		<?php echo $form->error($model,'debet'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kredit'); ?>
		<?php echo $form->textField($model,'kredit'); ?>
		<?php echo $form->error($model,'kredit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_by'); ?>
		<?php echo $form->textField($model,'update_by',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'update_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_by'); ?>
		<?php echo $form->textField($model,'create_by',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'create_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date'); ?>
		<?php echo $form->error($model,'update_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->