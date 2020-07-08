<?php
namespace frontend\modules\exchange\components;

use frontend\modules\exchange\models\Currency;

class CoursesAnswerComponent
{
    /**
     * @var Currency
     */
    private $source;

    public function __construct(Currency $source)
    {
        $this->source = $source;
    }

    public function html(): string
    {
        try {
            return $this->source->nominal.' '.$this->source->name
                .' '.LangHelper::num2word((int)$this->source->nominal, ['равен', 'равны', 'равны'])
                .' '.$this->source->value.' '.LangHelper::num2word((int)$this->source->value, ['рубль', 'рубля', 'рублей']);
        } catch (\Exception $e) {
            return 'Не удалось получить курс. Источник данных недоступен.';
        }
    }
}