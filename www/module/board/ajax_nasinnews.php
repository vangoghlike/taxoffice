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
<!--


<div class="clear proTop">
<?for($i=0;$i<$arrBoardArticle["total_files"];$i++){?>
<div style="width:100%;">
<img src="/uploaded/board/news/<?=$arrBoardArticle["files"][$i][re_name]?>">
</div>
<?}?>
</div>

<div>
	<?=stripslashes($arrBoardArticle["list"][0][contents])?>
</div>
-->



<div class="popCont text-left">
	<div class="swiper-container gallery-top">
		<div class="swiper-wrapper">
			<?for($i=0;$i<$arrBoardArticle["total_files"];$i++){?>
			<div class="swiper-slide">
				<img src="/uploaded/board/news/<?=$arrBoardArticle["files"][$i][re_name]?>" style="height:436px;width:930px;">
				<div class="text"><?=stripslashes($arrBoardArticle["list"][0][contents])?></div>
			</div>
			<?}?>
		</div>
		<!-- Add Arrows -->
		<div class="swiper-button-next swiper-button-white"></div>
		<div class="swiper-button-prev swiper-button-white"></div>
	</div>
	<div class="swiper-container gallery-thumbs">
		<div class="swiper-wrapper">
			<?for($i=0;$i<$arrBoardArticle["total_files"];$i++){?>
			<div class="swiper-slide">
				<img src="/uploaded/board/news/<?=$arrBoardArticle["files"][$i][re_name]?>">					
			</div>
			<?}?>
		</div>
	</div>
</div>

<script>
	var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 9,
    slidesPerView: 6,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
  });
  var galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 0,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    thumbs: {
      swiper: galleryThumbs
    }
  });
</script>