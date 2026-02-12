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
    <div class="tit bll01">자문 업무 의뢰</div>
    <a class="mem_href btn_counsel"><strong>의뢰신청</strong><span><?=$_managerInfoFirst['mngr_name']?></span></a>

    <div class="titBlueBottom2">안녕하세요 ?<br />
        세림세무법인입니다.<br />
        자문은 일관되고 시스템적 조언이 중요한데,<br />
        세림에서는 자문 메뉴얼에 따른 자문업무를 수행하므로<br />
        귀사를 위한 체계적이고 지속적인 자문을 수행해드릴 수 있습니다.<br />
        다년간 중견기업에 대한 자문업무를 수행한 경험으로 고객님들의 자문 요청에 부응해드릴 수 있습니다.<br />
        세림의 팀원들은 그 동안 수행한 자문으로 축적된 Data에 의하여 중견 기업의 현황을 잘 알며<br />
        현장 적용력과 상황 적응력이 원활하다고 자부합니다.<br />
        요청을 주시면 업무 내용에 따라 담당세무사와 담당실무자를 함께 배정해서 한팀으로<br />
        업무를 수행해 드립니다.<br />
        언제든지 최선의 노력으로 귀사를 도와드리겠습니다~<br />
        감사합니다.</div>
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