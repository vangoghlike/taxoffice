{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">

			<div class="colBox2">

				<div class="idSearch">

					<div class="pwTab">
						<div class="top">
						    <a href="{BASE_URL}/findid">아이디 찾기</a>
						    <a class="on">비밀번호 찾기</a>
						</div>

						<div class="cont">
							<form class="login find" id="frm_find" name="frm_find" method="post" >
							<input type="hidden" name="act" value="find_pw" />
							<ul>
								<li>
									<div class="ipBox mb10">
										<input type="text" class="req" name="email" title="가입 시 등록하신 이메일 정보를 입력해주세요." placeholder="이메일을 입력해주세요."/>
									</div>
									<div class="ipBox mb10">
										<input type="text" class="req" name="user_name" title="이름을 입력해주세요." placeholder="이름을 입력해주세요."/>
									</div>
									<div class="ipBox mb25">
										<input type="text" class="req" name="user_id" title="아이디를 입력해주세요."  placeholder="아이디를 입력해주세요."/>
									</div>
									<div class="btn01 btnLgoin"><a href="#" class="act_submit">비밀번호찾기</a></div>
								</li>
							</ul>
							</form>
						</div>

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
