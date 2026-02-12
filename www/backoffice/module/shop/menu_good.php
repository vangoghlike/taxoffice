<div class="admin-snb">
	<div class="snb-title"><h2>상품 관리</h2></div>
    <ul class="snb-menu">
        <li><a href="/backoffice/module/shop/good.php">상품 관리</a></li>
		<li><a href="/backoffice/module/shop/good_add.php">상품 등록</a></li>
		<li><a href="/backoffice/module/shop/option.php">상품옵션 관리</a></li>
		<li><a href="/backoffice/module/shop/option_add.php">상품옵션 등록</a></li>
		<? if(in_array("category_manage", $arrayMyMenu) && (in_array("category_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
		<!-- 분류 관리 -->
		<li><a href="/backoffice/module/category/category.php">분류 관리</a></li>
		<!-- 분류 관리 -->
		<?}?>

    </ul>
    <?include $_SERVER[DOCUMENT_ROOT] . "/backoffice/admin_info.php";?>
</div>
    	
        
