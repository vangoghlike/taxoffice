<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/auth/auth.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/shop/shop.lib.php";
if(!in_array("shop_good_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

if($_POST[evnMode]=="insert"){
//	_DEBUG($_POST);
//	exit;
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = insertGood();

	if($RS){
		echo $RS;

		jsGo("good.php","","");
	}else{
		jsMsg("상품 등록에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_GET[evnMode]=="copy"){
//	_DEBUG($_POST);
//	exit;
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_GET[idx]));

	$RS = copyGood($idx);

	if($RS){
		echo $RS;

		jsGo("good.php","","");
	}else{
		jsMsg("상품 복사에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="edit"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_POST[idx]));

	$RS = editGood($idx);

	if($RS==true){
		jsGo($_REQUEST[rt_url],"","");
		//jsGo("good.php?cat_no=".$_POST[cat_no],"","");
	}else{
		jsMsg("상품 수정에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);


}else if($_POST[evnMode]=="delete"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_REQUEST[idx]));

	$RS = deleteGood($idx);

	if($RS==true){
		//jsGo("good.php","","");
		jsGo($_REQUEST[rt_url],"","");
	}else{
		jsMsg("상품 삭제에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="insertOption"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$RS = insertOption();

	if($RS==true){
		jsGo("option.php","","");
	}else{
		jsMsg("상품옵션 등록에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="editOption"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$code = mysql_escape_string(trim($_REQUEST[opt_code]));

	$RS = editOption($code);

	if($RS==true){
		jsGo("option.php","","");
	}else{
		jsMsg("상품옵션 수정에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="deleteOption"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$code = mysql_escape_string(trim($_REQUEST[code]));

	$RS = deleteOption($code);

	if($RS==true){
		//jsGo("good.php","","");
		jsGo("option.php","","");
	}else{
		jsMsg("옵션 삭제에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="deleteOptionValue"){

	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_REQUEST[idx]));

	$RS = deleteOptionValue($idx);

	if($RS==true){
		jsGo($_REQUEST[returnURL],"","");
	}else{
		jsMsg("옵션항목 삭제에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else if($_POST[evnMode]=="changeshow"){

	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_REQUEST[idx]));
	$gb = mysql_escape_string(trim($_REQUEST[gb]));

	$RS = editGoodShow($idx, $gb);

	if($RS==true){
		jsGo($_REQUEST[rt_url],"","");
	}else{
		jsMsg("노출여부 수정에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);
}
?>
