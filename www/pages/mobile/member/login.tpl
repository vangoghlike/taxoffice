{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">

			<div class="colBox">

				<div class="loginWrap">

					<form class="login" id="frm_login" name="frm_login" method="post">
					<input type="hidden" name="base" value="{BASE_URL}" />
					<input type="hidden" name="red" value="{ RED_URL }" />
					<input type="hidden" name="sns" value="" />
					<input type="hidden" name="sns_id" value="" />
					<input type="hidden" name="sns_name" value="" />
					<input type="hidden" name="site_idno" value="{ SITE_INFO.idno }" />
					<div class="logTop">
						<div class="line mb5">
							<input type="text" id="user_id" name="user_id" title="아이디를 입력해주세요." placeholder="아이디" value="{SAVED_ID}" class="ipType01 req" data-pattern="id" data-minlen="3" />
						</div>
						<div class="line">
							<input type="password" id="passwd" name="passwd" title="비밀번호를 입력해주세요." placeholder="비밀번호" value="" class="ipType01 req" data-minlen="3" />
						</div>
						<div class="side">
							<div class="left ckTyp01">
								<input type="checkbox" id="autoLogin" name="autologin" value="Y" /><label for="autoLogin">자동 로그인</label>
								<span class="ckImg"></span>
							</div>
							<div class="right">
								<a href="{BASE_URL}/findid">아이디 찾기</a>
								<a href="{BASE_URL}/findpw">비밀번호 찾기</a>
							</div>
						</div>
					</div>

					<div class="btn01"><a href="#" class="act_login">로그인</a></div>
					</form>

					<div class="lineTit">
						<span>간편하게 로그인하기</span>
					</div>

					<div class="snsLogin">
						<div class="bt naver">
							<a href="#" class="act_login_naver mobile">
								<span class="ico"></span>
								<span class="txt">네이버 계정으로 로그인</span>
							</a>
						</div>
						<div class="bt face hidn">
							<a href="#" class="act_login_facebook">
								<span class="ico"></span>
								<span class="txt">페이스북 계정으로 로그인</span>
							</a>
						</div>
					</div>

					<div class="joinBtn">
						<span>계정이 없으신가요?</span>
						<a href="{BASE_URL}/join">회원가입하기</a>
					</div>

				</div>

			</div>

		</div>
		<!-- //subContainer -->

{ #footer }

	</div>
	<!-- //Wrap -->

</body>
</html>
