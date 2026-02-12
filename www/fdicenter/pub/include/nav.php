<?php if ( !( $_REQUEST['_cat_type'] == 'A' || $_REQUEST['_cat_type'] == 'M' ) ){ ?>
<!-- sub_title -->
	<div class="sub_title k_link_box">
        <div class="content_wrap cw_tt<?php echo $_title_code; ?>">

            <?php if ($_title_code == 1) : ?>
            <p class="sub_text t3">
                <strong class="category blue_txt">사전상담</strong>
                사전 산담으로 외국인투자를 위한 투자방향을 명확히 할 수 있습니다.<br/>
                직접투자할지 ?<br/>
                지사형태로 투자할지 ? 결정<br/>
                외국인 투자에 관한 기본적인 절차를 이해할 수 있습니다.
            </p>
            <?php elseif ($_title_code == 2) : ?>
            <p class="sub_text t3">
                <strong class="category blue_txt">서류준비안내</strong>
                외국인투자기업, 외국법인의 국내지사 설립을 위한<br/>
                절차와 준비서류, 설립하는데 필요한 소요기간을 확인할 수 있습니다.
            </p>
            <?php elseif ($_title_code == 3) : ?>
            <p class="sub_text t3">
                <strong class="category blue_txt">은행신고절차</strong>
                외국인투자기업이나, 외국법인의 국내지사 설치를 위한 첫 절차로<br/>
                은행에 투자신고 절차 또는 지사설치 절차를 안내합니다.
            </p>
            <?php elseif ($_title_code == 4) : ?>
            <p class="sub_text t3">
                <strong class="category blue_txt">등기절차</strong>
                외투법인을 위한 등기절차를 안내합니다.<br/>
                외국법인의 지사설치 등기 절차를 안내합니다.
            </p>
            <?php elseif ($_title_code == 5) : ?>
            <p class="sub_text t3">
                <strong class="category blue_txt">사업자등록 신청</strong>
                등기 완료 후<br/>
                관할 세무서에 사업자등록 신청을 안내합니다.
            </p>
            <?php elseif ($_title_code == 6) : ?>
            <p class="sub_text t3">
                <strong class="category blue_txt">계좌개설지원</strong>
                사업자등록 후,<br/>
                외국인 투자법인 명의의 계좌개설을 지원합니다.<br/>
                외국법인의 국내지사 명의의 개좌개설을 지원합니다.
            </p>
            <?php elseif ($_title_code == 7) : ?>
            <p class="sub_text t3">
                <strong class="category blue_txt">설립이후 세무지원</strong>
                설립 이후 사업 운영에 관한<br/>
                세무지원을 해드립니다.
            </p>
            <?php elseif ($_title_code == 89) : ?>
            <p class="sub_text t3">
                <strong class="category blue_txt">투자금 송금 절차</strong>
                외국인투자 신고를 하면,<br/>
                신고은행으로 부터 투자금을 송금할 수 있는<br/>
                '송금안내문'을 받아서 투자자에게 전달합니다.
            </p>
            <?php else : ?>
            <p class="sub_text">
                외국인 투자기업 설립,<br/>
                외국법인의 국내지사 설립,<br/>
                <strong>One Stop Service</strong> 제공<br/>
                <strong class="category blue_txt">설립을 위한 사전 상담부터… <br class="mo_vw"/>사업자등록까지~</strong>
            </p>
            <?php endif; ?>
        </div>
    </div>
<?php } ?>
    <!-- sub_title end -->
	<?if($_REQUEST["cat_no"] !=""){ // 지정된 메뉴로 들어가 있을때 이 메뉴가 표시됩니다.?>
    <!-- sub_nav -->


    <?php
    // cat_sort 가져오기
    $dblink = SetConn($_conf_db["main_db"]);

    $arrNavCatInfo = getCategoryInfo($_REQUEST["cat_no"]);
    $arrNavCatCode = $arrNavCatInfo["list"][0]['cat_code'];

    SetDisConn($dblink);

    $arrNavCatCodeArr = explode('/', $arrNavCatCode);

    $onoff_menu_class = '';
    if ( $arrNavCatCodeArr[0] == '15' ) {
        $onoff_menu_class = 'onoff_menu';

        if ( $_REQUEST["cat_no"] != '41' ) {
            $onoff_menu_class = $onoff_menu_class . ' close_menu';
        }
    }
    ?>

    <div class="subNav_wrap <?=$onoff_menu_class?>">
        <?php
        $_sub_tab_num = 0;
        if ( $arrTCode[0] == '215' ) {
            $_sub_tab_num = 4;
        } else {
            $_sub_tab_num = $arrMenu['two'][$arrTCode[0]]['show_total'];
        }
        ?>
        <div class="sub_nav_wrap">
            <ul class="sub_nav sub_tab<?=$_sub_tab_num?>">
            <?
            for($j=0;$j<$arrMenu['two'][$arrTCode[0]]['total'];$j++){
                $navOnClass = "";
                if($arrTCode[1]==$arrMenu['two'][$arrTCode[0]][$j]['code']){
                    $navOnClass = "class='on'";
                }else if($arrMenu['two'][$arrTCode[0]][$j]['type'] == "O"){
                    $navOnClass = "class='emphasis'";
                }
                echo '<li '.$navOnClass.'><a href="'.$_SITE['URL_PREFIX'].'/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['two'][$arrTCode[0]][$j]['code']].'">'.$arrMenu['two'][$arrTCode[0]][$j]['name'].'</a></li>';
            }
            ?>
            </ul>
            <?php
            if ( $arrNavCatCodeArr[0] == '15' ) {
                ?>
                    <?php if ( $_REQUEST["cat_no"] == '41' ) { ?>
                    <a class="onoff_btn close">
                        <span class="menu_txt">메뉴</span>&nbsp;<span class="onoff_txt">접기</span>
                    </a>
                    <?php } else { ?>
                    <a class="onoff_btn open">
                        <span class="menu_txt">메뉴</span>&nbsp;<span class="onoff_txt">펼치기</span>
                    </a>
                    <?php } ?>
                <?php
            }
            ?>
        </div>
    </div>
    <!-- sub_nav end -->
	<?
	}else{ // 지정된 메뉴로 되어있지 않았을 때 이 메뉴가 표시됩니다.
		if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){ // 로그인 후
	?>
		<div class="subNav_wrap">
			<ul class="sub_nav sub_tab5">
				<li<?if($nav_id == 1){?> class="on"<?}?>><a href="javascript:alert('준비중입니다.');">상담메일 리스트</a></li>
				<li<?if($nav_id == 2){?> class="on"<?}?>><a href="/fdicenter/mypage/mypage.php">마이페이지</a></li>
				<li<?if($nav_id == 3){?> class="on"<?}?>><a href="/fdicenter/mypage/user_info.php">회원정보수정</a></li>
				<li<?if($nav_id == 4){?> class="on"<?}?>><a href="/fdicenter/sub/agree.php">이용약관</a></li>
				<li<?if($nav_id == 5){?> class="on"<?}?>><a href="/fdicenter/sub/policy.php">개인정보 처리방침</a></li>
			</ul>
		</div>
		<?}else{ // 로그인 전?>
		<div class="subNav_wrap">
			<ul class="sub_nav sub_tab5">
				<li<?if($nav_id == 1){?> class="on"<?}?>><a href="/fdicenter/member/login.php">로그인</a></li>
				<li<?if($nav_id == 2){?> class="on"<?}?>><a href="/fdicenter/member/join_step1.php">회원가입</a></li>
				<li<?if($nav_id == 3){?> class="on"<?}?>><a href="/fdicenter/member/findid.php">아이디/비밀번호 찾기</a></li>
				<li<?if($nav_id == 4){?> class="on"<?}?>><a href="/fdicenter/sub/agree.php">이용약관</a></li>
				<li<?if($nav_id == 5){?> class="on"<?}?>><a href="/fdicenter/sub/policy.php">개인정보처리방침</a></li>
			</ul>
		</div>
		<?
		}
	}
	?>