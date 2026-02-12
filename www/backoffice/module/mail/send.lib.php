<?
/*********************************** 메일발송관리 *************************************/
//메일발송 등록하기
function insertSend($chk){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["send"];
	$tbl_email = $GLOBALS["_conf_tbl"]["send_email"];
	$tbl_member = $GLOBALS["_conf_tbl"]["member"];

	// 테이블에 입력
	$sql = "INSERT INTO ".$tbl." set 
		subject='".mysql_escape_string($_POST[subject])."',
		contents='".mysql_escape_string($_POST[contents])."',
		status='WAIT',
		w_date=now()
	";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$insert_idx = mysql_insert_id($GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	//회원테이블에서 메일 가져오기
	$sql = "INSERT INTO ".$tbl_email." (c_idx, name, email, chk) SELECT '$insert_idx', user_name, email, 'N' FROM ".$tbl_member." ";
	if($chk=="Y"){
		$sql .= " WHERE email_accept ='Y' ";
	}
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total2 = mysql_affected_rows($GLOBALS[dblink]);

	// 테이블에 입력
	$sql = "UPDATE ".$tbl." set 
		total='$total2'
		WHERE idx='$insert_idx'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	
	if($total > 0){
		return true;
	}else{
		return false;
	}
}



//메일발송 수정하기
function editSend($idx){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["send"];

	// 테이블에 입력
	$sql = "UPDATE ".$tbl." set 
		subject='".mysql_escape_string($_POST[subject])."',
		contents='".mysql_escape_string($_POST[contents])."'
		WHERE idx='".mysql_escape_string($_POST[idx])."'
	";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	if($rs){
		return true;
	}else{
		return false;
	}

}

//메일발송 삭제하기
function deleteSend($idx){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["send"];
	$tbl_email = $GLOBALS["_conf_tbl"]["send_email"];

	$sql = "DELETE FROM ".$tbl." 
		WHERE idx='".mysql_escape_string($_POST[idx])."'
	";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		$sql = "DELETE FROM ".$tbl_email." 
			WHERE c_idx='".mysql_escape_string($_POST[idx])."'
		";

		return true;
	}else{
		return false;
	}
}


//메일 발송목록 가져오기
function getEmailCount($c_idx){
	$tbl_email = $GLOBALS["_conf_tbl"]["send_email"];

	//보낸갯수 가져오기
    $sql = "SELECT count(*) FROM $tbl_email WHERE c_idx='$c_idx' AND chk='Y' ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $send_total = mysql_result($rs,0,0);

    $list['send_total'] = $send_total;

	//남은갯수 가져오기
    $sql = "SELECT count(*) FROM $tbl_email WHERE c_idx='$c_idx' AND chk='N' ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $remain_total = mysql_result($rs,0,0);
    $list['remain_total'] = $remain_total;

	//전체갯수 가져오기
    $sql = "SELECT count(*) FROM $tbl_email WHERE c_idx='$c_idx' ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $total = mysql_result($rs,0,0);
    $list['total'] = $total;

    return $list;
}

//메일 발송목록 가져오기
function getEmailList($c_idx, $limit){
	$tbl_email = $GLOBALS["_conf_tbl"]["send_email"];

    $sql = "SELECT * FROM $tbl_email WHERE c_idx='$c_idx' AND chk='N' limit $limit";

    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $total = mysql_num_rows($rs);


    if($total > 0){
        $list['total'] = $total;
        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }
    
    return $list;
}

//메일 발송후 업데이트
function updateEmailList($c_idx, $strIdx){
	$tbl = $GLOBALS["_conf_tbl"]["send"];
	$tbl_email = $GLOBALS["_conf_tbl"]["send_email"];

    //메일리스트에 업데이트
	$sql = "UPDATE $tbl_email set chk='Y' WHERE idx in ($strIdx)";
    $rs = mysql_query($sql, $GLOBALS[dblink]);

	//발송통수 설정
	$arrCount = explode(",",$strIdx);
	$count_send = count($arrCount);
	//메일정보에 업데이트
	$sql = "UPDATE ".$tbl." set 
		send_total = (send_total + $count_send)
		WHERE idx='".$c_idx."'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($rs){
	    return true;
	}else{
		return false;
	}
}

//메일 발송후 업데이트
function updateMailStatus($c_idx, $strStatus, $sendTotal){
	$tbl = $GLOBALS["_conf_tbl"]["send"];

	if($strStatus=="SEND" && $sendTotal=="0"){
		$s_sql = "s_date=now(),";
	}

	if($strStatus=="FINISH"){
		$f_sql = "e_date=now(),";
	}

	//메일정보에 업데이트
	$sql = "UPDATE ".$tbl." set 
		$s_sql
		$f_sql
		status = '$strStatus'
		WHERE idx='".$c_idx."'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($rs){
	    return true;
	}else{
		return false;
	}
}

//메일링
function sendMail($arrInfo, $arrMailInfo){
	//변수치환
	$Mail_Subject = str_replace("{NAME}", $arrInfo["name"], stripslashes($arrMailInfo["list"][0]["subject"]));
	$Mail_Contents = str_replace("{NAME}", $arrInfo["name"], stripslashes($arrMailInfo["list"][0]["contents"]));
	$mail = new smtp("localhost");  //자체발송일 경우, 서버를 지정할수도 있음. 
	//$mail->debug();
	$mail->send($arrInfo["name"]."<".$arrInfo["email"].">", $GLOBALS["_SITE"]["NAME"]."<".$GLOBALS["_SITE"]["EMAIL"].">", $Mail_Subject , $Mail_Contents, "y");
	return true;
}
?>