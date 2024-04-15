<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$APPLICATION->IncludeComponent(
	"dv:usergroupdetail",
	".default",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"ID" => $arResult["VARIABLES"]["GROUP_ID"]
    ),
$component
);?><br>