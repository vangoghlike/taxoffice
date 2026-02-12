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
	$arrInfo = getArticleList("tbl_consulting", 0, 0, " where idx =".$_REQUEST["idx"]." and user_id ='".$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]."'");
	$arrMemberInfo = getUserInfo($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);
//DB해제
SetDisConn($dblink);
	if($arrInfo["list"]["total"] > 0){
?>

<!-- sub_title -->
<div class="sub_title">
	<div class="content_wrap">
		<p>
			여러분의 세무도우미,<br />
			<strong>세림세무법인의 MANPOWER</strong>
		</p>
	</div>
</div>
<!-- sub_title end -->
<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20210820015" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<div class="subContainer rsorder">
    <div class="whiteBox2">
        <div class="tit">신청 정보</div>
        <table class="base02">
            <colgroup>
                <col style="width:100px">
                <col>
            </colgroup>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="consultViewList" style="margin-top:4px">
        <ul>
            <li>
                <form id="frm_tax_pay" name="frm_tax_pay" method="post">
                    <div class="whiteBox2">
                        <div class="site">
                            <div class="left">
                                <div class="tit">상담수수료</div>
                            </div>
                            <div class="right">
                                <div class="blueTit fz18"><?=number_format($arrInfo["list"][0]["pay_price"],0)?> 원</div>
                            </div>
                        </div>
                        <div class="site">
                            <div class="left">
                                <div class="tit">보유포인트</div>
                            </div>
                            <div class="right">
                                <div class="tit3"><?=number_format($arrMemberInfo["list"][0]["etc_2"],0)?> 포인트</div>
                            </div>
                        </div>
                        <div class="site">
                            <div class="left">
                                <div class="tit">사용포인트</div>
                            </div>
                            <div class="right">
                                <div class="tit3"><?=number_format($arrInfo["list"][0]["pay_point"],0)?> 포인트</div>
                            </div>
                        </div>
                        <div class="site">
                            <div class="left">
                                <div class="tit">총 결제금액</div>
                            </div>
                            <div class="right">
                                <div class="blueTit fz18"><span id="amt"><?=number_format($arrInfo["list"][0]["price"],0)?></span> 원</div>
                            </div>
                        </div>
                    </div>
                </form>
            </li>
        </ul>
    </div>
    <div class="btnCenter seCst">
        <a href="/" class="btnBlue">신청완료</a>
        <a href="./" class="btnBlue" style="margin-left:1%;">홈으로</a>
        <a href="javascript:cancel_submit()" class="btnGray2 act_ord_cancel" >취소하기</a>
    </div>
	<form action="/module/consult/pay_evn.php" method="post" id="pay_cancel" name="pay_cancel">
		<input type="hidden" name="idx" value="<?=$arrInfo["list"][0]["idx"]?>">
		<input type="hidden" name="evnMode" value="cancel">
	</form>
</div>
<script>
	function cancel_submit(){
		if(confirm("취소하시겠습니까?")){
			document.pay_cancel.submit();
		}
	}
</script>
	<?}else{?>
		<script>
			alert("잘못된 방식으로 접근하셨습니다.");
			history.back();
		</script>
	<?}?>
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>
	
<?}?>