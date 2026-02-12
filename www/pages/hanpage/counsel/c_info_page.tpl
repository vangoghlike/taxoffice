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
            { ? MNGR_PAGE_DATA['user_id'] }
            <form class="joinStep3" id="frm_info" name="frm_info" method="post" action="">
                <input type="hidden" name="act" value="mngr_each_save" />
                <input type="hidden" name="idno" value="{ MNGR_PAGE_DATA['idno'] }" />
                <input type="hidden" name="mngr_level" value="{ MNGR_PAGE_DATA['mngr_level'] }" />
                <input type="hidden" name="user_id" value="{ MNGR_PAGE_DATA['user_id'] }" />
                <fieldset>
                    <legend class="sr-only">상담자 정보수정 양식테이블입니다.</legend>
                    <div class="text">
                        <p>상담자 정보 필수 입력 사항</p>
                        <p class="right-text"><span class="red">*</span> 은 필수항목 입니다.</p>
                    </div>
                    <table class="input_table">
                        <tbody>
                            <tr>
                                <th>
                                    <label>연결계정 아이디</label>
                                </th>
                                <td height="39">
                                    { MNGR_PAGE_DATA['user_id'] }
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="newpw">비밀번호{ ? !USER['user_id'] }<div class="red">*<span class="sr-only">필수입력입니다</span></div>{ / }</label>
                                </th>
                                <td>
                                    <input id="newpw" type="password" name="passwd" size="49" value="" maxlength="12" placeholder="영문/숫자/특문 조합  6~12자 이내" data-pattern="passnum" data-minlen="6"{ ? !USER['user_id'] } class="req" required="required"{ / }/>{ ? USER['user_id'] } (변경 시 입력){ / }
                                </td>
                            </tr>
                            <tr>
                                <td class="sbj_td" colspan="2">
                                    주요정보
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="mngr_name">성명<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>
                                </th>
                                <td height="39">
                                    <input id="mngr_name" type="text" name="mngr_name" maxlength="10" size="18" class="req" value="{ MNGR_PAGE_DATA['mngr_name'] }" title="성명을 입력해주세요." required="required"/>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="file_name">사진<br>
                                        <br>
                                        <small>변경시 문의요청(현재)<br>
                                            <a href="mailto:onbiztax@taxemail.co.kr" target="_top"><span>onbiztax@taxemail.co.kr</span></a>
                                        </small></label>
                                </th>
                                <td height="39">
                                    <img src="{ MNGR_PAGE_IMG_URL }/{ MNGR_PAGE_DATA['file_name'] }" alt="{ MNGR_PAGE_DATA['file_name'] }" style="max-width:270px" /><br>
                                </td>
                            </tr>
{*                            <tr>*}
{*                                <th>*}
{*                                    <label for="file_name">사진<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>*}
{*                                </th>*}
{*                                <td height="39">*}
{*                                    <img src="{ MNGR_PAGE_IMG_URL }/{ MNGR_PAGE_DATA['file_name'] }" alt="{ MNGR_PAGE_DATA['file_name'] }" style="max-width:270px" /><br>*}
{*                                    <br>*}
{*                                    <div class="in_file">*}
{*                                        <input type="text" class="txt" name="" value="" style="width:200px" />*}
{*                                        <a class="btn_file" href="#" ><input type="file" class="req" name="file" value="" title="사진을 등록해주세요." /></a>*}
{*                                    </div>*}
{*                                </td>*}
{*                            </tr>*}
                            <tr>
                                <th>
                                    <label for="bran_name">상호명<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>
                                </th>
                                <td height="39">
                                    <input id="bran_name" type="text" name="bran_name" maxlength="10" size="18" class="req" value="{ MNGR_PAGE_DATA['bran_name'] }" title="상호명을 입력해주세요." required="required"/>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="phone">연락처<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>
                                </th>
                                <td height="39">
                                    <div class="for-phoneform req" data-name="phone" data-class="tel,tel,tel" data-attr="required,required,required" >{ MNGR_PAGE_DATA['phone'] }</div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="tel">회사전화<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>
                                </th>
                                <td height="39">
                                    <div class="for-telform req" data-name="tel" data-class="tel,tel,tel" data-attr="required,required,required" >{ MNGR_PAGE_DATA['tel'] }</div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="fax">팩스</label>
                                </th>
                                <td height="39">
                                    <div class="for-faxform " data-name="fax" data-class="tel,tel,tel" data-attr="" >{ MNGR_PAGE_DATA['fax'] }</div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="email">이메일<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>
                                </th>
                                <td height="39">
                                    <div class="for-mailform req" data-name="email" data-class="req,req" data-attr="required,required" >{ MNGR_PAGE_DATA['email'] }</div>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <label for="layer">사업지 주소<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>

                                </th>
                                <td class="addr_wrap">
                                    <script src="//dmaps.daum.net/map_js_init/postcode.v2.js?autoload=false"></script>
                                    <div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:1;-webkit-overflow-scrolling:touch;">
                                        <img src="//t1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" onclick="closeDaumPostcode()" alt="닫기 버튼">
                                    </div>
                                    <input id="adress" type="text" class="postcode req" name="postcode" size="18" value="{ MNGR_PAGE_DATA['postcode'] }" readonly="readonly" />
                                    <button type="button" class="search_adress search_address">우편번호</button>
                                    <br>
                                    <input type="text" name="addr1" value="{ MNGR_PAGE_DATA['addr1'] }" size="50" class="mt5 addr1 req" readonly="readonly"> <span class="ml5">기본주소</span>
                                    <br>
                                    <input type="text" name="addr2" value="{ MNGR_PAGE_DATA['addr2'] }" size="50" class="mt5 addr2" maxlength="100"> <span class="ml5">나머지주소</span>

                                    <input type="hidden" name="lat" value="{ MNGR_PAGE_DATA['lat'] }" size="80" class="mt5 mngr_addr_lat" maxlength="100">
                                    <input type="hidden" name="lng" value="{ MNGR_PAGE_DATA['lng'] }" size="80" class="mt5 mngr_addr_lng" maxlength="100">

                                    <div id="mgwr_map" class="off"></div>
                                </td>
                            </tr>
                            <tr>
                                <th>주소지 구분<div class="red">*<span class="sr-only">필수입력입니다</span></div></th>
                                <td>
                                    <select name="addr_code" id="addr_code" class="addr_code req" >
                                        <option>---지역 선택---</option>
                                        <option value="서울" { ? MNGR_PAGE_DATA['addr_code'] == "서울" }selected="selected"{ / }>서울</option>
                                        <option value="경기, 강원" { ? MNGR_PAGE_DATA['addr_code'] =="경기, 강원" }selected="selected"{ / }>경기, 강원</option>
                                        <option value="인천" { ? MNGR_PAGE_DATA['addr_code'] =="인천" }selected="selected"{ / }>인천</option>
                                        <option value="대전, 충청" { ? MNGR_PAGE_DATA['addr_code'] =="대전, 충청" }selected="selected"{ / }>대전, 충청</option>
                                        <option value="전주, 전북" { ? MNGR_PAGE_DATA['addr_code'] =="전주, 전북" }selected="selected"{ / }>전주, 전북</option>
                                        <option value="광주, 전남" { ? MNGR_PAGE_DATA['addr_code'] =="광주, 전남" }selected="selected"{ / }>광주, 전남</option>
                                        <option value="부산, 경남" { ? MNGR_PAGE_DATA['addr_code'] =="부산, 경남" }selected="selected"{ / }>부산, 경남</option>
                                        <option value="대구, 경북" { ? MNGR_PAGE_DATA['addr_code'] =="대구, 경북" }selected="selected"{ / }>대구, 경북</option>
                                        <option value="제주" { ? MNGR_PAGE_DATA['addr_code'] =="제주" }selected="selected"{ / }>제주</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="sbj_td" colspan="2">
                                    상담업무
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="email">상담업무 선택<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>
                                </th>
                                <td>
                                    { @MNGR_PAGE_GOODS_CATEGORY }
                                    <div style="float:left;margin:0 20px 10px 0;">
                                        <h3><label>{ .goods_name }</label></h3>
                                        <ul style="margin-left:10px">
                                            { @ .list }
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="goods_category_idno[{ .goods_idno }][]" value="{ ..idno }"
                                                       <?php echo (strpos( { MNGR_PAGE_DATA['goods_category'] }, { ..idno } ) !== false) ? 'checked="checked"' : ''; ?>
                                                    />
                                                    { ..category_name }
                                                </label>
                                            </li>
                                            { / }
                                        </ul>
                                    </div>
                                    { / }
                                </td>
                            </tr>
                            <tr>
                                <td class="sbj_td" colspan="2">
                                    소개 문구 및 내용
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="info1">상단문구<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>
                                </th>
                                <td>
                                    <input id="info1" type="text" name="info1" maxlength="49" size="49" class="req" value="{ MNGR_PAGE_DATA['info1'] }" title="상단문구를 입력해주세요." required="required"/>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="info2">프로필 (학력)</label>
                                </th>
                                <td>
                                    <textarea name="info2" title="프로필 (학력 & 경력)을 입력해주세요." style="height:130px" >
                                        { MNGR_PAGE_DATA['info2'] }
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="info3">프로필 (경력)</label>
                                </th>
                                <td>
                                    <textarea name="info3" title="프로필 (학력 & 경력)을 입력해주세요." style="height:130px" >
                                        { MNGR_PAGE_DATA['info3'] }
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="info4">연구분야 (관심분야)</label>
                                </th>
                                <td>
                                    <textarea name="info4" title="연구분야 (관심분야)를 입력해주세요." style="height:130px" >
                                        { MNGR_PAGE_DATA['info4'] }
                                    </textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </fieldset>
                <div class="btns_wrap mt30 pt25 text-center borer-none">
                    <input class="join_blue_btn join_Btn mr10" type="submit" value="확인">
                    <button class="join_black_btn join_Btn" type="button" onclick="location.href='{BASE_URL}/'">취소</button>
                    { ? USER['user_id'] }<div style="float:right"><button class="join_black_btn join_Btn" type="button" onclick="location.href='{BASE_URL}/userleave'">탈퇴하기</button></div>{ / }
                </div>

            </form>
            { : }
            <p>정보가 존재하지 않습니다.</p>
            { / }
        </div>
        <!-- //contStart -->

    </div>
    <!-- //subContent -->

</div>
<!-- //Container -->

{ #footer }
