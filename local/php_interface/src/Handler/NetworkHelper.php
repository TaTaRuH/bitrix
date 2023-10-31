<?php

namespace Test\Handler;

use Test\Table\NetworkTable;
use Bitrix\Main\Type;

class NetworkHelper
{

    public static function OnBeforeIBlockElementUpdate($arFields)
    {
        print_r('UPDATE');
        d($arFields);
        if ($arFields['NAME'] === 'VK')
        {
        }
        $result = NetworkTable::getList([
            'select' => ['ID','ELEMENT_ID','LINK','COLOR'],
            'filter' => ['=ELEMENT_ID' => $arFields['ID']]
        ])->fetchAll();
        if (!isset($result[0]['ID']))
        {
            $res = NetworkTable::add([
                'ELEMENT_ID' => $arFields['ID'],
                'LINK' => 'https://vk.com',
                'COLOR' => 'Голубой'
            ]);
        }
        else
        {
            $id = $result[0]['ID'];
            $res = NetworkTable::update($id,[
               'COLOR' => 'Красный'
            ]);
        }
    }

    public static function OnAfterIBlockElementAdd($arFields)
    {
        print_r('ADD');
        d($arFields);
//        if ($arFields['NAME'] === 'VK') {
//            $result = NetworkTable::add([
//                'ELEMENT_ID' => $arFields['ID'],
//                'LINK' => 'https://vk.com',
//                'COLOR' => 'Голубой'
//            ]);
//        }
//        if ($result->isSuccess()) {
//            print_r($result->getId());
//        }
        $result = NetworkTable::add([
            'ELEMENT_ID' => $arFields['ID'],
            'LINK' => 'https://vk.com',
            'COLOR' => 'Голубой'
        ]);
        print_r($result);
    }
}