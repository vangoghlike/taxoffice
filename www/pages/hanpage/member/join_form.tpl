					  <fieldset>
					      <legend class="sr-only">회원가입 양식테이블입니다.</legend>
					      <div class="text">
						<p>회원정보 필수 입력 사항</p>
						<p class="right-text"><span class="red">*</span> 은 필수항목 입니다.</p>
					      </div>
					      <table class="input_table">
						  <caption>아이디,비밀번호,비밀번호확인,이름,이메일,휴대폰번호 순으로되어있는 회원가입 필수 입력내용들입니다.</caption>
{*						  <colgroup>*}
{*						      <col style="width:123px">*}
{*						      <col>*}
{*						  </colgroup>*}
						  <tbody>
						  { ? SNSINFO }
						    <tr>
							<th>
							    <label>간편가입구분</label>
							</th>
							<td height="39">{ SNSINFO['type'] }</td>
						    </tr>
						    <tr>
							<th>
							    <label>이름</label>
							</th>
							<td height="39">{ SNSINFO['name'] }</td>
						    </tr>
						  { : }
						  { ? USER['user_id'] }
						    <tr>
							<th>
							    <label>아이디</label>
							</th>
							<td height="39">{ USER['user_id'] }</td>
						    </tr>
						  { : }
						    <tr>
							<th>
							    <label for="newid">아이디<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>
							</th>
							<td>
								<input id="newid" type="text" name="user_id" size="49" class="req" value="" maxlength="12" placeholder="영문/숫자 조합 6~12자" data-pattern="id" data-minlen="6" required="required"/>
							    <button type="button" class="check_id act_id_check">아이디 중복 확인</button>
							</td>
						    </tr>
						  { / }
						    <tr>
							<th>
							    <label for="newpw">비밀번호{ ? !USER['user_id'] }<div class="red">*<span class="sr-only">필수입력입니다</span></div>{ / }</label>
							</th>
							<td>
								<input id="newpw" type="password" name="passwd" size="49" value="" maxlength="12" placeholder="영문/숫자/특문 조합  6~12자 이내" data-pattern="passnum" data-minlen="6"{ ? !USER['user_id'] } class="req" required="required"{ / }/>{ ? USER['user_id'] } (변경 시 입력){ / }
							</td>
						    </tr>
						    <tr>
							<th>
							    <label for="newpw2">비밀번호 확인{ ? !USER['user_id'] }<div class="red">*<span class="sr-only">필수입력입니다</span></div>{ / }</label>
							</th>
							<td>
								<input id="newpw2" type="password" name="passwd_conf" size="49" value="" data-minlen="6" maxlength="12" placeholder="영문/숫자/특문 조합 6~12자 이내"{ ? !USER['user_id'] } class="req" required="required"{ / }/>
							</td>
						    </tr>
						  { ? USER['user_id'] }
						      <tr>
							  <th>
							      <label for="name">이름</label>
							  </th>
							  <td height="39">{ USER['user_name'] }</td>
						      </tr>
						  { : }
						      <tr>
							  <th>
							      <label for="name">이름<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>
							  </th>
							  <td>
							      <input id="name" type="text" name="user_name" maxlength="10" size="18" class="req" value="" title="이름을 입력해주세요." required="required"/>
							  </td>
						      </tr>
						  { / }
						  { / }
						      <tr>
							  <th>
							      <label for="email">이메일<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>
							  </th>
							  <td>
								<div class="for-mailform" data-name="email" data-class="req,req," data-attr="required,required," >{ USER['email'] }</div>
							  </td>
						      </tr>
						      <tr>
							  <th>
							      <label for="askTell">휴대폰<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>
							  </th>
							  <td>
								<div class="for-phoneform" data-name="phone" data-class="tel,tel,tel" data-attr="required,required,required" >{ USER['phone'] }</div>
							  </td>
						      </tr>
						  </tbody>
					      </table>
					      { ? USER_TYPE_VAL == 'c' || USER['division'] == 'c' }
					      <div class="text mt40">
					      	<p>기업정보 필수/선택 입력 사항</p>
						  	<p class="right-text"><span class="red">*</span> 은 필수항목 입니다.</p>
						  </div>
						  <input type="hidden" name="division" value="c"/>
					      <table class="input_table mt10">
						  <caption>기업명,전화번호,주소,직업순으로 되어있는 회원가입 양식폼입니다.</caption>
						  <colgroup>
						      <col style="width:123px">
						      <col>
						  </colgroup>
						  <tbody>
						    <tr>
							<th>
							    <label for="companyNumber">사업자번호<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>
							</th>
							<td>
							    <input id="companyNumber" type="text" name="cpny_number" size="49" value="{ USER['cpny_number'] }" maxlength="50" title="사업자번호를 입력해주세요." />
							</td>
						    </tr>
						    <tr>
							<th>
							    <label for="companyName">기업명<div class="red">*<span class="sr-only">필수입력입니다</span></div></label>
							</th>
							<td>
							    <input id="companyName" type="text" name="company" size="49" value="{ USER['company'] }" maxlength="50" title="기업명을 입력해주세요." />
							</td>
						    </tr>
						    <tr>
							<th>
							    <label for="companyCeo"></div>대표자명<div class="red">*<span class="sr-only">필수입력입니다</span></label>
							</th>
							<td>
							    <input id="companyCeo" type="text" name="cpny_ceo" size="49" value="{ USER['cpny_ceo'] }" maxlength="50" title="대표자명을 입력해주세요." />
							</td>
						    </tr>
						    <tr>
							<th>
							    <label for="askTell2">전화번호</label>
							</th>
							<td>
								<div class="for-telform" data-name="tel" data-class="tel,tel,tel" data-attr="" >{ USER['tel'] }</div>
							</td>
						    </tr>
						      <tr>
							  <th>
							      <label for="adress">주소</label>
							  </th>
							  <td>
								<div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:1;-webkit-overflow-scrolling:touch;">
								<img src="//t1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" onclick="closeDaumPostcode()" alt="닫기 버튼">
								</div>
							      <input id="adress" type="text" class="postcode" name="postcode" size="18" value="{ USER['postcode'] }" readonly="readonly" />
							      <button type="button" class="search_adress search_address">우편번호</button>
							      <br>
							      <input type="text" name="addr1" value="{ USER['addr1'] }" size="50" class="mt5 addr1" readonly="readonly"> <span class="ml5">기본주소</span>
							      <br>
							      <input type="text" name="addr2" value="{ USER['addr2'] }" size="50" class="mt5 addr2" maxlength="100"> <span class="ml5">나머지주소</span>
							  </td>
						      </tr>
						      <tr>
							  <th>
							      <label for="userJob">기업구분</label>
							  </th>
							  <td>
							      <input id="userJob" type="text" name="job" size="50" value="{ USER['job'] }" maxlength="100" />
							  </td>
						      </tr>
						  </tbody>
					      </table>
					  { / }
					  </fieldset>
					  <div class="btns_wrap mt30 pt25 text-center borer-none">
					      <input class="join_blue_btn join_Btn mr10" type="submit" value="확인">
					      <button class="join_black_btn join_Btn" type="button" onclick="location.href='{BASE_URL}/'">취소</button>
					      { ? USER['user_id'] }<div style="float:right"><button class="join_black_btn join_Btn" type="button" onclick="location.href='{BASE_URL}/userleave'">탈퇴하기</button></div>{ / }
					  </div>
