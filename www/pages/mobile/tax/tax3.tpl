{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">

{ ? STEP == '1' }

			<div class="telTit pt30 pb10">
				<div class="tit01 big">상담자를 선택하여<br />기장 자문상담 신청하세요.</div>
			</div>

			<form id="frm_tax1" name="frm_tax1" method="post" >
			<input type="hidden" name="step" value="2" />
			<input type="hidden" name="mngr_name" value="" class="req" title="상담을 원하시는 지점을 선택해주세요." />
			<div class="teslList2">
				<ul>
				{ @MNGR }
					<li>
						<div class="topInfo">
							<div class="selView">
								<div class="img">
									<img src="{ MNGR_PHOTO_URL }{ .file_name }" alt="{ .bran_name }">
								</div>
								<div class="txt">
									<div class="tit01">{ .bran_name }</div>
									<div class="tit02">“{ .info1 }”</div>
								</div>
								<div class="viewBtn open">
									<span>Info</span>
								</div>
							</div>
							<div class="btn">
								<input type="radio" name="mngr" id="tax{ .idno }" value="{ .idno }" data-name="{ .mngr_name }" /> <label for="tax{ .idno }">선택</label>
							</div>
						</div>
						<div class="viewInfo">
							<div class="in">
								<ul>
									<li>
										<div class="tit no1">상세설명</div>
										<div class="text">
											<ul>
											{ =nl2br(.info5) }
											</ul>
										</div>
									</li>
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
{ ? STEP == '2' }

			<form id="frm_tax3" name="frm_tax3" method="post" >
			<input type="hidden" name="act" value="save" />
			<input type="hidden" name="status" value="1" />
			<input type="hidden" name="goods_idno" value="{ GOODS.idno }" />
			<input type="hidden" name="goods_name" value="{ GOODS.goods_name }" />
			<input type="hidden" name="mngr_idno" value="{ REQ.mngr }" />
			<input type="hidden" name="mngr_name" value="{ REQ.mngr_name }" />
			<div class="whiteBox2 mb10">
				<table class="base03">
					<colgroup>
						<col style="width:140px" />
						<col />
					</colgroup>
					<tbody>
						<tr>
							<th>상호</th>
							<td><input type="text" class="req" name="company" value="{ USERINFO['user_company'] }" maxlength="100" title="상호를 입력해주세요." /></td>
						</tr>
						<tr>
							<th>대표자 명</th>
							<td><input type="text" class="req" name="user_name" value="{ USERINFO['user_name'] }" maxlength="25" title="대표자명을 입력해주세요." /></td>
						</tr>
						<tr>
							<th>직전연도 매출</th>
							<td><input type="text" class="req" name="sales" value="" maxlength="20" title="직전연도 매출을 입력해주세요." /></td>
						</tr>
						<tr>
							<th>업종/업태</th>
							<td><input type="text" class="req" name="com_kind" value="" maxlength="100" title="업종/업태를 입력해주세요." /></td>
						</tr>
						<tr>
							<th>연락처</th>
							<td><input type="text" class="req" name="phone" value="{ USERINFO['user_phone'] }" maxlength="20" title="연락처를 입력해주세요." /></td>
						</tr>
						<tr>
							<th>이메일</th>
							<td><input type="text" class="req" name="email" value="{ USERINFO['user_email'] }" maxlength="100" title="이메일을 입력해주세요." /></td>
						</tr>
						<tr>
							<th class="cst-serim_ltm2">사업자등록번호(선택)</th>
							<td><input type="text" name="com_regno" value="" maxlength="20" title="사업자등록번호를 입력해주세요." /></td>
						</tr>
						<tr>
							<th class="cst-serim_ltm1">사업장 소재지(선택)</th>
							<td><input type="text" name="addr" value="" maxlength="100" title="사업장 소재지를 입력해주세요." /></td>
						</tr>
						<tr>
							<th colspan="2" class="thp">사업현황(선택)</th>
						</tr>
						<tr>
							<td colspan="2">
								<div class="textArea2">
									<textarea name="contents" title="사업현황을 입력해주세요." placeholder="사업현황을 간단히 기록해서 보내주시면&#13;&#10;업무담당자가 빠른시일내에 연락드리고,&#13;&#10;기장,자문에 관한 상담을 도와 드립니다."></textarea>
								</div>
							</td>
						</tr>
						<tr class="se_cst_hdn">
							<th colspan="2" class="thp">기타 문의사항</th>
						</tr>
						<tr class="se_cst_hdn">
							<td colspan="2">
								<div class="textArea2">
									<textarea name="contents2" title="기타 문의사항을 입력해주세요."></textarea>
								</div>
							</td>
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
			
			<div class="btnCenter btn01"><a href="#" class="act_submit">등록하기</a></div>
			</form>

<!-- 레이어팝업 -->
<div class="popArea">
	<div class="bg"></div>
	<div class="popIn">
		<div class="box">
			<div class="txt">
신청서 등록 후 진행 상황은 <br />
<span class="bold">‘나의 상담 내역’</span> 에서 확인하실 수 있습니다. <br />
의뢰 신청 후 상담은 오프라인으로 진행됩니다.<br />
이용에 참고해 주세요.
			</div>
			<div class="btn">
				<a href="#" class="act_popArea_close">취소</a>
				<a href="#" class="act_popArea_submit">확인</a>
			</div>
		</div>

	</div>
</div>
<!-- 레이어팝업 -->

{ / }

		</div>
		<!-- //subContainer -->

{ #footer }

	</div>
	<!-- //Wrap -->

</body>
</html>
