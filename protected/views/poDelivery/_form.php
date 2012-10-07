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
            
            row.find(".id_product").attr('id', 'id_product' + idNumber);
            row.find(".sub_total").attr('id', 'sub_total' + idNumber);
            
            row.find(".product").attr('id', 'product' + idNumber).autocomplete({
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
            
            row.find(".qty_trans").attr('id', 'qty_trans' + idNumber).keydown(function(e){
                if(e.which == 13){
                    $(this).parent().parent().find(".value_trans").focus();
                    return false;
                }
            });
            
            row.find(".value_trans").attr('id', 'value_trans' + idNumber).keyup(function(e){
                $(this).parent().parent().find(".sub_total").html(row.find(".qty_trans").val()*row.find(".value_trans").val())
                return false;
            });
        });
        
        $(".delRow").btnDelRow();  
    }); 
    
    
    $(function() {
        $(".product").autocomplete({
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
        
        $(".qty_trans").keydown(function(e){
            if(e.which == 13){
                $(this).parent().parent().find(".value_trans").focus();
                return false;
            }
        });
            
        $(".value_trans").keydown(function(e){
            if(e.which == 13){
                $(this).parent().parent().find(".value_trans").focus();
                return false;
            }
        });
        
        
        $(".value_trans").keyup(function(e){
            $(this).parent().parent().find(".sub_total").html(row.find(".qty_trans").val()*row.find(".value_trans").val())
            return false;
        });
    });
</script>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'po-delivery-form',
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

                        <?php echo $form->labelEx($model, 'id_orgn'); ?>
                    </td>
                    <td>
                        <?php
                        $mdata = new data_master;
                        echo CHtml::activeDropDownList($model, 'id_orgn', $mdata->org_list(), array(
                            'prompt' => '--Select Organization--',
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => CController::createUrl('branch/poDBranch'),
                                'update' => '#PoDelivery_id_branch',
                            ),
                        ));
                        ?>
                    </td>
                    <td>

                        <?php echo $form->labelEx($model, 'do_num'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model, 'do_num', array('size' => 13, 'maxlength' => 13)); ?>
                        <?php echo $form->error($model, 'do_num'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'id_branch'); ?>
                    </td>
                    <td>
                        <?php echo CHtml::activeDropDownList($model, 'id_branch', $mdata->branch_list()); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'status'); ?>
                    </td>
                    <td>     
                        <?php echo CHtml::activeDropDownList($model, 'status', $mdata->status_list()); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'id_warehouse'); ?>
                    </td>
                    <td>
                        <?php echo CHtml::activeDropDownList($model, 'id_warehouse', $mdata->warehouse_list()); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'ref_number'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model, 'ref_number', array('size' => 16, 'maxlength' => 16)); ?>
                        <?php echo $form->error($model, 'ref_number'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'id_supplier'); ?>
                    </td>
                    <td>
                        <?php echo $form->textField($model, 'id_supplier'); ?>
                        <?php echo $form->error($model, 'id_supplier'); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'description'); ?>
                    </td>
                    <td>
                        <?php echo $form->textArea($model, 'description', array('style' => 'width:250px;', 'maxlength' => 64)); ?>
                        <?php echo $form->error($model, 'description'); ?>
                    </td>
                </tr>
            </tbody>
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
                    <th>Unit Price</th>
                    <th>Sub Total</th>
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
                            echo CHtml::textField('product[]', $modeldtl->product, array('class' => 'product', 'id' => 'product0', 'style' => 'width:328px;'));
                            ?>
                        </td>
                        <td><?php echo CHtml::textField('qty_trans[]', $modeldtl->qty_trans, array('class' => 'qty_trans', 'id' => 'qty_trans0', 'style' => 'width:32px;')); ?></td>
                        <td><?php echo CHtml::textField('id_uoms[]', $modeldtl->id_uoms, array('class' => 'id_uoms', 'id' => 'id_uoms0', 'style' => 'width:32px;')); ?></td>
                        <td><?php echo CHtml::textField('value_trans[]', $modeldtl->value_trans, array('class' => 'value_trans', 'id' => 'value_trans0', 'style' => 'width:42px;')); ?></td>
                        <td><?php echo CHtml::label('0', false, array('class' => 'sub_total', 'id' => 'sub_total0', 'style' => 'text-align: right')); ?></td>
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
                                echo CHtml::textField('product[]', $modeldtl->product[$i], array('class' => 'product', 'id' => 'product0', 'style' => 'width:328px;'));
                                ?>
                            </td>
                            <td><?php echo CHtml::textField('qty_trans[]', $modeldtl->qty_trans[$i], array('class' => 'qty_trans', 'id' => 'qty_trans0', 'style' => 'width:32px;')); ?></td>
                            <td><?php echo CHtml::textField('id_uoms[]', $modeldtl->id_uoms[$i], array('class' => 'id_uoms', 'id' => 'id_uoms0', 'style' => 'width:32px;')); ?></td>
                            <td><?php echo CHtml::textField('value_trans[]', $modeldtl->value_trans[$i], array('class' => 'value_trans', 'id' => 'value_trans0', 'style' => 'width:42px;')); ?></td>
                            <td><?php echo CHtml::label('0', false, array('class' => 'sub_total', 'id' => 'sub_total0', 'style' => 'text-align: right')); ?></td>
                            <td style="width: 10px; text-align: center;"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/minus.png" border="0" class="delRow" ></td>
                        </tr> 
                        <?php
                    endfor;
                endif;
                ?>
            </tbody>
        </table>
    </div>
    <div class="tombol">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn-orange')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->