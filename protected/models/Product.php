<?php
class Product extends ProductBase
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Product the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getAllAsins()
    {
        $models = Product::model()->findAll();

        /** @var $model Product */
        $asins = array();
        foreach ($models as $model){
            $asins[] = $model->asin;
        }
        return $asins;
    }

    public static function deleteProducts($asins)
    {
        foreach ($asins as $asin){
            Product::deleteByAsin($asin);
        }
    }

    public static function addNewProducts($asins)
    {
        foreach ($asins as $asin){
            Product::addNewByAsin($asin);
        }
    }

    public static function deleteByAsin($asin)
    {
        $model = Product::model()->findByAttributes(array(
            'asin'=>$asin,
        ));

        return ($model && $model->delete());
    }

    public static function addNewByAsin($asin)
    {
        $model = new Product();
        $model->asin = $asin;
        $model->save();
    }

    public static function updateAllAsin(){
        $models = Product::model()->findAll();

        /** @var $model Product */
        foreach ($models as $model){
            $model->attributes = AWSService::fetchInfo($model->asin);

            if (!$model->save())
                dump($model->errors);
        }

    }

}