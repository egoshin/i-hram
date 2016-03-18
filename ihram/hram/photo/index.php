<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("");
?>
    <div class="container breadcrumb-block">
    <div class="row">
        <div class="col-xs-12">
            <? $APPLICATION->IncludeComponent(
                "bitrix:breadcrumb",
                "main",
                Array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "PATH" => "",
                    "SITE_ID" => "s1",
                    "START_FROM" => "0"
                )
            ); ?>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="block-page">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-8">
                            <h1><?= $title ?></h1>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 btn-raspisanie text-right">
                            <a class="btn btn-primary" href="<?= SITE_DIR ?>hram/raspisanie/"
                               role="button"><?= GetMessage("BTN_SHEDULE_SERVICE") ?></a>
                        </div>
                    </div>
                    <div class="line-bottom">
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <? $APPLICATION->IncludeComponent(
	"bitrix:photogallery", 
	"main", 
	array(
		"ADDITIONAL_SIGHTS" => array(
		),
		"ALBUM_PHOTO_SIZE" => "270",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "main",
		"DATE_TIME_FORMAT_DETAIL" => "d.m.Y",
		"DATE_TIME_FORMAT_SECTION" => "d.m.Y",
		"DRAG_SORT" => "Y",
		"ELEMENTS_PAGE_ELEMENTS" => "50",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "desc",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "content",
		"JPEG_QUALITY" => "100",
		"JPEG_QUALITY1" => "100",
		"ORIGINAL_SIZE" => "1280",
		"PAGE_NAVIGATION_TEMPLATE" => "",
		"PATH_TO_FONT" => "default.ttf",
		"PATH_TO_USER" => "",
		"PHOTO_LIST_MODE" => "N",
		"SECTION_PAGE_ELEMENTS" => "15",
		"SECTION_SORT_BY" => "UF_DATE",
		"SECTION_SORT_ORD" => "DESC",
		"SEF_MODE" => "N",
		"SET_TITLE" => "Y",
		"SHOWN_ITEMS_COUNT" => "1",
		"SHOW_LINK_ON_MAIN_PAGE" => array(
			0 => "id",
		),
		"SHOW_NAVIGATION" => "N",
		"SHOW_TAGS" => "N",
		"THUMBNAIL_SIZE" => "270",
		"UPLOAD_MAX_FILE_SIZE" => "8196",
		"USE_COMMENTS" => "N",
		"USE_LIGHT_VIEW" => "Y",
		"USE_RATING" => "N",
		"USE_WATERMARK" => "N",
		"WATERMARK_MIN_PICTURE_SIZE" => "800",
		"WATERMARK_RULES" => "USER",
		"VARIABLE_ALIASES" => array(
			"SECTION_ID" => "SECTION_ID",
			"ELEMENT_ID" => "ELEMENT_ID",
			"PAGE_NAME" => "PAGE_NAME",
			"ACTION" => "ACTION",
		)
	),
	false
); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>