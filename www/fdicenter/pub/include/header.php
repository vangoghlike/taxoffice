<?
@session_start();

if(isset($_SESSION[$_SITE["DOMAIN"]]["SESSIONID"])){
    $_SESSION[$_SITE["DOMAIN"]]["SESSIONID"] = md5(rand().microtime());//쇼핑몰 고유 세션 아이디
}

include $_SERVER['DOCUMENT_ROOT'] . "/module/log/log.lib.php";

if(!$_SESSION[$_SITE["DOMAIN"]]["CHECKFLAG"]){
    //setcookie("websight_log_count", "1", time()+(86400), "/", $_SITE["DOMAIN"]);
    $_SESSION[$_SITE["DOMAIN"]]["CHECKFLAG"]=true;
    $dblink = SetConn($_conf_db["main_db"]);
    insertLog();
    SetDisConn($dblink);
}

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$que_where= " order by cat_depth asc, cat_sort asc";	// And cat_is_show='Y'
$arrMenuList = getCategoryFree($que_where);

// 118.219.86.242
function ipBlock($ip, $iplist)
{
    $_ip_explode = explode('.',$ip);
    $_ip_explode_val = $_ip_explode[0] . '.' . $_ip_explode[1] . '.';
    foreach ($iplist as $value) {
        if ( strpos($value,'+') !== false ) {
            $_val_explode = explode('.',$value);
            $_val_explode_val = $_val_explode[0] . '.' . $_val_explode[1] . '.';
            if ( $_ip_explode_val == $_val_explode_val ) {
                return true;
            } else {
                continue;
            }
        } else {
            if (strpos($ip, $value) === 0) {
                return true;
            }
            else {
                continue;
            }
        }
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
		$arrMenu['thr'][$pcode][$ci[$pcode]]['type']	= $arrMenuList["list"][$i]["cat_use_type"]; // 타입을 기억하기 위함 // /fdicenter/sub/index 에서 사용
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
		$arrMenu['for'][$pcode][$di[$pcode]]['type']	= $arrMenuList["list"][$i]["cat_use_type"]; // 타입을 기억하기 위함 // /fdicenter/sub/index 에서 사용
		$arrMenu['for'][$pcode][$di[$pcode]]['show']	= $arrMenuList["list"][$i]["cat_is_show"];
		$di[$pcode]++;										## 순번 증가
		$arrMenu['for'][$pcode]['total'] = $di[$pcode];		## 총개수
		if($arrMenuList["list"][$i]["cat_is_show"] == "Y"){ // show 가 N인 것 제외
			$show_di[$pcode]++;
		}
		$arrMenu['for'][$pcode]['show_total']				= $show_di[$pcode];		## 총개수 - show 가 N인 것 제외
	}
    if($arrMenuList["list"][$i]["cat_depth"]==4){	## Depth 5
        $pcode = $arrCatCode[3];							## 부모코드

        if ( $di[$pcode] == '') $di[$pcode] = 0;
        $arrMenu['fiv'][$pcode][$di[$pcode]]['name']	= $arrMenuList["list"][$i]["cat_name"];
        $arrMenu['fiv'][$pcode][$di[$pcode]]['code']	= $arrMenuList["list"][$i]["cat_no"];
        $arrMenu['fiv'][$pcode][$di[$pcode]]['type']	= $arrMenuList["list"][$i]["cat_use_type"]; // 타입을 기억하기 위함 // /fdicenter/sub/index 에서 사용
        $arrMenu['fiv'][$pcode][$di[$pcode]]['show']	= $arrMenuList["list"][$i]["cat_is_show"];
        $di[$pcode]++;										## 순번 증가
        $arrMenu['fiv'][$pcode]['total'] = $di[$pcode];		## 총개수
        if($arrMenuList["list"][$i]["cat_is_show"] == "Y"){ // show 가 N인 것 제외
            $show_di[$pcode]++;
        }
        $arrMenu['fiv'][$pcode]['show_total']				= $show_di[$pcode];		## 총개수 - show 가 N인 것 제외

    }
}

$catNo		= $_REQUEST["cat_no"] ?? "";
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
            <div class="header_left">
                <h1 class="logo"><a href="/"><img src="/fdicenter/pub/images/fdi_logo_ko.png?v=1" alt="세림세무법인 FDI 헬프 센터"></a></h1>

                <div class="lang pc">
                    <a href="/" class="on">KOR</a>
                    <a href="http://www.fdihelpcenter.com/">ENG</a>
                </div>

                <div class="selim_link" style="padding:0 0.5rem; box-sizing: border-box; padding:0 0.125rem; height:1.25rem;">
                    <a href="https://taxoffice.co.kr/" class="hd_sub_link">
                        <span>세림세무법인</span></a>
                </div>
                <div class="family_link" style="padding:0 0.5rem; box-sizing: border-box; padding:0 0.125rem; height:1.25rem;">
                    <a href="http://www.han-page.co.kr" class="hd_sub_link">
                        <img src="/pub/images/footer_ico1.png"/>
                        <span>상담센터</span></a>
                </div>
            </div>

            <div class="header_right">
                <div class="ham">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="member_wrap">
<!--                    --><?//if($_COOKIE['selim_login'] != ""){?>
				<?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){?>
                    <a href="/module/member/logout.php">로그아웃</a>
                    <a href="/fdicenter/mypage/mypage.php">마이페이지</a>
				<?}else{?>
					<a href="/fdicenter/member/login.php">로그인</a>
                    <a href="/fdicenter/member/join_step1.php">회원가입</a>
				<?}?>
                </div>
            </div>
        </div>

        <nav class="gnb">
            <h2 class="hidden">navigation</h2>
            <div class="content_wrap">
                <ul class="gnb_main">
				<?
                $_title_code = '';
				for($i=0;$i<$arrMenu['one']['total'];$i++){
					if($arrMenu['one'][$i]['show']=="Y"){
						$tcode = $arrMenu['one'][$i]['code'];
						if($arrTCode[0] == $tcode){
							$sel_class = "menu_active";
                            $_title_code = $tcode;
						}else{
							$sel_class = "";
						}
						echo '<li class="hdmenu'.$i.' gnb_menu"><div class="menu_wrap">';
						echo '<a class="pc_vw '.$sel_class . ' ' . $arrTCode[0] . ' ' . $tcode . ' ' . $arrMenu['one']['total'] . '" href="/fdicenter/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['one'][$i]['code']].'">'.$arrMenu['one'][$i]['name'].'</a>';
						echo '<a class="mo_vw '.$sel_class.'" href="javascript:void(0);">'.$arrMenu['one'][$i]['name'].'</a>';
                        echo '</div>';
						echo '<div class="gnb_sub"><div class="inner">';
                        echo '<div class="gnb_sub_title"><div class="title">'.$arrMenu['one'][$i]['name'].'</div></div>';
                        echo '<ul class="gnb_sub_menu_list">';
						for($j=0;$j<$arrMenu['two'][$tcode]['total'];$j++){
							if($arrMenu['two'][$tcode][$j]['show'] == "Y"){
                                if ( $arrMenu['catLink'][$arrMenu['two'][$tcode][$j]['code']] == '87' ) {
                                    switch(date('n')) {
                                        case '1':
                                            echo '<li><a href="/fdicenter/sub/?cat_no=87">'.$arrMenu['two'][$tcode][$j]['name'].'</a></li>';
                                            break;
                                        case '2':
                                            echo '<li><a href="/fdicenter/sub/?cat_no=88">'.$arrMenu['two'][$tcode][$j]['name'].'</a></li>';
                                            break;
                                        case '3':
                                            echo '<li><a href="/fdicenter/sub/?cat_no=89">'.$arrMenu['two'][$tcode][$j]['name'].'</a></li>';
                                            break;
                                        case '4':
                                            echo '<li><a href="/fdicenter/sub/?cat_no=90">'.$arrMenu['two'][$tcode][$j]['name'].'</a></li>';
                                            break;
                                        case '5':
                                            echo '<li><a href="/fdicenter/sub/?cat_no=91">'.$arrMenu['two'][$tcode][$j]['name'].'</a></li>';
                                            break;
                                        case '6':
                                            echo '<li><a href="/fdicenter/sub/?cat_no=92">'.$arrMenu['two'][$tcode][$j]['name'].'</a></li>';
                                            break;
                                        case '7':
                                            echo '<li><a href="/fdicenter/sub/?cat_no=93">'.$arrMenu['two'][$tcode][$j]['name'].'</a></li>';
                                            break;
                                        case '8':
                                            echo '<li><a href="/fdicenter/sub/?cat_no=94">'.$arrMenu['two'][$tcode][$j]['name'].'</a></li>';
                                            break;
                                        case '9':
                                            echo '<li><a href="/fdicenter/sub/?cat_no=95">'.$arrMenu['two'][$tcode][$j]['name'].'</a></li>';
                                            break;
                                        case '10':
                                            echo '<li><a href="/fdicenter/sub/?cat_no=96">'.$arrMenu['two'][$tcode][$j]['name'].'</a></li>';
                                            break;
                                        case '11':
                                            echo '<li><a href="/fdicenter/sub/?cat_no=97">'.$arrMenu['two'][$tcode][$j]['name'].'</a></li>';
                                            break;
                                        case '12':
                                            echo '<li><a href="/fdicenter/sub/?cat_no=98">'.$arrMenu['two'][$tcode][$j]['name'].'</a></li>';
                                            break;
                                        default:
                                            echo '<li><a href="/fdicenter/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['two'][$tcode][$j]['code']].'">'.$arrMenu['two'][$tcode][$j]['name'].'</a></li>';
                                            break;
                                    }
                                } else {
                                    echo '<li><a href="/fdicenter/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['two'][$tcode][$j]['code']].'">'.$arrMenu['two'][$tcode][$j]['name'].'</a></li>';
                                }
							}
						}
						echo '</ul></div></div>';
                        echo '</li>';
					}
				}
				?>
                </ul>
            </div>
        </nav>
    </header>
    <!-- header end -->