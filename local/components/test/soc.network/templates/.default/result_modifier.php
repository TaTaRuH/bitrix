<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult as $key => $value) {
    $arResult[$key]['SRC'] = CFile::GetPath($value["ICON_ID"]);

}