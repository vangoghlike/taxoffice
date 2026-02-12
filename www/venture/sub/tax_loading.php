<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_venture.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/consult/consult.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php");
?>
<?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] == ""){?>
<script>
	alert("로그인이 필요한 페이지 입니다.");
	location.href="/member/login.php";
</script>
<?}else{?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/taxcall/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/taxcall/pub/include/header.php";?>
<?
$dblink = SetConn($_conf_db["main_db"]);
	$arrInfo = getArticleInfo("tbl_consulting", $_REQUEST["idx"]);
	$arrMemberInfo = getUserInfo($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);
//DB해제
SetDisConn($dblink);
	if($arrInfo["list"][0]["status"] == 0){

////////////////////////////////////////////KG 이니시스 제공 소스////////////////////////////////////////////////ST
include_once $_SERVER[DOCUMENT_ROOT] . "/stdpay/libs/INIStdPayUtil.php";
include_once $_SERVER[DOCUMENT_ROOT] . "/stdpay/libs/sha256.inc.php";
$SignatureUtil = new INIStdPayUtil();

//############################################
// 1.전문 필드 값 설정(***가맹점 개발수정***)
//############################################
// 여기에 설정된 값은 Form 필드에 동일한 값으로 설정
$mid 			= "taxofficem";  								// 가맹점 ID(가맹점 수정후 고정)		INIpayTest / taxofficem		
//인증
## test signKey = c09ybnFWVUpuQkdLNlVHb2g0WnMxQT09  // 실제 : bHVSTWhBUktleUhTQW8vMnF5QkluZz09
$signKey 		= "bHVSTWhBUktleUhTQW8vMnF5QkluZz09"; 			// 가맹점에 제공된 키(이니라이트키) (가맹점 수정후 고정) !!!절대!! 전문 데이터로 설정금지
##########상점정보 > 계약정보 > 부가정보 > 웹결제 signkey 생성 조회 > [조회] 버튼 ## 고객사 로그인후 생성 https://iniweb.inicis.com
$timestamp		= $SignatureUtil->getTimestamp();   // util에 의해서 자동생성
$orderNumber	= $mid . "_" . date("YmdHis")."T".$arrInfo["list"][0]["idx"]; // 가맹점 주문번호(가맹점에서 직접 설정)
$price			= $arrInfo["list"][0]["pay_price"];
$paygname		= "보수결제";
//$price = "1000";        // 상품가격(특수기호 제외, 가맹점에서 직접 설정)

$cardNoInterestQuota = "11-2:3:,34-5:12,14-6:12:24,12-12:36,06-9:12,01-3:4";  // 카드 무이자 여부 설정(가맹점에서 직접 설정)
$cardQuotaBase = "2:3:4:5:6:11:12:24:36";  // 가맹점에서 사용할 할부 개월수 설정
//
//###################################
// 2. 가맹점 확인을 위한 signKey를 해시값으로 변경 (SHA-256방식 사용)
//###################################
$mKey = hash("sha256", $signKey);

/*
  //*** 위변조 방지체크를 signature 생성 ***
  oid, price, timestamp 3개의 키와 값을
  key=value 형식으로 하여 '&'로 연결한 하여 SHA-256 Hash로 생성 된값
  ex) oid=INIpayTest_1432813606995&price=819000&timestamp=2012-02-01 09:19:04.004
 * key기준 알파벳 정렬
 * timestamp는 반드시 signature생성에 사용한 timestamp 값을 timestamp input에 그데로 사용하여야함
 */
//$params = "oid=" . $orderNumber . "&price=" . $price . "&timestamp=" . $timestamp;
$params = array(
    "oid" => $orderNumber,
    "price" => $price,
    "timestamp" => $timestamp
);

//$sign = $SignatureUtil->makeSignature($params, "sha256");
$sign = $SignatureUtil->makeSignature($params);

/* 기타 */
$siteDomain = "http://".$_SERVER['SERVER_NAME']."/stdpay/INIStdPaySample"; //가맹점 도메인 입력
// 페이지 URL에서 고정된 부분을 적는다. 
// Ex) returnURL이 http://localhost:8082/demo/INIpayStdSample/INIStdPayReturn.jsp 라면
//                 http://localhost:8082/demo/INIpayStdSample 까지만 기입한다.



?>
<!-- 상용 JS(가맹점 MID 변경 시 주석 해제, 테스트용 JS 주석 처리 필수!) -->
<!-- <script language="javascript" type="text/javascript" src="https://stdpay.inicis.com/stdjs/INIStdPay.js" charset="UTF-8"></script>-->

<!-- 테스트 JS(샘플에 제공된 테스트 MID 전용) -->
<script language="javascript" type="text/javascript" src="http://stgstdpay.inicis.com/stdjs/INIStdPay.js" charset="UTF-8"></script>

<script type="text/javascript">
	function paybtn() {
		INIStdPay.pay('SendPayForm_id');
	}
</script>

<!-- sub_title -->
<div class="sub_title">
	<div class="content_wrap">
		<p>
			여러분의 세무도우미,<br />
			<strong>세림세무법인의 MANPOWER</strong>
		</p>
	</div>
</div>
<?############################################# 이니시스 모듈 Form ST #############################################?>
<form id="SendPayForm_id" name="" method="POST" >
<!-- >version</			--><input type="hidden" name="version" value="1.0" >
<!-- >상점아이디</		--><input type="hidden" name="mid" value="<?php echo $mid ?>" >
<!-- >상품명</			--><input type="hidden" name="goodname" value="<?=$paygname?>" >
<!-- >주문번호</		--><input type="hidden" name="oid" value="<?php echo $orderNumber ?>" >
<!-- >결제금액</		--><input type="hidden" name="price" value="<?php echo $price ?>" >
<!-- >통화구분</		--><input type="hidden" name="currency" value="WON" >
<!-- >구매자이름</		--><input type="hidden" name="buyername" value="<?=$arrMemberInfo["list"][0]["user_name"]?>" >
<!-- >구매자연락처</	--><input type="hidden" name="buyertel" value="<?=$arrMemberInfo["list"][0]["mobile"]?>" >
<!-- >구매자이메일</	--><input type="hidden" name="buyeremail" value="<?=$arrMemberInfo["list"][0]["email"]?>" >
<!-- >상품명</			--><input type="hidden" name="timestamp" value="<?php echo $timestamp ?>" >
<!-- >상품명</			--><input type="hidden" name="signature" value="<?php echo $sign ?>" >
<!-- >상품명</			--><input type="hidden" name="returnUrl" value="<?php echo $siteDomain ?>/PayReturn.php" >
<!-- >상품명</			--><input type="hidden" name="mKey" value="<?php echo $mKey ?>" >
<!-- >결제수단</		--><input type="hidden" name="gopaymethod" value="Card" ><?## 가상계좌는 Vbank // Card ?>
<!-- >제공기간</		--><input type="hidden" name="offerPeriod" value="2015010120150331" >
<!-- >결제수단/옵션</	--><input type="hidden" name="acceptmethod" value="HPP(1):no_receipt:va_receipt:vbanknoreg(0):below1000" >
<!-- >표시언어</		--><input type="hidden" name="languageView" value="ko" >
<!-- >인코딩</			--><input type="hidden" name="charset" value="UTF-8" >
<!-- >결제창 표시방법</	--><input type="hidden" name="payViewType" value="" >
<!-- >취소페이지</		--><input type="hidden" name="closeUrl" value="<?php echo $siteDomain ?>/close.php" >
<!-- >팝업사용시</		--><input type="hidden" name="popupUrl" value="<?php echo $siteDomain ?>/popup.php" >
<!-- >무이자 할부</		--><input type="hidden" name="nointerest" value="<?php echo $cardNoInterestQuota ?>" >
<!-- >할부 개월</		--><input type="hidden" name="quotabase" value="<?php echo $cardQuotaBase ?>" >	
<!-- >가상계좌</		--><input type="hidden" name="vbankRegNo" value="" >
<!-- >관리데이터</		--><input type="hidden" name="merchantData" value="<?=$arrInfo["list"][0]["idx"]?>" >
</form>
<?############################################# 이니시스 모듈 Form ED #############################################?>
<!-- //subContainer -->
<script>
	paybtn();
</script>
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>
	<?}else{?>
	<script>
		alert("이미 결제가 완료 된 건입니다. 마이페이지로 들어갑니다.");
		location.href="/mypage/mypage.php";
	</script>
	<?}?>
<?}?>