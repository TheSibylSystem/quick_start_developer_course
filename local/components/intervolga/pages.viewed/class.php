<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\Localization\Loc;

class pagesViewedNew extends CBitrixComponent {
    protected function checkModules() {
        if (!Loader::includeModule("iblock")) {
            throw new LoaderException(Loc::getMessage("IBLOCK_MODULE_NOT_INSTALLED"));
        }
    }

    function ListPages() {
        $user = new CUser();
        $arFilter = array(
            "IBLOCK_ID" => $this->arParams["IBLOCKS"],
            "PROPERTY_USER" => $user->GetSessionHash()
        );

        $arOrder = array(
            "created" => "desc"
        );

        $arSelect = array(
            "NAME",
            "PROPERTY_URL"
        );

        $rsItems = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
        while ($arItem = $rsItems->GetNext()) {
            $arResult["ITEMS"][] = array(
                'TITLE' => $arItem["NAME"],
                'URL' => $arItem["PROPERTY_URL_VALUE"]
            );
        }

        return $arResult;
    }

    public function executeComponent() {
        $this->includeComponentLang('class.php');
        $this->checkModules();
        $this->arResult = $this->ListPages();
        $this->includeComponentTemplate();
    }
}