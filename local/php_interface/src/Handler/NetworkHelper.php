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
            $result = NetworkTable::add([
                'ELEMENT_ID' => $arFields['ID'],
                'LINK' => 'https://vk.com',
                'COLOR' => 'Голубой'
            ]);
//            $result = NetworkTable::getList([
//                'select' => ['ID','ELEMENT_ID','LINK','COLOR'],
//                'filter' => ['=ID' => 3]
//            ]);
        }
//        while( $ob = $result->fetch())
//        {
//            echo '<pre>'.print_r($ob,true).'</pre>';
//        }
        if ($result->isSuccess()) {
            print_r($result->getId());
        }
        die;
    }

    public static function OnAfterIBlockElementAdd($arFields)
    {
        print_r('ADD');
        d($arFields);
        if ($arFields['NAME'] === 'VK') {
            $result = NetworkTable::add([
                'ELEMENT_ID' => $arFields['ID'],
                'LINK' => 'https://vk.com',
                'COLOR' => 'Голубой'
            ]);
        }
        if ($result->isSuccess()) {
            print_r($result->getId());
        }
        die;
    }
}