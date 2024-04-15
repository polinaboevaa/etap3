<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arResult["TITLE"] = $arParams["TITLE"];
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


$arDefaultUrlTemplates404 = array(
    "list" => "",
    "detail" => "#GROUP_ID#/"
);
$arDefaultVariableAliases = array();
$arDefaultVariableAliases404 = array();
$arComponentVariables = array(
    "GROUP_ID",
);

if($arParams["SEF_MODE"] == "Y"){
    $arVariables = array();

    $arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates($arDefaultUrlTemplates404, $arParams["SEF_URL_TEMPLATES"]);
    $arVariableAliases = CComponentEngine::MakeComponentVariableAliases($arDefaultVariableAliases404, $arParams["VARIABLE_ALIASES"]);

    $componentPage = CComponentEngine::ParseComponentPath($arParams["SEF_FOLDER"],$arUrlTemplates, $arVariables);

    if(!$componentPage){
        $componentPage = "list";
    };

    CComponentEngine::InitComponentVariables($componentPage, $arComponentVariables, $arVariableAliases, $arVariables);

    $arResult = array(
        "FOLDER" => $arParams["SEF_FOLDER"],
        "URL_TEMPLATES" => $arUrlTemplates,
        "VARIABLES" => $arVariables,
        "ALIASES" => $arVariableAliases
    );
}
else {
    $arVariableAliases = CComponentEngine::makeComponentVariableAliases($arDefaultVariableAliases, $arParams["VARIABLE_ALIASES"]);
    CComponentEngine::InitComponentVariables(false, $arComponentVariables, $arVariableAliases, $arVariables);

    $componentPage = "";
    
    if(isset($arVariables["GROUP_ID"]) && intval($arVariables["GROUP_ID"]) > 0)
        $componentPage = "detail";
    else
        $componentPage = "list";

    $arResult = array(
        "FOLDER" => "",
        "URL_TEMPLATES" => array(
            "list" => htmlspecialcharsbx($APPLICATION->GetCurPage()),
            "detail" => htmlspecialcharsbx($APPLICATION->GetCurPage()."/".$arVariableAliases["GROUP_ID"]."=#GROUP_ID#")
        ),
        "VARIABLES" => $arVariables,
        "ALIASES" => $arVariableAliases
    );
    var_dump($arResult);
};

$this->IncludeComponentTemplate($componentPage);

