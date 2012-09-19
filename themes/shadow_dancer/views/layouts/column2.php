<?php
$this->beginContent('//layouts/main');
//Yii::app()->clientScript->registerScript(
//        'myHideEffect', '$(".info").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
//);

Yii::app()->clientScript->registerScript(
        'myHideEffect', 
        '$(\'#info\').click(function(){ $(".info").slideUp(100); });',
        CClientScript::POS_READY
);

?>
<div class="container">
    <div class="span-19">
        <div id="content">
            <div class="info" id="info">
                <?php
                foreach (Yii::app()->user->getFlashes() as $key => $message) {
                    echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                }
                ?>
            </div>
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span-5 last">
        <div id="sidebar">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => '<span class="icon icon-sitemap_color">Operations</span>',
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items' => $this->menu,
                'htmlOptions' => array('class' => 'operations'),
            ));
            $this->endWidget();
            ?>

            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => '<span class="icon icon-user">Account Details</span>',
            ));
            ?>
            Domains Used: 45/100
            <?php
            $this->widget('zii.widgets.jui.CJuiProgressBar', array(
                'value' => 45,
                'htmlOptions' => array(
                    'style' => 'height:10px;',
                    'class' => 'shadowprogressbar'
                ),
            ));
            ?>
            <br />
            
            Bandwidth Used: 10%
            <?php
            $this->widget('zii.widgets.jui.CJuiProgressBar', array(
                'value' => 10,
                'htmlOptions' => array(
                    'style' => 'height:10px;',
                    'class' => 'shadowprogressbar'
                ),
            ));
            ?>
            <br />
            Conversion rate: 25%            
            <?php
            $this->widget('zii.widgets.jui.CJuiProgressBar', array(
                'value' => 25,
                'htmlOptions' => array(
                    'style' => 'height:10px;',
                    'class' => 'shadowprogressbar'
                ),
            ));
            ?>
            <?php
            $this->endWidget();
            ?>

        </div><!-- sidebar -->
    </div>
</div>
<?php $this->endContent(); ?>