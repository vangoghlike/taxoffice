<?
include $_SERVER['DOCUMENT_ROOT'] . "/module/mail/class.http.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/mail/Services_JSON.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/mail/class.EmmaSMS.php";

//정보 수정하기
function setMailConfig($code){
	//메일정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["mail_config"];

	if(mysql_escape_string($_POST[is_use])=="Y"){
		$is_use = "Y";
	}else{
		$is_use = "N";
	}
	if(mysql_escape_string($_POST[is_use_m])=="Y"){
		$is_use_m = "Y";
	}else{
		$is_use_m = "N";
	}

	//상품정보 테이블에 입력
	$sql = "UPDATE ".$tbl." set 
		code_subject='".mysql_escape_string($_POST[code_subject])."',
		is_use='".$is_use."',
		subject='".mysql_escape_string($_POST[subject])."',
		is_use_m='".$is_use_m."',
		m_subject='".mysql_escape_string($_POST[m_subject])."',
		contents='".mysql_escape_string($_POST[contents])."'
		WHERE code = '".$code."'
	";

	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($rs > 0){
		return true;
	}else{
		return false;
	}
}

//메일등록
function insertSend($code){
	//메일정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["mail_config"];

	if(mysql_escape_string($_POST[is_use])=="Y"){
		$is_use = "Y";
	}else{
		$is_use = "N";
	}
	if(mysql_escape_string($_POST[is_use_m])=="Y"){
		$is_use_m = "Y";
	}else{
		$is_use_m = "N";
	}

	//상품정보 테이블에 입력
	$sql = "INSERT INTO ".$tbl." set 
		code = '".$code."',
		is_use='".$is_use."',
		is_use_m='".$is_use_m."'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($rs > 0){
		return true;
	}else{
		return false;
	}
}


//정보 삭제하기
function deleteMail($code){
	$tbl = $GLOBALS["_conf_tbl"]["mail_config"];

	$sql = "DELETE FROM $tbl WHERE code='$code' ";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($rs > 0){
		return true;
	}else{
		return false;
	}

}

//정보 가져오기
function getMailConfig($code){
	$tbl = $GLOBALS["_conf_tbl"]["mail_config"];

    $sql  = "SELECT * ";
    $sql .= "FROM " .$tbl." ";
    $sql .= "WHERE code = '$code' ";

    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $total_rs = mysql_num_rows($rs);
    
    if($total_rs > 0){
        $list['total'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }
    return $list;
}

//상품권 메일
function sendMailGiftcard($arrInfo, $arrMailInfo){
	//$arrSendGiftCard = getGiftcardSendMgf($arrInfo["list"][0]["idx"]);

	$mobile = $_POST[mobile_1]."-".$_POST[mobile_2]."-".$_POST[mobile_3];
	$email = $_POST[email_id]."@".$_POST[email_domain];

	if($arrMailInfo["list"][0]["is_use_m"]=="Y" && ($_POST["mail_sms"]=="MS" || $_POST["mail_sms"]=="S") ){
		
		$sms_Contents = stripslashes($arrMailInfo["list"][0]["m_subject"]);
		$sms_Contents = str_replace("{ORDERNAME}", $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["NAME"], $sms_Contents);
		$sms_Contents = str_replace("{SERIAL}", $_POST["giftcard_no"], $sms_Contents);
		
        $sms_to = $mobile;
        $sms_from = "031-216-6512";
        $sms_date = "";
        $sms_msg = $sms_Contents;
        $sms_type = "L";    // 설정 하지 않는다면 80byte 넘는 메시지는 쪼개져서 sms로 발송, L 로 설정하면 80byte 넘으면 자동으로 lms 변환

        $sms = new EmmaSMS();
        $sms->login("bobsnu", "qkqtmsn1!");
        $ret = $sms->send($sms_to, $sms_from, $sms_msg, $sms_date, $sms_type);
	}

	if($arrMailInfo["list"][0]["is_use"]=="Y" && ($_POST["mail_sms"]=="MS" || $_POST["mail_sms"]=="M") ){
		
		$arrBoardList = getGoodListBaseNFile("103", " A.sort_num DESC, A.idx DESC ", "", "", 0, 0,"Y");
		if($arrBoardList['list']['total'] > 0):
		for ($i=0;$i<$arrBoardList['list']['total'];$i++) {
			$imgsrc[$arrBoardList['list'][$i]['price']] = "/uploaded/shop_good/".$arrBoardList['list'][$i]['idx']."/".$arrBoardList['list'][$i]['image_l'];
		} endif;
		
		//변수치환
		$Mail_Subject = stripslashes($arrMailInfo["list"][0]["subject"]);
		$Mail_Subject = str_replace("{ORDERNAME}", $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["NAME"], $Mail_Subject);
		$Mail_Subject = str_replace("{SHIPNAME}", $_POST[send_name], $Mail_Subject);
		
		$Mail_Contents = stripslashes($arrMailInfo["list"][0]["contents"]);
		$Mail_Contents = str_replace("{SERIAL}", $_POST["giftcard_no"], $Mail_Contents);
		$Mail_Contents = str_replace("{ORDERNAME}", $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["NAME"], $Mail_Contents);
		$Mail_Contents = str_replace("{SHIPNAME}", $_POST[send_name], $Mail_Contents);
		$Mail_Contents = str_replace("{MOBILE}", $mobile, $Mail_Contents);
		$Mail_Contents = str_replace("{IMG}", "http://frienpi.co.kr".$imgsrc[$_POST["price"]], $Mail_Contents);
		$Mail_Contents = str_replace("{COMMENT}", nl2br(stripslashes($_POST["memo"])), $Mail_Contents);
		
		sendMail($GLOBALS["_SITE"]["EMAIL"], $GLOBALS["_SITE"]["NAME"], $email, $_POST[send_name], $Mail_Subject , $Mail_Contents);
	}
}

//주문관련 메일
function sendMailShopInfo($arrInfo, $arrMailInfo){
	if($arrMailInfo["list"][0]["is_use_m"]=="Y"){
			
		
		$sms_Contents = stripslashes($arrMailInfo["list"][0]["m_subject"]);
		$sms_Contents = str_replace("{NAME}", $arrInfo["list"][0]["order_name"], $sms_Contents);


        $sms_to = $arrInfo["list"][0]["ship_phone"];
        $sms_from = "031-216-6512";
        $sms_date = "";
        $sms_msg = $sms_Contents;
        $sms_type = "L";    // 설정 하지 않는다면 80byte 넘는 메시지는 쪼개져서 sms로 발송, L 로 설정하면 80byte 넘으면 자동으로 lms 변환

        $sms = new EmmaSMS();
        $sms->login("bobsnu", "qkqtmsn1!");
        $ret = $sms->send($sms_to, $sms_from, $sms_msg, $sms_date, $sms_type);
	}

	if($arrMailInfo["list"][0]["is_use"]=="Y"){
		//변수치환
		$Mail_Subject = str_replace("{NAME}", $arrInfo["list"][0][order_name], stripslashes($arrMailInfo["list"][0]["subject"]));
		$Mail_Contents = stripslashes($arrMailInfo["list"][0]["contents"]);
		$Mail_Contents = str_replace("{ID}", $arrInfo["list"][0]["order_id"], $Mail_Contents);
		$Mail_Contents = str_replace("{NAME}", $arrInfo["list"][0]["order_name"], $Mail_Contents);
		$Mail_Contents = str_replace("{EMAIL}", stripslashes($arrInfo["list"][0]["order_email"]), $Mail_Contents);
		$Mail_Contents = str_replace("{ORDERZIP}", $arrInfo["list"][0]["order_zip"], $Mail_Contents);
		$Mail_Contents = str_replace("{ORDERADDRESS}", $arrInfo["list"][0]["order_address"], $Mail_Contents);
		$Mail_Contents = str_replace("{ORDERADDRESSEXT}", $arrInfo["list"][0]["order_address_ext"], $Mail_Contents);
		$Mail_Contents = str_replace("{ORDERPHONE}", $arrInfo["list"][0]["order_phone"], $Mail_Contents);
		$Mail_Contents = str_replace("{ORDERNO}", $arrInfo["list"][0]["order_no"], $Mail_Contents);
		$Mail_Contents = str_replace("{ORDERDATE}", $arrInfo["list"][0]["order_date"], $Mail_Contents);
		$Mail_Contents = str_replace("{CLAIMDATE}", $arrInfo["list"][0]["claim_date"], $Mail_Contents);
		$Mail_Contents = str_replace("{SUMMARY}", $arrInfo["list"][0]["order_summary"], $Mail_Contents);
		$Mail_Contents = str_replace("{PAYTYPE}", $GLOBALS["_SITE"]["SHOP"]["PAY_TYPE"][$arrInfo["list"][0]["pay_type"]], $Mail_Contents);
		$Mail_Contents = str_replace("{BANKTYPE}", $arrInfo["list"][0]["bank_type"], $Mail_Contents);
		$Mail_Contents = str_replace("{TOTAL}", number_format($arrInfo["list"][0]["total_amount"]), $Mail_Contents);
		$Mail_Contents = str_replace("{SHIPPRICE}", number_format($arrInfo["list"][0]["ship_amount"]), $Mail_Contents);
		$Mail_Contents = str_replace("{PAYTOTAL}", number_format($arrInfo["list"][0]["pay_amount"]), $Mail_Contents);
		$Mail_Contents = str_replace("{SHIPCOMPANY}", $arrInfo["list"][0]["shipping_company"], $Mail_Contents);
		$Mail_Contents = str_replace("{SHIPNUMBER}", $arrInfo["list"][0]["shipping_no"], $Mail_Contents);
		$Mail_Contents = str_replace("{SHIPNAME}", $arrInfo["list"][0]["ship_name"], $Mail_Contents);
		$Mail_Contents = str_replace("{SHIPZIP}", $arrInfo["list"][0]["ship_zip"], $Mail_Contents);
		$Mail_Contents = str_replace("{SHIPADDRESS}", $arrInfo["list"][0]["ship_address"], $Mail_Contents);
		$Mail_Contents = str_replace("{SHIPADDRESSEXT}", $arrInfo["list"][0]["ship_address_ext"], $Mail_Contents);
		$Mail_Contents = str_replace("{SHIPPHONE}", $arrInfo["list"][0]["ship_phone"], $Mail_Contents);
		$Mail_Contents = str_replace("{SHIPMOBILE}", $arrInfo["list"][0]["ship_mobile"], $Mail_Contents);
		$Mail_Contents = str_replace("{COMMENT}", stripslashes($arrInfo["list"][0]["order_comment"]), $Mail_Contents);
		
		sendMail($GLOBALS["_SITE"]["EMAIL"], $GLOBALS["_SITE"]["NAME"], $arrInfo["list"][0][order_email], $arrInfo["list"][0]["order_name"], $Mail_Subject , $Mail_Contents);
	}

	return true;
}

//회원가입, 비번찾기, 탈퇴시 메일링
function sendMailMemberInfo($arrInfo, $arrMailInfo){
	if($arrMailInfo["list"][0]["is_use_m"]=="Y"){
		$sms_Contents = stripslashes($arrMailInfo["list"][0]["m_subject"]);
		$sms_Contents = str_replace("{ID}", $arrInfo["list"][0]["user_id"], $sms_Contents);
		$sms_Contents = str_replace("{PASSWD}", $arrInfo["list"][0]["user_pw"], $sms_Contents);
		$sms_Contents = str_replace("{NAME}", $arrInfo["list"][0]["user_name"], $sms_Contents);

		
        $sms_to = $arrInfo["list"][0]["mobile"];
        $sms_from = "031-216-6512";
        $sms_date = "";
        $sms_msg = $sms_Contents;
        $sms_type = "L";    // 설정 하지 않는다면 80byte 넘는 메시지는 쪼개져서 sms로 발송, L 로 설정하면 80byte 넘으면 자동으로 lms 변환

        $sms = new EmmaSMS();
        $sms->login("bobsnu", "qkqtmsn1!");
        $ret = $sms->send($sms_to, $sms_from, $sms_msg, $sms_date, $sms_type);

		//print_r($ret);
	}

	if($arrMailInfo["list"][0]["is_use"]=="Y"){
		
		$lastlogin = substr($arrInfo["list"][0]["login_last"],0,10);
		$changedate = date("Y-m-d", strtotime('+1 month'));

		//변수치환
		$Mail_Subject = str_replace("{NAME}", $arrInfo["list"][0][user_name], stripslashes($arrMailInfo["list"][0]["subject"]));
		$Mail_Contents = stripslashes($arrMailInfo["list"][0]["contents"]);
		$Mail_Contents = str_replace("{ID}", $arrInfo["list"][0]["user_id"], $Mail_Contents);
		$Mail_Contents = str_replace("{PASSWD}", $arrInfo["list"][0]["user_pw"], $Mail_Contents);
		$Mail_Contents = str_replace("{NAME}", $arrInfo["list"][0]["user_name"], $Mail_Contents);
		$Mail_Contents = str_replace("{EMAIL}", stripslashes($arrInfo["list"][0]["user_id"]), $Mail_Contents);
		$Mail_Contents = str_replace("{ZIP}", $arrInfo["list"][0]["zip"], $Mail_Contents);
		$Mail_Contents = str_replace("{ADDRESS}", $arrInfo["list"][0]["address"], $Mail_Contents);
		$Mail_Contents = str_replace("{ADDRESSEXT}", $arrInfo["list"][0]["address_ext"], $Mail_Contents);
		$Mail_Contents = str_replace("{BANKTYPE}", $arrInfo["list"][0]["bank_type"], $Mail_Contents);
		$Mail_Contents = str_replace("{PAYTOTAL}", number_format($arrInfo["list"][0]["pay_amount"]), $Mail_Contents);
		$Mail_Contents = str_replace("{LOGINDATE}", str_replace("-",".",$lastlogin), $Mail_Contents);
		$Mail_Contents = str_replace("{CHANGEDATE}", str_replace("-",".",$changedate), $Mail_Contents);
		$Mail_Contents = str_replace("{WDATE}", stripslashes($arrInfo["list"][0]["wdate"]), $Mail_Contents);
		$Mail_Contents = str_replace("{NDATE}", date("Y-m-d"), $Mail_Contents);

		sendMail($GLOBALS["_SITE"]["EMAIL"], $GLOBALS["_SITE"]["NAME"], $arrInfo["list"][0]["user_id"], $arrInfo["list"][0]["user_name"], $Mail_Subject , $Mail_Contents);
	}

	return true;
}

//문의/답변  메일발송
function sendMailAsk($type,$arrInfo){
		
	$mail_body = '';

	if (file_exists($_SERVER[DOCUMENT_ROOT]."/_mailform/".$type.".html")) {
		$fo = fopen($_SERVER[DOCUMENT_ROOT]."/_mailform/".$type.".html", "r");
		while (!feof($fo)) $mail_body .= fgets($fo, 1024);
		fclose($fo);
	}		

	$mailTo			= "jeejin1122@naver.com";	//받는분 이메일
		
	$Mail_Subject	= "[모모] ".$arrInfo["list"][0]["name"]."님의 1:1 상담요청이 등록 되었습니다.";
	$toName			= $arrInfo["list"][0]["name"];
	$fromName		= "모모";
	$mailFrom		= "no-reply@".$_SERVER['SERVER_NAME'];
	
	$mail_body = str_replace("<!--[@PAGETITLE]-->", "", $mail_body);						//타이틀
	$mail_body = str_replace("<!--[@ctx01]-->", $arrInfo["list"][0]["name"], $mail_body);								//문의구분
	$mail_body = str_replace("<!--[@ctx02]-->", $arrInfo["list"][0]["tel"], $mail_body);							//질문내용
	$mail_body = str_replace("<!--[@ctx03]-->", $arrInfo["list"][0]["contents"], $mail_body);								//답변내용	
	$mail_body = str_replace("<!--[@ctx04]-->", $arrInfo["list"][0]["sdate"]." ".$arrInfo["list"][0]["stime"], $mail_body);								//답변내용	
	$mail_body = str_replace("momopg.hk-test.co.kr", $_SERVER['SERVER_NAME'], $mail_body);				//사이트주소변경

	sendMail($mailFrom,$fromName, $mailTo, $toName, $Mail_Subject, $mail_body);	

	return true;
}

function sendMailSetForm($type){
	//var_dump($_REQUEST);
	$mail_body = '';

	if (file_exists($_SERVER[DOCUMENT_ROOT]."/_mailform/".$type.".html")) {
		$fo = fopen($_SERVER[DOCUMENT_ROOT]."/_mailform/".$type.".html", "r");
		while (!feof($fo)) $mail_body .= fgets($fo, 1024);
		fclose($fo);
	}		

	$mailTo			= $_REQUEST["email"];	//받는분 이메일
		
	$Mail_Subject	= $_REQUEST["mail_subject"];
	$toName			= $_REQUEST["user_name"];
	$fromName		= "세림세무법인";
	$mailFrom		= "no-reply@".$_SERVER['SERVER_NAME'];
	
	if($_REQUEST["user_name"] != ""){
		$mail_body = str_replace("<!--[@NAME]-->", $_REQUEST["user_name"], $mail_body);
	}else{ // 업무의뢰에서 사용
		$mail_body = str_replace("<!--[@NAME]-->", $_REQUEST["name"], $mail_body);
	}
	$mail_body = str_replace("<!--[@PHONE]-->", $_REQUEST["phone"], $mail_body);								
	$mail_body = str_replace("<!--[@MAIL]-->", $_REQUEST["email"], $mail_body);
	$mail_body = str_replace("<!--[@EMAIL]-->", $_REQUEST["email"], $mail_body); // 업무의뢰에서 사용
	//$mail_body = str_replace("<!--[@METHOD]-->", $_REQUEST["name"], $mail_body);								
	$mail_body = str_replace("<!--[@GOODS_NAME]-->", $_REQUEST["goods_name"], $mail_body);
	if($_REQUEST["category_name"] != ""){
		$mail_body = str_replace("<!--[@CATEGORY_NAME]-->", $_REQUEST["category_name"], $mail_body);
	}else{ // 업무의뢰에서 사용
		$mail_body = str_replace("<!--[@BOARD_NAME]-->", $_REQUEST["category"], $mail_body);
		$mail_body = str_replace("<!--[@CATEGORY_TITLE]-->", $_REQUEST["category"], $mail_body);
	}
	$mail_body = str_replace("<!--[@SUBJECT]-->", $_REQUEST["subject"], $mail_body); // 업무의뢰에서 사용
	$mail_body = str_replace("<!--[@MNGR_NAME]-->", $_REQUEST["mngr_name"], $mail_body);				
	$mail_body = str_replace("<!--[@CONTENTS]-->", $_REQUEST["contents"], $mail_body);				
	$mail_body = str_replace("<!--[@SENDMAIL_URL]-->", 'http://'.$_SERVER['SERVER_NAME'], $mail_body);
	
	//echo $mail_body;

	sendMail($mailFrom,$fromName, $mailTo, $toName, $Mail_Subject, $mail_body);	

	return true;
}

function sendMailSetFormHanMngr($type){
    //var_dump($_REQUEST);
    $mail_body = '';

    if (file_exists($_SERVER[DOCUMENT_ROOT]."/_mailform/".$type.".html")) {
        $fo = fopen($_SERVER[DOCUMENT_ROOT]."/_mailform/".$type.".html", "r");
        while (!feof($fo)) $mail_body .= fgets($fo, 1024);
        fclose($fo);
    }

    $mailTo			= $_REQUEST["kl_email_manager"];	//받는분 이메일

    $Mail_Subject	= $_REQUEST["mail_subject"];
    $toName			= $_REQUEST["user_name"];
    $fromName		= "세림세무법인";
    $mailFrom		= "no-reply@".$_SERVER['SERVER_NAME'];
    
    $_sh_url = 'http://www.taxoffice.co.kr/sub/index.php?cat_no=21&boardid=hanpage&mode=view&idx='.$_REQUEST["idx"].'&sk=&sw=&offset=&category=%EC%A7%88%EB%AC%B8%ED%95%A8';

    if($_REQUEST["user_name"] != ""){
        $mail_body = str_replace("<!--[@NAME]-->", $_REQUEST["user_name"], $mail_body);
    }else{ // 업무의뢰에서 사용
        $mail_body = str_replace("<!--[@NAME]-->", $_REQUEST["name"], $mail_body);
    }
    $mail_body = str_replace("<!--[@PHONE]-->", $_REQUEST["phone"], $mail_body);
    $mail_body = str_replace("<!--[@MAIL]-->", $_REQUEST["email"], $mail_body);
    $mail_body = str_replace("<!--[@EMAIL]-->", $_REQUEST["email"], $mail_body); // 업무의뢰에서 사용
    $mail_body = str_replace("<!--[@KL_EMAIL_MANAGER]-->", $_REQUEST["kl_email_manager"], $mail_body); // 업무의뢰에서 사용
    //$mail_body = str_replace("<!--[@METHOD]-->", $_REQUEST["name"], $mail_body);
    $mail_body = str_replace("<!--[@GOODS_NAME]-->", $_REQUEST["goods_name"], $mail_body);
    if($_REQUEST["category_name"] != ""){
        $mail_body = str_replace("<!--[@CATEGORY_NAME]-->", $_REQUEST["category_name"], $mail_body);
    }else{ // 업무의뢰에서 사용
        $mail_body = str_replace("<!--[@BOARD_NAME]-->", $_REQUEST["category"], $mail_body);
        $mail_body = str_replace("<!--[@CATEGORY_TITLE]-->", $_REQUEST["category"], $mail_body);
    }
    $mail_body = str_replace("<!--[@SUBJECT]-->", $_REQUEST["subject"], $mail_body); // 업무의뢰에서 사용
    $mail_body = str_replace("<!--[@MNGR_NAME]-->", $_REQUEST["mngr_name"], $mail_body);
    $mail_body = str_replace("<!--[@CONTENTS]-->", $_REQUEST["contents"], $mail_body);
    $mail_body = str_replace("<!--[@SENDMAIL_URL]-->", 'http://'.$_SERVER['SERVER_NAME'], $mail_body);
    $mail_body = str_replace("<!--[@SH_URL]-->", $_sh_url, $mail_body);

    //echo $mail_body;

    sendMail($mailFrom,$fromName, $mailTo, $toName, $Mail_Subject, $mail_body);

    return true;
}
function sendMailSetFormHanUser($type){
    //var_dump($_REQUEST);
    $mail_body = '';

    if (file_exists($_SERVER[DOCUMENT_ROOT]."/_mailform/".$type.".html")) {
        $fo = fopen($_SERVER[DOCUMENT_ROOT]."/_mailform/".$type.".html", "r");
        while (!feof($fo)) $mail_body .= fgets($fo, 1024);
        fclose($fo);
    }

    $mailTo			= $_REQUEST["email"];	//받는분 이메일

    $Mail_Subject	= $_REQUEST["mail_subject"];
    $toName			= $_REQUEST["user_name"];
    $fromName		= "세림세무법인";
    $mailFrom		= "no-reply@".$_SERVER['SERVER_NAME'];

    $_sh_url = 'http://www.taxoffice.co.kr/sub/index.php?cat_no=21&boardid=hanpage&mode=view&idx='.$_REQUEST["idx"];

    if($_REQUEST["user_name"] != ""){
        $mail_body = str_replace("<!--[@NAME]-->", $_REQUEST["user_name"], $mail_body);
    }else{ // 업무의뢰에서 사용
        $mail_body = str_replace("<!--[@NAME]-->", $_REQUEST["name"], $mail_body);
    }
    $mail_body = str_replace("<!--[@PHONE]-->", $_REQUEST["phone"], $mail_body);
    $mail_body = str_replace("<!--[@MAIL]-->", $_REQUEST["email"], $mail_body);
    $mail_body = str_replace("<!--[@EMAIL]-->", $_REQUEST["email"], $mail_body); // 업무의뢰에서 사용
    $mail_body = str_replace("<!--[@KL_EMAIL_MANAGER]-->", $_REQUEST["kl_email_manager"], $mail_body); // 업무의뢰에서 사용
    //$mail_body = str_replace("<!--[@METHOD]-->", $_REQUEST["name"], $mail_body);
    $mail_body = str_replace("<!--[@GOODS_NAME]-->", $_REQUEST["goods_name"], $mail_body);
    if($_REQUEST["category"] != ""){
        $mail_body = str_replace("<!--[@CATEGORY_TITLE]-->", $_REQUEST["category"], $mail_body);
    }
    $mail_body = str_replace("<!--[@SUBJECT]-->", $_REQUEST["subject"], $mail_body); // 업무의뢰에서 사용
    $mail_body = str_replace("<!--[@MNGR_NAME]-->", $_REQUEST["mngr_name"], $mail_body);
    $mail_body = str_replace("<!--[@CONTENTS]-->", $_REQUEST["contents"], $mail_body);
    $mail_body = str_replace("<!--[@R_CONTENTS]-->", $_REQUEST["r_contents"], $mail_body);
    $mail_body = str_replace("<!--[@SENDMAIL_URL]-->", 'http://'.$_SERVER['SERVER_NAME'], $mail_body);
    $mail_body = str_replace("<!--[@SH_URL]-->", $_sh_url, $mail_body);

    //echo $mail_body;

    sendMail($mailFrom,$fromName, $mailTo, $toName, $Mail_Subject, $mail_body);

    return true;
}


function sendMailSetFormNinfo($type,$arrInfo){
		
	$mail_body = '';

	if (file_exists($_SERVER[DOCUMENT_ROOT]."/_mailform/".$type.".html")) {
		$fo = fopen($_SERVER[DOCUMENT_ROOT]."/_mailform/".$type.".html", "r");
		while (!feof($fo)) $mail_body .= fgets($fo, 1024);
		fclose($fo);
	}		

	$mailTo			= $arrInfo["list"][0]["email"];	//받는분 이메일
		
	$Mail_Subject	= $arrInfo["list"][0]["mail_subject"];
	$toName			= $arrInfo["list"][0]["user_name"];
	$fromName		= "세림세무법인";
	$mailFrom		= "no-reply@".$_SERVER['SERVER_NAME'];
	
	$mail_body = str_replace("<!--[@NAME]-->", $arrInfo["list"][0]["user_name"], $mail_body);						
	$mail_body = str_replace("<!--[@PHONE]-->", $arrInfo["list"][0]["phone"], $mail_body);								
	$mail_body = str_replace("<!--[@MAIL]-->", $arrInfo["list"][0]["email"], $mail_body);							
	//$mail_body = str_replace("<!--[@METHOD]-->", $arrInfo["list"][0]["name"], $mail_body);								
	$mail_body = str_replace("<!--[@GOODS_NAME]-->", $arrInfo["list"][0]["goods_name"], $mail_body);								
	$mail_body = str_replace("<!--[@CATEGORY_NAME]-->", $arrInfo["list"][0]["category_name"], $mail_body);				
	$mail_body = str_replace("<!--[@MNGR_NAME]-->", $arrInfo["list"][0]["mngr_name"], $mail_body);				
	$mail_body = str_replace("<!--[@CONTENTS]-->", $arrInfo["list"][0]["contents"], $mail_body);				
	$mail_body = str_replace("<!--[@SENDMAIL_URL]-->", 'http://'.$_SERVER['SERVER_NAME'], $mail_body);

	sendMail($mailFrom,$fromName, $mailTo, $toName, $Mail_Subject, $mail_body);	

	return true;
}

function sendMailSetFormMngrNinfo($type,$arrInfo){
		
	$mail_body = '';

	if (file_exists($_SERVER[DOCUMENT_ROOT]."/_mailform/".$type.".html")) {
		$fo = fopen($_SERVER[DOCUMENT_ROOT]."/_mailform/".$type.".html", "r");
		while (!feof($fo)) $mail_body .= fgets($fo, 1024);
		fclose($fo);
	}		

	$mailTo			= $arrInfo["list"][0]["mngr_mail"];	//받는분 이메일
		
	$Mail_Subject	= $arrInfo["list"][0]["mail_subject"];
	$toName			= $arrInfo["list"][0]["mngr_name"];
	$fromName		= "세림세무법인";
	$mailFrom		= "no-reply@".$_SERVER['SERVER_NAME'];
	
	$mail_body = str_replace("<!--[@NAME]-->", $arrInfo["list"][0]["user_name"], $mail_body);						
	$mail_body = str_replace("<!--[@PHONE]-->", $arrInfo["list"][0]["phone"], $mail_body);								
	$mail_body = str_replace("<!--[@MAIL]-->", $arrInfo["list"][0]["email"], $mail_body);							
	//$mail_body = str_replace("<!--[@METHOD]-->", $arrInfo["list"][0]["name"], $mail_body);								
	$mail_body = str_replace("<!--[@GOODS_NAME]-->", $arrInfo["list"][0]["goods_name"], $mail_body);								
	$mail_body = str_replace("<!--[@CATEGORY_NAME]-->", $arrInfo["list"][0]["category_name"], $mail_body);				
	$mail_body = str_replace("<!--[@MNGR_NAME]-->", $arrInfo["list"][0]["mngr_name"], $mail_body);				
	$mail_body = str_replace("<!--[@CONTENTS]-->", $arrInfo["list"][0]["contents"], $mail_body);				
	$mail_body = str_replace("<!--[@SENDMAIL_URL]-->", 'http://'.$_SERVER['SERVER_NAME'], $mail_body);

	sendMail($mailFrom,$fromName, $mailTo, $toName, $Mail_Subject, $mail_body);	

	return true;
}

function sendMailSetFormMngr($type){
	//var_dump($_REQUEST);
	$mail_body = '';

	if (file_exists($_SERVER[DOCUMENT_ROOT]."/_mailform/".$type.".html")) {
		$fo = fopen($_SERVER[DOCUMENT_ROOT]."/_mailform/".$type.".html", "r");
		while (!feof($fo)) $mail_body .= fgets($fo, 1024);
		fclose($fo);
	}		

	if($_REQUEST["mngr_mail"] != ""){
		$mailTo			= $_REQUEST["mngr_mail"];	//받는분 이메일
	}else{ // 업무의뢰에서 사용
		$mailTo			= $_REQUEST["sendmail"];	//받는분 이메일
	}
	$Mail_Subject	= $_REQUEST["mail_subject"];
	$toName			= $_REQUEST["mngr_name"];
	$fromName		= "세림세무법인";
	$mailFrom		= "no-reply@".$_SERVER['SERVER_NAME'];
	
	if($_REQUEST["user_name"] != ""){
		$mail_body = str_replace("<!--[@NAME]-->", $_REQUEST["user_name"], $mail_body);
	}else{ // 업무의뢰에서 사용
		$mail_body = str_replace("<!--[@NAME]-->", $_REQUEST["name"], $mail_body);
	}
	$mail_body = str_replace("<!--[@PHONE]-->", $_REQUEST["phone"], $mail_body);								
	$mail_body = str_replace("<!--[@MAIL]-->", $_REQUEST["email"], $mail_body);
	$mail_body = str_replace("<!--[@EMAIL]-->", $_REQUEST["email"], $mail_body); // 업무의뢰에서 사용
	//$mail_body = str_replace("<!--[@METHOD]-->", $_REQUEST["name"], $mail_body);								
	$mail_body = str_replace("<!--[@GOODS_NAME]-->", $_REQUEST["goods_name"], $mail_body);								
	if($_REQUEST["category_name"] != ""){
		$mail_body = str_replace("<!--[@CATEGORY_NAME]-->", $_REQUEST["category_name"], $mail_body);
	}else{ // 업무의뢰에서 사용
		$mail_body = str_replace("<!--[@BOARD_NAME]-->", $_REQUEST["category"], $mail_body);
		$mail_body = str_replace("<!--[@CATEGORY_TITLE]-->", $_REQUEST["category"], $mail_body);
	}
	$mail_body = str_replace("<!--[@SUBJECT]-->", $_REQUEST["subject"], $mail_body); // 업무의뢰에서 사용
	$mail_body = str_replace("<!--[@MNGR_NAME]-->", $_REQUEST["mngr_name"], $mail_body);				
	$mail_body = str_replace("<!--[@CONTENTS]-->", $_REQUEST["contents"], $mail_body);				
	$mail_body = str_replace("<!--[@SENDMAIL_URL]-->", 'http://'.$_SERVER['SERVER_NAME'], $mail_body);

	//echo $mail_body;
	sendMail($mailFrom,$fromName, $mailTo, $toName, $Mail_Subject, $mail_body);	

	return true;
}

//임시비번 메일발송
function sendMailPasswdForm($type){
	$passwd = generatePasswd();

	$mail_body = '';

	if (file_exists($_SERVER[DOCUMENT_ROOT]."/_mailform/".$type.".html")) {
		$fo = fopen($_SERVER[DOCUMENT_ROOT]."/_mailform/".$type.".html", "r");
		while (!feof($fo)) $mail_body .= fgets($fo, 1024);
		fclose($fo);
	}		

	$mailTo			= $_REQUEST["email"];	//받는분 이메일
		
	$Mail_Subject	= $_REQUEST["mail_subject"];
	$toName			= $_REQUEST["user_name"];
	$fromName		= "세림세무법인";
	$mailFrom		= "no-reply@".$_SERVER['SERVER_NAME'];
	
	$mail_body = str_replace("<!--[@NAME]-->", $_REQUEST["user_name"], $mail_body);				
	$mail_body = str_replace("<!--[@CONTENT]-->", $passwd, $mail_body);	
	
	//임시비밀번호로 수정
	$sql = "update tbl_member set user_pw='".oldPassword($passwd)."' where user_id='".$_REQUEST["user_id"]."'";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	//echo $GLOBALS["_SITE"]["EMAIL"]."/".$GLOBALS["_SITE"]["NAME"]."/".$arrInfo["list"][0]["user_id"]."/".$arrInfo["list"][0]["user_name"];
	sendMail($GLOBALS["_SITE"]["EMAIL"], $GLOBALS["_SITE"]["NAME"], $_REQUEST["email"], $_REQUEST["user_name"], $Mail_Subject , $mail_body);

	return true;
}

//임시비번 메일발송
function sendMailPasswdInfo($arrInfo, $arrMailInfo){
	if($arrMailInfo["list"][0]["is_use"]=="Y"){
		$passwd = generatePasswd();

		//변수치환
		$Mail_Subject = str_replace("{NAME}", $arrInfo["list"][0][user_name], stripslashes($arrMailInfo["list"][0]["subject"]));
		$Mail_Contents = stripslashes($arrMailInfo["list"][0]["contents"]);
		$Mail_Contents = str_replace("{ID}", $arrInfo["list"][0]["user_id"], $Mail_Contents);
		$Mail_Contents = str_replace("{NAME}", $arrInfo["list"][0]["user_name"], $Mail_Contents);
		$Mail_Contents = str_replace("{EMAIL}", stripslashes($arrInfo["list"][0]["email"]), $Mail_Contents);
		$Mail_Contents = str_replace("{PASS}", $passwd, $Mail_Contents);
		
		//임시비밀번호로 수정
		$sql = "update tbl_member set user_pw='".$passwd."' where user_id='".$arrInfo["list"][0]["user_id"]."'";
		$rs = mysql_query($sql, $GLOBALS[dblink]);

		//echo $GLOBALS["_SITE"]["EMAIL"]."/".$GLOBALS["_SITE"]["NAME"]."/".$arrInfo["list"][0]["user_id"]."/".$arrInfo["list"][0]["user_name"];
		sendMail($GLOBALS["_SITE"]["EMAIL"], $GLOBALS["_SITE"]["NAME"], $arrInfo["list"][0]["email"], $arrInfo["list"][0]["user_name"], $Mail_Subject , $Mail_Contents);

		return true;
	}else{
		return false;
	}
}

function generatePasswd($numAlpha=8,$numNonAlpha=2)
{
   $listAlpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
   $listNonAlpha = ',;:!?.$/*-+&@_+;./*&?$-!,';
   return str_shuffle(substr(str_shuffle($listAlpha),0,$numAlpha).substr(str_shuffle($listNonAlpha),0,$numNonAlpha));
}


function sendMail($mailFrom,$fromName, $mailTo, $toName, $subject, $message) { 

	$mailTo = "=?utf-8?b?".base64_encode($toName)."?="."<" . $mailTo . ">\n"; 
	$mailFrom = "=?utf-8?b?".base64_encode($fromName)."?="."<" . $mailFrom . ">\n"; 
	$subject    = "=?utf-8?b?".base64_encode($subject)."?=\n"; 

	$mailHeader = "from:{$mailFrom} \n"; 
	$mailHeader .= "Return-Path:{$mailFrom} \n"; 
	$mailHeader .= "Reply-To:{$mailFrom} \n"; 
	$mailHeader .= "MIME-Version:1.0 \n"; 
	$mailHeader .= "Content-Type: text/html;\n \tcharset=utf8\n"; 

	$flag = mail($mailTo, $subject, $message, $mailHeader); 
	return $flag; 
} 

function oldPassword($input, $hex = true) {
	$nr    = 1345345333;
	$add   = 7;
	$nr2   = 0x12345671;
	$tmp   = null;
	$inlen = strlen($input);
	for ($i = 0; $i < $inlen; $i++) {
		$byte = substr($input, $i, 1);
		if ($byte == ' ' || $byte == "\t") {
			continue;
		}
		$tmp = ord($byte);
		$nr ^= ((($nr & 63) + $add) * $tmp) + (($nr << 8) & 0xFFFFFFFF);
		$nr2 += (($nr2 << 8) & 0xFFFFFFFF) ^ $nr;
		$add += $tmp;
	}
	$out_a  = $nr & ((1 << 31) - 1);
	$out_b  = $nr2 & ((1 << 31) - 1);
	$output = sprintf("%08x%08x", $out_a, $out_b);
	if ($hex) {
		return $output;
	}

	return hexHashToBinary($output);
}

function hexHashToBinary($hex) {
	$bin = "";
	$len = strlen($hex);
	for ($i = 0; $i < $len; $i += 2) {
		$byte_hex  = substr($hex, $i, 2);
		$byte_dec  = hexdec($byte_hex);
		$byte_char = chr($byte_dec);
		$bin .= $byte_char;
	}

	return $bin;
}
?>