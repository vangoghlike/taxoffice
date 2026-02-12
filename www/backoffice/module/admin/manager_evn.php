<?
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/auth/auth.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php";
if(!in_array("admin_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;


if($_POST['evnMode']=="write"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = insertManagerArticle();

	if($RS==true){
		jsGo("manager.php","","등록 되었습니다.");
	}else{
		jsMsg("세무사 등록에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);


}else if($_POST['evnMode']=="modify"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = modifyManagerArticle($_POST["idx"]);
	if($RS==true){
		jsGo("manager.php","","수정되었습니다.");
	}else{
		jsMsg("세무사 수정에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);


}else if($_POST['evnMode']=="delete"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = deleteManager($_POST["idx"]);

	if($RS==true){
		jsGo("manager.php","","삭제 되었습니다.");
	}else{
		jsMsg("세무사 삭제에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST['evnMode']=="section_write"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = insertSectionManagerArticle();

	if($RS==true){
		jsGo("section_manager.php","","등록 되었습니다.");
	}else{
		jsMsg("세무사 등록에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);


}else if($_POST['evnMode']=="section_modify"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = modifySectionManagerArticle($_POST["idx"]);
	if($RS==true){
		jsGo("section_manager.php","","수정되었습니다.");
	}else{
		jsMsg("세무사 수정에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);


}else if($_POST['evnMode']=="delete_SectionManager"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = deleteManager($_POST["idx"]);

	if($RS==true){
		jsGo("section_manager.php","","삭제 되었습니다.");
	}else{
		jsMsg("세무사 삭제에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}
?>