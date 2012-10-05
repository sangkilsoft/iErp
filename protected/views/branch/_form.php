<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'branch-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <fieldset class="formulir">
        <div class="row">
            <?php echo $form->labelEx($model, 'id_orgn'); ?>
            <?php
            $orgn = Organization::model()->findAll();
            $olist = CHtml::listData($orgn, 'id_orgn', 'nm_orgn');
            echo $form->dropDownList($model, 'id_orgn', $olist, array('empty' => '-- Pilih Organisasi --'));
            ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'cd_branch'); ?>
            <?php echo $form->textField($model, 'cd_branch', array('size' => 4, 'maxlength' => 4)); ?>
            <?php echo $form->error($model, 'cd_branch'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'nm_branch'); ?>
            <?php echo $form->textField($model, 'nm_branch', array('size' => 32, 'maxlength' => 32)); ?>
            <?php echo $form->error($model, 'nm_branch'); ?>
        </div>
    </fieldset>
    <div class="tombol">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn-orange')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->