{ #header }
<!-- Container -->
<div class="container" id="container">
    <!-- subTop -->
    <!-- //subTop -->
    <!-- Wrap -->
    <div class="wrap mbv counsel sendmail">
        <!-- subNav -->
        <div class="subNav subNavcustomer">
            <ul>
                { ? USERINFO['user_id'] }
                <li class="menu_member_sendmail on"><a href="{BASE_URL}/441">상담메일 리스트</a></li>
                <li class="menu_member_mypage"><a href="{BASE_URL}/mypage">마이페이지</a></li>
                <li class="menu_member_userinfo"><a href="{BASE_URL}/userinfo">회원정보수정</a></li>
                { : }
                <li class="menu_member_login"><a href="{BASE_URL}/login">로그인</a></li>
                <li class="menu_member_join"><a href="{BASE_URL}/join">회원가입</a></li>
                <li class="menu_member_findid menu_member_findpw"><a href="{BASE_URL}/findid">아이디/비밀번호 찾기</a></li>
                { / }
                <li class="menu_member_agree"><a href="{BASE_URL}/agree">이용약관</a></li>
                <li class="menu_member_policy"><a href="{BASE_URL}/policy">개인정보 취급방침</a></li>
            </ul>
        </div>
        <!-- //subNav -->
        <!-- subContent -->
        <div class="subContainer subContent">

            { #breadcrumbs }

            <!-- //subTopInfo --><!-- contStart -->
            <div class="contStart sendmail">
                { #dep3 }

                { CONTENTS['head_contents'] }
            </div>
            <div id="mailconts">
                <div id="mailconts_left">
                    <ul class="mcl_menu">
                        <li>
                            <a
                                    { ? MAIL_SEND_BOOL == '' }
                            class="on"
                            { / }
                            href="/{ CONTENTS['menu_idno'] }">
                            받은 상담
                            </a>
                        </li>
                        <li>
                            <a
                                    { ? MAIL_SEND_BOOL == 'send' }
                            class="on"
                            { / }
                            href="/{ CONTENTS['menu_idno'] }?form=send">
                            보낸 메일
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="mailconts_right">
                    { ? ORDER_DATA['send_yn'] == 'Y' }
                    <div class="send_yn_top">
                        답변전송이 완료된 상담입니다.
                    </div>
                        { ? ORDER_DATA['send_kakao_yn'] == 'Y' }
                        <div class="send_kakao_yn_top">
                            카카오톡 알림메시지 발송을 완료했습니다.
                        </div>
                        { : }
                        <div class="send_kakao_yn_top no_kakao">
                            카카오톡 알림을 보내지 않았습니다.
                        </div>
                        { / }
                    { : }
                    { / }
                    <form id="sendmail_counsel" class="sendmail_counsel" method="post">
                        <div class="telTit pt30">
                            <div class="tit01">상담문의 메일답변</div>
                            <div class="tit02">상담세무사 : { ORDER_DATA['mngr_name'] }, { ORDER_DATA['reg_date'] }<br><br>
                                <tag class="white">{ ORDER_DATA['goods_name'] }</tag>
                                <tag>{ ORDER_DATA['category_name'] }</tag>
                                <div class="csl_ca_name_wrap">
                                    { @CA_NAME_ARRAY }
                                    <label><input type="radio" value="{ .value_ }" name="category_name" { ? .index_ == '0' }checked="checked"{ / }/>&nbsp;{ .value_ }</label>
                                    { / }
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="act" value="sendmail_save" />
                        <input type="hidden" name="status" value="0" />
                        <input type="hidden" name="pay_status" value="1" />
                        <input type="hidden" name="goods_idno" value="{ ORDER_DATA['goods_idno'] }" />
                        <input type="hidden" name="idno" value="{ ORDER_DATA['idno'] }" />
                        <input type="hidden" name="tax_nick" value="세림세무법인" />
                        <input type="hidden" name="goods_name" value="{ ORDER_DATA['goods_name'] }" />
                        <input type="hidden" name="category_name" value="{ ORDER_DATA['category_name'] }" />
                        {*            <input type="hidden" name="category_name" value="{ REQ.category_name }" />*}
                        <input type="hidden" name="etc01" value="{ REQ.etc01 }" />
                        <input type="hidden" name="mngr_idno" value="{ ORDER_DATA['mngr_idno'] }" />
                        <input type="hidden" name="manager" value="{ ORDER_DATA['mngr_name'] }" />
                        <input type="hidden" name="mngr_name" value="{ ORDER_DATA['mngr_name'] }" />
                        <input type="hidden" name="mngr_phone" value="{ ORDER_DATA['mngr_phone'] }" />
                        <input type="hidden" name="mngr_mail" value="{ ORDER_DATA['mngr_email'] }" />
                        <input type="hidden" name="option_idno" value="{ REQ.option }" />
                        <input type="hidden" name="option_name" value="{ REQ.option_name }" />
                        <input type="hidden" name="subject" value="{ ORDER_DATA['subject'] }" />
                        <input type="hidden" name="contents" value="{ =nl2br(ORDER_DATA['contents']) }" />
                        <!-- user send mail data -->
                        <input type="hidden" name="receive_name" value="{ ORDER_DATA['user_name'] }" />
                        <input type="hidden" name="receive_phone" value="{ ORDER_DATA['phone'] }" />
                        <input type="hidden" name="receive_email" value="{ ORDER_DATA['email'] }" />
                        <input type="hidden" name="mail_type" value="{ ORDER_DATA['goods_idno'] }" />
                        <input type="hidden" id="loginChk" value="chk"/>
                        <div class="telSca mailList">
                            <div class="userInfoZone">
                                <p class="infoTitle">
                                    ·신청자 정보
                                </p>
                                { ? ORDER_DATA['method'] != '' }
                                <p>
                                    <span class="infoTt">요청 상담방법</span>
                                    <span><input type="text" class="req" name="user_name" value="
                                    { ? ORDER_DATA['method'] == 'email' }
                                    메일
                                    { : }
                                    팩스
                                    { / }
                                    " readonly="readonly"/></span>
                                </p>
                                { / }
                                { ? ORDER_DATA['goods_idno'] != '3' }
                                <p>
                                    <span class="infoTt">이름</span>
                                    <span><input type="text" class="req" name="user_name" value="{ ORDER_DATA['user_name'] }" readonly="readonly"/></span>
                                </p>
                                { / }
                                <p>
                                    <span class="infoTt">이메일</span>
                                    <span><input type="text" class="req" name="email" value="{ ORDER_DATA['email'] }" readonly="readonly"/></span>
                                </p>
                                { ? ORDER_DATA['goods_idno'] != '20' }
                                <p>
                                    <span class="infoTt">휴대폰</span>
                                    <span><input type="text" class="req" name="phone" value="{ ORDER_DATA['phone'] }" readonly="readonly"/></span>
                                </p>
                                { / }
                                { ? ORDER_DATA['goods_idno'] == '20' }
                                <p>
                                    <span class="infoTt">신청제목</span>
                                    <span><input type="text" class="req" name="subject" value="{ ORDER_DATA['subject'] }" readonly="readonly"/></span>
                                </p>
                                { / }
                                { ? ORDER_DATA['goods_idno'] == '3' }
                                <p>
                                    <span class="infoTt">회사명</span>
                                    <span><input type="text" class="req" name="company" value="{ ORDER_DATA['company'] }" readonly="readonly"/></span>
                                </p>
                                <p>
                                    <span class="infoTt">대표자명</span>
                                    <span><input type="text" class="req" name="user_name" value="{ ORDER_DATA['user_name'] }" readonly="readonly"/></span>
                                </p>
                                <p>
                                    <span class="infoTt">직전연도 매출</span>
                                    <span><input type="text" class="req" name="sales" value="{ ORDER_DATA['sales'] }" readonly="readonly"/></span>
                                </p>
                                <p>
                                    <span class="infoTt">업종/업태</span>
                                    <span><input type="text" class="req" name="com_kind" value="{ ORDER_DATA['com_kind'] }" readonly="readonly"/></span>
                                </p>
                                <p>
                                    <span class="infoTt" style="letter-spacing: -1px">사업자등록번호</span>
                                    <span><input type="text" class="req" name="com_regno" value="{ ORDER_DATA['com_regno'] }" readonly="readonly"/></span>
                                </p>
                                <p>
                                    <span class="infoTt">사업장 소재지</span>
                                    <span><input type="text" class="req" name="addr" value="{ ORDER_DATA['addr'] }" readonly="readonly"/></span>
                                </p>
                                { / }

                                <p>
                                    <span class="infoTt">요청내용</span>
                                    <span>
                                <textarea class="readTxt req" name="contents" readonly="readonly">
                                {=strip_tags(ORDER_DATA['contents']) }
                                </textarea>
                            </span>
                                </p>
                            </div>
                            <div class="line text">
                                <div class="textZone">
                                    { ? ORDER_DATA['send_contents'] != '' }
                                    <textarea class="req" name="send_contents" readonly="readonly">
                                        {=strip_tags(ORDER_DATA['send_contents']) }
                                    </textarea>
                                    { : }
                                    <textarea class="req" name="send_contents" placeholder="답변하실 내용을 간략히 작성해주세요." title="문의하실 내용을 입력해주세요."></textarea>
                                    { / }
                                </div>
                            </div>
                            <br>
                            { ? ORDER_DATA['send_yn'] == 'Y' }
                            <div class="btnCenter btn01 viewBtn">
                                <a href="/{ CONTENTS['menu_idno'] }?form=send&type={ ORDER_DATA['goods_idno'] }&idno={ ORDER_DATA['send_idno'] }">
                                    전송한 메일 보기
                                </a>
                            </div>
                            { : }
                            { ? ORDER_DATA['goods_idno'] != '20' && ORDER_DATA['goods_idno'] != '3' }
                            <div class="send_kakao_wrap">
                                <label class="send_kakao_lb">
                                    <input type="checkbox" name="send_kakao_yn" checked="checked"/>&nbsp;
                                    카카오메시지 같이 전송
                                </label>
                                <br>
                                <p style="text-align:center">(현재는 카카오 심사중이어서 반영되지 않으나 완료되면 수정하겠습니다)</p>
                            </div>
                            { / }
                            <br>
                            <div class="btnCenter btn01"><a href="#" class="act_submit">답변메일 전송하기</a></div>
                            { / }
                        </div>
                    </form>

                    <div class="btnBbs bbNone ">
                        <div class="right">
                            <a href="/{ CONTENTS['menu_idno'] }?page={ PAGE }">목록</a>
                        </div>
                    </div>
                </div>
            </div>


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
    <div id="qmenu_banner" class="qmenu_banner">
        {*        <a href="http://www.han-page.com/416" target="_blank">*}
        <a href="http://www.han-page.co.kr/406" target="_blank">
            {*            <img src="{ TYPE_URL }/images/sub/qbanner_right.jpg"/>*}
            <img src="{TYPE_URL}/images/sub/hanpage_icon.jpg" alt="qna">
            <div class="q_info">
                {*                <i class="fa fa-question"></i>*}
                Han Page 세무정보
            </div>
        </a>
    </div>

    </body>
    </html>

