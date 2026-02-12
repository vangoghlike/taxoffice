<div class="admin-snb">
	<?if($_REQUEST["boardid"]=="hkonline"){?>
	<div class="snb-title"><h2>영업문의</h2></div>
    <ul class="snb-menu">
		<li><a href="/backoffice/module/board/board_view.php?boardid=hkonline">영업문의</a></li>
    </ul>	
	<?}else{?>	
	<div class="snb-title"><h2>유지보수 관리</h2></div>
	<ul id="lnb" class="snb-menu">
		<li><a href="/backoffice/module/board/board_view.php?boardid=online">유지보수관리</a></li>
		<li><a href="/backoffice/module/board/board_view.php?boardid=order">유지보수분류</a></li>
		<li><a href="/backoffice/module/board/board_view.php?boardid=keyword">검색어관리</a></li>
	</ul>
	<?}?>
</div>