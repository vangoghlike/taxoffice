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
<?
	$dblink = SetConn($_conf_db["main_db"]);

	$userInfo = getUserInfo($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"],"Y");

	$arrPayList = getArticleList("tbl_consulting", 0, 0, " where goods_idx = 4 and user_id='".$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]."' AND status != 0 order by idx desc ");
	//DB해제
	SetDisConn($dblink);
?>


<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/nav.php";?>

<!-- sub_title end -->
<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20210820015" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<!-- subContainer -->
<div class="subContainer">
	<table class="base04">
		<colgroup>
			<col style="width:33.3%;" />
			<col style="width:33.3%;" />
			<col />
		</colgroup>
		<thead>
			<tr>
				<th>결제 금액 (실결제 금액)</th>
				<th>결제수단</th>
				<th>결제일시</th>
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
</div>
<!-- //subContainer -->
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>
<?}?>