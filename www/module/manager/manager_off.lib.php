<?
function getManagerOffList($scale, $offset=0){
	$tbl = "tbl_manager_off";

    $sql = "SELECT * FROM ".$tbl." WHERE 1=1 ";

    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_num_rows($rs);

	

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
		    $rs = mysqli_query($GLOBALS['dblink'], $sql);
		
		    // offset 을 이용한 limit 가 적용된 갯수
		    $total = mysqli_num_rows($rs);
		    $list['list']['total'] = $total;
		    // 페이지 네비게이션 오프셋 지정.
		    
        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
		$list['list']['total'] = 0;
    }
    
    return $list;
}

function getManagerOffRs($scale=0, $offset=0){
	$list = array();

	$tbl = "tbl_manager_off";

	$tblmanager = "tbl_manager";

    $sql = "SELECT A.idx as idx, A.manager_idx as manager_idx, A.off_date as off_date, A.off_time as off_time, A.reason as reason, B.mngr_name AS manager_name, CASE A.off_time WHEN 'A' THEN '오전' WHEN 'P' THEN '오후' ELSE '종일' END AS off_time_title FROM ".$tbl." as A LEFT JOIN ".$tblmanager." AS B on A.manager_idx=B.idx WHERE 1=1 ";

	if($_REQUEST["start"] !=""){
		$sql .= " AND off_date >= '".$_REQUEST["start"]."' ";
	}
	if($_REQUEST["end"] !=""){
		$sql .= " AND off_date <= '".$_REQUEST["end"]."' ";
	}

    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_num_rows($rs);

	

	//echo $sql;

    if($total_rs > 0){
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
		    $rs = mysqli_query($GLOBALS['dblink'], $sql);
		
		    // offset 을 이용한 limit 가 적용된 갯수
		    $total = mysqli_num_rows($rs);
		    // 페이지 네비게이션 오프셋 지정.
        for($i=0; $i < $total; $i++){
            array_push($list,mysqli_fetch_assoc($rs));
        }
    }else{
		$list = false;
	}
    return $list;
}

function getManagerOffInfo($idx){
	$tbl = "tbl_manager_off";

    $sql = "SELECT * FROM ".$tbl." WHERE idx=".$idx." ";

    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_num_rows($rs);

    if($total_rs > 0){
        $list['total'] = $total_rs;
		$list['list'][0] = mysqli_fetch_assoc($rs);
    }else{
        $list['total'] = 0;
    }
    
    return $list;
}
// ----------------------------------------------------------------------------- 삽입 관련 내용 -----------------------------------------------------------------------------// ST
function insertManagerOffInfo(){
	$tbl = "tbl_manager_off";
	//이미지파일 처리

	$sql = "insert into ".$tbl." SET 
		manager_idx= '".$_POST['manager_idx']."',
		off_date= '".$_POST['off_date']."',
		off_time= '".$_POST['off_time']."',
		reason = '".$_POST['reason']."',
		reg_date = now(),
		reg_user_id = '".$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]."',
		reg_ip = '".$_SERVER["REMOTE_ADDR"]."'
	";


	$rsf = mysqli_query($GLOBALS['dblink'], $sql);
	
	$total = mysqli_affected_rows($GLOBALS['dblink']);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

// ----------------------------------------------------------------------------- 삽입 관련 내용 -----------------------------------------------------------------------------// ED

// ----------------------------------------------------------------------------- 수정 관련 내용 -----------------------------------------------------------------------------// ST

function updateManagerOffInfo($idx){
	$tbl = "tbl_manager_off";
	//이미지파일 처리

	$sql = "UPDATE ".$tbl." SET ";
	if($_POST['manager_idx'] != ""){
		$sql .= " manager_idx= '".$_POST['manager_idx']."',";
	}
	if($_POST['off_date'] != ""){
		$sql .= " off_date= '".$_POST['off_date']."',";
	}
	$sql .= " off_time = '".$_POST['off_time']."',";
	if($_POST['reason'] != ""){
		$sql .= " reason = '".$_POST['reason']."',";
	}
	$sql .= " upt_date = now(),
		 upt_user_id = '".$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]."',
		 upt_ip = '".$_SERVER["REMOTE_ADDR"]."'
		 WHERE idx = ".$idx."
	";
	$rsf = mysqli_query($GLOBALS['dblink'], $sql);

	if($rsf){
		return true;
	}else{
		return false;
	}
}

// ----------------------------------------------------------------------------- 수정 관련 내용 -----------------------------------------------------------------------------// ED

// ----------------------------------------------------------------------------- 삭제 관련 내용 -----------------------------------------------------------------------------// ST
function deleteManagerOffInfo($idx){
	$tbl = "tbl_manager_off";

	//이미지파일 처리
	$arrInfo = getArticleInfo($tbl, $idx);

	$sql = "DELETE FROM ".$tbl." WHERE idx = '$idx' ";
	$rsf = mysqli_query($GLOBALS['dblink'], $sql);

	$total = mysqli_affected_rows($GLOBALS['dblink']);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

// ----------------------------------------------------------------------------- 삭제 관련 내용 -----------------------------------------------------------------------------// ED
?>