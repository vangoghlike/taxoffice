<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/header.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/category/category.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/contents/contents.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/board/board.lib.php";
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php");
if(!in_array("product_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getCategoryInfo($_GET['cat_no']);

$arrBoardInfo = getArticleList($_conf_tbl["board_info"], 0, 0, " order by boardname ");

$arrList = getManagerListBase('',''," AND `user_id` <> '' ");
$arrMCList = getManagerCategoryList(1);

if(trim($arrInfo["list"][0]['cat_use_type']) == "B" || trim($arrInfo["list"][0]['cat_use_type']) == "O" || trim($arrInfo["list"][0]['cat_use_type']) == "W"){
	if($arrInfo["list"][0]['cat_board_id'] != ""){
		$boardInfo = getArticleList($_conf_tbl["board_info"], 0, 0, " where boardid='".$arrInfo["list"][0]['cat_board_id']."' order by idx ");
	}
    if ( trim($arrInfo["list"][0]['cat_use_type']) == "W" ) {
        $arrContInfo = getContentsInfo($arrInfo["list"][0]['cat_no'], 'wrq');
    }
}else if(trim($arrInfo["list"][0]['cat_use_type']) == "M" || trim($arrInfo["list"][0]['cat_use_type']) == "R"){
	$consultInfo = getArticleList("tbl_consult_category", 0, 0, " where consult_idx=2 order by idx ");
}else{
	if(trim($arrInfo["list"][0]['cat_cont_idx']) != '0'){
		$arrContInfo = getContentsInfo($arrInfo["list"][0]['cat_cont_idx']);
	}
}
//DB해제
SetDisConn($dblink);

?>

<style>
.mgb5 {
    height: 20px;
}
</style>

<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
		<div class="admin-title-top">
			<h2 class="admin-title"><?=$arrInfo["list"][0]['cat_name']?></h2>
			<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 메뉴 관리 &nbsp;&gt;&nbsp; <?=$arrInfo["list"][0]['cat_name']?><?=$arrInfo["list"][0]['cat_code']?></div>
		</div>

		<form name="frmInfo" method="post" action="category_evn.php" ENCTYPE="multipart/form-data" >
			<input type="hidden" name="evnMode" value="editCategoryNew">
			<input type="hidden" name="cat_no" value="<?=$arrInfo["list"][0]['cat_no']?>">
			<input type="hidden" name="cat_code" value="<?=$arrInfo["list"][0]['cat_code']?>">
			<input type="hidden" name="cat_gubun" value="<?=$_GET["cat_gubun"]?>">
			<input type="hidden" name="returnURL" value="<?=$_SERVER["PHP_SELF"]?>?<?=$_SERVER["QUERY_STRING"]?>">

			<div class="clfix mgb5">
			  <div class="fl">&nbsp; <strong><font color="red"><?=$arrInfo["list"][0]['cat_name']?> 수정</font></strong></div>
			  <div class="fr"><a href="category.php"><img src="/backoffice/images/k_list.gif" alt="목록" /></a></div>
			</div>
			<table class="admin-table-type1">
			  <colgroup>
			  <col width="140" />
			  <col width="*" />
			  </colgroup>
			  <tbody>
				<tr>
				  <th>메뉴명</th>
				  <td class="space-left"><input type="text" name="cat_name" value="<?=$arrInfo["list"][0]['cat_name']?>" style="width:200px;" class="input" /></td>
				</tr>
				<tr>
				  <th>사용여부</th>
				  <td class="space-left">
					<select name="cat_is_show" id="cat_is_show" style="width:200px;" class="input" />
						<option <?if($arrInfo["list"][0]['cat_is_show']=="Y"){echo "selected";}?> value="Y">Y</option>
						<option <?if($arrInfo["list"][0]['cat_is_show']=="N"){echo "selected";}?> value="N">N</option>
					</select>
				</td>
				</tr>
				<tr>
					<th>사용 타입</th>
					<td class="space-left">
						<select name="cat_use_type" id="cat_use_type" style="width:200px;" class="input" />
							<option <?if($arrInfo["list"][0]['cat_use_type']=="C"){echo "selected";}?> value="C">콘텐츠</option>
							<option <?if($arrInfo["list"][0]['cat_use_type']=="B"){echo "selected";}?> value="B">게시판</option>
							<option <?if($arrInfo["list"][0]['cat_use_type']=="N"){echo "selected";}?> value="N">조세뉴스</option>
							<option <?if($arrInfo["list"][0]['cat_use_type']=="A"){echo "selected";}?> value="A">상담센터</option>
							<option <?if($arrInfo["list"][0]['cat_use_type']=="M"){echo "selected";}?> value="M">신고의뢰</option>
							<option <?if($arrInfo["list"][0]['cat_use_type']=="O"){echo "selected";}?> value="O">업무의뢰</option>
							<option <?if($arrInfo["list"][0]['cat_use_type']=="W"){echo "selected";}?> value="W">업무의뢰 (DB 연결식)</option>
							<option <?if($arrInfo["list"][0]['cat_use_type']=="R"){echo "selected";}?> value="R">계산기</option>
                            <option <?if($arrInfo["list"][0]['cat_use_type']=="G"){echo "selected";}?> value="G">구성원</option>
							<option <?if($arrInfo["list"][0]['cat_use_type']=="Z"){echo "selected";}?> value="Z">화상회의실</option>
						</select>
						* 콘텐츠로 선택시 사용 게시판 ID는 무시됩니다.
					</td>
				</tr>
				<tr>
				  <th>콘텐츠 idx</th>
				  <td class="space-left"><input type="text" name="cat_cont_idx" value="<?=$arrInfo["list"][0]['cat_cont_idx']?>" style="width:200px;" class="input" /></td>
				</tr>
				<tr>
				  <th>사용 게시판ID</th>
				  <td class="space-left">
					<select name="cat_board_id" id="cat_board_id" style="width:200px;" class="input" />
						<option value="">미선택</option>
					<?
						if($arrBoardInfo["total"]>0){
							for($i=0;$i<$arrBoardInfo["total"];$i++){
								if($arrInfo["list"][0]['cat_board_id'] == $arrBoardInfo["list"][$i]["boardid"]){
					?>
									<option value="<?=$arrBoardInfo["list"][$i]["boardid"]?>" selected><?=$arrBoardInfo["list"][$i]["boardname"]?></option>
					<?
								}else{
					?>
									<option value="<?=$arrBoardInfo["list"][$i]["boardid"]?>"><?=$arrBoardInfo["list"][$i]["boardname"]?></option>
					<?
								}
							}
						}
					?>
					</select>
				</td>
				</tr>
				<tr>
					<th>뉴스 게시판</th>
					<td class="space-left">
						<select name="cat_news_id" id="cat_news_id" style="width:200px;" class="input" >
							<option value="">미선택</option>
							<option value="josenews" <? if($arrInfo["list"][0]['cat_news_id'] == "josenews"){?>selected<?}?>>조세뉴스</option>
							<option value="joseexam" <? if($arrInfo["list"][0]['cat_news_id'] == "joseexam"){?>selected<?}?>>예규 및 판례</option>
						</select>
					</td>
				</tr>
			  </tbody>
			</table>
			<div class="admin-buttons">
				<div class="cen">
					<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="정보수정" style="font-weight:bold" /></span> &nbsp;
					
					<?if(trim($arrInfo["list"][0]['cat_use_type']) == "B" || trim($arrInfo["list"][0]['cat_use_type']) == "O" || trim($arrInfo["list"][0]['cat_use_type']) == "W"){?>
						<?if($arrInfo["list"][0]['cat_board_id'] == ""){?>
							<span class="btn_pack xlarge"><input type="button" value="보드관리" style="font-weight:bold" onclick="alert('선택하신 보드 ID가 없습니다.')" /></span>
						<?}else{?>
							<span class="btn_pack xlarge"><input type="button" value="보드관리" style="font-weight:bold" onclick="document.location.href='/backoffice/module/board/board_info.php?idx=<?=$boardInfo["list"][0]['idx']?>'" /></span>
						<?}?>
					<?}else{?>
					
					<?}?>
				</div>
			</div>
		</form>
		<div>
			<?if(trim($arrInfo["list"][0]['cat_use_type']) == "B"){?>
				<?if($arrInfo["list"][0]['cat_board_id'] == ""){?>
					<span class="btn_pack xlarge"><input type="button" value="해당 게시판으로 이동" style="font-weight:bold" onclick="alert('선택하신 보드 ID가 없습니다.')" /></span>
				<?}else{?>
					<span class="btn_pack xlarge"><input type="button" value="해당 게시판으로 이동" style="font-weight:bold" onclick="document.location.href='/backoffice/module/board/board_view.php?boardid=<?=$arrInfo["list"][0]['cat_board_id']?>'" /></span>
				<?}?>
			<?}else if(trim($arrInfo["list"][0]['cat_use_type']) == "N"){?>

			<?}else if(trim($arrInfo["list"][0]['cat_use_type']) == "A"){?>
				<form name="frmLocation" method="post" action="category_evn.php" ENCTYPE="multipart/form-data" >
					<input type="hidden" name="evnMode" value="editLocation">
					<input type="hidden" name="cat_no" value="<?=$arrInfo["list"][0]['cat_no']?>">
					<input type="hidden" name="returnURL" value="<?=$_SERVER["PHP_SELF"]?>?<?=$_SERVER["QUERY_STRING"]?>">
					<table class="admin-table-type1">
						<colgroup>
							<col width="140" />
							<col width="*" />
						</colgroup>
						<tbody>
							<tr>
								<th>해당 파일 위치 (www 기준)</th>
								<td class="space-left"><input type="text" name="location" value="<?=$arrInfo["list"][0]['location']?>" style="width:100%;" class="input" /></td>
							</tr>
						</tbody>
					</table>
					<div class="admin-buttons">
						<div class="cen">
							<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="위치 수정" style="font-weight:bold" /></span>
						</div>
					</div>
				</form>
			<?}else if(trim($arrInfo["list"][0]['cat_use_type']) == "M"){?>
				<form name="frmLocation" method="post" action="category_evn.php" ENCTYPE="multipart/form-data" >
					<input type="hidden" name="evnMode" value="editReport">
					<input type="hidden" name="cat_no" value="<?=$arrInfo["list"][0]['cat_no']?>">
					<input type="hidden" name="returnURL" value="<?=$_SERVER["PHP_SELF"]?>?<?=$_SERVER["QUERY_STRING"]?>">
					<table class="admin-table-type1">
						<colgroup>
							<col width="140" />
							<col width="*" />
						</colgroup>
						<tbody>
							<tr>
								<th>해당 파일 위치 (www 기준)</th>
								<td class="space-left"><input type="text" name="location" value="<?=$arrInfo["list"][0]['location']?>" style="width:100%;" class="input" /></td>
							</tr>
							<tr>
								<th>구분</th>
								<td class="space-left">
									<select name="cat_report_type" id="cat_report_type" style="width:200px;" class="input">
									<option value="">미선택</option>
									<?for($i=0;$i<$consultInfo["list"]["total"];$i++){?>
										<option value="<?=$consultInfo["list"][$i]["idx"]?>" <?if($arrInfo["list"][0]['cat_report_type'] == $consultInfo["list"][$i]["idx"]){?>selected<?}?>><?=$consultInfo["list"][$i]["category_name"]?></option>
									<?}?>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="admin-buttons">
						<div class="cen">
							<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="신고의뢰 수정" style="font-weight:bold" /></span>
						</div>
					</div>
				</form>
			<?}else if(trim($arrInfo["list"][0]['cat_use_type']) == "R"){?>
				<form name="frmLocation" method="post" action="category_evn.php" ENCTYPE="multipart/form-data" >
					<input type="hidden" name="evnMode" value="editReport">
					<input type="hidden" name="cat_no" value="<?=$arrInfo["list"][0]['cat_no']?>">
					<input type="hidden" name="returnURL" value="<?=$_SERVER["PHP_SELF"]?>?<?=$_SERVER["QUERY_STRING"]?>">
					<table class="admin-table-type1">
						<colgroup>
							<col width="140" />
							<col width="*" />
						</colgroup>
						<tbody>
							<tr>
								<th>구분</th>
								<td class="space-left">
									<select name="cat_report_type" id="cat_report_type" style="width:200px;" class="input">
									<option value="">미선택</option>
									<?for($i=0;$i<$consultInfo["list"]["total"];$i++){?>
										<option value="<?=$consultInfo["list"][$i]["idx"]?>" <?if($arrInfo["list"][0]['cat_report_type'] == $consultInfo["list"][$i]["idx"]){?>selected<?}?>><?=$consultInfo["list"][$i]["category_name"]?></option>
									<?}?>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="admin-buttons">
						<div class="cen">
							<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="계산기 수정" style="font-weight:bold" /></span>
						</div>
					</div>
				</form>
			<?}else if(trim($arrInfo["list"][0]['cat_use_type']) == "O"){?>
				<?if($arrInfo["list"][0]['cat_board_id'] == ""){?>
					<span class="btn_pack xlarge"><input type="button" value="해당 게시판으로 이동" style="font-weight:bold" onclick="alert('선택하신 보드 ID가 없습니다.')" /></span>
				<?}else{?>
					<span class="btn_pack xlarge"><input type="button" value="해당 게시판으로 이동" style="font-weight:bold" onclick="document.location.href='/backoffice/module/board/board_view.php?boardid=<?=$arrInfo["list"][0]['cat_board_id']?>'" /></span>
				<?}?>
				<form name="frmLocation" method="post" action="category_evn.php" ENCTYPE="multipart/form-data" >
					<input type="hidden" name="evnMode" value="edit_cat_content">
					<input type="hidden" name="cat_no" value="<?=$arrInfo["list"][0]['cat_no']?>">
					<input type="hidden" name="returnURL" value="<?=$_SERVER["PHP_SELF"]?>?<?=$_SERVER["QUERY_STRING"]?>">
					<table class="admin-table-type1">
						<colgroup>
							<col width="140" />
							<col width="*" />
						</colgroup>
						<tbody>
							<tr>
								<th>상단 표시 내용</th>
								<td class="space-left">
								<textarea id="cat_content" name="cat_content"><?=stripslashes($arrInfo["list"][0]['cat_content'])?></textarea>
									<?
									$CKContent = "cat_content";
									include $_SERVER[DOCUMENT_ROOT] . "/ckeditor/Editor.php";
									?>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="admin-buttons">
						<div class="cen">
							<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="내용 수정" style="font-weight:bold" /></span>
						</div>
					</div>
				</form>
            <?}else if(trim($arrInfo["list"][0]['cat_use_type']) == "W"){?>
                <?if($arrInfo["list"][0]['cat_board_id'] == ""){?>
                <span class="btn_pack xlarge"><input type="button" value="해당 게시판으로 이동" style="font-weight:bold" onclick="alert('선택하신 보드 ID가 없습니다.')" /></span>
                <?}else{?>
                <span class="btn_pack xlarge"><input type="button" value="해당 게시판으로 이동" style="font-weight:bold" onclick="document.location.href='/backoffice/module/board/board_view.php?boardid=<?=$arrInfo["list"][0]['cat_board_id']?>'" /></span>
                <?}?>
                <form name="frmLocation" method="post" action="category_evn.php" ENCTYPE="multipart/form-data" >
                    <input type="hidden" name="evnMode" value="edit_cat_work_request">
                    <input type="hidden" name="idx" value="<?=$arrContInfo["list"][0]['idx']?>">
                    <input type="hidden" name="cat_no" value="<?=$arrContInfo["list"][0]['cat_no']?>">
                    <input type="hidden" name="returnURL" value="<?=$_SERVER["PHP_SELF"]?>?<?=$_SERVER["QUERY_STRING"]?>">

                    <div class="inner_con_wr number_wr" >
                        <h3>* 줄 세팅</h3>
                        <div class="ip_wr line_val_wr">
                            <?php
                            $_wrn_arr = explode(',',$arrContInfo["list"][0]['work_request_num']);
                            $_wrn_cnt_arr = array();
                            $_inner_item_cnt = 0;
                            $_wrn_arr_cnt = count($_wrn_arr);
                            if ( $arrContInfo["list"][0]['work_request_num'] && $_wrn_arr_cnt > 0 ) {
                                $_inner_wrn_cnt = 0;
                                foreach ($_wrn_arr as $item) {
                                    $_inner_item_cnt = $_inner_item_cnt + $item;
                                    $_wrn_cnt_arr[$_inner_wrn_cnt] = $_inner_item_cnt;
                                ?>
                            <label>
                                <strong>
                                    총 줄 추가인원
                                </strong>
                                <span>
                                    <input type="number" name="work_request_num[]" value="<?=$item?>"/>
                                </span>
                            </label>
                                <?php
                                    $_inner_wrn_cnt++;
                                }
                            } else {
                            ?>
                            <label>
                                <strong>
                                    총 줄 추가인원
                                </strong>
                                <span>
                                    <input type="number" name="work_request_num[]"/>
                                </span>
                            </label>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="btn_wr">
                            <a class="line_plus_btn line_set_btn">(+)줄 추가</a>
                            <a class="line_minus_btn line_set_btn">(-)줄 삭제</a>
                            <a class="num_set_btn">세팅하기</a>
                        </div>
                    </div>
                    <div class="inner_con_wr mem_wr" >
                        <h3>* 세무사 및 직원 세팅</h3>
                        <div class="ip_wr mngr_val_wr">
                            <?php
                            $_wrm_arr = explode(',',$arrContInfo["list"][0]['work_request_member']);
                            $_wrm_arr_cnt = count($_wrm_arr);
                            if ( $arrContInfo["list"][0]['work_request_member'] && $_wrm_arr_cnt > 0 ) {
                                $_inner_cnt = 0;
                                foreach ($_wrm_arr as $item) {
                                    if ($_inner_cnt == 0) {
                                        echo '<label>';
                                    } else {
                                        if ( in_array($_inner_cnt,$_wrn_cnt_arr) ) {
                                            echo '</label><label>';
                                        }
                                    }
                            ?>
                                <select name="work_request_member[]">
                                    <option value="">==선택해주세요==</option>
                            <?php
                            if($arrList['list']['total'] > 0){
                                for($i=0;$i<$arrList['list']['total'];$i++) {
                                    ?>
                                    <option value="<?=$arrList['list'][$i]['idx']?>"
                                        <?php if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
                                    ><?=$arrList['list'][$i]['mngr_name']?></option>
                            <?php
                                }
                            }
                            ?>
                                </select>
                            <?php
                                    $_inner_cnt++;
                                }
                                echo '</label>';
                            } else {
                            ?>
                            <label>
                                <select name="work_request_member[]">
                                    <option value="">==선택해주세요==</option>
                                    <?php
                                    if($arrList['list']['total'] > 0){
                                        for($i=0;$i<$arrList['list']['total'];$i++) {
                                            ?>
                                            <option value="<?=$arrList['list'][$i]['idx']?>"><?=$arrList['list'][$i]['mngr_name']?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </label>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <table class="admin-table-type1">
                        <colgroup>
                            <col width="140" />
                            <col width="*" />
                        </colgroup>
                        <tbody>
                        <tr>
                            <th>해당 파일 위치 (www 기준)</th>
                            <td class="space-left"><input type="text" name="location" value="<?=$arrInfo["list"][0]['location']?>" style="width:100%;" class="input" /></td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="admin-buttons">
                        <div class="cen">
                            <span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="내용 수정" style="font-weight:bold" /></span>
                        </div>
                    </div>
                </form>
            <?}else if(trim($arrInfo["list"][0]['cat_use_type']) == "G"){?>
                <?if($arrInfo["list"][0]['cat_board_id'] == ""){?>
                    <span class="btn_pack xlarge"><input type="button" value="해당 게시판으로 이동" style="font-weight:bold" onclick="alert('선택하신 보드 ID가 없습니다.')" /></span>
                <?}else{?>
                    <span class="btn_pack xlarge"><input type="button" value="해당 게시판으로 이동" style="font-weight:bold" onclick="document.location.href='/backoffice/module/board/board_view.php?boardid=<?=$arrInfo["list"][0]['cat_board_id']?>'" /></span>
                <?}?>
                <form name="frmLocation" method="post" class="mngr_group_form" action="category_evn.php" ENCTYPE="multipart/form-data" >
                    <input type="hidden" name="evnMode" value="edit_cat_work_request">
                    <input type="hidden" name="idx" value="<?=$arrContInfo["list"][0]['idx']?>">
                    <input type="hidden" name="cat_no" value="<?=$arrContInfo["list"][0]['cat_no']?>">
                    <input type="hidden" name="returnURL" value="<?=$_SERVER["PHP_SELF"]?>?<?=$_SERVER["QUERY_STRING"]?>">
<!--                    <div class="mngr_slt_wrap">-->
<!--                        <label>-->
<!--                            <span>대표 세무사</span>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                        </label>-->
<!--                    </div>-->
<!---->
<!--                    <div class="mngr_slt_wrap">-->
<!--                        <label>-->
<!--                            <span>주요 직책</span>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                        </label>-->
<!--                    </div>-->
<!---->
<!--                    <div class="mngr_slt_wrap">-->
<!--                        <label>-->
<!--                            <span>1본부 세무사</span>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                        </label>-->
<!--                    </div>-->
<!---->
<!--                    <div class="mngr_slt_wrap">-->
<!--                        <label>-->
<!--                            <span>2본부 세무사</span>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                        </label>-->
<!--                    </div>-->
<!---->
<!--                    <div class="mngr_slt_wrap">-->
<!--                        <label>-->
<!--                            <span>1본부 직원</span>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                        </label>-->
<!--                    </div>-->
<!---->
<!--                    <div class="mngr_slt_wrap">-->
<!--                        <label>-->
<!--                            <span>2본부 직원</span>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                            <select name="work_request_member[]">-->
<!--                                <option value="">==선택해주세요==</option>-->
<!--                                --><?php
//                                if($arrList['list']['total'] > 0){
//                                    for($i=0;$i<$arrList['list']['total'];$i++) {
//                                        ?>
<!--                                        <option value="--><?//=$arrList['list'][$i]['idx']?><!--"-->
<!--                                            --><?php //if ( $item == $arrList['list'][$i]['idx'] ) { echo ' selected="selected"'; }?>
<!--                                        >--><?//=$arrList['list'][$i]['mngr_name']?><!--</option>-->
<!--                                        --><?php
//                                    }
//                                }
//                                ?>
<!--                            </select>-->
<!--                        </label>-->
<!--                    </div>-->

                    <table class="admin-table-type1">
                        <colgroup>
                            <col width="140" />
                            <col width="*" />
                        </colgroup>
                        <tbody>
                        <tr>
                            <th>해당 파일 위치 (www 기준)</th>
                            <td class="space-left"><input type="text" name="location" value="<?=$arrInfo["list"][0]['location']?>" style="width:100%;" class="input" /></td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="admin-buttons">
                        <div class="cen">
                            <span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="내용 수정" style="font-weight:bold" /></span>
                        </div>
                    </div>
                </form>
            <?}else{?>
				<form name="frmContents" method="post" action="category_evn.php" ENCTYPE="multipart/form-data" >
					<input type="hidden" name="evnMode" value="editContents">
					<input type="hidden" name="idx" value="<?=$arrContInfo["list"][0]['idx']?>">
					<input type="hidden" name="returnURL" value="<?=$_SERVER["PHP_SELF"]?>?<?=$_SERVER["QUERY_STRING"]?>">
					<table class="admin-table-type1">
						<colgroup>
							<col width="140" />
							<col width="*" />
						</colgroup>
						<tbody>
							<tr>
								<th>제목</th>
								<td class="space-left"><input type="text" name="subject" value="<?=$arrContInfo["list"][0]['subject']?>" style="width:200px;" class="input" /></td>
							</tr>
							<tr>
								<th>사용여부</th>
								<td class="space-left">
									<select name="is_use" id="is_use" style="width:200px;" class="input" />
										<option <?if($arrContInfo["list"][0]['is_use']=="Y"){echo "selected";}?> value="Y">Y</option>
										<option <?if($arrContInfo["list"][0]['is_use']=="N"){echo "selected";}?> value="N">N</option>
									</select>
								</td>
							</tr>
							<tr>
								<th>콘텐츠</th>
								<td>
									<textarea id="contents" name="contents"><?=stripslashes($arrContInfo["list"][0][contents])?></textarea>
									<?
									$CKContent = "contents";
									include $_SERVER[DOCUMENT_ROOT] . "/ckeditor/Editor.php";
									?>
								</td>
							</tr>
							
						</tbody>
					</table>
					<div class="admin-buttons">
						<div class="cen">
							<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="콘텐츠 수정" style="font-weight:bold" /></span>
						</div>
					</div>
				</form>
			<?}?>
		</div>
		<form name="frmListHidden" method="post" action="category_evn.php">
			<input type="hidden" name="evnMode" value="delete">
			<input type="hidden" name="idx">
			<input type="hidden" name="cat_no" value="<?=$_GET['cat_no']?>">
		</form>
		<div>

		</div>
	</div>
</div>
<?
include $_SERVER["DOCUMENT_ROOT"] . "/backoffice/footer.php" ;
?>