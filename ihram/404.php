<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-offset-2 col-md-8">
			<div class="block-page error404 text-center">
				<div class='text404'>
					Ошибка <span>404</span>
				</div>
				<p>Страница не найдена</p>
				<a class='btn btn-primary btn-lg' href='<?=SITE_DIR?>'>На главную</a>
			</div>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>