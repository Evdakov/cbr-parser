<?php

namespace frontend\modules\exchange\components;

use yii\base\Component;

class CbrParserComponent extends Component
{
    public static $source = 'http://www.cbr.ru/scripts/XML_daily.asp';

    protected $data = [];

    protected function getCbrData()
    {

        if ($xml = simplexml_load_file(self::$source)) {
            foreach ($xml->Valute as $item) {
                $this->data[(string)$item->CharCode] = [
                    'name' => (string)$item->Name,
                    'nominal' => (int)$item->Nominal,
                    'value' => (float)str_replace(',', '.', $item->Value),
                    'code' => (string)$item->CharCode,
                ];
            }
        }
    }

    public function getData()
    {
        $this->getCbrData();

        return $this->data;
    }
}