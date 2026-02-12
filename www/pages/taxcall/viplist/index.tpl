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
            </div>
            { / }
        </div>
    </div>
</div>
{ #footer }
{ #popup }