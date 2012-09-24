<?php
Yii::app()->clientScript->registerCssFile(
        Yii::app()->clientScript->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');

Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.table.addrow.js');
?>
<script type="text/javascript">
    $("document").ready(function(){
        $(".addRow").btnAddRow({
            oddRowCSS:"odd",
            evenRowCSS:"even",
            rowNumColumn:"rowNumber"
        }, function(row){
            var idBefore    = row.find(".id_product").attr('id');
            var idNumber    = idBefore.substring(10) * 1 + 1;
            
            row.find(".nm_product").attr('id', 'nm_product' + idNumber).autocomplete({
                source : "<?php echo $this->createUrl('product/autoProduct') ?>",
                dataType: 'json',
                search: function(event, ui) {
                    $(this).parent().parent().find(".id_product").val('');
                },
                select: function(event, ui) {
                    //alert(ui.item.id);
                    $(this).parent().parent().find(".id_product").val(ui.item.id);
                }
            });
            
            row.find(".id_locator").attr('id', 'id_locator' + idNumber).keydown(function(e){
                if(e.which == 13){
                    $(".addRow").click();                    
                    $(".nm_product").focus();
                    return false;
                }
            });
        });
        
        $(".delRow").btnDelRow();  
    }); 
    
    
    $(function() {
        $(".nm_product").autocomplete({
            source : "<?php echo $this->createUrl('product/autoProduct') ?>",
            dataType: 'json',
            search: function(event, ui) {
                $(this).parent().parent().find(".id_product").val('');
            },
            select: function(event, ui) {
                $(this).parent().parent().find(".id_product").val(ui.item.id);
                $(".qty_trans").focus();
            }
        });
        
        $(".id_locator").keydown(function(e){
            if(e.which == 13){
                $(".addRow").click();
                $(".nm_product").focus();
                return false;
            }
        });
    });
</script>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'good-receipt-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model,$modeldtl); ?>
    <fieldset class="formulir">
        <table border="0">
            <tr>
                <td >
                    <?php
                    echo $form->labelEx($model, 'gr_num');
                    echo $form->textField($model, 'gr_num', array('size' => 13, 'maxlength' => 13));
                    ?>
                </td>
                <td  >
                    <?php
                    echo $form->labelEx($model, 'status');
                    echo $form->textField($model, 'status');
                    ?>
                </td>
            </tr>
            <tr>
                <td  >
                    <?php
                    echo $form->labelEx($model, 'receipt_date');
                    $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'receipt_date',
                        'options' => array(
                            'showAnim' => 'fold',
                            'dateFormat' => 'dd-mm-yy',
                        ),
                        'htmlOptions' => array(
                            'style' => 'height:20px;',
                            'size' => '12',
                        ),
                    ));
                    ?>
                </td>
                <td >
                    <?php
                    echo $form->labelEx($model, 'description');
                    echo $form->textField($model, 'description', array('size' => 60, 'maxlength' => 64));
                    ?>
                </td>
            </tr>
        </table>  
    </fieldset>  
    <div class="grid-view" cellpadding="0" cellspacing="0">
        <table class="item-class">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Uom</th>
                    <th>Locator</th>
                    <th style="width: 10px; text-align: center;"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/plus.png" border="0" class="addRow"></th>
                </tr>
            </thead>
            <tbody>
                <?php if ($modeldtl->id_product == null): ?>
                    <tr>
                        <td>
                            <span class="rowNumber">1</span>
                        </td>
                        <td>
                            <?php
                            echo CHtml::hiddenField('id_product[]', $modeldtl->id_product, array('class' => 'id_product', 'id' => 'id_product0', 'style' => 'width:25px;'));
                            //echo '&nbsp;';
                            echo CHtml::textField('nm_product[]', $modeldtl->nm_product, array('class' => 'nm_product', 'nm' => 'id_product0', 'style' => 'width:328px;'));
                            ?>
                        </td>
                        <td><?php echo CHtml::textField('qty_trans[]', $modeldtl->qty_trans, array('class' => 'qty_trans', 'id' => 'qty_trans0', 'style' => 'width:32px;')); ?></td>
                        <td><?php echo CHtml::textField('id_uoms[]', $modeldtl->id_uoms, array('class' => 'id_uoms', 'id' => 'id_uoms0', 'style' => 'width:32px;')); ?></td>
                        <td><?php echo CHtml::textField('id_locator[]', $modeldtl->id_locator, array('class' => 'id_locator', 'id' => 'id_locator0', 'style' => 'width:52px;')); ?></td>
                        <td style="width: 10px; text-align: center;"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/minus.png" border="0" class="delRow"></td>
                    </tr>                
                <?php else: for ($i = 0; $i < sizeof($modeldtl->id_product); ++$i): ?>
                        <tr>
                            <td>
                                <span class="rowNumber"><?php echo $i; ?></span>
                            </td>
                            <td>
                                <?php
                                echo CHtml::hiddenField('id_product[]', $modeldtl->id_product[$i], array('class' => 'id_product', 'id' => 'id_product0', 'style' => 'width:25px;'));
                                //echo '&nbsp;';
                                echo CHtml::textField('nm_product[]', $modeldtl->nm_product[$i], array('class' => 'nm_product', 'nm' => 'id_product0', 'style' => 'width:328px;'));
                                ?>
                            </td>
                            <td><?php echo CHtml::textField('qty_trans[]', $modeldtl->qty_trans[$i], array('class' => 'qty_trans', 'id' => 'qty_trans0', 'style' => 'width:32px;')); ?></td>
                            <td><?php echo CHtml::textField('id_uoms[]', $modeldtl->id_uoms[$i], array('class' => 'id_uoms', 'id' => 'id_uoms0', 'style' => 'width:32px;')); ?></td>
                            <td><?php echo CHtml::textField('id_locator[]', $modeldtl->id_locator[$i], array('class' => 'id_locator', 'id' => 'id_locator0', 'style' => 'width:52px;')); ?></td>
                            <td style="width: 10px; text-align: center;"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/minus.png" border="0" class="delRow"></td>
                        </tr> 
                    <?php endfor; endif;?>
            </tbody>
        </table>
    </div>
    <div class="tombol">
        <?php
        echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn-orange'));
        ?> 
    </div>  
    <?php $this->endWidget(); ?>

</div><!-- form -->