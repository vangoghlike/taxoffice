{ #header }

<!-- Container -->
<div class="container" id="container">

    { #subtop }

    <!-- subContent -->
    <div class="subContent">

        { #breadcrumbs }

        <!-- contStart -->
        <div class="contStart">

            { #dep3 }

            <form class="login" id="frm_login" name="frm_login" method="post">
                <input type="hidden" name="base" value="{BASE_URL}" />
                <input type="hidden" name="red" value="{ RED_URL }" />
                <input type="hidden" name="sns" value="" />
                <input type="hidden" name="sns_id" value="" />
                <input type="hidden" name="sns_name" value="" />
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
                    <div class="save_id">
                        <input type="checkbox" id="save_id" name="save_id" value="Y" title="아이디저장">
                        <label for="save_id">아이디저장</label>
                    </div>
                    <div class="btns_wrap">
                        <a href="./findid">아이디 찾기</a>
                        <a href="./findpw">비밀번호 찾기</a>
                        <a href="./join">회원가입하기</a>
                    </div>
                </fieldset>
                <div class="sns_login">
                    <p>간편하게 로그인하기</p>
                    <div class="sns_Wrap">
                        <ul>
                            <li class="naver"><a href="#" class="act_login_naver">네이버 계정으로 로그인</a></li>
                            {*									<li class="facebook hidn"><a href="#" class="act_login_facebook">페이스북 계정으로 로그인</a></li>*}
                        </ul>
                    </div>
                    <div class="qus">
                        계정이 없으신가요?
                        <a href="./join">회원가입하기</a>
                    </div>
                </div>
            </form>

        </div>
        <!-- //contStart -->

    </div>
    <!-- //subContent -->

</div>
<!-- //Container -->

{ #footer }
