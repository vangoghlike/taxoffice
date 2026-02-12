<?
function getConsultList($scale, $offset=0){
	$tbl = "tbl_consult_info";

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

function getConsultInfo($idx){
	$tbl = "tbl_consult_info";

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

function getConsultCatList($scale, $offset=0){
	$tbl = "tbl_consult_category";

    $sql = "SELECT * FROM ".$tbl." WHERE 1=1 ";

	if($_REQUEST["idx"] != ""){
		$sql .= "and consult_idx=".$_REQUEST["idx"];
	}

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

function getConsultCatInfo($idx){
	$tbl = "tbl_consult_category";

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

function getPayList($scale, $offset=0){
	$tbl = "tbl_pay";

    $sql = "SELECT * FROM ".$tbl." WHERE 1=1 ";

	if($_REQUEST["idx"] != ""){
		$sql .= "and consult_idx=".$_REQUEST["idx"];
	}

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
			$sql .= " order by price desc ";
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

function getPayInfo($idx){
	$tbl = "tbl_pay";

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

function getTotalPayPrice($ex_sql=""){
	$tbl = "tbl_consulting";

	$ex_qry = "";
	if($_REQUEST["s_date"] != ""){
		$ex_qry .=" AND reg_date >= '".$_REQUEST["s_date"]." 00:00:00' ";
	}
	if($_REQUEST["e_date"] != ""){
		$ex_qry .=" AND reg_date <= '".$_REQUEST["e_date"]." 23:59:59' ";
	}
	if($_REQUEST["mngr"] != ""){
		$ex_qry .=" AND mngr_idx = '".$_REQUEST["mngr"]."' ";
	}
	if($_REQUEST["search"] != ""){
		if($_REQUEST["search_fld"] == "user_id"){
			$ex_qry .=" AND user_id = '".$_REQUEST["search"]."' ";
		}else if($_REQUEST["search_fld"] == "user_name"){
			$ex_qry .=" AND user_name = '".$_REQUEST["search"]."' ";
		}
	}

    $sql = "SELECT sum(pay_price) as total_pay_price, sum(pay_point) as total_point, sum(price) as total_price FROM ".$tbl." where goods_idx = 4 and status = 4 ".$ex_sql.$ex_qry." ";

    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_num_rows($rs);

    if($total_rs > 0){
        $list['total'] = $total_rs;
		$list = mysqli_fetch_assoc($rs);
    }else{
        $list['total'] = 0;
    }
    
    return $list;
}

function getConsultingPayList($scale, $offset=0){
	$tbl = "tbl_consulting";

	$ex_qry = "";
	if($_REQUEST["s_date"] != ""){
		$ex_qry .=" AND reg_date >= '".$_REQUEST["s_date"]." 00:00:00' ";
	}
	if($_REQUEST["e_date"] != ""){
		$ex_qry .=" AND reg_date <= '".$_REQUEST["e_date"]." 23:59:59' ";
	}
	if($_REQUEST["mngr"] != ""){
		$ex_qry .=" AND mngr_idx = '".$_REQUEST["mngr"]."' ";
	}
	if($_REQUEST["search"] != ""){
		if($_REQUEST["search_fld"] == "user_id"){
			$ex_qry .=" AND user_id = '".$_REQUEST["search"]."' ";
		}else if($_REQUEST["search_fld"] == "user_name"){
			$ex_qry .=" AND user_name = '".$_REQUEST["search"]."' ";
		}
	}

    $sql = "SELECT * FROM ".$tbl." WHERE goods_idx = 4 and status != 0 ".$ex_qry;

	//echo $sql;

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
		    	$sql .= " order by idx desc limit $offset,$scale  ";
			}else{
				$sql .= " order by idx desc ";
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

// ----------------------------------------------------------------------------- 삽입 관련 내용 -----------------------------------------------------------------------------// ST
function insertConsultInfo(){
	$tbl = "tbl_consult_info";
	//이미지파일 처리

	$sql = "insert into ".$tbl." SET 
		consult_name= '".$_POST['consult_name']."',
		subject= '".$_POST['subject']."',
		contents= '".$_POST['contents']."',
		category_yn = '".$_POST['category_yn']."',
		option_yn = '".$_POST['option_yn']."',
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

function insertConsultCategory(){
	$tbl = "tbl_consult_category";
	//이미지파일 처리
	
	if ($_FILES['upfiles']['error'] == 0){
		//확장자 검사후 파일이름 생성
		$filename = $_FILES['upfiles']['name'];
		$attach_ext = explode(".",$filename);
		$extension = $attach_ext[sizeof($attach_ext)-1];
		$extension = strtolower($extension);		    
		$filerename = md5(mktime()) . "." . $extension;
		$filesize = $_FILES['upfiles']['size'];
		$filetype = $_FILES['upfiles']['type'];
			
		// 파일 확장자 검사
		if(!strcmp($extension,"htm") ||!strcmp($extension,"html") ||!strcmp($extension,"phtml") ||!strcmp($extension,"php") ||!strcmp($extension,"php3") ||!strcmp($extension,"php4") ||!strcmp($extension,"inc") ||!strcmp($extension,"pl") ||!strcmp($extension,"cgi")){
			jsMsg("not allowed file extension");
			jsHistory("-1");
		}
		
		if (is_uploaded_file($_FILES['upfiles']['tmp_name'])) {	
			move_uploaded_file ($_FILES['upfiles']['tmp_name'],$GLOBALS["_SITE"]["UPLOADED_DATA"]."/consult_category/".$filerename);
		}
	}

	$sql = "insert into ".$tbl." SET 
		consult_idx= '".$_POST['consult_idx']."',
		category_name= '".$_POST['category_name']."',
		contents= '".$_POST['contents']."',
		contents1 = '".$_POST['contents1']."',
		checklist = '".$_POST['checklist']."',
		file_name = '',
		file_name_saved = '',
		file_size = 0,
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

function insertPay(){
	$tbl = "tbl_pay";
	//이미지파일 처리

	$sql = "insert into ".$tbl." SET 
		consult_idx= '".$_POST['consult_idx']."',
		pay_name= '".$_POST['pay_name']."',
		price= '".$_POST['price']."',
		value = '".$_POST['value']."',
		use_yn = 'Y',
		reg_date = now(),
		reg_user_id = '".$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]."',
		reg_ip = '".$_SERVER["REMOTE_ADDR"]."'
	";
	//echo $sql;

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

function updateConsultInfo($idx){
	$tbl = "tbl_consult_info";
	//이미지파일 처리

	$sql = "UPDATE ".$tbl." SET ";
	if($_POST['subject'] != ""){
		$sql .= " subject= '".$_POST['subject']."',";
	}
	if($_POST['contents'] != ""){
		$sql .= " contents= '".$_POST['contents']."',";
	}
	if($_POST['category_yn'] != ""){
		$sql .= " category_yn = '".$_POST['category_yn']."',";
	}
	if($_POST['option_yn'] != ""){
		$sql .= " option_yn = '".$_POST['option_yn']."',";
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

function updateConsultCategory($idx){
	$tbl = "tbl_consult_category";
	//이미지파일 처리

	if ($_FILES['upfiles']['error'] == 0){
		//확장자 검사후 파일이름 생성
		$filename = $_FILES['upfiles']['name'];
		$attach_ext = explode(".",$filename);
		$extension = $attach_ext[sizeof($attach_ext)-1];
		$extension = strtolower($extension);		    
		$filerename = md5(mktime()) . "." . $extension;
		$filesize = $_FILES['upfiles']['size'];
		$filetype = $_FILES['upfiles']['type'];
			
		// 파일 확장자 검사
		if(!strcmp($extension,"htm") ||!strcmp($extension,"html") ||!strcmp($extension,"phtml") ||!strcmp($extension,"php") ||!strcmp($extension,"php3") ||!strcmp($extension,"php4") ||!strcmp($extension,"inc") ||!strcmp($extension,"pl") ||!strcmp($extension,"cgi")){
			jsMsg("not allowed file extension");
			jsHistory("-1");
		}
		
		if (is_uploaded_file($_FILES['upfiles']['tmp_name'])) {	
			move_uploaded_file ($_FILES['upfiles']['tmp_name'],$GLOBALS["_SITE"]["UPLOADED_DATA"]."/consult_category/".$filerename);
		}
	}

	$sql = "UPDATE ".$tbl." SET ";

	if($_POST['consult_idx'] != ""){
		$sql .= " consult_idx= '".$_POST['consult_idx']."',";
	}
	if($_POST['category_name'] != ""){
		$sql .= " category_name= '".$_POST['category_name']."',";
	}
	if($_POST['contents'] != ""){
		$sql .= " contents = '".$_POST['contents']."',";
	}
	if($_POST['contents1'] != ""){
		$sql .= " contents1 = '".$_POST['contents1']."',";
	}
	if($_POST['checklist'] != ""){
		$sql .= " checklist = '".$_POST['checklist']."',";
	}
	if($_FILES['upfiles']['error'] == 0){
		$sql .= " file_name = '".$filename."',
			file_name_saved = '".$filerename."',
			file_size = ".$filesize.",
		";
	}
	$sql .= " upt_date = now(),";
	$sql .= " upt_user_id = '".$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]."',";
	$sql .= " upt_ip = '".$_SERVER["REMOTE_ADDR"]."'";
	$sql .= " WHERE idx = ".$idx."";

	//echo $sql;

	$rsf = mysqli_query($GLOBALS['dblink'], $sql);

	if($rsf){
		return true;
	}else{
		return false;
	}
}

function updateConsultCategoryNoFile($idx){
	$tbl = "tbl_consult_category";

	$sql = "UPDATE ".$tbl." SET ";

	if($_POST['consult_idx'] != ""){
		$sql .= " consult_idx= '".$_POST['consult_idx']."',";
	}
	if($_POST['category_name'] != ""){
		$sql .= " category_name= '".$_POST['category_name']."',";
	}
	if($_POST['contents'] != ""){
		$sql .= " contents = '".$_POST['contents']."',";
	}
	if($_POST['contents1'] != ""){
		$sql .= " contents1 = '".$_POST['contents1']."',";
	}
	if($_POST['checklist'] != ""){
		$sql .= " checklist = '".$_POST['checklist']."',";
	}
	$sql .= " upt_date = now(),";
	$sql .= " upt_user_id = '".$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]."',";
	$sql .= " upt_ip = '".$_SERVER["REMOTE_ADDR"]."'";
	$sql .= " WHERE idx = ".$idx."";

	$rsf = mysqli_query($GLOBALS['dblink'], $sql);

	if($rsf){
		return true;
	}else{
		return false;
	}
}

function updatePayInfo($idx){
	$tbl = "tbl_pay";
	//이미지파일 처리

	$sql = "UPDATE ".$tbl." SET ";
	if($_POST['consult_idx'] != ""){
		$sql .= " consult_idx= '".$_POST['consult_idx']."',";
	}
	if($_POST['pay_name'] != ""){
		$sql .= " pay_name= '".$_POST['pay_name']."',";
	}
	if($_POST['price'] != ""){
		$sql .= " price = '".$_POST['price']."',";
	}
	if($_POST['value'] != ""){
		$sql .= " value = '".$_POST['value']."',";
	}
	if($_POST['use_yn'] != ""){
		$sql .= " use_yn = '".$_POST['use_yn']."',";
	}
	$sql .=" upt_date = now(),
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
function deleteConsultInfo($idx){
	$tbl = "tbl_consult_info";

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

function deleteConsultCatagory($idx){
	$tbl = "tbl_consult_category";

	//이미지파일 처리
	$arrInfo = getArticleInfo($tbl, $idx);

	@unlink($GLOBALS["_SITE"]["UPLOADED_DATA"]."/consult_category/".$arrInfo["list"][0]['b_image']);
	

	$sql = "DELETE FROM ".$tbl." WHERE idx = '$idx' ";
	$rsf = mysqli_query($GLOBALS['dblink'], $sql);

	$total = mysqli_affected_rows($GLOBALS['dblink']);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

function deletePay($idx){
	$tbl = "tbl_pay";

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