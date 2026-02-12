<?
session_start();
header("Content-Type: text/html; charset=utf-8");
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/board/board.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

if($_REQUEST["boardid"] == "en_latest"){ // Latest tax News in Korea
	$location = "/eng/sub/?cat_no=11";
	$arrList = getBoardListBaseNFile($_REQUEST["boardid"], "", "", "", 4, 0);
}else if($_REQUEST["boardid"] == "eng_set"){ // case Study
	$location = "/eng/sub/?cat_no=54";
	$arrList = getBoardListBaseNFile($_REQUEST["boardid"], "", "", "", 4, 0);
	
}else if($_REQUEST["boardid"] == "eng_treaties"){ // Tax Treaties
	$arrList = getBoardListBaseNFile($_REQUEST["boardid"], "", "", "", 4, 0);
	$location = "/eng/sub/?cat_no=45";
}else if($_REQUEST["boardid"] == "eng_opreation"){ // Tax Treaties
	$arrList = getBoardListBaseNFile($_REQUEST["boardid"], "", "", "", 4, 0);
	$location = "/eng/sub/?cat_no=46";
}else{ // 한페이지
?>
	<script>
		function get_list() {
			$('#i_inside_contents').empty().append('<a class="item">준비중입니다.</a>');
		}
	</script>
<?
}

?>
            <p>Selim’s all professional tax experts provide you<span class="br mo"></span> with the most simple and helpful</p>
            <h3><strong class="highlight">tax informations</strong> with the <span class="br mo"></span>collaboration and partnertship spirit</h3>
            <ul class="info_tab">
				<li <?if($_REQUEST["boardid"] == "en_latest"){?>class="on"<?}?> onclick="getBoardAjax('en_latest')">Tax News in Korea</li>
                <li <?if($_REQUEST["boardid"] == "eng_set"){?>class="on"<?}?> onclick="getBoardAjax('eng_set')">Case Study</li>
                <li <?if($_REQUEST["boardid"] == "eng_treaties"){?>class="on"<?}?> onclick="getBoardAjax('eng_treaties')">Tax Treaties</li>
                <li <?if($_REQUEST["boardid"] == "eng_opreation"){?>class="on"<?}?> onclick="getBoardAjax('eng_opreation')">Transfer Price & Reporting</li>
            </ul>
            <a href="<?=$location?>" class="ir_pm more pc1112">more</a>
            <div class="i_slide" id="i_inside_contents">
				<?
				if($arrList["list"]["total"] > 0){
					for($i=0;$i<$arrList["list"]["total"];$i++){
						$arrDate = explode(" ",$arrList["list"][$i]["wdate"]);

				?>
				<a href="<?=$location?>&boardid=<?=$_REQUEST["boardid"]?>&mode=view&idx=<?=$arrList["list"][$i]["idx"]?>" class="item<?if($i == 0){?> on211112<?}?>">
					<div class="item_wrap">
						<h3><?=$arrList["list"][$i]["subject"]?></h3>
						<p><?=text_cut(trim(str_replace("　","",str_replace("&nbsp;","",strip_tags($arrList["list"][$i]["contents"])))),100)// 공백문자 빈값으로 변경?></p>
						<span><?=$arrDate[0]?></span>
					</div>
                </a>
				<?
					}
				}
				?>
				<a href="<?=$location?>" class="item mo mo_more">
                    <h3>+</h3>
                </a>
                <!--<a href="javascript:void(0);" class="ir_pm more mo">more</a>-->
            </div>
            <script>    
                
                $(function(){
                    var slider3 = $('.i_slide');  	
                    var slickOptions3 = { 		
                        slide: 'a',	
                        slidesToShow : 1.6,
                        slidesToScroll : 1,
                        arrows: false,
                        dots: false,
                        infinite : false,
                    };

					if($(window).width() < 767) { 			
						slider3.not('.slick-initialized').slick(slickOptions3);

						var i_slide_ht = $(".i_slide .slick-track").height(); 
						$(".more.mo").css("height", i_slide_ht + 'px');

					}else{
						slider3.filter('.slick-initialized').slick('unslick');	 			
								
					} 
					
					$( window ).resize(function() {
						if($(window).width() < 767) { 			
							slider3.not('.slick-initialized').slick(slickOptions3);

							var i_slide_ht = $(".i_slide .slick-track").height(); 
							$(".more.mo").css("height", i_slide_ht + 'px');

						}else{
							slider3.filter('.slick-initialized').slick('unslick');	 			
									
						} 
					});
                });
			</script>
<?if($_REQUEST["boardid"] == ""){ // 조세뉴스 일때 현재 한페이지 제작 안되어서 임시로 한페이지 추가?>
<script>
	get_list();
</script>
<?}
//DB해제
SetDisConn($dblink);
?>