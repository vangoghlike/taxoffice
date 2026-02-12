<?
/*********************************** 게시판 관리 *************************************/

//게시판 디비 만들기
function makeBoard($boardid){
	// 테이블 중복검사(게시판용 테이블이 아닌 일반용에서)
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	## $Table_exist = mysql_list_tables($GLOBALS["_conf_db"]["main_db"]["db"]); ## PHP 7 사용불가
	$sql = "SHOW TABLES like '".$tblid."'";
	//echo $sql;
	$Table_exist = mysqli_query($GLOBALS['dblink'], $sql);

	if (!$Table_exist) {
		jsMsg("테이블 선택 실패");
		//jsHistory("-1") ;
	}
	$Table_Num = mysqli_num_rows($Table_exist);

	if($Table_Num>0){
		jsMsg("이미 사용중인 테이블 입니다.");
		jsHistory("-1") ;
		exit();
	}
	/*
	for ($i=0;$i<$Table_Num;$i++) {
		for ($j=0;$j<$Table_Etc;$j++) {
			$Table_Name = mysqli_result($Table_exist,$i,$j);
			if ($tblid==$Table_Name) {
				jsMsg("이미 사용중인 테이블 입니다.");
				jsHistory("-1") ;
			}
		}
	}
	*/

	//게시판 정보 테이블에 입력
	$sql = "INSERT INTO ".$GLOBALS["_conf_tbl"]["board_info"]." set
		category='',
		boardid='$boardid',
		wdate=now()
	";

	//echo $sql."<br>";

    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total = mysqli_affected_rows($GLOBALS['dblink']);
	//echo $total;
	if($total > 0){
		//게시판 테이블 생성
		$sql = "CREATE TABLE $tblid (
			idx int(10) unsigned NOT NULL auto_increment COMMENT '일련번호',
			sidx int(10) unsigned DEFAULT 0 COMMENT '통합검색 일련번호',
			no tinyint(1) unsigned DEFAULT '1' NOT NULL COMMENT '정렬용 번호',
			main int(10) unsigned DEFAULT '99999999' NOT NULL COMMENT '원글번호',
			sub int(10) unsigned DEFAULT '0' NOT NULL COMMENT '답글위치',
			depth tinyint(3) unsigned DEFAULT '0' NOT NULL COMMENT '답글깊이',
			w_user varchar(200) COMMENT '글쓴사람',
			r_user varchar(200) COMMENT '답글쓴사람',
			name varchar(20) COMMENT '작성자명',
			pass varchar(20) COMMENT '비밀번호',
			homepage varchar(100) COMMENT '홈페이지',
			email varchar(100) COMMENT '이메일',
			subject varchar(255) COMMENT '제목',
			contents mediumtext COMMENT '내용',
			usereplyemail enum('Y','N') NOT NULL default 'N' COMMENT '답변시 메일받음',
			usehtml enum('Y','N') NOT NULL default 'N' COMMENT 'HTML 사용',
			category varchar(50) COMMENT '게시판 카테고리',
			uselock enum('Y','N') NOT NULL default 'N' COMMENT '글잠금',
			hit int(10) COMMENT '조회수',
			etc_1 varchar(255) COMMENT '여분필드1',
			etc_2 varchar(255) COMMENT '여분필드2',
			etc_3 varchar(255) COMMENT '여분필드3',
			etc_4 varchar(255) COMMENT '여분필드4',
			etc_5 TEXT COMMENT '여분필드5',
			ip varchar(24) COMMENT 'IP주소',
			schedule_date DATE NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
			wdate DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
			upt_date DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
			upt_user_id varchar(200) COMMENT '수정 아이디',
			upt_ip varchar(20) COMMENT '수정한 아이피',
			etc_yn ENUM('Y','N') DEFAULT 'N' NULL COMMENT '수정한 아이피',
			PRIMARY KEY (idx),
			KEY no (no, main, sub),
			KEY s_date (schedule_date)
		)";
		//echo $sql."<br>";
		$rs = mysqli_query($GLOBALS['dblink'], $sql);

		if($rs){
			return true;
		}else{

			//위에서 입력한 게시판 정보 삭제
			$sql = "delete from ".$GLOBALS["_conf_tbl"]["board_info"]." where boardid='$boardid' ";
			mysqli_query($GLOBALS['dblink'], $sql);
			return false;
		}
	}else{
		jsMsg("게시판 정보 테이블 입력실패");
		return false;
	}
}

function editBoard($arrData){
	//게시판 데이터 수정
	$sql = "UPDATE ".$GLOBALS["_conf_tbl"]["board_info"]." SET
		boardname='".$arrData['f_boardname']."',
		skin='".$arrData['f_skin']."',
		scale='".$arrData['f_scale']."',
		pagescale='".$arrData['f_pagescale']."',
		widthscale='".$arrData['f_widthscale']."',
		thumwidth='".$arrData['f_thumwidth']."',
		newmark='".$arrData['f_newmark']."',
		besthit='".$arrData['f_besthit']."',
		subjectcut='".$arrData['f_subjectcut']."',
		useadminonly='".$arrData['f_useadminonly']."',
		useintranet='".$arrData['f_intranet']."',
		usepds='".$arrData['f_usepds']."',
		usereply='".$arrData['f_usereply']."',
		usememo='".$arrData['f_usememo']."',
		uselock='".$arrData['f_uselock']."',
		readlevel='".$arrData['f_readlevel']."',
		writelevel='".$arrData['f_writelevel']."',
		replylevel='".$arrData['f_replylevel']."',
		listlevel='".$arrData['f_listlevel']."',
		category='".str_replace(" ","",$arrData['f_category'])."',
		header='".$arrData['f_header']."',
		footer='".$arrData['f_footer']."'
		WHERE idx='".$arrData['idx']."'
	";

	// echo $sql;
	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	}else{
		return false;
	}
}

function deleteBoard($idx){
	//게시판 정보 가져오기
	$arrInfo = getArticleInfo($GLOBALS["_conf_tbl"]["board_info"], $idx);

	if($arrInfo["total"] > 0){
		$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $arrInfo["list"][0]["boardid"];

		//게시판 정보 삭제
		$sql = "DELETE FROM ".$GLOBALS["_conf_tbl"]["board_info"]." WHERE idx='".$idx."'	";
		//echo $sql;
		$rs1 = mysqli_query($GLOBALS['dblink'], $sql);

		//게시판 테이블 삭제
		$sql = "DROP TABLE ".$tblid;
		$rs2 = mysqli_query($GLOBALS['dblink'], $sql);

		//파일 테이블 정보 삭제
		$sql = "DELETE FROM ".$GLOBALS["_conf_tbl"]["board_files"]." WHERE boardid='".$arrInfo["list"][0]["boardid"]."'	";
		$rs3 = mysqli_query($GLOBALS['dblink'], $sql);

		//댓글 삭제
		mysqli_query($GLOBALS['dblink'], "DELETE FROM ".$GLOBALS["_conf_tbl"]["comment"]." WHERE boardid='".$arrInfo["list"][0]["boardid"]."'");


		if($rs1 && $rs2 &&$rs3){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}
/*********************************** 게시판 관리 *************************************/

/*********************************** 게시물관련 *************************************/
//게시판 설정정보 가져오기
function getBoardInfo($tbl, $boardid){
    $sql  = "SELECT * ";
    $sql .= "FROM ".$GLOBALS["_conf_tbl"]["board_info"]." ";
    $sql .= "WHERE boardid = '$boardid' ";
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


//게시물 가져오기 - 파일 제외
function getBoardListBase($boardid, $category, $sw="", $sk="", $scale, $offset=0){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	//카테고리가 있을경우
	if($category !=""){
		$que_category = " and category='$category' ";
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
	//카운트
//	$sql = "select count(idx) from $tblid WHERE no='1' $q_limit $que_where $que_category ";
	$sql = "select count(idx) from $tblid WHERE 1=1 $q_limit $que_where $que_category ";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $row = mysqli_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
    //$sql .= "WHERE no='1' $q_limit $que_where $que_category ";
	$sql .= "WHERE 1=1 $q_limit $que_where $que_category ";

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

				if($boardid == "trmneon") {	# 진료대기
					if($scale > 0){
						$sql .= " order by idx limit $offset,$scale ";
					}else{
						$sql .= " order by idx ";
					}
				}else{
					//scale 0 으로 지정시에는 전체 가져옴
					if($scale > 0){
					 $sql .= " order by hit desc, no, main, sub limit $offset,$scale ";
					}else{
					  $sql .= " order by no, main, sub ";
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

//게시물 가져오기 - KTOA
function getBoardListOrder($boardid, $date){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	//목록
    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
	$sql .= "WHERE schedule_date = '$date' ";
    $sql .= " order by etc_1 asc ";
	//echo $sql;
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_num_rows($rs);
	$list['list']['total'] = $total;

	for($i=0; $i < $total; $i++){
		$list['list'][$i] = mysqli_fetch_assoc($rs);
	}

    return $list;
}

//게시물 가져오기 - KTOA
function getBoardListSchedule12($boardid, $s_date, $e_date){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	//목록
    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
	$sql .= "WHERE schedule_date >= '$s_date' AND  schedule_date <= '$e_date' ";
    $sql .= " order by no, main, sub ";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_num_rows($rs);
	$list['list']['total'] = $total;

	for($i=0; $i < $total; $i++){
		$row = mysqli_fetch_assoc($rs);
		$list['list'][$row['schedule_date']][] = $row;
	}

    return $list;
}

//게시물 가져오기 - 스케줄 형식
function getBoardListSchedule($boardid, $s_date, $e_date){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	//목록
    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
	$sql .= "WHERE schedule_date >= '$s_date' AND  schedule_date <= '$e_date' ";
    $sql .= " order by no, main, sub ";
	//echo $sql;
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_num_rows($rs);
	$list['list']['total'] = $total;

	for($i=0; $i < $total; $i++){
		$row = mysqli_fetch_assoc($rs);
		$list['list'][$row['schedule_date']][] = $row;
	}

    return $list;
}
//게시물 가져오기 - 스케줄 형식
function getBoardListScheduleCate2($boardid, $s_date, $e_date, $cate){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	//목록
    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
	$sql .= "WHERE schedule_date >= '$s_date' AND  schedule_date <= '$e_date' AND category = '$cate' ";
    $sql .= " order by no, main, sub ";
	//echo $sql;
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_num_rows($rs);
	$list['list']['total'] = $total;

	for($i=0; $i < $total; $i++){
		$row = mysqli_fetch_assoc($rs);
		$list['list'][$row[schedule_date]] = $row;
	}

    return $list;
}
//게시물 가져오기 - 스케줄 형식
function getBoardScheduleCnt($boardid, $s_date, $e_date, $subject, $idx){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	//목록
    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
	$sql .= "WHERE schedule_date >= '$s_date' AND  schedule_date <= '$e_date' AND subject = '$subject' ";
	if($idx){
		$sql .= " AND idx != $idx ";
	}
    $sql .= " order by no, main, sub ";
	//echo $sql;
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_num_rows($rs);
	$list['list']['total'] = $total;

	for($i=0; $i < $total; $i++){
		$row = mysqli_fetch_assoc($rs);
		$list['list'][$row[schedule_date]][] = $row;
	}

    return $list;
}
//수정하기 진행사항
function updateBoardEtc($boardid, $idx, $etc_1){
	// 테이블 지정
	$tbl = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	//댓글 테이블에 입력
	$sql = "UPDATE ".$tbl." set
		etc_1='".$etc_1."'
		Where idx='".$idx."'
	";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_affected_rows($GLOBALS['dblink']);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}
function getBoardListScheduleCate($boardid, $s_date, $e_date, $category){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	//목록
    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
	$sql .= "WHERE schedule_date >= '$s_date' AND  schedule_date <= '$e_date' AND category='$category' ";
    $sql .= " order by no, main, sub ";
	//echo $sql;
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_num_rows($rs);
	$list['list']['total'] = $total;

	for($i=0; $i < $total; $i++){
		$row = mysqli_fetch_assoc($rs);
		$list['list'][$row[schedule_date]][] = $row;
	}

    return $list;
}

//게시물 가져오기 - 파일 제외
function getBoardListBaseWuser($boardid, $category, $sw="", $sk="", $scale, $offset=0, $user_id){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	//카테고리가 있을경우
	if($category !=""){
		$que_category = " and category='$category' ";
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
		case("c") :
			$que_where = "and contents like '%$sk%'";
		break;
		case("a") :
		default :
			$que_where = "and (name like '%$sk%' or subject like '%$sk%' or contents like '%$sk%')";
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

	//카운트
//	$sql = "select count(idx) from $tblid WHERE no='1' $q_limit $que_where $que_category ";
	$sql = "select count(idx) from $tblid WHERE 1=1 $q_limit $que_where $que_category AND w_user='$user_id' ";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $row = mysqli_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
    //$sql .= "WHERE no='1' $q_limit $que_where $que_category ";
	$sql .= "WHERE 1=1 $q_limit $que_where $que_category AND w_user='$user_id' ";

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
			    $sql .= " order by no, main, sub limit $offset,$scale ";
				}else{
				  $sql .= " order by no, main, sub ";
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

// 한페이지 인덱스 가져오기
function getBoardHanpageIdx($boardid, $sw="", $sk=""){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;
	$que_where	= "";
	$que_category	= "";
	$que_etc	= "";

	//검색키워드가 있을경우
	if($sk !=""){
		switch($sw){
			case("wdate") :
			default :
				$que_where = "and `wdate` like '%$sk%'";
				break;
		}
	}

	//목록
	$sql  = " SELECT `idx` ";
	$sql .= " FROM $tblid ";
	$sql .= " WHERE 1=1 $que_where $que_category $que_etc";
	//echo $sql;
	//echo "//".$offset."//".$scale;
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$row = mysqli_fetch_array($rs);
	return $row['idx'];
}


//게시물 가져오기 - 파일 포함
function getBoardListBaseNFile($boardid, $category, $sw="", $sk="", $scale, $offset=0, $page="", $b_idx=""){
	//게시판 테이블 지정
	if ( $boardid == 'topic_business_all' || $boardid == 'topic_property_all' ) {
		$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . 'total';
	} else {
		$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;
	}

	$q_limit	= "";
	$que_where	= "";
	$que_category	= "";
	$que_etc	= "";


	//카테고리가 있을경우
	if ( $boardid == 'hanpage' || $boardid == 'eng_hanpage' ) {
		if ( $category != '' ) {
			$que_category = " and A.category='$category' ";
		} else {
			$que_category = " and A.category NOT IN ('질문함') ";
		}
	} else {
		if($category !=""){
			$que_category = " and A.category='$category' ";
		}
	}

	if(isset($_GET['etc_1'])){
		$que_etc .= " and A.etc_1='".$_GET['etc_1']."' ";
	}
	if(isset($_GET['etc_2'])){
		$que_etc .= " and A.etc_2='".$_GET['etc_2']."' ";
	}
	if(isset($_GET['etc_3'])){
		$que_etc .= " and A.etc_3='".$_GET['etc_3']."' ";
	}

	if( $boardid=="ktoabiz" ){
		//날짜검색 추가
		switch($_GET['date_point']){
		case("s") :
			if(isset($_GET['s_date'])){
				if($_GET['s_date']){
					$sDate = $_GET['s_date'];
					$que_etc .= " and A.etc_14 >= '".$sDate."'  ";
				}
			}
			if(isset($_GET['e_date'])){
				if($_GET['e_date']){
					$eDate = $_GET['e_date'];
					$que_etc .= " and A.etc_14 <= '".$eDate."'  ";
				}
			}
		break;
		case("e") :
			if(isset($_GET['s_date'])){
				if($_GET['s_date']){
					$sDate = $_GET['s_date'];
					$que_etc .= " and A.etc_15 >= '".$sDate."'  ";
				}
			}
			if(isset($_GET['e_date'])){
				if($_GET['e_date']){
					$eDate = $_GET['e_date'];
					$que_etc .= " and A.etc_15 <= '".$eDate."'  ";
				}
			}
		break;
		default :
			if(isset($_GET['s_date'])){
				if($_GET['s_date']){
					$sDate = $_GET['s_date'];
					$que_etc .= " and A.etc_14 >= '".$sDate."'  ";
				}
			}
			if(isset($_GET['e_date'])){
				if($_GET['e_date']){
					$eDate = $_GET['e_date'];
					$que_etc .= " and A.etc_15 <= '".$eDate."'  ";
				}
			}
		}
	}else{
		//날짜검색 추가
		if(isset($_GET['s_date'])){
			if($_GET['s_date']){
				$sDate = $_GET['s_date']." 00:00:00";
				$que_etc .= " and A.wdate >= '".$sDate."'  ";
			}
		}
		if(isset($_GET['e_date'])){
			if($_GET['e_date']){
				$eDate = $_GET['e_date']." 23:59:59";
				$que_etc .= " and A.wdate <= '".$eDate."'  ";
			}
		}
	}


	//검색키워드가 있을경우
	if($sk !=""){
		switch($sw){
		case("n") :
			$que_where = "and A.name like '%$sk%'";
		break;
		case("order") :
			$que_where = "and (A.etc_1 like '%$sk%' or A.subject like '%$sk%' ) ";
		break;
		case("s") :
			$que_where = "and A.subject like '%$sk%'";
		break;
		case("idx") :
			$que_where = "and A.idx = '$sk'";
		break;
		case("sd") :
			$que_where = "and A.schedule_date like '%$sk%'";
		break;
		case("h") :
			$que_where = "and A.homepage like '%$sk%'";
		break;
		case("e") :
			$que_where = "and A.etc_1 = '$sk'";
		break;
		case("e1l") :
			$que_where = "and A.etc_1 like '%$sk%'";
		break;
		case("e2l") :
			$que_where = "and A.etc_2 like '%$sk%'";
		break;
		case("e3l") :
			$que_where = "and A.etc_3 like '%$sk%'";
		break;
		case("e5l") :
			$que_where = "and A.etc_5 like '%$sk%'";
		break;
		case("cate") :
			if($boardid=="ktoaact"){
				if( strpos("사전진단 컨설팅", $sk ) !== false ){
					$sk = "1";
				}else if( strpos("ICT창업 교육", $sk )!== false){
					$sk = "2";
				}else if( strpos("전문가 컨설팅", $sk )!== false){
					$sk = "3";
				}else if( strpos("내외부 멘토링", $sk )!== false){
					$sk = "4";
				}else if( strpos("IR", $sk )!== false){
					$sk = "5";
				}else if( strpos("언론홍보", $sk )!== false){
					$sk = "6";
				}else if( strpos("기타", $sk )!== false){
					$sk = "7";
				}
			}

			$que_where = "and A.category = '$sk'";
		break;
		case("e4") :
			$que_where = "and A.etc_4 = '$sk'";
		break;
		case("e7l") :
			$que_where = "and A.etc_7 like '%$sk%'";
		break;
		case("userid") :
			$que_where = "and A.w_user = '$sk'";
		break;
		case("search") :
			$que_where = "and A.tel = '". $_SESSION["MEMBER"]["HP"] ."' and A.email = '". $_SESSION["MEMBER"]["EMAIL"] ."' ";
		break;
		case("c") :
			$que_where = "and A.contents like '%$sk%'";
		break;
		case("ltdNm") :
			$que_where = "and A.etc_7 like '%$sk%'";
		break;
		case("a") :
		default :
			if( $boardid=="total" ){
				$que_where = " and A.subject like '%$sk%' ";
			}else if( $boardid == 'topic_business_all' || $boardid == 'topic_property_all' ){
				$que_where = " and A.subject like '%$sk%' ";
			}else{
				$que_where = "and (A.name like '%$sk%' or A.subject like '%$sk%' or A.contents like '%$sk%')";
			}
		}

		// 검색시 영역을 분할하여 검색=> 속도향상용
		$sql = "select count(A.idx) as cnt from $tblid A";
		$rs = mysqli_query($GLOBALS['dblink'], $sql);

		$row = mysqli_fetch_assoc($rs);
		$q_total = $row['cnt'];
		$q_start = $q_total - 10000; // 최근 10000건만 검색

		if($q_total>10000){
			$q_limit = " A.idx between " . $q_start . " and " . $q_total . " ";
		}
		// 검색시 영역을 분할하여 검색=> 속도향상용
	}
	if ( $boardid == 'total' ) {
		$que_where .= " AND A.`board_id` NOT IN ('018', '020', '024', 'faq', 'adminboard', 'eng_hanpage') ";
	}
	if ( $boardid == 'topic_business_all' ) {
		$que_where .= " AND A.`board_id` IN ('faq', 'four_insurance', 'outsourcing', 'taxInfo', 'disadvantage', 'establishment', 'nationalTax_foreign', 'taxspecial', 'enter_standard03') ";
	}
	if ( $boardid == 'topic_property_all' ) {
		$que_where .= " AND A.`board_id` IN ('taxInfo_stock', 'tcbc2_11', 'info_dissatisfaction', 'info_gifttax', 'nati_Tax_immovable02','taxes') ";
	}

	// idx 를 추가해서 넣었을 경우
	if ($b_idx) {
		$que_where .= " AND A.sidx = '{$b_idx}' ";
	}

	//카운트
	//$sql = "select count(A.idx) from $tblid A WHERE A.no='1' $q_limit $que_where $que_category ";
	$sql = "select count(A.idx) from ".$tblid." A WHERE 1=1 ".$q_limit." ".$que_where." ".$que_category." ".$que_etc;
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $row = mysqli_fetch_row($rs);
    $total_rs = $row[0];

	//=========================================================
	// mysql 4.1 부터 적용되는 쿼리
	//=========================================================
	// 20100624
	// 그림의 정렬순서를 입력된 순서로 하고자 할경우 실행
	// 4.1 부터 서브쿼리가 적용되므로 이하일경우
	// 일반 group by 쿼리를 그냥 사용한다
	//=========================================================
	//if (mysqli_get_server_info()>4.1){
	//	$sub_query=" ( SELECT *  FROM ".$GLOBALS["_conf_tbl"]["board_files"]." ORDER BY idx ASC ) ";
	//}else{
		$sub_query= $GLOBALS["_conf_tbl"]["board_files"];
	//}

	//목록
	$sql  = " SELECT A.*, B.idx AS f_idx, B.boardid, B.b_idx, B.ori_name, B.re_name, B.type, B.size ";
	if ( $boardid == 'topic_business_all' || $boardid == 'topic_property_all' ) {
		$sql .= " FROM $tblid A LEFT JOIN ".$sub_query." B ON B.boardid='total' AND A.idx=B.b_idx ";
	} else {
		$sql .= " FROM $tblid A LEFT JOIN ".$sub_query." B ON B.boardid='$boardid' AND A.idx=B.b_idx ";
	}
	$sql .= " WHERE 1=1 $q_limit $que_where $que_category $que_etc group by A.idx";

	//echo "//".$offset."//".$scale;
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
			if($_REQUEST["ord"] !=""){
				if($scale > 0){
					$sql .= " order by A.".$_REQUEST["ord"]." limit $offset,$scale ";
				}else{
					$sql .= " order by A.".$_REQUEST["ord"]." desc ";
				}
			}else{
				if($boardid == "total"){
					if($scale > 0){
						$sql .= " order by A.reg_date DESC, A.idx desc limit $offset,$scale ";
					}else{
						$sql .= " order by A.reg_date DESC, A.idx desc ";
					}
				} else if ( $boardid == 'topic_business_all' || $boardid == 'topic_property_all' ) {
					if($scale > 0){
						$sql .= " order by A.idx desc limit $offset,$scale ";
					}else{
						$sql .= " order by A.idx desc ";
					}
				} else if($boardid == "semu"){
					if($scale > 0){
						$sql .= " order by etc_3 DESC, A.idx desc limit $offset,$scale ";
					}else{
						$sql .= " order by etc_3 DESC, A.idx desc ";
					}
				}else{
					if($scale > 0){
						$sql .= " order by A.wdate DESC, A.etc_yn, A.depth ASC, A.no, A.main, A.idx desc, A.sub limit $offset,$scale ";
					}else{
						$sql .= " order by A.wdate DESC, A.etc_yn, A.depth ASC, A.no, A.main, A.idx desc, A.sub ";
					}
				}
			}
			//echo $sql;
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
	}
	return $list;
}

// 글번호 가져오기
function getBoardTotalIdx($boardid, $b_idx) {
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;
	$sql = "select `idx` from `{$tblid}` WHERE `sidx` = '{$b_idx}' ";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$idx = mysqli_result($rs,0,0);
	return $idx;
}


//게시물 가져오기 - 파일 포함
function getBoardListBaseNFaq($boardid, $category, $sw="", $sk="", $scale, $offset=0, $page=""){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;
	$tblid_faq = $GLOBALS["_SITE"]["BOARD_PREWORD"] . "faq";

	$q_limit	= "";
	$que_where	= "";
	$que_category	= "";
	$que_etc	= "";

	//카테고리가 있을경우
	if($category !=""){
		$que_category = " and A.category='$category' ";
	}
	if(isset($_GET['etc_1'])){
		$que_etc .= " and A.etc_1='".$_GET['etc_1']."' ";
	}
	if(isset($_GET['etc_2'])){
		$que_etc .= " and A.etc_2='".$_GET['etc_2']."' ";
	}
	if(isset($_GET['etc_3'])){
		$que_etc .= " and A.etc_3='".$_GET['etc_3']."' ";
	}

	if( $boardid=="ktoabiz" ){
		//날짜검색 추가
		switch($_GET['date_point']){
		case("s") :
			if(isset($_GET['s_date'])){
				if($_GET['s_date']){
					$sDate = $_GET['s_date'];
					$que_etc .= " and A.etc_14 >= '".$sDate."'  ";
				}
			}
			if(isset($_GET['e_date'])){
				if($_GET['e_date']){
					$eDate = $_GET['e_date'];
					$que_etc .= " and A.etc_14 <= '".$eDate."'  ";
				}
			}
		break;
		case("e") :
			if(isset($_GET['s_date'])){
				if($_GET['s_date']){
					$sDate = $_GET['s_date'];
					$que_etc .= " and A.etc_15 >= '".$sDate."'  ";
				}
			}
			if(isset($_GET['e_date'])){
				if($_GET['e_date']){
					$eDate = $_GET['e_date'];
					$que_etc .= " and A.etc_15 <= '".$eDate."'  ";
				}
			}
		break;
		default :
			if(isset($_GET['s_date'])){
				if($_GET['s_date']){
					$sDate = $_GET['s_date'];
					$que_etc .= " and A.etc_14 >= '".$sDate."'  ";
				}
			}
			if(isset($_GET['e_date'])){
				if($_GET['e_date']){
					$eDate = $_GET['e_date'];
					$que_etc .= " and A.etc_15 <= '".$eDate."'  ";
				}
			}
		}
	}else{
		//날짜검색 추가
		if(isset($_GET['s_date'])){
			if($_GET['s_date']){
				$sDate = $_GET['s_date']." 00:00:00";
				$que_etc .= " and A.wdate >= '".$sDate."'  ";
			}
		}
		if(isset($_GET['e_date'])){
			if($_GET['e_date']){
				$eDate = $_GET['e_date']." 23:59:59";
				$que_etc .= " and A.wdate <= '".$eDate."'  ";
			}
		}
	}

	//검색키워드가 있을경우
	if($sk !=""){
		switch($sw){
		case("n") :
			$que_where = "and A.name like '%$sk%'";
		break;
		case("order") :
			$que_where = "and (A.etc_1 like '%$sk%' or A.subject like '%$sk%' ) ";
		break;
		case("s") :
			$que_where = "and A.subject like '%$sk%'";
		break;
		case("idx") :
			$que_where = "and A.idx = '$sk'";
		break;
		case("sd") :
			$que_where = "and A.schedule_date like '%$sk%'";
		break;
		case("h") :
			$que_where = "and A.homepage like '%$sk%'";
		break;
		case("e") :
			$que_where = "and A.etc_1 = '$sk'";
		break;
		case("e1l") :
			$que_where = "and A.etc_1 like '%$sk%'";
		break;
		case("e2l") :
			$que_where = "and A.etc_2 like '%$sk%'";
		break;
		case("e3l") :
			$que_where = "and A.etc_3 like '%$sk%'";
		break;
		case("e5l") :
			$que_where = "and A.etc_5 like '%$sk%'";
		break;
		case("cate") :
			if($boardid=="ktoaact"){
				if( strpos("사전진단 컨설팅", $sk ) !== false ){
					$sk = "1";
				}else if( strpos("ICT창업 교육", $sk )!== false){
					$sk = "2";
				}else if( strpos("전문가 컨설팅", $sk )!== false){
					$sk = "3";
				}else if( strpos("내외부 멘토링", $sk )!== false){
					$sk = "4";
				}else if( strpos("IR", $sk )!== false){
					$sk = "5";
				}else if( strpos("언론홍보", $sk )!== false){
					$sk = "6";
				}else if( strpos("기타", $sk )!== false){
					$sk = "7";
				}
			}

			$que_where = "and A.category = '$sk'";
		break;
		case("e4") :
			$que_where = "and A.etc_4 = '$sk'";
		break;
		case("e7l") :
			$que_where = "and A.etc_7 like '%$sk%'";
		break;
		case("userid") :
			$que_where = "and A.w_user = '$sk'";
		break;
		case("search") :
			$que_where = "and A.tel = '". $_SESSION["MEMBER"]["HP"] ."' and A.email = '". $_SESSION["MEMBER"]["EMAIL"] ."' ";
		break;
		case("c") :
			$que_where = "and A.contents like '%$sk%'";
		break;
		case("ltdNm") :
			$que_where = "and A.etc_7 like '%$sk%'";
		break;
		case("a") :
		default :
			if( $boardid=="total" ){
				$que_where = " and A.subject like '%$sk%' ";
			}else{
				$que_where = "and (A.name like '%$sk%' or A.subject like '%$sk%' or A.contents like '%$sk%')";
			}
		}

		// 검색시 영역을 분할하여 검색=> 속도향상용
		$sql = "select count(A.idx) as cnt from $tblid A";
		$rs = mysqli_query($GLOBALS['dblink'], $sql);

		$row = mysqli_fetch_assoc($rs);
		$q_total = $row['cnt'];
		$q_start = $q_total - 10000; // 최근 10000건만 검색

		if($q_total>10000){
			$q_limit = " A.idx between " . $q_start . " and " . $q_total . " ";
		}
		// 검색시 영역을 분할하여 검색=> 속도향상용
	}

	//카운트
	//$sql = "select count(A.idx) from $tblid A WHERE A.no='1' $q_limit $que_where $que_category ";
	$sql = "select sum(count_idx) from (";
	$sql .= "(select count(A.idx) AS count_idx from ".$tblid." A WHERE 1=1 ".$q_limit." ".$que_where." ".$que_category." ".$que_etc." ) ";
	$sql .= " UNION ALL ";
	$sql .= "(select count(A.idx) AS count_idx from ".$tblid_faq." A WHERE 1=1 and etc_2='".$boardid."' ".$q_limit." ".$que_where." ".$que_category." ".$que_etc." ) ";
	$sql .= " ) A";
	//echo $sql;
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $row = mysqli_fetch_row($rs);
    $total_rs = $row[0];

	//=========================================================
	// mysql 4.1 부터 적용되는 쿼리
	//=========================================================
	// 20100624
	// 그림의 정렬순서를 입력된 순서로 하고자 할경우 실행
	// 4.1 부터 서브쿼리가 적용되므로 이하일경우
	// 일반 group by 쿼리를 그냥 사용한다
	//=========================================================
	//if (mysqli_get_server_info()>4.1){
	//	$sub_query=" ( SELECT *  FROM ".$GLOBALS["_conf_tbl"]["board_files"]." ORDER BY idx ASC ) ";
	//}else{
		$sub_query= $GLOBALS["_conf_tbl"]["board_files"];
	//}

	// 전체 데이터를 가져오기 위함

	//목록
	$sql  = " SELECT * from ";
	$sql .= " ((SELECT A.*, B.idx AS f_idx, B.boardid, B.b_idx, B.ori_name, B.re_name, B.type, B.size , '".$boardid."' AS board_id";
	$sql .= " FROM $tblid A LEFT JOIN ".$sub_query." B ON B.boardid='$boardid' AND A.idx=B.b_idx ";
	$sql .= " WHERE 1=1 $q_limit $que_where $que_category $que_etc group by A.idx )";
	$sql .= " UNION ALL";
	$sql .= " (SELECT A.*, B.idx AS f_idx, B.boardid, B.b_idx, B.ori_name, B.re_name, B.type, B.size , 'faq' AS board_id";
	$sql .= " FROM $tblid_faq A LEFT JOIN ".$sub_query." B ON B.boardid='faq' AND A.idx=B.b_idx ";
	$sql .= " WHERE 1=1 and etc_2='".$boardid."' $q_limit $que_where $que_category $que_etc group by A.idx)) AS A";
	//echo $sql;
	//echo "//".$offset."//".$scale;
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
			if($_REQUEST["ord"] !=""){
				if($scale > 0){
					$sql .= " order by A.".$_REQUEST["ord"]." limit $offset,$scale ";
				}else{
					$sql .= " order by A.".$_REQUEST["ord"]." desc ";
				}
			}else{
				if($boardid == "total"){
					if($scale > 0){
						$sql .= " order by A.idx desc limit $offset,$scale ";
					}else{
						$sql .= " order by A.idx desc ";
					}
				}else if($boardid == "semu"){
					if($scale > 0){
						$sql .= " order by etc_3 DESC, A.idx desc limit $offset,$scale ";
					}else{
						$sql .= " order by etc_3 DESC, A.idx desc ";
					}
				}else{
					if($scale > 0){
						$sql .= " order by A.etc_yn, A.depth DESC, A.no, A.wdate desc, A.main, A.sub limit $offset,$scale ";
					}else{
						$sql .= " order by A.etc_yn, A.depth DESC, A.no, A.wdate desc, A.main, A.sub ";
					}
				}
			}
			//echo $sql;
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
	}
	return $list;
}

function getBoardListBaseNAllFile($boardid, $category, $sw="", $sk="", $scale, $offset=0, $page=""){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;
	$q_limit	= "";
	$que_where	= "";
	$que_category	= "";
	$que_etc	= "";

	//카테고리가 있을경우
	if($category !=""){
		$que_category = " and A.category='$category' ";
	}
	if(isset($_GET['etc_1'])){
		$que_etc .= " and A.etc_1='".$_GET['etc_1']."' ";
	}
	if(isset($_GET['etc_2'])){
		$que_etc .= " and A.etc_2='".$_GET['etc_2']."' ";
	}
	if(isset($_GET['etc_3'])){
		$que_etc .= " and A.etc_3='".$_GET['etc_3']."' ";
	}

	if( $boardid=="ktoabiz" ){
		//날짜검색 추가
		switch($_GET['date_point']){
		case("s") :
			if(isset($_GET['s_date'])){
				if($_GET['s_date']){
					$sDate = $_GET['s_date'];
					$que_etc .= " and A.etc_14 >= '".$sDate."'  ";
				}
			}
			if(isset($_GET['e_date'])){
				if($_GET['e_date']){
					$eDate = $_GET['e_date'];
					$que_etc .= " and A.etc_14 <= '".$eDate."'  ";
				}
			}
		break;
		case("e") :
			if(isset($_GET['s_date'])){
				if($_GET['s_date']){
					$sDate = $_GET['s_date'];
					$que_etc .= " and A.etc_15 >= '".$sDate."'  ";
				}
			}
			if(isset($_GET['e_date'])){
				if($_GET['e_date']){
					$eDate = $_GET['e_date'];
					$que_etc .= " and A.etc_15 <= '".$eDate."'  ";
				}
			}
		break;
		default :
			if(isset($_GET['s_date'])){
				if($_GET['s_date']){
					$sDate = $_GET['s_date'];
					$que_etc .= " and A.etc_14 >= '".$sDate."'  ";
				}
			}
			if(isset($_GET['e_date'])){
				if($_GET['e_date']){
					$eDate = $_GET['e_date'];
					$que_etc .= " and A.etc_15 <= '".$eDate."'  ";
				}
			}
		}
	}else{
		//날짜검색 추가
		if(isset($_GET['s_date'])){
			if($_GET['s_date']){
				$sDate = $_GET['s_date']." 00:00:00";
				$que_etc .= " and A.wdate >= '".$sDate."'  ";
			}
		}
		if(isset($_GET['e_date'])){
			if($_GET['e_date']){
				$eDate = $_GET['e_date']." 23:59:59";
				$que_etc .= " and A.wdate <= '".$eDate."'  ";
			}
		}
	}

	//검색키워드가 있을경우
	if($sk !=""){
		switch($sw){
		case("n") :
			$que_where = "and A.name like '%$sk%'";
		break;
		case("order") :
			$que_where = "and (A.etc_1 like '%$sk%' or A.subject like '%$sk%' ) ";
		break;
		case("s") :
			$que_where = "and A.subject like '%$sk%'";
		break;
		case("idx") :
			$que_where = "and A.idx = '$sk'";
		break;
		case("sd") :
			$que_where = "and A.schedule_date like '%$sk%'";
		break;
		case("h") :
			$que_where = "and A.homepage like '%$sk%'";
		break;
		case("e") :
			$que_where = "and A.etc_1 = '$sk'";
		break;
		case("e1l") :
			$que_where = "and A.etc_1 like '%$sk%'";
		break;
		case("e2l") :
			$que_where = "and A.etc_2 like '%$sk%'";
		break;
		case("e3l") :
			$que_where = "and A.etc_3 like '%$sk%'";
		break;
		case("e5l") :
			$que_where = "and A.etc_5 like '%$sk%'";
		break;
		case("cate") :
			if($boardid=="ktoaact"){
				if( strpos("사전진단 컨설팅", $sk ) !== false ){
					$sk = "1";
				}else if( strpos("ICT창업 교육", $sk )!== false){
					$sk = "2";
				}else if( strpos("전문가 컨설팅", $sk )!== false){
					$sk = "3";
				}else if( strpos("내외부 멘토링", $sk )!== false){
					$sk = "4";
				}else if( strpos("IR", $sk )!== false){
					$sk = "5";
				}else if( strpos("언론홍보", $sk )!== false){
					$sk = "6";
				}else if( strpos("기타", $sk )!== false){
					$sk = "7";
				}
			}

			$que_where = "and A.category = '$sk'";
		break;
		case("e4") :
			$que_where = "and A.etc_4 = '$sk'";
		break;
		case("e7l") :
			$que_where = "and A.etc_7 like '%$sk%'";
		break;
		case("userid") :
			$que_where = "and A.w_user = '$sk'";
		break;
		case("search") :
			$que_where = "and A.tel = '". $_SESSION["MEMBER"]["HP"] ."' and A.email = '". $_SESSION["MEMBER"]["EMAIL"] ."' ";
		break;
		case("c") :
			$que_where = "and A.contents like '%$sk%'";
		break;
		case("ltdNm") :
			$que_where = "and A.etc_7 like '%$sk%'";
		break;
		case("a") :
		default :
			$que_where = "and (A.name like '%$sk%' or A.subject like '%$sk%' or A.contents like '%$sk%')";
		}

		// 검색시 영역을 분할하여 검색=> 속도향상용
		$sql = "select count(A.idx) as cnt from $tblid A";
		$rs = mysqli_query($GLOBALS['dblink'], $sql);

		$row = mysqli_fetch_assoc($rs);
		$q_total = $row['cnt'];
		$q_start = $q_total - 10000; // 최근 10000건만 검색

		if($q_total>10000){
			$q_limit = " A.idx between " . $q_start . " and " . $q_total . " ";
		}
		// 검색시 영역을 분할하여 검색=> 속도향상용
	}

	//카운트
	//$sql = "select count(A.idx) from $tblid A WHERE A.no='1' $q_limit $que_where $que_category ";
	$sql = "select count(A.idx) from ".$tblid." A WHERE 1=1 ".$q_limit." ".$que_where." ".$que_category." ".$que_etc;
	//echo $sql;
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $row = mysqli_fetch_row($rs);
    $total_rs = $row[0];

	//=========================================================
	// mysql 4.1 부터 적용되는 쿼리
	//=========================================================
	// 20100624
	// 그림의 정렬순서를 입력된 순서로 하고자 할경우 실행
	// 4.1 부터 서브쿼리가 적용되므로 이하일경우
	// 일반 group by 쿼리를 그냥 사용한다
	//=========================================================
	//if (mysqli_get_server_info()>4.1){
	//	$sub_query=" ( SELECT *  FROM ".$GLOBALS["_conf_tbl"]["board_files"]." ORDER BY idx ASC ) ";
	//}else{
		$sub_query= $GLOBALS["_conf_tbl"]["board_files"];
	//}

	//목록
	$sql  = " SELECT A.*, B.idx AS f_idx, B.boardid, B.b_idx, B.ori_name, B.re_name, B.type, B.size ";
	$sql .= " FROM $tblid A LEFT JOIN ".$sub_query." B ON B.boardid='$boardid' AND A.idx=B.b_idx ";
	$sql .= " WHERE 1=1 $q_limit $que_where $que_category $que_etc group by A.idx";
	//echo $sql;
	//echo "//".$offset."//".$scale;
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
			if($_REQUEST["ord"] !=""){
				if($scale > 0){
					$sql .= " order by A.".$_REQUEST["ord"]." limit $offset,$scale ";
				}else{
					$sql .= " order by A.".$_REQUEST["ord"]." desc ";
				}
			}else{
				//scale 0 으로 지정시에는 전체 가져옴
				$tecorder="";
				if($scale > 0){
					$sql .= " order by $tecorder A.no, A.main, A.sub limit $offset,$scale ";
				}else{
					$sql .= " order by $tecorder A.no, A.main, A.sub ";
				}
			}

			$rs = mysqli_query($GLOBALS['dblink'], $sql);

		    // offset 을 이용한 limit 가 적용된 갯수
		    $total = mysqli_num_rows($rs);
		    $list['list']['total'] = $total;
		    // 페이지 네비게이션 오프셋 지정.

        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);
			$fsql  = "SELECT * ";
			$fsql .= "FROM ".$GLOBALS["_conf_tbl"]["board_files"]." ";
			$fsql .= "WHERE boardid = '$boardid' ";
			$fsql .= "AND b_idx = '".$list['list'][$i]['idx']."' order by idx";
			//echo $fsql;
			$frs = mysqli_query($GLOBALS['dblink'], $fsql);
			$total_frs = mysqli_num_rows($frs);

			if($total_frs > 0){
				$list['list'][$i]['total_files'] = $total_frs;
				for($j=0; $j < $total_frs; $j++){
					$list['list'][$i]['files'][$j] = mysqli_fetch_assoc($frs);
				}
			}else{
				$list['list'][$i]['total_files'] = 0;
			}
        }
		
	}else{
		$list['total'] = 0;
	}
	return $list;
}


//게시물 가져오기 - 댓글카운트 포함
function getBoardListBaseNMemoCnt($boardid, $category, $sw="", $sk="", $scale, $offset=0){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	$tbl_comment = $GLOBALS["_conf_tbl"]["comment"];

	if($boardid == "after" && $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]) {
	//	$que_where .= " or (w_user='".$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]."') ";
	}

	//카테고리가 있을경우
	if($category !=""){
		$que_category = " and category='$category' ";
	}

	if($_GET[user_id]) {
		$que_where .= "and (w_user = '".$_GET[user_id]."' or schedule_date='0000-00-00') ";
	} else if($boardid == "after" && $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT") {
		$que_where .= " and schedule_date!='0000-00-00'";
	}


	//검색키워드가 있을경우
	if($sk !=""){
		switch($sw){
		case("n") :
			$que_where .= "and name like '%$sk%'";
		break;
		case("s") :
			$que_where .= "and subject like '%$sk%'";
		break;
		case("c") :
			$que_where .= "and contents like '%$sk%'";
		break;
		case("e") :
			$que_where .= "and etc_1 = '$sk'";
		break;
		case("sp") :
			$que_where = "and schedule_date = '0000-00-00'";
		break;
		case("a") :
		default :
			$que_where .= "and (name like '%$sk%' or subject like '%$sk%' or contents like '%$sk%')";
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
	//카운트
	//$sql = "select count(idx) from $tblid WHERE no='1' $q_limit $que_where $que_category $que_catcode ";
	$sql = "select count(idx) from $tblid WHERE 1=1 $q_limit $que_where $que_category $que_catcode ";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $row = mysqli_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
    //$sql .= "WHERE no='1' $q_limit $que_where $que_category $que_catcode ";
	$sql .= "WHERE 1=1 $q_limit $que_where $que_category $que_catcode ";

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
			$sql .= " order by no, main, sub limit $offset,$scale ";
		}else{
		  $sql .= " order by no, main, sub ";
		}


		$rs = mysqli_query($GLOBALS['dblink'], $sql);
		//echo $sql;
		// offset 을 이용한 limit 가 적용된 갯수
		$total = mysqli_num_rows($rs);
		$list['list']['total'] = $total;
		// 페이지 네비게이션 오프셋 지정.

        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);
			$m_cnt_row = mysqli_fetch_row(mysqli_query("select count(idx) from $tbl_comment WHERE boardid='$boardid' AND board_idx='".$list['list'][$i][idx]."' "));
            $list['list'][$i][cmt_count] = $m_cnt_row[0];
        }
    }else{
        $list['total'] = 0;
    }
    return $list;
}

//게시물 가져오기 - 파일 포함
function getBoardListBaseNImage($boardid, $category, $sw="", $sk="", $scale, $offset=0){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	//카테고리가 있을경우
	if($category !=""){
		$que_category = " and A.category='$category' ";
	}

	//검색키워드가 있을경우
	if($sk !=""){
		switch($sw){
		case("n") :
			$que_where = "and A.name like '%$sk%'";
		break;
		case("s") :
			$que_where = "and A.subject like '%$sk%'";
		break;
		case("c") :
			$que_where = "and A.contents like '%$sk%'";
		break;
		case("e") :
			$que_where = "and etc_1 = '$sk'";
		break;
		case("a") :
		default :
			$que_where = "and (A.name like '%$sk%' or A.subject like '%$sk%' or A.contents like '%$sk%')";
		}

		// 검색시 영역을 분할하여 검색=> 속도향상용
		$sql = "select count(A.idx) as cnt from $tblid A";
		$rs = mysqli_query($GLOBALS['dblink'], $sql);

		$row = mysqli_fetch_assoc($rs);
		$q_total = $row[cnt];
		$q_start = $q_total - 10000; // 최근 10000건만 검색

		if($q_total>10000){
			$q_limit = " A.idx between " . $q_start . " and " . $q_total . " ";
		}
		// 검색시 영역을 분할하여 검색=> 속도향상용
	}

	//카운트
//	$sql = "select count(A.idx) from $tblid A WHERE A.no='1' $q_limit $que_where $que_category ";
	$sql = "select count(A.idx) from $tblid A WHERE 1=1 $q_limit $que_where $que_category ";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $row = mysqli_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT A.*, B.idx AS f_idx, B.boardid, B.b_idx, B.ori_name, B.re_name, B.type, B.size ";
    $sql .= "FROM $tblid A LEFT JOIN ".$GLOBALS["_conf_tbl"]["board_files"]." B ON B.boardid='$boardid' AND A.idx=B.b_idx AND B.ext IN('jpg','gif','png')";
//    $sql .= "WHERE A.no='1' $q_limit $que_where $que_category group by A.idx";
    $sql .= "WHERE 1=1 $q_limit $que_where $que_category group by A.idx";

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
					$sql .= " order by A.no, A.main, A.sub limit $offset,$scale ";
				}else{
					$sql .= " order by A.no, A.main, A.sub ";
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
    }
    return $list;
}

//게시물 등록하기
function insertBoardArticle($boardid, $thumwidth){


	$sub_sql= "";
	$schedule_date = $_POST['schedule_date']??"0000-00-00";
	$hit = $_POST['hit']??0;
	$contents = $_POST['contents']??"";
	$contents = str_replace("'","’",$contents);
	$subject = $_POST['subject']??"";
	$subject = str_replace("'","’",$subject);

	if(!isset($_POST["is_notice"])){	$_POST["is_notice"]=""; }

	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	//main 번호 가져오기
	$q_main = mysqli_query($GLOBALS['dblink'],"select min(main) from $tblid ");
	$c_main = @mysqli_result($q_main,0,0);

	if(!$c_main){
		$main='99999999';
	}else{
		$main=$c_main-1;
	}

	//게시판 공지 설정
	if($_POST['is_notice']=="Y"){
		$setNo = "0";
	}else{
		$setNo = "1";
	}
	if($_POST['etc_yn'] == "Y"){
		$depth = $_POST['depth'];
	}else{
		$depth = 0;
	}

	if(isset($_POST['wdate'])) {
		$sql_add = " wdate='".$_POST['wdate']."' ";
	} else {
		$sql_add = " wdate=now() ";
	}

	//게시판 테이블에 입력

	if(!isset($_POST['usereplyemail'])){	$_POST['usereplyemail'] = "N"; }
	if(!isset($_POST['usehtml'])){	$_POST['usehtml'] = "N"; }
	if(!isset($_POST['uselock'])){	$_POST['uselock'] = "N"; }
	if(!isset($_POST['schedule_date'])){	$_POST['schedule_date'] = "0000-00-00"; }
	if($boardid=="suapplication"||$boardid=="suconsulting"||$boardid=="suinquiry"){
		$schedule_date=date('Y-m-d');
	}
	if(!isset($_POST['etc_yn'])){	$_POST['etc_yn'] = "N"; }
	

	$homepage = postNullCheck('homepage');
	$etc_1 = postNullCheck('etc_1');
	$etc_2 = postNullCheck('etc_2');
	$etc_3 = postNullCheck('etc_3');
	$etc_4 = postNullCheck('etc_4');
	$etc_5 = postNullCheck('etc_5');
	$email = postNullCheck('str_email01')."@".postNullCheck('str_email02');

	$w_user = $_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"];

	// hanpage
	if ( $boardid == 'hanpage' || $boardid == 'eng_hanpage' ) {
		$r_user = $_POST['r_user']??"";
		$w_user = $_POST['name']??"";
		$email = $_POST['email']??"";
		$pass = $_POST['pass']?MD5( $_POST['pass'] ):'';
		$r_contents = $_POST['r_contents']??"";
		$r_contents = str_replace("'","’",$r_contents);
		$kl_email_manager = $_POST['kl_email_manager']??"";
		$etc_1 = 'hanpage';
		$etc_3 = '0';
		$etc_4 = $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]??"";

		$sql = "INSERT INTO ".$tblid." set
			no='$setNo',
			main='$main',
			sub='0',
			depth='$depth',
			w_user='".$w_user."',
			r_user='".postNullCheck('r_user')."',
			name='".postNullCheck('name')."',
			pass='".$pass."',
			homepage='".$homepage."',
			email='".$email."',
			kl_email_manager='".$kl_email_manager."',
			subject='".$subject."',
			contents='".$contents."',
			r_contents='".$r_contents."',
			usereplyemail='".$_POST['usereplyemail'] ."',
			usehtml='".$_POST['usehtml']."',
			category='".postNullCheck('category')."',
			uselock='".$_POST['uselock']."',
			hit='".$hit."',
			etc_1='".$etc_1 ."',
			etc_2='".$etc_2 ."',
			etc_3='".$etc_3."',
			etc_4='".$etc_4 ."',
			etc_5='".$etc_5 ."',
			ip='".$_SERVER['REMOTE_ADDR']."',
			schedule_date='".$schedule_date."',
			etc_yn='".$_POST['etc_yn']."',
			". $sub_sql ." ". $sql_add ." ";
	} else {
		$sql = "INSERT INTO ".$tblid." set
			no='$setNo',
			main='$main',
			sub='0',
			depth='$depth',
			w_user='".$w_user."',
			r_user='".postNullCheck('r_user')."',
			name='".postNullCheck('name')."',
			pass='".postNullCheck('pass')."',
			homepage='".$homepage."',
			email='".$email."',
			subject='".$subject."',
			contents='".$contents."',
			usereplyemail='".$_POST['usereplyemail'] ."',
			usehtml='".$_POST['usehtml']."',
			category='".postNullCheck('category')."',
			uselock='".$_POST['uselock']."',
			hit='".$hit."',
			etc_1='".$etc_1 ."',
			etc_2='".$etc_2 ."',
			etc_3='".$etc_3."',
			etc_4='".$etc_4 ."',
			etc_5='".$etc_5 ."',
			ip='".$_SERVER['REMOTE_ADDR']."',
			schedule_date='".$schedule_date."',
			etc_yn='".$_POST['etc_yn']."',
			". $sub_sql ." ". $sql_add ." ";
	}



	//echo $sql;
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$insert_idx = mysqli_insert_id($GLOBALS['dblink']);
	$total = mysqli_affected_rows($GLOBALS['dblink']);

	// 통합검색에 저장
	insertTotalBoardArticle($boardid, $insert_idx);
	
	//파일처리
	inputBoardFiles($boardid, $insert_idx, $_FILES, $thumwidth);


	if($total > 0){
		return true;
	}else{
		return false;
	}

}

function insertTotalBoardArticle($boardid, $insert_idx){
	$subject = $_POST['subject']??"";
	$subject = str_replace("'","’",$subject);

	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . "total";

	//게시판 테이블에 입력

	$w_user=$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"];
	$sql = "INSERT INTO ".$tblid." set
		board_id='$boardid',
		subject='".$subject."',
		reg_user_id = '".$w_user."',
		reg_ip='".$_SERVER['REMOTE_ADDR']."',
		reg_date=now()
		 ";

	//echo $sql;
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$sidx = mysqli_insert_id($GLOBALS['dblink']);
	$total = mysqli_affected_rows($GLOBALS['dblink']);

	if($total > 0){
		$usql = "UPDATE ".$GLOBALS["_SITE"]["BOARD_PREWORD"].$boardid." set
			sidx = '".$sidx."'
			WHERE idx='".$insert_idx."'";
		$urs = mysqli_query($GLOBALS['dblink'], $usql);
		$utotal = mysqli_affected_rows($GLOBALS['dblink']);
		if($utotal > 0){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}

}


//게시물 수정하기
function modifyBoardArticle($boardid, $idx, $thumwidth){
	// PHP 7
	if(!isset($_POST["is_notice"])){	$_POST["is_notice"]=""; }
	$sub_sql	= "";
	$sql_add	= "";
	$schedule_date = $_POST['schedule_date']??"0000-00-00";
	$contents = $_POST['contents']??"";
	$contents = str_replace("'","’",$contents);
	$subject = $_POST['subject']??"";
	$subject = str_replace("'","’",$subject);
	$email = postNullCheck('str_email01')."@".postNullCheck('str_email02'); 

	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	//수정권한 설정
	$modifyPerm = false;

	//관리자는 그냥 통과
	if($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT" || $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["GRADE"] == "ADMIN" || @in_array("board_manage",$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["AUTH"])){
		$modifyPerm = true;
	}

	//기존정보와 비밀번호를 비교
	$arrArticleInfo = getArticleInfo($tblid, $idx);

	if($arrArticleInfo["list"][0]["pass"] && $arrArticleInfo["list"][0]["pass"]==trim($_POST['pass'])){
		$modifyPerm = true;
	}

	// 본인아이디 확인
	// 로그인 상태이고 로그인 아이디와 글 쓴 아이디가 같을 경우
	if(isset($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["ID"]) && $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["ID"]==$arrArticleInfo["list"][0]["w_user"]){
		$modifyPerm = true;
	}

	//권한받은자만 접근
	if($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["GRADE"]=="ACCEL" && @in_array("biz_manage",$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["AUTH"])){
		$modifyPerm = true;
	}

	//게시판 공지 설정
	if($_POST['is_notice']=="Y"){
		$setNo = "0";
	}else{
		$setNo = "1";
	}
	if(!isset($_POST['etc_yn'])){	$_POST['etc_yn'] = "N"; }
	if(!isset($_POST['schedule_date'])){	$_POST['schedule_date'] = "0000-00-00"; }
	if($boardid=="suapplication"||$boardid=="suconsulting"||$boardid=="suinquiry"){
		$schedule_date=date('Y-m-d');
	}


	if ( $boardid == 'hanpage' || $boardid == 'eng_hanpage' ) {
		$modifyPerm = true;
	}

	if($modifyPerm==true){

		//게시판 테이블 지정
		$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

		if(isset($_POST['hit'])) {
			$sql_add = " hit=".$_POST['hit'].", ";
		}
		if($_POST['etc_yn'] == "Y"){
			$depth = $_POST['depth'];
		}else{
			$depth = 0;
		}

		if($boardid=="sutechnology"){
			$sub_sql = "
				etc_6='".postNullCheck('etc_6')."',
				etc_7='".postNullCheck('etc_7')."',
				etc_8='".postNullCheck('etc_8')."',
				etc_9='".postNullCheck('etc_9')."',
				etc_10='".postNullCheck('etc_10')."',
				etc_11='".postNullCheck('etc_11')."',
				etc_12='".postNullCheck('etc_12')."',
				etc_13='".postNullCheck('etc_13')."',
				etc_14='".postNullCheck('etc_14')."',
				etc_15='".postNullCheck('etc_15')."',
				etc_16='".postNullCheck('etc_16')."',
				video_title2='".postNullCheck('video_title2')."',
				video_link2='".postNullCheck('video_link2')."',
				video_title3='".postNullCheck('video_title3')."',
				video_link3='".postNullCheck('video_link3')."',
			";
		}

		// hanpage
		if ( $boardid == 'hanpage' || $boardid == 'eng_hanpage' ) {
			$r_contents = $_POST['r_contents']??"";
			$email = $_POST['email']??"";
			$r_contents = str_replace("'","’",$r_contents);

			//게시판 테이블에 수정
			$sql = "UPDATE ".$tblid." set
				depth='".$depth."',
				r_user='".postNullCheck('r_user')."',
				name='".postNullCheck('name')."',
				homepage='".postNullCheck('homepage')."',
				email='".$email."',
				subject='".$subject."',
				contents='".$contents."',
				r_contents='".$r_contents."',
				category='".postNullCheck('category')."',
				schedule_date='".$schedule_date."',
				". $sub_sql . $sql_add ."
				etc_yn='".$_POST['etc_yn']."'
				WHERE idx='".postNullCheck('idx')."'";
		} else {
			//게시판 테이블에 수정
			$sql = "UPDATE ".$tblid." set
				depth='".$depth."',
				r_user='".postNullCheck('r_user')."',
				name='".postNullCheck('name')."',
				pass='".postNullCheck('pass')."',
				homepage='".postNullCheck('homepage')."',
				email='".$_POST['r_contents']."',
				subject='".$subject."',
				contents='".$contents."',
				category='".postNullCheck('category')."',
				etc_1='".postNullCheck('etc_1')."',
				etc_2='".postNullCheck('etc_2')."',
				etc_3='".postNullCheck('etc_3')."',
				etc_4='".postNullCheck('etc_4')."',
				etc_5='".postNullCheck('etc_5')."',
				schedule_date='".$schedule_date."',
				". $sub_sql . $sql_add ."
				etc_yn='".$_POST['etc_yn']."'
				WHERE idx='".postNullCheck('idx')."'";
		}

		//echo $sql;


		$rs = mysqli_query($GLOBALS['dblink'], $sql);
		$total = mysqli_affected_rows($GLOBALS['dblink']);

		//파일삭제 코딩 시작 - 삭제체크 한것만 처리
		if(isset($_POST['filedel'])){
			for($i=0;$i<count($_POST['filedel']);$i++){
				if($_POST['filedel'][$i]>0){
					$fileinfo = getArticleFileInfo($boardid, $_POST['idx'], $_POST['filedel'][$i]);
					//디비에서 파일정보 삭제
					mysqli_query($GLOBALS['dblink'], "DELETE FROM ".$GLOBALS["_conf_tbl"]["board_files"]." WHERE boardid='".$boardid."' AND idx='".$fileinfo["list"][0][idx]."' ");
					//디스크에서 파일 삭제
					@unlink($GLOBALS["_SITE"]["BOARD_DATA"] . "/".$boardid."/".$fileinfo["list"][0]['re_name']);
				}
			}
		}
		//파일삭제 코딩 종료


		if($boardid=="sutechnology"){
			if(isset($_POST['patentdel'])){
				for($i=0;$i<count($_POST['patentdel']);$i++){
					if($_POST['patentdel'][$i]>0){
						$fileinfo = getPatentFileInfo($_POST['idx'], $_POST['patentdel'][$i]);
						//디비에서 파일정보 삭제
						mysqli_query($GLOBALS['dblink'], "DELETE FROM tbl_board_sutechnology_patent WHERE idx='".$fileinfo["list"][0][idx]."' ");
						//디스크에서 파일 삭제
						@unlink($GLOBALS["_SITE"]["BOARD_DATA"] . "/".$boardid."/".$fileinfo["list"][0]['re_name']);
					}
				}
			}
		}
		// 통합검색 업데이트
		modifyTotalBoardArticle($boardid, $idx);
		//파일처리
		inputBoardFiles($boardid, $idx, $_FILES, $thumwidth);

		if($boardid=="sutechnology"){
			inputPatentFiles($boardid, $idx, $_FILES, $thumwidth);
		}

		if($rs){
			return true;
		}else{
			return false;
		}
	}else{
		jsMsg("비밀번호가 일치하지 않습니다.".$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);
		return false;
	}

}

// 통합검색 업데이트
function modifyTotalBoardArticle($boardid, $idx){

	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . "total";

	$arrArticleInfo = getArticleInfo($GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid, $idx);
	
	//게시판 테이블에 수정
	$sql = "UPDATE ".$tblid." set
		subject='".$arrArticleInfo["list"][0]["subject"]."',
		upt_date = now()
		WHERE idx='".$arrArticleInfo["list"][0]["sidx"]."'";

	//echo $sql;


	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_affected_rows($GLOBALS['dblink']);

	if($rs){
		return true;
	}else{
		return false;
	}

}

//답글 등록하기
function insertBoardArticleReply($boardid, $idx, $thumwidth){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	//main 번호 가져오기
	$q_main = mysqli_query("select main,sub,depth,email,usereplyemail,pass,uselock,no from ".$tblid." where idx = '".$idx."'", $GLOBALS['dblink']);
	$row = mysqli_fetch_array($q_main);

	$c_main =						$row[0];
	$c_sub =						$row[1];
	$c_depth =					$row[2];
	$c_email =					$row[3];
	$c_usereplyemail =	$row[4];
	$c_pass =						$row[5];
	$c_lock =						$row[6];
	$c_no =						$row[7];

	if($c_no=="0"){
		jsMsg("공지글에는 답글을 달 수 없습니다.");
		return false;
	}

	//잠긴글에 답글을 달 경우 원 사용자가 볼수 있게 비밀번호를 원 글의 비밀번호로 입력
	if($c_lock =="Y"){
		$pass = $c_pass;
		$uselock = "Y";
	}else{
		$pass = mysqli_escape_string($_POST[pass]);
		$uselock = mysqli_escape_string($_POST[uselock]=="Y"?"Y":"N");
	}

	$main = $c_main;
	$sub = $c_sub + 1;
	$depth = $c_depth + 1;

	mysqli_query("UPDATE ".$tblid." set sub=sub+1 where no='1' and main='$main' and sub>'$c_sub'", $GLOBALS['dblink']);


	if($_POST[wdate]) {
		$sql_add = " wdate='".mysqli_escape_string($_POST[wdate])."' ";
	} else {
		$sql_add = " wdate=now() ";
	}

	//게시판 테이블에 입력
	$sql = "INSERT INTO ".$tblid." set
		no='1',
		main='$main',
		sub='$sub',
		depth='$depth',
		w_user='".$_POST[w_user_id]."',
		r_user='".$_POST[r_user_id]."',
		name='".mysqli_escape_string($_POST[name])."',
		pass='".$pass."',
		homepage='".mysqli_escape_string($_POST[homepage])."',
		email='".mysqli_escape_string($_POST[email])."',
		subject='".mysqli_escape_string(str_replace("\"","'",$_POST[subject]))."',
		contents='".mysqli_escape_string($_POST[contents])."',
		usereplyemail='".mysqli_escape_string($_POST[usereplyemail]=="Y"?"Y":"N")."',
		usehtml='".mysqli_escape_string($_POST[usehtml]=="Y"?"Y":"N")."',
		category='".mysqli_escape_string($_POST[category])."',
		uselock='".$uselock."',
		hit='0',
		etc_1='".mysqli_escape_string($_POST[etc_1])."',
		etc_2='".mysqli_escape_string($_POST[etc_2])."',
		etc_3='".mysqli_escape_string($_POST[etc_3])."',
		etc_4='".mysqli_escape_string($_POST[etc_4])."',
		etc_5='".mysqli_escape_string($_POST[etc_5])."',
		ip='".$_SERVER[REMOTE_ADDR]."',
		schedule_date='".mysqli_escape_string($_POST[schedule_date])."',
		$sql_add
	";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$insert_idx = mysqli_insert_id($GLOBALS['dblink']);
	$total = mysqli_affected_rows($GLOBALS['dblink']);

	//파일처리
	inputBoardFiles($boardid, $insert_idx, $_FILES, $thumwidth);

	if($total > 0){
		// 글 등록시 메일링여부
		if ($c_usereplyemail=='Y'){
			if($_POST[usehtml] !='Y') $contents = nl2br($_POST[contents]);
			mailing($GLOBALS["_SITE"]["NAME"],$GLOBALS["_SITE"]["EMAIL"],$c_email,$_POST[subject],$contents);
		}

		return true;
	}else{
		return false;
	}
}

//게시물 삭제하기
function deleteBoardArticle($boardid, $idx){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;
	$tbl_comment = $GLOBALS["_conf_tbl"]["comment"];
	$tbl_board_product = $GLOBALS["_conf_tbl"]["board_product"];
	//삭제권한 설정
	$deletePerm = false;


	//관리자는 그냥 통과
	if($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT" || @in_array("board_manage",$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["AUTH"])){
		$deletePerm = true;
	}
	// 한페이지 admin 통과
	if ( $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"] == 'admin' ) {
		$deletePerm = true;
	}
	//기존정보와 비밀번호를 비교 - 수정할때와 다른 함수를 씀 (파일 삭제 때문에)
	$arrArticleInfo = getBoardArticleView($boardid, $category, $idx, "delete");

	if($arrArticleInfo["list"][0]["pass"]==trim($_POST['pass'])){
		$deletePerm = true;
	}

	if($deletePerm==true){
		//게시판 테이블 지정
		$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

		//게시판 테이블에서 삭제
		$sql = "DELETE FROM ".$tblid."
			WHERE idx='".$idx."'
		";

		$rs = mysqli_query($GLOBALS['dblink'], $sql);
		$total = mysqli_affected_rows($GLOBALS['dblink']);

		//파일삭제 코딩 시작
		for($i=0;$i<$arrArticleInfo["total_files"];$i++){
			//디비에서 파일정보 삭제
			mysqli_query("DELETE FROM ".$GLOBALS["_conf_tbl"]["board_files"]." WHERE boardid='".$boardid."' AND idx='".$arrArticleInfo["files"][$i]['idx']."' ", $GLOBALS['dblink']);
			//디스크에서 파일 삭제
			@unlink($GLOBALS["_SITE"]["BOARD_DATA"] . "/".$boardid."/".$arrArticleInfo["files"][$i]['re_name']);
			//썸네일 삭제
			//if($arrArticleInfo["files"][$i]["type"]=="image/pjpeg" || $arrArticleInfo["files"][$i]["type"]=="image/x-png" || $arrArticleInfo["files"][$i]["type"]=="image/jpeg" || $arrArticleInfo["files"][$i]["type"]=="image/png" || $arrArticleInfo["files"][$i]["type"]=="image/gif"){
			//	@unlink($GLOBALS["_SITE"]["BOARD_DATA"] . "/".$boardid."/t_".$arrArticleInfo["files"][$i]['re_name']);
			//}
		}
		//파일삭제 코딩 종료

		// 통합 검색 삭제
		mysqli_query($GLOBALS['dblink'], "DELETE FROM ".$GLOBALS["_SITE"]["BOARD_PREWORD"] . "total"." WHERE idx='".$arrArticleInfo["list"][0]['sidx']."' ");

		//댓글 삭제
		mysqli_query("DELETE FROM ".$tbl_comment." WHERE boardid='".$boardid."' AND board_idx='".$idx."' ", $GLOBALS['dblink']);

		//메인 event
		if($boardid == "event1" || $boardid == "event2") {
			mysqli_query("DELETE FROM tbl_board_tmp WHERE boardid='".$boardid."' AND b_idx='".$idx."' ", $GLOBALS['dblink']);
		}
		if($boardid != "total"){
			// 통합 검색 삭제
			mysqli_query($GLOBALS['dblink'], "DELETE FROM ".$GLOBALS["_SITE"]["BOARD_PREWORD"] . "total"." WHERE idx='".$arrArticleInfo["list"][0]['sidx']."' ");
		}


		if($total > 0){
			return true;
		}else{
			return false;
		}
	}else{
		jsMsg("비밀번호가 일치하지 않습니다." );
		return false;
	}
}

//관리자 게시물 삭제시
function deleteBoardAdmin($boardid, $idx){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;
	$tbl_comment = $GLOBALS["_conf_tbl"]["comment"];
	$tbl_board_product = $GLOBALS["_conf_tbl"]["board_product"];

	//삭제권한 설정
	$deletePerm = false;

	//관리자는 그냥 통과
	if($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT" || @in_array("board_manage",$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["AUTH"])){
		$deletePerm = true;
	}

	$arrArticleInfo = getBoardArticleView($boardid, $category, $idx, "delete");

	if($arrArticleInfo["list"][0]["w_user"]==trim($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"])){
		$deletePerm = true;
	}


	if($deletePerm==true){
		//게시판 테이블 지정
		$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

		//게시판 테이블에서 삭제
		$sql = "DELETE FROM ".$tblid." WHERE idx in (".$idx.")";

		$rs = mysqli_query($GLOBALS['dblink'], $sql);
		$total = mysqli_affected_rows($GLOBALS['dblink']);

		if( $boardid=="ktoabiz" ){
			$sql_ktoaresults = "";
			$sql_ktoaresults = "DELETE FROM tbl_board_ktoaresults WHERE biz_idx in (".$idx.")";

	 		$rs = mysqli_query($GLOBALS['dblink'], $sql_ktoaresults);
		}
		if($boardid != "total"){
			// 통합 검색 삭제
			mysqli_query("DELETE FROM ".$GLOBALS["_SITE"]["BOARD_PREWORD"] . "total"." WHERE idx='".$arrArticleInfo["list"][0]['sidx']."' ", $GLOBALS['dblink']);
		}

		if($total > 0){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}


//관리자 게시물 삭제시
function updownBoardAdmin($boardid, $main, $updown){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	$sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
    $sql .= "WHERE main = '$main' ";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
	//echo $sql;
    $total_rs = mysqli_num_rows($rs);

    if($total_rs > 0){
        for($i=0; $i < $total_rs; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);
        }
    }

	if($updown=="up"){
		$sql  = "SELECT * FROM $tblid WHERE main > '$main' order by main asc limit 0,1 ";
		$rs = mysqli_query($GLOBALS['dblink'], $sql);
		$total_rs = mysqli_num_rows($rs);

		if($total_rs > 0){
			$row = mysqli_fetch_assoc($rs);
			$sql = "update ".$tblid." set main='$main' WHERE idx in (".$row["idx"].")";
			//echo $sql;
			$rs = mysqli_query($GLOBALS['dblink'], $sql);

			$sql = "update ".$tblid." set main='".$row["main"]."' WHERE idx in (".$list['list'][0]["idx"].")";
			$rs = mysqli_query($GLOBALS['dblink'], $sql);
		}
	}else{
		$sql  = "SELECT * FROM $tblid WHERE main < '$main' order by main desc limit 0,1 ";
		$rs = mysqli_query($GLOBALS['dblink'], $sql);
		$total_rs = mysqli_num_rows($rs);

		if($total_rs > 0){
			$row = mysqli_fetch_assoc($rs);
			$sql = "update ".$tblid." set main='$main' WHERE idx in (".$row["idx"].")";
			$rs = mysqli_query($GLOBALS['dblink'], $sql);

			$sql = "update ".$tblid." set main='".$row["main"]."' WHERE idx in (".$list['list'][0]["idx"].")";
			$rs = mysqli_query($GLOBALS['dblink'], $sql);
		}
	}

	if($total_rs > 0){
		return true;
	}else{
		return false;
	}

}

//게시물 가져오기 - id
function getBoardArticleView($boardid, $category, $idx, $mode="read"){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;
	$que_category = "";
	//카테고리가 있을경우
	if($category !=""){
		$que_category = " and category='$category' ";
	}


	//조회수 먼저 업데이트
	if($mode=="read"){
		$sql  = "UPDATE $tblid SET ";
		$sql .= " hit = hit + 1 ";
		$sql .= "WHERE idx = '".$idx."' $que_category ";
		$rs = mysqli_query($GLOBALS['dblink'], $sql);
	}

    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
	if($_REQUEST["sidx"] != ""){
		$sql .= "WHERE sidx = '".$_REQUEST["sidx"]."' ".$que_category;
	}else{
		$sql .= "WHERE idx = '".$idx."' ".$que_category;
	}
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
	//echo $sql;
    $total_rs = mysqli_num_rows($rs);

    if($total_rs > 0){
        $list['total'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);
			//html 사용여부 체크-> 읽기 페이지에서만
			$list['list'][$i]['contents'] = str_replace("’","'",$list['list'][$i]['contents']);
			if($mode=="read" && $list['list'][$i]['usehtml']!='Y'){
				$list['list'][$i]['contents'] = nl2br(htmlspecialchars($list['list'][$i]['contents']));
			}
        }
    }else{
        $list['total'] = 0;
    }


	//이전글, 다음글은 읽기 모드일때만
	if($mode=="read"){
		//이전글 정보 가져오기
		$sql  = "SELECT max(idx) ";
		$sql .= "FROM $tblid ";
		$sql .= "WHERE idx < '$idx' $que_category ";
		$rs = mysqli_query($GLOBALS['dblink'], $sql);
		$prev = mysqli_result($rs,0,0);
		if($prev > 0){
			$list["prev"]["idx"] = $prev;

			$sql  = "SELECT idx, name, subject, hit, wdate  ";
			$sql .= "FROM $tblid ";
			$sql .= "WHERE idx = '$prev' $que_category ";
			$rs = mysqli_query($GLOBALS['dblink'], $sql);

			$list["prev"] = mysqli_fetch_assoc($rs);
		}else{
			$list["prev"]["idx"] = 0;
		}


		//다음글 정보 가져오기
		$sql  = "SELECT min(idx) ";
		$sql .= "FROM $tblid ";
		$sql .= "WHERE idx > '$idx' $que_category ";
		$rs = mysqli_query($GLOBALS['dblink'], $sql);
		$next = mysqli_result($rs,0,0);
		if($next > 0){
			$list["next"]["idx"] = $next;

			$sql  = "SELECT idx, name, subject, hit, wdate  ";
			$sql .= "FROM $tblid ";
			$sql .= "WHERE idx = '$next' $que_category ";
			$rs = mysqli_query($GLOBALS['dblink'], $sql);

			$list["next"] = mysqli_fetch_assoc($rs);
		}else{
			$list["next"]["idx"] = 0;
		}
	}


	//파일정보 가져오기
    $sql  = "SELECT * ";
    $sql .= "FROM ".$GLOBALS["_conf_tbl"]["board_files"]." ";
    $sql .= "WHERE boardid = '$boardid' ";
    $sql .= "AND b_idx = '$idx' order by idx";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_num_rows($rs);

    if($total_rs > 0){
        $list['total_files'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
            $list['files'][$i] = mysqli_fetch_assoc($rs);
        }
    }else{
        $list['total_files'] = 0;
    }

    return $list;
}

//게시물 가져오기 - 서울대학교
function getBoardArticleSNU($boardid, $id){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
    $sql .= "WHERE w_user = '$id' order by idx desc ";
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

//게시물 가져오기 - id
function getBoardArticleSchedule($boardid, $date){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
    $sql .= "WHERE schedule_date = '$date' ";
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

//게시물 가져오기 - id
function getBoardArticleTime($boardid, $date, $category){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
    $sql .= "WHERE schedule_date = '$date' and category='$category' ";
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

//게시물 가져오기 - id
function getBoardArticleapp($boardid, $s_idx){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
    $sql .= "WHERE s_idx = '$s_idx' ";
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

//게시물 가져오기 - id
function getBoardListRes($boardid, $etc_1, $date){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
    $sql .= "WHERE schedule_date = '$date' and etc_1='$etc_1' ";
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

//게시물 가져오기 - id
function getBoardScheduleTime($boardid, $date){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
    $sql .= "WHERE schedule_date = '$date' order by etc_1 asc";
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

function getBoardScheduleTimeCate($boardid, $date, $category){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

    $sql  = "SELECT * ";
    $sql .= "FROM $tblid ";
    $sql .= "WHERE schedule_date = '$date' AND category = '$category'  order by etc_1 asc";
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



//글잠금 해제
function unlockBoardArticle($boardid, $idx, $pass){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	$pass = MD5( $pass );

	$sql  = "SELECT * ";
	$sql .= "FROM $tblid ";
	$sql .= "WHERE idx = '$idx' AND pass='$pass'";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	$total_rs = mysqli_num_rows($rs);

	if($total_rs > 0){
		return true;
	}else{
		return false;
	}
}


//파일정보 가져오기
function getArticleFileListInfo($boardid, $b_idx){
    $sql  = "SELECT * ";
    $sql .= "FROM " .$GLOBALS["_conf_tbl"]["board_files"]." ";
    $sql .= "WHERE boardid = '$boardid' ";
    $sql .= "AND b_idx = '$b_idx' ";
//	echo $sql;
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


//파일정보 가져오기
function getArticleFileInfo($boardid, $b_idx, $idx){
    $sql  = "SELECT * ";
    $sql .= "FROM " .$GLOBALS["_conf_tbl"]["board_files"]." ";
    $sql .= "WHERE boardid = '$boardid' ";
    $sql .= "AND b_idx = '$b_idx' ";
    $sql .= "AND idx = '$idx' ";
//	echo $sql;
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

//파일정보 가져오기
function getArticleFileInfoImage($boardid, $idx){
    $sql  = "SELECT * ";
    $sql .= "FROM " .$GLOBALS["_conf_tbl"]["board_files"]." ";
    $sql .= "WHERE boardid = '$boardid' ";
    $sql .= "AND idx = '$idx' ";
//	echo $sql;
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

//파일정보 가져오기
function getPatentFileInfo($s_idx, $idx){
    $sql  = "SELECT * FROM tbl_board_sutechnology_patent ";
    $sql .= "WHERE s_idx = '$s_idx' ";
    $sql .= "AND idx = '$idx' ";
//	echo $sql;
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

//최근게시물 목록 가져오기
function getBoardMember($boardid){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

    $sql = "SELECT distinct subject FROM $tblid order by subject desc";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total = mysqli_num_rows($rs);

    if($total > 0){
        $list['total'] = $total;
	    $rs = mysqli_query($GLOBALS['dblink'], $sql);

        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }

    return $list;
}

//게시판 파일처리
## function inputBoardFiles($boardid, $idx, $_FILES, $thumwidth){
function inputBoardFiles($boardid, $idx, $thumwidth){
	for($i=0;$i<count($_FILES['upfiles']['error']);$i++){
		if ($_FILES['upfiles']['error'][$i] == 0){
		    //확장자 검사후 파일이름 생성
			if(isset($_POST['memo_name'][$i])){
				$memo = $_POST['memo_name'][$i];
			}else{
				$memo = "";
			}
			$filename = $_FILES['upfiles']['name'][$i];
		    $attach_ext = explode(".",$filename);
		    $extension = $attach_ext[sizeof($attach_ext)-1];
		    $extension = strtolower($extension);
		    $filerename = $memo."_".md5(mktime()) . $i . "." . $extension;
	  		$filesize = $_FILES['upfiles']['size'][$i];
	  		$filetype = $_FILES['upfiles']['type'][$i];

		    // 파일 확장자 검사
		    if(!strcmp($extension,"htm") ||!strcmp($extension,"html") ||!strcmp($extension,"phtml") ||!strcmp($extension,"php") ||!strcmp($extension,"php3") ||!strcmp($extension,"php4") ||!strcmp($extension,"inc") ||!strcmp($extension,"pl") ||!strcmp($extension,"cgi")){
				jsMsg("not allowed file extension");
		        jsHistory("-1");
		    }

			if (is_uploaded_file($_FILES['upfiles']['tmp_name'][$i])) {
				move_uploaded_file ($_FILES['upfiles']['tmp_name'][$i], $GLOBALS["_SITE"]["BOARD_DATA"] . "/".$boardid."/".$filerename);
				//썸네일 만들기
				//if($filetype=="image/pjpeg" || $filetype=="image/x-png" || $filetype=="image/jpeg" || $filetype=="image/png" || $filetype=="image/gif"){
				//	@MakeThum($GLOBALS["_SITE"]["BOARD_DATA"] . "/".$boardid."/".$filerename, $GLOBALS["_SITE"]["BOARD_DATA"] . "/".$boardid."/t_".$filerename, $thumwidth);
				//}
			}

			$sql = "insert into ".$GLOBALS["_conf_tbl"]["board_files"]." set
				boardid='".$boardid."',/*게시판 아이디*/
				b_idx='".$idx."',/* 글 번호 id*/
				ori_name='".$filename."',/*파일원본이름*/
				re_name='".$filerename."',/*md5로 변환된 파일이름*/
				type='".$filetype."',/*파일타입*/
				ext ='".$extension."',/*파일확장자*/
				size='".$filesize."',/*첨부파일 용량*/
				wdate=now()
			";
			$rsf = mysqli_query($GLOBALS['dblink'], $sql);
		}
	}
}

//댓글 목록 가져오기
function getCommentList($boardid, $board_idx, $scale, $offset2=0, $page=""){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["comment"];

    $sql = "SELECT * FROM $tbl WHERE 1=1 ";

		if($boardid !=""){
			$sql .= " AND boardid='$boardid' ";
		}
		if($board_idx !=""){
			$sql .= " AND board_idx='$board_idx' ";
		}

		if($page == "admin") {
			$sql .= " order by idx desc ";
		} else {
			$sql .= " order by prino desc, depno ";
		}

    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_num_rows($rs);

	//echo $sql;

    if($total_rs > 0){
        $list['total'] = $total_rs;
        // 페이지 네비게이션 오프셋 지정.
		    if(!$offset2){
		        $offset2=0;
		    }else{
		        $offset2=$offset2;
		    }

		    // offset 이 전체 게시물수보다 작을때 offset 을 전체게시물 - 페이지당 보여줄 글 수로 offset 설정
		    if($total_rs<=$offset2){
		        $offset2 = $total_rs - $scale;
		    }

				//scale 0 으로 지정시에는 전체 가져옴
				if($scale > 0){
		    	$sql .= " limit $offset2, $scale ";
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
    }

    return $list;
}

//댓글 등록하기
function insertComment($boardid, $board_idx){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["comment"];

	if($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["ID"]) {
		$user_id = $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["ID"];
		$user_name = $GLOBALS["_SITE"]["NAME"];
	} else {
		$user_id = $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"];
		$user_name = $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["NAME"];
	}

	$arrInfo = getBoardArticleView($boardid, "", $board_idx, "comment");

	$sql = "select max(prino) as prino from ".$tbl." where boardid='$boardid' and board_idx='$board_idx' ";
	$result = mysqli_query($sql) or error(mysqli_error());
	if($row = mysqli_fetch_array($result)){
		$prino = $row[prino] + 1;
	}
	$grpno = $prino;

	if($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["ID"] || $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]) {
		//댓글 테이블에 입력
		$sql = "INSERT INTO ".$tbl." set
			boardid='$boardid',
			board_idx='$board_idx',
			prino='".$grpno."',
			user_id='".$user_id."',
			user_name='".$user_name."',
			comment='".mysqli_escape_string($_POST[comment])."',
			ip='".$_SERVER[REMOTE_ADDR]."',
			wdate=now()
		";

		$rs = mysqli_query($GLOBALS['dblink'], $sql);
		$insert_idx = mysqli_insert_id($GLOBALS['dblink']);
	}
	$total = mysqli_affected_rows($GLOBALS['dblink']);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//댓글 수정하기
function updateComment($boardid, $board_idx, $idx){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["comment"];

	//댓글 테이블에 입력
	$sql = "UPDATE ".$tbl." set
		comment='".mysqli_escape_string($_POST[comment])."',
		ip='".$_SERVER[REMOTE_ADDR]."'
		Where boardid='$boardid' and board_idx='$board_idx' and idx='".$idx."'
	";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_affected_rows($GLOBALS['dblink']);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//댓글에 댓글 등록하기
function replyComment($boardid, $board_idx, $idx){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["comment"];

	if($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["ID"]) {
		$user_id = $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["ID"];
		$user_name = $GLOBALS["_SITE"]["NAME"];
	} else {
		$user_id = $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"];
		$user_name = $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["NICK"]?$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["NICK"]:$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["NAME"];
	}

	$sql = "select prino,depno from ".$tbl." where idx='$idx'";
	$result = mysqli_query($sql) or error(mysqli_error());
	$row = mysqli_fetch_array($result);
	$prino = $row[prino];
	$depno = ++$row[depno];

	$sql = "update ".$tbl." set prino = prino+1 where boardid='$boardid' and board_idx='$board_idx' and prino >= '$prino'";
	$result = mysqli_query($GLOBALS['dblink'], $sql);

	//댓글 테이블에 입력
	$sql = "INSERT INTO ".$tbl." set
		boardid='$boardid',
		board_idx='$board_idx',
		prino='".$prino."',
		depno='".$depno."',
		user_id='".$user_id."',
		user_name='".$user_name."',
		comment='".mysqli_escape_string($_POST[comment])."',
		ip='".$_SERVER[REMOTE_ADDR]."',
		wdate=now()
	";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_affected_rows($GLOBALS['dblink']);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}


//댓글 가져오기 - id
function getCommentInfo($idx){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["comment"];

	$sql  = "SELECT * ";
	$sql .= "FROM $tbl ";
	$sql .= "WHERE idx = '$idx' ";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	//echo $sql;

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

//댓글 삭제하기
function deleteComment($idx){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["comment"];

	//삭제권한 설정
	$deletePerm = false;

	//관리자는 그냥 통과
	if($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT" || @in_array("board_manage",$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["ADMIN"]["AUTH"])){
		$deletePerm = true;
	}

	//기존정보
	$arrArticleInfo = getCommentInfo($idx);

	if($arrArticleInfo["list"][0]["user_id"]==$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]){
		$deletePerm = true;
	}


	if($deletePerm==true){
		//댓글 테이블에서 삭제
		$sql = "DELETE FROM ".$tbl."
			WHERE idx='$idx'
		";

		$rs = mysqli_query($GLOBALS['dblink'], $sql);
		$total = mysqli_affected_rows($GLOBALS['dblink']);

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

//==================================================
// 첫화면 인텍스 메인화면에 리스트와 이미지 부르기
// 200900604
//===================================================

function getBoardLastNImage($boardid, $limit,$category="",$etc_2=""){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	//카테고리가 있을경우
	if($category !=""){
			$que_category = " and A.category='$category' ";
	}
	if($etc_2 !=""){
			$que_category = " and A.etc_2='$etc_2' ";
	}

    //목록
    $sql  = "SELECT A.*, B.idx AS f_idx, B.boardid, B.b_idx, B.ori_name, B.re_name, B.type, B.size ";
    $sql .= "FROM $tblid A LEFT JOIN ".$GLOBALS["_conf_tbl"]["board_files"]." B ON B.boardid='$boardid' AND A.idx=B.b_idx AND B.ext IN('jpg','gif','png')";
    $sql .= "WHERE A.no='1' $que_where $que_category group by A.idx DESC LIMIT $limit";


	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	// offset 을 이용한 limit 가 적용된 갯수
	$total = mysqli_num_rows($rs);
	$list['list']['total'] = $total;
	// 페이지 네비게이션 오프셋 지정.

    if($total > 0){
        $list['total'] = $total;
        // 페이지 네비게이션 오프셋 지정.

		for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);
    	}
    }else{
        $list['total'] = 0;
    }

    return $list;
}


//==============================================
// 게시물 첨부파일,메모카운트
// 20090507
// 첨부파일조인후 메모카운트는 배열에 추가저장
// 피노갤러리에서 가져옴
//==============================================
function getBoardListBaseNFileNMemoCnt($boardid, $category, $sw="", $sk="", $scale, $offset=0){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	// 추가부분
	// 코멘트 테이블
	$tbl_comment = $GLOBALS["_conf_tbl"]["comment"];

	//카테고리가 있을경우
	if($category !=""){
		$que_category = " and A.category='$category' ";
	}

	//검색키워드가 있을경우
	if($sk !=""){
		switch($sw){
		case("n") :
			$que_where = "and A.name like '%$sk%'";
		break;
		case("s") :
			$que_where = "and A.subject like '%$sk%'";
		break;
		case("c") :
			$que_where = "and A.contents like '%$sk%'";
		break;
		case("ltdNm") :
			$que_where = "and A.etc_7 like '%$sk%'";
		break;
		case("a") :
		default :
			$que_where = "and (A.name like '%$sk%' or A.subject like '%$sk%' or A.contents like '%$sk%')";
		}

		// 검색시 영역을 분할하여 검색=> 속도향상용
		$sql = "select count(A.idx) as cnt from $tblid A";
		$rs = mysqli_query($GLOBALS['dblink'], $sql);

		$row = mysqli_fetch_assoc($rs);
		$q_total = $row[cnt];
		$q_start = $q_total - 10000; // 최근 10000건만 검색

		if($q_total>10000){
			$q_limit = " A.idx between " . $q_start . " and " . $q_total . " ";
		}
		// 검색시 영역을 분할하여 검색=> 속도향상용
	}



	//카운트
	$sql = "select count(A.idx) from $tblid A WHERE A.no='1' $q_limit $que_where $que_category ";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $row = mysqli_fetch_row($rs);
    $total_rs = $row[0];


	//목록
    $sql  = "SELECT A.*, B.idx AS f_idx, B.boardid, B.b_idx, B.ori_name, B.re_name, B.type, B.size ";
    $sql .= "FROM $tblid A LEFT JOIN ".$GLOBALS["_conf_tbl"]["board_files"]." B ON B.boardid='$boardid' AND A.idx=B.b_idx ";
    $sql .= "WHERE A.no='1' $q_limit $que_where $que_category group by A.idx";

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
				$sql .= " order by A.main limit $offset,$scale ";
			}else{
				$sql .= " order by A.main ";
			}



		    $rs = mysqli_query($GLOBALS['dblink'], $sql);

		    // offset 을 이용한 limit 가 적용된 갯수
		    $total = mysqli_num_rows($rs);
		    $list['list']['total'] = $total;
		    // 페이지 네비게이션 오프셋 지정.

			for($i=0; $i < $total; $i++){
				$list['list'][$i] = mysqli_fetch_assoc($rs);

				// 댓글 카운트 추가 부분
				$m_cnt_row = mysqli_fetch_row(mysqli_query("select count(idx) from $tbl_comment WHERE boardid='$boardid' AND board_idx='".$list['list'][$i][idx]."' "));
				$list['list'][$i][cmt_count] = $m_cnt_row[0];
			}


    }else{
        $list['total'] = 0;
    }
    return $list;
}
//easyUi json List
function getJsonList($boardid, $scale, $offset=0, $orderby="", $wheresql=""){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	if($orderby){
		$ordersql = $orderby;
	}else{
		$ordersql = "order by main desc" ;
	}

    $sql = "SELECT * FROM $tblid $wheresql $ordersql";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_num_rows($rs);


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
//			echo $sql;
		    //$list['row']['total'] = $total;
		    // 페이지 네비게이션 오프셋 지정.

        for($i=0; $i < $total; $i++){
            $list['rows'][$i] = mysqli_fetch_assoc($rs);
			$list['rows'][$i]["rownum"] = $total_rs-$i-$offset;
        }
    }else{
        $list['total'] = 0;
    }

    return $list;
}
//easyUi json List
function getJsonListFile($boardid, $scale, $offset=0, $orderby="", $wheresql=""){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	if($orderby){
		$ordersql = $orderby;
	}else{
		$ordersql = "order by A.idx desc" ;
	}

    $sql = "SELECT * FROM $tblid AS A $wheresql $ordersql";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_num_rows($rs);

	$sub_query = $GLOBALS["_conf_tbl"]["board_files"];

	$sql  = " SELECT A.*, B.idx AS f_idx, B.boardid, B.b_idx, B.ori_name, B.re_name, B.type, B.size ";
	$sql .= " FROM $tblid A LEFT JOIN ".$sub_query." B ON B.boardid='$boardid' AND A.idx=B.b_idx ";
	$sql .= " $wheresql group by A.idx";

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
				$sql .= " order by A.no, A.main, A.sub limit $offset,$scale ";
			}else{
				$sql .= " order by A.no, A.main, A.sub ";
			}

		    $rs = mysqli_query($GLOBALS['dblink'], $sql);

		    // offset 을 이용한 limit 가 적용된 갯수
		    $total = mysqli_num_rows($rs);
//			echo $sql;
		    //$list['row']['total'] = $total;
		    // 페이지 네비게이션 오프셋 지정.

        for($i=0; $i < $total; $i++){
            $list['rows'][$i] = mysqli_fetch_assoc($rs);
			$list['rows'][$i]["rownum"] = $total_rs-$i-$offset;
        }
    }else{
        $list['total'] = 0;
    }

    return $list;
}
//easyUi json List - 온라인 문의
function getJsonListOnline($boardid, $scale, $offset=0, $orderby="", $wheresql=""){
	//게시판 테이블 지정
	$tblid = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	if($orderby){
		$ordersql = $orderby;
	}else{
		$ordersql = "order by idx desc" ;
	}

    $sql = "SELECT * FROM $tblid $wheresql $ordersql";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_num_rows($rs);


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
//			echo $sql;
		    //$list['row']['total'] = $total;
		    // 페이지 네비게이션 오프셋 지정.

        for($i=0; $i < $total; $i++){
            $list['rows'][$i] = mysqli_fetch_assoc($rs);
			$list['rows'][$i]["rownum"] = $total_rs-$i-$offset;
			if($list['rows'][$i]["etc_1"]=="Y"){
				$list['rows'][$i]["etc_1"]="상담완료";
			}else{
				$list['rows'][$i]["etc_1"]="상담대기";
			}
			$list['rows'][$i]["etc_2"]=str_replace("||",", &nbsp;",$list['rows'][$i]["etc_2"]);
			$list['rows'][$i]["etc_2"]=str_replace("|","",$list['rows'][$i]["etc_2"]);
        }
    }else{
        $list['total'] = 0;
    }

    return $list;
}

//신청 취소- SNU
function CancleSNU($boardid, $idx){
	// 테이블 지정
	$tbl = $GLOBALS["_SITE"]["BOARD_PREWORD"] . $boardid;

	//댓글 테이블에 입력
	$sql = "UPDATE ".$tbl." set
		cancle_YN='Y',
		cancle_date='".date('Y-m-d')."'
		Where idx='".$idx."'
	";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_affected_rows($GLOBALS['dblink']);


	$sqltime="";
	if($boardid=="suconsulting"){
	    $sql  = "SELECT * FROM ".$tbl." WHERE idx = '".$idx."'";

		$rs = mysqli_query($GLOBALS['dblink'], $sql);
		$list['list'][0] = mysqli_fetch_assoc($rs);

		if($list['list'][0]['pass']=="14:00"){
			$sqltime="etc_8='Y'";
		}else if($list['list'][0]['pass']=="14:30"){
			$sqltime="etc_9='Y'";
		}else if($list['list'][0]['pass']=="15:00"){
			$sqltime="etc_10='Y'";
		}else if($list['list'][0]['pass']=="15:30"){
			$sqltime="etc_11='Y'";
		}else if($list['list'][0]['pass']=="16:00"){
			$sqltime="etc_12='Y'";
		}else if($list['list'][0]['pass']=="16:30"){
			$sqltime="etc_13='Y'";
		}else if($list['list'][0]['pass']=="17:00"){
			$sqltime="etc_14='Y'";
		}else if($list['list'][0]['pass']=="17:30"){
			$sqltime="etc_15='Y'";
		}
		$sql = "UPDATE tbl_board_sutechnology set ".$sqltime." where idx='".$list['list'][0]['etc_1']."'";

		$rs = mysqli_query($GLOBALS['dblink'], $sql);
	}

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//서울대특허정보
function inputPatentFiles($boardid, $idx, $thumwidth){
	for($i=0;$i<3;$i++){
		if ($_POST['patent_name'][$i]!=""){
		    //확장자 검사후 파일이름 생성
			if(isset($_POST['memo_name'][$i])){
				$memo = $_POST['memo_name'][$i];
			}else{
				$memo = "";
			}
			$filename = $_FILES['patentfiles']['name'][$i];
		    $attach_ext = explode(".",$filename);
		    $extension = $attach_ext[sizeof($attach_ext)-1];
		    $extension = strtolower($extension);
		    $filerename = $memo."_".md5(mktime()) . $i . "." . $extension;
	  		$filesize = $_FILES['patentfiles']['size'][$i];
	  		$filetype = $_FILES['patentfiles']['type'][$i];




			$patent_name=$_POST['patent_name'][$i];
			$patent_num=$_POST['patent_num'][$i];

		    // 파일 확장자 검사
		    if(!strcmp($extension,"htm") ||!strcmp($extension,"html") ||!strcmp($extension,"phtml") ||!strcmp($extension,"php") ||!strcmp($extension,"php3") ||!strcmp($extension,"php4") ||!strcmp($extension,"inc") ||!strcmp($extension,"pl") ||!strcmp($extension,"cgi")){
				jsMsg("not allowed file extension");
		        jsHistory("-1");
		    }

			if (is_uploaded_file($_FILES['patentfiles']['tmp_name'][$i])) {
				move_uploaded_file ($_FILES['patentfiles']['tmp_name'][$i], $GLOBALS["_SITE"]["BOARD_DATA"] . "/".$boardid."/".$filerename);
			}
			$sql = "insert into tbl_board_sutechnology_patent set
				s_idx='".$idx."',/* 글 번호 id*/
				patent_name='".$patent_name."',
				patent_num='".$patent_num."',
				ori_name='".$filename."',/*파일원본이름*/
				re_name='".$filerename."',/*md5로 변환된 파일이름*/
				type='".$filetype."',/*파일타입*/
				ext ='".$extension."',/*파일확장자*/
				size='".$filesize."',/*첨부파일 용량*/
				wdate=now()
			";
			$rsf = mysqli_query($GLOBALS['dblink'], $sql);
		}
	}
}

function replace_quotes($word){
	$tmp = str_replace("'","’",$word);
	return $tmp;
}


// ############################################모든 데이터를 다 변경할 때 혹은 삭제할 때 사용 하는 것이므로 사용에 주의하십시오. 해당 데이터는 복구가 불가능 합니다. #################################################//
function allBoardAlter(){
	$sql  = "SELECT TABLE_NAME AS tbl ";
    $sql .= "FROM INFORMATION_SCHEMA.TABLES ";
    $sql .= "WHERE TABLE_NAME LIKE 'tbl_board_%' AND NOT TABLE_NAME = 'tbl_board_info' AND NOT TABLE_NAME = 'tbl_board_file'";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_num_rows($rs);
	if($total > 0){
		for($i=0; $i < $total; $i++){
			$list['list'][$i] = mysqli_fetch_assoc($rs);
			$usql  = "alter table ".$list['list'][$i]["tbl"]." ADD COLUMN etc_yn ENUM('Y','N') DEFAULT 'N' NULL ";
			echo $usql."<br>";
			$urs = mysqli_query($GLOBALS['dblink'], $usql);
			//$utotal = mysqli_num_rows($urs);
		}
	}
	
}

function allBoardDataDel(){
	$sql  = "SELECT TABLE_NAME AS tbl ";
    $sql .= "FROM INFORMATION_SCHEMA.TABLES ";
    $sql .= "WHERE TABLE_NAME LIKE 'tbl_board_%' AND NOT TABLE_NAME = 'tbl_board_info'";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_num_rows($rs);
	if($total > 0){
		for($i=0; $i < $total; $i++){
			$list['list'][$i] = mysqli_fetch_assoc($rs);
			$usql  = "delete from ".$list['list'][$i]["tbl"]."  ";
			echo $usql."<br>";
			$urs = mysqli_query($GLOBALS['dblink'], $usql);
			//$utotal = mysqli_num_rows($urs);
		}
	}
	
}
// ############################################모든 데이터를 다 변경할 때 혹은 삭제할 때 사용 하는 것이므로 사용에 주의하십시오. 해당 데이터는 복구가 불가능 합니다. #################################################//

//기존 데이터 불러오기
function inputOldboardToNewBoard(){
	$sql  = "SELECT board_code ";
    $sql .= "FROM HPK_BOARD ";
    $sql .= "group by board_code";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_num_rows($rs);
	// 페이지 네비게이션 오프셋 지정.
	//echo $sql."<br><br>";
	for($i=0; $i < $total; $i++){
		$list['list'][$i] = mysqli_fetch_assoc($rs);
		if($list['list'][$i]["board_code"] !=""){
			$select_sql  = "SELECT * ";
			$select_sql .= "FROM HPK_BOARD ";
			$select_sql .= "where board_code = '".$list['list'][$i]["board_code"]."' ORDER BY idno ";
			$select_rs = mysqli_query($GLOBALS['dblink'], $select_sql);
			$select_total = mysqli_num_rows($select_rs);
			//echo $select_sql."<br><br>";
			for($j=0; $j < $select_total; $j++){
				$select_list['list'][$j] = mysqli_fetch_assoc($select_rs);

				$main = 99999999-$j;
				if($select_list['list'][$j]["notice_yn"] == "Y"){
					$setNo = "0";
				}else{
					$setNo = "1";
				}

		//		if(isset($_POST['wdate'])) {
		//			$sql_add = " wdate='".$_POST['wdate']."' ";
		//		} else {
		//			$sql_add = " wdate=now() ";
		//		}

				$duple_sql  = "SELECT * ";
				$duple_sql .= "FROM tbl_board_".$list['list'][$i]["board_code"]." ";
				$duple_sql .= "where sidx = '".$select_list['list'][$j]["idno"]."' ORDER BY idx ";
				$duple_rs = mysqli_query($GLOBALS['dblink'], $duple_sql);
				$duple_total = mysqli_num_rows($duple_rs);

				if($duple_total < 1){
					$insert_sql  = "INSERT INTO tbl_board_".$select_list['list'][$j]["board_code"]." set
						sidx='".$select_list['list'][$j]["idno"]."',
						no='$setNo',
						main='$main',
						sub='".$select_list['list'][$j]["p_idno"]."',
						depth='".$select_list['list'][$j]["sector_num"]."',
						w_user='".replace_quotes($select_list['list'][$j]["writer_name"])."',
						r_user='".replace_quotes($select_list['list'][$j]["writer_name"])."',
						name='".replace_quotes($select_list['list'][$j]["writer_name"])."',
						pass='".replace_quotes($select_list['list'][$j]["passwd"])."',
						homepage='".replace_quotes($select_list['list'][$j]["utv_url"])."',
						email='".replace_quotes($select_list['list'][$j]["email"])."',
						subject='".replace_quotes($select_list['list'][$j]["subject"])."',
						contents='".replace_quotes($select_list['list'][$j]["contents"])."',
						usereplyemail='".replace_quotes($select_list['list'][$j]["sendmail_yn"])."',
						usehtml='".replace_quotes($select_list['list'][$j]["editor_yn"])."',
						category='".replace_quotes($select_list['list'][$j]["category_idno"])."',
						uselock='".replace_quotes($select_list['list'][$j]["secret_yn"])."',
						hit='".$select_list['list'][$j]["hits"]."',
						etc_1='".replace_quotes($select_list['list'][$j]["board_code"])."',
						etc_2='".replace_quotes($select_list['list'][$j]["sub_board_code"])."',
						etc_3='".replace_quotes($select_list['list'][$j]["p_idno"])."',
						etc_4='".replace_quotes($select_list['list'][$j]["reg_user_id"])."',
						etc_5='".replace_quotes($select_list['list'][$j]["contents_add"])."',
						etc_yn='".replace_quotes($select_list['list'][$j]["sector_yn"])."',
						ip='".replace_quotes($select_list['list'][$j]["reg_ip"])."',
						schedule_date='0000-00-00',
					";
					if($select_list['list'][$j]["upt_date"] != ""){
						$insert_sql  .= "upt_date='".replace_quotes($select_list['list'][$j]["upt_date"])."',";
					}else{
						$insert_sql  .= "upt_date=now(),";
					}
					

					$insert_sql  .= "
						upt_user_id='".replace_quotes($select_list['list'][$j]["upt_user_id"])."',
						upt_ip='".replace_quotes($select_list['list'][$j]["upt_ip"])."',
						wdate='".replace_quotes($select_list['list'][$j]["reg_date"])."'
						";
					;
					//echo $insert_sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $insert_sql);
				}else{
					if($select_list['list'][$j]["notice_yn"] == "Y"){
						$setNo = "0";
					}else{
						$setNo = "1";
					}
					$insert_sql  = "update tbl_board_".$select_list['list'][$j]["board_code"]." set
						sidx='".$select_list['list'][$j]["idno"]."',
						no='$setNo',
						sub='".$select_list['list'][$j]["p_idno"]."',
						depth='".$select_list['list'][$j]["sector_num"]."',
						w_user='".replace_quotes($select_list['list'][$j]["writer_name"])."',
						r_user='".replace_quotes($select_list['list'][$j]["writer_name"])."',
						name='".replace_quotes($select_list['list'][$j]["writer_name"])."',
						pass='".replace_quotes($select_list['list'][$j]["passwd"])."',
						homepage='".replace_quotes($select_list['list'][$j]["utv_url"])."',
						email='".replace_quotes($select_list['list'][$j]["email"])."',
						subject='".replace_quotes($select_list['list'][$j]["subject"])."',
						contents='".replace_quotes($select_list['list'][$j]["contents"])."',
						usereplyemail='".replace_quotes($select_list['list'][$j]["sendmail_yn"])."',
						usehtml='".replace_quotes($select_list['list'][$j]["editor_yn"])."',
						category='".replace_quotes($select_list['list'][$j]["category_idno"])."',
						uselock='".replace_quotes($select_list['list'][$j]["secret_yn"])."',
						hit='".$select_list['list'][$j]["hits"]."',
						etc_1='".replace_quotes($select_list['list'][$j]["board_code"])."',
						etc_2='".replace_quotes($select_list['list'][$j]["sub_board_code"])."',
						etc_3='".replace_quotes($select_list['list'][$j]["p_idno"])."',
						etc_4='".replace_quotes($select_list['list'][$j]["reg_user_id"])."',
						etc_5='".replace_quotes($select_list['list'][$j]["contents_add"])."',
						etc_yn='".replace_quotes($select_list['list'][$j]["sector_yn"])."',
						ip='".replace_quotes($select_list['list'][$j]["reg_ip"])."',
						schedule_date='0000-00-00',
					";
					if($select_list['list'][$j]["upt_date"] != ""){
						$insert_sql  .= "upt_date='".replace_quotes($select_list['list'][$j]["upt_date"])."',";
					}else{
						$insert_sql  .= "upt_date=now(),";
					}
					

					$insert_sql  .= "
						upt_user_id='".replace_quotes($select_list['list'][$j]["upt_user_id"])."',
						upt_ip='".replace_quotes($select_list['list'][$j]["upt_ip"])."',
						wdate='".replace_quotes($select_list['list'][$j]["reg_date"])."'
						where sidx = '".$select_list['list'][$j]["idno"]."'
						";
					;
					//echo $insert_sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $insert_sql);
				}
			}
		}
	}
}

// 범위지정 데이터 가져오기
function inputOldboardToNewBoardNlimit($st=0,$ed=0){
	$sql  = "SELECT board_code ";
    $sql .= "FROM HPK_BOARD ";
    $sql .= "group by board_code";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_num_rows($rs);
	// 페이지 네비게이션 오프셋 지정.
	//echo $sql."<br><br>";
	for($i=0; $i < $total; $i++){
		$list['list'][$i] = mysqli_fetch_assoc($rs);
		if($list['list'][$i]["board_code"] !=""){
			$select_sql  = "SELECT * ";
			$select_sql .= "FROM HPK_BOARD ";
			$select_sql .= "where board_code = '".$list['list'][$i]["board_code"]."' ";
			if($st != 0 || $ed != 0){
				if($st != 0){
					$select_sql .= " AND idno >= $st ";
				}
				if($ed != 0){
					$select_sql .= " AND idno <= $ed ";
				}
			}
			$select_sql .= " ORDER BY idno ";
			$select_rs = mysqli_query($GLOBALS['dblink'], $select_sql);
			$select_total = mysqli_num_rows($select_rs);
			//echo $select_sql."<br><br>";
			for($j=0; $j < $select_total; $j++){
				$select_list['list'][$j] = mysqli_fetch_assoc($select_rs);

				$main = 99999999-$j;
				if($select_list['list'][$j]["notice_yn"] == "Y"){
					$setNo = "0";
				}else{
					$setNo = "1";
				}

		//		if(isset($_POST['wdate'])) {
		//			$sql_add = " wdate='".$_POST['wdate']."' ";
		//		} else {
		//			$sql_add = " wdate=now() ";
		//		}

				$duple_sql  = "SELECT * ";
				$duple_sql .= "FROM tbl_board_".$list['list'][$i]["board_code"]." ";
				$duple_sql .= "where sidx = '".$select_list['list'][$j]["idno"]."' ORDER BY idx ";
				$duple_rs = mysqli_query($GLOBALS['dblink'], $duple_sql);
				$duple_total = mysqli_num_rows($duple_rs);

				if($duple_total < 1){
					$insert_sql  = "INSERT INTO tbl_board_".$select_list['list'][$j]["board_code"]." set
						sidx='".$select_list['list'][$j]["idno"]."',
						no='$setNo',
						main='$main',
						sub='".$select_list['list'][$j]["p_idno"]."',
						depth='".$select_list['list'][$j]["sector_num"]."',
						w_user='".replace_quotes($select_list['list'][$j]["writer_name"])."',
						r_user='".replace_quotes($select_list['list'][$j]["writer_name"])."',
						name='".replace_quotes($select_list['list'][$j]["writer_name"])."',
						pass='".replace_quotes($select_list['list'][$j]["passwd"])."',
						homepage='".replace_quotes($select_list['list'][$j]["utv_url"])."',
						email='".replace_quotes($select_list['list'][$j]["email"])."',
						subject='".replace_quotes($select_list['list'][$j]["subject"])."',
						contents='".replace_quotes($select_list['list'][$j]["contents"])."',
						usereplyemail='".replace_quotes($select_list['list'][$j]["sendmail_yn"])."',
						usehtml='".replace_quotes($select_list['list'][$j]["editor_yn"])."',
						category='".replace_quotes($select_list['list'][$j]["category_idno"])."',
						uselock='".replace_quotes($select_list['list'][$j]["secret_yn"])."',
						hit='".$select_list['list'][$j]["hits"]."',
						etc_1='".replace_quotes($select_list['list'][$j]["board_code"])."',
						etc_2='".replace_quotes($select_list['list'][$j]["sub_board_code"])."',
						etc_3='".replace_quotes($select_list['list'][$j]["p_idno"])."',
						etc_4='".replace_quotes($select_list['list'][$j]["reg_user_id"])."',
						etc_5='".replace_quotes($select_list['list'][$j]["contents_add"])."',
						etc_yn='".replace_quotes($select_list['list'][$j]["sector_yn"])."',
						ip='".replace_quotes($select_list['list'][$j]["reg_ip"])."',
						schedule_date='0000-00-00',
					";
					if($select_list['list'][$j]["upt_date"] != ""){
						$insert_sql  .= "upt_date='".replace_quotes($select_list['list'][$j]["upt_date"])."',";
					}else{
						$insert_sql  .= "upt_date=now(),";
					}
					

					$insert_sql  .= "
						upt_user_id='".replace_quotes($select_list['list'][$j]["upt_user_id"])."',
						upt_ip='".replace_quotes($select_list['list'][$j]["upt_ip"])."',
						wdate='".replace_quotes($select_list['list'][$j]["reg_date"])."'
						";
					;
					echo $insert_sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $insert_sql);
				}else{
					if($select_list['list'][$j]["notice_yn"] == "Y"){
						$setNo = "0";
					}else{
						$setNo = "1";
					}
					$insert_sql  = "update tbl_board_".$select_list['list'][$j]["board_code"]." set
						sidx='".$select_list['list'][$j]["idno"]."',
						no='$setNo',
						sub='".$select_list['list'][$j]["p_idno"]."',
						depth='".$select_list['list'][$j]["sector_num"]."',
						w_user='".replace_quotes($select_list['list'][$j]["writer_name"])."',
						r_user='".replace_quotes($select_list['list'][$j]["writer_name"])."',
						name='".replace_quotes($select_list['list'][$j]["writer_name"])."',
						pass='".replace_quotes($select_list['list'][$j]["passwd"])."',
						homepage='".replace_quotes($select_list['list'][$j]["utv_url"])."',
						email='".replace_quotes($select_list['list'][$j]["email"])."',
						subject='".replace_quotes($select_list['list'][$j]["subject"])."',
						contents='".replace_quotes($select_list['list'][$j]["contents"])."',
						usereplyemail='".replace_quotes($select_list['list'][$j]["sendmail_yn"])."',
						usehtml='".replace_quotes($select_list['list'][$j]["editor_yn"])."',
						category='".replace_quotes($select_list['list'][$j]["category_idno"])."',
						uselock='".replace_quotes($select_list['list'][$j]["secret_yn"])."',
						hit='".$select_list['list'][$j]["hits"]."',
						etc_1='".replace_quotes($select_list['list'][$j]["board_code"])."',
						etc_2='".replace_quotes($select_list['list'][$j]["sub_board_code"])."',
						etc_3='".replace_quotes($select_list['list'][$j]["p_idno"])."',
						etc_4='".replace_quotes($select_list['list'][$j]["reg_user_id"])."',
						etc_5='".replace_quotes($select_list['list'][$j]["contents_add"])."',
						etc_yn='".replace_quotes($select_list['list'][$j]["sector_yn"])."',
						ip='".replace_quotes($select_list['list'][$j]["reg_ip"])."',
						schedule_date='0000-00-00',
					";
					if($select_list['list'][$j]["upt_date"] != ""){
						$insert_sql  .= "upt_date='".replace_quotes($select_list['list'][$j]["upt_date"])."',";
					}else{
						$insert_sql  .= "upt_date=now(),";
					}
					

					$insert_sql  .= "
						upt_user_id='".replace_quotes($select_list['list'][$j]["upt_user_id"])."',
						upt_ip='".replace_quotes($select_list['list'][$j]["upt_ip"])."',
						wdate='".replace_quotes($select_list['list'][$j]["reg_date"])."'
						where sidx = '".$select_list['list'][$j]["idno"]."'
						";
					;
					echo $insert_sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $insert_sql);
				}
			}
		}
	}
}

// 기존 파일 불러오기
function inputOldFileToNewFile($st=0, $ed=0){
	$sql  = "SELECT * ";
    $sql .= " FROM HPK_BOARD_FILE ";
	if($st!=0 || $ed!=0){
		$sql .= " WHERE idno >= $st AND idno <= $ed ";
	}
    //$sql .= "group by board_code";
	$sql .= " order by idno";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_num_rows($rs);
	// 페이지 네비게이션 오프셋 지정.
	echo $sql."<br>".$total."<br>";
	for($i=0; $i < $total; $i++){
		$list['list'][$i] = mysqli_fetch_assoc($rs);
		//var_dump($list);
		$file_type = explode(".",$list['list'][$i]["file_name_saved"]);
		if($list['list'][$i]["board_code"] !="" && $list['list'][$i]["board_idno"] !=""){
			$select_sql  = "SELECT * ";
			$select_sql .= "FROM HPK_BOARD ";
			$select_sql .= "where idno = '".$list['list'][$i]["board_idno"]."' ORDER BY idno ";
			$select_rs = mysqli_query($GLOBALS['dblink'], $select_sql);
			$select_total = mysqli_num_rows($select_rs);
			echo $select_sql."<br><br>";
			for($j=0; $j < $select_total; $j++){
				$select_list['list'][$j] = mysqli_fetch_assoc($select_rs);
				$select_Nsql  = "SELECT * ";
				$select_Nsql .= "FROM tbl_board_".$select_list['list'][$j]["board_code"]." ";
				$select_Nsql .= "where sidx = '".$select_list['list'][$j]["idno"]."' ORDER BY idx ";
				$select_Nrs = mysqli_query($GLOBALS['dblink'], $select_Nsql);
				echo $select_Nsql."<br><br>";
				$select_Ntotal = mysqli_num_rows($select_Nrs);

				for($k=0;$k < $select_Ntotal;$k++){
					$select_listN['list'][$k] = mysqli_fetch_assoc($select_Nrs);
					$insert_sql  = "INSERT INTO tbl_board_files set
						boardid='".$select_list['list'][$j]["board_code"]."',
						b_idx='".$select_listN['list'][$k]["idx"]."',
						ori_name='".$list['list'][$i]["file_name"]."',
						re_name='".$list['list'][$i]["file_name_saved"]."',
						type='".$file_type[count($file_type)-1]."',
						ext='".$file_type[count($file_type)-1]."',
						size='".$list['list'][$i]["file_size"]."',
						download=0,
						wdate='".$list['list'][$i]["reg_date"]."'
					";
					echo $insert_sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $insert_sql);
				}
			}
			
		}
	}
}

// 보드 내용을 tbl_board_total로 이동
function inputOldBoardToNewBoardTotal(){
	$sql  = "SELECT * ";
	$sql .= "FROM HPK_BOARD ";
	$sql .= "order by idno";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_num_rows($rs);
	echo $total."<br>";
	for($i=0; $i < $total; $i++){
		$list['list'][$i] = mysqli_fetch_assoc($rs);
		$insert_sql  = "INSERT INTO tbl_board_total set
			idx=".$list['list'][$i]["idno"].",
			board_id='".replace_quotes($list['list'][$i]["board_code"])."',
			subject='".replace_quotes($list['list'][$i]["subject"])."',
			
			reg_user_id='".replace_quotes($list['list'][$i]["reg_user_id"])."',
		";
		if($list['list'][$i]["reg_ip"] !=""){
			$insert_sql  .= "
				reg_ip='".replace_quotes($list['list'][$i]["reg_ip"])."',
			";
		}else{
			$insert_sql  .= "
				reg_ip='',
			";
		}
		if($list['list'][$i]["upt_date"] != ""){
			$insert_sql  .= "
				upt_date='".replace_quotes($list['list'][$i]["upt_date"])."',
				upt_user_id='".replace_quotes($list['list'][$i]["upt_user_id"])."',
				upt_ip='".replace_quotes($list['list'][$i]["upt_ip"])."',
			";
		}else{
			$insert_sql  .= "upt_date=now(),";
		}
		$insert_sql  .= "reg_date='".replace_quotes($list['list'][$i]["reg_date"])."'";
		
		$rsf = mysqli_query($GLOBALS['dblink'], $insert_sql);

		if($rsf){
			echo "성공 ".$i."<br>";
		}else{
			echo $insert_sql."<br>";
		}
	}
}

//보드 이름 가져오기 *이미 만들어져 있었을 경우
function inputOldBoardInfoToNewBoardInfo(){
	$sql  = "SELECT * ";
    $sql .= "FROM tbl_board_info ";
	$sql .= "order by idx";
	echo $sql."<br><br>";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_num_rows($rs);
	// 페이지 네비게이션 오프셋 지정.
	echo $total;
	for($i=0; $i < $total; $i++){
		$list['list'][$i] = mysqli_fetch_assoc($rs);
		$select_sql  = "SELECT * ";
		$select_sql .= "FROM HPK_BOARD_CONF ";
		$select_sql .= "where board_code = '".$list['list'][$i]["boardid"]."' ORDER BY idno ";
		$select_rs = mysqli_query($GLOBALS['dblink'], $select_sql);
		$select_total = mysqli_num_rows($select_rs);
		echo $select_sql."<br><br>";
		for($j=0; $j < $select_total; $j++){
			$select_list['list'][$j] = mysqli_fetch_assoc($select_rs);
			$insert_sql  = "update tbl_board_info set
				boardname = '".$select_list['list'][$j]["board_name"]."'
				where idx=".$list['list'][$i]["idx"]."
			";
			echo $insert_sql."<br>";
			$rsf = mysqli_query($GLOBALS['dblink'], $insert_sql);
		}
	}
}
?>
