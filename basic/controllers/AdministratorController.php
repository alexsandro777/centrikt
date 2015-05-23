<?php
/**
 * Created by PhpStorm.
 * User: YsWaY
 * Date: 17.03.15
 * Time: 5:02
 */
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\News;

class AdministratorController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('complete');
        }
        return $this->render('create',[
            'model'=> $model,
        ]);
    }
}
