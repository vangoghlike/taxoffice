<?
@session_start();
include ($_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php");
include ($_SERVER[DOCUMENT_ROOT] . "/module/online/online.lib.php");


if($_POST[evnMode]=="join"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = insertOnline();

	//DB해제
	SetDisConn($dblink);

	if($RS==true){
		if($_POST[o_type]=="1"){
			jsGo("/community/reservation/index.php","","온라인예약이 정상적으로 접수 되었습니다.");
		}
	}else{
		jsMsg("글 등록에 실패 하였습니다.");
		jsHistory("-2") ;
	}

}
?>