<?php
/* @var $this PoinvoiceHdrController */
/* @var $model PoinvoiceHdr */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'poinvoice-hdr-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <fieldset class="formulir">
        <table border="0">
            <tbody>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'invoice_num'); ?>
                        <?php echo $form->textField($model, 'invoice_num', array('size' => 13, 'maxlength' => 13)); ?>

                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'total_value'); ?>
                        <?php echo $form->textField($model, 'total_value'); ?>
                    </td>

                    <td>        
                        <?php echo $form->labelEx($model, 'status'); ?>
                        <?php echo $form->textField($model, 'status'); ?>
                    </td>
                </tr>
                <tr>
                    <td> 
                        <?php echo $form->labelEx($model, 'id_delivery'); ?>
                        <?php echo $form->textField($model, 'id_delivery'); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'total_discount'); ?>
                        <?php echo $form->textField($model, 'total_discount'); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'id_supplier'); ?>
                        <?php echo $form->textField($model, 'id_supplier'); ?>
                    </td>
                </tr>
                <tr>
                    <td>       
                        <?php echo $form->labelEx($model, 'date_limit'); ?>
                        <?php echo $form->textField($model, 'date_limit'); ?>
                    </td>
                    <td>        
                        <?php echo $form->labelEx($model, 'total_tax'); ?>
                        <?php echo $form->textField($model, 'total_tax'); ?></td>

                    <td>       
                        <?php echo $form->labelEx($model, 'total_paid'); ?>
                        <?php echo $form->textField($model, 'total_paid'); ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <?php echo $form->labelEx($model, 'description'); ?>
                        <?php echo $form->textArea($model, 'description', array('size' => 60, 'maxlength' => 64)); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <div class="tombol">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->