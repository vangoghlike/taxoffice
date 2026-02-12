<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
?>
<?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] == ""){?>
<script>
	alert("로그인이 필요한 페이지 입니다.");
	location.href = "/member/login.php";
</script>
<?}else{?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/header.php";?>

<?$nav_id=2; // 네이게이션 on 활성화 여부의 번호입니다.?>

<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/nav.php";?>
<?
	$dblink = SetConn($_conf_db["main_db"]);

	$userInfo = getUserInfo($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"],"Y");

	$arrPayList = getArticleList("tbl_consulting", 5, 0, " where goods_idx = 4 and user_id='".$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]."' AND status != 0 order by idx desc ");
	//DB해제
	SetDisConn($dblink);
?>
<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20210820015" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<!-- subContainer -->
<div class="subContainer">
	<div class="myPageMain">
		<div class="topInfo">
			<div class="line">
				<div class="tit bold"><?=$userInfo["list"][0]["user_name"]?>님</div>
				<a href="/mypage/user_info.php" class="edit">정보변경</a>
			</div>
			<div class="line bbNone">
				<div class="tit">내 포인트</div>
				<div class="point"><span><?=number_format($userInfo["list"][0]["etc_2"],0)?>P</span></div>
			</div>
		</div>
		<!-- <div class="box">
			<div class="top">
				<div class="tit">나의 상담 내역</div>
				<a href="./order.php">더보기</a>
			</div>
			<div class="cont">
				<table class="base01">
					<colgroup>
						<col style="width:25%;" />
						<col style="width:25%;" />
						<col style="width:25%;" />
						<col />
					</colgroup>
					<thead>
						<tr>
							<th>구분</th>
							<th>업무 선택</th>
							<th>담당 세무사</th>
							<th>진행상태</th>
						</tr>
					</thead>
					<tbody>
						<tr class="allmerge">
							<td colspan="4">상담 내역이 없습니다.</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div> -->
		<div class="box">
			<div class="top">
				<div class="tit">나의 결제 내역</div>
				<a href="./pay.php">더보기</a>
			</div>
			<div class="cont">
				<a href="./pay.php">
					<table class="base01">
						<colgroup>
							<col style="width:33.3%;" />
							<col style="width:33.3%;" />
							<col />
						</colgroup>
						<thead>
							<tr>
								<th>결제 금액 (실결제 금액)</th>
								<th>결제 수단</th>
								<th>구매일자</th>
							</tr>
						</thead>
						<tbody>
							<?
							if($arrPayList["list"]["total"] > 0){
								for($i=0;$i<$arrPayList["list"]["total"];$i++){
							?>
							<tr class="allmerge">
								<td><?=number_format($arrPayList["list"][$i]["price"],0)?>원 (<?=number_format($arrPayList["list"][$i]["pay_price"],0)?>원)</td>
								<td>
								<?if($arrPayList["list"][$i]["pay_method"] == "card"){?>
								카드
								<?}else{?>
								포인트
								<?}?>
								</td>
								<td><?=$arrPayList["list"][$i]["reg_date"]?></td>
							</tr>
							<?
								}
							}else{?>
							<tr class="allmerge">
								<td colspan="3">결제 내역이 없습니다.</td>
							</tr>
							<?}?>
						</tbody>
					</table>
				</a>
			</div>
		</div>
		<!-- <div class="box mb0 bbBottom">
			<div class="iconList tp01">
				<ul>
					<li class="no1"><a href="/112">공지사항</a></li>
					<li class="no1"><a href="/138">이벤트</a></li>
					<li class="no2"><a href="/153">보수안내</a></li>
					<li class="no3"><a href="/108">세무실무사례</a></li>
					<li class="no4"><a href="/19">업무의뢰</a></li>
				</ul>
			</div>
		</div> -->
		<div class="box mb0 bbBottom">
			<div class="iconList tp02">
				<ul>
					<li class="no1"><a href="/sub/policy.php">개인정보처리방침</a></li>
					<li class="no2"><a href="/sub/agree.php">이용약관</a></li>
				</ul>
			</div>
		</div>
		<!-- <div class="box mb0 ">
			<div class="iconList tp03">
				<ul>
					<li class="no1"><a href="/module/member/logout.php">로그아웃</a></li>
				</ul>
			</div>
		</div> -->
	</div>
</div>
<!-- //subContainer -->
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>
<?}?>