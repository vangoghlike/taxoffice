<?
session_start();
header("Content-Type: text/html; charset=utf-8");
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/board/board.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$selim_main_url = 'http://www.taxoffice.co.kr';

// 현재 프로토콜을 가져옵니다 (http 또는 https)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";

// 현재 호스트 (도메인 이름)과 요청 URI를 합칩니다
$selim_main_url = $protocol . "://" . $_SERVER['HTTP_HOST'];


if($_REQUEST["boardid"] == "Column"){ // 세금이야기
    $location = $selim_main_url."/sub/?cat_no=22";
    $arrList = getBoardListBaseNFile($_REQUEST["boardid"], "", "", "", 4, 0);
}else if($_REQUEST["boardid"] == "topic_business_all"){ // 사업관련세금
    $location = $selim_main_url."/sub/?cat_no=145";
    $arrList = getBoardListBaseNFile('topic_business_all', "", "", "", 4, 0);
}else if($_REQUEST["boardid"] == "topic_property_all"){ // 재산관련세금
    $location = $selim_main_url."/sub/?cat_no=153";
    $arrList = getBoardListBaseNFile('topic_property_all', "", "", "", 4, 0);
}else if($_REQUEST["boardid"] == "faq"){ // 세무실무사례
    $location = $selim_main_url."/sub/?cat_no=105";
    $arrList = getBoardListBaseNFile($_REQUEST["boardid"], "", "", "", 4, 0);
}else if($_REQUEST["boardid"] == "joseNews"){ // 조세뉴스
    $location = $selim_main_url."/sub/?cat_no=216";
    ?>
    <script>
        function strip_tags (str) {
            var rt_data = "";
            if(str){
                rt_data = str.replace(/(<([^>]+)>)/ig,"");
            }else{
                rt_data = "";
            }
            return rt_data;
        }
        function get_list() {
            $('#i_inside_contents').empty().append('<tr class="allmerge"><td colspan="4">... 게시물을 불러오는 중입니다 ...</td></tr>');
            $.ajax({
                type: 'post',
                dataType: 'json',
                data: {'page':1, 'news_code':'josenews','scale':4},
                url: '/module/news/ajax_joseNews.php',
                success: function(resp) {
                    $('#i_inside_contents').empty();
                    var i = 0;
                    if (resp.data.length > 0) {
                        $.each(resp.data, function(idx, data) {
                            var dataContent = '';
                            dataContent += '<a href="<?=$location?>&page=1&idx='+data.id+'" class="item ';
                            if(i == 0){
                                dataContent += 'on211112';
                            }
                            dataContent += '">';
                            dataContent += '<div class="item_wrap">';
                            dataContent += '<h3>'+data.title+'</h3>';
                            dataContent += '<p>'+strip_tags(data.content).replace(/&nbsp;/g,"").replace(/　/g,"").substr(0,50)+'</p>'; // 공백문자 빈값으로 변경
                            dataContent += '<span>'+data.regtime.substr(0,4)+'-'+data.regtime.substr(4,2)+'-'+data.regtime.substr(6,2)+'</span>';
                            dataContent += '</div>';
                            dataContent += '</a>';

                            $('#i_inside_contents').append(dataContent);
                            i++;
                        });
                    }else {
                        $('#i_inside_contents').append('<a href="javascript:void(0);" class="item">해당 내용이 없습니다.</a>');
                    }
                    $('#i_inside_contents').append('<a href="<?=$location?>" class="item mo mo_more .item_wrap"><h3>+</h3></a>');


                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                },complete : function() {
                    $('#i_inside_contents').addClass('i_slide1');
                    // 조세뉴스는 적용이 느리므로 불러온뒤 슬라이더를 다시 부릅니다.
                    var slider3_1 = $('.i_slide1');
                    var slickOptions3_1 = {
                        slide: '.item',
                        slidesToShow : 1.6,
                        slidesToScroll : 1,
                        arrows: false,
                        dots: false,
                        infinite : false,
                    };

                    if($(window).width() < 767) {
                        $('.i_slide1').slick('unslick');
                        slider3_1.not('.slick-initialized').slick(slickOptions3_1);

                        var i_slide_ht = $(".i_slide1 .slick-track").height();
                        $(".more.mo").css("height", i_slide_ht + 'px');


                    }else{
                        slider3_1.filter('.slick-initialized').slick('unslick');

                    }
                    // 조세뉴스는 적용이 느리므로 불러온뒤 슬라이더를 다시 부릅니다.
                    $( window ).resize(function() {
                        if($(window).width() < 767) {
                            slider3.not('.slick-initialized').slick(slickOptions3);

                            var i_slide_ht = $(".i_slide .slick-track").height();
                            $(".more.mo").css("height", i_slide_ht + 'px');

                        }else{
                            slider3.filter('.slick-initialized').slick('unslick');

                        }
                    });
                }

            });
        }

    </script>
    <?
}else if ( $_REQUEST["boardid"] == "hanpage" ) {
    $_location = $selim_main_url."/taxcall/sub/?cat_no=4";
    $location = $selim_main_url."/taxcall/sub/?boardid=hanpage&cat_no=4&sk=";
    $arrList = getBoardListBaseNFile($_REQUEST["boardid"], "", "", "", 4, 0);
}else if($_REQUEST["boardid"] == "total"){ // 최신글
//    $_location = "/sub/?boardid=total&cat_no=0&sk=";
    $_location = "/sub/index.php?cat_no=";
    $location = $selim_main_url."/sub/?boardid=total&cat_no=0&sk=";
    $arrList = getBoardListBaseNFile($_REQUEST["boardid"], "", "", "", 4, 0);
    ?>
    <script>
        function get_list() {
            $('#i_inside_contents').empty().append('<a class="item">준비중입니다.</a>');
        }
    </script>
    <?
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
    <p>세림의 멤버들은 협업과 공유정신으로</p>
    <h3>어떠한 업무이던 고객님의 <strong class="highlight">눈높이</strong>에 <br class="mb_vw"/>맞추어서 자문하고 상담해드립니다</h3>
    <ul class="info_tab">
        <li <?if($_REQUEST["boardid"] == "hanpage"){?>class="on"<?}?> onclick="getBoardAjax('hanpage')">한페이지 세무상담</li>
    </ul>
    <a href="<?=$location?>" class="ir_pm more pc1112">more</a>
    <div class="i_slide" id="i_inside_contents">
        <?
        if($arrList["list"]["total"]){
        for($i=0;$i<$arrList["list"]["total"];$i++){
        $arrDate = explode(" ",$arrList["list"][$i]["wdate"]);

        ?>
        <?php if ( $_REQUEST["boardid"] == "total" ) {
        $arrCateNo = getCategoryFree(" AND cat_board_id = '".$arrList["list"][$i]["board_id"]."'");
        $_arrBoardIdx = getBoardListBaseNFile($arrList["list"][$i]["board_id"], "", "", "", 1, 0, "", $arrList["list"][$i]["idx"]);
        if ( $arrList["list"][$i]["board_id"] == 'hanpage' ) {
            $_bd_idx = getBoardTotalIdx($arrList["list"][$i]["board_id"], $arrList["list"][$i]["idx"]);
        }
        $arrCateNo = getCategoryFree(" AND cat_board_id = '".$arrList["list"][$i]["board_id"]."'");

        switch ($arrList["list"][$i]["board_id"]) {
            case 'en_latest':
                $location = 'http://www.etaxoffice.co.kr/eng'.$_location;
                $_bd_idx = $_arrBoardIdx["list"][0]["idx"];
                break;
            case 'eng_hanpage':
                $location = 'http://www.etaxoffice.co.kr/eng'.$_location;
                $_bd_idx = $_arrBoardIdx["list"][0]["idx"];
                break;
            case 'hanpage':
                $location = $_location;
                $arrCateNo["list"][0]["cat_no"] = '4';
                break;
            default :
                $location = $selim_main_url.$_location;
                $_bd_idx = $_arrBoardIdx["list"][0]["idx"];
                break;
        }
        ?>
        <a href="<?=$location.$arrCateNo["list"][0]["cat_no"]?>&boardid=<?=$arrList["list"][$i]["board_id"]?>&mode=view&idx=<?=$_bd_idx?>" class="item<?if($i == 0){?> on211112<?}?>">
            <?php } else if ( $_REQUEST["boardid"] == "topic_business_all" || $_REQUEST["boardid"] == "topic_property_all" ) {
            $arrCateNo = getCategoryFree(" AND cat_board_id = '".$arrList["list"][$i]["board_id"]."'");
            $_arrBoardIdx = getBoardListBaseNFile($arrList["list"][$i]["board_id"], "", "", "", 1, 0, "", $arrList["list"][$i]["idx"]);
            $location = '/sub/?cat_no=';
            ?>
            <a href="<?= $location . $arrCateNo[ "list" ][ 0 ][ "cat_no" ] ?>&boardid=<?= $arrList[ "list" ][ $i ][ "board_id" ] ?>&mode=view&idx=<?= $_arrBoardIdx[ "list" ][ 0 ][ "idx" ] ?>"
               class="item<? if ($i == 0) { ?> on211112<? } ?>">

                <?php } else { ?>
                <a href="<?=$location?>&boardid=<?=$_REQUEST["boardid"]?>&mode=view&idx=<?=$arrList["list"][$i]["idx"]?>" class="item<?if($i == 0){?> on211112<?}?>">
                    <?php } ?>
                    <div class="item_wrap">
                        <h3><?=$arrList["list"][$i]["subject"]?></h3>
                        <?php if ( $_REQUEST["boardid"] == "total" ) { ?>
                            <!--                            <p>-->
                            <!--                                ?boardid=--><?//=$arrBoardInfo["list"][0]["boardid"]?><!--&mode=view&idx=--><?//=$arrBoardList["list"][$i][idx]?><!--&sk=--><?//=$_GET[sk]?><!--&sw=--><?//=$_GET[sw]?><!--&offset=--><?//=$_GET[offset]?><!--&category=--><?//=$_GET[category]?>
                            <!--                            </p>-->
                            <p><?=text_cut(trim(str_replace("　","",str_replace("&nbsp;","",strip_tags($_arrBoardIdx["list"][0]["contents"])))),100)// 공백문자 빈값으로 변경?></p>
                            <span><?=substr($arrList["list"][$i]["reg_date"],0,10)?></span>
                        <?php } else if ( $_REQUEST["boardid"] == "topic_business_all" || $_REQUEST["boardid"] == "topic_property_all" ) { ?>
                            <p><?=text_cut(trim(str_replace("　","",str_replace("&nbsp;","",strip_tags($_arrBoardIdx["list"][0]["contents"])))),100)// 공백문자 빈값으로 변경?></p>
                            <span><?=substr($arrList["list"][$i]["reg_date"],0,10)?></span>
                        <?php } else if ( $_REQUEST["boardid"] == "hanpage" ) { ?>
                            <p><?=text_cut(trim(str_replace("　","",str_replace("&nbsp;","",strip_tags($arrList["list"][$i]["contents"])))),100)// 공백문자 빈값으로 변경?></p>
                            <span><?=$arrDate[0]?></span>
                        <?php } else { ?>
                            <p><?=text_cut(trim(str_replace("　","",str_replace("&nbsp;","",strip_tags($arrList["list"][$i]["contents"])))),100)// 공백문자 빈값으로 변경?></p>
                            <span><?=$arrDate[0]?></span>
                        <?php } ?>

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
<?if($_REQUEST["boardid"] == "joseNews" || $_REQUEST["boardid"] == ""){ // 조세뉴스 일때 현재 한페이지 제작 안되어서 임시로 한페이지 추가?>
    <script>
        get_list();
    </script>
<?}
//DB해제
SetDisConn($dblink);
?>