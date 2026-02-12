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
					    <li class="on"><a >아이디 찾기</a></li>
					    <li><a href="{BASE_URL}/findpw">비밀번호 찾기</a></li>
					  </ul>
					</div>
					<div class="h3Wrap line">
					    <h3>아이디 찾기</h3>
					    <span class="text">이메일과 이름을 입력하신 뒤 확인버튼을 눌러주세요.</span>
					</div>
					<form class="login find" id="frm_find" name="frm_find" method="post" >
					<input type="hidden" name="act" value="find_id" />
					  <fieldset>
					      <legend class="sr-only">아이디찾기 양식폼입니다.</legend>
					      <ul>
						  <li>
						      <input id="findidEmail" type="text" class="req" name="email" title="가입 시 등록하신 이메일 정보를 입력해주세요." placeholder="이메일"/>
						  </li>
						  <li>
						      <input id="filndidName" type="text" class="req" name="user_name" title="이름을 입력해주세요."  placeholder="이름"/>
						  </li>
					      </ul>
					      <input class="find_btn join_blue_btn join_Btn mt15" type="submit" value="아이디찾기">
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
