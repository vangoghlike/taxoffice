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

{ CONTENTS['head_contents'] }

					<div class="viewWrap { ? DATA['kl_reply'] != NULL && DATA['kl_reply'] != '' }viewWrap01{ / }">
						<div class="line">
							<div class="left">
								<div class="box">
									<div class="tit">
										{ ? CONF['board_type'] == 'knowledge' }
											상담제목
										{ : }
											제목
										{ / }
									</div>
									<div class="txt bold">{ DATA['subject'] }</div>
								</div>
							</div>
						</div>
						<div class="line">
							<div class="left">
								<div class="box">
									<div class="tit">
										{ ? CONF['board_type'] == 'knowledge' }
											{ ? DATA['kl_reply'] != '' }
										 		{ ? DATA['kl_email_manager'] == 'sykang@taxemail.co.kr' || DATA['kl_email_manager'] == 'syyi@taxemail.co.kr' || DATA['kl_email_manager'] == 'jinwoodak@taxemail.co.kr' }
											상담자
												{ : }
											상담세무사
												{ / }
											{ : }
											상담요청
											{ / }
										{ : }
											제목
										{ / }
									</div>
									<div class="txt bold">
										{ ? DATA['kl_email_manager'] == 'taxmgt10@taxemail.co.kr' }
										최유정 세무사 ( <a href="mailto:{ DATA['kl_email_manager'] }">{ DATA['kl_email_manager'] }</a> )
										{ : DATA['kl_email_manager'] == 'taxmgt15@taxemail.co.kr' }
										권다희 세무사 ( <a href="mailto:{ DATA['kl_email_manager'] }">{ DATA['kl_email_manager'] }</a> )
										{ : DATA['kl_email_manager'] == 'sykang@taxemail.co.kr' }
										강삼엽 이사 ( <a href="mailto:{ DATA['kl_email_manager'] }">{ DATA['kl_email_manager'] }</a> )
										{ : DATA['kl_email_manager'] == 'syyi@taxemail.co.kr' }
										이선영 실장 ( <a href="mailto:{ DATA['kl_email_manager'] }">{ DATA['kl_email_manager'] }</a> )
										{ : DATA['kl_email_manager'] == 'taxmgt8@taxemail.co.kr' }
										김대원 세무사 ( <a href="mailto:{ DATA['kl_email_manager'] }">{ DATA['kl_email_manager'] }</a> )
										{ : DATA['kl_email_manager'] == 'taxmgt13@taxemail.co.kr' }
										황예림 세무사 ( <a href="mailto:{ DATA['kl_email_manager'] }">{ DATA['kl_email_manager'] }</a> )
										{ : DATA['kl_email_manager'] == 'taxmgt3@taxemail.co.kr' }
										박태형 세무사 ( <a href="mailto:{ DATA['kl_email_manager'] }">{ DATA['kl_email_manager'] }</a> )
										{ : DATA['kl_email_manager'] == 'taxmgt9@taxemail.co.kr' }
										배호영 세무사 ( <a href="mailto:{ DATA['kl_email_manager'] }">{ DATA['kl_email_manager'] }</a> )
										{ : DATA['kl_email_manager'] == 'taxmgt6@taxemail.co.kr' }
										정혜미 세무사 ( <a href="mailto:{ DATA['kl_email_manager'] }">{ DATA['kl_email_manager'] }</a> )
										{ : DATA['kl_email_manager'] == 'taxmgt5@taxemail.co.kr' }
										김지홍 세무사 ( <a href="mailto:{ DATA['kl_email_manager'] }">{ DATA['kl_email_manager'] }</a> )
										{ : DATA['kl_email_manager'] == 'taxmgt4@taxemail.co.kr' }
										장호연 세무사 ( <a href="mailto:{ DATA['kl_email_manager'] }">{ DATA['kl_email_manager'] }</a> )
										{ : DATA['kl_email_manager'] == 'taxmgt@taxemail.co.kr' }
										김창진 세무사 ( <a href="mailto:{ DATA['kl_email_manager'] }">{ DATA['kl_email_manager'] }</a> )
										{ : DATA['kl_email_manager'] == 'jinwoodak@taxemail.co.kr' }
										상담자 ( <a href="mailto:{ DATA['kl_email_manager'] }">{ DATA['kl_email_manager'] }</a> )
										{ : DATA['kl_email_manager'] == '' }
										관리자
										{ / }
									</div>
								</div>
							</div>
						</div>
						<div class="line">
							<div class="left">
								<div class="box">
									<div class="tit">작성자</div>
									<div class="txt">
										{ ? mb_strlen( DATA['writer_name'], 'utf-8') > 2 }
											{ =iconv_substr( DATA['writer_name'],0, 2, 'utf-8' ) }*
										{ : }
											{ =iconv_substr( DATA['writer_name'],0, 1, 'utf-8' ) }*
										{ / }
									</div>
								</div>
							</div>
							<div class="right">
								<div class="box">
									<div class="tit">조회수</div>
									<div class="txt">{ DATA['hits'] }</div>
								</div>
							</div>
							<div class="right mr50">
								<div class="box">
									<div class="tit">날짜</div>
									<div class="txt">{ DATA['reg_day'] }</div>
								</div>
							</div>
						</div>
						{ ? CONF['use_file_yn'] == 'Y' }
						<div class="line">
							<div class="left">
								<div class="box">
									<div class="tit">첨부파일</div>
									<div class="txt">
									{ @ DATA['file'] }
										<div><a href="#" class="btnDownload file-download" data-part="{ CONF['board_code'] }" data-encname="{ .file_name_saved }" data-filename="{ .file_name }">{ .icon }{ .file_name }</a></div>
									{ / }
									</div>
								</div>
							</div>
						</div>
						{ / }
						<div class="viewContent">
						{ ? DATA['editor_yn'] == 'Y' }{ DATA['contents'] }{ : }{ =nl2br(DATA['contents']) }{ / }
						</div>
					</div>
					{ ? DATA['kl_reply'] != NULL && DATA['kl_reply'] != '' }
					<div class="viewWrap kl_view">
						<div class="viewContent">
							<tag class="mb20">답변 내용</tag>
							{ DATA['kl_reply'] }
						</div>
					</div>
					{ / }


					<div class="btnBbs bbNone ">
						<div class="left">
							<a href="./?{ QS }">목록</a>
						</div>
						<div class="right">
							{ ? CAN_WRITE == 'Y' && (CONF['auth_write'] == 'N' || DATA['reg_user_id'] == USERINFO['user_id']) }
								{ ? DATA['kl_status'] == 'N' }

									{ ? USER_AUTH_CHK == 'board' }
{*								<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/write?{ QS }&idno={ DATA['idno'] }" class="{ ? CONF['auth_write'] == 'N' }{ / }" data-idno="{ DATA['idno'] }">답변수정</a>*}
								<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/?{ QS }" class="act_delete" data-idno="{ DATA['idno'] }">삭제</a>
									{ : }
								<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/write?{ QS }&idno={ DATA['idno'] }" class="{ ? CONF['auth_write'] == 'N' }board_secretY{ / }" data-idno="{ DATA['idno'] }">수정</a>
								<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/?{ QS }" class="act_delete { ? CONF['auth_write'] == 'N' }board_secretY{ / }" data-idno="{ DATA['idno'] }">삭제</a>
									{ / }
								{ : }
							<a class="gray_btn">답변완료 질문</a>
								{ / }
							{ / }
							{ ? CAN_REPLY == 'Y' }
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/reply?{ QS }&idno={ DATA['idno'] }">답글</a>
							{ / }

							{ ? USER_AUTH_CHK == 'board' }
								{ ? DATA['kl_status'] == 'N' }
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/write?{ QS }&idno={ DATA['idno'] }" class="{ ? CONF['auth_write'] == 'N' }{ / }" data-idno="{ DATA['idno'] }">답변하기</a>
								{ : }
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/write?{ QS }&idno={ DATA['idno'] }" class="{ ? CONF['auth_write'] == 'N' }{ / }" data-idno="{ DATA['idno'] }">답변수정</a>
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/?{ QS }" class="act_delete" data-idno="{ DATA['idno'] }">삭제</a>
								{ / }
							{ / }
						</div>
					</div>

					<table summary="윗글/아랫글" class="basic_tb">
						<caption></caption>
						<colgroup>
							<col width="80px">
							<col width="auto">
						</colgroup>
						<tbody>
							<tr class="prev">
								<th scope="row"><span class="up_bul">이전글</span></th>
								<td colspan="5">{ ? sizeof(DATA_PREV) }<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&idno={ DATA_PREV['idno'] }" class="{ ? CONF['auth_write'] == 'N' }board_secret{ DATA_PREV['secret_yn'] }{ : }{ ? DATA_PREV['secret_yn'] == 'Y' && DATA_PREV['user_id'] != USERINFO['user_id'] }no_auth{ / }{ / }" data-idno="{ DATA_PREV['idno'] }">{ ? DATA_PREV['secret_yn'] == 'Y' }<img src="{TYPE_URL}/images/sub/icon_lock.png" alt="비밀글" class="b_icon" /> { / }{ DATA_PREV['subject'] }{ : }<a>이전글이 없습니다.{ / }</a></td>
							</tr>
							<tr>
								<th scope="row"><span class="down_bul">다음글</span></th>
								<td colspan="5">{ ? sizeof(DATA_NEXT) }<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&idno={ DATA_NEXT['idno'] }" class="{ ? CONF['auth_write'] == 'N' }board_secret{ DATA_NEXT['secret_yn'] }{ : }{ ? DATA_NEXT['secret_yn'] == 'Y' && DATA_NEXT['user_id'] != USERINFO['user_id'] }no_auth{ / }{ / }" data-idno="{ DATA_NEXT['idno'] }">{ ? DATA_NEXT['secret_yn'] == 'Y' }<img src="{TYPE_URL}/images/sub/icon_lock.png" alt="비밀글" class="b_icon" /> { / }{ DATA_NEXT['subject'] }{ : }<a>다음글이 없습니다.{ / }</a></td>
							</tr>
						</tbody>
					</table>

{ CONTENTS['footer_contents'] }

				</div>
				<!-- //contStart -->

			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

{ #footer }
