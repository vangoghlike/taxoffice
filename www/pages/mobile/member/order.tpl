{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">

{ ? _GET.idno }

			{ ? DATA.goods_idno == 2 && DATA.status != '9' }
			<div class="consultStep">
				<ul>
					<li class="no1{ ? DATA.status == '1' } active{ / }">
						<span>접수중</span>
					</li>
					<li class="no2{ ? DATA.status == '2' } active{ / }">
						<span>추가 요청중</span>
					</li>
					<li class="no3{ ? DATA.status == '3' } active{ / }">
						<span>결제 대기중</span>
					</li>
					<li class="no4{ ? DATA.status == '4' } active{ / }">
						<span>결제 완료</span>
					</li>
					<li class="no5{ ? DATA.status == '5' } active{ / }">
						<span>신고 완료</span>
					</li>
				</ul>
			</div>
			{ / }

			<div class="whiteBox2">
				<div class="tit">신청 정보</div>
				<table class="base02">
					<colgroup>
						<col style="width:100px" />
						<col />
					</colgroup>
					<tbody>
						<tr>
							<th>구분</th>
							<td class="taxSort">{ DATA.goods_name }</td>
						</tr>
						{ ? DATA.goods_idno != 4 }
						<!-- cst-serim :: version1.00 :: user-info list update
						<tr>
							<th>업무선택</th>
							<td>{ DATA.category_name }</td>
						</tr>
						-->
						<tr>
							<th>담당 세무사</th>
							<td>{ DATA.mngr_name }</td>
						</tr>
						{ ? DATA.goods_idno == 1 }
						<tr>
							<th>예약일시</th>
							<td>{ DATA.app_date }</td>
						</tr>
						<tr>
							<th>이용시간</th>
							<td>{ DATA.app_minutes }분 ({ DATA.option_name })</td>
						</tr>
						<tr>
							<th>상담방법</th>
							<td>{ DATA.etc01 }</td>
						</tr>
						{ / }
						{ ? DATA.goods_idno == 2 }
						<tr>
							<th>상담방법</th>
							<td>{ =strtoupper(DATA.method) }</td>
						</tr>
						{ / }
						{ ? DATA.goods_idno == 3 }
						<tr>
							<th>상호</th>
							<td>{ DATA.company }</td>
						</tr>
						<tr>
							<th>대표자</th>
							<td>{ DATA.user_name }</td>
						</tr>
						<tr>
							<th>사업장 소재지</th>
							<td>{ DATA.addr }</td>
						</tr>
						<tr>
							<th>업종/업태</th>
							<td>{ DATA.com_kind }</td>
						</tr>
						<tr>
							<th>사업자등록번호</th>
							<td>{ DATA.com_regno }</td>
						</tr>
						<tr>
							<th>직전연도 매출</th>
							<td>{ DATA.sales }</td>
						</tr>
						<tr>
							<th>사업현황</th>
							<td>{ DATA.contents }</td>
						</tr>
						<!--
						<tr>
							<th>기타 문의사항</th>
							<td>{ DATA.contents2 }</td>
						</tr>
						-->
						{ : }
						<tr>
							<th>이름</th>
							<td>{ DATA.user_name }</td>
						</tr>
						<!--
						<tr>
							<th>기업명</th>
							<td>{ DATA.company }</td>
						</tr>
						-->
						{ / }
						<tr>
							<th>연락처</th>
							<td>{ DATA.phone }</td>
						</tr>
						<tr>
							<th>이메일</th>
							<td>{ DATA.email }</td>
						</tr>
						<tr>
							<th>신청일</th>
							<td>{ DATA.reg_day }</td>
						</tr>
						{ / }
						{ ? DATA.goods_idno != 2 || DATA.status == '9' }
						<tr>
							<th>진행상태</th>
							<td>{ DATA.status_name }</td>
						</tr>
						{ / }
					</tbody>
				</table>
				<div class="lastText">
				{ ? DATA.goods_idno == 2 }
					- 담당 세무사가 메일 검토 후 필요한 자료를 추가로 요청할 수 있습니다.  <br />- 추가 요청할 자료가 없는 경우 보수 협의 후 결제를 진행합니다. <br />- 오후 1시 이전 접수 시 당일 연락 드립니다. 감사합니다. <br/>
				{ / }
				{ ? DATA.goods_idno != 3 }
					- 결제 취소는 관리자(02-854-3311)에게 문의하여 주십시오.<br/>(이니시스를 통한 결제건은 결제사(이니시스)를 통해 환불되며 카드건은 카드사 사정에 따라 취소기간이 3~7일 정도 소요됩니다. 또한, 카드결제건은 현금으로 환불되지 않습니다. 환불기간 > 토/일/공휴일은 제외입니다. )
				{ / }
				</div>
			</div>

			{ ? DATA.status != '9' }
			{ ? DATA.goods_idno == 2 }
			{ ? DATA.status < '4' && DATA.price }
			<div class="consultViewList" style="margin-top:4px">
				<ul>
					<li>
						<form id="frm_tax_pay" name="frm_tax_pay" method="post" >
						<input type="hidden" name="act" value="save" />
						<input type="hidden" name="idno" value="{ DATA.idno }" />
						<input type="hidden" name="min_point" id="min_point" value="{ MIN_POINT }" />
						<input type="hidden" name="my_point" id="my_point" value="{ USER['point'] }" />
						<input type="hidden" name="price" id="price" value="{ DATA.price }" />
						<input type="hidden" name="pay_price" id="pay_price" value="{ DATA.price }" />
						<div class="whiteBox2">
							
							<div class="site">
								<div class="left"><div class="tit">상담수수료</div></div>
								<div class="right"><div class="blueTit fz18">{ =number_format(DATA.price) } 원</div></div>
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
								<div class="right"><div class="blueTit fz18"><span id="amt">{ =number_format(DATA.price) }</span> 원</div></div>
							</div>

							<div class="btnCenter btn01"><a href="#" class="act_submit">결제하기</a></div>
						</div>
						</form>
					</li>
				</ul>
			</div>
			{ : }
			<div class="btnTwo">
				<a href="#" class="btnGray act_ord_cancel" data-idno="{ DATA.idno }">취소하기</a>
				{ ? DATA.category_name == '부가가치세' }
				<a href="./153/213/read?&idno=2299" class="btnBlue">보수표 보러가기</a>
				{ : }
				<a href="./153/213/read?&idno=2298" class="btnBlue">보수표 보러가기</a>
				{ / }
			</div>
			{ / }
			{ : }
			{ ? DATA.pay_status < '4' }
			<div class="btnCenter seCst">
				<a href="#" class="btnGray act_ord_cancel payCant" data-idno="{ DATA.idno }">취소하기</a>
				<a href="./" class="btnBlue">홈으로</a>
			</div>
			{ / }
			{ / }
			{ / }

{ : }

			<div class="cosultWrap">

				<div class="top">
					<div class="count">총 { DATA['count'] }건</div>
					<div id="select_box">
						<form id="frm_search" name="frm_search">
						<label for="status">전체</label>
						<select id="status" class="m_select" name="status">
						<option value="">전체</option>
						{ @STATUS }
							<option value="{ .key_ }"{ ? _GET.status == .key_ } selected="selected"{ / }>{ .value_ }</option>
						{ / }
						</select>
						</form>
					</div>
				</div>


				<div class="consultList">
					<ul>
					{ @DATA['list'] }
						<li>
							<a href="./order?status={ _GET.status }&idno={ .idno }">
								<div class="tit">[{ .goods_name }] { .category_name }</div>
								<div class="info">
									<span class="date">{ .reg_day }</span>
									<span class="pg">{ .status_name }</span>
								</div>
							</a>
						</li>
					{ / }
					</ul>
				</div>

			</div>

{ / }

		</div>
		<!-- //subContainer -->

{ #footer }

	</div>
	<!-- //Wrap -->

</body>
</html>
