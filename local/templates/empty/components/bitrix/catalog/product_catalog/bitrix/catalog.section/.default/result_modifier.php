<?
foreach($arResult["ITEMS"] as $cell => $arElement) {
    if($arElement["PREVIEW_PICTURE"]["ID"]) {
        $file = CFile::ResizeImageGet(
            $arElement["PREVIEW_PICTURE"]["ID"],
            ["width" => $arParams['CATALOG_WIDTH'], "height" => $arParams['CATALOG_HEIGHT']],
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        $arResult["ITEMS"][$cell]["PREVIEW_PICTURE"]["WIDTH"] = $file['width'];
        $arResult["ITEMS"][$cell]["PREVIEW_PICTURE"]["HEIGHT"] = $file['height'];
        $arResult["ITEMS"][$cell]["PREVIEW_PICTURE"]["SRC"] = $file['src'];
    }
}
