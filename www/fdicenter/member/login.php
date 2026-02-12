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
			<h2>로그인</h2>
		</div>
		<!-- //h2Wrap -->
		<!-- lnb -->
		<div class="lnb">
			<span><img src="/pages/default/images/common/home.png" alt="home"></span>
			<span class="last">로그인</span>
		</div>
		<!-- //lnb -->
	</div>
	<!-- //subTopInfo -->
	<!-- contStart -->
	<div class="contStart">
		<form class="login" id="frm_login" name="frm_login" action="/module/member/member_evn.php" method="post">
			<input type="hidden" name="evnMode" value="login" />
            <input type="hidden" name="rt_url" value="<?=$_SERVER['HTTP_REFERER']?>"/>
			<!-- <input type="hidden" name="base" value="" />
			<input type="hidden" name="red" value="http://www.taxoffice.co.kr/401" />
			<input type="hidden" name="sns" value="" />
			<input type="hidden" name="sns_id" value="" />
			<input type="hidden" name="sns_name" value="" /> -->
			<fieldset>
				<legend class="sr-only">로그인 양식폼입니다.</legend>
				<ul>
					<li>
						<input type="text" id="user_id" name="user_id" title="아이디를 입력해주세요." placeholder="아이디를 입력해주세요." value="" class="req" data-pattern="id" data-minlen="3" />
					</li>
					<li>
						<input type="password" id="passwd" name="passwd" title="비밀번호를 입력해주세요." placeholder="비밀번호를 입력해주세요." value="" class="req" data-minlen="3" />
					</li>
				</ul>
				<input class="login_btn act_login" type="submit" value="로그인">
				<div class="save_id">
					<input type="checkbox" id="save_id" name="save_id" value="Y" title="아이디저장">
					<label for="save_id">아이디저장</label>
				</div>
				<div class="btns_wrap">
					<a href="./findid.php">아이디 찾기</a>
					<a href="./findpw.php">비밀번호 찾기</a>
					<a href="./join_step1.php">회원가입하기</a>
				</div>
			</fieldset>
			<div class="sns_login">
				<div class="sns_Wrap" style="display:none;">
					<ul>
						<li class="naver"><a href="#" class="act_login_naver">네이버 계정으로 로그인</a></li>
						<li class="kakao"><a href="#" class="act_login_kakao">카카오 계정으로 로그인</a></li>
					</ul>
				</div>
				<div class="qus">
					계정이 없으신가요?
					<a href="./join_step1.php">회원가입하기</a>
				</div>
			</div>
		</form>
	</div>
	<!-- //contStart -->
</div>
<!-- //subContent -->
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/fdicenter/pub/include/footer.php";?>