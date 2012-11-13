<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_pyment'); ?>
		<?php echo $form->textField($model,'id_pyment'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pyment_num'); ?>
		<?php echo $form->textField($model,'pyment_num',array('size'=>13,'maxlength'=>13)); ?>
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
		<?php echo $form->label($model,'pyment_date'); ?>
		<?php echo $form->textField($model,'pyment_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'actual_pyment'); ?>
		<?php echo $form->textField($model,'actual_pyment'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency'); ?>
		<?php echo $form->textField($model,'currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_num'); ?>
		<?php echo $form->textField($model,'ref_num',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'py_method'); ?>
		<?php echo $form->textField($model,'py_method',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deposit_to'); ?>
		<?php echo $form->textField($model,'deposit_to',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cleared'); ?>
		<?php echo $form->checkBox($model,'cleared'); ?>
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
		<?php echo $form->label($model,'update_date'); ?>
		<?php echo $form->textField($model,'update_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_by'); ?>
		<?php echo $form->textField($model,'update_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_customer'); ?>
		<?php echo $form->textField($model,'id_customer'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->