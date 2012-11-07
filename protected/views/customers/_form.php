<?php
/* @var $this CustomersController */
/* @var $model Customers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customers-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cd_cust'); ?>
		<?php echo $form->textField($model,'cd_cust',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'cd_cust'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nm_cust'); ?>
		<?php echo $form->textField($model,'nm_cust',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nm_cust'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_ctype'); ?>
		<?php echo $form->textField($model,'id_ctype'); ?>
		<?php echo $form->error($model,'id_ctype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_cclass'); ?>
		<?php echo $form->textField($model,'id_cclass'); ?>
		<?php echo $form->error($model,'id_cclass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_name'); ?>
		<?php echo $form->textField($model,'contact_name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'contact_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_number'); ?>
		<?php echo $form->textField($model,'contact_number',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'contact_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
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
		<?php echo $form->labelEx($model,'update_by'); ?>
		<?php echo $form->textField($model,'update_by'); ?>
		<?php echo $form->error($model,'update_by'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->