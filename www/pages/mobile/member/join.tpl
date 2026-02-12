{ #header }

	<!-- Wrap -->
	<div class="wrap">

{ #subtop }

		<!-- subContainer -->
		<div class="subContainer">

			<div class="colBox">

{ ? STEP == '1' }

				<form class="join_step1" id="frm_join1" name="frm_join1" method="post" action="">
				<input type="hidden" name="step" value="2" />
				<input type="hidden" name="sns" value="{ SNS }" />
				<div class="joinBox">
					<div class="top ckTyp02">
						<input type="checkbox" id="agree1" name="agree1" value="Y" class="req" title="이용약관에 동의해주세요.">
						<label for="agree1">이용약관 동의
						</label>
						<span class="ckImg"></span>
					</div>
					<div class="scBox">{ AGREE_TEXT }</div>
				</div>

				<div class="joinBox mb25">
					<div class="top ckTyp02">
						<input type="checkbox" id="agree2" name="agree2" value="Y" class="req" title="개인정보 처리방침에 동의해주세요.">
						<label for="agree2">개인정보취급방침 동의
						</label>
						<span class="ckImg"></span>
					</div>
					<div class="scBox">{ POLICY_TEXT }</div>
				</div>

				<div class="btn01 btnLgoin"><a href="#" class="act_submit">동의하기</a></div>
				</form>

{ / }
{ ? STEP == '2' }

				      <form class="joinStep3" id="frm_join2" name="frm_join2" method="post" action="./login">
				      <input type="hidden" name="step" value="3" />
				      <input type="hidden" name="act" value="save" />
				      <input type="hidden" name="sns" value="{ SNS }" />
{#form}

					<div class="btn01"><a href="#" class="act_join">가입완료</a></div>
				      </form>

{ / }

			</div>

		</div>
		<!-- //subContainer -->

{ #footer }

	</div>
	<!-- //Wrap -->

</body>
</html>
