<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/auth/auth.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/poll/poll.lib.php";
if(!in_array("poll_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

if($_POST[evnMode]=="insert"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = insertPoll();

	if($RS==true){
		jsGo("poll.php","","투표을 등록 하였습니다.");
	}else{
		jsMsg("투표 등록에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);


}else if($_POST[evnMode]=="edit"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_POST[idx]));

	$RS = editPoll($idx);
	if($RS==true){
		jsGo("poll.php","","투표을 수정 하였습니다.");
	}else{
		jsMsg("투표 수정에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);


}else if($_POST[evnMode]=="delete"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_REQUEST[idx]));

	$RS = deletePoll($idx);

	if($RS==true){
		jsGo("poll.php","","투표을 삭제 하였습니다.");
	}else{
		jsMsg("투표 삭제에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);
}
?>