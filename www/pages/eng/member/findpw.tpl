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
					    <li><a href="{BASE_URL}/findid">Find ID</a></li>
					    <li class="on"><a>Find password</a></li>
					  </ul>
					</div>
					<div class="h3Wrap line">
					    <h3>Find password</h3>
					    <span class="text">Enter your e-mail, name and ID and click OK.</span>
					</div>
					<form class="login find" id="frm_find" name="frm_find" method="post" >
					<input type="hidden" name="act" value="find_pw" />
					  <fieldset>
					      <legend class="sr-only">비밀번호찾기 양식폼입니다.</legend>
					      <ul>
						  <li>
						      <input id="findidEmail" type="text" class="req" name="email" title="Please enter your email when registering." placeholder="Email"/>
						  </li>
						  <li>
						      <input id="filndidName" type="text" class="req" name="user_name" title="Please enter your name"  placeholder="Name"/>
						  </li>
						  <li>
						      <input id="filndpwId" type="text" class="req" name="user_id" title="Please enter your ID"  placeholder="ID"/>
						  </li>
					      </ul>
					      <input class="find_btn join_blue_btn join_Btn mt15" type="submit" value="Find password">
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
