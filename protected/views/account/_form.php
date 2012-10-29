<?php
Yii::app()->clientScript->registerCssFile(
        Yii::app()->clientScript->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');

Yii::app()->clientScript->registerCoreScript('jquery.ui');
$sql = "SELECT 
  acc.id_acc, 
  concat(acc.cd_acc,'-',acc.nm_acc) as nm_acc,
  acc.cd_acc
FROM 
  public.account acc
 order by 3;
";
$connection = Yii::app()->db;
$command = $connection->createCommand($sql);
$results = $command->queryAll();
?>
<script type="text/javascript">
    //    $(function(){
    //        $("#Account_parent").change(function(){
    //            var isilagi = $("#Account_parent").val();
    //            $("#Account_cd_acc").val(isilagi);   
    //        }); 
    //    }
    //);       
</script>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'account-form',
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
                        <?php echo $form->labelEx($model, 'parent'); ?>                        
                        <?php
                        echo $form->dropDownList($model, 'parent', CHtml::listData($results, 'id_acc', 'nm_acc'), array(
                            'empty' => 'Select a parent',
                            'ajax' => Array(
                                'type' => 'POST',
                                'url' => CController::createUrl('account/CodeAccount'),
                                'data' => Array('idparent' => 'js:this.value'),
                                'success' => 'function(data){
                                                        $(\'#Account_cd_acc\').val(data)
                                                    }',
                            )
                        ));
                        ?>
                        <?php echo $form->error($model, 'parent'); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'cd_acc'); ?>
                        <?php echo $form->textField($model, 'cd_acc'); ?>
                        <?php echo $form->error($model, 'cd_acc'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'nm_acc'); ?>
                        <?php echo $form->textField($model, 'nm_acc', array('size' => 30, 'maxlength' => 30)); ?>
                        <?php echo $form->error($model, 'nm_acc'); ?>
                    </td>
                    <td>
                        <?php echo $form->labelEx($model, 'level'); ?>
                        <?php echo $form->textField($model, 'level'); ?>
                        <?php echo $form->error($model, 'level'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form->labelEx($model, 'acc_normal'); ?>
                        <?php echo $form->dropDownList($model, 'acc_normal', array('D' => 'Debet', 'K' => 'Kredit')); ?>
                        <?php echo $form->error($model, 'acc_normal'); ?>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>

    </fieldset>    
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>
    <?php
//    $this->widget(
//            'CTreeView', array('url' => array('ajaxFillTree'))
//    );
    ?>
    <?php
//    $dataTree = array(
//        array(
//            'text' => 'Grampa', //must using 'text' key to show the text
//            'children' => array(//using 'children' key to indicate there are children
//                array(
//                    'text' => 'Father',
//                    'children' => array(
//                        array('text' => 'me'),
//                        array('text' => 'big sis'),
//                        array('text' => 'little brother'),
//                    )
//                ),
//                array(
//                    'text' => 'Uncle',
//                    'children' => array(
//                        array('text' => 'Ben'),
//                        array('text' => 'Sally'),
//                    )
//                ),
//                array(
//                    'text' => 'Aunt',
//                )
//            )
//        )
//    );
//
//    $this->widget('CTreeView', array(
//        'data' => $dataTree,
//        'animated' => 'fast', //quick animation
//        'collapsed' => 'false', //remember must giving quote for boolean value in here
//        'htmlOptions' => array(
//            'class' => 'treeview-red', //there are some classes that ready to use
//        ),
//    ));
    ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'account-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id_acc',
		'cd_acc',
		'nm_acc',
		'acc_normal',
		'parent',
	),
)); ?>
    
</div><!-- form -->

