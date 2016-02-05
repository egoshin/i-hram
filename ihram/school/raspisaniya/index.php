<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
    <div class="container breadcrumb-block">
        <div class="row">
            <div class="col-xs-12">
                <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", Array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                    "SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                    "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
                ),
                    false
                );?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="block-page">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1><?=$title?></h1>
                        </div>
                    </div>
                    <div class="line-bottom"></div>
                    <div class="row">
                        <div class="col-xs-12">
                            Здесь должно быть содержимое страницы...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>