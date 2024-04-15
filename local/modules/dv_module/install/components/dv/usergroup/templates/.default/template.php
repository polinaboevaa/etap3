<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->SetTitle($arResult["TITLE"]); ?>
<?$rs = CGroup::GetList();?>
<table>
<tr><th>ID</th><th>Название группы</th><th>Описание группы</th></tr>
<?while ($arGroup=$rs->GetNext()) :
    echo "<tr><td>".$arGroup["ID"]."</td><td>".$arGroup["NAME"]."</td><td>".$arGroup["DESCRIPTION"]."</td><td>"."<a href=".$arGroup["ID"]."/".">"."подробнее"."</a></td></tr>"?>
<?endwhile;?>
</table>


