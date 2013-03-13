<?php
/**
 * Created by JetBrains PhpStorm.
 * User: luckymancvp
 * Date: 3/12/13
 * Time: 7:16 PM
 * To change this template use File | Settings | File Templates.
 */
class AWSService
{
    public static function setAPIKey()
    {
        /** @var $setting Setting */
        $setting = Setting::model()->find();
        if (!$setting)
            throw new CHttpException("402", "Not found settings");

        if (!defined('AWS_API_KEY'))        define('AWS_API_KEY', $setting->access_key);
        if (!defined('AWS_API_SECRET_KEY')) define('AWS_API_SECRET_KEY', $setting->secret_access_key);
        if (!defined('AWS_ASSOCIATE_TAG'))  define('AWS_ASSOCIATE_TAG' , $setting->associate_id);

    }

    public static function getRawData($asin, $debug = false)
    {
        self::setAPIKey();

        include_once (Yii::getPathOfAlias('ext').'/AmazonECS.class.php');

        try
        {
            $amazonEcs = new AmazonECS(AWS_API_KEY, AWS_API_SECRET_KEY, 'com', AWS_ASSOCIATE_TAG);

            $amazonEcs->associateTag(AWS_ASSOCIATE_TAG);

            // Looking up multiple items
            $response = $amazonEcs->responseGroup('Large')->lookup($asin);
            return gop($response, "Items", "Item");

        }
        catch(Exception $e)
        {
            echo $e->getMessage();
            return array();
        }

        if ("cli" !== PHP_SAPI)
        {
            echo "</pre>";
        }
    }

    public static function fetchInfo($asin, $debug = false)
    {
        $rawData  = self::getRawData($asin, $debug);
        $itemAttr = gop($rawData,"ItemAttributes");

        $model = new Product();
        $model->asin = $asin;
        $model->updated_time = new CDbExpression("NOW()");

        // Get price
        self::getPrice($model, $rawData);
        // Get dimensions
        self::getDimensions($model, $itemAttr);
        // Get common Info
        self::getCommonInfo($model, $rawData);
        // Get image
        self::getImage($model, $rawData);

        if ($debug)
            dump ($model->attributes);
        return ($model->attributes);
    }

    /**
     * @param $model Product
     * @param $rawData
     */
    public static function getPrice($model, $rawData)
    {
        $ItemAttributes = gop($rawData, "ItemAttributes");
        $model->StandardPrice  = gop($ItemAttributes, "ListPrice", "FormattedPrice");
        $model->LowestNewPrice = gop($rawData, "OfferSummary", "LowestNewPrice");
        $model->LowestNewPrice = $model->LowestNewPrice->FormattedPrice;
        $model->fee            = ""; // TODO fee
    }

    /**
     * @param $model Product
     * @param $itemAttr
     */
    public static function getDimensions($model, $itemAttr)
    {
        $ItemDimensions = gop($itemAttr, "ItemDimensions");
        $model->ItemHeight = gop($ItemDimensions, "Height" , "_");
        $model->ItemWidth  = gop($ItemDimensions, "Width" , "_");
        $model->ItemWeight = gop($ItemDimensions, "Weight" , "_"); // TODO check this property
        $model->ItemLength = gop($ItemDimensions, "Length" , "_");

        $PackageDimensions    = gop($itemAttr,"PackageDimensions");
        $model->PackageHeight = gop($PackageDimensions, "Height", "_");
        $model->PackageWidth  = gop($PackageDimensions, "Width", "_");
        $model->PackageWeight = gop($PackageDimensions, "Weight", "_");
        $model->PackageLength = gop($PackageDimensions, "Length", "_");
    }

    /**
     * @param $model Product
     * @param $rawData
     */
    public static function getCommonInfo($model, $rawData){
        $model->ModelNumber = gop($rawData, "ItemAttributes", "Model");
        $model->SalesRank   = gop($rawData, "SalesRank");
    }

    /**
     * @param $model Product
     * @param $rawData
     */
    public static function getImage($model, $rawData){
        $model->ImageS = gop($rawData, "SmallImage", "URL");
        $model->ImageM = gop($rawData, "MediumImage", "URL");
        $model->ImageL = gop($rawData, "LargeImage", "URL");
    }
}

/**
 * getObjectProperty
 * @param $obj
 * @param $property
 * @param null $subProperty
 * @return null
 */
function gop($obj, $property, $subProperty = null){
    if (isset($obj->$property)){
        if ($subProperty){
            if (isset($obj->$property->$subProperty))
                return $obj->$property->$subProperty;
            else return null;
        }
        else
            return $obj->$property;
    }
    return null;
}