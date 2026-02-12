<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/auth/auth.php";

include $_SERVER[DOCUMENT_ROOT] . "/module/shop/shop.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category.lib.php";


if(!in_array("shop_order_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$scale=0;


// 기간 정보가 없을 경우 오늘 날짜 데이터만 가져온다
if (!$_REQUEST[s_date] && !$_REQUEST[e_date]){
	$_REQUEST[s_date]=date("Y-m-d");
	$_REQUEST[e_date]=date("Y-m-d");;
}



$arrList = getOrderListCSV(
	mysql_escape_string($_REQUEST[sw]), 
	mysql_escape_string($_REQUEST[sk]), 
	mysql_escape_string($_REQUEST[s_date]), 
	mysql_escape_string($_REQUEST[e_date]), 
	mysql_escape_string($_REQUEST[order_status]), 
	$scale, $_REQUEST[offset]);	


//전체 카테고리 가져오기
$arrAllCategory = getCategoryAll();


//Header("Content-type: file/unknown");
header( "Content-type: application/vnd.ms-excel" );
header( "Content-Disposition: attachment; filename=".iconv("UTF-8","EUC-KR",$_SITE['NAME'])."_주문목록_".date(m)."월".date(d)."일".date(h)."시".date(i)."분.csv" );
header( "Content-Description: PHP4 Generated Data" );
header("Pragma: no-cache");
header("Expires: 0");

	echo "번호,";
	echo "주문번호,";
	echo "주문자명,";
	echo "주문자ID,";
	echo "수취인,";
	echo "브랜드,";
	echo "상품고유번호,";
	echo "상품코드,";
	echo "상품명,";
	echo "옵션,";
	echo "수량,";
	echo "수령인우편번호,";
	echo "수령인주소,";
	echo "전화번호,";
	echo "휴대폰,";	
	echo "메모,";
	echo "결제금액\n";

for ( $i=0 ; $i < $arrList["total"] ; $i++ ) {
	
	if ($i==0){
		$before_date=$arrList["list"][$i][order_no];
	}
	$temp_addr=stripslashes($arrList["list"][$i][join_address])." ".stripslashes($arrList["list"][$i][join_address_ext]);

	$arrInfo = getOrderInfoAdmin(mysql_escape_string($arrList["list"][$i][order_no]));

	if($arrInfo["good_total"]>0){
	for($j=0;$j<$arrInfo["good_total"];$j++){
		$option[$i] .= $arrInfo["good_list"][$j][g_opt_1]."//";
	}
	}


	if ($before_date!=$arrList["list"][$i][order_no]){
		echo ",";
		echo ",";
		echo ",";
		echo ",";
		echo ",";
		echo ",";
		echo ",";
		echo ",";
		echo ",";
		echo ",";		
		echo ",";		
		echo ",";		
		echo ",";
		echo ",";
		echo ",";
		echo "\n";	
		$before_date=$arrList["list"][$i][order_no];
		$j=0;		
	}	

	echo $i+1 . ",";
	echo "\"".strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","EUC-KR",$arrList["list"][$i][order_no])))) . "\",";
	echo "\"".strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","EUC-KR",$arrList["list"][$i][join_name])))) . "\",";
	echo "\"".strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","EUC-KR",$arrList["list"][$i][join_id])))) . "\",";
	echo "\"".strip_tags(str_replace(",",".", iconv("UTF-8","EUC-KR",stripslashes($arrList["list"][$i][ship_name])))) . "\",";
	echo "\"".strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","EUC-KR",$arrList["list"][$i][cat_name])))) . "\",";
	echo "\"".strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","EUC-KR",$arrList["list"][$i][g_idx])))) . "\",";
	echo "\"".strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","EUC-KR",$arrList["list"][$i][g_code])))) . "\",";
	echo "\"".strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","EUC-KR",$arrList["list"][$i][g_name])))) . "\",";
	echo "\"".strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","EUC-KR",substr($option[$i],0,-2))))) . "\",";
	echo "\"".strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","EUC-KR",$arrList["list"][$i][g_qty])))) . "\",";
	echo "\"".strip_tags(str_replace(",",".", iconv("UTF-8","EUC-KR",$arrList["list"][$i][join_zip]))) . "\",";
	echo "\"".strip_tags(str_replace(",",".", iconv("UTF-8","EUC-KR",$temp_addr))) . "\",";
	echo "\"".strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","EUC-KR",$arrList["list"][$i][ship_phone])))) . "\",";
	echo "\"".strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","EUC-KR",$arrList["list"][$i][ship_mobile])))) . "\",";
	echo "\"".strip_tags(str_replace(",",".", stripslashes(iconv("UTF-8","EUC-KR",$arrList["list"][$i][order_comment])))) . "\",";
	echo "\"".strip_tags(str_replace(",",".", $arrList["list"][$i][pay_amount]))  . "\"\n";
		
}

//DB해제
SetDisConn($dblink);
?>