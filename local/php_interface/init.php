<?php

require_once __DIR__ . '/vendor/autoload.php';

if (file_exists($_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/include/functions.php')) {
    require_once($_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/include/functions.php');
}
\Bitrix\Main\Loader::registerAutoLoadClasses(null, [
    '\Test\Helpers\NetworksTable' => '/local/modules/fred.helpers/lib/networks.php'
]);

//print_r ("TEST");
//\Bitrix\Main\EventManager::getInstance()->addEventHandler('sale', 'OnSaleOrderSaved', 'OnSaleOrderSavedHandler');
//
//function OnSaleOrderSavedHandler(Bitrix\Main\Event $event)
//{
//    $order = $event->getParameter("ENTITY");
//
//    $isNew = $event->getParameter("IS_NEW");
//    $userId = $order->getUserId();
//    $arOrderVals = $order->getFields()->getValues();
//    $orderId = $arOrderVals['ID'];
//
//    if ($isNew)
//    {
//        if (empty($userId) or empty($orderId)) return;
//        $discountData = $order->getDiscount()->getApplyResult();
//        $groupId = 9;
//        $couponName = 'ВСЕПО300';
//
//        if (key($discountData['COUPON_LIST']) == $couponName) {
//        $arGroups = CUser::GetUserGroup($userId);
//        $key = array_search($groupId, $arGroups);
//        if ($key !== false)
//        {
//            unset($arGroups[$key]);
//            CUser::SetUserGroup($userId, $arGroups);
//        }
//        }
//    }
//    \Bitrix\Sale\DiscountCouponsManager::clear(true);
//}
//\Bitrix\Main\EventManager::getInstance()->addEventHandler('main', 'OnAfter', 'OnSaleOrderSavedHandler');
//\Bitrix\Main\EventManager::getInstance()->addEventHandler('sale', 'OnBeforeBasketUpdate', array('RestTest','UpdateTest'));
//class RestTest
//{
//    public static function UpdateTest($event)
//    {
//        echo "TEST";
//    }
//}
?>