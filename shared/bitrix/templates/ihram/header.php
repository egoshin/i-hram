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
			<!-- Fixed navbar -->
			<div class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?=SITE_DIR?>">
							<img src="<?=SITE_TEMPLATE_PATH?>/img/logotype.png" alt="Храм Рождества Иоанна Предтечи в Ивановском">
						</a>
					</div>
					<div class="collapse navbar-collapse navbar-right">
						<ul class="nav navbar-nav">
							<li class="active"><a class="bg-color-1" href="#">О храме</a></li>
							<li><a class="bg-color-2" href="#">Духовенство</a></li>
							<li><a class="bg-color-3" href="#">События</a></li>
							<li><a class="bg-color-4" href="#">Фото</a></li>
							<li><a class="bg-color-1" href="#">Видео</a></li>
							<li><a class="bg-color-2" href="#">Контакты</a></li>
							<li><a href="#">Воскресная школа  <i class="fa fa-angle-double-right"></i></a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</header>
		<div class="hram-bg"></div>