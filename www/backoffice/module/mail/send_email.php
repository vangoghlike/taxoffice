<?
session_start();
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/module/admin/admin.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/auth/auth.php";
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/module/mail/send.lib.php";
if(!in_array("send_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	selfClose();
endif;

//1회 발송시 발송통수 설정
if(!$_REQUEST[sendEA]){
	$sendEA = "50";
}else{
	$sendEA = $_REQUEST[sendEA];
}

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

//메일내용 가져오기
$arrInfo = getArticleInfo($GLOBALS["_conf_tbl"]["send"], mysql_escape_string($_REQUEST[idx]));

//보낼메일 개수정보
$arrCount = getEmailCount(mysql_escape_string($_REQUEST[idx]));
//_DEBUG($arrInfo);

//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
		<h2 class="admin-title">메일 관리</h2>

<script src="/common/js/prototype-1.6.0.3-euc-kr.js" type="text/javascript"></script>
<script language="javascript">
var flag = false;
var scale = <?=$sendEA?>;//한번에 보낼 메일갯수

function sendConfirm(){
	var cfm = false;
	cfm = confirm("메일발송을 시작 하시겠습니까?");
	if(cfm==true){
		//메일발송 플래그 트루설정
		flag = true;
		startSend();
	}
}

function startSend(){
	if(flag==true){
		new Ajax.Request('ajax_send_email.php',
		{
			method:'post',
			parameters: {idx: '<?=$_REQUEST[idx]?>', scale: scale},
			asynchronous: false,
			encoding: 'utf-8',
			contentType: 'application/x-www-form-urlencoded',

			onSuccess: function(transport){
				var response = transport.responseText || "응답된 내역이 없습니다."; 
				if(response !="1"){
					$("divStatus").innerHTML = response;
					setTimeout('startSend()',500);
				}else{
					flag=false;
					alert("메일발송 완료");
				}

			},
			
			onFailure: function(){ 
				alert('AJAX 데이터 응답중 오류가 발생하였습니다.') ;
			}   
		});
	}
}

function stopSend(tp){
	var cfm = false;
	if(tp==0){
		cfm = confirm("메일발송을 중지 하시겠습니까?");
		if(cfm==true){
			//메일발송 플래그 폴스설정
			flag = false;
			alert("메일발송이 중지 되었습니다.");
		}
	}else{
		flag = false;
		alert("메일발송이 중지 되었습니다.");
		self.close();
	}
}


</script>

	<table width="100%">
	<form method="get">
	<input type="hidden" name="idx" value="<?=$_REQUEST[idx]?>">
		<tr><td>메일 발송 현황</td>
		<td align=right>1회에
		<select name="sendEA" onchange="this.form.submit()">
		<option value="10"<?=$sendEA=="10"?" selected":""?>>10</option>
		<option value="30"<?=$sendEA=="30"?" selected":""?>>30</option>
		<option value="50"<?=$sendEA=="50"?" selected":""?>>50</option>
		<option value="100"<?=$sendEA=="100"?" selected":""?>>100</option>
		<option value="150"<?=$sendEA=="150"?" selected":""?>>150</option>
		<option value="200"<?=$sendEA=="200"?" selected":""?>>200</option>
		<option value="300"<?=$sendEA=="300"?" selected":""?>>300</option>
		</select>
		통씩 발송
		</td>
		</tr>
	</form>
	</table>
	</legend>
	<table width="100%" bgcolor="#FFFFFF">
	<tr height="25">
		<td width="70">제목: </td>
		<td><?=stripslashes($arrInfo["list"][0][subject])?></td>
	</tr>
	<tr height="25">
		<td width="70">전체: </td>
		<td><?=number_format($arrCount["total"])?>통</td>
	</tr>
	</table>

	<div id="divStatus">
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
	</div>
	<a href="javascript:sendConfirm();">발송시작</a> | <a href="javascript:stopSend(0)">발송중지</a>  | <a href="javascript:stopSend(1)">발송중지후 창닫기</a>
	<br>
	<br>

	</div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>