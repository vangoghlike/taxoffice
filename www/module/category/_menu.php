<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");

$cat_no = $_REQUEST["cat_no"];
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

	$arrCatInfo = getCategoryInfo($cat_no);

	if($arrCatInfo["total"] > 0){
		if($arrCatInfo["list"][0]["cat_use_type"] == "C" && $arrCatInfo["list"][0]["cat_cont_idx"] != 0){
			$arrContInfo = getContentsInfo($arrCatInfo["list"][0]["cat_cont_idx"]);
			include $_SERVER['DOCUMENT_ROOT'] ."/module/contents/contents.php";
		}else if($arrCatInfo["list"][0]["cat_use_type"] == "B" && $arrCatInfo["list"][0]["cat_board_id"] != ""){
			$_REQUEST['boardid'] = $arrCatInfo["list"][0]["cat_board_id"];
			include $_SERVER['DOCUMENT_ROOT'] ."/module/board/menu_board.php";
		}else if($arrCatInfo["list"][0]["cat_use_type"] == "N" && $arrCatInfo["list"][0]["cat_news_id"] != ""){
			// 조세 뉴스
			$news_id = $arrCatInfo["list"][0]["cat_news_id"];
			if($_REQUEST["idx"] != ""){
				include $_SERVER['DOCUMENT_ROOT'] ."/module/news/read.php";
			}else{
				include $_SERVER['DOCUMENT_ROOT'] ."/module/news/index.php";
			}
		}else{
			jsGo("/","해당하는 메뉴가 없습니다.");
		}
	}

//DB해제
SetDisConn($dblink);
?>
