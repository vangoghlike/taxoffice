<?
/*********************************** 온라인견적, 자료신청, 제품등록 등 *************************************/
//온라인견적, 자료신청, 제품등록
function insertOnline(){
	$tbl = $GLOBALS["_conf_tbl"]["online_form"];

	for($i=0; $i < count($_POST[f_cat]); $i++){
		$implode_f_cat .= $_POST[f_cat][$i];
		if($i != count($_POST[f_cat])-1){
			$implode_f_cat .= "|";
		}
	}

	for($i=0; $i < count($_POST[f_product]); $i++){
		$implode_f_product .= $_POST[f_product][$i];
		if($i != count($_POST[f_product])-1){
			$implode_f_product .= "|";
		}
	}
	
	$o_type = mysql_escape_string($_POST[o_type])==""?"1":mysql_escape_string($_POST[o_type]);
	$email = mysql_escape_string($_POST[email_id]) . "@" . mysql_escape_string($_POST[email_domain]);
	$reply_type = mysql_escape_string($_POST[reply_type])=="PHONE"?"PHONE":"EMAIL";
	$zip = mysql_escape_string($_POST[zip1]) . "-" . mysql_escape_string($_POST[zip2]);
	$phone = mysql_escape_string($_POST[phone_1]) . "-" . mysql_escape_string($_POST[phone_2]) . "-" . mysql_escape_string($_POST[phone_3]);
	$mobile = mysql_escape_string($_POST[mobile_1]) . "-" . mysql_escape_string($_POST[mobile_2]) . "-" . mysql_escape_string($_POST[mobile_3]);
	$fax = mysql_escape_string($_POST[fax_1]) . "-" . mysql_escape_string($_POST[fax_2]) . "-" . mysql_escape_string($_POST[fax_3]);


	$sql = "INSERT INTO ".$tbl." set 
		o_type = '".$o_type."',
		p_name = '".mysql_escape_string($_POST[p_name])."',
		user_id = '".$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]."',
		user_name = '".mysql_escape_string($_POST[user_name])."',
		status = 'N',
		company = '".mysql_escape_string($_POST[company])."',
		department = '".mysql_escape_string($_POST[department])."',
		duty = '".mysql_escape_string($_POST[duty])."',
		email = '".$email."',
		zip = '".$zip."',
		address = '".mysql_escape_string($_POST[address])."',
		address_ext = '".mysql_escape_string($_POST[address_ext])."',
		phone = '".$phone."',
		mobile = '".$mobile."',
		fax = '".$fax."',
		f_cat = '$implode_f_cat',
		f_product = '$implode_f_product',
		reply_type='$reply_type',
		contents='".mysql_escape_string($_POST[contents])."',
		model = '".mysql_escape_string($_POST[model])."',
		serial = '".mysql_escape_string($_POST[serial])."',
		ip='".$_SERVER[REMOTE_ADDR]."',
		wdate = now()
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$insert_idx = mysql_insert_id($GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	//파일처리
	inputOnlineFiles("online_form", $insert_idx, $_FILES, $thumwidth);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//온라인견적, 자료신청, 제품등록 수정(답변)
function editOnline($idx){
	$tbl = $GLOBALS["_conf_tbl"]["online_form"];

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

//온라인견적, 자료신청, 제품등록 삭제
function deleteOnline($idx){
	$tbl = $GLOBALS["_conf_tbl"]["online_form"];

	$arrFile = getOnlineInfo(mysql_escape_string($idx));
	@unlink($_SERVER[DOCUMENT_ROOT]."/uploaded/online/".$arrFile["list"][0][re_name]);

	$sql = "DELETE FROM ".$tbl." WHERE idx='$idx' ";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	//파일삭제 코딩 시작
	mysql_query("DELETE FROM ".$GLOBALS["_conf_tbl"]["online_files"]." WHERE boardid='online_form' AND b_idx='".$idx."' ", $GLOBALS[dblink]);
	//디스크에서 파일 삭제

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//온라인견적, 자료신청, 제품등록 목록
function getOnlineList($o_type, $sw, $sk, $scale, $offset=0){
		// 테이블 지정
		$tbl = $GLOBALS["_conf_tbl"]["online_form"];

    $sql = "SELECT * FROM $tbl WHERE 1=1 ";

		if($o_type){
			$sql .= " AND o_type='$o_type' "; 
		}

		if($sw == "id"){
			$sql .= " AND user_id like '%$sk%' "; 
		}
		if($sw == "name"){
			$sql .= " AND user_name like '%$sk%' ";
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


//문의정보 가져오기
function getOnlineInfo($idx){
	$tbl = $GLOBALS["_conf_tbl"]["online_form"];

	$sql  = "SELECT A.*, B.idx AS f_idx, B.boardid, B.b_idx, B.ori_name, B.re_name, B.type, B.size ";
    $sql .= "FROM $tbl A LEFT JOIN ".$GLOBALS["_conf_tbl"]["online_files"]." B ON B.boardid='online_form' AND A.idx=B.b_idx ";
    $sql .= "WHERE A.idx='$idx'";
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


function inputOnlineFiles($boardid, $idx, $_FILES, $thumwidth){

	for($i=0;$i<count($_FILES[upfiles][error]);$i++){
		if ($_FILES[upfiles][error][$i] == 0){
		    //확장자 검사후 파일이름 생성
		    $filename = $_FILES[upfiles][name][$i];
		    $attach_ext = explode(".",$filename);
		    $extension = $attach_ext[sizeof($attach_ext)-1];
		    $extension = strtolower($extension);		    
		    $filerename = md5(mktime()) . $i . "." . $extension;
	  		$filesize = $_FILES[upfiles][size][$i];
	  		$filetype = $_FILES[upfiles][type][$i];

		    // 파일 확장자 검사
		    if(!strcmp($extension,"htm") ||!strcmp($extension,"html") ||!strcmp($extension,"phtml") ||!strcmp($extension,"php") ||!strcmp($extension,"php3") ||!strcmp($extension,"php4") ||!strcmp($extension,"inc") ||!strcmp($extension,"pl") ||!strcmp($extension,"cgi")){
				jsMsg("not allowed file extension");
		        jsHistory("-1");
		    }

			if (is_uploaded_file($_FILES[upfiles][tmp_name][$i])) {	
				move_uploaded_file ($_FILES[upfiles][tmp_name][$i], $_SERVER[DOCUMENT_ROOT]."/uploaded/online/".$filerename);
				/*
				//썸네일 만들기
				if($filetype=="image/pjpeg" || $filetype=="image/x-png" || $filetype=="image/gif"){
					@MakeThum($GLOBALS["_SITE"]["BOARD_DATA"] . "/".$boardid."/".$filerename, $GLOBALS["_SITE"]["BOARD_DATA"] . "/".$boardid."/t_".$filerename, $thumwidth);
				}
				*/
			}
			
			$sql = "insert into ".$GLOBALS["_conf_tbl"]["online_files"]." set 
				boardid='".$boardid."',/*게시판 아이디*/
				b_idx='".$idx."',/* 글 번호 id*/
				ori_name='".$filename."',/*파일원본이름*/
				re_name='".$filerename."',/*md5로 변환된 파일이름*/
				type='".$filetype."',/*파일타입*/
				ext ='".$extension."',/*파일확장자*/
				size='".$filesize."',/*첨부파일 용량*/
				wdate=now()
			";
			$rsf = mysql_query($sql,$GLOBALS[dblink]);
		}
	}
}
//파일정보 가져오기
function getOnlineFileInfo($boardid, $b_idx, $idx){
    $sql  = "SELECT * ";
    $sql .= "FROM " .$GLOBALS["_conf_tbl"]["online_files"]." ";
    $sql .= "WHERE boardid = '$boardid' ";
    $sql .= "AND b_idx = '$b_idx' ";
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

/*********************************** 온라인견적, 문의, 제품등록 등 *************************************/
?>