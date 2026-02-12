<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td width="950" valign="top">
		<hr>
		<table width="100%" height="1" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td>회사소개 | 개인정보 보호정책 | copyright 등</td>
		  </tr>
		</table>
		</td>
  </tr>
</table>
</body>
</html>
<?
//쪽지 사용할때에만 주석제거
//include_once $_SERVER[DOCUMENT_ROOT] . "/module/memo/new_memo_check.inc.php";
//다른곳에서 들어왔을경우에만 로그 기록
if(!eregi($_SERVER["SERVER_NAME"],$_SERVER["HTTP_REFERER"])){
	include $_SERVER[DOCUMENT_ROOT] . "/module/log/log.lib.php";
	$dblink = SetConn($_conf_db["main_db"]);
	insertLog();
	SetDisConn($dblink);
}
?>