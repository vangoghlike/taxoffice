<? 
@session_start();
include_once ($_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php");
include_once $_SERVER[DOCUMENT_ROOT] . "/module/research/research.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

//설문조사 가져오기
$arrResearchList = getMainResearch();

//_DEBUG($arrResearchList);
//DB해제
SetDisConn($dblink);
if($arrResearchList["list"]['total'] > 0){ 
?>

<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<!-- research -->
	<?
		for($i=0; $i < $arrResearchList["list"]["total"]; $i++){
		$k = 0; //설문 제목 번호
	?>
	<tr>
	<td><b><font color="navy"><?=$arrResearchList["list"][$i][subject]?></b></b></td>
	</tr>
	<form name="research_<?=$i?>" method="post" action="/module/research/research_evn.php" onsubmit="return CheckResearchForm(this)">
	<input type="hidden" name="evnMode" value="joinResearch">
	<input type="hidden" name="idx" value="<?=$arrResearchList["list"][$i][idx]?>">

	<?for($j=0; $j < $arrResearchList["list"][$i]["qalist"]["total"]; $j++){//답변수 만큼 루프?>
	<?if($arrResearchList["list"][$i]["qalist"][$j-1][question] != $arrResearchList["list"][$i]["qalist"][$j][question]){//앞번호의 설문제목과 같지 않다면 설문제목을 나타냄
		$k++;
	?>
	<tr>
		<td align="left" style="padding:5px 0 0 0;">
			<b><?=$k?>. <?=$arrResearchList["list"][$i]["qalist"][$j][question]?></b>
		</td>
	</tr>
	<?}?>
	<tr>
		<td align="left" style="padding:5px 0 0 0;">
			<input type="radio" name="research_<?=$k?>" value="<?=$arrResearchList["list"][$i]["qalist"][$j][rq_idx]?>|<?=$arrResearchList["list"][$i]["qalist"][$j][idx]?>" style="border:0"><?=$arrResearchList["list"][$i]["qalist"][$j][answer]?>
		</td>
	</tr>
	<?}?>

	<tr height="30">
		<td align="center"><input type="submit" value="참여"></td>
	</tr>
	<input type="hidden" name="total_q" value="<?=$k?>">
	</form>
	<?
		}
	?>
	<!-- //research -->
</table>
<?
}
?>

<script language="javascript">
function CheckResearchForm(frm){
	<?
		for($i=1;$i<$k+1;$i++){
		echo "var cfm_".$i." = 0;";
	?>

	for(i=0;i<frm.research_<?=$i?>.length;i++){
		if(frm.research_<?=$i?>[i].checked==true){
			cfm_<?=$i?>++;
		}
	}
	if (frm.research_<?=$i?>.length > 1 && cfm_<?=$i?> < 1){
		alert("<?=$i?>번 설문의 답변을 선택해 주십시요.");
		try{
			frm.research_<?=$i?>[0].focus();
		}catch(e){}
		return false;
	}
	<?}?>

}
</script>