<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/header.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/nav.php";?>
<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20210820015" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<!-- subContent -->
<div class="subContainer subContent">
	<!-- subTopInfo -->
	<div class="subTopInfo">
		<!-- h2Wrap -->
		<div class="h2Wrap">
			<h2>
				상담 센터</h2>
		</div>
		<!-- //h2Wrap -->
		<!-- lnb -->
		<div class="lnb">
			<span><img src="/pages/default/images/common/home.png" alt="home"></span>
			<span>상담센터</span><span>상담 센터</span><span class="last">상담 센터</span></div>
		<!-- //lnb -->
	</div>
	<!-- //subTopInfo -->
	<!-- //subTopInfo -->
	<!-- contStart -->
	<div class="contStart">
	</div>
	<div class="telTit pt30">
		<div class="tit01">상담 신청하기</div>
		<div class="tit02">상담하고 싶은 세무사를 선택하여 주세요.</div>
	</div>
	<div style="line-height:1.6; padding:2.0rem 3.0rem 2.0rem; background:#eaeaea; border-radius:1.0rem; margin:2.0rem auto;">
		<div style="text-align: center;">
			<a class="host_conts_onoff_btn">
				화상상담진행 <small>Open</small>
			</a>
			<p>(호스트 Process 메뉴얼)</p>
		</div>
		<div class="host_contents off">
			<p><strong>(화상상담 전 세림홈페이지의 관리자로 로그인)</strong></p><br>
			<p class="host_conts_sbj">
				1. 호스트(방장) '로그인' 및 '상담 수락' 절차
			</p>
			<p class="host_conts_cont">
				1) '화상상담' 버튼 클릭<br>
				2) Zoom Meet 알림창에서 '열기' 클릭<br>
				3) Zoom 프로그램에서 '로그인' 버튼 클릭<br>
				4) Google로 로그인 선택<br>
				5) 구글 로그인 웹페이지에서 '다른계정으로 로그인' 선택<br>
				6) 세림세무법인 계정으로 로그인<br>
				&nbsp;&nbsp;&nbsp;&nbsp;(아이디 & 비밀번호 입력)<br>
				7) 'Zoom 미팅' 클릭하여 화상채팅 방 생성<br>
				8) 클라이언트가 '입장' 요청시 확인하고 '수락' 버튼으로 연결<br>
			</p>
			<div style="padding-top:0.5rem;">
				호스트 계정은 관리자에 문의해주세요. <a href="mailto:jinwoodak@taxemail.co.kr">jinwoodak@taxemail.co.kr</a><br>
			</div>
		</div>
	</div>
	<form id="frm_tax1" name="frm_tax1" method="post">
		<input type="hidden" name="step" value="2" />
		<input type="hidden" name="etc01" value="" />
		<input type="hidden" name="mngr_idno" value="" />
		<input type="hidden" name="mngr_tel" value="" />
		<input type="hidden" name="mngr_phone" value="" />
		<input type="hidden" name="mngr_file_name" value="" />
		<input type="hidden" name="mngr_mail" value="" />
		<input type="hidden" name="category" value="" />
		<input type="hidden" name="category_name" value="" />
		<input type="hidden" name="mngr_name" value="" class="req" title="상담을 원하시는 세무사를 선택해주세요." />
		<div class="teslList2 consulting">
			<ul class="consulting_list">
				<li class="consulting_1li">
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/files/mngr/201901081274126717.jpg" alt="김대원 세무사">
							</div>
							<div class="txt">
								<div class="tit01">김대원 세무사</div>
								<div class="tit02">“고객을 위해 뛰겠습니다.”</div>
							</div>
							<!--<div class="viewBtn open">
<img src="/pages/default/images/mbv/open_view.png" alt="세무사정보 보기" />
</div>-->
						</div>
						<div class="btn">
							<input type="hidden" class="mngr_tel" value="02-854-2199" data-name="02-854-2199" />
							<input type="hidden" class="mngr_phone" value="010-9421-8864" data-name="010-9421-8864" />
							<input type="hidden" class="mngr_mail" value="taxmgt8@taxemail.co.kr" data-name="taxmgt8@taxemail.co.kr" />
						</div>
					</div>
					<div class="itemInfo mb_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문" />
						<input type="hidden" class="mngr_idno" value="5" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:1.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
						</div>
						<p class="tac mt10">
						</p>
					</div>
					<div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
						<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
						ZOOM ID : 510 002 5847<br>
						연결 비밀번호 : selim
					</div>
					<div class="viewInfo">
						<div class="in">
							<ul>
								<li>
									<div class="tit no4">이메일</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:taxmgt8@taxemail.co.kr" style="color: #0269bf">taxmgt8@taxemail.co.kr</a>
									</div>
								</li>
								<li>
									<div class="tit no1">전화번호</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="tel:02-854-2199">02-854-2199</a>
									</div>
								</li>
								<li>
									<div class="tit no5">FAX</div>
									<div class="text">
										0507-0310-6731</div>
								</li>
								<li>
									<div class="tit no3">경력</div>
									<div class="text">
										<ul>
											<li>- 세림세무법인 1본부 2팀장</li>
										</ul>
									</div>
								</li>
								<li>
									<div class="tit no3 last">연구 &<br>관심분야</div>
									<div class="text">
										<ul>
											<li>- 시행사의 세무, 주택신축판매업 세무 </li>
											<li>- 주택 관련 세제 비교 연구<br> (양도세, 소득세, 종합부동산세 등)
											</li>
											<li>- 대주주 과세 및 해외주식 세무 및 사례연구
											</li>
											<li>- 상장 & 비상장 주식평가업무 및 사례연구
											</li>
											<li>- 금융소득 과세 연구 및 절세 기법
											</li>
											<li>- 주식컨설팅 전문세무사</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="itemInfo pc_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문" />
						<input type="hidden" class="mngr_idno" value="5" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:2.0rem; margin-bottom:0.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
							<div>
								&nbsp;
							</div>
							<div style="margin-top:0.25rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
								<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
								ZOOM ID : 510 002 5847<br>
								연결 비밀번호 : selim
							</div>
						</div>
						<p class="tac mt10">
						</p>
					</div>
				</li>
				<li class="consulting_1li">
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/files/mngr/20170623486394928.jpg" alt="김창진 세무사">
							</div>
							<div class="txt">
								<div class="tit01">김창진 세무사</div>
								<div class="tit02">“고객의 진정한 성공을 돕습니다.”</div>
							</div>
							<!--<div class="viewBtn open">
<img src="/pages/default/images/mbv/open_view.png" alt="세무사정보 보기" />
</div>-->
						</div>
						<div class="btn">
							<input type="hidden" class="mngr_tel" value="010-5323-6100" data-name="010-5323-6100" />
							<input type="hidden" class="mngr_phone" value="010-5323-6100" data-name="010-5323-6100" />
							<input type="hidden" class="mngr_mail" value="taxmgt@taxemail.co.kr" data-name="taxmgt@taxemail.co.kr" />
						</div>
					</div>
					<div class="itemInfo mb_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										외투기업 설립 및 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문/외투기업 설립 및 자문" />
						<input type="hidden" class="mngr_idno" value="1" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:1.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
						</div>
						<p class="tac mt10">
						</p>
					</div>
					<div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
						<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
						ZOOM ID : 510 002 5847<br>
						연결 비밀번호 : selim</div>
					<div class="viewInfo">
						<div class="in">
							<ul>
								<li>
									<div class="tit no4">이메일</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:taxmgt@taxemail.co.kr" style="color: #0269bf">taxmgt@taxemail.co.kr</a>
									</div>
								</li>
								<li>
									<div class="tit no1">전화번호</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="tel:010-5323-6100">010-5323-6100</a>
									</div>
								</li>
								<li>
									<div class="tit no5">FAX</div>
									<div class="text">
										02-854-2120</div>
								</li>
								<li>
									<div class="tit no3">경력</div>
									<div class="text">
										<ul>
											<li>- 경희대학교 경영대학원 세무관리학과
											</li>
											<li>- 서울대학교 최고산업전략과정 (AIP)
											</li>
											<li>- 금천세무서 국세심사위원 (역임)
											</li>
											<li>- 우리은행 외국인투자기업 지원협약 세무사
											</li>
											<li>- 서울남부지방법원 민사조정위원
											</li>
											<li>- 세림세무법인 대표</li>
										</ul>
									</div>
								</li>
								<li>
									<div class="tit no3 last">연구 &<br>관심분야</div>
									<div class="text">
										<ul>
											<li>- 외국인 투자기업 업무절차 (설립일람 및 업무과정 소개)
											</li>
											<li>- 주세 업무해설</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="itemInfo pc_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										외투기업 설립 및 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문/외투기업 설립 및 자문" />
						<input type="hidden" class="mngr_idno" value="1" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:2.0rem; margin-bottom:0.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
							<div>
								&nbsp;
							</div>
							<div style="margin-top:0.25rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
								<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
								ZOOM ID : 510 002 5847<br>
								연결 비밀번호 : selim</div>
						</div>
						<p class="tac mt10">
						</p>
					</div>
				</li>
				<li class="consulting_1li">
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/files/mngr/20200818541158407.jpg" alt="박태형 세무사">
							</div>
							<div class="txt">
								<div class="tit01">박태형 세무사</div>
								<div class="tit02">“고객을 소중히 생각하겠습니다.”</div>
							</div>
							<!--<div class="viewBtn open">
<img src="/pages/default/images/mbv/open_view.png" alt="세무사정보 보기" />
</div>-->
						</div>
						<div class="btn">
							<input type="hidden" class="mngr_tel" value="02-501-2185" data-name="02-501-2185" />
							<input type="hidden" class="mngr_phone" value="010-2383-3063" data-name="010-2383-3063" />
							<input type="hidden" class="mngr_mail" value="taxmgt3@taxemail.co.kr" data-name="taxmgt3@taxemail.co.kr" />
						</div>
					</div>
					<div class="itemInfo mb_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문" />
						<input type="hidden" class="mngr_idno" value="6" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:1.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
						</div>
						<p class="tac mt10">
						</p>
					</div>
					<div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
						<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
						ZOOM ID : 510 002 5847<br>
						연결 비밀번호 : selim
					</div>
					<div class="viewInfo">
						<div class="in">
							<ul>
								<li>
									<div class="tit no4">이메일</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:taxmgt3@taxemail.co.kr" style="color: #0269bf">taxmgt3@taxemail.co.kr</a>
									</div>
								</li>
								<li>
									<div class="tit no1">전화번호</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="tel:02-501-2185">02-501-2185</a>
									</div>
								</li>
								<li>
									<div class="tit no5">FAX</div>
									<div class="text">
										0507-0307-6678</div>
								</li>
								<li>
									<div class="tit no3">경력</div>
									<div class="text">
										<ul>
											<li>- 세림세무법인 2본부 2팀장</li>
										</ul>
									</div>
								</li>
								<li>
									<div class="tit no3 last">연구 &<br>관심분야</div>
									<div class="text">
										<ul>
											<li>- 양도세 사례연구
											</li>
											<li>- 병의원 세제업무</li>
											<li>- 병의원업 전문세무사</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="itemInfo pc_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문" />
						<input type="hidden" class="mngr_idno" value="6" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:2.0rem; margin-bottom:0.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
							<div>
								&nbsp;
							</div>
							<div style="margin-top:0.25rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
								<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
								ZOOM ID : 510 002 5847<br>
								연결 비밀번호 : selim
							</div>
						</div>
						<p class="tac mt10">
						</p>
					</div>
				</li>
				<li class="consulting_1li">
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/files/mngr/20170623679591787.jpg" alt="최유정 세무사">
							</div>
							<div class="txt">
								<div class="tit01">최유정 세무사</div>
								<div class="tit02">“고객 입장에서 노력하겠습니다.”</div>
							</div>
							<!--<div class="viewBtn open">
<img src="/pages/default/images/mbv/open_view.png" alt="세무사정보 보기" />
</div>-->
						</div>
						<div class="btn">
							<input type="hidden" class="mngr_tel" value="02-854-2626" data-name="02-854-2626" />
							<input type="hidden" class="mngr_phone" value="010-7172-9102" data-name="010-7172-9102" />
							<input type="hidden" class="mngr_mail" value="taxmgt10@taxemail.co.kr" data-name="taxmgt10@taxemail.co.kr" />
						</div>
					</div>
					<div class="itemInfo mb_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										외투기업 설립 및 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문/외투기업 설립 및 자문" />
						<input type="hidden" class="mngr_idno" value="2" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:1.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
						</div>
						<p class="tac mt10">
						</p>
					</div>
					<div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
						<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
						ZOOM ID : 510 002 5847<br>
						연결 비밀번호 : selim</div>
					<div class="viewInfo">
						<div class="in">
							<ul>
								<li>
									<div class="tit no4">이메일</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:taxmgt10@taxemail.co.kr" style="color: #0269bf">taxmgt10@taxemail.co.kr</a>
									</div>
								</li>
								<li>
									<div class="tit no1">전화번호</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="tel:02-854-2626">02-854-2626</a>
									</div>
								</li>
								<li>
									<div class="tit no5">FAX</div>
									<div class="text">
										0507-0310-6727</div>
								</li>
								<li>
									<div class="tit no3">경력</div>
									<div class="text">
										<ul>
											<li>- 금천세무서 제8기 영세납세지원단
											</li>
											<li>- 서울대학교 창업정신가센터 멘토링 지원
											</li>
											<li>- 세림세무법인 총괄 (1본부장)</li>
										</ul>
									</div>
								</li>
								<li>
									<div class="tit no3 last">연구 &<br>관심분야</div>
									<div class="text">
										<ul>
											<li>- 시행사의 세무와 회계 </li>
											<li>- 외국인 투자기업 설립 업무
											</li>
											<li>- 법인 설립 업무 </li>
											<li>- 신축판매업의 세무
											</li>
											<li>- 외국인투자법인 설립 전문세무사</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="itemInfo pc_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										외투기업 설립 및 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문/외투기업 설립 및 자문" />
						<input type="hidden" class="mngr_idno" value="2" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:2.0rem; margin-bottom:0.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
							<div>
								&nbsp;
							</div>
							<div style="margin-top:0.25rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
								<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
								ZOOM ID : 510 002 5847<br>
								연결 비밀번호 : selim</div>
						</div>
						<p class="tac mt10">
						</p>
					</div>
				</li>
				<li class="consulting_1li">
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/files/mngr/202012221271835175.jpg" alt="정혜미 세무사">
							</div>
							<div class="txt">
								<div class="tit01">정혜미 세무사</div>
								<div class="tit02">“고객과 함께 나아가겠습니다.”</div>
							</div>
							<!--<div class="viewBtn open">
<img src="/pages/default/images/mbv/open_view.png" alt="세무사정보 보기" />
</div>-->
						</div>
						<div class="btn">
							<input type="hidden" class="mngr_tel" value="02-854-0330" data-name="02-854-0330" />
							<input type="hidden" class="mngr_phone" value="010-5892-3536" data-name="010-5892-3536" />
							<input type="hidden" class="mngr_mail" value="taxmgt6@taxemail.co.kr" data-name="taxmgt6@taxemail.co.kr" />
						</div>
					</div>
					<div class="itemInfo mb_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세" />
						<input type="hidden" class="mngr_idno" value="7" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:1.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
						</div>
						<p class="tac mt10">
						</p>
					</div>
					<div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
						<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
						ZOOM ID : 510 002 5847<br>
						연결 비밀번호 : selim
					</div>
					<div class="viewInfo">
						<div class="in">
							<ul>
								<li>
									<div class="tit no4">이메일</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:taxmgt6@taxemail.co.kr" style="color: #0269bf">taxmgt6@taxemail.co.kr</a>
									</div>
								</li>
								<li>
									<div class="tit no1">전화번호</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="tel:02-854-0330">02-854-0330</a>
									</div>
								</li>
								<li>
									<div class="tit no5">FAX</div>
									<div class="text">
										0507-0307-6142</div>
								</li>
								<li>
									<div class="tit no3">경력</div>
									<div class="text">
										<ul>
											<li>- 세림세무법인 1본부 1팀장</li>
										</ul>
									</div>
								</li>
								<li>
									<div class="tit no3 last">연구 &<br>관심분야</div>
									<div class="text">
										<ul>
											<li>- 양도세 사례연구
											</li>
											<li>- 신축판매업의 세무 및 사례연구
											</li>
											<li>- 주택신축판매업 전문세무사
											</li>
											<li>- 약국세무 및 의약 유통업 사례연구</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="itemInfo pc_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세" />
						<input type="hidden" class="mngr_idno" value="7" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:2.0rem; margin-bottom:0.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
							<div>
								&nbsp;
							</div>
							<div style="margin-top:0.25rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
								<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
								ZOOM ID : 510 002 5847<br>
								연결 비밀번호 : selim
							</div>
						</div>
						<p class="tac mt10">
						</p>
					</div>
				</li>
				<li class="consulting_1li">
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/files/mngr/202102102015635660.jpg" alt="강삼엽 업무이사">
							</div>
							<div class="txt">
								<div class="tit01">강삼엽 업무이사</div>
								<div class="tit02">“고객과 함께하겠습니다.”</div>
							</div>
							<!--<div class="viewBtn open">
<img src="/pages/default/images/mbv/open_view.png" alt="세무사정보 보기" />
</div>-->
						</div>
						<div class="btn">
							<input type="hidden" class="mngr_tel" value="02-854-6260" data-name="02-854-6260" />
							<input type="hidden" class="mngr_phone" value="010-5265-1512" data-name="010-5265-1512" />
							<input type="hidden" class="mngr_mail" value="sykang@taxemail.co.kr" data-name="sykang@taxemail.co.kr" />
						</div>
					</div>
					<div class="itemInfo mb_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문" />
						<input type="hidden" class="mngr_idno" value="3" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:1.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
						</div>
						<p class="tac mt10">
						</p>
					</div>
					<div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
						<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
						ZOOM ID : 510 002 5847<br>
						연결 비밀번호 : selim
					</div>
					<div class="viewInfo">
						<div class="in">
							<ul>
								<li>
									<div class="tit no4">이메일</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:sykang@taxemail.co.kr" style="color: #0269bf">sykang@taxemail.co.kr</a>
									</div>
								</li>
								<li>
									<div class="tit no1">전화번호</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="tel:02-854-6260">02-854-6260</a>
									</div>
								</li>
								<li>
									<div class="tit no5">FAX</div>
									<div class="text">
										0507-0310-6720</div>
								</li>
								<li>
									<div class="tit no3">경력</div>
									<div class="text">
										<ul>
											<li>- 세무사무실 경력 20년이상
											</li>
											<li>- 세림세무법인 업무이사</li>
										</ul>
									</div>
								</li>
								<li>
									<div class="tit no3 last">연구 &<br>관심분야</div>
									<div class="text">
										<ul>
											<li>- 수출입업무
											</li>
											<li>- 4대보험 및 원천세 업무
											</li>
											<li>- 연말정산 외주 대행 업무
											</li>
											<li>- 특허법인 기장 업무
											</li>
											<li>- 약국 기장업무
											</li>
											<li>- 병원 및 한의원 기장업무
											</li>
											<li>- 건설업 면허보유업체 기장업무 </li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="itemInfo pc_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문" />
						<input type="hidden" class="mngr_idno" value="3" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:2.0rem; margin-bottom:0.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
							<div>
								&nbsp;
							</div>
							<div style="margin-top:0.25rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
								<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
								ZOOM ID : 510 002 5847<br>
								연결 비밀번호 : selim
							</div>
						</div>
						<p class="tac mt10">
						</p>
					</div>
				</li>
				<li class="consulting_1li">
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/files/mngr/202008181771024469.jpg" alt="배호영 세무사">
							</div>
							<div class="txt">
								<div class="tit01">배호영 세무사</div>
								<div class="tit02">“고객을 소중히 생각하겠습니다.”</div>
							</div>
							<!--<div class="viewBtn open">
<img src="/pages/default/images/mbv/open_view.png" alt="세무사정보 보기" />
</div>-->
						</div>
						<div class="btn">
							<input type="hidden" class="mngr_tel" value="02-501-2051" data-name="02-501-2051" />
							<input type="hidden" class="mngr_phone" value="010-6609-8992" data-name="010-6609-8992" />
							<input type="hidden" class="mngr_mail" value="taxmgt9@taxemail.co.kr" data-name="taxmgt9@taxemail.co.kr" />
						</div>
					</div>
					<div class="itemInfo mb_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문" />
						<input type="hidden" class="mngr_idno" value="8" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:1.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
						</div>
						<p class="tac mt10">
						</p>
					</div>
					<div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
						<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
						ZOOM ID : 510 002 5847<br>
						연결 비밀번호 : selim
					</div>
					<div class="viewInfo">
						<div class="in">
							<ul>
								<li>
									<div class="tit no4">이메일</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:taxmgt9@taxemail.co.kr" style="color: #0269bf">taxmgt9@taxemail.co.kr</a>
									</div>
								</li>
								<li>
									<div class="tit no1">전화번호</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="tel:02-501-2051">02-501-2051</a>
									</div>
								</li>
								<li>
									<div class="tit no5">FAX</div>
									<div class="text">
										0507-0307-6143</div>
								</li>
								<li>
									<div class="tit no3">경력</div>
									<div class="text">
										<ul>
											<li>- 세림세무법인 2본부 1팀장</li>
										</ul>
									</div>
								</li>
								<li>
									<div class="tit no3 last">연구 &<br>관심분야</div>
									<div class="text">
										<ul>
											<li>- 주택 중과제도 연구
											</li>
											<li>- 양도세 사례연구</li>
											<li>- 주택임대사업 전문세무사</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="itemInfo pc_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문" />
						<input type="hidden" class="mngr_idno" value="8" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:2.0rem; margin-bottom:0.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
							<div>
								&nbsp;
							</div>
							<div style="margin-top:0.25rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
								<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
								ZOOM ID : 510 002 5847<br>
								연결 비밀번호 : selim
							</div>
						</div>
						<p class="tac mt10">
						</p>
					</div>
				</li>
				<li class="consulting_1li">
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/files/mngr/201912301487883727.jpg" alt="권다희 세무사">
							</div>
							<div class="txt">
								<div class="tit01">권다희 세무사</div>
								<div class="tit02">“고객과 함께 나아가겠습니다.”</div>
							</div>
							<!--<div class="viewBtn open">
<img src="/pages/default/images/mbv/open_view.png" alt="세무사정보 보기" />
</div>-->
						</div>
						<div class="btn">
							<input type="hidden" class="mngr_tel" value="02-854-6105" data-name="02-854-6105" />
							<input type="hidden" class="mngr_phone" value="010-8487-4005" data-name="010-8487-4005" />
							<input type="hidden" class="mngr_mail" value="taxmgt15@taxemail.co.kr" data-name="taxmgt15@taxemail.co.kr" />
						</div>
					</div>
					<div class="itemInfo mb_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										외투기업 설립 및 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문/외투기업 설립 및 자문" />
						<input type="hidden" class="mngr_idno" value="4" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:1.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
						</div>
						<p class="tac mt10">
						</p>
					</div>
					<div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
						<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
						ZOOM ID : 510 002 5847<br>
						연결 비밀번호 : selim
					</div>
					<div class="viewInfo">
						<div class="in">
							<ul>
								<li>
									<div class="tit no4">이메일</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:taxmgt15@taxemail.co.kr" style="color: #0269bf">taxmgt15@taxemail.co.kr</a>
									</div>
								</li>
								<li>
									<div class="tit no1">전화번호</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="tel:02-854-6105">02-854-6105</a>
									</div>
								</li>
								<li>
									<div class="tit no5">FAX</div>
									<div class="text">
										0507-0307-6679</div>
								</li>
								<li>
									<div class="tit no3">경력</div>
									<div class="text">
										<ul>
											<li>- 세림세무법인 총괄 (2본부장)</li>
										</ul>
									</div>
								</li>
								<li>
									<div class="tit no3 last">연구 &<br>관심분야</div>
									<div class="text">
										<ul>
											<li>- 임대주택의 양도세 연구
											</li>
											<li>- 주택 중과제도 연구
											</li>
											<li>- 시행사의 세무, 주택신축판매업 세무
											</li>
											<li>- 법인세제 및 배당정책 연구
											</li>
											<li>- 시행사업 전문세무사</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="itemInfo pc_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										외투기업 설립 및 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문/외투기업 설립 및 자문" />
						<input type="hidden" class="mngr_idno" value="4" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:2.0rem; margin-bottom:0.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
							<div>
								&nbsp;
							</div>
							<div style="margin-top:0.25rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
								<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
								ZOOM ID : 510 002 5847<br>
								연결 비밀번호 : selim
							</div>
						</div>
						<p class="tac mt10">
						</p>
					</div>
				</li>
				<li class="consulting_1li">
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/files/mngr/20210901342159834.jpg" alt="하유정 세무사">
							</div>
							<div class="txt">
								<div class="tit01">하유정 세무사</div>
								<div class="tit02">“고객과 함께 나아가겠습니다.”</div>
							</div>
							<!--<div class="viewBtn open">
<img src="/pages/default/images/mbv/open_view.png" alt="세무사정보 보기" />
</div>-->
						</div>
						<div class="btn">
							<input type="hidden" class="mngr_tel" value="02-854-2152" data-name="02-854-2152" />
							<input type="hidden" class="mngr_phone" value="010-6546-1425" data-name="010-6546-1425" />
							<input type="hidden" class="mngr_mail" value="taxmgt13@taxemail.co.kr" data-name="taxmgt13@taxemail.co.kr" />
						</div>
					</div>
					<div class="itemInfo mb_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										외투기업 설립 및 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문/외투기업 설립 및 자문" />
						<input type="hidden" class="mngr_idno" value="21" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:1.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
						</div>
						<p class="tac mt10">
						</p>
					</div>
					<div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
						<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
						ZOOM ID : 510 002 5847<br>
						연결 비밀번호 : selim
					</div>
					<div class="viewInfo">
						<div class="in">
							<ul>
								<li>
									<div class="tit no4">이메일</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:taxmgt13@taxemail.co.kr" style="color: #0269bf">taxmgt13@taxemail.co.kr</a>
									</div>
								</li>
								<li>
									<div class="tit no1">전화번호</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="tel:02-854-2152">02-854-2152</a>
									</div>
								</li>
								<li>
									<div class="tit no5">FAX</div>
									<div class="text">
										0507-0310-6718</div>
								</li>
								<li>
									<div class="tit no3">경력</div>
									<div class="text">
										<ul>
											<li>- 세림세무법인 1본부 2팀</li>
										</ul>
									</div>
								</li>
								<li>
									<div class="tit no3 last">연구 &<br>관심분야</div>
									<div class="text">
										<ul>
											<li>- 양도세 사례연구
											</li>
											<li>- 주택신축판매업 세무 및 사례연구
											</li>
											<li>- 상장&비상장 주식평가업무 세무</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="itemInfo pc_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										외투기업 설립 및 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문/외투기업 설립 및 자문" />
						<input type="hidden" class="mngr_idno" value="21" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:2.0rem; margin-bottom:0.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
							<div>
								&nbsp;
							</div>
							<div style="margin-top:0.25rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
								<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
								ZOOM ID : 510 002 5847<br>
								연결 비밀번호 : selim
							</div>
						</div>
						<p class="tac mt10">
						</p>
					</div>
				</li>
				<li class="consulting_1li">
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/files/mngr/202110201594468218.jpg" alt="장호연 세무사">
							</div>
							<div class="txt">
								<div class="tit01">장호연 세무사</div>
								<div class="tit02">“고객과 함께 나아가겠습니다”</div>
							</div>
							<!--<div class="viewBtn open">
<img src="/pages/default/images/mbv/open_view.png" alt="세무사정보 보기" />
</div>-->
						</div>
						<div class="btn">
							<input type="hidden" class="mngr_tel" value="02-854-2100" data-name="02-854-2100" />
							<input type="hidden" class="mngr_phone" value="010-4713-1328" data-name="010-4713-1328" />
							<input type="hidden" class="mngr_mail" value="taxmgt4@taxemail.co.kr" data-name="taxmgt4@taxemail.co.kr" />
						</div>
					</div>
					<div class="itemInfo mb_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										외투기업 설립 및 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문/외투기업 설립 및 자문" />
						<input type="hidden" class="mngr_idno" value="22" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:1.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
						</div>
						<p class="tac mt10">
						</p>
					</div>
					<div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
						<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
						ZOOM ID : 510 002 5847<br>
						연결 비밀번호 : selim
					</div>
					<div class="viewInfo">
						<div class="in">
							<ul>
								<li>
									<div class="tit no4">이메일</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:taxmgt4@taxemail.co.kr" style="color: #0269bf">taxmgt4@taxemail.co.kr</a>
									</div>
								</li>
								<li>
									<div class="tit no1">전화번호</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="tel:02-854-2100">02-854-2100</a>
									</div>
								</li>
								<li>
									<div class="tit no5">FAX</div>
									<div class="text">
										0507-0307-6142</div>
								</li>
								<li>
									<div class="tit no3">경력</div>
									<div class="text">
										<ul>
											<li>- 세림세무법인 1본부 관리팀</li>
										</ul>
									</div>
								</li>
								<li>
									<div class="tit no3 last">연구 &<br>관심분야</div>
									<div class="text">
										<ul>
											<li>- 양도세 사례연구
											</li>
											<li>- 주택 중과제도 연구
											</li>
											<li>- 상장&비상장 주식평가업무 세무</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="itemInfo pc_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										외투기업 설립 및 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문/외투기업 설립 및 자문" />
						<input type="hidden" class="mngr_idno" value="22" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:2.0rem; margin-bottom:0.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
							<div>
								&nbsp;
							</div>
							<div style="margin-top:0.25rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
								<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
								ZOOM ID : 510 002 5847<br>
								연결 비밀번호 : selim
							</div>
						</div>
						<p class="tac mt10">
						</p>
					</div>
				</li>
				<li class="consulting_1li">
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/files/mngr/20211028141531543.jpg" alt="윤서경 세무사">
							</div>
							<div class="txt">
								<div class="tit01">윤서경 세무사</div>
								<div class="tit02">“”</div>
							</div>
							<!--<div class="viewBtn open">
<img src="/pages/default/images/mbv/open_view.png" alt="세무사정보 보기" />
</div>-->
						</div>
						<div class="btn">
							<input type="hidden" class="mngr_tel" value="02-501-2174" data-name="02-501-2174" />
							<input type="hidden" class="mngr_phone" value="010-2774-7835" data-name="010-2774-7835" />
							<input type="hidden" class="mngr_mail" value="taxmgt5@taxemail.co.kr" data-name="taxmgt5@taxemail.co.kr" />
						</div>
					</div>
					<div class="itemInfo mb_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										외투기업 설립 및 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문/외투기업 설립 및 자문" />
						<input type="hidden" class="mngr_idno" value="23" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:1.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
						</div>
						<p class="tac mt10">
						</p>
					</div>
					<div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
						<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
						ZOOM ID : 510 002 5847<br>
						연결 비밀번호 : selim
					</div>
					<div class="viewInfo">
						<div class="in">
							<ul>
								<li>
									<div class="tit no4">이메일</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:taxmgt5@taxemail.co.kr" style="color: #0269bf">taxmgt5@taxemail.co.kr</a>
									</div>
								</li>
								<li>
									<div class="tit no1">전화번호</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="tel:02-501-2174">02-501-2174</a>
									</div>
								</li>
								<li>
									<div class="tit no3">경력</div>
									<div class="text">
										<ul>
											<li>- 세림세무법인 2본부 관리팀</li>
										</ul>
									</div>
								</li>
								<li>
									<div class="tit no3 last">연구 &<br>관심분야</div>
									<div class="text">
										<ul>
											<li>- 주식평가 전문세무사</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="itemInfo pc_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										양도소득세,지방세,종부세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										증여세,상속세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										법인설립,신규사업 자문</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										외투기업 설립 및 자문</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="양도소득세,지방세,종부세/증여세,상속세/법인세,부가세/인사급여,4대보험,소득세/법인설립,신규사업 자문/외투기업 설립 및 자문" />
						<input type="hidden" class="mngr_idno" value="23" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:2.0rem; margin-bottom:0.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
							<div>
								&nbsp;
							</div>
							<div style="margin-top:0.25rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
								<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
								ZOOM ID : 510 002 5847<br>
								연결 비밀번호 : selim
							</div>
						</div>
						<p class="tac mt10">
						</p>
					</div>
				</li>
				<li class="consulting_1li">
					<div class="topInfo">
						<div class="selView">
							<div class="img">
								<img src="/files/mngr/202102101371373920.jpg" alt="이선영 실장">
							</div>
							<div class="txt">
								<div class="tit01">이선영 실장</div>
								<div class="tit02">“고객과 함께하겠습니다.”</div>
							</div>
							<!--<div class="viewBtn open">
<img src="/pages/default/images/mbv/open_view.png" alt="세무사정보 보기" />
</div>-->
						</div>
						<div class="btn">
							<input type="hidden" class="mngr_tel" value="02-854-2128" data-name="02-854-2128" />
							<input type="hidden" class="mngr_phone" value="010-9181-0650" data-name="010-9181-0650" />
							<input type="hidden" class="mngr_mail" value="syyi@taxemail.co.kr" data-name="syyi@taxemail.co.kr" />
						</div>
					</div>
					<div class="itemInfo mb_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="법인세,부가세/인사급여,4대보험,소득세" />
						<input type="hidden" class="mngr_idno" value="24" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:1.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
						</div>
						<p class="tac mt10">
						</p>
					</div>
					<div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
						<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
						ZOOM ID : 510 002 5847<br>
						연결 비밀번호 : selim
					</div>
					<div class="viewInfo">
						<div class="in">
							<ul>
								<li>
									<div class="tit no4">이메일</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="mailto:syyi@taxemail.co.kr" style="color: #0269bf">syyi@taxemail.co.kr</a>
									</div>
								</li>
								<li>
									<div class="tit no1">전화번호</div>
									<div class="text">
										<span style="text-decoration: underline; text-decoration-color: #0269bf;">
											<a href="tel:02-854-2128">02-854-2128</a>
									</div>
								</li>
								<li>
									<div class="tit no5">FAX</div>
									<div class="text">
										0507-0310-6725</div>
								</li>
								<li>
									<div class="tit no3">경력</div>
									<div class="text">
										<ul>
											<li>- 세림세무법인 관리실장</li>
										</ul>
									</div>
								</li>
								<li>
									<div class="tit no3 last">연구 &<br>관심분야</div>
									<div class="text">
										<ul>
											<li>- 인사급여
											</li>
											<li>- 4대보험
											</li>
											<li>- 소득세</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="itemInfo pc_ver">
						<p class="mb10 tac cs_title">
							<a>
								상담가능 세목
							</a>
						</p>
						<ul class="category_li cs_view">
							<li class="cate_list">
								<label>
									<a>
										법인세,부가세</a>
								</label>
							</li>
							<li class="cate_list">
								<label>
									<a>
										인사급여,4대보험,소득세</a>
								</label>
							</li>
						</ul>
						<input type="hidden" class="mngr_category_txt" value="법인세,부가세/인사급여,4대보험,소득세" />
						<input type="hidden" class="mngr_idno" value="24" />
						<div class="consulting_btn">
							<ul>
								<li>
									<div class="txt">
										<a class="counselGo consultingBtn" href="#goTalkPop">
											<i class="fa fa-phone" aria-hidden="true"></i>
											<tag><b>상담예약</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoMail consultingBtn act_submit">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<tag><b>메일상담</b></tag>
										</a>
									</div>
								</li>
								<li>
									<div class="txt">
										<a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
											<img style="max-width:2.0rem; margin-bottom:0.5rem;" src="/pages/default/images/ico/zoom_icon.png" />
											<tag><b>화상상담</b></tag>
										</a>
									</div>
								</li>
							</ul>
							<div>
								&nbsp;
							</div>
							<div style="margin-top:0.25rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
								<strong style="color:#235ba6">ZOOM 화상통화</strong><br>
								ZOOM ID : 510 002 5847<br>
								연결 비밀번호 : selim
							</div>
						</div>
						<p class="tac mt10">
						</p>
					</div>
				</li>
			</ul>
		</div>
		<!-- <div class="btnCenter btn01"><a href="#" class="act_submit">다음</a></div> -->
	</form>
	<div id="goTalkPop" class="goTalkPop">
		<h1>전화상담 예약 정보확인</h1>
		<form id="frm_counsel_talk" name="frm_counsel_talk" method="post">
			<input type="hidden" name="tax_nick" value="세림세무법인" />
			<input type="hidden" name="manager" value="" />
			<input type="hidden" name="manager_phone" value="" />
			<input type="hidden" name="category" value="" />
			<input type="hidden" id="loginChk" value="chk" />
			<input type="hidden" name="goods_name" value="[상담센터]" />
			<div class="gtp-wrap">
				<p><strong>상담자</strong><span class="manager_name"></span></p>
				<div class="cs_category_wrap">
					<ul class="category_li"></ul>
				</div>
				<p><strong>신청자명</strong><span><input type="text" class="req" name="name" value="" maxlength="20" title="신청자명을 입력해주세요." /></span></p>
				<p><strong>내 핸드폰</strong><span><input type="text" class="req" name="u_phone" value="" maxlength="20" title="휴대폰을 입력해주세요." /></span></p>
			</div>
			<div class="gtp-btn-wrap">
				<button class="gtp-btn talk-btn"><a>상담예약</a></button>
				<button class="gtp-btn cancel-btn"><a>취소</a></button>
			</div>
		</form>
	</div>
</div>
<!-- //subContainer -->
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>