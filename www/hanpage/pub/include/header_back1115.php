<?
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrMenuList = getCategoryList("","");
?>
	<!-- header -->
	<div class="dimmed"></div>
    <header>
        <div class="content_wrap">
            <h1 class="logo"><a href="index.html"><img src="/pub/images/logo2.png" alt="세림세무법인"></a></h1>
            <div class="header_right">
                <select name="lang" id="h_family" class="pc">
                    <option label="패밀리사이트" selected>패밀리사이트</option>
                    <option label="패밀리사이트1" value="family2">패밀리사이트1</option>
                    <option label="패밀리사이트2" value="family3">패밀리사이트2</option>
                    <option label="패밀리사이트3" value="family4">패밀리사이트3</option>
                    <option label="패밀리사이트4" value="family5">패밀리사이트4</option>
                    <option label="패밀리사이트4" value="family5">패밀리사이트4</option>
                </select>
                <div class="lang pc">
                    <a href="javascript:void(0);">KO</a>
                    <a href="javascript:void(0);">EN</a>
                </div>
                <select name="lang" id="lang" class="mo">
                    <option label="KO" value="KO" selected>KO</option>
                    <option label="EN" value="EN">EN</option>
                </select>
                <div class="ham">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="search_wrap">
                    <form name="search" action="" method="post">
                        <input type="text" class="search_txt" placeholder="검색어를 입력해주세요.">
                        <button type="submit" class="search_btn"></button>
                    </form>
                </div>
                <div class="member_wrap">
                    <a href="javascript:void(0);">로그인</a>
                    <a href="javascript:void(0);">회원가입</a>
                </div>
            </div>
        </div>

        <nav class="gnb">
            <h2 class="hidden">navigation</h2>
            <div class="content_wrap">
                <ul class="gnb_main">
				<?
				for($i=0;$i<$arrMenuList["total"];$i++){
					if($arrMenuList["list"][$i]["cat_is_show"]=="Y"){
						$arrSubMenuList[$i] = getCategoryList($arrMenuList["list"][$i]["cat_no"],"");
						echo '<li><div class="menu_wrap">';
						echo '<a href="/sub/?is='.$i.'&cat_no='.$arrSubMenuList[$i]["list"][0]["cat_no"].'">'.$arrMenuList["list"][$i]["cat_name"].'</a>';
						echo '<ul class="gnb_sub">';						
						for($j=0;$j<$arrSubMenuList[$i]["total"];$j++){
							if($arrSubMenuList[$i]["list"][$j]["cat_is_show"]=="Y"){
								$arrSubMenuName[$arrSubMenuList[$i]["list"][$j]["cat_no"]] = $arrSubMenuList[$i]["list"][$j]["cat_name"];	## 페이지 타이틀
								$arrSubMenuLnb[$arrSubMenuList[$i]["list"][$j]["cat_no"]] = '<span>'.$arrMenuList["list"][$i]["cat_name"].'</span><span class="last">'.$arrSubMenuList[$i]["list"][$j]["cat_name"].'</span>';
								echo '<li><a href="/sub/?cat_no='.$arrSubMenuList[$i]["list"][$j]["cat_no"].'">'.$arrSubMenuList[$i]["list"][$j]["cat_name"].'</a></li>';
							}
						}
						echo '</ul></div></li>';
					}
				}
				?>                   
                </ul>
            </div>
        </nav>
        <nav class="mo_gnb">
            <h2 class="hidden">mobile gnb</h2>
			<div class="content_wrap">
				<a href="javascript:void(0);">상담센터</a>
				<a href="javascript:void(0);">회사설립지원</a>
				<a href="javascript:void(0);">외국인투자기업</a>
				<a href="javascript:void(0);">세무실무사례</a>
			</div>
        </nav>
    </header>
    <!-- header end -->
<?
//DB해제
SetDisConn($dblink);
?>