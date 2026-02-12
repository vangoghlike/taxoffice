<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_hanpage.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/hanpage/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/hanpage/pub/include/header.php";?>

<?$nav_id=3; // 네이게이션 on 활성화 여부의 번호입니다.?>

<?include $_SERVER['DOCUMENT_ROOT'] . "/hanpage/pub/include/nav.php";?>

<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20210820015" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<script>
	function frmchk(frm){
		if(frm.email.value.length < 1){
			alert("이메일을 입력해 주세요.");
			frm.email.focus;
			return false;
		}
		if(frm.user_name.value.length < 1){
			alert("이름을 입력해 주세요.");
			frm.user_name.focus;
			return false;
		}
		if(frm.user_id.value.length < 1){
			alert("아이디를 입력해 주세요.");
			frm.user_id.focus;
			return false;
		}
		return true;
	}
</script>

<!-- subContent -->
<div class="subContent">
	<!-- subTopInfo -->
	<div class="subTopInfo">
		<!-- h2Wrap -->
		<div class="h2Wrap">
			<h2>
				아이디/비밀번호 찾기</h2>
		</div>
		<!-- //h2Wrap -->
		<!-- lnb -->
		<div class="lnb">
			<span><img src="/pages/default/images/common/home.png" alt="home"></span>
			<span class="last">아이디/비밀번호 찾기</span></div>
		<!-- //lnb -->
	</div>
	<!-- //subTopInfo -->
	<!-- contStart -->
	<div class="contStart">
		<div class="findId">
			<div class="tabType01 two">
				<ul>
					<li><a href="./findid.php">아이디 찾기</a></li>
					<li class="on"><a>비밀번호 찾기</a></li>
				</ul>
			</div>
			<div class="h3Wrap line">
				<h3>비밀번호 찾기</h3>
				<span class="text">이메일과 이름, 아이디를 입력하신 뒤 확인버튼을 눌러주세요.</span>
			</div>
			<form class="login find" id="frm_find" name="frm_find" action="/module/member/member_evn.php" method="post" onsubmit="frmchk(document.frm_find)">
				<input type="hidden" name="evnMode" value="search_pw" />
				<fieldset>
					<legend class="sr-only">비밀번호찾기 양식폼입니다.</legend>
					<ul>
						<li>
							<input id="findidEmail" type="text" class="req" name="email" title="가입 시 등록하신 이메일 정보를 입력해주세요." placeholder="이메일" />
						</li>
						<li>
							<input id="filndidName" type="text" class="req" name="user_name" title="이름을 입력해주세요." placeholder="이름" />
						</li>
						<li>
							<input id="filndpwId" type="text" class="req" name="user_id" title="아이디를 입력해주세요." placeholder="아이디" />
						</li>
					</ul>
					<input class="find_btn join_blue_btn join_Btn mt15" type="submit" value="비밀번호 찾기">
				</fieldset>
			</form>
		</div>
	</div>
	<!-- //contStart -->
</div>
<!-- //subContent -->
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>