<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'mapping-coa-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'trans_type'); ?>
<?php echo $form->textField($model, 'trans_type', array('size' => 20, 'maxlength' => 20)); ?>
<?php echo $form->error($model, 'trans_type'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'mappingname'); ?>
<?php echo $form->textField($model, 'mappingname', array('size' => 20, 'maxlength' => 20)); ?>
<?php echo $form->error($model, 'mappingname'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'id_acc'); ?>
        <?php
        echo $form->dropDownList($model, 'id_acc', fico::acc_list(), array(
            'prompt' => 'Select Account',
        ));
        ?> 
<?php echo $form->error($model, 'id_acc'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'dk'); ?>
<?php echo $form->dropDownList($model, 'dk', array('D' => 'Debet', 'K' => 'Kredit')); ?>
        <?php echo $form->error($model, 'dk'); ?>
    </div>	
    <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->