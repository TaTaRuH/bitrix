<?php

require_once __DIR__ . '/vendor/autoload.php';

if (file_exists($_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/include/functions.php')) {
    require_once($_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/include/functions.php');
}
// array(1- навзание класса, 2 - название метода)
\Bitrix\Main\EventManager::getInstance()->addEventHandler('iblock', 'OnBeforeIBlockElementUpdate', [\Test\Handler\NetworkHelper::class,'OnBeforeIBlockElementUpdate']);
\Bitrix\Main\EventManager::getInstance()->addEventHandler('iblock', 'OnAfterIBlockElementAdd', [\Test\Handler\NetworkHelper::class,'OnAfterIBlockElementAdd']);
