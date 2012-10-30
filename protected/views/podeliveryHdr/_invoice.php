<?php
/* @var $this PoinvoiceHdrController */
/* @var $model PoinvoiceHdr */
/* @var $form CActiveForm */
?>
<table border="0">
    <tbody>
        <tr>
            <td width="200px">
                <?php echo CHtml::activeLabel($modelinv, 'invoice_num'); ?>
                <?php
                echo CHtml::activeTextField($modelinv, 'invoice_num', array('style' => 'width:100px;', 'readonly' => 'readonly'));
                ?>
            </td>
            <td>
                <?php echo CHtml::activeLabel($modelinv, 'total_value'); ?>
                <?php echo CHtml::activeTextField($modelinv, 'total_value', array('readonly' => 'readonly')); ?> 
            </td>
        </tr>
        <tr>
            <td><?php echo CHtml::activeLabel($modelinv, 'date_limit'); ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $modelinv,
                    'attribute' => 'date_limit',
                    // additional javascript options for the date picker plugin
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'dd-mm-yy'
                    ),
                    'htmlOptions' => array(
                        'style' => 'width:100px;',
                        'readonly' => 'readonly'
                    ),
                ));
                ?>
            </td>
            <td><?php echo CHtml::activeLabel($modelinv, 'total_paid'); ?>
                <?php echo CHtml::activeTextField($modelinv, 'total_paid', array('readonly' => 'readonly')); ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php echo CHtml::activeLabel($modelinv, 'description'); ?>
                <?php echo CHtml::activeTextArea($modelinv, 'description', array('style' => 'width:450px;', 'readonly' => 'readonly')); ?>
            </td>
        </tr>
    </tbody>
</table>