<?
function insertCouponGood($idx) {
	$tbl = $GLOBALS["_conf_tbl"]["mycoupon"];//my쿠폰 테이블

	$arrInfo = getGoodInfo($idx);

	$sql = "INSERT INTO ".$tbl." set 
		user_id='".$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]."',
		g_idx='$idx',
		coupon_name='".stripslashes($arrInfo["list"][0][g_name])."',
		coupon_dis='".$arrInfo["list"][0][coupon_dis]."',
		coupon_unit='".$arrInfo["list"][0][coupon_unit]."',
		coupon_sdate='".$arrInfo["list"][0][coupon_sdate]."',
		coupon_edate='".$arrInfo["list"][0][coupon_edate]."',
		coupon_use='N',
		wdate = now()
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($rs > 0){
		
		if($arrInfo["list"][0][coupon_limit] != "N"){
			$sql2 = "update tbl_shop_good set coupon_qty = coupon_qty - 1 where idx='$idx'";
			$rs2 = mysql_query($sql2, $GLOBALS[dblink]);
		}

		return true;
	}else{
		return false;
	}
	
}


function insertCodeCouponGood($no) {
	$tbl = $GLOBALS["_conf_tbl"]["mycoupon"];//my쿠폰 테이블

	$sql = "UPDATE ".$tbl." set 
			user_id='".$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]."',
			wdate = now()
			WHERE coupon_no='$no' and user_id=''
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

function getCouponGoodList($user_id, $idx, $use) {
	$tbl = $GLOBALS["_conf_tbl"]["mycoupon"];//my쿠폰 테이블
	
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
    $sql .= "WHERE 1=1 $que_where AND A.coupon_use='$use' ";
	$sql .= "AND A.coupon_sdate <= curdate() AND A.coupon_edate >= curdate() ORDER BY A.idx DESC ";

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


//쿠폰 등록
function insertCoupon(){
	$tbl = $GLOBALS["_conf_tbl"]["coupon"];//쿠폰 테이블
	$tbl_my = $GLOBALS["_conf_tbl"]["mycoupon"];//쿠폰 테이블

	$arrCateInfo = getCategoryInfo(mysql_escape_string($_POST[cat_no]));

	$sql = "INSERT INTO ".$tbl." set 
		coupon_name = '".mysql_escape_string($_POST[coupon_name])."',
		coupon_content = '".mysql_escape_string($_POST[coupon_content])."',
		coupon_sdate = '".mysql_escape_string($_POST[coupon_sdate])."',
		coupon_edate = '".mysql_escape_string($_POST[coupon_edate])."',
		coupon_dis = '".mysql_escape_string($_POST[coupon_dis])."',
		coupon_unit = '".mysql_escape_string($_POST[coupon_unit])."',
		coupon_qty = '".mysql_escape_string($_POST[coupon_qty])."',
		over_price = '".mysql_escape_string($_POST[over_price])."',
		under_price = '".mysql_escape_string($_POST[under_price])."',
		cat_no='".$arrCateInfo["list"][0][cat_no]."',
		cat_code='".$arrCateInfo["list"][0][cat_code]."',
		wdate = now()
	";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$insert_idx = mysql_insert_id($GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);
	
	//회원발행
	if($_POST["member"]=="Y") {
		$arrList = getMemberList("", "", 0, 0);
		if($arrList['list']['total'] > 0):
		for ($i=0;$i<$arrList['list']['total'];$i++) {
			$serial = substr(strtoupper(md5($_POST[coupon_name].$i.microtime(true))),0,16);
			
			$sql = "INSERT INTO ".$tbl_my." set 
				user_id = '".$arrList['list'][$i]['user_id']."',
				e_idx = '".$insert_idx."',
				coupon_no = '".$serial."',
				coupon_name = '".mysql_escape_string($_POST[coupon_name])."',
				coupon_content = '".mysql_escape_string($_POST[coupon_content])."',
				coupon_sdate = '".mysql_escape_string($_POST[coupon_sdate])."',
				coupon_edate = '".mysql_escape_string($_POST[coupon_edate])."',
				coupon_dis = '".mysql_escape_string($_POST[coupon_dis])."',
				coupon_unit = '".mysql_escape_string($_POST[coupon_unit])."',
				over_price = '".mysql_escape_string($_POST[over_price])."',
				under_price = '".mysql_escape_string($_POST[under_price])."',
				coupon_use = 'N',
				wdate = now()
			";
			$rs = mysql_query($sql, $GLOBALS[dblink]);

		} endif;

		$sql_up = "UPDATE  ".$tbl." set 
				coupon_qty = '".$arrList['list']['total']."'
			WHERE idx='".$insert_idx."'
		";
		$rs_up = mysql_query($sql_up, $GLOBALS[dblink]);

	} else {

		//발행
		for($i=0; $i<$_POST[coupon_qty]; $i++) {

			$serial = substr(strtoupper(md5($_POST[coupon_name].$i.microtime(true))),0,16);

			$sql = "INSERT INTO ".$tbl_my." set 
				e_idx = '".$insert_idx."',
				coupon_no = '".$serial."',
				coupon_name = '".mysql_escape_string($_POST[coupon_name])."',
				coupon_content = '".mysql_escape_string($_POST[coupon_content])."',
				coupon_sdate = '".mysql_escape_string($_POST[coupon_sdate])."',
				coupon_edate = '".mysql_escape_string($_POST[coupon_edate])."',
				coupon_dis = '".mysql_escape_string($_POST[coupon_dis])."',
				coupon_unit = '".mysql_escape_string($_POST[coupon_unit])."',
				over_price = '".mysql_escape_string($_POST[over_price])."',
				under_price = '".mysql_escape_string($_POST[under_price])."',
				coupon_use = 'N'
			";
			$rs = mysql_query($sql, $GLOBALS[dblink]);
		}
	}

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

function updateCoupon($idx){
	
	$tbl = $GLOBALS["_conf_tbl"]["coupon"];//쿠폰 테이블
	$tbl_my = $GLOBALS["_conf_tbl"]["mycoupon"];//쿠폰 테이블
	
	if($_POST[coupon_qty]) {
		$sql_add = " coupon_qty = coupon_qty + ".mysql_escape_string($_POST[coupon_qty]).", ";
	}
	$arrCateInfo = getCategoryInfo(mysql_escape_string($_POST[cat_no]));

	$sql = "UPDATE ".$tbl." SET 
		coupon_name = '".mysql_escape_string($_POST[coupon_name])."',
		coupon_content = '".mysql_escape_string($_POST[coupon_content])."',
		coupon_sdate = '".mysql_escape_string($_POST[coupon_sdate])."',
		coupon_edate = '".mysql_escape_string($_POST[coupon_edate])."',
		coupon_dis = '".mysql_escape_string($_POST[coupon_dis])."',
		over_price = '".mysql_escape_string($_POST[over_price])."',
		under_price = '".mysql_escape_string($_POST[under_price])."',
		cat_no='".$arrCateInfo["list"][0][cat_no]."',
		cat_code='".$arrCateInfo["list"][0][cat_code]."',
		$sql_add 
		coupon_unit = '".mysql_escape_string($_POST[coupon_unit])."'
		WHERE idx = '".$idx."'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	$sql_up = "UPDATE ".$tbl_my." SET 
		coupon_name = '".mysql_escape_string($_POST[coupon_name])."',
		coupon_content = '".mysql_escape_string($_POST[coupon_content])."',
		coupon_sdate = '".mysql_escape_string($_POST[coupon_sdate])."',
		coupon_edate = '".mysql_escape_string($_POST[coupon_edate])."',
		coupon_dis = '".mysql_escape_string($_POST[coupon_dis])."',
		over_price = '".mysql_escape_string($_POST[over_price])."',
		under_price = '".mysql_escape_string($_POST[under_price])."',
		coupon_unit = '".mysql_escape_string($_POST[coupon_unit])."'
		WHERE e_idx = '".$idx."'
	";
	$rs_up = mysql_query($sql_up, $GLOBALS[dblink]);
	
	//추가발행
	if($_POST[coupon_qty]) {
	for($i=0; $i<$_POST[coupon_qty]; $i++) {

		$serial = strtoupper(md5($_POST[coupon_name].$i.microtime(true)));

		$sql1 = "INSERT INTO ".$tbl_my." SET 
			e_idx = '".$idx."',
			coupon_no = '".substr($serial,0,16)."',
			coupon_name = '".mysql_escape_string($_POST[coupon_name])."',
			coupon_content = '".mysql_escape_string($_POST[coupon_content])."',
			coupon_sdate = '".mysql_escape_string($_POST[coupon_sdate])."',
			coupon_edate = '".mysql_escape_string($_POST[coupon_edate])."',
			coupon_dis = '".mysql_escape_string($_POST[coupon_dis])."',
			coupon_unit = '".mysql_escape_string($_POST[coupon_unit])."',
			coupon_use = 'N'
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

//발급된 쿠폰에 회원입력
function updateUserCoupon($idx){
	
	$tbl = $GLOBALS["_conf_tbl"]["mycoupon"];//쿠폰 테이블

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

//쿠폰리스트 가져오기
function getCouponList($user_id, $gb="", $scale, $offset=0){
	$tbl = $GLOBALS["_conf_tbl"]["coupon"];//쿠폰 테이블
	$tbl_set = $GLOBALS["_conf_tbl"]["coupon_set"];//쿠폰 테이블

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

//상품쿠폰리스트 가져오기
function getGoodCouponList($scale, $offset=0){
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];//상품 테이블

	//카운트
	$sql = "select count(A.idx) from $tbl A WHERE coupon_use='Y' ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT A.* ";
    $sql .= "FROM ".$tbl." A WHERE coupon_use='Y' ";

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

function getMycouponList($g_idx, $scale, $offset=0){
	$tbl = $GLOBALS["_conf_tbl"]["mycoupon"];//쿠폰 테이블
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


//쿠폰세팅 가져오기
function getCouponListAdmin($scale, $offset=0, $gb=""){
	$tbl = $GLOBALS["_conf_tbl"]["coupon"];//쿠폰 테이블

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

	if($gb=="Y") {
		$que_where = " AND member_coupon='Y' ";
	} else {
		$que_where = " AND member_coupon='N' ";
	}

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

//쿠폰 사용여부
function getCouponUserListAdmin($idx, $scale, $offset=0){
	$tbl = $GLOBALS["_conf_tbl"]["mycoupon"];//쿠폰 테이블

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

//쿠폰정보 가져오기
function getCouponInfo($idx){
	$tbl = $GLOBALS["_conf_tbl"]["coupon"];

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

//쿠폰정보 가져오기
function getMyCouponInfo($idx){
	$tbl = $GLOBALS["_conf_tbl"]["mycoupon"];

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


//쿠폰시리얼 가져오기
function checkNumber($cert){
	$tbl = $GLOBALS["_conf_tbl"]["coupon"];

    $sql  = "SELECT * ";
    $sql .= "FROM " .$tbl." ";
    $sql .= "WHERE coupon = '$cert' and use_gb='N' and wdate='0000-00-00' ";

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

function deleteMyCoupon($idx){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["mycoupon"];//쿠폰정보

	//상품 정보 삭제
	$sql = "DELETE FROM ".$tbl." WHERE idx='".$idx."'	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	
	if($rs){
		return true;
	}else{
		return false;
	}
}

function deleteUserCoupon($e_idx, $idx){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["coupon"];//쿠폰정보
	$tbl_my = $GLOBALS["_conf_tbl"]["mycoupon"];//쿠폰정보

	//상품 정보 삭제
	$sql = "DELETE FROM ".$tbl_my." WHERE idx='".$idx."'	";
	$rs1 = mysql_query($sql, $GLOBALS[dblink]);
	
	if($rs1){
		$sql = "UPDATE $tbl SET
			coupon_qty = coupon_qty-1
			WHERE idx='".$e_idx."'	
		";
		$rs = mysql_query($sql, $GLOBALS[dblink]);

		return true;
	}else{
		return false;
	}
}


function deleteCoupon($idx){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["coupon"];//쿠폰정보
	$tbl_my = $GLOBALS["_conf_tbl"]["mycoupon"];//쿠폰정보

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



function getMypageCouponList($user_id, $gb, $scale, $offset=0, $payprice="", $cat_yn="") {
	
	$tbl = $GLOBALS["_conf_tbl"]["mycoupon"];//쿠폰 테이블
	$tbl_coupon = $GLOBALS["_conf_tbl"]["coupon"];//쿠폰 테이블
	
	$que_where = " AND A.user_id='$user_id' ";
	
	if($cat_yn == "Y") {
		$que_where .= " AND B.cat_no != 0 ";
	}
	if($cat_yn == "N") {
		$que_where .= " AND B.cat_no = 0 ";
	}
	
	if($gb == "Y") {
		$que_where .= " AND A.coupon_use='N' AND A.coupon_sdate <= curdate() AND A.coupon_edate >= curdate() ";
	} else if($gb == "Y1") {
		$que_where .= " AND A.e_idx!='0' AND A.coupon_use='N' AND A.coupon_sdate <= curdate() AND A.coupon_edate >= curdate() ";
		
		if($payprice!="") {		//결제금액이상
			$que_where .= " AND A.under_price <= '$payprice' ";
		}

	} else	if($gb == "U") {
		$que_where .= " AND A.coupon_use='Y' ";
	} else	if($gb == "E") {
		$que_where .= " AND A.coupon_edate < curdate() ";
	} else	if($gb == "UE") {
		$que_where .= " AND (A.coupon_use='Y' OR A.coupon_edate < curdate() ) ";
	}

	if($_REQUEST["s_date"] && $_REQUEST["e_date"]) {
		$que_where .= " AND (A.coupon_sdate BETWEEN '".$_REQUEST["s_date"]."' AND '".$_REQUEST["e_date"]."' OR A.coupon_edate BETWEEN '".$_REQUEST["s_date"]."' AND '".$_REQUEST["e_date"]."') ";
	}

	//카운트
	$sql = "select count(A.idx) from $tbl A LEFT JOIN  ".$tbl_coupon." B ON A.e_idx=B.idx WHERE 1=1 $que_where ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT A.*, B.cat_no, B.cat_code ";
    $sql .= "FROM ".$tbl." A ";
	$sql .= "LEFT JOIN  ".$tbl_coupon." B ON A.e_idx=B.idx ";
    $sql .= "WHERE 1=1 $que_where  ORDER BY A.idx DESC ";
//echo $sql;
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