<?php
$this->breadcrumbs = array(
    'Districs' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Districs', 'url' => array('index'), array('target' => '_blank')),
    array('label' => 'Manage Districs', 'url' => array('admin'),array('target' => '_blank')),
);

echo CHtml::link('Test', array('admin'), array('target' => '_blank'));
?>

<h1>Create Districs</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>