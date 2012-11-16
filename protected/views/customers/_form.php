<?php
/* @var $this CustomersController */
/* @var $model Customers */
/* @var $form CActiveForm */
?>
<script>
    $(function() {
        $( "#tabs" ).tabs({
//            selected: -1,
            collapsible: true
        });
    });
</script>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'customers-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <?php //echo $form->errorSummary($model); ?>
    <fieldset class="formulir">
        <div class="row">
            <table border="0">
                <tbody>
                    <tr>
                        <td>
                            <?php echo $form->labelEx($model, 'cd_cust'); ?>
                            <?php echo $form->textField($model, 'cd_cust', array('size' => 4, 'maxlength' => 4)); ?>
                        </td>
                        <td>
                            <?php echo $form->labelEx($model, 'id_cclass'); ?>
                            <?php
                            $dataclass = CHtml::listData(CustomerClass::model()->findAll(), 'id_cclass', 'nm_cclass');
                            echo $form->dropDownList($model, 'id_cclass', $dataclass);
                            //echo $form->textField($model, 'id_cclass'); 
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'nm_cust'); ?>
                            <?php echo $form->textField($model, 'nm_cust', array('size' => 32, 'maxlength' => 64)); ?>
                        </td>
                        <td>
                            <?php echo $form->labelEx($model, 'id_ctype'); ?>
                            <?php
                            $datatype = CHtml::listData(CustomerType::model()->findAll(), 'id_ctype', 'nm_ctype');
                            echo $form->dropDownList($model, 'id_ctype', $datatype);
                            //echo $form->textField($model, 'id_ctype'); 
                            ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $form->labelEx($model, 'contact_name'); ?>
                            <?php echo $form->textField($model, 'contact_name', array('size' => 18, 'maxlength' => 32)); ?>
                        </td>
                        <td><?php echo $form->labelEx($model, 'contact_number'); ?>
                            <?php echo $form->textField($model, 'contact_number', array('size' => 16, 'maxlength' => 16)); ?>
                        </td>
                    </tr>
                </tbody>
            </table>            
        </div>
    </fieldset>
    <div id="tabs" class="shadowtabs">
        <ul>
            <li><a href="#creditlimit">Credit Limit</a></li>
            <li><a href="#detail">More Detail</a></li>
        </ul>
        <div id="creditlimit" style="padding-left: 5px; padding-top: 0px; padding-bottom: 0px;">
            <?php
            echo $this->renderPartial('_limit', array('limit' => $limit));
            ?>
        </div>
        <div id="detail" style="padding-left: 5px; padding-top: 0px; padding-bottom: 0px; ">
            <?php
            echo $this->renderPartial('_detail', array('detail' => $dtl));
            ?>
        </div>
    </div>
    <div class="tombol">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn-orange')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->