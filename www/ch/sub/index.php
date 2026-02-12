<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_ch.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/ch/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/ch/pub/include/header.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/ch/pub/include/nav.php";?>
<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/ch/css/common.css?v=2022080201" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/ch/css/dev.css" />

<script type="text/javascript" src="/common/js/ori_common.js"></script>
<!-- <link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/page_con.css" /> -->
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<!-- subContent -->
<div class="subContent">
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
	<!-- //subTopInfo -->
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
					echo '<li '.$navOnClass.' style="width:'.$liWidth.'%"><a href="/ch/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['thr'][$arrTCode[1]][$i]['code']].'">'.$arrMenu['thr'][$arrTCode[1]][$i]['name'].'</a></li>';
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
					echo '<li '.$navOnClass.' style="width:'.$liWidth.'%"><a href="/ch/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['for'][$arrTCode[2]][$i]['code']].'">'.$arrMenu['for'][$arrTCode[2]][$i]['name'].'</a></li>';
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
				<?=$arrMenu['catName'][$catNo]?>
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
		<div class="tit bll01">Hello, Welcome to visit Selim's Internet Website ("Tax Accounting Firm")</div>
		<div class="workList">
			<ul>
				<li>
					<ul class="sky" style="list-style-type: circle">
						<li>
							<div class="tit01">For providing the credible information rapidly, We'll collect and manage your relevant information continuously.<br />Your reliable Business Partner for Start-up Venture Business</div>
							<div class="tit02">We, SELIM Tax & Accounting, are great on the Venture Business and offer you the various way of Start-up services for your successful business.<br />Our practical consulting based on our rich experience and knowledge will cover your diverse requirements of the Start-up Venture business. <br />To put it concretely, services include.
								<div class="textType01 lh23"><br /></div>
								<div class="titBlueBottom2 lh23 mb10">(1) business consulting on the requirements beforehand the establishment of corporation or private company (non-incorporated)</div>
								<div class="titBlueBottom2 lh23 mb10">(2) support for cooperation registration and business license</div>
								<div class="titBlueBottom2 lh23 mb10">(3) support for private business license</div>
								<div class="titBlueBottom2 lh23 mb10">(4) business consulting on the diverse requirements in the initial stage of the venture business operation</div>
								<div class="blueRound">
									<ul>- Accounting & Bookkeeping <br />- Tax consulting<br />- Basic consulting on the financial operation and banking accounts operation plan <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(from a tax perspective and financial stability perspective)<br />- Services from the affiliated professionals as link service <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(patent agency service, judicial agency service, financial service, etc.)<br /></ul>
								</div>We are confident that we can play a role of bridge to bring you to a competitive and larger Venture Business through the stable settlement process in the initial stage. <br /><br /><br />In general, the Start-up Venture business is characterized by technology competitiveness.But we’ve learned that many of them are suffering from the lack of the business operation experience or setting up wrong Tax and Accounting policy due to the lack of knowledge in Tax and Accounting at the beginning, and it is difficult for them to bring themselves to the next level. <br /><br /><br />Having many of those cases of the Start-up Venture business telling us the importance of the solidifying of the Tax & Account practices, the more focused and professional consulting will be provided to uncork the bottlenecks of the Start-up Venture business.
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
		<iframe id="fdi_apply" class="pop_iframe" src="/pages/ch/images/pdf/fdi_apply_document.pdf" style="display: none;"></iframe>
		<iframe id="docu_warrant" class="pop_iframe" src="/pages/ch/images/pdf/docu_en_warrant_document.pdf" style="display: none;"></iframe>
		<iframe id="docu_wo_en" class="pop_iframe" src="/pages/ch/images/pdf/wo_en_document.pdf" style="display: none;"></iframe>
		<iframe id="docu_wo_ch" class="pop_iframe" src="/pages/ch/images/pdf/wo_ch_document.pdf" style="display: none;"></iframe>
		<iframe id="docu_kb_en" class="pop_iframe" src="/pages/ch/images/pdf/kb_en_document.pdf" style="display: none;"></iframe>
		<iframe id="docu_sh_ko" class="pop_iframe" src="/pages/ch/images/pdf/sh_ko_document.pdf" style="display: none;"></iframe>
		<iframe id="docu_sh_en" class="pop_iframe" src="/pages/ch/images/pdf/sh_en_document.pdf" style="display: none;"></iframe>
		<iframe id="docu_sh_ch" class="pop_iframe" src="/pages/ch/images/pdf/sh_ch_document.pdf" style="display: none;"></iframe>
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
<?include $_SERVER['DOCUMENT_ROOT'] . "/ch/pub/include/footer.php";?>