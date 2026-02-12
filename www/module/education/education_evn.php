<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/education/education.lib.php";

if($_POST[evnMode]=="onlineWrite"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = insertEducationMember($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);

	//DB해제
	SetDisConn($dblink);

	if($RS==true){
		jsGo("/mypage/register.php","","교육신청이 정상적으로 접수되었습니다.");
	}else{
		jsMsg("해당교육에 이미 신청되어있습니다.\\n\\n마이페이지에서 확인해보시기 바랍니다.");
		jsHistory("-1") ;
	}
}
?>