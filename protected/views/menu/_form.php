<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'menu-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php
    echo $form->errorSummary($model);
    ?>
    <fieldset class="formulir">
        <div class="row">
            <?php
            echo $form->labelEx($model, 'parent_id');
            echo $form->textField($model, 'parent_id');
            echo $form->error($model, 'parent_id');
            ?>
        </div>

        <div class="row">
            <?php
            echo $form->labelEx($model, 'label');
            echo $form->textField($model, 'label', array('size' => 60, 'maxlength' => 128));
            echo $form->error($model, 'label');
            ?>
        </div>

        <div class="row">
            <?php
            echo $form->labelEx($model, 'url');
            echo $form->textField($model, 'url', array('size' => 60, 'maxlength' => 128));
            echo $form->error($model, 'url');
            ?>
        </div>

        <div class="row">
            <?php
            echo $form->labelEx($model, 'urutan');
            echo $form->textField($model, 'urutan');
            echo $form->error($model, 'urutan');
            ?>
        </div>
    </fieldset>

    <div class="tombol">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn-orange')); ?>
    </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->