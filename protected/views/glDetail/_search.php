<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_gldetail'); ?>
		<?php echo $form->textField($model,'id_gldetail'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_glheader'); ?>
		<?php echo $form->textField($model,'id_glheader'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_acc'); ?>
		<?php echo $form->textField($model,'id_acc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'debet'); ?>
		<?php echo $form->textField($model,'debet'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kredit'); ?>
		<?php echo $form->textField($model,'kredit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_by'); ?>
		<?php echo $form->textField($model,'update_by',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_by'); ?>
		<?php echo $form->textField($model,'create_by',array('size'=>10,'maxlength'=>10)); ?>
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