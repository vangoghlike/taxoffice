<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/auth/auth.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/module/mail/send.lib.php";
if(!in_array("send_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

if($_POST[evnMode]=="createSend"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$makeRS = insertSend($_REQUEST[chk]);

	if($makeRS==true){
		jsGo("send_list.php","","메일발송를 생성 하였습니다.");
	}else{
		jsMsg("메일발송 생성에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="editSend"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$editRS = editSend(mysql_escape_string($_POST[idx]));
	
	if($editRS==true){
		jsGo("send_list.php","","메일발송 정보를 수정 하였습니다.");
	}else{
		jsMsg("메일발송 수정에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="deleteSend"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);
	
	$editRS = deleteSend(mysql_escape_string($_POST[idx]));
	
	if($editRS==true){
		jsGo("send_list.php","","메일발송를 삭제 하였습니다.");
	}else{
		jsMsg("메일발송 삭제에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);
}
?>