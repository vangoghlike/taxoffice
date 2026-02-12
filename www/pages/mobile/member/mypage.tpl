{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">

			<div class="myPageMain">

				<div class="topInfo">
					<div class="line">
						<div class="tit bold">{ USER['user_name'] }님</div>
						<a href="{BASE_URL}/userinfo" class="edit">정보변경</a>
					</div>
					<div class="line bbNone">
						<div class="tit">내 포인트</div>
						<div class="point"><span>{ =number_format(USER['point']) }P</span></div>
					</div>
				</div>

				<div class="box">
					<div class="top">
						<div class="tit">나의 상담 내역</div>
						<a href="./order">더보기</a>
					</div>
					<div class="cont">
						
						<table class="base01">
							<colgroup>
								<col style="width:25%;" />
								<col style="width:25%;" />
								<col style="width:25%;" />
								<col />
							</colgroup>
							<thead>
								<tr>
									<th>구분</th>
									<th>업무 선택</th>
									<th>담당 세무사</th>
									<th>진행상태</th>
								</tr>
							</thead>
							<tbody>
							{ @ORDER }
								
								<tr>
									<td>
										<a href="./order?status={ _GET.status }&idno={ .idno }">{ .goods_name }</a>
									</td>
									<td>
										<a href="./order?status={ _GET.status }&idno={ .idno }">{ .category_name }</a>
									</td>
									<td>
										<a href="./order?status={ _GET.status }&idno={ .idno }">{ .mngr_name }</a>
									</td>
									<td>
										<a href="./order?status={ _GET.status }&idno={ .idno }">{ .status_name }</a>
									</td>
								</tr>
								
							{ / }
							{ ? !ORDER.size_ }
								<tr class="allmerge">
									<td>상담 내역이 없습니다.</td>
								</tr>
							{ / }
							</tbody>
						</table>
						
					</div>
					
				</div>

				<div class="box">
					<div class="top">
						<div class="tit">나의 결제 내역</div>
						<a href="./pay">더보기</a>
					</div>
					<div class="cont">
						<a href="./pay">
						<table class="base01">
							<colgroup>
								<col style="width:33.3%;" />
								<col style="width:33.3%;" />
								<col />
							</colgroup>
							<thead>
								<tr>
									<th>결제 금액</th>
									<th>결제 수단</th>
									<th>구매일자</th>
								</tr>
							</thead>
							<tbody>
							{ @PAY }
								<tr>
									<td>{ .price }</td>
									<td>{ .pay_method_name }</td>
									<td>{ .reg_date }</td>
								</tr>
							{ / }
							{ ? !PAY.size_ }
								<tr class="allmerge">
									<td>결제 내역이 없습니다.</td>
								</tr>
							{ / }
							</tbody>
						</table>
						</a>
					</div>
					
				</div>
				
				{ ? USER['user_id'] }
					{ ? USER['user_id'] == 'admin' }
				<div class="box">
					<div class="top">
						<div class="tit">나의 세액계산 내역</div>
						<a href="./usertax">더보기</a>
					</div>
					<div class="cont">
						
						<table class="base01">
							<colgroup>
								<col style="width:25%;" />
								<col style="width:25%;" />
								<col style="width:25%;" />
								<col />
							</colgroup>
							<thead>
								<tr>
									<th>구분</th>
									<th>납부 세액</th>
									<th>저장 일시</th>
								</tr>
							</thead>
							<tbody>
							{ @CALC_LIST }
								
								<tr>
									<td>
										<a href="./usertax?idno={ .idno }">{ .calc_type }</a>
									</td>
									<td>
										<a href="./usertax?idno={ .idno }">{ =number_format(.pay_price) } 원</a>
									</td>
									<td>
										<a href="./usertax?idno={ .idno }">{ .reg_date }</a>
									</td>
								</tr>
								
							{ / }
							{ ? !CALC_LIST.size_ }
								<tr class="allmerge">
									<td>세액계산 저장내역이 없습니다.</td>
								</tr>
							{ / }
							</tbody>
						</table>
						
					</div>
					
				</div>
					{ / }
				{ / }
				
				<div class="box">
					<div class="top">
						<div class="tit">이용가이드</div>
						<a href="{BOARD_GUIDE['url']}">더보기</a>
					</div>
					<div class="cont">
						<ul class="guideList">
						{ @BOARD_GUIDE['list'] }
						{ ? .index_ < 3 }
							<li><a href="{BOARD_GUIDE['url']}read?idno={ .idno }">{ .subject }</a></li>
						{ / }
						{ / }
						{ ? !sizeof(BOARD_GUIDE['list']) }
							<li>등록된 게시물이 없습니다.</li>
						{ / }
						</ul>
					</div>

				</div>

				<div class="box mb0 bbBottom">
					<div class="iconList tp01">
						<ul>
							<li class="no1"><a href="{BASE_URL}/112">공지사항</a></li>
							<li class="no1"><a href="{BASE_URL}/138">이벤트</a></li>
							<li class="no2"><a href="{BASE_URL}/107">세무지식 콘텐츠</a></li>
							<li class="no2"><a href="{BASE_URL}/153">보수안내</a></li>
							<li class="no3"><a href="{BASE_URL}/108">자주하는 질문</a></li>
							<li class="no4"><a href="{BASE_URL}/111">1:1 문의</a></li>
						</ul>
					</div>					
				</div>
				<div class="box mb0 bbBottom">
					<div class="iconList tp02">
						<ul>
							<li class="no1"><a href="{BASE_URL}/policy">개인정보처리방침</a></li>
							<li class="no2"><a href="{BASE_URL}/agree">이용약관</a></li>
						</ul>
					</div>					
				</div>
				<div class="box mb0 ">

					<div class="iconList tp03">
						<ul>
							<li class="no1"><a href="/common/member/logout.php?url={BASE_URL}/">로그아웃</a></li>
						</ul>
					</div>					
				</div>


			</div>

		</div>
		<!-- //subContainer -->

{ #footer }

	</div>
	<!-- //Wrap -->

</body>
</html>
