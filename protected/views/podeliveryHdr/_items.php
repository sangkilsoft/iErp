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
            row.find(".ppn").attr('id', 'ppn' + idNumber).val('10');          
            row.find(".value_disc").attr('id', 'value_disc' + idNumber).val('0');
            
            //$('#ppn' + idNumber).val('10');
            
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
            
            //            row.find(".qty_trans").attr('id', 'qty_trans' + idNumber).keydown(function(e){
            //                if(e.which == 13){
            //                    $(this).parent().parent().find(".value_trans").focus();
            //                    return false;
            //                }
            //            });
            //            
            //            row.find(".value_trans").attr('id', 'value_trans' + idNumber).keyup(function(e){
            //                $(this).parent().parent().find(".sub_total").html(row.find(".qty_trans").val()*row.find(".value_trans").val())
            //                return false;
            //            });
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
        
        //        $(".qty_trans").keydown(function(e){
        //            if(e.which == 13){
        //                $(this).parent().parent().find(".value_trans").focus();
        //                return false;
        //            }
        //        });
            
        //        $(".value_trans").keydown(function(e){
        //            if(e.which == 13){
        //                $(this).parent().parent().find(".value_trans").focus();
        //                return false;
        //            }
        //        });
    });
</script>
<div class="grid-view" cellpadding="0" cellspacing="0">
    <table class="item-class">
        <thead>
            <tr>
                <th>No</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Uom</th>
                <th>UnitPrice (Rp)</th>
                <th>Diskon (Rp)</th>
                <th>PPN (%)</th>
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
                        echo CHtml::hiddenField('items[id_line][]', $modeldtl->id_line, array('class' => 'id_line', 'id' => 'id_line0', 'style' => 'width:25px;'));
                        echo CHtml::hiddenField('items[id_product][]', $modeldtl->id_product, array('class' => 'id_product', 'id' => 'id_product0', 'style' => 'width:25px;'));
                        //echo '&nbsp;';
                        echo CHtml::textField('items[product][]', $modeldtl->product, array('class' => 'product', 'id' => 'product0', 'style' => 'width:200px;'));
                        ?>
                    </td>
                    <td><?php echo CHtml::textField('items[qty_trans][]', $modeldtl->qty_trans, array('class' => 'qty_trans', 'id' => 'qty_trans0', 'style' => 'width:32px;')); ?></td>
                    <td><?php echo CHtml::textField('items[id_uoms][]', $modeldtl->id_uoms, array('class' => 'id_uoms', 'id' => 'id_uoms0', 'style' => 'width:32px;')); ?></td>
                    <td><?php echo CHtml::textField('items[value_trans][]', $modeldtl->value_trans, array('class' => 'value_trans', 'id' => 'value_trans0', 'style' => 'width:46px;')); ?></td>
                    <td><?php echo CHtml::textField('items[value_disc][]', 0, array('class' => 'value_disc', 'id' => 'value_disc0', 'style' => 'width:46px;')); ?></td>
                    <td><?php echo CHtml::textField('items[ppn][]', 10, array('class' => 'ppn', 'id' => 'ppn0', 'style' => 'width:46px;')); ?></td>
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
                            echo CHtml::hiddenField('items[id_line][]', $modeldtl->id_line, array('class' => 'id_line', 'id' => 'id_line0', 'style' => 'width:25px;'));
                            echo CHtml::hiddenField('items[id_product][]', $modeldtl->id_product[$i], array('class' => 'id_product', 'id' => 'id_product0', 'style' => 'width:25px;'));
                            //echo '&nbsp;';
                            echo CHtml::textField('items[product][]', $modeldtl->product[$i], array('class' => 'product', 'id' => 'product0', 'style' => 'width:200px;'));
                            ?>
                        </td>
                        <td><?php echo CHtml::textField('items[qty_trans][]', $modeldtl->qty_trans[$i], array('class' => 'qty_trans', 'id' => 'qty_trans0', 'style' => 'width:32px;')); ?></td>
                        <td><?php echo CHtml::textField('items[id_uoms][]', $modeldtl->id_uoms[$i], array('class' => 'id_uoms', 'id' => 'id_uoms0', 'style' => 'width:32px;')); ?></td>
                        <td><?php echo CHtml::textField('items[value_trans][]', $modeldtl->value_trans[$i], array('class' => 'value_trans', 'id' => 'value_trans0', 'style' => 'width:46px;')); ?></td>
                        <td><?php echo CHtml::textField('items[value_disc][]', 0, array('class' => 'value_disc', 'id' => 'value_disc0', 'style' => 'width:46px;')); ?></td>
                        <td><?php echo CHtml::textField('items[ppn][]', 10, array('class' => 'ppn', 'id' => 'ppn0', 'style' => 'width:46px;')); ?></td>
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