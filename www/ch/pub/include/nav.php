	<!-- sub_title -->
	<div class="sub_title">
        <div class="content_wrap">
            <p class="sub_text">
				Whichever work you assign,<br />we consult to accommodate<br />
                <strong> your understanding.</strong>
            </p>
        </div>
    </div>
    <!-- sub_title end -->
	<?if($_REQUEST["cat_no"] !=""){ // 지정된 메뉴로 들어가 있을때 이 메뉴가 표시됩니다.?>
    <!-- sub_nav -->
		<?if($arrMenu['two'][$arrTCode[0]]['total'] > 0 && $arrMenu['two'][$arrTCode[0]]['total'] != ""){?>
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
				if($arrMenu['two'][$arrTCode[0]][$j]['show'] != "N"){
					echo '<li '.$navOnClass.'><a href="/ch/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['two'][$arrTCode[0]][$j]['code']].'">'.$arrMenu['two'][$arrTCode[0]][$j]['name'].'</a></li>';
				}
			}
			?>      
			</ul>
		</div>
		<?}?>
    <!-- sub_nav end -->
	<?
	}else{ // 지정된 메뉴로 되어있지 않았을 때 이 메뉴가 표시됩니다.
		if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){ // 로그인 후
	?>
		<!-- <div class="subNav_wrap">
			<ul class="sub_nav sub_tab3">
				<li<?if($nav_id == 3){?> class="on"<?}?>><a href="/ch/mypage/user_info.php">User Info</a></li>
				<li<?if($nav_id == 4){?> class="on"<?}?>><a href="/ch/sub/agree.php">Terms of Use</a></li>
				<li<?if($nav_id == 5){?> class="on"<?}?>><a href="/ch/sub/policy.php">privacy policy</a></li> 
			</ul>
		</div> -->
		<?}else{ // 로그인 전?>
		<!-- <div class="subNav_wrap">
			<ul class="sub_nav sub_tab3">
				<li<?if($nav_id == 1){?> class="on"<?}?>><a href="/ch/member/login.php">Login</a></li>
				<li<?if($nav_id == 2){?> class="on"<?}?>><a href="/ch/member/join_step1.php">Sign Up</a></li>
				<li<?if($nav_id == 3){?> class="on"<?}?>><a href="/ch/member/findid.php">Find ID/PW</a></li>    
			</ul>
		</div> -->
		<?
		}
	}
	?>