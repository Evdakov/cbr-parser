<?php
namespace frontend\modules\exchange\actions;

use frontend\modules\exchange\components\CbrParserComponent;
use frontend\modules\exchange\components\CoursesAnswerComponent;
use yii\data\ArrayDataProvider;

class IndexAction extends \yii\rest\IndexAction
{
    protected function prepareDataProvider()
    {
        $cbrData = (new CbrParserComponent())->getData();

        if (!empty($cbrData)) {
            $indexes = array_keys($cbrData);
            $randomKey = rand(0, (count($indexes) - 1));

            $item = $cbrData[$indexes[$randomKey]];
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
        }

        throw new NotFoundHttpException("Object not found");
    }
}