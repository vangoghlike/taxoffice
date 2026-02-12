<?
session_start();
header("Content-Type: text/html; charset=euc-kr");
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/shop/shop.lib.php";

if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	//위시리스트에 아이템 담기
	if($_REQUEST[evnMode]=="add"){
		$blnRS = addWish($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"], mysql_escape_string($_REQUEST[g_idx]));

	//장바구니 아이템 개별 삭제
	}else if($_REQUEST[evnMode]=="delete"){
		$blnRS = deleteWish($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"], mysql_escape_string($_REQUEST[c_idx]));
	}

	//DB해제
	SetDisConn($dblink);

	if($blnRS==true){
		echo "true";
	}else{
		echo "false";
	}
}else{
	echo "nologin";
}
?>