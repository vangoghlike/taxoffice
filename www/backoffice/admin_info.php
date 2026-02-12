<?
// include_once $_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/module/log/log.lib.php";

$yesterday = date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")));
$monthFirst = date("Y-m")."-01";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrListLogToday = getAccessCounterDaily(date("Y-m-d"), date("Y-m-d"));	//오늘방문
$arrListLogYesterday = getAccessCounterDaily($yesterday, $yesterday);
$arrListLogMonth = getAccessCounterDaily($monthFirst, date("Y-m-d"));
$arrListLogAll = getAccessCounterDaily("2016-08-01", date("Y-m-d"));

$sql = "select * from tbl_board_info";
$result=mysqli_query($GLOBALS['dblink'], $sql) ;

/*
$i=0;
while($row=mysqli_fetch_array($result)){
	$arrLeftBoard[$i] = getBoardListBase($row['boardid'], "", "", "", "", "");

	$boardTotal += $arrLeftBoard[$i]["total"];
	$i++;
}
*/

//DB해제
SetDisConn($dblink);
?>
<div class="admin-info">
	<div class="info-today">
		<span class="today-time" id="clock"></span>
	</div>

	<div class="info-account">
		
		<div class="account-group-head">
			오늘방문 : <span style="color:#000;"><strong><?=number_format($arrListLogToday["sum"])?> 명</strong></span><br />
			어제방문 : <?=number_format($arrListLogYesterday["sum"])?>명<br />
			이달방문 : <?=number_format($arrListLogMonth["sum"])?>명<br />
			총방문객 : <?=number_format($arrListLogAll["sum"])?> 명
			
		</div>
		<!--
		<div class="account-group" style="display:none:">
			총 게시물 : <?//=number_format($boardTotal)?> 개<br />
		</div>
		-->
	</div>
</div>
<script type="text/javascript">
<!--
const clock = document.querySelector('.h1_clock');

function getTime(){
    const time = new Date();
    const hour = time.getHours();
    const minutes = time.getMinutes();
    const seconds = time.getSeconds();
	//alert( hour +":" + minutes + ":"+seconds);
    //clock.innerHTML = hour +":" + minutes + ":"+seconds;
    clock.innerHTML = `${hour<10 ? `0${hour}`:hour}:${minutes<10 ? `0${minutes}`:minutes}:${seconds<10 ? `0${seconds}`:seconds}`
}
function init(){	
	setInterval(getTime, 1000);
}
//init();	
//-->
</script>

<script language="JavaScript"> 
	function printTime() { 
	var clock = document.getElementById("clock"); 
	var now = new Date(); 

	clock.innerHTML = now.getFullYear() + "/" + 
	(now.getMonth()+1) + "/" + 
		now.getDate() + " " + 
		now.getHours() + ":" + 
		now.getMinutes() + ":" + 
		now.getSeconds(); 

		setTimeout("printTime()", 1000); 
	} 

	window.onload = function() { 
	printTime(); 
	}; 
</script> 