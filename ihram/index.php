<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-8">
            <div class="block-opacity main-rasp">
                <h2 class="text-center">Расписание богослужений</h2>
                <div class="overflow-table">
                    <?
                    if(CModule::IncludeModule("iblock")):
                        $arSelect = Array("NAME", "PREVIEW_PICTURE", "PROPERTY_date","PROPERTY_holiday", "PROPERTY_service_time_1",
                            "PROPERTY_service_add_1", "PROPERTY_service2", "PROPERTY_service_time_2", "PROPERTY_service_add_2",
                            "PROPERTY_service3", "PROPERTY_service_time_3", "PROPERTY_service_add_3", "PROPERTY_holiday_description",
                            "PROPERTY_bottom");
                        $arFilter = Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y", ">=PROPERTY_date"=>date('Y-m-d'));
                        $arOrder = Array("PROPERTY_date"=>"ASC");
                        $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
                        $count = 1;
                        while($arFields = $res->GetNext()):
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
                            $count++;
                            if($count > 3) break;
                            //if($week == "Воскресенье") break;
                        endwhile;
                    endif;
                    ?>
                </div>
                <p class="text-center"><a class="btn btn-primary btn-lg" href="<?=SITE_DIR?>hram/raspisanie/" role="button"><?=GetMessage("BTN_SHEDULE_SERVICE_FULL")?></a></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-4">
            <div class="alert alert-warning opacity9">
                <h2 class="text-center">Наш храм</h2>
                <div class="list-group menu-hram">
                    <a href="#" class="list-group-item list-group-item-warning">О храме</a>
                    <a href="#" class="list-group-item list-group-item-warning">Духовенство</a>
                    <a href="#" class="list-group-item list-group-item-warning">События</a>
                    <a href="#" class="list-group-item list-group-item-warning">Фотогалерея</a>
                    <a href="#" class="list-group-item list-group-item-warning">Видео</a>
                </div>
            </div>
            <div class="alert alert-success opacity9">
                <h2 class="text-center">Воскресная школа</h2>
                <div class="list-group menu-hram">
                    <a href="#" class="list-group-item list-group-item-success">О воскресной школе</a>
                    <a href="#" class="list-group-item list-group-item-success">Преподаватели</a>
                    <a href="#" class="list-group-item list-group-item-success">Положения и правила</a>
                    <a href="#" class="list-group-item list-group-item-success">Расписание</a>
                    <a href="#" class="list-group-item list-group-item-success">События</a>
                    <a href="#" class="list-group-item list-group-item-success">Фотогалерея</a>
                    <a href="#" class="list-group-item list-group-item-success">Видео</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact-block">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-5">
                <?
                if(CModule::IncludeModule("iblock")):
                    $arSelect = Array("PROPERTY_address", "PROPERTY_phone", "PROPERTY_phone2", "PROPERTY_email",
                        "PROPERTY_facebook", "PROPERTY_youtube", "PROPERTY_vk", "PROPERTY_vk_school",
                        "PROPERTY_vk_group", "PROPERTY_vk_women", "PROPERTY_yandex_map");
                    $arFilter = Array("IBLOCK_ID"=>1, "ACTIVE"=>"Y");
                    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
                    if($ar_res = $res->GetNext()):
                        $phone1 = $ar_res['PROPERTY_PHONE_VALUE'];
                        $phone1 = preg_replace("#[^\d]#", "", $phone1);
                        $phone2 = $ar_res['PROPERTY_PHONE2_VALUE'];
                        $phone2 = preg_replace("#[^\d]#", "", $phone2);
                        $yandexMap = $ar_res['~PROPERTY_YANDEX_MAP_VALUE'];
                ?>
                <h2><?=GetMessage("MAINPAGE_HEADER_CONTACTS")?></h2>
                <div class="contacts">
                    <p><b><?=GetMessage("CONTACTS_ADDRESS")?></b> <br class="visible-xs"><?=$ar_res['PROPERTY_ADDRESS_VALUE']?></p>
                    <p><b><?=GetMessage("CONTACTS_PHONE")?></b> <br class="visible-xs"><a href="tel:+<?=$phone1?>"><?=$ar_res['PROPERTY_PHONE_VALUE']?></a></p>
                    <p><b><?=GetMessage("CONTACTS_PHONE2")?></b> <br class="visible-xs"><a href="tel:+<?=$phone2?>"><?=$ar_res['PROPERTY_PHONE2_VALUE']?></a></p>
                    <p><b><?=GetMessage("CONTACTS_EMAIL2")?></b> <br class="visible-xs"><a href="mailto:hram-ioana@mail.ru"><?=$ar_res['PROPERTY_EMAIL_VALUE']?></a></p>
                </div>
                <div class="page-header hidden-sm hidden-xs"></div>
                <div class="contacts">
                    <p><a href="<?=$ar_res['PROPERTY_FACEBOOK_VALUE']?>" target="_blank"><i class="fa fa-facebook fa-lg"></i><?=GetMessage("CONTACTS_FACEBOOK")?></a></p>
                    <p><a href="<?=$ar_res['PROPERTY_YOUTUBE_VALUE']?>" target="_blank"><i class="fa fa-youtube fa-lg"></i><?=GetMessage("CONTACTS_YOUTUBE")?></a></p>
                    <p><a href="<?=$ar_res['PROPERTY_VK_VALUE']?>" target="_blank"><i class="fa fa-vk fa-lg"></i><?=GetMessage("CONTACTS_VK")?></a></p>
                    <p><a href="<?=$ar_res['PROPERTY_VK_SCHOOL_VALUE']?>" target="_blank"><i class="fa fa-vk fa-lg"></i><?=GetMessage("CONTACTS_VK_SCHOOL")?></a></p>
                    <p><a href="<?=$ar_res['PROPERTY_VK_GROUP_VALUE']?>" target="_blank"><i class="fa fa-vk fa-lg"></i><?=GetMessage("CONTACTS_VK_GROUP")?></a></p>
                    <p><a href="<?=$ar_res['PROPERTY_VK_WOMEN_VALUE']?>" target="_blank"><i class="fa fa-vk fa-lg"></i><?=GetMessage("CONTACTS_VK_WOMEN")?></a></p>
                </div>
            </div>
            <?
                    endif;
                endif;
            ?>
            <div class="col-xs-12 col-md-offset-1 col-md-6">
                <h2 class="col-xs-12 col-md-offset-3 col-md-9 text-center"><?=GetMessage("MAINPAGE_HEADER_WRITEME")?></h2>
                <div class="feedback">
                    <?$APPLICATION->IncludeComponent("ihram:main.feedback", "main", Array(
                        "COMPONENT_TEMPLATE" => ".default",
                        "EMAIL_TO" => "me@egoshin.net",	// E-mail, на который будет отправлено письмо
                        "EVENT_MESSAGE_ID" => "",	// Почтовые шаблоны для отправки письма
                        "OK_TEXT" => "Спасибо, ваше сообщение принято.",	// Сообщение, выводимое пользователю после отправки
                        "REQUIRED_FIELDS" => "",	// Обязательные поля для заполнения
                        "USE_CAPTCHA" => "Y",	// Использовать защиту от автоматических сообщений (CAPTCHA) для неавторизованных пользователей
                    ),
                        false
                    );?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="map img-responsive">
    <?=$yandexMap?>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>