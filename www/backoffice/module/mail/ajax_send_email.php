<?
session_start();
header("Content-Type: text/html; charset=euc-kr");
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/module/admin/admin.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/auth/auth.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/module/mail/send.lib.php";
if(!in_array("send_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	selfClose();
endif;

if(!$_REQUEST[scale]){
	$_REQUEST[scale] = "10";
}
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

//보낼메일 개수정보 가져오기
$arrCount = getEmailCount(mysql_escape_string($_REQUEST[idx]));

//발송중으로 업데이트
updateMailStatus(mysql_escape_string($_REQUEST[idx]),"SEND", $arrCount["send_total"]);

//메일내용 가져오기
$arrMailInfo = getArticleInfo($GLOBALS["_conf_tbl"]["send"], mysql_escape_string($_REQUEST[idx]));

//보낼메일 목록
$arrList = getEmailList(mysql_escape_string($_REQUEST[idx]), mysql_escape_string($_REQUEST[scale]));//한번에 scale통씩 보냄
//_DEBUG($arrList);

if($arrCount["total"] > 0){
	//남은 메일목록이 있다면 메일발송
	if($arrCount["remain_total"] > 0){
		//보낼 메일갯수만큼 루프돌면서 메일 발송
		if($arrList["total"] > 0){
			for($i=0; $i < $arrList["total"]; $i++){
				//메일발송
				sendMail($arrList["list"][$i], $arrMailInfo);

				//발송한것 체크스트링 작성
				$updateString .=$arrList["list"][$i][idx];
				if($i != $arrList["total"]-1){
					$updateString .= ",";
				}
			}

			//보낸메일 체크
			updateEmailList(mysql_escape_string($_REQUEST[idx]),$updateString);

			//보낼메일 개수정보 다시가져오기
			$arrCount = getEmailCount(mysql_escape_string($_REQUEST[idx]));
			?>
			<table width="100%">
			<tr height="25">
				<td width="70">발송한것: </td>
				<td><?=number_format($arrCount["send_total"])?>통</td>
			</tr>
			<tr height="25">
				<td width="70">발송예정: </td>
				<td><?=number_format($arrCount["remain_total"])?>통</td>
			</tr>
			</table>
			<br>
			진행상황
			<table width="100%" bgcolor="#000000" cellpadding=0 cellspacing=0>
			<tr height="10">
				<td bgcolor="#000000" width="<?=($arrCount["send_total"]/$arrCount["total"])*100?>%"></td>
				<td bgcolor="#FFFFFF" width="<?=($arrCount["remain_total"]/$arrCount["total"])*100?>%"></td>
			</tr>
			</table>
			<br>
			현재 <?=number_format($arrCount["send_total"]/$arrCount["total"],2)*100?>% 발송
			<?
		}else{
			updateMailStatus(mysql_escape_string($_REQUEST[idx]),"FINISH","");
			echo "1";
		}
	//남은 메일목록이 없다면 발송완료
	}else{
		//메일발송 완료
		updateMailStatus(mysql_escape_string($_REQUEST[idx]),"FINISH","");
		echo "1";
	}
}else{
	updateMailStatus(mysql_escape_string($_REQUEST[idx]),"FINISH","");
	echo "1";
}
//DB해제
SetDisConn($dblink);
?>