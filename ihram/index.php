<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-8">
            <div class="block-opacity main-rasp">
                <h2 class="text-center">Расписание богослужений</h2>
                <div class="overflow-table">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title">18.01.2016 Понедельник. Праздник иконы Божией Матери Знамение.</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-2">
                                    <p>09<sup>00</sup></p>
                                    <p>16<sup>00</sup></p>
                                </div>
                                <div class="col-xs-4">
                                    <p>Божественная литургия</p>
                                    <p>Вечернее бдение</p>
                                </div>
                                <div class="col-xs-6">
                                    <p>По окончании Литургии Крестный ход.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">Успенский пост</div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">18.01.2016 Понедельник.</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-2">
                                    <p>09<sup>00</sup></p>
                                    <p>16<sup>00</sup></p>
                                </div>
                                <div class="col-xs-4">
                                    <p>Божественная литургия</p>
                                    <p>Вечернее бдение</p>
                                </div>
                                <div class="col-xs-6">
                                    <p>По окончании Литургии Крестный ход.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">Успенский пост</div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">18.01.2016 Понедельник.</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-2">
                                    <p>09<sup>00</sup></p>
                                    <p>16<sup>00</sup></p>
                                </div>
                                <div class="col-xs-4">
                                    <p>Божественная литургия</p>
                                    <p>Вечернее бдение</p>
                                </div>
                                <div class="col-xs-6">
                                    <p>По окончании Литургии Крестный ход.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">Успенский пост</div>
                    </div>
                </div>
                <p class="text-center"><a class="btn btn-primary btn-lg" href="#" role="button">Полное расписание богослужений</a></p>
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