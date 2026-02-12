{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">

{ ? _GET.idno }

			<div class="whiteBox2">
				<div class="tit"><span class="user_name">{ DATA.user_name }({ DATA.user_id })</span>님 세액계산 내역</div>
				<table class="base02">
					<colgroup>
						<col style="width:100px" />
						<col />
					</colgroup>
					<tbody>
						<tr>
							<th>세액구분</th>
							<td class="taxSort">{ DATA.calc_type }</td>
						</tr>
						<tr>
							<th>납부세액</th>
							<td class="taxSort">{ =number_format(DATA.pay_price) } 원</td>
						</tr>
						<tr>
							<th>사용자명</th>
							<td class="taxSort">{ DATA.user_name }({ DATA.user_id })</td>
						</tr>
						<tr>
							<th>전체내역</th>
							<td class="taxSort">{ DATA.pay_detail }</td>
						</tr>
						<tr>
							<th>작성일시</th>
							<td class="taxSort">{ DATA.reg_date }</td>
						</tr>
						<tr>
							<th>등록IP</th>
							<td class="taxSort">{ DATA.reg_ip }</td>
						</tr>
					</tbody>
				</table>
			</div>

{ : }

			<div class="cosultWrap">

				<div class="top">
					<div class="count">총 { DATA['count'] }건</div>
				</div>
				
				<div class="consultList">
					<ul>
					{ @DATA['list'] }
						<li>
							<a href="./usertax?idno={ .idno }">
								<div class="tit">[{ .calc_type }] { .reg_date }</div>
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
