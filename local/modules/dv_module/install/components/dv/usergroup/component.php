<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arResult["TITLE"] = $arParams["TITLE"];
$this->IncludeComponentTemplate();
$obCache = new CPHPCache; 

$cache_id = serialize(array($arParams, ($arParams['CACHE_GROUPS']==='N'? false: $USER->GetGroups()))); 

if ($obCache->InitCache($arParams['CACHE_TIME'], $cache_id, '/')) 
{ 
	$vars = $obCache->GetVars(); 
	$arResult = $vars['arResult']; 
} 
elseif ($obCache->StartDataCache()) 
{ 
	$title = $arResult["TITLE"];
	$obCache->EndDataCache(array( 
		'arResult' => $arResult, 
	)); 
};



