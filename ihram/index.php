<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-8">
            <div class="block-opacity main-rasp">
                <h2 class="text-center"><?=GetMessage("MAINPAGE_HEADER_SHEDULE")?></h2>
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
            <div class="alert alert-warning main-event">
                <h2 class="text-center"><?=GetMessage("MAINPAGE_HEADER_EVENTS")?></h2>
                <div class="list-group menu-hram">
                    <?$APPLICATION->IncludeComponent("bitrix:news.list", "events-mainpage", Array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
                        "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
                        "AJAX_MODE" => "N",	// Включить режим AJAX
                        "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
                        "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
                        "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
                        "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
                        "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
                        "CACHE_GROUPS" => "Y",	// Учитывать права доступа
                        "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                        "CACHE_TYPE" => "A",	// Тип кеширования
                        "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
                        "COMPONENT_TEMPLATE" => "events",
                        "DETAIL_URL" => "#SITE_DIR#hram/sobytiya/#ELEMENT_ID#/",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                        "DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
                        "DISPLAY_DATE" => "Y",	// Выводить дату элемента
                        "DISPLAY_NAME" => "Y",	// Выводить название элемента
                        "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
                        "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
                        "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
                        "FIELD_CODE" => array(	// Поля
                            0 => "",
                            1 => "",
                        ),
                        "FILTER_NAME" => "",	// Фильтр
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
                        "IBLOCK_ID" => "5",	// Код информационного блока
                        "IBLOCK_TYPE" => "-",	// Тип информационного блока (используется только для проверки)
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
                        "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
                        "MEDIA_PROPERTY" => "",	// Свойство для отображения медиа
                        "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
                        "NEWS_COUNT" => "1",	// Количество новостей на странице
                        "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
                        "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
                        "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
                        "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
                        "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
                        "PAGER_TITLE" => "Новости",	// Название категорий
                        "PARENT_SECTION" => "",	// ID раздела
                        "PARENT_SECTION_CODE" => "",	// Код раздела
                        "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
                        "PROPERTY_CODE" => array(	// Свойства
                            0 => "",
                            1 => "",
                        ),
                        "SEARCH_PAGE" => "/search/",	// Путь к странице поиска
                        "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
                        "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
                        "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
                        "SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
                        "SET_STATUS_404" => "N",	// Устанавливать статус 404
                        "SET_TITLE" => "N",	// Устанавливать заголовок страницы
                        "SHOW_404" => "N",	// Показ специальной страницы
                        "SLIDER_PROPERTY" => "",	// Свойство с изображениями для слайдера
                        "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
                        "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
                        "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
                        "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
                        "TEMPLATE_THEME" => "blue",	// Цветовая тема
                        "USE_RATING" => "N",	// Разрешить голосование
                        "USE_SHARE" => "Y",	// Отображать панель соц. закладок
                        "SHARE_TEMPLATE" => "main",	// Шаблон компонента панели соц. закладок
                        "SHARE_HANDLERS" => array(	// Используемые соц. закладки и сети
                            0 => "vk",
                            1 => "facebook",
                            2 => "twitter",
                        ),
                        "SHARE_SHORTEN_URL_LOGIN" => "",	// Логин для bit.ly
                        "SHARE_SHORTEN_URL_KEY" => "",	// Ключ для для bit.ly
                    ),
                        false
                    );?>
                </div>
                <div class="text-center btn-main-all-events">
                    <a href="<?=SITE_DIR?>hram/sobytiya" class="btn btn-primary"><?=GetMessage("BTN_ALL_EVENTS")?></a>
                </div>
            </div>
            <div class="alert alert-success main-school">
                <h2 class="text-center"><?=GetMessage("MAINPAGE_HEADER_SCHOOL")?></h2>
                <div class="list-group menu-hram">
                    <a href="<?=SITE_DIR?>school/about-school/" class="list-group-item list-group-item-success"><?=GetMessage("MAINPAGE_SCHOOL_ABOUT")?></a>
                    <a href="<?=SITE_DIR?>school/prepodavateli/" class="list-group-item list-group-item-success"><?=GetMessage("MAINPAGE_SCHOOL_PREPOD")?></a>
                    <a href="<?=SITE_DIR?>school/pravila/" class="list-group-item list-group-item-success"><?=GetMessage("MAINPAGE_SCHOOL_PRAVILA")?></a>
                    <a href="<?=SITE_DIR?>school/raspisaniya/" class="list-group-item list-group-item-success"><?=GetMessage("MAINPAGE_SCHOOL_SHEDULE")?></a>
                    <a href="<?=SITE_DIR?>school/sobytiya" class="list-group-item list-group-item-success"><?=GetMessage("MAINPAGE_SCHOOL_EVENTS")?></a>
                    <a href="<?=SITE_DIR?>school/photo/" class="list-group-item list-group-item-success"><?=GetMessage("MAINPAGE_SCHOOL_FOTO")?></a>
                    <a href="<?=SITE_DIR?>school/video/" class="list-group-item list-group-item-success"><?=GetMessage("MAINPAGE_SCHOOL_VIDEO")?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="alert alert-info video-main-block">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <!--<h2 class="text-center">Видео</h2>-->
                <?
                if (CModule::IncludeModule("iblock")):
                    $arSelect = Array("NAME", "DATE_ACTIVE_FROM", "PROPERTY_url");
                    $arFilter = Array("IBLOCK_ID" => 6, "ACTIVE" => "Y");
                    $arOrder = Array("DATE_ACTIVE_FROM" => "DESC");
                    $res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
                    if ($ar_res = $res->GetNext()):
                        $arDATE = ParseDateTime($ar_res["DATE_ACTIVE_FROM"], FORMAT_DATETIME);
                        $date = (int)$arDATE["DD"] . " " . ToLower(GetMessage("MONTH_" . intval($arDATE["MM"]) . "_S")) . " " . $arDATE["YYYY"] . " года";
                        ?>
                        <h4 class="text-center"><?= $ar_res["NAME"] ?></h4>
                        <p class="text-right" style="margin-bottom: 0;"><i class="fa fa-calendar"></i> <?= $date ?></p>
                        <div class="embed-responsive embed-responsive-4by3 video">
                            <?= $ar_res["~PROPERTY_URL_VALUE"] ?>
                        </div>
                    <? endif;
                 endif;
                ?>
                <p class="text-center btn-video"><a class="btn btn-primary btn-lg" href="<?=SITE_DIR?>hram/video/" role="button"><?=GetMessage("BTN_VIDEO_OTHER")?></a></p>
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