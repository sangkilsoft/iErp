<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'customer-type-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <fieldset class="formulir">
        <div class="row">
            <?php echo $form->labelEx($model, 'cd_ctype'); ?>
            <?php echo $form->textField($model, 'cd_ctype', array('size' => 4, 'maxlength' => 4)); ?>
            <?php echo $form->labelEx($model, 'nm_ctype'); ?>
            <?php echo $form->textField($model, 'nm_ctype', array('size' => 32, 'maxlength' => 32)); ?>
        </div>
    </fieldset>
    <div class="tombol">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->