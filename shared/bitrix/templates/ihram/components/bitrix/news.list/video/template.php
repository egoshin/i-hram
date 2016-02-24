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
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="row">
		<div class="col-xs-12 visible-xs visible-sm">
			<p class="text-right"><i class="fa fa-calendar"></i> <?= $arItem["DISPLAY_ACTIVE_FROM"] ?><?=GetMessage("YEAR")?></p>
			<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
				<h4><?= $arItem["NAME"] ?></h4>
			<?endif;?>
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<p><?= $arItem["PREVIEW_TEXT"] ?></p>
			<?endif;?>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="embed-responsive embed-responsive-4by3 video">
				<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
					<?=$arProperty["~VALUE"];?>
				<?endforeach;?>
			</div>
		</div>
		<div class="hidden-xs hidden-sm col-md-6">
			<p class="text-right"><i class="fa fa-calendar"></i> <?= $arItem["DISPLAY_ACTIVE_FROM"] ?><?=GetMessage("YEAR")?></p>
			<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
				<h4><?= $arItem["NAME"] ?></h4>
			<?endif;?>
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<p><?= $arItem["PREVIEW_TEXT"] ?></p>
			<?endif;?>
		</div>
	</div>
	<div class="line-bottom-media video-block"></div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>