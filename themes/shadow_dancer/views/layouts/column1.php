<?php
$this->beginContent('//layouts/main');
//Yii::app()->clientScript->registerScript(
//        'myHideEffect', '$(".info").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
//);

Yii::app()->clientScript->registerScript(
        'myHideEffect', '$(\'#info\').click(function(){ $(".info").slideUp(200); });', CClientScript::POS_READY
);
?>
<div class="container">
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
<?php $this->endContent(); ?>