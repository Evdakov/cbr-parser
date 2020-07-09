<?php
namespace frontend\modules\exchange\actions;

use frontend\modules\exchange\components\CbrParserComponent;
use frontend\modules\exchange\components\CoursesAnswerComponent;
use yii\data\ArrayDataProvider;
use yii\web\NotFoundHttpException;

class ViewAction extends \yii\rest\ViewAction
{
    public function run($id)
    {
        $cbrData = (new CbrParserComponent())->getData();

        if (!empty($cbrData)) {
            $item = $cbrData[$id];
        }

        $modelClass = $this->modelClass;
        $model = new $modelClass();

        $model->attributes = $item;
        if($model->validate()) {

            return new ArrayDataProvider([
                'allModels' => [
                    [$model->code => (new CoursesAnswerComponent($model))->html()]
                ]
            ]);
        } else {
            throw new NotFoundHttpException("Object not found: $id");
        }
    }
}