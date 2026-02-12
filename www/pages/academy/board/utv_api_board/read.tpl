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

					<div class="viewWrap">
						<div class="line">
							<div class="left">
								<div class="box">
									<div class="tit">제목</div>
									<div class="txt bold">{ UTV_VIDEO_TITLE }</div>
								</div>
							</div>
						</div>
						
						<div class="viewContent">
							<div class="utv_ifr_wrap">
								<iframe class="utv_ifr" width="1280" height="720" src="https://www.youtube.com/embed/{ UTV_VIDEO_ID }"
										frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
										allowfullscreen></iframe>
							</div>
						{ @ DATA['images'] }
							<div><img src="/common/imageload.php?type={ CONTENTS['board_code'] }&file={ .file_name_saved }" alt="{ .file_name }" /></div>
						{ / }
						{ ? DATA['editor_yn'] == 'Y' }{ DATA['contents'] }{ : }{ =nl2br(DATA['contents']) }{ / }
						</div>
					</div>


					<div class="btnBbs bbNone ">
						<div class="left">
							<a href="./?{ QS }">목록</a>
							{ ? CAN_WRITE == 'Y' && (CONF['auth_write'] == 'N' || DATA['reg_user_id'] == USERINFO['user_id']) }
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/write?{ QS }&idno={ DATA['idno'] }" class="{ ? CONF['auth_write'] == 'N' }board_secretY{ / }" data-idno="{ DATA['idno'] }">수정</a>
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/?{ QS }" class="act_delete { ? CONF['auth_write'] == 'N' }board_secretY{ / }" data-idno="{ DATA['idno'] }">삭제</a>
							{ / }
							{ ? CAN_REPLY == 'Y' }
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/reply?{ QS }&idno={ DATA['idno'] }">답글</a>
							{ / }
						</div>
					</div>

					<table summary="윗글/아랫글" class="basic_tb">
						<caption></caption>
						<colgroup>
							<col style="width:6rem;">
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
