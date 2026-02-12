{ #header }

		<!-- Container -->
		<div class="container" id="container">
			<!-- subContent -->
			<div class="subContent">
				
{ #breadcrumbs }

				<!-- contStart -->
				<div class="contStart">

{ #dep3 }

{ CONTENTS['head_contents'] }

					<div class="viewWrap">
{*						<div class="line">*}
{*							<div class="left">*}
{*								<div class="box">*}
{*									<div class="tit">Board</div>*}
{*									<div class="txt bold"><a href="{ BASE_URL }/{ DATA['menu_idno'] }">{ DATA['menu_title'] }</a></div>*}
{*								</div>*}
{*							</div>*}
{*						</div>*}
						<div class="line">
							<div class="left">
								<div class="box">
									<div class="tit">Subject</div>
									<div class="txt bold">{ DATA['subject'] }</div>
								</div>
							</div>
							<a class="bbs_print_btn"><i class="fa fa-print"></i>&nbsp;Print</a>
						</div>
						<div class="line">
							<div class="left">
								<div class="box">
									<div class="tit">Writer</div>
									<div class="txt">{ DATA['writer_name'] }</div>
								</div>
							</div>
							<div class="right">
								<div class="box">
									<div class="tit">Hits</div>
									<div class="txt">{ DATA['hits'] }</div>
								</div>
							</div>
							<div class="right mr50">
								<div class="box">
									<div class="tit">Date</div>
									<div class="txt">{ DATA['reg_day'] }</div>
								</div>
							</div>
						</div>
						{ ? CONF['use_file_yn'] == 'Y' }
						<div class="line">
							<div class="left">
								<div class="box">
									<div class="tit">File</div>
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
						
							<div id="sns_share">
								<div id="sns_sbj">Share</div>
								<div id="sns_list">
<a href="#" onclick="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=' +encodeURIComponent(document.URL)+'&t='+encodeURIComponent(document.title), 'facebooksharedialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=540,width=600');return false;" target="_blank" alt="Share on Facebook" ><img src="{TYPE_URL}/images/common/facebook.png"></a>							
<a href="#" onclick="javascript:window.open('https://twitter.com/intent/tweet?text=[%EA%B3%B5%EC%9C%A0]%20' +encodeURIComponent(document.URL)+'%20-%20'+encodeURIComponent(document.title), 'twittersharedialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=360,width=600');return false;" target="_blank" alt="Share on Twitter" ><img src="{TYPE_URL}/images/common/twitter.png"></a>
<a href="#" onclick="javascript:window.open('http://share.naver.com/web/shareView.nhn?url=' +encodeURIComponent(document.URL)+'&title='+encodeURIComponent(document.title), 'naversharedialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank" alt="Share on Naver" ><img src="{TYPE_URL}/images/common/naver.png"></a>
<a href="#" onclick="javascript:window.open('https://story.kakao.com/s/share?url=' +encodeURIComponent(document.URL), 'kakaostorysharedialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes, height=600,width=600');return false;" target="_blank" alt="Share on kakaostory"> <img src="{TYPE_URL}/images/common/kakaostory.png"></a>
								</div>
							</div>
						</div>
					</div>


					<div class="btnBbs bbNone ">
						<div class="left">
							<a href="./?{ QS }">List</a>
						</div>
						<div class="right">
							{ ? CAN_WRITE == 'Y' && (CONF['auth_write'] == 'N' || DATA['reg_user_id'] == USERINFO['user_id']) }
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/write?{ QS }&idno={ DATA['idno'] }" class="{ ? CONF['auth_write'] == 'N' }board_secretY{ / }" data-idno="{ DATA['idno'] }">Update</a>
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/?{ QS }" class="act_delete { ? CONF['auth_write'] == 'N' }board_secretY{ / }" data-idno="{ DATA['idno'] }">Delete</a>
							{ / }
							{ ? CAN_REPLY == 'Y' }
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/reply?{ QS }&idno={ DATA['idno'] }">Reply</a>
							{ / }
						</div>
					</div>

{*					<table summary="Next/Prev" class="basic_tb">*}
{*						<caption></caption>*}
{*						<colgroup>*}
{*							<col width="80px">*}
{*							<col width="auto">*}
{*						</colgroup>*}
{*						<tbody>*}
{*						<tr class="prev">*}
{*							<th scope="row"><span class="up_bul">Prev</span></th>*}
{*							<td colspan="5">{ ? sizeof(DATA_PREV) }<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&idno={ DATA_PREV['idno'] }" class="{ ? CONF['auth_write'] == 'N' }board_secret{ DATA_PREV['secret_yn'] }{ : }{ ? DATA_PREV['secret_yn'] == 'Y' && DATA_PREV['user_id'] != USERINFO['user_id'] }no_auth{ / }{ / }" data-idno="{ DATA_PREV['idno'] }">{ ? DATA_PREV['secret_yn'] == 'Y' }<img src="{TYPE_URL}/images/sub/icon_lock.png" alt="비밀글" class="b_icon" /> { / }{ DATA_PREV['subject'] }{ : }<a>No previous posts.{ / }</a></td>*}
{*						</tr>*}
{*						<tr>*}
{*							<th scope="row"><span class="down_bul">Next</span></th>*}
{*							<td colspan="5">{ ? sizeof(DATA_NEXT) }<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&idno={ DATA_NEXT['idno'] }" class="{ ? CONF['auth_write'] == 'N' }board_secret{ DATA_NEXT['secret_yn'] }{ : }{ ? DATA_NEXT['secret_yn'] == 'Y' && DATA_NEXT['user_id'] != USERINFO['user_id'] }no_auth{ / }{ / }" data-idno="{ DATA_NEXT['idno'] }">{ ? DATA_NEXT['secret_yn'] == 'Y' }<img src="{TYPE_URL}/images/sub/icon_lock.png" alt="비밀글" class="b_icon" /> { / }{ DATA_NEXT['subject'] }{ : }<a>No next posts.{ / }</a></td>*}
{*						</tr>*}
{*						</tbody>*}
{*					</table>*}

{ CONTENTS['footer_contents'] }

				</div>
				<!-- //contStart -->

			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

{ #footer }
