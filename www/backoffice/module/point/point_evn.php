<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/auth/auth.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/point/point.lib.php";
if(!in_array("point_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

if($_POST[evnMode]=="add"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	if($_POST[type]=="plus"){
		$RS = setPlusPoint(mysql_escape_string($_REQUEST[user_id]),mysql_escape_string($_REQUEST[point]),mysql_escape_string($_REQUEST[contents]));
	}else if($_POST[type]=="minus"){
		$RS = setMinusPoint(mysql_escape_string($_REQUEST[user_id]),mysql_escape_string($_REQUEST[point]),mysql_escape_string($_REQUEST[contents]));
	}
	
	//DB해제
	SetDisConn($dblink);

	if($RS > 0){
		jsGo("point_list.php","","정보를 저장하였습니다.");
	}else{
		jsMsg("정보 저장에 실패 하였습니다.");
		jsHistory("-1") ;
	}

}else if($_POST[evnMode]=="delete"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS2 = deletePoint(mysql_escape_string($_REQUEST[idx]));
	if($RS2 == true){
		if($_POST[returnURL]){
			jsGo($_POST[returnURL],"","정상적으로 삭제 되었습니다.");
		}else{
			jsGo("point_list.php","","정상적으로 삭제 되었습니다.");
		}
	}else{
		jsGo("point_list.php","","삭제중 오류가 발생하였습니다.");
	}


	//DB해제
	SetDisConn($dblink);

}
?>