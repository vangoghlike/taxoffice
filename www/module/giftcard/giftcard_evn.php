<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/shop/shop.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/giftcard/giftcard.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/mail/mail.lib.php";
include_once $_SERVER[DOCUMENT_ROOT] . "/module/board/board.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

if($_REQUEST[evnMode]=="goodGiftcard"){
	
	$blnRS = insertGiftcardGood($_REQUEST[idx]);
	if($blnRS==true){
		jsMsg("상품권이 발급되었습니다.");
		jsHistory("-1") ;
	}else{
		jsMsg("이미 상품권이 발급되었습니다.");
		jsHistory("-1") ;
	}
}

if($_REQUEST[evnMode]=="codeGiftcard"){
	
	$blnRS = insertCodeGiftcardGood($_REQUEST[giftcard_no]);
	if($blnRS==true){
		jsGo("/mypage/ticket/giftCard.php","","상품권이 발급되었습니다.");
		jsHistory("-1") ;
	}else{
		jsMsg("등록된 상품권이거나 없는 코드번호 입니다.\\n\\n확인후 다시 등록하시기 바랍니다.");
		jsHistory("-1") ;
	}
}

if($_REQUEST[evnMode]=="sendGiftcard"){
	
	$idx = mysql_escape_string($_POST[mgf_idx]);

	$blnRS = setGiftcardSend($idx);

	//메일발송용
	$arrInfo = getMyGiftcardInfo($idx);

	if($blnRS==true){
		
		//상품권 메일문자발송
		$arrMailInfo = getMailConfig("giftcard");
		sendMailGiftcard($arrInfo, $arrMailInfo);

		jsGo("/mypage/ticket/dispatch.php","","상품권을 선물하였습니다.");
		jsHistory("-1") ;
	}else{
		jsMsg("상품권 선물중 오류가 발생했습니다.");
		jsHistory("-1") ;
	}

}

if($_REQUEST[evnMode]=="reSendGiftcard"){
	
	$m_idx = mysql_escape_string($_POST[mgf_idx]);
	$idx = mysql_escape_string($_POST[idx]);

	$blnRS = reGiftcardSend($m_idx, $idx);

	//메일발송용
	$arrInfo = getMyGiftcardInfo($m_idx);

	if($blnRS==true){
		
		//상품권 메일문자발송
		$arrMailInfo = getMailConfig("giftcard");
		sendMailGiftcard($arrInfo, $arrMailInfo);

		jsGo("/mypage/ticket/dispatch.php","","상품권을 다시 발송하였습니다.");
		jsHistory("-1") ;
	}else{
		jsMsg("상품권 선물중 오류가 발생했습니다.");
		jsHistory("-1") ;
	}

}

//DB해제
SetDisConn($dblink);
?>