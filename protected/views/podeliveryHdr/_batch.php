<?php
//Yii::app()->clientScript->registerCssFile(
//        Yii::app()->clientScript->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');
//
//Yii::app()->clientScript->registerCoreScript('jquery.ui');
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
            
            row.find(".batchnum").attr('id', 'batchnum' + idNumber);
            row.find(".id_product").attr('id', 'id_product' + idNumber);
            row.find(".tglex").attr('id', 'tglex' + idNumber).datepicker({'showAnim':'fold'});
            row.find(".product").attr('id', 'product' + idNumber).autocomplete({
                source : "<?php echo $this->createUrl('product/autoProduct') ?>",
                dataType: 'json',
                search: function(event, ui) {
                    $(this).parent().parent().find(".id_product").val('');
                },
                select: function(event, ui) {
                    $(this).parent().parent().find(".id_product").val(ui.item.id);
                }
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
            }
        });
            
        $("#tglex0").datepicker();   
        $("#tglex1").datepicker(); 
        $("#tglex2").datepicker(); 
        $("#tglex3").datepicker(); 
        $("#tglex4").datepicker(); 
    });
</script>
<div class="grid-view" cellpadding="0" cellspacing="0">
    <table class="item-class">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Batch Number</th>
                <th>Date Expire</th>
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
                        echo CHtml::hiddenField('batch[id_product][]', $modeldtl->id_product, array('class' => 'id_product', 'id' => 'id_product0'));
                        //echo '&nbsp;';
                        echo CHtml::textField('batch[product][]', $modeldtl->nm_product, array('class' => 'product', 'id' => 'product0', 'style' => 'width:300px;'));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo CHtml::textField('batch[batchnum][]', $modeldtl->nm_product, array('class' => 'batchnum', 'id' => 'batchnum0', 'style' => 'width:80px;'));
                        ?>
                    </td>
                    <td>
                        <?php //echo CHtml::textField('tglex[]', $modeldtl->value_trans, array()); ?>
                        <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'name' => 'batch[tglex][]',
                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'showAnim' => 'fold',
                            ),
                            'htmlOptions' => array(
                                'class' => 'tglex', 'id' => 'tglex0'
                            ),
                        ));
                        ?>
                    </td>
                    <td style="width: 10px; text-align: center;"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/minus.png" border="0" class="delRow"></td>
                </tr>                
            <?php else: for ($i = 0; $i < sizeof($modeldtl->id_product); ++$i): ?>
                    <tr>
                        <td>
                            <span class="rowNumber"><?php echo $i; ?></span>
                        </td>
                        <td>
                            <?php
                            echo CHtml::hiddenField('batch[id_product][]', $modeldtl->id_product[$i], array('class' => 'id_product', 'id' => 'id_product0'));
                            //echo '&nbsp;';
                            echo CHtml::textField('batch[product][]', $modeldtl->nm_product[$i], array('class' => 'product', 'id' => 'product0', 'style' => 'width:300px;'));
                            ?>
                        </td>
                        <td>
                            <?php
                            echo CHtml::textField('batch[batchnum][]', $modeldtl->nm_product[$i], array('class' => 'batchnum', 'id' => 'batchnum0', 'style' => 'width:80px;'));
                            ?>
                        </td>
                        <td>
                            <?php //echo CHtml::textField('tglex[]', $modeldtl->value_trans, array()); ?>
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'name' => 'batch[tglex][]',
                                // additional javascript options for the date picker plugin
                                'options' => array(
                                    'showAnim' => 'fold',
                                ),
                                'htmlOptions' => array(
                                    'class' => 'tglex', 'id' => 'tglex0'
                                ),
                            ));
                            ?>
                        </td><td style="width: 10px; text-align: center;"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/minus.png" border="0" class="delRow" ></td>
                    </tr> 
                    <?php
                endfor;
            endif;
            ?>
        </tbody>
    </table>
</div>
