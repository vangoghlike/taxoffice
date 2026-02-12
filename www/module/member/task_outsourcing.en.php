<?php
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php");

$wrn_arr = explode(',',$arrContInfo['list'][0]['work_request_num']);
$wrm_arr = explode(',',$arrContInfo['list'][0]['work_request_member']);

$wrn_cnt = count($wrn_arr);
$wrm_cnt = count($wrm_arr);

$_managerInfoFirst = selectedManagerIdx($wrm_arr[0]);
$_managerInfoSecond = selectedManagerIdx($wrm_arr[2]);
?>

<div class="workList">
    <div class="tit bll01">아웃소싱 업무 의뢰</div>
    <!--    <a class="mem_href btn_counsel twoLine tax"><strong>회계업무<br />-->
    <!--            의뢰신청</strong><span>1본부 총괄 최유정세무사</span></a><a class="mem_href btn_counsel twoLine pay"><strong>Payroll<br />-->
    <!--            의뢰신청</strong><span>강삼엽 업무이사</span></a>-->

    <a class="mem_href twoLine btn_counsel tax"><strong>회계업무<br>의뢰신청</strong><span><?=$_managerInfoSecond['mngr_name']?></span></a>
    <a class="mem_href twoLine btn_counsel pay"><strong>Payroll<br>의뢰신청</strong><span><?=$_managerInfoFirst['mngr_name']?></span></a>


    <div class="titBlueBottom2">안녕하세요 ?<br />
        세림세무법인입니다<br />
        <br />
        (Payroll 아웃소싱)<br />
        오랫동안 축적된 Payroll 아웃소싱 업무 경험으로 고객님들의 급여 및 4대보험 업무를<br />
        서비스해 드리고 있습니다.<br />
        급여 관련 기초 자료를 제공해 주시면, 급여 테이블 작성 부터 개인별 급여 지급 까지<br />
        일관되게 처리해드립니다.<br />
        또한 4대보험 가입 부터, 탈퇴 까지, 급여 확정에 따른 정산 업무 까지 처리해 드립니다.<br />
        오랫동안 Payroll 업무를 담당한 실무 책임자가 서비스를 관리하고 있습니다.<br />
        <br />
        (회계업무 아웃소싱)<br />
        다년간 중견기업에 대한 자문 업무를 수행해 오면서 축적된 업무 지식과 경험으로<br />
        회계 아웃소싱을 희망하는 고객님들께 고품질의 회계 아웃소싱 서비스를 제공합니다.<br />
        회계 아웃소싱 업무는 기업에 대한 세무자문 능력과 기장 지도 능력이 어우러져 수행되는데,<br />
        오랜 경험을 가진 실무진과 많은 기업을 자문하는 과정에서 다양한 케이스를 축적한 세무사로<br />
        구성된 업무팀이 귀사의 회계 업무 전반을 도와드릴 것입니다.<br />
        자문 메뉴얼에 따른 자문을 수행하므로 체계적이고 지속적인 자문을 수행해드릴 수 있습니다.<br />
        세림의 팀원들은 그 동안 수행한 자문으로 축적된 Data에 의하여 중견 기업의 현황을 잘 알며<br />
        현장 적용력과 상황 적응력이 원활하다고 자부합니다.<br />
        <br />
        언제든지 최선의 노력으로 귀사를 도와드리겠습니다~<br />
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
        <?php if ( $i == 0 ) { ?>
            <div class="tit01">(Payroll 아웃소싱)</div>
        <?php } ?>
        <?php if ( $i == 1 ) { ?>
            <div class="tit01">(회계업무 아웃소싱)</div>
        <?php } ?>
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
                            <div class="text"><a class="mem_href"><span><?=$_managerInfo['mngr_name']?></span>입니다.</a>
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
                                                $arrInfo4 = explode("\n",$_managerInfo['info4']);
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