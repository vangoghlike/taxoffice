{ #header }

		<!-- Container -->
		<div class="container" id="container">

			<!-- subContent -->
			<div class="subContent">
				
{ #breadcrumbs }

				<!-- contStart -->
				<div class="contStart">

{ #dep3 }
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/solid.css" integrity="sha384-TbilV5Lbhlwdyc4RuIV/JhD8NR+BfMrvz4BL5QFa2we1hQu6wvREr3v6XSRfCTRp" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/regular.css" integrity="sha384-avJt9MoJH2rB4PKRsJRHZv7yiFZn8LrnXuzvmZoD3fh1aL6aM6s0BBcnCvBe6XSD" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/fontawesome.css" integrity="sha384-ozJwkrqb90Oa3ZNb+yKFW2lToAWYdTiF1vt8JiH5ptTGHTGcN7qdoR1F95e0kYyG" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
	.head {border-bottom:1px solid #e4e5e6;}
	.btn {transition:all .5s;}
	.subContent .subTopInfo {margin-bottom:0; border-bottom:none;}
	.viewWrap {margin-bottom:48px; padding:24px; border:1px solid #e4e5e6; border-top:2px solid #d1d2d3;}
	.viewWrap .line.headline .left.clear {float:none;}
	.viewWrap .line.headline .top {display:flex; align-items:center;}
	.viewWrap .line.headline .top img {margin-right:24px;}
	.viewWrap .line.headline .top span.cname {display:inline-block; padding:6px 12px; font-size:1.04rem; background:#f4f5f6;}
	.viewWrap .line.headline div.info {display:flex; justify-content:space-between; display:-webkit-flex; -webkit-justify-content:space-between;  align-items:center; padding:16px 0 8px; font-size:1.28rem;}
	.viewWrap .line.headline div.info div {display:flex; justify-content:flex-end; display:-webkit-flex;  -webkit-justify-content:flex-end;}
	.viewWrap .line.headline div.info div span {display:inline-block; margin:0 3px; padding:4px 10px; font-size:0.88rem; color:#fff; background:#b1b2b3;}
	.viewWrap .md {display:flex; justify-content:flex-start; padding:24px 0;}
	.viewWrap .md aside {width:44%; font-size:1.0rem;}
	.viewWrap .md aside h4 {padding:8px 0 16px; font-size:1.08rem; font-weight:600; color:#232425;}
	.viewWrap .md aside dl dt {display:inline-block; padding:6px 0; width:96px; color:#aaa;}
	.viewWrap .md aside dl dd {display:inline-block; padding:6px 0; width:76%;}
	.viewWrap.vc {padding-top:0px;}
	.viewWrap.vc .viewContent {border-bottom:none;}
	
	.applyWrap {margin-bottom:48px; text-align:center;}
	button.btn_xl {display:inline-block; margin:0 2px; padding:16px 24px; color:#fff; font-size:1.28rem;  letter-spacing:-1px; border:none;}
	button.btn_apply {background: #379aff; border:1px solid #379aff;}
	button.btn_apply:hover {background:#195dae;}
	button.btn_scrap {background:none; color:#379aff; border:1px solid #379aff;;}
	button.btn_scrap:hover {background:#ebf2f8;}
	
</style>

{ CONTENTS['head_contents'] }

					<div class="viewWrap">
					    <div class="line headline">
					        <div class="left clear">
					        	<div class="top">
						            { ? DATA['file'] }<img src="/common/imageload.php?type={ DATA['board_code'] }&file={ DATA['file'][0]['file_name_saved'] }" alt="썸네일 이미지" height="32px"/>{ / }
						            <span class="cname">기업명 : { DATA['cpny_name'] }</span>
					        	</div>
					            <div class="info">
					            	<b>{ DATA['subject'] }</b>
					            	<div>
					            		<span>{ DATA['writer_name'] }</span>
					            		<span>{ DATA['reg_day'] }</span>
					            		<span>조회수 { DATA['hits'] }</span>
					            	</div>
					            </div>
					        </div>
					    </div>
					    
					    <div class="md">
					    	<aside>
					    		<h4>지원자격</h4>
					    		<dl>
					    			<dt>경력</dt>
					    			<dd>{ DATA['cpny_career'] }</dd>
					    			<dt>학력</dt>
					    			<dd>{ DATA['cpny_edu'] }</dd>
					    			<dt>자격소지</dt>
					    			<dd>{ DATA['cpny_qualify'] }</dd>
					    			<dt>실무수행능력</dt>
					    			<dd>{ DATA['cpny_proc'] }</dd>
					    			<dt>외국어능력</dt>
					    			<dd>{ DATA['cpny_lang'] }</dd>
					    		</dl>
					    		<br>
					    		<h4>마감일 : { DATA['cpny_deadline'] } </h4>
					    	</aside>
					    	<aside>
					    		<h4>근무조건</h4>
					    		<dl>
					    			<dt>근무형태</dt>
					    			<dd>{ DATA['cpny_type'] }</dd>
					    			<dt>급여</dt>
					    			<dd>{ DATA['cpny_pay'] }</dd>
					    			<dt>근무지역</dt>
					    			<dd>{ DATA['cpny_region'] }</dd>
					    		</dl>
					    		<br>
					    		<h4>모집인원 : { DATA['cpny_rnum'] } 명</h4>
					    	</aside>
					    </div>
					</div>
					
					<div class="applyWrap">
	                    <button type="button" class="btn btn_xl btn_apply"><i class="fas fa-user-check"></i>&nbsp;&nbsp;&nbsp;<span>즉시지원</span></button>
	        			<button type="button" class="btn btn_xl btn_scrap"><i class="far fa-star"></i>&nbsp;&nbsp;<span>스크랩</span></button>
    				</div>
					
					<div class="viewWrap vc">
						<div class="line headline">
					        <div class="left clear">
					            <div class="info">
					            	<b>구인 상세정보</b>
					            </div>
					        </div>
					    </div>
						<div class="viewContent">
					    { ? DATA['editor_yn'] == 'Y' }{ DATA['contents'] }{ : }{ =nl2br(DATA['contents']) }{ / }
					    </div>
					    <div class="applyWrap">
					    	<button type="button" class="btn btn_xl btn_apply">{ DATA['cpny_name'] }&nbsp;&nbsp;&nbsp;<span>입사지원하기</span></button>
					    </div>
					</div>
					
					<div class="btnBbs bbNone ">
					    <div class="left">
					        <a href="./?{ QS }">목록</a>
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
