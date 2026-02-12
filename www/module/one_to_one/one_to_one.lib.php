<?
//1:1 질문과 답변 입력
function insertOneToOne(){
	$tbl = $GLOBALS["_conf_tbl"]["one_to_one"];

	$sql = "INSERT INTO ".$tbl." set 
		user_id = '".$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]."',
		user_name = '".$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["NAME"]."',
		status = 'N',
		subject = '".mysql_escape_string($_POST[subject])."',
		contents = '".mysql_escape_string($_POST[contents])."',
		ip='".$_SERVER[REMOTE_ADDR]."',
		wdate = now()
	";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);


	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//1:1 질문과 답변 수정(답변)
function editOneToOne($idx){
	$tbl = $GLOBALS["_conf_tbl"]["one_to_one"];

	$sql = "UPDATE ".$tbl." SET
		status='".mysql_escape_string($_POST[status])."',
		re_contents = '".mysql_escape_string($_POST[re_contents])."'
		WHERE idx='$idx'
	";

	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($rs){
		return true;
	}else{
		return false;
	}
}

//1:1 질문과 답변 삭제
function deleteOneToOne($idx){
	$tbl = $GLOBALS["_conf_tbl"]["one_to_one"];

	$sql = "DELETE FROM ".$tbl." WHERE idx='$idx' ";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//1:1 질문과 답변 삭제 - 사용자
function deleteOneToOneUser($user_id, $idx){
	$tbl = $GLOBALS["_conf_tbl"]["one_to_one"];

	$sql = "DELETE FROM ".$tbl." WHERE user_id='$user_id' AND idx='$idx' ";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//1:1 질문과 답변 목록
function getOneToOneListAll($sw, $sk, $scale, $offset=0){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["one_to_one"];

    $sql = "SELECT * FROM $tbl WHERE 1=1 ";

	if($sw == "id"){
		$sql .= " AND user_id like '%$sk%' "; 
	}
	if($sw == "name"){
		$sql .= " AND user_name like '%$sk%' ";
	}
	if($sw == "st"){
		$sql .= " AND status = '$sk' ";
	}
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

//1:1 질문과 답변 목록
function getOneToOneList($user_id, $scale, $offset=0){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["one_to_one"];

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

//1:1 질문과 답변 가져오기
function getOneToOneInfo($idx){
	$tbl = $GLOBALS["_conf_tbl"]["one_to_one"];

	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl." ";
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
?>