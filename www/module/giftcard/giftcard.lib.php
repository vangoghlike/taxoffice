<?
function insertGiftcardGood($idx) {
	$tbl = $GLOBALS["_conf_tbl"]["mygiftcard"];//my상품권 테이블

	$arrInfo = getGoodInfo($idx);

	$sql = "INSERT INTO ".$tbl." set 
		user_id='".$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]."',
		g_idx='$idx',
		giftcard_name='".stripslashes($arrInfo["list"][0][g_name])."',
		giftcard_dis='".$arrInfo["list"][0][giftcard_dis]."',
		giftcard_unit='".$arrInfo["list"][0][giftcard_unit]."',
		giftcard_sdate='".$arrInfo["list"][0][giftcard_sdate]."',
		giftcard_edate='".$arrInfo["list"][0][giftcard_edate]."',
		giftcard_use='N',
		wdate = now()
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($rs > 0){
		
		if($arrInfo["list"][0][giftcard_limit] != "N"){
			$sql2 = "update tbl_shop_good set giftcard_qty = giftcard_qty - 1 where idx='$idx'";
			$rs2 = mysql_query($sql2, $GLOBALS[dblink]);
		}

		return true;
	}else{
		return false;
	}
	
}


function insertCodeGiftcardGood($no) {
	$tbl = $GLOBALS["_conf_tbl"]["mygiftcard"];//my상품권 테이블

	$sql = "UPDATE ".$tbl." set 
			user_id='".$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]."',
			wdate = now()
			WHERE giftcard_no='$no' and user_id=''
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

function getGiftcardGoodList($user_id, $idx, $use) {
	$tbl = $GLOBALS["_conf_tbl"]["mygiftcard"];//my상품권 테이블
	
	if($idx!="") {
		$arr_idx = explode("|",$idx);
		for($i=0;$i<count($arr_idx);$i++){
			$str_idx .= "'".$arr_idx[$i]."'";
			if($i != count($arr_idx)-1){
				$str_idx .= ",";
			}
		}

		$que_where = "AND A.g_idx in (".$str_idx.")";
	} else {
		$que_where = "AND A.e_idx!='0' ";
	}

	//목록
    $sql  = "SELECT A.* ";
    $sql .= "FROM $tbl A ";
    $sql .= "WHERE 1=1 $que_where AND A.giftcard_use='$use' ";
	$sql .= "AND A.giftcard_sdate <= curdate() AND A.giftcard_edate >= curdate() ORDER BY A.idx DESC ";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total_rs = mysql_affected_rows($GLOBALS[dblink]);

    if($total_rs > 0){
        $list['total'] = $total_rs;

        for($i=0; $i < $total_rs; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }
    return $list;
}


//상품권 등록
function insertGiftcard(){
	$tbl = $GLOBALS["_conf_tbl"]["giftcard"];//상품권 테이블
	$tbl_my = $GLOBALS["_conf_tbl"]["mygiftcard"];//상품권 테이블

	$arrCateInfo = getCategoryInfo(mysql_escape_string($_POST[cat_no]));

	$sql = "INSERT INTO ".$tbl." set 
		giftcard_name = '".mysql_escape_string($_POST[giftcard_name])."',
		giftcard_content = '".mysql_escape_string($_POST[giftcard_content])."',
		giftcard_sdate = '".mysql_escape_string($_POST[giftcard_sdate])."',
		giftcard_edate = '".mysql_escape_string($_POST[giftcard_edate])."',
		giftcard_dis = '".mysql_escape_string($_POST[giftcard_dis])."',
		giftcard_unit = '".mysql_escape_string($_POST[giftcard_unit])."',
		giftcard_qty = '".mysql_escape_string($_POST[giftcard_qty])."',
		over_price = '".mysql_escape_string($_POST[over_price])."',
		under_price = '".mysql_escape_string($_POST[under_price])."',
		cat_no='".$arrCateInfo["list"][0][cat_no]."',
		cat_code='".$arrCateInfo["list"][0][cat_code]."',
		wdate = now()
	";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$insert_idx = mysql_insert_id($GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);
	
	//발행
	for($i=0; $i<$_POST[giftcard_qty]; $i++) {

		$serial = substr(strtoupper(md5($_POST[giftcard_name].$i.microtime(true))),0,16);

		$sql = "INSERT INTO ".$tbl_my." set 
			e_idx = '".$insert_idx."',
			giftcard_no = '".$serial."',
			giftcard_name = '".mysql_escape_string($_POST[giftcard_name])."',
			giftcard_content = '".mysql_escape_string($_POST[giftcard_content])."',
			giftcard_sdate = '".mysql_escape_string($_POST[giftcard_sdate])."',
			giftcard_edate = '".mysql_escape_string($_POST[giftcard_edate])."',
			giftcard_dis = '".mysql_escape_string($_POST[giftcard_dis])."',
			giftcard_unit = '".mysql_escape_string($_POST[giftcard_unit])."',
			over_price = '".mysql_escape_string($_POST[over_price])."',
			under_price = '".mysql_escape_string($_POST[under_price])."',
			giftcard_use = 'N'
		";
		$rs = mysql_query($sql, $GLOBALS[dblink]);
	}

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

function updateGiftcard($idx){
	
	$tbl = $GLOBALS["_conf_tbl"]["giftcard"];//상품권 테이블
	$tbl_my = $GLOBALS["_conf_tbl"]["mygiftcard"];//상품권 테이블
	
	if($_POST[giftcard_qty]) {
		$sql_add = " giftcard_qty = giftcard_qty + ".mysql_escape_string($_POST[giftcard_qty]).", ";
	}
	$arrCateInfo = getCategoryInfo(mysql_escape_string($_POST[cat_no]));

	$sql = "UPDATE ".$tbl." SET 
		giftcard_name = '".mysql_escape_string($_POST[giftcard_name])."',
		giftcard_content = '".mysql_escape_string($_POST[giftcard_content])."',
		giftcard_sdate = '".mysql_escape_string($_POST[giftcard_sdate])."',
		giftcard_edate = '".mysql_escape_string($_POST[giftcard_edate])."',
		giftcard_dis = '".mysql_escape_string($_POST[giftcard_dis])."',
		over_price = '".mysql_escape_string($_POST[over_price])."',
		under_price = '".mysql_escape_string($_POST[under_price])."',
		cat_no='".$arrCateInfo["list"][0][cat_no]."',
		cat_code='".$arrCateInfo["list"][0][cat_code]."',
		$sql_add 
		giftcard_unit = '".mysql_escape_string($_POST[giftcard_unit])."'
		WHERE idx = '".$idx."'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	$sql_up = "UPDATE ".$tbl_my." SET 
		giftcard_name = '".mysql_escape_string($_POST[giftcard_name])."',
		giftcard_content = '".mysql_escape_string($_POST[giftcard_content])."',
		giftcard_sdate = '".mysql_escape_string($_POST[giftcard_sdate])."',
		giftcard_edate = '".mysql_escape_string($_POST[giftcard_edate])."',
		giftcard_dis = '".mysql_escape_string($_POST[giftcard_dis])."',
		over_price = '".mysql_escape_string($_POST[over_price])."',
		under_price = '".mysql_escape_string($_POST[under_price])."',
		giftcard_unit = '".mysql_escape_string($_POST[giftcard_unit])."'
		WHERE e_idx = '".$idx."'
	";
	$rs_up = mysql_query($sql_up, $GLOBALS[dblink]);
	
	//추가발행
	if($_POST[giftcard_qty]) {
	for($i=0; $i<$_POST[giftcard_qty]; $i++) {

		$serial = strtoupper(md5($_POST[giftcard_name].$i.microtime(true)));

		$sql1 = "INSERT INTO ".$tbl_my." SET 
			e_idx = '".$idx."',
			giftcard_no = '".substr($serial,0,16)."',
			giftcard_name = '".mysql_escape_string($_POST[giftcard_name])."',
			giftcard_content = '".mysql_escape_string($_POST[giftcard_content])."',
			giftcard_sdate = '".mysql_escape_string($_POST[giftcard_sdate])."',
			giftcard_edate = '".mysql_escape_string($_POST[giftcard_edate])."',
			giftcard_dis = '".mysql_escape_string($_POST[giftcard_dis])."',
			giftcard_unit = '".mysql_escape_string($_POST[giftcard_unit])."',
			giftcard_use = 'N'
		";
		$rs1 = mysql_query($sql1, $GLOBALS[dblink]);
	}
	}

	if($rs > 0){
		return true;
	}else{
		return false;
	}

}

//발급된 상품권에 회원입력
function updateUserGiftcard($idx){
	
	$tbl = $GLOBALS["_conf_tbl"]["mygiftcard"];//상품권 테이블

	$sql = "UPDATE ".$tbl." SET 
		user_id = '".mysql_escape_string($_POST[user_id])."',
		wdate = now()
		WHERE idx = '".$idx."'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($rs > 0){
		return true;
	}else{
		return false;
	}

}

//상품권리스트 가져오기
function getGiftcardList($user_id, $gb="", $scale, $offset=0){
	$tbl = $GLOBALS["_conf_tbl"]["giftcard"];//상품권 테이블
	$tbl_set = $GLOBALS["_conf_tbl"]["giftcard_set"];//상품권 테이블

	$que_where = " AND A.user_id='$user_id' ";
	
	if($gb) {
		$que_where .= " AND A.use_gb='$gb' ";
	}

	//카운트
	$sql = "select count(A.idx) from $tbl A LEFT JOIN ".$tbl_set." B ON A.c_idx=B.idx WHERE 1=1 $que_where ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT B.*, A.idx as cidx ";
    $sql .= "FROM ".$tbl." A ";
	$sql .= "LEFT JOIN ".$tbl_set." B ON A.c_idx=B.idx ";
    $sql .= "WHERE 1=1 $que_where  ORDER BY A.idx DESC ";

    if($total_rs > 0){
        $list['total'] = $total_rs;
        // 페이지 네비게이션 오프셋 지정.
		if(!$offset){
			$offset=0;
		}else{
			$offset=$offset;
		}

		// offset 이 전체 게시물수보다 작을때 offset 을 전체게시물 - 페이지당 보여줄 글 수로 offset 설정
		if($total_rs<=$offset){
			$offset = $total_rs - $scale;
		}

		if($scale != "0"){
			$sql .= " limit $offset,$scale ";
		}
		$rs = mysql_query($sql,$GLOBALS[dblink]);

		// offset 을 이용한 limit 가 적용된 갯수
		$total = mysql_num_rows($rs);
		$list['list']['total'] = $total;
		// 페이지 네비게이션 오프셋 지정.

        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }

    return $list;
}

//상품상품권리스트 가져오기
function getGoodGiftcardList($scale, $offset=0){
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];//상품 테이블

	//카운트
	$sql = "select count(A.idx) from $tbl A WHERE giftcard_use='Y' ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT A.* ";
    $sql .= "FROM ".$tbl." A WHERE giftcard_use='Y' ";

    if($total_rs > 0){
        $list['total'] = $total_rs;
        // 페이지 네비게이션 오프셋 지정.
		if(!$offset){
			$offset=0;
		}else{
			$offset=$offset;
		}

		// offset 이 전체 게시물수보다 작을때 offset 을 전체게시물 - 페이지당 보여줄 글 수로 offset 설정
		if($total_rs<=$offset){
			$offset = $total_rs - $scale;
		}

		if($scale != "0"){
			$sql .= " limit $offset,$scale ";
		}
		$rs = mysql_query($sql,$GLOBALS[dblink]);

		// offset 을 이용한 limit 가 적용된 갯수
		$total = mysql_num_rows($rs);
		$list['list']['total'] = $total;
		// 페이지 네비게이션 오프셋 지정.

        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }

    return $list;
}

function getMygiftcardList($g_idx, $scale, $offset=0){
	$tbl = $GLOBALS["_conf_tbl"]["mygiftcard"];//상품권 테이블
	$tbl_member = $GLOBALS["_conf_tbl"]["member"];

	//카운트
	$sql = "select count(A.idx) from $tbl A WHERE g_idx='$g_idx' ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT A.*, B.user_name ";
    $sql .= "FROM ".$tbl." A ";
	$sql .= "LEFT JOIN ".$tbl_member." B ON A.user_id=B.user_id ";
	$sql .= "WHERE g_idx='$g_idx' ";

    if($total_rs > 0){
        $list['total'] = $total_rs;
        // 페이지 네비게이션 오프셋 지정.
		if(!$offset){
			$offset=0;
		}else{
			$offset=$offset;
		}

		// offset 이 전체 게시물수보다 작을때 offset 을 전체게시물 - 페이지당 보여줄 글 수로 offset 설정
		if($total_rs<=$offset){
			$offset = $total_rs - $scale;
		}

		if($scale != "0"){
			$sql .= " limit $offset,$scale ";
		}
		$rs = mysql_query($sql,$GLOBALS[dblink]);

		// offset 을 이용한 limit 가 적용된 갯수
		$total = mysql_num_rows($rs);
		$list['list']['total'] = $total;
		// 페이지 네비게이션 오프셋 지정.

        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }

    return $list;
}


//상품권세팅 가져오기
function getGiftcardListAdmin($scale, $offset=0){
	$tbl = $GLOBALS["_conf_tbl"]["giftcard"];//상품권 테이블

	/*
	if($user_id){
		$que_where = " AND user_id='$user_id' ";
	}

	if($s_date){
		$que_where .= " AND wdate >= '$s_date 00:00:00' ";
	}

	if($e_date){
		$que_where .= " AND wdate <= '$e_date 23:59:59' ";
	}
	*/

	//카운트
	$sql = "select count(idx) from $tbl WHERE 1=1 $que_where ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT * ";
    $sql .= "FROM ".$tbl." ";
    $sql .= "WHERE 1=1 $que_where  ORDER BY idx DESC ";

    if($total_rs > 0){
        $list['total'] = $total_rs;
        // 페이지 네비게이션 오프셋 지정.
		if(!$offset){
			$offset=0;
		}else{
			$offset=$offset;
		}

		// offset 이 전체 게시물수보다 작을때 offset 을 전체게시물 - 페이지당 보여줄 글 수로 offset 설정
		if($total_rs<=$offset){
			$offset = $total_rs - $scale;
		}

		if($scale != "0"){
			$sql .= " limit $offset,$scale ";
		}
		$rs = mysql_query($sql,$GLOBALS[dblink]);

		// offset 을 이용한 limit 가 적용된 갯수
		$total = mysql_num_rows($rs);
		$list['list']['total'] = $total;
		// 페이지 네비게이션 오프셋 지정.
		    
        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }

    return $list;
}

//상품권 사용여부
function getGiftcardUserListAdmin($idx, $scale, $offset=0){
	$tbl = $GLOBALS["_conf_tbl"]["mygiftcard"];//상품권 테이블

	$que_where = " AND A.e_idx='$idx' ";

	//카운트
	$sql = "select count(A.idx) from $tbl A WHERE 1=1 $que_where ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT A.*, B.user_name ";
    $sql .= "FROM ".$tbl." A ";
	$sql .= "LEFT JOIN tbl_member B ON A.user_id=B.user_id ";
    $sql .= "WHERE 1=1 $que_where  ORDER BY A.idx DESC ";

	if($total_rs > 0){
        $list['total'] = $total_rs;
        // 페이지 네비게이션 오프셋 지정.
		if(!$offset){
			$offset=0;
		}else{
			$offset=$offset;
		}

		// offset 이 전체 게시물수보다 작을때 offset 을 전체게시물 - 페이지당 보여줄 글 수로 offset 설정
		if($total_rs<=$offset){
			$offset = $total_rs - $scale;
		}

		if($scale != "0"){
			$sql .= " limit $offset,$scale ";
		}
		$rs = mysql_query($sql,$GLOBALS[dblink]);

		// offset 을 이용한 limit 가 적용된 갯수
		$total = mysql_num_rows($rs);
		$list['list']['total'] = $total;
		// 페이지 네비게이션 오프셋 지정.
		    
        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }

    return $list;
}

//상품권정보 가져오기
function getGiftcardInfo($idx){
	$tbl = $GLOBALS["_conf_tbl"]["giftcard"];

    $sql  = "SELECT * ";
    $sql .= "FROM " .$tbl." ";
    $sql .= "WHERE idx = '$idx' ";

    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $total_rs = mysql_num_rows($rs);
    
    if($total_rs > 0){
        $list['total'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }
    return $list;
}

//상품권정보 가져오기
function getMyGiftcardInfo($idx){
	$tbl = $GLOBALS["_conf_tbl"]["mygiftcard"];

    $sql  = "SELECT * ";
    $sql .= "FROM " .$tbl." ";
    $sql .= "WHERE idx = '$idx' ";

    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $total_rs = mysql_num_rows($rs);
    
    if($total_rs > 0){
        $list['total'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }
    return $list;
}


//상품권시리얼 가져오기
function checkGiftcardNumber($cert){
	$tbl = $GLOBALS["_conf_tbl"]["giftcard"];

    $sql  = "SELECT * ";
    $sql .= "FROM " .$tbl." ";
    $sql .= "WHERE giftcard = '$cert' and use_gb='N' and wdate='0000-00-00' ";

    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $total_rs = mysql_num_rows($rs);
    
    if($total_rs > 0){
        $list['total'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }
    return $list;
}

function deleteMyGiftcard($idx){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["mygiftcard"];//상품권정보

	//상품 정보 삭제
	$sql = "DELETE FROM ".$tbl." WHERE idx='".$idx."'	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	
	if($rs){
		return true;
	}else{
		return false;
	}
}

function deleteUserGiftcard($e_idx, $idx){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["giftcard"];//상품권정보
	$tbl_my = $GLOBALS["_conf_tbl"]["mygiftcard"];//상품권정보

	//상품 정보 삭제
	$sql = "DELETE FROM ".$tbl_my." WHERE idx='".$idx."'	";
	$rs1 = mysql_query($sql, $GLOBALS[dblink]);
	
	if($rs1){
		$sql = "UPDATE $tbl SET
			giftcard_qty = giftcard_qty-1
			WHERE idx='".$e_idx."'	
		";
		$rs = mysql_query($sql, $GLOBALS[dblink]);

		return true;
	}else{
		return false;
	}
}


function deleteGiftcard($idx){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["giftcard"];//상품권정보
	$tbl_my = $GLOBALS["_conf_tbl"]["mygiftcard"];//상품권정보

	//상품 정보 삭제
	$sql1 = "DELETE FROM ".$tbl." WHERE idx='".$idx."'	";
	$rs1 = mysql_query($sql1, $GLOBALS[dblink]);

	$sql = "DELETE FROM ".$tbl_my." WHERE e_idx='".$idx."'	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	
	if($rs1){
		return true;
	}else{
		return false;
	}
}


function getMypageGiftcardList($user_id, $gb, $scale, $offset=0, $payprice="", $cat_yn="") {
	
	$tbl = $GLOBALS["_conf_tbl"]["mygiftcard"];//상품권 테이블
	$tbl_giftcard = $GLOBALS["_conf_tbl"]["giftcard"];//상품권 테이블

	$que_where = " AND A.user_id='$user_id' ";

	if($cat_yn == "Y") {
		$que_where .= " AND B.cat_no != 0 ";
	}
	if($cat_yn == "N") {
		$que_where .= " AND B.cat_no = 0 ";
	}
	
	if($gb == "Y") {
		$que_where .= " AND A.giftcard_use='N' AND A.giftcard_sdate <= curdate() AND A.giftcard_edate >= curdate() ";
	} else if($gb == "Y1") {
		$que_where .= " AND A.e_idx!='0' AND A.giftcard_use='N' AND A.giftcard_sdate <= curdate() AND A.giftcard_edate >= curdate() ";
		
		if($payprice!="") {		//결제금액이상
			$que_where .= " AND A.under_price <= '$payprice' ";
		}

	} else	if($gb == "U") {
		$que_where .= " AND A.giftcard_use='Y' ";
	} else	if($gb == "E") {
		$que_where .= " AND A.giftcard_edate < curdate() ";
	}
	
	if($_REQUEST["s_date"] && $_REQUEST["e_date"]) {
		$que_where .= " AND (A.giftcard_sdate BETWEEN '".$_REQUEST["s_date"]."' AND '".$_REQUEST["e_date"]."' OR A.giftcard_edate BETWEEN '".$_REQUEST["s_date"]."' AND '".$_REQUEST["e_date"]."') ";
	}

	//카운트
	$sql = "select count(A.idx) from $tbl A LEFT JOIN  ".$tbl_giftcard." B ON A.e_idx=B.idx WHERE 1=1 $que_where ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT A.*, B.cat_no, B.cat_code ";
    $sql .= "FROM ".$tbl." A ";
	$sql .= "LEFT JOIN  ".$tbl_giftcard." B ON A.e_idx=B.idx ";
    $sql .= "WHERE 1=1 $que_where  ORDER BY A.idx DESC ";

    if($total_rs > 0){
        $list['total'] = $total_rs;
        // 페이지 네비게이션 오프셋 지정.
		if(!$offset){
			$offset=0;
		}else{
			$offset=$offset;
		}

		// offset 이 전체 게시물수보다 작을때 offset 을 전체게시물 - 페이지당 보여줄 글 수로 offset 설정
		if($total_rs<=$offset){
			$offset = $total_rs - $scale;
		}

		if($scale != "0"){
			$sql .= " limit $offset,$scale ";
		}
		$rs = mysql_query($sql,$GLOBALS[dblink]);

		// offset 을 이용한 limit 가 적용된 갯수
		$total = mysql_num_rows($rs);
		$list['list']['total'] = $total;
		// 페이지 네비게이션 오프셋 지정.

        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }

    return $list;
}


//상품권 발송
function setGiftcardSend($idx){
	$tbl = $GLOBALS["_conf_tbl"]["giftcard_send"];//상품권 테이블
	$tbl_my = $GLOBALS["_conf_tbl"]["mygiftcard"];//상품권 테이블

	$mobile = mysql_escape_string($_POST[mobile_1])."-".mysql_escape_string($_POST[mobile_2])."-".mysql_escape_string($_POST[mobile_3]);
	$email = mysql_escape_string($_POST[email_id])."@".mysql_escape_string($_POST[email_domain]);

	$sql = "INSERT INTO ".$tbl." set 
		mgf_idx = '".$idx."',
		user_id = '".$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]."',
		send_name = '".mysql_escape_string($_POST[send_name])."',
		mobile = '".$mobile."',
		email = '".$email."',
		memo = '".mysql_escape_string($_POST[memo])."',
		mail_sms = '".mysql_escape_string($_POST[mail_sms])."',
		wdate = now()
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		$sql_up = "update $tbl_my set user_id='', send_gb='Y' where idx='$idx'";
		$rs_up = mysql_query($sql_up, $GLOBALS[dblink]);

		return true;
	}else{
		return false;
	}
}

//상품권 재발송
function reGiftcardSend($m_idx, $idx){
	$tbl = $GLOBALS["_conf_tbl"]["giftcard_send"];//상품권 테이블
	$tbl_my = $GLOBALS["_conf_tbl"]["mygiftcard"];//상품권 테이블

	$mobile = mysql_escape_string($_POST[mobile_1])."-".mysql_escape_string($_POST[mobile_2])."-".mysql_escape_string($_POST[mobile_3]);
	$email = mysql_escape_string($_POST[email_id])."@".mysql_escape_string($_POST[email_domain]);
	
	//$sql_del = "DELETE FROM $tbl WHERE idx='".$_POST[idx]."' ";
	//$rs_del = mysql_query($sql_del, $GLOBALS[dblink]);

	$sql = "UPDATE ".$tbl." set 
		mgf_idx = '".$m_idx."',
		user_id = '".$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]."',
		send_name = '".mysql_escape_string($_POST[send_name])."',
		mobile = '".$mobile."',
		email = '".$email."',
		memo = '".mysql_escape_string($_POST[memo])."',
		mail_sms = '".mysql_escape_string($_POST[mail_sms])."',
		wdate = now()
		WHERE idx='".$idx."'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		$sql_up = "update $tbl_my set send_gb='Y' where idx='$m_idx'";
		$rs_up = mysql_query($sql_up, $GLOBALS[dblink]);

		return true;
	}else{
		return false;
	}
}

//발송내역
function getSendGiftcardInfo($idx){
	$tbl = $GLOBALS["_conf_tbl"]["giftcard_send"];//상품권 테이블

    $sql  = "SELECT * ";
    $sql .= "FROM " .$tbl." ";
    $sql .= "WHERE idx = '$idx' ";

    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $total_rs = mysql_num_rows($rs);
    
    if($total_rs > 0){
        $list['total'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }
    return $list;

}


function getSendGiftcardList($user_id, $scale, $offset=0) {
	
	$tbl = $GLOBALS["_conf_tbl"]["giftcard_send"];//상품권 테이블
	$tbl_my = $GLOBALS["_conf_tbl"]["mygiftcard"];//상품권 테이블

	$que_where = " AND A.user_id='$user_id' ";

	//카운트
	$sql = "select count(A.idx) from $tbl A WHERE 1=1 $que_where ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT A.*, B.user_id as gift_user_id, B.giftcard_no, B.giftcard_name, B.giftcard_name, B.giftcard_dis, B.giftcard_unit, B.giftcard_sdate, B.giftcard_edate ";
    $sql .= "FROM ".$tbl." A ";
	$sql .= "LEFT JOIN ".$tbl_my." B ON A.mgf_idx=B.idx ";
    $sql .= "WHERE 1=1 $que_where  ORDER BY A.idx DESC ";

	if($total_rs > 0){
        $list['total'] = $total_rs;
        // 페이지 네비게이션 오프셋 지정.
		if(!$offset){
			$offset=0;
		}else{
			$offset=$offset;
		}

		// offset 이 전체 게시물수보다 작을때 offset 을 전체게시물 - 페이지당 보여줄 글 수로 offset 설정
		if($total_rs<=$offset){
			$offset = $total_rs - $scale;
		}

		if($scale != "0"){
			$sql .= " limit $offset,$scale ";
		}
		$rs = mysql_query($sql,$GLOBALS[dblink]);

		// offset 을 이용한 limit 가 적용된 갯수
		$total = mysql_num_rows($rs);
		$list['list']['total'] = $total;
		// 페이지 네비게이션 오프셋 지정.

        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }

    return $list;
}

?>