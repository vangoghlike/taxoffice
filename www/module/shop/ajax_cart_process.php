<?
session_start();
header("Content-Type: text/html; charset=euc-kr");
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/shop/shop.lib.php";

//회원의 경우 회원아이디로 로그인 전이라면 세션 아이디로
if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]){
	$tp = "1";
}else{
	$tp = "2";
}
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

//장바구니에 아이템 담기
if($_REQUEST[evnMode]=="add"){
	$blnRS = addCart($_SESSION[$_SITE["DOMAIN"]]["SESSIONID"], $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"], $tp, mysql_escape_string($_REQUEST[g_idx]), mysql_escape_string($_REQUEST[qty]));

//장바구니 아이템 수량 수정
}else if($_REQUEST[evnMode]=="update"){
	$blnRS = updateCart($_SESSION[$_SITE["DOMAIN"]]["SESSIONID"], $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"], $tp);

//장바구니 아이템 개별 삭제
}else if($_REQUEST[evnMode]=="delete"){
	$blnRS = deleteCart($_SESSION[$_SITE["DOMAIN"]]["SESSIONID"], $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"], $tp);

//바로구매
}else if($_REQUEST[evnMode]=="direct"){
	$blnRS = directOrder($_SESSION[$_SITE["DOMAIN"]]["SESSIONID"], $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"], $tp);

//바로구매2
}else if($_REQUEST[evnMode]=="direct2"){
	$blnRS = directOrder2($_SESSION[$_SITE["DOMAIN"]]["SESSIONID"], $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"], $tp);

//장바구니에서 한개 클릭 주문
}else if($_REQUEST[evnMode]=="orderOne"){
	$blnRS = preOrderOne($_SESSION[$_SITE["DOMAIN"]]["SESSIONID"], $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"], mysql_escape_string($_REQUEST[c_idx]), $tp);
}

//DB해제
SetDisConn($dblink);

if($blnRS==true){
	echo "true";
}else{
	echo "false";
}
?>