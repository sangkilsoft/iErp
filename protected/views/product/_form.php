<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'product-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <fieldset class="formulir">
        <table border="0">
            <tbody>
                <tr><td>
                        <?php echo $form->labelEx($model, 'id_category'); ?>
                        <?php
                        $cats = Category::model()->findAll();
                        $clist = CHtml::listData($cats, 'id_category', 'nm_category');
                        echo $form->dropDownList($model, 'id_category', $clist, array('empty' => '-- Pilih Kategori --'));
                        ?></td>
                    <td>
                        <?php echo $form->labelEx($model, 'id_manfrs'); ?>
                        <?php
                        $manfr = Manufacturer::model()->findAll();
                        $mlist = CHtml::listData($manfr, 'id_manfrs', 'nm_manufacturer');
                        echo $form->dropDownList($model, 'id_manfrs', $mlist, array('empty' => '-- Pilih Pabrik --'));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $form->labelEx($model, 'id_uoms'); ?>
                        <?php
                        $uoms = Uoms::model()->findAll();
                        $ulist = CHtml::listData($uoms, 'id_uoms', 'nm_uom');
                        echo $form->dropDownList($model, 'id_uoms', $ulist, array('empty' => '-- Pilih Satuan --'));
                        ?></td>
                    <td>
                        <?php echo $form->labelEx($model, 'id_groups'); ?>
                        <?php
                        $groups = Groups::model()->findAll();
                        $glist = CHtml::listData($groups, 'id_groups', 'nm_group');
                        echo $form->dropDownList($model, 'id_groups', $glist, array('empty' => '-- Pilih Groups --'));
                        ?></td>
                </tr>
                <tr>                    
                    <td>
                        <?php echo $form->labelEx($model, 'cd_product'); ?>
                        <?php echo $form->textField($model, 'cd_product', array('size' => 13, 'maxlength' => 13)); ?>

                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'nm_product'); ?>
                        <?php echo $form->textField($model, 'nm_product', array('size' => 48, 'maxlength' => 64)); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <div class="tombol">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn-orange')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->