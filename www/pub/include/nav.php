<?php if ( !( $_REQUEST['_cat_type'] == 'A' || $_REQUEST['_cat_type'] == 'M' ) ){ ?>
    <!-- sub_title -->
    <div class="sub_title k_link_box">
        <div class="content_wrap cw_tt<?php echo $_title_code; ?>">

            <?php if ( $_REQUEST["cat_no"] == '999' ) { ?>
                <p class="sub_text t2">
                    세림세무법인은<br />
                    외국인 투자기업이 <strong>한국에서</strong><br />
                    <strong>성공적인 기업활동</strong>을 하도록<br />
                    최선을 다하고 있습니다.
                </p>

            <?php } else if ($_title_code == 13) { ?>
                <div class="sub_text">
                    <div class="inner inn1">
                        <h4 class="blue_txt">[ One Stop Service ]</h4>

                        <div class="txt t1">
                            · 한국 내에 투자법인이나 <br class="mo_vw"/><span class="mo_vw inline_block">&nbsp;&nbsp;&nbsp;</span>외국법인의 국내지사, 지점, 연락사무소를<br/>
                            &nbsp;&nbsp;&nbsp;설치하려는 외국인투자가를 위하여<br/>
                            &nbsp;&nbsp;&nbsp;각 단계별 <strong>One Stop Service</strong>로 지원해 드립니다.<br/>
                        </div>
                    </div>
                </div>
                <a class="btn btn-link btn-fdi-link absol" href="http://www.fdihelpcenter.co.kr/" target="_blank" rel="noopener">
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
                <p class="sub_text">
                    어떠한 업무이던 <br /><strong>고객님의 눈높이에 맞추어서</strong><br />
                    자문하고 상담해드립니다
                </p>
            <?php } ?>
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
			Kakao.init('74546251e56d8047240891a67beafc9c');
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
<?php } ?>
<!-- sub_title end -->

<?php if($_REQUEST["cat_no"] !=""){ // 지정된 메뉴로 들어가 있을때 이 메뉴가 표시됩니다. ?>
    <!-- sub_nav -->

    <?php
    // cat_sort 가져오기
    $dblink = SetConn($_conf_db["main_db"]);

    $arrNavCatInfo = getCategoryInfo($_REQUEST["cat_no"]);
    $arrNavCatCode = isset($arrNavCatInfo["list"][0]['cat_code']) ? $arrNavCatInfo["list"][0]['cat_code'] : '';

    SetDisConn($dblink);

    $arrNavCatCodeArr = explode('/', (string)$arrNavCatCode);

    $onoff_menu_class = '';
    if ( isset($arrNavCatCodeArr[0]) && $arrNavCatCodeArr[0] == '15' ) {
        $onoff_menu_class = 'onoff_menu';
        if ( $_REQUEST["cat_no"] != '41' ) {
            $onoff_menu_class .= ' close_menu';
        }
    }

    $_sub_tab_num = ($arrTCode[0] == '215') ? 4 : $arrMenu['two'][$arrTCode[0]]['show_total'];

    // 월별 cat_no 매핑 (기존 switch 동일 동작)
    $monthCatMap = array(
        1  => '87',  2  => '88',  3  => '89',  4  => '90',
        5  => '91',  6  => '92',  7  => '93',  8  => '94',
        9  => '95',  10 => '96',  11 => '97',  12 => '98',
    );

    // type 역탐색 캐시
    $navTypeCache = array();

    if (!function_exists('selim_nav_find_type_all_levels')) {
        /**
         * code 기준으로 Depth2~Depth5 어디에든 type(O/W 등)가 있으면 반환.
         * - 실제 배열 키: two / thr / for / fiv
         * - groupKey(부모코드)가 섞여있어도 안전하게 전체 그룹을 순회한다.
         */
        function selim_nav_find_type_all_levels($code, $arrMenu, &$cache) {
            $cacheKey = 'type|' . (string)$code;
            if (isset($cache[$cacheKey])) return $cache[$cacheKey];

            $levels = array('two', 'thr', 'for', 'fiv');

            foreach ($levels as $lv) {
                if (!isset($arrMenu[$lv]) || !is_array($arrMenu[$lv])) continue;

                foreach ($arrMenu[$lv] as $groupKey => $group) {
                    if (!is_array($group)) continue;
                    if (!isset($group['total'])) continue;

                    $total = (int)$group['total'];
                    for ($i = 0; $i < $total; $i++) {
                        if (!isset($group[$i]) || !is_array($group[$i])) continue;
                        if (!isset($group[$i]['code'])) continue;

                        if ((string)$group[$i]['code'] === (string)$code) {
                            $type = isset($group[$i]['type']) ? (string)$group[$i]['type'] : '';
                            $cache[$cacheKey] = $type;
                            return $type;
                        }
                    }
                }
            }

            $cache[$cacheKey] = '';
            return '';
        }
    }

    if (!function_exists('selim_nav_build_li_class')) {
        /**
         * li 클래스 규칙:
         * - 현재 메뉴면 on
         * - 아니고 type=O면 emphasis
         * - type=O/W면 nav-point
         */
        function selim_nav_build_li_class($isOn, $type) {
            $type = strtoupper(trim((string)$type));

            $classes = array();

            if ($isOn) {
                $classes[] = 'on';
            }
            if ($type === 'O') {
                $classes[] = 'emphasis';
            }
            if ($type === 'O' || $type === 'W') {
                $classes[] = 'nav-point';
            }

            $classes = array_values(array_unique($classes));
            return empty($classes) ? '' : ' class="'.htmlspecialchars(implode(' ', $classes), ENT_QUOTES, 'UTF-8').'"';
        }
    }
    ?>

    <div class="subNav_wrap <?=$onoff_menu_class?>">
        <div class="sub_nav_wrap">
            <ul class="sub_nav sub_tab<?=$_sub_tab_num?>">
                <?php
                for($j=0; $j<$arrMenu['two'][$arrTCode[0]]['total']; $j++){

                    $code    = $arrMenu['two'][$arrTCode[0]][$j]['code'];
                    $name    = $arrMenu['two'][$arrTCode[0]][$j]['name'];
                    $linkCat = isset($arrMenu['catLink'][$code]) ? (string)$arrMenu['catLink'][$code] : '';

                    // 핵심 수정: two/thr/for/fiv 전체에서 code의 type을 확정
                    $typeAll = selim_nav_find_type_all_levels($code, $arrMenu, $navTypeCache);

                    $isOn = ($arrTCode[1] == $code);
                    $liClassAttr = selim_nav_build_li_class($isOn, $typeAll);

                    // 링크 생성 (기존 분기 유지)
                    if ($linkCat === '87') {
                        $month = (int)date('n');
                        $targetCat = isset($monthCatMap[$month]) ? $monthCatMap[$month] : $linkCat;
                        $href = '/sub/?cat_no=' . $targetCat;

                        echo '<li'.$liClassAttr.'><a href="'.htmlspecialchars($href, ENT_QUOTES, 'UTF-8').'">'.htmlspecialchars($name, ENT_QUOTES, 'UTF-8').'</a></li>';

                    } else if ($linkCat === '339') {
                        // 기존 link-btn 유지 + nav-point/강조/on을 합쳐서 부여
                        $extClasses = array('link-btn');

                        if ($isOn) $extClasses[] = 'on';
                        else if ($typeAll === 'O') $extClasses[] = 'emphasis';
                        if ($typeAll === 'O' || $typeAll === 'W') $extClasses[] = 'nav-point';

                        $extClassAttr = ' class="'.htmlspecialchars(implode(' ', array_values(array_unique($extClasses))), ENT_QUOTES, 'UTF-8').'"';

                        echo '<li'.$extClassAttr.'><a href="https://semugpt.co.kr/" target="_blank" rel="noopener" data-skip-on="1">'.htmlspecialchars($name, ENT_QUOTES, 'UTF-8').'</a></li>';

                    } else {
                        $href = '/sub/?cat_no=' . $linkCat;
                        echo '<li'.$liClassAttr.'><a href="'.htmlspecialchars($href, ENT_QUOTES, 'UTF-8').'">'.htmlspecialchars($name, ENT_QUOTES, 'UTF-8').'</a></li>';
                    }
                }
                ?>
            </ul>

            <?php if ( isset($arrNavCatCodeArr[0]) && $arrNavCatCodeArr[0] == '15' ) { ?>
                <?php if ( $_REQUEST["cat_no"] == '41' ) { ?>
                    <a class="onoff_btn close">
                        <span class="menu_txt">메뉴</span>&nbsp;<span class="onoff_txt">접기</span>
                    </a>
                <?php } else { ?>
                    <a class="onoff_btn open">
                        <span class="menu_txt">메뉴</span>&nbsp;<span class="onoff_txt">펼치기</span>
                    </a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>

    <!-- sub_nav end -->
    <?php
}else{ // 지정된 메뉴로 되어있지 않았을 때 이 메뉴가 표시됩니다.
    if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){ // 로그인 후
        ?>
        <div class="subNav_wrap">
            <ul class="sub_nav sub_tab5">
                <li<?if($nav_id == 1){?> class="on"<?}?>><a href="javascript:alert('준비중입니다.');">상담메일 리스트</a></li>
                <li<?if($nav_id == 2){?> class="on"<?}?>><a href="/mypage/mypage.php">마이페이지</a></li>
                <li<?if($nav_id == 3){?> class="on"<?}?>><a href="/mypage/user_info.php">회원정보수정</a></li>
                <li<?if($nav_id == 4){?> class="on"<?}?>><a href="/sub/agree.php">이용약관</a></li>
                <li<?if($nav_id == 5){?> class="on"<?}?>><a href="/sub/policy.php">개인정보 처리방침</a></li>
            </ul>
        </div>
    <?php }else{ // 로그인 전 ?>
        <div class="subNav_wrap">
            <ul class="sub_nav sub_tab5">
                <li<?if($nav_id == 1){?> class="on"<?}?>><a href="/member/login.php">로그인</a></li>
                <li<?if($nav_id == 2){?> class="on"<?}?>><a href="/member/join_step1.php">회원가입</a></li>
                <li<?if($nav_id == 3){?> class="on"<?}?>><a href="/member/findid.php">아이디/비밀번호 찾기</a></li>
                <li<?if($nav_id == 4){?> class="on"<?}?>><a href="/sub/agree.php">이용약관</a></li>
                <li<?if($nav_id == 5){?> class="on"<?}?>><a href="/sub/policy.php">개인정보처리방침</a></li>
            </ul>
        </div>
        <?php
    }
}
?>
