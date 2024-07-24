<?php

use Bitrix\Main\EventManager;
use Bitrix\Main\Loader;
use Bitrix\Main\Type\DateTime;

Loader::includeModule('iblock');

$eventManager = EventManager::getInstance();
$eventManager->addEventHandler('main', 'OnPageStart', function() {
    if (strpos($_SERVER['REQUEST_URI'], '/bitrix/') === 0 || strpos($_SERVER['REQUEST_URI'], '/admin/') === 0) {
        return;
    }

    global $USER;
    $USER = new \CUser;

    if ($USER->IsAuthorized()) {
        $userId = $USER->GetID();
        $currentUrl = $_SERVER['REQUEST_URI'];

        if ($currentUrl === '/' || strpos($currentUrl, '?') !== false || strpos($currentUrl, '#') !== false) {
            return;
        }

        $iblockId = \CIBlock::GetList([], ['CODE' => 'pages_viewed'])->Fetch()['ID'];
        if (!$iblockId) {
            return;
        }

        $pageTitle =  basename($currentUrl);

        $visits = \CIBlockElement::GetList(
            ['ID' => 'DESC'],
            ['IBLOCK_ID' => $iblockId, 'PROPERTY_USER' => $userId],
            false,
            ['nTopCount' => 3],
            ['ID']
        );

        $visitIds = [];
        while ($visit = $visits->GetNext()) {
            $visitIds[] = $visit['ID'];
        }

        if (count($visitIds) >= 3) {
            \CIBlockElement::Delete(min($visitIds));
        }

        $element = new \CIBlockElement;
        $element->Add([
            'IBLOCK_ID' => $iblockId,
            'NAME' => $pageTitle,
            'ACTIVE' => 'Y',
            'DATE_CREATE' => new DateTime(),
            'PROPERTY_VALUES' => [
                'USER' => $userId,
                'URL' => $currentUrl,
            ],
        ]);
    }
});