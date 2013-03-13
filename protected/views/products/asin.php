<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle=Yii::app()->name . ' - Edit List Asin';
$this->breadcrumbs=array(
    'Edit List ASIN',
);
?>

<h1>List ASIN</h1>

<div class="form">

    <form method="POST">

    <div class="row">
        <div class="span3">
            <p>Enter list of ASIN codes</p>
        </div>
    </div>

    <div class="row">
        <div class="span4">
        <?php echo CHtml::textArea("asins",$asins, array(
            'style'=>"width: 100%; height: 250px",
        )); ?>
        </div>
    </div>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton',array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>'Submit',
    )); ?>
    </div>

    </form>

</div><!-- form -->