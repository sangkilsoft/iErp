<?php
$baseUrl = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('http://www.google.com/jsapi');
$cs->registerCoreScript('jquery');
$cs->registerScriptFile($baseUrl . '/js/jquery.gvChart-1.0.1.min.js');
$cs->registerScriptFile($baseUrl . '/js/pbs.init.js');
?>

<?php $this->pageTitle = Yii::app()->name; ?>

<h1><?php echo "DASHDOARD"; //.CHtml::encode(Yii::app()->name)   ?></i></h1>
<!--<div class="flash-error">This is an example of an error message to show you that things have gone wrong.</div>
<div class="flash-notice">This is an example of a notice message.</div>
<div class="flash-success">This is an example of a success message to show you that things have gone according to plan.</div>-->
<div class="span-17">
    <?php
    $this->beginWidget('zii.widgets.CPortlet', array(
        'title' => '<span class="icon icon-chart_line">Line Chart</span>',
    ));
    ?>
    <div class="chart3">
        <!--        <div class="text">-->
        <table class="myChart">
            <thead>
                <tr>
                    <th></th>
                    <th>Jan</th>
                    <th>Feb</th>
                    <th>Mar</th>
                    <th>Apr</th>
                    <th>May</th>
                    <th>Jun</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th>Quotes</th>
                    <td>39523</td>
                    <td>26123</td>
                    <td>29031</td>
                    <td>34342</td>
                    <td>48321</td>
                    <td>42234</td>
                </tr>
                <tr>
                    <th>Sales</th>
                    <td>34523</td>
                    <td>22123</td>
                    <td>25031</td>
                    <td>30342</td>
                    <td>45321</td>
                    <td>46234</td>
                </tr>
                <tr>
                    <th>My Own</th>
                    <td>24423</td>
                    <td>15000</td>
                    <td>20231</td>
                    <td>26442</td>
                    <td>25621</td>
                    <td>36334</td>
                </tr>
            </tbody>
        </table>
        <!--        </div>-->
    </div>
    <?php $this->endWidget(); ?>
    </br>
</div>

<div class="span-6 last">
    <?php
    $this->beginWidget('zii.widgets.CPortlet', array(
        'title' => '<span class="icon icon-text_list_numbers">Task List</span>',
    ));
    ?>
    <table border="1">
        <tbody>
            <tr>
                <td>1</td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <?php $this->endWidget(); ?>
</div>
<div class="span-6 last">
    <?php
    $this->beginWidget('zii.widgets.CPortlet', array(
        'title' => '<span class="icon icon-text_list_numbers">Task List</span>',
    ));
    ?>
    <table border="1">
        <tbody>
            <tr>
                <td>1</td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <?php $this->endWidget(); ?>
</div>