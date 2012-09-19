<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'good-receipt-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <table border="0" padding="0">
        <tr>
            <td>
                <?php echo $form->labelEx($model, 'gr_num'); ?>
                <?php echo $form->textField($model, 'gr_num', array('size' => 13, 'maxlength' => 13)); ?>
                <?php echo $form->error($model, 'gr_num'); ?>

            </td>
            <td>
                <?php
                echo $form->labelEx($model, 'status');
                echo $form->textField($model, 'status');
                echo $form->error($model, 'status');
                ?>
            </td>
        </tr>
        <tr>
            <td>
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
                echo $form->error($model, 'receipt_date');
                ?>
            </td>
            <td>
                <?php
                echo $form->labelEx($model, 'description');
                echo $form->textField($model, 'description', array('size' => 60, 'maxlength' => 64));
                echo $form->error($model, 'description');
                ?>
            </td>
        </tr>
    </table>
    <fieldset><legend>Item Detail</legend>

    </fieldset>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>      
    </div>


    <?php $this->endWidget(); ?>

</div><!-- form -->