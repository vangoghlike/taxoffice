<?php
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php");

$wrn_arr = explode(',',$arrContInfo['list'][0]['work_request_num']);
$wrm_arr = explode(',',$arrContInfo['list'][0]['work_request_member']);

$wrn_cnt = count($wrn_arr);
$wrm_cnt = count($wrm_arr);

$_managerInfoFirst = selectedManagerIdx($wrm_arr[0]);
?>
<div class="workList">
    <div class="tit bll01">외국인투자기업 설립 업무 의뢰</div>
    <a class="mem_href btn_counsel"><strong>의뢰신청</strong><span><?=$_managerInfoFirst['mngr_name']?></span></a>

    <div class="titBlueBottom2">안녕하세요 ?<br />
        세림세무법인입니다.<br />
        외국인투자기업 설립업무는 세림에서 특화된 업무영역입니다.<br />
        외국인 투자기업을 설립하려는 고객님들께 외투기업 설립 로드맵을 제공해드립니다.<br />
        <br />
        초도 상담 부터 시작하여, 매우 중요한 서류 준비하는 과정을 충분히 상담해드립니다.<br />
        첫 출발인 &quot;외국인 투자신고업무&quot;를 도와드리고 &quot;투자금을 송금하는 과정&quot;을 안내해드립니다.<br />
        외투법인으로 등기하고, 사업자등록 하기 까지 서류 준비와 제반 절차를 도와드립니다.<br />
        그리고 사업자등록 신청하고 외국인 투자기업 등록증 발급 까지 일체의 업무를<br />
        일관되게 자문하고 진행되로록 도와드립니다.<br />
        특히 시중은행과 제휴가 되어 있어 외화 송금 절차에도 많은 편의와 도움을 드릴 수 있습니다.<br />
        뿐만 아니라 항시 통역사(영어)가 함께 있으므로 외국인만 계시는 경우라도<br />
        편하게 절차를 진행할 수 있도록 도와드릴 수있습니다.<br />
        <br />
        뿐만 아니라 외투법인 설립 후 회사 운영과 관련한 세무자문도 수행해 드리고 있습니다.<br />
        해외본사에 보고업무(Monthly Repoet)도 도와드립니다.<br />
        저희 외투 업무팀은 당 법인을 방문하시거나 문의하는 많은 고객님을 위하여 쉽고 편리하게<br />
        한국에서 법인을 설립하고 사업을 시작하실 수 있도록 다양한 노력을 하고 있습니다.<br />
        <br />
        안심하고 세림에 요청하시면 귀사를 위하여 최선의 노력해드리겠습니다~<br />
        감사합니다.
    </div>
</div>

<div class="managerTabWrap mt20">
    <?php
    $_wrm_cnt = 0;
    for($i=0; $i<$wrn_cnt; $i++){
        $_menu_tab_cnt = $wrn_arr[$i];
        switch ($_menu_tab_cnt) {
            case '1':
                $_this_tab_cnt = 'one';
                break;
            case '2':
                $_this_tab_cnt = 'two';
                break;
            case '3':
                $_this_tab_cnt = 'three';
                break;
            case 'f':
                $_this_tab_cnt = 'four';
                break;
            default:
                $_this_tab_cnt = 'two';
                break;
        }
        ?>
        <ul class="managerTab <?=$_this_tab_cnt?> pay mt10 mb10">
            <?php
            for($j=0; $j<$wrn_arr[$i]; $j++){
                $_managerInfo = selectedManagerIdx($wrm_arr[$_wrm_cnt]);
                if ( $_wrm_cnt == 0 ) {
                    $_on_class = 'on';
                } else {
                    $_on_class = '';
                }
                ?>
                <li class="<?=$_on_class?>">
                    <div class="reqTop">
                        <div class="img"><a class="mem_href"><img alt="" src="/uploaded/mngr/<?=$_managerInfo['file_name']?>"/></a></div>

                        <div class="txtWrap">
                            <div class="text">
                                <?php if ($_managerInfo['mngr_position']) { ?>
                                    <b style="color:#0e3894;"><?=$_managerInfo['mngr_position']?></b>
                                <?php } ?>
                                <a class="mem_href"><span><?=$_managerInfo['mngr_name']?></span>입니다.</a>
                            </div>

                            <div class="text2">Tel : <?=$_managerInfo['tel']?></div>

                            <div class="text2 mail">Mail : <a href="mailto:<?=$_managerInfo['email']?>" target="_top"><span><?=$_managerInfo['email']?></span></a></div>

                            <div class="text2 mail">FAX : <a href="mailto:<?=$_managerInfo['fax']?>" target="_top"><span><?=$_managerInfo['fax']?></span></a></div>

                            <?php
                            if($_managerInfo['info4'] != "" || $_managerInfo['info5'] != "" || $_managerInfo['info6'] != "" || $_managerInfo['info7'] != ""){
                                ?>
                                <div class="hidden_area">
                                    <?php
                                    if($_managerInfo['info4'] != ""){
                                        ?>
                                        <div class="flex_div">
                                            <strong>
                                                경력
                                            </strong>
                                            <div>
                                                <?php
                                                $arrInfo4 = explode("\n",( $_managerInfo['current_position'] . "\n" . $_managerInfo['info4']) );
                                                for($k=0;$k<count($arrInfo4);$k++){
                                                    if($arrInfo4[$k] != ""){
                                                        ?>
                                                        <p>- <?=$arrInfo4[$k]?></p>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if($_managerInfo['info5'] != "" || $_managerInfo['info6'] != "" || $_managerInfo['info7'] != ""){
                                        ?>
                                        <div class="flex_div">
                                            <strong>
                                                연구 &<br>
                                                관심분야
                                            </strong>
                                            <div>
                                                <?php
                                                $arrInfo5 = explode("\n",$_managerInfo['info5']);
                                                $arrInfo6 = explode("\n",$_managerInfo['info6']);
                                                $arrInfo7 = explode("\n",$_managerInfo['info7']);
                                                $arrMerge = array_merge($arrInfo5, $arrInfo6, $arrInfo7);
                                                for($k=0;$k<count($arrMerge);$k++){
                                                    if($arrMerge[$k] != ""){
                                                        ?>
                                                        <p>- <?=$arrMerge[$k]?></p>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <a class="add_info_btn close">
                                    주요정보 더보기
                                </a>
                                <?php
                            }
                            ?>
                            <input name="mail_value" type="hidden" value="<?=$_managerInfo['email']?>" /><a class="mem_href btn_counsel_eq">의뢰신청</a>
                        </div>
                    </div>
                </li>
                <?php
                $_wrm_cnt++;
            }
            ?>

        </ul>
        <?php
    }
    ?>
</div>