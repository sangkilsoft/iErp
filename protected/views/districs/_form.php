<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'districs-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <fieldset class="formulir">
        <div class="row">
            <?php echo $form->labelEx($model, 'cd_distric'); ?>
            <?php echo $form->textField($model, 'cd_distric', array('size' => 4, 'maxlength' => 4)); ?>
            <?php echo $form->error($model, 'cd_distric'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'nm_distric'); ?>
            <?php echo $form->textField($model, 'nm_distric', array('size' => 32, 'maxlength' => 32)); ?>
            <?php echo $form->error($model, 'nm_distric'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'description'); ?>
            <?php echo $form->textField($model, 'description', array('size' => 60, 'maxlength' => 64)); ?>
            <?php echo $form->error($model, 'description'); ?>
        </div>
    </fieldset>

    <div class="tombol">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn-orange')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->