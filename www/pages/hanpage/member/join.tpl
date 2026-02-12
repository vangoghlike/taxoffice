{ #header }

		<!-- Container -->
		<div class="container" id="container">

{ #subtop }

			<!-- subContent -->
			<div class="subContent">
				
{ #breadcrumbs }

				<ol class="joinsubNav">
				  <li{ ? STEP == '1' } class="on"{ / }><img src="{TYPE_URL}/images/sub/joinsubNav01.jpg" alt="약관동의 아이콘"><img class="on_img" src="{TYPE_URL}/images/sub/joinsubNav01_on.jpg" alt="약관동의 아이콘">약관동의</li>
				  <li{ ? STEP == '2' } class="on"{ / }><img src="{TYPE_URL}/images/sub/joinsubNav03.jpg" alt="회원정보입력 아이콘"><img class="on_img" src="{TYPE_URL}/images/sub/joinsubNav03_on.jpg" alt="회원정보입력 아이콘">회원정보입력</li>
				  <li{ ? STEP == '3' } class="on"{ / }><img src="{TYPE_URL}/images/sub/joinsubNav04.jpg" alt="가입완료 아이콘"><img class="on_img" src="{TYPE_URL}/images/sub/joinsubNav04_on.jpg" alt="가입완료 아이콘">가입완료</li>
				</ol>

				<!-- contStart -->
				<div class="contStart">

{ #dep3 }

{ ? STEP == '1' }

					<form class="join_step1" id="frm_join1" name="frm_join1" method="post" action="">
					<input type="hidden" name="step" value="2" />
					<input type="hidden" name="sns" value="{ SNS }" />
					    <div class="cont_wrap mb50">
						<p>이용약관 동의 (*필수)</p>
						<div class="cont">
						{ AGREE_TEXT }
						</div>
						<div class="agree_wrap">
						    <input type="checkbox" id="agree1" name="agree1" value="Y" class="req" title="이용약관에 동의해주세요.">
						    <label for="agree1">회원 약관 안내를 읽어 보았으며, 동의합니다.</label>
						</div>
					    </div>

					    <div class="cont_wrap">
						<p>개인정보 처리방침 동의 (*필수)</p>
						<div class="cont">
						{ POLICY_TEXT }
						</div>
						<div class="agree_wrap">
						    <input type="checkbox" id="agree2" name="agree2" value="Y" class="req" title="개인정보 처리방침에 동의해주세요.">
						    <label for="agree2">개인정보 수집 항목을 읽어 보았으며, 동의합니다.</label>
						</div>
					    </div>
					    <div class="btns_wrap mt30 pt25 text-center">
						<input class="join_blue_btn join_Btn mr10" type="submit" value="모든 약관에 동의합니다">
						<button class="join_black_btn join_Btn act_back" type="button" >취소</button>
					    </div>
					</form>

{ / }
{ ? STEP == '2' }

				      <form class="joinStep3" id="frm_join2" name="frm_join2" method="post" action="">
				      <input type="hidden" name="step" value="3" />
				      <input type="hidden" name="act" value="save" />
				      <input type="hidden" name="sns" value="{ SNS }" />
				      <input type="hidden" name="division" value="{ USER_TYPE_VAL }" />
{#form}
				      </form>

{ / }
{ ? STEP == '3' }
				      <div class="joinStep4">
					<div class="contwrap">
					  <img src="{TYPE_URL}/images/common/selimbiz_logo.png" alt="세림비즈">
					  <p>
					    회원가입이 완료되었습니다. <br>
					    온비즈넷 회원가입을 감사드립니다.
					    <br>
					    <br>
					    <span>온비즈넷에서 제공하는 서비스를 이용하는 서비스를 이용하실 수 있습니다.</span>
					  </p>
					</div>
					<div class="btns_wrap mt30 pt25 text-center borer-none">
					    <button class="join_blue_btn join_Btn mr10" type="button" onclick="location.href='{BASE_URL}/login'">로그인</button>
					    <button class="join_black_btn join_Btn" type="button" onclick="location.href='{BASE_URL}/'">메인으로</button>
					</div>
				      </div>
{ / }

				</div>
				<!-- //contStart -->

			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

{ #footer }
