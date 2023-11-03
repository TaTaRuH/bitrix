<?php

namespace Test\Handler;

use Test\Table\Network\NetworkTable;

use Test\Table\Network\DescriptionTable;

use Bitrix\Main\Type;

class NetworkHandler
{

    public static function OnAfterIBlockElementUpdate($arFields)
    {
        $array = ['VK' => 'Белый', 'INST' => 'Черный', 'TG' => 'Серый'];

        $result = NetworkTable::getList([
            'select' => ['ID', 'ELEMENT_ID', 'LINK', 'COLOR'],
            'filter' => ['=ELEMENT_ID' => $arFields['ID']]
        ])->fetch();

        $id = $result['ID'];

        if (isset($id)) {
            $res = NetworkTable::update($id, [
                'COLOR' => $array[$arFields['NAME']]
            ]);
        }
    }

    public static function OnAfterIBlockElementAdd($arFields)
    {
        $conn = \Bitrix\Main\Application::getConnection();

        d($arFields);

        $array = [
            'VK' => [
                    'ELEMENT_ID' => $arFields['ID'],
                    'LINK' => 'https://vk.com/',
                    'COLOR' => 'Синий',
                    'DESCRIPTION' => 'Старая классика'
            ],
            'INST' => [
                    'ELEMENT_ID' => $arFields['ID'],
                    'LINK' => 'https://instagram.com/',
                    'COLOR' => 'Желтый',
                    'DESCRIPTION' => 'без VPN фиг зайдешь'
            ],
            'TG'=> [
                    'ELEMENT_ID' => $arFields['ID'],
                    'LINK' => 'https://web.telegram.org/',
                    'COLOR' => 'Голубой',
                    'DESCRIPTION' => 'Павел Дуров молодец!'
            ]
        ];
        $conn->startTransaction();

        $result = NetworkTable::add($array[$arFields['NAME']]);

        if (!$result->isSuccess())
        {
            $conn->rollbackTransaction();
        }

        $res = DescriptionTable::add([
            'ELEMENT_ID' => $arFields['ID'],
            'DESCRIPTION' => $array[$arFields['NAME']]['DESCRIPTION']
        ]);
        if (!$res->isSuccess())
        {
            $conn->rollbackTransaction();
        }
        $conn->commitTransaction();
    }
}