<?php
/* @var $this GreceiptHdrController */
/* @var $model GreceiptHdr */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'greceipt-hdr-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <fieldset class="formulir">
        <table border="0">
            <tbody>
                <tr>
                    <td><?php echo $form->labelEx($model, 'gr_num'); ?>
                        <?php echo $form->textField($model, 'gr_num', array('size' => 13, 'maxlength' => 13)); ?>
                    </td>
                    <td><?php echo $form->labelEx($model, 'receipt_date'); ?>
                        <?php echo $form->textField($model, 'receipt_date'); ?>
                    </td>
                </tr>
                <tr>
                    <td >
                        <?php echo $form->labelEx($model, 'ref_number'); ?>
                        <?php
                        echo $form->dropDownList($model, 'trans_type', array(), array(
                            'empty' => '-- Doc.Type --',
                            'style' => 'float:left; margin-right:5px;'));
                        ?>  
                        <?php
                        echo $form->textField($model, 'ref_number', array('size' => 16, 'maxlength' => 16, 'style' => 'vertical-align: top; margin-right:5px;'));
                        echo CHtml::imageButton(Yii::app()->theme->baseUrl . '/images/icon_view.png', array('submit' => array('', 'msg' => 'search'), 'style' => 'width:16px;', 'class' => 'btn-orange'));
                        ?>
                    </td>
                    <td><?php echo $form->labelEx($model, 'status'); ?>
                        <?php echo $form->textField($model, 'status'); ?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;">
                        <?php echo $form->labelEx($model, 'id_warehouse', array('style' => 'float:left; padding-right:5px;')); ?>
                        <?php echo $form->labelEx($model, 'id_locator'); ?>
                        <?php
                        $mwhse = Warehouse::model()->findAll();
                        $mlist = CHtml::listData($mwhse, 'id_warehouse', 'nm_whse');
                        echo $form->dropDownList($model, 'id_warehouse', $mlist, array(
                            'empty' => '-- Pilih Warehouse --',
                            'style' => 'float:left; margin-right:5px;',
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('locator/optLocators'),
                                'update' => '#GreceiptHdr_id_locator',
                                )));
                        $mlktr = Locator::model()->findAll();
                        $llist = CHtml::listData($mlktr, 'id_locator', 'nm_locator');
                        echo $form->dropDownList($model, 'id_locator', $llist, array('empty' => '-- Pilih Lokator --'));
                        ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'description'); ?>
                        <?php echo $form->textArea($model, 'description', array('maxlength' => 64, 'style' => 'width: 200px; height: 48px;')); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <?php
    echo $this->renderPartial('_items', array('modeldtl' => $modeldtl));
    ?>
    <div class="tombol">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn-orange')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->