{ #header }

		<!-- Container -->
		<div class="container" id="container">

{ #subtop }

			<!-- subContent -->
			<div class="subContent">
				
{ #breadcrumbs }

				<!-- contStart -->
				<div class="contStart">

{ #dep3 }
{ #cats }

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
					<input type="hidden" name="sendmail" value="taxmgt10@taxemail.co.kr" />
					{ ? CATEGORY_IDNO }<input type="hidden" name="category_idno" value="{ CATEGORY_IDNO }" />{ / }
					<div class="tblType03 off" style="margin-bottom:10px;">
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
									<th>구분</th>
									<td colspan="3">
										<select name="category_idno" class="sel01 req" title="구분 항목을 선택해주세요." { ? CATEGORY_IDNO } disabled="disabled"{ / }>
										{ @ CATS }
											<option value="{ .key_ }" { ? .key_ == DATA['category_idno'] || !DATA['category_idno'] && .key_ == CATEGORY_IDNO } selected="selected"{ / }>{ .value_ }</option>
										{ / }
										</select>
									</td>
								</tr>
								{ / }
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
								{ ? CONF['auth_write'] == 'N' }
								{ ? CONF['board_type'] != 'qna' && CONF['board_type'] != 'qna' }
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
								<tr>
									<th>작성자</th>
									<td colspan="3">
										{ ? USERINFO['user_name'] == "관리자" }
										<select name="writer_name">
											<option value="관리자" { ? DATA['writer_name']=='관리자' } selected="selected"{ / }>관리자</option>
											<option value="김창진" { ? DATA['writer_name']=='김창진' } selected="selected"{ / }>김창진</option>
											<option value="최유정" { ? DATA['writer_name']=='최유정' } selected="selected"{ / }>최유정</option>
											<option value="김주식" { ? DATA['writer_name']=='김주식' } selected="selected"{ / }>김주식</option>
											<option value="강삼엽" { ? DATA['writer_name']=='강삼엽' } selected="selected"{ / }>강삼엽</option>
										</select>
										{ : }
										{ ? DATA['writer_name'] }{ DATA['writer_name'] }{ : }{ USERINFO['user_name'] }{ / }
										{ / }
									</td>
								</tr>
								{ / }
								<tr>
									<th class="th_cont"><label class="lb_cont">내용</label></th>
									<td colspan="3" class="td_cont">
										<textarea id="contents" name="contents" title="내용을 입력해주세요." class="req{ ? CONF['use_editor_yn'] == 'Y' } editor{ / }">{ DATA['contents'] }</textarea>
										<input type="hidden" name="editor_yn" value="{ CONF['use_editor_yn'] }" />
									</td>
								</tr>
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
						{ #captcha }
						<div class="personalWrap">
							<div class="top">
								<div class="tit">개인정보 수집 및 이용에 대한 안내</div>
								<!-- <a href="#" class="btnDetail">[개인정보취급방침 전문보기]</a> -->
							</div>
							<div class="textScroll">
							{ AGREE_TEXT }
							</div>
							<input type="checkbox" id="personalAgree" class="agreeY" title="개인정보 수집 및 이용에 동의" /> <label for="personalAgree">개인정보 수집 및 이용에 동의합니다.</label>
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
						<div class="right">
							<a href="#" class="act_save">저장</a>
							<a href="#" class="act_back">취소</a>
						</div>
					</div>


{ CONTENTS['footer_contents'] }

				</div>
				<!-- //contStart -->

			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

{ #footer }
