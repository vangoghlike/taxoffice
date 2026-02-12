<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/header.php";?>
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

<!-- subContainer -->
<div class="subContainer tax4">
	<div class="telTit pt30">
		<div class="tit01">결제 금액 선택하기</div>
		<div class="tit02">결제 액의 5% 포인트 적립 (기장료 조정료 결제 가능합니다.)</div>
	</div>
	<form id="frm_tax_pay" name="frm_tax_pay" method="post">
		<input type="hidden" name="act" value="save" />
		<input type="hidden" name="status" value="0" />
		<input type="hidden" name="pay_status" value="1" />
		<input type="hidden" name="goods_idno" value="4" />
		<input type="hidden" name="goods_name" value="보수결제" />
		<input type="hidden" name="min_point" id="min_point" value="5000" />
		<input type="hidden" name="my_point" id="my_point" value="0" />
		<input type="hidden" name="price" id="price" value="" />
		<input type="hidden" name="pay_price" id="pay_price" value="" />
		<div class="teslList3">
			<ul>
				<li>
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/pages/default/images/pay/bgnewpay.png" alt="보수결제55000">
							</div>
							<div class="txt">
								<div class="tit01">55,000원</div>
							</div>
						</div>
						<div class="btn">
							<input type="radio" name="option_idno" id="point6" value="6" class="req" title="결제하실 금액을 선택하여 주세요." data-price="55000" /> <label for="point6">선택</label>
						</div>
					</div>
				</li>
				<li>
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/pages/default/images/pay/bgnewpay.png" alt="보수결제110000">
							</div>
							<div class="txt">
								<div class="tit01">110,000원</div>
							</div>
						</div>
						<div class="btn">
							<input type="radio" name="option_idno" id="point7" value="7" class="req" title="결제하실 금액을 선택하여 주세요." data-price="110000" /> <label for="point7">선택</label>
						</div>
					</div>
				</li>
				<li>
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/pages/default/images/pay/bgnewpay.png" alt="보수결제165000">
							</div>
							<div class="txt">
								<div class="tit01">165,000원</div>
							</div>
						</div>
						<div class="btn">
							<input type="radio" name="option_idno" id="point8" value="8" class="req" title="결제하실 금액을 선택하여 주세요." data-price="165000" /> <label for="point8">선택</label>
						</div>
					</div>
				</li>
				<li>
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/pages/default/images/pay/bgnewpay.png" alt="보수결제220000">
							</div>
							<div class="txt">
								<div class="tit01">220,000원</div>
							</div>
						</div>
						<div class="btn">
							<input type="radio" name="option_idno" id="point9" value="9" class="req" title="결제하실 금액을 선택하여 주세요." data-price="220000" /> <label for="point9">선택</label>
						</div>
					</div>
				</li>
				<li>
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/pages/default/images/pay/bgnewpay.png" alt="보수결제275000">
							</div>
							<div class="txt">
								<div class="tit01">275,000원</div>
							</div>
						</div>
						<div class="btn">
							<input type="radio" name="option_idno" id="point10" value="10" class="req" title="결제하실 금액을 선택하여 주세요." data-price="275000" /> <label for="point10">선택</label>
						</div>
					</div>
				</li>
				<li>
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/pages/default/images/pay/bgnewpay.png" alt="보수결제330000">
							</div>
							<div class="txt">
								<div class="tit01">330,000원</div>
							</div>
						</div>
						<div class="btn">
							<input type="radio" name="option_idno" id="point12" value="12" class="req" title="결제하실 금액을 선택하여 주세요." data-price="330000" /> <label for="point12">선택</label>
						</div>
					</div>
				</li>
				<li>
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/pages/default/images/pay/bgnewpay.png" alt="보수결제550000">
							</div>
							<div class="txt">
								<div class="tit01">550,000원</div>
							</div>
						</div>
						<div class="btn">
							<input type="radio" name="option_idno" id="point17" value="17" class="req" title="결제하실 금액을 선택하여 주세요." data-price="550000" /> <label for="point17">선택</label>
						</div>
					</div>
				</li>
				<li>
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/pages/default/images/pay/bgnewpay.png" alt="보수결제770000">
							</div>
							<div class="txt">
								<div class="tit01">770,000원</div>
							</div>
						</div>
						<div class="btn">
							<input type="radio" name="option_idno" id="point19" value="19" class="req" title="결제하실 금액을 선택하여 주세요." data-price="770000" /> <label for="point19">선택</label>
						</div>
					</div>
				</li>
				<li>
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/pages/default/images/pay/bgnewpay.png" alt="보수결제1100000">
							</div>
							<div class="txt">
								<div class="tit01">1,100,000원</div>
							</div>
						</div>
						<div class="btn">
							<input type="radio" name="option_idno" id="point20" value="20" class="req" title="결제하실 금액을 선택하여 주세요." data-price="1100000" /> <label for="point20">선택</label>
						</div>
					</div>
				</li>
				<li>
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/pages/default/images/pay/bgnewpay.png" alt="보수결제1100">
							</div>
							<div class="txt">
								<div class="tit01">1,100원</div>
							</div>
						</div>
						<div class="btn">
							<input type="radio" name="option_idno" id="point21" value="21" class="req" title="결제하실 금액을 선택하여 주세요." data-price="1100" /> <label for="point21">선택</label>
						</div>
					</div>
				</li>
				<li>
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/pages/default/images/pay/bgnewpay.png" alt="보수결제">&nbsp;&nbsp;<input class="point_txt_filed" type="number" value="" placeholder="금액입력" />
							</div>
							<div class="txt" style="display: inline-block; padding-top:0.375rem; margin-left:0.5rem;">
								원
							</div>
						</div>
						<div class="btn choice_btn">
							<input type="radio" name="option_idno" id="point_choice" value="" class="req" title="결제하실 금액을 선택하여 주세요." data-price="" /> <label for="point_choice">선택</label>
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
					<div class="tit3">0 포인트</div>
				</div>
			</div>
			<div class="site">
				<div class="left">
					<div class="tit">사용포인트</div>
				</div>
				<div class="right">
					<div class="tit3"><input type="text" name="pay_point" class="point num" value="0" /> 포인트</div>
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
			<div class="btnCenter btn01"><a href="#" class="act_submit">결제하기</a></div>
		</div>
	</form>
</div>
<!-- //subContainer -->
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>