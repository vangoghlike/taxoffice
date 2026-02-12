{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">

{ ? STEP < '3' }

			<div class="telTab">
				<ul>
					<li{ ? STEP == '1' } class="active"{ / } style="width:50%">1단계</li>
					<li{ ? STEP == '2' } class="active"{ / } style="width:50%">2단계</li>
				</ul>
			</div>

{ / }

{ ? STEP == '1' }

			<div class="telTit pt30">
				<div class="tit01">결제 금액 선택하기</div>
				<div class="tit02">결제하실 금액을 선택하여 주세요. </div>
			</div>

			<form id="frm_tax4" name="frm_tax4" method="post" >
			<input type="hidden" name="step" value="2" />
			<input type="hidden" name="goods_idno" value="{ GOODS.idno }" />
			<div class="teslList3">
				<ul>
				{ @GOODS['option'] }
					<li>
						<div class="topInfo">
							<div class="selView">
								<div class="img">
									<img src="{ TYPE_URL }/images/bgnewpay.png" alt="보수결제{ .price }">
								</div>
								<div class="txt">
									<div class="tit01">{ ? .price > 0 }{ =number_format(.price) }원{ : }무료{ / }</div>
								</div>
							</div>
							<div class="btn">
								<input type="radio" name="option" id="point{ .idno }" value="{ .idno }" class="req" title="결제하실 금액을 선택하여 주세요." /> <label for="point{ .idno }">선택</label>
							</div>
						</div>
					</li>
				{ / }
				</ul>
			</div>
			<!-- <div class="btnCenter btn01"><a href="#" class="act_submit">다음</a></div> -->
			</form>

{ / }
{ ? STEP == '2' }

			<form id="frm_tax_pay" name="frm_tax_pay" method="post" >
			<input type="hidden" name="act" value="save" />
			<input type="hidden" name="status" value="0" />
			<input type="hidden" name="pay_status" value="1" />
			<input type="hidden" name="goods_idno" value="{ GOODS.idno }" />
			<input type="hidden" name="goods_name" value="{ GOODS.goods_name }" />
			<input type="hidden" name="option_idno" value="{ REQ.option }" />
			<input type="hidden" name="min_point" id="min_point" value="{ MIN_POINT }" />
			<input type="hidden" name="my_point" id="my_point" value="{ USER['point'] }" />
			<input type="hidden" name="price" id="price" value="{ OPTION['price'] }" />
			<input type="hidden" name="pay_price" id="pay_price" value="{ OPTION['price'] }" />

			<div class="whiteBox2">
				{ ? OPTION['price'] > 0 }
				<div class="site">
					<div class="left"><div class="tit">결제금액</div></div>
					<div class="right"><div class="blueTit fz18">{ =number_format(OPTION['price']) } 원</div></div>
				</div>
				
				<div class="site">
					<div class="left"><div class="tit">보유포인트</div></div>
					<div class="right">
						<div class="tit3">{ =number_format(USER['point']) } 포인트</div>
					</div>
				</div>
				
				<div class="site">
					<div class="left"><div class="tit">사용포인트</div></div>
					<div class="right">
						<div class="tit3"><input type="text" name="pay_point" class="point num" value="" /> 포인트</div>
						<div class="sm">( 보유포인트 { =number_format(MIN_POINT) } 이상일 경우 사용 가능)</div>
					</div>
				</div>
				
				<div class="site">
					<div class="left"><div class="tit">결제금액</div></div>
					<div class="right"><div class="blueTit fz18"><span id="amt">{ =number_format(OPTION['price']) }</span> 원</div></div>
				</div>
				<div class="btnCenter btn01"><a href="#" class="act_submit">결제하기</a></div>
				{ : }
				<div class="site">
					<div class="left"><div class="tit">결제금액</div></div>
					<div class="right"><div class="blueTit fz18">무료</div></div>
				</div>
				<div class="btnCenter btn01"><a href="#" class="act_submit">신청하기</a></div>
				{ / }
			</div>
			</form>

{ / }

		</div>
		<!-- //subContainer -->

{ #footer }

	</div>
	<!-- //Wrap -->

</body>
</html>
