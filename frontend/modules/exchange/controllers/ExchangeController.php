<?php
namespace frontend\modules\exchange\controllers;

use yii\filters\auth\HttpHeaderAuth;
use yii\rest\ActiveController;
use yii\web\Response;

class ExchangeController extends ActiveController
{
    public $modelClass = 'frontend\modules\exchange\models\Currency';

    public $authMethods = [
        'yii\rest\HttpBasicAuth',
    ];

    public function actions()
    {
        return [
            'index' => [
                'class' => 'frontend\modules\exchange\actions\IndexAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'view' => [
                'class' => 'frontend\modules\exchange\actions\ViewAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
        ];
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;

        $behaviors['authenticator']['class'] = HttpHeaderAuth::class;

        return $behaviors;
    }

    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
            'view' => ['GET', 'HEAD'],
        ];
    }
}