<?php
/* @var $this SorderInfoController */
/* @var $$modelinfo SorderInfo */
/* @var $form CActiveForm */
?>

<div class="form">
    <div class="row">
        <table border="0">
            <tbody>
                <tr>
                    <td><?php echo CHtml::activeLabel($modelinfo, 'tax_name'); ?>
                        <?php echo CHtml::activeTextField($modelinfo, 'tax_name'); ?></td>
                    <td>
                        <?php echo CHtml::activeLabel($modelinfo, 'sales'); ?>
                        <?php echo CHtml::activeTextField($modelinfo, 'sales'); ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: top;">
                        <?php echo CHtml::activeLabel($modelinfo, 'npwp'); ?>
                        <?php echo CHtml::activeTextField($modelinfo, 'npwp'); ?></td>
                    <td><?php echo CHtml::activeLabel($modelinfo, 'notes'); ?>
                        <?php echo CHtml::activeTextArea($modelinfo, 'notes'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div><!-- form -->