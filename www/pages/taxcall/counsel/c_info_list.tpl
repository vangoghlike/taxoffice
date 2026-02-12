{ #header }

<!-- Container -->
<div class="container" id="container">

    { #subtop }

    <!-- subContent -->
    <div class="subContent">

        { #breadcrumbs }

        <!-- contStart -->
        <div class="contStart">
            <style>
                .jb-type {margin-bottom:0;}
                .jb-type .jb-tab li {border:none;}
                .jb-type .jb-tab li a {background:#f8f9fa; border:1px solid #e4e5e6; border-bottom:none; border-left:none;}
                .jb-type .jb-tab li:first-child a {border-left:1px solid #e4e5e6;}
                .jb-type .jb-tab li.on {border:none;}
                .jb-type .jb-tab li.on a {color:#fff; background:#0b4ea2; border:1px solid #e4e5e6; border-bottom:none; border-left:none;}
                .jb-type .jb-tab li.on:first-child a {border-left:1px solid #e4e5e6;}

                .jb_deadline {display:block; margin-bottom:6px; padding:3px 4px; border:1px solid #3399ff; color:#fff; background:#3399ff;}
                .jb_deadline.d-day {border:1px solid #ccc; color:#fff; background:#ccc;}
                .jb_d-cate  {display:inline-block; padding:6px 8px; border:1px solid #3399ff; color:#3399ff;}
                .jb_d-cate.d-day {border:1px solid #ccc; color:#ccc; background:#fafbfc;}
                .jb-bbs .blist {padding:16px 24px; border:1px solid #e4e5e6;}
                .jb-bbs .blist table thead { border-radius:4px; box-shadow:0px 2px 4px rgba(160,170,180,.2); }
                .jb-bbs .blist table thead th {font-weight:600; background:#f7f8f9; border:none; }
                .jb-bbs .blist table tbody tr td {line-height:48px;height:48px; border-bottom:1px solid #e4e5e6; line-height:1.6;}
                .jb-bbs .blist table tbody tr:last-child td {border-bottom:none;}
                .jb-bbs .blist table tbody tr td.company {font-weight:600; font-size:1.12rem;}
                .jb-bbs .blist table tbody tr td.company div {margin-bottom:16px; color:#12417a;}
                .jb-bbs .blist table tbody tr td.company img {max-width:80%; max-height:24px;}
                .jb-bbs .blist table tbody tr td.subject .cont-sbj {font-weight:600; font-size:1.12rem; color:#12417a;}
                .jb-bbs .blist table tbody tr td.subject .cont-tag {padding-top:16px;}
                .jb-bbs .blist table tbody tr td.subject .cont-tag span {display:inline-block; margin-right:4px; padding:4px 6px; font-size:0.8rem; font-weight:400; color:#fff; border-radius:3px; background:#babbbc;}
                .jb-bbs .btnBbs {border-bottom:none;}
                .jb-sch {margin-top:40px;}
                .jb-sch form {display:flex; justify-content:center;}

                .accordionTab td a {cursor:pointer;}
                .accordionCont td {background:#f1f1f1;display:none;}
            </style>
            <script>
                $(function() {
                    $('.accordionTab td a').on('click', function() {
                        $(this).closest('.accordionTab').next().find('td').slideToggle();
                    });
                });
            </script>
            { #dep3 }
            <div class="bbs jb-bbs">
                <div class="blist">
                    <table cellpadding="0" cellspacing="0" summary="게시판입니다.">
                        <colgroup>
                            <col width="15%">
                            <col width="20%">
                            <col width="20%">
                            <col width="*">
                        </colgroup>
                        <thead>
                        <tr>
                            <th scope="col" class="bgNo">상담 등록일</th>
                            <th scope="col">상담 구분</th>
                            <th scope="col">상담 세목</th>
                            <th scope="col">신청자</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="accordionTab">
                            <td><a>2019.07.01</a></td>
                            <td><a>전화상담 (알림톡)</a></td>
                            <td><a>양도세, 취득세</a></td>
                            <td><a>김진우 T: 010-4708-1601, Mail: jinwoodak@naver.com</a></td>
                        </tr>
                        <tr class="accordionCont">
                            <td colspan="4">전화상담 - 카카오 알림톡으로 전달된 메시지입니다. 카카오톡을 확인해주세요.</td>
                        </tr>
                        <tr class="accordionTab">
                            <td><a>2019.07.01</a></td>
                            <td><a>메일 상담</a></td>
                            <td><a>부가가치세</a></td>
                            <td><a>김진우 T: 010-4708-1601, Mail: jinwoodak@naver.com</a></td>
                        </tr>
                        <tr class="accordionCont">
                            <td colspan="4">부가가치세 관련 질문 답변부탁드립니다.</td>
                        </tr>
                        <tr class="accordionTab">
                            <td><a>2019.07.01</a></td>
                            <td><a>방문 상담</a></td>
                            <td><a>외투 및 법인설립 상담</a></td>
                            <td><a>김진우 T: 010-4708-1601, Mail: jinwoodak@naver.com</a></td>
                        </tr>
                        <tr class="accordionCont">
                            <td colspan="4">
                                <p>방문 예약 일정 : 19.07.21, 18:00시</p>
                                <p>외투 관련한 상담을 받고 싶습니다.</p>
                            </td>
                        </tr>
                        { @ LIST }
                        <tr class="{ ? .lev > 0 }answer { / }">
                            <td class="company">
                                <a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&idno={ .idno }"" class="{ ? CAN_READ != 'Y' }no_auth{ / }" data-idno="{ .idno }">
                                <div class="txt">{ .cpny_name }</div>
                                { ? .file[0] != null }
                                { / }
                                </a>
                            </td>
                            <td class="subject">
                                <a href="{ BASE_URL }/{ MENU_NO }/{ CONTENTS['idno'] }/read?{ QS }&idno={ .idno }" data-idno="{ .idno }">
                                    <p class="cont-sbj">
                                        { .subject }{ ? .new_yn == 'Y' }&nbsp;<img src="{TYPE_URL}/images/sub/icon_new.png" alt="새글" class="b_icon" />{ / }
                                        { ? .comment_count > 0 } <span class="count_green">[{ .comment_count }]</span>{ / }
                                    </p>
                                    <p class="cont-tag">
                                        <span>{ .cpny_rnum } 명 모집</span>
                                    </p>
                                </a>
                            </td>
                            <td class="cont-career">
                                <strong>{ .cpny_career }</strong><br>
                                <span>{ .cpny_qualify }</span><br>
                                <span>{ .cpny_edu }</span>
                            </td>
                            <td>{ .cpny_type }</td>
                            <td>
                                <span class="jb_deadline { ? .category_title == '마감' }d-day{ / }">{ .deadline }</span>
                                <span class="jb_d-cate { ? .category_title == '마감' }d-day{ / }">{ .category_title }</span>
                        </tr>
                        { / }
                        { ? !LIST.size_ }
                        <tr class="allmerge">
                            <td>등록된 상담내용이 없습니다.</td>
                        </tr>
                        { / }
                        </tbody>
                    </table>
                </div>
                <!-- //blist -->
            </div>

        </div>
        <!-- //contStart -->

    </div>
    <!-- //subContent -->

</div>
<!-- //Container -->

{ #footer }
