<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_call.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");

$cat_no = $_REQUEST["cat_no"];
if(!$cat_no){$cat_no="41";}
?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/taxcall/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/taxcall/pub/include/header.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/taxcall/pub/include/nav.php";?>

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
			<h2>정보찾기</h2>
		</div>
		<!-- //h2Wrap -->
		<!-- lnb -->
		<div class="lnb">
			<span><img src="/pages/default/images/common/home.png" alt="home"></span>
			<span>상담센터</span><span>정보찾기</span><span class="last">기관별 링크</span>
		</div>
		<!-- //lnb -->
	</div>
	<!-- //subTopInfo -->
	<!-- contStart -->
	<div class="contStart">
		<div class="tabType01 type ">
			<ul>
				<li class="menu88 on" style="width:33.3333333333%"><a href="/88">업무별 링크</a></li>
				<li class="menu89" style="width:33.3333333333%"><a href="/89">기관별 링크</a></li>
				<li class="menu90" style="width:33.3333333333%"><a href="/90">업무 제휴 안내</a></li>
			</ul>
		</div>
		<div class="tabType02 ">
			<ul></ul>
		</div>
		<div class="h3Wrap line">
			<h3>기관별 링크</h3>
		</div>
		<a class="con_print_btn"><i class="fa fa-print"></i>&nbsp;인쇄</a>
		<div class="clearFix"></div>
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?######################## Content ######################## ST?>
<?
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

	$arrCatInfo = getCategoryInfo($cat_no);
	if($arrCatInfo["total"] > 0){
		if($arrCatInfo["list"][0]["cat_use_type"] == "C" && $arrCatInfo["list"][0]["cat_cont_idx"] != 0){			// 컨텐츠
			$arrContInfo = getContentsInfo($arrCatInfo["list"][0]["cat_cont_idx"]);
			include $_SERVER['DOCUMENT_ROOT'] ."/module/contents/contents.php";
		}else if($arrCatInfo["list"][0]["cat_use_type"] == "B" && $arrCatInfo["list"][0]["cat_board_id"] != ""){	// 게시판
			$_REQUEST['boardid'] = $arrCatInfo["list"][0]["cat_board_id"];
			include $_SERVER['DOCUMENT_ROOT'] ."/module/board/menu_board.php";
		}else if($arrCatInfo["list"][0]["cat_use_type"] == "N" && $arrCatInfo["list"][0]["cat_news_id"] != ""){		// 뉴스
			// 조세 뉴스
			$news_id = $arrCatInfo["list"][0]["cat_news_id"];
			if($_REQUEST["idx"] != ""){
				include $_SERVER['DOCUMENT_ROOT'] ."/module/news/read.php";			// 상세
			}else{
				include $_SERVER['DOCUMENT_ROOT'] ."/module/news/index.php";		// 리스트
			}
		}else{
			jsGo("/","해당하는 메뉴가 없습니다.");
		}
	}
//DB해제
SetDisConn($dblink);
?>		
<?######################## Content ######################## ED?>
<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
	</div>
</div>
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>