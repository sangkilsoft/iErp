<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'suppliers-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <fieldset class="formulir">
        <table border="0">
            <tr>
                <td >
                    <?php echo $form->labelEx($model, 'cd_supplier'); ?>
                    <?php echo $form->textField($model, 'cd_supplier', array('size' => 4, 'maxlength' => 4)); ?>
                </td>
            </tr>
            <tr>
                <td >
                    <?php echo $form->labelEx($model, 'nm_supplier'); ?>
                    <?php echo $form->textField($model, 'nm_supplier', array('size' => 32, 'maxlength' => 32)); ?>
                </td>
            </tr>
        </table>
    </fieldset>

    <div class="tombol">
        <?php
        echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn-orange'));
        ?> 
    </div>  
    <?php $this->endWidget(); ?>

</div><!-- form -->