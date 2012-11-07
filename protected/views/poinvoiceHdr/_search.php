<?php
/* @var $this PoinvoiceHdrController */
/* @var $model PoinvoiceHdr */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_invoice'); ?>
		<?php echo $form->textField($model,'id_invoice'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invoice_num'); ?>
		<?php echo $form->textField($model,'invoice_num',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_delivery'); ?>
		<?php echo $form->textField($model,'id_delivery'); ?>
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
		<?php echo $form->label($model,'id_supplier'); ?>
		<?php echo $form->textField($model,'id_supplier'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_value'); ?>
		<?php echo $form->textField($model,'total_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_discount'); ?>
		<?php echo $form->textField($model,'total_discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_tax'); ?>
		<?php echo $form->textField($model,'total_tax'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_paid'); ?>
		<?php echo $form->textField($model,'total_paid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_limit'); ?>
		<?php echo $form->textField($model,'date_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_by'); ?>
		<?php echo $form->textField($model,'create_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_by'); ?>
		<?php echo $form->textField($model,'update_by'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->