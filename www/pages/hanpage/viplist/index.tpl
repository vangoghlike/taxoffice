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
            <div class="cate_addr_wrap">
                <ul class="addrcode_list">
                    <li class="{ ? MNGR_ADDR_CODE == '' || MNGR_ADDR_CODE == 'all' }on{ / }"><a data-addrcode="all">전체</a></li>
                    <li class="{ ? MNGR_ADDR_CODE == '서울' }on{ / }"><a data-addrcode="서울">서울</a></li>
                    <li class="{ ? MNGR_ADDR_CODE == '경기, 강원' }on{ / }"><a data-addrcode="경기, 강원">경기, 강원</a></li>
                    <li class="{ ? MNGR_ADDR_CODE == '대전, 충청' }on{ / }"><a data-addrcode="대전, 충청">대전, 충청</a></li>
                    <li class="{ ? MNGR_ADDR_CODE == '전주, 전북' }on{ / }"><a data-addrcode="전주, 전북">전주, 전북</a></li>
                    <li class="{ ? MNGR_ADDR_CODE == '광주, 전남' }on{ / }"><a data-addrcode="광주, 전남">광주, 전남</a></li>
                    <li class="{ ? MNGR_ADDR_CODE == '부산, 경남' }on{ / }"><a data-addrcode="부산, 경남">부산, 경남</a></li>
                    <li class="{ ? MNGR_ADDR_CODE == '대구, 경북' }on{ / }"><a data-addrcode="대구, 경북">대구, 경북</a></li>
                    <li class="{ ? MNGR_ADDR_CODE == '제주' }on{ / }"><a data-addrcode="제주">제주</a></li>
                </ul>
            </div>
            { @MNGR }
            <div class="memberTop">
                <div class="img"><a href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/view?&mid={ .idno }" target="_self" class="mb_href"><img src="{ MNGR_PHOTO_URL }{ .file_name }" alt="{ .mngr_name }"></a>
                </div>
                <div class="textWrap">
                    <div class="tit01 nobg"><a href="mailto:{ .email }" target="_top">{ .mngr_name }</a><span
                                style="color: #000000"> <span style="color: #5198f6">"{ .info1 }"&nbsp;&nbsp;<a
                                        href="{ BASE_URL }/{ VLIST_MENU_IDNO }/{ VLIST_IDNO }/view?&mid={ .idno }" target="_self"><i class="fa fa-external-link"></i></a></span></span>
                    </div>
                    <div class="listTyp01">
                        <ul>
                            <li class="cstSe-memCate">
                                <div class="tit nobg">기본사항</div>
                                <div class="tit nobg ft13" style="margin-bottom: 8px">상호명 : <span>{ .bran_name }</span></div>
                                <div class="tit nobg ft13" style="margin-top: 0px; margin-bottom: 8px">전화번호 : <span>{ .tel }</span>
                                </div>
                                <div class="tit nobg ft13" style="margin-top: 0px; margin-bottom: 8px">이메일 : <a
                                            href="mailto:{ .email }" target="_top"><span>{ .email }</span></a>
                                </div>
                                <div class="tit nobg ft13"
                                     style="margin-top: 0px; text-indent: -32px; margin-left: 32px; line-height: 1.4">주소
                                    : <span style="display: inline">{ .addr1 } { .addr2 }</span></div>
                            </li>
                            <li class="cstSe-memCate">
                                <div class="tit nobg">프로필(경력)</div>
                                <p class="smList">
                                    { =nl2br( .info2 ) }
                                </p>
                                <p class="mt20 smList">
                                    { =nl2br( .info3 ) }
                                </p>
                            </li>
                            <li class="cstSe-memCate">
                                <div class="tit nobg">연구(관심) 분야</div>
                                <p class="smList">
                                    { =nl2br( .info4 ) }
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="csl_go_btn_wrap">
                    <a class="csl_go_btn" href="{ BASE_URL }/370#mngr{ .idno }" target="_self">
                        <img src="{ TYPE_URL }/images/sub/counsel.png"/>
                        <span>상담신청</span>
                    </a>
                    <a class="csl_go_btn" href="{ BASE_URL }/373#mngr{ .idno }" target="_self">
                        <img src="{ TYPE_URL }/images/sub/tcs.png"/>
                        <span>신고의뢰</span>
                    </a>
                    { ? .phome_url != null }
{*                    <a class="csl_go_btn" href="{ .phome_url }" target="_blank">*}
{*                        <img src="{ TYPE_URL }/images/sub/csl_home.png"/>*}
{*                        <span>홈페이지</span>*}
{*                    </a>*}
                    { / }
                </div>
            </div>
            { / }
        </div>
    </div>
</div>
{ #footer }
{ #popup }