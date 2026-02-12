<!-- subNav -->
<?include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");?>
<?include_once $_SERVER[DOCUMENT_ROOT] . "/module/category/category.lib.php";?>
<?
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrMenuList = getCategoryList("","");
?>
<?
if($arrMenuList["total"] > 0){
	for($i=0;$i<$arrMenuList["total"];$i++){
		if($arrMenuList["list"][$i]["cat_is_show"]=="Y"){
			$arrSubMenuList = getCategoryList($arrMenuList["list"][$i]["cat_no"],"");
			################################
			echo '<div class="subNav tp'.$i.'"><ul>';
			if($arrSubMenuList["total"] > 0){
				for($j=0;$j<$arrSubMenuList["total"];$j++){
					if($arrSubMenuList["list"][$j]["cat_is_show"]=="Y"){
			?>
				<li class="menu<?=$arrSubMenuList["list"][$j]["cat_no"]?>"><a href="/module/category/_menu.php?cat_no=<?=$arrSubMenuList["list"][$j]["cat_no"]?>"><?=$arrMenuList["list"][$i]["cat_name"]?> - <?=$arrSubMenuList["list"][$j]["cat_name"]?></a></li>
			<?
					}
				}
			}
			echo '</ul></div>';
			################################ 
		}
	}
}
?>
<!-- <div class="subNav tp6">
<ul>
<li class="menu12"><a href="/12">대표이사 인사말</a></li>
<li class="menu193"><a href="/193">구성원 안내</a></li>
<li class="menu15"><a href="/15">주요업무안내</a></li>
<li class="menu14"><a href="/14">지점안내</a></li>
<li class="menu51"><a href="/51">세림 갤러리</a></li>
<li class="menu16"><a href="/16">찾아오시는 길</a></li>
</ul>
</div> -->
<!-- //subNav -->