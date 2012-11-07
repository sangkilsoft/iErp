<?php
/* @var $this SalRequestController */
/* @var $model SalRequest */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'sal-request-salRequest-form',
        'enableAjaxValidation' => false,
            ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <fieldset class="formulir">	
        <br>
    </fieldset>

    <div class="row buttons">
    <?php echo CHtml::submitButton('Submit'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->