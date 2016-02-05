<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?
		if($section_php = $APPLICATION->GetFileRecursive(".section.php")) {
			@include($_SERVER['DOCUMENT_ROOT'].$section_php);
			$title = $sSectionName;
		}
		$APPLICATION->SetTitle($title);
		?>
		<title><?$APPLICATION->ShowTitle($title);?></title>
		<?$APPLICATION->ShowHead();?>
		<link rel="apple-touch-icon" sizes="57x57" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?=SITE_TEMPLATE_PATH?>/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?=SITE_TEMPLATE_PATH?>/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?=SITE_TEMPLATE_PATH?>/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?=SITE_TEMPLATE_PATH?>/favicon/favicon-16x16.png">
		<link rel="manifest" href="<?=SITE_TEMPLATE_PATH?>/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?=SITE_TEMPLATE_PATH?>/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.min.js');?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/bootstrap.min.js');?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/media.match.min.js');?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/enquire.min.js');?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/script.js');?>
		<!--[if lt IE 9]>
			<script src="<?=SITE_TEMPLATE_PATH?>/js/ie9/html5shiv.min.js"></script>
			<script src="<?=SITE_TEMPLATE_PATH?>/js/ie9/html5shiv-printshiv.min.js"></script>
			<script src="<?=SITE_TEMPLATE_PATH?>/js/ie9/respond.js"></script>
		<![endif]-->
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/style.css');?>
	</head>
	<body>
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>
		<header role="banner">
			<div class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only"><?=GetMessage("HEADER_SR_ONLY")?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?=SITE_DIR?>">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/logotype.png" alt="<?=GetMessage("HEADER_LOGOTYPE_ALT")?>">
						</a>
					</div>
					<div class="collapse navbar-collapse navbar-right">
                        <?$APPLICATION->IncludeComponent("bitrix:menu", "main", Array(
                            "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                            "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                            "COMPONENT_TEMPLATE" => ".default",
                            "DELAY" => "N",	// Откладывать выполнение шаблона меню
                            "MAX_LEVEL" => "1",	// Уровень вложенности меню
                            "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                            "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                            "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                            "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                            "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                        ),
                            false
                        );?>
					</div>
				</div>
			</div>
		</header>
	<?$imgBackgrond = $APPLICATION->GetFileRecursive("bg.jpg");?>
		<div class="hram-bg hidden-xs hidden-sm" style="background: url('<?=$imgBackgrond?>') no-repeat top center;background-size: cover;"></div>