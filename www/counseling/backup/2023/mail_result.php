<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/consult/consult.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php");
?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/header.php";?>
<?
$dblink = SetConn($_conf_db["main_db"]);
	$arrInfo = getArticleList("tbl_consulting", 0, 0, " where idx =".$_REQUEST["idx"]." ");
//DB해제
SetDisConn($dblink);
	if($arrInfo["list"]["total"] > 0){
		$reg_date = explode(" ",$arrInfo["list"][0]["reg_date"]);
?>

<!-- sub_title -->
<div class="sub_title">
	<div class="content_wrap">
		<p class="sub_text">
				어떠한 업무이던 <br><strong>고객님의 눈높이에 맞추어서</strong><br>
                자문하고 상담해드립니다
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
        <div class="tit">신청 <?if($arrInfo["list"][0]["status"] == 9){?>취소<?}?> 정보</div>
        <table class="base02">
            <colgroup>
                <col style="width:100px">
                <col>
            </colgroup>
            <tbody>
				<!-- cst-serim :: version1.00 :: user-info list update
				<tr>
					<th>업무선택</th>
					<td>인사급여,4대보험,소득세</td>
				</tr>
				-->
				<tr>
					<th>상담방법</th>
					<td><?=$arrInfo["list"][0]["goods_name"]?></td>
				</tr>
				<tr>
					<th>상담과목</th>
					<td><?=$arrInfo["list"][0]["category_name"]?></td>
				</tr>
				<tr>
					<th>담당 세무사</th>
					<td><?=$arrInfo["list"][0]["mngr_name"]?></td>
				</tr>
				<tr>
					<th>이름</th>
					<td><?=$arrInfo["list"][0]["user_name"]?></td>
				</tr>
				<!--
			<tr>
			<th>기업명</th>
			<td></td>
			</tr>
			-->
				<tr>
					<th>연락처</th>
					<td><?=$arrInfo["list"][0]["phone"]?></td>
				</tr>
				<tr>
					<th>이메일</th>
					<td><?=$arrInfo["list"][0]["email"]?></td>
				</tr>
				<tr>
					<th>신청일</th>
					<td><?=$reg_date[0]?></td>
				</tr>
			</tbody>
        </table>
    </div>
	<?if($arrInfo["list"][0]["status"] != 9){?>
    <div class="btnCenter seCst">
        <a href="/" class="btnBlue">신청완료</a>
        <a href="/" class="btnBlue" style="margin-left:1%;">홈으로</a>
        <!-- <a href="javascript:cancel_submit()" class="btnGray2 act_ord_cancel" >취소하기</a> -->
    </div>
	<?}else{?>
	<div class="btnCenter seCst">
        <a href="/" style="float: none;" class="btnBlue">홈으로</a>
    </div>
	<?}?>
	<form action="/module/mail/mail_evn.php" method="post" id="mail_cancel" name="mail_cancel">
		<input type="hidden" name="idx" value="<?=$arrInfo["list"][0]["idx"]?>">
		<input type="hidden" name="mail_subject" value="<?=$arrInfo["list"][0]["goods_name"]?> 취소가 완료 되었습니다.">
		<input type="hidden" name="status" value="9">
		<input type="hidden" name="evnMode" value="cancel">
		<input type="hidden" name="returnURL" value="<?=$_SERVER["PHP_SELF"]?>">
	</form>
</div>
<script>
	function cancel_submit(){
		if(confirm("취소하시겠습니까?")){
			document.mail_cancel.submit();
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