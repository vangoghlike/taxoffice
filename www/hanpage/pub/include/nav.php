	<!-- sub_title -->
	<div class="sub_title k_link_box">
        <div class="content_wrap">
            <p class="sub_text">
				어떠한 업무이던 <br /><strong>고객님의 눈높이에 맞추어서</strong><br />
                자문하고 상담해드립니다
            </p>
        </div>
		<!-- 상담센터 카카오 버튼
		<?if($_REQUEST["cat_no"] == 77){?>
		<div class="selim_kakaoLink">
			<a id="kakao-link-btn" href="javascript:sendLink()">
				<img src="//developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_medium.png">
				<span>상담 추천하기</span>
			</a>
		</div>
		<script>
			// 메인 카카오 앱 추천
			//<![CDATA[
			// // 사용할 앱의 JavaScript 키를 설정해 주세요.
			Kakao.init('74546251e56d8047240891a67beafc9c');
			// // 카카오링크 버튼을 생성합니다. 처음 한번만 호출하면 됩니다.
			Kakao.Link.createCustomButton({
				container: '#kakao-link-btn',
				templateId: 60372,
				templateArgs: {
					'title': '세림콜센터',
					'description': '세림콜센터 상담추천'
				}
			});
			//]]>
		</script>
		<?}?>  -->
    </div>
    <!-- sub_title end -->
	<?if($_REQUEST["cat_no"] !=""){ // 지정된 메뉴로 들어가 있을때 이 메뉴가 표시됩니다.?>
        <?php
        if ( $arrMenu['two'][$arrTCode[0]]['show_total'] != 0 && $arrMenu['two'][$arrTCode[0]]['show_total'] != '' ) {
        ?>
    <!-- sub_nav -->
    <div class="subNav_wrap">
        <ul class="sub_nav sub_tab<?=$arrMenu['two'][$arrTCode[0]]['show_total']?>">
		<?
		for($j=0;$j<$arrMenu['two'][$arrTCode[0]]['total'];$j++){
			$navOnClass = "";
			if($arrTCode[1]==$arrMenu['two'][$arrTCode[0]][$j]['code']){
				$navOnClass = "class='on'";
			}else if($arrMenu['two'][$arrTCode[0]][$j]['type'] == "O"){
				$navOnClass = "class='emphasis'";
			}
			echo '<li '.$navOnClass.'><a href="/hanpage/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['two'][$arrTCode[0]][$j]['code']].'">'.$arrMenu['two'][$arrTCode[0]][$j]['name'].'</a></li>';
		}
		?>      
        </ul>
    </div>
    <!-- sub_nav end -->
        <?php
        }
        ?>
	<?
	}else{ // 지정된 메뉴로 되어있지 않았을 때 이 메뉴가 표시됩니다.
		if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){ // 로그인 후
	?>
		<div class="subNav_wrap">
			<ul class="sub_nav sub_tab5">
				<li<?if($nav_id == 1){?> class="on"<?}?>><a href="javascript:alert('준비중입니다.');">상담메일 리스트</a></li>
				<li<?if($nav_id == 2){?> class="on"<?}?>><a href="/hanpage/mypage/mypage.php">마이페이지</a></li>
				<li<?if($nav_id == 3){?> class="on"<?}?>><a href="/hanpage/mypage/user_info.php">회원정보수정</a></li>
				<li<?if($nav_id == 4){?> class="on"<?}?>><a href="/hanpage/sub/agree.php">이용약관</a></li>
				<li<?if($nav_id == 5){?> class="on"<?}?>><a href="/hanpage/sub/policy.php">개인정보 처리방침</a></li>
			</ul>
		</div>
		<?}else{ // 로그인 전?>
		<div class="subNav_wrap">
			<ul class="sub_nav sub_tab5">
				<li<?if($nav_id == 1){?> class="on"<?}?>><a href="/hanpage/member/login.php">로그인</a></li>
				<li<?if($nav_id == 2){?> class="on"<?}?>><a href="/hanpage/member/join_step1.php">회원가입</a></li>
				<li<?if($nav_id == 3){?> class="on"<?}?>><a href="/hanpage/member/findid.php">아이디/비밀번호 찾기</a></li>
				<li<?if($nav_id == 4){?> class="on"<?}?>><a href="/hanpage/sub/agree.php">이용약관</a></li>
				<li<?if($nav_id == 5){?> class="on"<?}?>><a href="/hanpage/sub/policy.php">개인정보처리방침</a></li>
			</ul>
		</div>
		<?
		}
	}
	?>