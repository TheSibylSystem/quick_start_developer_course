<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

use Bitrix\Main\Page\Asset;

$curPage = $APPLICATION->GetCurPage(false);
if($curPage == '/') {
	$mainPage = true;
}
?>

<!DOCTYPE html>
<head>
	<title>
		<? $APPLICATION->ShowTitle(); ?>
	</title>

	<? $APPLICATION->ShowHead(); ?>

	<?
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/common-styles.css');

	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/vendor/modernizr.min.js');
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/vendor/jquery.min.js');
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/vendor/bootstrap/collapse.js');
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/vendor/bootstrap/tooltip.js');
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/vendor/plugins.js');
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/vendor/jquery.touchSwipe.js');
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/vendor/jquery.ba-throttle-debounce.min.js');
	
	Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
	Asset::getInstance()->addString('<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">');
	?>
    
    <link rel="icon" href="<?= SITE_TEMPLATE_PATH; ?>/ico/favicon_bx.png">
</head>
<body>
	<? $APPLICATION->ShowPanel(); ?>
    <div class="sticky-wrap">
        <header>
            <div class="header-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-xs-12">
							<? if($mainPage): ?>
								<span class="logo">
							<? else: ?>
                            	<a class="logo" href="/">
							<? endif; ?>
							<div class="image">Intervolga.ru</div>
							<div id="slogan-rand" class="slogan">
								<noscript>Сайты и реклама в интернете</noscript>
							</div>
							<? if($mainPage): ?>
								</span>
							<? else: ?>
                            	</a>
							<? endif; ?>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-lg-7 col-xs-12 hidden-xs">
                                    <ul class="btn-list-inline">
										<? 
											$APPLICATION->IncludeFile(
												SITE_DIR . 'include/logo_text_header.php',
												Array(),
												Array("MODE" => "html")
											); 
										?>
                                    </ul>
                                </div>
								<?$APPLICATION->IncludeComponent(
									"bitrix:search.form",
									"search_form",
									Array(
										"PAGE" => "#SITE_DIR#search/index.php",
										"USE_SUGGEST" => "N"
									)
								);?>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <ul class="phone-list">
								<? 
									$APPLICATION->IncludeFile(
										SITE_DIR . 'include/phone_header.php',
										Array(),
										Array("MODE" => "html")
									); 
								?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
       
		<?$APPLICATION->IncludeComponent(
			"bitrix:menu", 
			"main_menu", 
			array(
				"ALLOW_MULTI_SELECT" => "N",
				"CHILD_MENU_TYPE" => "left",
				"DELAY" => "N",
				"MAX_LEVEL" => "1",
				"MENU_CACHE_GET_VARS" => array(
				),
				"MENU_CACHE_TIME" => "3600",
				"MENU_CACHE_TYPE" => "A",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"ROOT_MENU_TYPE" => "top",
				"USE_EXT" => "N",
				"COMPONENT_TEMPLATE" => "main_menu"
			),
			false
		);?>

		<? if($mainPage): ?>
			<?$APPLICATION->IncludeComponent(
			"bitrix:news.list", 
			"slider_main", 
			array(
				"ACTIVE_DATE_FORMAT" => "d.m.Y",
				"ADD_SECTIONS_CHAIN" => "N",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "A",
				"CHECK_DATES" => "N",
				"DETAIL_URL" => "",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"DISPLAY_DATE" => "N",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"DISPLAY_TOP_PAGER" => "N",
				"FIELD_CODE" => array(
					0 => "NAME",
					1 => "PREVIEW_TEXT",
					2 => "PREVIEW_PICTURE",
					3 => "",
				),
				"FILTER_NAME" => "",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"IBLOCK_ID" => "1",
				"IBLOCK_TYPE" => "index",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"INCLUDE_SUBSECTIONS" => "N",
				"MESSAGE_404" => "",
				"NEWS_COUNT" => "50",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => ".default",
				"PAGER_TITLE" => "Новости",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"PREVIEW_TRUNCATE_LEN" => "",
				"PROPERTY_CODE" => array(
					0 => "URL",
					1 => "",
				),
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SORT_BY1" => "SORT",
				"SORT_BY2" => "TIMESTAMP_X",
				"SORT_ORDER1" => "ASC",
				"SORT_ORDER2" => "DESC",
				"STRICT_SECTION_CHECK" => "N",
				"COMPONENT_TEMPLATE" => "slider_main"
			),
			false
		);?>

		<?$APPLICATION->IncludeComponent(
			"intervolga:pages.viewed",
			".default",
			array(
				"COMPONENT_TEMPLATE" => ".default",
				"IBLOCKS" => array(
					0 => "5",
				),
				"IBLOCK_TYPE" => "pages_viewed"
			),
			false
		);?>

			<?$APPLICATION->IncludeComponent(
			"bitrix:news.list", 
			"news_main", 
			array(
				"ACTIVE_DATE_FORMAT" => "j F Y",
				"ADD_SECTIONS_CHAIN" => "N",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "A",
				"CHECK_DATES" => "Y",
				"COMPONENT_TEMPLATE" => "news_main",
				"DETAIL_URL" => "/company-news/#ID#/",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"DISPLAY_DATE" => "Y",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"DISPLAY_TOP_PAGER" => "N",
				"FIELD_CODE" => array(
					0 => "NAME",
					1 => "PREVIEW_TEXT",
					2 => "PREVIEW_PICTURE",
					3 => "DATE_ACTIVE_FROM",
					4 => "",
				),
				"FILTER_NAME" => "",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"IBLOCK_ID" => "2",
				"IBLOCK_TYPE" => "news",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"INCLUDE_SUBSECTIONS" => "N",
				"MESSAGE_404" => "",
				"NEWS_COUNT" => "50",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => ".default",
				"PAGER_TITLE" => "Новости",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"PREVIEW_TRUNCATE_LEN" => "",
				"PROPERTY_CODE" => array(
					0 => "",
					1 => "",
				),
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SORT_BY1" => "ACTIVE_FROM",
				"SORT_BY2" => "SORT",
				"SORT_ORDER1" => "DESC",
				"SORT_ORDER2" => "ASC",
				"STRICT_SECTION_CHECK" => "N"
			),
			false
		);?>
		<? endif; ?>

		<? if (defined('ERROR_404') && ERROR_404 == 'Y'): ?>
    		<div class="page-not-found">
		<? else: ?>
			<div class="container">
				<?php if (!$mainPage): ?>
					<?php $APPLICATION->IncludeComponent(
						"bitrix:breadcrumb",
						"breadcrumb",
						Array(
							"PATH" => "",
							"SITE_ID" => "s1",
							"START_FROM" => "0"
						)
					); ?>
					<h1>
						<? $APPLICATION->ShowTitle(); ?>
					</h1>
				<?php endif; ?>
			</div>
		<? endif; ?>
		<div class="container">
    		
						