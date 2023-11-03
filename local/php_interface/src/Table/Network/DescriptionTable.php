<?php

namespace Test\Table\Network;

use Bitrix\Main\Entity;

class DescriptionTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'my_info';
    }

    public static function getUfId()
    {
        return 'MY_INFO';
    }
    public static function getMap()
    {
        return [
            new Entity\IntegerField('ID', [
                'primary' => true,
                'autocomplete' => true
            ]),
            new Entity\IntegerField('ELEMENT_ID'),
            new Entity\StringField('DESCRIPTION')
        ];
    }
}