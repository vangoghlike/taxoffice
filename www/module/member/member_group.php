<?php
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php");

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getManagerListBase();
// 대표
$_sch_boss_arr = array(
    'mngr_position' => '대표',
);
$mngr_boss = getManagerListBase('','','',$_sch_boss_arr);
$arrMCList = getManagerCategoryList(1);

//_DEBUG($arrMenuList);

//DB해제
SetDisConn($dblink);


?>

<div class="memberTop">
    <div class="img img-type-<?=$mngr_info['list'][$i]['face_size']?>"><img alt="<?=$mngr_boss['list'][0]['mngr_name']?>" src="/uploaded/mngr/<?=$mngr_boss['list'][0]['file_name']?>" /></div>

    <div class="textWrap">
        <div class="tit01 nobg"><a href="mailto:<?=$mngr_boss['list'][0]['email']?>" target="_top"><?=$mngr_boss['list'][0]['mngr_name']?></a><span style="color: #000000"> <span style="color: #5198f6">&quot;<?=$mngr_boss['list'][0]['info1']?>&quot;</span></span></div>
        <div class="listTyp01">
            <ul>
                <li class="cstSe-memCate">
                    <div class="tit nobg">기본사항</div>

                    <ul class="smList dot">
                        <li>세림세무법인 대표세무사</li>
                        <?php
                            $arr_profile = $mngr_boss['list'][0]['info3'] . "\n" . $mngr_boss['list'][0]['info2'] . "\n" . $mngr_boss['list'][0]['info4'];
                            $arr_profile = explode("\n",$arr_profile);
                            for($i=0;$i<count($arr_profile);$i++){
                                if($arr_profile[$i] != ""){
                                    ?>
                                    <li><?=$arr_profile[$i]?></li>
                                    <?
                                }
                                if ( $i == 4 )
                                    break;
                            }
                        ?>
                    </ul>

                    <div class="tit nobg ft13">이메일 : <a href="mailto:<?=$mngr_boss['list'][0]['email']?>" target="_top"><span><?=$mngr_boss['list'][0]['email']?></span></a></div>
                </li>
                <li class="cstSe-memCate">
                    <div class="tit nobg">프로필(경력)</div>

                    <ul class="smList dot">
                        <?php
                        $arr_profile = $mngr_boss['list'][0]['info4'];
                        $arr_profile = explode("\n",$arr_profile);
                        for($i=1;$i<count($arr_profile)-1;$i++){
                            if($arr_profile[$i] != ""){
                                ?>
                                <li><?=$arr_profile[$i]?></li>
                                <?
                            }
                        }
                        ?>
                    </ul>
                </li>
                <li class="cstSe-memCate">
                    <div class="tit nobg">연구분야</div>
                    <ul class="smList dot">
                        <?php
                        $arr_profile = $mngr_boss['list'][0]['info5']. "\n" .$mngr_boss['list'][0]['info6'];
                        $arr_profile = explode("\n",$arr_profile);
                        for($i=0;$i<count($arr_profile);$i++){
                            if($arr_profile[$i] != ""){
                                ?>
                                <li><?=$arr_profile[$i]?></li>
                                <?
                            }
                        }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="memberList">
    <ul>
        <?php
        //DB연결
        $dblink = SetConn($_conf_db["main_db"]);
        $_sch_mngr_arr = array(
            'mngr_position' => '1본부 선임',
        );
        $mngr_info = getManagerListBase('','','',$_sch_mngr_arr);
        //DB해제
        SetDisConn($dblink);
        ?>
        <?php if ( $mngr_info['total'] != '0' && $mngr_info ) { ?>
        <li>
            <div class="title"><a href="mailto:<?=$mngr_info['list'][0]['email']?>" target="_top"><?=$mngr_info['list'][0]['mngr_name']?></a><br />
                <span style="color: #5198f6">&quot;<?=$mngr_info['list'][0]['info1']?>&quot;</span></div>

            <div class="infoMember">
                <div class="img img-type-<?=$mngr_info['list'][$i]['face_size']?>"><img alt="<?=$mngr_info['list'][0]['mngr_name']?>" src="/uploaded/mngr/<?=$mngr_info['list'][0]['file_name']?>" /></div>

                <div class="textWrap">
                    <div class="tit nobg">프로필</div>

                    <ul class="dot">
                        <li>총괄 (1본부)
                            <!--&amp; 부대표(1본부장)-->
                        </li>
                        <?php
                        $arr_profile = $mngr_info['list'][0]['current_position'] . "\n"  . $mngr_info['list'][0]['info3'] . "\n" . $mngr_info['list'][0]['info4'] . "\n" . $mngr_info['list'][0]['info6'] . "\n" . $mngr_info['list'][0]['info7'];
                        $arr_profile = explode("\n",$arr_profile);
                        for($i=0;$i<count($arr_profile);$i++){
                            if($arr_profile[$i] != ""){
                                ?>
                                <li><?=$arr_profile[$i]?></li>
                                <?
                            }
                        }
                        ?>
                    </ul>

                    <div class="tit nobg ft13">전화번호 : <span><?=$mngr_info['list'][0]['tel']?></span></div>

                    <div class="tit nobg ft13">이메일 : <a href="mailto:<?=$mngr_info['list'][0]['email']?>" target="_top"><span><?=$mngr_info['list'][0]['email']?></span></a></div>
                </div>
            </div>
        </li>
        <?php } ?>

        <?php
        //DB연결
        $dblink = SetConn($_conf_db["main_db"]);
        $_sch_mngr_arr = array(
            'mngr_position' => '2본부 선임',
        );
        $mngr_info = getManagerListBase('','','',$_sch_mngr_arr);

        //DB해제
        SetDisConn($dblink);
        ?>
        <?php if ( $mngr_info['total'] != '0' && $mngr_info ) { ?>
        <li>
            <div class="title nobg"><a href="mailto:<?=$mngr_info['list'][0]['email']?>" target="_top"><?=$mngr_info['list'][0]['mngr_name']?></a><br />
                <span style="color: #5198f6">&quot;<?=$mngr_info['list'][0]['info1']?>&quot;</span></div>

            <div class="infoMember">
                <div class="img img-type-<?=$mngr_info['list'][$i]['face_size']?>"><img alt="<?=$mngr_info['list'][0]['mngr_name']?>" src="/uploaded/mngr/<?=$mngr_info['list'][0]['file_name']?>" /></div>

                <div class="textWrap">
                    <div class="tit nobg">프로필</div>

                    <ul class="dot">
                        <li>
                            총괄 (2본부)
                        </li>
                        <?php
                        $arr_profile = $mngr_info['list'][0]['current_position'] . "\n" . $mngr_info['list'][0]['info3'] . "\n" . $mngr_info['list'][0]['info4'] . "\n" . $mngr_info['list'][0]['info6'] . "\n" . $mngr_info['list'][0]['info7'];
                        $arr_profile = explode("\n",$arr_profile);
                        for($i=0;$i<count($arr_profile);$i++){
                            if($arr_profile[$i] != ""){
                                ?>
                                <li><?=$arr_profile[$i]?></li>
                                <?
                            }
                        }
                        ?>
                    </ul>

                    <div class="tit nobg ft13">전화번호 : <span><?=$mngr_info['list'][0]['tel']?></span></div>
                    <div class="tit nobg ft13">이메일 : <a href="mailto:<?=$mngr_info['list'][0]['email']?>" target="_top"><span><?=$mngr_info['list'][0]['email']?></span></a></div>
                </div>
            </div>
        </li>
        <?php } ?>
    </ul>
    <?php
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);
    $_sch_mngr_arr = array(
        'mngr_headquarters' => '1본부',
        'mngr_type' => '세무사',
        'mngr_position' => 'NOT 선임',
        'mngr_team' => 'NOT 관리팀',
        'order' => 'mngr_team asc, idx asc',
    );
    $mngr_info = getManagerListBaseGroup('','','',$_sch_mngr_arr);

    //DB해제
    SetDisConn($dblink);
    ?>
    <ul>
        <?php if ( $mngr_info ) { ?>
        <?php
        for($i=0;$i<$mngr_info['total'];$i++){
           if ( $i > 0 && ($i % 2) == 0 ) {
            ?>
    <ul>
            <?php
            }
        ?>
            <li>
                <div class="title nobg"><a href="mailto:<?=$mngr_info['list'][$i]['email']?>" target="_top"><?=$mngr_info['list'][$i]['mngr_name']?></a><br />
                    <span style="color: #5198f6">&quot;<?=$mngr_info['list'][$i]['info1']?>&quot;</span></div>

                <div class="infoMember">
                    <div class="img img-type-<?=$mngr_info['list'][$i]['face_size']?>"><img alt="<?=$mngr_info['list'][$i]['mngr_name']?>" src="/uploaded/mngr/<?=$mngr_info['list'][$i]['file_name']?>" /></div>
                    <div class="textWrap">
                        <div class="tit nobg">프로필</div>

                        <ul class="dot">
                            <?php
                            $arr_profile = $mngr_info['list'][$i]['current_position'] . "\n" . $mngr_info['list'][$i]['info3'] . "\n" . $mngr_info['list'][$i]['info4'] . "\n" . $mngr_info['list'][$i]['info5'] . "\n" . $mngr_info['list'][$i]['info6'] ."\n" . $mngr_info['list'][$i]['info7'] ;
                            $arr_profile = explode("\n",$arr_profile);
                            for($j=0;$j<count($arr_profile);$j++){
                                if($arr_profile[$j] != ""){
                                    ?>
                                    <li><?=$arr_profile[$j]?></li>
                                    <?
                                }
                                if ( $j > 8 ) {
                                    break;
                                }
                            }
                            ?>
                        </ul>

                        <div class="tit nobg ft13">전화번호 : <span><?=$mngr_info['list'][$i]['tel']?></span></div>
                        <div class="tit nobg ft13">이메일 : <a href="mailto:<?=$mngr_info['list'][$i]['email']?>" target="_top"><span><?=$mngr_info['list'][$i]['email']?></span></a></div>
                    </div>
                </div>
            </li>
        <?php
            if ( $i > 0 && ($i-1) % 2 == 0 ) {
            ?>
    </ul>
            <?php
            }
        }
        ?>

        <?php } ?>
    </ul>

    <?php
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);
    $_sch_mngr_arr = array(
        'mngr_headquarters' => '2본부',
        'mngr_type' => '세무사',
        'mngr_position' => 'NOT 선임',
        'mngr_team' => 'NOT 관리팀',
        'order' => 'mngr_team asc, idx asc',
    );
    $mngr_info = getManagerListBaseGroup('','','',$_sch_mngr_arr);
    //DB해제
    SetDisConn($dblink);
    ?>
    <ul>
        <?php if ( $mngr_info ) { ?>
        <?php
        for($i=0;$i<$mngr_info['total'];$i++){
            if ( $i > 0 && ($i % 2) == 0 ) {
                ?>
                <ul>
                <?php
            }
            ?>
            <li>
                <div class="title nobg"><a href="mailto:<?=$mngr_info['list'][$i]['email']?>" target="_top"><?=$mngr_info['list'][$i]['mngr_name']?></a><br />
                    <span style="color: #5198f6">&quot;<?=$mngr_info['list'][$i]['info1']?>&quot;</span></div>

                <div class="infoMember">
                    <div class="img img-type-<?=$mngr_info['list'][$i]['face_size']?>"><img alt="<?=$mngr_info['list'][$i]['mngr_name']?>" src="/uploaded/mngr/<?=$mngr_info['list'][$i]['file_name']?>" /></div>
                    <div class="textWrap">
                        <div class="tit nobg">프로필</div>

                        <ul class="dot">
                            <?php
                            $arr_profile = $mngr_info['list'][$i]['current_position'] . "\n" . $mngr_info['list'][$i]['info3'] . "\n" . $mngr_info['list'][$i]['info4'] . "\n" . $mngr_info['list'][$i]['info5'] . "\n" . $mngr_info['list'][$i]['info6'] ."\n" . $mngr_info['list'][$i]['info7'] ;
                            $arr_profile = explode("\n",$arr_profile);
                            for($j=0;$j<count($arr_profile);$j++){
                                if($arr_profile[$j] != ""){
                                    ?>
                                    <li><?=$arr_profile[$j]?></li>
                                    <?
                                }
                                if ( $j > 8 ) {
                                    break;
                                }
                            }
                            ?>
                        </ul>

                        <div class="tit nobg ft13">전화번호 : <span><?=$mngr_info['list'][$i]['tel']?></span></div>
                        <div class="tit nobg ft13">이메일 : <a href="mailto:<?=$mngr_info['list'][$i]['email']?>" target="_top"><span><?=$mngr_info['list'][$i]['email']?></span></a></div>
                    </div>
                </div>
            </li>
            <?php
            if ( $i > 0 && ($i-1) % 2 == 0 ) {
                ?>
                </ul>
                <?php
            }
        }
        ?>

        <?php } ?>
    </ul>
    <?php
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);
    $_sch_mngr_arr = array(
        'mngr_type' => '세무사',
        'mngr_position' => 'NOT 선임',
        'mngr_team' => '관리팀',
        'order' => 'mngr_team asc, idx asc',
    );
    $mngr_info = getManagerListBase('','','',$_sch_mngr_arr);
    //DB해제

    SetDisConn($dblink);
    ?>
    <?php if ( $mngr_info['total'] != 0 ) { ?>
    <ul>
        <?php if ( $mngr_info['total'] != 0 ) { ?>
            <?php
            for($i=0;$i<(count($mngr_info) - 1);$i++){
                if ( $i > 0 && ($i % 2) == 0 ) {
                    ?>
                    <ul>
                    <?php
                }
                ?>
                <li>
                    <div class="title nobg"><a href="mailto:<?=$mngr_info['list'][$i]['email']?>" target="_top"><?=$mngr_info['list'][$i]['mngr_name']?></a><br />
                        <span style="color: #5198f6">&quot;<?=$mngr_info['list'][$i]['info1']?>&quot;</span></div>

                    <div class="infoMember">
                        <div class="img img-type-<?=$mngr_info['list'][$i]['face_size']?>"><img alt="<?=$mngr_info['list'][$i]['mngr_name']?>" src="/uploaded/mngr/<?=$mngr_info['list'][$i]['file_name']?>" /></div>
                        <div class="textWrap">
                            <div class="tit nobg">프로필</div>

                            <ul class="dot">
                                <?php
                                $arr_profile = $mngr_info['list'][$i]['info3'] . "\n" . $mngr_info['list'][$i]['info4'] . "\n" . $mngr_info['list'][$i]['info5'] . "\n" . $mngr_info['list'][$i]['info6'] ."\n" . $mngr_info['list'][$i]['info7'] ;
                                $arr_profile = explode("\n",$arr_profile);
                                for($j=2;$j<count($arr_profile);$j++){
                                    if($arr_profile[$j] != ""){
                                        ?>
                                        <li><?=$arr_profile[$j]?></li>
                                        <?
                                    }
                                    if ( $j > 8 ) {
                                        break;
                                    }
                                }
                                ?>
                            </ul>

                            <div class="tit nobg ft13">전화번호 : <span><?=$mngr_info['list'][$i]['tel']?></span></div>
                            <div class="tit nobg ft13">이메일 : <a href="mailto:<?=$mngr_info['list'][$i]['email']?>" target="_top"><span><?=$mngr_info['list'][$i]['email']?></span></a></div>
                        </div>
                    </div>
                </li>
                <?php
                if ( $i > 0 && ($i-1) % 2 == 0 ) {
                    ?>
                    </ul>
                    <?php
                }
            }
            ?>

        <?php } ?>
    </ul>
    <?php } ?>
    <ul>
        <?
        //DB연결
        $dblink = SetConn($_conf_db["main_db"]);
        $_sch_mngr_arr = array(
            'mngr_position' => '업무이사',
        );
        $mngr_info = getManagerListBase('','','',$_sch_mngr_arr);
        //DB해제
        SetDisConn($dblink);

        ?>

        <?php if ( $mngr_info ) { ?>
        <li>
            <div class="title nobg"><a href="mailto:<?=$mngr_info['list'][0]['email']?>" target="_top"><?=$mngr_info['list'][0]['mngr_name']?></a><br />
                <span style="color: #5198f6">&quot;<?=$mngr_info['list'][0]['info1']?>&quot;</span></div>

            <div class="infoMember">
                <div class="img img-type-<?=$mngr_info['list'][0]['face_size']?>"><img alt="<?=$mngr_info['list'][0]['mngr_name']?>" src="/uploaded/mngr/<?=$mngr_info['list'][0]['file_name']?>" /></div>
                <div class="textWrap">
                    <div class="tit nobg">프로필</div>

                    <ul class="dot">
                        <?php
                        $arr_profile = $mngr_info['list'][$i]['current_position'] . "\n" . $mngr_info['list'][0]['info3'] . "\n" . $mngr_info['list'][0]['info4'] . "\n" . $mngr_info['list'][0]['info5'] . "\n" . $mngr_info['list'][0]['info7'];
                        $arr_profile = explode("\n",$arr_profile);
                        for($j=0;$j<count($arr_profile);$j++){
                            if($arr_profile[$j] != ""){
                                if($arr_profile[$j] != ""){
                                    ?>
                                    <li><?=$arr_profile[$j]?></li>
                                    <?
                                }
                                if ( $j > 7 ) {
                                    break;
                                }
                            }
                        }
                        ?>
                    </ul>
                    <div class="tit nobg ft13">전화번호 : <span><?=$mngr_info['list'][0]['tel']?></span></div>
                    <div class="tit nobg ft13">이메일 : <a href="mailto:<?=$mngr_info['list'][0]['email']?>" target="_top"><span><?=$mngr_info['list'][0]['email']?></span></a></div>
                </div>
            </div>
        </li>
        <?php } ?>

        <?
        //DB연결
        $dblink = SetConn($_conf_db["main_db"]);
        $_sch_mngr_arr = array(
            'mngr_position' => '관리실장',
        );
        $mngr_info = getManagerListBase('','','',$_sch_mngr_arr);
        //DB해제
        SetDisConn($dblink);
        ?>

        <?php if ( $mngr_info ) { ?>
        <li>
            <div class="title nobg"><a href="mailto:<?=$mngr_info['list'][0]['email']?>" target="_top"><?=$mngr_info['list'][0]['mngr_name']?></a><br />
                <span style="color: #5198f6">&quot;<?=$mngr_info['list'][0]['info1']?>&quot;</span></div>

            <div class="infoMember">
                <div class="img img-type-<?=$mngr_info['list'][0]['face_size']?>"><img alt="<?=$mngr_info['list'][0]['mngr_name']?>" src="/uploaded/mngr/<?=$mngr_info['list'][0]['file_name']?>" /></div>
                <div class="textWrap">
                    <div class="tit nobg">프로필</div>

                    <ul class="dot">
                        <?php
                        $arr_profile = $mngr_info['list'][0]['current_position'] . "\n" . $mngr_info['list'][0]['info3'] . "\n" . $mngr_info['list'][0]['info4'] . "\n" . $mngr_info['list'][0]['info5'] . "\n" . $mngr_info['list'][0]['info7'];
                        $arr_profile = explode("\n",$arr_profile);
                        for($j=0;$j<count($arr_profile);$j++){
                            if($arr_profile[$j] != ""){
                                if($arr_profile[$j] != ""){
                                    ?>
                                    <li><?=$arr_profile[$j]?></li>
                                    <?
                                }
                                if ( $j > 10 ) {
                                    break;
                                }
                            }
                        }
                        ?>
                    </ul>
                    <div class="tit nobg ft13">전화번호 : <span><?=$mngr_info['list'][0]['tel']?></span></div>
                    <div class="tit nobg ft13">이메일 : <a href="mailto:<?=$mngr_info['list'][0]['email']?>" target="_top"><span><?=$mngr_info['list'][0]['email']?></span></a></div>
                </div>
            </div>
        </li>
        <?php } ?>

        <?
        //DB연결
        $dblink = SetConn($_conf_db["main_db"]);
        $_sch_mngr_arr = array(
            'mngr_position' => '실장',
        );
        $mngr_info = getManagerListBase('','','',$_sch_mngr_arr);
        //DB해제
        SetDisConn($dblink);

        ?>

        <?php if ( $mngr_info['total'] > 0 ) { ?>
            <li>
                <div class="title nobg"><a href="mailto:<?=$mngr_info['list'][0]['email']?>" target="_top"><?=$mngr_info['list'][0]['mngr_name']?></a><br />
                    <span style="color: #5198f6">&quot;<?=$mngr_info['list'][0]['info1']?>&quot;</span></div>

                <div class="infoMember">
                    <div class="img img-type-<?=$mngr_info['list'][0]['face_size']?>"><img alt="<?=$mngr_info['list'][0]['mngr_name']?>" src="/uploaded/mngr/<?=$mngr_info['list'][0]['file_name']?>" /></div>
                    <div class="textWrap">
                        <div class="tit nobg">프로필</div>

                        <ul class="dot">
                            <?php
                            $arr_profile = $mngr_info['list'][0]['info3'] . "\n" . $mngr_info['list'][0]['info4'] . "\n" . $mngr_info['list'][0]['info5'] . "\n" . $mngr_info['list'][0]['info7'];
                            $arr_profile = explode("\n",$arr_profile);
                            for($j=2;$j<count($arr_profile);$j++){
                                if($arr_profile[$j] != ""){
                                    if($arr_profile[$j] != ""){
                                        ?>
                                        <li><?=$arr_profile[$j]?></li>
                                        <?
                                    }
                                    if ( $j > 10 ) {
                                        break;
                                    }
                                }
                            }
                            ?>
                        </ul>
                        <div class="tit nobg ft13">전화번호 : <span><?=$mngr_info['list'][0]['tel']?></span></div>
                        <div class="tit nobg ft13">이메일 : <a href="mailto:<?=$mngr_info['list'][0]['email']?>" target="_top"><span><?=$mngr_info['list'][0]['email']?></span></a></div>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>


    <?php
    //DB연결
    $dblink = SetConn($_conf_db["main_db"]);
    $_sch_mngr_arr = array(
        'mngr_headquarters' => '1본부',
        'mngr_type' => '세무사',
        'mngr_position' => '1본부 관리팀',
        'order' => 'mngr_team asc, idx asc',
    );
    $mngr_info = getManagerListBase('','','',$_sch_mngr_arr);
    //DB해제
    SetDisConn($dblink);
    ?>
    <ul style="display:none;">
        <?php if ( $mngr_info ) { ?>
            <?php
            for($i=0;$i<1;$i++){
                if ( $i > 0 && ($i % 2) == 0 ) {
                    ?>
                    <ul>
                    <?php
                }
                ?>
                <li>
                    <div class="title nobg"><a href="mailto:<?=$mngr_info['list'][$i]['email']?>" target="_top"><?=$mngr_info['list'][$i]['mngr_name']?></a><br />
                        <span style="color: #5198f6">&quot;<?=$mngr_info['list'][$i]['info1']?>&quot;</span></div>

                    <div class="infoMember">
                        <div class="img img-type-<?=$mngr_info['list'][$i]['face_size']?>"><img alt="<?=$mngr_info['list'][$i]['mngr_name']?>" src="/uploaded/mngr/<?=$mngr_info['list'][$i]['file_name']?>" /></div>
                        <div class="textWrap">
                            <div class="tit nobg">프로필</div>

                            <ul class="dot">
                                <?php
                                $arr_profile = $mngr_info['list'][$i]['info3'] . "\n" . $mngr_info['list'][$i]['info4'] . "\n" . $mngr_info['list'][$i]['info5'] . "\n" . $mngr_info['list'][$i]['info6'] ."\n" . $mngr_info['list'][$i]['info7'] ;
                                $arr_profile = explode("\n",$arr_profile);
                                for($j=2;$j<count($arr_profile);$j++){
                                    if($arr_profile[$j] != ""){
                                        ?>
                                        <li><?=$arr_profile[$j]?></li>
                                        <?
                                    }
                                    if ( $j > 6 ) {
                                        break;
                                    }
                                }
                                ?>
                            </ul>

                            <div class="tit nobg ft13">전화번호 : <span><?=$mngr_info['list'][$i]['tel']?></span></div>
                            <div class="tit nobg ft13">이메일 : <a href="mailto:<?=$mngr_info['list'][$i]['email']?>" target="_top"><span><?=$mngr_info['list'][$i]['email']?></span></a></div>
                        </div>
                    </div>
                </li>
                <?php
                if ( $i > 0 && ($i-1) % 2 == 0 ) {
                    ?>
                    </ul>
                    <?php
                }
            }
            ?>

        <?php } ?>
    </ul>

    <ul>
        <?php
        //DB연결
        $dblink = SetConn($_conf_db["main_db"]);
        $_sch_mngr_arr = array(
            'mngr_position' => '통역매니저',
        );
        $mngr_info = getManagerListBase('','','',$_sch_mngr_arr);
        //DB해제
        SetDisConn($dblink);
        ?>

        <?php if ( $mngr_info ) { ?>
        <li>
            <div class="title nobg"><a href="mailto:<?=$mngr_info['list'][0]['email']?>" target="_top"><?=$mngr_info['list'][0]['mngr_name']?></a><br />
                 <br>

            <div class="infoMember">
                <div class="img img-type-<?=$mngr_info['list'][0]['face_size']?>"><img alt="<?=$mngr_info['list'][0]['mngr_name']?>" src="/uploaded/mngr/<?=$mngr_info['list'][0]['file_name']?>" /></div>
                <div class="textWrap">
                    <div class="tit nobg">외투업무 통번역 담당 매니저</div>

                    <div class="tit nobg">프로필</div>

                    <ul class="dot">
                        <?php
                        $arr_profile = $mngr_info['list'][0]['info3'] . "\n" . $mngr_info['list'][0]['info4'] . "\n" . $mngr_info['list'][0]['info5'] . "\n" . $mngr_info['list'][$i]['info6'];
                        $arr_profile = explode("\n",$arr_profile);
                        for($j=2;$j<count($arr_profile);$j++){
                            if($arr_profile[$j] != ""){
                                ?>
                                <li><?=$arr_profile[$j]?></li>
                                <?
                            }
                        }
                        ?>
                    </ul>
                    <div class="tit nobg ft13">전화번호 : <span><?=$mngr_info['list'][0]['tel']?></span></div>
                    <div class="tit nobg ft13">이메일 : <a href="mailto:<?=$mngr_info['list'][0]['email']?>" target="_top"><span><?=$mngr_info['list'][0]['email']?></span></a></div>
                </div>
            </div>
        </li>
        <?php } ?>
    </ul>

    <div class="memberPhon" style="display:none;">
        <div class="box">
            <div class="tit nobg">1본부(비즈BIZ) 1팀</div>

            <ul class="dot">
                <li><span style="width: 200px; display: block">정혜미 세무사 : 02-854-0330</span></li>
                <li><span style="width: 200px; display: block">장호연 세무사 : 02-854-2100</span></li>
                <li><span style="width: 200px; display: block">김은희 부장 : 02-854-2155</span></li>
                <li><span style="width: 200px; display: block">홍수현 사원 : 02-854-2856</span></li>
                <li><span style="width: 200px; display: block">김용현 사원 : 02-854-6265</span></li>
            </ul>
        </div>

        <div class="box">
            <div class="tit nobg">1본부(비즈BIZ) 2팀</div>

            <ul class="dot">
                <li><span style="width: 200px; display: block">김대원 세무사 : 02-854-2866</span></li>
                <li><span style="width: 200px; display: block">하유정 세무사 : 02-854-2152</span></li>
                <li><span style="width: 200px; display: block">이보미 과장 : 02-854-2110</span></li>
                <li><span style="width: 200px; display: block">김소영 사원 : 02-854-2130</span></li>
            </ul>
        </div>

        <div class="box">
            <div class="tit nobg">2본부(외투FDI) 1팀</div>

            <ul class="dot">
                <li><span style="width: 200px; display: block">배호영 세무사 : 02-501-2051</span></li>
                <li><span style="width: 200px; display: block">윤서경 세무사 : 02-501-2174</span></li>
                <li><span style="width: 200px; display: block">최수빈 사원 : 02-501-2155</span></li>
            </ul>
        </div>

        <div class="box">
            <div class="tit nobg">2본부(외투FDI) 2팀</div>

            <ul class="dot">
                <li><span style="width: 200px; display: block">박태형 세무사 : 02-501-2185</span></li>
                <li><span style="width: 200px; display: block">김세아 과장 : 02-501-2186</span></li>
                <li><span style="width: 200px; display: block">유진우 사원 : 02-501-2090</span></li>
            </ul>
        </div>

        <p>&nbsp;</p>
    </div>

    <div class="memberPhon t2">
        <div class="tit nobg main_txt">* 구성원 안내</div>

        <div class="og_main">
            <table class="og_tbl">
                <tbody>
                <tr>
                    <th>대표세무사</th>
                    <td>김창진 세무사</td>
                </tr>
                <tr>
                    <th>총괄세무사(1본부)</th>
                    <td>최유정 세무사</td>
                </tr>
                <tr>
                    <th>총괄세무사(2본부)</th>
                    <td>권다희 세무사</td>
                </tr>
                <tr>
                    <th>업무이사</th>
                    <td>강삼엽 이사</td>
                </tr>
                <tr>
                    <th>관리실장</th>
                    <td>이선영 실장</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="organ_box_wr">
            <div class="organ_box">
                <div class="tit nobg">1본부 (비즈BIZ)</div>

                <div class="ob_sub">
                    <div class="tit nobg">관리부</div>

                    <ul>
                        <?php
                        //DB연결
                        $dblink = SetConn($_conf_db["main_db"]);
                        $_sch_mngr_arr = array(
                            'mngr_headquarters' => '1본부',
                            'mngr_team' => '관리팀',
                        );
                        $mngr_info = getManagerListBaseMG('','','',$_sch_mngr_arr);

                        // 우선순위
                        $mngr_info['list'] = sortManagerList($mngr_info['list']);

                        function sortManagerList($list) {
                            $priority = [
                                '세무사' => 1,
                                '이사' => 2,
                                '실장' => 3,
                                // 다른 직책은 그 다음 우선순위로
                                'default' => 99
                            ];

                            usort($list, function($a, $b) use ($priority) {
                                $a_pos = isset($priority[$a['mngr_type']]) ? $priority[$a['mngr_type']] : $priority['default'];
                                $b_pos = isset($priority[$b['mngr_type']]) ? $priority[$b['mngr_type']] : $priority['default'];

                                return $a_pos - $b_pos;
                            });

                            return $list;
                        }

                        //DB해제
                        SetDisConn($dblink);
                        ?>

                        <?php
                        for($i=0;$i<count($mngr_info['list'])-1;$i++){
                        ?>
                            <li><strong><?=$mngr_info['list'][$i]['mngr_name']?><br />
                            <?php
                            if ( $i == 0 ) {
                                if ( strpos($mngr_info['list'][$i]['mngr_position'], '선임') !== false  ) {
                                    echo '(선임 세무사)';
                                }

                            }
                            ?>
                             </strong> <span> Tel. <?=$mngr_info['list'][$i]['tel']?> </span></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>

                <div class="ob_sub">
                    <div class="tit nobg">1본부 1팀</div>

                    <ul>
                        <?php
                        //DB연결
                        $dblink = SetConn($_conf_db["main_db"]);
                        $_sch_mngr_arr = array(
                            'mngr_headquarters' => '1본부',
                            'mngr_team' => '1팀',
                        );
                        $mngr_info = getManagerListBaseMG('','','',$_sch_mngr_arr);
                        //DB해제
                        SetDisConn($dblink);
                        ?>

                        <?php
                        $_length = 4;
                        $_start_num = 1;
                        if ( $mngr_info['list'][0]['mngr_position'] != '1본부 1팀장' ) {
                            ?>
                            <li><strong>-<br />
                                    <?php echo '(1본부 1팀장)'; ?>
                                </strong> <span></span></li>
                            <?php
                            $_length = 3;
                            $_start_num = 0;
                        } else {
                            ?>
                            <li><strong><?=$mngr_info['list'][0]['mngr_name']?><br />
                                    <?php echo '(1본부 1팀장)'; ?>
                                </strong> <span> Tel. <?=$mngr_info['list'][0]['tel']?> </span></li>
                            <?php
                        }
                        for($i=$_start_num;$i<$_length;$i++){
                            if ( $mngr_info['list'][$i]['mngr_name'] ) {
                                ?>
                                <li><strong><?=$mngr_info['list'][$i]['mngr_name']?><br />
                                    </strong> <span> Tel. <?=$mngr_info['list'][$i]['tel']?> </span></li>
                                <?php
                            } else {
                                ?>
                                <li><strong>-<br />
                                    </strong> <span></span></li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>

                <div class="ob_sub">
                    <div class="tit nobg">1본부 2팀</div>

                    <ul>
                        <?php
                        //DB연결
                        $dblink = SetConn($_conf_db["main_db"]);
                        $_sch_mngr_arr = array(
                            'mngr_headquarters' => '1본부',
                            'mngr_team' => '2팀',
                        );
                        $mngr_info = getManagerListBaseMG('','','',$_sch_mngr_arr);
                        //DB해제
                        SetDisConn($dblink);
                        ?>

                        <?php
                        $_length = 4;
                        $_start_num = 1;
                        if ( $mngr_info['list'][0]['mngr_position'] != '1본부 2팀장' ) {
                            ?>
                            <li><strong>-<br />
                                    <?php echo '(1본부 2팀장)'; ?>
                                </strong> <span></span></li>
                            <?php
                            $_length = 3;
                            $_start_num = 0;
                        } else {
                            ?>
                            <li><strong><?=$mngr_info['list'][0]['mngr_name']?><br />
                                    <?php echo '(1본부 2팀장)'; ?>
                                </strong> <span> Tel. <?=$mngr_info['list'][0]['tel']?> </span></li>
                            <?php
                        }
                        for($i=$_start_num;$i<$_length;$i++){
                            if ( $mngr_info['list'][$i]['mngr_name'] ) {
                                ?>
                                <li><strong><?=$mngr_info['list'][$i]['mngr_name']?><br />
                                    </strong> <span> Tel. <?=$mngr_info['list'][$i]['tel']?> </span></li>
                                <?php
                            } else {
                                ?>
                                <li><strong>-<br />
                                    </strong> <span></span></li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <div class="organ_box">
                <div class="tit nobg">2본부 (외투FDI)</div>

                <div class="ob_sub">
                    <div class="tit nobg">관리부</div>

                    <ul>
                        <?php
                        //DB연결
                        $dblink = SetConn($_conf_db["main_db"]);
                        $_sch_mngr_arr = array(
                            'mngr_headquarters' => '2본부',
                            'mngr_team' => '관리팀',
                        );
                        $mngr_info = getManagerListBaseMG('','','',$_sch_mngr_arr);
                        //DB해제
                        SetDisConn($dblink);
                        ?>

                        <?php
                        for($i=0;$i<count($mngr_info['list'])-1;$i++){
                            ?>
                            <li><strong><?=$mngr_info['list'][$i]['mngr_name']?><br />
                                    <?php if ( $i == 0 ) { echo '(선임 세무사)'; } ?>
                                </strong> <span> Tel. <?=$mngr_info['list'][$i]['tel']?> </span></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>

                <div class="ob_sub">
                    <div class="tit nobg">2본부 1팀</div>

                    <ul>
                        <?php
                        //DB연결
                        $dblink = SetConn($_conf_db["main_db"]);
                        $_sch_mngr_arr = array(
                            'mngr_headquarters' => '2본부',
                            'mngr_team' => '1팀',
                        );
                        $mngr_info = getManagerListBaseMG('','','',$_sch_mngr_arr);
                        //DB해제
                        SetDisConn($dblink);
                        ?>

                        <?php
                        $_length = 4;
                        $_start_num = 1;
                        if ( $mngr_info['list'][0]['mngr_position'] != '2본부 1팀장' ) {
                            ?>
                            <li><strong>-<br />
                                    <?php echo '(2본부 1팀장)'; ?>
                                </strong> <span></span></li>
                            <?php
                            $_length = 3;
                            $_start_num = 0;
                        } else {
                            ?>
                            <li><strong><?=$mngr_info['list'][0]['mngr_name']?><br />
                                    <?php echo '(2본부 1팀장)'; ?>
                                </strong> <span> Tel. <?=$mngr_info['list'][0]['tel']?> </span></li>
                            <?php
                        }
                        for($i=$_start_num;$i<$_length;$i++){
                            if ( $mngr_info['list'][$i]['mngr_name'] ) {
                                ?>
                                <li><strong><?=$mngr_info['list'][$i]['mngr_name']?><br />
                                    </strong> <span> Tel. <?=$mngr_info['list'][$i]['tel']?> </span></li>
                                <?php
                            } else {
                                ?>
                                <li><strong>-<br />
                                    </strong> <span></span></li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>

                <div class="ob_sub">
                    <div class="tit nobg">2본부 2팀</div>
                    <ul>
                        <?php
                        //DB연결
                        $dblink = SetConn($_conf_db["main_db"]);
                        $_sch_mngr_arr = array(
                            'mngr_headquarters' => '2본부',
                            'mngr_team' => '2팀',
                        );
                        $mngr_info = getManagerListBaseMG('','','',$_sch_mngr_arr);
                        //DB해제
                        SetDisConn($dblink);
                        ?>

                        <?php
                        $_length = 4;
                        $_start_num = 1;
                        if ( $mngr_info['list'][0]['mngr_position'] != '2본부 2팀장' ) {
                            ?>
                            <li><strong>-<br />
                                    <?php echo '(2본부 2팀장)'; ?>
                                </strong> <span></span></li>
                            <?php
                            $_length = 3;
                            $_start_num = 0;
                        } else {
                            ?>
                            <li><strong><?=$mngr_info['list'][0]['mngr_name']?><br />
                                    <?php echo '(2본부 2팀장)'; ?>
                                </strong> <span> Tel. <?=$mngr_info['list'][0]['tel']?> </span></li>
                            <?php
                        }
                        for($i=$_start_num;$i<$_length;$i++){
                            if ( $mngr_info['list'][$i]['mngr_name'] ) {
                                ?>
                                <li><strong><?=$mngr_info['list'][$i]['mngr_name']?><br />
                                    </strong> <span> Tel. <?=$mngr_info['list'][$i]['tel']?> </span></li>
                                <?php
                            } else {
                                ?>
                                <li><strong>-<br />
                                    </strong> <span></span></li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <p>&nbsp;</p>
    </div>
</div>
