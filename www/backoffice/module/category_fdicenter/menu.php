<?include_once $_SERVER[DOCUMENT_ROOT] . "/module/category/category_fdicenter.lib.php";?>
<?
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrMenuList = getCategoryList("","");
if($_GET["cat_no"] != ""){
	$arrSelectMenuList = getCategoryInfo($_GET["cat_no"],"");
	$selectDepth = $arrSelectMenuList["list"][0]["cat_depth"];
	//var_dump($selectDepth);
}
?>
<div class="admin-snb">
	<div class="snb-title"><h2>메뉴 관리</h2></div>
	<ul class="snb-menu">
	<li><a href="/backoffice/module/category_fdicenter/category.php">메뉴 관리</a></li>
	</ul>
	<?
	if($arrMenuList["total"] > 0){
		for($i=0;$i<$arrMenuList["total"];$i++){
			$arrSubMenuList = getCategoryList($arrMenuList["list"][$i]["cat_no"],"");
	?>
		<div class="snb-title">
		<?if($arrSubMenuList["total"] > 0){ // 하위 메뉴가 있을 경우?> 
			<h2 <?if($arrMenuList["list"][$i]["cat_no"] == $_GET["cat_no"]){?>class="bold"<?}?>><?=text_cut($arrMenuList["list"][$i]["cat_name"],15)?>
			<a style="color:white;" href="/backoffice/module/category_fdicenter/category_info.php?cat_no=<?=$arrMenuList["list"][$i]["cat_no"]?>">[폴더수정]</a></h2>
		<?}else{ // 하위 메뉴가 없을 경우?>
			<a href="/backoffice/module/category_fdicenter/category_setting.php?cat_no=<?=$arrMenuList["list"][$i]["cat_no"]?>"><h2 <?if($arrMenuList["list"][$i]["cat_no"] == $_GET["cat_no"]){?>class="bold"<?}?>><?=text_cut($arrMenuList["list"][$i]["cat_name"],15)?></h2></a>
		<?}?>
		</div>
		<ul class="snb-menu">
		<?
		if($arrSubMenuList["total"] > 0){
			for($j=0;$j<$arrSubMenuList["total"];$j++){
				$arrSub_3MenuList = getCategoryList($arrSubMenuList["list"][$j]["cat_no"],"");
				if($arrSub_3MenuList["total"] < 1){
		?>
			<li><a id="sub_<?=$arrSubMenuList["list"][$j]["cat_no"]?>" href="/backoffice/module/category_fdicenter/category_setting.php?cat_no=<?=$arrSubMenuList["list"][$j]["cat_no"]?>"><?=$arrSubMenuList["list"][$j]["cat_name"]?></a></li>
		<?
				}else{
		?>
			<li class="tab" style="cursor:pointer;"><a <?if($arrSubMenuList["list"][$j]["cat_no"] == $_GET["cat_no"]){?>class="bold"<?}?> id="folder_<?=$arrSubMenuList["list"][$j]["cat_no"]?>" style="display:inline-block;"><?=$arrSubMenuList["list"][$j]["cat_name"]?></a><span style="display:inline-block;z-index:10;"><a  href="/backoffice/module/category_fdicenter/category_info.php?cat_no=<?=$arrSubMenuList["list"][$j]["cat_no"]?>">[폴더수정]</a></span>
				<ul class="tab_ul">
					<?
					if($arrSub_3MenuList["total"] > 0){
						for($k=0;$k<$arrSub_3MenuList["total"];$k++){
							$arrSub_4MenuList = getCategoryList($arrSub_3MenuList["list"][$k]["cat_no"],"");
							if($arrSub_4MenuList["total"] < 1){
							?>
								<li><a id="sub_<?=$arrSub_3MenuList["list"][$k]["cat_no"]?>" href="/backoffice/module/category_fdicenter/category_setting.php?cat_no=<?=$arrSub_3MenuList["list"][$k]["cat_no"]?>"><?=$arrSub_3MenuList["list"][$k]["cat_name"]?></a></li>
							<?
							}else{
?>
								<li class="tab" style="cursor:pointer;"><a <?if($arrSub_3MenuList["list"][$k]["cat_no"] == $_GET["cat_no"]){?>class="bold"<?}?> id="folder_<?=$arrSub_3MenuList["list"][$k]["cat_no"]?>" style="display:inline-block;"><?=$arrSub_3MenuList["list"][$k]["cat_name"]?></a><span style="display:inline-block;z-index:10;"><a href="/backoffice/module/category_fdicenter/category_info.php?cat_no=<?=$arrSub_3MenuList["list"][$k]["cat_no"]?>">[폴더수정]</a></span>
									<ul class="tab_ul">
<?
								if($arrSub_4MenuList["total"] > 0){
									for($l=0;$l<$arrSub_4MenuList["total"];$l++){
?>
										<li><a id="sub_<?=$arrSub_4MenuList["list"][$l]["cat_no"]?>" href="/backoffice/module/category_fdicenter/category_setting.php?cat_no=<?=$arrSub_4MenuList["list"][$l]["cat_no"]?>"><?=$arrSub_4MenuList["list"][$l]["cat_name"]?></a></li>
<?
									}
								}
?>
								</ul>
<?
							}
						}
					}
					?>
				</ul>
			</li>
		<?
				}
			}
		}
		?>
		</ul>
	<?
		}
	}
	?>
	<script>
	//jQuery(".tab>ul").hide();	
		// 탭 NEW
	jQuery(".tab>a").click(function(e) {
		jQuery(this).parent().find("ul").slideToggle();
		return false;
	});
	<?if($_GET["cat_no"] != ""){?>
		jQuery("#sub_<?=$_GET["cat_no"]?>").parent().parent().addClass("active");
		jQuery("#sub_<?=$_GET["cat_no"]?>").addClass("bold");
		jQuery("#folder_<?=$_GET["cat_no"]?>").parent().parent().addClass("active");
		<?if($selectDepth == 3){?>
			jQuery("#sub_<?=$_GET["cat_no"]?>").parent().parent().parent().parent().addClass("active");
		<?}?>
		
	<?}?>
	</script>
    <?include $_SERVER[DOCUMENT_ROOT] . "/backoffice/admin_info.php";?>
</div>


