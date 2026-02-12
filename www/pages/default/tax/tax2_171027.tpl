{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">

			<div class="telTab three">
				<ul>
					<li{ ? STEP == '1' } class="active"{ / }>1단계</li>
					<li{ ? STEP == '2' } class="active"{ / }>2단계</li>
					<li{ ? STEP >= '3' } class="active"{ / }>3단계</li>
				</ul>
			</div>

{ ? STEP == '1' }

			<div class="colBox3">
				<!--
				<div class="telTit pt10">
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
					<li data-idno="{ .idno }" data-name="{ .category_name }"><button>{ .category_name }</button></li>
				{ / }
				</ul>
				<!--
				<div class="telSel mb20">
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
				<div id="contents" class="show-off"></div>
				<div id="contents1" class="show-off"></div>
				<div class="btnCenter btn01" style="display:none"><a href="#" class="act_submit">다음</a></div>
				</form>
			</div>

{ / }
{ ? STEP == '2' }

			<div class="telTit pt30">
				<div class="tit01">상담 세무사 선택하기</div>
				<div class="tit02">상담하고 싶은 세무사를 선택하여 주세요.</div>
			</div>

			<form id="frm_tax1" name="frm_tax1" method="post" >
			<input type="hidden" name="step" value="3" />
			<input type="hidden" name="category" value="{ REQ.category }" />
			<input type="hidden" name="category_name" value="{ REQ.category_name }" />
			<input type="hidden" name="mngr_name" value="" class="req" title="상담을 원하시는 세무사를 선택해주세요." />
			<div class="teslList2">
				<ul>
				{ @MNGR }
					<li>
						<div class="topInfo">
							<div class="btn">
								<input type="radio" name="mngr" id="tax{ .idno }" value="{ .idno }" data-name="{ .mngr_name }" /> <label for="tax{ .idno }">선택</label>
							</div>
							<div class="selView">
								<div class="img">
									<img src="{ MNGR_PHOTO_URL }{ .file_name }" alt="{ .mngr_name }">
								</div>
								<div class="txt">
									<div class="tit01">{ .mngr_name }</div>
									<div class="tit02">“{ .info1 }”</div>
								</div>
							</div>
							
						</div>
						<div class="viewInfo">
							<div class="in">
								<ul>
									{ ? .email != '' }
									<li>
										<div class="tit no4">이메일</div>
										<div class="text" >
											<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:{ .email }" style="color: #0269bf">{ .email }</a>
											</span>
										</div>
									</li>
									{ / }
									{ ? .fax != '' }
									<li>
										<div class="tit no5">팩스</div>
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
			
			<div class="teslList2">
				<ul>
					<li></li>
				</ul>
			</div>
			
 
{ / }
{ ? STEP == '3' }

			<form id="frm_tax2" name="frm_tax2" method="post" >
			<input type="hidden" name="act" value="save" />
			<input type="hidden" name="status" value="1" />
			<input type="hidden" name="pay_status" value="0" />
			<input type="hidden" name="goods_idno" value="{ GOODS.idno }" />
			<input type="hidden" name="goods_name" value="{ GOODS.goods_name }" />
			<input type="hidden" name="category_idno" value="{ REQ.category }" />
			<input type="hidden" name="category_name" value="{ REQ.category_name }" />
			<input type="hidden" name="mngr_idno" value="{ REQ.mngr }" />
			<input type="hidden" name="mngr_name" value="{ REQ.mngr_name }" />

			<div class="whiteBox2 mb10">
				<table class="base03">
					<colgroup>
						<col style="width:100px" />
						<col />
					</colgroup>
					<tbody>
						<tr>
							<th>상담 종류</th>
							<td>: { REQ.category_name }</td>
						</tr>
						<tr>
							<th>상담 세무사</th>
							<td>: { REQ.mngr_name }</td>
						</tr>

{ ? CHECKLIST.size_ > 0 }

						<tr>
							<th colspan="2" scope="col">전송할 자료 리스트</th>
						</tr>
						<tr>
							<td colspan="2">
								<ul class="tableLsit">
								{ @ CHECKLIST }
									<li>
										<p>
											<input type="radio" id="list{ .index_ }" name="checklist" value="{ .index_ }" class="req" title="전송할 자료 리스트를 모두 확인해주세요!" >
											<label for="list{ .index_ }">{ .value_ }</label>
										</p>
									</li>
								{ / }
								</ul>
							</td>
						</tr>

{ / }						

						<!--<tr>
							<th>이메일</th>
							<td>: <span style="text-decoration: underline; text-decoration-color: #0269bf;">
							<a href="mailto:{ MNGR.email }" style="color: #0269bf">{ MNGR.email }</a></td>
						</tr>
						<tr>
							<th>팩스</th>
							<td>: { MNGR.fax }</td>
						</tr>-->
						
						<tr class="howSelect">
							<th>서류 상담방법</th>
							<td>
								<p><input type="radio" id="mail" name="method" value="email" checked="checked" /><label for="mail">메일</label></p>
								<p><input type="radio" id="fax" name="method" value="fax" /><label for="fax">FAX</label></p>
							</td>
						</tr>
						
						<!--추가 테이블-->
						
						<tr class="mailSelct selected on">
							<td  colspan="2">
								<div class="tit no4">이메일</div>
								<div class="text">
									<span>
										{ MNGR.email }
									</span>
								</div>
							</td>
						</tr>
						<tr class="faxSelct selected">
							<td  colspan="2">
								<div class="tit no5">팩스</div>
								<div class="text">
									<span>
										{ MNGR.fax }
									</span>
								</div>
							</td>
						</tr>
						
						<tr>
							<th colspan="2" scope="col">문의사항</th>
						</tr>
						<tr>
							<td colspan="2">
								<div class="textZone">
									<textarea class="req" name="contents" placeholder="요청사항 및 문의사항을 간략히 작성해주세요." title="문의하실 내용을 입력해주세요."></textarea>
								</div>
							</td>
						</tr>
						<!--//추가 테이블-->
						
					</tbody>
				</table>
			<div class="btnCenter btn01"><a href="#" class="act_submit">상담신청하기</a></div>
			</div>

			<div class="telSca" style="display:none">
				<div class="ipBox line">
					<input type="text" class="req" name="user_name" value="{ USERINFO['user_name'] }" maxlength="25" placeholder="이름을 입력해주세요." title="이름을 입력해주세요." />
				</div>
				<div class="ipBox line">
					<input type="text" class="req" name="email" value="{ USERINFO['user_email'] }" maxlength="100" placeholder="이메일을 입력해주세요." title="이메일을 입력해주세요." />
				</div>
				<div class="ipBox line">
					<input type="text" class="req" name="phone" value="{ USERINFO['user_phone'] }" maxlength="20" placeholder="휴대폰을 입력해주세요." title="휴대폰을 입력해주세요." />
				</div>
				<!--
				<div class="ipBox line">
					<input type="text" name="company" value="{ USERINFO['user_company'] }" maxlength="100" placeholder="기업명을 입력해주세요." title="기업명을 입력해주세요." />
				</div>
				<div class="ipBox line">
					<input type="text" name="subject" class="req" placeholder="제목을 입력해주세요." title="제목을 입력해주세요." maxlength="100" />
				</div>
				-->
				<div class="line text">
					<div class="textZone">
						<textarea class="req" name="contents" placeholder="요청사항 및 문의사항을 간략히 작성해주세요." title="문의하실 내용을 입력해주세요."></textarea>
					</div>
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

			</div>
			</form>

{ / }

		</div>
		<!-- //subContainer -->

{ #footer }

	</div>
	<!-- //Wrap -->
	
<script>

$(function(){
	$(document).on('click', '.howSelect p', function() {
		var idx= $(this).index();
		if( idx==0 ){
			$('.mailSelct').addClass('on')
			$('.faxSelct').removeClass('on')
		}else{
			$('.faxSelct').addClass('on')
			$('.mailSelct').removeClass('on')
		}
	});
})
</script>	
	
</body>
</html>
