<?php
/* @var $this SalOrderController */
/* @var $model SalOrder */
/* @var $form CActiveForm */
?>
<script>
    $(function() {
        $( "#tabs" ).tabs();
    });
        
    // here is the magic
    function custOption()
    {
<?php
$option = array('url' => array('customerList'),
    'success' => 'showDlg');
echo CHtml::ajax($option);
?>
    }

    function showDlg(r)
    {
        $('#mydialog').html(r);
        $('#mydialog').dialog('open');
        return false;
    }  

    function goCustomer(cd){
        if(cd !=='')
            $('#nm_cust').val('cari Namoe tuk '+cd);
    }
    
</script>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'sal-order-salesOrder-form',
        'enableAjaxValidation' => false,
            ));
    ?>
    <?php echo $form->errorSummary(array($model,$modeldtl,$modelinfo)); ?>
    <fieldset class="formulir">
        <table border="0">
            <tbody>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'so_num'); ?>
                        <?php echo $form->textField($model, 'so_num', array('size' => 13, 'maxlength' => 13, 'style' => 'float: left;')); ?>                            
                        <?php
                        echo '&nbsp;';
                        echo CHtml::imageButton(Yii::app()->theme->baseUrl . '/images/icon_view.png', array('name' => 'search', 'style' => 'width:16px;', 'class' => 'btn-grey', 'id' => 'search'));
                        echo $form->hiddenField($model, 'id_sorder');
                        ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'py_term'); ?>
                        <?php echo $form->textField($model, 'py_term'); ?>

                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'status'); ?>
                        <?php
                        echo CHtml::textField($form->id, $status_val, array('class' => 'btn-grey', 'disabled' => 'disabled', 'style' => 'color:white; font-weight : bold;'));
                        //echo $form->textField($model, 'status', array('class' => 'btn-teal', 'disabled' => 'disabled','style'=>'color:white;')); 
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'id_customer', array('style' => 'float: left')); ?>
                        <?php echo $form->hiddenField($model, 'id_customer'); ?>
                        <?php
                        $src = Yii::app()->theme->baseUrl . "/images/small_icons/pencil_add.png";
                        echo "&nbsp;" . CHtml::image($src, 'Customer list', array('onclick' => "{custOption();}")) . "<br>";
                        ?>
                        <?php echo CHtml::textField('cd_cust', $cust['cd_cust'], array('id' => 'cd_cust', 'size' => '6', 'style' => 'float:left;', 'onblur' => '{goCustomer(this.value);}')); ?>
                        <?php echo '&nbsp;' . CHtml::textField('nm_cust', $cust['nm_cust'], array('id' => 'nm_cust', 'readOnly' => 'readOnly')); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'id_price_cat'); ?>
                        <?php
                        $pcat = PriceCat::model()->findAll();
                        $mlist = CHtml::listData($pcat, 'id_price_cat', 'description');
                        echo CHtml::activeDropDownList($model, 'id_price_cat', $mlist);
                        ?>  
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'order_date'); ?>
                        <?php
                        //echo $form->textField($model, 'order_date'); 
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'order_date',
                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'showAnim' => 'drop',
                                'dateFormat' => 'dd-mm-yy',
                            ),
                            'htmlOptions' => array(
                                'size' => '12'
                            ),
                        ));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'py_method'); ?>
                        <?php
                        $pmethod = Configure::model()->findAll('conf_name=:name', array(':name' => 'pymethode'));
                        $plist = CHtml::listData($pmethod, 'conf_code', 'value');
                        echo CHtml::activeDropDownList($model, 'py_method', $plist);
                        ?>  

                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'id_warehouse'); ?>
                        <?php
                        $mwhse = Warehouse::model()->findAll();
                        $wlist = CHtml::listData($mwhse, 'id_warehouse', 'nm_whse');
                        echo CHtml::activeDropDownList($model, 'id_warehouse', $wlist, array(
                            'empty' => '-- Pilih Warehouse --',
                            'ajax' => array(
                                'type' => 'POST',
                                'data' => array('idwhse' => 'js:this.value'),
                                'url' => CController::createUrl('locator/optLocators'),
                                'update' => '#lock0',
                            )
                        ));
                        ?>  
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'delivery_schdate'); ?>
                        <?php
                        //echo $form->textField($model, 'delivery_schdate'); 
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'delivery_schdate',
                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'showAnim' => 'drop',
                                'dateFormat' => 'dd-mm-yy',
                            ),
                            'htmlOptions' => array(
                                'size' => '12'
                            ),
                        ));
                        ?>

                    </td>
                </tr> 
            </tbody>
        </table>
    </fieldset>
    <div id="tabs" class="shadowtabs">
        <ul>
            <li><a href="#itemsSO">Items</a></li>
            <li><a href="#itemsMore">Tax & Sales</a></li>
        </ul>
        <div id="itemsSO" style="padding-left: 5px; padding-right: 5px; padding-top: 0px; padding-bottom: 0px;">
            <?php
            echo $this->renderPartial('_items', array('model' => $model, 'modeldtl' => $modeldtl));
            ?>
        </div>
        <div id="itemsMore" style="padding-left: 5px; padding-right: 5px; padding-top: 0px; padding-bottom: 0px;">
            <?php
            echo $this->renderPartial('_info', array('modelinfo' => $modelinfo));
            ?>
        </div>
    </div>
    <div class="tombol">
        <?php if ($model->isNewRecord) echo CHtml::submitButton('Save', array('class' => 'btn-orange', 'name' => 'btnsave')); ?>        
        <?php if (!$model->isNewRecord && $model->status == 0) echo CHtml::submitButton('Approve', array('class' => 'btn-orange', 'name' => 'btnsave')); ?>      
        <?php if (!$model->isNewRecord && $model->status == 1) echo CHtml::submitButton('Release', array('class' => 'btn-orange', 'name' => 'btnsave')); ?>     
        <?php if (!$model->isNewRecord && $model->status == 3) echo CHtml::submitButton('Post (Create Invoice)', array('class' => 'btn-orange', 'name' => 'btnsave')); ?>        
        <?php //if (!$model->isNewRecord && $model->status < 3) echo CHtml::submitButton('Reject '.$status_val, array('class' => 'btn-red', 'name' => 'btnsave')); ?>        
        <?php echo CHtml::submitButton('New', array('class' => 'btn-green', 'name' => 'batal')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->