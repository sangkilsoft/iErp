<?php
/* @var $this GreceiptHdrController */
/* @var $model GreceiptHdr */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'greceipt-hdr-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'gr_num'); ?>
		<?php echo $form->textField($model,'gr_num',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'gr_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_orgn'); ?>
		<?php echo $form->textField($model,'id_orgn'); ?>
		<?php echo $form->error($model,'id_orgn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_branch'); ?>
		<?php echo $form->textField($model,'id_branch'); ?>
		<?php echo $form->error($model,'id_branch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_warehouse'); ?>
		<?php echo $form->textField($model,'id_warehouse'); ?>
		<?php echo $form->error($model,'id_warehouse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_locator'); ?>
		<?php echo $form->textField($model,'id_locator'); ?>
		<?php echo $form->error($model,'id_locator'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'trans_type'); ?>
		<?php echo $form->textField($model,'trans_type'); ?>
		<?php echo $form->error($model,'trans_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_number'); ?>
		<?php echo $form->textField($model,'ref_number',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'ref_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receipt_date'); ?>
		<?php echo $form->textField($model,'receipt_date'); ?>
		<?php echo $form->error($model,'receipt_date'); ?>
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