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
                            if(CModule::IncludeModule("iblock")):
                                $arSelect = Array("NAME", "DETAIL_TEXT", "DETAIL_PICTURE");
                                $arFilter = Array("IBLOCK_ID"=>10, "ACTIVE"=>"Y");
                                $arOrder = Array("SORT"=>"ASC");
                                $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
                                $count = CIBlock::GetElementCount(3);
                                $num = 1;
                                while($arFields = $res->GetNext()):
                                    $foto = CFile::GetFileArray($arFields["DETAIL_PICTURE"]);?>
                                    <div class="media duhovenstvo">
                                        <a class="media-left" href="#">
                                            <img src="<?=$foto["SRC"]?>" alt="<?=$foto["DESCRIPTION"]?>">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><?=$arFields["NAME"]?></h4>
                                            <?=$arFields["DETAIL_TEXT"]?>
                                        </div>
                                    </div>
                                    <?if($num != $count):?>
                                    <div class="line-bottom-media visible-xs"></div>
                                    <?
                                    endif;
                                    $num++;
                                endwhile;
                            endif;
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