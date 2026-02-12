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
							<li><a href="{ BASE_URL }/542">Han-Page</a></li>
						</ul>
					</div>
				</div>
				{ / }

{ #breadcrumbs }

				<!-- contStart -->
				<div class="contStart">
					{ ? BOARD_KL_TYPE != 'qna' }
{ #dep3 }
					{ / }

{ CONTENTS['head_contents'] }

					<script src="/webedit/cheditor.js"></script>
					<form id="frm_write" name="frm_write" method="post" action="?" enctype="multipart/form-data" >
					<input type="hidden" name="act" value="save" />
					<input type="hidden" name="s" value="{ SITE_INFO['idno'] }" />
					<input type="hidden" name="m" value="{ MENU_NO }" />
					<input type="hidden" name="c" value="{ CONTENTS_NO }" />
					<input type="hidden" name="qs" value="{ QS }" />
					<input type="hidden" name="p_idno" value="{ RDATA['idno'] }" />
					<input type="hidden" name="idno" value="{ DATA['idno'] }" />
					{ ? CONF['board_code'] == '020' }
					<input type="hidden" name="category_name" value="{ =strip_tags( CONTENTS['breadcrumbs'][1]['menu_title'] ) }" />
					{ / }
					{ ? CONF['board_type'] == 'qna_dep' }
					<input type="hidden" name="sendmail" value="" />
					{ / }
					{ ? CATEGORY_IDNO }<input type="hidden" name="category_idno" value="{ CATEGORY_IDNO }" />{ / }
					<div class="tblType03 { ? CONF['board_type'] == 'qna_dep' }qna_dep_tbl{ / }" style="margin-bottom:10px;">
						{ ? CONF['board_type'] == 'qna_dep' }
						<div class="qna_pic">
							<img src="" />
						</div>
						{ / }
						<table>
{*							<colgroup>*}
{*								<col style="width:105px" />*}
{*								<col style="width:200px"  />*}
{*								<col style="width:120px" />*}
{*								<col  />*}
{*							</colgroup>*}
							<tbody>
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
								{ ? CONF['board_type'] == 'qna_dep' }
								<tr>
									<th>담당자</th>
									<td colspan="3">
									<span class="qna_ta"></span>
								</td>
								</tr>
								{ / }
								{ ? CONF['board_type'] == 'sector' }

								<tr>
									<th>
										<label for="sector_yn">
											업종 주요글
										</label>
									</th>
									<td colspan="3">
										<select id="sector_yn" class="sector_yn" name="sector_yn">
											<option value="N" { ? DATA['sector_yn'] == 'N' }selected="selected"{ / }>일반글</option>
											<option value="Y" { ? DATA['sector_yn'] == 'Y' }selected="selected"{ / }>상단 업종 주요글</option>
										</select>
									</td>
								</tr>

								<tr>
									<th>{ ? RDATA['idno'] }답글{ / }제목</th>
									<td colspan="3">

										<div class="sector-sbj__area">
											<div class="type_y type_yn">
												<ul>
													<li>
														<a><tag>
															Ⅰ. 업종의 개요 (업종의 특성)
														</tag></a>
													</li>
													<li>
														<a><tag>
															Ⅱ. 회사의 설립 (설립, 인허가사항, 사업자등록)
														</tag></a>
													</li>
													<li>
														<a><tag>
															Ⅲ. 사업의 형태 (수입의 발생 형태)
														</tag></a>
													</li>
													<li>
														<a><tag>
															Ⅳ. 사업의 형태 (비용의 발생 형태)
														</tag></a>
													</li>
													<li>
														<a><tag>
															Ⅴ. 세무상 Point
														</tag></a>
													</li>
												</ul>

												<div class="sector-num__area">
													<label for="sector_num">업종 상단글 순서&nbsp;</label>
													<input type="number" id="sector_num" class="sector_num" min="1" max="16" name="sector_num" value="{ ? DATA['sector_num'] }{ DATA['sector_num'] }{ : }{ ? SECTOR_NUM != 1 }{ SECTOR_NUM }{ : }1{ / }{ / }">
												</div>
											</div>
											<div class="type_n type_yn">

											</div>

										</div>

										<input type="text" class="ipTxt01 req ip_sbj" name="subject" value="{ DATA['subject'] }" maxlength="100" title="제목을 입력해주세요."/>
										{ ? CAN_NOTICE == 'Y' && !RDATA['idno'] }
										<label class="lb_sbj"><input type="checkbox" name="notice_yn" value="Y" { ? DATA['notice_yn'] == 'Y' } checked="checked"{ / } title="상단공지 여부를 선택해주세요." /> 상단공지</label>
										{ / }
										{ ? CAN_SECRET == 'Y' && !RDATA['idno'] }
										<label><input type="radio" class="" title="공개" name="secret_yn" value="N" { ? DATA['secret_yn'] == 'N' }checked="checked"{ / } />공개</label>
										<label><input type="radio" class="" title="비공개" name="secret_yn" value="Y" { ? DATA['secret_yn'] != 'N' }checked="checked"{ / } />비공개</label>
										{ / }
									</td>
								</tr>

								{ : }
								<tr>
									<th>{ ? RDATA['idno'] }답글{ / }제목</th>
									<td colspan="3">
										<input type="text" class="ipTxt01 req ip_sbj" name="subject" value="{ DATA['subject'] }" maxlength="100" title="제목을 입력해주세요."/>
										{ ? CAN_NOTICE == 'Y' && !RDATA['idno'] }
										<label class="lb_sbj"><input type="checkbox" name="notice_yn" value="Y" { ? DATA['notice_yn'] == 'Y' } checked="checked"{ / } title="상단공지 여부를 선택해주세요." /> 상단공지</label>
										{ / }
										{ ? CAN_SECRET == 'Y' && !RDATA['idno'] }
										<label><input type="radio" class="" title="공개" name="secret_yn" value="N" { ? DATA['secret_yn'] == 'N' }checked="checked"{ / } />공개</label>
										<label><input type="radio" class="" title="비공개" name="secret_yn" value="Y" { ? DATA['secret_yn'] != 'N' }checked="checked"{ / } />비공개</label>
										{ / }
										
									</td>
								</tr>
								{ / }
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

							{ ? CONF['board_type'] == 'knowledge' }
								{ ? CONF['auth_write'] == 'N' }
									{ ? USERINFO['user_auth'] != '["*"]' }
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
							{ : }
								{ ? CONF['auth_write'] == 'N' }
									{ ? CONF['board_type'] != 'qna_dep' &&	CONF['board_type'] != 'qna' }
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
								<tr class="mb_col_tf mb_col_wr">
									<th>작성자</th>
									<td class="mb_col_wr_td">
										<input type="text" class="ipTxt02 req" name="writer_name" value="{ ? DATA['writer_name'] }{ DATA['writer_name'] }{ : }{ USERINFO['user_name'] }{ / }" maxlength="100" title="작성자명을 입력해주세요." />
									</td>
									<th class="mb_col_move">이메일</th>
									<td class="mb_col_move">
										<div class="for-mailform" data-name="email" data-class="ipTxt02 req,ipTxt02 req,sel01" data-attr="" >{ DATA['email'] }</div>
									</td>
								</tr>
								<tr class="mb_col_st mb_col_em">

								</tr>
								{ : }
								{ ? CONF['board_code'] == 'faq' }
								<tr>
									<td>카테고리</td>
									<td>
										<select name="sub_board_code">
											<option>--- 선택 ---</option>
											<option value="four_insurance" { ? DATA['sub_board_code']=='four_insurance' } selected="selected"{ / }>인사급여</option>
											<option value="disadvantage" { ? DATA['sub_board_code']=='disadvantage' } selected="selected"{ / }>부가세</option>
											<option value="establishment" { ? DATA['sub_board_code']=='establishment' } selected="selected"{ / }>소득세</option>
											<option value="nationalTax_foreign" { ? DATA['sub_board_code']=='nationalTax_foreign' } selected="selected"{ / }>법인세</option>
											<option value="taxInfo_stock" { ? DATA['sub_board_code']=='taxInfo_stock' } selected="selected"{ / }>양도세</option>
											<option value="info_dissatisfaction" { ? DATA['sub_board_code']=='info_dissatisfaction' } selected="selected"{ / }>상속증여</option>
											<option value="taxes" { ? DATA['sub_board_code']=='taxes' } selected="selected"{ / }>지방세</option>
											<option value="taxspecial" { ? DATA['sub_board_code']=='taxspecial' } selected="selected"{ / }>감면세제</option>
{*											<option value="관리자" { ? DATA['sub_board_code']=='관리자' } selected="selected"{ / }>취득양도</option>*}
											<option value="tcbc2_11" { ? DATA['sub_board_code']=='tcbc2_11' } selected="selected"{ / }>주식관련</option>
											<option value="019" { ? DATA['sub_board_code']=='019' } selected="selected"{ / }>비영리</option>
											<option value="enter_standard03" { ? DATA['sub_board_code']=='enter_standard03' } selected="selected"{ / }>회계실무</option>
										</select>
									</td>
								</tr>
								{ / }
								<tr>
									<th>작성자</th>
									<td colspan="3">
										{ ? USERINFO['user_name'] == "관리자" }
										<select name="writer_name">
											<option value="관리자" { ? DATA['writer_name']=='관리자' } selected="selected"{ / }>관리자</option>
											<option value="김창진" { ? DATA['writer_name']=='김창진' } selected="selected"{ / }>김창진</option>
											<option value="최유정" { ? DATA['writer_name']=='최유정' } selected="selected"{ / }>최유정</option>
											<option value="권다희" { ? DATA['writer_name']=='권다희' } selected="selected"{ / }>권다희</option>
											<option value="강삼엽" { ? DATA['writer_name']=='강삼엽' } selected="selected"{ / }>강삼엽</option>
										</select>
										{ : }
										{ ? DATA['writer_name'] }{ DATA['writer_name'] }{ : }{ USERINFO['user_name'] }{ / }
										{ / }
									</td>
								</tr>
								{ / }
							{ / }
								<tr>
									<th class="th_cont">
										<label class="lb_cont">
										{ ? CONF['board_type'] == 'knowledge' }
											한페이지 질문
										{ : }
											내용
										{ / }
										</label>
									</th>
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

								{ ? CONF['use_file_yn'] == 'Y' && CAN_FILE == 'Y' }
								<tr>
									<th>첨부파일</th>
									<td colspan="3" id="files" data-iname="file">
										<div class="info_tr">※ 파일 크기는 { CONF['file_size_limit'] }Mb 를 넘을 수 없습니다.</div>
										<div class="in_file"><input type="file" class="{ ? CONF['board_type'] == 'gallery' && !sizeof(DATA['file']) }req{ / }" name="file[]" value="" title="파일을 등록해주세요."></input> <a class="btn_s act_file_add" href="#" data-max="{ CONF['file_limit'] }">추가</a> <a class="btn_s del act_file_del" href="#" style="display:none">삭제</a></div>
										<div class="filelist"></div>
										{ FILE_LIST_SCRIPT }
									</td>
								</tr>
								{ / }
							</tbody>
						</table>
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
							<input type="checkbox" id="personalAgree" class="agreeY" title="개인정보 수집 및 이용에 동의" checked="checked"/> <label for="personalAgree">개인정보 수집 및 이용에 동의합니다.</label>
						</div>
						{ ? MENU_NO == '194' }
						<div class="errorReport">
							<p>
								콘텐츠 내용 및 사이트 메뉴상의 오류 신고시 신고해주신 모든 유저(User)에게<br>
								<strong>문화상품권</strong>을 지급해 드립니다. (단, 인적사항 필요)<br>
							</p>
						</div>
						{ / }
						{ / }
					</div>
					</form>

					<div class="btnBbs bbNone ">
						{ ? CONF['board_type'] != 'qna' && CONF['board_type'] != 'qna_dep' }
						<div class="left">
							{ ? BOARD_TYPE == 'knowledge' }
							<a href="{ BASE_URL }/545">목록</a>
							{ : }
							<a href="./?{ QS }">목록</a>
							{ / }
						</div>
						{ / }
						{ ? CONF['board_type'] == 'qna_dep' }
						<div class="right qna_dep_btn off">
							<a href="#" class="act_save">전송</a>
							<a href="#" class="act_back">취소</a>
						</div>
						{ : CONF['board_type'] == 'knowledge' }
						<div class="right">
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
							<a href="#" class="act_back">취소</a>
						</div>
						{ : }
						<div class="right">
							<a href="#" class="act_save">저장</a>
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
