{ #header }

		<!-- Container -->
		<div class="container" id="container">

{ #subtop }

			<!-- subContent -->
			<div class="subContent">
				
{ #breadcrumbs }

				<ol class="joinsubNav">
				  <li{ ? STEP == '1' } class="on"{ / }><img src="{TYPE_URL}/images/sub/joinsubNav01.jpg" alt="Accept terms icon"><img class="on_img" src="{TYPE_URL}/images/sub/joinsubNav01_on.jpg" alt="Accept terms icon">Accept terms</li>
				  <li{ ? STEP == '2' } class="on"{ / }><img src="{TYPE_URL}/images/sub/joinsubNav03.jpg" alt="Member Info icon"><img class="on_img" src="{TYPE_URL}/images/sub/joinsubNav03_on.jpg" alt="Member Info">Member Info</li>
				  <li{ ? STEP == '3' } class="on"{ / }><img src="{TYPE_URL}/images/sub/joinsubNav04.jpg" alt="Signed up icon"><img class="on_img" src="{TYPE_URL}/images/sub/joinsubNav04_on.jpg" alt="Signed up icon">Signed up</li>
				</ol>

				<!-- contStart -->
				<div class="contStart">

{ #dep3 }

{ ? STEP == '1' }

					<form class="join_step1" id="frm_join1" name="frm_join1" method="post" action="">
					<input type="hidden" name="step" value="2" />
					<input type="hidden" name="sns" value="{ SNS }" />
					    <div class="cont_wrap mb50">
						<p>Accept Terms and Conditions (* Required)</p>
						<div class="cont">
						{ AGREE_TEXT }
						</div>
						<div class="agree_wrap">
						    <input type="checkbox" id="agree1" name="agree1" value="Y" class="req" title="Please agree to the terms and conditions.">
						    <label for="agree">I have read and agree to the Terms of Service.</label>
						</div>
					    </div>

					    <div class="cont_wrap">
						<p>Consent to Personal Information Processing Policy (* Required)</p>
						<div class="cont">
						{ POLICY_TEXT }
						</div>
						<div class="agree_wrap">
						    <input type="checkbox" id="agree2" name="agree2" value="Y" class="req" title="Please agree to the privacy policy.">
						    <label for="agree2">I have read and agree to the collection of personal information.</label>
						</div>
					    </div>
					    <div class="btns_wrap mt30 pt25 text-center">
						<input class="join_blue_btn join_Btn mr10" type="submit" value="I agree to all the terms">
						<button class="join_black_btn join_Btn act_back" type="button" >Cancel</button>
					    </div>
					</form>

{ / }
{ ? STEP == '2' }

				      <form class="joinStep3" id="frm_join2" name="frm_join2" method="post" action="">
				      <input type="hidden" name="step" value="3" />
				      <input type="hidden" name="act" value="save" />
				      <input type="hidden" name="sns" value="{ SNS }" />
{#form}
				      </form>

{ / }
{ ? STEP == '3' }
				      <div class="joinStep4">
					<div class="contwrap">
					  <img src="{TYPE_URL}/images/common/h1Logo.png" alt="세림법무법인">
					  <p>
						Sign up is complete.<br>
					    Thank you for registering as a member of SERUM Tax Corporation.
					    <br>
					    <br>
					    <span>You can use services provided by Sereim Tax Corporation.</span>
					  </p>
					</div>
					<div class="btns_wrap mt30 pt25 text-center borer-none">
					    <button class="join_blue_btn join_Btn mr10" type="button" onclick="location.href='{BASE_URL}/login'">Login</button>
					    <button class="join_black_btn join_Btn" type="button" onclick="location.href='{BASE_URL}/'">Home</button>
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
