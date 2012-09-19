<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-detail-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_customer'); ?>
		<?php echo $form->textField($model,'id_customer'); ?>
		<?php echo $form->error($model,'id_customer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_distric'); ?>
		<?php echo $form->textField($model,'id_distric'); ?>
		<?php echo $form->error($model,'id_distric'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addr2'); ?>
		<?php echo $form->textField($model,'addr2',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'addr2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'latitude'); ?>
		<?php echo $form->textField($model,'latitude'); ?>
		<?php echo $form->error($model,'latitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'longtitude'); ?>
		<?php echo $form->textField($model,'longtitude'); ?>
		<?php echo $form->error($model,'longtitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_by'); ?>
		<?php echo $form->textField($model,'create_by'); ?>
		<?php echo $form->error($model,'create_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date'); ?>
		<?php echo $form->error($model,'update_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_by'); ?>
		<?php echo $form->textField($model,'update_by'); ?>
		<?php echo $form->error($model,'update_by'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->