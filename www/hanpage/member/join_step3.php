<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_hanpage.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/hanpage/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/hanpage/pub/include/header.php";?>
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
		<li><img src="/pages/default/images/sub/joinsubNav01.jpg" alt="약관동의 아이콘"><img class="on_img" src="/pages/default/images/sub/joinsubNav01_on.jpg" alt="약관동의 아이콘">약관동의</li>
		<li><img src="/pages/default/images/sub/joinsubNav03.jpg" alt="회원정보입력 아이콘"><img class="on_img" src="/pages/default/images/sub/joinsubNav03_on.jpg" alt="회원정보입력 아이콘">회원정보입력</li>
		<li class="on"><img src="/pages/default/images/sub/joinsubNav04.jpg" alt="가입완료 아이콘"><img class="on_img" src="/pages/default/images/sub/joinsubNav04_on.jpg" alt="가입완료 아이콘">가입완료</li>
	</ol>
	<!-- contStart -->
	<div class="contStart">
		<div class="joinStep4">
			<div class="contwrap">
				<img src="/pages/default/images/common/h1Logo.png" alt="세림법무법인">
				<p>
					회원가입이 완료되었습니다. <br>
					세림세무법인 회원가입을 감사드립니다.
					<br>
					<br>
					<span>세림세무법인에서 제공하는 서비스를 이용하는 서비스를 이용하실 수 있습니다.</span>
				</p>
			</div>
			<div class="btns_wrap mt30 pt25 text-center borer-none">
				<button class="join_blue_btn join_Btn mr10" type="button" onclick="location.href='./login.php'">로그인</button>
				<button class="join_black_btn join_Btn" type="button" onclick="location.href='/'">메인으로</button>
			</div>
		</div>
	</div>
	<!-- //contStart -->
</div>
<!-- //subContent -->
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>