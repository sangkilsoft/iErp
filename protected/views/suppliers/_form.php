<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suppliers-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        <fieldset>
	<div class="row">
		<?php echo $form->labelEx($model,'cd_supplier'); ?>
		<?php echo $form->textField($model,'cd_supplier',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'cd_supplier'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nm_supplier'); ?>
		<?php echo $form->textField($model,'nm_supplier',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'nm_supplier'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
        </fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->