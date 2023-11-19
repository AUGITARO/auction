<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\BaseInflector;

class DataController extends Controller
{
    const CATEGORIES = [
        [
            'name' => 'School',
            'symbol_code' => 'school',
        ],
        [
            'name' => 'Bulding',
            'symbol_code' => 'bulding',
        ],
        [
            'name' => 'Books',
            'symbol_code' => 'books',
        ],
        [
            'name' => 'Collection',
            'symbol_code' => 'collection',
        ],
    ];

    public function actionImport()
    {
        define('ENTITIES', [
            'category'
        ]);

        foreach (ENTITIES as $entity) {
            $items = constant('self::' . strtoupper(BaseInflector::pluralize($entity)));
            $className = '\app\models\\' . ucfirst($entity);

            foreach ($items as $item) {
                $model = new $className();

                foreach ($item as $key => $value) {
                    $model->{$key} = $value;
                }
                var_dump($model->save());
            }
        }

        return ExitCode::OK;
    }
}
