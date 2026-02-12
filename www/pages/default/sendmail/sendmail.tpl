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
                    <table class="base01 sendmail">
                        <colgroup>
                            <col style="width:13%;" />
                            <col style="width:39%;" />
                            <col style="width:10%;" />
                            <col style="width:18%;" />
                            <col style="width:20%;" />
                        </colgroup>
                        <thead>
                        <tr>
                            <th>구분</th>
                            <th>상담 세목</th>
                            <th>신청자</th>
                            <th>전송 일자</th>
                            <th>메일 및 톡 전송여부</th>

                        </tr>
                        </thead>
                        <tbody>
                        { @SENDMAIL }
                        <tr>
                            <td>
                                <a href="./{ CONTENTS['menu_idno'] }?form=send&type={ .mail_type }&idno={ .send_idno }&page={ PAGE }">{ .goods_name }</a>
                            </td>
                            <td>
                                <a href="./{ CONTENTS['menu_idno'] }?form=send&type={ .mail_type }&idno={ .send_idno }&page={ PAGE }">{ .category_name }</a>
                            </td>
                            <td>
                                <a href="./{ CONTENTS['menu_idno'] }?form=send&type={ .mail_type }&idno={ .send_idno }&page={ PAGE }">{ .receive_name }</a>
                            </td>
                            <td>
                                <a href="./{ CONTENTS['menu_idno'] }?form=send&type={ .mail_type }&idno={ .send_idno }&page={ PAGE }">{ .reg_date }</a>
                            </td>
                            <td style="text-align: center;">
                                <a href="./{ CONTENTS['menu_idno'] }?form=send&type={ .mail_type }&idno={ .send_idno }&page={ PAGE }"
                                { ? .send_yn == 'Y' }
                                class="send_ok_tag send_tag"
                                { : }
                                class="send_no_tag send_tag"
                                { / }
                                href="./{ CONTENTS['menu_idno'] }?type={ .goods_idno }&idno={ .idno }&page={ PAGE }">{ .send_yn }</a>
                                { ? .send_kakao_yn == 'Y' }
                                <a href="./{ CONTENTS['menu_idno'] }?form=send&type={ .mail_type }&idno={ .send_idno }&page={ PAGE }"
                                   { ? .send_kakao_yn == 'Y' }
                                class="kakao_ok_tag kakao_tag"
                                { : }
                                class="kakao_no_tag kakao_tag"
                                { / }
                                href="./{ CONTENTS['menu_idno'] }?type={ .goods_idno }&idno={ .idno }&page={ PAGE }">{ .send_yn }</a>
                                { / }
                            </td>

                        </tr>
                        { / }
                        { ? !SENDMAIL.size_ }
                        <tr class="allmerge">
                            <td>보낸 상담 메일 내역이 없습니다.</td>
                        </tr>
                        { / }
                        </tbody>
                    </table>

                    <br><br>
                    <div class="page_navi" data-count="{ COUNT }" data-size="{ PAGE_SIZE } " data-page="{ PAGE }" data-block="5" >
                        { #paging }
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

