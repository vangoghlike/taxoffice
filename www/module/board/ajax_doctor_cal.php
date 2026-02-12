<?
session_start();
header("Content-Type: text/html; charset=utf-8");
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/board/board.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$d_day = floor(( strtotime(substr($_REQUEST["cal_date"],0,10)) - strtotime(date('Y-m-d')) )/86400);
if($d_day > 0){
	$arrBoardArticle	= getBoardArticleDS("trmcal", $_REQUEST["subject"], $_REQUEST["cal_date"]);
}
$arrBoardList		= getBoardListRes("trmreserve", $_REQUEST["subject"], $_REQUEST["cal_date"]);
//DB해제
SetDisConn($dblink);
##################################################### 달력 생성 ST
$now_date = date("Y-m-d");
if(!$_REQUEST[cal_date]){
	$cal_date = $now_date;
}else{
	$cal_date = $_REQUEST[cal_date];
}
$arrDate = explode("-",$cal_date);
$arrSolarCalendar = getDiarySet(intval($arrDate[0]), intval($arrDate[1]), intval($arrDate[2]));
##################################################### 달력 생성 ED


?>
<div class="calendar" >
	<div class="years">
		<button type="button" onclick="calAjax('<?=$_REQUEST['subject']?>','<?=$arrSolarCalendar[prev_month]?>')">◀</button>
		<span class="blue"><?=$arrDate[0]?>년 <?=$arrDate[1]?>월</span>
		<button type="button" onclick="calAjax('<?=$_REQUEST['subject']?>','<?=$arrSolarCalendar[next_month]?>')">▶</button>
	</div>
	<table>						
		<tr>
			<th>일</th>
			<th>월</th>
			<th>화</th>
			<th>수</th>
			<th>목</th>
			<th>금</th>
			<th>토</th>
		</tr>
	<?
	for($i=0;$i<count($arrSolarCalendar["box"]);$i++){
		echo '<tr>';
		for($j=0;$j<7;$j++){
			$vdate = substr($arrSolarCalendar["box"][$i][$j],-2);
			$actionFlag = dateDiff($now_date,$arrSolarCalendar["box"][$i][$j]);

			if($actionFlag>0){
				if($arrSolarCalendar["box"][$i][$j]==$_REQUEST[cal_date]){$checked="checked";}else{$checked="";}
				$tdclass[$i][$j] .= "<td><label class=\"poss_radio\"><input type=\"radio\" name=\"day\" ".$checked." onclick=\"calAjax('".$_REQUEST['subject']."','".$arrSolarCalendar["box"][$i][$j]."')\"><p class=\"possible\">".$vdate."</p></label></td>";
			}elseif($actionFlag==0){
				$tdclass[$i][$j] .= '<td><p class="today">'.$vdate.'</p></td>';
			}else{
				$tdclass[$i][$j] .= '<td>'.$vdate.'</td>';
			}
			if($arrDate[1]==substr($arrSolarCalendar["box"][$i][$j],5,2)) {
				echo $tdclass[$i][$j];
			}else{
				echo "<td></td>";
			}
		}
		echo "</tr>";
	}
	?>
		
	</table>
	<div class="tar">
		<i class="today"></i>오늘
		<i class="possible"></i>예약가능
	</div>
</div>
<div class="tt">진료시간 선택</div>
<div class="time">
<?
$tmpTime = "time";
if($arrBoardList["total"] > 0){
	for($i=0; $i < $arrBoardList["total"]; $i++){
		$tmpTime .= $arrBoardList["list"][$i]['etc_2'];		
	}
}

$etc01 = explode("||",$arrBoardArticle["list"][0][etc_1]);
$ltime = "";
$noData = '<div style="height:34px;">선택 가능한 진료시간이 없습니다.</div>';

for($h=0;  $h < count($etc01); $h++){					
	if($etc01[$h]){
		if(strpos($tmpTime,$etc01[$h])>0){
			echo "<label><input type=\"radio\" name=\"time\" onclick=\"reserveValue('','','')\"><em  style=\"background: #cccccc;border-color: #cccccc;color: #666;font-weight:400;\">".$etc01[$h]."</em></label>";
		}else{
			echo "<label><input type=\"radio\" name=\"time\" onclick=\"reserveValue('".$etc01[$h]."','".$_REQUEST['subject']."','".$_REQUEST[cal_date]."')\"><em>".$etc01[$h]."</em></label>";
		}
		$noData = false;
	}
	echo $noData;
}

?>	
</div>
<div class="btns">
	<button type="button" class="btn btn_gline" onclick="preDiv()">이전단계</button>
	<?if(!$noData){?>
	<button type="button" class="btn btn_p" value="예약하기" onclick="reserveGo()">예약하기</button>
	<?}?>
</div>