<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
// класс для работы с языковыми файлами
use Bitrix\Main\Localization\Loc;
// класс для всех исключений в системе
use Bitrix\Main\SystemException;
// класс для загрузки необходимых файлов, классов, модулей
use Bitrix\Main\Loader;

use Test\Table\Network\NetworkTable;
// основной класс, является оболочкой компонента унаследованного от CBitrixComponent
class CIblocList extends CBitrixComponent
{
    // выполняет основной код компонента, аналог конструктора (метод подключается автоматически)
    public function executeComponent()
    {
        try {
            // подключаем метод проверки подключения модуля «Информационные блоки»
            $this->checkModules();
            // подключаем метод подготовки массива $arResult
            $this->getResult();
        } catch (SystemException $e) {
            ShowError($e->getMessage());
        }
    }
    // подключение языковых файлов (метод подключается автоматически)
    public function onIncludeComponentLang()
    {
        Loc::loadMessages(__FILE__);
    }
    // проверяем установку модуля «Информационные блоки» (метод подключается внутри класса try...catch)
    protected function checkModules()
    {
        // если модуль не подключен
        if (!Loader::includeModule('iblock'))
            // выводим сообщение в catch
            throw new SystemException(Loc::getMessage('IBLOCK_MODULE_NOT_INSTALLED'));
    }
    // обработка массива $arParams (метод подключается автоматически)
    public function onPrepareComponentParams($arParams)
    {
        // время кеширования
        if (!isset($arParams['CACHE_TIME'])) {
            $arParams['CACHE_TIME'] = 3600;
        } else {
            $arParams['CACHE_TIME'] = intval($arParams['CACHE_TIME']);
        }
        // возвращаем в метод новый массив $arParams
        return $arParams;
    }
    // подготовка массива $arResult (метод подключается внутри класса try...catch)
    protected function getResult()
    {
        // если нет валидного кеша, получаем данные из БД
        if ($this->startResultCache()) {
            // Запрос к инфоблоку через класс ORM
            $query = new Bitrix\Main\Entity\Query(
                Bitrix\Iblock\Elements\ElementCatalogTable::getEntity()
            );
            $query->registerRuntimeField(
                // поле network как ссылка на таблицу my_network
                'network', [
                    // тип — сущность NetworkTable
                    'data_type' => \Test\Table\Network\NetworkTable::class,
                    // this.ID относится к таблице, относительно которой строится запрос, т.е. ElementCatalogTable.ID = network.ELEMENT_ID
                    'reference' => ['=this.ID' => 'ref.ELEMENT_ID'],
                    // тип соединения LEFT
                    'join_type' => 'LEFT'
                ]
            ); 
            $query->registerRuntimeField(
            // поле network как ссылка на таблицу my_network
                'description', [
                    // тип — сущность NetworkTable
                    'data_type' => \Test\Table\Network\DescriptionTable::class,
                    // this.ID относится к таблице, относительно которой строится запрос, т.е. ElementCatalogTable.ID = network.ELEMENT_ID
                    'reference' => ['=this.ID' => 'ref.ELEMENT_ID'],
                    // тип соединения LEFT
                    'join_type' => 'LEFT'
                ]
            );
            $query->setSelect(['ID', 'NAME', 'ICON_' => 'PHOTO.FILE', 'NETWORK_ID' => 'network.ID', 'NETWORK_ELEMENT_ID' => 'network.ELEMENT_ID', 'NETWORK_COLOR' => 'network.COLOR', 'NETWORK_LINK' => 'network.LINK', 'DESC_DESCRIPTION' => 'description.DESCRIPTION']);

            $result = $query->exec();
            while ($row = $result->fetch()) {
                $this->arResult[] = $row;
            }

            // кэш не затронет весь код ниже, он будут выполняться на каждом хите, здесь работаем с другим $arResult, будут доступны только те ключи массива, которые перечислены в вызове SetResultCacheKeys()
            if (isset($this->arResult)) {
                // ключи $arResult перечисленные при вызове этого метода, будут доступны в component_epilog.php и ниже по коду, обратите внимание там будет другой $arResult
                $this->SetResultCacheKeys(
                    []
                );
                // подключаем шаблон и сохраняем кеш
                $this->IncludeComponentTemplate();
            } else { // если выяснилось что кешировать данные не требуется, прерываем кеширование и выдаем сообщение «Страница не найдена»
                $this->AbortResultCache();
                \Bitrix\Iblock\Component\Tools::process404(
                    Loc::getMessage('PAGE_NOT_FOUND'),
                    true,
                    true
                );
            }
        }
    }
}