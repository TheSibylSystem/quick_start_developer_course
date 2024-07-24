<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<? if($arResult["ITEMS"]): ?>
	<div class="activities-description-wrap">
		<div class="activities-description">
			<div class="container">
				<div class="activities-inner">
					<h3>
						<?= GetMessage("PAGES_VIEWED_TITLE"); ?>
					</h3>
					<ul>
						<? foreach($arResult["ITEMS"] as $arItem): ?>
							<li>
								<a href="<?= $arItem["URL"]; ?>">
									<?= $arItem["TITLE"];?>
								</a>
							</li>
						<? endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
<? endif; ?>