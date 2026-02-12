	<!-- sub_title -->
	<div class="sub_title">
        <div class="content_wrap">

            <?php if ($_title_code == 1) : ?>
                <p class="sub_text t3">
                    <strong class="category blue_txt">Preliminary Consultation</strong>
                    Pre-consultation clarifies your Korea investment plan.<br/>
                    Direct investment?<br/>
                    Or branch setup? Decide.<br/>
                    Understand the basic procedures for foreign investment.
                </p>
            <?php elseif ($_title_code == 2) : ?>
                <p class="sub_text t3">
                    <strong class="category blue_txt">Guidance on Document Preparation</strong>
                    For a foreign-invested company or a domestic branch,<br />
                    check the procedures, required documents,<br />
                    and expected timeline.
                </p>
            <?php elseif ($_title_code == 3) : ?>
                <p class="sub_text t3">
                    <strong class="category blue_txt">Foreign Investment Reporting & Bank Notification</strong>
                    As the first step, we guide investment reporting<br />
                    or branch-setup notification at the bank.
                </p>
            <?php elseif ($_title_code == 4) : ?>
                <p class="sub_text t3">
                    <strong class="category blue_txt">Registration of Incorporation</strong>
                    Guidance on corporate registration for foreign-invested companies,<br />
                    and branch-establishment registration for foreign corporations.
                </p>
            <?php elseif ($_title_code == 5) : ?>
                <p class="sub_text t3">
                    <strong class="category blue_txt">Business Registration</strong>
                    After registration is complete,<br />
                    we guide filing the business registration with the tax office.
                </p>
            <?php elseif ($_title_code == 6) : ?>
                <p class="sub_text t3">
                    <strong class="category blue_txt">Corporate Bank Account Setup</strong>
                    After business registration, we support opening<br />
                    a corporate bank account for the company or branch.
                </p>
            <?php elseif ($_title_code == 7) : ?>
                <p class="sub_text t3">
                    <strong class="category blue_txt">Post-Establishment Tax Support</strong>
                    After establishment, we provide ongoing tax support<br />
                    for your business operations.
                </p>
            <?php else : ?>
                <p class="sub_text">
                    <strong>One-Stop Service</strong> for establishing <br class="mo_vw"/>foreign-invested companies<br class="pc_vw"/>
                    and <br class="mo_vw"/>domestic branches of overseas corporations<br/><br/>

                    <strong class="blue_txt">from initial consultation <br class="mo_vw"/>to business registration</strong>
                </p>
            <?php endif; ?>


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
					echo '<li '.$navOnClass.'><a href="/fdi_eng/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['two'][$arrTCode[0]][$j]['code']].'">'.$arrMenu['two'][$arrTCode[0]][$j]['name'].'</a></li>';
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
				<li<?if($nav_id == 3){?> class="on"<?}?>><a href="/fdi_eng/mypage/user_info.php">User Info</a></li>
				<li<?if($nav_id == 4){?> class="on"<?}?>><a href="/fdi_eng/sub/agree.php">Terms of Use</a></li>
				<li<?if($nav_id == 5){?> class="on"<?}?>><a href="/fdi_eng/sub/policy.php">privacy policy</a></li>
			</ul>
		</div> -->
		<?}else{ // 로그인 전?>
		<!-- <div class="subNav_wrap">
			<ul class="sub_nav sub_tab3">
				<li<?if($nav_id == 1){?> class="on"<?}?>><a href="/fdi_eng/member/login.php">Login</a></li>
				<li<?if($nav_id == 2){?> class="on"<?}?>><a href="/fdi_eng/member/join_step1.php">Sign Up</a></li>
				<li<?if($nav_id == 3){?> class="on"<?}?>><a href="/fdi_eng/member/findid.php">Find ID/PW</a></li>
			</ul>
		</div> -->
		<?
		}
	}
	?>