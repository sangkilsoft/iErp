<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-role-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <fieldset class="formulir">
        <div class="row">
            <?php echo $form->labelEx($model, 'user_id'); ?>
            <?php echo $form->textField($model, 'user_id'); ?>
            <?php echo $form->error($model, 'user_id'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'role_id'); ?>
            <?php echo $form->textField($model, 'role_id'); ?>
            <?php echo $form->error($model, 'role_id'); ?>
        </div>
    </fieldset>
    <div class="tombol">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn-orange')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->