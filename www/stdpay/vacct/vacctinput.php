<?php

//*******************************************************************************
// FILE NAME : mx_rnoti.php
// FILE DESCRIPTION :
// 이니시스 smart phone 결제 결과 수신 페이지 샘플
// 기술문의 : ts@inicis.com
// HISTORY 
// 2010. 02. 25 최초작성 
// 2010  06. 23 WEB 방식의 가상계좌 사용시 가상계좌 채번 결과 무시 처리 추가(APP 방식은 해당 없음!!)
// 2017. 09. 18 가산 IP 추가
// WEB 방식일 경우 이미 P_NEXT_URL 에서 채번 결과를 전달 하였으므로, 
// 이니시스에서 전달하는 가상계좌 채번 결과 내용을 무시 하시기 바랍니다.
//*******************************************************************************

  $PGIP = $_SERVER['REMOTE_ADDR'];
  
  if($PGIP == "211.219.96.165" || $PGIP == "118.129.210.25" || $PGIP == "183.109.71.153" || $PGIP == "39.115.212.9" || $PGIP == "203.238.37.15")	//PG에서 보냈는지 IP로 체크
  {

		// 이니시스 NOTI 서버에서 받은 Value
		$type_msg;		      		// 거래상태 (0200:성공, 0400:실패)
		$no_tid;				    // 거래번호
		$dt_trans;		      		// 금융기관 발생 거래 일자
		$no_oid;				    // 상점주문번호
		$cd_bank;		      		// 금융사코드1
		$cd_deal;		      		// 금융사코드2
		$nm_inputbank;			    // 금융사명 (은행명, 카드사명, 이통사명)
		$amt_input;				    // 거래금액
		$nm_input;			        // 결제고객성명
		$no_vacct;					// 카드번호	

		$type_msg		= $_REQUEST[type_msg];
		$no_tid			= $_REQUEST[no_tid];
		$dt_trans		= $_REQUEST[dt_trans];
		$no_oid			= $_REQUEST[no_oid];
		$cd_bank		= $_REQUEST[cd_bank];
		$cd_deal		= $_REQUEST[cd_deal];
		$nm_inputbank	= $_REQUEST[nm_inputbank];
		$amt_input		= $_REQUEST[amt_input];
		$nm_input		= $_REQUEST[nm_input];
		$no_vacct		= $_REQUEST[no_vacct];


		//WEB 방식의 경우 가상계좌 채번 결과 무시 처리
		//(APP 방식의 경우 해당 내용을 삭제 또는 주석 처리 하시기 바랍니다.)
		/*
		 if($P_TYPE == "VBANK")	//결제수단이 가상계좌이며
        	{
           	   if($P_STATUS != "02") //입금통보 "02" 가 아니면(가상계좌 채번 : 00 또는 01 경우)
           	   {
	              echo "OK";
        	      return;
           	   }
        	}
		*/



  		$PageCall_time = date("H:i:s");

		$value = array(
				"PageCall time" => $PageCall_time,
				"type_msg"			=> $type_msg,  
				"no_tid"			=> $no_tid, 
				"dt_trans" => $dt_trans,      
				"no_oid"     => $no_oid,  
				"cd_bank"  => $cd_bank,
				"cd_deal"  => $cd_deal,
				"nm_inputbank"   => $nm_inputbank,  
				"amt_input"     => $amt_input,  
				"nm_input"   => $nm_input,  
				"type_msg" => $type_msg
				);
 

 			// 결제처리에 관한 로그 기록
 		writeLog($value);
 
 
		/***********************************************************************************
		 ' 위에서 상점 데이터베이스에 등록 성공유무에 따라서 성공시에는 "OK"를 이니시스로 실패시는 "FAIL" 을
		 ' 리턴하셔야합니다. 아래 조건에 데이터베이스 성공시 받는 FLAG 변수를 넣으세요
		 ' (주의) OK를 리턴하지 않으시면 이니시스 지불 서버는 "OK"를 수신할때까지 계속 재전송을 시도합니다
		 ' 기타 다른 형태의 echo "" 는 하지 않으시기 바랍니다
		'***********************************************************************************/
	
		// if(데이터베이스 등록 성공 유무 조건변수 = true)
echo "OK"; //절대로 지우지 마세요
		// else
		//	 echo "FAIL";

	################################################################## OK 예약완료 ST
	if($no_oid){
		$no_oid = str_replace("biotopiamu_","",$no_oid);
		include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
		include $_SERVER[DOCUMENT_ROOT] . "/module/shop/shop.lib.php";
		include $_SERVER[DOCUMENT_ROOT] . "/module/mail/mail.lib.php";
		//DB연결
		$dblink = SetConn($_conf_db["main_db"]);
			$RS = setOrderInfoStateCh($no_oid, "6");
			if($RS==true){
				//주문자에게 메일발송			
				getOrderSmsSend($no_oid, "6");	## 문자발송			
			}
		//DB해제
		SetDisConn($dblink);
	}
	################################################################## OK 예약완료 ED

}else{
	echo "OK!!";
}	## End if

function writeLog($msg)
{
    $file = "./log/noti_input_".date("Ymd").".log";

    if(!($fp = fopen($path.$file, "a+"))) return 0;
                
    ob_start();
    print_r($msg);
    $ob_msg = ob_get_contents();
    ob_clean();
		
    if(fwrite($fp, " ".$ob_msg."\n") === FALSE)
    {
        fclose($fp);
        return 0;
    }
    fclose($fp);
    return 1;
}



?>
