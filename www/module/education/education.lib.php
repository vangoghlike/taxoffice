<?
//교육 등록하기
function insertEducation(){
	//제품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["education"];

	//교육 테이블에 입력
	$sql = "INSERT INTO ".$tbl." set 
 		e_year='".mysql_escape_string($_POST[e_year])."',
		e_name='".mysql_escape_string($_POST[e_name])."',
 		e_day='".mysql_escape_string($_POST[e_day])."',
  		e_member='".mysql_escape_string($_POST[e_member])."',
  		e_price='".mysql_escape_string($_POST[e_price])."',
		e_memo='".mysql_escape_string($_POST[e_memo])."',
		e_object='".mysql_escape_string($_POST[e_object])."',
		e_contents='".mysql_escape_string($_POST[e_contents])."',
		wdate=now()
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$insert_idx = mysql_insert_id($GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	//이미지 파일처리
	inputProductFiles($insert_idx, $_FILES);

	if($total > 0){
		return true;
	}else{
		return false;
	}

}

//교육 수정하기
function editEducation($idx){
	//제품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["education"];

	//제품정보 테이블에 입력
	$sql = "UPDATE ".$tbl." set 
 		e_year='".mysql_escape_string($_POST[e_year])."',
 		e_name='".mysql_escape_string($_POST[e_name])."',
 		e_day='".mysql_escape_string($_POST[e_day])."',
  		e_member='".mysql_escape_string($_POST[e_member])."',
  		e_price='".mysql_escape_string($_POST[e_price])."',
		e_memo='".mysql_escape_string($_POST[e_memo])."',
		e_object='".mysql_escape_string($_POST[e_object])."',
		e_contents='".mysql_escape_string($_POST[e_contents])."'
		WHERE idx = '".$idx."'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	//이미지 파일처리
	delProductFiles($idx, $_FILES);
	inputProductFiles($idx, $_FILES);

	if($rs > 0){
		return true;
	}else{
		return false;
	}


}

//제품 파일처리
function inputProductFiles($idx, $_FILES){
	//이미지파일 처리

	for($i=0;$i<count($_FILES[photo_file][error]);$i++){
		if ($_FILES[photo_file][error][$i] == 0){
		    //확장자 검사후 파일이름 생성
		    $filename = $_FILES[photo_file][name][$i];
		    $attach_ext = explode(".",$filename);
		    $extension = $attach_ext[sizeof($attach_ext)-1];
		    $extension = strtolower($extension);		    
		    $filerename = md5(mktime()) . $i . "." . $extension;
	  		$filesize = $_FILES[photo_file][size][$i];
	  		$filetype = $_FILES[photo_file][type][$i];
				
		    // 파일 확장자 검사
		    if(!strcmp($extension,"htm") ||!strcmp($extension,"html") ||!strcmp($extension,"phtml") ||!strcmp($extension,"php") ||!strcmp($extension,"php3") ||!strcmp($extension,"php4") ||!strcmp($extension,"inc") ||!strcmp($extension,"pl") ||!strcmp($extension,"cgi")){
				jsMsg("not allowed file extension");
		        jsHistory("-1");
		    }
			
			if (is_uploaded_file($_FILES[photo_file][tmp_name][$i])) {	
				move_uploaded_file ($_FILES[photo_file][tmp_name][$i],$GLOBALS["_SITE"]["UPLOADED_DATA"]."/education/".$filerename);
			}

			$sql = "insert into ".$GLOBALS["_conf_tbl"]["product_files"]." set 
				b_idx='".$idx."',/* 글 번호 id*/
				ori_name='".$filename."',/*파일원본이름*/
				re_name='".$filerename."',/*md5로 변환된 파일이름*/
				type='".$filetype."',/*파일타입*/
				ext ='".$extension."',/*파일확장자*/
				size='".$filesize."',/*첨부파일 용량*/
				width='".$tmpImageSize[0]."',/*첨부파일 가로길이*/
				height='".$tmpImageSize[1]."',/*첨부파일 세로길이*/
				wdate=now()
			";
			$rsf = mysql_query($sql,$GLOBALS[dblink]);

		}
	}
}

//파일정보 가져오기
function getProductFileInfo($b_idx, $idx){
	$tbl = $GLOBALS["_conf_tbl"]["product_files"];

    $sql  = "SELECT * ";
    $sql .= "FROM " .$tbl." ";
    $sql .= "WHERE b_idx = '$b_idx' ";
    $sql .= "AND idx = '$idx' ";

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

//제품 파일 삭제 처리
function delProductFiles($idx, $_FILES){
	//제품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["education"];
	$tbl_files = $GLOBALS["_conf_tbl"]["product_files"];

	//현재 정보 가져오기
	$arrCurInfo = getArticleInfo($tbl, $idx);

	//이미지 파일삭제 코딩 시작 - 삭제체크 한것만 처리
	for($i=0;$i<count($_POST[filedel]);$i++){
		if($_POST[filedel][$i]>0){
			$fileinfo = getProductFileInfo($arrCurInfo["list"][0][idx], $_POST[filedel][$i]);
			//디비에서 파일정보 삭제
			mysql_query("DELETE FROM ".$tbl_files." WHERE idx='".$fileinfo["list"][0][idx]."' ", $GLOBALS[dblink]);
			//디스크에서 파일 삭제
			unlink($GLOBALS["_SITE"]["UPLOADED_DATA"]."/education/".$fileinfo["list"][0][re_name]);
		}
	}
	//이미지 파일삭제 코딩 종료
}

//
function getEducationList($sw="", $sk="", $scale, $offset=0){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["education"];//제품정보
	
	//검색키워드가 있을경우
	if($sk !=""){
		switch($sw){
			case("s") :
				$que_where .= " and (A.e_name like '%$sk%') ";
		}
	}
	
	if($_GET[syear]) {
		$que_where .= " and A.e_year >= '$_GET[syear]' AND  A.e_year <= '$_GET[eyear]' ";
	}
	
	//카운트
	$sql = "select count(A.idx) from $tbl A WHERE 1=1 $que_where ";
//	echo $sql;
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT A.* ";
    $sql .= "FROM ".$tbl." A ";
    $sql .= "WHERE 1=1 $que_where order by A.idx desc ";

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

//제품정보 가져오기 - id
function getEducationInfo($idx){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["education"];//제품정보
	$tbl_files = $GLOBALS["_conf_tbl"]["product_files"];//제품파일

	//기본정보 가져오기
	$sql  = "SELECT A.* ";
	$sql .= "FROM ".$tbl." A ";
	$sql .= " WHERE A.idx = '$idx' ";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
//	echo $sql;
	$total_rs = mysql_num_rows($rs);
	
	if($total_rs > 0){
			$list['total'] = $total_rs;
			for($i=0; $i < $total_rs; $i++){
					$list['list'][$i] = mysql_fetch_assoc($rs);
			}
	}else{
			$list['total'] = 0;
	}


	//파일정보 가져오기(제품)
	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl_files." ";
	$sql .= "WHERE b_idx = '$idx' order by idx ";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total_rs = mysql_num_rows($rs);
	
	if($total_rs > 0){
			$list['total_files'] = $total_rs;
			for($i=0; $i < $total_rs; $i++){
					$list['files'][$i] = mysql_fetch_assoc($rs);
			}
	}else{
			$list['total_files'] = 0;
	}

	return $list;
}

function deleteEducation($idx){
	//제품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["education"];//모집정보
	$tbl_files = $GLOBALS["_conf_tbl"]["product_files"];//모집파일

	$arrInfo = getEducationInfo($idx);

	if($arrInfo["total"] > 0){
		//제품 정보 삭제
		$sql = "DELETE FROM ".$tbl." WHERE idx='".$arrInfo["list"][0][idx]."'	";
		//echo $sql . "<br>";
		$rs1 = mysql_query($sql, $GLOBALS[dblink]);


		//파일삭제 코딩 시작
		for($i=0;$i<$arrInfo["total_files"];$i++){
			//디비에서 파일정보 삭제
			mysql_query("DELETE FROM ".$tbl_files." WHERE idx='".$arrInfo["files"][$i][idx]."' ", $GLOBALS[dblink]);
			//디스크에서 파일 삭제
			@unlink($GLOBALS["_SITE"]["UPLOADED_DATA"] . "/education/".$arrInfo["files"][$i][re_name]);
		}

		if($rs1 && $arrInfo["list"][0][idx]){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

function getEducationOnlineList($sw="", $sk="", $scale, $offset=0){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["education_online"];//온라인
	$tbl_education = $GLOBALS["_conf_tbl"]["education"];//교육등록
	$tbl_member = $GLOBALS["_conf_tbl"]["education_member"];//신청자

	//검색키워드가 있을경우
	if($sk !=""){
		switch($sw){
			case("s") :
				$que_where .= " and (B.e_name like '%$sk%') ";
				break;
			case("o") :
				$que_where .= " and (B.e_object like '%$sk%') ";
				break;
			case("c") :
				$que_where .= " and (B.e_contents like '%$sk%') ";
				break;
			case("ym") :
				
				$que_where .= " and ( (A.e_s_date >= '".$sk."-01' AND  A.e_s_date <= '".$sk."-31') OR (A.e_e_date >= '".$sk."-01' AND  A.e_e_date <= '".$sk."-31') )";
				break;
		}
	}
	
	if($_GET[year]) {
		//$que_where .= " and B.e_year = '$_GET[year]' ";
		$que_where .= " and ((A.r_s_date >= '".$_GET[year]."-01-01' AND A.r_e_date <= '".$_GET[year]."-12-31') OR (A.e_s_date >= '".$_GET[year]."-01-01' AND A.e_e_date <= '".$_GET[year]."-12-31')) ";
	}

	if($_GET[syear]) {
		$que_where .= " and B.e_year >= '$_GET[syear]' AND  B.e_year <= '$_GET[eyear]' ";
	}

	if($_GET[s_date]) {
		$que_where .= " and ( (A.e_s_date >= '$_GET[s_date]' AND  A.e_s_date <= '$_GET[e_date]') OR (A.e_e_date >= '$_GET[s_date]' AND  A.e_e_date <= '$_GET[e_date]') )";
	}

	if($_GET[status]) {
		$que_where .= " and A.status = '$_GET[status]' ";
	}
	
	//카운트
	$sql = "select count(A.idx) from $tbl A LEFT JOIN ".$tbl_education." B ON A.e_idx=B.idx WHERE 1=1 $que_where ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT A.*, B.e_year, B.e_name, B.e_memo, B.e_price, B.e_object, B.e_contents ";
    $sql .= "FROM ".$tbl." A ";
	$sql .= "LEFT JOIN ".$tbl_education." B ON A.e_idx=B.idx ";
    $sql .= "WHERE 1=1 $que_where order by A.idx desc ";

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

			$cnt_row = mysql_fetch_row(mysql_query("select count(idx) from $tbl_member WHERE eo_idx='".$list['list'][$i][idx]."' "));			
			$list['list'][$i][o_count] = $cnt_row[0];
        }
    }else{
        $list['total'] = 0;
    }
    return $list;
}


function getEducationOnlineYear($sw="", $sk="", $scale, $offset=0){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["education"];//교육등록
	$tbl_online = $GLOBALS["_conf_tbl"]["education_online"];//온라인

	//검색키워드가 있을경우
	if($sk !=""){
		switch($sw){
			case("s") :
				$que_where .= " and (A.e_name like '%$sk%') ";
				break;
		}
	}
	
	if($_GET[year]) {
		if($_GET[month]=="07" || $_GET[month]=="12") {
			$que_where .= " and ((B.r_s_date >= '$_GET[year]-07-01' AND B.r_e_date <= '$_GET[year]-12-31') OR (B.e_s_date >= '$_GET[year]-07-01'  AND B.e_e_date <= '$_GET[year]-12-31')) ";
		} else {
			$que_where .= " and ((B.r_s_date >= '$_GET[year]-01-01' AND B.r_e_date <= '$_GET[year]-06-30') OR (B.e_s_date >= '$_GET[year]-01-01'  AND B.e_e_date <= '$_GET[year]-06-30')) ";
		}
		
	}


	//목록
    $sql  = "SELECT  A.e_name, B.* ";
    $sql .= "FROM ".$tbl." A ";
	$sql .= "LEFT JOIN ".$tbl_online." B ON A.idx=B.e_idx ";
    $sql .= "WHERE 1=1 AND (status='I' OR status='A' OR status='B') $que_where GROUP BY A.idx order by B.idx desc ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $total_rs = mysql_num_rows($rs);

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



//교육 등록하기
function insertEducationOnline(){
	//제품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["education_online"];

	$sTime = mysql_escape_string($_POST[s_time]).":".mysql_escape_string($_POST[s_min]);
	$eTime = mysql_escape_string($_POST[e_time]).":".mysql_escape_string($_POST[e_min]);

	//교육 테이블에 입력
	$sql = "INSERT INTO ".$tbl." set 
 		e_idx='".mysql_escape_string($_POST[e_idx])."',
 		e_num='".mysql_escape_string($_POST[e_num])."',
		location='".mysql_escape_string($_POST[location])."',
 		r_s_date='".mysql_escape_string($_POST[r_s_date])."',
  		r_e_date='".mysql_escape_string($_POST[r_e_date])."',
  		e_s_date='".mysql_escape_string($_POST[e_s_date])."',
		e_e_date='".mysql_escape_string($_POST[e_e_date])."',
  		e_s_time='".$sTime."',
		e_e_time='".$eTime."',
		e_all_time='".mysql_escape_string($_POST[e_all_time])."',
		person='".mysql_escape_string($_POST[person])."',
		status='".mysql_escape_string($_POST[status])."',
		wdate=now()
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($rs > 0){
		return true;
	}else{
		return false;
	}

}

//교육 수정하기
function editEducationOnline($idx){
	//제품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["education_online"];

	$sTime = mysql_escape_string($_POST[s_time]).":".mysql_escape_string($_POST[s_min]);
	$eTime = mysql_escape_string($_POST[e_time]).":".mysql_escape_string($_POST[e_min]);

	//제품정보 테이블에 입력
	$sql = "UPDATE ".$tbl." set 
 		e_idx='".mysql_escape_string($_POST[e_idx])."',
 		e_num='".mysql_escape_string($_POST[e_num])."',
		location='".mysql_escape_string($_POST[location])."',
 		r_s_date='".mysql_escape_string($_POST[r_s_date])."',
  		r_e_date='".mysql_escape_string($_POST[r_e_date])."',
  		e_s_date='".mysql_escape_string($_POST[e_s_date])."',
		e_e_date='".mysql_escape_string($_POST[e_e_date])."',
  		e_s_time='".$sTime."',
		e_e_time='".$eTime."',
		e_all_time='".mysql_escape_string($_POST[e_all_time])."',
		person='".mysql_escape_string($_POST[person])."',
		status='".mysql_escape_string($_POST[status])."'
		WHERE idx = '".$idx."'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($rs > 0){
		return true;
	}else{
		return false;
	}
}

//제품정보 가져오기 - id
function getEducationOnlineInfo($idx){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["education_online"];//제품정보

	//기본정보 가져오기
	$sql  = "SELECT A.* ";
	$sql .= "FROM ".$tbl." A ";
	$sql .= " WHERE A.idx = '$idx' ";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
//	echo $sql;
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

//제품정보 가져오기 - id
function getEducationOnlineYearList($e_idx){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["education_online"];//제품정보

	//기본정보 가져오기
	$sql  = "SELECT A.* ";
	$sql .= "FROM ".$tbl." A ";
	$sql .= " WHERE A.e_idx = '$e_idx' ";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
//	echo $sql;
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

function getEducationOnlineYearMonthInfo($e_idx, $y, $m, $status){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["education_online"];//제품정보

	//기본정보 가져오기
	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl." ";
	$sql .= " WHERE e_idx = '$e_idx' ";
	if($status=="I") {
		$sql .= " AND status='I' AND ((r_s_date >= '$y-$m-01' AND r_s_date <= '$y-$m-31') OR (r_e_date >= '$y-$m-01' AND r_e_date <= '$y-$m-31')) ";
	} else {
		$sql .= " AND (status='A' or status='B') AND ((e_s_date >= '$y-$m-01' AND e_s_date <= '$y-$m-31') OR (e_e_date >= '$y-$m-01' AND e_e_date <= '$y-$m-31')) ";
	}
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

function deleteEducationOnline($idx){
	//제품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["education_online"];//모집정보

	//온라인교육 삭제
	$sql = "DELETE FROM ".$tbl." WHERE idx='".$idx."'	";
	$rs1 = mysql_query($sql, $GLOBALS[dblink]);

	//온라인교육신청자 삭제

	if($rs1){
		return true;
	}else{
		return false;
	}
}


//회원 교육 등록하기
function insertEducationMember($user_id){
	//제품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["education_member"];

	$arrInfo = getEducationMemberInfo($user_id, mysql_escape_string($_POST[eo_idx]));
	if($arrInfo["total"]>0) {
		return false;
	}
		
	$phone = mysql_escape_string($_POST[phone_1]) . "-" . mysql_escape_string($_POST[phone_2]) . "-" . mysql_escape_string($_POST[phone_3]);
	$mobile = mysql_escape_string($_POST[mobile_1]) . "-" . mysql_escape_string($_POST[mobile_2]) . "-" . mysql_escape_string($_POST[mobile_3]);

	//교육 테이블에 입력
	$sql = "INSERT INTO ".$tbl." set 
 		eo_idx='".mysql_escape_string($_POST[eo_idx])."',
		user_id='".$user_id."',
 		user_name='".mysql_escape_string($_POST[user_name])."',
 		company='".mysql_escape_string($_POST[company])."',
  		ceo='".mysql_escape_string($_POST[ceo])."',
  		birth='".mysql_escape_string($_POST[birth])."',
		email='".mysql_escape_string($_POST[email])."',
  		zip='".mysql_escape_string($_POST[zip])."',
  		address='".mysql_escape_string($_POST[address])."',
  		address_ext='".mysql_escape_string($_POST[address_ext])."',
		phone='".$phone."',
		mobile='".$mobile."',
		cmp='".mysql_escape_string($_POST[cmp])."',
		status='I',
		wdate=now()
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($rs > 0){
		return true;
	}else{
		return false;
	}

}

//회원 교육 신청정보
function getEducationMemberInfo($user_id, $eo_idx){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["education_member"];//제품정보

	//기본정보 가져오기
	$sql  = "SELECT A.* ";
	$sql .= "FROM ".$tbl." A ";
	$sql .= " WHERE A.user_id='$user_id' AND A.eo_idx = '$eo_idx' ";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
//	echo $sql;
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

function getEducationMemberOnlineList($user_id="", $sw="", $sk="", $scale, $offset=0){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["education_member"];//신청
	$tbl_education = $GLOBALS["_conf_tbl"]["education"];//교육등록
	$tbl_online = $GLOBALS["_conf_tbl"]["education_online"];//온라인

	if($user_id!="") {
		$que_where .= " and A.user_id = '$user_id' ";
	}

	if($sk !=""){
		switch($sw){
			case("s") :
				$que_where .= " and (C.e_name like '%$sk%') ";
		}
	}
	
	if($_GET[syear]) {
		$que_where .= " and C.e_year >= '$_GET[syear]' AND  C.e_year <= '$_GET[eyear]' ";
	}
	if($_GET[status]) {
		$que_where .= " and A.status = '$_GET[status]' ";
	}
	
	//카운트
	$sql = "select count(A.idx) from $tbl A LEFT JOIN ".$tbl_online." B ON A.eo_idx=B.idx LEFT JOIN ".$tbl_education." C ON B.e_idx=C.idx WHERE 1=1 $que_where ";
	//echo $sql;
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT A.*, B.e_s_date, B.e_e_date, B.status as eo_status, C.e_name ";
    $sql .= "FROM ".$tbl." A ";
	$sql .= "LEFT JOIN ".$tbl_online." B ON A.eo_idx=B.idx ";
	$sql .= "LEFT JOIN ".$tbl_education." C ON B.e_idx=C.idx ";
    $sql .= "WHERE 1=1 $que_where order by A.idx desc ";

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

function deleteEducationMemberOnline($idx){
	//제품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["education_member"];//모집정보

	//온라인신청교육 삭제
	$sql = "DELETE FROM ".$tbl." WHERE idx='".$idx."'	";
	$rs1 = mysql_query($sql, $GLOBALS[dblink]);

	if($rs1){
		return true;
	}else{
		return false;
	}
}

function changeEducationMemberOnlineStatus($idx){
	//제품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["education_member"];//모집정보

	//온라인신청교육 상태변경
	$sql = "UPDATE ".$tbl." SET status='".$_POST[status]."' WHERE idx='".$idx."'	";
	$rs1 = mysql_query($sql, $GLOBALS[dblink]);

	if($rs1){
		return true;
	}else{
		return false;
	}
}


function editOnlineComplet($idx) {
	$tbl = $GLOBALS["_conf_tbl"]["education_member"];//신청

	if(count($_REQUEST[items]) > 0){
		foreach($_REQUEST[items] AS $key => $val){
			$sql = "UPDATE ".$tbl." SET
					completion='".$_POST[gb]."',
					cdate = now()
				WHERE idx='".mysql_escape_string($val)."' ";

			$rs = mysql_query($sql, $GLOBALS[dblink]);
			$total = mysql_affected_rows($GLOBALS[dblink]);
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
?>