<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        <fieldset>
	<div class="row">
		<?php echo $form->labelEx($model,'cd_product'); ?>
		<?php echo $form->textField($model,'cd_product',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'cd_product'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nm_product'); ?>
		<?php echo $form->textField($model,'nm_product',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nm_product'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_manfrs'); ?>
		<?php echo $form->textField($model,'id_manfrs'); ?>
		<?php echo $form->error($model,'id_manfrs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_uoms'); ?>
		<?php echo $form->textField($model,'id_uoms'); ?>
		<?php echo $form->error($model,'id_uoms'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_groups'); ?>
		<?php echo $form->textField($model,'id_groups'); ?>
		<?php echo $form->error($model,'id_groups'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_category'); ?>
		<?php echo $form->textField($model,'id_category'); ?>
		<?php echo $form->error($model,'id_category'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
        </fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->