<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/auth/auth.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/mail/mail.lib.php";
if(!in_array("mail_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

if($_POST[evnMode]=="join"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$makeRS = insertSend($_REQUEST[code]);

	if($makeRS==true){
		jsGo("mail.php","","메일/문자폼이 생성 되었습니다.");
	}else{
		jsMsg("메일/문자폼이 생성에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="edit"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$editRS = setMailConfig(mysql_escape_string($_POST[code]));
	
	if($editRS==true){
		jsGo("mail.php","","정보를 수정 하였습니다.");
	}else{
		jsMsg("수정에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="delete"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);
	
	$editRS = deleteMail(mysql_escape_string($_POST[code]));
	
	if($editRS==true){
		jsGo("mail.php","","메일/문자 내용을 삭제 하였습니다.");
	}else{
		jsMsg("메일/문자 내용 삭제에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);
}
?>