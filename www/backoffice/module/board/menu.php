
<div class="admin-snb">
	<div style="padding-top:0px;"></div>

	<?
	switch ($_REQUEST['boardid']){
		case 'semu' : 
		case 'semueng' : 
	?>	
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
	</ul>
	<?
		break;
		default :
	?>	
	<div class="snb-title"><h2>게시판</h2></div>
    <ul class="snb-menu">
		<li><a href="/backoffice/module/board/board.php">게시판</a></li>
		<li><a href="/backoffice/module/board/gpt_excel_list.php">GPT 엑셀</a></li>
    </ul>
	<ul class="snb-menu">
	<?
		//DB연결
		$dblink = SetConn($_conf_db["main_db"]);
		$arrAllBoardInfo = getArticleList($_conf_tbl["board_info"], 0, 0, " order by boardname ");
		if($arrAllBoardInfo["total"] > 0){
			for($i=0;$i<$arrAllBoardInfo["total"];$i++){
	?>
				<li><a href="/backoffice/module/board/board_view.php?boardid=<?=$arrAllBoardInfo["list"][$i]["boardid"]?>"><?=$arrAllBoardInfo["list"][$i]["boardname"]?></a></li>
	<?
			}
		}

	?>
		<!-- <li><a href="#">게시판</a></li> -->
    </ul>	
	<?
		break;
	}
	?>	
    
    <?include $_SERVER[DOCUMENT_ROOT] . "/backoffice/admin_info.php";?>
</div>
    	
        
