<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/contents/contents.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php");
?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/head.php";?>
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/header.php";?>
<?php
$dblink = SetConn($_conf_db["main_db"]);
$arrCatInfo_val = getCategoryInfo($catNo);
//echo $catNo;
echo '<pre>';
//var_dump($arrCatInfo_val);
echo '</pre>';
$_REQUEST['_cat_type'] = $arrCatInfo_val["list"][0]["cat_use_type"];
//DB해제
SetDisConn($dblink);
?>
<?if($_REQUEST["cat_no"] != 0){?>
	<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/nav.php";?>
<?}?>
<?######################## 기존 CSS & 페이지 구성 ######################## ST?>
<!--	<link href="//cdn.jsdelivr.net/nanumsquare/1.0/nanumsquare.css" rel="stylesheet" type="text/css"> -->
<!--	<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/base/jquery-ui-1.9.2.custom.css" /> -->
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/common.css?v=20250111915" />
<link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/dev.css" />

<script type="text/javascript" src="/common/js/ori_common.js?v=2025111901"></script>
<!-- <link rel="stylesheet" type="text/css" media="all" href="/pages/default/css/page_con.css" /> -->
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<!-- subContent -->
<div class="subContent web-taxoffice">
<?php if ( !( $_REQUEST['_cat_type'] == 'A' || $_REQUEST['_cat_type'] == 'M' ) ){ ?>
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

                <?if($_REQUEST["cat_no"] == 67 || $_REQUEST["cat_no"] == 258){?>
<!--                    <a class="org_menu_btn --><?php //=$_REQUEST["cat_no"] == 67 ? "on" : ""?><!--" href="/sub/?cat_no=67">-->
<!--                        본점-->
<!--                    </a>-->
<!--                    <a class="org_menu_btn --><?php //=$_REQUEST["cat_no"] == 258 ? "on" : ""?><!--"" href="/sub/?cat_no=258">-->
<!--                        지점-->
<!--                    </a>-->
                <?}?>

                <?if($_REQUEST["cat_no"] == 29){?>
                    <a class="org_menu_btn" href="/sub/tax4.php">
                        보수결제
                    </a>
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
<?php } ?>
	<!-- contStart -->
	<div class="contStart">
        <?php
        if (!function_exists('selim_menu_type_norm')) {
            // type 값 정규화: ' w ', 'W', "\r\nW" 같은 케이스 방지
            function selim_menu_type_norm($type) {
                return strtoupper(trim((string)$type));
            }
        }

        if (!function_exists('selim_menu_li_attr')) {
            /**
             * 공통 li class 규칙
             * - on: 선택된 메뉴 (최우선)
             * - emphasis: type=O 이면서 on이 아닐 때
             * - nav-point: type=O/W 일 때
             * - extraClasses: 추가 클래스가 필요하면 배열로 전달
             */
            function selim_menu_li_attr($isOn, $type, $extraClasses = array()) {
                $type = selim_menu_type_norm($type);

                $classes = array();

                if ($isOn) {
                    $classes[] = 'on';
                } else if ($type === 'O') {
                    $classes[] = 'emphasis';
                }

                if ($type === 'O' || $type === 'W' || $type === 'M' || $type === 'A') {
                    $classes[] = 'nav-point';
                }

                if (!empty($extraClasses) && is_array($extraClasses)) {
                    $classes = array_merge($classes, $extraClasses);
                }

                $classes = array_values(array_unique($classes));
                return empty($classes) ? '' : ' class="'.htmlspecialchars(implode(' ', $classes), ENT_QUOTES, 'UTF-8').'"';
            }
        }
        ?>

        <?php
        ####################################################### 3 Depth Menu ########### ST
        $thr_show_total = isset($arrMenu['thr'][$arrTCode[1]]['show_total']) ? (int)$arrMenu['thr'][$arrTCode[1]]['show_total'] : 0;
        $thr_total      = isset($arrMenu['thr'][$arrTCode[1]]['total']) ? (int)$arrMenu['thr'][$arrTCode[1]]['total'] : 0;

        if ($thr_show_total > 1) {
            $liWidth = 100 / $thr_show_total;

            $menu_class = '';
            if ($arrTCode[0] == "14") {
                $menu_class = "topic";
            } else if ($arrTCode[1] == "20" || $arrTCode[1] == "279") {
                $menu_class = "report";
            }
            ?>
            <div class="tabType01 type ">
                <ul class="<?=$menu_class?> tab<?=$thr_total?><?php if ( $thr_total > 7) { echo " multi-line__tab"; }?>">
                    <?php
                    for ($i=0; $i<$thr_total; $i++) {
                        if (!isset($arrMenu['thr'][$arrTCode[1]][$i])) continue;

                        $item = $arrMenu['thr'][$arrTCode[1]][$i];
                        if (isset($item['show']) && $item['show'] == "N") continue;

                        $itemCode = isset($item['code']) ? (string)$item['code'] : '';
                        $itemName = isset($item['name']) ? (string)$item['name'] : '';
                        $itemType = isset($item['type']) ? $item['type'] : '';

                        $isOn = ((string)$arrTCode[2] === $itemCode);
                        $liAttr = selim_menu_li_attr($isOn, $itemType);

                        $linkCat = isset($arrMenu['catLink'][$itemCode]) ? (string)$arrMenu['catLink'][$itemCode] : $itemCode;

                        if ( $thr_total > 7 && $thr_total < 12) {
                            echo '<li'.$liAttr.'><a href="/sub/?cat_no='.$linkCat.'">'.$itemName.'</a></li>';
                        } else {
                            echo '<li'.$liAttr.' style="width:'.$liWidth.'%"><a href="/sub/?cat_no='.$linkCat.'">'.$itemName.'</a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
            <?php
        }
        ####################################################### 3 Depth Menu ########### ED


        ####################################################### 4 Depth Menu ########### ST
        $for_show_total = isset($arrMenu['for'][$arrTCode[2]]['show_total']) ? (int)$arrMenu['for'][$arrTCode[2]]['show_total'] : 0;
        $for_total      = isset($arrMenu['for'][$arrTCode[2]]['total']) ? (int)$arrMenu['for'][$arrTCode[2]]['total'] : 0;

        // 5뎁 탭이 존재하면(2개 이상) 4뎁에서 선택 기준을 catNo가 아니라 arrTCode[3]로 맞춰야 함 (기존 로직 유지)
        $fiv_show_total = isset($arrMenu['fiv'][$arrTCode[3]]['show_total']) ? (int)$arrMenu['fiv'][$arrTCode[3]]['show_total'] : 0;
        $hasDepth5Tabs  = ($fiv_show_total > 1);

        if ($for_show_total > 1) {
            $liWidth = 100 / $for_show_total;
            ?>
            <div class="tabType02 suitable">
                <ul>
                    <?php
                    for ($i=0; $i<$for_total; $i++) {
                        if (!isset($arrMenu['for'][$arrTCode[2]][$i])) continue;

                        $item = $arrMenu['for'][$arrTCode[2]][$i];
                        if (isset($item['show']) && $item['show'] == "N") continue;

                        $itemCode = isset($item['code']) ? (string)$item['code'] : '';
                        $itemName = isset($item['name']) ? (string)$item['name'] : '';
                        $itemType = isset($item['type']) ? $item['type'] : '';

                        // 5뎁이 있으면 4뎁 on은 arrTCode[3] 기준, 없으면 catNo 기준
                        $isOn = $hasDepth5Tabs ? ((string)$arrTCode[3] === $itemCode) : ((string)$catNo === $itemCode);

                        $liAttr = selim_menu_li_attr($isOn, $itemType);

                        $linkCat = isset($arrMenu['catLink'][$itemCode]) ? (string)$arrMenu['catLink'][$itemCode] : $itemCode;

                        echo '<li'.$liAttr.' style="width:'.$liWidth.'%"><a href="/sub/?cat_no='.$linkCat.'">'.$itemName.'</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <?php
        }
        ####################################################### 4 Depth Menu ########### ED


        ####################################################### 5 Depth Menu ########### ST
        $fiv_total = isset($arrMenu['fiv'][$arrTCode[3]]['total']) ? (int)$arrMenu['fiv'][$arrTCode[3]]['total'] : 0;

        if ($fiv_show_total > 1) {
            $liWidth = 100 / $fiv_show_total;

            $tab4_menu_class = '';
            $tab4_menu_ul_class = '';
            $tab4_menu_ul_class2 = '';

            if (
                $_REQUEST["cat_no"] == '285' || $_REQUEST["cat_no"] == '286' || $_REQUEST["cat_no"] == '287' || $_REQUEST["cat_no"] == '288'
                || $_REQUEST["cat_no"] == '292' || $_REQUEST["cat_no"] == '293'
            ) {
                $tab4_menu_class = 'tabType01';
                $tab4_menu_ul_class = 'report';
                if ($_REQUEST["cat_no"] == '292' || $_REQUEST["cat_no"] == '293') {
                    $tab4_menu_ul_class2 = 'tab2';
                } else {
                    $tab4_menu_ul_class2 = 'tab4';
                }
            } else {
                $tab4_menu_class = 'tabType02';
            }
            ?>
            <div class="<?=$tab4_menu_class?> suitable">
                <ul class="<?=$tab4_menu_ul_class?> <?=$tab4_menu_ul_class2?>">
                    <?php
                    for ($i=0; $i<$fiv_total; $i++) {
                        if (!isset($arrMenu['fiv'][$arrTCode[3]][$i])) continue;

                        $item = $arrMenu['fiv'][$arrTCode[3]][$i];
                        if (isset($item['show']) && $item['show'] == "N") continue;

                        $itemCode = isset($item['code']) ? (string)$item['code'] : '';
                        $itemName = isset($item['name']) ? (string)$item['name'] : '';
                        $itemType = isset($item['type']) ? $item['type'] : '';

                        $isOn = ((string)$catNo === $itemCode);
                        $liAttr = selim_menu_li_attr($isOn, $itemType);

                        $linkCat = isset($arrMenu['catLink'][$itemCode]) ? (string)$arrMenu['catLink'][$itemCode] : $itemCode;

                        echo '<li'.$liAttr.' style="width:'.$liWidth.'%"><a href="/sub/?cat_no='.$linkCat.'">'.$itemName.'</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <?php
        }
        ####################################################### 5 Depth Menu ########### ED
        ?>
		<?if($arrTCode[2]){	############# 3 Depth 이하가 없으면 숨김처리?>
			<?if($_REQUEST["cat_no"] != 77){ // 상담센터 제목 두번 보이기 막음?>
                <?php if ( !( $_REQUEST['_cat_type'] == 'A' || $_REQUEST['_cat_type'] == 'M' ) ){ ?>
				<div class="h3Wrap line h3_<?=$_REQUEST["cat_no"]?>">
					<h3><?=$arrMenu['catName'][$catNo]?></h3>
					<?if($_REQUEST["cat_no"] == 192){ // 신고도움 서비스 > 소득세 신고 > 신고안내 에서만 작동?>
						<ul class="menu262_clk_wrap">
							<li class="menu262_clk_tab menu262_clk_tab1">
                                <a>
                                2018년
                                </a>
							</li>
							<li class="menu262_clk_tab menu262_clk_tab2">
                                <a>
                                2019년
                                </a>
							</li>
							<li class="menu262_clk_tab menu262_clk_tab3">
                                <a>
                                2020년
                                </a>
							</li>
							<li class="menu262_clk_tab menu262_clk_tab4">
                                <a>
                                2021년
                                </a>
							</li>
							<li class="menu262_clk_tab menu262_clk_tab5 on">
                                <a>
                                2022년
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
								- 1본부 : 황정민 세무사&nbsp;&nbsp;<i class="fa fa-phone-square"></i>&nbsp;02-854-0600<br>
								- 2본부 : 배호영 세무사&nbsp;&nbsp;<i class="fa fa-phone-square"></i>&nbsp;02-501-2051
								</p>
							</div>
						</div>
					<?}?>
					
				</div>
                <?php } ?>
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
        <div class="page-top-btn-wrap">
        <?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){?>
            <button id="kakao-link-btn" class="kakao-link-btn" data-login-status="yes" data-thumb="/pub/images/share/kakaoshare.png">
                <img src="https://developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_small.png" alt="세무Chat 답변 공유">
                <div class="txt"><span class="hidden-txt">세림세무법인 정보</span><span>공유</span></div>
            </button>
            <a class="con_print_btn"><i class="fa fa-print"></i>&nbsp;인쇄</a>
        <?}else{?>
            <button id="kakao-link-btn" class="kakao-link-btn nouser" data-login-status="no">
                <img src="https://developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_small.png" alt="세무Chat 답변 공유">
                <div class="txt"><span class="hidden-txt">세림세무법인 정보</span><span>공유</span></div>
            </button>

            <a class="con_print_btn nouser"><i class="fa fa-print"></i>&nbsp;인쇄</a>
        <?}?>
        </div>
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
		}else if($arrCatInfo["list"][0]["cat_use_type"] == "W"){		// 업무의뢰 db 연결형
            $_REQUEST['mode'] = "write";
            $_REQUEST['boardid'] = $arrCatInfo["list"][0]["cat_board_id"];
            $_REQUEST['cat_no'] = $_REQUEST['cat_no'];

            $arrContInfo = getContentsInfo($arrCatInfo["list"][0]["cat_cont_idx"]);
            include $_SERVER['DOCUMENT_ROOT'] .$arrCatInfo["list"][0]["location"];
            //DB연결
            $dblink = SetConn($_conf_db["main_db"]);
            include $_SERVER['DOCUMENT_ROOT'] ."/module/board/menu_board.php";
            //DB해제
            SetDisConn($dblink);
        }else if($arrCatInfo["list"][0]["cat_use_type"] == "M"){		// 신고의뢰
			if($_GET["mngr_idx"] == ""){
				include $_SERVER['DOCUMENT_ROOT'] .$arrCatInfo["list"][0]["location"];
			}else{
				if($_GET["step"] == "1"){
					include $_SERVER['DOCUMENT_ROOT'] ."/counseling/report_request02.php";
				}
			}
		}else if($arrCatInfo["list"][0]["cat_use_type"] == "Z"){		// 화상회의실
            include $_SERVER['DOCUMENT_ROOT'] ."/counseling/zoom_video.selim.php";
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
		}else if($arrCatInfo["list"][0]["cat_use_type"] == "G"){		// 구성원
            include $_SERVER['DOCUMENT_ROOT'] .$arrCatInfo["list"][0]["location"];
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
<?include $_SERVER['DOCUMENT_ROOT'] . "/pub/include/footer.php";?>