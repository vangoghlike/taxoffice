<?php

//DB Connect
function SetMSConn(){
	$hostname = "220.73.130.44"; // 서버 ip 
	$username = "smsuser_live"; //db 접근 user 
	$password = "railpark_pass"; //db 접근 user password 
	$dbname = "SMS_KT_MCSAGENT_LIVE"; //DB 이름 

	$mscon=MSSQL_CONNECT($hostname, $username, $password) or DIE("DATABASE FAILED TO RESPOND."); 
	mssql_select_db($dbname, $mscon) or DIE("Table unavailable"); 

	return $mscon;
}
//DB Disconnect
function SetMSDisConn($myconn){
    if( $myconn )    {
        return @mssql_close($myconn);
    }else{
        errorConn("no linked connection");
    }
}

#############################################################
$dbMSlink = SetMSConn();

#$sql="select * from d_admin"; 
#$result=mssql_query($sql, $dbMSlink); 

$arrTest = getBoardInfo();

SetMSDisConn($dbMSlink);
#############################################################
/*
$sql="select * from d_admin"; 
$result=mssql_query($sql, $mscon); 
mssql_close($mscon); 
*/
if($arrTest['total'] > 0){
	for($i=0; $i < $arrTest['total']; $i++){	
		echo $arrTest["list"][$i]["USER_ID"]."</br>";
	}
}

function getBoardInfo(){
    $sql  = "select top 1 * from SDK_SMS_SEND";
    $rs = mssql_query($sql, $GLOBALS[dbMSlink]);
    $total_rs = mssql_num_rows($rs);
    
    if($total_rs > 0){
        $list['total'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
            $list['list'][$i] = mssql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }
    return $list;
}

/*
$str = "1234567890";
$acode = substr(str_shuffle($str),0,4);

$sql  = "INSERT INTO SDK_SMS_SEND(USER_ID, SUBJECT, SMS_MSG, CALLBACK_URL, NOW_DATE, SEND_DATE, CALLBACK, DEST_INFO, CDR_ID)VALUES('railpark1','','강촌레일파크 인증번호[".$acode."]이 수신되었습니다.',''";
$sql .= ",CONVERT(CHAR(8), GETDATE(), 112) + REPLACE(CONVERT(CHAR(8), GETDATE(), 108), ':', '')"
$sql .= ",CONVERT(CHAR(8), GETDATE(), 112) + REPLACE(CONVERT(CHAR(8), GETDATE(), 108), ':', ''),'0332451000','레일바이크예매^".$acode."','railpark1')";
*/
?>