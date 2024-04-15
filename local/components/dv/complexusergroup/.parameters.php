<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
 $arComponentParameters = array(
	"GROUPS" => array(),
	"PARAMETERS" => array(
		"TITLE" => array(
            "NAME" => "Заголовок страницы",
			"TYPE" => "STRING",
			"DEFAULT" => null
        ),
        "CACHE_TIME" => array(),
        "SEF_MODE" => array(
            "list" => array(
                "NAME" => "Список групп пользователей",
                "DEFAULT" => "",
                "VARIABLES" => array()
            ),
            "detail" => array(
                "NAME" => "Описание группы",
                "DEFAULT" => "#GROUP_ID#/",
                "VARIABLES" => array("GROUP_ID")
            )
        )
	)
);
