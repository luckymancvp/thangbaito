<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
    'Contact',
);
?>

<h1>API settings</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('contact'),
    )); ?>

<?php else: ?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'contact-form',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldRow($model,'access_key'); ?>
    <?php echo $form->textFieldRow($model,'secret_access_key'); ?>
    <?php echo $form->textFieldRow($model,'api_version'); ?>
    <?php echo $form->textFieldRow($model,'associate_id'); ?>
    <?php echo $form->textFieldRow($model,'japan_url'); ?>
    <?php echo $form->textFieldRow($model,'usa_url'); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton',array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>'Submit',
    )); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>