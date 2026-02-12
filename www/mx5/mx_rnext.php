<?php
@session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php";
require("./libs/INImx.php");

function bankNameFN($bkCode){
	$bkName = $bkCode;
	if($bkCode=="20"){$bkName = "우리은행";}
	if($bkCode=="03"){$bkName = "기업은행";}
	if($bkCode=="88"){$bkName = "신한은행";}
	if($bkCode=="81"){$bkName = "하나은행";}
	if($bkCode=="04"){$bkName = "국민은행";}
	if($bkCode=="05"){$bkName = "외환은행";}
	if($bkCode=="27"){$bkName = "시티은행";}
	if($bkCode=="02"){$bkName = "산업은행";}
	if($bkCode=="11"){$bkName = "농협";}
	if($bkCode=="71"){$bkName = "우체국";}
	if($bkCode=="07"){$bkName = "수협";}	
	if($bkCode=="31"){$bkName = "대구은행";}
	if($bkCode=="32"){$bkName = "부산은행";}
	if($bkCode=="34"){$bkName = "광주은행";}
	if($bkCode=="23"){$bkName = "SC은행";}
	if($bkCode=="39"){$bkName = "경남은행";}
	return $bkName;
}

$inimx = new INImx;


/////////////////////////////////////////////////////////////////////////////
///// 1. 변수 초기화 및 POST 인증값 받음                                 ////
/////////////////////////////////////////////////////////////////////////////

$inimx->reqtype 		= "PAY";  //결제요청방식
$inimx->inipayhome 		= $_SERVER[DOCUMENT_ROOT] . "/mx5"; //로그기록 경로 (이 위치의 하위폴더에 log폴더 생성 후 log폴더에 대해 777 권한 설정)
$inimx->status			= $P_STATUS;
$inimx->rmesg1			= $P_RMESG1;
$inimx->tid		= $P_TID;
$inimx->req_url		= $P_REQ_URL;
$inimx->noti		= $P_NOTI;


/////////////////////////////////////////////////////////////////////////////
///// 2. 상점 아이디 설정 :                                              ////
/////    결제요청 페이지에서 사용한 MID값과 동일하게 세팅해야 함...      ////
/////    인증TID를 잘라서 사용가능 : substr($P_TID,'10','10');           ////
/////////////////////////////////////////////////////////////////////////////
$inimx->id_merchant = substr($P_TID,'10','10');  //




/////////////////////////////////////////////////////////////////////////////
///// 3. 인증결과 확인 :                                                 ////
/////    인증값을 가지고 성공/실패에 따라 처리 방법                      ////
/////////////////////////////////////////////////////////////////////////////
if($inimx->status =="00")   // 모바일 인증이 성공시
{


	/////////////////////////////////////////////////////////////////////////////
	///// 4. 승인요청 :                                                      ////
	/////    인증성공시  P_REQ_URL로 승인요청을 함...                        ////
	/////////////////////////////////////////////////////////////////////////////
	$inimx->startAction();  // 승인요청
	
	$inimx->getResult();  //승인결과 파싱, P_REQ_URL에서 내려준 결과값 파싱 
	
	/**
	결과값 파싱 전문은 INImx내 변수로 담아 표현하고 있습니다. ( 메뉴얼얼내 값 대조하여 필요한 값 저장할 수 있도록 부탁드립니다.)

	  --공통
			$this->m_tid  = $resultString['P_TID'];                                     // 거래번호
			$this->m_resultCode = $resultString['P_STATUS'];                            // 거래상태 - 지불결과 성공:00, 실패:00 이외 실패
			$this->m_resultMsg  = $resultString['P_RMESG1'];                            // 지불 결과 메시지
			$this->m_cardQuota  = $resultString['P_RMESG2'];                            // 신용카드 할부 개월 수 (메뉴얼 확인 필요)
			$this->m_payMethod = $resultString['P_TYPE'];                               // 지불수단 
			$this->m_mid  = $resultString['P_MID'];                                     // 상점아이디
			$this->m_moid  = $resultString['P_OID'];                                    // 상점주문번호
			$this->m_resultprice = $resultString['P_AMT'];                              // 거래금액
			$this->m_buyerName  = $resultString['P_UNAME'];                             // 구매자명
			$this->m_nextUrl  = $resultString['P_NEXT_URL'];                            // 가맹점 전달 P_NEXT_URL 
			$this->m_notiUrl  = $resultString['P_NOTEURL'];                             // 가맹점 전달 NOTE_URL --->>이거도 설명 에매하네 
			$this->m_authdt  = $resultString['P_AUTH_DT'];                              // 승인일자(YYYYmmddHHmmss)
			$this->m_pgAuthDate  = substr($resultString['P_AUTH_DT'],'0','8');          
			$this->m_pgAuthTime  = substr($resultString['P_AUTH_DT'],'8','6');          
			$this->m_mname  = $resultString['P_MNAME'];                                 // 가맹점명
			$this->m_noti  = $resultString['P_NOTI'];                                   // 기타주문정보
			$this->m_authCode = $resultString['P_AUTH_NO'];                             // 신용카드 승인번호 - 신용카드 거래에서만 사용		
			$this->m_cardCode = $resultString['P_FN_CD1'];                              // 카드코드 
			
			
			--신용카드		
	$this->m_cardIssuerCode = $resultString['P_CARD_ISSUER_CODE'];              // 발급사 코드 
			$this->m_cardNum  = $resultString['P_CARD_NUM'];                            // 카드번호 
			$this->m_cardMumbernum  = $resultString['P_CARD_MEMBER_NUM'];               // 가맹점번호
			$this->m_cardpurchase  = $resultString['P_CARD_PURCHASE_CODE'];             // 매입사 코드 
			$this->m_prtc  = $resultString['P_CARD_PRTC_CODE'];                         // 부분취소 가능 여부
			$this->m_cardinterest  = $resultString['P_CARD_INTEREST'];                  // 무이자 할부여부 (일반 : 0, 무이자 : 1)
			$this->m_cardcheckflag  = $resultString['P_CARD_CHECKFLAG'];                // 체크카드여부 (신용카드:0, 체크카드:1, 기프트카드:2)
			$this->m_cardName  = $resultString['P_FN_NM'];                              // 결제카드한글명
			$this->m_cardSrcCode  = $resultString['P_SRC_CODE'];                        // 앱연동 여부 P : 페이핀, K : 국민앱카드
			
			
			--휴대폰
			$this->m_codegw  = $resultString['P_HPP_CORP'];                             // 휴대폰 통신사코드
			$this->m_hppapplnum  = $resultString['P_APPL_NUM'];                         // 휴대폰결제 승인번호
			$this->m_hppnum  = $resultString['P_HPP_NUM'];                              // 고객 휴대폰 번호
			
			
			--가상계좌
			$this->m_vacct  = $resultString['P_VACT_NUM'];                              // 입금할 계좌 번호
			$this->m_dtinput = $resultString['P_VACT_DATE'];                            // 입금마감일자(YYYYmmdd)
	$this->m_tminput = $resultString['P_VACT_TIME'];									// 입금마감시간(hhmmss)
			$this->m_nmvacct = $resultString['P_VACT_NAME'];                            // 계좌주명
			$this->m_vcdbank = $resultString['P_VACT_BANK_CODE'];                       // 은행코드
	*/

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html> 
<head> 
<title>INIpay Mobile WEB example</title> 
<meta http-equiv="Expires" content="0"/> 
<meta name="Author" content="yw0399"/> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
		 <style type="text/css">
            body { background-color: #ffffff;}
            body, tr, td {font-size:11pt; font-family:굴림,verdana; color:#ffffff; line-height:19px;}
            table, img {border:none}

        </style>
<head>

<body>
<?
	switch($inimx->m_payMethod)
	{   
		case(CARD):  //신용카드 안심클릭
			 
			echo("승인결과코드:".$inimx->m_resultCode."<br>");
			echo("결과메시지:".iconv("EUC-KR", "UTF-8", $inimx->m_resultMsg)."<br>");
			echo("지불수단:".$inimx->m_payMethod."<br>");
			echo("주문번호:".$inimx->m_moid."<br>");
			echo("TID:".$inimx->m_tid."<br>");
			echo("승인금액:".$inimx->m_resultprice."<br>");
			echo("승인일:".$inimx->m_pgAuthDate."<br>");
			echo("승인시각:".$inimx->m_pgAuthTime."<br>");
			echo("상점ID:".$inimx->m_mid."<br>");
			echo("구매자명:".$inimx->m_buyerName."<br>");
			echo("P_NOTI:".$inimx->m_noti."<br>");
			echo("NEXT_URL:".$inimx->m_nextUrl."<br>");
			echo("NOTI_URL:".$inimx->m_notiUrl."<br>");
			echo("승인번호:".$inimx->m_authCode."<br>");
			echo("할부개월:".$inimx->m_cardQuota."<br>");
			echo("카드코드:".$inimx->m_cardCode."<br>");
			echo("발급사코드:".$inimx->m_cardIssuerCode."<br>");
			echo("카드번호:".$inimx->m_cardNumber."<br>");
			echo("가맹점번호:".$inimx->m_cardMember."<br>");
			echo("매입사코드:".$inimx->m_cardpurchase."<br>");
			echo("부분취소가능여부(0:불가, 1:가능):".$inimx->m_prtc."<br>");
			

			if($inimx->m_resultCode=="00"){	// 홀딩중 07/14 개발진행
				
				//////////////20180604 make Jeejin////////////////////////ST
				$ipkum_date = date("Y-m-d H:i:s");
				$TID = $inimx->m_tid ;					
				$OID = $inimx->m_moid;
				$arrOID = explode("_",$OID);
				$arrorderNum = explode("T",$arrOID[1]);
				$idx = $arrorderNum[1];
				$pay_type = $inimx->m_payMethod;
				
				$dblink = SetConn($_conf_db["main_db"]);
						
				$arrInfo = getArticleInfo("tbl_consulting", $idx);

				$tbl = "tbl_consulting";

				$sql = "UPDATE ".$tbl." SET 
					tid = '".$TID."',
					pay_method = 'card',
					status = '4',
					pay_date = now(),
					comp_date = now(),
					upt_date = now(),
					upt_user_id = '".$arrInfo["list"][0]["user_id"]."',
					upt_ip = '".$_SERVER["REMOTE_ADDR"]."'
					WHERE idx = ".$idx."
				";
				//echo $sql;
				$rsf = mysqli_query($GLOBALS['dblink'], $sql);

				//------------------------------------------------------------------------- 포인트 획득 및 감소 처리 -----------------------------------------------------------------------//ST
						
				if((int)($arrInfo["list"][0]["pay_point"]) > 0){
					// 포인트 사용한 만큼 감소
					$memInfo = getArticleList("tbl_member", 0, 0, " where user_id = '".$arrInfo["list"][0]["user_id"]."'");
					$nowPoint = (int)$memInfo["list"][0]["etc_2"] - (int)$arrInfo["list"][0]["pay_point"];
					$tbl = "tbl_member";

					$sql = "UPDATE ".$tbl." SET 
						etc_2 = '".$nowPoint."'
						WHERE user_id = '".$arrInfo["list"][0]["user_id"]."'
					";
					//echo $sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $sql);

					//------------------------------------------------------------------------- 로그 저장 처리 -----------------------------------------------------------------------//ST

					$tbl = "tbl_member_point_log";

					$sql = "SELECT max(order_idx) as max_order_idx FROM $tbl WHERE 1=1 ";
					//echo $sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $sql);

					$total = mysqli_affected_rows($GLOBALS['dblink']);
					for($i=0; $i < $total; $i++){
						$list['list'][$i] = mysqli_fetch_assoc($rsf);
					}
					$order_idx = $list['list'][0]["max_order_idx"]+1;

					$sql = "INSERT ".$tbl." set
						user_id = '".$arrInfo["list"][0]["user_id"]."',
						order_idx = ".$order_idx.",
						pay_method = 'point',
						reci_message = '보수 결제로인한 포인트 감소',
						price = '-".$arrInfo["list"][0]["pay_point"]."',
						reg_user_id = '".$arrInfo["list"][0]["user_id"]."',
						reg_ip = '".$_SERVER["REMOTE_ADDR"]."',
						reg_date = now()
					";
					//echo $sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $sql);
					//------------------------------------------------------------------------- 로그 저장 처리 -----------------------------------------------------------------------//ED
					$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] = $arrInfo["list"][0]["user_id"];
				}
				if((int)$arrInfo["list"][0]["save_point"] > 0){
					// 실 결제 금액에서 5% 적립
					$memInfo = getArticleList("tbl_member", 0, 0, " where user_id = '".$arrInfo["list"][0]["user_id"]."'");
					$nowPoint = (int)$memInfo["list"][0]["etc_2"] + (int)$arrInfo["list"][0]["save_point"];

					//var_dump($memInfo);

					$tbl = "tbl_member";

					$sql = "UPDATE ".$tbl." SET 
						etc_2 = '".$nowPoint."'
						WHERE user_id = '".$arrInfo["list"][0]["user_id"]."'
					";
					//echo $sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $sql);

					//------------------------------------------------------------------------- 로그 저장 처리 -----------------------------------------------------------------------//ST

					$tbl = "tbl_member_point_log";

					$sql = "SELECT max(order_idx) as max_order_idx FROM $tbl WHERE 1=1 ";
					//echo $sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $sql);

					$total = mysqli_affected_rows($GLOBALS['dblink']);
					for($i=0; $i < $total; $i++){
						$list['list'][$i] = mysqli_fetch_assoc($rsf);
					}
					$order_idx = $list['list'][0]["max_order_idx"]+1;

					$sql = "INSERT ".$tbl." set
						user_id = '".$arrInfo["list"][0]["user_id"]."',
						order_idx = ".$order_idx.",
						pay_method = 'point',
						reci_message = '보수 결제로인한 포인트 추가',
						price = '".$arrInfo["list"][0]["save_point"]."',
						reg_user_id = '".$arrInfo["list"][0]["user_id"]."',
						reg_ip = '".$_SERVER["REMOTE_ADDR"]."',
						reg_date = now()
					";
					//echo $sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $sql);
					//------------------------------------------------------------------------- 로그 저장 처리 -----------------------------------------------------------------------//ED
					$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] = $arrInfo["list"][0]["user_id"];
				}
				//------------------------------------------------------------------------- 포인트 획득 및 감소 처리 -----------------------------------------------------------------------//ED
				SetDisConn($dblink);
				?>
				<script>
					location.href = "/sub/tax_result.php?idx=<?=$idx?>";
				</script>
				<?
	//			//////////////20180604 make Jeejin////////////////////////ED 
			}else{
				$OID = $inimx->m_moid;
				$arrOID = explode("_",$OID);
				$arrorderNum = explode("T",$arrOID[1]);
				$idx = $arrorderNum[1];
				$pay_type = $inimx->m_payMethod;
				
				$dblink = SetConn($_conf_db["main_db"]);
						
				$tbl = "tbl_consulting";

				$sql = "UPDATE ".$tbl." SET 
					etc01 = '오류코드 : ".$inimx->m_resultCode." / 결과 메세지 : ".iconv("EUC-KR", "UTF-8", $inimx->m_resultMsg)."',
					pay_date = now(),
					comp_date = now(),
					upt_date = now(),
					upt_user_id = '".$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]."',
					upt_ip = '".$_SERVER["REMOTE_ADDR"]."'
					WHERE idx = ".$idx."
				";
				//echo $sql;
				$rsf = mysqli_query($GLOBALS['dblink'], $sql);
				SetDisConn($dblink);

			?>
				<script>
					alert("오류입니다. 자세한 사항은 관리자에게 문의 해주시길 바랍니다.");
					location.href = "/";
				</script>
			<?
			}
  		break;
  		
  		case(MOBILE):  //휴대폰결제	
			echo("승인결과코드:".$inimx->m_resultCode."<br>");
			echo("결과메시지:".$inimx->m_resultMsg."<br>");
			echo("지불수단:".$inimx->m_payMethod."<br>");
			echo("주문번호:".$inimx->m_moid."<br>");
			echo("TID:".$inimx->m_tid."<br>");
			echo("승인금액:".$inimx->m_resultprice."<br>");
			echo("승인일:".$inimx->m_pgAuthDate."<br>");
			echo("승인시각:".$inimx->m_pgAuthTime."<br>");
			echo("상점ID:".$inimx->m_mid."<br>");
			echo("구매자명:".$inimx->m_buyerName."<br>");
			echo("P_NOTI:".$inimx->m_noti."<br>");
			echo("NEXT_URL:".$inimx->m_nextUrl."<br>");
			echo("NOTI_URL:".$inimx->m_notiUrl."<br>");
			echo("통신사:".$inimx->m_codegw."<br>");  		
  		break;
  		
  		case(VBANK):  //가상계좌
			/*
			echo("승인결과코드:".$inimx->m_resultCode."<br>");
			echo("결과메시지:".$inimx->m_resultMsg."<br>");
			echo("지불수단:".$inimx->m_payMethod."<br>");
			echo("주문번호:".$inimx->m_moid."<br>");
			echo("TID:".$inimx->m_tid."<br>");
			echo("승인금액:".$inimx->m_resultprice."<br>");
			echo("요청일:".$inimx->m_pgAuthDate."<br>");
			echo("요청시각:".$inimx->m_pgAuthTime."<br>");
			echo("상점ID:".$inimx->m_mid."<br>");
			echo("구매자명:".$inimx->m_buyerName."<br>");
			echo("P_NOTI:".$inimx->m_noti."<br>");
			echo("NEXT_URL:".$inimx->m_nextUrl."<br>");
			echo("NOTI_URL:".$inimx->m_notiUrl."<br>");
			echo("가상계좌번호:".$inimx->m_vacct."<br>");
			echo("입금예정일:".$inimx->m_dtinput."<br>");
			echo("입금예정시각:".$inimx->m_tminput."<br>");
			echo("예금주:".$inimx->m_nmvacct."<br>");
			echo("은행코드:".$inimx->m_vcdbank."<br>");
			*/

			if($inimx->m_resultCode=="00"){	// 홀딩중 07/14 개발진행
				//////////////20180604 make Jeejin////////////////////////ST
				$ipkum_date = date("Y-m-d H:i:s");
				$TID = $inimx->m_tid ;					
				$OID = $inimx->m_moid;
				$pay_type = $inimx->m_payMethod;
				
//				$dblink = SetConn($_conf_db["main_db"]);
//					//$sql = "update tbl_shop_order_info set order_state='1',ipkum_date='$ipkum_date', tid='".$TID."', pay_type='".$pay_type."' where order_no='".$OID."'";
//					$sql = "update tbl_shop_order_info set order_state='1',ipkum_date='$ipkum_date', tid='".$TID."', pay_type='cash', bank_type='".$inimx->m_vacct."'
//											, bank_name='".bankNameFN($inimx->m_vcdbank)." / 비오토피아'
//											, bank_date='".$inimx->m_dtinput."'
//										where order_no='".$OID."'";
//					$rs = mysql_query($sql);						
//					SetDisConn($dblink);
//					echo "<tr><th class='td01'><p>".$sql."</p></th></tr>";
				?>
				<script>
//					onload = function winClose() {			
//						document.location.href="/reserve/complete_thanks.php?order_no=<?=$OID?>";
//					}
				</script>
				<?
				//////////////20180604 make Jeejin////////////////////////ED
			}  
  		break;
  		
  		default: //문화상품권,해피머니
  
       echo("승인결과코드:".$inimx->m_resultCode."<br>");
  		 echo("결과메시지:".$inimx->m_resultMsg."<br>");
  		 echo("지불수단:".$inimx->m_payMethod."<br>");
  		 echo("주문번호:".$inimx->m_moid."<br>");
  		 echo("TID:".$inimx->m_tid."<br>");
  		 echo("승인금액:".$inimx->m_resultprice."<br>");
  		 echo("승인일:".$inimx->m_pgAuthDate."<br>");
  		 echo("승인시각:".$inimx->m_pgAuthTime."<br>");
  		 echo("상점ID:".$inimx->m_mid."<br>");
  		 echo("구매자명:".$inimx->m_buyerName."<br>");
  		 echo("P_NOTI:".$inimx->m_noti."<br>");
  		 echo("NEXT_URL:".$inimx->m_nextUrl."<br>");
  		 echo("NOTI_URL:".$inimx->m_notiUrl."<br>");
  	  }
	
	}
	else                      // 모바일 인증 실패
	{
	  echo("인증결과코드:".$inimx->status);
	  echo("<br>");
	  echo("인증결과메시지:".$inimx->rmesg1);
	}
	  
  
?>

</body>
</html>
