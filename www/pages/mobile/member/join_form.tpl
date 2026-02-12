{ ? SNSINFO }
				<div class="ipBox bbNone txt">
					<b>{ SNSINFO['name'] }</b> ( { SNSINFO['type'] } 간편가입 )
				</div>
{ : }
{ ? USER['user_id'] }
				<div class="ipBox bbNone txt">
					<b>{ USER['user_name'] }</b> ( { USER['user_id'] } )
				</div>
{ : }
				<div class="ipBox bbNone">
					<span class="title must">아이디</span>
					<div class="id">
						<input type="text" name="user_id" class="req" value="" maxlength="16" title="아이디를 입력해주세요." placeholder="영문/숫자 조합 6~16자" data-pattern="id" data-minlen="6" />
						<a href="#" class="rightBtn act_id_check">중복확인</a>
					</div>
				</div>
{ / }
				<div class="ipBox bbNone">
					<span class="title must">비밀번호</span>
					<div>
						<input type="password" name="passwd" size="6" value="" maxlength="12" title="비밀번호를 입력해주세요." placeholder="영문/숫자 조합 포함 4~12자 이내{ ? USER['user_id'] } -변경 시 입력{ / }" data-pattern="wordnum" data-minlen="4"{ ? !USER['user_id'] } class="req"{ / }/>
					</div>
				</div>

				<div class="ipBox bbNone">
					<span class="title must">비밀번호 확인</span>
					<div>
						<input type="password" name="passwd_conf" size="6" value="" maxlength="12" title="비밀번호를 입력해주세요." placeholder="영문/숫자 조합 포함 4~12자 이내" />
					</div>
				</div>
{ ? !USER['user_id'] }
				<div class="ipBox bbNone">
					<span class="title must">이름</span>
					<div>
						<input type="text" name="user_name" maxlength="10" size="18" class="req" value="" title="이름명을 입력해주세요." placeholder="" />
					</div>
				</div>
{ / }
{ / }

				<div class="ipBox bbNone">
					<span class="title must">이메일</span>
					<div>
						<input type="text" name="email" maxlength="100" size="18" class="req" value="{ USER['email'] }" title="이메일을 입력해주세요." placeholder="" />
					</div>
				</div>

				<div class="ipBox mb15">
					<span class="title must">휴대폰 번호</span>
					<div>
						<input type="text" name="phone" maxlength="20" size="18" class="req" value="{ USER['phone'] }" title="휴대폰번호를 입력해주세요." placeholder="" />
					</div>
				</div>
				
				<!-- cst-serim :: version1.00 :: user-info list update
				<div class="ipBox bbNone">
					<span class="title">기업명</span>
					<div>
						<input type="text" name="company" maxlength="50" size="18" value="{ USER['company'] }" title="기업명을 입력해주세요." placeholder="" />
					</div>
				</div>

				<div class="ipBox bbNone">
					<span class="title">전화번호</span>
					<div>
						<input type="text" name="tel" maxlength="50" size="18" value="{ USER['tel'] }" title="전화번호를 입력해주세요." placeholder="" />
					</div>
				</div>

				<div class="ipBox bbNone">
					<span class="title">주소</span>
					<div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:1;-webkit-overflow-scrolling:touch;">
					<img src="//t1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" onclick="closeDaumPostcode()" alt="닫기 버튼">
					</div>
					<div class="adress">
				      <input type="text" name="postcode" class="postcode" size="6" value="{ USER['postcode'] }" readonly="readonly" title="우편번호를 입력해주세요." placeholder="" />
				      <a href="#" class="rightBtn search_address">우편번호</a>
				      <br>
				      <input type="text" name="addr1" class="addr1" value="{ USER['addr1'] }" size="18" readonly="readonly" title="주소를 입력해주세요." placeholder="기본주소">
				      <br>
				      <input type="text" name="addr2" class="addr2" value="{ USER['addr2'] }" size="18" maxlength="100" title="주소를 입력해주세요." placeholder="나머지주소">
				    </div>
				</div>

				<div class="ipBox mb25">
					<span class="title">직업</span>
					<div>
						<input type="text" name="job" maxlength="100" size="18" value="{ USER['job'] }" title="직업을 입력해주세요." placeholder="" />
					</div>
				</div>
				-->
				