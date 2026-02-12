<?php
header("Content-Type: text/html; charset=UTF-8");
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/dbconfig.inc.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrSetInfo = getShopsetInfo($GLOBALS["_conf_tbl"]["shop_set"]);

//DB해제
SetDisConn($dblink);


/*********************************************************************/
// 사이트 기본정보
/*********************************************************************/
// site info
include $_SERVER['DOCUMENT_ROOT'] . "/common/lib/info.inc.php";

// 도메인별 폴더 지정
$_SITE['URL_PREFIX'] = getDomainPrefix();

$_SITE["NAME"] = $arrSetInfo["list"][0]['shop_name'];
$_SITE["DOMAIN"] = $arrSetInfo["list"][0]['shop_url'];
$_SITE["EMAIL"] = $arrSetInfo["list"][0]['admin_email'];

$_SITE["MO"]["TEL"] = "01012345678";
$_SITE["MO"]["SMS"] = "01012345678";

$_SITE["caltime"][1]	= "00:00";
$_SITE["caltime"][2]	= "00:30";
$_SITE["caltime"][3]	= "01:00";
$_SITE["caltime"][4]	= "01:30";
$_SITE["caltime"][5]	= "02:00";
$_SITE["caltime"][6]	= "02:30";
$_SITE["caltime"][7]	= "03:00";
$_SITE["caltime"][8]	= "03:30";
$_SITE["caltime"][9]	= "04:00";
$_SITE["caltime"][10]	= "04:30";
$_SITE["caltime"][11]	= "05:00";
$_SITE["caltime"][12]	= "05:30";
$_SITE["caltime"][13]	= "06:00";
$_SITE["caltime"][14]	= "06:30";
$_SITE["caltime"][15]	= "07:00";
$_SITE["caltime"][16]	= "07:30";
$_SITE["caltime"][17]	= "08:00";
$_SITE["caltime"][18]	= "08:30";
$_SITE["caltime"][19]	= "09:00";
$_SITE["caltime"][20]	= "09:30";
$_SITE["caltime"][21]	= "10:00";
$_SITE["caltime"][22]	= "10:30";
$_SITE["caltime"][23]	= "11:00";
$_SITE["caltime"][24]	= "11:30";
$_SITE["caltime"][25]	= "12:00";
$_SITE["caltime"][26]	= "12:30";
$_SITE["caltime"][27]	= "13:00";
$_SITE["caltime"][28]	= "13:30";
$_SITE["caltime"][29]	= "14:00";
$_SITE["caltime"][30]	= "14:30";
$_SITE["caltime"][31]	= "15:00";
$_SITE["caltime"][32]	= "15:30";
$_SITE["caltime"][33]	= "16:00";
$_SITE["caltime"][34]	= "16:30";
$_SITE["caltime"][35]	= "17:00";
$_SITE["caltime"][36]	= "17:30";
$_SITE["caltime"][37]	= "18:00";
$_SITE["caltime"][38]	= "18:30";
$_SITE["caltime"][39]	= "19:00";
$_SITE["caltime"][40]	= "19:30";
$_SITE["caltime"][41]	= "20:00";
$_SITE["caltime"][42]	= "20:30";
$_SITE["caltime"][43]	= "21:00";
$_SITE["caltime"][44]	= "21:30";
$_SITE["caltime"][45]	= "22:00";
$_SITE["caltime"][46]	= "22:30";
$_SITE["caltime"][47]	= "23:00";
$_SITE["caltime"][48]	= "23:30";
$_SITE["caltime"]["00:00"]	= 1;
$_SITE["caltime"]["00:30"]	= 2;
$_SITE["caltime"]["01:00"]	= 3;
$_SITE["caltime"]["01:30"]	= 4;
$_SITE["caltime"]["02:00"]	= 5;
$_SITE["caltime"]["02:30"]	= 6;
$_SITE["caltime"]["03:00"]	= 7;
$_SITE["caltime"]["03:30"]	= 8;
$_SITE["caltime"]["04:00"]	= 9;
$_SITE["caltime"]["04:30"]	= 10;
$_SITE["caltime"]["05:00"]	= 11;
$_SITE["caltime"]["05:30"]	= 12;
$_SITE["caltime"]["06:00"]	= 13;
$_SITE["caltime"]["06:30"]	= 14;
$_SITE["caltime"]["07:00"]	= 15;
$_SITE["caltime"]["07:30"]	= 16;
$_SITE["caltime"]["08:00"]	= 17;
$_SITE["caltime"]["08:30"]	= 18;
$_SITE["caltime"]["09:00"]	= 19;
$_SITE["caltime"]["09:30"]	= 20;
$_SITE["caltime"]["10:00"]	= 21;
$_SITE["caltime"]["10:30"]	= 22;
$_SITE["caltime"]["11:00"]	= 23;
$_SITE["caltime"]["11:30"]	= 24;
$_SITE["caltime"]["12:00"]	= 25;
$_SITE["caltime"]["12:30"]	= 26;
$_SITE["caltime"]["13:00"]	= 27;
$_SITE["caltime"]["13:30"]	= 28;
$_SITE["caltime"]["14:00"]	= 29;
$_SITE["caltime"]["14:30"]	= 30;
$_SITE["caltime"]["15:00"]	= 31;
$_SITE["caltime"]["15:30"]	= 32;
$_SITE["caltime"]["16:00"]	= 33;
$_SITE["caltime"]["16:30"]	= 34;
$_SITE["caltime"]["17:00"]	= 35;
$_SITE["caltime"]["17:30"]	= 36;
$_SITE["caltime"]["18:00"]	= 37;
$_SITE["caltime"]["18:30"]	= 38;
$_SITE["caltime"]["19:00"]	= 39;
$_SITE["caltime"]["19:30"]	= 40;
$_SITE["caltime"]["20:00"]	= 41;
$_SITE["caltime"]["20:30"]	= 42;
$_SITE["caltime"]["21:00"]	= 43;
$_SITE["caltime"]["21:30"]	= 44;
$_SITE["caltime"]["22:00"]	= 45;
$_SITE["caltime"]["22:30"]	= 46;
$_SITE["caltime"]["23:00"]	= 47;
$_SITE["caltime"]["23:30"]	= 48;

/*********************************************************************/
// 업로드 파일 위치
/*********************************************************************/
$_SITE["UPLOADED_DATA"] = $_SERVER['DOCUMENT_ROOT'] . "/uploaded";

/*********************************************************************/
// 게시판 설정 정보
/*********************************************************************/
$_SITE["BOARD_PREWORD"] = "tbl_board_";
$_SITE["BOARD_DATA"] = $_SITE["UPLOADED_DATA"] . "/board";
$_SITE["BOARD_PATH"] = $_SERVER['DOCUMENT_ROOT'] . "/module/board";
$_SITE["BOARD_SKIN"] = $_SITE["BOARD_PATH"] . "/skin/";
$_SITE["BOARD_SKIN_URL"] = "/module/board/skin";

/*********************************************************************/
// 게시판 설정 정보 - 모바일
/*********************************************************************/
$_SITE["BOARD_PATH_M"] = $_SERVER['DOCUMENT_ROOT'] . "/m/module/board";
$_SITE["BOARD_SKIN_M"] = $_SITE["BOARD_PATH_M"] . "/skin/";

/*********************************************************************/
// 가입금지 아이디
/*********************************************************************/
$_SITE["MEMBER"]["DONT_USE_ID"][] = "admin";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "master";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "webmaster";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "administrator";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "guest";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "help";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "sex";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "fuck";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "barbie";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "barbiestyle";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "barbiecurl";
$_SITE["MEMBER"]["DONT_USE_ID"][] = "barbiecurlstyle";

/*********************************************************************/
// 연락처
/*********************************************************************/
$_SITE["DATA"]["PHOME_FIRST"]["1"]	= "070";
$_SITE["DATA"]["PHOME_FIRST"]["2"]	= "02";
$_SITE["DATA"]["PHOME_FIRST"]["3"]	= "031";
$_SITE["DATA"]["PHOME_FIRST"]["4"]	= "032";
$_SITE["DATA"]["PHOME_FIRST"]["5"]	= "033";
$_SITE["DATA"]["PHOME_FIRST"]["6"]	= "041";
$_SITE["DATA"]["PHOME_FIRST"]["7"]	= "042";
$_SITE["DATA"]["PHOME_FIRST"]["8"]	= "043";
$_SITE["DATA"]["PHOME_FIRST"]["9"]	= "044";
$_SITE["DATA"]["PHOME_FIRST"]["10"]	= "051";
$_SITE["DATA"]["PHOME_FIRST"]["11"]	= "052";
$_SITE["DATA"]["PHOME_FIRST"]["12"]	= "053";
$_SITE["DATA"]["PHOME_FIRST"]["13"]	= "054";
$_SITE["DATA"]["PHOME_FIRST"]["14"]	= "055";
$_SITE["DATA"]["PHOME_FIRST"]["15"]	= "061";
$_SITE["DATA"]["PHOME_FIRST"]["16"]	= "062";
$_SITE["DATA"]["PHOME_FIRST"]["17"]	= "063";
$_SITE["DATA"]["PHOME_FIRST"]["18"]	= "064";
$_SITE["DATA"]["PHOME_FIRST"]["19"]	= "010";
$_SITE["DATA"]["PHOME_FIRST"]["20"]	= "011";
$_SITE["DATA"]["PHOME_FIRST"]["21"]	= "016";
$_SITE["DATA"]["PHOME_FIRST"]["22"]	= "017";
$_SITE["DATA"]["PHOME_FIRST"]["22"]	= "018";
$_SITE["DATA"]["PHOME_FIRST"]["23"]	= "019";

/*********************************************************************/
// 분기별
/*********************************************************************/
$_SITE["DATE"]["QUARTER"]["1"]	= "2020-1";
$_SITE["DATE"]["QUARTER"]["2"]	= "2020-2";
$_SITE["DATE"]["QUARTER"]["3"]	= "2020-3";
$_SITE["DATE"]["QUARTER"]["4"]	= "2020-4";
$_SITE["DATE"]["QUARTER"]["5"]	= "2021-1";
$_SITE["DATE"]["QUARTER"]["6"]	= "2021-2";
$_SITE["DATE"]["QUARTER"]["7"]	= "2021-3";
$_SITE["DATE"]["QUARTER"]["8"]	= "2021-4";

/*********************************************************************/
// 액셀러레이터 활동 리슽크
/*********************************************************************/
$_SITE["DATE"]["ACCELERATOR"]["1"]	= "사전진단 컨설팅";
$_SITE["DATE"]["ACCELERATOR"]["2"]	= "ICT창업 교육";
$_SITE["DATE"]["ACCELERATOR"]["3"]	= "전문가 컨설팅";
$_SITE["DATE"]["ACCELERATOR"]["4"]	= "내외부 멘토링";
$_SITE["DATE"]["ACCELERATOR"]["5"]	= "IR";
$_SITE["DATE"]["ACCELERATOR"]["6"]	= "언론홍보";
$_SITE["DATE"]["ACCELERATOR"]["7"]	= "기타";



/*********************************************************************/
// 제품 관련(product 모듈) 변수 설정
/*********************************************************************/
//카테고리 뎊스 : 최대 5까지
$_SITE["PRODUCT"]["CATEGORY_DEPTH"] = 4;

//사진이미지 추가가능 갯수
$_SITE["PRODUCT"]["IMAGE_COUNT"] = 10;

/*********************************************************************/
// SMS 관련 변수 설정
/*********************************************************************/
//SMS - 밥스누 (hosting.whois.co.kr) 문자서비스
$_SITE["SMS"]["WHOIS"]["ID"] = "";
$_SITE["SMS"]["WHOIS"]["PW"] = "";
$_SITE["SMS"]["WHOIS"]["FROM"] = "";

/*********************************************************************/
// 쇼핑몰 관련 변수 설정
/*********************************************************************/
//쇼핑몰 사용여부
$_SITE["SHOP"]["USE_SHOP"] = "Y";

//장바구니 이미지 크기
$_SITE["SHOP"]["IMAGE_S_WIDTH"] = "80";
//목록 이미지 크기
$_SITE["SHOP"]["IMAGE_M_WIDTH"] = "270";
//상세보기 이미지 크기
$_SITE["SHOP"]["IMAGE_L_WIDTH"] = "430";
//목록에서 이미지 가로갯수
$_SITE["SHOP"]["IMAGE_DIVISION"] = "4";

//PG사 설정
$_SITE["SHOP"]["PG"]["SERVICE"] = "test";//테스트 일 경우에만 test 
$_SITE["SHOP"]["PG"]["COMPANY"] = "dacom";//올더게이트
$_SITE["SHOP"]["PG"]["MALLID"] = $arrSetInfo["list"][0]['shop_pg_id'];//올더게이트 테스트 아이디(aegis)

//===========================================================
//휴대폰결제 관련 정보// 올더게이트 사용시 휴대폰아디 추가 발급
// 20100729
//===========================================================
$_SITE["SHOP"]["PG"]["HP_SUBID"] = "";// SUB_CP아이디
//## 업체에 따라 하단 값을 넣지 않다도 작동세팅이 된 업체도 있슴

$_SITE["SHOP"]["PG"]["HP_UNITType"] = "";//상품구분 1:디지털 2:일반
$_SITE["SHOP"]["PG"]["ProdCode"] = "";//상품코드
$_SITE["SHOP"]["PG"]["HP_ID"] = "";//CP 아이디
$_SITE["SHOP"]["PG"]["HP_PWD"] = "";//비밀번호// 엑셀파일에는 없음
//===========================================================


//계좌번호 설정
$arrBank = explode("\n", $arrSetInfo["list"][0]['shop_bankinfo']);
for($i=0; $i<count($arrBank); $i++) {
	$_SITE["SHOP"]["BANK"][]	= $arrBank[$i];
}

//회원가입시 포인트
$_SITE["SHOP"]["POINT"]["JOIN"]	= $arrSetInfo["list"][0]['shop_point_member'];

//포인트 사용시 포인트가 이 금액 이상 있어야지만 사용가능
$_SITE["SHOP"]["POINT"]["LOW_ACCOUNT"]	= $arrSetInfo["list"][0]['shop_point_min'];

//포인트 사용시 총액이 이 금액 이상이어야지만 사용가능
$_SITE["SHOP"]["POINT"]["LOW_PRICE"]	= $arrSetInfo["list"][0]['shop_point_max']; // 지금은 적립 % 로 사용할 예정

//총액이 이 금액 이상이면 배송료 무료
$_SITE["SHOP"]["SHIP"]["FREE_PRICE"]	= $arrSetInfo["list"][0]['shop_delivery_price'];

//기본 배송료
$_SITE["SHOP"]["SHIP"]["SHIP_PRICE"]	= $arrSetInfo["list"][0]['shop_delivery_default'];

//주문상태
$_SITE["SHOP"]["ORDER_STATE"]["1"]	= "입금대기";
$_SITE["SHOP"]["ORDER_STATE"]["2"]	= "취소요청";
$_SITE["SHOP"]["ORDER_STATE"]["3"]	= "취소완료";
$_SITE["SHOP"]["ORDER_STATE"]["4"]	= "교환/반품요청";
$_SITE["SHOP"]["ORDER_STATE"]["5"]	= "교환/반품완료";
$_SITE["SHOP"]["ORDER_STATE"]["6"]	= "입금확인";
$_SITE["SHOP"]["ORDER_STATE"]["7"]	= "배송준비중";
$_SITE["SHOP"]["ORDER_STATE"]["8"]	= "배송중";
$_SITE["SHOP"]["ORDER_STATE"]["9"]	= "구매완료";
$_SITE["SHOP"]["ORDER_STATE"]["10"]	= "미주문";

//결제방법
$arrPay = explode(",", $arrSetInfo["list"][0]['shop_payment']);
for($i=0; $i<count($arrPay); $i++) {
	$arrPayType = explode("|", $arrPay[$i]);

	$_SITE["SHOP"]["PAY_TYPE"][$arrPayType[0]] = $arrPayType[1];
}
//$_SITE["SHOP"]["PAY_TYPE_MOBILE"]["cardnormal"]	= "신용카드(일반)";
//$_SITE["SHOP"]["PAY_TYPE_MOBILE"]["virtualnormal"]	= "가상계좌(일반)";
//$_SITE["SHOP"]["PAY_TYPE_MOBILE"]["cardescrow"]	= "신용카드(에스크로)";
//$_SITE["SHOP"]["PAY_TYPE_MOBILE"]["virtualescrow"]	= "가상계좌(에스크로)";
//$_SITE["SHOP"]["PAY_TYPE_MOBILE"]["hp"]	= "휴대폰";


//성별
$_SITE["SHOP"]["SEX"]["M"]	= "남";
$_SITE["SHOP"]["SEX"]["F"]	= "여";
$_SITE["SHOP"]["SEX"]["N"]	= "모름";

//요일
$_SITE["SHOP"]["WEEK"]["0"]	= "일";
$_SITE["SHOP"]["WEEK"]["1"]	= "월";
$_SITE["SHOP"]["WEEK"]["2"]	= "화";
$_SITE["SHOP"]["WEEK"]["3"]	= "수";
$_SITE["SHOP"]["WEEK"]["4"]	= "목";
$_SITE["SHOP"]["WEEK"]["5"]	= "금";
$_SITE["SHOP"]["WEEK"]["6"]	= "토";
$_SITE["SHOP"]["WEEK"]["7"]	= "일";

/*********************************************************************/
// 해당 홈페이지의 특수한 코드 다른 웹사이트 적용 X
/*********************************************************************/
$_SITE["SHOP"]["TERMS"] = $arrSetInfo["list"][0]['shop_TermsOfUse']; // 이용약관
$_SITE["SHOP"]["TERMS"] = $arrSetInfo["list"][0]['shop_TermsOfUse']; // 이용약관
$_SITE["SHOP"]["TERMS"] = $arrSetInfo["list"][0]['shop_TermsOfUse']; // 이용약관
$arrBadWord = explode(",", $arrSetInfo["list"][0]['shop_badWord']);
for($i=0; $i<count($arrBadWord); $i++) {
	$_SITE["SHOP"]["BADWORD"][$i] = $arrBadWord[$i];
}
/*********************************************************************/
// 페이징 관련 변수 설정
/*********************************************************************/
//페이징 관련 변수(기본설정이며 각 페이지에서 재 설정 가능)
$scale = 10;
$pagescale = 10;

include $_SERVER['DOCUMENT_ROOT'] . "/common/lib/html.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/common/lib/util.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/common/lib/navigation.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/common/lib/smtpclass.inc.php";
?>
