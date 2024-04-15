<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$APPLICATION->SetTitle($arResult["TITLE"]); ?>
<?$APPLICATION->IncludeComponent(
	"dv:usergroup",
	"",
	Array(
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "A",
		"TITLE" => "Пользователи"
    ),
$component
);?>