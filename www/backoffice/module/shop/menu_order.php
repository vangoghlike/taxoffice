<div class="admin-snb">
    <? if(in_array("shop_order_manage", $arrayMyMenu) && (in_array("shop_order_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
	<div class="snb-title"><h2>주문 관리</h2></div>
    <ul class="snb-menu">
		<li><a href="/backoffice/module/shop/order.php?mode=1">주문목록</a></li>	
		<li><a href="/backoffice/module/shop/order.php?mode=2">취소/교환/반품</a></li>	
		<li><a href="/backoffice/module/shop/order.php?mode=3">미주문</a></li>	
	</ul>
	<?}?>

	<? if(in_array("shop_accounts_manage", $arrayMyMenu) && (in_array("shop_accounts_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
	<!--div class="snb-title"><h2>매출 관리</h2></div>
	<ul class="snb-menu">
		<li><a href="/backoffice/module/shop/accounts.php">매출 관리</a></li>
	</ul-->
	<?}?>

    </ul>
    <?include $_SERVER[DOCUMENT_ROOT] . "/backoffice/admin_info.php";?>
</div>
    	
        
