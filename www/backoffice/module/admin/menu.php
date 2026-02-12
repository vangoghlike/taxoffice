<div class="admin-snb">
	<div class="snb-title"><h2>기본정보 관리</h2></div>
    <ul class="snb-menu">
        <li><a href="/backoffice/module/admin/admin_set.php">기본정보 설정</a></li>
		<li><a href="/backoffice/module/admin/admin.php">관리자 관리</a></li>
		<li><a href="/backoffice/module/admin/manager.php">세무사 관리</a></li>
		<li><a href="/backoffice/module/board/board_view.php?boardid=semu">세무사 관리(메인)</a></li>
		<!-- <li><a href="/backoffice/module/board/board_view.php?boardid=semueng">세무사 관리(영문메인)</a></li> -->
		<? if(in_array("banner_manage", $arrayMyMenu) && (in_array("banner_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
		<li><a href="/backoffice/module/banner/banner.php">배너 관리</a></li>
		<li><a href="/backoffice/module/banner/banner_add.php">배너 등록</a></li>
		<?}?>
		<li><a href="/backoffice/module/admin/section_manager.php">지점 관리</a></li>
        <li><a href="/backoffice/module/admin/ip_ban.php">아이피 차단 관리</a></li>
    </ul>
    <?include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/admin_info.php";?>
</div>
    	
        
