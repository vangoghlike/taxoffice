<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/poll/poll.lib.php";
if(!in_array("poll_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getArticleInfo($GLOBALS["_conf_tbl"]["poll_info"], mysql_escape_string($_REQUEST[idx]));

//_DEBUG($arrInfo);

$arrAnswerList = getPollAnswerList($arrInfo["list"][0][idx],"vote desc");
$strAnswerTotal = getPollAnswerTotal($arrInfo["list"][0][idx]);

//_DEBUG($strAnswerTotal);
//DB해제
SetDisConn($dblink);
?>
<div id="container">
	<? include "menu.php"; ?>
    <div id="content">
	<h3 class="subTitle">투표 관리</h3>

<table border="0" cellpadding="0" cellspacing="1" width="100%">
<tr height="25">
  <td width="100%"><b><font color="red">투표 결과</font></b></td>
</tr>
</table>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
	<tr>
		<td valign="top" width="50%">

		<!-- 기본정보 -->
		<fieldset>
		<legend>기본정보</legend>
		<table border="0" cellpadding="3" cellspacing="1" width="100%">
			<tr height="25">
				<td width="120" align="right" bgcolor="#000000"><font color=white><b>투표제목</b></font></td>
				<td><?=stripslashes($arrInfo["list"][0][subject])?></td>
			</tr>
			<tr height="25">
				<td align="right" bgcolor="#000000"><font color=white><b>로그인사용</b></font></td>
				<td><?=$arrInfo["list"][0][use_login]=="Y"?"로그인후 투표가능":"아무나 투표가능"?></td>
			</tr>
			<tr height="25">
				<td align="right" bgcolor="#000000"><font color=white><b>보이기</b></font></td>
				<td><?=$arrInfo["list"][0][is_show]=="Y"?"투표보이기":"투표숨김"?></td>
			</tr>
			<tr>
				<td align="right" bgcolor="#000000"><font color=white><b>시작일</b></font></td>
				<td><?=$arrInfo["list"][0][sdate]?></td>
			</tr>
			<tr>
				<td align="right" bgcolor="#000000"><font color=white><b>종료일</b></font></td>
				<td><?=$arrInfo["list"][0][edate]?></td>
			</tr>
			<tr>
				<td align="right" bgcolor="#000000"><font color=white><b>등록일</b></font></td>
				<td><?=$arrInfo["list"][0][wdate]?></td>
			</tr>
		</table>
		</fieldset>
		<br>

		<!-- 투표항목 -->
		<fieldset>
		<legend>투표결과 </legend>
		<table id="poll_answer" border="0" cellpadding="3" cellspacing="1" width="100%">
			<tbody>
			<tr height="25">
				<td align='center' bgcolor='#000000' width='50%'><font color=white><b>답안</b></font></td>
				<td align='center' bgcolor='#000000' width='30%'><font color=white><b>그래프</b></font></td>
				<td align='center' bgcolor='#000000' width='10%'><font color=white><b>득표율</b></font></td>
				<td align='center' bgcolor='#000000' width='10%'><font color=white><b>투표수</b></font></td>
			</tr>
			<?
			for($i=0;$i<$arrAnswerList["total"];$i++){
			?>
			<tr>
				<td><?=stripslashes($arrAnswerList["list"][$i][answer])?></td>
				<td><table border="0" title=""><tr><td bgcolor="#CCCCCC" width="<?=$strAnswerTotal>0?($arrAnswerList["list"][$i][vote]/$strAnswerTotal)*300:"0"?>" height="10"></td></tr></table></td>
				<td><?=$strAnswerTotal>0?number_format(($arrAnswerList["list"][$i][vote]/$strAnswerTotal)*100):"0"?>%</td>
				<td><?=number_format($arrAnswerList["list"][$i][vote])?></td>
			</tr>
			<?
			}
			?>
			</tbody>
		</table>
		</fieldset>
		<br>

		</td>
	</tr>
</table>

	</div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>