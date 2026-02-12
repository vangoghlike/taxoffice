<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/board/board.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$scale=0;

$arrBoardList = getBoardListBaseNFile($_GET['boardid'],"","", "", 0, 0,"");

//Header("Content-type: file/unknown");
header( "Content-type: application/vnd.ms-excel;charset=UTF-8" );
header( "Content-Disposition: attachment; filename=".iconv("UTF-8","UTF-8",$_SITE['NAME'])."_참가신청_".date(m)."월".date(d)."일".date(h)."시".date(i)."분.csv" );
header( "Content-Description: PHP4 Generated Data" );
header("Pragma: no-cache");
header("Expires: 0");

echo "\xEF\xBB\xBF";
	echo "번호,";
	echo "아이디,";
	echo "신청자,";
	echo "연락처,";
	echo "신청기업명,";
	echo "부서 및 직함,";
	echo "취소여부,";
	echo "신청일\n";

$etc_2="";
for ( $i=0 ; $i<$arrBoardList["list"]["total"] ; $i++ ) {
	if($arrBoardList["list"][$i]['cancle_YN']=="Y"){
		$etc_2="취소";
	}else if($arrBoardList["list"][$i]['cancle_YN']=="N"){
		$etc_2="신청";
	}

	echo $i+1 . ",";
	echo strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","UTF-8",$arrBoardList["list"][$i]['w_user']))))  . ",";
	echo strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","UTF-8",$arrBoardList["list"][$i]['name']))))  . ",";
	echo strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","UTF-8",$arrBoardList["list"][$i]['homepage']))))  . ",";
	echo strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","UTF-8",$arrBoardList["list"][$i]['subject']))))  . ",";
	echo strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","UTF-8",$arrBoardList["list"][$i]['etc_2']))))  . ",";
	echo strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","UTF-8",$etc_2))))  . ",";
	echo strip_tags(str_replace(",",".", stripslashes(substr($arrBoardList["list"][$i]['schedule_date'],0,10))))  . "\n";
}

//DB해제
SetDisConn($dblink);
?>