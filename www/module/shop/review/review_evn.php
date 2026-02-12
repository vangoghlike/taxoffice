<?
session_start();
include ($_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php");
include ($_SERVER[DOCUMENT_ROOT] . "/module/shop/shop.lib.php");
include ($_SERVER[DOCUMENT_ROOT] . "/module/shop/review/review.lib.php");

if($_POST[evnMode]=="write"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = getMyOrderGood(mysql_escape_string($_REQUEST[order_no]), mysql_escape_string($_REQUEST[g_idx]), $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);

	if($RS == false){
		jsMsg("구매한 상품에 대해서만 리뷰를 작성 하실 수 있습니다.");
		jsHistory("-2") ;
	}

	if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]){
		$RS = insertReview(mysql_escape_string($_REQUEST[g_idx]), $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"], $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["NAME"]);
	}else{
		$RS = false;
	}
	//DB해제
	SetDisConn($dblink);

	if($RS==true){
		jsGo("/shop.php?goPage=MyReview","","");
	}else{
		jsMsg("글 등록에 실패 하였습니다.");
		jsHistory("-2") ;
	}
}else if($_POST[evnMode]=="deleteAjax"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]){
		$RS = deleteReview($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"], mysql_escape_string($_REQUEST[idx]));
	}else{
		$RS = false;
	}
	//DB해제
	SetDisConn($dblink);

	if($RS==true){
		echo "true";
	}else{
		echo "false";
	}
}
?>