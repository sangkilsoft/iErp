<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cd_acc'); ?>
		<?php echo $form->textField($model,'cd_acc',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cd_acc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nm_acc'); ?>
		<?php echo $form->textField($model,'nm_acc',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nm_acc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'acc_normal'); ?>
		<?php echo $form->textField($model,'acc_normal',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'acc_normal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent'); ?>
		<?php echo $form->textField($model,'parent'); ?>
		<?php echo $form->error($model,'parent'); ?>
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