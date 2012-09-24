<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'product-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <fieldset class="formulir">
        <table border="0">
            <tbody>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'cd_product'); ?>
                        <?php echo $form->textField($model, 'cd_product', array('size' => 13, 'maxlength' => 13)); ?>

                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'id_manfrs'); ?>
                        <?php echo $form->textField($model, 'id_manfrs'); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'id_uoms'); ?>
                        <?php echo $form->textField($model, 'id_uoms'); ?></td>
                    <td>
                        <?php echo $form->labelEx($model, 'id_groups'); ?>
                        <?php echo $form->textField($model, 'id_groups'); ?></td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'id_category'); ?>
                        <?php echo $form->textField($model, 'id_category'); ?></td>
                    <td>
                        <?php echo $form->labelEx($model, 'nm_product'); ?>
                        <?php echo $form->textField($model, 'nm_product', array('size' => 48, 'maxlength' => 64)); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <div class="tombol">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn-orange')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->