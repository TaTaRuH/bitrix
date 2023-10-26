<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentDescription = array(
    "NAME"=> GetMessage("T_IBLOCK_DESC_SOCNETWORK_LIST"),
    "DESCRIPTION"=> GetMessage("T_IBLOCK_DESC_SOCNETWORK_DESC"),
    "SORT" => 30,
    "CACHE_PATH" => "Y",
    'COMPLEX' => 'N',
    "PATH"=> array(
        "ID"=>GetMessage("T_IBLOCK_DESC_SOCNETWORK"),
        'CHILD' => '',
    )
)

?>