<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/mail/class.http.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/mail/Services_JSON.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/mail/class.EmmaSMS.php";
if(!in_array("mail_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

if(!$_GET[year]) $_GET[year] = date("Y");
if(!$_GET[month]) $_GET[month] = date("m");

$sms = new EmmaSMS();
$sms_id = $_SITE["SMS"]["WHOIS"]["ID"];
$sms_passwd = $_SITE["SMS"]["WHOIS"]["PW"];

$sms->login($sms_id,$sms_passwd);    // $sms->login( [고객 ID], [고객 패스워드]);


$retValue = $sms->statistics ($_GET[year],$_GET[month]);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
		<div class="admin-title-top">
		<h2 class="admin-title">메일 관리</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 메일 관리 &nbsp;&gt;&nbsp; 문자 발송 내역</div>
	</div>

<script language="javascript">
</script>

<div class="admin-search">
	<div class="total">&nbsp;<strong>잔여 건수 : <?=number_format($sms->Point)?> 건</strong></div>	
	<div class="keyword">
	<form name="frmSort" method="get" action="sms.php">
	월별 사용량: <select name="year">
		<? for($i=date("Y"); $i>=2014; $i--) {?>
		<option value="<?=$i?>"<?=$_GET[year]==$i?" selected":""?>><?=$i?></option>
		<? } ?>
	</select>년
	<select name="month">
		<? for($i=1; $i<13; $i++) {
				if($i<10) $i="0".$i;
		?>
		<option value="<?=$i?>"<?=$_GET[month]==$i?" selected":""?>><?=$i?></option>
		<? } ?>
	</select>월

	<input type="image" src="/backoffice/images/btn_search.gif" alt="검색" />
	</form>
	</div>
</div>

<table class="admin-table-type1">
  <thead>
	<tr>
	  <th width="20%">No.</th>
	  <th width="40%">발송한 날짜</th>
	  <th width="30%">발송 건수 / 성공 건수</th>
	</tr>
  </thead>
  <tbody>
	 <? 
	 $i=1;
	 foreach ($retValue as $day => $point) {
	?>
	<tr>
	  <td><?=number_format($i)?></td>
	  <td><?=$day?></td>
	  <td><?=$point?></td>
	</tr>
	<? $i++;
	}?>
  </tbody>
</table>

  </div>
</div>

<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>