<?php
/* @var $this SalesController 
 * @create by Mujib
 */
?>
<script>
    function going_down(idnyo,cdnyo,nmnyo){
        $('#SalOrder_id_customer').val(idnyo);
        $('#cd_cust').val(cdnyo);
        $('#nm_cust').val(nmnyo);
        $('#SorderInfo_tax_name').val('Nama Wajib Pajak (set later)');
        
        
        $('#mydialog').dialog('close');
    }
    
</script>
<h1><?php echo CHtml::label('Customers', '') ?></h1>
<div class="grid-view" cellpadding="0" cellspacing="0">
    <table class="item-class">
        <thead>
            <tr>
                <th>Kode Customer</th>
                <th>Nama Customer</th>
                <th>Pilih</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $data = $cust->getData();
            $isodd = true;
            $kelas = "odd";
            foreach ($data as $row) {
                if ($kelas == "even")
                    $kelas = "odd";
                else
                    $kelas = "even"
                    ?>   
                <tr id="row <?php echo $kelas; ?>" class="<?php echo $kelas; ?>" onclick="<?php echo 'going_down(\'' . $row['id_customer'] . '\',\'' . $row['cd_cust'] . '\',\'' . $row['nm_cust'] . '\');'; ?>">
                    <td><?php echo CHtml::label($row['cd_cust'], ''); ?></td>
                    <td><?php echo CHtml::label($row['nm_cust'], ''); ?></td>
                    <td style=" text-align: center;">
                        <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/icon_edit.png', 'Select', array('onclick' => 'going_down(\'' . $row['id_customer'] . '\',\'' . $row['cd_cust'] . '\',\'' . $row['nm_cust'] . '\');'));
                        ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
/*
  $this->widget('zii.widgets.grid.CGridView', array(
  'id' => 'customers-grid',
  'dataProvider' => $cust,
  //'filter'=>$model,
  'columns' => array(
  //'id_customer',
  'nothing' => array(
  'header' => 'No',
  'class' => 'CDataColumn',
  'value' => 'CHtml::hiddenField(\'test\',$data->id_customer).($this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row + 1))',
  'type' => 'raw',
  'htmlOptions' => array('align' => 'center')
  ),
  'cd_cust',
  'nm_cust',
  array('class' => 'CButtonColumn',
  'header' => 'Select',
  'template' => '{pilih}',
  'buttons' => array(
  'pilih' => array(
  'label' => 'Select customers',
  'imageUrl' => Yii::app()->theme->baseUrl . '/images/icon_view.png',
  'click'=>'function(){alert("Going down!");}',
  'url'=>'"#"'
  ),
  ),
  ),

  'id_ctype',
  'id_cclass',
  'contact_name',
  'contact_number',
  'status',
  'create_date',
  'update_date',
  'create_by',
  'update_by',
  array(
  'class'=>'CButtonColumn',
  ),

  ),
  )); */
?>


