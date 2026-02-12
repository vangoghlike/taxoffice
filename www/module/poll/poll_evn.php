<?
@session_start();
include_once ($_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php");
include_once ($_SERVER[DOCUMENT_ROOT] . "/module/poll/poll.lib.php");

if($_POST[evnMode]=="vote"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);
	
	if(!$_POST[idx]){
		jsMsg("투표번호가 없습니다.");
		jsHistory("-1") ;
	}

	if(!$_POST["poll_".mysql_escape_string($_POST[idx])]){
		jsMsg("선택하신 답안이 없습니다.");
		jsHistory("-1") ;
	}

	$RS = insertVote(mysql_escape_string($_POST[idx]), $_POST["poll_".mysql_escape_string($_POST[idx])]);

	if($RS==true){
		jsGo("/","","투표에 참여하여 주셔서 감사합니다.");
	}else{
		jsMsg("투표참여에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);
}
?>