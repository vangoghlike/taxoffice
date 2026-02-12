{ #header }
<!-- Container -->
<div class="container" id="container">
    <!-- subTop -->
    <!-- //subTop -->
    <!-- Wrap -->
    <div class="wrap mbv counsel">
        {*{ #c_subtop }*}
        <!-- subContent -->
        <div class="subContainer subContent">
            { #breadcrumbs }

            <!-- //subTopInfo --><!-- contStart -->
            <div class="contStart sendmail">
                { #dep3 }

                { CONTENTS['head_contents'] }
            </div>
            <div>


            </div>
            <div >


            </div>

            <table class="base01">
                <colgroup>
                    <col style="width:25%;" />
                    <col style="width:25%;" />
                    <col style="width:25%;" />
                    <col />
                </colgroup>
                <thead>
                <tr>
                    <th>구분</th>
                    <th>업무 선택</th>
                    <th>신청자</th>
                    <th>메일전송여부</th>
                    <th>일자</th>
                </tr>
                </thead>
                <tbody>
                { @ORDER }
                <tr>
                    <td>
                        <a href="./{ CONTENTS['menu_idno'] }?type={ .goods_idno }&idno={ .idno }">{ .goods_name }</a>
                    </td>
                    <td>
                        <a href="./{ CONTENTS['menu_idno'] }?type={ .goods_idno }&idno={ .idno }">{ .category_name }</a>
                    </td>
                    <td>
                        <a href="./{ CONTENTS['menu_idno'] }?type={ .goods_idno }&idno={ .idno }">{ .user_name }</a>
                    </td>
                    <td>
                        <a href="./{ CONTENTS['menu_idno'] }?type={ .goods_idno }&idno={ .idno }">{ .send_yn }</a>
                    </td>
                    </td>
                    <td>
                        <a href="./{ CONTENTS['menu_idno'] }?type={ .goods_idno }&idno={ .idno }">{ .reg_date }</a>
                    </td>
                </tr>
                { / }
                { ? !ORDER.size_ }
                <tr class="allmerge">
                    <td>상담 내역이 없습니다.</td>
                </tr>
                { / }
                </tbody>
            </table>



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

