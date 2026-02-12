<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/header.php";?>

<?$nav_id=2; // 네이게이션 on 활성화 여부의 번호입니다.?>

<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/nav.php";?>
<?
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrPolicyList = getArticleList("tbl_policy", 0, 0," WHERE 1=1 AND (policy_name='policy1' OR policy_name='policy2') order by policy_name ASC");

//_DEBUG($arrMenuList);

//DB해제
SetDisConn($dblink);
?>

<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20210820015" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<script>
	function nextLevel(){
		if(!document.getElementById("agree1").checked){
			alert("이용약관에 동의해 주세요.");
			return;
		}
		if(!document.getElementById("agree2").checked){
			alert("개인정보 수집 항목에 동의해 주세요.");
			return;
		}
		location.href="join_step2.php";
	}
</script>

<!-- subContent -->
<div class="subContent">
	<!-- subTopInfo -->
	<div class="subTopInfo">
		<!-- h2Wrap -->
		<div class="h2Wrap">
			<h2>
				회원가입</h2>
		</div>
		<!-- //h2Wrap -->
		<!-- lnb -->
		<div class="lnb">
			<span><img src="/pages/default/images/common/home.png" alt="home"></span>
			<span class="last">회원가입</span></div>
		<!-- //lnb -->
	</div>
	<!-- //subTopInfo -->
	<ol class="joinsubNav">
		<li class="on"><img src="/pages/default/images/sub/joinsubNav01.jpg" alt="약관동의 아이콘"><img class="on_img" src="/pages/default/images/sub/joinsubNav01_on.jpg" alt="약관동의 아이콘">약관동의</li>
		<li><img src="/pages/default/images/sub/joinsubNav03.jpg" alt="회원정보입력 아이콘"><img class="on_img" src="/pages/default/images/sub/joinsubNav03_on.jpg" alt="회원정보입력 아이콘">회원정보입력</li>
		<li><img src="/pages/default/images/sub/joinsubNav04.jpg" alt="가입완료 아이콘"><img class="on_img" src="/pages/default/images/sub/joinsubNav04_on.jpg" alt="가입완료 아이콘">가입완료</li>
	</ol>
	<!-- contStart -->
	<div class="contStart">
		<form class="join_step1" id="frm_join1" name="frm_join1" method="post" action="">
			<div class="cont_wrap mb50">
				<p>이용약관 동의 (*필수)</p>
				<div class="cont">
					<?=nl2br($arrPolicyList["list"][0]["policy_contents"])?>
				</div>
				<div class="agree_wrap">
					<input type="checkbox" id="agree1" name="agree1" value="Y" class="req" title="이용약관에 동의해주세요.">
					<label for="agree1">회원 약관 안내를 읽어 보았으며, 동의합니다.</label>
				</div>
			</div>
			<div class="cont_wrap">
				<p>개인정보 처리방침 동의 (*필수)</p>
				<div class="cont">
					<?=nl2br($arrPolicyList["list"][1]["policy_contents"])?>
				</div>
				<div class="agree_wrap">
					<input type="checkbox" id="agree2" name="agree2" value="Y" class="req" title="개인정보 처리방침에 동의해주세요.">
					<label for="agree2">개인정보 수집 항목을 읽어 보았으며, 동의합니다.</label>
				</div>
			</div>
			<div class="btns_wrap mt30 pt25 text-center">
				<input class="join_blue_btn join_Btn mr10" style="cursor:pointer;" type="button" onclick="nextLevel()" value="모든 약관에 동의합니다">
				<button class="join_black_btn join_Btn act_back" type="button">취소</button>
			</div>
		</form>
	</div>
	<!-- //contStart -->
</div>
<!-- //subContent -->
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>