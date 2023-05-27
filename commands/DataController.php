<?php

namespace app\commands;

use app\models\Category;
use app\models\Lot;
use app\models\Rate;
use app\models\User;
// use app\models\{User, Category, Rate, Lot};
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\BaseInflector;

class DataController extends Controller
{
    const USERS = [
        [
            'email' => 'jenedy1987@gmail.com',
            'password' => 'honda65hyndayHgJKhgVF',
            'username' => 'jenny',
            'contacts' => '88005553535',
            'avatar_path' => './avatar1.png',

        ],
        [
            'email' => '30jordanSega@gmail.com',
            'password' => 'FHMK10MLP9BPSG2BDRG',
            'username' => 'michele',
            'contacts' => '89993587423',
            'avatar_path' => './avatar2.png',
        ],
        [
            'email' => 'Apugacheva15@ya.ru',
            'password' => 'bebravoz',
            'username' => 'pugalo',
            'contacts' => '87778889911',
            'avatar_path' => './avatar3.png',
        ],
        [
            'email' => '07moondance@gmail.com',
            'password' => 'balaikaRecords',
            'username' => 'nightwish',
            'contacts' => '4608042002356',
            'avatar_path' => './avatar4.png',
        ],
    ];

    const CATEGORIES = [
        [
            'name' => 'School',
            'symbol_code' => 'school',
        ],
        [
            'name' => 'bulding',
            'symbol_code' => 'bulding',
        ],
        [
            'name' => 'books',
            'symbol_code' => 'books',
        ],
        [
            'name' => 'collection',
            'symbol_code' => 'collection',
        ],
    ];

    const LOTS = [
        [
            'name' => 'Pencil',
            'description' => 'Этот карандашь изготовлен из дерева кенши',
            'picture_path' => './Pencil.png',
            'start_price' => 10500,
            'completion_date' => '2023-12-31',
            'rate_step' => 1,
            'user_id' => 1,
            'category_id' => 1, 
        ],
        [
            'name' => 'Тесла',
            'description' => 'Эклюзивная модель Теслы выпущеная в ограниченом количестве',
            'picture_path' => './Tesla.png',
            'start_price' => 10000,
            'completion_date' => '2023-12-31',
            'rate_step' => 2000,
            'user_id' => 1,
            'category_id' => 1, 
        ],
        [
            'name' => 'Империал Российской Империи 1755 номиналом 5 рубль',
            'description' => 'С 1755 года из уральского золота начали чеканить империалы и полуимпериалы — монеты в 5 и 10 рублей',
            'picture_path' => './EmpireCoin.png',
            'start_price' => 1000,
            'completion_date' => '2023-12-31',
            'rate_step' => 10,
            'user_id' => 1,
            'category_id' => 1, 
        ],
        [
            'name' => 'Зуб кита',
            'description' => 'Зуб был добыт с помощью спектрального анализа',
            'picture_path' => './whaleTeeth.png',
            'start_price' => 100,
            'completion_date' => '2023-12-31',
            'rate_step' => 1,
            'user_id' => 1,
            'category_id' => 1, 
        ],
    ];

    const RATES = [
        [
            'price' => 1000,
            'user_id' => 1,
            'lot_id' => 1,
        ],
        [
            'price' => 2000,
            'user_id' => 1,
            'lot_id' => 1,
        ],
        [
            'price' => 3000,
            'user_id' => 1,
            'lot_id' => 1,
        ],
        [
            'price' => 4000,
            'user_id' => 1,
            'lot_id' => 1,
        ],
    ];

    public function actionImport($tableName)
    {
        $items = constant('self::' . strtoupper(BaseInflector::pluralize($tableName)));
        foreach ($items as $item) {
            $className = '\app\models\\' . ucfirst($tableName);
            $entity = new $className();

            foreach ($item as $key => $value) {
                if ($tableName === 'user' && $key === 'password') {
                    $entity->password_hash = Yii::$app->security->generatePasswordHash($value);
                } else {
                    $entity->{$key} = $item[$key];
                }
            }

            var_dump($entity->save());
        }

        return ExitCode::OK;
    }
}