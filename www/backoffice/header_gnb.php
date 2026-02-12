		<div class="newtop">
			<ul>
				<? if(in_array("admin_manage", $arrayMyMenu) && (in_array("admin_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<li><a href="/backoffice/module/admin/admin.php" ><i class="icon ion-ios-construct"></i><br/><span>기본설정</span></a></li>
				<?}?>
				
				<? if(in_array("board_manage", $arrayMyMenu) && (in_array("board_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<li><a href="/backoffice/module/category/category_setting.php?cat_no=77"><i class="icon ion-ios-list-box"></i><br/><span>메뉴 </span></a></li>
				<li><a href="/backoffice/module/category_eng/category_setting.php?cat_no=29"><i class="icon ion-ios-list-box"></i><br/><span>메뉴 (영문)</span></a></li>
                <li><a href="/backoffice/module/category_ch/category_setting.php?cat_no=29"><i class="icon ion-ios-list-box"></i><br/><span>메뉴 (중문)</span></a></li>
				<li><a href="/backoffice/module/category_call/category_setting.php?cat_no=1"><i class="icon ion-ios-list-box"></i><br/><span>메뉴 (세림콜)</span></a></li>
				<li><a href="/backoffice/module/category_fdicenter/category_setting.php?cat_no=1"><i class="icon ion-ios-list-box"></i><br/><span>메뉴 (FDI)</span></a></li>
				<li><a href="/backoffice/module/category_fdi_eng/category_setting.php?cat_no=1"><i class="icon ion-ios-list-box"></i><br/><span>메뉴 (FDI ENG)</span></a></li>
				<li><a href="/backoffice/module/category_venture/category_setting.php?cat_no=1"><i class="icon ion-ios-list-box"></i><br/><span>메뉴 (벤처)</span></a></li>
				<li><a href="/backoffice/module/board/board.php"><i class="icon ion-ios-list-box"></i><br/><span>게시판 관리</span></a></li>
				<?}?>

				<? if(in_array("board_manage", $arrayMyMenu) && (in_array("board_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<li><a href="/backoffice/module/consult/consult.php?idx=1"><i class="icon ion-ios-business"></i><br/><span>세무상담관리</span></a></li>
				<?}?>
				

				<? if(in_array("product_manage", $arrayMyMenu) && (in_array("product_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<!-- 제품 관리 -->
				<li><a href="/backoffice/module/product/product.php"><i class="icon ion-ios-apps"></i><br/><span>제품 관리</span></a></li>
				<!-- 제품 관리 -->
				<?}?>
				<? if(in_array("shop_good_manage", $arrayMyMenu) && (in_array("shop_good_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<!-- 상품 관리 -->
				<li><a href="/backoffice/module/shop/good.php"><i class="icon ion-ios-gift"></i><br/><span>상품 관리</span></a></li>
				<!-- 상품 관리 -->
				<?}?>
				
				<? if(in_array("shop_order_manage", $arrayMyMenu) && (in_array("shop_order_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<!-- 주문 관리 -->
				<li><a href="/backoffice/module/shop/order.php?mode=1"><i class="icon ion-ios-cart"></i><br/><span>주문 관리</span></a></a></li>
				<!-- 주문 관리 -->
				<?}?>
				<? if(in_array("shop_order_manage", $arrayMyMenu) && (in_array("shop_order_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
				<!-- 주문 관리 -->
				<li><a href="/backoffice/module/shop/order.php?mode=1"><i class="icon ion-ios-mail"></i><br/><span>메일 관리</span></a></a></li>
				<!-- 주문 관리 -->
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
				<!-- <li><a href="/backoffice/module/banner/banner.php"><i class="icon ion-md-images"></i><br/><span>배너 관리</span></a></li> -->
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