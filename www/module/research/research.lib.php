<?
/*********************************** 설문관리 *************************************/
//설문 등록
function insertResearch(){
	$tbl = $GLOBALS["_conf_tbl"]["research_info"];
	$tbl_question = $GLOBALS["_conf_tbl"]["research_question"];
	
	$use_login = mysql_escape_string($_POST[use_login])=="Y"?"Y":"N";
	$is_show = mysql_escape_string($_POST[is_show])=="Y"?"Y":"N";

	//설문정보에 입력
	$sql = "insert into ".$tbl." SET 
		subject= '".mysql_escape_string($_POST[subject])."',
		use_login= '".$use_login."',
		is_show= '".$is_show."',
		sdate = '".mysql_escape_string($_POST[sdate])."',
		edate = '".mysql_escape_string($_POST[edate])."',
		wdate = now()
	";

	$rs = mysql_query($sql,$GLOBALS[dblink]);
	$insert_idx = mysql_insert_id($GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		//설문항목에 입력
		for($i=0;$i<count($_POST[question]);$i++){
			if(trim(mysql_escape_string($_POST[question][$i]))!=""){
				$sql = "insert into ".$tbl_question." SET 
					r_idx= '".$insert_idx."',
					question= '".mysql_escape_string($_POST[question][$i])."'
				";
				mysql_query($sql,$GLOBALS[dblink]);
			}
		}
		return true;
	}else{
		return false;
	}
}

function getResearchList($scale, $offset=0){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["research_info"];

    $sql = "SELECT * FROM $tbl WHERE 1=1 ";

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

//테이블에서 목록 가져오기
function getResearchQuestionList($idx, $orderby){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["research_question"];

	if($orderby){
		$orderby = $orderby;
	}else{
		$orderby = "idx asc";
	}
    $sql  = "SELECT * ";
    $sql .= "FROM $tbl WHERE r_idx='$idx' order by $orderby ";


//echo $sql;
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

//테이블에서 목록 가져오기
function getResearchAnswerList($r_idx, $rq_idx, $orderby){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["research_answer"];

	if($orderby){
		$orderby = $orderby;
	}else{
		$orderby = "idx asc";
	}
    $sql  = "SELECT * ";
    $sql .= "FROM $tbl WHERE r_idx='$r_idx' AND rq_idx='$rq_idx' order by $orderby ";


//echo $sql;
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

//설문합계가져오기
function getResearchAnswerTotal($idx){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["research_contents"];

    $sql  = "SELECT sum(vote) ";
    $sql .= "FROM $tbl WHERE p_idx='$idx' ";


//echo $sql;
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    
	$row = mysql_fetch_row($rs);
    return $row[0];
}



//설문 수정
function editResearch($idx){
	$tbl = $GLOBALS["_conf_tbl"]["research_info"];
	$tbl_question = $GLOBALS["_conf_tbl"]["research_question"];
	
	$use_login = mysql_escape_string($_POST[use_login])=="Y"?"Y":"N";
	$is_show = mysql_escape_string($_POST[is_show])=="Y"?"Y":"N";

	//설문정보에 입력
	$sql = "update ".$tbl." SET 
		subject= '".mysql_escape_string($_POST[subject])."',
		use_login= '".$use_login."',
		is_show= '".$is_show."',
		sdate = '".mysql_escape_string($_POST[sdate])."',
		edate = '".mysql_escape_string($_POST[edate])."'
		WHERE idx='$idx'
	";

	$rs = mysql_query($sql,$GLOBALS[dblink]);

	if($rs){
		//설문항목에서 삭제
		for($i=0;$i<count($_POST[del_question]);$i++){
			$sql = "DELETE FROM ".$tbl_question." 
				WHERE idx='".$_POST[del_question][$i]."'
			";
			mysql_query($sql,$GLOBALS[dblink]);
		}

		//설문항목에서 업데이트
		foreach ($_POST[question_list] as $key => $val){
			$sql = "UPDATE ".$tbl_question." SET
				question = '$val'
				WHERE idx='$key'
			";
			mysql_query($sql,$GLOBALS[dblink]);
		}

		//설문항목에 입력
		for($i=0;$i<count($_POST[question]);$i++){
			if(trim(mysql_escape_string($_POST[question][$i]))!=""){
				$sql = "insert into ".$tbl_question." SET 
					r_idx= '".$idx."',
					question= '".mysql_escape_string($_POST[question][$i])."'
				";
				mysql_query($sql,$GLOBALS[dblink]);
			}
		}

		return true;
	}else{
		return false;
	}
}


//설문 삭제
function deleteResearch($idx){
	$tbl = $GLOBALS["_conf_tbl"]["research_info"];
	$tbl_question = $GLOBALS["_conf_tbl"]["research_question"];
	$tbl_answer = $GLOBALS["_conf_tbl"]["research_answer"];
	$tbl_log = $GLOBALS["_conf_tbl"]["research_log"];
	

	$sql = "DELETE FROM ".$tbl_question." WHERE r_idx = '$idx' ";
	$rsf = mysql_query($sql,$GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		$sql = "DELETE FROM ".$tbl." WHERE idx = '$idx' ";
		$rsf = mysql_query($sql,$GLOBALS[dblink]);

		$sql = "DELETE FROM ".$tbl_answer." WHERE r_idx = '$idx' ";
		$rsf = mysql_query($sql,$GLOBALS[dblink]);

		$sql = "DELETE FROM ".$tbl_log." WHERE r_idx = '$idx' ";
		$rsf = mysql_query($sql,$GLOBALS[dblink]);

		return true;
	}else{
		return false;
	}
}


function getMainResearch(){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["research_info"];
	$tbl_question = $GLOBALS["_conf_tbl"]["research_question"];
	$tbl_answer = $GLOBALS["_conf_tbl"]["research_answer"];

    $sql = "SELECT * FROM $tbl WHERE is_show='Y' AND sdate <= now() AND concat(edate,' 23:59:59') >= now() order by idx desc ";

	$rs = mysql_query($sql,$GLOBALS[dblink]);
	$total = mysql_num_rows($rs);

	$list['list']['total'] = $total;
		
	for($i=0; $i < $total; $i++){
		$list['list'][$i] = mysql_fetch_assoc($rs);
		//설문 및 답변목록 가져오기
		$sql = "
		SELECT A.question, B.* FROM $tbl_question A LEFT JOIN $tbl_answer B ON A.idx=B.rq_idx
		WHERE A.r_idx = '".$list['list'][$i][idx]."'
		";
		$rs_q = mysql_query($sql,$GLOBALS[dblink]);
		$total_q = mysql_num_rows($rs_q);
		$list['list'][$i]['qalist']['total'] = $total_q;

		for($j=0; $j < $total_q; $j++){
			$list['list'][$i]['qalist'][$j] = mysql_fetch_assoc($rs_q);
		}
	}

    return $list;
}



//설문 답변 수정
function editResearchAnswer($r_idx, $rq_idx){
	$tbl = $GLOBALS["_conf_tbl"]["research_info"];
	$tbl_answer = $GLOBALS["_conf_tbl"]["research_answer"];
	
	//설문답변 항목에서 삭제
	for($i=0;$i<count($_POST[del_answer]);$i++){
		$sql = "DELETE FROM ".$tbl_answer." 
			WHERE idx='".$_POST[del_answer][$i]."'
		";
		$rs = mysql_query($sql,$GLOBALS[dblink]);
	}

	//설문답변 항목에서 업데이트
	if(is_array($_POST[answer_list])==true){
		foreach ($_POST[answer_list] as $key => $val){
			$sql = "UPDATE ".$tbl_answer." SET
				answer = '$val'
				WHERE idx='$key'
			";
			$rs = mysql_query($sql,$GLOBALS[dblink]);
		}
	}
	//설문답변 항목에 입력
	for($i=0;$i<count($_POST[answer]);$i++){
		if(trim(mysql_escape_string($_POST[answer][$i]))!=""){
			$sql = "insert into ".$tbl_answer." SET 
				r_idx= '".$r_idx."',
				rq_idx= '".$rq_idx."',
				answer= '".mysql_escape_string($_POST[answer][$i])."'
			";
			$rs = mysql_query($sql,$GLOBALS[dblink]);
		}
	}

	if($rs){
		return true;
	}else{
		return false;
	}

}

//설문 참여
function joinResearch($r_idx){
	$tbl = $GLOBALS["_conf_tbl"]["research_info"];
	$tbl_question = $GLOBALS["_conf_tbl"]["research_question"];
	$tbl_answer = $GLOBALS["_conf_tbl"]["research_answer"];
	$tbl_log = $GLOBALS["_conf_tbl"]["research_log"];

	$arrInfo = getArticleInfo($tbl, $r_idx);

	//로그인여부 체크
	if($arrInfo["list"][0][use_login]=="Y" && !$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]){
		jsMsg("로그인후 이용가능 합니다.");
		jsHistory("-1") ;
		exit;
	}

	//표시체크
	if($arrInfo["list"][0][is_show]!="Y"){
		jsMsg("참여가능한 설문이 아닙니다.");
		jsHistory("-1") ;
		exit;
	}

	//날짜체크
	if($arrInfo["list"][0][sdate] > date("Y-m-d",mktime())){
		jsMsg("아직 시작되지 않은 설문입니다.");
		jsHistory("-1") ;
		exit;
	}
	if($arrInfo["list"][0][edate] < date("Y-m-d",mktime())){
		jsMsg("이미 종료된 설문입니다.");
		jsHistory("-1") ;
		exit;
	}

	//로그인을 해야하는 설문의 경우 이미 참여했는지 체크
	if($arrInfo["list"][0][use_login]=="Y"){
		$sql = "select * from $tbl_log WHERE r_idx='$r_idx' AND user_id='".$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]."' ";
		$rs = mysql_query($sql,$GLOBALS[dblink]);
		$total = mysql_num_rows($rs);

		if($total > 0){
			jsMsg("이미 참여하신 설문입니다.");
			jsHistory("-1") ;
			exit;
		}
	}else{
		//비로그인의경우 아이피로 이미 참여했는지 체크
		$sql = "select * from $tbl_log WHERE r_idx='$r_idx' AND ip='".$_SERVER[REMOTE_ADDR]."' ";
		$rs = mysql_query($sql,$GLOBALS[dblink]);
		$total = mysql_num_rows($rs);

		if($total > 0){
			jsMsg("이미 참여하신 설문입니다.");
			jsHistory("-1") ;
			exit;
		}
	}

	//설문갯수는 50개까지만 가능하게~ (혹시모를 spam 입력)
	if($_POST[total_q] < 50){
		for($i=1;$i<intval($_POST[total_q]+1);$i++){
			$arrIdx = explode("|",$_POST["research_" . $i]);
			//설문로그에 입력
			$sql = "insert into ".$tbl_log." SET 
				r_idx= '".$r_idx."',
				rq_idx= '".$arrIdx[0]."',
				ra_idx= '".$arrIdx[1]."',
				user_id= '".$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]."',
				ip = '".$_SERVER[REMOTE_ADDR]."',
				wdate = now()
			";

			$rs = mysql_query($sql,$GLOBALS[dblink]);
		}

		if($rs){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}

}


function getResearchJoinList($r_idx, $scale, $offset=0){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["research_log"];

    $sql = "SELECT * FROM $tbl WHERE 1=1 AND r_idx='$r_idx' ";

	$sql .= " group by user_id order by idx desc ";

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


function getResearchJoinView($r_idx, $user_id){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["research_log"];
	$tbl_question = $GLOBALS["_conf_tbl"]["research_question"];
	$tbl_answer = $GLOBALS["_conf_tbl"]["research_answer"];

	$sql = "
		SELECT A. * , B.question, C.answer
		FROM $tbl A
		LEFT JOIN $tbl_question B ON A.rq_idx = B.idx
		LEFT JOIN $tbl_answer C ON A.ra_idx = C.idx
		WHERE A.r_idx = '$r_idx'
		AND user_id = '$user_id'
	";

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