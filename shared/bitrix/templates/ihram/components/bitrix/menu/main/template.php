<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="nav navbar-nav">
<?$numElement = 1;
$count = 1;
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($numElement <> count($arResult)):?>
		<?if($arItem["SELECTED"]):?>
			<li class="active"><a class="bg-color-<?=$count?>" href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a></li>
		<?else:?>
			<li><a class="bg-color-<?=$count?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<?endif?>
	<?else:?>
		<?if($arItem["SELECTED"]):?>
			<li class="active"><a class="bg-color-<?=$count?>" href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?>&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></a></li>
		<?else:?>
			<li><a class="bg-color-<?=$count?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?>&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></a></li>
		<?endif?>
	<?endif?>
	<?if($count < 4):?>
		<?$count++;?>
	<?else:?>
		<?$count = 1;?>
	<?endif?>
	<?$numElement++;?>
<?endforeach?>
</ul>
<?endif?>