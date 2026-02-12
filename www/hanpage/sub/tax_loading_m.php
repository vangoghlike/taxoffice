<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_hanpage.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/consult/consult.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php");
?>
<?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] == ""){?>
<script>
	alert("로그인이 필요한 페이지 입니다.");
	location.href="/member/login.php";
</script>
<?}else{?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/hanpage/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/hanpage/pub/include/header.php";?>
<?
$dblink = SetConn($_conf_db["main_db"]);
	$arrInfo = getArticleInfo("tbl_consulting", $_REQUEST["idx"]);
	$arrMemberInfo = getUserInfo($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);
//DB해제
SetDisConn($dblink);
	if($arrInfo["list"][0]["status"] == 0){
require_once('../stdpay/libs/INIStdPayUtil.php');
require_once('../stdpay/libs/sha256.inc.php');
$SignatureUtil = new INIStdPayUtil();


//############################################
// 1.전문 필드 값 설정(***가맹점 개발수정***)
//############################################
// 여기에 설정된 값은 Form 필드에 동일한 값으로 설정
$mid 			= "taxofficem";  								// 가맹점 ID(가맹점 수정후 고정)		INIpayTest / taxofficem		
//인증
## test signKey = c09ybnFWVUpuQkdLNlVHb2g0WnMxQT09  // 실제 : bHVSTWhBUktleUhTQW8vMnF5QkluZz09
$signKey 		= "bHVSTWhBUktleUhTQW8vMnF5QkluZz09"; 			// 가맹점에 제공된 키(이니라이트키) (가맹점 수정후 고정) !!!절대!! 전문 데이터로 설정금지

$timestamp 		= $SignatureUtil->getTimestamp();   			// util에 의해서 자동생성
$orderNumber	= $mid . "_" . date("YmdHis")."T".$arrInfo["list"][0]["idx"]; // 가맹점 주문번호(가맹점에서 직접 설정)
$price			= $arrInfo["list"][0]["pay_price"];
$paygname		= "보수결제";

//
//###################################
// 2. 가맹점 확인을 위한 signKey를 해시값으로 변경 (SHA-256방식 사용)
//###################################
$mKey 			= hash("sha256", $signKey);

/*
 **** 위변조 방지체크를 signature 생성 ***
 * oid, price, timestamp 3개의 키와 값을
 * key=value 형식으로 하여 '&'로 연결한 하여 SHA-256 Hash로 생성 된값
 * ex) oid=INIpayTest_1432813606995&price=819000&timestamp=2012-02-01 09:19:04.004
 * key기준 알파벳 정렬
 * timestamp는 반드시 signature생성에 사용한 timestamp 값을 timestamp input에 그데로 사용하여야함
 */
$params = "oid=" . $orderNumber . "&price=" . $price . "&timestamp=" . $timestamp;
$sign = hash("sha256", $params);

/* 기타 */
$siteDomain = "http://".$_SERVER['HTTP_HOST']."/mx5"; //가맹점 도메인 입력

// 페이지 URL에서 고정된 부분을 적는다. 
// Ex) returnURL이 http://localhost:8082/demo/INIpayStdSample/INIStdPayReturn.jsp 라면
//                 http://localhost:8082/demo/INIpayStdSample 까지만 기입한다.
?>

<script language="javascript"> 

window.name = "BTPG_CLIENT";

var width = 330;
var height = 480;
var xpos = (screen.width - width) / 2;
var ypos = (screen.width - height) / 2;
var position = "top=" + ypos + ",left=" + xpos;
var features = position + ", width=320, height=440";

	function on_pay() { 
		myform = document.mobileweb_form; 
		
	/**************************************************************************** 
	결제수단 action url을 아래와 같이 설정한다
	URL끝에 /를 삭제하면 다음과 같은 오류가 발생한다.
	"일시적인 오류로 결제시도가 정상적으로 처리되지 않았습니다.(MX1002) 자세한 사항은 이니시스(1588-4954)로 문의해주세요."
	****************************************************************************/ 
		if(myform.P_GOPAYMETHOD.value == "CARD") {
			myform.action = "https://mobile.inicis.com/smart/wcard/"; //신용카드
			}
		else if(myform.P_GOPAYMETHOD.value == "VBANK") {
			myform.action = "https://mobile.inicis.com/smart/vbank/"; //가상계좌
			}
		else if(myform.P_GOPAYMETHOD.value == "BANK") {
			myform.action = "https://mobile.inicis.com/smart/bank/"; //계좌이체
		}
		else if(myform.P_GOPAYMETHOD.value == "HPP") {
			myform.action = "https://mobile.inicis.com/smart/mobile/"; //휴대폰
			}
		else if(myform.P_GOPAYMETHOD.value == "CULTURE") {
			myform.action = "https://mobile.inicis.com/smart/culture/"; //문화 상품권
			}
		else if(myform.P_GOPAYMETHOD.value == "HPMN") {
			myform.action = "https://mobile.inicis.com/smart/hpmn/"; //해피머니 상품권
			}
		else {
			myform.action = "https://mobile.inicis.com/smart/wcard/"; // 엉뚱한 값이 들어오면 카드가 기본이 되게 함
			}
		
		myform.P_RETURN_URL.value = myform.P_RETURN_URL.value + "?P_OID=" + myform.P_OID.value; // 계좌이체 결제시 P_RETURN_URL로 P_OID값 전송(GET방식 호출)
		// myform.target = "_self"; // 주석 혹은 제거 시 self 로 지정됨
		myform.submit(); 
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
<form name="mobileweb_form" method="post" accept-charset="EUC-KR">
<input type="hidden" name="P_NEXT_URL" value="<?php echo $siteDomain ?>/mx_rnext.php"> 
<input type="hidden" name="P_NOTI_URL" value="<?php echo $siteDomain ?>/mx_rnoti.php"> 
<!-- 리턴url		--><input type="hidden" name="P_RETURN_URL" value="<?php echo $siteDomain ?>/mx_rreturn.php">
<!-- 결제방법		--><input type="hidden" name="P_GOPAYMETHOD" value="CARD">
<!-- 상점아이디		--><input type="hidden" name="P_MID" value="<?php echo $mid ?>">
<!-- 상품명			--><input type="hidden" name="P_GOODS" value="<?=$paygname?>"></td> 
<!-- 금액			--><input type="hidden" name="P_AMT" value="<?php echo $price ?>"></td> 
<!-- 구매자이름		--><input type="hidden" name="P_UNAME" value="<?=$arrMemberInfo["list"][0]["user_name"]?>"></td>
<!-- 이메일주소		--><input type="hidden" name="P_EMAIL" value="<?=$arrMemberInfo["list"][0]["email"]?>"></td> 
<!-- 휴대폰번호		--><input type="hidden" name="P_MOBILE" value="<?=$arrMemberInfo["list"][0]["mobile"]?>"></td> 
<!-- 기타주문필드	--><input type="hidden" name="P_NOTI" value="<?=$payReturnData?>"></td> 
<!-- 복합파라미터	--><input type="hidden" name="P_RESERVED" value="twotrs_isp=Y&block_isp=Y&twotrs_isp_noti=N"></td> 
<!-- 상점주문번호	--><input type="hidden" name="P_OID" value="<?=$orderNumber?>"> 
<!-- 컨텐츠 구분	--><input type="hidden" name="P_HPP_METHOD" value="1"> 
</form> 
<?############################################# 이니시스 모듈 Form ED #############################################?>
<!-- //subContainer -->
<script>
	on_pay();
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