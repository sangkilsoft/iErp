<div class="row">
    <table border="0">
        <tbody>
            <tr>
                <td width="100px"><?php echo CHtml::activeLabel($limit, 'credit_limit'); ?>
                </td>
                <td>
                    <?php echo CHtml::activeTextField($limit, 'credit_limit'); ?>
                </td>
            </tr>
            <tr>
                <td >
                    <?php echo CHtml::activeLabel($limit, 'taxname'); ?>
                </td>
                <td>

                    <?php echo CHtml::activeTextField($limit, 'taxname'); ?>
                </td>
            </tr>
            <tr>
                <td >
                    <?php echo CHtml::activeLabel($limit, 'taxnum'); ?></td>
                </td>
                <td>
                    <?php echo CHtml::activeTextField($limit, 'taxnum'); ?>
                </td>
            </tr>
            <tr>
                <td>&nbsp;
                </td>
                <td>
                    <?php echo CHtml::activeCheckBox($limit, 'multi_invoice', array('style' => 'float:left;')); ?>
                    <?php echo CHtml::activeLabel($limit, 'multi_invoice', array('sparator' => '&nbsp;')); ?>
                </td>
            </tr>
            <tr>
                <td>&nbsp;
                </td>
                <td>
                    <?php echo CHtml::activeCheckBox($limit, 'blocked', array('style' => 'float:left;')); ?>
                    <?php echo CHtml::activeLabel($limit, 'blocked'); ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>

