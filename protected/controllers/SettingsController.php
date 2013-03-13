<?php

class SettingsController extends Controller
{

    public function actionIndex()
    {
        $model = Setting::model()->find();

        $this->render('index', array(
            'model' => $model,
        ));

    }

    public function actionChange()
    {
        $model = Setting::model()->find();

        if (isset($_POST["Setting"])){
            $model->attributes = $_POST["Setting"];
            if ($model->save()){
                Yii::app()->user->setFlash("success", "Change settings successful");
                $this->redirect(array("/settings/index"));
            }
        }
        $this->render('change', array(
            'model' => $model,
        ));

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