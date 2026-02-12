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

				      <div class="findId">
					<div class="tabType01 two">
					  <ul>
					    <li><a href="{BASE_URL}/findid">아이디 찾기</a></li>
					    <li class="on"><a>비밀번호 찾기</a></li>
					  </ul>
					</div>
					<div class="h3Wrap line">
					    <h3>비밀번호 찾기</h3>
					    <span class="text">이메일과 이름, 아이디를 입력하신 뒤 확인버튼을 눌러주세요.</span>
					</div>
					<form class="login find" id="frm_find" name="frm_find" method="post" >
					<input type="hidden" name="act" value="find_pw" />
					  <fieldset>
					      <legend class="sr-only">비밀번호찾기 양식폼입니다.</legend>
					      <ul>
						  <li>
						      <input id="findidEmail" type="text" class="req" name="email" title="가입 시 등록하신 이메일 정보를 입력해주세요." placeholder="이메일"/>
						  </li>
						  <li>
						      <input id="filndidName" type="text" class="req" name="user_name" title="이름을 입력해주세요."  placeholder="이름"/>
						  </li>
						  <li>
						      <input id="filndpwId" type="text" class="req" name="user_id" title="아이디를 입력해주세요."  placeholder="아이디"/>
						  </li>
					      </ul>
					      <input class="find_btn join_blue_btn join_Btn mt15" type="submit" value="비밀번호 찾기">
					  </fieldset>
					</form>
				      </div>

				</div>
				<!-- //contStart -->

			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

{ #footer }
