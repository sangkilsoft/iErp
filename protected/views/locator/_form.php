<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'locator-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        <fieldset>
	<div class="row">
		<?php echo $form->labelEx($model,'cd_locator'); ?>
		<?php echo $form->textField($model,'cd_locator',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'cd_locator'); ?>
	</div>
            
	<div class="row">
		<?php echo $form->labelEx($model,'id_warehouse'); ?>
		<?php echo $form->textField($model,'id_warehouse'); ?>
		<?php echo $form->error($model,'id_warehouse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nm_locator'); ?>
		<?php echo $form->textField($model,'nm_locator',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'nm_locator'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
            
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
        </fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->