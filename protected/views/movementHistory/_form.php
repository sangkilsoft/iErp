<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mv-history-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_movement'); ?>
		<?php echo $form->textField($model,'id_movement'); ?>
		<?php echo $form->error($model,'id_movement'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_locator'); ?>
		<?php echo $form->textField($model,'id_locator'); ?>
		<?php echo $form->error($model,'id_locator'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qty_mvnt'); ?>
		<?php echo $form->textField($model,'qty_mvnt'); ?>
		<?php echo $form->error($model,'qty_mvnt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'val_mvnt'); ?>
		<?php echo $form->textField($model,'val_mvnt'); ?>
		<?php echo $form->error($model,'val_mvnt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qty_current'); ?>
		<?php echo $form->textField($model,'qty_current'); ?>
		<?php echo $form->error($model,'qty_current'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'val_current'); ?>
		<?php echo $form->textField($model,'val_current'); ?>
		<?php echo $form->error($model,'val_current'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'trans_type'); ?>
		<?php echo $form->textField($model,'trans_type',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'trans_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'trans_source'); ?>
		<?php echo $form->textField($model,'trans_source',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'trans_source'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_number'); ?>
		<?php echo $form->textField($model,'ref_number',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'ref_number'); ?>
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