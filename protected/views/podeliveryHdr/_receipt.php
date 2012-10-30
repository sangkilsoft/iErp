<?php
/* @var $this GreceiptHdrController */
/* @var $model GreceiptHdr */
/* @var $form CActiveForm */
?>
<table>
    <tbody>
        <tr>
            <td>
                <?php echo CHtml::activeLabel($modelrcp, 'gr_num'); ?>
                <?php echo CHtml::activeTextField($modelrcp, 'gr_num', array('size' => 13, 'maxlength' => 13, 'readOnly' => true)); ?>
            </td>
            <td>
                <?php echo CHtml::activeLabel($modelrcp, 'id_locator'); ?>
                <?php
                $mlktr = Locator::model()->findAll();
                $llist = CHtml::listData($mlktr, 'id_locator', 'nm_locator');
                echo CHtml::activeDropDownList($modelrcp, 'id_locator', $llist, array('empty' => '-- Pilih Lokator --'));
                ?>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">
                <?php echo CHtml::activeLabel($modelrcp, 'id_warehouse'); ?>
                <?php
                $mwhse = Warehouse::model()->findAll();
                $mlist = CHtml::listData($mwhse, 'id_warehouse', 'nm_whse');
                echo CHtml::activeDropDownList($modelrcp, 'id_warehouse', $mlist, array(
                    'empty' => '-- Pilih Warehouse --',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('locator/optLocators'),
                        'update' => '#GreceiptHdr_id_locator',
                        )));
                ?>                    
            </td>
            <td>
                <?php echo CHtml::activeLabel($modelrcp, 'description'); ?>
                <?php echo CHtml::activeTextArea($modelrcp, 'description', array('style' => 'width:300px;')); ?>
            </td>            
        </tr>
    </tbody>
</table>
<?php
$label = '&nbsp;Saya menyatakan bahwa barang telah diterima di Gudang bersangkutan';
if (!$modified) echo CHtml::activeCheckBox($modelrcp, 'status', array('style' => 'float: left;', 'disabled' => 'disabled'));
else echo CHtml::activeCheckBox($modelrcp, 'status', array('style' => 'float: left;'));

echo CHtml::label($label, 'GreceiptHdr_status');
echo '<br>';
?> 