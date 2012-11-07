<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'rptBulan-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <fieldset class="formulir">
        <table border="0">
            <tbody>
                <tr>
                    <td>
                        <?php echo CHtml::label('Bulan','idbulan'); ?>
                        <?php echo CHtml::textField('bulan','', array('size' => 30, 'maxlength' => 30,'required'=>'required')); ?>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <?php echo CHtml::label('Tahun','idtahun'); ?>
                        <?php echo CHtml::textField('tahun','',array('size' => 30, 'maxlength' => 30)); ?>
                    </td>
                </tr>
            </tbody>
        </table>

    </fieldset>    
    <div class="row buttons">
        <?php echo CHtml::submitButton('View'); ?>
    </div>

    <?php $this->endWidget(); ?>


</div>