{ #header }

<!-- Wrap -->
<div class="wrap rsorder">

    { #subtop }

    <!-- subContainer -->
    <div class="subContainer rsorder">

        { ? _GET.idno }

        { ? DATA.goods_idno == 2 && DATA.status != '9' }
            { ? DATA.goods_name != '[신고의뢰]메일상담' && DATA.goods_name != '[신고의뢰]방문상담'  }
        <div class="consultStep">
            <ul>
                <li class="no1{ ? DATA.status == '1' } active{ / }">
                    <span>접수중</span>
                </li>
                <li class="no2{ ? DATA.status == '2' } active{ / }">
                    <span>추가 요청중</span>
                </li>
                <li class="no3{ ? DATA.status == '3' } active{ / }">
                    <span>결제 대기중</span>
                </li>
                <li class="no4{ ? DATA.status == '4' } active{ / }">
                    <span>결제 완료</span>
                </li>
                <li class="no5{ ? DATA.status == '5' } active{ / }">
                    <span>신고 완료</span>
                </li>
            </ul>
        </div>
            { / }
        { / }
        { ? DATA.status == '9' }
        <div class="telTit pt0" >
            <div class="tit01">취소 완료된 상담 내용</div>
        </div>
        { / }
        <div class="whiteBox2">
            <div class="tit">신청 { ? DATA.status == '9' }취소 { /}정보</div>
            { ? DATA.price != '' && DATA.cancel_date != '' }
            <div class="consultViewList" style="margin-top:4px">
                <ul>
                    <li>
                        <form id="frm_tax_pay" name="frm_tax_pay" method="post" >
                            <input type="hidden" name="act" value="save" />
                            <input type="hidden" name="idno" value="{ DATA.idno }" />
                            <input type="hidden" name="min_point" id="min_point" value="{ MIN_POINT }" />
                            <input type="hidden" name="my_point" id="my_point" value="{ USER['point'] }" />
                            <input type="hidden" name="price" id="price" value="{ DATA.price }" />
                            <input type="hidden" name="pay_price" id="pay_price" value="{ DATA.price }" />
                            <div class="whiteBox2">
                                <div class="site">
                                    <div class="left"><div class="tit">결제 상담 수수료</div></div>
                                    <div class="right"><div class="blueTit fz18">{ =number_format(DATA.pay_price) } 원</div></div>
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
                                        <div class="tit3">{ =number_format(DATA.pay_point) } 포인트</div>
                                    </div>
                                </div>

                                <div class="site">
                                    <div class="left"><div class="tit">총 취소금액</div></div>
                                    <div class="right"><div class="blueTit fz18"><span id="amt">{ =number_format(DATA.pay_price) }</span> 원</div></div>
                                </div>
                                <br><br>
                                <div class="site" style="background:#eaeaea;padding:0.5rem 1.0rem; line-height:2.0rem;">
                                    <div class="left"><div class="tit" style="margin:0; line-height:2.0rem;">최종 결제금액</div></div>
                                    <div class="right"><div class="blueTit fz18"><span id="amt">{ =number_format(DATA.price) }</span> 원</div></div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            { / }
            <table class="base02">
                <colgroup>
                    <col style="width:100px" />
                    <col />
                </colgroup>
                <tbody>
                { ? DATA.goods_idno != 4 }
                <!-- cst-serim :: version1.00 :: user-info list update
                <tr>
                    <th>업무선택</th>
                    <td>{ DATA.category_name }</td>
                </tr>
                -->
                { ? DATA.goods_name == '[신고의뢰]메일상담' || DATA.goods_name == '[신고의뢰]방문상담'  }
                    <tr>
                        <th>상담구분</th>
                        <td>신고의뢰</td>
                    </tr>
                { / }
                <tr>
                    <th>상담방법</th>
                    <td>{ DATA.etc01 }</td>
                </tr>
                <tr>
                    <th>상담과목</th>
                    <td>{ DATA.category_name }</td>
                </tr>
                <tr>
                    <th>담당 세무사</th>
                    <td>{ DATA.mngr_name }</td>
                </tr>

                { ? DATA.goods_idno == 2 }
                    { ? DATA.goods_name != '[신고의뢰]메일상담' && DATA.goods_name != '[신고의뢰]방문상담'  }
                <tr>
                    <th>상담방법</th>
                    <td>{ =strtoupper(DATA.method) }</td>
                </tr>
                    { / }
                { / }
                { ? DATA.goods_idno == 3 }
                <tr>
                    <th>상호</th>
                    <td>{ DATA.company }</td>
                </tr>
                <tr>
                    <th>대표자</th>
                    <td>{ DATA.user_name }</td>
                </tr>
                <tr>
                    <th>사업장 소재지</th>
                    <td>{ DATA.addr }</td>
                </tr>
                <tr>
                    <th>업종/업태</th>
                    <td>{ DATA.com_kind }</td>
                </tr>
                <tr>
                    <th>사업자등록번호</th>
                    <td>{ DATA.com_regno }</td>
                </tr>
                <tr>
                    <th>직전연도 매출</th>
                    <td>{ DATA.sales }</td>
                </tr>
                <tr>
                    <th>사업현황</th>
                    <td>{ DATA.contents }</td>
                </tr>
                <!--
                <tr>
                    <th>기타 문의사항</th>
                    <td>{ DATA.contents2 }</td>
                </tr>
                -->
                { : }
                <tr>
                    <th>이름</th>
                    <td>{ DATA.user_name }</td>
                </tr>
                <!--
                <tr>
                    <th>기업명</th>
                    <td>{ DATA.company }</td>
                </tr>
                -->
                { / }
                <tr>
                    <th>연락처</th>
                    <td>{ DATA.phone }</td>
                </tr>
                <tr>
                    <th>이메일</th>
                    <td>{ DATA.email }</td>
                </tr>
                <tr>
                    <th>신청일</th>
                    <td>{ DATA.reg_day }</td>
                </tr>
                { / }
                </tbody>
            </table>
        </div>
        { ? DATA.status == '9' }
        <div class="btnCenter seCst">
            <a href="./" class="btnBlue btnHome">홈으로</a>
        </div>
        { / }
        { ? DATA.status != '9' }
        { ? DATA.goods_idno == 2 }
        { ? DATA.status < '4' && DATA.price }
        <div class="consultViewList" style="margin-top:4px">
            <ul>
                <li>
                    <form id="frm_tax_pay" name="frm_tax_pay" method="post" >
                        <input type="hidden" name="act" value="save" />
                        <input type="hidden" name="idno" value="{ DATA.idno }" />
                        <input type="hidden" name="min_point" id="min_point" value="{ MIN_POINT }" />
                        <input type="hidden" name="my_point" id="my_point" value="{ USER['point'] }" />
                        <input type="hidden" name="price" id="price" value="{ DATA.price }" />
                        <input type="hidden" name="pay_price" id="pay_price" value="{ DATA.price }" />
                        <div class="whiteBox2">

                            <div class="site">
                                <div class="left"><div class="tit">상담수수료</div></div>
                                <div class="right"><div class="blueTit fz18">{ =number_format(DATA.price) } 원</div></div>
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
                                <div class="right"><div class="blueTit fz18"><span id="amt">{ =number_format(DATA.price) }</span> 원</div></div>
                            </div>

                            <div class="btnCenter btn01"><a href="#" class="act_submit">결제하기</a></div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        { : }
            { ? DATA.goods_name == '[신고의뢰]메일상담' || DATA.goods_name == '[신고의뢰]방문상담'  }
        <div class="btnCenter seCst">
            <a href="/" class="btnBlue">신청완료</a>
            <a href="./" class="btnBlue" style="margin-left:1%;">홈으로</a>
            <a href="#" class="btnGray2 act_ord_cancel" data-idno="{ DATA.idno }">취소하기</a>
        </div>
            { : }
        <div class="btnTwo">
            <a href="#" class="btnGray act_ord_cancel" data-idno="{ DATA.idno }">취소하기</a>
                { ? DATA.category_name == '부가가치세' }
            <a href="./153/213/read?&idno=2299" class="btnBlue">보수표 보러가기</a>
                { : }
            <a href="./153/213/read?&idno=2298" class="btnBlue">보수표 보러가기</a>
                { / }
        </div>
            { / }
        { / }
        { : }
            { ? DATA.price != '' }
            <div class="consultViewList" style="margin-top:4px">
                <ul>
                    <li>
                        <form id="frm_tax_pay" name="frm_tax_pay" method="post" >
                            <input type="hidden" name="act" value="save" />
                            <input type="hidden" name="idno" value="{ DATA.idno }" />
                            <input type="hidden" name="min_point" id="min_point" value="{ MIN_POINT }" />
                            <input type="hidden" name="my_point" id="my_point" value="{ USER['point'] }" />
                            <input type="hidden" name="price" id="price" value="{ DATA.price }" />
                            <input type="hidden" name="pay_price" id="pay_price" value="{ DATA.price }" />
                            <div class="whiteBox2">
                                <div class="site">
                                    <div class="left"><div class="tit">상담수수료</div></div>
                                    <div class="right"><div class="blueTit fz18">{ =number_format(DATA.price) } 원</div></div>
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
                                        <div class="tit3">{ =number_format(DATA.pay_point) } 포인트</div>
                                    </div>
                                </div>

                                <div class="site">
                                    <div class="left"><div class="tit">총 결제금액</div></div>
                                    <div class="right"><div class="blueTit fz18"><span id="amt">{ =number_format(DATA.price) }</span> 원</div></div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            { / }
            { ? DATA.pay_status < '4' }
            <div class="btnCenter seCst">
                <a href="/" class="btnBlue">신청완료</a>
                <a href="./" class="btnBlue" style="margin-left:1%;">홈으로</a>
                <a href="#" class="btnGray2 act_ord_cancel" data-idno="{ DATA.idno }">취소하기</a>
            </div>
            { / }
        { / }
        { / }

        { : }

        <div class="cosultWrap">

            <div class="top">
                <div class="count">총 { DATA['count'] }건</div>
                <div id="select_box" style="display: none;">
                    <form id="frm_search" name="frm_search">
                        <label for="status">전체</label>
                        <select id="status" class="m_select" name="status">
                            <option value="">전체</option>
                            { @STATUS }
                            <option value="{ .key_ }"{ ? _GET.status == .key_ } selected="selected"{ / }>{ .value_ }</option>
                            { / }
                        </select>
                    </form>
                </div>
            </div>


            <div class="consultList">
                <ul>
                    { @DATA['list'] }
                    <li>
                        <a href="./rsorder?status={ _GET.status }&idno={ .idno }">
                            <div class="tit">[{ .goods_name }] { .category_name }</div>
                            <div class="info">
                                <span class="date">{ .reg_day }</span>
                                <span class="pg">{ .status_name }</span>
                            </div>
                        </a>
                    </li>
                    { / }
                </ul>
            </div>

        </div>

        { / }

    </div>
    <!-- //subContainer -->

    { #footer }

</div>
<!-- //Wrap -->

</body>
</html>
