<? 
@session_start();
include_once ($_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php");
include_once ($_SERVER[DOCUMENT_ROOT] . "/module/poll/poll.lib.php");

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

//투표조사 가져오기
$arrPollList = getMainPoll();

//DB해제
SetDisConn($dblink);
if($arrPollList["list"]['total'] > 0){ 
?>
<link href="/css/style.css" rel="stylesheet" type="text/css">
<table border="0" cellspacing="0" cellpadding="0">
<!-- poll -->
	<?
		for($i=0; $i < $arrPollList["list"]["total"]; $i++){
	?>
	<tr>
	<td><?=$arrPollList["list"][$i][subject]?></td>
	</tr>
	<form name="poll_<?=$i?>" method="post" action="/module/poll/poll_evn.php">
	<input type="hidden" name="evnMode" value="vote">
	<input type="hidden" name="idx" value="<?=$arrPollList["list"][$i][idx]?>">
	<tr>
		<td align="left" style="padding:5px 0 0 0;">

			<?for($j=0; $j < $arrPollList["answer"][$i]["total"]; $j++){?>
			<input type="radio" name="poll_<?=$arrPollList["list"][$i][idx]?>" value="<?=$arrPollList["answer"][$i]["list"][$j][idx]?>" style="border:0"><?=$arrPollList["answer"][$i]["list"][$j]["answer"]?><br>
			<?}?>
		</td>
	</tr>
	<tr height="30">
		<td align="center"><input type="submit" value="참여"></td>
	</tr>
	</form>
	<?
		}
	?>
<!-- //poll -->
</table>
<?
}
?>