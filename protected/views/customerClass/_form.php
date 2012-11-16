<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-class-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cd_cclass'); ?>
		<?php echo $form->textField($model,'cd_cclass',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'cd_cclass'); ?>
                <?php echo '<br>'; ?>
		<?php echo $form->labelEx($model,'nm_cclass'); ?>
		<?php echo $form->textField($model,'nm_cclass',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'nm_cclass'); ?>
	</div>

	<div class="tombol">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->