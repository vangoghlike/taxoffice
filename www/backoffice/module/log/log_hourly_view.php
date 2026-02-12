<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/log/log.lib.php";
if(!in_array("log_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

//검색날짜 설정
if(!isset($_REQUEST['s_date'])){
	$s_date = date("Y-m-d");
}else{
	$s_date = $_REQUEST['s_date'];
}

if(!isset($_REQUEST['e_date'])){
	$e_date = date("Y-m-d");
}else{
	$e_date = $_REQUEST['e_date'];
}


$arrInfo = getAccessCounterHourly($s_date,$e_date);

//_DEBUG($arrInfo);
//DB해제
SetDisConn($dblink);
?>
<script src="/backoffice/js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/datePicker/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="/js/datePicker/jquery-ui.css" />
<script>
$(function() {
    $(".datePicker").datepicker({ 
     dateFormat: 'yy-mm-dd',
     monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
     dayNamesMin: ['일','월','화','수','목','금','토'],
	 weekHeader: 'Wk',
     changeMonth: true, //월변경가능
     changeYear: true, //년변경가능
     showMonthAfterYear: true //년 뒤에 월 표시
  });
 });
</script>

<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">접속통계</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 접속통계 &nbsp;&gt;&nbsp; 시간대별 접속통계</div>
	</div>

        <div style="text-align: right; padding-bottom: 5px; margin-top: 10px;">
            <button type="button" onclick="runLogArchive()" style="background-color: #d9534f; color: white; border: 1px solid #d43f3a; padding: 5px 10px; cursor: pointer; border-radius: 4px; font-weight: bold;">
                📂 지난 로그 파일로 이관 (DB 최적화)
            </button>
        </div>

        <script>
            function runLogArchive() {
                // 실수로 누르는 것 방지
                if(!confirm('기준일(전월 1일) 이전의 모든 로그를 파일로 저장하고 DB에서 삭제하시겠습니까?\n\n* 데이터 양에 따라 시간이 소요될 수 있습니다.')) return;

                var btn = event.target;
                btn.disabled = true;
                btn.innerText = "이관 작업 진행 중...";

                var xhr = new XMLHttpRequest();
                // 경로는 형님 서버 구조에 맞게 설정 (/backoffice/log_archiver.php)
                xhr.open('GET', '/backoffice/log_archiver.php', true);

                xhr.onload = function () {
                    if (xhr.status === 200) {
                        alert(xhr.responseText);
                        location.reload();
                    } else {
                        alert('오류 발생: ' + xhr.status);
                        btn.disabled = false;
                        btn.innerText = "📂 지난 로그 파일로 이관 (DB 최적화)";
                    }
                };
                xhr.send();
            }
        </script>

<script language="javascript" src="calendar.js"></script>
<table border="0" cellpadding="0" cellspacing="1" width="100%">
	<form method="get" action="<?=$_SERVER[PHP_SELF]?>" name="logViewFrm">
	<tr height="25" align="left">
		<td width="100%">
		<input type="submit" value="조회" style="width:40px;height:22px;"> <input type="text" name="s_date" size="12" class="input datePicker" value="<?=$s_date?>"> ~ <input type="text" name="e_date" size="12" class="input datePicker" value="<?=$e_date?>">
		<b><?=number_format($arrInfo["list"][0]["hit"])?> 회</b>
		</td>
	</tr>
	</form>
</table>
<table border="0" cellpadding="0" cellspacing="1" width="100%" style="border:1px solid #dedede;">
	<tr bgcolor="#6c7480" height="25" align="center">
		<td width="50%"><font color="#FFFFFF"><b>AM</b></font></td>
		<td width="50%"><font color="#FFFFFF"><b>PM</b></font></td>
	</tr>
	<tr>
		<td valign="top">
		<table border="0" cellpadding="3" cellspacing="1" width="100%">
			<tr align="center" bgcolor="#EEEEEE">
				<td width="10%"><b>시간</b></td>
				<td width="10%"><b>방문수</b></td>
				<td width="10%"><b>시/일</b></td>
				<td width="70%"><b>그래프</b></td>
			</tr>
			<?for($i=0;$i<12;$i++){?>
			<tr align="right">
				<td width="10%" bgcolor="#EEEEEE"><?=$i?> 시</td>
				<td width="10%"><?=number_format($arrInfo["list"][0]["h".$i])?></td>
				<td width="10%"><?=$arrInfo["list"][0]["hit"]!=0?number_format(($arrInfo["list"][0]["h".$i]/$arrInfo["list"][0]["hit"])*100,2):"0"?> %</td>
				<td width="70%" align="left"><table border="0"><tr><td bgcolor="#CCCCCC" width="<?=$arrInfo["list"][0]["hit"]!=0?number_format(($arrInfo["list"][0]["h".$i]/$arrInfo["list"][0]["hit"])*200,0):"0"?>" height="10"></td></tr></table></td>
			</tr>
			<?}?>
		</table>
		</td>
		<td valign="top">
		<table border="0" cellpadding="3" cellspacing="1" width="100%">
			<tr align="center" bgcolor="#EEEEEE">
				<td width="10%"><b>시간</b></td>
				<td width="10%"><b>방문수</b></td>
				<td width="10%"><b>시/일</b></td>
				<td width="70%"><b>그래프</b></td>
			</tr>
			<?for($i=12;$i<24;$i++){?>
			<tr align="right">
				<td width="10%" bgcolor="#EEEEEE"><?=$i?> 시</td>
				<td width="10%"><?=number_format($arrInfo["list"][0]["h".$i])?></td>
				<td width="10%"><?=$arrInfo["list"][0]["hit"]!=0?number_format(($arrInfo["list"][0]["h".$i]/$arrInfo["list"][0]["hit"])*100,2):"0"?> %</td>
				<td width="70%" align="left"><table border="0"><tr><td bgcolor="#CCCCCC" width="<?=$arrInfo["list"][0]["hit"]!=0?number_format(($arrInfo["list"][0]["h".$i]/$arrInfo["list"][0]["hit"])*200,0):"0"?>" height="10"></td></tr></table></td>
			</tr>
			<?}?>
		</table>
		</td>
	</tr>
</table>
	</div>
</div>
<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/footer.php" ;
?>