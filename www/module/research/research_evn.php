<?
@session_start();
include_once ($_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php");
include_once $_SERVER[DOCUMENT_ROOT] . "/module/research/research.lib.php";

if($_POST[evnMode]=="joinResearch"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);
	
	if(!$_POST[idx]){
		jsMsg("설문번호가 없습니다.");
		jsHistory("-1") ;
	}


	$RS = joinResearch(mysql_escape_string($_POST[idx]));

	if($RS==true){
		jsGo("/","","설문에 참여하여 주셔서 감사합니다.");
	}else{
		jsMsg("설문참여에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);
}
?>