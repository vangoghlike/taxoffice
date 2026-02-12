<div class="admin-snb">
	<div style="padding-top:0px;"></div>

	<?
	if(isset($_REQUEST['boardid'])){
	switch ($_REQUEST['boardid']){
		case 'ktoamember' : ?>
	<div class="snb-title"><h2>회원관리</h2></div>
    <ul class="snb-menu">
		<li><a href="/backoffice/module/board/board_view.php?boardid=ktoamember">회원관리</a></li>
    </ul>
	<?
		break;
		case 'sutechnology':
		case 'suapplication':
		case 'sugallery':
	?>
	<div class="snb-title"><h2>행사 관리</h2></div>
    <ul class="snb-menu">
		<li><a href="/backoffice/module/category/category.php?cat_gubun=event">행사 카테고리 관리</a></li>
		<li><a href="/backoffice/module/board/board_view.php?boardid=sutechnology">출품 기술 관리</a></li>
		<li><a href="/backoffice/module/board/board_view.php?boardid=suapplication">참가신청 관리</a></li>
		<li><a href="/backoffice/module/board/board_view.php?boardid=sugallery">행사 갤러리 관리</a></li>
    </ul>
	<?
		break;
		case 'suconsulting':
		case 'suinquiry':
		case 'schedule':
	?>
	<div class="snb-title"><h2>문의 관리</h2></div>
    <ul class="snb-menu">
		<li><a href="/backoffice/module/board/board_cal.php?boardid=schedule">신청내역 관리</a></li>
		<li><a href="/backoffice/module/board/board_view.php?boardid=suconsulting">상담신청 내역 관리</a></li>
		<li><a href="/backoffice/module/board/board_view.php?boardid=suinquiry">기술이전 문의 관리</a></li>
    </ul>
	<?
		break;
		default :
	?>
	<div class="snb-title"><h2>게시판</h2></div>
    <ul class="snb-menu">
		<li><a href="#">게시판</a></li>
    </ul>
	<?
		break;
	}
	}
	?>
    <?include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/admin_info.php";?>
</div>


