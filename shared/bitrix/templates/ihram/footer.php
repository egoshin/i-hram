<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<footer>
	<div class="container-fluid">
		<div class="row">
			<?
			if(CModule::IncludeModule("iblock")):
				$arSelect = Array("PROPERTY_phone", "PROPERTY_email", "PROPERTY_facebook", "PROPERTY_youtube", "PROPERTY_vk");
				$arFilter = Array("IBLOCK_ID"=>1, "ACTIVE"=>"Y");
				$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
				if($ar_res = $res->GetNext()):
					$phone = $ar_res['PROPERTY_PHONE_VALUE'];
					$phone = preg_replace("#[^\d]#", "", $phone);
			?>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<ul class="list-inline social">
					<li><a href="<?=$ar_res['PROPERTY_FACEBOOK_VALUE']?>" target="_blank"><i class="fa fa-facebook fa-2x"></i></a></li>
					<li><a href="<?=$ar_res['PROPERTY_VK_VALUE']?>" target="_blank"><i class="fa fa-vk fa-2x"></i></a></li>
					<li><a href="<?=$ar_res['PROPERTY_YOUTUBE_VALUE']?>"><i class="fa fa-youtube fa-2x"></i></a></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 text-center">
				<p>
					<a href="mailto:<?=$ar_res['PROPERTY_EMAIL_VALUE']?>"><?=$ar_res['PROPERTY_EMAIL_VALUE']?></a><br>
					<a href="tel:+<?=$phone?>"><?=$ar_res['PROPERTY_PHONE_VALUE']?></a>
				</p>
			</div>
			<?
				endif;
			endif;
			?>
			<div class="col-xs-12 col-sm-12 col-md-4 text-right">
				<p class="text-muted">
					<?=GetMessage("FOOTER_CREATOR_TEXT")?> <br class="hidden-sm">
					<a href='http://www.baza23.ru' target='_blank'><?=GetMessage("FOOTER_CREATOR_HREF")?></a>
				</p>
			</div>
		</div>
	</div>
</footer>
	</body>
</html>