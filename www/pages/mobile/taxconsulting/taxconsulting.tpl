{ #header }

<!-- Wrap -->
<div class="wrap">

    { #subtop }

    <!-- subContainer -->
    <div class="subContainer tax_tcs">

        { ? STEP == '1' }
        <div class="telTit pt30">
            <div class="tit01">신고의뢰 신청하기</div>
            <div class="tit02">신고의뢰 세목과 해당 세목의 세무사를 선택하여 주세요.</div>
        </div>

        <div class="colBox3">

            <ul class="option category">
                { @GOODS['category'] }
                <li class="cate_idno_li cate_idno_{ .idno } { ? TCS_CATEGORY_NAME == .category_name }on{ / }" data-idno="{ .idno }" data-name="{ .category_name }">
                    { ? .category_name == '양도소득세' }
                    <a href="/m/420">
                    { : .category_name == '증여세' }
                    <a href="/m/421">
                    { : .category_name == '상속세' }
                    <a href="/m/422">
                    { : .category_name == '부가가치세' }
                    <a href="/m/423">
                    { : .category_name == '소득세' }
                    <a href="/m/424">
                    { : .category_name == '법인세' }
                    <a href="/m/425">
                    { / }
                        <button>{ .category_name }</button>
                    </a>
                </li>
                { / }
            </ul>
        </div>

        <form id="frm_tax1" name="frm_tax1" method="post" >
            <input type="hidden" name="step" value="2" />
            <input type="hidden" name="etc01" value="{ REQ.etc01 }" />
            <input type="hidden" name="mngr_idno" value="{ REQ.mngr_idno }" />
            <input type="hidden" name="mngr_tel" value="{ REQ.mngr_tel }" />
            <input type="hidden" name="mngr_phone" value="{ REQ.mngr_phone }" />
            <input type="hidden" name="mngr_file_name" value="{ REQ.mngr_file_name }" />
            <input type="hidden" name="mngr_mail" value="{ REQ.mngr_mail }" />
            <input type="hidden" name="mngr_fax" value="{ REQ.mngr_fax }" />
            <input type="hidden" name="cate_idno" value="{ CATE_DEFAULT_IDNO }" />
            <input type="hidden" name="mngr_name" value="" class="req" title="상담을 원하시는 세무사를 선택해주세요." />
            <div class="teslList2 consulting">
                <ul class="consulting_list">
                    { @MNGR }
                    <li class="consulting_1li">
                        <div class="topInfo">
                            <div class="selView">
                                <div class="img">
                                    <img src="{ MNGR_PHOTO_URL }{ .file_name }" alt="{ .mngr_name }">
                                </div>
                                <div class="txt">
                                    <div class="tit01">{ .mngr_name }</div>
                                    <div class="tit02">“{ .info1 }”</div>
                                </div>
                                <!--<div class="viewBtn open">
                                    <img src="{ TYPE_URL }/images/consulting/open_view.png" alt="세무사정보 보기" />
                                </div>-->
                            </div>
                            <div class="btn">
                                <input type="hidden" class="mngr_tel" value="{ .tel }" data-name="{ .tel }" />
                                <input type="hidden" class="mngr_phone" value="{ .phone }" data-name="{ .phone }" />
                                <input type="hidden" class="mngr_mail" value="{ .email }" data-name="{ .email }" />
                                <input type="hidden" class="mngr_fax" value="{ .fax }" data-name="{ .fax }" />
                            </div>
                        </div>
                        <div class="itemInfo">
                            <input type="hidden" class="mngr_category_txt" value="{ TCS_CATEGORY_NAME }"/>
                            <input type="hidden" class="mngr_idno" value="{ .idno }"/>
                            <div class="consulting_btn">
                                { ? THIS_DAY_BREAKDAY == true }
                                <p class="alarm_txt tac pb10">
                                    상담은 평일에 가능합니다
                                </p>
                                { / }
                                <ul>
                                    <li>
                                        <div class="txt">
                                            <a class="{ ? THIS_DAY_BREAKDAY == true }{ : }counselGo { / }consultingBtn"
                                               href="{ ? THIS_DAY_BREAKDAY == true }javascript:alert('평일에 이용가능합니다');{ : }#goTalkPop{ / }">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <tag><b>상담예약</b></tag>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="txt">
                                            <a class="counselGoFiling consultingBtn act_submit">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                                <tag><b>신고의뢰</b></tag>
                                            </a>
                                        </div>
                                    </li>
                                    {*                                        <li>*}
                                    {*                                            <div class="txt">*}
                                    {*                                                <a class="counselGoVisit consultingBtn act_submit">*}
                                    {*                                                    <i class="fa fa-user" aria-hidden="true"></i>*}
                                    {*                                                    <tag><b>방문상담</b></tag>*}
                                    {*                                                </a>*}
                                    {*                                            </div>*}
                                    {*                                        </li>*}
                                    <li>
                                        <div class="txt">
                                            { ? .cs_zoom_use == 'on' && .cs_zoom_use != '' }
                                            <a class="counselGoZoom consultingBtn" href="{ .cs_zoom_url }" target="_blank">
                                                <img style="margin:0 auto;display:block; max-width:1.5rem;" src="{ TYPE_URL }/images/ico/zoom_icon.png"/>
                                                <tag><b>화상상담</b></tag>
                                            </a>
                                            { : }
                                            <a class="counselGoZoom consultingBtn" href="https://us05web.zoom.us/j/5100025847?pwd=QXNKeDBseENiMG4vR1lPSGQveVdiZz09" target="_blank">
                                                <img style="margin:0 auto;display:block; max-width:1.5rem;" src="{ TYPE_URL }/images/ico/zoom_icon.png"/>
                                                <tag><b>화상상담</b></tag>
                                            </a>
                                            { / }
                                        </div>
                                    </li>
                                </ul>

                            </div>
                            <p class="tac mt10">
                                상담예약 : 예약후 1시간내 전화 연결
                            </p>
                        </div>

                        { ? THIS_DAY_NUM == '2' || THIS_DAY_NUM == '7' }
                        <p class="alarm_txt tac pb10">
                            상담은 평일에 가능합니다
                        </p>
                        { / }

                        { ? .cs_zoom_use == 'on' && .cs_zoom_use != '' }
                        <div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
                            <strong style="color:#235ba6">ZOOM 화상통화</strong><br>
                            ZOOM ID : { .cs_zoom_id }<br>
                            연결 비밀번호 : { .cs_zoom_pw }
                        </div>
                        { : }
                        <div class="mb_ver" style="margin:0 0.5rem; padding:0.5rem 1.0rem; clear: both; line-height:1.6; background:#e1e1e1; border-radius:0.5rem;">
                            <strong style="color:#235ba6">ZOOM 화상통화</strong><br>
                            ZOOM ID : 510 002 5847<br>
                            연결 비밀번호 : selim
                        </div>
                        { / }

                        <div class="viewInfo">
                            <div class="in">
                                <ul>
                                    { ? .email != '' }
                                    <li>
                                        <div class="tit no4">이메일</div>
                                        <div class="text">
												<span style="text-decoration: underline; text-decoration-color: #0269bf;">
												<a href="mailto:{ .email }" style="color: #0269bf">{ .email }</a>
                                        </div>
                                    </li>
                                    { / }
                                    { ? .tel != '' }
                                    <li>
                                        <div class="tit no1">전화번호</div>
                                        <div class="text">
												<span style="text-decoration: underline; text-decoration-color: #0269bf;">
												<a href="tel:{ .tel }" >{ .tel }</a>
                                        </div>
                                    </li>
                                    { / }
                                    { ? .fax != '' }
                                    <li>
                                        <div class="tit no5">FAX</div>
                                        <div class="text">
                                            { .fax }
                                        </div>
                                    </li>
                                    { / }
                                    { ? .info3 != '' }
                                    <li>
                                        <div class="tit no1">세무기수</div>
                                        <div class="text">
                                            <ul>
                                                { @.info3_arr }
                                                <li>- { ..value_ }</li>
                                                { / }
                                            </ul>
                                        </div>
                                    </li>
                                    { / }
                                    { ? .info4 != '' }
                                    <li>
                                        <div class="tit no3">경력</div>
                                        <div class="text">
                                            <ul>
                                                { @.info4_arr }
                                                <li>- { ..value_ }</li>
                                                { / }
                                            </ul>
                                        </div>
                                    </li>
                                    { / }
                                    { ? .info5 != '' || .info6 != '' || .info7 != '' }
                                    <li>
                                        <div class="tit no3">연구자료</div>
                                        <div class="text">
                                            <ul>
                                                { ? .info5 != '' }
                                                { @.info5_arr }
                                                <li>- { ..value_ }</li>
                                                { / }
                                                { / }
                                                { ? .info6 != '' }
                                                { @.info6_arr }
                                                <li>- { ..value_ }</li>
                                                { / }
                                                { / }
                                                { ? .info7 != '' }
                                                { @.info7_arr }
                                                <li>- { ..value_ }</li>
                                                { / }
                                                { / }
                                            </ul>
                                        </div>
                                    </li>
                                    { / }
                                </ul>
                            </div>
                        </div>

                    </li>
                    { / }
                </ul>
            </div>
            <!-- <div class="btnCenter btn01"><a href="#" class="act_submit">다음</a></div> -->
        </form>
        <div id="goTalkPop" class="goTalkPop goPop">
            <h1>전화상담 예약 정보확인</h1>
            <form id="frm_counsel_talk" name="frm_counsel_talk" method="post" >
                <input type="hidden" name="tax_nick" value="세림세무법인" />
                <input type="hidden" name="manager" value="{ REQ.mngr_name }" />
                <input type="hidden" name="manager_phone" value="{ REQ.mngr_phone }" />
                <input type="hidden" name="category" value="{ TCS_CATEGORY_NO }" />
                <input type="hidden" name="category_name" value="{ TCS_CATEGORY_NAME }" />
                <input type="hidden" id="loginChk" value="chk"/>
                <input type="hidden" name="goods_name" value="전화상담" />
                <div class="gtp-wrap">
                    <p><strong>상담사</strong><span class="manager_name"></span></p>
                    <div class="cs_category_wrap">
                        <ul class="category_li">
                            <li>
                                { TCS_CATEGORY_NAME }
                            </li>
                        </ul>
                    </div>
                    <p><strong>신청자명</strong><span><input type="text" class="req" name="name" value="{ USERINFO['user_name'] }" maxlength="20" title="신청자명을 입력해주세요."/></span></p>
                    <p><strong>내 핸드폰</strong><span><input type="text" class="req" name="u_phone" value="{ USERINFO['user_phone'] }" maxlength="20" title="휴대폰을 입력해주세요." /></span></p>
                </div>
                <div class="gtp-btn-wrap">
                    <button class="gtp-btn talk-btn phone-btn mb_ver"><a href="tel:{ REQ.mngr_phone }">바로전화</a></button>
                    <button class="gtp-btn talk-btn"><a>상담예약</a></button>
                    <button class="gtp-btn cancel-btn"><a>취소</a></button>
                </div>
            </form>
        </div>

        <div class="loader_back">
            <div class="loader_box">
                <div class="loader_dot">
                    &nbsp;
                </div>
            </div>
        </div>
        { / }
        { ? STEP == '2' }
        { ? REQ.etc01 == "신고의뢰" }
        <div class="telTit pt30">
            <div class="tit01">신고의뢰</div>
            <div class="tit02">상담세무사 : { REQ.mngr_name }<br><br>
                <tag class="white">신고의뢰</tag><tag>{ TCS_CATEGORY_NAME }</tag>
            </div>
        </div>
        <div id="contents" class="show-off tcs_con tcs_contents1"></div>
        <div id="contents1" class="show-off tcs_con tcs_contents2"></div>
        <div id="contents2" class="show-off tcs_con tax_tcs">
            <form id="frm_counsel" name="frm_tax_pay" method="post" >
                <input type="hidden" name="act" value="counsel_save" />
                <input type="hidden" name="step" value="3" />
                <input type="hidden" name="status" value="0" />
                <input type="hidden" name="pay_status" value="1" />
                <input type="hidden" name="goods_idno" value="6" />
                <input type="hidden" name="tax_nick" value="세림세무법인" />
                <input type="hidden" name="goods_name" value="신고의뢰" />
                <input type="hidden" name="category" value="{ CATE_DEFAULT_IDNO }" />
                <input type="hidden" name="category_name" value="{ TCS_CATEGORY_NAME }" />
                <input type="hidden" name="etc01" value="{ REQ.etc01 }" />
                <input type="hidden" name="mngr_idno" value="{ REQ.mngr_idno }" />
                <input type="hidden" name="manager" value="{ REQ.mngr_name }" />
                <input type="hidden" name="mngr_name" value="{ REQ.mngr_name }" />
                <input type="hidden" name="mngr_phone" value="{ REQ.mngr_phone }" />
                <input type="hidden" name="mngr_mail" value="{ REQ.mngr_mail }" />
                <input type="hidden" name="mngr_fax" value="{ REQ.mngr_fax }" />
                <input type="hidden" name="option_idno" value="{ REQ.option }" />
                <input type="hidden" name="option_name" value="{ REQ.option_name }" />
                <input type="hidden" name="subject" value="{ REQ.subject }" />
                <input type="hidden" name="contents" value="{ =nl2br(REQ.contents) }" />
                <input type="hidden" id="loginChk" value="chk"/>
                <div class="telSca mailList">
                    <div class="userInfoZone">
                        <p class="infoTitle">
                            <strong>·신청자 정보</strong>
                        </p>
                        <p>
                            <span class="infoTt">이름</span>
                            <span><input type="text" class="req" name="user_name" value="{ USERINFO['user_name'] }" maxlength="25" title="이름을 입력해주세요." /></span>
                        </p>
                        <p>
                            <span class="infoTt">이메일</span>
                            <span><input type="text" class="req" name="email" value="{ USERINFO['user_email'] }" maxlength="100" title="이메일을 입력해주세요." /></span>
                        </p>
                        <p>
                            <span class="infoTt">휴대폰</span>
                            <span><input type="text" class="req" name="phone" value="{ USERINFO['user_phone'] }" maxlength="20" title="휴대폰을 입력해주세요." /></span>
                        </p>

                        <p class="infoTitle mt20">
                            <strong>·전송할 자료 리스트</strong>
                        </p>
                        { ? CHECKLIST.size_ > 0 }
                        <ul class="tableLsit">
                            { @ CHECKLIST }
                            <li>
                                <p>
                                    <input type="checkbox" id="list{ .index_ }" name="checklist{ .index_ }" value="{ .value_ }" class="checklist" title="전송할 자료 리스트를 모두 확인해주세요!" >
                                    <label for="list{ .index_ }">{ .value_ }</label>
                                </p>
                            </li>
                            { / }
                        </ul>
                        { / }

                        <div class="infoTitle mt20">
                            <strong>·서류 상담방법</strong>&nbsp;
                            <div class="howSelect">
                                <input type="radio" id="mail" name="method" value="email" checked="checked" />
                                <label id="mail_label" for="mail">
                                    <span>메일</span>&nbsp;
                                </label>
                                <input type="radio" id="fax" name="method" value="fax" />
                                <label id="fax_label" for="fax">
                                    <span>팩스</span>&nbsp;
                                </label>
                            </div>
                        </div>

                        <div class="selectZone">
                            <div class="mailSelect slz on">
                                <div class="tit no4">이메일</div>
                                <div class="text">
                                <span>
                                    { REQ.mngr_mail }
                                </span>
                                </div>
                            </div>
                            <div class="faxSelect slz">
                                <div class="tit no5">팩스</div>
                                <div class="text">
                                <span>
                                    { REQ.mngr_fax }
                                </span>
                                </div>
                            </div>
                        </div>
                        <!--추가 테이블-->

                    </div>
                    <div class="line text">
                        <div class="textZone">
                            <textarea class="req" name="contents" placeholder="문의하실 내용을 간략히 작성해 주시면 상담에 도움이 됩니다." title="문의하실 내용을 입력해주세요."></textarea>
                        </div>
                    </div>
                    <div class="whiteBox2 mb10 personalWrap">
                        <div class="top">
                            <div class="tit">개인정보 수집 및 이용에 대한 안내</div>
                            <!-- <a href="#" class="btnDetail">[개인정보취급방침 전문보기]</a> -->
                        </div>
                        <div class="textScroll">
                            { AGREE_TEXT }
                        </div>
                        <input type="checkbox" id="personalAgree" class="agreeY" title="개인정보 수집 및 이용에 동의" /> <label for="personalAgree">개인정보 수집 및 이용에 동의합니다.</label>
                    </div>
                    <br>
                    <div class="btnCenter btn01"><a href="#" class="act_submit">상담 신청하기</a></div>
                </div>
            </form>
        </div>
        <div class="btnCenter btn01 tax_tcs" style="display:none"><a href="#" class="act_submit">다음</a></div>

        { : }
        <div class="telTit pt30 seCst">
            <div class="tit01">상담 일정 선택하기</div>
            <div class="tit02">원하는 날짜, 시간에 상담을 받으실 수 있습니다.</div>
        </div>

        <form id="frm_tax1" name="frm_tax1" method="post" >

            <input type="hidden" name="step" value="3" />
            <input type="hidden" name="category" value="{ TCS_CATEGORY_NO }" />
            <input type="hidden" name="category_name" value="{ TCS_CATEGORY_NAME }" />
            <input type="hidden" name="etc01" value="{ REQ.etc01 }" />
            <input type="hidden" name="mngr_idno" value="{ REQ.mngr_idno }" id="mngr_idno" />
            <input type="hidden" name="manager" value="{ REQ.mngr_name }" />
            <input type="hidden" name="mngr_name" value="{ REQ.mngr_name }" />
            <input type="hidden" name="option" value="{ REQ.option }" />
            <input type="hidden" name="option_name" value="{ REQ.option_name }" />
            <input type="hidden" name="mngr_phone" value="{ REQ.mngr_phone }" />
            <input type="hidden" class="mngr_phone" data-name="{ REQ.mngr_phone }" />
            <input type="hidden" class="visit_code" value="visit" />
            <div class="telSca">

                <div class="line dtBox seCst">
                    <label>
                        <img src="{ TYPE_URL }/images/consulting/bgTaxer.png"/>&nbsp;&nbsp;상담세무사 : { REQ.mngr_name }
                    </label>
                    <label>
                        <img src="{ TYPE_URL }/images/consulting/bgSort.png"/>&nbsp;&nbsp;신고의뢰 : { REQ.category_name }
                    </label>
                </div>

                <div class="line ipBox seCst">
                    <label for="seCst_date_field">
                        <img src="{ TYPE_URL }/images/consulting/bgTax13.png"/>&nbsp;&nbsp;예약날짜 선택
                    </label>
                    <span class="dateButton">
                     <input id="seCst_date_field" type="text" class="orderdate req" placeholder="예약날짜 선택하기" title="예약날짜를 선택해주세요." name="app_day" readonly="readonly" />
                     <div class="seCstBg"></div>
                 </span>
                </div>

                <div class="line telSel seCst">
                    <label for="app_time">
                        <img src="{ TYPE_URL }/images/consulting/bgTimer.png"/>&nbsp;&nbsp;예약시간 선택
                    </label>
                    <div id="select_box">
                        <span>예약시간 선택하기</span>
                        <label>예약시간 선택하기</label>
                        <select id="app_time" name="app_time" class="m_select req ordertime seCst" title="예약시간을 선택해주세요.">
                        </select>
                    </div>
                </div>
                <div class="line text">
                    <div class="textZone">
                        <textarea class="req" name="contents" placeholder="문의하실 내용을 간략히 작성해 주시면 상담에 도움이 됩니다." title="문의하실 내용을 입력해주세요."></textarea>
                    </div>
                </div>

                <div class="btnCenter btn01"><a href="#" class="act_submit">상담신청하기</a></div>

            </div>
        </form>
        { / }
        { / }
        { ? STEP == '3' }

        <form id="frm_counsel" name="frm_tax_pay" method="post" >
            <input type="hidden" name="act" value="counsel_save" />
            <input type="hidden" name="status" value="0" />
            <input type="hidden" name="step" value="4" />
            <input type="hidden" name="pay_status" value="1" />
            <input type="hidden" name="goods_idno" value="7" />
            <input type="hidden" name="goods_name" value="신고의뢰" />
            <input type="hidden" name="tax_nick" value="세림세무법인" />
            <input type="hidden" name="category" value="{ TCS_CATEGORY_NO }" />
            <input type="hidden" name="category_name" value="{ TCS_CATEGORY_NAME }" />
            <input type="hidden" name="etc01" value="방문상담" />
            <input type="hidden" name="mngr_idno" value="{ REQ.mngr_idno }" />
            <input type="hidden" name="manager" value="{ REQ.mngr_name }" />
            <input type="hidden" name="mngr_name" value="{ REQ.mngr_name }" />
            <input type="hidden" name="mngr_phone" value="{ REQ.mngr_phone }" />
            <input type="hidden" name="option_idno" value="{ REQ.option }" />
            <input type="hidden" name="option_name" value="{ REQ.option_name }" />
            <input type="hidden" name="app_minutes" value="{ OPTION['value'] }" />
            <input type="hidden" name="app_day" value="{ REQ.app_day }" />
            <input type="hidden" name="app_time" value="{ REQ.app_time }" />
            <input type="hidden" name="subject" value="{ REQ.subject }" />
            <input type="hidden" name="contents" value="{ =nl2br(REQ.contents) }" />
            <input type="hidden" name="min_point" id="min_point" value="{ MIN_POINT }" />
            <input type="hidden" name="my_point" id="my_point" value="{ USER['point'] }" />
            <input type="hidden" name="price" id="price" value="{ OPTION['price'] }" />
            <input type="hidden" name="pay_price" id="pay_price" value="{ OPTION['price'] }" />
            <input type="hidden" id="loginChk" value="chk"/>
            <br><br>
            <div class="tac">
                <tag class="white">신고의뢰</tag><tag>{ REQ.category_name }</tag>
            </div>
            <br>
            <div class="whiteBox2 mb10">
                <table class="base03">
                    <colgroup>
                        <col style="width:100px" />
                        <col />
                    </colgroup>
                    <tbody>
                    <tr>
                        <th>이름</th>
                        <td><input type="text" class="req" name="user_name" value="{ USERINFO['user_name'] }" maxlength="25" title="이름을 입력해주세요." /></td>
                    </tr>
                    <tr>
                        <th>이메일</th>
                        <td><input type="text" class="req" name="email" value="{ USERINFO['user_email'] }" maxlength="100" title="이메일을 입력해주세요." /></td>
                    </tr>
                    <tr>
                        <th>휴대폰</th>
                        <td><input type="text" class="req" name="phone" value="{ USERINFO['user_phone'] }" maxlength="20" title="휴대폰을 입력해주세요." /></td>
                    </tr>
                    <!--
                    <tr>
                        <th>기업명</th>
                        <td><input type="text" name="company" value="{ USERINFO['user_company'] }" maxlength="100" title="기업명을 입력해주세요." /></td>
                    </tr>
                    -->
                    <tr>
                        <th>상담 세무사</th>
                        <td>{ REQ.mngr_name }</td>
                    </tr>
                    <tr>
                        <th>예약 날짜</th>
                        <td>{ REQ.app_day }</td>
                    </tr>
                    <tr>
                        <th>예약 시간</th>
                        <td>{ REQ.app_time }</td>
                    </tr>
                    <tr>
                        <th>상담 종류</th>
                        <td>{ REQ.category_name }</td>
                    </tr>
                    <tr>
                        <th>상담 방법</th>
                        <td>방문상담</td>
                    </tr>
                    <tr>
                        <th>상담 내용</th>
                        <td><!--<b>{ REQ.subject }</b><br/>-->{ =nl2br(REQ.contents) }</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="whiteBox2 mb10 personalWrap">
                <div class="top">
                    <div class="tit">개인정보 수집 및 이용에 대한 안내</div>
                    <!-- <a href="#" class="btnDetail">[개인정보취급방침 전문보기]</a> -->
                </div>
                <div class="textScroll">
                    { AGREE_TEXT }
                </div>
                <input type="checkbox" id="personalAgree" class="agreeY" title="개인정보 수집 및 이용에 동의" /> <label for="personalAgree">개인정보 수집 및 이용에 동의합니다.</label>
            </div>

            <div class="whiteBox2">
                { ? OPTION['price'] > 0 }
                <div class="site">
                    <div class="left"><div class="tit">상담수수료</div></div>
                    <div class="right"><div class="blueTit fz18">{ =number_format(OPTION['price']) } 원</div></div>
                </div>

                <div class="site">
                    <div class="left"><div class="tit">보유포인트</div></div>
                    <div class="right">
                        <div class="tit3">{ =number_format(USER['point']) } 포인트</div>
                    </div>
                </div>

                <div class="site">
                    <div class="left"><div class="tit">사용포인트</div></div>
                    <div class="right">
                        <div class="tit3"><input type="text" name="pay_point" class="point num" value="" /> 포인트</div>
                        <div class="sm">( 보유포인트 { =number_format(MIN_POINT) } 이상일 경우 사용 가능)</div>
                    </div>
                </div>

                <div class="site">
                    <div class="left"><div class="tit">결제금액</div></div>
                    <div class="right"><div class="blueTit fz18"><span id="amt">{ =number_format(OPTION['price']) }</span> 원</div></div>
                </div>
                <div class="btnCenter btn01"><a href="#" class="act_submit">결제하기</a></div>
                { : }
                <div class="site">
                    <div class="left"><div class="tit">상담수수료</div></div>
                    <div class="right"><div class="blueTit fz18">무료</div></div>
                </div>
                <div class="btnCenter btn01"><a href="#" class="act_submit">신청하기</a></div>
                { / }
            </div>
        </form>

        { / }

    </div>
    <!-- //subContainer -->

    { #footer }

</div>
<!-- //Wrap -->

{ ? !USERINFO['user_id'] }
<div id="csl_deepBg">
    <div id="csl_login_form">
        <h2 class="csl_lform_hd">세림세무법인 상담
            <a class="lfom_home" href="/">상담취소 (홈 이동)</a>
        </h2>
        <ul class="csl_login_tab">
            <li class="clt01 clt_li on">
                <a>로그인</a>
            </li>
            <li class="clt02 clt_li">
                <a>간편정보 입력</a>
            </li>
        </ul>
        <ul class="csl_ip_tab">
            <li class="cit01 cit_li on">
                <form class="login" id="frm_login" name="frm_login" method="post">
                    <input type="hidden" name="base" value="{ BASE_URL }" />
                    <input type="hidden" name="red" value="{ RED_URL }" />
                    <fieldset>
                        <legend class="sr-only">로그인 양식폼입니다.</legend>
                        <ul>
                            <li>
                                <input type="text" id="user_id" name="user_id" title="아이디를 입력해주세요." placeholder="아이디를 입력해주세요." value="{SAVED_ID}" class="req" data-pattern="id" data-minlen="3" />
                            </li>
                            <li>
                                <input type="password" id="passwd" name="passwd" title="비밀번호를 입력해주세요." placeholder="비밀번호를 입력해주세요." value="" class="req" data-minlen="3" />
                            </li>
                        </ul>
                        <input class="login_btn act_login" type="submit" value="로그인">
                        <div class="login_chk_div">
                            <div class="save_id">
                                <input type="checkbox" id="save_id" name="save_id" value="Y" title="아이디저장" checked="checked">
                                <label for="save_id">아이디저장</label>
                            </div>
                        </div>
                        <div class="btns_wrap">
                            <a href="./findid" target="_blank">아이디 찾기</a>
                            <a href="./findpw" target="_blank">비밀번호 찾기</a>
                            <a href="./join" target="_blank">회원가입하기</a>
                        </div>
                    </fieldset>
                </form>
            </li>
            <li class="cit02 cit_li">
                <div class="cit_ip_info">
                    <div class="info_wrap">
                        <p><span><input type="text" class="req" id="cit_name" name="name" value="{ USERINFO['user_name'] }" maxlength="20" placeholder="신청자명을 입력해주세요."/></span></p>
                        <p><span><input type="text" class="req" id="cit_phone" name="u_phone" value="{ USERINFO['user_phone'] }" maxlength="20" placeholder="핸드폰 번호를  입력해주세요." /></span></p>
                        { ? TF_TYPE != '전화상담' }
                        <p><span><input type="text" class="req" id="cit_mail" name="email" value="{ USERINFO['user_email'] }" maxlength="100" placeholder="이메일을 입력해주세요." /></span></p>
                        { / }
                    </div>
                    <div class="btns_wrap">
                        <a id="simpleIpBtn" href="#" >간편정보 입력</a>
                    </div>
                </div>
            </li>
        </ul>
        <div class="csl_txt_area">
            <p>
                로그인 / 간편정보입력을 통해 세무상담이 진행가능합니다.<br>
                로그인 후 진행하면 추가로 상담할 때 번거롭게 재입력하지 않아도 됩니다.
            </p>
        </div>

    </div>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            // $( '#csl_login_form' ).draggable();
        });
    </script>

</div>
{ / }
<!-- //Wrap -->
</body>
</html>

