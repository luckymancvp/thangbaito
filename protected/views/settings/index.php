<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle=Yii::app()->name . ' - Settings API';
$this->breadcrumbs=array(
    'Settings',
);
?>

<h1>Aamazon WebService API Settings</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    )); ?>

<?php else: ?>

<div class="form">

    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'attributes'=>array(
            'access_key',
            'secret_access_key',
            'api_version',
            'associate_id',
            'japan_url',
            'usa_url',
            'updated_time',
        ),
    ));
    ?>

    <div class="form-actions">
        <?php
            echo CHtml::link("Change Settings", array("/settings/change"), array("class"=>"btn btn-danger"));
        ?>
    </div>

</div><!-- form -->

<?php endif; ?>