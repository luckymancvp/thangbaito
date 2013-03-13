<?php
/* @var $this ProductsController*/
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle=Yii::app()->name . ' - Products';
$this->breadcrumbs=array(
    'Products',
);
?>

<h1>List All Products</h1>

<form method="GET">
    <div id="langdrop">
        <?php echo CHtml::dropDownList('country', $country, array(
            'us' => 'us', 'jp' => 'jp'), array('submit' => ''));
        ?>
    </div>
</form>

<div class="form">

    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'type'=>'striped bordered condensed',
        'dataProvider'=>$model->search(),
        'template'=>"{items}",
        'columns'=>array_merge(
            $model->attributeNames()/*,
              array(array(
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'htmlOptions'=>array('style'=>'width: 50px'),
            ))*/
        ),
    )); ?>

    <div class="form-actions">
        <?php
            echo CHtml::link("Edit List ASIN", array("/products/asin"), array("class"=>"btn btn-danger"));
            echo " | ";
            echo CHtml::link("Update All Data", array("/products/updateAll"), array("class"=>"btn btn-success"));
        ?>
    </div>

</div><!-- form -->