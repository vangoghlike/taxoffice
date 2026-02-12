<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_fdicenter.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/fdicenter/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/fdicenter/pub/include/header.php";?>

<?$nav_id=1; // 네이게이션 on 활성화 여부의 번호입니다.?>

<?include $_SERVER['DOCUMENT_ROOT'] . "/fdicenter/pub/include/nav.php";?>

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
			<h2>Login</h2>
		</div>
		<!-- //h2Wrap -->
		<!-- lnb -->
		<div class="lnb">
			<span><img src="/pages/default/images/common/home.png" alt="home"></span>
			<span class="last">Login</span>
		</div>
		<!-- //lnb -->
	</div>
	<!-- //subTopInfo -->
	<!-- contStart -->
	<div class="contStart">
		<form class="login" id="frm_login" name="frm_login" action="/module/member/member_eng_evn.php" method="post">
			<input type="hidden" name="evnMode" value="login" />
			<!-- <input type="hidden" name="base" value="" />
			<input type="hidden" name="red" value="http://www.taxoffice.co.kr/401" />
			<input type="hidden" name="sns" value="" />
			<input type="hidden" name="sns_id" value="" />
			<input type="hidden" name="sns_name" value="" /> -->
			<fieldset>
				<legend class="sr-only">Login Form</legend>
				<ul>
					<li>
						<input type="text" id="user_id" name="user_id" title="input your ID" placeholder="input your ID" value="" class="req" data-pattern="id" data-minlen="3" />
					</li>
					<li>
						<input type="password" id="passwd" name="passwd" title="input your PW" placeholder="input your PW" value="" class="req" data-minlen="3" />
					</li>
				</ul>
				<input class="login_btn act_login" type="submit" value="Login">
				<div class="save_id">
					<input type="checkbox" id="save_id" name="save_id" value="Y" title="SAVE ID">
					<label for="save_id">SAVE ID</label>
				</div>
				<div class="btns_wrap">
					<a href="./findid.php">Find ID</a>
					<a href="./findpw.php">Find PW</a>
					<a href="./join_step1.php">Sign Up</a>
				</div>
			</fieldset>
			<div class="sns_login">
				<div class="sns_Wrap" style="display:none;">
					<ul>
						<li class="naver"><a href="#" class="act_login_naver">For Naver</a></li>
						<li class="kakao"><a href="#" class="act_login_kakao">For Kakao</a></li>
					</ul>
				</div>
				<div class="qus">
					Don't have an account?
					<a href="./join_step1.php">Sign Up</a>
				</div>
			</div>
		</form>
	</div>
	<!-- //contStart -->
</div>
<!-- //subContent -->
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/fdicenter/pub/include/footer.php";?>