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
                        <div class="col-xs-12 col-sm-6 col-md-8">
                            <h1><?=$title?></h1>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 btn-raspisanie text-right">
                            <a class="btn btn-primary" href="<?=SITE_DIR?>school/raspisaniya/" role="button"><?=GetMessage("BTN_SHEDULE")?></a>
                        </div>
                    </div>
                    <div class="line-bottom"></div>
                    <div class="row">
                        <div class="col-xs-12">
							<?
							if(CModule::IncludeModule("iblock")) {
								$arSelect = Array("DETAIL_TEXT");
								$arFilter = Array("IBLOCK_ID"=>9, "ACTIVE"=>"Y");
								$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
								if($ar_res = $res->GetNext()) {
									echo $ar_res['DETAIL_TEXT'];
								}
							}
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>