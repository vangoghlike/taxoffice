<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/consult/consult.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php");
?>
<?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] == ""){?>
<script>
	alert("로그인이 필요한 페이지 입니다.");
	location.href="/member/login.php";
</script>
<?}else{?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/header.php";?>
<?
$dblink = SetConn($_conf_db["main_db"]);
	$_REQUEST["idx"] = "4";
	$arrInfo = getConsultInfo($_REQUEST["idx"]);
	$arrPayList = getPayList(0, 0);
	$arrMemberInfo = getUserInfo($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);
//DB해제
SetDisConn($dblink);
?>

<!-- sub_title -->
<div class="sub_title">
	<div class="content_wrap">
		<p>
			여러분의 세무도우미,<br />
			<strong>세림세무법인의 MANPOWER</strong>
		</p>
	</div>
</div>
<!-- sub_title end -->
<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20210820015" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<script>
	function frmchk(frm){
		if(frm.price.value < 1000){
			alert("금액은 1,000원 이상 결제해야 사용가능합니다.");
			return;
		}
		if(frm.pay_price.value < 1000 && frm.pay_price.value != 0){
			alert("금액은 1,000원 이상 결제해야 사용가능합니다.");
			return;
		}
		frm.submit();
	}
</script>
<!-- subContainer -->
<div class="subContainer tax4">
	<div class="telTit pt30">
		<div class="tit01">결제 금액 선택하기</div>
		<div class="tit02"><?=$arrInfo["list"][0]["subject"]?></div>
	</div>
	<form id="frm_tax_pay" name="frm_tax_pay" method="post" action="/module/consult/pay_evn.php">
		<input type="hidden" name="evnMode" value="pay" />
		<input type="hidden" name="status" value="0" />
		<input type="hidden" name="pay_status" value="1" />
		<input type="hidden" name="goods_idx" value="4" />
		<input type="hidden" name="goods_name" value="보수결제" />
		<input type="hidden" name="min_point" id="min_point" value="5000" />
		<input type="hidden" name="my_point" id="my_point" value="<?=$arrMemberInfo["list"][0]["etc_2"] == ""?"0":$arrMemberInfo["list"][0]["etc_2"]?>" />
		<input type="hidden" name="price" id="price" value="" />
		<input type="hidden" name="pay_price" id="pay_price" value="" />
		<div class="teslList3">
			<ul>
				<?
				if($arrPayList["total"] > 0){
					for($i=0;$i<$arrPayList["total"];$i++){
				?>
				<li>
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/pages/default/images/pay/bgnewpay.png" alt="보수결제<?=$arrPayList["list"][$i]["price"]?>">
							</div>
							<div class="txt">
								<div class="tit01"><?=number_format($arrPayList["list"][$i]["price"],0)?>원</div>
							</div>
						</div>
						<div class="btn">
							<input type="radio" name="option_idx" id="point<?=$arrPayList["list"][$i]["idx"]?>" value="<?=$arrPayList["list"][$i]["idx"]?>" class="req" title="결제하실 금액을 선택하여 주세요." data-price="<?=$arrPayList["list"][$i]["price"]?>" /> <label for="point<?=$arrPayList["list"][$i]["idx"]?>">선택</label>
						</div>
					</div>
				</li>
				<?
					}
				}
				?>
				<li>
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/pages/default/images/pay/bgnewpay.png" alt="보수결제">&nbsp;&nbsp;<input class="point_txt_filed" style="border:1px solid #ddd;" type="number" value="0" placeholder="금액입력" />
							</div>
							<div class="txt" style="display: inline-block; padding-top:0.375rem; margin-left:0.5rem;">
								원
							</div>
						</div>
						<div class="btn choice_btn">
							<input type="radio" name="option_idx" id="point_choice" value="" class="req" title="결제하실 금액을 선택하여 주세요." data-price="" /> <label for="point_choice">선택</label>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="bankInfo">
			<p class="title">&nbsp;세림세무법인 계좌번호 안내</p>
			<p>신한은행 100-024-307703 “세림세무법인”</p>
			<p>산업은행 022-2300-6082-701 “세림세무법인”</p>
		</div>
		<div class="whiteBox2" id="cont-pay" style="display:none">
			<div class="site">
				<div class="left">
					<div class="tit">결제금액</div>
				</div>
				<div class="right">
					<div class="blueTit fz18"><span id="org_price"></span> 원</div>
				</div>
			</div>
			<div class="site">
				<div class="left">
					<div class="tit">보유포인트</div>
				</div>
				<div class="right">
					<div class="tit3"><?=number_format($arrMemberInfo["list"][0]["etc_2"] == ""?"0":$arrMemberInfo["list"][0]["etc_2"])?> 포인트</div>
				</div>
			</div>
			<div class="site">
				<div class="left">
					<div class="tit">사용포인트</div>
				</div>
				<div class="right">
					<div class="tit3"><input type="text" name="pay_point" class="point num" oninput="this.value.replace(/[^0-9]/g, '')" value="0" /> 포인트</div>
					<div class="sm">( 보유포인트 5,000 이상일 경우 사용 가능)</div>
				</div>
			</div>
			<div class="site">
				<div class="left">
					<div class="tit">결제금액</div>
				</div>
				<div class="right">
					<div class="blueTit fz18"><span id="amt"></span> 원</div>
				</div>
			</div>
			<div class="btnCenter btn01"><a style="cursor:pointer;" onclick="frmchk(document.frm_tax_pay)" class="act_submit">결제하기</a></div>
		</div>
	</form>
</div>
<script>
	
$(function() {
	$(document).on('keyup change', 'input[name=pay_point]', function() {
		var pay_point = parseInt($(this).val());
		var my_point = parseInt($('#my_point').val());
		var price = parseInt($('#price').val());
		if (pay_point > my_point) {
			alert('보유하신 포인트보다 큽니다.');
			$(this).val('0').focus();
			pay_point = 0;
		}
		if (pay_point > price) {
			alert('현재 금액이 보유하신 포인트보다 작습니다.');
			$(this).val('0').focus();
			pay_point = 0;
		}
		var pay_price = price - pay_point;
		$('input[name=pay_price]').val(pay_price);
		$('#amt').text(pay_price.toLocaleString());
		return true;
	});
	$('.choice_btn').on('click', function() {
		var cprice_val = $('.point_txt_filed').val();
		$('input#point_choice[name="option_idx"]').val(cprice_val);
		$('input#point_choice[name="option_idx"]').data('price',cprice_val);
	});
	$(document).on('change', 'input:radio[name=option_idx]', function() {
		var price = $(this).data('price');
		if ($('#price').val() == '') $('#cont-pay').show();
		$('#org_price').text(price.toLocaleString());
		$('#amt').text(price.toLocaleString());
		$('#price').val(price);
		$('input[name=pay_point]').trigger('change');
		var top = document.getElementById("cont-pay").getBoundingClientRect().top;
		$('body,html').stop().animate({ scrollTop: top }, 100);
		$('.act_submit').focus();
	});
});
</script>
<!-- //subContainer -->
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>
<?}?>