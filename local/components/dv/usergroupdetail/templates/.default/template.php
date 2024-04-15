<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$filter = Array
(
	"ID" => $arResult["ID"]
);
$rsGroups = CGroup::GetList(($by="c_sort"), ($order="desc"), $filter); 
while($arGroup=$rsGroups->GetNext()) :
	echo $arGroup["DESCRIPTION"];	
endwhile;
?>