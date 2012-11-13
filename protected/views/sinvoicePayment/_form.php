<?php
Yii::app()->clientScript->registerCssFile(
        Yii::app()->clientScript->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');
Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.table.addrow.js');
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'sinvoice-payment-form',
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
                        <?php echo $form->labelEx($model, 'pyment_num'); ?>
                        <?php echo $form->textField($model, 'pyment_num', array('size' => 13, 'maxlength' => 13)); ?>
                        <?php echo $form->error($model, 'pyment_num'); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'ref_num'); ?>
                        <?php echo $form->textField($model, 'ref_num', array('size' => 16, 'maxlength' => 16)); ?>
                        <?php echo $form->error($model, 'ref_num'); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'deposit_to'); ?>
                        <?php echo $form->textField($model, 'deposit_to', array('size' => 32, 'maxlength' => 32)); ?>
                        <?php echo $form->error($model, 'deposit_to'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'id_customer'); ?>
                        <?php echo $form->textField($model, 'id_customer'); ?>
                        <?php echo $form->error($model, 'id_customer'); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'py_method'); ?>
                        <?php echo $form->textField($model, 'py_method', array('size' => 32, 'maxlength' => 32)); ?>
                        <?php echo $form->error($model, 'py_method'); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'cleared'); ?>
                        <?php echo $form->checkBox($model, 'cleared'); ?>
                        <?php echo $form->error($model, 'cleared'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'actual_pyment'); ?>
                        <?php echo $form->textField($model, 'actual_pyment'); ?>
                        <?php echo $form->error($model, 'actual_pyment'); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'pyment_date'); ?>
                        <?php echo $form->textField($model, 'pyment_date'); ?>
                        <?php echo $form->error($model, 'pyment_date'); ?>
                    </td>
                    <td>
                        
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
                    <th>Account</th>
                    <th>Debet</th>
                    <th>Kredit</th>                  
                    <th style="width: 10px; text-align: center;"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/plus.png" border="0" class="addRow"></th>
                </tr>
            </thead>
            <tbody>
                <?php if ($modeldtl->id_acc == null): ?>
                    <tr>
                        <td>
                            <span class="rowNumber">1</span>
                        </td>
                        <td>
                            <?php
                             echo CHtml::dropDownList('id_acc[]', '',  fico::acc_list(), array('empty' => '(Select a parent)', 'class' => 'id_acc', 'id' => 'id_acc0', 'style' => 'width:auto;'));
                            ?>
                        </td>
                        <td><?php echo CHtml::textField('debet[]', $modeldtl->debet, array('class' => 'debet', 'id' => 'debet0', 'style' => 'width:100px;')); ?></td>
                        <td><?php echo CHtml::textField('kredit[]', $modeldtl->kredit, array('class' => 'kredit', 'id' => 'kredit0', 'style' => 'width:100px;')); ?></td>

                        <td style="width: 10px; text-align: center;"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/minus.png" border="0" class="delRow"></td>
                    </tr>                
                <?php else: for ($i = 0; $i < sizeof($modeldtl->id_acc); ++$i): ?>
                        <tr>
                            <td>
                                <span class="rowNumber"><?php echo $i; ?></span>
                            </td>
                            <td>
                                <?php
                                 echo CHtml::dropDownList('id_acc[]', $modeldtl->id_acc[$i], fico::acc_list());
                                ?>
                            </td>
                            <td><?php echo CHtml::textField('debet[]', $modeldtl->debet[$i], array('class' => 'debet', 'id' => 'debet0', 'style' => 'width:100px;')); ?></td>
                            <td><?php echo CHtml::textField('kredit[]', $modeldtl->kredit[$i], array('class' => 'kredit', 'id' => 'kredit0', 'style' => 'width:100px;')); ?></td>

                            <td style="width: 10px; text-align: center;"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/minus.png" border="0" class="delRow"></td>
                        </tr> 
                    <?php endfor;
                endif; ?>
            </tbody>
        </table>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->