<div class="row">
    <table border="0">
        <tbody>
            <tr>
                <td width="100px"><?php echo CHtml::activeLabel($detail, 'id_distric'); ?></td>
                <td><?php echo CHtml::activeTextField($detail, 'id_distric'); ?></td>
            </tr>
            <tr>
                <td><?php echo CHtml::activeLabel($detail, 'addr1'); ?></td>
                <td><?php echo CHtml::activeTextField($detail, 'addr1'); ?></td>
            </tr>
            <tr>
                <td><?php echo CHtml::activeLabel($detail, 'addr2'); ?></td>
                <td><?php echo CHtml::activeTextField($detail, 'addr2'); ?></td>
            </tr>
            <tr>
                <td><?php echo CHtml::activeLabel($detail, 'latitude'); ?></td>
                <td><?php echo CHtml::activeTextField($detail, 'latitude'); ?></td>
            </tr>
            <tr>
                <td><?php echo CHtml::activeLabel($detail, 'longtitude'); ?></td>
                <td><?php echo CHtml::activeTextField($detail, 'longtitude'); ?></td>
            </tr>
        </tbody>
    </table>
</div>