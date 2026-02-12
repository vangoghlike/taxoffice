	<!-- sub_title -->
	<div class="sub_title">
        <div class="content_wrap cw_tt<?php echo $_title_code; ?>">
            <?php if ($_title_code == 3) { ?>
                <div class="sub_text">
                    <div class="inner inn1">
                        <h4 class="blue_txt">[ One Stop Service ]</h4>

                        <div class="txt t1">
                            <span class="pc_vw inline_block">·&nbsp;</span>For foreign investors seeking to establish an investment corporation in Korea—<br class="pc_vw"/>
                            <span class="pc_vw inline_block">&nbsp;&nbsp;&nbsp;</span>or to set up a domestic branch, liaison office, or subsidiary<br class="pc_vw"/>
                            <span class="pc_vw inline_block">&nbsp;&nbsp;&nbsp;</span>of an overseas corporation—we provide support through a One Stop Service
                        </div>
                        <div class="txt t2">
                            · We offer tailored, stage-by-stage services<br/>
                            &nbsp;&nbsp;&nbsp;for foreign investors across the entire process.
                        </div>
                    </div>
                </div>
                <a class="btn btn-link btn-fdi-link absol" href="http://www.fdihelpcenter.co.kr/" target="_blank">
                    <div class="inner tac">
                        <div class="img-wrap">
                            <img src="/pub/images/ico/ico-home.png" alt="home icon"/>
                        </div>
                        <div class="txt-wrap">
                            <span class="main-txt">FDI Help Center</span><br/>
                            <span class="sub-txt">(One Stop Service)</span>
                        </div>
                    </div>
                </a>
            <?php } else { ?>
                <?php if ( $_REQUEST["cat_no"] == '50' || $_REQUEST["cat_no"] == '51' || $_REQUEST["cat_no"] == '52' ||
                    $_REQUEST["cat_no"] == '53' || $_REQUEST["cat_no"] == '54' || $_REQUEST["cat_no"] == '55' ) { ?>
                <p class="sub_text t2">
                    Selim Tax & Accounting Firm <br/>
                    makes its utmost effort for <br/>
                    <strong>the success of our foreign clients </strong><br/>
                    investing in the Republic of Korea.
                </p>
                <?php } else if ( $_REQUEST["cat_no"] == '29' || $_REQUEST["cat_no"] == '30' || $_REQUEST["cat_no"] == '31' || $_REQUEST["cat_no"] == '32' ||
                    $_REQUEST["cat_no"] == '33' || $_REQUEST["cat_no"] == '34' || $_REQUEST["cat_no"] == '35' || $_REQUEST["cat_no"] == '36' || $_REQUEST["cat_no"] == '37' ||
                    $_REQUEST["cat_no"] == '38' || $_REQUEST["cat_no"] == '39' || $_REQUEST["cat_no"] == '40' || $_REQUEST["cat_no"] == '41' || $_REQUEST["cat_no"] == '42' ||
                    $_REQUEST["cat_no"] == '27' || $_REQUEST["cat_no"] == '28' ) { ?>
                <p class="sub_text t2">
                    Each business has different needs. <br/>
                    Our experienced CTAs are ready to meet you <br/>
                    where you are.<br/>
                </p>
                <?php } else if ( $_REQUEST["cat_no"] == '61' || $_REQUEST["cat_no"] == '62' || $_REQUEST["cat_no"] == '63' ||
                    $_REQUEST["cat_no"] == '64' || $_REQUEST["cat_no"] == '65' ) { ?>
                    <p class="sub_text t2">
                        Stay ahead of changes impacting <br/>
                        the financial accounting <br/>
                        and reporting of income taxes.<br/>
                    </p>
                <?php } else if ( $_REQUEST["cat_no"] == '66' || $_REQUEST["cat_no"] == '67' || $_REQUEST["cat_no"] == '68' || $_REQUEST["cat_no"] == '69' ) { ?>
                    <p class="sub_text t2">
                        Whether you’re just starting out <br/>
                        or looking to expand, <br/>
                        we are here to help.<br/>
                    </p>
                <?php } else if ( $_REQUEST["cat_no"] == '6' ) { ?>
                    <p class="sub_text t2">
                        Enjoy easy access and refer to <br/>
                        a collection of URLs <br/>
                        that help you find what you need. <br/>
                        Any difficulties? Just contact us<br/>
                    </p>
                <?php }else{ ?>
                <p class="sub_text">
                    No matter what your tax matter is,<br />
                    our professional tax experts<br />
                    <strong>serve for your business success.</strong>
                </p>
                <?php } ?>
            <?php } ?>


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
					echo '<li '.$navOnClass.'><a href="/eng/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['two'][$arrTCode[0]][$j]['code']].'">'.$arrMenu['two'][$arrTCode[0]][$j]['name'].'</a></li>';
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
				<li<?if($nav_id == 3){?> class="on"<?}?>><a href="/eng/mypage/user_info.php">User Info</a></li>
				<li<?if($nav_id == 4){?> class="on"<?}?>><a href="/eng/sub/agree.php">Terms of Use</a></li>
				<li<?if($nav_id == 5){?> class="on"<?}?>><a href="/eng/sub/policy.php">privacy policy</a></li> 
			</ul>
		</div> -->
		<?}else{ // 로그인 전?>
		<!-- <div class="subNav_wrap">
			<ul class="sub_nav sub_tab3">
				<li<?if($nav_id == 1){?> class="on"<?}?>><a href="/eng/member/login.php">Login</a></li>
				<li<?if($nav_id == 2){?> class="on"<?}?>><a href="/eng/member/join_step1.php">Sign Up</a></li>
				<li<?if($nav_id == 3){?> class="on"<?}?>><a href="/eng/member/findid.php">Find ID/PW</a></li>    
			</ul>
		</div> -->
		<?
		}
	}
	?>