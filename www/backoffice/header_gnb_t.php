		<div class="newtop">
			<ul>
				<? if(in_array("admin_manage", $arrayMyMenu) && (in_array("admin_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<li><a href="/backoffice/module/admin/admin.php" ><i class="icon ion-ios-construct"></i><br/><span>기본설정</span></a></li>
				<?}?>
				<? if(in_array("product_manage", $arrayMyMenu) && (in_array("product_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<!-- 제품 관리 -->
				<li><a href="/backoffice/module/product/product.php"><i class="icon ion-ios-apps"></i><br/><span>제품 관리</span></a></li>
				<!-- 제품 관리 -->
				<?}?>

				<? if(in_array("mail_manage", $arrayMyMenu) && (in_array("mail_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<!-- 주문 관리 -->
				<li><a href="/backoffice/module/mail/mail.php"><i class="icon ion-ios-mail"></i><br/><span>메일 관리</span></a></a></li>
				<!-- 주문 관리 -->
				<?}?>
				<? if(in_array("board_manage", $arrayMyMenu) && (in_array("board_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<!-- 게시판 -->
				<li><a href="/backoffice/module/category/category.php?cat_gubun=event"><i class="icon ion-ios-flag"></i><br/><span>행사 관리</span></a></li>
				<!-- 게시판 -->
				<?}?>
				<? if(in_array("board_manage", $arrayMyMenu) && (in_array("board_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<!-- 게시판 -->
				<li><a href="/backoffice/module/board/board_cal.php?boardid=schedule"><i class="icon ion-ios-mail"></i><br/><span>문의 관리</span></a></li>
				<!-- 게시판 -->
				<?}?>
				<? if(in_array("board_manage", $arrayMyMenu) && (in_array("board_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<!-- 게시판 관리 -->
				<!-- <li><a href="/backoffice/module/board/board.php"><i class="icon ion-ios-cafe"></i><br/><span>게시판 관리</span></a></li>-->
				<!-- 게시판 관리 -->
				<?}?>
				<? if(in_array("member_manage", $arrayMyMenu) && (in_array("member_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<!-- 회원관리 -->
				<li><a href="/backoffice/module/member/member.php"><i class="icon ion-ios-people"></i><br/><span>회원 관리</span></a></li>
				<!-- 회원관리 -->
				<?}?>
				<? if(in_array("banner_manage", $arrayMyMenu) && (in_array("banner_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<!-- 배너관리 -->
				<li><a href="/backoffice/module/banner/banner.php"><i class="icon ion-md-images"></i><br/><span>배너 관리</span></a></li>
				<!-- 배너관리 -->
				<?}?>
				<? if(in_array("popup_manage", $arrayMyMenu) && (in_array("popup_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<!-- 팝업관리 -->
				<li><a href="/backoffice/module/popup/popup_list.php"><i class="icon ion-md-albums"></i><br/><span>팝업 관리</span></a></li>
				<!-- 팝업관리 -->
				<?}?>

				<? if(in_array("log_manage", $arrayMyMenu) && (in_array("log_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<li><a href="/backoffice/module/log/log_hourly_view.php" ><i class="icon ion-md-stats"></i><br/><span>접속 통계</span></a></li>
				<?}?>
			</ul>
		</div>