<?
@session_start();
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$que_where= " order by cat_depth asc, cat_sort asc";	// And cat_is_show='Y'
$arrMenuList = getCategoryFree($que_where);

function ipBlock($ip, $iplist)
{
    foreach ($iplist as $value) {
        if (strpos($ip, $value) === 0) return true;
        else continue;
    }
    return false;
}
$ip = $_SERVER['REMOTE_ADDR'];
$ipBanList = getArticleAll($_conf_tbl["ip_ban"]);

$_ip_ban_list = array();
foreach( $ipBanList['list'] as $val ) {
    array_push($_ip_ban_list, $val['ip']);
}
if (ipBlock($ip, $_ip_ban_list)) echo
"
	<script>
			window.alert('접근이 거부 되었습니다.');
			location.href='404'; // 강제 이동시켜 버리거나 아님 창을 닫아 버리거나
			exit;
	</script>
	";
else echo "";

//DB해제
SetDisConn($dblink);

$ai = 0;
for($i=0;$i<$arrMenuList["total"];$i++){
	$arrMenu['catCode'][$arrMenuList["list"][$i]["cat_no"]] = $arrMenuList["list"][$i]["cat_code"];
	$arrMenu['catName'][$arrMenuList["list"][$i]["cat_no"]] = $arrMenuList["list"][$i]["cat_name"];
	if($arrMenuList["list"][$i]["cat_link_idx"]>0){
		$arrMenu['catLink'][$arrMenuList["list"][$i]["cat_no"]] = $arrMenuList["list"][$i]["cat_link_idx"];
	}else{
		$arrMenu['catLink'][$arrMenuList["list"][$i]["cat_no"]] = $arrMenuList["list"][$i]["cat_no"];
	}

	$arrCatCode = explode("/",$arrMenuList["list"][$i]["cat_code"]);
	if($arrMenuList["list"][$i]["cat_depth"]==0){	## Depth 1
		$arrMenu['one'][$ai]['name'] = $arrMenuList["list"][$i]["cat_name"];
		$arrMenu['one'][$ai]['code'] = $arrMenuList["list"][$i]["cat_no"];
		$arrMenu['one'][$ai]['show'] = $arrMenuList["list"][$i]["cat_is_show"];
		$ai++;		
		$arrMenu['one']['total'] = $ai;
		$bi[$arrCatCode[0]] = 0;
		$show_bi[$arrCatCode[0]] = 0;
	}
	if($arrMenuList["list"][$i]["cat_depth"]==1){	## Depth 2
		$pcode = $arrCatCode[0];							## 부모코드
		$arrMenu['two'][$pcode][$bi[$pcode]]['name']	= $arrMenuList["list"][$i]["cat_name"];
		$arrMenu['two'][$pcode][$bi[$pcode]]['code']	= $arrMenuList["list"][$i]["cat_no"];
		$arrMenu['two'][$pcode][$bi[$pcode]]['type']	= $arrMenuList["list"][$i]["cat_use_type"]; // 타입을 기억하기 위함 // nav 에서 사용
		$arrMenu['two'][$pcode][$bi[$pcode]]['show']	= $arrMenuList["list"][$i]["cat_is_show"];
		$bi[$pcode]++;										## 순번 증가
		if($arrMenuList["list"][$i]["cat_is_show"] == "Y"){ // show 가 N인 것 제외
			$show_bi[$pcode]++;
		}
		$arrMenu['two'][$pcode]['show_total']				= $show_bi[$pcode];		## 총개수 - show 가 N인 것 제외
		$arrMenu['two'][$pcode]['total']					= $bi[$pcode];		## 총개수
		$ci[$arrCatCode[1]] = 0;
		$show_ci[$arrCatCode[1]] = 0;
	}	
	if($arrMenuList["list"][$i]["cat_depth"]==2){	## Depth 3
		$pcode = $arrCatCode[1];							## 부모코드
		$arrMenu['thr'][$pcode][$ci[$pcode]]['name']	= $arrMenuList["list"][$i]["cat_name"];
		$arrMenu['thr'][$pcode][$ci[$pcode]]['code']	= $arrMenuList["list"][$i]["cat_no"];
		$arrMenu['thr'][$pcode][$ci[$pcode]]['type']	= $arrMenuList["list"][$i]["cat_use_type"]; // 타입을 기억하기 위함 // /sub/index 에서 사용
		$arrMenu['thr'][$pcode][$ci[$pcode]]['show']	= $arrMenuList["list"][$i]["cat_is_show"];
		$ci[$pcode]++;										## 순번 증가
		if($arrMenuList["list"][$i]["cat_is_show"] == "Y"){ // show 가 N인 것 제외
			$show_ci[$pcode]++;
		}
		$arrMenu['thr'][$pcode]['show_total']				= $show_ci[$pcode];		## 총개수 - show 가 N인 것 제외
		$arrMenu['thr'][$pcode]['total']				= $ci[$pcode];		## 총개수 
		$di[$arrCatCode[2]] = 0;
		$show_di[$arrCatCode[2]] = 0;
	}	
	if($arrMenuList["list"][$i]["cat_depth"]==3){	## Depth 4
		$pcode = $arrCatCode[2];							## 부모코드
		$arrMenu['for'][$pcode][$di[$pcode]]['name']	= $arrMenuList["list"][$i]["cat_name"];
		$arrMenu['for'][$pcode][$di[$pcode]]['code']	= $arrMenuList["list"][$i]["cat_no"];
		$arrMenu['for'][$pcode][$di[$pcode]]['type']	= $arrMenuList["list"][$i]["cat_use_type"]; // 타입을 기억하기 위함 // /sub/index 에서 사용
		$arrMenu['for'][$pcode][$di[$pcode]]['show']	= $arrMenuList["list"][$i]["cat_is_show"];
		$di[$pcode]++;										## 순번 증가
		$arrMenu['for'][$pcode]['total'] = $di[$pcode];		## 총개수
		if($arrMenuList["list"][$i]["cat_is_show"] == "Y"){ // show 가 N인 것 제외
			$show_di[$pcode]++;
		}
		$arrMenu['for'][$pcode]['show_total']				= $show_di[$pcode];		## 총개수 - show 가 N인 것 제외
	}	
}

$catNo		= $_REQUEST["cat_no"]??"0";
$arrTCode	= explode("/",$arrMenu['catCode'][$catNo]);

$lnbTitle = '<span>'.$arrMenu['catName'][$arrTCode[0]].'</span>';
if($arrTCode[2]){ 
	$lnbTitle .= '<span>'.$arrMenu['catName'][$arrTCode[1]].'</span>';
	if($arrTCode[3]){
		$lnbTitle .= '<span>'.$arrMenu['catName'][$arrTCode[2]].'</span>';
		$lnbTitle .= '<span class="last">'.$arrMenu['catName'][$arrTCode[3]].'</span>';
	}else{
		$lnbTitle .= '<span class="last">'.$arrMenu['catName'][$arrTCode[2]].'</span>';
	}
}else{
	$lnbTitle .= '<span class="last">'.$arrMenu['catName'][$arrTCode[1]].'</span>';
}	
?>
	<!-- header -->
	<div class="dimmed"></div>
    <header>
        <div class="header_wrap">
            <h1 class="logo"><a href="/ch"><img src="/ch/pub/images/logo2.png" alt="selim"></a></h1>
            <div class="header_right">
<!--                <div class="family_box">-->
<!--                    <ul class="pc family_box211112">-->
<!--                        <li>FAMILY SITE</li>-->
<!--                    </ul>-->
<!--                    <ul class="family_sbox">-->
<!--                        <a href="http://taxoffice2.hk-test.co.kr/" target=""><li>SELIM KOREAN</li></a>-->
<!--                        <a href="http://taxoffice2.hk-test.co.kr/ch/" target=""><li>SELIM ENGLISH</li></a>-->
<!--                        <a href="javascript:void(0);" onclick="alert('Service is being prepared')"><li>CALL CENTER</li></a>-->
<!--                        <a href="javascript:void(0);" onclick="alert('Service is being prepared')"><li>HAN-PAGE</li></a>-->
<!--                    </ul>-->
<!--                </div>-->
                <div class="family_link pc" style="padding:0 0.5rem; margin-right:0.5rem; min-width:5.0rem;">
                    <a href="http://www.taxcall.co.kr/">呼叫中心</a>
                </div>
                <div class="lang pc">
                    <a href="http://www.taxoffice.co.kr/">韩国人</a>
                    <a href="http://www.etaxoffice.co.kr/eng/">英语</a>
                    <a href="http://www.taxoffice.cn/ch/">简体中文</a>
                </div>
<!--				<div class="mo sbox_1230">-->
<!--					<ul class="mo_family_box">-->
<!--						<li>FAMILY SITE</li>-->
<!--					</ul>-->
<!--					<ul class="family_sbox">-->
<!--						<a href="http://www.taxoffice.co.kr/" target=""><li>SELIM KOREAN</li></a>-->
<!--						<a href="http://www.etaxoffice.co.kr/" target=""><li>SELIM ENGLISH</li></a>-->
<!--						<a href="javascript:void(0);" onclick="alert('Service is being prepared')"><li>CALL CENTER</li></a>-->
<!--						<a href="javascript:void(0);" onclick="alert('Service is being prepared')"><li>HAN-PAGE</li></a>-->
<!--					</ul>-->
<!--				</div>-->
				<div class="family_box mo">
					<ul class="family_box211112">
						<li>ENG</li>
					</ul>
					<ul class="family_sbox">
						<li><a href="http://www.taxoffice.co.kr/">KOR</a></li>
						<li><a href="http://www.etaxoffice.co.kr/">ENG</a></li>
					</ul>
				</div>
                <div class="ham">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!-- <div class="search_wrap">
                    <form name="search" action="/sub" method="get">
                						<input type="hidden" name="boardid" value="total">
                						<input type="hidden" name="cat_no" value="0">
                        <input type="text" class="search_txt" name="sk" placeholder="검색어를 입력해주세요.">
                        <button type="submit" class="search_btn"><img src="/pub/images/search.png"/></button>
                    </form>
                </div> -->
                <div class="member_wrap">
				<?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){?>
                    <a href="/module/member/ch_logout.php">登出</a>
                    <a href="/ch/mypage/user_info.php">我的页面</a>
				<?}else{?>
					<a href="/ch/member/login.php">登录</a>
                    <a href="/ch/member/join_step1.php">登记</a>
				<?}?>
                </div>
            </div>
        </div>

        <nav class="gnb">
            <h2 class="hidden">navigation</h2>
            <div class="content_wrap">
                <ul class="gnb_main">
				<?
				for($i=0;$i<$arrMenu['one']['total'];$i++){	
					if($arrMenu['one'][$i]['show']=="Y"){
						$tcode = $arrMenu['one'][$i]['code'];
						if($arrTCode[0] == $tcode){
							$sel_class = "menu_active";
						}else{
							$sel_class = "";
						}
						echo '<li><div class="menu_wrap">';
						echo '<a class="pc_vw '.$sel_class.'" href="/ch/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['one'][$i]['code']].'">'.$arrMenu['one'][$i]['name'].'</a>';
						
						if($i==4) {
							echo '<a class="mo_vw '.$sel_class.'" href="/ch/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['one'][$i]['code']].'">'.$arrMenu['one'][$i]['name'].'</a>';
						}else {
							echo '<a class="mo_vw '.$sel_class.'" href="javascript:void(0);">'.$arrMenu['one'][$i]['name'].'</a>';

							echo '<ul class="gnb_sub">';						
							for($j=0;$j<$arrMenu['two'][$tcode]['total'];$j++){
								if($arrMenu['two'][$tcode][$j]['show'] == "Y"){
									echo '<li><a href="/ch/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['two'][$tcode][$j]['code']].'">'.$arrMenu['two'][$tcode][$j]['name'].'</a></li>';
								}
							}
						}
						
						echo '</ul></div></li>';	
					}

				}
				?>                   
                </ul>
            </div>
        </nav>
        <!--<nav class="mo_gnb">
            <h2 class="hidden">mobile gnb</h2>
			<div class="content_wrap">
				<a href="/ch/sub/?cat_no=77">상담센터</a>
				<a href="/ch/sub/?cat_no=124">회사설립지원</a>
				<a href="/ch/sub/?cat_no=134">외국인투자기업</a>
				<a href="/ch/sub/?cat_no=41">세무실무사례</a>
			</div>
        </nav>-->
    </header>
    <!-- header end -->