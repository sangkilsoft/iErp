<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'locator-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <fieldset class="formulir">
        <table border="1">
            <tbody>
                <tr>
                    <td>
                        <div class="row">
                            <?php echo $form->labelEx($model, 'cd_locator'); ?>
                            <?php echo $form->textField($model, 'cd_locator', array('size' => 4, 'maxlength' => 4)); ?>

                        </div>
                    </td>
                    <td><div class="row">
                            <?php echo $form->labelEx($model, 'id_warehouse'); ?>
                            <?php
                            $mwhse = Warehouse::model()->findAll();
                            $mlist = CHtml::listData($mwhse, 'id_warehouse', 'nm_whse');
                            echo $form->dropDownList($model, 'id_warehouse', $mlist, array('empty' => '-- Pilih Warehouse --'));
                            ?>
                        </div></td>
                </tr>
                <tr>
                    <td style="vertical-align: top;">
                        <div class="row">
                            <?php echo $form->labelEx($model, 'nm_locator'); ?>
                            <?php echo $form->textField($model, 'nm_locator', array('size' => 32, 'maxlength' => 32)); ?>

                        </div>
                    </td>
                    <td style="vertical-align: top;">
                        <div class="row">
                            <?php echo $form->labelEx($model, 'description'); ?>
                            <?php echo $form->textArea($model, 'description', array('style' => 'width:350px;', 'maxlength' => 64)); ?>
                        </div>
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