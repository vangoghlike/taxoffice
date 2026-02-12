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
									<div class="txt bold">{ DATA['subject'] }</div>
								</div>
							</div>
							<a class="bbs_print_btn"><i class="fa fa-print"></i>&nbsp;인쇄</a>
						</div>
						<div class="line">
							<div class="left">
								<div class="box">
									<div class="tit">작성자</div>
									<div class="txt">
										{ ? DATA['board_code'] == 'hanpage' }
											{ ? mb_strlen( DATA['writer_name'], 'utf-8') > 2 }
											{ =iconv_substr( DATA['writer_name'],0, 2, 'utf-8' ) }*
											{ : }
											{ =iconv_substr( DATA['writer_name'],0, 1, 'utf-8' ) }*
											{ / }
										{ : }
											{ DATA['writer_name'] }
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
									{ @ ORI_DATA['file'] }
										<div><a href="#" class="btnDownload file-download" data-part="{ ORI_BOARD_CODE }" data-encname="{ .file_name_saved }" data-filename="{ .file_name }">{ .icon }{ .file_name }</a></div>
									{ / }
									</div>
								</div>
							</div>
						</div>
						{ / }
						<div class="viewContent">
							{ @ ORI_DATA['images'] }
							<div><img src="/common/imageload.php?type={ ORI_BOARD_CODE }&file={ .file_name_saved }" alt="{ .file_name }" /></div>
							{ / }
							{ ? DATA['editor_yn'] == 'Y' }{ ORI_DATA['contents'] }{ : }{ =nl2br(ORI_DATA['contents']) }{ / }

							<div id="sns_share">
								<div id="sns_sbj">게시글 SNS 공유</div>
								<div id="sns_list">
<a href="#" onclick="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=' +encodeURIComponent(document.URL)+'&t='+encodeURIComponent(document.title), 'facebooksharedialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=540,width=600');return false;" target="_blank" alt="Share on Facebook" ><img src="{TYPE_URL}/images/common/facebook.png"></a>							
<a href="#" onclick="javascript:window.open('https://twitter.com/intent/tweet?text=[%EA%B3%B5%EC%9C%A0]%20' +encodeURIComponent(document.URL)+'%20-%20'+encodeURIComponent(document.title), 'twittersharedialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=360,width=600');return false;" target="_blank" alt="Share on Twitter" ><img src="{TYPE_URL}/images/common/twitter.png"></a>
<a href="#" onclick="javascript:window.open('http://share.naver.com/web/shareView.nhn?url=' +encodeURIComponent(document.URL)+'&title='+encodeURIComponent(document.title), 'naversharedialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank" alt="Share on Naver" ><img src="{TYPE_URL}/images/common/naver.png"></a>
<a href="#" onclick="javascript:window.open('https://story.kakao.com/s/share?url=' +encodeURIComponent(document.URL), 'kakaostorysharedialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes, height=600,width=600');return false;" target="_blank" alt="Share on kakaostory"> <img src="{TYPE_URL}/images/common/kakaostory.png"></a>
<!-- &nbsp;&nbsp;&nbsp;<a style="cursor:pointer;" target="_blank" class="pdf-down"><i class="fa fa-file-pdf-o" style="font-size:24px"></i></a> -->
								</div>
							</div>

							{ ? DATA['board_code'] == 'hanpage' }
							<a class="hanpage_link_btn" target="_self" href="{ BASE_URL }/542/617/read?&idno={ DATA['idno'] }">한페이지에서 자세히 보기</a>
							{ / }
						</div>
					</div>


					<div class="btnBbs bbNone ">
						<div class="left">
							<a href="./?{ QS }">최신글 목록</a>
						</div>
						<div class="right">
							{ ? CAN_WRITE == 'Y' && (CONF['auth_write'] == 'N' || DATA['reg_user_id'] == USERINFO['user_id']) }
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/write?{ QS }&idno={ DATA['idno'] }" class="{ ? CONF['auth_write'] == 'N' }board_secretY{ / }" data-idno="{ DATA['idno'] }">수정</a>
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/?{ QS }" class="act_delete { ? CONF['auth_write'] == 'N' }board_secretY{ / }" data-idno="{ DATA['idno'] }">삭제</a>
							{ / }
							{ ? CAN_REPLY == 'Y' }
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/reply?{ QS }&idno={ DATA['idno'] }">답글</a>
							{ / }
						</div>
					</div>

					<table summary="윗글/아랫글" class="basic_tb" style="display:none;">
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
