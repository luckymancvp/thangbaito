<?php

class ProductsController extends Controller
{

    public function actionIndex()
    {
        $model = Product::model();

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id)
    {
        $model = Product::model()->findByPk((int)$id);
        if (!$model)
            throw new CHttpException(500, "Object not found");

        $model->delete();
        $this->redirect(array("/products/index"));
    }

    public function actionAsin()
    {
        $asins = Yii::app()->request->getParam("asins");

        $asinInDB = Product::getAllAsins();
        if ($asins){
            $asins = $this->asinToArray($asins);
            Product::deleteProducts(array_diff($asinInDB, $asins));
            Product::addNewProducts(array_diff($asins, $asinInDB));
        }
        else
            $asins = $asinInDB;

        $this->render("asin", array(
            "asins" => implode("\n", $asins),
        ));
    }

    private function asinToArray($asins)
    {
        $asins = preg_split( '/\r\n|\r|\n|\s/', $asins );
        $asins = array_filter($asins, "trim");
        return $asins;
    }

    public function actionFetchInfo($asin){
        AWSService::fetchInfo($asin, true);
    }

    public function actionUpdateAll(){
        Product::updateAllAsin();
        $this->redirect(array("/products"));
    }

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated users to access all actions　　（されたユーザーはすべてのアクションへのアクセスを許可する）
                'users'=>array('@'),
            ),
            array('deny',  // deny all users　　(すべてのユーザーを拒否する。)
                'users'=>array('*'),
            ),
        );
    }
}