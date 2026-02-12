<?session_start();
include_once($_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php");
include_once($_SERVER[DOCUMENT_ROOT] . "/module/member/member.lib.php");
include_once($_SERVER[DOCUMENT_ROOT] . "/module/memo/memo.lib.php");

$dblink = SetConn($_conf_db["main_db"]);
if($_POST[evnMode]=="insert"){
	$RS = insertMemo(mysql_escape_string($_REQUEST[to_id]),$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);//받는사람아이디,보내는사람아이디	

	if($RS==true){
		jsGo("memo_insert.php","","쪽지를 전송하였습니다.");
	}else{
		jsGo("memo_insert.php","","쪽지를 보내는데 실패하였습니다.");
	}
}
if($_GET[evnMode]=="delete"){	
	$RS = deleteMemo($idx,$type,$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);	

	if($RS==true){
		if($type!="save"){	jsGo("memo_list.php","","쪽지를 삭제하였습니다.");	}else{	jsGo("memo_savelist.php","","쪽지를 삭제하였습니다.");	}
	}else{
		jsGo("memo_list.php","","쪽지 삭제를 실패하였습니다.");
	}
}
if($_POST[evnMode]=="save"){
	$RS = savereceivememoList($idx,$type);

	if($RS==true){
		jsGo("memo_savelist.php","","쪽지를 보관함에 담았습니다.");
	}else{
		jsGo("memo_view.php?idx=$idx&type=$type","","쪽지를 보관함에 담지 못하였습니다.");
	}
}
//DB해제
SetDisConn($dblink);
?>