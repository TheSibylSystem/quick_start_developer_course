<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

use Bitrix\Main\Page\Asset;
?>

</div>
<? if (defined('ERROR_404') && ERROR_404 == 'Y'): ?>
    </div>
<? else: ?>
    <div class="sticky-push"></div>
<? endif; ?>
</div>

    <footer>
        <div class="sticky-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <address>
							<? 
								$APPLICATION->IncludeFile(
									SITE_DIR . 'include/contacts_footer.php',
									Array(),
									Array("MODE" => "html")
								); 
							?>
                        </address>
                    </div>

                    <div class="col-md-4 col-md-push-4">
                        <div class="copyright">
                            Данный шаблон предоставлен компанией<br/>© <a href="http://www.intervolga.ru">ИНТЕРВОЛГА</a> для
                            Академии 1С-Битрикс
                        </div>
                    </div>W

                    <div class="col-md-4 col-md-pull-4 hidden-print">
                        <ul class="list-inline social-links">
							<? 
								$APPLICATION->IncludeFile(
									SITE_DIR . 'include/social_networks_footer.php',
									Array(),
									Array("MODE" => "html")
								); 
							?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

	<? Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/main.js'); ?>
</body>
</html>
