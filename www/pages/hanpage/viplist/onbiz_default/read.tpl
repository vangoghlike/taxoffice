{ #header }

		<!-- Container -->
		<div class="container" id="container">

{ #subtop }
			<div class="subNav subNavType2">
				<ul>
					{ @MNGR }
					<li class="mngr{ .idno } { ? MNGR_IDNO == .idno }on{ / }"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/view?&mid={ .idno }">{ .mngr_name }</a></li>
					{ / }
				</ul>
			</div>

			<!-- subContent -->
			<div class="subContent">
				<!-- subTopInfo -->
				<div class="subTopInfo">

					<!-- h2Wrap -->
					<div class="h2Wrap">
						<h2>{ USER_TYPE } 대화방 &nbsp;&nbsp;<span class="small-tit gray">{ DATA['mngr_name'] }</span></span></h2>
					</div>
					<!-- //h2Wrap -->

					<!-- lnb -->
					<div class="lnb">
						<span><img src="{TYPE_URL}/images/common/home.png" alt="home"></span>
						{ ? is_numeric(CONTENTS['breadcrumbs'][0]['idno']) }{ @ CONTENTS['breadcrumbs'] }{ ? .index_ < .size_ -1 }<span>{ .menu_title }</span>{ : }<span>{ .menu_title }</span>{ / }{ / }{ : }<span class="last">{ CONTENTS['menu_title'] }</span>{ / }
						<span>{ BBS_DATA['mngr_name'] }</span><span class="last">대화방</span>
					</div>
					<!-- //lnb -->

				</div>
				<!-- //subTopInfo -->
				<!-- contStart -->
				<div class="contStart">
					<div class="tabType01">
						<ul>
							{ ? USERINFO['user_id'] != DATA['user_id'] }
							<li style="width:50%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/view?&mid={ DATA['idno'] }">기본 정보</a></li>
							<li class="on" style="width:50%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/list?&mid={ DATA['idno'] }">대화방</a></li>
							{ : }
							<li style="width:33.3%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/view?&mid={ DATA['idno'] }">기본 정보</a></li>
							<li class="on" style="width:33.3%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/list?&mid={ DATA['idno'] }">대화방</a></li>
							<li style="width:33.3%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/info?&mid={ DATA['idno'] }">정보</a></li>
							{ / }
						</ul>
					</div>

{ #dep3 }

{ CONTENTS['head_contents'] }

					<div class="viewWrap">
						<div class="line">
							<div class="left">
								<div class="box">
									<div class="tit">제목</div>
									<div class="txt bold">{ BBS_DATA['subject'] }</div>
								</div>
							</div>
						</div>
						<div class="line">
							<div class="left">
								<div class="box">
									<div class="tit">작성자</div>
									<div class="txt">{ BBS_DATA['writer_name'] }</div>
								</div>
							</div>
							<div class="right">
								<div class="box">
									<div class="tit">조회수</div>
									<div class="txt">{ BBS_DATA['hits'] }</div>
								</div>
							</div>
							<div class="right mr50">
								<div class="box">
									<div class="tit">날짜</div>
									<div class="txt">{ BBS_DATA['reg_day'] }</div>
								</div>
							</div>
						</div>
						{ ? CONF['use_file_yn'] == 'Y' }
						<div class="line">
							<div class="left">
								<div class="box">
									<div class="tit">첨부파일</div>
									<div class="txt">
									{ @ BBS_DATA['file'] }
										<div><a href="#" class="btnDownload file-download" data-part="{ CONF['board_code'] }" data-encname="{ .file_name_saved }" data-filename="{ .file_name }">{ .icon }{ .file_name }</a></div>
									{ / }
									</div>
								</div>
							</div>
						</div>
						{ / }
						<div class="viewContent">
						{ ? BBS_DATA['editor_yn'] == 'Y' }{ BBS_DATA['contents'] }{ : }{ =nl2br(BBS_DATA['contents']) }{ / }
						</div>
					</div>


					<div class="btnBbs bbNone ">
						<div class="left">
							<a href="./?{ QS }&mid={ DATA['idno'] }">목록</a>
						</div>
						<div class="right">
							{ ? CAN_WRITE == 'Y' && (CONF['auth_write'] == 'N' || BBS_DATA['reg_user_id'] == USERINFO['user_id']) }
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/write?{ QS }&mid={ DATA['idno'] }&idno={ BBS_DATA['idno'] }" class="{ ? CONF['auth_write'] == 'N' }board_secretY{ / }" data-idno="{ BBS_DATA['idno'] }">수정</a>
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/?{ QS }&mid={ DATA['idno'] }" class="act_delete { ? CONF['auth_write'] == 'N' }board_secretY{ / }" data-idno="{ BBS_DATA['idno'] }">삭제</a>
							{ / }
							{ ? CAN_REPLY == 'Y' }
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/reply?{ QS }&mid={ DATA['idno'] }&idno={ BBS_DATA['idno'] }">답글</a>
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
								<td colspan="5">{ ? sizeof(BBS_DATA_PREV) }<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&mid={ DATA['idno'] }&idno={ BBS_DATA_PREV['idno'] }" class="{ ? CONF['auth_write'] == 'N' }board_secret{ DATA_PREV['secret_yn'] }{ : }{ ? BBS_DATA_PREV['secret_yn'] == 'Y' && BBS_DATA_PREV['user_id'] != USERINFO['user_id'] }no_auth{ / }{ / }" data-idno="{ BBS_DATA_PREV['idno'] }">{ ? DATA_PREV['secret_yn'] == 'Y' }<img src="{TYPE_URL}/images/sub/icon_lock.png" alt="비밀글" class="b_icon" /> { / }{ BBS_DATA_PREV['subject'] }{ : }<a>이전글이 없습니다.{ / }</a></td>
							</tr>
							<tr>
								<th scope="row"><span class="down_bul">다음글</span></th>
								<td colspan="5">{ ? sizeof(BBS_DATA_NEXT) }<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&mid={ DATA['idno'] }&idno={ BBS_DATA_NEXT['idno'] }" class="{ ? CONF['auth_write'] == 'N' }board_secret{ DATA_NEXT['secret_yn'] }{ : }{ ? BBS_DATA_NEXT['secret_yn'] == 'Y' && BBS_DATA_NEXT['user_id'] != USERINFO['user_id'] }no_auth{ / }{ / }" data-idno="{ BBS_DATA_NEXT['idno'] }">{ ? DATA_NEXT['secret_yn'] == 'Y' }<img src="{TYPE_URL}/images/sub/icon_lock.png" alt="비밀글" class="b_icon" /> { / }{ BBS_DATA_NEXT['subject'] }{ : }<a>다음글이 없습니다.{ / }</a></td>
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
