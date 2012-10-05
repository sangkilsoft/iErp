<?php
Yii::app()->clientScript->registerCssFile(
        Yii::app()->clientScript->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');
Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.table.addrow.js');
$sql = "SELECT 
  coa.id_acc,
  concat(coa.cd_acc,'-',coa.nm_acc,'-',coa.acc_normal) as nm_acc,
  (select a.nm_acc from account a where a.id_acc=coa.parent) as parent,
  coa.acc_normal
FROM 
  public.account coa
WHERE coa.level=3
ORDER BY 2
";
$connection = Yii::app()->db;
$command = $connection->createCommand($sql);
$results = $command->queryAll();
?>
<script type="text/javascript">
    var idBefore=0;
    var idNumber=0;
    $("document").ready(function(){
        $(".addRow").btnAddRow({
            oddRowCSS:"odd",
            evenRowCSS:"even",
            rowNumColumn:"rowNumber"
        }, function(row){
            idBefore    = row.find(".id_acc").attr('id');
            idNumber    = idBefore.substring(10) * 1 + 1;            
            row.find(".kredit").attr('id', 'kredit' + idNumber).keydown(function(e){
                if(e.which == 13){
                    $(".addRow").click();  
                    $(".id_acc").focus();
                    return false;
                }
            });
            row.find(".debet").attr('id', 'debet' + idNumber).keydown(function(e){
                if(e.which == 13){
                    $(".addRow").click();  
                    $(".id_acc").focus();
                    return false;
                }
            });
            row.find(".id_acc").attr('id','id_acc'+idNumber).change(function(){
                var a="id_acc"+idNumber;
                var b="debet"+idNumber;
                var c="kredit"+idNumber;
                //var isilagi = $(a).val();
                var hasil=document.getElementById(a);
                var hasil1= hasil.options[hasil.selectedIndex].text;
                var hasil2= hasil1.split("-");
                //alert(hasil2[2]);
                if(hasil2[2]=="D"){
                    document.getElementById(c).value=0;
                    $(".debet").focus();
                }else{
                    document.getElementById(b).value=0;
                    $(".kredit").focus();
                }
                return false;
            });
        });
        
        $(".delRow").btnDelRow();  
    }); 
    
    
    $(function() {
        $(".kredit").keydown(function(e){
            if(e.which == 13){
                $(".addRow").click();
                $(".id_acc").focus();
                return false;
            }
        });
        $(".debet").keydown(function(e){
            if(e.which == 13){
                $(".addRow").click();
                $(".id_acc").focus();
                return false;
            }
        });
        $(".id_acc").change(function(){
            var a="id_acc"+idNumber;
            var b="debet"+idNumber;
            var c="kredit"+idNumber;
            //var isilagi = $(a).val();
            var hasil=document.getElementById(a);
            var hasil1= hasil.options[hasil.selectedIndex].text;
            var hasil2= hasil1.split("-");
            //alert(hasil2[2]);
            if(hasil2[2]=="D"){
                document.getElementById(c).value=0;
                $(".debet").focus();
            }else{
                document.getElementById(b).value=0;
                $(".kredit").focus();
            }
            return false;
        });
    });
</script>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'gl-header-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model, $modeldtl); ?>
    <fieldset class="formulir">
        <table border="0">
            <tbody>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'id_branch'); ?>
                        <?php echo $form->textField($model, 'id_branch'); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'description'); ?>
                        <?php echo $form->textField($model, 'description', array('size' => 60, 'maxlength' => 128)); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'id_orgn'); ?>
                        <?php echo $form->textField($model, 'id_orgn'); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'tgl_trans'); ?>
                        <?php
                        $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'tgl_trans',
                            'options' => array(
                                'showAnim' => 'fold',
                                'dateFormat' => 'dd-mm-yy',
                            ),
                            'htmlOptions' => array(
                                'style' => 'height:20px;',
                                'size' => '12',
                            ),
                        ));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'refnum'); ?>
                        <?php echo $form->textField($model, 'refnum', array('size' => 13, 'maxlength' => 13)); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'trans_type'); ?>
                        <?php echo $form->textField($model, 'trans_type', array('size' => 32, 'maxlength' => 32)); ?>
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
                            //echo CHtml::hiddenField('acc_normal[]', $modeldtl->id_acc, array('class' => 'id_acc', 'id' => 'id_acc0', 'style' => 'width:25px;'));
                            //echo '&nbsp;';
                            //echo CHtml::textField('nm_acc[]', $modeldtl->nm_acc, array('class' => 'nm_acc', 'nm' => 'id_acc0', 'style' => 'width:328px;'));   
                            $data = CHtml::listData($results, 'id_acc', 'nm_acc', 'parent');
                            echo CHtml::dropDownList('id_acc[]', '', $data, array('empty' => '(Select a parent)', 'class' => 'id_acc', 'id' => 'id_acc0', 'style' => 'width:auto;'));
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
                                //echo CHtml::hiddenField('id_acc[]', $modeldtl->id_acc[$i], array('class' => 'id_acc', 'id' => 'id_acc0', 'style' => 'width:25px;'));
                                //echo '&nbsp;';
                                //echo CHtml::textField('nm_acc[]', $modeldtl->nm_acc[$i], array('class' => 'nm_acc', 'nm' => 'id_acc0', 'style' => 'width:328px;'));
                                $data = CHtml::listData($results, 'id_acc', 'nm_acc', 'parent');
                                echo CHtml::dropDownList('id_acc[]', $modeldtl->id_acc[$i], $data);
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
    <div class="tombol">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->