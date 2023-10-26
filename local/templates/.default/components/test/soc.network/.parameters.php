<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
// проверяем установку модуля «Информационные блоки»
if (!CModule::IncludeModule('iblock')) {
    return;
}
// получаем массив всех типов инфоблоков для возможности выбора
$arIBlockType = CIBlockParameters::GetIBlockTypes();
// пустой массив для вывода
$arInfoBlocks = array();
// выбираем активные инфоблоки
$arFilterInfoBlocks = array('ACTIVE' => 'Y');
// сортируем по возрастанию поля сортировка
$arOrderInfoBlocks = array('SORT' => 'ASC');
// если уже выбран тип инфоблока, выбираем инфоблоки только этого типа
if (!empty($arCurrentValues['IBLOCK_TYPE'])) {
    $arFilterInfoBlocks['TYPE'] = $arCurrentValues['IBLOCK_TYPE'];
}
$arSorts = [
    "ASC"  => "По возрастанию",
    "DESC" => "По убыванию",
];
// метод выборки информационных блоков
$rsIBlock = CIBlock::GetList($arOrderInfoBlocks, $arFilterInfoBlocks);
// перебираем и выводим в адмику доступные информационные блоки
while ($obIBlock = $rsIBlock->Fetch()) {
    $arInfoBlocks[$obIBlock['ID']] = '[' . $obIBlock['ID'] . '] ' . $obIBlock['NAME'];
}
// настройки компонента, формируем массив $arParams
$arComponentParameters = array(
    // название кастомной группы не обязательный параметр
//    "GROUPS" => array(
//        "TEST" => array(
//            "NAME" => 'Тест'
//        ),
//    ),
    // основной массив с параметрами
    'PARAMETERS' => array(
        // выбор типа инфоблока
        'IBLOCK_TYPE' => array(                            // ключ массива $arParams в component.php
            'PARENT' => 'BASE',                            // название группы
            'NAME' => GetMessage("T_IBLOCK_DESC_IBTYPE"),  // название параметра
            'TYPE' => 'LIST',                              // тип элемента управления, в котором будет устанавливаться параметр
            'VALUES' => $arIBlockType,                     // входные значения
            'REFRESH' => 'Y',                              // перегружать настройки или нет после выбора (N/Y)
            'DEFAULT' => 'news',                           // значение по умолчанию
            'MULTIPLE' => 'N',                             // одиночное/множественное значение (N/Y)
        ),
        // выбор самого инфоблока
        'IBLOCK_ID' => array(
            'PARENT' => 'BASE',
            'NAME' => 'Выберите родительский инфоблок',
            'TYPE' => 'LIST',
            'VALUES' =>GetMessage('T_IBLOCK_DESC_IBID'),
            'REFRESH' => 'Y',
            "DEFAULT" => '',
            "ADDITIONAL_VALUES" => "Y",
            'MULTIPLE' => 'N',
        ),
        "IBLOCK_SORT_BY" => [
            "PARENT" => "BASE",
            "NAME" => GetMessage('T_IBLOCK_DESC_IBSORT'),
            "TYPE" => "LIST",
            "VALUES" => [
                "SORT" => GetMessage('T_IBLOCK_DESC_FSORT'),
                "NAME" => GetMessage('T_IBLOCK_DESC_FNAME'),
                "ID" => GetMessage('T_IBLOCK_DESC_ID'),
            ],
            "DEFAULT" => "SORT",
        ],
        "IBLOCK_SORT_ORDER" => [
            "PARENT" => "BASE",
            "NAME" => GetMessage('T_IBLOCK_DESC_IBSORTBY'),
            "TYPE" => "LIST",
            "DEFAULT" => "ASC",
            "VALUES" => $arSorts,
            "ADDITIONAL_VALUES" => "Y",
        ],
        // настройки кэширования
        'CACHE_TIME' => array(
            'DEFAULT' => 3600
        ),
    ),
);