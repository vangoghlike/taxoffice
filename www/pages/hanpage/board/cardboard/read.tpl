{ #header }
		<!-- Container -->
		<div class="container" id="container">

<style>
	@font-face {
	  font-family: 'Daehan';
	  font-style: normal;
	  font-weight: 400;
	  src: url('//cdn.jsdelivr.net/korean-webfonts/1/corps/yoon/Daehan/DaehanR.woff2') format('woff2'), url('//cdn.jsdelivr.net/korean-webfonts/1/corps/yoon/Daehan/DaehanR.woff') format('woff');
	}
	
	@font-face {
	  font-family: 'Daehan';
	  font-style: normal;
	  font-weight: 700;
	  src: url('//cdn.jsdelivr.net/korean-webfonts/1/corps/yoon/Daehan/DaehanB.woff2') format('woff2'), url('//cdn.jsdelivr.net/korean-webfonts/1/corps/yoon/Daehan/DaehanB.woff') format('woff');
	}
	.subTop.articleBg {
		position:relative;
		overflow:hidden;
{ ? CONF['board_code'] == 'wise_pic_story' }
	{ @ DATA['file'] }
		background:url('/common/imageload.php?type={ CONTENTS['board_code'] }&file={ .file_name_saved }') no-repeat center center;
	{ / }
{ : }
		background:url('{ TYPE_URL }/images/bbs/pic_{ WISE_PIC_TITLE }{ DATA['wise_img_num'] }.jpg') no-repeat center center;
	{ / }
		background-size:cover;
}



</style>
			<div class="subTop articleBg">
				<div class="decribe">
					<span class="writer">{ DATA['writer_name'] }의 명언명구</span><span>&nbsp;·&nbsp;</span><span>{ DATA['reg_day'] }</span>
					<p>{ DATA['subject'] }</p>
					<div class="breadcrumbs">
						<span><img src="{TYPE_URL}/images/common/home.png" alt="home"></span>
						{ ? is_numeric(CONTENTS['breadcrumbs'][0]['idno']) }{ @ CONTENTS['breadcrumbs'] }{ ? .index_ < .size_ -1 }<span>{ .menu_title }</span>{ : }<span class="last">{ .menu_title }</span>{ / }{ / }{ : }<span class="last">{ CONTENTS['menu_title'] }</span>{ / }
					</div>
				</div>
				
				<div class="subNav tp{ =sizeof(MENU[CONTENTS['breadcrumbs'][0]['idno']]) }">
					<ul>
					{ @ MENU[CONTENTS['breadcrumbs'][0]['idno']] }
						<li class="menu{ .idno }"><a href="{ BASE_URL }/{ .idno }">{ .menu_title }</a></li>
					{ / }
					</ul>
				</div>
				
				<div class="bkBg"></div>
			</div>
			
			<!-- subContent -->
			<div class="subContent">

				<!-- contStart -->
				<div class="contStart">

{ #dep3 }

{ CONTENTS['head_contents'] }


					<div class="viewWrap">
						<div class="viewContent">
						{ ? CONF['board_code'] == 'wise_pic_story' }
							<div class="pic_con" style="padding:0 0 1rem; text-align:center;">
							{ @ DATA['file'] }
								<img style="max-width:100%;" src="/common/imageload.php?type={ CONTENTS['board_code'] }&file={ .file_name_saved }">
							{ / }
							</div>
						{ / }
						{ ? DATA['editor_yn'] == 'Y' }{ DATA['contents'] }{ : }{ =nl2br(DATA['contents']) }{ / }
						</div>
						<div class="viewWidget">
						    <div class="colm_writer">
						    	<img src="{TYPE_URL}/images/common/avatar.png" width="72px"/>
						       	<strong>{ DATA['writer_name'] }</strong>
						        <p class="cp">작성자의 소속</p>
						        <div class="int">
						            <p class="pro_txt">자신을 소개하는 글이 해당영역에 나타날 것입니다. 자신을 소개하는 글은 최대 80글자로 제한을 두어 표현되도록 구현</p>
						        </div>
						    </div>
						    <div class="subscribe">
						        <p>칼럼 구독하기</p>
						        <form name="mailing" method="post" enctype="multipart/form-data" data-ajax="false" action="template/PLUGIN_automailing/program/article_write.php" onsubmit="return frm_news_submit(this)">
						            <div class="subscrib_box2">
						                <span>구독하시면 편리하게 칼럼을 보실 수 있도록 이메일로 보내드립니다.</span><input type="hidden" name="option" value=";김건오;"> <input type="hidden" name="type" value="column">
						                <div class="sub_ipbox"><input type="text" name="email" value="" placeholder="이메일을 입력해주세요."><input type="button" name="submit_OK" value="구독하기" class="subs_btn"></div>
						            </div>
						        </form>
						    </div>
						</div>
						
						<div id="sns_share">
							<div id="sns_list">
<a href="#" onclick="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=' +encodeURIComponent(document.URL)+'&t='+encodeURIComponent(document.title), 'facebooksharedialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=540,width=600');return false;" target="_blank" alt="Share on Facebook" ><img src="{TYPE_URL}/images/common/facebook.png"></a>							
<a href="#" onclick="javascript:window.open('https://twitter.com/intent/tweet?text=[%EA%B3%B5%EC%9C%A0]%20' +encodeURIComponent(document.URL)+'%20-%20'+encodeURIComponent(document.title), 'twittersharedialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=360,width=600');return false;" target="_blank" alt="Share on Twitter" ><img src="{TYPE_URL}/images/common/twitter.png"></a>
<a href="#" onclick="javascript:window.open('http://share.naver.com/web/shareView.nhn?url=' +encodeURIComponent(document.URL)+'&title='+encodeURIComponent(document.title), 'naversharedialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank" alt="Share on Naver" ><img src="{TYPE_URL}/images/common/naver.png"></a>
<a href="#" onclick="javascript:window.open('https://story.kakao.com/s/share?url=' +encodeURIComponent(document.URL), 'kakaostorysharedialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes, height=600,width=600');return false;" target="_blank" alt="Share on kakaostory"> <img src="{TYPE_URL}/images/common/kakaostory.png"></a>
<!-- &nbsp;&nbsp;&nbsp;<a style="cursor:pointer;" target="_blank" class="pdf-down"><i class="fa fa-file-pdf-o" style="font-size:24px"></i></a> -->
							</div>
						</div>
					</div>


					<div class="btnBbs bbNone ">
						<div class="left">
							<a href="./?{ QS }">목록</a>
							{ ? CAN_WRITE == 'Y' && (CONF['auth_write'] == 'N' || DATA['reg_user_id'] == USERINFO['user_id']) }
							{ ? CONF['board_code'] == 'biz_wise' && CATEGORY_IDNO == '' }
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/write?{ QS }&category_idno={ DATA['category_idno'] }&idno={ DATA['idno'] }" class="{ ? CONF['auth_write'] == 'N' }board_secretY{ / }" data-idno="{ DATA['idno'] }">수정</a>
							{ : }
							<a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/write?{ QS }&idno={ DATA['idno'] }" class="{ ? CONF['auth_write'] == 'N' }board_secretY{ / }" data-idno="{ DATA['idno'] }">수정</a>
							{ / }
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
