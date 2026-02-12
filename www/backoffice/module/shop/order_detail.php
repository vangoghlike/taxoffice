<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/shop/shop.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/board/board.lib.php";

if(!in_array("shop_order_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getOrderInfoAdmin(mysql_escape_string($_REQUEST["order_no"]));

//DB해제
SetDisConn($dblink);
?>

<?
//주문번호 확인 => 주문번호가 있어야만 주문가능
if($arrInfo["total"] > 0){
?>
<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/datePicker/jquery-ui-1.8.18.custom.min.js"></script>
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

function giftcardAdd(idx, price) {
	var cfm;
	cfm =false;
	cfm = confirm("상품권번호를 생성하시겠습니까?");
	if(cfm==true){
		document.frmContentsHidden.idx.value = idx;
		document.frmContentsHidden.price.value = price;
		document.frmContentsHidden.submit();
	}
}
</script>

<div id="admin-container">
	<? include "menu_order.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">주문 관리</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 주문 관리 &nbsp;&gt;&nbsp; 주문상세정보</div>
	</div>

		<h3 class="admin-title-middle">주문상품 목록</h3>
		<table class="admin-table-type1">
		  <colgroup>
		  <col width="70" />
		  <col width="100" />
		  <col width="*" />
		  <col width="120" />
		  <col width="100" />
		  <col width="80" />
		  <col width="120" />
		  </colgroup>
		  <thead>
			<tr>
			  <th>사진</th>
			  <th>상품코드</th>
			  <th>상품명</th>
			  <th>가격</th>
			  <th>적립금</th>
			  <th>수량</th>
			  <th>소계</th>
			</tr>
		  </thead>
		  <tbody>
			<?
			if($arrInfo["good_total"]>0){
				for($i=0;$i<$arrInfo["good_total"];$i++){
					//추가금액 계산
					$optionPrice = $arrInfo["good_list"][$i][g_opt_1_price] + $arrInfo["good_list"][$i][g_opt_2_price] + $arrInfo["good_list"][$i][g_opt_3_price] + $arrInfo["good_list"][$i][g_opt_4_price] + $arrInfo["good_list"][$i][g_opt_5_price];

					//합계금액 계산
					$totalPrice += ($arrInfo["good_list"][$i][g_price]*$arrInfo["good_list"][$i][g_qty])+($optionPrice * $arrInfo["good_list"][$i][g_qty]);

					//적립금 계산
					$pay_plus_point += $arrInfo["good_list"][$i][g_point];

					$gCode .= $arrInfo["good_list"][$i][g_code].", ";
			?>
				<tr>
					<td><a href="/shop.php?goPage=GoodDetail&idx=<?=$arrInfo["good_list"][$i][g_idx]?>" target="_blank"><img src="/uploaded/shop_good/<?=$arrInfo["good_list"][$i][g_idx]?>/<?=$arrInfo["good_list"][$i][image_s]?>" width="60"></a></td>
					<td><?=$arrInfo["good_list"][$i][g_code]?></td>
					<td class="space-left">
						<a href="/shop.php?goPage=GoodDetail&idx=<?=$arrInfo["good_list"][$i][g_idx]?>" target="_blank">						
						<?=stripslashes($arrInfo["good_list"][$i][g_name])?></a><br />
						<span style="color:#cfa54d;font-size:11px;">
							<?=$arrInfo["good_list"][$i][g_opt_1]?" ".$arrInfo["good_list"][$i][g_opt_1]:""?><?=$arrInfo["good_list"][$i][g_opt_1_price]?" +".number_format($arrInfo["good_list"][$i][g_opt_1_price]):""?>
							<?=$arrInfo["good_list"][$i][g_opt_2]?"| ".$arrInfo["good_list"][$i][g_opt_2]:""?><?=$arrInfo["good_list"][$i][g_opt_2_price]?" +".number_format($arrInfo["good_list"][$i][g_opt_2_price]):""?>
							<?=$arrInfo["good_list"][$i][g_opt_3]?"| ".$arrInfo["good_list"][$i][g_opt_3]:""?><?=$arrInfo["good_list"][$i][g_opt_3_price]?" +".number_format($arrInfo["good_list"][$i][g_opt_3_price]):""?>
							<?=$arrInfo["good_list"][$i][g_opt_4]?"| ".$arrInfo["good_list"][$i][g_opt_4]:""?><?=$arrInfo["good_list"][$i][g_opt_4_price]?" +".number_format($arrInfo["good_list"][$i][g_opt_4_price]):""?>
							<?=$arrInfo["good_list"][$i][g_opt_5]?"| ".$arrInfo["good_list"][$i][g_opt_5]:""?><?=$arrInfo["good_list"][$i][g_opt_5_price]?" +".number_format($arrInfo["good_list"][$i][g_opt_5_price]):""?>	
							<? if($arrInfo["good_list"][$i][g_cat_no]=="103") {
								$giftcardGb = "Y";
								if($arrInfo["good_list"][$i][g_vendor]) {
							?>
							상품권번호 : <?=stripslashes($arrInfo["good_list"][$i][g_vendor])?>
							<?} else {?>
							<a href="javascript:giftcardAdd(<?=$arrInfo["good_list"][$i][idx]?>, <?=$arrInfo["good_list"][$i][g_price]?>)">[상품권번호 생성]</a>
							<?}?>
							<?}?>
						</span>
					</td>
					<td><?=number_format($arrInfo["good_list"][$i][g_price]+$optionPrice)?></td>
					<td><?=number_format($arrInfo["good_list"][$i][g_point])?> <img src="/common/images/point.gif" width="11" height="11" align="absmiddle"/></td>
					<td><?=number_format($arrInfo["good_list"][$i][g_qty])?></td>
					<td><?=number_format(($arrInfo["good_list"][$i][g_price]*$arrInfo["good_list"][$i][g_qty])+($optionPrice * $arrInfo["good_list"][$i][g_qty]))?></td>
				</tr>
			<?	
				}
			?>
			<tr>
			  <td colspan="7">
				<table class="admin-table-type1 fr" style="width:300px !important">
				  <colgroup>
				  <col width="140" />
				  <col width="*" />
				  </colgroup>
				  <tbody>
				    <tr >
						<th>합계</th>
						<td class="space-left"><img src="/common/images/price.gif" width="11" height="11" align="absmiddle"/> <?=number_format($totalPrice)?></td>
					</tr>
					<tr >
						<th>배송비</th>
						<td class="space-left"><img src="/common/images/price.gif" width="11" height="11" align="absmiddle"/> <?=number_format($arrInfo["list"][0]["ship_amount"])?></th>
					</tr>
					<tr >
						<th>적립금사용</th>
						<td class="space-left">- <?=number_format($arrInfo["list"][0]["using_point"])?> <img src="/common/images/point.gif" width="11" height="11" align="absmiddle"/></td>
					</tr>
					<!-- tr >
						<th>쿠폰/상품권사용</th>
						<td class="space-left"><img src="/common/images/price.gif" width="11" height="11" align="absmiddle"/> - <?=number_format($arrInfo["list"][0]["coupon_amount"]+$arrInfo["list"][0]["giftcard_amount"])?></td>
					</tr-->
					<tr >
						<th>실 결제액</th>
						<td class="space-left"><img src="/common/images/price.gif" width="11" height="11" align="absmiddle"/> <b><?=number_format($arrInfo["list"][0]["pay_amount"])?></b></th>
					</tr>	
				  </tbody>
				</table>
			  </td>
			</tr>
			
			<?
			}else{
			?>
			<tr height="100">
				<td colspan="7" align="center">구매 항목이 없습니다.</td>
			</tr>
			<?}?>
		  </tbody>
		</table>

		<br />

		<form name="frmOrderInfo" id="frmOrderInfo" method="post" action="order_evn.php">
		<input type="hidden" name="evnMode" value="update">
		<input type="hidden" name="order_no" value="<?=$arrInfo["list"][0]["order_no"]?>">
		<input type="hidden" name="rt_url" value="<?=$_REQUEST[listURL]?>">
		<h3 class="admin-title-middle">주문관리</h3>
		<table class="admin-table-type1">
		  <colgroup>
		  <col width="140" />
		  <col width="*" />
		  </colgroup>
		  <tbody>
			<tr>
				<th>주문상태</th>
				<td class="space-left">
				  <select name="order_state">
				  <?foreach ($_SITE["SHOP"]["ORDER_STATE"] AS $key => $val){?>
				  <option value="<?=$key?>"<?=$arrInfo["list"][0]["order_state"]==$key?" selected":""?>><?=$val?></option>
				  <?}?>
				  </select> &nbsp;&nbsp;
				  <input type="checkbox" name="send_mail" value="Y" id="id_send_mail"><label for="id_send_mail">고객에게 정보수정 상태에 따른 메일 또는 문자(SMS) 발송</label>
				</td>
			</tr>
			<tr>
				<th>적립금 지급여부</th>
				<td class="space-left"><?=number_format($pay_plus_point)?> <img src="/common/images/point.gif" width="11" height="11" align="absmiddle"/> &nbsp;&nbsp;
				  <? if($arrInfo["list"][0]["pay_point"]=="Y"){?>
				  지급완료 <?=$arrInfo["list"][0]["pay_point_date"]?>
				  <? }else{ ?>
				  <!-- <input type="checkbox" name="pay_point" value="Y" id="id_pay_point"><label for="id_pay_point">고객에게 구매에 따른 적립금 지급</label> -->
				  <?}?>
				</td>
			</tr>
			<!-- <tr>
				<th>재고처리 여부</th>
				<td class="space-left">
				  <? if($arrInfo["list"][0]["stock_apply"]=="Y"){?>
				  재고처리완료 <?=$arrInfo["list"][0]["stock_apply_date"]?>
				  <? }else{ ?>
				  <input type="checkbox" name="stock_apply" value="Y" id="id_stock_apply"><label for="id_stock_apply">주문수량만큼 해당 상품의 재고 차감</label>
				  <?}?>
				</td>
			</tr> -->
			<? if($arrInfo["list"][0]["tid"]) {?>
			<tr>
				<th>PG사 구매 취소 여부</th>
				<td class="space-left">
				  <? if( substr($arrInfo["list"][0]["handling_date"],0,10) != "0000-00-00"){?>
				  PG구매취소 처리완료 (<?=$arrInfo["list"][0]["handling_date"]?>)
				  <? }else{ ?>
				  <input type="button" value=" 취소(환불)처리합니다. " onclick="javascript:window.open('/stdpay/INIStdPaySample/INIStdcancel_bob.php?tid=<?=$arrInfo["list"][0]["tid"]?>','','width=640, height=400, scrollbars=yes')">
				  <?}?>
				</td>
			</tr>
			<?}?>
			<tr>
				<th>입금일자</th>
				<td class="space-left">
				  <input type="text" name="ipkum_date" value='<?=$arrInfo["list"][0]["ipkum_date"]=="0000-00-00"?"":$arrInfo["list"][0]["ipkum_date"]?>' maxlength="10" class="datePicker input" />
				</td>
			</tr>
			<tr>
				<th>배송일자</th>
				<td class="space-left">
				  <input type="text" name="shipping_date" value='<?=$arrInfo["list"][0]["shipping_date"]=="0000-00-00"?"":$arrInfo["list"][0]["shipping_date"]?>' maxlength="10" class="input datePicker" />
				</td>
			</tr>
			<tr>
				<th>택배사</th>
				<td class="space-left">
				    <input type="text" name="shipping_company" value='<?=stripslashes($arrInfo["list"][0]["shipping_company"])?>' class="input" >
				</td>
			</tr>
			<tr>
				<th>송장번호</th>
				<td class="space-left">
				  <input type="text" name="shipping_no" value='<?=stripslashes($arrInfo["list"][0]["shipping_no"])?>' maxlength="50" class="input" /> <input type="button" value=" 배송추적 " onclick="javascript:window.open('<?=$arrSetInfo["list"][0][shop_delivery_url]?><?=stripslashes($arrInfo["list"][0]["shipping_no"])?>','','width=800, height=600, scrollbars=yes')">
				</td>
			</tr>
			<tr>
				<th>관리자 메모</th>
				<td class="space-left">
				  <textarea name="admin_comment" style="width:99%;height:50px;" class="textarea"><?=stripslashes($arrInfo["list"][0]["admin_comment"])?></textarea>
				</td>
			</tr>
		  </tbody>
		</table>
		<div class="admin-buttons">
			<div class="cen">
				<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="정보수정" style="font-weight:bold" /></span> 
				<span class="btn_pack xlarge"><input type="button" value="이전목록" style="font-weight:bold;color:#888;" onclick="location.href='<?=$listURL?>';" /></span>
			</div>
		</div>
		</form>


		<br />
		<!-- 주문정보 -->
		<h3 class="admin-title-middle">주문정보</h3>
		<table class="admin-table-type1">
		  <colgroup>
		  <col width="140" />
		  <col width="*" />
		  </colgroup>
		  <tbody>
			<tr>
				<th>접속사이트</th>
				<td class="space-left"><?=$arrInfo["list"][0]["order_regnum1"]=="P"?"PC":"모바일"?></td>
			</tr>
			<tr>
				<th>상품코드</th>
				<td class="space-left"><?=substr($gCode,0,-2)?></td>
			</tr>
			<tr>
				<th>주문번호</th>
				<td class="space-left"><?=$arrInfo["list"][0]["order_no"]?></td>
			</tr>
			<tr>
				<th>주문내역</th>
				<td class="space-left"><?=$arrInfo["list"][0]["order_summary"]?></td>
			</tr>
			<tr>
				<th>결제방법</th>
				<td class="space-left">
					<?=$_SITE["SHOP"]["PAY_TYPE"][$arrInfo["list"][0]["pay_type"]]?>
				</td>
			</tr>

			<?if($arrInfo["list"][0]["pay_type"]=="cash"):?>
			<tr>
				<th>입금계좌</th>
				<td class="space-left"><?=$arrInfo["list"][0]["bank_type"]?></td>
			</tr>
			<tr>
				<th>입금자명</th>
				<td class="space-left"><?=$arrInfo["list"][0]["bank_name"]?></td>
			</tr>
			<tr>
				<th>입금자예정일</th>
				<td class="space-left"><?=$arrInfo["list"][0]["bank_date"]?></td>
			</tr>
			<?endif;?>

			<tr>
				<th>적립금 사용</th>
				<td class="space-left">- <?=number_format($arrInfo["list"][0]["using_point"])?> <img src="/common/images/point.gif" width="11" height="11" align="absmiddle"/></td>
			</tr>
			<tr>
				<th>쿠폰/상품권 사용</th>
				<td class="space-left"><img src="/common/images/price.gif" width="11" height="11" align="absmiddle"/> - <?=number_format($arrInfo["list"][0]["coupon_amount"]+$arrInfo["list"][0]["giftcard_amount"])?></td>
			</tr>
			<tr>
				<th>배송비</th>
				<td class="space-left"><img src="/common/images/price.gif" width="11" height="11" align="absmiddle"/> <?=$arrInfo["list"][0]["ship_amount"]>0?number_format($arrInfo["list"][0]["ship_amount"])."":"배송비무료"?></td>
			</tr>
			<tr>
				<th>주문가</th>
				<td class="space-left"><img src="/common/images/price.gif" width="11" height="11" align="absmiddle"/> <?=number_format($arrInfo["list"][0]["total_amount"])?></td>
			</tr>
			<tr>
				<th>실결제</th>
				<td class="space-left"><img src="/common/images/price.gif" width="11" height="11" align="absmiddle"/> <?=number_format($arrInfo["list"][0]["pay_amount"])?></td>
			</tr>


			<tr>
				<th>주문하시는분</th>
				<td class="space-left"><?=$arrInfo["list"][0]["order_name"]?></td>
			</tr>
			<!-- <tr>
				<th>주소</th>
				<td class="space-left"><?=$arrInfo["list"][0]["order_zip"]?> <?=$arrInfo["list"][0]["order_address"]?> <?=$arrInfo["list"][0]["order_address_ext"]?></td>
			</tr> -->
			<tr>
				<th>전화번호</th>
				<td class="space-left"><?=$arrInfo["list"][0]["order_phone"]?></td>
			</tr>
			<!-- <tr>
				<th>핸드폰번호</th>
				<td class="space-left"><?=$arrInfo["list"][0]["order_mobile"]?></td>
			</tr> -->
			<tr>
				<th>이메일</th>
				<td class="space-left"><?=$arrInfo["list"][0]["order_email"]?></td>
			</tr>
			<tr>
				<th>받으실분</th>
				<td class="space-left"><?=$arrInfo["list"][0]["ship_name"]?></td>
			</tr>
			<? if($giftcardGb=="Y") {?>
			<tr>
				<th>발송 핸드폰번호</th>
				<td class="space-left"><?=$arrInfo["list"][0]["ship_mobile"]?></td>
			</tr>
			<tr>
				<th>발송 이메일</th>
				<td class="space-left"><?=$arrInfo["list"][0]["ship_email"]?></td>
			</tr>
			<tr>
				<th>메모</th>
				<td class="space-left"><?=stripslashes($arrInfo["list"][0]["order_comment"])?></td>
			</tr>
			<tr>
				<th>발송유형</th>
				<td class="space-left"><? if($arrInfo["list"][0]["mail_sms"]=="MS") {?>전체(메일, 문자)
				<?} else  if($arrInfo["list"][0]["mail_sms"]=="M") {?>메일
				<?} else  if($arrInfo["list"][0]["mail_sms"]=="S") {?>문자
				<?} ?></td>
			</tr>
			<?}else{?>
			<tr>
				<th>받으실곳</td>
				<td class="space-left"><?=$arrInfo["list"][0]["ship_zip"]?> <?=$arrInfo["list"][0]["ship_address"]?> <?=$arrInfo["list"][0]["ship_address_ext"]?></td>
			</tr>
			<tr>
				<th>전화번호</th>
				<td class="space-left"><?=$arrInfo["list"][0]["ship_phone"]?></td>
			</tr>
			<tr>
				<th>핸드폰번호</th>
				<td class="space-left"><?=$arrInfo["list"][0]["ship_mobile"]?></td>
			</tr>
			<tr>
				<th>남기실 말씀</th>
				<td class="space-left"><?=stripslashes($arrInfo["list"][0]["order_comment"])?></td>
			</tr>
			<?}?>
		  </tbody>
		</table>

		<? if($arrInfo["list"][0]["charge_type"] && $arrInfo["list"][0]["claim_date"]) {?>
		<br />
		<!-- 주문정보 -->
		<h3 class="admin-title-middle">반품/교환 정보</h3>
		<table class="admin-table-type1">
		  <colgroup>
		  <col width="140" />
		  <col width="*" />
		  </colgroup>
		  <tbody>
			<tr>
				<th>반품/교환</th>
				<td class="space-left"><?=$arrInfo["list"][0]["charge_type"]?></td>
			</tr>
			<tr>
				<th>사유</th>
				<td class="space-left"><?=nl2br(stripslashes($arrInfo["list"][0]["claim_comment"]))?></td>
			</tr>
			<tr>
				<th>신청일</th>
				<td class="space-left"><?=$arrInfo["list"][0]["claim_date"]?></td>
			</tr>
		  </tbody>
		</table>
		<?}?>

		<!-- 주문정보 -->
		<?
		}else{
		?>
		<h3 class="admin-title-middle">주문정보</h3>
		<table class="admin-table-type1">
		  <tbody>
			<tr>
				<td height="100">해당하는 주문내역이 없습니다.</td>
			</tr>
		  </tbody>
		</table>

		<?
		}
		?>
	</div>
</div>
<form name="frmContentsHidden" method="post" action="order_evn.php">
<input type="hidden" name="evnMode" value="giftcard">
<input type="hidden" name="idx">
<input type="hidden" name="price">
<input type="hidden" name="order_no" value="<?=$arrInfo["list"][0]["order_no"]?>">
<input type="hidden" name="returnURL" value="<?=$_SERVER[REQUEST_URI]?>">
</form>

<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php" ;
?>