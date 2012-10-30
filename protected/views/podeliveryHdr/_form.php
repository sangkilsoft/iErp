<?php
/* @var $this PodeliveryHdrController */
/* @var $model PodeliveryHdr */
/* @var $form CActiveForm */
?>
<script>
    $(function() {
        $( "#tabs" ).tabs();
    });
</script>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'podelivery-hdr-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php //echo $form->errorSummary($model); ?>
    <fieldset class="formulir">
        <table border="0">
            <tbody>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'do_num'); ?>
                        <?php
                        if ($model->isNewRecord)
                            echo $form->textField($model, 'do_num', array('size' => 13, 'maxlength' => 13, 'style' => 'float: left;'));
                        else
                            echo $form->textField($model, 'do_num', array('size' => 13, 'maxlength' => 13, 'readOnly' => 'readOnly', 'style' => 'float: left;'));

                        echo '&nbsp;';
                        if ($modified)
                            echo CHtml::imageButton(Yii::app()->theme->baseUrl . '/images/icon_view.png', array('submit' => array('', 'msg' => 'search'), 'style' => 'width:16px;', 'class' => 'btn-orange'));
//                        else
//                            echo CHtml::imageButton(Yii::app()->theme->baseUrl . '/images/icon_view.png', array('submit' => array('', 'msg' => 'search'), 'style' => 'width:16px;display:none;'));
                        ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'status'); ?>
                        <?php
                        $mdata = new data_master;
                        echo $form->dropDownList($model, 'status', $mdata->deliveryStatus_list());
                        ?>
                    </td>
                    <td style="width:350px;">
                        <?php echo $form->labelEx($model, 'ref_number'); ?>
                        <?php echo $form->textField($model, 'ref_number', array('size' => 12, 'maxlength' => 16)); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'id_supplier'); ?>
                        <?php
                        echo $form->dropDownList($model, 'id_supplier', $mdata->supplier_list());
                        ?>
                    </td>
                    <td colspan="2"  >
                        <?php echo $form->labelEx($model, 'description'); ?>
                        <?php echo $form->textField($model, 'description', array('size' => 50, 'maxlength' => 64)); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <div id="tabs" class="shadowtabs">
        <ul>
            <li><a href="#itemsDelivery">Items</a></li>
            <li><a href="#receiptInfo">Receipt Info</a></li>
            <li><a href="#invoiceInfo">Invoice</a></li>
        </ul>
        <div id="itemsDelivery" style="padding-left: 5px; padding-right: 5px; padding-top: 0px; padding-bottom: 0px;">
            <?php
            echo $this->renderPartial('_items', array('model' => $model, 'modeldtl' => $modeldtl));
            ?>
        </div>
        <div id="receiptInfo" style="padding-left: 5px; padding-right: 5px; padding-top: 10px; padding-bottom: 0px; ">
            <?php
            echo $this->renderPartial('_receipt', array('modelrcp' => $modelrcp, 'modified' => $modified));
            ?>
        </div>
        <div id="invoiceInfo" style="padding-left: 5px; padding-right: 5px; padding-top: 10px; padding-bottom: 0px; ">
            <?php
            echo $this->renderPartial('_invoice', array('modelinv' => $modelinv, 'modified' => $modified));
            ?>
        </div>
    </div>
    <div class="tombol">
        <?php if ($modified) echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn-orange')); ?>
        <?php echo CHtml::Button('New', array('submit' => array('podeliveryHdr/create'), 'class' => 'btn-orange')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->