{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">
{ ? STEP < '5' }


			<div class="telTab">
				{ ? TF_TYPE != '방문상담' }
				<ul class="three">
					<li{ ? STEP == '1' } class="active"{ / }>상담세목 선택</li>
					<li{ ? STEP == '2' } class="active"{ / }>세무사 선정</li>
					<li{ ? STEP == '3' } class="active"{ / }>{ TF_TYPE }</li>
				</ul>
				{ : }
				<ul class="four">
					<li{ ? STEP == '1' } class="active"{ / }>상담세목 선택</li>
					<li{ ? STEP == '2' } class="active"{ / }>세무사 선정</li>
					<li{ ? STEP == '3' } class="active"{ / }>상담일정 선택</li>
					<li{ ? STEP == '4' } class="active"{ / }>{ TF_TYPE }</li>
				</ul>
				{ / }
			</div>

{ / }

{ ? STEP == '1' }
			<!--선택버튼 추가-->
			<div class="selectList">
				<ul>
					<li class="menu { ? TF_TYPE == '전화상담' }active{ / }">
						<a href="{ BASE_URL }/tax1?tp=call"><i class="fa fa-phone"></i>&nbsp;&nbsp;전화상담</a>
					</li>
					<li class="menu { ? TF_TYPE == '방문상담' }active{ / }">
						<a href="{ BASE_URL }/tax1?tp=visit"><i class="fa fa-envelope"></i>&nbsp;&nbsp;방문상담</a>
					</li>
				</ul>
			</div>

			<!--//선택버튼 추가-->
			<div class="colBox3">
				<!--
				<div class="telTit">
					<div class="tit01">어떤 업무를 상담받고 싶으신가요?</div>
					<div class="tit02">아래에서 상담을 원하시는 업무를 선택해주세요.</div>
				</div>
				-->

				<form id="frm_tax1" name="frm_tax1" method="post" >
				<input type="hidden" name="step" value="2" />
				<input type="hidden" name="goods_idno" value="{ GOODS.idno }" />
				<input type="hidden" name="category" value="" />
				<input type="hidden" name="category_name" value="" />


				<ul class="option category">
				{ @GOODS['category'] }
					<!-- <li data-idno="{ .idno }" data-name="{ .category_name }"><button>{ .category_name }</button></li>-->
				{ / }
					{ ? TF_TYPE == '방문상담' }
					<li data-idno="347" data-name="1본부 (비즈BIZ)"><button>1본부 (비즈BIZ)</button></li>
					<li data-idno="348" data-name="2본부 (외투FDI)"><button>2본부 (외투FDI)</button></li>
					{ / }
					<li data-idno="335" data-name="양도소득세, 지방세, 종부세"><button>양도소득세, 지방세, 종부세</button></li>
                    <li data-idno="336" data-name="증여세, 상속세"><button>증여세, 상속세</button></li>
                    <li data-idno="337" data-name="법인세, 부가세"><button>법인세, 부가세</button></li>
                    <li data-idno="339" data-name="인사급여, 4대보험, 소득세"><button>인사급여, 4대보험, 소득세</button></li>
                    <li data-idno="351" data-name="법인설립, 신규사업 자문"><button>법인설립, 신규사업 자문</button></li>
                    <li data-idno="352" data-name="외투기업 설립 및 자문"><button>외투기업 설립 및 자문</button></li>
				</ul>
				<!--
				<div class="telSel">
					<div id="select_box">
						<label for="category"></label>
						<select id="category" name="category" class="m_select req" title="상담을 원하시는 업무를 선택해주세요.">
						<option value=""> - 선택 -</option>
						{ @GOODS['category'] }
							<option value="{ .idno }" data-name="{ .category_name }">{ .category_name }</option>
						{ / }
						</select>
					</div>
				</div>
				-->
				<div id="contents"></div>
				<!-- <div class="btnCenter btn01"><a href="#" class="act_submit">다음</a></div> -->
				</form>
			</div>


{ / }
{ ? STEP == '2' }

			<div class="telTit pt30">
				<div class="tit01">예약 상담 신청하기</div>
				<div class="tit02">상담하고 싶은 세무사를 선택하여 주세요.</div>
			</div>

			<form id="frm_tax1" name="frm_tax1" method="post" >
			<input type="hidden" name="step" value="3" />
			<input type="hidden" name="etc01" value="{ TF_TYPE }" />
			<input type="hidden" name="category" value="{ REQ.category }" />
			<input type="hidden" name="category_name" value="{ REQ.category_name }" />
			<input type="hidden" name="mngr_tel" value="{ REQ.mngr_tel }" />
			<input type="hidden" name="mngr_phone" value="{ REQ.mngr_phone }" />
			<input type="hidden" name="mngr_file_name" value="{ REQ.mngr_file_name }" />
			<input type="hidden" name="mngr_mail" value="{ REQ.mngr_mail }" />
			<input type="hidden" name="mngr_name" value="" class="req" title="상담을 원하시는 세무사를 선택해주세요." />
			
			<div class="teslList2">
				<ul>
				{ @MNGR }
					<li>
						<div class="topInfo">
							<div class="selView">
								<div class="img">
									<img src="{ MNGR_PHOTO_URL }{ .file_name }" alt="{ .mngr_name }">
								</div>
								<div class="txt">
									<div class="tit01">{ .mngr_name }</div>
									<div class="tit02">“{ .info1 }”</div>
								</div>
								<div class="viewBtn open">
									<span>Info</span>
								</div>
								<!--<div class="viewBtn open">
									<img src="{ TYPE_URL }/images/open_view.png" alt="세무사정보 보기" />
								</div>-->
							</div>
							<div class="btn">
								<input type="hidden" class="mngr_tel" value="{ .tel }" data-name="{ .tel }" />
								<input type="hidden" class="mngr_phone" value="{ .phone }" data-name="{ .phone }" />
								<input type="hidden" class="mngr_mail" value="{ .email }" data-name="{ .email }" />
								<input type="radio" name="mngr" id="tax{ .idno }" value="{ .idno }" data-name="{ .mngr_name }" /> <label for="tax{ .idno }">선택</label>
							</div>
						</div>
						<div class="viewInfo">
							<div class="in">
								<ul>
									{ ? .email != '' }
									<li>
										<div class="tit no4">이메일</div>
										<div class="text">
											<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:{ .email }" style="color: #0269bf">{ .email }</a>
										</div>
									</li>
									{ / }
									{ ? .fax != '' }
									<li>
										<div class="tit no5">FAX</div>
										<div class="text">
											{ .fax }
										</div>
									</li>
									{ / }
									{ ? .info2 != '' }
									<li>
										<div class="tit no1">학력</div>
										<div class="text">
											<ul>
											{ @.info2_arr }
												<li>- { ..value_ }</li>
											{ / }
											</ul>
										</div>
									</li>
									{ / }
									{ ? .info3 != '' }
									<li>
										<div class="tit no2">연구과제</div>
										<div class="text">
											<ul>
											{ @.info3_arr }
												<li>- { ..value_ }</li>
											{ / }
											</ul>
										</div>
									</li>
									{ / }
									{ ? .info4 != '' }
									<li>
										<div class="tit no3">경력</div>
										<div class="text">
											<ul>
											{ @.info4_arr }
												<li>- { ..value_ }</li>
											{ / }
											</ul>
										</div>
									</li>
									{ / }
								</ul>
							</div>
						</div>
					</li>
				{ / }
				</ul>
			</div>
			<!-- <div class="btnCenter btn01"><a href="#" class="act_submit">다음</a></div> -->
			</form>

{ / }
{ ? STEP == '3' }


			{ ? TF_TYPE == "전화상담" }
			<div class="telTit pt30">
				<div class="tit01">전화상담 선택하기</div>
				<div class="tit02">{ REQ.mngr_name }</div>
			</div>

			<form id="frm_counsel" name="frm_tax1" method="post" >
				<input type="hidden" name="step" value="4" />
				<input type="hidden" name="goods_idno" value="5" />
				<input type="hidden" name="goods_name" value="전화상담" />
				<input type="hidden" name="category" value="{ REQ.category }" />
				<input type="hidden" name="category_name" value="{ REQ.category_name }" />
				<input type="hidden" name="etc01" value="{ TF_TYPE }" />
				<input type="hidden" name="mngr_tel" value="{ REQ.mngr_tel }" />
				<input type="hidden" name="mngr_phone" value="{ REQ.mngr_phone }" />
				<input type="hidden" name="mngr_file_name" value="{ REQ.mngr_file_name }" />
				<input type="hidden" name="mngr_mail" value="{ REQ.mngr_mail }" />
				<input type="hidden" name="mngr" value="{ REQ.mngr }" />
				<input type="hidden" name="mngr_name" value="{ REQ.mngr_name }" />
				<input type="hidden" name="option_name" value="" class="req" title="상담 이용권을 선택해주세요." />
				<div class="teslList3 callList">
					<ul>
						<li class="actMb">
							<div class="topInfo">
								<div class="selView">
									<div class="img">
										<img src="{ REQ.mngr_file_name }" alt="{ REQ.mngr_name }">
									</div>
									<div class="txt">
										<div class="tit01"><a href="tel:{ REQ.mngr_tel }"><span>{ REQ.category_name }</span><br class="pcNo"> <tag><b>즉시통화</b> <i class="fa fa-phone" aria-hidden="true"></i></tag></a></div>
									</div>
								</div>
								<div class="btn">
									{*									<input type="radio" name="option" id="point{ .idno }" value="{ .idno }" data-name="{ .option_name }" /> <label for="point{ .idno }">선택</label>*}
								</div>
							</div>
						</li>
						<li>
							<div class="topInfo">
								<div class="selView">
									<div class="img">
										<img src="{ REQ.mngr_file_name }" alt="{ REQ.mngr_name }">
									</div>
									<div class="txt">
										<div class="tit01"><a class="counselGo" href="#goTalkPop"><span>{ REQ.category_name }</span><br class="pcNo"><tag><b>상담예약</b> (예약후 1시간내 전화 연결) <i class="fa fa-phone" aria-hidden="true"></i></tag></a></div>
									</div>
								</div>
								<div class="btn">
									{*									<input type="radio" name="option" id="point{ .idno }" value="{ .idno }" data-name="{ .option_name }" /> <label for="point{ .idno }">선택</label>*}
								</div>
							</div>
						</li>
					</ul>
				</div>

				<!-- <div class="btnCenter btn01"><a href="#" class="act_submit">다음</a></div> -->
				<a class="goHome" href="{ BASE_URL }" target="_self">홈으로 이동</a>
			</form>
			<div id="goTalkPop" class="goTalkPop">
				<h1>전화상담 예약 정보확인</h1>
				<form id="frm_counsel_talk" name="frm_counsel_talk" method="post" >
					<input type="hidden" name="tax_nick" value="세림세무법인" />
					<input type="hidden" name="manager" value="{ REQ.mngr_name }" />
					<input type="hidden" name="manager_phone" value="{ REQ.mngr_phone }" />
					<input type="hidden" name="category" value="{ REQ.category_name }" />
					<input type="hidden" id="loginChk" value="chk"/>
					<input type="hidden" name="goods_name" value="전화상담" />
					<div class="gtp-wrap">
						<p><strong>상담사</strong><span>{ REQ.mngr_name }</span></p>
						<p><strong>상담과목</strong><span>{ REQ.category_name }</span></p>
						<p><strong>신청자</strong><span><input type="text" class="req" name="name" value="{ USERINFO['user_name'] }" maxlength="20" title="신청자명을 입력해주세요."/></span></p>
						<p><strong>내 핸드폰</strong><span><input type="text" class="req" name="u_phone" value="{ USERINFO['user_phone'] }" maxlength="20" title="휴대폰을 입력해주세요." /></span></p>
					</div>
					<div class="gtp-btn-wrap">
						<button class="gtp-btn talk-btn"><a>상담예약</a></button>
						<button class="gtp-btn cancel-btn"><a>취소</a></button>
					</div>
				</form>
			</div>
			{ : }
		
			<div class="telTit pt30 seCst">
				<div class="tit01">상담 일정 선택하기</div>
				<div class="tit02">원하는 날짜, 시간에 상담을 받으실 수 있습니다.</div>
			</div>

			<form id="frm_tax1" name="frm_tax1" method="post" >
			<input type="hidden" name="step" value="4" />
			<input type="hidden" name="category" value="{ REQ.category }" />
			<input type="hidden" name="category_name" value="{ REQ.category_name }" />
			<input type="hidden" name="etc01" value="{ TF_TYPE }" />
			<input type="hidden" name="mngr" value="{ REQ.mngr }" id="mngr_idno" />
			<input type="hidden" name="mngr_name" value="{ REQ.mngr_name }" />
			<input type="hidden" name="option" value="{ REQ.option }" />
			<input type="hidden" name="option_name" value="{ REQ.option_name }" />
			<input type="hidden" name="mngr_phone" value="{ REQ.mngr_phone }" />
			<input type="hidden" class="mngr_phone" data-name="{ REQ.mngr_phone }" />
			<input type="hidden" class="visit_code" value="visit" />

			<div class="telSca">
				
				<div class="line dtBox seCst">
					<label>
				        <img src="{ TYPE_URL }/images/bgTaxer.png"/>&nbsp;&nbsp;상담세무사 : { REQ.mngr_name }
				    </label>
				    <label>
				        <img src="{ TYPE_URL }/images/bgSort.png"/>&nbsp;&nbsp;상담세목 : { REQ.category_name }
				    </label>
				</div>
				
				<div class="line ipBox seCst">
					<label for="seCst_date_field">
				        <img src="{ TYPE_URL }/images/bgTax13.png"/>&nbsp;&nbsp;예약날짜 선택
				    </label>
					 <span class="dateButton">
						 <input id="seCst_date_field" type="text" class="orderdate req" placeholder="예약날짜 선택하기" title="예약날짜를 선택해주세요." name="app_day" readonly="readonly" />
						 <div class="seCstBg"></div>
					 </span>
				</div>
				
				<div class="line telSel seCst">
					<label for="app_time">
				        <img src="{ TYPE_URL }/images/bgTimer.png"/>&nbsp;&nbsp;예약시간 선택
				    </label>
					<div id="select_box">
						<span>예약시간 선택하기</span>
						<label>예약시간 선택하기</label>
						<select id="app_time" name="app_time" class="m_select req ordertime seCst" title="예약시간을 선택해주세요.">
						</select>
					</div>
				</div>
		
				
				<!-- serim :: custom mobile :: kjw :: 2017.11.22
				<div class="line ipBox">
					 <span class="dateButton">
						 <input type="text" class="orderdate req" placeholder="예약날짜를 선택해주세요." title="예약날짜를 선택해주세요." name="app_day" readonly="readonly" />
					 </span>
				</div>

				<div class="line telSel">
					<div id="select_box">
						<label for="app_time"></label>
						<select id="app_time" name="app_time" class="m_select req ordertime" title="예약시간을 선택해주세요.">
						</select>
					</div>
				</div>
				-->
				<!--
				<div class="ipBox line">
					<input type="text" name="subject" class="req" placeholder="제목을 입력해주세요." title="제목을 입력해주세요." maxlength="100" />
				</div>
				-->
				<div class="line text">
					<div class="textZone">
						<textarea class="req" name="contents" placeholder="문의하실 내용을 간략히 작성해 주시면 상담에 도움이 됩니다." title="문의하실 내용을 입력해주세요."></textarea>
					</div>
				</div>

				<div class="btnCenter btn01"><a href="#" class="act_submit">상담신청하기</a></div>

			</div>
			</form>
			{ / }
{ / }
{ ? STEP == '4' }

			<form id="frm_counsel" name="frm_tax_pay" method="post" >
			<input type="hidden" name="act" value="counsel_save" />
			<input type="hidden" name="status" value="0" />
			<input type="hidden" name="pay_status" value="1" />
			<input type="hidden" name="goods_idno" value="7" />
			<input type="hidden" name="tax_nick" value="세림세무법인" />
			<input type="hidden" name="goods_name" value="{ TF_TYPE }" />
			<input type="hidden" name="category_idno" value="{ REQ.category }" />
			<input type="hidden" name="category_name" value="{ REQ.category_name }" />
			<input type="hidden" name="etc01" value="{ TF_TYPE }" />
			<input type="hidden" name="mngr_idno" value="{ REQ.mngr }" />
			<input type="hidden" name="mngr_name" value="{ REQ.mngr_name }" />
			<input type="hidden" name="mngr_phone" value="{ REQ.mngr_phone }" />
			<input type="hidden" name="option_idno" value="{ REQ.option }" />
			<input type="hidden" name="option_name" value="{ REQ.option_name }" />
			<input type="hidden" name="app_minutes" value="{ OPTION['value'] }" />
			<input type="hidden" name="app_day" value="{ REQ.app_day }" />
			<input type="hidden" name="app_time" value="{ REQ.app_time }" />
			<input type="hidden" name="subject" value="{ REQ.subject }" />
			<input type="hidden" name="contents" value="{ =nl2br(REQ.contents) }" />
			<input type="hidden" name="min_point" id="min_point" value="{ MIN_POINT }" />
			<input type="hidden" name="my_point" id="my_point" value="{ USER['point'] }" />
			<input type="hidden" name="price" id="price" value="{ OPTION['price'] }" />
			<input type="hidden" name="pay_price" id="pay_price" value="{ OPTION['price'] }" />

			<div class="whiteBox2 mb10">
				<table class="base03">
					<colgroup>
						<col style="width:100px" />
						<col />
					</colgroup>
					<tbody>
						<tr>
							<th>이름</th>
							<td><input type="text" class="req" name="user_name" value="{ USERINFO['user_name'] }" maxlength="25" title="이름을 입력해주세요." /></td>
						</tr>
						<tr>
							<th>이메일</th>
							<td><input type="text" class="req" name="email" value="{ USERINFO['user_email'] }" maxlength="100" title="이메일을 입력해주세요." /></td>
						</tr>
						<tr>
							<th>휴대폰</th>
							<td><input type="text" class="req" name="phone" value="{ USERINFO['user_phone'] }" maxlength="20" title="휴대폰을 입력해주세요." /></td>
						</tr>
						<!--
						<tr>
							<th>기업명</th>
							<td><input type="text" name="company" value="{ USERINFO['user_company'] }" maxlength="100" title="기업명을 입력해주세요." /></td>
						</tr>
						-->
						<tr>
							<th>상담 세무사</th>
							<td>{ REQ.mngr_name }</td>
						</tr>
						<tr>
							<th>예약 날짜</th>
							<td>{ REQ.app_day }</td>
						</tr>
						<tr>
							<th>예약 시간</th>
							<td>{ REQ.app_time }</td>
						</tr>
						<tr>
							<th>상담 종류</th>
							<td>{ REQ.category_name }</td>
						</tr>
						<tr>
							<th>상담 방법</th>
							<td>{ REQ.etc01 }</td>
						</tr>
						<tr>
							<th>상담 내용</th>
							<td><!--<b>{ REQ.subject }</b><br/>-->{ =nl2br(REQ.contents) }</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="whiteBox2 mb10 personalWrap">
				<div class="top">
					<div class="tit">개인정보 수집 및 이용에 대한 안내</div>
					<!-- <a href="#" class="btnDetail">[개인정보취급방침 전문보기]</a> -->
				</div>
				<div class="textScroll">
				{ AGREE_TEXT }
				</div>
				<input type="checkbox" id="personalAgree" class="agreeY" title="개인정보 수집 및 이용에 동의" /> <label for="personalAgree">개인정보 수집 및 이용에 동의합니다.</label>
			</div>

			<div class="whiteBox2">
				{ ? OPTION['price'] > 0 }
				<div class="site">
					<div class="left"><div class="tit">상담수수료</div></div>
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
					<div class="left"><div class="tit">상담수수료</div></div>
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

