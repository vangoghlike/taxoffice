{ #header }

<!-- Container -->
<div class="container" id="container">

	{ #subtop }
	<div class="subNav subNavType2" style="display: none;">
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
				<h2>{ USER_TYPE } { ? sizeof(MENU[CONTENTS['breadcrumbs'][1]['idno']]) > 1 }{ CONTENTS['breadcrumbs'][1]['menu_title'] }{ : }{ CONTENTS['menu_title'] }{ / }{ ? TABS.size_ > 1 } - { TABS[CONTENTS_NO] }{ / } &nbsp;&nbsp;<span class="small-tit gray">{ DATA['mngr_name'] }</span></span></h2>
			</div>
			<!-- //h2Wrap -->

			<!-- lnb -->
			<div class="lnb">
				<span><img src="{TYPE_URL}/images/common/home.png" alt="home"></span>
				{ ? is_numeric(CONTENTS['breadcrumbs'][0]['idno']) }{ @ CONTENTS['breadcrumbs'] }{ ? .index_ < .size_ -1 }<span>{ .menu_title }</span>{ : }<span>{ .menu_title }</span>{ / }{ / }{ : }<span>{ CONTENTS['menu_title'] }</span>{ / }<span class="last">{ DATA['mngr_name'] }</span>
			</div>
			<!-- //lnb -->

		</div>
		<!-- //subTopInfo -->
		<!-- contStart -->
		<div class="contStart">
			<div class="tabType01" style="display: none">
				<ul>
					{ ? USERINFO['user_id'] != DATA['user_id'] }
					<li class="on" style="width:50%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/view?&mid={ DATA['idno'] }">기본 정보</a></li>
					<li style="width:50%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/list?&mid={ DATA['idno'] }">대화방</a></li>
					{ : }
					<li class="on" style="width:33.3%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/view?&mid={ DATA['idno'] }">기본 정보</a></li>
					<li style="width:33.3%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/list?&mid={ DATA['idno'] }">대화방</a></li>
					<li style="width:33.3%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/info?&mid={ DATA['idno'] }">정보</a></li>
					{ / }
				</ul>
			</div>

			<div class="memberTop">
				<div class="img"><img src="{ MNGR_PHOTO_URL }{ DATA['file_name'] }" alt="{ DATA['mngr_name'] }"></div>
				<div class="textWrap">
					{ ? DATA['phome_url'] != '' }
					<a class="phome_link" href="{ DATA['phome_url'] }" target="_blank">
						<i class="fa fa-external-link"></i>&nbsp;&nbsp;{ DATA['bran_name'] } 개인홈
					</a>
					{ / }
					<div class="tit01 nobg"><a href="mailto:{ DATA['email'] }" target="_top">{ DATA['mngr_name'] }</a><span
								style="color: #000000"> <span style="color: #5198f6">"{ DATA['info1'] }"&nbsp;&nbsp;</span></span>
					</div>
					<div class="listTyp01">
						<ul>
							<li class="cstSe-memCate">
								<div class="tit nobg">기본사항</div>
								<div class="tit nobg ft13" style="margin-bottom: 8px">상호명 : <span>{ DATA['bran_name'] }</span></div>
								<div class="tit nobg ft13" style="margin-top: 0px; margin-bottom: 8px">전화번호 : <span>{ DATA['tel'] }</span>
								</div>
								<div class="tit nobg ft13" style="margin-top: 0px; margin-bottom: 8px">이메일 : <a
											href="mailto:{ DATA['email'] }" target="_top"><span>{ DATA['email'] }</span></a>
								</div>
								<div class="tit nobg ft13 addr" style="margin-top: 0px; ">주소
									: <span>{ DATA['addr1'] } { DATA['addr2'] }</span></div>
							</li>
							<li class="cstSe-memCate">
								<div class="tit nobg">프로필(경력)</div>
								<p class="smList">
									{ =nl2br(DATA['info2']) }
								</p>
								<p class="mt20 smList">
									{ =nl2br(DATA['info3']) }
								</p>
							</li>
							<li class="cstSe-memCate">
								<div class="tit nobg">연구(관심) 분야</div>
								<p class="smList">
									{ =nl2br(DATA['info4']) }
								</p>
							</li>
						</ul>
					</div>

				</div>
				<form action="" class="member_addr-code">
					<div><a href="#">{ DATA['addr_code'] }</a></div>
				</form>
			</div>
			{ ? USERINFO['user_id'] == DATA['user_id'] }
			<div class="user_udt_wrap">
				<a id="mngr_update" class="mngr_update" href="{ BASE_URL }/c_info_page">네트워크 회원 정보 수정</a>
				<input type="hidden" name="mngr_mode"/>
			</div>
			{ / }
			<div class="ceoMap" style="margin-top: 48px">
				<div class="tit01">찾아오시는 길</div>
				<div class="map_wrap">
					<div id="mngr_map"></div>
					<!-- 지도타입 컨트롤 div 입니다 -->
					<div class="custom_typecontrol radius_border">
						<span id="btnRoadmap" class="selected_btn" onclick="setMapType('roadmap')">지도</span>
						<span id="btnSkyview" class="btn" onclick="setMapType('skyview')">스카이뷰</span>
					</div>
					<!-- 지도 확대, 축소 컨트롤 div 입니다 -->
					<div class="custom_zoomcontrol radius_border">
						<span onclick="zoomIn()"><img src="http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/ico_plus.png" alt="확대"></span>
						<span onclick="zoomOut()"><img src="http://t1.daumcdn.net/localimg/localimages/07/mapapidoc/ico_minus.png" alt="축소"></span>
					</div>
				</div>

				<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=2f6686bf5b4c8af8f710f7abd44d9030&libraries=services,clusterer,drawing"></script>
				<script>
					var container = document.getElementById('mngr_map');
					var options = {
						center: new kakao.maps.LatLng( { DATA['lat'] }, { DATA['lng'] } ),
						level: 3
					};

					var map = new kakao.maps.Map(container, options);

					// 지도에 마커를 표시합니다
					var marker = new kakao.maps.Marker({
						map: map,
						position: new kakao.maps.LatLng( { DATA['lat'] }, { DATA['lng'] } )
					});

					// 커스텀 오버레이에 표시할 컨텐츠 입니다
					// 커스텀 오버레이는 아래와 같이 사용자가 자유롭게 컨텐츠를 구성하고 이벤트를 제어할 수 있기 때문에
					// 별도의 이벤트 메소드를 제공하지 않습니다
					var content = '<div class="mngr-map__wrap">' +
							'    <div class="mngr-map__info">' +
							'        <div class="mngr-map__title">' +
							'            { DATA['mngr_name'] }' +
							'            <div class="mngr-map__close" onclick="closeOverlay()" title="닫기"><i class="fa fa-times"></i></div>' +
							'        </div>' +
							'        <div class="mngr-map__body">' +
							'            <div class="mngr-map__desc">' +
							'                <div class="mngr-map__ellipsis"><strong>상호 : { DATA['bran_name'] }</strong></div>' +
							'                <div class="mngr-map__ellipsis">{ DATA['addr1'] }</div>' +
							'                <div class="jibun mngr-map__ellipsis">{ DATA['addr2'] }</div>' +
							'            </div>' +
							'        </div>' +
							'    </div>' +
							'</div>';

					// 마커 위에 커스텀오버레이를 표시합니다
					// 마커를 중심으로 커스텀 오버레이를 표시하기위해 CSS를 이용해 위치를 설정했습니다
					var overlay = new kakao.maps.CustomOverlay({
						content: content,
						map: map,
						position: marker.getPosition()
					});

					// 마커를 클릭했을 때 커스텀 오버레이를 표시합니다
					kakao.maps.event.addListener(marker, 'click', function() {
						overlay.setMap(map);
					});

					// 커스텀 오버레이를 닫기 위해 호출되는 함수입니다
					function closeOverlay() {
						overlay.setMap(null);
					}

					// 지도타입 컨트롤의 지도 또는 스카이뷰 버튼을 클릭하면 호출되어 지도타입을 바꾸는 함수입니다
					function setMapType(maptype) {
						var roadmapControl = document.getElementById('btnRoadmap');
						var skyviewControl = document.getElementById('btnSkyview');
						if (maptype === 'roadmap') {
							map.setMapTypeId(kakao.maps.MapTypeId.ROADMAP);
							roadmapControl.className = 'selected_btn';
							skyviewControl.className = 'btn';
						} else {
							map.setMapTypeId(kakao.maps.MapTypeId.HYBRID);
							skyviewControl.className = 'selected_btn';
							roadmapControl.className = 'btn';
						}
					}

					// 지도 확대, 축소 컨트롤에서 확대 버튼을 누르면 호출되어 지도를 확대하는 함수입니다
					function zoomIn() {
						map.setLevel(map.getLevel() - 1);
					}

					// 지도 확대, 축소 컨트롤에서 축소 버튼을 누르면 호출되어 지도를 확대하는 함수입니다
					function zoomOut() {
						map.setLevel(map.getLevel() + 1);
					}
				</script>
			</div>
		</div>
	</div>
</div>
{ #footer }
{ #popup }