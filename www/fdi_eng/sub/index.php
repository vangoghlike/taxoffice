<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_fdi_eng.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/fdi_eng/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/fdi_eng/pub/include/header.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/fdi_eng/pub/include/nav.php";?>
<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/eng/css/common.css?v=20220512" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/eng/css/dev.css" />

<script type="text/javascript" src="/common/js/ori_common.js"></script>
<!-- <link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/page_con.css" /> -->
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<?php
if ( $_GET['cat_no'] == '85' ) {
    ?>
    <script>
        $(function(){
            // 문의 폼 클릭형태 자동실행
            $('.managerTab .btn_counsel_eq').trigger('click');
        });
    </script>
    <?php
}
?>

<!-- subContent -->
<div class="subContent type-eng">
	<!-- subTopInfo -->
	<div class="subTopInfo">
		<!-- h2Wrap -->
		<div class="h2Wrap">
			<h2>
				<?if($arrMenu['catName'][$arrTCode[1]] != ""){?>
					<?=$arrMenu['catName'][$arrTCode[1]]?>
				<?}else{ // 대메뉴만 있는 것을 위함?>
					<?=$arrMenu['catName'][$arrTCode[0]]?>
				<?}?>
			</h2>
		</div>
		<!-- //h2Wrap -->
		<!-- lnb -->
		<?if($catNo != 0){?>
		<div class="lnb">
			<span><img src="/pages/default/images/common/home.png" alt="home"></span>
			<?
			################### header.php 정의
			echo $lnbTitle;
			?>
		</div>
		<?}?>
		<!-- //lnb -->
	</div>
	<!-- /'.$_SITE['URL_PREFIX'].'/subTopInfo -->
	<!-- contStart -->
	<div class="contStart">
		<?
		####################################################### 3 Depth Menu ########### ST
		if($arrMenu['thr'][$arrTCode[1]]['show_total'] > 1){
			$liWidth = 100 / $arrMenu['thr'][$arrTCode[1]]['show_total'];		
		?>
		<div class="tabType01 type ">
			<?
			if($arrTCode[0] == "14"){
				$menu_class = "topic"; // 토픽별 세무일 때 따로 클래스를 넣어 줌
			}else if($arrTCode[1] == "20"){
				$menu_class = "report"; // 신고도움서비스일 때 따로 클래스를 넣어 줌
			}
			?>
			<ul class="<?=$menu_class?>">
			<?
			for($i=0;$i<$arrMenu['thr'][$arrTCode[1]]['total'];$i++){
				$navOnClass = "";
				if($arrTCode[2]==$arrMenu['thr'][$arrTCode[1]][$i]['code']){ 
					$navOnClass = "class='on'"; 
				}else if($arrMenu['thr'][$arrTCode[1]][$i]['type'] == "O"){
					$navOnClass = "class='emphasis'";
				}
				if($arrMenu['thr'][$arrTCode[1]][$i]['show'] != "N"){
					echo '<li '.$navOnClass.' style="width:'.$liWidth.'%"><a href="'.$_SITE['URL_PREFIX'].'/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['thr'][$arrTCode[1]][$i]['code']].'">'.$arrMenu['thr'][$arrTCode[1]][$i]['name'].'</a></li>';
				}
			}			
			?>
			</ul>
		</div>
		<?}
		####################################################### 3 Depth Menu ########### ED
		####################################################### 4 Depth Menu ########### ST
		if($arrMenu['for'][$arrTCode[2]]['show_total'] > 1){
			$liWidth = 100 / $arrMenu['for'][$arrTCode[2]]['show_total'];		
		?>
		<div class="tabType02 suitable">
			<ul>
			<?
			for($i=0;$i<$arrMenu['for'][$arrTCode[2]]['total'];$i++){
				$navOnClass = "";
				if($catNo==$arrMenu['for'][$arrTCode[2]][$i]['code']){
					$navOnClass = "class='on'"; 
				}else if($arrMenu['for'][$arrTCode[2]][$i]['type'] == "O"){
					$navOnClass = "class='emphasis'";
				}
				if($arrMenu['for'][$arrTCode[2]][$i]['show'] != "N"){
					echo '<li '.$navOnClass.' style="width:'.$liWidth.'%"><a href="'.$_SITE['URL_PREFIX'].'/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['for'][$arrTCode[2]][$i]['code']].'">'.$arrMenu['for'][$arrTCode[2]][$i]['name'].'</a></li>';
				}
			}			
			?>			
			</ul>
		</div>
		<?}
####################################################### 4 Depth Menu ########### ED?>
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?######################## Content ######################## ST?>
<?
//DB연결
$dblink = SetConn($_conf_db["main_db"]);


	$arrCatInfo = getCategoryInfo($catNo);
	
	if($arrCatInfo["total"] > 0){
		if($arrTCode[2]){	############# 3 Depth 이하가 없으면 숨김처리
			$arrContInfo = getContentsInfo($arrCatInfo["list"][0]["cat_cont_idx"]);
			if($arrCatInfo["list"][0]["cat_use_type"] == "C" && $arrCatInfo["list"][0]["cat_cont_idx"] != 0 && $arrContInfo["list"][0]["subject"] != ""){			// 컨텐츠
	?>
			<div class="h3Wrap line">
				<h3>
				<?=$arrContInfo["list"][0]["subject"]?>
				</h3>
				
			</div>
	<?
			}else{
	?>
			<div class="h3Wrap line">
				<h3>
                    <?php if ($_REQUEST['cat_no'] == '50' || $_REQUEST['cat_no'] == '56') {?>
                        <a class="fdi_inner_link eng on">
                            <?=$arrMenu['catName'][$catNo]?> (Eng)
                        </a>
                        <a class="fdi_inner_link ch">
                            <?=$arrMenu['catName'][$catNo]?> (Ch)
                        </a>
                    <?php }else{ ?>
                        <?=$arrMenu['catName'][$catNo]?>
                    <?php } ?>
				</h3>
				
			</div>
	<?
			}
		}
		if($arrCatInfo["list"][0]["cat_use_type"] == "C" && $arrCatInfo["list"][0]["cat_cont_idx"] != 0){			// 컨텐츠
		?>
		<?if(1==2){	########### 인쇄 프로그램 구현해야함 ######################################################## 중요 #################### 미구현 // 20211130 구현 완료 ?>
		<a class="con_print_btn"><i class="fa fa-print"></i>&nbsp;인쇄</a>
		<div class="clearFix"></div>
		<?}			########### 인쇄 프로그램 구현해야함 ######################################################## 중요 #################### 미구현 // 20211130 구현 완료 ?>
		<?
			$arrContInfo = getContentsInfo($arrCatInfo["list"][0]["cat_cont_idx"]);
			include $_SERVER['DOCUMENT_ROOT'] ."/module/contents/contents.php";
		}else if($arrCatInfo["list"][0]["cat_use_type"] == "B" && $arrCatInfo["list"][0]["cat_board_id"] != ""){	// 게시판
			$_REQUEST['boardid'] = $arrCatInfo["list"][0]["cat_board_id"];
			if($catNo == 66){
		?>
                <div class="tit bll01">Welcome to the official website of Selim Tax-Accounting Firm!</div>
                <div class="workList">
                    <ul>
                        <li>
                            <ul class="sky" style="list-style-type: circle">
                                <li>
                                    <div class="tit01 mb20">

                                        To provide reliable information promptly,<br/>
                                        we keenly communicate with you to best serve your journey in establishing and running a successful business here 
                                        in the Republic of Korea, as a reliable business partner you can count on for your venture business
                                    </div>
                                    <div class="tit02">
                                        We, SELIM Tax & Accounting Firm, with expertise and a full of experience in the venture business field, offer you various services in startup-related affairs.<br />
                                        Our practical end-to-end consulting will satisfy your diverse requirements necessary for venture businesses.
                                    </div>

                                    <div class="tit02">
                                        Our services include:<br />
                                        <div class="textType01 lh23"><br /></div>
                                        <div class="titBlueBottom2 lh23 mb10">
                                            (1) Business consulting on your inquiries before establishing a corporation or individual company (non-incorporated);
                                        </div>
                                        <div class="titBlueBottom2 lh23 mb10">
                                            (2) Support for corporation registration and business license;
                                        </div>
                                        <div class="titBlueBottom2 lh23 mb10">
                                            (3) Support for individual business license;
                                        </div>
                                        <div class="titBlueBottom2 lh23 mb10">
                                            (4) Accounting & Bookkeeping;
                                        </div>
                                        <div class="titBlueBottom2 lh23 mb10">
                                            (5) Tax consulting;
                                        </div>
                                        <div class="titBlueBottom2 lh23 mb10">
                                            (6) Consulting on financial operation and banking account operation plan ranging from tax to financial stability;
                                        </div>
                                        <div class="titBlueBottom2 lh23 mb10">
                                            (7) Services linked to patent agency, judicial agency, financial service, etc.

                                        </div>
                                        <br />
                                        <div>
                                            We are fully committed to serving as a bridging role to ensure the stable settlement of your business especially in the early stage.<br />
                                            We have seen many venture businesses suffer from the lack of business operation experience,<br/>
                                            leading to setting up wrong tax and accounting policies from the beginning, which makes it very challenging to jump a leap forward to the next level.<br />
                                            With the ever increasing importance of sound tax and accounting practices especially for venture businesses that are characterized by technology competitiveness,<br/>
                                            SELIM will provide you with dedicated and professional consulting to uncork the bottlenecks you will face in the course of opening and running a venture business.
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <?
			}
			include $_SERVER['DOCUMENT_ROOT'] ."/module/board/menu_board.php";
		}else if($arrCatInfo["list"][0]["cat_use_type"] == "N" && $arrCatInfo["list"][0]["cat_news_id"] != ""){		// 뉴스
			// 조세 뉴스
			$news_id = $arrCatInfo["list"][0]["cat_news_id"];
			if($_REQUEST["idx"] != ""){
				include $_SERVER['DOCUMENT_ROOT'] ."/module/news/read.php";			// 상세
			}else{
				include $_SERVER['DOCUMENT_ROOT'] ."/module/news/index.php";		// 리스트
			}
		}else if($arrCatInfo["list"][0]["cat_use_type"] == "A"){		// 상담센터
			if($_GET["mngr_idx"] == ""){
				include $_SERVER['DOCUMENT_ROOT'] .$arrCatInfo["list"][0]["location"];
			}else{
				include $_SERVER['DOCUMENT_ROOT'] ."/counseling/counseling_mail.php";
			}
		}else if($arrCatInfo["list"][0]["cat_use_type"] == "M"){		// 신고의뢰
			if($_GET["mngr_idx"] == ""){
				include $_SERVER['DOCUMENT_ROOT'] .$arrCatInfo["list"][0]["location"];
			}else{
				if($_GET["step"] == "1"){
					include $_SERVER['DOCUMENT_ROOT'] ."/counseling/report_request02.php";
				}
			}
		}else if($arrCatInfo["list"][0]["cat_use_type"] == "R"){		// 계산기
			if($arrCatInfo["list"][0]["cat_report_type"] == 247){ // 증여세
				include $_SERVER['DOCUMENT_ROOT'] ."/calculator/calc.php";
			}else if($arrCatInfo["list"][0]["cat_report_type"] == 252){ // 상속세
				include $_SERVER['DOCUMENT_ROOT'] ."/calculator/inheritance_calc.php";
			}else if($arrCatInfo["list"][0]["cat_report_type"] == 245){ // 양도소득세
				include $_SERVER['DOCUMENT_ROOT'] ."/calculator/transfer_calc.php";
			}else{
				// 나머지
			}
		}else if($arrCatInfo["list"][0]["cat_use_type"] == "O"){		// 업무의뢰
			echo $arrCatInfo["list"][0]["cat_content"];
			$_REQUEST['mode'] = "write";
			$_REQUEST['boardid'] = $arrCatInfo["list"][0]["cat_board_id"];
			include $_SERVER['DOCUMENT_ROOT'] ."/module/board/menu_board.php";
		}else{
		//	jsGo("/","해당하는 메뉴가 없습니다.");
		}
	}else{
		if($_REQUEST['boardid'] == "total"){			// 통합 검색
			include $_SERVER['DOCUMENT_ROOT'] ."/module/board/menu_board.php";
		}
	}
//DB해제
SetDisConn($dblink);
?>		
<?######################## Content ######################## ED?>
<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
	</div>
</div>
<?if($catNo == 50){?>
<div class="popup_iframe_wrap" style="display: none;">
	<div class="pi_area">
		<h3>SAMPLE PAGE</h3>
		<a class="pi_close_btn">×</a>
		<iframe id="fdi_apply" class="pop_iframe" src="/pages/fdi_eng/images/pdf/fdi_apply_document.pdf" style="display: none;"></iframe>
		<iframe id="docu_warrant" class="pop_iframe" src="/pages/fdi_eng/images/pdf/docu_en_warrant_document.pdf" style="display: none;"></iframe>
		<iframe id="docu_wo_en" class="pop_iframe" src="/pages/fdi_eng/images/pdf/wo_en_document.pdf" style="display: none;"></iframe>
		<iframe id="docu_wo_ch" class="pop_iframe" src="/pages/fdi_eng/images/pdf/wo_ch_document.pdf" style="display: none;"></iframe>
		<iframe id="docu_kb_en" class="pop_iframe" src="/pages/fdi_eng/images/pdf/kb_en_document.pdf" style="display: none;"></iframe>
		<iframe id="docu_sh_ko" class="pop_iframe" src="/pages/fdi_eng/images/pdf/sh_ko_document.pdf" style="display: none;"></iframe>
		<iframe id="docu_sh_en" class="pop_iframe" src="/pages/fdi_eng/images/pdf/sh_en_document.pdf" style="display: none;"></iframe>
		<iframe id="docu_sh_ch" class="pop_iframe" src="/pages/fdi_eng/images/pdf/sh_ch_document.pdf" style="display: none;"></iframe>
	</div>
</div>
<script>
    $(function() {
        $('.if_open_btn').on('click', function() {
            $_this_iframe = $(this).attr('data-iframe');
            $('.popup_iframe_wrap').find('iframe').hide();
            $('.popup_iframe_wrap').fadeIn();
            switch ($_this_iframe) {
                case 'fdi_apply':
                    $('.popup_iframe_wrap').find('#fdi_apply').show();
                    break;
                case 'docu_warrant':
                    $('.popup_iframe_wrap').find('#docu_warrant').show();
                    break;
                case 'docu_wo_en':
                    $('.popup_iframe_wrap').find('#docu_wo_en').show();
                    break;
                case 'docu_wo_ch':
                    $('.popup_iframe_wrap').find('#docu_wo_ch').show();
                    break;
                case 'docu_kb_en':
                    $('.popup_iframe_wrap').find('#docu_kb_en').show();
                    break;
                case 'docu_sh_ko':
                    $('.popup_iframe_wrap').find('#docu_sh_ko').show();
                    break;
                case 'docu_sh_en':
                    $('.popup_iframe_wrap').find('#docu_sh_en').show();
                    break;
                case 'docu_sh_ch':
                    $('.popup_iframe_wrap').find('#docu_sh_ch').show();
                    break;
            }
        });
        $('.popup_iframe_wrap .pi_close_btn').on('click', function() {
            $('.popup_iframe_wrap').find('iframe').hide();
            $('.popup_iframe_wrap').fadeOut();
        });
    });
</script>


<?}?>
<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/fdi_eng/pub/include/footer.php";?>