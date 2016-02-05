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
                            <a class="btn btn-success" href="<?=SITE_DIR?>hram/raspisanie/raspisanie.pdf" role="button" target="_blank">
                                <?=GetMessage("BTN_SHEDULE_PDF")?>
                            </a>
                        </div>
                    </div>
                    <div class="line-bottom"></div>
                    <div class="row">
                        <div class="col-xs-12">
                            <?
                            if(CModule::IncludeModule("iblock")):
                                $arSelect = Array("PROPERTY_date");
                                $arFilter = Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y", ">=PROPERTY_date"=>date('Y-m-d'));
                                $arOrder = Array("PROPERTY_date"=>"DESC");
                                $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
                                $maxDate = null;
                                $curDate = null;
                                $interval = null;
                                if($arFields = $res->GetNext()){
                                    $maxDate = strtotime($DB->DateFormatToPHP($arFields["PROPERTY_DATE_VALUE"]));
                                    $maxDate = mktime(0,0,0,date(m, $maxDate),date(d, $maxDate),date(Y, $maxDate));
                                    $curDate = strtotime(date('d.m.Y'));
                                    $curDate = mktime(0,0,0,date(m, $curDate),date(d, $curDate),date(Y, $curDate));
                                    $interval = ($maxDate - $curDate)/86400;
                                }
                                $from = date('Y-m-d', $curDate);
                                $endDate = date('Y-m-d', strtotime($from.'+'.$interval.' day'));
                                $wd = 7 - date('w');
                                $to = date('Y-m-d', strtotime($from.'+'.$wd.' day'));
                                $countweek = 1;
                                $arWeekBegin[$countweek] = $from;
                                $arWeekEnd[$countweek] = $to;
                                $countweek++;
                                $bDate = date('Y-m-d', strtotime($to.'+1 day'));
                                while ($bDate <= $endDate) {
                                    $arWeekBegin[$countweek] = $bDate;
                                    $arWeekEnd[$countweek] = date('Y-m-d', strtotime($bDate.'+6 day'));;
                                    $bDate = date('Y-m-d', strtotime($bDate.'+7 day'));
                                    $countweek++;
                                }
                                $countweek--;
                                if(isset($_REQUEST["week"])){
                                    $from = $arWeekBegin[trim($_REQUEST["week"])];
                                    $to = $arWeekEnd[trim($_REQUEST["week"])];
                                }
                                else {
                                    $from = date('Y-m-d', $curDate);
                                    $endDate = date('Y-m-d', strtotime($from.'+'.$interval.' day'));
                                    $wd = 7 - date('w');
                                    $to = date('Y-m-d', strtotime($from.'+'.$wd.' day'));
                                }
                                $arSelect = Array("NAME", "PREVIEW_PICTURE", "PROPERTY_date","PROPERTY_holiday", "PROPERTY_service_time_1",
                                    "PROPERTY_service_add_1", "PROPERTY_service2", "PROPERTY_service_time_2", "PROPERTY_service_add_2",
                                    "PROPERTY_service3", "PROPERTY_service_time_3", "PROPERTY_service_add_3", "PROPERTY_holiday_description",
                                    "PROPERTY_bottom");
                                $arFilter = Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y", "><PROPERTY_date"=>array($from, $to));
                                $arOrder = Array("PROPERTY_date"=>"ASC");
                                $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);?>
                                <div class="row bold top-nav-rasp">
                                    <div class="col-xs-6 col-md-6 text-left">
                                        <?if((trim($_REQUEST["week"]) != 1) && isset($_REQUEST["week"])):?>
                                            <a class="btn btn-default" href="<?=SITE_DIR?>hram/raspisanie/?week=<?=trim($_REQUEST["week"])-1?>" role="button">
                                                <i class="fa fa-long-arrow-left"></i><span class="hidden-xs">&nbsp;&nbsp;<?=GetMessage("BTN_PREV")?></span>
                                            </a>
                                        <?endif;?>
                                    </div>
                                    <div class="col-xs-6 col-md-6 text-right">
                                        <?if(trim($_REQUEST["week"]) != $countweek):
                                            if(isset($_REQUEST["week"])):?>
                                                <a class="btn btn-default" href="<?=SITE_DIR?>hram/raspisanie/?week=<?=trim($_REQUEST["week"])+1?>" role="button">
                                                    <span class="hidden-xs"><?=GetMessage("BTN_NEXT")?>&nbsp;&nbsp;</span><i class="fa fa-long-arrow-right"></i>
                                                </a>
                                            <?else:?>
                                                <a class="btn btn-default" href="<?=SITE_DIR?>hram/raspisanie/?week=2" role="button">
                                                    <span class="hidden-xs"><?=GetMessage("BTN_NEXT")?>&nbsp;&nbsp;</span><i class="fa fa-long-arrow-right"></i>
                                                </a>
                                            <?endif;
                                        endif;?>
                                    </div>
                                </div>
                                <?while($arFields = $res->GetNext()):
                                    $icon = CFile::GetFileArray($arFields["PREVIEW_PICTURE"]);
                                    $date = $arFields["PROPERTY_DATE_VALUE"];
                                    setlocale(LC_ALL, 'ru_RU.UTF-8');
                                    $week = strftime("%A",strtotime($date));
                                    if($arFields["PROPERTY_HOLIDAY_VALUE"] == "Да") {
                                        $fontColor = "#a94442";
                                    }
                                    else {
                                        $fontColor = "#31708f";
                                    }
                                    if($week == "Воскресенье") {
                                        $panelColor = "panel-danger";
                                        $fontColor = "#a94442";
                                    }
                                    else {
                                        $panelColor = "panel-default";
                                    }
                                    ?>
                                    <div class="panel <?=$panelColor?>">
                                        <div class="panel-heading">
                                            <h3 class="panel-title bold" style="color: <?=$fontColor?>;"><?=$date?>. <?=$week?>.<br><br><?=$arFields["PROPERTY_HOLIDAY_DESCRIPTION_VALUE"]["TEXT"]?></h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-2 hidden-xs hidden-sm">
                                                    <img class="img-responsive" src="<?=$icon["SRC"]?>" alt="<?=$icon["DESCRIPTION"]?>">
                                                </div>
                                                <div class="col-xs-12 col-md-10">
                                                    <div class="row">
                                                        <div class="col-xs-3 col-sm-2">
                                                            <p class="bold"><?=$arFields["PROPERTY_SERVICE_TIME_1_VALUE"]?></p>
                                                        </div>
                                                        <div class="ol-xs-9 col-sm-4">
                                                            <p class="bold"><?=$arFields["NAME"]?></p>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6">
                                                            <p class=""><?=$arFields["PROPERTY_SERVICE_ADD_1_VALUE"]["TEXT"]?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-3 col-sm-2">
                                                            <p class="bold"><?=$arFields["PROPERTY_SERVICE_TIME_2_VALUE"]?></p>
                                                        </div>
                                                        <div class="col-xs-9 col-sm-4">
                                                            <p class="bold"><?=$arFields["PROPERTY_SERVICE2_VALUE"]?></p>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6">
                                                            <p class=""><?=$arFields["PROPERTY_SERVICE_ADD_2_VALUE"]["TEXT"]?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-3 col-sm-2">
                                                            <p class="bold"><?=$arFields["PROPERTY_SERVICE_TIME_3_VALUE"]?></p>
                                                        </div>
                                                        <div class="ccol-xs-9 col-sm-4">
                                                            <p class="bold"><?=$arFields["PROPERTY_SERVICE3_VALUE"]?></p>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6">
                                                            <p class=""><?=$arFields["PROPERTY_SERVICE_ADD_3_VALUE"]["TEXT"]?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer text-danger"><?=$arFields["PROPERTY_BOTTOM_VALUE"]["TEXT"]?></div>
                                    </div>
                                    <?
                                endwhile;
                            endif;
                            ?>
                            <div class="row bold bottom-nav-rasp">
                                <div class="col-xs-6 col-md-6 text-left">
                                    <?if((trim($_REQUEST["week"]) != 1) && isset($_REQUEST["week"])):?>
                                    <a class="btn btn-default" href="<?=SITE_DIR?>hram/raspisanie/?week=<?=trim($_REQUEST["week"])-1?>" role="button">
                                        <i class="fa fa-long-arrow-left"></i><span class="hidden-xs">&nbsp;&nbsp;<?=GetMessage("BTN_PREV")?></span>
                                    </a>
                                    <?endif;?>
                                </div>
                                <div class="col-xs-6 col-md-6 text-right">
                                    <?if(trim($_REQUEST["week"]) != $countweek):
                                        if(isset($_REQUEST["week"])):?>
                                            <a class="btn btn-default" href="<?=SITE_DIR?>hram/raspisanie/?week=<?=trim($_REQUEST["week"])+1?>" role="button">
                                                <span class="hidden-xs"><?=GetMessage("BTN_NEXT")?>&nbsp;&nbsp;</span><i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        <?else:?>
                                            <a class="btn btn-default" href="<?=SITE_DIR?>hram/raspisanie/?week=2" role="button">
                                                <span class="hidden-xs"><?=GetMessage("BTN_NEXT")?>&nbsp;&nbsp;</span><i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        <?endif;
                                    endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>