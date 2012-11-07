<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gl-periode-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model,$mdl); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bulan'); ?>
		<?php echo $form->textField($model,'bulan'); ?>
		<?php echo $form->error($model,'bulan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun'); ?>
		<?php echo $form->textField($model,'tahun'); ?>
		<?php echo $form->error($model,'tahun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_branch'); ?>
		<?php echo $form->textField($model,'id_branch'); ?>
		<?php echo $form->error($model,'id_branch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_orgn'); ?>
		<?php echo $form->textField($model,'id_orgn'); ?>
		<?php echo $form->error($model,'id_orgn'); ?>
	</div>
	
	<div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('name'=>'btnSimpan')); ?>
            <?php echo CHtml::submitButton('Check',array('name'=>'btnCek')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php 
if(!empty ($mdl)){
$this->widget('zii.widgets.grid.CGridView', array( 
            'dataProvider'=>$mdl, 
            'template'=>'{items}',
            'columns'=>array( 
                array(
                        'header'=>'No.',
                        'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
        //      'trade_done_id',
                'cd_acc',
                'nm_acc',
                'saldo',
                'debet',
                'kredit',
            )
        ));
}
?>