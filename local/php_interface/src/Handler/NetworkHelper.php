<?php

namespace Test\Handler;

use Test\Table\NetworkTable;
use Bitrix\Main\Type;

class NetworkHelper
{

    public static function OnBeforeIBlockElementUpdate($arFields)
    {
        $array = ['VK' => 'Белый','INST'=>'Черный','TG'=>'Серый'];

        $result = NetworkTable::getList([
            'select' => ['ID','ELEMENT_ID','LINK','COLOR'],
            'filter' => ['=ELEMENT_ID' => $arFields['ID']]
        ])->fetch();

        $id = $result['ID'];

        if (isset($id))
        {
            $res = NetworkTable::update($id,[
                'COLOR' => $array[$arFields['NAME']]
            ]);
        }
    }

    public static function OnAfterIBlockElementAdd($arFields)
    {
        d($arFields);
        $array = [
            'VK'=>
                [
                    'ELEMENT_ID' => $arFields['ID'],
                    'LINK' => 'https://vk.com/',
                    'COLOR' => 'Синий'
                ],
            'INST'=>
                [
                    'ELEMENT_ID' => $arFields['ID'],
                    'LINK' => 'https://instagram.com/',
                    'COLOR' => 'Желтый'
                ],
            'TG'=>
                [
                    'ELEMENT_ID' => $arFields['ID'],
                    'LINK' => 'https://web.telegram.org/',
                    'COLOR' => 'Голубой'
                ]
        ];
        $result = NetworkTable::add($array[$arFields['NAME']]);

    }
}