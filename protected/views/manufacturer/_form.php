<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'manufacturer-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <fieldset class="formulir">
        <div class="row">
            <?php echo $form->labelEx($model, 'cd_manf'); ?>
            <?php echo $form->textField($model, 'cd_manf', array('size' => 4, 'maxlength' => 4)); ?>
            <?php echo $form->error($model, 'cd_manf'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'nm_manufacturer'); ?>
            <?php echo $form->textField($model, 'nm_manufacturer', array('size' => 32, 'maxlength' => 32)); ?>
            <?php echo $form->error($model, 'nm_manufacturer'); ?>
        </div>

    </fieldset>
    <div class="tombol">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn-orange')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->