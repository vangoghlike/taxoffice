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

					<form class="login" id="frm_login" name="frm_login" method="post">
					<input type="hidden" name="base" value="{BASE_URL}" />
					<input type="hidden" name="red" value="{ RED_URL }" />
					<input type="hidden" name="sns" value="" />
					<input type="hidden" name="sns_id" value="" />
					<input type="hidden" name="sns_name" value="" />
						<fieldset>
							<legend class="sr-only">Login Form</legend>
							<ul>
								<li>
									<input type="text" id="user_id" name="user_id" title="Please enter your ID" placeholder="Please enter your ID" value="{SAVED_ID}" class="req" data-pattern="id" data-minlen="3" />
								</li>
								<li>
									<input type="password" id="passwd" name="passwd" title="Please enter a password" placeholder="Please enter a password" value="" class="req" data-minlen="3" />
								</li>
							</ul>
							<input class="login_btn act_login" type="submit" value="Login">
							<div class="save_id">
								<input type="checkbox" id="save_id" name="save_id" value="Y" title="Save ID">
								<label for="save_id">Save ID</label>
							</div>
							<div class="btns_wrap">
								<a href="./findid">Find ID</a>
								<a href="./findpw">Find password</a>
								<a href="./join">Sign Up</a>
							</div>
						</fieldset>
						<div class="sns_login" style="display:none;">
							<p>Easy Login</p>
							<div class="sns_Wrap">
								<ul>
									<li class="naver"><a href="#" class="act_login_naver">Naver Account Login</a></li>
									<li class="facebook"><a href="#" class="act_login_facebook">Facebook Account Login</a></li>
								</ul>
							</div>
							<div class="qus">
								Do not have an account?
								<a href="./join">Sign Up</a>
							</div>
						</div>
					</form>

				</div>
				<!-- //contStart -->

			</div>
			<!-- //subContent -->

		</div>
		<!-- //Container -->

{ #footer }
