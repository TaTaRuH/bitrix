<?php

namespace Test\Table;

use Bitrix\Main\Entity;

class NetworkTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'my_networks';
    }

    public static function getUfId()
    {
        return 'MY_NETWORKS';
    }
    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\IntegerField('ELEMENT_ID'),
            new Entity\StringField('LINK'),
            new Entity\StringField('COLOR')
        );
    }
}
?>