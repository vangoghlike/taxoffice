<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/shop/shop.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category.lib.php";
if(!in_array("shop_order_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

$scale = 20;
if(!$_REQUEST[sh_date]) $_REQUEST[sh_date]="order_date";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getOrderListAdmin(
	mysql_escape_string($_REQUEST[sw]), 
	mysql_escape_string($_REQUEST[sk]), 
	mysql_escape_string($_REQUEST[s_date]), 
	mysql_escape_string($_REQUEST[e_date]), 
	mysql_escape_string($_REQUEST[order_state]), 
	$scale, $_REQUEST[offset]);


//DB해제
SetDisConn($dblink);

if(count($_REQUEST[pay_type]) > 0) {
	for($oo=0; $oo < count($_REQUEST[pay_type]); $oo++){
		$paytype .= $_REQUEST[pay_type][$oo].",";
	}
}
if(count($_REQUEST[order_states]) > 0) {
	for($os=0; $os < count($_REQUEST[order_states]); $os++){
		$orderstate .= "/".$_REQUEST[order_states][$os]."/,";
	}
}
?>
<script src="/backoffice/js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/datePicker/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="/js/datePicker/jquery-ui.css" />
<script>
$(function() {
// $.datepicker.setDefaults($.datepicker.regional["ko"]);
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
<script language="javascript">
function delOrder(order_no){
	var cfm;
	cfm =false;
	cfm = confirm(order_no + " 이 주문건을 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmOrderListHidden.order_no.value = order_no;
		document.frmOrderListHidden.submit();
	}
}

function orderStateChange(order_no, currorderstatus, val) {
	document.frmOrderChangeHidden.order_no.value = order_no;
	document.frmOrderChangeHidden.currorderstatus.value = currorderstatus;
	document.frmOrderChangeHidden.state.value = val;
	document.frmOrderChangeHidden.submit();
}

// 기간설정
function setPeriod(pdate){
	document.frmSort.s_date.value = pdate;
	document.frmSort.e_date.value = "<?=date("Y-m-d")?>";
}
</script>

<div id="admin-container">
	<? include "menu_order.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">주문 관리</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 주문 관리 &nbsp;&gt;&nbsp; <? if($_GET[mode]=="1") {?>주문 목록<? } else if($_GET[mode]=="2") {?>취소/교환/반품<? } else if($_GET[mode]=="3") {?>미주문<?}?></div>
	</div>

		<script language="javascript">
		function delOrder(order_no){
			var cfm;
			cfm =false;
			cfm = confirm(order_no + " 이 주문건을 삭제 하시겠습니까?");
			if(cfm==true){
				document.frmOrderListHidden.order_no.value = order_no;
				document.frmOrderListHidden.submit();
			}
		}
		</script>

		<h3 class="admin-title-middle">주문검색</h3>
		<form name="frmSort" method="get" action="<?=$_SERVER[PHP_SELF]?>">
		<input type="hidden" name="mode" value="<?=$_GET[mode]?>">
		<table  class="admin-table-type1">
		  <colgroup>
		  <col width="140" />
		  <col width="*" />
		  <col width="140" />
		  </colgroup>
		  <tbody>
			<tr>
			  <th>통합검색</th>
			  <td class="space-left">
				<select name="sw">
				<option value="all"<?=$_REQUEST[sw]=="all"?" selected":""?>>주문자명+회원ID</option>
				<option value="name"<?=$_REQUEST[sw]=="name"?" selected":""?>>주문자명</option>
				<option value="id"<?=$_REQUEST[sw]=="id"?" selected":""?>>회원ID</option>
				</select>
				<input type="text" name="sk" value="<?=$_REQUEST[sk]?>" class="input" />&nbsp;&nbsp;&nbsp;
		
				<select name="sw2">
				<option value="goodname"<?=$_REQUEST[sw2]=="goodname"?" selected":""?>>상품명</option>
				</select>
				<input type="text" name="sk2" value="<?=$_REQUEST[sk2]?>" class="input" />
			</td>
			<td rowspan="6"><span class="btn_pack xlarge"><input type="submit" style="width:100px;font-weight:bold" value=" 검 색 " /></span></td>
		  </tr>
		  <tr>
			 <th>주문상태</th>
			 <td class="space-left">
				<? if($_GET[mode]=="1") {?>
				<input type="checkbox" name="order_states[]" value="1" <? if (ereg("1", $orderstate)) echo "checked"; ?>/>입금대기 &nbsp;&nbsp;
				<input type="checkbox" name="order_states[]" value="6" <? if (ereg("6", $orderstate)) echo "checked"; ?> />입금확인 &nbsp;&nbsp;
				<input type="checkbox" name="order_states[]" value="7" <? if (ereg("7", $orderstate)) echo "checked"; ?> />배송준비중 &nbsp;&nbsp;
				<input type="checkbox" name="order_states[]" value="8" <? if (ereg("8", $orderstate)) echo "checked"; ?> />배송중 &nbsp;&nbsp;
				<input type="checkbox" name="order_states[]" value="9" <? if (ereg("9", $orderstate)) echo "checked"; ?> />구매완료 &nbsp;&nbsp;
				<?}else if($_GET[mode]=="2") {?>
				<input type="checkbox" name="order_states[]" value="2" <? if (ereg("2", $orderstate)) echo "checked"; ?>/>취소요청 &nbsp;&nbsp;
				<input type="checkbox" name="order_states[]" value="3" <? if (ereg("3", $orderstate)) echo "checked"; ?>/>취소완료 &nbsp;&nbsp;
				<input type="checkbox" name="order_states[]" value="4" <? if (ereg("4", $orderstate)) echo "checked"; ?>/>교환/반품요청 &nbsp;&nbsp;
				<input type="checkbox" name="order_states[]" value="5" <? if (ereg("5", $orderstate)) echo "checked"; ?>/>교환/반품완료 &nbsp;&nbsp;
				<?}else if($_GET[mode]=="3") {?>
				미주문 &nbsp;&nbsp;
				<?}?>
			 </td>
		  </tr>
		  <tr>
			 <th>처리일자</th>
			 <td class="space-left"><input type="radio" name="sh_date" value="order_date" <?=$_REQUEST["sh_date"]=="order_date"?"checked":""?>>주문일 &nbsp;&nbsp;
				  <input type="radio" name="sh_date" value="ipkum_date" <?=$_REQUEST["sh_date"]=="ipkum_date"?"checked":""?>>입금일 &nbsp;&nbsp;
				  <input type="radio" name="sh_date" value="shipping_date" <?=$_REQUEST["sh_date"]=="shipping_date"?"checked":""?>>배송일 &nbsp;&nbsp;
				  <input type="radio" name="sh_date" value="finish_date" <?=$_REQUEST["sh_date"]=="finish_date"?"checked":""?>>거래완료일 &nbsp;&nbsp;
				<input type="text" name="s_date" id="s_date" style="width:80px;"  class="datePicker input" value="<?=$_REQUEST[s_date]?>" /> ~ <input type="text" name="e_date" id="e_date" style="width:80px;"  class="datePicker input" value="<?=$_REQUEST[e_date]?>" />
				&nbsp;
				<?
				$yes_day = date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))-(3600*24*1));
				$yes3_day = date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))-(3600*24*3));
				$to_day = date('Y-m-d');
				$week_day = date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))-(3600*24*7));
				$month_day = date('Y-m-d', mktime(0,0,0,date('m'),date('d'),date('Y'))-(3600*24*30));
				?>
			  <span class="btn_pack small" style="margin-top:1px;"><a href="javascript:setPeriod('<?=$to_day?>')" style="color:#660000;">오늘</a></span>
			  <span class="btn_pack small" style="margin-top:1px;"><a href="javascript:setPeriod('<?=$yes_day?>')" style="color:#660000;">어제</a></span>
			  <span class="btn_pack small" style="margin-top:1px;"><a href="javascript:setPeriod('<?=$yes3_day?>')" style="color:#660000;">3일전</a></span>
			  <span class="btn_pack small" style="margin-top:1px;"><a href="javascript:setPeriod('<?=$week_day?>')" style="color:#660000;">1주일</a></span>
			  <span class="btn_pack small" style="margin-top:1px;"><a href="javascript:setPeriod('<?=$month_day?>')" style="color:#660000;">1개월</a></span>
			</td>
		  </tr>
		  <!--tr>
			 <th>결제방법</th>
			 <td class="space-left">
				<? foreach ($_SITE["SHOP"]["PAY_TYPE"] AS $key => $val){?>
				<input type="checkbox" name="pay_type[]" value="<?=$key?>" <? if (ereg($key, $paytype)) echo "checked"; ?>><?=$val?>  &nbsp;&nbsp;
				<?}?>
				</select>
			</td>
	      </tr-->
		  <tr>
			<th>결제가격</th>
			<td class="space-left">
				<input type="text" name="s_price" style="width:80px;" value="<?=$_REQUEST[s_price]?>" style="text-align:right" class="input" />원 ~ <input type="text" name="e_price" style="width:80px;" value="<?=$_REQUEST[e_price]?>" style="text-align:right" class="input" />원
			</td>
		  </tr>
		</table>
		</form>

		<br />

		<div class="clfix mgb5">
			<div class="fl" style="padding-top:5px;">&nbsp;<strong>전체 : <?=number_format($arrList['total'])?> 개</strong></div>
			<div class="fr"><span class="btn_pack medium icon"><span class="download"></span><a href="/backoffice/module/shop/order_to_csv.php?s_date=<?=$_REQUEST[s_date]?>&e_date=<?=$_REQUEST[e_date]?>&s_price=<?=$_REQUEST[s_price]?>&e_price=<?=$_REQUEST[e_price]?>&sw=<?=$_REQUEST[sw]?>&sk=<?=$_REQUEST[sk]?>&sk2=<?=$_REQUEST[sk2]?>&order_state=<?=$_REQUEST[order_state]?>&sh_date=<?=$_REQUEST[sh_date]?>&orderstate=<?=$orderstate?>&paytype=<?=$paytype?>&mode=<?=$_REQUEST[mode]?>" target="_blank">주문목록 CSV로 받기</a></span></div>
		</div>

		<table class="admin-table-type1">
		  <thead>
			<tr>
				<th>주문번호</th>
				<th>상품명</th>
				<th>주문자</th>
				<th>주문가격</th>
				<th>배송비</th>
				<!-- <th>적립금</th> -->
				<th>실결제</th>
				<th>주문상태</th>
				<th>결제방법</th>
				<th>결제구분</th>
				<th>주문일자</th>
				<th>&nbsp;</th>
			</tr>
		  </thead>
		  <tbody>
			<?
			if($arrList["total"]>0){
				for($i=0;$i<$arrList["list"]["total"];$i++){
					//합계금액 계산
					$totalPrice = $arrList["list"][$i][total_amount]+$arrList["list"][$i][ship_amount];
			?>
				<tr>
					<td><a href="order_detail.php?order_no=<?=$arrList["list"][$i][order_no]?>&listURL=<?=urlencode($_SERVER[REQUEST_URI])?>"><?=$arrList["list"][$i][order_no]?></a></td>
					<td class="space-left">
					<?=stripslashes($arrList["list"][$i][order_summary])?>
					</td>
					<?if($arrList["list"][$i][order_id] && $arrList["list"][$i][order_id]!="guest"):?>
					<td><a href="/backoffice/module/member/member_info.php?user_id=<?=$arrList["list"][$i][order_id]?>"><?=$arrList["list"][$i][order_name]?>(<?=$arrList["list"][$i][order_id]?>)</a></td>
					<?else:?>
					<td><?=$arrList["list"][$i][order_name]?>(비회원)</td>
					<?endif;?>
					<td><?=number_format($arrList["list"][$i][total_amount])?></td>
					<td><?=$arrList["list"][$i][ship_amount]==0?"무료":number_format($arrList["list"][$i][ship_amount])."원"?></td>
					<!-- <td><?=number_format($arrList["list"][$i][using_point])?></td> -->
					<td><?=number_format($arrList["list"][$i][pay_amount])?></td>
					<td><?=$_SITE["SHOP"]["ORDER_STATE"][$arrList["list"][$i][order_state]]?></td>
					<td><?=$_SITE["SHOP"]["PAY_TYPE"][$arrList["list"][$i][pay_type]]?></td>
					<td><?=$arrList["list"][$i][order_regnum1]=="P"?"PC":"모바일"?></td>
					<td><?=substr($arrList["list"][$i][order_date],0,10)?></td>
					<td><span class="btn_pack small icon"><span class="delete"></span><a href="javascript:delOrder('<?=$arrList['list'][$i]['order_no']?>');">주문삭제</a></span></td>
				</tr>
			<?	
				}
			?>
			<?
			}else{
			?>
			<tr height="100">
				<td colspan="11" align="center">주문내역이 없습니다.</td>
			</tr>
			<?}?>
		  </tbody>
		</table>

		<div class="paginate">
			<?=pageNavigation($arrList["total"],$scale,$pagescale,$_GET[offset],"sw=".$_REQUEST[sw]."&sk=".$_REQUEST[sk]."&sk2=".$_REQUEST[sk2]."&s_date=".$_REQUEST[s_date]."&e_date=".$_REQUEST[e_date]."&s_price=".$_REQUEST[s_price]."&e_price=".$_REQUEST[e_price]."&orderstate=".$orderstate."&paytype=".$paytype."&sh_date=".$_REQUEST[sh_date]."&mode=".$_REQUEST[mode])?>
		</div>

		<form name="frmOrderListHidden" method="post" action="order_evn.php">
		<input type="hidden" name="evnMode" value="delete">
		<input type="hidden" name="order_no">
		<input type="hidden" name="mode" value="<?=$_REQUEST[mode]?>">
		</form>

		<form name="frmOrderChangeHidden" method="post" action="order_evn.php">
		<input type="hidden" name="evnMode" value="order">
		<input type="hidden" name="order_no">
		<input type="hidden" name="currorderstatus">
		<input type="hidden" name="state">
		<input type="hidden" name="listURL" value="<?=$_SERVER[REQUEST_URI]?>">
		</form>

	</div>
</div><?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php" ;
?>