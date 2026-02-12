<?
include_once ($_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php");

$cert = substr(md5(mktime()),0,6);

$email = $_REQUEST[email_id]."@".$_REQUEST[email_domain];
$tmpSubject = "[에이스텔] 메일 인증입니다.";
$contents = "
<table border='0' cellpadding='3' cellspacing='1' width='800'>
<tr height='30' align='center'>
	<td width='15%' bgcolor='#646464'><font color='#ffffff'>인증번호</font></td>
	<td width='85%' align='left'>".$cert."</td>
</tr>
<tr height='30' align='center'>
	<td colspan='2'>위 인증번호를 회원가입란에 입력해주세요</td>
</tr>
</table>
";

$mail = new smtp("mail.acetel.co.kr");  //자체발송일 경우, 서버를 지정할수도 있음. 
//$mail->debug();  //디버깅할때 
$mail->send($email, $_SITE["EMAIL"], $tmpSubject, $contents, "y");

if($arrList["total"] > 0){
	echo "1|".$cert;
}else{
	echo "0";
}
?>