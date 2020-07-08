<?php
namespace frontend\modules\exchange\models;
use \yii\base\Model;

/*
 *
 * @property string $name;
 * @property float $value;
 * @property int $nominal;
 * @property string $code;
 * */
class Currency extends Model
{
    public $name;
    public $value;
    public $nominal;
    public $code;


    public function rules()
    {
        return [
            // name, value, nominal and code are required
            [['name', 'value', 'nominal', 'code'], 'required'],
            [['name', 'code'], 'string'],
            ['nominal', 'integer'],
            ['value', 'double'],
        ];
    }

}