<?
session_start();
header("Content-Type: text/html; charset=utf-8");
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/board/board.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrBoardArticle = getBoardArticleView($_REQUEST["boardid"], $_REQUEST["category"], $_REQUEST["g_idx"],"read");

//DB해제
SetDisConn($dblink);



?>
<div class="clear proTop">
	<span class="imgWrap"><img src="/uploaded/board/professor/<?=$arrBoardArticle["files"][0][re_name]?>" alt=""></span>
	<div>
		<p>
			<i><?=stripslashes($arrBoardArticle["list"][0][subject])?></i>
			<b><?=stripslashes($arrBoardArticle["list"][0][name])?>  <?=stripslashes($arrBoardArticle["list"][0][ename])?></b>
		</p>
		<p><?=stripslashes($arrBoardArticle["list"][0][ogu_name])?></p>
		<ul>
			<li><span>Major</span><?=stripslashes($arrBoardArticle["list"][0][major])?></li>
			<li><span>Office.</span><?=stripslashes($arrBoardArticle["list"][0][etc_3])?></li>
			<li><span>Lab.</span><?=stripslashes($arrBoardArticle["list"][0][etc_4])?></li>
			<li><span>Tel.</span><?=stripslashes($arrBoardArticle["list"][0][ogu_tel])?></li>
			<li><span>Fax</span><?=stripslashes($arrBoardArticle["list"][0][ogu_fax])?></li>
			<li><span>Website</span><a target="_blank" href="<?=stripslashes($arrBoardArticle["list"][0][homepage])?>"><?=stripslashes($arrBoardArticle["list"][0][homepage])?></a></li>
			<li><span>E-mail</span><?=stripslashes($arrBoardArticle["list"][0][email])?></li>
		</ul>
	</div>
</div>
<div class="grayBox">
	<p>Biography</p>
	<ul class="biography">
	<?
	$arrGName = explode("//",$arrBoardArticle["list"][0][con1]);
	for($i=0; $i < count($arrGName); $i+=2){	
	?>
		<li class="clear">
			<span><?=$arrGName[$i]?></span>
			<p><?=$arrGName[$i+1]?></p>
		</li>
	<?}?>
	</ul>	
</div>
<div class="grayBox">
	<p>Research Interests</p>
	<div>
		<?=stripslashes($arrBoardArticle["list"][0][con2])?>
	</div>
</div>
<div class="grayBox">
	<p>Selected Publications</p>
	<div>
		<?=stripslashes($arrBoardArticle["list"][0][con3])?>
	</div>
</div>
<div class="grayBox">
	<p>Achievements</p>
	<div>
		<?=stripslashes($arrBoardArticle["list"][0][etc_5])?>
	</div>
</div>
<div class="grayBox">
	<p>Related Courses</p>
	<div>
		<?=stripslashes($arrBoardArticle["list"][0][contents])?>
	</div>
</div>