<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="row">
    <?php
    if (!empty($arResult['PROPERTIES']['IMG']['VALUE'])):
        $fileIds = $arResult['PROPERTIES']['IMG']['VALUE'];
        $fileImg = [];

        foreach ($fileIds as $fileId) {
            $fileImg[] = CFile::GetFileArray($fileId);
        }
    ?>
	
    <div class="portfolio-works-slider">
        <div class="slider-inner">
            <?php foreach ($fileImg as $img): ?>
                <div class="item-wrap">
                    <a data-blueimp="portfolio-works" class="item" href="<?=$img['SRC']?>">
                        <img src="<?=$img['SRC']?>" alt="<?=$img['DESCRIPTION']?>"/>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="slider-nav slider-next intervolga-chevron-right"></div>
        <div class="slider-nav slider-prev intervolga-chevron-left"></div>
    </div>
    <div id="live-galery" class="blueimp-gallery blueimp-gallery-controls" style="display: none;">
        <div class="slides" style="padding: 10px 0px; width: 7680px;"></div>
        <a class="prev"></a>
        <a class="next"></a>
        <a class="close"></a>
    </div>
    <?php endif; ?>
    <div class="col-xs-12 col-md-12">
        <?=$arResult['DETAIL_TEXT']?>
    </div>
</div>

<?php if (!empty($arResult["CATALOG_RING"]["NEXT"]) || !empty($arResult["CATALOG_RING"]["PREV"])): ?>
<ul class="pager">
    <?php if (!empty($arResult["CATALOG_RING"]["PREV"])): ?>
    <li class="previous">
        <a href="<?=$arResult["CATALOG_RING"]["PREV"]["DETAIL_PAGE_URL"]?>">
            <div class="title">Предыдущий товар</div>
            <?=$arResult["CATALOG_RING"]["PREV"]["NAME"]?>
        </a>
    </li>
    <?php endif; ?>
    <?php if (!empty($arResult["CATALOG_RING"]["NEXT"])): ?>
    <li class="next">
        <a href="<?=$arResult["CATALOG_RING"]["NEXT"]["DETAIL_PAGE_URL"]?>">
            <div class="title">Следующий товар</div>
            <?=$arResult["CATALOG_RING"]["NEXT"]["NAME"]?>
        </a>
    </li>
    <?php endif; ?>
</ul>
<?php endif; ?>