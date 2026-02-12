<?php
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category.lib.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php");

//DB연결
$dblink = SetConn($_conf_db["main_db"]);
$arrList = getManagerListBase("","","","",363);
$arrMCList = getManagerCategoryList(1);

//DB해제
SetDisConn($dblink);
if ( $_REQUEST["value"] == "all" ) {
?>
<ul>
<?
if($arrList["list"]["total"] > 0){
    for($i=0;$i<$arrList["list"]["total"];$i++){
        $arr_cat_txt = array();
        $arrG_cat = explode("^",$arrList['list'][$i]['goods_category']);
        for($j=0;$j<count($arrG_cat);$j++){
            if($arrG_cat[$j] !=""){
                $arrCat = explode(":",$arrG_cat[$j]);
                if($arrCat[1] != ""){
                    if($arrMCList["idx"][$arrCat[1]] != ""){
                        if($arrCat[1] != 346 && $arrCat[1] != 347 && $arrCat[1] != 348 && $arrCat[1] != 349 && $arrCat[1] != 350){
                            array_push($arr_cat_txt,$arrMCList["idx"][$arrCat[1]]);
                        }
                    }
                }
            }
        }
        if(count($arr_cat_txt) < 1){
            continue;
        }
?>
<li class="mngr_1li">
    <div class="main-Info">
        <div class="selView">
            <div class="img">
                <img src="/uploaded/mngr/<?=$arrList['list'][$i]['file_name']?>" alt="<?=$arrList['list'][$i]['mngr_name']?>">
            </div>
            <input type="hidden" class="mngr_tel" value="<?=$arrList['list'][$i]['tel']?>" data-name="<?=$arrList['list'][$i]['tel']?>" />
            <input type="hidden" class="mngr_name" value="<?=$arrList['list'][$i]['mngr_name']?>" data-name="<?=$arrList['list'][$i]['mngr_name']?>" />
            <input type="hidden" class="mngr_phone" value="<?=$arrList['list'][$i]['phone']?>" data-name="<?=$arrList['list'][$i]['phone']?>" />
            <input type="hidden" class="mngr_mail" value="<?=$arrList['list'][$i]['email']?>" data-name="<?=$arrList['list'][$i]['email']?>" />
            <!--<div class="viewBtn open">
                <img src="{ TYPE_URL }/images/mbv/open_view.png" alt="세무사정보 보기" />
            </div>-->
        </div>

    </div>

    <div class="view-info">
        <a class="view-info__view-btn">Info</a>
        <div class="in">
            <div class="txt">
                <div class="tit01"><?=$arrList['list'][$i]['mngr_name']?></div>
                <div class="tit02">"<?=$arrList["list"][$i]['info1']?>"</div>
            </div>
            <div class="hidden_info">
                <ul class="mngr_sub_info">
                    <?php if($arrList["list"][$i]['info4'] != ''){?>
                    <li class="career_li">
                        <div class="tit no3">경력</div>
                        <div class="text">
                            <ul>
                                <?php
                                $arrInfo4 = explode("\n",$arrList['list'][$i]['info4']);
                                for($j=0;$j<count($arrInfo4);$j++){
                                    if($arrInfo4[$j] != ""){
                                        ?>
                                        <li>- <?=$arrInfo4[$j]?></li>
                                        <?
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    <?php if($arrList['list'][$i]['info5'] != "" || $arrList['list'][$i]['info6'] != "" || $arrList['list'][$i]['info7'] != ""){ ?>
                    <li class="research_li">
                        <div class="tit no3 last">연구 & 관심분야</div>
                        <div class="text">
                            <ul>
                                <?php
                                $arrInfo5 = explode("\n",$arrList['list'][$i]['info5']);
                                $arrInfo6 = explode("\n",$arrList['list'][$i]['info6']);
                                $arrInfo7 = explode("\n",$arrList['list'][$i]['info7']);
                                $arrMerge = array_merge($arrInfo5, $arrInfo6, $arrInfo7);
                                for($j=0;$j<count($arrMerge);$j++){
                                    if($arrMerge[$j] != ""){
                                ?>
                                <li>- <?=$arrMerge[$j]?></li>
                                <?php }
                                }
                                ?>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="select-info">
        <a class="select-btn">
            선택
        </a>
    </div>
</li>
    <?
    }
}
?>
</ul>
<?php
}
?>
