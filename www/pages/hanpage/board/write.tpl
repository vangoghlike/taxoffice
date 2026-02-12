{ #header }

		<!-- Container -->
		<div class="container" id="container">

{ #subtop }

			<!-- subContent -->
			<div class="subContent">

				{ ? BOARD_TYPE == 'knowledge' }
				<div class="tabType01 kl-type kl-write list2">
					<div class="kl-cate-wr">
						<ul>
							<li><a href="{ BASE_URL }/406">Han-Page</a></li>
{*							<li class="qna_li { ? KL_CATS_IDNO == ''}on{ / }">*}
{*								<a href="{ BASE_URL }/411/485/write?">질문함</a>*}
{*							</li>*}

							<li>
								<a href="http://www.taxcallcenter.com/498">상담센터</a>
							</li>
						</ul>
					</div>
				</div>
				{ / }
{ #breadcrumbs }

				<!-- contStart -->
				<div class="contStart">

{ #dep3 }

{ CONTENTS['head_contents'] }


					<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />
					<script type="text/javascript" src="/common/js/jquery-ui.min.js"></script>
					<script src="/webedit/cheditor.js"></script>
					<script>
						$(function() {
						    $( "#deadline" ).datepicker({
						    	dateFormat: 'yy-mm-dd'
						    });
						});
					</script>
					<form id="frm_write" name="frm_write" method="post" action="?" enctype="multipart/form-data" >
					<input type="hidden" name="act" value="save" />
					<input type="hidden" name="s" value="{ SITE_INFO['idno'] }" />
					<input type="hidden" name="m" value="{ MENU_NO }" />
					<input type="hidden" name="c" value="{ CONTENTS_NO }" />
					<input type="hidden" name="qs" value="{ QS }" />
					<input type="hidden" name="p_idno" value="{ RDATA['idno'] }" />
					<input type="hidden" name="idno" value="{ DATA['idno'] }" />
					{ ? CONF['board_code'] == 'biz_wise' }
					<input type="hidden" name="wise_c_idno" value="{ DATA['category_idno'] }" />
					{ / }
					{ ? CATEGORY_IDNO }<input type="hidden" name="category_idno" value="{ CATEGORY_IDNO }" />{ / }

					<div class="tblType03" style="margin-bottom:10px;">
						<table>
{*							<colgroup>*}
{*								<col style="width:105px" />*}
{*								<col style="width:200px"  />*}
{*								<col style="width:120px" />*}
{*								<col  />*}
{*							</colgroup>*}
							<tbody>
							{ ? CONF['board_type'] != 'apply' }


								{ ? CATS.size_ > 1 }
								<tr>
									{ ? CONF['board_type'] != 'knowledge' }
									<th>구분 </th>
									<td colspan="3">
										<select { ? CONF['board_code'] == 'biz_wise' }id="biz_wise_cate_idno" class="biz_wise_cate_idno"{ / } name="category_idno" class="sel01 req" title="구분 항목을 선택해주세요." { ? DATA['category_idno'] } disabled="disabled"{ / }>
										{ @ CATS }
											<option value="{ .key_ }" { ? .key_ == DATA['category_idno'] || !DATA['category_idno'] && .key_ == CATEGORY_IDNO } selected="selected"{ / }>{ .value_ }</option>
										{ / }
										</select>
									</td>
									{ : }
										{ ? USER_AUTH_CHK == 'board' && BBS_UDT_MODE != 'nrply' }
									<th>상담<br>항목분류</th>
									<td colspan="3">
										{ ? DATA['idno'] != '' }
										<select name="category_idno" class="sel01 req" title="구분 항목을 선택해주세요." { ? CATEGORY_IDNO }{ / }>
												{ @ CATS }
										<option value="{ .key_ }" { ? .key_ == DATA['category_idno'] || !DATA['category_idno'] && .key_ == CATEGORY_IDNO } selected="selected"{ / }>{ .value_ }</option>
												{ / }
{*										{ @ CATS }*}
{*											{ ? USERINFO['user_auth'] != '["*"]' }*}
{*												{ ? .value_ == '답변대기' }*}
{*												<option value="{ .key_ }" { ? .key_ == DATA['category_idno'] || !DATA['category_idno'] && .key_ == CATEGORY_IDNO } selected="selected"{ / }>{ .value_ }</option>*}
{*												{ / }*}
{*											{ : }*}
{*											<option value="{ .key_ }" { ? .key_ == DATA['category_idno'] || !DATA['category_idno'] && .key_ == CATEGORY_IDNO } selected="selected"{ / }>{ .value_ }</option>*}
{*											{ / }*}
{*										{ / }*}
										</select>
										{ : }
										<select name="category_idno" class="sel01 req" title="구분 항목을 선택해주세요." { ? CATEGORY_IDNO }{ / }>
										<option value="33">질문함</option>
										</select>
										{ / }
									</td>
										{ : }
									<th style="display: none;">상담<br>항목분류</th>
									<td style="display: none;" colspan="3">
										<input type="hidden" name="category_idno" value="33"/>
									</td>
										{ / }
									{ / }
								</tr>
								{ / }
								{ ? CONF['board_type'] == 'knowledge' }
									{ ? ( USER_AUTH_CHK == 'board' && DATA['idno'] != '' ) && BBS_UDT_MODE != 'nrply' }
								<tr>
									<th>
										처리상태
									</th>
									<td colspan="3">
										<select name="kl_status">
											<option value="N" { ? DATA['kl_status'] == 'N' }selected{ / }>답변대기</option>
											<option value="Y" { ? DATA['kl_status'] == 'Y' }selected{ : }selected{ / }>답변완료</option>
										</select>
									</td>
								</tr>
									{ : }
								<tr style="display: none;">
									<th>
										처리상태
									</th>
									<td colspan="3">
										<input type="hidden" name="kl_status" value="N">
									</td>
								</tr>
									{ / }
								{ / }
								{ ? CONF['board_type'] == 'job' }
								<tr>
									<th>기업명 { USER['division'] }</th>
									<td colspan="3">
										<input type="text" class="ipTxt01 req" name="cpny_name" value="{ DATA['cpny_name'] }" maxlength="100" title="회사명" style="width:76%" />
									</td>
								</tr>
								{ / }
								{ ? CONF['board_type'] == 'job' }
									{ ? CONF['use_file_yn'] == 'Y' && CAN_FILE == 'Y' }
								<tr>
									<th>기업로고</th>
									<td colspan="3" id="files" data-iname="file">
										<div class="info_tr">※ 파일 크기는 { CONF['file_size_limit'] }Mb 를 넘을 수 없습니다.</div>
										<div class="in_file"><input type="file" class="{ ? CONF['board_type'] == 'gallery' && !sizeof(DATA['file']) }req{ / }" name="file[]" value="" title="파일을 등록해주세요."></input><a class="btn_s del act_file_del" href="#" style="display:none">삭제</a></div>
										<div class="filelist"></div>
										{ FILE_LIST_SCRIPT }
									</td>
								</tr>
									{ / }
								{ / }
								{ ? CONF['board_code'] == 'biz_wise' }
								<tr>
									<th>
										업로드 이미지
									</th>
									<td colspan="3" class="wise_bbs_sec">
										<p>하단의 첨부파일을 업로드시 첨부파일의 이미지, 미업로드시 상단의 선택된 이미지로 배경 및 리스트 이미지가 결정됩니다.</p>
										<div class="standard_img select_wise_img">

											<ul class="wise_select_li { ? CATEGORY_IDNO || DATA['category_idno'] }visible{ : }hidn{ / }">
												<li>
													<label>
														<input type="radio" name="wise_img_num" value="1" { ? DATA['wise_img_num'] == '1' }checked="checked"{ / }/>
														<img src="/pages/default/images/bbs/thumb_{ WISE_PIC_TITLE }1.jpg"/>
													</label>
												</li>
												<li>
													<label>
														<input type="radio" name="wise_img_num" value="2" { ? DATA['wise_img_num'] == '2' }checked="checked"{ / }/>
														<img src="/pages/default/images/bbs/thumb_{ WISE_PIC_TITLE }2.jpg"/>
													</label>
												</li>
												<li>
													<label>
														<input type="radio" name="wise_img_num" value="3" { ? DATA['wise_img_num'] == '3' }checked="checked"{ / }/>
														<img src="/pages/default/images/bbs/thumb_{ WISE_PIC_TITLE }3.jpg"/>
													</label>
												</li>
												<li>
													<label>
														<input type="radio" name="wise_img_num" value="4" { ? DATA['wise_img_num'] == '4' }checked="checked"{ / }/>
														<img src="/pages/default/images/bbs/thumb_{ WISE_PIC_TITLE }4.jpg"/>
													</label>
												</li>
											</ul>
											<p class="no_select_txt">카테고리를 선택하지 않았습니다. 상단의 카테고리 탭에서 선택해주세요.</p>

										</div>
										<div class="upload_img select_wise_img">
											<div class="info_tr">※ 파일 크기는 { CONF['file_size_limit'] }Mb 를 넘을 수 없습니다. (jpg, png, gif만 등록가능)</div>

											<div class="in_file"><input id="bw_file" onchange="bwFileCheck(this)" type="file" class="{ ? CONF['board_type'] == 'gallery' && !sizeof(DATA['file']) }req{ / }" name="file[]" accept="image/gif, image/jpeg, image/png" value="" title="파일을 등록해주세요."></input>
												&nbsp;<a class="btn_s act_file_add" href="#" data-max="{ CONF['file_limit'] }">추가</a> <a class="btn_s del act_file_del" href="#" style="display:none">삭제</a></div>
											<div class="filelist"></div>
											{ FILE_SECOND_SCRIPT }
											<script>
												function bwFileCheck(obj) {
													pathpoint = obj.value.lastIndexOf('.');
													filepoint = obj.value.substring(pathpoint+1,obj.length);
													filetype = filepoint.toLowerCase();
													if(filetype=='jpg' || filetype=='gif' || filetype=='png' || filetype=='jpeg') {

														// 정상적인 이미지 확장자 파일일 경우 ...

													} else {
														alert('이미지 파일만 선택할 수 있습니다.');

														parentObj  = obj.parentNode;
														node = parentObj.replaceChild(obj.cloneNode(true),obj);
														return false;
													}
												}
											</script>
										</div>
									</td>
								</tr>
								{ / }
								<tr>
									<th>
										{ ? CONF['board_type'] == 'knowledge' }
											{ ? RDATA['idno'] }답글{ / }상담제목
										{ : }
											{ ? RDATA['idno'] }답글{ / }제목
										{ / }
									</th>
									<td colspan="3">
										<input type="text" class="ipTxt01 req ip_sbj" name="subject" value="{ DATA['subject'] }" maxlength="100" title="제목을 입력해주세요." />
										{ ? CAN_NOTICE == 'Y' && !RDATA['idno'] }
										<label class="lb_sbj"><input type="checkbox" name="notice_yn" value="Y" { ? DATA['notice_yn'] == 'Y' } checked="checked"{ / } title="상단공지 여부를 선택해주세요." /> 상단공지</label>
										{ / }
										{ ? CAN_SECRET == 'Y' && !RDATA['idno'] }
										<label><input type="radio" class="" title="공개" name="secret_yn" value="N" { ? DATA['secret_yn'] == 'N' }checked="checked"{ / } />공개</label>
										<label><input type="radio" class="" title="비공개" name="secret_yn" value="Y" { ? DATA['secret_yn'] != 'N' }checked="checked"{ / } />비공개</label>
										{ / }
									</td>
								</tr>
								{ ? CONF['board_type'] == 'knowledge' }
								<tr>
									<th>
										상담요청
									</th>
									<td colspan="3">
										<select name="kl_email_manager">
											{ @MNGR_K_B_LIST }
											<option value="{ .email }" { ? DATA['kl_email_manager'] == .email }selected{ / }>{ .mngr_name }</option>
											{ / }
										</select>
									</td>
								</tr>
								{ / }
								{ ? CONF['board_type'] == 'teamlist' }
								<tr>
									<th>명칭</th>
									<td colspan="3">
										<input type="text" class="ipTxt01 req" name="tl_brand" value="{ DATA['tl_brand'] }" maxlength="100" title="명칭" style="width:76%" />
									</td>
								</tr>
								<tr>
									<th>세무사명</th>
									<td colspan="3">
										<input type="text" class="ipTxt01 req" name="tl_name" value="{ DATA['tl_name'] }" maxlength="100" title="세무사명" style="width:76%" />
									</td>
								</tr>
								<tr>
									<th>세무사 슬로건</th>
									<td colspan="3">
										<input type="text" class="ipTxt01 req" name="tl_slogan" value="{ DATA['tl_slogan'] }" maxlength="100" title="세무사 슬로건" style="width:76%" />
									</td>
								</tr>
								{ ? CONF['use_file_yn'] == 'Y' && CAN_FILE == 'Y' }
								<tr>
									<th>프로필 사진<br>(필수)</th>
									<td colspan="3" id="fileFirst" data-iname="file">
										<div class="info_tr">※ 파일 크기는 { CONF['file_size_limit'] }Mb 를 넘을 수 없습니다.</div>
										<div class="in_file"><input type="file" class="{ ? CONF['board_type'] == 'teamlist' && !sizeof(DATA['file']) }req{ / }" name="file[0]" value="" title="파일을 등록해주세요."><a class="btn_s del act_file_del" href="#" style="display:none">삭제</a></div>
										<div class="filelist"></div>
										{ FILE_FIRST_SCRIPT }
									</td>
								</tr>

								{ / }
								<tr>
									<th>세무사 소개</th>
									<td colspan="3">
										<textarea name="tl_intro" title="세무사 소개 입력" class="">{ DATA['tl_intro'] }</textarea>
									</td>
								</tr>
								<tr>
									<th>주소</th>
									<td colspan="3">
										<input type="text" class="ipTxt01 req" name="tl_addr" value="{ DATA['tl_addr'] }" maxlength="100" title="공유사무실 주소" style="width:76%" />
									</td>
								</tr>
								<tr>
									<th>사무실 호수</th>
									<td colspan="3">
										<select class="ipTxt01 req" name="tl_opn">
											<option value="701" { ? DATA['tl_opn'] == '701' }selected{ / } >701 호</option>
											<option value="702" { ? DATA['tl_opn'] == '702' }selected{ / }>702 호</option>
											<option value="703" { ? DATA['tl_opn'] == '703' }selected{ / }>703 호</option>
											<option value="704" { ? DATA['tl_opn'] == '704' }selected{ / }>704 호</option>
											<option value="705" { ? DATA['tl_opn'] == '705' }selected{ / }>705 호</option>
											<option value="706" { ? DATA['tl_opn'] == '706' }selected{ / }>706 호</option>
											<option value="707" { ? DATA['tl_opn'] == '707' }selected{ / }>707 호</option>
											<option value="708" { ? DATA['tl_opn'] == '708' }selected{ / }>708 호</option>
											<option value="709" { ? DATA['tl_opn'] == '709' }selected{ / }>709 호</option>
											<option value="710" { ? DATA['tl_opn'] == '710' }selected{ / }>710 호</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>핵심(주요)업무</th>
									<td colspan="3">
										<textarea name="tl_job" title="주요 업무 내용을 입력해주세요." class="">{ DATA['tl_job'] }</textarea>
									</td>
								</tr>
								<tr>
									<th>연구과제</th>
									<td colspan="3">
										<input type="text" class="ipTxt01 req" name="tl_sbj" value="{ DATA['tl_sbj'] }" maxlength="100" title="연구과제" style="width:76%" />
									</td>
								</tr>
								<tr>
									<th>주요 인원</th>
									<td colspan="3">
										<input type="text" class="ipTxt01 req" name="tl_mb" value="{ DATA['tl_mb'] }" maxlength="100" title="주요 인원" style="width:76%" />
									</td>
								</tr>
								<tr>
									<th>문의링크</th>
									<td colspan="3">
										<input type="text" class="ipTxt01 req" name="tl_link" value="{ DATA['tl_link'] }" maxlength="100" title="문의링크" style="width:76%" />
									</td>
								</tr>
								<tr>
									<th>이메일</th>
									<td colspan="3">
										<input type="text" class="ipTxt01 req" name="tl_mail" value="{ DATA['tl_mail'] }" maxlength="100" title="세무사 이메일" style="width:76%" />
									</td>
								</tr>
								<tr>
									<th>연락처</th>
									<td colspan="3">
										<input type="text" class="ipTxt01 req" name="tl_tel" value="{ DATA['tl_tel'] }" maxlength="100" title="세무사 연락처" style="width:76%" />
									</td>
								</tr>
								{ / }
								{ ? CONF['board_type'] == 'video' }
								<tr>
									<th>유튜브 URL</th>
									<td colspan="3">
										<input type="text" class="ipTxt01 req" name="youtube_link" value="{ DATA['youtube_link'] }" maxlength="100" title="유튜브 링크 입력" style="width:76%" />
									</td>
								</tr>
								{ / }

								{ ? CONF['auth_write'] == 'N' }
									{ ? USERINFO['user_auth'] != '["*"]' }
										{ ? CONF['board_type'] != 'qna' }
								{ ? USERINFO['user_name'] == '' }
								<tr>
									<th>비밀번호</th>
									<td>
										<input type="password" class="ipTxt02 req" name="passwd" value="" maxlength="10" title="비밀번호를 입력해주세요." />
									</td>
									<th>비밀번호확인</th>
									<td>
										<input type="password" class="ipTxt02 req" name="passwd_conf" value="" maxlength="10" title="비밀번호를 입력해주세요." />
									</td>
								</tr>
								{ / }
										{ / }
								{ ? USERINFO['user_name'] == '' }
								<tr>
									<th>작성자</th>
									<td>
										<input type="text" class="ipTxt02 req" name="writer_name" value="{ ? DATA['writer_name'] }{ DATA['writer_name'] }{ : }{ USERINFO['user_name'] }{ / }" maxlength="100" title="작성자명을 입력해주세요." />
									</td>
									<th>이메일</th>
									<td>
										<div class="for-mailform" data-name="email" data-class="ipTxt02 req,ipTxt02 req,sel01" data-attr="" >{ DATA['email'] }</div>
									</td>
								</tr>
								{ : }
								<tr>
									<th>작성자</th>
									<td>
										<span>
											{ USERINFO['user_name'] }
										</span>
										<input type="hidden" class="ipTxt02 req" name="writer_name" value="{ USERINFO['user_name'] }" maxlength="100"  />
									</td>
								</tr>
								{ / }
									{ : }
								<tr>
									<th>작성자</th>
									<td colspan="3">
										{ ? DATA['writer_name'] }{ DATA['writer_name'] }{ : }{ USERINFO['user_name'] }{ / }
									</td>
								</tr>
									{ / }
								{ : }
								<tr>
									<th>작성자</th>
									<td colspan="3">
										{ ? DATA['writer_name'] }{ DATA['writer_name'] }{ : }{ USERINFO['user_name'] }{ / }
									</td>
								</tr>
								{ / }

								{ ? CONF['board_type'] == 'job' }
								<tr>
									<th>경력</th>
									<td colspan="3">
										<select name="cpny_career" class="sel01 req" title="신입/경력 선택">
											<option value="신입/경력 무관" { ? DATA['cpny_career'] == '신입/경력 무관' }selected="selected"{ / }>신입/경력 무관</option>
											<option value="신입" { ? DATA['cpny_career'] == '신입' }selected="selected"{ / }>신입</option>
											<option value="경력" { ? DATA['cpny_career'] == '경력' }selected="selected"{ / }>경력</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>학력</th>
									<td colspan="3">
										<select name="cpny_edu" class="sel01 req" title="학력">
											<option value="고졸이상" { ? DATA['cpny_edu'] == '고졸이상' }selected="selected"{ / }>고졸이상</option>
											<option value="대졸이상" { ? DATA['cpny_edu'] == '대졸이상' }selected="selected"{ / }>대졸이상</option>
											<option value="학력무관" { ? DATA['cpny_edu'] == '학력무관' }selected="selected"{ / }>학력무관</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>자격소지</th>
									<td colspan="3">
										<select name="cpny_qualify" class="sel01 req" title="자격소지">
											<option value="전산회계" { ? DATA['cpny_qualify'] == '전산회계' }selected="selected"{ / }>전산회계</option>
											<option value="전산세무" { ? DATA['cpny_qualify'] == '전산세무' }selected="selected"{ / }>전산세무</option>
											<option value="기타" { ? DATA['cpny_qualify'] == '기타' }selected="selected"{ / }>기타</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>외국어능력</th>
									<td colspan="3">
										<select name="cpny_lang" class="sel01 req" title="필요 외국어능력">
											<option value="영어" { ? DATA['cpny_lang'] == '영어' }selected="selected"{ / }>영어</option>
											<option value="중국어" { ? DATA['cpny_lang'] == '중국어' }selected="selected"{ / }>중국어</option>
											<option value="일본어" { ? DATA['cpny_lang'] == '일본어' }selected="selected"{ / }>일본어</option>
											<option value="기타" { ? DATA['cpny_lang'] == '기타' }selected="selected"{ / }>기타</option>
											<option value="외국어능력 무관" { ? DATA['cpny_lang'] == '외국어능력 무관' }selected="selected"{ / }>외국어능력 무관</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>실무수행능력</th>
									<td colspan="3">
										<select name="cpny_proc" class="sel01 req" title="결산경험">
											<option value="법인5개이상/개인5개이상" { ? DATA['cpny_proc'] == '법인5개이상/개인5개이상' }selected="selected"{ / }>법인5개이상/개인5개이상</option>
											<option value="법인3개이상/개인3개이상" { ? DATA['cpny_proc'] == '법인3개이상/개인3개이상' }selected="selected"{ / }>법인3개이상/개인3개이상</option>
											<option value="경험무관" { ? DATA['cpny_proc'] == '경험무관' }selected="selected"{ / }>경험무관</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>근무형태</th>
									<td colspan="3">
										<select name="cpny_type" class="sel01 req" title="근무형태">
											<option value="세무회계사무소" { ? DATA['cpny_type'] == '세무회계사무소' }selected="selected"{ / }>세무회계사무소</option>
											<option value="일반기업(법인)" { ? DATA['cpny_type'] == '일반기업(법인)' }selected="selected"{ / }>일반기업(법인)</option>
											<option value="일반기업(개인)" { ? DATA['cpny_type'] == '일반기업(개인)' }selected="selected"{ / }>일반기업(개인)</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>급  여</th>
									<td colspan="3">
										<select name="cpny_pay" class="sel01 req" title="급여">
											<option value="연봉 2000만원 이상" { ? DATA['cpny_type'] == '연봉 2000만원 이상' }selected="selected"{ / }>연봉 2000만원 이상</option>
											<option value="연봉 3000만원 이상" { ? DATA['cpny_type'] == '연봉 3000만원 이상' }selected="selected"{ / }>연봉 3000만원 이상</option>
											<option value="연봉 4000만원 이상" { ? DATA['cpny_type'] == '연봉 4000만원 이상' }selected="selected"{ / }>연봉 4000만원 이상</option>
											<option value="연봉 5000만원 이상" { ? DATA['cpny_type'] == '연봉 5000만원 이상' }selected="selected"{ / }>연봉 5000만원 이상</option>
											<option value="협의" { ? DATA['cpny_type'] == '협의' }selected="selected"{ / }>협의</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>근무지역</th>
									<td colspan="3">
										<input type="text" class="ipTxt01 req" name="cpny_region" value="{ DATA['cpny_region'] }" maxlength="100" title="근무지역 입력" style="width:76%" />
									</td>
								</tr>
								<tr>
									<th>모집인원</th>
									<td colspan="3">
										<input type="number" class="ipTxt01 req" name="cpny_rnum" inputmode="numeric" pattern="[0-9]*" numberonly value="{ DATA['cpny_rnum'] }" maxlength="10" title="모집인원 입력" style="width:16%" />&nbsp;명
									</td>
								</tr>
								<tr>
									<th>마감일</th>
									<td colspan="3">
										<input type="date" id="deadline" class="ipTxt01 req" name="cpny_deadline" readonly value="{ DATA['deadline'] }" maxlength="10" title="모집인원 입력" style="width:16%" />
									</td>
								</tr>
								{ / }
								<tr>
									<th class="th_cont"><label class="lb_cont">한페이지 질문</label></th>
									<td colspan="3" class="td_cont">
										<textarea id="contents" name="contents" title="내용을 입력해주세요." class="req{ ? CONF['use_editor_yn'] == 'Y' } editor{ / }">{ DATA['contents'] }</textarea>
										<input type="hidden" name="editor_yn" value="{ CONF['use_editor_yn'] }" />
									</td>
								</tr>
								{ ? CONF['board_type'] == 'knowledge' }
									{ ? USER_AUTH_CHK == 'board' && BBS_UDT_MODE != 'nrply' }
										{ ? DATA['idno'] != '' }
								<tr class="kl_table">
									<th class="th_cont"><label class="lb_cont">한페이지 답변 내용</label></th>
									<td colspan="3" class="td_cont">
										<textarea id="kl_reply" name="kl_reply" title="내용을 입력해주세요." class="req{ ? CONF['use_editor_yn'] == 'Y' } editor{ / }">{ DATA['kl_reply'] }</textarea>
										<input type="hidden" name="editor_yn" value="{ CONF['use_editor_yn'] }" />
									</td>
								</tr>
										{ / }
									{ / }
								{ / }


								{ ? CONF['board_type'] != 'job' && CONF['board_code'] != 'biz_wise' }
									{ ? CONF['use_file_yn'] == 'Y' && CAN_FILE == 'Y' }
								<tr>
									<th>첨부파일</th>
									<td colspan="3" id="{ ? CONF['board_type'] == 'teamlist' }fileSecond{ : }files{ / }" data-iname="file">
										<div class="info_tr">※ 파일 크기는 { CONF['file_size_limit'] }Mb 를 넘을 수 없습니다.</div>
										{ ? CONF['board_type'] == 'teamlist' }
										<div class="in_file"><input type="file" class="{ ? CONF['board_type'] == 'gallery' && !sizeof(DATA['file']) }req{ / }" name="file[1]" value="" title="파일을 등록해주세요."></input> <a class="btn_s del act_file_del" href="#" style="display:none">삭제</a></div>
										{ : }
										<div class="in_file"><input type="file" class="{ ? CONF['board_type'] == 'gallery' && !sizeof(DATA['file']) }req{ / }" name="file[]" value="" title="파일을 등록해주세요."></input> <a class="btn_s act_file_add" href="#" data-max="{ CONF['file_limit'] }">추가</a> <a class="btn_s del act_file_del" href="#" style="display:none">삭제</a></div>
										{ / }
										<div class="filelist"></div>
										{ FILE_SECOND_SCRIPT }
									</td>
								</tr>
									{ / }
								{ / }
							{ : }
							<tr>
								<th>{ ? RDATA['idno'] }답글{ / }신청자</th>
								<td colspan="3">
									<input type="text" style="width:870px" class="ipTxt01 req" name="subject" value="{ DATA['subject'] }" maxlength="100" title="제목을 입력해주세요." style="width:76%" />
									{ ? CAN_NOTICE == 'Y' && !RDATA['idno'] }
									<label><input type="checkbox" name="notice_yn" value="Y" { ? DATA['notice_yn'] == 'Y' } checked="checked"{ / } title="상단공지 여부를 선택해주세요." /> 상단공지</label>
									{ / }
									{ ? CAN_SECRET == 'Y' && !RDATA['idno'] }
									<label><input type="radio" class="" title="공개" name="secret_yn" value="N" { ? DATA['secret_yn'] == 'N' }checked="checked"{ / } />공개</label>
									<label><input type="radio" class="" title="비공개" name="secret_yn" value="N" { ? DATA['secret_yn'] != 'N' }checked="checked"{ / } />비공개</label>
									{ / }
								</td>
							</tr>
							<tr>
								<th>비밀번호</th>
								<td>
									<input type="password" class="ipTxt02 req" name="passwd" value="" maxlength="10" title="비밀번호를 입력해주세요." />
								</td>
								<th>비밀번호확인</th>
								<td>
									<input type="password" class="ipTxt02 req" name="passwd_conf" value="" maxlength="10" title="비밀번호를 입력해주세요." />
								</td>
							</tr>
							<tr>
								<th>전화</th>
								<td>
									<input  type="tel" pattern="^\d{2,3}-\d{3,4}-\d{4}$" style="width:160px" class="ipTxt02 req" name="apply_phone" value="{ ? DATA['apply_phone'] }{ DATA['apply_phone'] }{ : }{ / }" maxlength="100" title="전화번호 입력"
										   placeholder="입력예시) 010-1234-5678"
									/>
								</td>
								<th>이메일</th>
								<td>
									<div class="for-mailform" data-name="email" data-class="ipTxt02 req,ipTxt02 req,sel01" data-attr="" >{ DATA['email'] }</div>
								</td>
							</tr>
							<tr>
								<th>주소</th>
								<td colspan="3">
									<div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:1;-webkit-overflow-scrolling:touch;">
										<img src="//t1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" onclick="closeDaumPostcode()" alt="닫기 버튼">
									</div>
									<input id="adress" type="text" class="postcode" name="apply_postcode" size="18" value="{ ? DATA['apply_postcode'] }{ DATA['apply_postcode'] }{ : }{ / }" readonly="readonly" />
									<button type="button" class="search_adress search_address">우편번호</button>
									<br>
									<input type="text" name="apply_addr1" value="{ ? DATA['apply_addr1'] }{ DATA['apply_addr1'] }{ : }{ / }" size="50" class="mt5 addr1 req" readonly="readonly"> <span class="ml5">기본주소</span>
									<br>
									<input type="text" name="apply_addr2" value="{ ? DATA['apply_addr2'] }{ DATA['apply_addr2'] }{ : }{ / }" size="50" class="mt5 addr2 req" maxlength="100"> <span class="ml5">나머지주소</span>
								</td>
							</tr>
							<tr>
								<th style="letter-spacing: -1px;">세무사합격기수</th>
								<td colspan="3">
									<input type="text" class="ipTxt02 req" name="apply_pass_year" value="{ ? DATA['apply_pass_year'] }{ DATA['apply_pass_year'] }{ : }{ / }" maxlength="100" title="주소를 입력해주세요" />
								</td>
							</tr>
							<tr>
								<th>등록번호</th>
								<td>
									<input type="text" class="ipTxt02 req" name="apply_no" value="" maxlength="10"/>
								</td>
								<th>국세경력(유무)</th>
								<td>
									<input type="text" class="ipTxt02 req" name="apply_exp" value="" maxlength="10" />
								</td>
							</tr>
							<tr>
								<th>희망신청장소</th>
								<td colspan="3">
									<label>
										<input type="radio" name="apply_place" value="금천" checked>
										<span>금천</span>
									</label>
									&nbsp;
									<label>
										<input type="radio" name="apply_place" value="강남">
										<span>강남</span>
									</label>
									&nbsp;
									<label>
										<input type="radio" name="apply_place" value="기타">
										<span>기타</span>
									</label>
								</td>
							</tr>
							<tr>
								<th>신청유형</th>
								<td colspan="3">
									<label>
										<input type="radio" name="apply_type" value="기본형" checked>
										<span>기본형</span>
									</label>
									&nbsp;
									<label>
										<input type="radio" name="apply_type" value="독립형">
										<span>독립형</span>
									</label>

									<label>
										<input type="radio" name="apply_type" value="세무정보만 사용형">
										<span>세무정보만 사용형</span>
									</label>
								</td>
							</tr>
							<tr>
								<th>입주희망일</th>
								<td colspan="3">
									<input type="date" class="ipTxt02 req" style="width:160px;" name="apply_wishday" value="{ ? DATA['apply_wishday'] }{ DATA['apply_wishday'] }{ : }{ / }" maxlength="100" title="입주희망일을 입력해주세요" />
								</td>
							</tr>

							<tr>
								<th>기타요청사항</th>
								<td colspan="3">
									<textarea id="contents" name="contents" title="기타요청사항을 입력해주세요." class="req{ ? CONF['use_editor_yn'] == 'Y' } editor{ / }">{ DATA['contents'] }</textarea>
									<input type="hidden" name="editor_yn" value="{ CONF['use_editor_yn'] }" />
								</td>
							</tr>
							<script src="//dmaps.daum.net/map_js_init/postcode.v2.js?autoload=false"></script>
							<script>
								$(function() {
									$(document).on('click', '.search_address', function() {
										search_address($(this).parent());
										return false;
									});
								});
							</script>
							{ / }
							</tbody>
						</table>

						{ ? CONF['board_type'] == 'apply' }
						<div class="div_explanation">
							<div class="right">㈜ 세림비즈 귀하 	selimbiz@taxemail.co.kr</div>

							<div class="expl">
								(*) 작성하시어서 운영자에게 메일로 넣어주시면 바로 가능한한 빠른 시일 내에 상담 전화드겠습니다. 신청해주셔서 감사드립니다.
							</div>
						</div>
						{ / }

						{ ? CONF['auth_write'] == 'N' && !DATA['idno'] }
						{ ? CONF['board_type'] != 'knowledge' }
						{ #captcha }
						{ / }
						<div class="personalWrap">
							<div class="top">
								<div class="tit">개인정보 수집 및 이용에 대한 안내</div>
								<!-- <a href="#" class="btnDetail">[개인정보취급방침 전문보기]</a> -->
							</div>
							<div class="textScroll">
							{ AGREE_TEXT }
							</div>
							<input type="checkbox" id="personalAgree" class="agreeY" title="개인정보 수집 및 이용에 동의" checked="checked" /> <label for="personalAgree">개인정보 수집 및 이용에 동의합니다.</label>
						</div>
						{ / }
					</div>
					</form>

					<div class="btnBbs bbNone ">
						{ ? CONF['board_type'] != 'apply' }
						<div class="left">
							<a href="./?{ QS }">목록 { DATA['kl_stauts'] }</a>
						</div>
						<div class="right">
							{ ? CONF['board_type'] == 'knowledge' }
								{ ? DATA['idno'] != '' }
									{ ? USER_AUTH_CHK == 'board' }
										{ ? BBS_UDT_MODE != 'nrply' }
											{ ? DATA['kl_status'] == 'Y'  }
								<a href="#" class="act_save">답변수정</a>
											{ : }
								<a href="#" class="act_save">답변하기</a>
											{ / }
										{ : }
								<a href="#" class="act_save">수정</a>
										{ / }
									{ : }
								<a href="#" class="act_save">수정</a>
									{ / }
								{ : }
								<a href="#" class="act_save">질문하기</a>
								{ / }
							{ : }
							<a href="#" class="act_save">저장</a>
							{ / }
							<a href="#" class="act_back">취소</a>
						</div>
						{ : }
						<div class="center">
							<a href="#" class="act_save">입주 신청</a>
							<a href="#" class="act_back">취소</a>
						</div>
						{ / }
					</div>

{ CONTENTS['footer_contents'] }

				</div>
				<!-- //contStart -->

			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

{ #footer }
