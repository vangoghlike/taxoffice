{ #header }

<!-- Container -->
<div class="container" id="container">

    { #subtop }
    <div class="subNav subNavType2">
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
                <h2>{ USER_TYPE } 상담정보 &nbsp;&nbsp;<span class="small-tit gray">{ DATA['mngr_name'] }</span></span></h2>
            </div>
            <!-- //h2Wrap -->

            <!-- lnb -->
            <div class="lnb">
                <span><img src="{TYPE_URL}/images/common/home.png" alt="home"></span>
                { ? is_numeric(CONTENTS['breadcrumbs'][0]['idno']) }{ @ CONTENTS['breadcrumbs'] }{ ? .index_ < .size_ -1 }<span>{ .menu_title }</span>{ : }<span>{ .menu_title }</span>{ / }{ / }{ : }<span>{ CONTENTS['menu_title'] }</span>{ / }
                <span>{ DATA['mngr_name'] }</span><span class="last">상담정보</span>
            </div>
            <!-- //lnb -->

        </div>
        <!-- //subTopInfo -->
        <!-- contStart -->
        <div class="contStart">
            <div class="tabType01">
                <ul>
                    { ? USERINFO['user_id'] != DATA['user_id'] }
                    <li class="on" style="width:50%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/view?&mid={ DATA['idno'] }">기본 정보</a></li>
                    <li style="width:50%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/list?&mid={ DATA['idno'] }">소통 게시판</a></li>
                    { : }
                    <li style="width:33.3%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/view?&mid={ DATA['idno'] }">기본 정보</a></li>
                    <li style="width:33.3%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/list?&mid={ DATA['idno'] }">소통 게시판</a></li>
                    <li class="on" style="width:33.3%"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/info?&mid={ DATA['idno'] }">정보</a></li>
                    { / }
                </ul>
            </div>
            <div>
                준비중입니다.
            </div>
        </div>
    </div>
</div>
{ #footer }
{ #popup }