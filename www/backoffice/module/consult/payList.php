<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/consult/consult.lib.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php";
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php");
if(!in_array("banner_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;
############################################## 변수 선언 ################################################ST

if($_REQUEST["s_date"] != ""){
	$sdate = $_REQUEST["s_date"];
}else{
	$_REQUEST["s_date"] = date("Y-m-d",strtotime("-7 days"));
	$sdate = date("Y-m-d",strtotime("-7 days"));
}
if($_REQUEST["e_date"] != ""){
	$edate = $_REQUEST["e_date"];
}else{
	$_REQUEST["e_date"] = date("Y-m-d");
	$edate = date("Y-m-d");
}

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$scale = 20;

if(!isset($_REQUEST['offset'])){
	$_REQUEST['offset']=0;
}

$totalInfo = getTotalPayPrice($ex_qry);

$arrList = getConsultingPayList($scale, $_REQUEST['offset']);

$arrManagerList = getManagerListBase();

//DB해제
SetDisConn($dblink);
?>
<style>
	.viewTable thead th {
		text-align:center;
	}
	.admin-table-type1 thead th {
		background: #64a3d9 ;
		color: white;
	}
	.cancel {background: #cdcdcd;}
</style>
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
<script  src="//code.jquery.com/jquery-latest.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$(document).ready(function() {
	$.each($('input.calendar'), function() {
		set_datepicker($(this));
	});	
});
function set_datepicker($cont) {
	$cont.prop('readonly', true).datepicker({
		closeText: '닫기',
		prevText: '',
		nextText: '',
		currentText: '오늘',
		monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)','7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
		monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
		dayNames: ['일','월','화','수','목','금','토'],
		dayNamesShort: ['일','월','화','수','목','금','토'],
		dayNamesMin: ['일','월','화','수','목','금','토'],
		weekHeader: 'Wk',
		dateFormat: 'yy-mm-dd',
		defaultDate: '+1w',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: true,
		yearSuffix: '년 ',
		changeMonth: true,
		changeYear: true,
		yearRange: '1921:c+5'
	});
}
</script>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">결제내역 관리</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 세무상담 관리 &nbsp;&gt;&nbsp; 결제내역</div>
	</div>

<script language="javascript">
function delBanner(idx){
	var cfm;
	cfm =false;
	cfm = confirm("이 메인이미지를 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmListHidden.idx.value = idx;
		document.frmListHidden.submit();
	}
}
</script>

<fieldset class="search_box">
	<form id="frm_search" name="frm_search" method="get" action="">
		<span class="select_wrap">
			<label>조회기간</label>
			<span class="date_range">
				<input type="text" name="s_date" id="s_date" title="시작일을 지정해주세요." class="input calendar txt" value="<?=$sdate?>" readonly=""> ~ <input type="text" name="e_date" id="e_date" title="종료일을 지정해주세요." class="input calendar txt" value="<?=$edate?>" readonly="">
			</span>
		</span>
		<span class="select_wrap">
			<label>담당세무사</label> 
			<select class="select" name="mngr">
				<option value="">전체</option>
				<?for($i=0;$i<$arrManagerList["total"];$i++){?>
					<option value="<?=$arrManagerList["list"][$i]["idx"]?>" <?if($_REQUEST["mngr"] == $arrManagerList["list"][$i]["idx"]){?>selected<?}?>><?=$arrManagerList["list"][$i]["mngr_name"]?></option>
				<?}?>
			</select> 
		</span>
		<span class="select_wrap">
			<select class="select" name="search_fld">
				<option value="user_id" <?if($_REQUEST["search_fld"] == "user_id"){?>selected<?}?>>회원아이디</option>
				<option value="user_name" <?if($_REQUEST["search_fld"] == "user_name"){?>selected<?}?>>성명</option>
			</select>
		<input type="text" class="txt" name="search" value="<?=$_REQUEST["search"]?>" style="width:200px">
		</span>
		<button class="btn_search">검색</button>
	</form>
</fieldset>
<table class="viewTable" style="margin-bottom:6px">
	<thead>
	<tr>
		<th>신용카드</th>
		<th>휴대폰</th>
		<th>가상계좌</th>
		<th>포인트</th>
		<th>합계</th>
		<th>실결제 합계</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td class="ac"><?=number_format($totalInfo["total_pay_price"],0)?></td>
		<td class="ac">0</td>
		<td class="ac">0</td>
		<td class="ac"><?=number_format($totalInfo["total_point"],0)?></td>
		<td class="ac"><b><?=number_format($totalInfo["total_price"],0)?></b></td>
		<td class="ac"><b><?=number_format($totalInfo["total_pay_price"],0)?></b></td>
	</tr>
	</tbody>
</table>
<table class="admin-table-type1">
  <thead>
	<tr>
	  <th>No.</th>
	  <th>등록일시</th>
	  <th>결제수단</th>
	  <th>성명</th>
	  <th>연락처</th>
	  <th>상품</th>
	  <th>담당세무사</th>
	  <th>금액(지불금액)</th>
	  <th>취소일시</th>
	</tr>
  </thead>
  <tbody>
	<?
	if($arrList['list']['total'] > 0):
		$arrType = array("card" => "카드", "point" => "포인트");
		for ($i=0;$i<$arrList['list']['total'];$i++) {
			$num = $arrList['total'] - $_REQUEST['offset'] - $i;
	?>
	<tr <?if($arrList['list'][$i]['status'] == 9){?>class="cancel"<?}?>>
		<td><?=$num?></td>
		<td><?=$arrList['list'][$i]['reg_date']?></td>
		<td><?=$arrType[$arrList['list'][$i]['pay_method']]?></td>
		<td>
            <?php if ( $arrList["list"][$i]["user_id"] == '' ) { ?>
                <?=$arrList["list"][$i]["user_name"]?>
            <?php } else { ?>
                <?php
                $dblink = SetConn($_conf_db["main_db"]);

                $memInfo = getUserInfo($arrList["list"][$i]["user_id"]);
                echo $memInfo["list"][0]['user_name'];

                SetDisConn($dblink);
                ?>
            <?php } ?>
            <?php if ( $arrList["list"][$i]["user_id"] == '' ) { ?>
            <?php } else { ?>
                (<?=$arrList["list"][$i]["user_id"]?>)
            <?php } ?>
        </td>
		<td>
            <?php if ( $arrList["list"][$i]["user_id"] == '' ) { ?>
                <?=$arrList['list'][$i]['phone']?>
            <?php } else { ?>
                <?php
                echo $memInfo["list"][0]['mobile'];
                ?>
            <?php } ?>
        </td>
		<td><?=$arrList['list'][$i]['goods_name']?></td>
		<td><?=$arrList['list'][$i]['mngr_name']?></td>
		<td><?=number_format($arrList['list'][$i]['price'],0)?>(<?=number_format($arrList['list'][$i]['pay_price'],0)?>)</td>
		<td><?=$arrList['list'][$i]['cancel_date']?></td>
	</tr>
	<?}?>

	<?else:?>
	<tr height="100">
	  <td width="100%" colspan="9" >해당하는 내역이 없습니다.</td>
	</tr>
	<?endif;?>
  </tbody>
</table>

<div class="paginate">
  <?=pageNavigation($arrList['total'],$scale,$pagescale,$_REQUEST['offset'],"")?>
</div>

<form name="frmListHidden" method="post" action="banner_evn.php">
<input type="hidden" name="evnMode" value="delete">
<input type="hidden" name="idx">
</form>
  </div>
</div>
<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/footer.php";
?>