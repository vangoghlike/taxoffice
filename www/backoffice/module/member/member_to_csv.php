<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/auth/auth.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/member/member.lib.php";
if(!in_array("member_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getMemberList(mysql_escape_string($_REQUEST[sw]), mysql_escape_string($_REQUEST[sk]), 0, 0);
//_DEBUG($arrList);

//DB해제
SetDisConn($dblink);

//Header("Content-type: file/unknown");
header( "Content-type: application/vnd.ms-excel" );
header( "Content-Disposition: attachment; filename=".iconv("utf-8","euc-kr",$_SITE['NAME'])."_member_".date(m)."월".date(d)."일".date(h)."시".date(i)."분.csv" );
header( "Content-Description: PHP4 Generated Data" );
header("Pragma: no-cache");
header("Expires: 0");

	echo "번호,";
	echo "ID,";
	echo "이름,";
	echo "생일,";
	echo "이메일,";
	echo "우편번호,";
	echo "주소,";
	echo "상세주소,";
	echo "전화번호,";
	echo "휴대폰,";
	echo "메일수신,";
	echo "로그인수,";
	echo "마지막로그인,";
	echo "등록일,";
	echo "수정일\n";

for ( $i=0 ; $i < $arrList["total"] ; $i++ ) {
	echo $i+1 . ",";
	echo $arrList["list"][$i][user_id] . ",";
	echo iconv("utf-8","euc-kr",$arrList["list"][$i][user_name]) . ",";
	echo $arrList["list"][$i][birth] . ",";
	echo str_replace(",",".", iconv("utf-8","euc-kr",$arrList["list"][$i][email])) . ",";
	echo str_replace(",",".", iconv("utf-8","euc-kr",$arrList["list"][$i][zip])) . ",";
	echo str_replace(",",".", iconv("utf-8","euc-kr",$arrList["list"][$i][address])) . ",";
	echo str_replace(",",".", iconv("utf-8","euc-kr",$arrList["list"][$i][address_ext])) . ",";
	echo str_replace(",",".", $arrList["list"][$i][phone]) . ",";
	echo str_replace(",",".", $arrList["list"][$i][mobile]) . ",";
	echo $arrList["list"][$i][email_accept]=="Y"?"예,":"아니오,";
	echo $arrList["list"][$i][login_count] . ",";
	echo $arrList["list"][$i][login_last] . ",";
	echo $arrList["list"][$i][wdate] . ",";
	echo $arrList["list"][$i][udate] . "\n";
}
?>