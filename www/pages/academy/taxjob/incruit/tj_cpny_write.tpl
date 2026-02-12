{ #header }
<link rel="stylesheet" type="text/css" href="{ TYPE_URL }/taxjob/assets/css/taxjob_con.css"  media="all" />
<!-- Container -->
<div class="container" id="container">

    { #subtop }

    <!-- subContent -->
    <div class="subContent">

        { #breadcrumbs }
        <!-- contStart -->
        <div class="contStart">

            <form id="resume_form" name="resume_form" method="post" action="/zf_user/member/resume-manage/save">
                <input type="hidden" name="template_cd" value="1" id="template_cd">        <input type="hidden" name="mem_idx" value="13298673" id="mem_idx">        <input type="hidden" name="res_idx" value="16397016" id="res_idx">        <input type="hidden" name="order_items" value="[&quot;resume_title&quot;,&quot;basic&quot;,&quot;school&quot;,&quot;career&quot;,&quot;activity&quot;,&quot;abroad&quot;,&quot;education&quot;,&quot;license&quot;,&quot;language_exam&quot;,&quot;certification&quot;,&quot;skill&quot;,&quot;personal&quot;,&quot;attach_port_files&quot;,&quot;attach_files&quot;,&quot;career_profile&quot;,&quot;introduce&quot;,&quot;svq&quot;]" id="order_items">        <input type="hidden" name="except_items" value="[&quot;activity&quot;,&quot;abroad&quot;,&quot;education&quot;,&quot;personal&quot;,&quot;attach_port_files&quot;,&quot;attach_files&quot;,&quot;svq&quot;]" id="except_items">        <input type="hidden" name="mode" value="" id="mode">        <input type="hidden" name="write_mode" value="insert" id="write_mode">        <input type="hidden" name="save_mode" value="auto_save" id="save_mode">        <input type="hidden" name="incomplete_cd" value="0" id="incomplete_cd">        <input type="hidden" name="save_common_available_fl" value="n" id="save_common_available_fl">        <input type="hidden" name="complete_status" value="n" data-saved_value="n" id="complete_status">        <input type="hidden" name="before_complete_status" value="n" data-saved_value="n" id="before_complete_status">        <input type="hidden" name="ref" value="" id="ref">
                <h2 class="blind">구인 등록</h2>

                <div id="resume_title" class="resume_section">
                    <h3 class="blind">구인 등록 제목</h3>
                    <div class="resume_title">
                        <div class="resume_input">
                            <label for="title" class="bar_title">구인 등록 제목<span class="valid_hidden">을 입력하세요 (100자까지 입력가능)</span></label>
                            <input type="text" id="title" name="title" class="resume_title_input" value="" maxlength="100" data-placeholder_empty="이력서 제목<span class='valid_hidden'>을 입력하세요 (100자까지 입력가능)</span>" data-placeholder_title="이력서 제목">
                            <p class="txt_error">에러 메세지 영역 입니다</p>
                        </div>
                    </div>
                    <div class="resume_title_tooltip" style="display: none;">
                        <span class="tail_top_left"></span>
                        <div class="tooltip_inner">
                            <p class="txt_noti"><strong class="point">제목 추천 서비스!</strong> 입력하신 내용을 조합해서, <strong>이력서 제목을 추천</strong>해드립니다.</p>
                            <ul class="list_radio_title"></ul>
                        </div>
                        <button type="button" class="btn_refresh">새로운 추천목록 보기</button>
                    </div>
                </div>


                <div id="basic" class="resume_section">
{*                    <div class="area_import_btn">*}
{*                        <button type="button" class="btn" data-api_type="layer" data-api_id="item_import" data-item="career">기본 정보 불러오기</button>*}
{*                    </div>*}

                    <div class="area_title">
                        <h3 class="title">구인 기업 정보</h3>
                    </div>

                    <div class="resume_write resume_basic">
                        <div class="resume_row">
                            <div class="input_title">기업 상호 <span class="point">필수</span></div>
                            <div class="resume_input focus">
                                <label for="user_nm" class="bar_title">이름<span class="valid_hidden"> 입력</span></label>
                                <input type="text" id="user_nm" name="user_nm" class="box_input" value="{ USERINFO['user_name'] }" maxlength="20" data-only-word="true">
                                <p class="txt_error">
                                </p>
                            </div>
                        </div>

                        <div class="resume_row">
                            <div class="input_title">기업 이미지 (로고)</div>
                            <div class="resume_photo">
                                <a href="##" class="box_photo" data-api_type="layer" data-api_id="basic_photo">
                                    <span>사진추가</span>            </a>
                                <a class="photo_delete" href="##" style="display:none;"><span class="blind">사진 삭제</span></a>
                            </div>
                        </div>

                        <div class="resume_row">
                            <div class="input_title">회사 이메일 <span class="point">필수</span></div>
                            <div class="resume_input">
                                <label for="email" class="bar_title">이메일 주소<span class="valid_hidden"> 입력</span></label>
                                <input type="text" id="email" name="email" class="box_input max_length" value="{ USERINFO['user_email'] }" data-api_type="layer" data-api_id="basic_confirm_email">
                                <p class="txt_error"></p>
                            </div>
                        </div>

                        <div class="resume_row">
                            <div class="input_title">전화번호 <span class="point">필수</span></div>
                            <div class="resume_input">
                                <label for="user_tel" class="bar_title">전화번호<span class="valid_hidden"> 입력</span></label>
                                <input type="text" id="user_phone" name="phone" class="box_input max_length" value="{ USERINFO['user_phone'] }" maxlength="11" data-only-number="true" data-api_type="layer" data-api_id="basic_confirm_cell" >
                                <p class="txt_error"></p>
                            </div>
                        </div>

                        <div class="resume_row">
                            <div class="input_title">팩스</div>
                            <div class="resume_input">
                                <label for="user_tel" class="bar_title">전화번호<span class="valid_hidden"> 입력</span></label>
                                <input type="text" id="user_phone" name="phone" class="box_input max_length" value="{ USERINFO['user_phone'] }" maxlength="11" data-only-number="true" data-api_type="layer" data-api_id="basic_confirm_cell" >
                                <p class="txt_error"></p>
                            </div>
                        </div>



                        <div class="resume_row">
                            <div class="input_title">사업지 주소 <span class="point">필수</span></div>
                            <input type="hidden" name="user_selected_type" id="user_selected_type" value="J">
                            <input type="hidden" id="sido" name="sido" value="">
                            <input type="hidden" id="sigungu" name="sigungu" value="">
                            <input type="hidden" id="latitude" name="latitude" value="" class="_areaPosition">
                            <input type="hidden" id="longitude" name="longitude" value="" class="_areaPosition">
                            <input type="hidden" id="old_zipcode" name="old_zipcode" value="" class="_searchArea _oldAddress">
                            <input type="hidden" id="new_zipcode" name="new_zipcode" value="" class="_searchArea _newAddress">

                            <div class="resume_address">
                                <div class="resume_input" style="display:block">
                                    <label for="post_code" class="bar_title">우편번호<span class="valid_hidden" > 입력</span></label>
                                    <input type="text" id="post_code" name="post_code" value="" maxlength="40" readonly="" class="box_input post_code _searchArea">
                                    <p class="txt_error"></p>
                                </div>

                                <div class="resume_input resume_bottom" style="display:block">
                                    <label for="new_address" class="bar_title"><span class="valid_hidden blind">도로명</span>주소<span class="valid_hidden" > 입력</span></label>
                                    <input type="text" id="new_address" name="new_address" value="" maxlength="40" readonly="" class="box_input old_address _searchArea">
                                    <p class="txt_error"></p>
                                </div>

                                <div class="resume_input" style="display:none;">
                                    <label for="old_address" class="bar_title"><span class="valid_hidden blind">지번</span>주소<span class="valid_hidden"> 입력</span></label>
                                    <input type="text" id="old_address" name="old_address" value="" maxlength="40" readonly="" class="box_input old_address _searchArea">
                                    <p class="txt_error"></p>
                                </div>

                                <div class="sri_select resume_select" style="display:none;">
                                    <label for="overseas" class="bar_title" id="country">국가<span class="valid_hidden"> 선택</span></label>
                                    <button type="button" class="ico_arr selected">국가 선택</button>
                                    <input type="hidden" name="overseas" id="overseas" value="">
                                    <ul class="list_opt">
                                        <li class=""><a href="##" class="link_opt" data-value="260-100">가나</a></li><li class=""><a href="##" class="link_opt" data-value="260-200">가봉</a></li><li class=""><a href="##" class="link_opt" data-value="231-300">가이아나</a></li><li class=""><a href="##" class="link_opt" data-value="261-500">감비아</a></li><li class=""><a href="##" class="link_opt" data-value="231-400">과델루프</a></li><li class=""><a href="##" class="link_opt" data-value="230-100">과테말라</a></li><li class=""><a href="##" class="link_opt" data-value="250-100">괌</a></li><li class=""><a href="##" class="link_opt" data-value="242-000">그라나다</a></li><li class=""><a href="##" class="link_opt" data-value="211-700">그루지아</a></li><li class=""><a href="##" class="link_opt" data-value="240-100">그리스</a></li><li class=""><a href="##" class="link_opt" data-value="220-400">그린란드</a></li><li class=""><a href="##" class="link_opt" data-value="261-600">기니</a></li><li class=""><a href="##" class="link_opt" data-value="261-700">기니비소우</a></li><li class=""><a href="##" class="link_opt" data-value="231-500">기아나(프랑스령)</a></li><li class=""><a href="##" class="link_opt" data-value="261-800">나미비아</a></li><li class=""><a href="##" class="link_opt" data-value="252-200">나우루공화국</a></li><li class=""><a href="##" class="link_opt" data-value="260-300">나이지리아</a></li><li class=""><a href="##" class="link_opt" data-value="239-900">남미기타</a></li><li class=""><a href="##" class="link_opt" data-value="260-400">남아프리카공화국</a></li><li class=""><a href="##" class="link_opt" data-value="240-200">네덜란드</a></li><li class=""><a href="##" class="link_opt" data-value="221-200">네덜란드령 안틸레스제도</a></li><li class=""><a href="##" class="link_opt" data-value="211-800">네팔</a></li><li class=""><a href="##" class="link_opt" data-value="240-300">노르웨이</a></li><li class=""><a href="##" class="link_opt" data-value="250-200">뉴질랜드</a></li><li class=""><a href="##" class="link_opt" data-value="250-600">뉴칼레도니아섬</a></li><li class=""><a href="##" class="link_opt" data-value="261-900">니제르</a></li><li class=""><a href="##" class="link_opt" data-value="231-600">니카라과</a></li><li class=""><a href="##" class="link_opt" data-value="210-100">대만</a></li><li class=""><a href="##" class="link_opt" data-value="240-400">덴마크</a></li><li class=""><a href="##" class="link_opt" data-value="220-500">도미니카공화국</a></li><li class=""><a href="##" class="link_opt" data-value="231-700">도미니카연방</a></li><li class=""><a href="##" class="link_opt" data-value="240-500">독일</a></li><li class=""><a href="##" class="link_opt" data-value="214-400">동티모르</a></li><li class=""><a href="##" class="link_opt" data-value="212-000">라오스</a></li><li class=""><a href="##" class="link_opt" data-value="262-000">라이베리아</a></li><li class=""><a href="##" class="link_opt" data-value="242-100">라트비아</a></li><li class=""><a href="##" class="link_opt" data-value="240-600">러시아</a></li><li class=""><a href="##" class="link_opt" data-value="262-200">레뉴니용</a></li><li class=""><a href="##" class="link_opt" data-value="212-100">레바논</a></li><li class=""><a href="##" class="link_opt" data-value="242-200">루마니아</a></li><li class=""><a href="##" class="link_opt" data-value="242-300">룩셈부르크</a></li><li class=""><a href="##" class="link_opt" data-value="262-100">르완다</a></li><li class=""><a href="##" class="link_opt" data-value="260-500">리비아</a></li><li class=""><a href="##" class="link_opt" data-value="242-400">리투아니아</a></li><li class=""><a href="##" class="link_opt" data-value="245-500">리히텐슈타인</a></li><li class=""><a href="##" class="link_opt" data-value="262-300">마다가스카르</a></li><li class=""><a href="##" class="link_opt" data-value="231-800">마르티니크섬</a></li><li class=""><a href="##" class="link_opt" data-value="250-700">마샬군도</a></li><li class=""><a href="##" class="link_opt" data-value="242-500">마케도니아</a></li><li class=""><a href="##" class="link_opt" data-value="262-400">말라위</a></li><li class=""><a href="##" class="link_opt" data-value="210-200">말레이시아</a></li><li class=""><a href="##" class="link_opt" data-value="262-500">말리</a></li><li class=""><a href="##" class="link_opt" data-value="220-100">멕시코</a></li><li class=""><a href="##" class="link_opt" data-value="242-600">모나코</a></li><li class=""><a href="##" class="link_opt" data-value="260-600">모로코</a></li><li class=""><a href="##" class="link_opt" data-value="265-500">모리셔스</a></li><li class=""><a href="##" class="link_opt" data-value="262-600">모리타니아</a></li><li class=""><a href="##" class="link_opt" data-value="262-700">모잠비크</a></li><li class=""><a href="##" class="link_opt" data-value="245-300">몬테네그로</a></li><li class=""><a href="##" class="link_opt" data-value="245-400">몰도바</a></li><li class=""><a href="##" class="link_opt" data-value="212-300">몰디브</a></li><li class=""><a href="##" class="link_opt" data-value="242-700">몰타</a></li><li class=""><a href="##" class="link_opt" data-value="210-300">몽골</a></li><li class=""><a href="##" class="link_opt" data-value="242-800">몽트세라</a></li><li class=""><a href="##" class="link_opt" data-value="220-200">미국</a></li><li class=""><a href="##" class="link_opt" data-value="210-400">미얀마</a></li><li class=""><a href="##" class="link_opt" data-value="252-000">미크로네시아</a></li><li class=""><a href="##" class="link_opt" data-value="250-800">바누아투</a></li><li class=""><a href="##" class="link_opt" data-value="212-400">바레인</a></li><li class=""><a href="##" class="link_opt" data-value="220-600">바베이도스</a></li><li class=""><a href="##" class="link_opt" data-value="245-200">바티칸시국</a></li><li class=""><a href="##" class="link_opt" data-value="220-700">바하마</a></li><li class=""><a href="##" class="link_opt" data-value="210-500">방글라데시</a></li><li class=""><a href="##" class="link_opt" data-value="220-800">버뮤다</a></li><li class=""><a href="##" class="link_opt" data-value="232-000">버진제도</a></li><li class=""><a href="##" class="link_opt" data-value="262-800">베냉</a></li><li class=""><a href="##" class="link_opt" data-value="230-200">베네수엘라</a></li><li class=""><a href="##" class="link_opt" data-value="210-600">베트남</a></li><li class=""><a href="##" class="link_opt" data-value="240-700">벨기에</a></li><li class=""><a href="##" class="link_opt" data-value="242-900">벨로루시</a></li><li class=""><a href="##" class="link_opt" data-value="232-100">벨리즈</a></li><li class=""><a href="##" class="link_opt" data-value="243-000">보스니아헤르체고비나</a></li><li class=""><a href="##" class="link_opt" data-value="262-900">보츠와나</a></li><li class=""><a href="##" class="link_opt" data-value="232-200">볼리비아</a></li><li class=""><a href="##" class="link_opt" data-value="263-000">부룬디</a></li><li class=""><a href="##" class="link_opt" data-value="263-100">부르키나파소</a></li><li class=""><a href="##" class="link_opt" data-value="212-600">부탄</a></li><li class=""><a href="##" class="link_opt" data-value="229-900">북·중미기타</a></li><li class=""><a href="##" class="link_opt" data-value="252-100">북마리아나군도</a></li><li class=""><a href="##" class="link_opt" data-value="212-700">북한</a></li><li class=""><a href="##" class="link_opt" data-value="243-100">불가리아</a></li><li class=""><a href="##" class="link_opt" data-value="230-300">브라질</a></li><li class=""><a href="##" class="link_opt" data-value="212-800">브루나이</a></li><li class=""><a href="##" class="link_opt" data-value="250-900">사모아</a></li><li class=""><a href="##" class="link_opt" data-value="210-700">사우디아라비아</a></li><li class=""><a href="##" class="link_opt" data-value="221-000">사이판</a></li><li class=""><a href="##" class="link_opt" data-value="245-100">산마리노</a></li><li class=""><a href="##" class="link_opt" data-value="265-400">상투메프린시페</a></li><li class=""><a href="##" class="link_opt" data-value="263-200">세네갈</a></li><li class=""><a href="##" class="link_opt" data-value="263-300">세이셀제도</a></li><li class=""><a href="##" class="link_opt" data-value="221-300">세인트루시아</a></li><li class=""><a href="##" class="link_opt" data-value="221-400">세인트빈센트그레나딘즈</a></li><li class=""><a href="##" class="link_opt" data-value="221-100">세인트키츠네비스</a></li><li class=""><a href="##" class="link_opt" data-value="220-900">세인트피에르미그온</a></li><li class=""><a href="##" class="link_opt" data-value="263-400">세인트헬레나섬</a></li><li class=""><a href="##" class="link_opt" data-value="263-500">소말리아</a></li><li class=""><a href="##" class="link_opt" data-value="251-900">솔로몬제도</a></li><li class=""><a href="##" class="link_opt" data-value="260-700">수단</a></li><li class=""><a href="##" class="link_opt" data-value="232-500">수리남</a></li><li class=""><a href="##" class="link_opt" data-value="210-800">스리랑카</a></li><li class=""><a href="##" class="link_opt" data-value="263-600">스와질랜드</a></li><li class=""><a href="##" class="link_opt" data-value="240-800">스웨덴</a></li><li class=""><a href="##" class="link_opt" data-value="240-900">스위스</a></li><li class=""><a href="##" class="link_opt" data-value="241-000">스페인</a></li><li class=""><a href="##" class="link_opt" data-value="243-300">슬로바키아</a></li><li class=""><a href="##" class="link_opt" data-value="243-200">슬로베니아</a></li><li class=""><a href="##" class="link_opt" data-value="212-900">시리아</a></li><li class=""><a href="##" class="link_opt" data-value="263-700">시에라리온</a></li><li class=""><a href="##" class="link_opt" data-value="244-300">신유고연방</a></li><li class=""><a href="##" class="link_opt" data-value="210-900">싱가포르</a></li><li class=""><a href="##" class="link_opt" data-value="213-000">아랍에미레이트연합국</a></li><li class=""><a href="##" class="link_opt" data-value="243-400">아루바</a></li><li class=""><a href="##" class="link_opt" data-value="214-700">아르메니아</a></li><li class=""><a href="##" class="link_opt" data-value="230-400">아르헨티나</a></li><li class=""><a href="##" class="link_opt" data-value="219-900">아시아·중동기타</a></li><li class=""><a href="##" class="link_opt" data-value="243-600">아이슬란드</a></li><li class=""><a href="##" class="link_opt" data-value="232-600">아이티</a></li><li class=""><a href="##" class="link_opt" data-value="243-700">아일랜드</a></li><li class=""><a href="##" class="link_opt" data-value="214-800">아제르바이잔</a></li><li class=""><a href="##" class="link_opt" data-value="213-100">아프가니스탄</a></li><li class=""><a href="##" class="link_opt" data-value="269-900">아프리카기타</a></li><li class=""><a href="##" class="link_opt" data-value="232-700">안길라</a></li><li class=""><a href="##" class="link_opt" data-value="243-900">알바니아</a></li><li class=""><a href="##" class="link_opt" data-value="263-900">알제리</a></li><li class=""><a href="##" class="link_opt" data-value="264-000">앙골라</a></li><li class=""><a href="##" class="link_opt" data-value="265-300">에리트레아</a></li><li class=""><a href="##" class="link_opt" data-value="244-000">에스토니아</a></li><li class=""><a href="##" class="link_opt" data-value="230-500">에콰도르</a></li><li class=""><a href="##" class="link_opt" data-value="260-900">에티오피아</a></li><li class=""><a href="##" class="link_opt" data-value="232-800">엔티가바부다</a></li><li class=""><a href="##" class="link_opt" data-value="232-900">엘살바도르</a></li><li class=""><a href="##" class="link_opt" data-value="241-100">영국</a></li><li class=""><a href="##" class="link_opt" data-value="213-200">영국령 인도양식민지</a></li><li class=""><a href="##" class="link_opt" data-value="213-300">예멘</a></li><li class=""><a href="##" class="link_opt" data-value="213-400">오만</a></li><li class=""><a href="##" class="link_opt" data-value="259-900">오세아니아기타</a></li><li class=""><a href="##" class="link_opt" data-value="244-100">오스트리아</a></li><li class=""><a href="##" class="link_opt" data-value="230-600">온두라스</a></li><li class=""><a href="##" class="link_opt" data-value="213-500">요르단</a></li><li class=""><a href="##" class="link_opt" data-value="261-000">우간다</a></li><li class=""><a href="##" class="link_opt" data-value="230-700">우루과이</a></li><li class=""><a href="##" class="link_opt" data-value="213-600">우즈베키스탄</a></li><li class=""><a href="##" class="link_opt" data-value="244-200">우크라이나</a></li><li class=""><a href="##" class="link_opt" data-value="249-900">유럽기타</a></li><li class=""><a href="##" class="link_opt" data-value="213-700">이라크</a></li><li class=""><a href="##" class="link_opt" data-value="213-800">이란</a></li><li class=""><a href="##" class="link_opt" data-value="244-400">이스라엘</a></li><li class=""><a href="##" class="link_opt" data-value="261-100">이집트</a></li><li class=""><a href="##" class="link_opt" data-value="241-200">이탈리아</a></li><li class=""><a href="##" class="link_opt" data-value="211-000">인도</a></li><li class=""><a href="##" class="link_opt" data-value="211-100">인도네시아</a></li><li class=""><a href="##" class="link_opt" data-value="211-200">일본</a></li><li class=""><a href="##" class="link_opt" data-value="264-100">자마이카</a></li><li class=""><a href="##" class="link_opt" data-value="264-200">자이르</a></li><li class=""><a href="##" class="link_opt" data-value="264-300">잠비아</a></li><li class=""><a href="##" class="link_opt" data-value="264-400">적도기니</a></li><li class=""><a href="##" class="link_opt" data-value="211-300">중국.홍콩</a></li><li class=""><a href="##" class="link_opt" data-value="264-500">중앙아프리카공화국</a></li><li class=""><a href="##" class="link_opt" data-value="264-600">지부티</a></li><li class=""><a href="##" class="link_opt" data-value="244-500">지브롤터</a></li><li class=""><a href="##" class="link_opt" data-value="264-700">짐바브웨</a></li><li class=""><a href="##" class="link_opt" data-value="264-800">차드</a></li><li class=""><a href="##" class="link_opt" data-value="241-300">체코</a></li><li class=""><a href="##" class="link_opt" data-value="230-800">칠레</a></li><li class=""><a href="##" class="link_opt" data-value="264-900">카메룬</a></li><li class=""><a href="##" class="link_opt" data-value="265-800">카보베르데</a></li><li class=""><a href="##" class="link_opt" data-value="213-900">카자흐스탄</a></li><li class=""><a href="##" class="link_opt" data-value="214-000">카타르</a></li><li class=""><a href="##" class="link_opt" data-value="211-400">캄보디아</a></li><li class=""><a href="##" class="link_opt" data-value="220-300">캐나다</a></li><li class=""><a href="##" class="link_opt" data-value="261-200">케냐</a></li><li class=""><a href="##" class="link_opt" data-value="233-000">케이만제도</a></li><li class=""><a href="##" class="link_opt" data-value="265-000">케이프버드</a></li><li class=""><a href="##" class="link_opt" data-value="265-700">코모로</a></li><li class=""><a href="##" class="link_opt" data-value="221-500">코스타리카</a></li><li class=""><a href="##" class="link_opt" data-value="263-800">코트디브아르</a></li><li class=""><a href="##" class="link_opt" data-value="230-900">콜롬비아</a></li><li class=""><a href="##" class="link_opt" data-value="265-100">콩고</a></li><li class=""><a href="##" class="link_opt" data-value="265-600">콩고민주공화국</a></li><li class=""><a href="##" class="link_opt" data-value="231-000">쿠바</a></li><li class=""><a href="##" class="link_opt" data-value="214-100">쿠웨이트</a></li><li class=""><a href="##" class="link_opt" data-value="251-000">쿠크 군도</a></li><li class=""><a href="##" class="link_opt" data-value="244-600">크로아티아</a></li><li class=""><a href="##" class="link_opt" data-value="214-600">키르기즈스탄</a></li><li class=""><a href="##" class="link_opt" data-value="251-100">키리바시</a></li><li class=""><a href="##" class="link_opt" data-value="244-700">키프로스</a></li><li class=""><a href="##" class="link_opt" data-value="214-200">타지키스탄</a></li><li class=""><a href="##" class="link_opt" data-value="261-300">탄자니아</a></li><li class=""><a href="##" class="link_opt" data-value="211-500">태국</a></li><li class=""><a href="##" class="link_opt" data-value="233-200">터크스앤카이코스제도</a></li><li class=""><a href="##" class="link_opt" data-value="241-400">터키</a></li><li class=""><a href="##" class="link_opt" data-value="265-200">토고</a></li><li class=""><a href="##" class="link_opt" data-value="251-800">토켈라우제도</a></li><li class=""><a href="##" class="link_opt" data-value="251-200">통가</a></li><li class=""><a href="##" class="link_opt" data-value="214-300">투르크메니스탄</a></li><li class=""><a href="##" class="link_opt" data-value="251-300">투발루</a></li><li class=""><a href="##" class="link_opt" data-value="261-400">튀니지</a></li><li class=""><a href="##" class="link_opt" data-value="233-300">트리니나드토바고</a></li><li class=""><a href="##" class="link_opt" data-value="231-100">파나마</a></li><li class=""><a href="##" class="link_opt" data-value="233-400">파라과이</a></li><li class=""><a href="##" class="link_opt" data-value="214-500">파키스탄</a></li><li class=""><a href="##" class="link_opt" data-value="250-300">파푸아뉴기니</a></li><li class=""><a href="##" class="link_opt" data-value="251-600">팔라우</a></li><li class=""><a href="##" class="link_opt" data-value="244-800">페로제도</a></li><li class=""><a href="##" class="link_opt" data-value="231-200">페루</a></li><li class=""><a href="##" class="link_opt" data-value="241-500">포르투갈</a></li><li class=""><a href="##" class="link_opt" data-value="233-500">포클랜드제도</a></li><li class=""><a href="##" class="link_opt" data-value="241-600">폴란드</a></li><li class=""><a href="##" class="link_opt" data-value="251-500">폴리네시아제도</a></li><li class=""><a href="##" class="link_opt" data-value="233-600">푸에르토리코</a></li><li class=""><a href="##" class="link_opt" data-value="241-700">프랑스</a></li><li class=""><a href="##" class="link_opt" data-value="250-400">피지</a></li><li class=""><a href="##" class="link_opt" data-value="241-800">핀란드</a></li><li class=""><a href="##" class="link_opt" data-value="211-600">필리핀</a></li><li class=""><a href="##" class="link_opt" data-value="251-700">핏케언제도</a></li><li class=""><a href="##" class="link_opt" data-value="241-900">헝가리</a></li><li class=""><a href="##" class="link_opt" data-value="250-500">호주</a></li>                    </ul>
                                    <p class="txt_error"></p>
                                </div>

                                <div class="resume_input resume_bottom" style="display:block;">
                                    <label for="new_address_details" class="bar_title"><span class="valid_hidden blind">도로명</span>상세주소<span class="valid_hidden"> 입력</span></label>
                                    <input type="text" id="new_address_details" name="new_address_details" value="" maxlength="50" class="box_input size_type5 _newAddress">
                                    <input type="hidden" id="new_address_extra" name="new_address_extra" value="">
                                    <p class="txt_error"></p>
                                </div>
                                <div class="resume_input resume_bottom resume_input_type6" style="display:none;">
                                    <label for="old_address_details" class="bar_title"><span class="valid_hidden blind">지번</span>상세주소<span class="valid_hidden"> 입력</span></label>
                                    <input type="text" id="old_address_details" name="old_address_details" value="" maxlength="50" class="box_input size_type5 _oldAddress">
                                    <p class="txt_error"></p>
                                </div>
                            </div>


                            <div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:1;-webkit-overflow-scrolling:touch;">
                                <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" alt="닫기 버튼">
                            </div>

                            <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>

                        </div>



{*                        <div class="resume_photo">*}
{*                            <a href="##" class="box_photo" data-api_type="layer" data-api_id="basic_photo">*}
{*                                <span>사진추가</span>            </a>*}
{*                            <a class="photo_delete" href="##" style="display:none;"><span class="blind">사진 삭제</span></a>*}
{*                        </div>*}
                    </div>

                </div>

                <div id="add_info" class="resume_section">
                    <div class="area_title">
                        <h3 class="title">구인 일반 사항</h3>
                    </div>

                    <div class="resume_write resume_add_info">
                        <div class="resume_row">
                            <div class="input_title">성별</div>
                            <div class="resume_radio">
                                <label class="sri_check sri_radio" for="genderdont">
                                    <input name="gender" class="inp_check" id="genderdont" type="radio" value="3" checked="checked">
                                    <span class="txt_check">무관</span>
                                </label>
                                <label class="sri_check sri_radio" for="genderman">
                                    <input name="gender" class="inp_check" id="genderman" type="radio" value="1">
                                    <span class="txt_check">남성</span>
                                </label>
                                <label class="sri_check sri_radio" for="genderwm">
                                    <input name="gender" class="inp_check" id="genderwm" type="radio" value="2">
                                    <span class="txt_check">여성</span>
                                </label>
                            </div>
                        </div>
                        <div class="resume_row">
                            <div class="input_title">병역여부</div>
                            <div class="resume_radio">
                                <label class="sri_check sri_radio" for="amidont">
                                    <input name="ami" class="inp_check" id="amidont" type="radio" value="3" checked="checked">
                                    <span class="txt_check">무관</span>
                                </label>
                                <label class="sri_check sri_radio" for="amiyes">
                                    <input name="ami" class="inp_check" id="amiyes" type="radio" value="1">
                                    <span class="txt_check">군필</span>
                                </label>
                                <label class="sri_check sri_radio" for="amino">
                                    <input name="ami" class="inp_check" id="amino" type="radio" value="2">
                                    <span class="txt_check">미필</span>
                                </label>
                            </div>
                        </div>

                        <div class="resume_row">
                            <div class="input_title">외국어능력</div>
                            <div class="resume_radio">
                                <label class="sri_check sri_radio" for="langskilldont">
                                    <input name="langskill" class="inp_check" id="langskilldont" type="radio" value="dont" checked="checked">
                                    <span class="txt_check">무관</span>
                                </label>
                                <label class="sri_check sri_radio" for="langskillen">
                                    <input name="langskill" class="inp_check" id="langskillen" type="radio" value="en">
                                    <span class="txt_check">영어</span>
                                </label>
                                <label class="sri_check sri_radio" for="langskillch">
                                    <input name="langskill" class="inp_check" id="langskillch" type="radio" value="ch">
                                    <span class="txt_check">중국어</span>
                                </label>
                                <label class="sri_check sri_radio" for="langskillja">
                                    <input name="langskill" class="inp_check" id="langskillja" type="radio" value="ja">
                                    <span class="txt_check">일본어</span>
                                </label>
                                <label class="sri_check sri_radio" for="langskilletc">
                                    <input name="langskill" class="inp_check" id="langskilletc" type="radio" value="etc">
                                    <span class="txt_check">기타</span>
                                </label>
                            </div>
                        </div>

                        <div class="resume_row">
                            <div class="input_title">근무형태</div>
                            <div class="resume_radio">
                                <label class="sri_check sri_radio" for="cotypetax">
                                    <input name="cotype" class="inp_check" id="cotypetax" type="radio" value="tax" checked="checked">
                                    <span class="txt_check type2">세무회계사무소</span>
                                </label>
                                <label class="sri_check sri_radio" for="cotypeprivate">
                                    <input name="cotype" class="inp_check" id="cotypeprivate" type="radio" value="private">
                                    <span class="txt_check type2">일반기업(개인)</span>
                                </label>
                                <label class="sri_check sri_radio" for="cotypecorp">
                                    <input name="cotype" class="inp_check" id="cotypecorp" type="radio" value="corp">
                                    <span class="txt_check type2">일반기업(법인)</span>
                                </label>
                            </div>
                        </div>

                        <div class="resume_row">
                            <div class="input_title">급여</div>
                            <div class="resume_radio">
                                <label class="sri_check sri_radio" for="paydont">
                                    <input name="pay" class="inp_check" id="paydont" type="radio" value="dont" checked="checked">
                                    <span class="txt_check type2">협의</span>
                                </label>
                                <label class="sri_check sri_radio" for="pay2th">
                                    <input name="pay" class="inp_check" id="pay2th" type="radio" value="2th">
                                    <span class="txt_check type2">2,000만 이상</span>
                                </label>
                                <label class="sri_check sri_radio" for="pay3th">
                                    <input name="pay" class="inp_check" id="pay3th" type="radio" value="3th">
                                    <span class="txt_check type2">3,000만 이상</span>
                                </label>
                                <label class="sri_check sri_radio" for="pay4th">
                                    <input name="pay" class="inp_check" id="pay4th" type="radio" value="4th">
                                    <span class="txt_check type2">4,000만 이상</span>
                                </label>
                                <label class="sri_check sri_radio" for="pay5th">
                                    <input name="pay" class="inp_check" id="pay5th" type="radio" value="5th">
                                    <span class="txt_check type2">5,000만 이상</span>
                                </label>
                            </div>
                        </div>

                        <div class="resume_row">
                            <div class="input_title">근무지역</div>
                            <div class="resume_input">
                                <label for="career_dept_nm_1600236584" class="bar_title">근무지역<span class="valid_hidden"> 입력</span></label>
                                <input type="text" id="career_dept_nm_1600236584" name="career_dept_nm[]" class="box_input" value="" maxlength="16">
                                <p class="txt_error"></p>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="add_info" class="resume_section">
                    <div class="area_title">
                        <h3 class="title">마감일자</h3>
                    </div>

                    <div class="resume_write resume_add_info">

                        <div class="resume_row">
                            <div class="input_title">마감일시</div>
                            <div class="resume_input">
                                <input type="date" id="career_dept_nm_1600236584" name="career_dept_nm[]" class="box_input" value="" maxlength="16">
                                <p class="txt_error"></p>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="add_info" class="resume_section">
                    <div class="area_title">
                        <h3 class="title">모집</h3>
                    </div>

                    <div class="resume_write resume_add_info">

                        <div class="resume_row">
                            <div class="input_title">모집인원</div>
                            <div class="resume_input">
                                <input type="number" id="career_dept_nm_1600236584" name="career_dept_nm[]" class="box_input" value="" maxlength="16" min="0" max="100">
                                &nbsp;명
                                <p class="txt_error"></p>
                            </div>
                        </div>

                    </div>
                </div>



                <div id="school" class="resume_section">
                    <div class="area_title">
                        <h3 class="title">요구 학력사항</h3>
                        <p class="txt_noti">요구 학력 선택해주세요</p>

{*                        <div class="area_import_btn">*}
{*                            <button type="button" class="btn" data-api_type="layer" data-api_id="item_import" data-item="school">기본 정보 불러오기</button>*}
{*                        </div>*}
                    </div>


                    <div class="resume_write resume_edu">
                        <div class="select_title">
                            <div class="resume_radio">
                                <label class="sri_check sri_radio" for="school_type_primary">
                                    <input name="school_type" class="inp_check" id="school_type_primary" type="radio" value="dont" checked="checked">
                                    <span class="txt_check">학력 무관</span>
                                </label>
                                <label class="sri_check sri_radio" for="school_type_middle">
                                    <input name="school_type" class="inp_check" id="school_type_middle" type="radio" value="middle">
                                    <span class="txt_check">중학교 졸업이상</span>
                                </label>
                                <label class="sri_check sri_radio" for="school_type_high">
                                    <input name="school_type" class="inp_check" id="school_type_high" type="radio" value="high">
                                    <span class="txt_check">고등학교 졸업이상</span>
                                </label>
                                <label class="sri_check sri_radio" for="school_type_univ">
                                    <input name="school_type" class="inp_check" id="school_type_univ" type="radio" value="univ">
                                    <span class="txt_check">대학·대학원 졸업 이상</span>
                                </label>
                                <p class="txt_error">최종학력 선택 후 학력을 입력하세요.</p>
                            </div>
                        </div>
                    </div>

                    <div id="education" class="resume_write resume_edu">
                    </div>

                    <div id="academy" class="resume_write resume_edu">
                    </div>

                    <div id="lastschool" class="resume_write final_edu" style="display:none;">
                        <input type="hidden" id="education_cd" name="education_cd" value="">
                        <input type="hidden" id="education_status" name="education_status" value="">
                        <input type="hidden" id="education_type" name="education_type" value="">
                        <input type="hidden" id="education_seq" name="education_seq" value="">
                        <input type="hidden" id="lastschool_nm" name="lastschool_nm" value="">

                        <div class="resume_row">
                            <div class="input_title">최종학력  <span class="point">필수</span></div>

                            <div class="sri_select resume_select">
                                <label for="school_type" class="bar_title">최종학력<span class="valid_hidden"> 선택</span></label>
                                <button type="button" data-guide="true" name="lastschool" class="ico_arr selected size_type5">최종학력 선택</button>
                                <input type="hidden" id="lastschool_row" name="lastschool_row">
                                <ul class="list_opt">
                                    <li class="on"><a href="##" class="link_opt" data-value=""><span class="valid_hidden"> 선택</span></a></li>
                                </ul>
                                <p class="txt_error"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="certification" class="resume_section">
                    <div class="area_title">
                        <h3 class="title">자격인증</h3>
                    </div>
                    <div class="resume_write resume_career_certification">
                        <div id="certiification_template">
                            <div class="tpl_row">
                                <div class="resume_row">
                                    <table class="resume_table">
                                        <colgroup>
                                            <col style="width:10%;"/>
                                            <col style="width:30%;"/>
                                            <col style="width:30%;"/>
                                            <col style="width:30%;"/>
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>
                                                순번
                                            </th>
                                            <th>
                                                자격종류
                                            </th>
                                            <th>
                                                시행기관
                                            </th>
                                            <th>
                                                Code
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbod>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    전산회계 2급
                                                </td>
                                                <td rowspan="10">
                                                    한국세무사회
                                                </td>
                                                <td>
                                                    <label>
                                                        <input type="checkbox" value="" name="" class="" id="" />&nbsp;
                                                        A(1-1)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    전산회계 1급
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="checkbox" value="" name="" class="" id="" />&nbsp;
                                                    A(1-2)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3
                                                </td>
                                                <td>
                                                    전산세무 2급
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="checkbox" value="" name="" class="" id="" />&nbsp;
                                                    A(1-3)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4
                                                </td>
                                                <td>
                                                    전산세무 1급
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="checkbox" value="" name="" class="" id="" />&nbsp;
                                                    A(1-4)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5
                                                </td>
                                                <td>
                                                    기업회계 3급
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="checkbox" value="" name="" class="" id="" />&nbsp;
                                                    A(1-5)
                                                    </label>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    6
                                                </td>
                                                <td>
                                                    기업회계 2급
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="checkbox" value="" name="" class="" id="" />&nbsp;
                                                    A(1-6)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    7
                                                </td>
                                                <td>
                                                    기업회계 1급
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="checkbox" value="" name="" class="" id="" />&nbsp;
                                                    A(1-7)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    8
                                                </td>
                                                <td>
                                                    세무회계 3급
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="checkbox" value="" name="" class="" id="" />&nbsp;
                                                    A(1-8)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    9
                                                </td>
                                                <td>
                                                    세무회계 2급
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="checkbox" value="" name="" class="" id="" />&nbsp;
                                                    A(1-9)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    10
                                                </td>
                                                <td>
                                                    세무회계 1급
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="checkbox" value="" name="" class="" id="" />&nbsp;
                                                    A(1-10)
                                                    </label>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    11
                                                </td>
                                                <td>
                                                    FAT 2급
                                                </td>
                                                <td rowspan="4">
                                                    공인회계사회
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="checkbox" value="" name="" class="" id="" />&nbsp;
                                                    A(2-1)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    12
                                                </td>
                                                <td>
                                                    FAT 1급
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="checkbox" value="" name="" class="" id="" />&nbsp;
                                                    A(2-2)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    13
                                                </td>
                                                <td>
                                                    TAT 2급
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="checkbox" value="" name="" class="" id="" />&nbsp;
                                                    A(2-3)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    14
                                                </td>
                                                <td>
                                                    TAT 1급
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="checkbox" value="" name="" class="" id="" />&nbsp;
                                                    A(2-4)
                                                    </label>
                                                </td>
                                            </tr>

                                        </tbod>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="career_certification" class="resume_section">
                    <div class="area_title">
                        <h3 class="title">경력인증</h3>
                    </div>
                    <div class="resume_write resume_career_certification">
                        <div id="career_certiification_template">
                            <div class="select_title">
                                <div class="resume_radio">
                                    <label class="sri_check sri_radio" for="career_cd_1">
                                        <input name="career_cd" class="inp_check" id="career_cd_1" type="radio" value="1">
                                        <span class="txt_check">신입</span>
                                    </label>
                                    <label class="sri_check sri_radio" for="career_cd_2">
                                        <input name="career_cd" class="inp_check" id="career_cd_2" type="radio" value="2">
                                        <span class="txt_check">경력</span>
                                    </label>
                                    <p class="txt_error"></p>
                                </div>
                            </div>
                            <div class="tpl_row">
                                <div class="resume_row">

                                    <table class="resume_table">
                                        <colgroup>
                                            <col style="width:10%;"/>
                                            <col style="width:30%;"/>
                                            <col style="width:30%;"/>
                                            <col style="width:30%;"/>
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>
                                                    순번
                                                </th>
                                                <th>
                                                    근무 형태
                                                </th>
                                                <th>
                                                    근무 기간
                                                </th>
                                                <th>
                                                    Code
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbod>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td rowspan="5">
                                                    전문회사 (세무사, 회계사)
                                                </td>
                                                <td>
                                                    1~2년
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="radio" value="" name="career_type[a][]" class="" id="" />&nbsp;
                                                    B(1-1)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    3~4년
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="radio" value="" name="career_type[a][]" class="" id="" />&nbsp;
                                                    B(1-2)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3
                                                </td>
                                                <td>
                                                    5~6년
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="radio" value="" name="career_type[a][]" class="" id="" />&nbsp;
                                                    B(1-3)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4
                                                </td>
                                                <td>
                                                    7~10년
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="radio" value="" name="career_type[a][]" class="" id="" />&nbsp;
                                                    B(1-4)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5
                                                </td>
                                                <td>
                                                    10년 이상
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="radio" value="" name="career_type[a][]" class="" id="" />&nbsp;
                                                    B(1-5)
                                                    </label>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    6
                                                </td>
                                                <td rowspan="5">
                                                    일반회사 근무 (중소, 중견기업)
                                                </td>
                                                <td>
                                                    1~2년
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="radio" value="" name="career_type[b][]" class="" id="" />&nbsp;
                                                    B(2-1)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    7
                                                </td>
                                                <td>
                                                    3~4년
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="radio" value="" name="career_type[b][]" class="" id="" />&nbsp;
                                                    B(2-2)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    8
                                                </td>
                                                <td>
                                                    5~6년
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="radio" value="" name="career_type[b][]" class="" id="" />&nbsp;
                                                    B(2-3)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    9
                                                </td>
                                                <td>
                                                    7~10년
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="radio" value="" name="career_type[b][]" class="" id="" />&nbsp;
                                                    B(2-4)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    10
                                                </td>
                                                <td>
                                                    10년 이상
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="radio" value="" name="career_type[b][]" class="" id="" />&nbsp;
                                                    B(2-5)
                                                    </label>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    11
                                                </td>
                                                <td rowspan="5">
                                                    일반회사 근무 (대기업)
                                                </td>
                                                <td>
                                                    1~2년
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="radio" value="" name="career_type[c][]" class="" id="" />&nbsp;
                                                    B(3-1)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    12
                                                </td>
                                                <td>
                                                    3~4년
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="radio" value="" name="career_type[c][]" class="" id="" />&nbsp;
                                                    B(3-2)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    13
                                                </td>
                                                <td>
                                                    5~6년
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="radio" value="" name="career_type[c][]" class="" id="" />&nbsp;
                                                    B(3-3)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    14
                                                </td>
                                                <td>
                                                    7~10년
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="radio" value="" name="career_type[c][]" class="" id="" />&nbsp;
                                                    B(3-4)
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    15
                                                </td>
                                                <td>
                                                    10년 이상
                                                </td>
                                                <td>
                                                    <label>
                                                    <input type="radio" value="" name="career_type[c][]" class="" id="" />&nbsp;
                                                    B(3-5)
                                                    </label>
                                                </td>
                                            </tr>
                                        </tbod>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="activity" class="resume_section" data-order_item="activity" data-except="y" style="display: none;">
                    <div class="area_title">
                        <h3 class="title">대외활동</h3>

{*                        <div class="area_import_btn">*}
{*                            <button type="button" class="btn" data-api_type="layer" data-api_id="item_import" data-item="activity">기본 정보 불러오기</button>*}
{*                        </div>*}
                    </div>

                    <div class="resume_write resume_write_add">

                        <div id="tpl_row_1600236585" class="tpl_row" data-tpl_id="tpl_activity_item">
                            <input type="hidden" id="activity_start_year_1600236585" name="activity_start_year[]" value="">
                            <input type="hidden" id="activity_start_month_1600236585" name="activity_start_month[]" value="">
                            <input type="hidden" id="activity_start_day_1600236585" name="activity_start_day[]" value="">
                            <input type="hidden" id="activity_end_year_1600236585" name="activity_end_year[]" value="">
                            <input type="hidden" id="activity_end_month_1600236585" name="activity_end_month[]" value="">
                            <input type="hidden" id="activity_end_day_1600236585" name="activity_end_day[]" value="">

                            <input type="hidden" id="profileactivity_seq_1600236585" name="profileactivity_seq[]" value="">

                            <div class="resume_row">
                                <div class="input_title">활동구분</div>
                                <div class="sri_select resume_select">
                                    <label for="activity_cd_1600236585" class="bar_title">활동구분<span class="valid_hidden"> 선택</span></label>
                                    <button type="button" class="ico_arr selected">활동구분 선택</button>
                                    <input type="hidden" id="activity_cd_1600236585" name="activity_cd[]" value="">
                                    <ul class="list_opt">
                                        <li class="on"><a class="link_opt" href="##" data-value="">활동구분 선택</a></li><li class=""><a class="link_opt" href="##" data-value="1">교내활동</a></li><li class=""><a class="link_opt" href="##" data-value="2">인턴</a></li><li class=""><a class="link_opt" href="##" data-value="3">자원봉사</a></li><li class=""><a class="link_opt" href="##" data-value="4">동아리</a></li><li class=""><a class="link_opt" href="##" data-value="5">아르바이트</a></li><li class=""><a class="link_opt" href="##" data-value="6">사회활동</a></li><li class=""><a class="link_opt" href="##" data-value="7">수행과제</a></li><li class=""><a class="link_opt" href="##" data-value="abroad">해외연수</a></li><li class=""><a class="link_opt" href="##" data-value="education">교육이수내역</a></li>            </ul>
                                    <p class="txt_error"></p>
                                </div>
                            </div>

                            <div class="resume_row" style="display:none;">
                                <div class="input_title">국가</div>
                                <div class="sri_select resume_select">
                                    <label for="nation_cd_1600236585" class="bar_title">국가<span class="valid_hidden"> 선택</span></label>
                                    <button type="button" class="ico_arr selected">국가 선택</button>
                                    <input type="hidden" id="nation_cd_1600236585" name="nation_cd[]" value="">
                                    <ul class="list_opt">
                                        <li class="on"><a class="link_opt" href="##" data-value="">국가 선택</a></li><li class=""><a class="link_opt" href="##" data-value="479">가나</a></li><li class=""><a class="link_opt" href="##" data-value="480">가봉</a></li><li class=""><a class="link_opt" href="##" data-value="7531">가이아나</a></li><li class=""><a class="link_opt" href="##" data-value="7594">감비아</a></li><li class=""><a class="link_opt" href="##" data-value="7532">과델루프</a></li><li class=""><a class="link_opt" href="##" data-value="437">과테말라</a></li><li class=""><a class="link_opt" href="##" data-value="472">괌</a></li><li class=""><a class="link_opt" href="##" data-value="7555">그라나다</a></li><li class=""><a class="link_opt" href="##" data-value="7496">그루지아</a></li><li class=""><a class="link_opt" href="##" data-value="451">그리스</a></li><li class=""><a class="link_opt" href="##" data-value="7525">그린란드</a></li><li class=""><a class="link_opt" href="##" data-value="7595">기니</a></li><li class=""><a class="link_opt" href="##" data-value="7596">기니비소우</a></li><li class=""><a class="link_opt" href="##" data-value="7533">기아나(프랑스령)</a></li><li class=""><a class="link_opt" href="##" data-value="7597">나미비아</a></li><li class=""><a class="link_opt" href="##" data-value="21875">나우루공화국</a></li><li class=""><a class="link_opt" href="##" data-value="481">나이지리아</a></li><li class=""><a class="link_opt" href="##" data-value="449">남미기타</a></li><li class=""><a class="link_opt" href="##" data-value="482">남아프리카공화국</a></li><li class=""><a class="link_opt" href="##" data-value="452">네덜란드</a></li><li class=""><a class="link_opt" href="##" data-value="21863">네덜란드령 안틸레스제도</a></li><li class=""><a class="link_opt" href="##" data-value="7497">네팔</a></li><li class=""><a class="link_opt" href="##" data-value="453">노르웨이</a></li><li class=""><a class="link_opt" href="##" data-value="473">뉴질랜드</a></li><li class=""><a class="link_opt" href="##" data-value="7584">뉴칼레도니아섬</a></li><li class=""><a class="link_opt" href="##" data-value="7598">니제르</a></li><li class=""><a class="link_opt" href="##" data-value="7534">니카라과</a></li><li class=""><a class="link_opt" href="##" data-value="279">대만</a></li><li class=""><a class="link_opt" href="##" data-value="454">덴마크</a></li><li class=""><a class="link_opt" href="##" data-value="7526">도미니카공화국</a></li><li class=""><a class="link_opt" href="##" data-value="7535">도미니카연방</a></li><li class=""><a class="link_opt" href="##" data-value="455">독일</a></li><li class=""><a class="link_opt" href="##" data-value="7523">동티모르</a></li><li class=""><a class="link_opt" href="##" data-value="7499">라오스</a></li><li class=""><a class="link_opt" href="##" data-value="7599">라이베리아</a></li><li class=""><a class="link_opt" href="##" data-value="7556">라트비아</a></li><li class=""><a class="link_opt" href="##" data-value="456">러시아</a></li><li class=""><a class="link_opt" href="##" data-value="7601">레뉴니용</a></li><li class=""><a class="link_opt" href="##" data-value="7500">레바논</a></li><li class=""><a class="link_opt" href="##" data-value="7557">루마니아</a></li><li class=""><a class="link_opt" href="##" data-value="7558">룩셈부르크</a></li><li class=""><a class="link_opt" href="##" data-value="7600">르완다</a></li><li class=""><a class="link_opt" href="##" data-value="483">리비아</a></li><li class=""><a class="link_opt" href="##" data-value="7559">리투아니아</a></li><li class=""><a class="link_opt" href="##" data-value="21868">리히텐슈타인</a></li><li class=""><a class="link_opt" href="##" data-value="7602">마다가스카르</a></li><li class=""><a class="link_opt" href="##" data-value="7536">마르티니크섬</a></li><li class=""><a class="link_opt" href="##" data-value="7585">마샬군도</a></li><li class=""><a class="link_opt" href="##" data-value="7560">마케도니아</a></li><li class=""><a class="link_opt" href="##" data-value="7603">말라위</a></li><li class=""><a class="link_opt" href="##" data-value="280">말레이시아</a></li><li class=""><a class="link_opt" href="##" data-value="7604">말리</a></li><li class=""><a class="link_opt" href="##" data-value="375">멕시코</a></li><li class=""><a class="link_opt" href="##" data-value="7561">모나코</a></li><li class=""><a class="link_opt" href="##" data-value="484">모로코</a></li><li class=""><a class="link_opt" href="##" data-value="21878">모리셔스</a></li><li class=""><a class="link_opt" href="##" data-value="7605">모리타니아</a></li><li class=""><a class="link_opt" href="##" data-value="7606">모잠비크</a></li><li class=""><a class="link_opt" href="##" data-value="21866">몬테네그로</a></li><li class=""><a class="link_opt" href="##" data-value="21867">몰도바</a></li><li class=""><a class="link_opt" href="##" data-value="7502">몰디브</a></li><li class=""><a class="link_opt" href="##" data-value="7562">몰타</a></li><li class=""><a class="link_opt" href="##" data-value="281">몽골</a></li><li class=""><a class="link_opt" href="##" data-value="7563">몽트세라</a></li><li class=""><a class="link_opt" href="##" data-value="376">미국</a></li><li class=""><a class="link_opt" href="##" data-value="282">미얀마</a></li><li class=""><a class="link_opt" href="##" data-value="21873">미크로네시아</a></li><li class=""><a class="link_opt" href="##" data-value="7586">바누아투</a></li><li class=""><a class="link_opt" href="##" data-value="7503">바레인</a></li><li class=""><a class="link_opt" href="##" data-value="7527">바베이도스</a></li><li class=""><a class="link_opt" href="##" data-value="21865">바티칸시국</a></li><li class=""><a class="link_opt" href="##" data-value="7528">바하마</a></li><li class=""><a class="link_opt" href="##" data-value="283">방글라데시</a></li><li class=""><a class="link_opt" href="##" data-value="7529">버뮤다</a></li><li class=""><a class="link_opt" href="##" data-value="7538">버진제도</a></li><li class=""><a class="link_opt" href="##" data-value="7607">베냉</a></li><li class=""><a class="link_opt" href="##" data-value="438">베네수엘라</a></li><li class=""><a class="link_opt" href="##" data-value="284">베트남</a></li><li class=""><a class="link_opt" href="##" data-value="457">벨기에</a></li><li class=""><a class="link_opt" href="##" data-value="7564">벨로루시</a></li><li class=""><a class="link_opt" href="##" data-value="7539">벨리즈</a></li><li class=""><a class="link_opt" href="##" data-value="7565">보스니아헤르체고비나</a></li><li class=""><a class="link_opt" href="##" data-value="7608">보츠와나</a></li><li class=""><a class="link_opt" href="##" data-value="7540">볼리비아</a></li><li class=""><a class="link_opt" href="##" data-value="7609">부룬디</a></li><li class=""><a class="link_opt" href="##" data-value="7610">부르키나파소</a></li><li class=""><a class="link_opt" href="##" data-value="7505">부탄</a></li><li class=""><a class="link_opt" href="##" data-value="435">북·중미기타</a></li><li class=""><a class="link_opt" href="##" data-value="21874">북마리아나군도</a></li><li class=""><a class="link_opt" href="##" data-value="7506">북한</a></li><li class=""><a class="link_opt" href="##" data-value="7566">불가리아</a></li><li class=""><a class="link_opt" href="##" data-value="439">브라질</a></li><li class=""><a class="link_opt" href="##" data-value="7507">브루나이</a></li><li class=""><a class="link_opt" href="##" data-value="7587">사모아</a></li><li class=""><a class="link_opt" href="##" data-value="285">사우디아라비아</a></li><li class=""><a class="link_opt" href="##" data-value="21510">사이판</a></li><li class=""><a class="link_opt" href="##" data-value="21864">산마리노</a></li><li class=""><a class="link_opt" href="##" data-value="21877">상투메프린시페</a></li><li class=""><a class="link_opt" href="##" data-value="7611">세네갈</a></li><li class=""><a class="link_opt" href="##" data-value="7612">세이셀제도</a></li><li class=""><a class="link_opt" href="##" data-value="7541">세인트루시아</a></li><li class=""><a class="link_opt" href="##" data-value="7542">세인트빈센트그레나딘즈</a></li><li class=""><a class="link_opt" href="##" data-value="21862">세인트키츠네비스</a></li><li class=""><a class="link_opt" href="##" data-value="7530">세인트피에르미그온</a></li><li class=""><a class="link_opt" href="##" data-value="7613">세인트헬레나섬</a></li><li class=""><a class="link_opt" href="##" data-value="7614">소말리아</a></li><li class=""><a class="link_opt" href="##" data-value="21872">솔로몬제도</a></li><li class=""><a class="link_opt" href="##" data-value="485">수단</a></li><li class=""><a class="link_opt" href="##" data-value="7543">수리남</a></li><li class=""><a class="link_opt" href="##" data-value="286">스리랑카</a></li><li class=""><a class="link_opt" href="##" data-value="7615">스와질랜드</a></li><li class=""><a class="link_opt" href="##" data-value="458">스웨덴</a></li><li class=""><a class="link_opt" href="##" data-value="459">스위스</a></li><li class=""><a class="link_opt" href="##" data-value="460">스페인</a></li><li class=""><a class="link_opt" href="##" data-value="7568">슬로바키아</a></li><li class=""><a class="link_opt" href="##" data-value="7567">슬로베니아</a></li><li class=""><a class="link_opt" href="##" data-value="7508">시리아</a></li><li class=""><a class="link_opt" href="##" data-value="7616">시에라리온</a></li><li class=""><a class="link_opt" href="##" data-value="7578">신유고연방</a></li><li class=""><a class="link_opt" href="##" data-value="287">싱가포르</a></li><li class=""><a class="link_opt" href="##" data-value="7509">아랍에미레이트연합국</a></li><li class=""><a class="link_opt" href="##" data-value="7569">아루바</a></li><li class=""><a class="link_opt" href="##" data-value="7570">아르메니아</a></li><li class=""><a class="link_opt" href="##" data-value="440">아르헨티나</a></li><li class=""><a class="link_opt" href="##" data-value="373">아시아·중동기타</a></li><li class=""><a class="link_opt" href="##" data-value="7571">아이슬란드</a></li><li class=""><a class="link_opt" href="##" data-value="7544">아이티</a></li><li class=""><a class="link_opt" href="##" data-value="7572">아일랜드</a></li><li class=""><a class="link_opt" href="##" data-value="7573">아제르바이잔</a></li><li class=""><a class="link_opt" href="##" data-value="7510">아프가니스탄</a></li><li class=""><a class="link_opt" href="##" data-value="493">아프리카기타</a></li><li class=""><a class="link_opt" href="##" data-value="7545">안길라</a></li><li class=""><a class="link_opt" href="##" data-value="7574">알바니아</a></li><li class=""><a class="link_opt" href="##" data-value="7618">알제리</a></li><li class=""><a class="link_opt" href="##" data-value="7619">앙골라</a></li><li class=""><a class="link_opt" href="##" data-value="21876">에리트레아</a></li><li class=""><a class="link_opt" href="##" data-value="7575">에스토니아</a></li><li class=""><a class="link_opt" href="##" data-value="441">에콰도르</a></li><li class=""><a class="link_opt" href="##" data-value="487">에티오피아</a></li><li class=""><a class="link_opt" href="##" data-value="7546">엔티가바부다</a></li><li class=""><a class="link_opt" href="##" data-value="7547">엘살바도르</a></li><li class=""><a class="link_opt" href="##" data-value="461">영국</a></li><li class=""><a class="link_opt" href="##" data-value="7511">영국령 인도양식민지</a></li><li class=""><a class="link_opt" href="##" data-value="7512">예멘</a></li><li class=""><a class="link_opt" href="##" data-value="7513">오만</a></li><li class=""><a class="link_opt" href="##" data-value="477">오세아니아기타</a></li><li class=""><a class="link_opt" href="##" data-value="7576">오스트리아</a></li><li class=""><a class="link_opt" href="##" data-value="442">온두라스</a></li><li class=""><a class="link_opt" href="##" data-value="7514">요르단</a></li><li class=""><a class="link_opt" href="##" data-value="488">우간다</a></li><li class=""><a class="link_opt" href="##" data-value="443">우루과이</a></li><li class=""><a class="link_opt" href="##" data-value="7515">우즈베키스탄</a></li><li class=""><a class="link_opt" href="##" data-value="7577">우크라이나</a></li><li class=""><a class="link_opt" href="##" data-value="470">유럽기타</a></li><li class=""><a class="link_opt" href="##" data-value="7516">이라크</a></li><li class=""><a class="link_opt" href="##" data-value="7517">이란</a></li><li class=""><a class="link_opt" href="##" data-value="7579">이스라엘</a></li><li class=""><a class="link_opt" href="##" data-value="489">이집트</a></li><li class=""><a class="link_opt" href="##" data-value="462">이탈리아</a></li><li class=""><a class="link_opt" href="##" data-value="288">인도</a></li><li class=""><a class="link_opt" href="##" data-value="289">인도네시아</a></li><li class=""><a class="link_opt" href="##" data-value="290">일본</a></li><li class=""><a class="link_opt" href="##" data-value="7620">자마이카</a></li><li class=""><a class="link_opt" href="##" data-value="7621">자이르</a></li><li class=""><a class="link_opt" href="##" data-value="7622">잠비아</a></li><li class=""><a class="link_opt" href="##" data-value="7623">적도기니</a></li><li class=""><a class="link_opt" href="##" data-value="340">중국.홍콩</a></li><li class=""><a class="link_opt" href="##" data-value="7624">중앙아프리카공화국</a></li><li class=""><a class="link_opt" href="##" data-value="7625">지부티</a></li><li class=""><a class="link_opt" href="##" data-value="7580">지브롤터</a></li><li class=""><a class="link_opt" href="##" data-value="7626">짐바브웨</a></li><li class=""><a class="link_opt" href="##" data-value="7627">차드</a></li><li class=""><a class="link_opt" href="##" data-value="463">체코</a></li><li class=""><a class="link_opt" href="##" data-value="444">칠레</a></li><li class=""><a class="link_opt" href="##" data-value="7628">카메룬</a></li><li class=""><a class="link_opt" href="##" data-value="21881">카보베르데</a></li><li class=""><a class="link_opt" href="##" data-value="7518">카자흐스탄</a></li><li class=""><a class="link_opt" href="##" data-value="7519">카타르</a></li><li class=""><a class="link_opt" href="##" data-value="370">캄보디아</a></li><li class=""><a class="link_opt" href="##" data-value="434">캐나다</a></li><li class=""><a class="link_opt" href="##" data-value="490">케냐</a></li><li class=""><a class="link_opt" href="##" data-value="7548">케이만제도</a></li><li class=""><a class="link_opt" href="##" data-value="7629">케이프버드</a></li><li class=""><a class="link_opt" href="##" data-value="21880">코모로</a></li><li class=""><a class="link_opt" href="##" data-value="7549">코스타리카</a></li><li class=""><a class="link_opt" href="##" data-value="7617">코트디브아르</a></li><li class=""><a class="link_opt" href="##" data-value="445">콜롬비아</a></li><li class=""><a class="link_opt" href="##" data-value="7630">콩고</a></li><li class=""><a class="link_opt" href="##" data-value="21879">콩고민주공화국</a></li><li class=""><a class="link_opt" href="##" data-value="446">쿠바</a></li><li class=""><a class="link_opt" href="##" data-value="7520">쿠웨이트</a></li><li class=""><a class="link_opt" href="##" data-value="7588">쿠크 군도</a></li><li class=""><a class="link_opt" href="##" data-value="7581">크로아티아</a></li><li class=""><a class="link_opt" href="##" data-value="21861">키르기즈스탄</a></li><li class=""><a class="link_opt" href="##" data-value="7589">키리바시</a></li><li class=""><a class="link_opt" href="##" data-value="7582">키프로스</a></li><li class=""><a class="link_opt" href="##" data-value="7521">타지키스탄</a></li><li class=""><a class="link_opt" href="##" data-value="491">탄자니아</a></li><li class=""><a class="link_opt" href="##" data-value="371">태국</a></li><li class=""><a class="link_opt" href="##" data-value="7550">터크스앤카이코스제도</a></li><li class=""><a class="link_opt" href="##" data-value="464">터키</a></li><li class=""><a class="link_opt" href="##" data-value="7631">토고</a></li><li class=""><a class="link_opt" href="##" data-value="21871">토켈라우제도</a></li><li class=""><a class="link_opt" href="##" data-value="7590">통가</a></li><li class=""><a class="link_opt" href="##" data-value="7522">투르크메니스탄</a></li><li class=""><a class="link_opt" href="##" data-value="7591">투발루</a></li><li class=""><a class="link_opt" href="##" data-value="492">튀니지</a></li><li class=""><a class="link_opt" href="##" data-value="7551">트리니나드토바고</a></li><li class=""><a class="link_opt" href="##" data-value="447">파나마</a></li><li class=""><a class="link_opt" href="##" data-value="7552">파라과이</a></li><li class=""><a class="link_opt" href="##" data-value="7524">파키스탄</a></li><li class=""><a class="link_opt" href="##" data-value="474">파푸아뉴기니</a></li><li class=""><a class="link_opt" href="##" data-value="21869">팔라우</a></li><li class=""><a class="link_opt" href="##" data-value="7583">페로제도</a></li><li class=""><a class="link_opt" href="##" data-value="448">페루</a></li><li class=""><a class="link_opt" href="##" data-value="465">포르투갈</a></li><li class=""><a class="link_opt" href="##" data-value="7553">포클랜드제도</a></li><li class=""><a class="link_opt" href="##" data-value="466">폴란드</a></li><li class=""><a class="link_opt" href="##" data-value="7593">폴리네시아제도</a></li><li class=""><a class="link_opt" href="##" data-value="7554">푸에르토리코</a></li><li class=""><a class="link_opt" href="##" data-value="467">프랑스</a></li><li class=""><a class="link_opt" href="##" data-value="475">피지</a></li><li class=""><a class="link_opt" href="##" data-value="468">핀란드</a></li><li class=""><a class="link_opt" href="##" data-value="372">필리핀</a></li><li class=""><a class="link_opt" href="##" data-value="21870">핏케언제도</a></li><li class=""><a class="link_opt" href="##" data-value="469">헝가리</a></li><li class=""><a class="link_opt" href="##" data-value="476">호주</a></li>            </ul>
                                    <p class="txt_error"></p>
                                </div>
                            </div>


                            <div class="resume_row">
                                <div class="input_title">기관/장소</div>
                                <div class="resume_input">
                                    <label for="activity_org_1600236585" class="bar_title">기관/장소<span class="valid_hidden"> 입력</span></label>
                                    <input type="text" id="activity_org_1600236585" name="activity_org[]" value="" maxlength="50" class="box_input">
                                    <p class="txt_error"></p>
                                </div>
                            </div>

                            <div class="resume_row">
                                <div class="input_title">활동기간</div>
                                <div class="area_period">
                                    <div class="sri_select resume_select focus">
                                        <label for="dateformat_1600236585" class="bar_title">입력 선택</label>
                                        <button type="button" class="ico_arr selected">월입력</button>
                                        <input type="hidden" id="dateformat_1600236585" name="dateformat[]" value="yymm">
                                        <ul class="list_opt">
                                            <li class="on"><a href="##" class="link_opt" data-value="yymm">월입력</a></li>
                                            <li class=""><a href="##" class="link_opt" data-value="yymmdd">일입력</a></li>
                                        </ul>
                                    </div>
                                    <div class="resume_input">
                                        <label for="activity_start_1600236585" class="bar_title">
                                            <span class="valid_hidden">YYYYMM</span>
                                            <span class="blind">활동기간(년월)</span>
                                        </label>
                                        <input type="text" id="activity_start_1600236585" name="activity_start[]" class="expect_date box_input" value="" maxlength="6" data-only-number="true" data-dateformat="yymm" autocomplete="off">
                                        
                                        <p class="txt_error"></p>
                                    </div>

                                    <span class="txt_period">~</span>

                                    <div class="resume_input">
                                        <label for="activity_end_1600236585" class="bar_title end_day">
                                            <span class="valid_hidden">YYYYMM</span>
                                            <span class="blind">활동기간(년월)</span>
                                        </label>
                                        <input type="text" id="activity_end_1600236585" name="activity_end[]" class="expect_date box_input" value="" maxlength="6" data-only-number="true" data-dateformat="yymm" autocomplete="off">
                                        <p class="txt_error"></p>
                                    </div>
                                    <p class="txt_error"></p>
                                </div>
                            </div>

                            <div class="resume_row">
                                <div class="input_title">활동내용</div>
                                <div class="resume_textarea">
                                    <label for="activity_contents_1600236585" class="bar_title">활동내용<span class="valid_hidden"> 입력</span></label>
                                    <textarea id="activity_contents_1600236585" name="activity_contents[]" class="box_textarea" style="height: 52px;"></textarea>
                                    <p class="txt_error"></p>
                                </div>
                            </div>
                            <div class="area_change_btn"></div></div><div class="area_add_btn">
                            <button type="button" class="btn_resume_add" data-tpl_id="tpl_activity_item"><span>대외활동 추가</span></button>
                        </div>


                    </div>
                </div>
                <div id="skill" class="resume_section" data-order_item="skill" data-except="y" style="display: block;">
                    <div class="area_title">
                        <h3 class="title">요구 기술 및 능력</h3>

{*                        <div class="area_import_btn">*}
{*                            <button type="button" class="btn" data-api_type="layer" data-api_id="item_import" data-item="skill">기본 정보 불러오기</button>*}
{*                        </div>*}
                    </div>

                    <div class="resume_write resume_write_add">
                        <div class="resume_skill">
                            <div class="resume_row">
                                <div class="input_title">요구기술</div>
                                <div class="area_skill">
                                    <div class="resume_input search_input">
                                        <label for="s_ability_gb" class="bar_title">요구기술 입력 <span class="valid_hidden">(ex. 문서작성능력, 비즈니스영어, 커뮤니케이션스킬, java 등)</span></label>
                                        <input type="text" id="s_ability_gb" class="box_input size_type5" maxlength="45" data-api_type="auto" data-api_id="skill" data-min_len="2" autocomplete="off">
                                        <button type="button" class="btn_reset" style="display:block"><span class="blind">삭제</span></button>
                                    </div>
                                    <div class="box_skill_suggest" style="display: none;">
                                        <p class="txt_suggest"></p>
                                        <ul class="list_suggest">
                                            <li><button type="button" class="btn_check on" disabled=""></button></li>
                                        </ul>
                                        <button type="button" class="link_text btn_skill_refresh">새로운 추천보유기술 보기</button>
                                    </div>
                                    <div class="area_task_input resume_input" style="display: none;">
                                        <ul class="list_task list_skill">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="personal" class="resume_section" data-order_item="personal" data-except="y" style="display: none;">
                    <input type="hidden" id="military_start_year" name="military_start_year" value="">
                    <input type="hidden" id="military_start_month" name="military_start_month" value="">
                    <input type="hidden" id="military_end_year" name="military_end_year" value="">
                    <input type="hidden" id="military_end_month" name="military_end_month" value="">

                    <div class="area_title">
                        <h3 class="title">취업 우대사항</h3>

{*                        <div class="area_import_btn">*}
{*                            <button type="button" class="btn" data-api_type="layer" data-api_id="item_import" data-item="personal">기본 정보 불러오기</button>*}
{*                        </div>*}
                    </div>

                    <div class="resume_write">
                        <div id="veterans">
                            <div class="resume_row">
                                <div class="input_title">보훈대상</div>
                                <div class="resume_bundle">
                                    <div class="sri_select resume_select focus">
                                        <label for="bohun_fl" class="bar_title">보훈대상<span class="valid_hidden"> 선택</span></label>
                                        <button type="button" class="ico_arr selected">비대상</button>
                                        <input type="hidden" name="bohun_fl" id="bohun_fl" value="n" data-required="true" data-item="personal">
                                        <ul class="list_opt">
                                            <li class="on"><a class="link_opt" href="##" data-value="n">비대상</a></li><li class=""><a class="link_opt" href="##" data-value="y">대상</a></li>                        </ul>
                                        <p class="txt_error"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="resume_row" style="display:none">
                                <div class="input_title">대상사유</div>
                                <div class="resume_input">
                                    <label for="bohun_contents" class="bar_title">대상사유<span class="valid_hidden"> 입력</span></label>
                                    <input type="text" id="bohun_contents" name="bohun_contents" value="" maxlength="22" class="box_input size_type5">
                                    <p class="txt_error"></p>
                                </div>
                            </div>
                        </div>

                        <div id="military" class="area_military">
                            <div class="resume_row">
                                <div class="input_title">병역대상</div>
                                <div class="sri_select resume_select">
                                    <button type="button" class="ico_arr selected">대상아님</button>
                                    <input type="hidden" name="military_cd" id="military_cd" value="">
                                    <ul class="list_opt">
                                        <li class="on"><a class="link_opt" href="##" data-value="">대상아님</a></li><li class=""><a class="link_opt" href="##" data-value="1">군필</a></li><li class=""><a class="link_opt" href="##" data-value="2">미필</a></li><li class=""><a class="link_opt" href="##" data-value="3">면제</a></li><li class=""><a class="link_opt" href="##" data-value="4">복무중</a></li>                    </ul>
                                    <p class="txt_error"></p>
                                </div>
                            </div>

                            <div class="resume_row" style="display:none">
                                <div class="input_title">복무기간</div>
                                <div class="military_bundle">
                                    <div class="area_period">
                                        <div class="resume_input">
                                            <label for="military_start_dt" class="bar_title"><span class="valid_hidden">YYYYMM</span><span class="blind">입대날짜</span></label>
                                            <input type="text" id="military_start_dt" name="military_start_dt" class="expect_date box_input" value="" maxlength="6" data-only-number="true" data-dateformat="yymm" autocomplete="off">
                                            <p class="txt_error"></p>
                                        </div>

                                        <span class="txt_period">~</span>

                                        <div class="resume_input">
                                            <label for="military_end_dt" class="bar_title end_day"><span class="valid_hidden">YYYYMM</span><span class="blind">제대날짜</span></label>
                                            <input type="text" id="military_end_dt" name="military_end_dt" class="expect_date box_input" value="" maxlength="6" data-only-number="true" data-dateformat="yymm" autocomplete="off">
                                            <p class="txt_error"></p>
                                        </div>
                                        <p class="txt_error"></p>
                                    </div>

                                    <div class="military_service">
                                        <div class="sri_select resume_select">
                                            <label for="military_kind_cd" class="bar_title">군별<span class="valid_hidden"> 선택</span></label>
                                            <button type="button" class="ico_arr selected size_type2">군별 선택</button>
                                            <input type="hidden" name="military_kind_cd" id="military_kind_cd" value="">
                                            <ul class="list_opt">
                                                <li class="on"><a class="link_opt" href="##" data-value="">군별<span class="valid_hidden"> 선택</span></a></li><li class=""><a class="link_opt" href="##" data-value="1">육군</a></li><li class=""><a class="link_opt" href="##" data-value="2">해군</a></li><li class=""><a class="link_opt" href="##" data-value="3">공군</a></li><li class=""><a class="link_opt" href="##" data-value="4">해병</a></li><li class=""><a class="link_opt" href="##" data-value="5">의경</a></li><li class=""><a class="link_opt" href="##" data-value="6">전경</a></li><li class=""><a class="link_opt" href="##" data-value="7">기타</a></li><li class=""><a class="link_opt" href="##" data-value="8">공익</a></li>                            </ul>
                                            <p class="txt_error"></p>
                                        </div>

                                        <div class="sri_select resume_select">
                                            <label for="military_class_cd" class="bar_title">계급<span class="valid_hidden"> 선택</span></label>
                                            <button type="button" class="ico_arr selected size_type2">계급 선택</button>
                                            <input type="hidden" name="military_class_cd" id="military_class_cd" value="">
                                            <ul class="list_opt">
                                                <li class="on"><a class="link_opt" href="##" data-value=""><span class="valid_hidden"> 선택</span></a></li><li class=""><a class="link_opt" href="##" data-value="1">이병</a></li><li class=""><a class="link_opt" href="##" data-value="2">일병</a></li><li class=""><a class="link_opt" href="##" data-value="3">상병</a></li><li class=""><a class="link_opt" href="##" data-value="4">병장</a></li><li class=""><a class="link_opt" href="##" data-value="5">하사</a></li><li class=""><a class="link_opt" href="##" data-value="6">중사</a></li><li class=""><a class="link_opt" href="##" data-value="7">상사</a></li><li class=""><a class="link_opt" href="##" data-value="8">원사</a></li><li class=""><a class="link_opt" href="##" data-value="9">준위</a></li><li class=""><a class="link_opt" href="##" data-value="10">소위</a></li><li class=""><a class="link_opt" href="##" data-value="11">중위</a></li><li class=""><a class="link_opt" href="##" data-value="12">대위</a></li><li class=""><a class="link_opt" href="##" data-value="13">소령</a></li><li class=""><a class="link_opt" href="##" data-value="14">중령</a></li><li class=""><a class="link_opt" href="##" data-value="15">대령</a></li><li class=""><a class="link_opt" href="##" data-value="16">준장</a></li><li class=""><a class="link_opt" href="##" data-value="17">소장</a></li><li class=""><a class="link_opt" href="##" data-value="18">중장</a></li><li class=""><a class="link_opt" href="##" data-value="19">대장</a></li><li class=""><a class="link_opt" href="##" data-value="20">기타</a></li>                            </ul>
                                            <p class="txt_error"></p>
                                        </div>

                                        <div class="sri_select resume_select">
                                            <label for="military_end_cd" class="bar_title">전역 사유<span class="valid_hidden"> 선택</span></label>
                                            <button type="button" class="ico_arr selected">전역 사유 선택</button>
                                            <input type="hidden" name="military_end_cd" id="military_end_cd" value="">
                                            <ul class="list_opt">
                                                <li class="on"><a class="link_opt" href="##" data-value="">전역 사유<span class="valid_hidden"> 선택</span></a></li><li class=""><a class="link_opt" href="##" data-value="1">만기제대</a></li><li class=""><a class="link_opt" href="##" data-value="2">의가사제대</a></li><li class=""><a class="link_opt" href="##" data-value="3">의병제대</a></li><li class=""><a class="link_opt" href="##" data-value="4">소집해제</a></li><li class=""><a class="link_opt" href="##" data-value="5">불명예제대</a></li><li class=""><a class="link_opt" href="##" data-value="6">상이제대</a></li><li class=""><a class="link_opt" href="##" data-value="7">기타</a></li>                            </ul>
                                        </div>
                                        <p class="txt_error"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="resume_row" style="display:none">
                                <div class="input_title">면제 사유</div>
                                <div class="resume_input">
                                    <label for="military_contents" class="bar_title">면제 사유<span class="valid_hidden"> 입력</span></label>
                                    <input type="text" id="military_contents" name="military_contents" class="box_input size_type5" value="" maxlength="100">
                                    <p class="txt_error"></p>
                                </div>
                            </div>
                        </div>


                        <div id="hire_support" class="area_hire_support">
                            <div class="resume_row">
                                <div class="input_title">고용지원금 대상</div>

                                <div class="sri_select resume_select focus">
                                    <label for="hire_support_fl" class="bar_title">고용지원금대상<span class="valid_hidden"> 선택</span></label>
                                    <button type="button" class="ico_arr selected">비대상</button>
                                    <input type="hidden" name="hire_support_fl" id="hire_support_fl" value="n">
                                    <ul class="list_opt">
                                        <li class="on"><a class="link_opt" href="##" data-value="n">비대상</a></li><li class=""><a class="link_opt" href="##" data-value="y">대상</a></li>                    </ul>
                                    <p class="txt_error"></p>
                                </div>
                                <a href="https://www.ei.go.kr/ei/eih/eg/eb/ebEntrprBnef/retrieveEb0401Info.do" target="_blank" class="link_converter">고용지원금 제도 보기 &gt;</a>



                                <div>
                                    <ul class="list_hire_support" style="display:none">
                                        <li>
                                            <label class="sri_check" for="hire_support1">
                                                <input type="checkbox" name="hire_support[]" value="hs1" id="hire_support1" class="inp_check">
                                                <span class="txt_check">고령자</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="sri_check" for="hire_support3">
                                                <input type="checkbox" name="hire_support[]" value="hs3" id="hire_support3" class="inp_check">
                                                <span class="txt_check">중증장애인</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="sri_check" for="hire_support4">
                                                <input type="checkbox" name="hire_support[]" value="hs4" id="hire_support4" class="inp_check">
                                                <input type="hidden" name="disabled_fl" id="disabled_fl" value="n">
                                                <span class="txt_check">장애인</span>
                                            </label>

                                            <div class="sri_select resume_select">
                                                <label for="disabled_cd" class="bar_title">장애등급<span class="valid_hidden"> 선택</span></label>
                                                <button type="button" class="ico_arr selected" disabled="">장애등급 선택</button>
                                                <input type="hidden" name="disabled_cd" id="disabled_cd" value="">
                                                <ul class="list_opt">
                                                    <li class="on"><a class="link_opt" href="##" data-value="">장애등급<span class="valid_hidden"> 선택</span></a></li><li class=""><a class="link_opt" href="##" data-value="11">경증</a></li><li class=""><a class="link_opt" href="##" data-value="12">중증</a></li><li class=""><a class="link_opt" href="##" data-value="1">장애1급</a></li><li class=""><a class="link_opt" href="##" data-value="2">장애2급</a></li><li class=""><a class="link_opt" href="##" data-value="3">장애3급</a></li><li class=""><a class="link_opt" href="##" data-value="4">장애4급</a></li><li class=""><a class="link_opt" href="##" data-value="5">장애5급</a></li><li class=""><a class="link_opt" href="##" data-value="6">장애6급</a></li><li class=""><a class="link_opt" href="##" data-value="7">장애7급</a></li><li class=""><a class="link_opt" href="##" data-value="8">장애8급</a></li><li class=""><a class="link_opt" href="##" data-value="9">장애9급</a></li><li class=""><a class="link_opt" href="##" data-value="10">장애10급</a></li>                                </ul>
                                                <p class="txt_error"></p>
                                            </div>
                                        </li>
                                        <li>
                                            <label class="sri_check" for="hire_support2">
                                                <input type="checkbox" name="hire_support[]" value="hs2" id="hire_support2" class="inp_check">
                                                <span class="txt_check">여성가장</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="sri_check" for="hire_support5">
                                                <input type="checkbox" name="hire_support[]" value="hs5" id="hire_support5" class="inp_check">
                                                <span class="txt_check">장기구직자</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="sri_check" for="hire_support6">
                                                <input type="checkbox" name="hire_support[]" value="hs6" id="hire_support6" class="inp_check">
                                                <span class="txt_check">청년취업대상자
	                                <div class="toolTipWrap">
			                            <button type="button" class="btn_guide"><span class="blind">청년취업대상자 설명</span></button>
			                            <div class="toolTip" style="display:none;margin-left:-90px;width:180px;">
		                                    <span class="tail tail_top_center"></span>
		                                    <div class="toolTipCont txtCenter">
		                                        <p class="txt">취업지원프로그램 이수</p>
		                                    </div>
		                                </div>
		                            </div>
                                </span>
                                            </label>
                                        </li>
                                        <li style="clear:both">
                                            <label class="sri_check" for="hire_support7">
                                                <input type="checkbox" name="hire_support[]" value="hs7" id="hire_support7" class="inp_check">
                                                <span class="txt_check">여성근로자
	                                <div class="toolTipWrap">
		                                <button type="button" class="btn_guide"><span class="blind">여성근로자 설명</span></button>
		                                <div class="toolTip" style="display:none;margin-left:-86px;width:172px">
			                                <span class="tail tail_top_center"></span>
			                                <div class="toolTipCont txtCenter">
		                                        <p class="txt">임신,출산,육아로 이직</p>
		                                    </div>
		                                </div>
	                                </div>
                                </span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="sri_check" for="hire_support8">
                                                <input type="checkbox" name="hire_support[]" value="hs8" id="hire_support8" class="inp_check">
                                                <span class="txt_check">농어업인
	                                <div class="toolTipWrap">
		                                <button type="button" class="btn_guide"><span class="blind">농어업인 설명</span></button>
		                                <div class="toolTip" style="display:none;margin-left:-120px;width:240px">
			                                <span class="tail tail_top_center"></span>
			                                <div class="toolTipCont txtCenter">
		                                        <p class="txt">폐업지원금 대상자 및 수령 경험자</p>
		                                    </div>
		                                </div>
	                                </div>
                                </span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><div id="attach_port_files" class="resume_section" data-order_item="attach_port_files" data-except="y" style="display: none;">
                    <div class="area_title">
                        <h3 class="title">포트폴리오 및 기타문서</h3>
                    </div>



                    <div class="resume_write">
                        <div class="resume_row" data-tpl_id="tpl_attach_files">
                            <p class="noti_portfolio">
                                직무와 연관되는 포트폴리오, 기획서, 자격증 사본 등을 업데이트 하세요<br>
                                입사 가능성이 더욱 높아집니다.
                            </p>
                        </div>
                        <div class="area_add_btn">
                            <button type="button" class="btn_resume_add" data-api_type="layer" data-api_id="attach_file"><span>포트폴리오 및 기타문서 추가</span></button>
                        </div>
                    </div>
                </div>
                <div id="introduce" data-order_item="introduce" data-except="y" style="display: block;">
                    <input type="hidden" id="intro_template" name="intro_template" value="standard">

                    <div class="resume_section" id="introduce_write">
                        <div class="area_title">
                            <h3 class="title">기업소개 및 세부사항</h3>

{*                            <p class="txt_noti">각 항목명은 변경할 수 있으며(최대 100자), 항목은 총 10개까지 작성 가능합니다.</p>*}

{*                            <div class="area_import_btn">*}
{*                                <button type="button" class="btn" data-api_type="layer" data-api_id="introduce_contents_items">자기소개서 항목 예시</button>*}
{*                                <button type="button" class="btn" data-api_type="layer" data-api_id="item_import" data-item="introduce">기본 정보 불러오기</button>*}
{*                                <!--                <button type="button" class="btn" data-api_type="layer" data-api_id="introduce_import">기본 정보 불러오기</button>-->*}
{*                            </div>*}
                        </div>

                        <!--        <div class="resume_write area_self_title">-->
                        <!--            <div class="area_btn_self">-->
                        <!--                <button type="button" class="btn_self" data-api_type="layer" data-api_id="introduce_import"><strong>내 자소서 불러오기</strong></button>-->
                        <!--                <button type="button" class="btn_self" data-api_type="layer" data-api_id="introduce_save"><strong>자소서 관리에 저장하기</strong></button>-->
                        <!--                <button type="button" class="btn_self" data-api_type="layer" data-api_id="introduce_contents_items">자기소개서 항목 예시</button>-->
                        <!--                <p class="txt_noti">각 항목명은 변경할 수 있으며(최대 100자), 항목은 총 10개까지 작성 가능합니다.</p>-->
                        <!--            </div>-->
                        <!--        </div>-->

                        <div class="intro_item_wrap">
                            <div class="write_area">
                                <div id="introduce_items" class="inner_wrap">

                                    <div id="tpl_row_1600236587" class="tpl_row intro_item on" data-tpl_id="tpl_introduce_item">

                                        <div class="item_txt">
                                            <div class="textarea_wrap">
                                                <label for="intro_contents_1600236587" class="txt">추가사항 입력</label>
                                                <textarea id="intro_contents_1600236587" name="intro_contents[]" class="textarea_type1" rows="1" cols="100" data-char-count="true" style="height: 240px;"></textarea>

                                            </div>

                                            <div class="spellcheck" style="display:none;">
                                                <div class="item_spellcheck">
                                                    <p class="info_txt">
                                                        <span class="title"><strong class="point">0개</strong>의 오타가 있습니다.</span><br>
                                                        <span class="point">붉은색 단어</span>를 클릭하시면 수정하실 수 있습니다.
                                                    </p>
                                                    <div class="btn_wrap">

                                                        <div class="btn_spellall_change_wrap">
                                                            <button type="button" class="btn_type4 btn_spellall_change">
                                                                맞춤법 일괄 수정
                                                            </button>
                                                            <a class="btn_tip" href="#none">
                                                                <div class="toolTip">
                                                                    <span class="tail tail_bottom_center"></span>
                                                                    <div class="toolTipCont">
                                                                        <p class="tip_txt">클릭 시 모두 첫 번째 대체어로 수정됩니다.</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <button type="button" class="btn_type4 btn_spellchek_layer" data-api_type="layer" data-api_id="introduce_spell_details">검사 결과 상세보기</button>
                                                    </div>
                                                </div>

                                                <div class="txt" style="white-space:pre-wrap"></div>

                                            </div>
                                        </div>

                                        <div class="item_edit">
                                            <div class="txt_length">
                                                <strong class="title_length">글자수 </strong>
                                                <span class="txt_byte">(공백포함) <strong class="input-char">0</strong> 자 / <strong class="input-byte">0</strong> byte</span>
                                                <i class="bar">|</i>
                                                <span class="txt_byte">(공백제외) <strong class="input-char">0</strong> 자 / <strong class="input-byte">0</strong> byte</span>
                                            </div>
{*                                            <div class="btn_wrap">*}
{*                                                <button type="button" class="btn_type4 btn_spelling_check">맞춤법검사</button>*}

{*                                                <button type="button" class="btn_type4 btn_spellcheck_done" style="display:none;">맞춤법 검사완료</button>*}
{*                                                <button type="button" class="btn_type4 btn_spellcheck_cancel" style="display:none;">취소</button>*}
{*                                            </div>*}
                                        </div>
                                    </div>


                                    <div class="txt_total_length">
                                        <div class="txt_length">
                                            <strong class="title_length">총 글자수</strong>
                                            <span class="txt_byte"><strong class="input-char point">0</strong> 자 / <strong class="input-byte">0</strong> byte</span>
                                        </div>
{*                                    </div><div class="area_add_btn">*}
{*                                        <button type="button" class="btn_resume_add" data-tpl_id="tpl_introduce_item">자기소개서 항목 추가</button>*}
{*                                    </div></div>*}
                            </div>
                        </div>
                    </div>


                    <div class="area_btn_order blind">
                        입력하신 자기소개서 항목의 순서를 변경하실 수 있습니다.
                        <button type="button" class="btn_order" data-api_type="layer" data-api_id="change_order">자소서 항목 순서 변경</button>
                    </div>

                </div><div id="svq" class="resume_section" data-order_item="svq" data-except="y" style="display: none;">
                    <div class="area_title">
                        <h3 class="title">사람인 인∙적성 검사</h3>
                    </div>

                    <div class="resume_write resume_svq">
                        <div class="resume_row">
                            <p class="noti_portfolio">
                                <b>응시 완료한</b> 사람인 인・적성 검사 결과를 <b>각 1개씩 첨부</b>할 수 있습니다.<br>
                                사람인 인성검사, 적성검사는 최초 응시일로부터 1년간 최대 4회 응시 할 수 있으며 검사 완료 30일 후 재응시가 가능합니다.<br>
                                선택한 인·적성검사 결과는 입사지원 시 이력서에 첨부되어 제출됩니다.
                            </p>
                        </div>

                        <div class="area_title svqTitle">
                            <h4 class="title">인성검사</h4>
                            <button type="button" data-exam_id="88" data-exam_type="svq" class="btn_retake apply">무료 인성검사 응시하기</button></div>

                        <div class="resume_row svqList">
                            <div class="box_svq">
                                <p class="txt_no">응시 완료된 인성검사가 없습니다.</p>
                                <button type="button" data-exam_id="88" data-exam_type="svq" class="btn_svq apply">
                                    무료 인성검사 응시하기
                                </button>
                            </div>
                        </div><div class="area_title aptitudeTitle">
                            <h4 class="title">적성검사</h4>
                            <button type="button" data-exam_id="101" data-exam_type="aptitude" class="btn_retake apply">무료 적성검사 응시하기</button></div>

                        <div class="resume_row aptitudeList">
                            <div class="box_svq">
                                <p class="txt_no">응시 완료된 적성검사가 없습니다.</p>
                                <button type="button" data-exam_id="101" data-exam_type="aptitude" class="btn_svq apply">
                                    무료 적성검사 응시하기
                                </button>
                            </div>
                        </div>    </div>
                </div>
                <div id="desire_work" class="resume_section" style="display:none;">
                    <div class="area_title title_recommend">
                        <h3 class="title">희망 근무조건 선택</h3>
                    </div>


                    <div class="resume_write">
                        <input type="hidden" name="apply_dept" id="apply_dept" value="">
                        <input type="hidden" name="applycareer_gb" id="applycareer_gb" value="">
                        <input type="hidden" name="possible_work_day" id="possible_work_day" value=",,">

                        <div>
                            <div class="resume_row">
                                <div class="input_title">근무형태  <span class="point">필수</span><span class="s_txt">최대 3개</span></div>
                                <div class="option option_area">
                                    <div id="desire_apply_work_stat" class="area_task_input resume_input">
                                        <input type="hidden" id="apply_work_stat" name="apply_work_stat" value="">
                                        <label for="apply_work_stat" class="bar_title">근무형태<span class="valid_hidden"> (최대 3개)</span></label>
                                        <div>
                                            <ul class="list_task list_hope_local size_type5"></ul>
                                        </div>
                                        <button type="button" data-api_type="layer" data-api_id="desire_apply_work_stat" data-dim="n" data-position="unused" class="link_modifie">수정 · 추가하기 &gt;</button>
                                        <p class="txt_error"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="resume_row" style="display: none;">
                                <div class="input_title">근무 가능 날짜</div>
                                <div class="area_period">
                                    <div class="resume_input">
                                        <label for="possible_work_day_start" class="bar_title"><span class="valid_hidden">YYYYMMDD</span><span class="blind">근무 시작 날짜</span></label>
                                        <input type="text" id="possible_work_day_start" name="possible_work_day_start" class="expect_date box_input" value="" data-only-number="true" data-dateformat="yymmdd" autocomplete="off">
                                        <p class="txt_error"></p>
                                    </div>
                                    <span class="txt_period">~</span>
                                    <div class="resume_input">
                                        <label for="possible_work_day_end" class="bar_title end_day"><span class="valid_hidden">YYYYMMDD</span><span class="blind">근무 종료 날짜</span></label>
                                        <input type="text" id="possible_work_day_end" name="possible_work_day_end" class="expect_date box_input" value="" data-only-number="true" data-dateformat="yymmdd" autocomplete="off">
                                        <p class="txt_error"></p>
                                    </div>
                                    <div class="area_check">
                                        <label for="possible_work_day_immediate" class="sri_check">
                                            <input type="checkbox" id="possible_work_day_immediate" name="possible_work_day_immediate" class="inp_check" value="y">
                                            <span class="txt_check">즉시 근무 가능</span>
                                        </label>
                                    </div>
                                    <p class="txt_error"></p>
                                </div>
                            </div>


                            <div class="resume_row">
                                <div class="input_title">연봉 <span class="point">필수</span></div>
                                <div class="sri_select resume_select focus">
                                    <label for="hope_salary_cd" class="bar_title">연봉<span class="valid_hidden"> 선택</span></label>
                                    <button type="button" class="ico_arr selected">회사내규에 따름</button>
                                    <input type="hidden" id="hope_salary_cd" name="hope_salary_cd" value="0">
                                    <ul class="list_opt">
                                        <li class="on"><a href="##" class="link_opt" data-value="0">회사내규에 따름</a></li><li class=""><a href="##" class="link_opt" data-value="3">1,400 만원 이하</a></li><li class=""><a href="##" class="link_opt" data-value="4">1,400~1,600만원</a></li><li class=""><a href="##" class="link_opt" data-value="5">1,600~1,800만원</a></li><li class=""><a href="##" class="link_opt" data-value="6">1,800~2,000만원</a></li><li class=""><a href="##" class="link_opt" data-value="7">2,000~2,200만원</a></li><li class=""><a href="##" class="link_opt" data-value="8">2,200~2,400만원</a></li><li class=""><a href="##" class="link_opt" data-value="9">2,400~2,600만원</a></li><li class=""><a href="##" class="link_opt" data-value="10">2,600~2,800만원</a></li><li class=""><a href="##" class="link_opt" data-value="11">2,800~3,000만원</a></li><li class=""><a href="##" class="link_opt" data-value="12">3,000~3,200만원</a></li><li class=""><a href="##" class="link_opt" data-value="13">3,200~3,400만원</a></li><li class=""><a href="##" class="link_opt" data-value="14">3,400~3,600만원</a></li><li class=""><a href="##" class="link_opt" data-value="15">3,600~3,800만원</a></li><li class=""><a href="##" class="link_opt" data-value="16">3,800~4,000만원</a></li><li class=""><a href="##" class="link_opt" data-value="17">4,000~5,000만원</a></li><li class=""><a href="##" class="link_opt" data-value="18">5,000~6,000만원</a></li><li class=""><a href="##" class="link_opt" data-value="19">6,000~7,000만원</a></li><li class=""><a href="##" class="link_opt" data-value="20">7,000~8,000만원</a></li><li class=""><a href="##" class="link_opt" data-value="21">8,000~9,000만원</a></li><li class=""><a href="##" class="link_opt" data-value="22">9,000~1억원</a></li><li class=""><a href="##" class="link_opt" data-value="23">1억원 이상</a></li><li class=""><a href="##" class="link_opt" data-value="99">면접 후 결정</a></li>                    </ul>
                                    <p class="txt_error"></p>
                                </div>
                            </div>

                            <div class="resume_row">
                                <div class="input_title">근무 지역 <span class="point">필수</span><span class="s_txt">최대 3개</span></div>

                                <div class="option option_area">
                                    <div id="desire_area" class="area_task_input resume_input">
                                        <input type="hidden" id="work_area1_1" name="work_area1_1" value="">
                                        <input type="hidden" id="work_area1_2" name="work_area1_2" value="">
                                        <input type="hidden" id="work_area1_3" name="work_area1_3" value="">
                                        <input type="hidden" id="work_area2_1" name="work_area2_1" value="">
                                        <input type="hidden" id="work_area2_2" name="work_area2_2" value="">
                                        <input type="hidden" id="work_area2_3" name="work_area2_3" value="">
                                        <input type="hidden" id="work_area3_1" name="work_area3_1" value="">
                                        <input type="hidden" id="work_area3_2" name="work_area3_2" value="">
                                        <input type="hidden" id="work_area3_3" name="work_area3_3" value="">
                                        <label for="work_area1_1" class="bar_title">근무지역<span class="valid_hidden"> (최대 3개)</span></label>

                                        <div>
                                            <ul class="list_task list_hope_local size_type5"></ul>
                                        </div>
                                        <button type="button" data-api_type="layer" data-api_id="desire_area" data-dim="n" data-position="unused" class="link_modifie">수정 · 추가하기 &gt;</button>
                                        <p class="txt_error"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="resume_row">
                                <div class="input_title">직종 <span class="point">필수</span><span class="s_txt">최대 5개</span></div>

                                <div class="option option_area">
                                    <div id="desire_job_category" class="area_task_input resume_input">
                                        <input type="hidden" id="job_category_code" name="job_category_code" value="">
                                        <input type="hidden" id="job_category_keyword" name="job_category_keyword" value="">

                                        <label for="job_category_code" class="bar_title">직종<span class="valid_hidden"> (최대 5개)</span></label>

                                        <div>
                                            <ul class="list_task list_hope_jobs size_type5"></ul>
                                        </div>

                                        <button type="button" id="jobs" name="jobs" data-api_type="layer" data-api_id="desire_job_category" data-dim="n" data-position="unused" class="link_modifie">수정 · 추가하기 &gt;</button>
                                        <p class="txt_error"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="resume_row">
                                <div class="input_title">업종 <span class="point">필수</span><span class="s_txt">최대 1개</span></div>

                                <div class="option option_area">
                                    <div id="desire_industry" class="area_task_input resume_input">
                                        <input type="hidden" id="industry_code" name="industry_code" value="">
                                        <input type="hidden" id="industry_keyword" name="industry_keyword" value="">

                                        <label for="industry_code" class="bar_title">업종<span class="valid_hidden"> (최대 1개)</span></label>

                                        <div>
                                            <ul class="list_task size_type5"></ul>
                                        </div>

                                        <button type="button" id="industry" name="industry" data-api_type="layer" data-api_id="desire_industry" data-dim="n" data-position="unused" class="link_modifie">수정 · 추가하기 &gt;</button>
                                        <p class="txt_error"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="main_desire_work" class="resume_section" style="display: none">
                    <div class="area_title">
                        <h3 class="title">희망 조건 대표 선택</h3>
                    </div>

                    <div class="resume_write">
                        <div class="resume_row">
                            <div class="input_title">관심 근무지역 <span class="point">필수</span></div>

                            <div class="sri_select resume_select" id="main_hope_area_select">
                                <label for="main_area_code" class="bar_title">관심 근무지역<span class="valid_hidden"> 선택</span></label>
                                <button type="button" class="ico_arr selected">관심 근무지역 선택</button>
                                <input type="hidden" name="main_area_code" id="main_area_code" value="">
                                <ul class="list_opt"></ul>
                                <p class="txt_error"></p>
                            </div>
                        </div>

                        <div class="resume_row">
                            <div class="input_title">관심 직종 <span class="point">필수</span></div>

                            <div class="sri_select resume_select" id="main_hope_job_select">
                                <label for="main_job_category_code" class="bar_title">관심 직종<span class="valid_hidden"> 선택</span></label>
                                <button type="button" class="ico_arr selected">관심 직종 선택</button>
                                <input type="hidden" name="main_job_category_code" value="">
                                <ul class="list_opt"></ul>
                                <p class="txt_error"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="talent" class="resume_section" style="display:none;">
                    <div class="area_title">
                        <h3 class="blind">이력서 상태 설정</h3>
                    </div>

                    <div class="resume_write">
                        <div class="area_stitle">
                            <h4 class="title">기업 인사담당자로부터 연락을 받고 싶으신가요?</h4>
                        </div>

                        <div class="resume_row">
                            <div class="resume_open_set">
                                <div class="resume_status_actions">
                                    <dl class="notice">
                                        <dt class="txt_point">현직장 또는 특정 기업이 내 이력서를 열람하는게 부담스러우신가요?</dt>
                                        <dd>열람제한 기업 및 업종 등록을하면 내 이력서를 열람할 수 없습니다.</dd>
                                    </dl>
                                    <div class="wrap_btn">
                                        <button type="button" class="sri_btn_md" data-api_type="layer" data-api_id="block_industry" data-dim="n"><span>열람제한 업종 등록</span></button>
                                        <button type="button" class="sri_btn_md" data-api_type="layer" data-api_id="block_company" data-dim="y"><span>열람제한 기업 등록</span></button>
                                    </div>
                                </div>

                                <div class="area_open_check open_step">
                                    <h4 class="blind">이력서 공개 설정</h4>
                                    <div class="area_check focus">
                                        <label class="sri_check sri_radio" for="talent_open_fl_recomnd">
                                            <input type="radio" id="talent_open_fl_recomnd" name="talent_open_fl" class="inp_check" value="recomnd">
                                            <span class="txt_check">수락한 기업에게만 연락처 공개</span>
                                            <div class="txt_noti">
                                                <p>
                                                    회원님의 개인정보(이름/사진/연락처 등)를 제외한 이력서 본문만 기업에게 추천됩니다.<br>
                                                    기업이 연락처 공개 요청시, 수락한 기업에게만 개인정보가 공개됩니다.
                                                </p>
                                            </div>
                                        </label>
                                        <label class="sri_check sri_radio" for="talent_open_fl_n">
                                            <input type="radio" id="talent_open_fl_n" name="talent_open_fl" class="inp_check" value="n">
                                            <span class="txt_check">이력서 비공개</span>
                                            <div class="txt_noti">
                                                <p>
                                                    이력서 및 연락처가 모두 비공개 됩니다.<br>
                                                    내가 먼저 검토요청을 보내거나, 입사지원한 경우에만 인사담당자가 이력서를 열람할 수 있습니다.
                                                </p>
                                                <span class="inpChk">
                                    <input type="checkbox" id="talent_pool_recom_mail" name="talent_pool_recom_mail" value="y" checked="">
                                        <label class="lbl" for="talent_pool_recom_mail"><strong>좋은 제의 알림은 받아볼게요.</strong> (인재 Pool 직무 추천 메일 수신 동의)</label>
                                </span>
                                            </div>
                                        </label>
                                        <label class="sri_check sri_radio" for="talent_open_fl_y">
                                            <input type="radio" id="talent_open_fl_y" name="talent_open_fl" class="inp_check" value="y">
                                            <span class="txt_check">연락처 바로 공개</span>
                                            <div class="txt_noti">
                                                <p>
                                                    인재검색에서 기업회원이 회원님의 연락처를 포함한 이력서 전체를 바로 볼 수 있습니다.<br>
                                                    단, 인재Pool 서비스를 이용하는 기업의 경우 연락처 공개를 먼저 요청드립니다.<br>
                                                    (※인재검색 서비스는 연내 종료 예정입니다.)
                                                </p>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <input type="checkbox" id="recomnd_status" name="recomnd_status" class="inp_check" value="y" style="display:none">
                                <input type="checkbox" id="open_fl" name="open_fl" class="inp_check" value="y" style="display:none">

                                <div class="open_step_check contact_config" style="display:none">
                                    <div class="area_open_check">
                                        <h4 class="s_title">공개 범위 설정</h4>
                                        <div class="area_check">
                                            <label class="sri_check sri_radio" for="allow_company_codes_0">
                                                <input type="radio" id="allow_company_codes_0" name="allow_company_codes" class="inp_check" value="0" disabled="">
                                                <span class="txt_check">모든기업</span>
                                            </label>
                                            <label class="sri_check sri_radio" for="allow_company_codes_10">
                                                <input type="radio" id="allow_company_codes_10" name="allow_company_codes" class="inp_check" value="10" disabled="">
                                                <span class="txt_check">헤드헌터에게만</span>
                                            </label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="contact_open_progress" id="contact_open_progress" value="">
                                    <div class="area_open_check space contact_config" style="display:none">
                                        <h4 class="s_title">공개 연락처 설정</h4>
                                        <p class="txt_contact">
                                            <strong>인사담당자가 연락하길 바라는 연락처는 모두 공개해주세요.</strong><br>
                                            최대한 많은 방법을 노출할 수록 인사담당자가 더 빠르게 연락 가능합니다.
                                        </p>
                                        <ul class="area_check">
                                            <li>
                                                <label class="sri_check " for="cell_open_fl_conv">
                                                    <input type="checkbox" name="cell_open_fl_conv" value="y" id="cell_open_fl_conv" class="inp_check open_flag" data-migrate-target="cell_open_fl">
                                                    <input type="checkbox" name="cell_open_fl" value="n" id="cell_open_fl" checked="" style="display:none">
                                                    <span class="txt_check">휴대폰</span>
                                                </label>
                                                <strong class="contect_info">
                                                    <span id="talent_cell">휴대폰 번호 인증 후 공개하세요</span><span id="talent_cell_msg" style="display:"></span>
                                                    <span id="talent_cell_confirm_icon" class="certify">미인증</span>
                                                </strong>
                                                <input type="hidden" id="cell_confirm_yn" name="cell_confirm_yn" value="n">
                                            </li>
                                            <li id="cell_privacy_row" style="display: none">
                                                <label class="sri_check " for="cell_privacy">
                                                    <input type="checkbox" name="cell_privacy" value="y" id="cell_privacy" class="inp_check cell_privacy" disabled="">
                                                    <span class="txt_check">안심번호로 휴대폰 번호 공개하기</span>
                                                </label>
                                                <div class="toolTipWrap">
                                                    <button type="button" class="btn_guide"><span class="blind">안심번호로 휴대폰 번호 공개하기</span></button>
                                                    <div class="toolTip">
                                                        <span class="tail tail_top_center"></span>
                                                        <div class="toolTipCont txtLeft">
                                                            <p class="txt">
                                                                회원님의 휴대폰 번호에 가상의 전화번호를 부여하는<br>
                                                                방식으로 안심번호 서비스를 이용하시면, 휴대폰 번호<br>
                                                                를 노출하지 않고도 통화가 가능합니다.
                                                            </p>
                                                            <p class="txt">
                                                                이력서를 삭제, 비공개 또는 6개월 이상 미수정 시 안심<br>
                                                                번호 사용 설정은 해제됩니다.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="sri_check " for="tel_open_fl_conv">
                                                    <input type="checkbox" id="tel_open_fl_conv" name="tel_open_fl_conv" value="y" class="inp_check open_flag" data-migrate-target="tel_open_fl">
                                                    <input type="checkbox" id="tel_open_fl" name="tel_open_fl" value="n" checked="" style="display:none">
                                                    <span class="txt_check">전화번호</span>
                                                </label>
                                                <strong class="contect_info" id="talent_tel">
                                                    <span id="talent_cell">전화번호 입력 후 공개하세요</span>
                                                </strong>
                                            </li>
                                            <li>
                                                <label class="sri_check " for="email_open_fl_conv">
                                                    <input type="checkbox" name="email_open_fl_conv" id="email_open_fl_conv" value="y" class="inp_check open_flag" data-migrate-target="email_open_fl">
                                                    <input type="checkbox" name="email_open_fl" id="email_open_fl" value="n" checked="" style="display:none">
                                                    <span class="txt_check">이메일</span>
                                                </label>
                                                <strong class="contect_info">
                                                    <span id="talent_email">이메일 주소 인증 후 공개하세요</span>
                                                    <span id="talent_email_confirm_icon" class="certify">미인증</span>
                                                </strong>
                                                <input type="hidden" id="email_confirm_yn" name="email_confirm_yn" value="n">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="resume_row">
                            <ul class="resume_open_noti">
                                <li>- 공개한 이력서는 직접 비공개 하기 전까지 기업 인사담당자가 열람할 수 있습니다.</li>
                                <li>- 재직중인 직장 또는 특정 기업이 내 이력서를 열람하는 것이 꺼려진다면 열람제한 설정을 하실 수 있습니다.</li>
                                <li>- 개인정보 도용 방지를 위해 휴대폰 및 이메일은 인증 완료 후 공개 가능합니다.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="area_btn">
                    <button type="button" class="btn_big_type btn_big_type2 btn_save" onmousedown="try{dataLayer.push({'event': 'ga_lead','category': 'resume_PC','event-flow': 'resume_edit','event-label': 'btn_save'});}catch(e){};">구인 등록</button>
                    <button type="button" class="btn_big_type btn_preview" onmousedown="try{dataLayer.push({'event': 'ga_lead','category': 'resume_PC','event-flow': 'resume_edit','event-label': 'btn_preview'});}catch(e){};">취소</button>
                </div>
            </form>

        </div>
        <!-- //contStart -->

    </div>
    <!-- //subContent -->

</div>
<!-- //Container -->

<script type="text/javascript" src="{ TYPE_URL }/taxjob/assets/js/taxjob.js" ></script>

{ #footer }
