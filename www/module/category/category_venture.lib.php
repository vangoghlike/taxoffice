<?
function getCategoryAll(){
    $tbl = $GLOBALS["_conf_tbl"]["category"]."_venture";

    $sql  = "SELECT cat_no, cat_name ";
    $sql .= "FROM ".$tbl." ";

    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_num_rows($rs);


    if($total_rs > 0){
        $list['total'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
            $row = mysqli_fetch_assoc($rs);
            $list[$row[cat_no]] = $row[cat_name];
        }
    }else{
        $list = null;
    }

    return $list;
}

function getCategoryNameAll(){
    $tbl = $GLOBALS["_conf_tbl"]["category"]."_venture";

    $sql  = "SELECT cat_no, cat_name ";
    $sql .= "FROM ".$tbl." ";

    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_num_rows($rs);


    if($total_rs > 0){
        $list['total'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
            $row = mysqli_fetch_assoc($rs);
            $list[$row[cat_name]] = $row[cat_no];
        }
    }else{
        $list = null;
    }

    return $list;
}

function getCategoryFree($que_where){
    $tbl = $GLOBALS["_conf_tbl"]["category"]."_venture";

    $sql  = "SELECT * ";
    $sql .= "FROM ".$tbl." ";
    $sql .= "WHERE 1=1 $que_where ";

    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_num_rows($rs);


    if($total_rs > 0){
        $list['total'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);
        }
    }else{
        $list = null;
    }

    return $list;
}

function getCategoryList($cat_no,$cat_gubun="", $viewgb=""){
    $que_where="";

    if($cat_gubun !=""){
        $que_where .= " and cat_gubun='$cat_gubun'";
    }

    $tbl = $GLOBALS["_conf_tbl"]["category"]."_venture";

    if($cat_no==""){
        $sql  = "SELECT * ";
        $sql .= "FROM ".$tbl." ";
        $sql .= "WHERE cat_depth='0' $que_where order by cat_sort ASC, cat_no ASC ";

        $rs = mysqli_query($GLOBALS['dblink'], $sql);
        $total_rs = mysqli_num_rows($rs);

    }else{
        $select_que = "select * from $tbl where cat_no='$cat_no'";

        $result_select = mysqli_query($GLOBALS['dblink'], $select_que);
        $select_row = mysqli_fetch_array($result_select);
        $select_depth = $select_row['cat_depth']+1;
        $select_code = $select_row['cat_code'];

        $sql  = "SELECT * ";
        $sql .= "FROM ".$tbl." ";
        $sql .= "WHERE cat_code like '$select_code%' and cat_depth='$select_depth' $que_where ";
        if($viewgb=="Y") {
            $sql .= " AND cat_is_show='Y' ";
        }
        $sql .= "order by cat_sort ASC, cat_no ASC ";
        //echo $sql;
        $rs = mysqli_query($GLOBALS['dblink'], $sql);
        $total_rs = mysqli_num_rows($rs);
    }

    if($total_rs > 0){
        $list['total'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);

            $sql  = "SELECT cat_no ";
            $sql .= "FROM ".$tbl." ";
            $sql .= "WHERE cat_code like '".$list['list'][$i][cat_code]."%' AND cat_depth > ".$list['list'][$i][cat_depth]." ".$que_where;

            $rs_cnt = mysqli_query($GLOBALS['dblink'], $sql);
            $total_sub = mysqli_num_rows($rs_cnt);

            $list['list'][$i]['total_sub'] = $total_sub;
        }
    }else{
        $list['total'] = 0;
    }

    return $list;
}

function getCategoryInfo($cat_no,$cat_gubun=""){
    $tbl = $GLOBALS["_conf_tbl"]["category"]."_venture";

    $sql  = "SELECT * ";
    $sql .= "FROM ".$tbl." ";
    $sql .= "WHERE cat_no='$cat_no' ";
//echo $sql;
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_num_rows($rs);

    if($total_rs > 0){
        $list['total'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }

    return $list;
}


function getCategoryPath($cat_no){
    $tbl = $GLOBALS["_conf_tbl"]["category"]."_venture";

    $arrInfo = getCategoryInfo($cat_no);

    $select_category = explode("/",$arrInfo["list"][0]["cat_code"]); //���� ī�װ�� �ڵ带 / �����ڷ� �и��� �迭�� ����.

    for($i=0;$i<count($select_category);$i++){
        $cat_name_select_que = "select cat_no, cat_name from $tbl where cat_no='$select_category[$i]'";
        $cat_name_select_result = mysqli_query($GLOBALS['dblink'], $cat_name_select_que);

        $list['list'][$i] = mysqli_fetch_assoc($cat_name_select_result);
    }
    $list['total'] = $i - 1;

    return $list;
}

function addCategory($s_category, $s_depth, $new_name, $s_gubun) {
    if($s_depth==''){
        $s_depth=0;
    }
    $tbl = $GLOBALS["_conf_tbl"]["category"]."_venture";
    $tbl_cont = "tbl_contents";

    $select_que = "select max(cat_no) from $tbl";
    $result_select = mysqli_query($GLOBALS['dblink'], $select_que);
    $max_no = mysqli_result($result_select,0,0);
    $new_no = ++$max_no;
    $new_category = $s_category . $new_no . "/";

    $select_que2 = "select max(cat_sort) from $tbl where cat_code like '$s_category%' and cat_depth='$s_depth'";
    $result_select2 = mysqli_query($GLOBALS['dblink'], $select_que2);
    $max_sort = mysqli_result($result_select2,0,0);
    $new_sort = ++$max_sort;

    if(newContents($new_no)){
        $select_que3 = "select idx from $tbl_cont where cat_no='".$new_no."'";
        //echo $select_que3;
        $result_select3 = mysqli_query($GLOBALS['dblink'], $select_que3);
        $max_idx = mysqli_result($result_select3,0,0);
    }else{
        $max_idx = 0;
    }

    $insert_que = "insert into $tbl set
		cat_no = '$new_no',
		cat_code = '$new_category',
		cat_name = '$new_name',
		cat_content = '',
		cat_link_idx = '0',
		cat_cont_idx = '".$max_idx."',
		cat_board_id = '',
		cat_news_id='',
		cat_depth = '$s_depth',
		cat_sort = '$new_sort'
	";

    //echo $insert_que;

    $insert_result = mysqli_query($GLOBALS['dblink'], $insert_que);
    $total = mysqli_affected_rows($GLOBALS['dblink']);
    //echo $insert_que;
    if($total > 0){
        return true;
    }else{
        return false;
    }
}

function editCategory ($cat_no, $cat_name, $cat_link_idx, $cat_is_show) {
    $tbl = $GLOBALS["_conf_tbl"]["category"]."_venture";

    $update_que = "update $tbl set
			cat_name='$cat_name',
			cat_link_idx ='$cat_link_idx',
			cat_is_show='".$cat_is_show."'
		where cat_no='$cat_no'";
    $update_result = mysqli_query($GLOBALS['dblink'], $update_que);

    if($update_result){
        return true;
    }else{
        return false;
    }
}

function editCategoryNew($cat_no, $cat_name,$cat_use_type,$cat_is_show,$cat_board_id,$cat_news_id,$cat_cont_idx) {
    $tbl = $GLOBALS["_conf_tbl"]["category"]."_venture";

    $update_que = "update $tbl set
			cat_name='$cat_name',
			cat_use_type='".$cat_use_type."',
			cat_cont_idx='".$cat_cont_idx."',
			cat_board_id='".$cat_board_id."',
			cat_news_id='".$cat_news_id."',
			cat_is_show='".$cat_is_show."'
		where cat_no='$cat_no'";

    //echo $update_que;
    $update_result = mysqli_query($GLOBALS['dblink'], $update_que);

    if($update_result){
        return true;
    }else{
        return false;
    }
}

function editLocation() {
    $tbl = $GLOBALS["_conf_tbl"]["category"]."_venture";

    $update_que = "update $tbl set
			location = '".$_REQUEST["location"]."'
		where cat_no='".$_REQUEST["cat_no"]."'";

    //echo $update_que;
    $update_result = mysqli_query($GLOBALS['dblink'], $update_que);

    if($update_result){
        return true;
    }else{
        return false;
    }
}

function edit_cat_content() {
    $tbl = $GLOBALS["_conf_tbl"]["category"]."_venture";

    $cat_content = str_replace("'","’",$_REQUEST["cat_content"]);

    $update_que = "update $tbl set
			cat_content = '".$cat_content."'
		where cat_no='".$_REQUEST["cat_no"]."'";

    //echo $update_que;
    $update_result = mysqli_query($GLOBALS['dblink'], $update_que);

    if($update_result){
        return true;
    }else{
        return false;
    }
}

function editReport() {
    $tbl = $GLOBALS["_conf_tbl"]["category"]."_venture";

    $update_que = "update $tbl set
			location = '".$_REQUEST["location"]."',
			cat_report_type = '".$_REQUEST["cat_report_type"]."'
		where cat_no='".$_REQUEST["cat_no"]."'";

    //echo $update_que;
    $update_result = mysqli_query($GLOBALS['dblink'], $update_que);

    if($update_result){
        return true;
    }else{
        return false;
    }
}

function deleteCategory($cat_no) {
    $tbl = $GLOBALS["_conf_tbl"]["category"]."_venture";

    $select_que = "select cat_code,cat_sort,cat_depth from $tbl where cat_no='$cat_no'";
    $result_select = mysqli_query($GLOBALS['dblink'], $select_que);
    $now_cat_code = mysqli_result($result_select,0,0);
    $now_cat_sort = mysqli_result($result_select,0,1);
    $now_cat_depth = mysqli_result($result_select,0,2);

    // 20091123
    if (!$now_cat_code){
        jsMsg("��Ȯ�� ��ΰ� �ƴմϴ�.");
        jsHistory("-1") ;
        exit;
    }

    if($now_cat_depth>0){
        $replace_code = "/" . $cat_no;
        $sup_cat_code = str_replace($replace_code,"",$now_cat_code);
    }else{
        $sup_cat_code = "";
    }

    $update_que = "update $tbl set cat_sort=cat_sort -1 where cat_code like '$sup_cat_code%' and cat_sort>'$now_cat_sort' and cat_depth='$now_cat_depth'";

    $result_update = mysqli_query($GLOBALS['dblink'], $update_que);

    $delete_que = "delete from $tbl where cat_code like '$now_cat_code%'";
    $delete_result = mysqli_query($GLOBALS['dblink'], $delete_que);

    $total = mysqli_affected_rows($GLOBALS['dblink']);

    if($total > 0){
        return true;
    }else{
        return false;
    }
}

function getCategoryNo1($cat_no) {
    $tbl = $GLOBALS["_conf_tbl"]["category"]."_venture";

    $select_que = "select cat_code from ".$tbl." where cat_no='$cat_no'";
    $result_select = mysqli_query($GLOBALS['dblink'], $select_que);
    $select_row = mysqli_fetch_array($result_select);
    $select_code = $select_row[cat_code];

    $sql  = "SELECT * FROM ".$tbl." WHERE cat_code like '$select_code%' order by cat_depth, cat_sort, cat_code ";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_num_rows($rs);

    for($i=0; $i < $total_rs; $i++){
        $list['list'][$i] = mysqli_fetch_assoc($rs);

        $cat1 = str_replace($select_code, "", $list['list'][$i]['cat_code']);
        $cat2[$i] = explode("/",$cat1);
    }

    return $cat2[1][0];
}

function newContents($cat_no){ // 신규 컨텐츠 제작
    $tblid = "tbl_contents";

    $sql = "INSERT INTO ".$tblid." set
		cat_no='".$cat_no."',
		is_use='Y',
		cont_type='contents',
		cont_detail_type='contents',
		sort = '1',
		reg_date = now(),
		reg_user_id = '".$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]."',
		reg_ip = '".$_SERVER['REMOTE_ADDR']."'";

    //echo $sql;
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total = mysqli_affected_rows($GLOBALS['dblink']);


    if($total > 0){
        return true;
    }else{
        return false;
    }
}


?>
