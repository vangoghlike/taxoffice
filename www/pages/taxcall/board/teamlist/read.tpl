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
	{ ? DATA['file'][1] != null }
		background:url('/common/imageload.php?type={ CONTENTS['board_code'] }&file={ DATA['file'][1]['file_name_saved'] }') no-repeat center center;
	{ : }
		background:url('{TYPE_URL}/images/common/subTop02.png') center center no-repeat;
	{ / }
		background-size:cover;	
	}
	.deepBg {
		position:absolute;
		top:0;
		left:50%;
		transform:translate(-50%, 0);
		width:100%;
		height:230px;
		background:rgba(0,0,0,.4);
		z-index:0;
	}
	.subTop.articleBg {
		position:relative;
		height:auto;
	}
	.subTop.articleBg .decribe {
		height:230px;
		position:relative;
		margin:0 auto;
		padding:88px 0 0 24px;
		width:1080px;
		text-align:left;
		z-index:1;
		color:#ded8d8;
	}
	.subTop.articleBg .decribe span.writer {
		display:inline-block;
		padding:4px 0;
		font-style:italic;
	}
	.subTop.articleBg .decribe p {
		padding:16px 0 0 0;
		font-size:1.44rem;
		font-weight:700;
		font-family: 'Daehan', serif;
		color:#fff;
	}
	.subTop.articleBg .decribe .breadcrumbs {
		padding-top:8px;
	}
	.subTop.articleBg .decribe .breadcrumbs span {
		position:relative;
		display:inline-block;
		padding:4px 8px;
		vertical-align:middle;
		line-height:24px;
	}
	.subTop.articleBg .decribe .breadcrumbs span:first-child {
		padding-left:0;
	}
	.subTop.articleBg .decribe .breadcrumbs span:first-child img {
		vertical-align:middle;	
	}
	.subTop.articleBg .decribe .breadcrumbs span:not(:last-child):after {
		position:absolute;
		right:-4px;
		top:4px;
		content:' > ';
		font-size:0.48rem;
	}
	.subTop.articleBg .subNav.tp0 {border-bottom:none;}
	.subTop.articleBg .subNav.tp3 {position:absolute; top:32px; left:50%; margin-left:180px; width:360px; border-bottom:none; background:#f9f9f9; z-index:1; background:none;	}
	.subTop.articleBg .subNav.tp3 ul {width:100%;}
	.subTop.articleBg .subNav.tp3 ul li {padding:0 4px; margin:0; width:120px; background:none;}
	.subTop.articleBg .subNav.tp3 ul li.on a {background:#235ba6; color:#fff;}
	.subTop.articleBg .subNav.tp3 ul li a {height:32px; line-height:32px; background:rgba(255,255,255,0.8); border-radius:16px; font-size:0.72rem;}
	.subTop.articleBg .subNav.tp3 ul li.on a:after {display:none;}
	
		
	
	.viewWrap { 
		padding:24px 24px;
		border-top:none;
	}
	.viewContent {
		display:inline-block;
		width:680px;
		border-bottom:none;
		vertical-align:top; 
	}
	.viewContent p img {
		margin:8px auto;
		width:100% !important;
		height:auto !important;
		max-width:680px;
	}
	.vcSec {
		clear:both;
		margin:0 0 48px 0;
	}
	.vcSec.vcIntro .vcSecCon img {
		float:left;
		width:25%;
		max-width:320px;
		margin:0 8px 8px 0;
	}
	.vcSec.vcIntro .vcSecCon:after {
		clear:both;
		content:'';
		display:block;
	}

	.viewWidget {
		display:inline-block;
		padding:20px 0 0 80px;
		width:336px;
		vertical-align:top; 
	}
	.colm_writer {
		margin:0 0 24px 0;
		padding:24px 16px;
		background:#f6f8f8;
		text-align:center;
	}
	.colm_writer img {
		display:block;
		margin:0 auto;
		border-radius:50%;
	}
	.colm_writer strong {
		display:block;
		padding:12px 0px 6px;
	}
	.colm_writer strong.brand_tt {
		font-size:16px;
		color:#195dae;
		padding-bottom:0;
	}
	.colm_writer .int {
		padding:12px 0 0;
		text-align:left;
		line-height:1.6;
	}
	.colm_writer .int .int_tt {
		display:inline-block;
		padding:2px 12px;
		margin-right:6px;
		background: #fff;
		color:#888;
		border:1px solid #dadada;
		border-radius:4px;
	}
	.colm_writer .int .pro_txt {
		margin:3px auto 6px;
	}
	.subscribe {
		border: 1px solid #E0E0E0;
    	padding: 16px;
	}
	.subscribe p {
	    padding-bottom:8px;
	    color:#202626;
	    font-weight:600;
	}
	.subscribe span {
		line-height:1.6;
	}
	.subscribe .sub_ipbox{
	    border: 1px solid #448AFF;
	    margin-top: 10px;
	}
	.subscribe .sub_ipbox input {
		height: 30px;
	    line-height: 30px;
	    width: 136px;
	    padding: 0 8px;
	    border:none;
	    background:none;
	}
	.subscribe .sub_ipbox .subs_btn {
		width: 60px;
	    background: #448AFF;
	    color: #FFF;
	    float: right;
	    cursor: pointer;
	}
	.subscribe .tl_link {
		display:block;
		margin-top:12px;
		text-align:center;
		line-height:40px;
		width: 100%;
		background: #448AFF;
		color: #FFF;
		height:40px;
		cursor: pointer;
	}

		/* sns button */
	#sns_share {display:block;margin-top:60px;width:100%;height:60px;background:#fbfbfb;text-align:center; }
	#sns_share #sns_sbj {display:inline-block;width:120px;text-align:center;line-height:40px;font-weight:bold;}
	#sns_share #sns_list {display:inline-block;padding-top:4px;line-height:36px;}
	#sns_share #sns_list a {display:inline-block;margin-right:5px;width:32px;height:32px;}
	#sns_share #sns_list a img {width:100%;}
	
	

	
</style>	
			<div class="subTop articleBg">
				<div class="decribe">
					<span class="writer">{ DATA['tl_name'] } 세무사 소개</span><span>&nbsp;·&nbsp;</span><span>{ DATA['reg_day'] }</span>
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
				
				<div class="deepBg"></div>
			</div>
			
			<!-- subContent -->
			<div class="subContent">

				<!-- contStart -->
				<div class="contStart">

{ #dep3 }

{ CONTENTS['head_contents'] }

					<div class="viewWrap">
						<div class="viewContent">
							<div class="vcSec vcIntro">
								<h3 class="titBlue">1. { DATA['tl_name'] } 세무사 인사말씀</h3>
								<div class="vcSecCon">
									<img src="/common/imageload.php?type={ CONTENTS['board_code'] }&file={ DATA['file'][0]['file_name_saved'] }"/>
									{ =nl2br(DATA['tl_intro']) }
								</div>
							</div>
							<div class="vcSec vcPro">
								<h3 class="titBlue">2. 개인 프로필 소개 및 사무원 소개</h3>
								{ ? DATA['editor_yn'] == 'Y' }{ DATA['contents'] }{ : }{ =nl2br(DATA['contents']) }{ / }
							</div>

							<div class="vcSec vcJob">
								<h3 class="titBlue">3. 주요업무안내</h3>
								{ =nl2br(DATA['tl_job']) }
							</div>
						</div>
						<div class="viewWidget">
						    <div class="colm_writer">
						    	<img src="/common/imageload.php?type={ CONTENTS['board_code'] }&file={ DATA['file'][0]['file_name_saved'] }" width="72px"/>
								<strong class="brand_tt">{ DATA['tl_brand'] }</strong>
						       	<strong>{ DATA['tl_name'] } 세무사</strong>
						        <p class="cp">{ DATA['tl_slogan'] }</p>
						        <div class="int">
									<span class="int_tt">연구 과제</span>
									<p class="pro_txt">{ DATA['tl_sbj'] }</p>

									<p class="pro_txt"><span class="int_tt">주요 인원</span>{ DATA['tl_mb'] } 명</p>
						        </div>
						    </div>
						    <div class="subscribe">
						        <p>{ DATA['tl_name'] } 세무사에 문의하기</p>
						        <form name="mailing" method="post" enctype="multipart/form-data" data-ajax="false" action="template/PLUGIN_automailing/program/article_write.php" onsubmit="return frm_news_submit(this)">
						            <div class="subscrib_box2">
										<a href="{ DATA['tl_link'] }" target="_blank" class="tl_link">문의하기</a>
						            </div><br>
									<p class="pro_txt">Mail. <a style="cursor: pointer;" onclick="location.href='mailto:{ DATA[\'tl_mail\'] }';">{ DATA['tl_mail'] }</a></p>
									<p class="pro_txt">Tel. { DATA['tl_tel'] }</p>
									<p class="pro_txt" style="margin-top:6px; padding-top:6px; border-top:1px solid #eee; line-height:1.6;">오시는길.<br> { DATA['tl_addr'] }</p>
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
