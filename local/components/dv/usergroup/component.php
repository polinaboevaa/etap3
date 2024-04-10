<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arResult["TITLE"] = $arParams["TITLE"];
$this->IncludeComponentTemplate();
use \Bitrix\Main\Data\Cache;
$obCache = Cache::createInstance(); 

$cache_id = serialize(array($arParams, ($arParams['CACHE_GROUPS']==='N'? false: $USER->GetGroups()))); 

if ($obCache->InitCache($arParams['CACHE_TIME'], $cache_id, '/')) 
{ 
	$title = $obCache->GetVars(); 
	$cache->output();
} 
elseif ($obCache->StartDataCache()) 
{ 
	$title = $arResult["TITLE"];
	$obCache->EndDataCache($title); 
};

