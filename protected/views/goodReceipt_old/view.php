<?php
$this->breadcrumbs = array(
    'Good Receipts' => array('index'),
    $model->id_receipt,
);

$this->menu = array(
    array('label' => 'List GoodReceipt', 'url' => array('index')),
    array('label' => 'Create GoodReceipt', 'url' => array('create')),
    array('label' => 'Update GoodReceipt', 'url' => array('update', 'id' => $model->id_receipt)),
    array('label' => 'Delete GoodReceipt', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_receipt), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage GoodReceipt', 'url' => array('admin')),
);
?>

<h1>View GoodReceipt #<?php echo $model->id_receipt; ?></h1>

<?php
$this->widget('MCDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id_receipt',
        'gr_num',
        'description',
        'status',
        'receipt_date',
        'update_date',
        'create_by',
        'update_by',
        'create_date',
    ),
));
?>

<div class="grid-view" cellpadding="0" cellspacing="0">
    <table class="item-class">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Qty</th>
                <th>Uom</th>
                <th>Locator</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($modeldtl->id_product == null): ?>
            <?php else: for ($i = 0; $i < sizeof($modeldtl->id_product); ++$i): ?>
                    <tr>
                        <td>
                            <span class="rowNumber"><?php echo $i; ?></span>
                        </td>
                        <td>
                            <?php
                           echo CHtml::label($modeldtl->nm_product[$i],'');
                            ?>
                        </td>
                        <td><?php echo CHtml::label($modeldtl->qty_trans[$i], ''); ?></td>
                        <td><?php echo CHtml::label($modeldtl->id_uoms[$i], ''); ?></td>
                        <td><?php echo CHtml::label( $modeldtl->id_locator[$i], ''); ?></td>
                    </tr> 
                    <?php
                endfor;
            endif;
            ?>
        </tbody>
    </table>
</div>


