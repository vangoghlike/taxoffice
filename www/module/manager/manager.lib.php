<?
/*********************************** 관리자 정보 *************************************/
//----------------------------------------------------------------- 세무사 관리 --------------------------------------------------------------------------//ST
//매니저 목록
function getManagerListBase($scale=0, $offset=0,$addWhere="",$schWhere="",$rejectNo=""){

	//게시판 테이블 지정
	$tblid = "tbl_manager";
	$que_where = "";
	$_this_days = date('D');
	$_this_day_num = 0;

    if ( $addWhere == 'mngrtype_mngr' || $addWhere == 'mngrtype_normal' ) {
        if ( $addWhere == 'mngrtype_mngr' ) {
            $addWhere = " AND `mngr_type` <> '직원' ";
        } else {
            $addWhere = " AND `mngr_type` = '직원' ";
        }
    }
    $_memgroup_p_val = $schWhere['mngr_position'];
    if ($schWhere) {
        foreach ( $schWhere as $key => $value ) {
            if ( $key != 'order' ) {
                if ( $key == 'mngr_position' && $value == 'NOT 선임' ) {
                    $addWhere = $addWhere . " AND `{$key}` NOT LIKE '%선임%' ";
                } else {
                    if ( $key == 'mngr_team' && $value == 'NOT 관리팀' ) {
                        $addWhere = $addWhere . " AND `{$key}` NOT LIKE '%관리팀%' ";
                    } else {
                        $addWhere = $addWhere . " AND `{$key}` = '{$value}' ";
                    }
                }
            } else {
                $_sch_order = $value;
            }
        }
    }

	switch ( $_this_days ) {
		case 'Mon':
			$_this_day_num = 1;
			break;
		case 'Tue':
			$_this_day_num = 2;
			break;
		case 'Wed':
			$_this_day_num = 3;
			break;
		case 'Thu':
			$_this_day_num = 4;
			break;
		case 'Fri':
			$_this_day_num = 5;
			break;
		case 'Sat':
			$_this_day_num = 6;
			break;
		case 'Sun':
			$_this_day_num = 7;
			break;
		default :
			break;
	}

	$que_where .= " and type_code='1' ";



	//카운트
	$sql = "select count(idx) from $tblid WHERE 1=1 $q_limit $que_where $addWhere ";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $row = mysqli_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT *, MOD(idx,'".$_this_day_num."') AS mod_idx ";
    $sql .= "FROM $tblid ";
	$sql .= "WHERE 1=1 $q_limit $que_where $addWhere ";

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
				$sql .= " order by mod_idx, mngr_level asc limit $offset,$scale ";
			}else{
                if ( $_memgroup_p_val == 'NOT 선임') {
                    $sql .= " order by counsel_level asc, {$_sch_order}, mod_idx, mngr_level asc";
                } else {
                    // 상담, 신고의뢰 idx 1번 (대표세무사님) 최상단 고정, field(idx,1) desc
                    $sql .= " order by field(idx,1) desc, counsel_level asc, mod_idx, mngr_level asc";
                    if ( $_sch_order ) {
                        $sql .= ', ' . $_sch_order;
                    }
                }
			}

		    $rs = mysqli_query($GLOBALS['dblink'], $sql);
		//echo $sql;
		    // offset 을 이용한 limit 가 적용된 갯수
		    $total = mysqli_num_rows($rs);
		    $list['list']['total'] = $total;
		    // 페이지 네비게이션 오프셋 지정.

        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }
    return $list;
}

function getManagerListBaseGroup($scale=0, $offset=0,$addWhere="",$schWhere=""){
    //게시판 테이블 지정
    $tblid = "tbl_manager";
    $que_where = "";
    $_this_days = date('D');
    $_this_day_num = 0;

    if ( $addWhere == 'mngrtype_mngr' || $addWhere == 'mngrtype_normal' ) {
        if ( $addWhere == 'mngrtype_mngr' ) {
            $addWhere = " AND `mngr_type` <> '직원' ";
        } else {
            $addWhere = " AND `mngr_type` = '직원' ";
        }
    }
    $_memgroup_p_val = $schWhere['mngr_position'];
    if ($schWhere) {
        foreach ( $schWhere as $key => $value ) {
            if ( $key != 'order' ) {
                if ( $key == 'mngr_position' && $value == 'NOT 선임' ) {
                    $addWhere = $addWhere . " AND `{$key}` NOT LIKE '%선임%' ";
                } else {
                    if ( $key == 'mngr_team' && $value == 'NOT 관리팀' ) {
                        $addWhere = $addWhere . " AND `{$key}` NOT LIKE '%관리팀%' ";
                    } else {
                        $addWhere = $addWhere . " AND `{$key}` = '{$value}' ";
                    }
                }
            } else {
                $_sch_order = $value;
            }
        }
    }

    switch ( $_this_days ) {
        case 'Mon':
            $_this_day_num = 1;
            break;
        case 'Tue':
            $_this_day_num = 2;
            break;
        case 'Wed':
            $_this_day_num = 3;
            break;
        case 'Thu':
            $_this_day_num = 4;
            break;
        case 'Fri':
            $_this_day_num = 5;
            break;
        case 'Sat':
            $_this_day_num = 6;
            break;
        case 'Sun':
            $_this_day_num = 7;
            break;
        default :
            break;
    }

    $que_where .= " and type_code='1' ";
    //카운트
    $sql = "select count(idx) from $tblid WHERE 1=1 $q_limit $que_where $addWhere ";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $row = mysqli_fetch_row($rs);
    $total_rs = $row[0];

    //목록
    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
    $sql .= "WHERE 1=1 $q_limit $que_where $addWhere ";

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
            $sql .= " order by mngr_level asc limit $offset,$scale ";
        }else{
            if ( $_memgroup_p_val == 'NOT 선임') {
                $sql .= " order by counsel_level asc, {$_sch_order}, mngr_level asc";
            } else {
                $sql .= " order by counsel_level asc, mngr_level asc";
                if ( $_sch_order ) {
                    $sql .= ', ' . $_sch_order;
                }
            }
        }

        $rs = mysqli_query($GLOBALS['dblink'], $sql);
        //echo $sql;
        // offset 을 이용한 limit 가 적용된 갯수
        $total = mysqli_num_rows($rs);
        $list['list']['total'] = $total;
        // 페이지 네비게이션 오프셋 지정.

        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }
    return $list;
}
function getManagerListBaseMG($scale=0, $offset=0,$addWhere="",$schWhere=""){
    //게시판 테이블 지정
    $tblid = "tbl_manager";
    $que_where = "";

    if ( $addWhere == 'mngrtype_mngr' || $addWhere == 'mngrtype_normal' ) {
        if ( $addWhere == 'mngrtype_mngr' ) {
            $addWhere = " AND `mngr_type` <> '직원' ";
        } else {
            $addWhere = " AND `mngr_type` = '직원' ";
        }
    }

    if ($schWhere) {
        foreach ( $schWhere as $key => $value ) {
            if ( $key != 'order' ) {
                if ( $key == 'mngr_position' && $value == 'NOT 선임' ) {
                    $addWhere = $addWhere . " AND `{$key}` NOT LIKE '%선임%' ";
                } else {
                    $addWhere = $addWhere . " AND `{$key}` = '{$value}' ";
                }
            } else {
                $_sch_order = $value;
            }
        }
    }

    $que_where .= " and type_code='1' ";
    //카운트
    $sql = "select count(idx) from $tblid WHERE 1=1 $q_limit $que_where $addWhere ";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $row = mysqli_fetch_row($rs);
    $total_rs = $row[0];

    //목록
    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
    $sql .= "WHERE 1=1 $q_limit $que_where $addWhere ";

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
            $sql .= " order by mngr_level desc limit $offset,$scale ";
        }else{
            $sql .= " order by mngr_level desc ";
            if ( $_sch_order ) {
                $sql .= ', ' . $_sch_order;

            }
        }

        $rs = mysqli_query($GLOBALS['dblink'], $sql);
        //echo $sql;
        // offset 을 이용한 limit 가 적용된 갯수
        $total = mysqli_num_rows($rs);
        $list['list']['total'] = $total;
        // 페이지 네비게이션 오프셋 지정.

        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }
    return $list;
}

function getManagerCategoryList($consult_idx){
	//게시판 테이블 지정
	$tblid = "tbl_consult_category";
	$que_where = "";
	if($consult_idx != ""){
		$que_where = " AND consult_idx = ".$consult_idx;
	}
	
	//카운트
	$sql = "select count(idx) from $tblid WHERE 1=1 $q_limit $que_where ";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $row = mysqli_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
	$sql .= "WHERE 1=1 $q_limit $que_where  ";

	if($total_rs > 0){
        $list['total'] = $total_rs;
        // 페이지 네비게이션 오프셋 지정.
		$sql .= " order by idx ";

		//echo $sql;

		$rs = mysqli_query($GLOBALS['dblink'], $sql);
		//echo $sql;
		// offset 을 이용한 limit 가 적용된 갯수
		$total = mysqli_num_rows($rs);
		$list['list']['total'] = $total;
		// 페이지 네비게이션 오프셋 지정.

        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);
			$list['idx'][$list['list'][$i]["idx"]] = $list['list'][$i]["category_name"];
        }
    }else{
        $list['total'] = 0;
    }
    return $list;
}
function insertManagerArticle(){

	$tblid = "tbl_manager";

	//$idx = postNullCheck('idx');
    $mngr_type = postNullCheck('mngr_type');
	$mngr_name = postNullCheck('mngr_name');
	$gender = postNullCheck('gender');
	$mngr_position = postNullCheck('mngr_position');

    $mngr_headquarters = postNullCheck('mngr_headquarters');
    $mngr_team = postNullCheck('mngr_team');

	$user_id = postNullCheck('user_id');
	$goods_category_idno = postNullCheck('goods_category_idno');
	$phone = postNullCheck('phone');
	$tel = postNullCheck('tel');
	$fax = postNullCheck('fax');
	$cs_zoom_url = postNullCheck('cs_zoom_url');
	$cs_zoom_id = postNullCheck('cs_zoom_id');
	$cs_zoom_pw = postNullCheck('cs_zoom_pw');
	$cs_zoom_use = postNullCheck('cs_zoom_use');
	$email = postNullCheck('email');
	$current_position = postNullCheck('current_position');
	$info1 = postNullCheck('info1');
	$info2 = postNullCheck('info2');
	$info3 = postNullCheck('info3');
	$info4 = postNullCheck('info4');
	$info5 = postNullCheck('info5');
	$info6 = postNullCheck('info6');
	$info7 = postNullCheck('info7');

    $eng_mngr_name = postNullCheck('eng_mngr_name');
    $eng_mngr_position = postNullCheck('eng_mngr_position');
    $eng_current_position = postNullCheck('eng_current_position');
    $eng_info1 = postNullCheck('eng_info1');
    $eng_info2 = postNullCheck('eng_info2');
    $eng_info3 = postNullCheck('eng_info3');
    $eng_info4 = postNullCheck('eng_info4');
    $eng_info5 = postNullCheck('eng_info5');
    $eng_info6 = postNullCheck('eng_info6');
    $eng_info7 = postNullCheck('eng_info7');

    $face_size = postNullCheck('face_size');

	$category_cont = "";
	for($i=1;$i<3;$i++){
		for($j=0;$j<count($goods_category_idno[$i]);$j++){
			$category_cont .= "^".$i.":".$goods_category_idno[$i][$j];
		}
	}
	$tel_cont = $tel[0]."-".$tel[1]."-".$tel[2];
	$phone_cont = $phone[0]."-".$phone[1]."-".$phone[2];
	$fax_cont = $fax[0]."-".$fax[1]."-".$fax[2];
	$email_cont = $email[0]."@".$email[1];
	
	$sql = "INSERT INTO ".$tblid." set
		type_code='1',
		gender='".$gender."',
		mngr_type='".$mngr_type."',
		mngr_name='".$mngr_name."',
		mngr_position='".$mngr_position."',
		eng_mngr_name='".$eng_mngr_name."',
		eng_mngr_position='".$eng_mngr_position."',
		mngr_headquarters='".$mngr_headquarters."',
		mngr_team='".$mngr_team."',
		user_id='".$user_id."',
		goods_category='".$category_cont."',
		tel='".$tel_cont."',
		phone='".$phone_cont."',
		fax='".$fax_cont."',
		cs_zoom_url='".$cs_zoom_url."',
		cs_zoom_id='".$cs_zoom_id."',
		cs_zoom_pw='".$cs_zoom_pw."',
		cs_zoom_use='".$cs_zoom_use."',
		email='".$email_cont."',
		current_position='".$current_position."',
		info1='".$info1."',
		info2='".$info2."',
		info3='".$info3."',
		info4='".$info4."',
		info5='".$info5."',
		info6='".$info6."',
		info7='".$info7."',
		eng_current_position='".$eng_current_position."',
		eng_info1='".$eng_info1."',
		eng_info2='".$eng_info2."',
		eng_info3='".$eng_info3."',
		eng_info4='".$eng_info4."',
		eng_info5='".$eng_info5."',
		eng_info6='".$eng_info6."',
		eng_info7='".$eng_info7."',
		face_size='".$face_size."',
		reg_date = now(),
		reg_user_id = '".$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]."',
		reg_ip = '".$_SERVER['REMOTE_ADDR']."'";

	//echo $sql;
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$insert_idx = mysqli_insert_id($GLOBALS['dblink']);
	$total = mysqli_affected_rows($GLOBALS['dblink']);

	//파일처리
	inputManagerFiles($insert_idx);
	

	if($total > 0){
		return true;
	}else{
		return false;
	}

}

function modifyManagerArticle($idx){
	$tblid = "tbl_manager";

	//$idx = postNullCheck('idx');
	$mngr_type = postNullCheck('mngr_type');
	$mngr_name = postNullCheck('mngr_name');
    $gender = postNullCheck('gender');
	$mngr_position = postNullCheck('mngr_position');
    $mngr_headquarters = postNullCheck('mngr_headquarters');
    $mngr_team = postNullCheck('mngr_team');
	$user_id = postNullCheck('user_id');
	$goods_category_idno = postNullCheck('goods_category_idno');
	$phone = postNullCheck('phone');
	$tel = postNullCheck('tel');
	$fax = postNullCheck('fax');
	$cs_zoom_url = postNullCheck('cs_zoom_url');
	$cs_zoom_id = postNullCheck('cs_zoom_id');
	$cs_zoom_pw = postNullCheck('cs_zoom_pw');
	$cs_zoom_use = postNullCheck('cs_zoom_use');
	$email = postNullCheck('email');
	$current_position = postNullCheck('current_position');
	$info1 = postNullCheck('info1');
	$info2 = postNullCheck('info2');
	$info3 = postNullCheck('info3');
	$info4 = postNullCheck('info4');
	$info5 = postNullCheck('info5');
	$info6 = postNullCheck('info6');
	$info7 = postNullCheck('info7');

    $eng_mngr_name = postNullCheck('eng_mngr_name');
    $eng_mngr_position = postNullCheck('eng_mngr_position');
    $eng_current_position = postNullCheck('eng_current_position');
    $eng_info1 = postNullCheck('eng_info1');
    $eng_info2 = postNullCheck('eng_info2');
    $eng_info3 = postNullCheck('eng_info3');
    $eng_info4 = postNullCheck('eng_info4');
    $eng_info5 = postNullCheck('eng_info5');
    $eng_info6 = postNullCheck('eng_info6');
    $eng_info7 = postNullCheck('eng_info7');

    $face_size = postNullCheck('face_size');

	$category_cont = "";
	for($i=1;$i<3;$i++){
		for($j=0;$j<count($goods_category_idno[$i]);$j++){
			$category_cont .= "^".$i.":".$goods_category_idno[$i][$j];
		}
	}
	$phone_cont = $phone[0]."-".$phone[1]."-".$phone[2];
	$fax_cont = $fax[0]."-".$fax[1]."-".$fax[2];
	$email_cont = $email[0]."@".$email[1];

	$sql = "UPDATE ".$tblid." set
	        gender='".$gender."',
			mngr_type='".$mngr_type."',
			mngr_name='".$mngr_name."',
			mngr_position='".$mngr_position."',
			eng_mngr_name='".$eng_mngr_name."',
		    eng_mngr_position='".$eng_mngr_position."',
		    mngr_headquarters='".$mngr_headquarters."',
		    mngr_team='".$mngr_team."',
			user_id='".$user_id."',
			goods_category='".$category_cont."',
			phone='".$phone_cont."',
			fax='".$fax_cont."',
			cs_zoom_url='".$cs_zoom_url."',
			cs_zoom_id='".$cs_zoom_id."',
			cs_zoom_pw='".$cs_zoom_pw."',
			cs_zoom_use='".$cs_zoom_use."',
			email='".$email_cont."',
			current_position='".$current_position."',
			info1='".$info1."',
			info2='".$info2."',
			info3='".$info3."',
			info4='".$info4."',
			info5='".$info5."',
			info6='".$info6."',
			info7='".$info7."',
			eng_current_position='".$eng_current_position."',
			eng_info1='".$eng_info1."',
            eng_info2='".$eng_info2."',
            eng_info3='".$eng_info3."',
            eng_info4='".$eng_info4."',
            eng_info5='".$eng_info5."',
            eng_info6='".$eng_info6."',
            eng_info7='".$eng_info7."',
            face_size='".$face_size."',
			upt_date = now(),
			upt_user_id = '".$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]."',
			upt_ip = '".$_SERVER['REMOTE_ADDR']."'
			WHERE idx='".$idx."'";

	//echo $sql;


	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_affected_rows($GLOBALS['dblink']);

	inputManagerFiles($idx);

	if($rs){
		return true;
	}else{
		return false;
	}
}

//----------------------------------------------------------------- 세무사 관리 --------------------------------------------------------------------------//ED
//----------------------------------------------------------------- 지점 관리 --------------------------------------------------------------------------//ST
//매니저 목록
function getSectionManagerList($sw="", $sk="", $scale, $offset=0){
	//게시판 테이블 지정
	$tblid = "tbl_manager";
	$que_where = "";
	$_this_days = date('D');
	$_this_day_num = 0;

	switch ( $_this_days ) {
		case 'Mon':
			$_this_day_num = 1;
			break;
		case 'Tue':
			$_this_day_num = 2;
			break;
		case 'Wed':
			$_this_day_num = 3;
			break;
		case 'Thu':
			$_this_day_num = 4;
			break;
		case 'Fri':
			$_this_day_num = 5;
			break;
		case 'Sat':
			$_this_day_num = 6;
			break;
		case 'Sun':
			$_this_day_num = 7;
			break;
		default :
			break;
	}

	//검색키워드가 있을경우
	if($sk !=""){
		switch($sw){
		case("n") :
			$que_where = "and name like '%$sk%'";
		break;
		case("s") :
			$que_where = "and subject like '%$sk%'";
		break;
		case("e1") :
			$que_where = "and etc_1 = '$sk'";
		break;
		case("e2") :
			$que_where = "and etc_2 = '$sk'";
		break;
		case("e3") :
			$que_where = "and etc_3 like '%$sk%'";
		break;
		case("e4") :
			$que_where = "and etc_4 = '$sk'";
		break;
		case("c") :
			$que_where = "and contents like '%$sk%'";
		break;
		case("u_id") :
			$que_where = "and w_user = '$sk'";
		break;
		case("a") :
		default :
			$que_where = "and (name like '%$sk%' or subject like '%$sk%' or contents like '%$sk%' or w_user like '%$sk%' or etc_3 like '%$sk%')";
		}

		// 검색시 영역을 분할하여 검색=> 속도향상용
		$sql = "select count(idx) as cnt from $tblid ";
		$rs = mysqli_query($GLOBALS['dblink'], $sql);

		$row = mysqli_fetch_assoc($rs);
		$q_total = $row[cnt];
		$q_start = $q_total - 10000; // 최근 10000건만 검색

		if($q_total>10000){
			$q_limit = " idx between " . $q_start . " and " . $q_total . " ";
		}
		// 검색시 영역을 분할하여 검색=> 속도향상용
	}
	$que_where .= " and type_code='2' ";
	//카운트
	$sql = "select count(idx) from $tblid WHERE 1=1 $q_limit $que_where ";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $row = mysqli_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT *, MOD(idx,'".$_this_day_num."') AS mod_idx ";
    $sql .= "FROM $tblid ";
	$sql .= "WHERE 1=1 $q_limit $que_where  ";

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
				$sql .= " order by mngr_level desc, mod_idx limit $offset,$scale ";
			}else{
				$sql .= " order by mngr_level desc, mod_idx ";
			}

			//echo $sql;

		    $rs = mysqli_query($GLOBALS['dblink'], $sql);
		//echo $sql;
		    // offset 을 이용한 limit 가 적용된 갯수
		    $total = mysqli_num_rows($rs);
		    $list['list']['total'] = $total;
		    // 페이지 네비게이션 오프셋 지정.

        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }
    return $list;
}

function insertSectionManagerArticle(){

	$tblid = "tbl_manager";

	//$idx = postNullCheck('idx');
	$mngr_name = postNullCheck('mngr_name');
	$bran_name = postNullCheck('bran_name');
	$goods_category_idno = postNullCheck('goods_category_idno');
	$phone = postNullCheck('phone');
	$tel = postNullCheck('tel');
	$fax = postNullCheck('fax');
	$cs_zoom_url = postNullCheck('cs_zoom_url');
	$cs_zoom_id = postNullCheck('cs_zoom_id');
	$cs_zoom_pw = postNullCheck('cs_zoom_pw');
	$cs_zoom_use = postNullCheck('cs_zoom_use');
	$email = postNullCheck('email');
	$current_position = postNullCheck('current_position');
	$info1 = postNullCheck('info1');
	$info2 = postNullCheck('info2');
	$info3 = postNullCheck('info3');
	$info4 = postNullCheck('info4');
	$info5 = postNullCheck('info5');
	$info6 = postNullCheck('info6');
	$info7 = postNullCheck('info7');

	$phone_cont = $phone[0]."-".$phone[1]."-".$phone[2];
	$fax_cont = $fax[0]."-".$fax[1]."-".$fax[2];
	$email_cont = $email[0]."@".$email[1];
	
	$sql = "INSERT INTO ".$tblid." set
		type_code='2',
		mngr_name='".$mngr_name."',
		user_id='',
		bran_name='".$bran_name."',
		phone='".$phone_cont."',
		fax='".$fax_cont."',
		cs_zoom_url='".$cs_zoom_url."',
		cs_zoom_id='".$cs_zoom_id."',
		cs_zoom_pw='".$cs_zoom_pw."',
		cs_zoom_use='".$cs_zoom_use."',
		email='".$email_cont."',
		current_position='".$current_position."',
		info1='".$info1."',
		info2='".$info2."',
		info3='".$info3."',
		info4='".$info4."',
		info5='".$info5."',
		info6='".$info6."',
		info7='".$info7."',
		reg_date = now(),
		reg_user_id = '".$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]."',
		reg_ip = '".$_SERVER['REMOTE_ADDR']."'";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$insert_idx = mysqli_insert_id($GLOBALS['dblink']);
	$total = mysqli_affected_rows($GLOBALS['dblink']);

	//파일처리
	inputManagerFiles($insert_idx);
	

	if($total > 0){
		return true;
	}else{
		return false;
	}

}

function selectedManagerIdx($idx) {
    $tblid = "tbl_manager";

    $sql = "select * from $tblid WHERE 1=1 AND `idx` = {$idx} ";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $row = mysqli_fetch_assoc($rs);
    if ( $row ) {
        return $row;
    } else {
        return false;
    }

}


function modifySectionManagerArticle($idx){
	$tblid = "tbl_manager";

	//$idx = postNullCheck('idx');
	$mngr_name = postNullCheck('mngr_name');
	$bran_name = postNullCheck('bran_name');
	$goods_category_idno = postNullCheck('goods_category_idno');
	$phone = postNullCheck('phone');
	$tel = postNullCheck('tel');
	$fax = postNullCheck('fax');
	$cs_zoom_url = postNullCheck('cs_zoom_url');
	$cs_zoom_id = postNullCheck('cs_zoom_id');
	$cs_zoom_pw = postNullCheck('cs_zoom_pw');
	$cs_zoom_use = postNullCheck('cs_zoom_use');
	$email = postNullCheck('email');
	$current_position = postNullCheck('current_position');
	$info1 = postNullCheck('info1');
	$info2 = postNullCheck('info2');
	$info3 = postNullCheck('info3');
	$info4 = postNullCheck('info4');
	$info5 = postNullCheck('info5');
	$info6 = postNullCheck('info6');
	$info7 = postNullCheck('info7');

	$phone_cont = $phone[0]."-".$phone[1]."-".$phone[2];
	$fax_cont = $fax[0]."-".$fax[1]."-".$fax[2];
	$email_cont = $email[0]."@".$email[1];

	$sql = "UPDATE ".$tblid." set
			mngr_name='".$mngr_name."',
			bran_name='".$bran_name."',
			goods_category='".$category_cont."',
			phone='".$phone_cont."',
			fax='".$fax_cont."',
			cs_zoom_url='".$cs_zoom_url."',
			cs_zoom_id='".$cs_zoom_id."',
			cs_zoom_pw='".$cs_zoom_pw."',
			cs_zoom_use='".$cs_zoom_use."',
			email='".$email_cont."',
			current_position='".$current_position."',
			info1='".$info1."',
			info2='".$info2."',
			info3='".$info3."',
			info4='".$info4."',
			info5='".$info5."',
			info6='".$info6."',
			info7='".$info7."',
			upt_date = now(),
			upt_user_id = '".$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]."',
			upt_ip = '".$_SERVER['REMOTE_ADDR']."'
			WHERE idx='".$idx."'";

	//echo $sql;


	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_affected_rows($GLOBALS['dblink']);

	inputManagerFiles($idx);

	if($rs){
		return true;
	}else{
		return false;
	}
}
//----------------------------------------------------------------- 지점 관리 --------------------------------------------------------------------------//ED

function inputManagerFiles($idx){
	$tblid = "tbl_manager";
	for($i=0;$i<count($_FILES['upfiles']['error']);$i++){
		if ($_FILES['upfiles']['error'] == 0){
		    //확장자 검사후 파일이름 생성
			$filename = $_FILES['upfiles']['name'];
		    $attach_ext = explode(".",$filename);
		    $extension = $attach_ext[sizeof($attach_ext)-1];
		    $extension = strtolower($extension);
		    $filerename = $memo."_".md5(mktime()) . $i . "." . $extension;
	  		$filesize = $_FILES['upfiles']['size'];
	  		$filetype = $_FILES['upfiles']['type'];

		    // 파일 확장자 검사
		    if(!strcmp($extension,"htm") ||!strcmp($extension,"html") ||!strcmp($extension,"phtml") ||!strcmp($extension,"php") ||!strcmp($extension,"php3") ||!strcmp($extension,"php4") ||!strcmp($extension,"inc") ||!strcmp($extension,"pl") ||!strcmp($extension,"cgi")){
				jsMsg("not allowed file extension");
		        jsHistory("-1");
		    }

			if (is_uploaded_file($_FILES['upfiles']['tmp_name'])) {
				$result = move_uploaded_file ($_FILES['upfiles']['tmp_name'], $GLOBALS["_SITE"]["UPLOADED_DATA"]."/mngr/".$filerename);
				//썸네일 만들기
				//if($filetype=="image/pjpeg" || $filetype=="image/x-png" || $filetype=="image/jpeg" || $filetype=="image/png" || $filetype=="image/gif"){
				//	@MakeThum($GLOBALS["_SITE"]["BOARD_DATA"] . "/".$boardid."/".$filerename, $GLOBALS["_SITE"]["BOARD_DATA"] . "/".$boardid."/t_".$filerename, $thumwidth);
				//}
			}
			

			$sql = "UPDATE ".$tblid." set
				file_name='".$filerename."'
				where idx=".$idx."
			";
			$rsf = mysqli_query($GLOBALS['dblink'], $sql);
		}
	}
}

function deleteManager($idx){
	$tblid = "tbl_manager";
	if($idx != ""){
		$sql = "DELETE FROM ".$tblid." WHERE idx = '".$idx."' ";
		$rsf = mysqli_query($GLOBALS['dblink'], $sql);

		$total = mysqli_affected_rows($GLOBALS['dblink']);

		if($total > 0){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}
?>