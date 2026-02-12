			<!-- subNav -->
			<div class="subNav subNavcustomer">
				<ul>
				{ ? USERINFO['user_id'] }
				    <li class="menu_member_userinfo"><a href="{BASE_URL}/userinfo">회원정보수정</a></li>
				{ : }
				    <li class="menu_member_login"><a href="{BASE_URL}/login">로그인</a></li>
				    <li class="menu_member_join"><a href="{BASE_URL}/join">회원가입</a></li>
				    <li class="menu_member_findid menu_member_findpw"><a href="{BASE_URL}/findid">아이디/비밀번호 찾기</a></li>
				{ / }
				    <li class="menu_member_agree"><a href="{BASE_URL}/agree">이용약관</a></li>
				    <li class="menu_member_policy"><a href="{BASE_URL}/policy">개인정보 취급방침</a></li>
				</ul>
			</div>
			<!-- //subNav -->
