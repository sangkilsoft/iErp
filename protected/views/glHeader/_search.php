<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_glheader'); ?>
		<?php echo $form->textField($model,'id_glheader'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_branch'); ?>
		<?php echo $form->textField($model,'id_branch'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_orgn'); ?>
		<?php echo $form->textField($model,'id_orgn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'refnum'); ?>
		<?php echo $form->textField($model,'refnum',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_trans'); ?>
		<?php echo $form->textField($model,'tgl_trans'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trans_type'); ?>
		<?php echo $form->textField($model,'trans_type',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>128)); ?>
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
		<?php echo $form->textField($model,'create_by',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_by'); ?>
		<?php echo $form->textField($model,'update_by',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->