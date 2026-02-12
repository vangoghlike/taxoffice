<?
//리뷰 목록 가져오기
function getReviewListAll($scale, $offset=0){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_review"];

    $sql = "SELECT * FROM $tbl ";
	$sql .= " order by idx desc ";

    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $total_rs = mysql_num_rows($rs);

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

		//scale 0 으로 지정시에는 전체 가져옴
		if($scale > 0){
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

//리뷰 목록 가져오기
function getReviewList($g_idx, $scale, $offset=0){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_review"];

    $sql = "SELECT * FROM $tbl WHERE 1=1 AND g_idx='$g_idx' ";
	$sql .= " order by idx desc ";

    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $total_rs = mysql_num_rows($rs);

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

		//scale 0 으로 지정시에는 전체 가져옴
		if($scale > 0){
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

//리뷰 목록 가져오기
function getMyReviewList($user_id, $scale, $offset=0){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_review"];

    $sql = "SELECT * FROM $tbl WHERE 1=1 AND user_id='$user_id' ";
	$sql .= " order by idx desc ";

    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $total_rs = mysql_num_rows($rs);

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

		//scale 0 으로 지정시에는 전체 가져옴
		if($scale > 0){
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

//리뷰 등록하기
function insertReview($g_idx, $user_id, $user_name){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_review"];


	//리뷰 테이블에 입력
	$sql = "INSERT INTO ".$tbl." set 
		g_idx='$g_idx',
		user_id='".$user_id."',
		user_name='".$user_name."',
		review_point='".mysql_escape_string($_POST[review_point])."',
		subject='".mysql_escape_string($_POST[subject])."',
		contents='".mysql_escape_string($_POST[contents])."',
		ip='".$_SERVER[REMOTE_ADDR]."',
		wdate=now()
	";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}


//리뷰 수정하기
function updateReview($user_id, $idx){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_review"];

	//수정권한 설정
	$updatePerm = false;

	//관리자는 그냥 통과
	if($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["ID"]){
		$updatePerm = true;
	}

	//기존정보
	$arrArticleInfo = getReviewInfo($idx);
	
	if($arrArticleInfo["list"][0]["user_id"]==$user_id){
		$updatePerm = true;
	}

	if($updatePerm==true){
		//리뷰 테이블에 업데이트
		$sql = "UPDATE ".$tbl." set 
			review_point='".mysql_escape_string($_POST[review_point])."',
			subject='".mysql_escape_string($_POST[subject])."',
			contents='".mysql_escape_string($_POST[contents])."',
			ip='".$_SERVER[REMOTE_ADDR]."'
			WHERE idx = '$idx'
		";

		$rs = mysql_query($sql, $GLOBALS[dblink]);
		$total = mysql_affected_rows($GLOBALS[dblink]);

		if($total > 0){
			return true;
		}else{
			return false;
		}
	}else{
		jsMsg("수정할 권한이 없습니다.");
		return false;
	}
}


//리뷰 가져오기 - id
function getReviewInfo($idx){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_review"];

	$sql  = "SELECT * ";
	$sql .= "FROM $tbl ";
	$sql .= "WHERE idx = '$idx' ";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	//echo $sql;

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

//리뷰 삭제하기
function deleteReview($user_id, $idx){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_review"];

	//삭제권한 설정
	$deletePerm = false;

	//관리자는 그냥 통과
	if($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["ID"]){
		$deletePerm = true;
	}

	//기존정보
	$arrArticleInfo = getReviewInfo($idx);
	
	if($arrArticleInfo["list"][0]["user_id"]==$user_id){
		$deletePerm = true;
	}

	
	if($deletePerm==true){
		//리뷰 테이블에서 삭제
		$sql = "DELETE FROM ".$tbl." 
			WHERE idx='$idx'
		";

		$rs = mysql_query($sql, $GLOBALS[dblink]);
		$total = mysql_affected_rows($GLOBALS[dblink]);

		if($total > 0){
			return true;
		}else{
			return false;
		}
	}else{
		jsMsg("삭제할 권한이 없습니다.");
		return false;
	}
}
?>