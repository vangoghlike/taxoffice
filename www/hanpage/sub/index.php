<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_hanpage.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/hanpage/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/hanpage/pub/include/header.php";?>
<?if($_REQUEST["cat_no"] != 0){?>
	<?include $_SERVER['DOCUMENT_ROOT'] . "/hanpage/pub/include/nav.php";?>
<?}?>
<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20210820015" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />

<script type="text/javascript" src="/common/js/ori_common.js"></script>
<!-- <link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/page_con.css" /> -->
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<!-- subContent -->
<div class="subContent">
    <?php if ( $_REQUEST['boardid'] != 'hanpage' ) { ?>
	<!-- subTopInfo -->
	<div class="subTopInfo">
		<!-- h2Wrap -->
		<div class="h2Wrap">
			<h2>
			<?if($_REQUEST["cat_no"] == 0){?>
				통합검색
			<?}else{?>
				<?=$arrMenu['catName'][$arrTCode[1]]?>
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
    <?php
    }
    ?>
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
					echo '<li '.$navOnClass.' style="width:'.$liWidth.'%"><a href="/hanpage/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['thr'][$arrTCode[1]][$i]['code']].'">'.$arrMenu['thr'][$arrTCode[1]][$i]['name'].'</a></li>';
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
					echo '<li '.$navOnClass.' style="width:'.$liWidth.'%"><a href="/hanpage/sub/?cat_no='.$arrMenu['catLink'][$arrMenu['for'][$arrTCode[2]][$i]['code']].'">'.$arrMenu['for'][$arrTCode[2]][$i]['name'].'</a></li>';
				}
			}			
			?>			
			</ul>
		</div>
		<?}
		####################################################### 4 Depth Menu ########### ED?>
		<?if($arrTCode[2]){	############# 3 Depth 이하가 없으면 숨김처리?>
			<?if($_REQUEST["cat_no"] != 77){ // 상담센터 제목 두번 보이기 막음?>
				<div class="h3Wrap line">
					<h3><?=$arrMenu['catName'][$catNo]?></h3>
					<?if($_REQUEST["cat_no"] == 192){ // 신고도움 서비스 > 소득세 신고 > 신고안내 에서만 작동?>
						<ul class="menu262_clk_wrap">
							<li class="menu262_clk_tab menu262_clk_tab1">
							<a>
							2018년
							</a>
							</li>
							<li class="menu262_clk_tab menu262_clk_tab2 on">
							<a>
							2019년
							</a>
							</li>
						</ul>
					<?}else if($_REQUEST["cat_no"] == 134){?>
						<style>
							.contentPopBtn {
								display: inline-block;
								margin-top: -4px;
								margin-left: 700px;
								width: 224px;
								height: 32px;
								line-height: 32px;
								border: 1px solid #e1e7e7;
								border-radius: 8px;
								cursor: pointer;
								text-align: center;
								font-weight: 600;
								font-size: 0.88rem;
								box-shadow: 2px 2px 8px rgba(100, 120, 130, 0.2);
								transition: all .6s;
							}

							.contentPopBtn:hover {
								box-shadow: 2px 2px 8px rgba(100, 120, 130, 0.4);
							}

							.contentPopBtn i {
								font-size: 0.88rem;
							}

							.contentPopWrap {
								position: relative;
								width: 100%;
								height: 0px;
							}

							.contentPopArea {
								position: absolute;
								top: 0;
								right: 0;
								padding: 32px;
								width: 480px;
								height: auto;
								background: #F5FAFE;
								border: 2px solid #E6E6E6;
								borader-radius: 3px;
								transition: all 0.6s;
							}

							.contentPopArea.on {
								display: block;
							}

							.contentPopArea.off {
								display: none;
							}

							.contentPopArea>strong {
								font-size: 1.16rem;
								color: #000;
							}

							.contentPopArea>.popClose {
								position: absolute;
								top: 10px;
								right: 10px;
								display: block;
								width: 24px;
								height: 24px;
								line-height: 24px;
								cursor: pointer;
								text-align: center;
							}

							.contentPopArea>.popClose i {
								font-size: 1.44rem;
							}

							.contentPopArea p {
								line-height: 1.6;
								font-size: 0.92rem;
							}

							.contentPopArea p strong {
								font-size: 0.92rem;
								color: #0f3994;
							}
						</style>
						<script>
							$(function() {
								var conPopStatus = false;
								$('.contentPopBtn').on('click', function() {
									if (conPopStatus) {
										conPopStatus = false;
									} else {
										conPopStatus = true;
									}
									conPopAct(conPopStatus);
								});
								$('.contentPopArea .popClose').on('click', function() {
									conPopStatus = false;
									conPopAct(conPopStatus);
								});

								function conPopAct(stat) {
									if (stat) {
										$('.contentPopArea').addClass('on');
										$('.contentPopArea').removeClass('off');
									} else {
										$('.contentPopArea').addClass('off');
										$('.contentPopArea').removeClass('on');
									}
								}
							});
						</script>
						<a class="contentPopBtn">외국인투자기업 업무제휴 안내&nbsp;&nbsp;<i class="fa fa-info-circle"></i></a>
						<div class="contentPopWrap">
							<div class="contentPopArea off">
								<a class="popClose"><i class="fa fa-close"></i></a>
								<strong>외국인투자기업 업무제휴 안내</strong><br><br>
								<p>
								세림세무법인은<br>
								외국인 투자기업 전문 세무법인입니다.<br>
								전문 통역사가 항상 대기하고 있습니다.<br>
								 
								금융기관 글로벌투자지원센타와 업무 협조로<br>
								원스톱서비스 제공 가능합니다.<br><br>
								
								<strong>(*) 우리은행과 외국인투자기업 업무협약 <br></strong>
								- 우리은행 글로벌투자지원센터 강남교보타워 2층 <br>
								- 외국인직접투자 담당자&nbsp;&nbsp;<i class="fa fa-phone-square"></i>&nbsp;02-3789-1899 <br><br>
								
								<strong>(*) 국민은행과 업무 협조 관계 <br></strong>
								- 국민은행 외국인투자지원센터 KB손보빌딩 8층<br>
								- 외국인투자업무 담당자&nbsp;&nbsp;<i class="fa fa-phone-square"></i>&nbsp;02-708-9991<br><br>
								
								외국인 투자업무 초도 상담부터<br>
								자금 송금 업무에 관한 사항,   <br>
								법인 설립에 필요한 절차 및 서류 안내를<br>
								쉽고 편리하게 안내해 드립니다.<br>
								외국인 투자기업 설립에 시간과 에너지가 절약 됩니다.<br><br>
								 
								<strong>세림세무법인 외국인투자업무 지원팀</strong><br>
								- 본사 : 최유정세무사&nbsp;&nbsp;<i class="fa fa-phone-square"></i>&nbsp;02-854-2626<br>
								- 강남 : 김주식세무사&nbsp;&nbsp;<i class="fa fa-phone-square"></i>&nbsp;02-854-2151
								</p>
							</div>
						</div>
					<?}?>
					
				</div>
			<?}?>
		<?}?>
		

<?######################## 기존 CSS & 페이지 구성 ######################## ED?>
<?######################## Content ######################## ST?>
<?
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

	$arrCatInfo = getCategoryInfo($catNo);
	
	if($arrCatInfo["total"] > 0){
		if($arrCatInfo["list"][0]["cat_use_type"] == "C" && $arrCatInfo["list"][0]["cat_cont_idx"] != 0){			// 컨텐츠
		?>
		<?if(1==1){	########### 인쇄 프로그램 구현해야함 ######################################################## 중요 #################### 미구현 // 20211130 구현 완료 ?>
		<a class="con_print_btn"><i class="fa fa-print"></i>&nbsp;인쇄</a>
		<div class="clearFix"></div>
		<?}			########### 인쇄 프로그램 구현해야함 ######################################################## 중요 #################### 미구현 // 20211130 구현 완료 ?>
		<?
			$arrContInfo = getContentsInfo($arrCatInfo["list"][0]["cat_cont_idx"]);
			include $_SERVER['DOCUMENT_ROOT'] ."/module/contents/contents.php";
		}else if($arrCatInfo["list"][0]["cat_use_type"] == "B" && $arrCatInfo["list"][0]["cat_board_id"] != ""){	// 게시판
			$_REQUEST['boardid'] = $arrCatInfo["list"][0]["cat_board_id"];
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
<?if($_REQUEST["cat_no"] == 134){?>
<div class="popup_iframe_wrap" style="display: none;">
    <div class="pi_area">
        <h3>SAMPLE PAGE</h3><a class="pi_close_btn">×</a>
        <iframe id="fdi_apply" class="pop_iframe" src="/pages/default/images/pdf/fdi_apply_document.pdf" style="display: none;"></iframe>
        <iframe id="docu_warrant" class="pop_iframe" src="/pages/default/images/pdf/docu_warrant_document.pdf" style="display: none;"></iframe>
        <iframe id="docu_wo_en" class="pop_iframe" src="/pages/default/images/pdf/wo_en_document.pdf" style="display: none;"></iframe>
        <iframe id="docu_wo_ch" class="pop_iframe" src="/pages/default/images/pdf/wo_ch_document.pdf" style="display: none;"></iframe>
        <iframe id="docu_kb_en" class="pop_iframe" src="/pages/default/images/pdf/kb_en_document.pdf" style="display: none;"></iframe>
        <iframe id="docu_sh_ko" class="pop_iframe" src="/pages/default/images/pdf/sh_ko_document.pdf" style="display: none;"></iframe>
        <iframe id="docu_sh_en" class="pop_iframe" src="/pages/default/images/pdf/sh_en_document.pdf" style="display: none;"></iframe>
        <iframe id="docu_sh_ch" class="pop_iframe" src="/pages/default/images/pdf/sh_ch_document.pdf" style="display: none;"></iframe>
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
<?include $_SERVER['DOCUMENT_ROOT'] . "/hanpage/pub/include/footer.php";?>