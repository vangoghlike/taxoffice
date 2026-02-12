<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/pub/inc/_header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/board/board.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/calendar/calendar.lib.php";//일정관리 형식
include $_SERVER[DOCUMENT_ROOT] . "/common/fckeditor/fckeditor.php";
if(!in_array("board_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

if(!$boardid){
	$boardid = $_REQUEST[boardid];
}

//DB해제
SetDisConn($dblink);
?>
<?	include $_SERVER[DOCUMENT_ROOT] . "/backoffice/module/board/menu.php";	?>
<?

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
##################################################### 이전달 Active ST
$arrNowDate = explode("-",$now_date);
$arrPrevDate = explode("-",$arrSolarCalendar['prev_month']);
if($arrPrevDate[0]<$arrNowDate[0]){
	$prevActive = "";
}else if($arrPrevDate[0]==$arrNowDate[0]){
	if($arrPrevDate[1]<$arrNowDate[1]){
		$prevActive = "";
	}else{
		$prevActive = "active";
	}
}else{
	$prevActive = "active";
}
##################################################### 이전달 Active ED

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrBoardList1 = getBoardListSchedule12("suinquiry", $arrSolarCalendar[first_before], $arrSolarCalendar[last_after],1);	//기술이전문의
$arrBoardList2 = getBoardListSchedule12("suconsulting", $arrSolarCalendar[first_before], $arrSolarCalendar[last_after],2);	//상담신청 내역
$arrBoardList3 = getBoardListSchedule12("suapplication", $arrSolarCalendar[first_before], $arrSolarCalendar[last_after],2);	//참가신청

//DB해제
SetDisConn($dblink);
?>
<style type="text/css">
.year {
    padding:20px 0;
	text-align: center;
    font-size: 30px;
    line-height: 30px;
    color: #333333;
    font-weight: 700;
}
.control {
    position: absolute;
    right: 0;
    top: 0;
	padding-top:20px;
}
.control a.prev.active {
    background: url(/pub/images/ico_datePrevOn.png) left center no-repeat;
}
.control a.prev {
    padding-left: 20px;
    background: url(/pub/images/ico_datePrev.png) left center no-repeat;
    margin-right: 27px;
}
.control a {
    display: inline-block;
    vertical-align: middle;
    font-size: 16px;
    font-weight: 700;
}
.control a.active {
    font-weight: 700;
}
.control a.next.active {
    background: url(/pub/images/ico_dateNextOn.png) right center no-repeat;
}
.control a.next {
    padding-right: 20px;
    background: url(/pub/images/ico_dateNext.png) right center no-repeat;
}

.tbWrap table {
    width: 100%;
    margin-bottom: 60px;
}
.tbWrap table th{
	position: relative;
    font-size: 16px;
    line-height: 16px;
    padding: 19px 0;
    color: #333333;
    font-weight: 500;
    text-align: center;
    background: #f3f3f3;
    font-family: 'Roboto', sans-serif;
}
.tbWrap table th:after {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    width: 1px;
    height: 13px;
    margin-top: -6px;
    background: #cccccc;
}
.tbWrap table td {
    border-bottom: 1px solid #dddddd;
    padding: 20px 10px 2px 10px;
    height: 120px;
    vertical-align: top;
}
.tbWrap table td .num {
    font-size: 15px;
    font-weight: bold;
    margin-bottom: 18px;
}
.tbWrap table td .num a {
    color: #2c71a9;
}
</style>
<div class="topArea">
	<div class="year robo">
		<?=$arrDate[0]?>. <?=$arrDate[1]?>
	</div>
	<div class="control">

		<a href="<?=$_SERVER[PHP_SELF]?>?cal_date=<?=$arrSolarCalendar[prev_month]?>&boardid=schedule" class="prev <?=$prevActive?>">이전달</a>
		<a href="<?=$_SERVER[PHP_SELF]?>?cal_date=<?=$arrSolarCalendar[next_month]?>&boardid=schedule" class="next active">다음달</a>
	</div>
</div>

<div class="tbWrap">
	<table>
		<colgroup>
			<col style="width:14.285%" class="no1" />
			<col style="width:14.285%" class="no2" />
			<col style="width:14.285%" class="no3" />
			<col style="width:14.285%" class="no4" />
			<col style="width:14.285%" class="no5" />
			<col style="width:14.285%" class="no6" />
			<col class="no7" />
		</colgroup>
		<thead>
			<tr>
				<th><span>Sun</span></th>
				<th><span>Mon</span></th>
				<th><span>Tue</span></th>
				<th><span>Wed</span></th>
				<th><span>Thu</span></th>
				<th><span>Fri</span></th>
				<th><span>Sat</span></th>
			</tr>
		</thead>
		<tbody>
			<?
			for($i=0;$i<count($arrSolarCalendar["box"]);$i++){
				echo '<tr>';
				for($j=0;$j<7;$j++){
					//국경일, 법정공휴일, 일요일의 경우
					if($arrLunarCalendar[$arrSolarCalendar["box"][$i][$j]][holiday]=="1" || $j==0){
						$bgcolor = "sun";
					//토요일의 경우
					}else if($j==6){
						$bgcolor = "sat";
					}else{
						$bgcolor = "weekdays";
					}

					if($arrSolarCalendar["box"][$i][$j]==date("Y-m-d")) {
						$tdclass[$i][$j] .= '<span>오늘</span>';
					} else {
						$tdclass[$i][$j] .= "";
					}

					## 오늘 이후로 예약일 선택 ST
					$calClass = "red";
					$tdcont[$i][$j] .= '<div class="selDate">';
					#### 기술이전문의 ST
					if(is_array($arrBoardList1["list"][$arrSolarCalendar["box"][$i][$j]])){
						$cnt1 = ceil( $arrBoardList1["list"][$arrSolarCalendar["box"][$i][$j]]['subject'] - $arrBoardList1["list"][$arrSolarCalendar["box"][$i][$j]]['etc_1']);
						$cidx = $arrBoardList1["list"][$arrSolarCalendar["box"][$i][$j]]['idx'];
						if($cnt1<1){
							$tdcont[$i][$j] .= '<div class="line end"><a href="/backoffice/module/board/board_view.php?boardid=suinquiry&s_date='.$arrSolarCalendar["box"][$i][$j].'&e_date='.$arrSolarCalendar["box"][$i][$j].'">기술이전문의 '.count($arrBoardList1["list"][$arrSolarCalendar["box"][$i][$j]]).'건</a></div>';
						}
					}
					#### 기술이전문의 ED
					#### 상담신청 ST
					if(is_array($arrBoardList2["list"][$arrSolarCalendar["box"][$i][$j]])){
						$cnt1 = ceil( $arrBoardList2["list"][$arrSolarCalendar["box"][$i][$j]]['subject'] - $arrBoardList2["list"][$arrSolarCalendar["box"][$i][$j]]['etc_1']);
						$cnt2 = ceil( $arrBoardList2["list"][$arrSolarCalendar["box"][$i][$j]]['etc_3'] - $arrBoardList2["list"][$arrSolarCalendar["box"][$i][$j]]['etc_2']);
						if($cnt1<1){
							$tdcont[$i][$j] .= '<div class="line end"><a href="/backoffice/module/board/board_view.php?boardid=suconsulting&s_date='.$arrSolarCalendar["box"][$i][$j].'&e_date='.$arrSolarCalendar["box"][$i][$j].'">상담신청 '.count($arrBoardList2["list"][$arrSolarCalendar["box"][$i][$j]]).'건</a></div>';
						}
					}
					#### 상담신청 ED
					#### 참가신청 ST
					if(is_array($arrBoardList3["list"][$arrSolarCalendar["box"][$i][$j]])){
						$cnt1 = ceil( $arrBoardList3["list"][$arrSolarCalendar["box"][$i][$j]]['subject'] - $arrBoardList3["list"][$arrSolarCalendar["box"][$i][$j]]['etc_1']);
						$cnt2 = ceil( $arrBoardList3["list"][$arrSolarCalendar["box"][$i][$j]]['etc_3'] - $arrBoardList3["list"][$arrSolarCalendar["box"][$i][$j]]['etc_2']);
						if($cnt1<1){
							$tdcont[$i][$j] .= '<div class="line end"><a href="/backoffice/module/board/board_view.php?boardid=suapplication&s_date='.$arrSolarCalendar["box"][$i][$j].'&e_date='.$arrSolarCalendar["box"][$i][$j].'">행사참가신청 '.count($arrBoardList3["list"][$arrSolarCalendar["box"][$i][$j]]).'건</a></div>';
						}
					}
					#### 참가신청 ED
					$tdcont[$i][$j] .= '</div>';
			?>
				<td>
				<? if($arrDate[1]==substr($arrSolarCalendar["box"][$i][$j],5,2)) {?>
				<div class="num <?=$calClass?>"><?=substr($arrSolarCalendar["box"][$i][$j],-2)?> <?=$tdclass[$i][$j]?></div>
				<?=$tdcont[$i][$j]?>
				<?}?>
				</td>
			<?
				}
				echo '</tr>';
			}
			?>
		</tbody>
	</table>
</div>
<?	include $_SERVER[DOCUMENT_ROOT] . "/backoffice/pub/inc/_footer.php";	?>