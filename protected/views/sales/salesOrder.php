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
    function addDlg()
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
    
</script>
<h1>Create Sales Order</h1>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'sal-order-salesOrder-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php //echo $form->errorSummary($model);     ?>
    <fieldset class="formulir">
        <table border="0">
            <tbody>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'so_num'); ?>
                        <?php echo $form->textField($model, 'so_num'); ?>

                    </td>
                    <td><?php echo $form->labelEx($model, 'id_price_cat'); ?>
                        <?php echo $form->textField($model, 'id_price_cat'); ?>
                    </td>
                    <td><?php echo $form->labelEx($model, 'py_term'); ?>
                        <?php echo $form->textField($model, 'py_term'); ?>
                    </td>
                </tr>
                <tr>
                    <td ><?php echo $form->labelEx($model, 'id_customer', array('style' => 'float: left')); ?>
                        <?php
                        $src = Yii::app()->theme->baseUrl . "/images/small_icons/comment_add.png";
                        echo "&nbsp;" . CHtml::image($src, 'Customer list', array('onclick' => "{addDlg();}")) . "<br>";
                        ?>
                        <?php echo $form->textField($model, 'id_customer'); ?>
                    </td>
                    <td><?php echo $form->labelEx($model, 'order_date'); ?>
                        <?php
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'order_date',
                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'showAnim' => 'drop',
                                'dateFormat' => 'dd-mm-yy'
                            ),
                            'htmlOptions' => array(
                                'size' => '12'
                            ),
                        ));
//echo $form->textField($model, 'order_date'); 
                        ?>
                    </td>
                    <td><?php echo $form->labelEx($model, 'status'); ?>
                        <?php echo $form->textField($model, 'status'); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'py_method'); ?>
                        <?php
                        echo CHtml::activeDropDownList($model, 'py_method', array('Cash', 'Transfer', 'Cek/Giro'));
                        ?> 
                        <?php //echo $form->textField($model, 'py_method');    ?>
                    </td>
                    <td><?php echo $form->labelEx($model, 'delivery_schdate'); ?>
                        <?php
                        $cal = Yii::app()->theme->baseUrl . "/images/small_icons/calendar.png";
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'delivery_schdate',
                            // additional javascript options for the date picker plugin
                            'options' => array(
                                'showAnim' => 'drop',
                                'dateFormat' => 'dd-mm-yy',
                                'buttonImage' => $cal,
                                'buttonImageOnly' => true
                            ),
                            'htmlOptions' => array(
                                'size' => '12'
                            ),
                        ));
//echo $form->textField($model, 'delivery_schdate'); 
                        ?>
                    </td>
                    <td><?php echo $form->labelEx($model, 'description'); ?>
                        <?php echo $form->textField($model, 'description'); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>    
    <div id="tabs" class="shadowtabs">
        <ul>
            <li><a href="#itemsSO">Items</a></li>
        </ul>
        <div id="itemsSO" style="padding-left: 5px; padding-right: 5px; padding-top: 0px; padding-bottom: 0px;">
            <?php
            echo $this->renderPartial('_items', array('model' => $model, 'modeldtl' => $modeldtl));
            ?>
        </div>
    </div>

    <div class="tombol">
        <?php echo CHtml::submitButton('Submit', array('class' => 'btn-orange')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
