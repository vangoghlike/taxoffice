<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/online/online.lib.php";
if(!in_array("online_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

if($_POST[evnMode]=="edit"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_REQUEST[idx]));

	$RS = editOnline($idx);

	if($RS==true){
		//성공이라면 정보를 가져와서 메일을 보낼까??
		$arrInfo = getOnlineInfo($idx);
		if($arrInfo["list"][0][status]=="Y" && $arrInfo["list"][0][reply_type]=="EMAIL111"){
			$tmpSubject = "온라인견적신청";
			$contents = "
			<table border='0' cellpadding='3' cellspacing='1' width='800'>
			<tr height='30' align='center'>
				<td width='15%' bgcolor='#646464'><font color='#ffffff'>문의하신 내용</font></td>
				<td width='85%' align='left'>".stripslashes($arrInfo['list'][0][contents])."</td>
			</tr>
			<tr height='30' align='center'>
				<td width='15%' bgcolor='#646464'><font color='#ffffff'>답변</font></td>
				<td width='85%' align='left'>".stripslashes($arrInfo['list'][0][re_contents])."</td>
			</tr>
			</table>
			";
			$mail = new smtp("self");  //자체발송일 경우, 서버를 지정할수도 있음. 
			//$mail->debug();  //디버깅할때 
			$mail->send($arrInfo["list"][0][email], $_SITE["EMAIL"], $arrInfo["list"][0][user_name] . "님 " . $tmpSubject . "에 대한 답변입니다.", $contents,"y");
		}
		jsGo($_REQUEST[rt_url],"","");
		//jsGo("online_list.php?o_type=" . $arrInfo["list"][0][o_type] ,"","");
	}else{
		jsMsg("정보수정에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);
}else if($_POST[evnMode]=="delete"){
	//DB연결
	$dblink = SetConn($_conf_db["main_db"]);

	$idx = mysql_escape_string(trim($_REQUEST[idx]));

	$RS = deleteOnline($idx);

	if($RS==true){
		jsGo($_REQUEST[rt_url],"","");
	}else{
		jsMsg("정보삭제에 실패 하였습니다.");
		jsHistory("-1") ;
	}

	//DB해제
	SetDisConn($dblink);
}
?>