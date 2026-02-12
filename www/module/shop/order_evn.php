<?
session_start();
//header("Content-Type: text/html; charset=euc-kr");
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/shop/shop.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/mail/mail.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/point/point.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

if($_POST[evnMode]=="return"){
	
	$RS = setOrderReturn($_POST["order_no"]);

	if($RS==true){
		echo "<script>
		alert('반품/교환 신청이 정상적으로 접수되었습니다.');
		opener.document.location.href='/shop.php?goPage=OrderList';
		self.close();
		</script>";	
	}else{
		jsMsg("반품/교환신청에 에러가 발생했습니다.");
		jsHistory("-1") ;
	}

} else if($_POST[evnMode]=="cancel"){
	
	$RS = setOrderCancel($_POST["order_no"]);

	if($RS==true){
		jsGo("/shop.php?goPage=MyPage","","취소 신청이 정상적으로 접수되었습니다.");
	}else{
		jsMsg("취소요청중 에러가 발생했습니다.");
		jsHistory("-1") ;
	}

}else if($_POST[evnMode]=="delete"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$order_no = mysql_escape_string(trim($_POST[order_no]));
	$direct_gb = mysql_escape_string($_POST[directpoint]);
	
	$arrInfo = getOrderInfoAdmin(mysql_escape_string($_REQUEST["order_no"]));
	$RS = delOrderInfoAdmin($order_no, $direct_gb);

	if($RS==true){
		//주문자에게 메일발송
		$arrMailInfo = getMailConfig(3);
		sendMailShopInfo($arrInfo, $arrMailInfo);
		//주문자에게 메일발송

		jsGo("/shop.php?goPage=OrderList","","");
	}else{
		jsMsg("주문정보 삭제에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);

}else {

	//회원의 경우 회원아이디로 로그인 전이라면 세션 아이디로
	if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]){
		$tp = "1";
	}else{
		$tp = "2";
	}	
	$arrList = getPreOrderList($_SESSION[$_SITE["DOMAIN"]]["SESSIONID"], $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"],$tp);

	//재고체크
	checkPreOderStock($arrList);


	//_POST 로 받는 주문번호가 기존에 주문된 주문번호인지 확인
	if(checkVaildOrderNo(mysql_escape_string($_POST["order_no"]))==true){
		jsGo("/shop.php?goPage=Cart","parent","이미 주문이 완료되었습니다.");
	}

	//_POST 로 받은 주문번호가 구매직전 장바구니에 있는지 확인
	if($_POST["order_no"] != $arrList["list"][0]["order_no"]){
		jsGo("/shop.php?goPage=Cart","parent","잘못된 주문 정보 입니다. 주문 장바구니에 해당 주문건이 없습니다.");
	}

	//_POST 정보를 주문정보 테이블에 입력

	$blnRS = setOrderInfo($_SESSION[$_SITE["DOMAIN"]]["SESSIONID"], $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"], $tp, $arrList["list"][0]["order_no"], $_REQUEST[order_state]);

	if($blnRS==true){
		if($_REQUEST[order_state] == "10") {
			jsGo("/shop.php?goPage=Payment&order_no=".$arrList["list"][0]["order_no"],"parent","");
		} else {
			//주문자에게 메일발송
			$arrInfo = getOrderInfo($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"], $tp, mysql_escape_string($_REQUEST["order_no"]));
			$arrMailInfo = getMailConfig(1);
			sendMailShopInfo($arrInfo, $arrMailInfo);
			//주문자에게 메일발송

			jsGo("/shop.php?goPage=Thanks&order_no=".$arrList["list"][0]["order_no"],"parent","");
		}
	}
}

//DB해제
SetDisConn($dblink);
?>