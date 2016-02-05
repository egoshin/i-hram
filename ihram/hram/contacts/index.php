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
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="block-page">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-8">
                            <h1><?=$title?></h1>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 btn-raspisanie text-right">
                            <a class="btn btn-primary" href="<?=SITE_DIR?>hram/raspisanie/" role="button"><?=GetMessage("BTN_SHEDULE_SERVICE")?></a>
                        </div>
                    </div>
                    <div class="line-bottom"></div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="map img-responsive">
                                <?=$yandexMap?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-5">
                            <h2></h2>
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
        </div>
    </div>
<?
    endif;
endif;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>