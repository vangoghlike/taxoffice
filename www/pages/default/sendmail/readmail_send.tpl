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
                    <div class="sendtalk_form_wrap">
                        <h3 class="sfw_subject">○ 카카오 전송내용</h3>
                        { ? SENDMAIL_DATA['send_kakao_yn'] == 'Y' }
                        <div class="sfw_kakao_contents">
                            고객님께서 요청하신 "{ SENDMAIL_DATA['category_name'] }"에<br>
                            { SENDMAIL_DATA['writer_name'] } 님이 { SENDMAIL_DATA['receive_email'] }로 답변글을 작성하였습니다.<br>
                            편하실 때 확인해보시면 감사하겠습니다.<br><br>

                            홈페이지 바로가기 : www.taxoffice.co.kr<br><br>

                            고객센터 : 02-854-2100
                        </div>
                        { : }
                        <p>
                            카카오톡을 전송하지 않았습니다.
                        </p>
                        { / }
                    </div>
                    <div class="sendmail_form_wrap">
                        <h3 class="sfw_subject">○ 메일 전송내용</h3>
                        <div style="width:700px">
                            <div class="top"  style="height:137px;text-align:center;background:#235ba6;line-height:137px;">
                                <h2 style="color:#fff;font-weight:600;font-size:30px;">세림세무법인 <span style="font-size:34px;">메일상담 답변</span> 안내</h2>
                            </div>
                            <div class="cont"  style="padding:40px 30px;font-size:14px;color:#666666;line-height:20px;border-left:1px solid #333333;border-right:1px solid #333;">
                                안녕하세요. 세림세무법인입니다.<br>
                                <strong style="color:#333333;">{ SENDMAIL_DATA['receive_name'] } (연락처:{ SENDMAIL_DATA['receive_phone'] }, 이메일:{ SENDMAIL_DATA['receive_email'] })</strong> 회원님의 <br>상담요청에 따른 답변사항입니다.<br>
                                <br>
                                <div class="pw" style="padding:0 0px 32px 0px;width:100%;height:auto; min-height:160px; border:1px solid #235ba6;margin:0; text-align: center;">
                                    <p style="background:#235ba6;color:#fff;line-height:39px;padding:0px 28px;margin:0;">답변 내용</p>
                                    <p style="line-height:1.5;padding:12px 12px 0 12px;margin:0;font-size:14px;color:#666666;text-align:left;">{ SENDMAIL_DATA['send_contents'] }</p>
                                </div>
                                <br>
                                <div style="height:2px;background:#ccc;">

                                </div>
                                <div class="pw" style="width:100%;height:39px;border:1px solid #666666;margin:12px 0; text-align: center;line-height: 37px;">
                                    <p style="background:#777777;color:#fff;float:left;line-height:39px;padding:0px 28px;margin:0;">신청구분
                                    { ? SENDMAIL_DATA['method'] != '' }
                                        { ? SENDMAIL_DATA['method'] == 'email' }
                                        &nbsp;(메일 상담요청)
                                        { : SENDMAIL_DATA['method'] == 'fax' }
                                        &nbsp;(팩스 상담요청)
                                        { / }
                                    { / }
                                    </p>
                                    <span stlye="font-size:14px;color:#666666">{ SENDMAIL_DATA['goods_name'] }</span>
                                </div>
                                <div class="pw" style="width:100%;height:39px;border:1px solid #666666;margin:12px 0; text-align: center;line-height: 37px;">
                                    <p style="background:#777777;color:#fff;float:left;line-height:39px;padding:0px 28px;margin:0;">
                                        상담과목
                                    </p>
                                    <span stlye="font-size:14px;color:#666666">{ SENDMAIL_DATA['category_name'] }</span>
                                </div>
                                <div class="pw" style="width:100%;height:39px;border:1px solid #666666;margin:0 0 12px 0; text-align: center;line-height: 37px;">
                                    <p style="background:#777777;color:#fff;float:left;line-height:39px;padding:0px 28px;margin:0;">담당세무사</p>
                                    <span stlye="font-size:14px;color:#666666">{ SENDMAIL_DATA['writer_name'] }</span>
                                </div>
                                { ? SENDMAIL_DATA['mail_type'] == '20' }
                                <div class="pw" style="width:100%;height:39px;border:1px solid #666666;margin:0 0 12px 0; text-align: center;line-height: 37px;">
                                    <p style="background:#777777;color:#fff;float:left;line-height:39px;padding:0px 28px;margin:0;">제목</p>
                                    <span stlye="font-size:14px;color:#666666">{ SENDMAIL_DATA['subject'] }</span>
                                </div>
                                { / }
                                { ? SENDMAIL_DATA['mail_type'] == '3' }
                                <div class="pw" style="width:100%;height:39px;border:1px solid #666666;margin:0 0 12px 0; text-align: center;line-height: 37px;">
                                    <p style="background:#777777;color:#fff;float:left;line-height:39px;padding:0px 28px;margin:0;">회사명</p>
                                    <span stlye="font-size:14px;color:#666666">{ SENDMAIL_DATA['company'] }</span>
                                </div>
                                <div class="pw" style="width:100%;height:39px;border:1px solid #666666;margin:0 0 12px 0; text-align: center;line-height: 37px;">
                                    <p style="background:#777777;color:#fff;float:left;line-height:39px;padding:0px 28px;margin:0;">대표자명</p>
                                    <span stlye="font-size:14px;color:#666666">{ SENDMAIL_DATA['receive_name'] }</span>
                                </div>
                                <div class="pw" style="width:100%;height:39px;border:1px solid #666666;margin:0 0 12px 0; text-align: center;line-height: 37px;">
                                    <p style="background:#777777;color:#fff;float:left;line-height:39px;padding:0px 28px;margin:0;">직전연도 매출</p>
                                    <span stlye="font-size:14px;color:#666666">{ SENDMAIL_DATA['sales'] }</span>
                                </div>
                                <div class="pw" style="width:100%;height:39px;border:1px solid #666666;margin:0 0 12px 0; text-align: center;line-height: 37px;">
                                    <p style="background:#777777;color:#fff;float:left;line-height:39px;padding:0px 28px;margin:0;">업종/업태</p>
                                    <span stlye="font-size:14px;color:#666666">{ SENDMAIL_DATA['com_kind'] }</span>
                                </div>
                                <div class="pw" style="width:100%;height:39px;border:1px solid #666666;margin:0 0 12px 0; text-align: center;line-height: 37px;">
                                    <p style="background:#777777;color:#fff;float:left;line-height:39px;padding:0px 28px;margin:0;">사업자등록번호</p>
                                    <span stlye="font-size:14px;color:#666666">{ SENDMAIL_DATA['com_regno'] }</span>
                                </div>
                                <div class="pw" style="width:100%;height:39px;border:1px solid #666666;margin:0 0 12px 0; text-align: center;line-height: 37px;">
                                    <p style="background:#777777;color:#fff;float:left;line-height:39px;padding:0px 28px;margin:0;">사업장 소재지</p>
                                    <span stlye="font-size:14px;color:#666666">{ SENDMAIL_DATA['addr'] }</span>
                                </div>
                                { / }
                                <div class="pw" style="padding:0 0px 32px 0px;width:100%;height:auto; min-height:160px; border:1px solid #666666;margin:0; text-align: center;">
                                    <p style="background:#777777;color:#fff;line-height:39px;padding:0px 28px;margin:0;">상담요청 내용</p>
                                    <p style="line-height:1.5;padding:12px 12px 0 12px;margin:0;font-size:14px;color:#666666;text-align:left;">{ SENDMAIL_DATA['contents'] }</p>
                                </div>
                                감사합니다.
                            </div>

                            <div class="footer"  style="padding:20px;background:#444444;color:#fff;">
                                <div class="left" style="float:left;color:#fff;font-size:12px;">
                                    본 메일은 세림세무법인에서 발송한 발신전용 메일입니다.<br>
                                    <span style="color:#aaaaaa;padding-top:10px;display:inline-block;">
			서울시 금천구 시흥대로 488(독산동)혜전빌딩 701호<br>
			전화 :  02-854-2100  |  팩스 : 02-854-2120  |  개인정보보호책임자 : 최유정<br>
			COPYRIGHT (C) 2017  SERIM TAX ALL RIGHTS RESERVED.
			                        </span>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="btnBbs bbNone ">
                        <div class="right">
                            <a href="/{ CONTENTS['menu_idno'] }?form=send&page={ PAGE }">목록</a>
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

