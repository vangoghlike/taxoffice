<?
/*********************************** 투표관리 *************************************/
//투표 등록
function insertPoll(){
	$tbl = $GLOBALS["_conf_tbl"]["poll_info"];
	$tbl_contents = $GLOBALS["_conf_tbl"]["poll_contents"];
	
	$use_login = mysql_escape_string($_POST[use_login])=="Y"?"Y":"N";
	$is_show = mysql_escape_string($_POST[is_show])=="Y"?"Y":"N";

	//투표정보에 입력
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
		//투표항목에 입력
		for($i=0;$i<count($_POST[answer]);$i++){
			if(trim(mysql_escape_string($_POST[answer][$i]))!=""){
				$sql = "insert into ".$tbl_contents." SET 
					p_idx= '".$insert_idx."',
					answer= '".mysql_escape_string($_POST[answer][$i])."'
				";
				mysql_query($sql,$GLOBALS[dblink]);
			}
		}
		return true;
	}else{
		return false;
	}
}

function getPollList($scale, $offset=0){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["poll_info"];

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
function getPollAnswerList($idx, $orderby){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["poll_contents"];

	if($orderby){
		$orderby = $orderby;
	}else{
		$orderby = "idx asc";
	}
    $sql  = "SELECT * ";
    $sql .= "FROM $tbl WHERE p_idx='$idx' order by $orderby ";


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

//투표합계가져오기
function getPollAnswerTotal($idx){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["poll_contents"];

    $sql  = "SELECT sum(vote) ";
    $sql .= "FROM $tbl WHERE p_idx='$idx' ";


//echo $sql;
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    
	$row = mysql_fetch_row($rs);
    return $row[0];
}



//투표 수정
function editPoll($idx){
	$tbl = $GLOBALS["_conf_tbl"]["poll_info"];
	$tbl_contents = $GLOBALS["_conf_tbl"]["poll_contents"];
	
	$use_login = mysql_escape_string($_POST[use_login])=="Y"?"Y":"N";
	$is_show = mysql_escape_string($_POST[is_show])=="Y"?"Y":"N";

	//투표정보에 입력
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
		//투표항목에서 삭제
		for($i=0;$i<count($_POST[del_answer]);$i++){
			$sql = "DELETE FROM ".$tbl_contents." 
				WHERE idx='".$_POST[del_answer][$i]."'
			";
			mysql_query($sql,$GLOBALS[dblink]);
		}

		//투표항목에서 업데이트
		foreach ($_POST[answer_list] as $key => $val){
			$sql = "UPDATE ".$tbl_contents." SET
				answer = '$val'
				WHERE idx='$key'
			";
			mysql_query($sql,$GLOBALS[dblink]);
		}

		//투표항목에 입력
		for($i=0;$i<count($_POST[answer]);$i++){
			if(trim(mysql_escape_string($_POST[answer][$i]))!=""){
				$sql = "insert into ".$tbl_contents." SET 
					p_idx= '".$idx."',
					answer= '".mysql_escape_string($_POST[answer][$i])."'
				";
				mysql_query($sql,$GLOBALS[dblink]);
			}
		}

		return true;
	}else{
		return false;
	}
}


//투표 삭제
function deletePoll($idx){
	$tbl = $GLOBALS["_conf_tbl"]["poll_info"];
	$tbl_contents = $GLOBALS["_conf_tbl"]["poll_contents"];
	$tbl_log = $GLOBALS["_conf_tbl"]["poll_log"];
	

	$sql = "DELETE FROM ".$tbl_contents." WHERE p_idx = '$idx' ";
	$rsf = mysql_query($sql,$GLOBALS[dblink]);

	if($rsf){
		$sql = "DELETE FROM ".$tbl." WHERE idx = '$idx' ";
		$rsf = mysql_query($sql,$GLOBALS[dblink]);

		$sql = "DELETE FROM ".$tbl_log." WHERE p_idx = '$idx' ";
		$rsf = mysql_query($sql,$GLOBALS[dblink]);

		return true;
	}else{
		return false;
	}
}


function getMainPoll(){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["poll_info"];

    $sql = "SELECT * FROM $tbl WHERE is_show='Y' AND sdate <= now() AND concat(edate,' 23:59:59') >= now() order by idx desc ";

	$rs = mysql_query($sql,$GLOBALS[dblink]);
	$total = mysql_num_rows($rs);

	$list['list']['total'] = $total;
		
	for($i=0; $i < $total; $i++){
		$list['list'][$i] = mysql_fetch_assoc($rs);
		$list['answer'][$i] = getPollAnswerList($list['list'][$i][idx],"");
	}

    return $list;
}


//투표 참여
function insertVote($p_idx, $pc_idx){
	$tbl = $GLOBALS["_conf_tbl"]["poll_info"];
	$tbl_contents = $GLOBALS["_conf_tbl"]["poll_contents"];
	$tbl_log = $GLOBALS["_conf_tbl"]["poll_log"];

	$arrInfo = getArticleInfo($tbl, $p_idx);

	//로그인여부 체크
	if($arrInfo["list"][0][use_login]=="Y" && !$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]){
		jsMsg("로그인후 이용가능 합니다.");
		jsHistory("-1") ;
		exit;
	}

	//표시체크
	if($arrInfo["list"][0][is_show]!="Y"){
		jsMsg("참여가능한 투표이 아닙니다.");
		jsHistory("-1") ;
		exit;
	}

	//날짜체크
	if($arrInfo["list"][0][sdate] > date("Y-m-d",mktime())){
		jsMsg("아직 시작되지 않은 투표입니다.");
		jsHistory("-1") ;
		exit;
	}
	if($arrInfo["list"][0][edate] < date("Y-m-d",mktime())){
		jsMsg("이미 종료된 투표입니다.");
		jsHistory("-1") ;
		exit;
	}

	//로그인을 해야하는 투표의 경우 이미 참여했는지 체크
	if($arrInfo["list"][0][use_login]=="Y"){
		$sql = "select * from $tbl_log WHERE p_idx='$p_idx' AND user_id='".$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]."' ";
		$rs = mysql_query($sql,$GLOBALS[dblink]);
		$total = mysql_num_rows($rs);

		if($total > 0){
			jsMsg("이미 참여하신 투표입니다.");
			jsHistory("-1") ;
			exit;
		}
	}

	//투표항목에 업데이트
	$sql = "UPDATE ".$tbl_contents." SET 
		vote = vote +1 WHERE idx = '$pc_idx'
	";
	$rs = mysql_query($sql,$GLOBALS[dblink]);

	if($rs){
		//투표로그에 입력
		$sql = "insert into ".$tbl_log." SET 
			p_idx= '".$p_idx."',
			pc_idx= '".$pc_idx."',
			user_id= '".$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]."',
			ip = '".$_SERVER[REMOTE_ADDR]."',
			wdate = now()
		";

		$rs = mysql_query($sql,$GLOBALS[dblink]);
		$total = mysql_affected_rows($GLOBALS[dblink]);
	}

	if($total > 0){
		return true;
	}else{
		return false;
	}
}
?>