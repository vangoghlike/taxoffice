{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">

			<div class="whiteBox2 mb10">
				<table class="base03">
					<colgroup>
						<col style="width:100px" />
						<col />
					</colgroup>
					<tbody>
						<tr>
							<th>상품명</th>
							<td>[{ DATA.goods_name }] { DATA.option_name }</td>
						</tr>
						<tr>
							<th>이름</th>
							<td>{ DATA.user_name }</td>
						</tr>
						<tr>
							<th>이메일</th>
							<td>{ DATA.email }</td>
						</tr>
						<tr>
							<th>휴대폰</th>
							<td>{ DATA.phone }</td>
						</tr>
						<tr>
							<th>기업명</th>
							<td>{ DATA.company }</td>
						</tr>
						<tr>
							<th>상담 세무사</th>
							<td>{ DATA.mngr_name }</td>
						</tr>
						<tr>
							<th>예약 날짜</th>
							<td>{ DATA.app_day }</td>
						</tr>
						<tr>
							<th>예약 시간</th>
							<td>{ DATA.app_time }</td>
						</tr>
						<tr>
							<th>상담 종류</th>
							<td>{ DATA.category_name }</td>
						</tr>
						<tr>
							<th>상담 내용</th>
							<td><b>{ DATA.subject }</b><br/>{ DATA.contents }</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="whiteBox2">
				
				<div class="site">
					<div class="left"><div class="tit">상담수수료</div></div>
					<div class="right"><div class="blueTit fz18">{ =number_format(DATA.price) } 원</div></div>
				</div>
				
				<div class="site">
					<div class="left"><div class="tit">사용포인트</div></div>
					<div class="right"><div class="tit3">{ =number_format(DATA.pay_point) } 포인트</div></div>
				</div>
				
				<div class="site">
					<div class="left"><div class="tit">결제금액</div></div>
					<div class="right"><div class="blueTit fz18"><span id="amt">{ =number_format(DATA.pay_price) }</span> 원</div></div>
				</div>

				<div class="btnCenter btn01"><a href="#" class="act_pay">결제하기</a></div>
			</div>
{ #pay }

		</div>
		<!-- //subContainer -->

{ #footer }

	</div>
	<!-- //Wrap -->

</body>
</html>
