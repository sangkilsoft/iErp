<?php
/* @var $this CogsController */
/* @var $model Cogs */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_cogs'); ?>
		<?php echo $form->textField($model,'id_cogs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_product'); ?>
		<?php echo $form->textField($model,'id_product'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_orgn'); ?>
		<?php echo $form->textField($model,'id_orgn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_branch'); ?>
		<?php echo $form->textField($model,'id_branch'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cogs'); ?>
		<?php echo $form->textField($model,'cogs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_by'); ?>
		<?php echo $form->textField($model,'update_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_by'); ?>
		<?php echo $form->textField($model,'create_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->