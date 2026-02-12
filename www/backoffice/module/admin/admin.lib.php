<?
/*********************************** 관리자 정보 *************************************/

//관리자 정보 가져오기
function getAdminInfo($id){
    $sql  = "SELECT * ";
    $sql .= "FROM ".$GLOBALS["_conf_tbl"]["admin"]." ";
    $sql .= "WHERE a_id = '$id' ";
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

function getAdminPass($pw){
    $sql  = "SELECT PASSWORD('". $pw ."') as pw ";
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

//관리자 등록
function inputAdmin(){
	$sql = "insert into ".$GLOBALS["_conf_tbl"]["admin"]." SET
		a_id= '".$_POST['id']."',
		a_pw= '".$_POST['id']."',
		a_grade = 'ADMIN',
		a_date = now()
	";

echo $sql;

	$rsf = mysqli_query($GLOBALS['dblink'], $sql);

	$total = mysqli_affected_rows($GLOBALS['dblink']);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//관리자 수정
function updateAdmin($idx){
	//접근권한
	$str_a_auth = "";
	for($i=0; $i < count($_POST['a_auth']); $i++){
			$str_a_auth .= $_POST['a_auth'][$i];
			if($i != count($_POST['a_auth'])-1){
					$str_a_auth .= ",";
			}
	}
	if($_POST['a_pw']){
		$subQuery = " a_pw='". $_POST['a_pw'] ."', ";
	}

	$sql = "UPDATE ".$GLOBALS["_conf_tbl"]["admin"]." SET
		$subQuery
		a_name= '".$_POST['a_name']."',
		a_class= '".$_POST['a_class']."',
		a_phone= '".$_POST['a_phone']."',
		a_email= '".$_POST['a_email']."',
		a_grade= '".$_POST['a_grade']."',
		a_auth= '".$str_a_auth."'
		WHERE idx = '$idx'
	";
//echo $sql ;

	$rsf = mysqli_query($GLOBALS['dblink'], $sql);

	if($rsf){
		return true;
	}else{
		return false;
	}
}


//관리자파일 삭제
function deleteAdmin($idx){
	$sql = "DELETE FROM ".$GLOBALS["_conf_tbl"]["admin"]." WHERE idx = '$idx' ";
	$rsf = mysqli_query($GLOBALS['dblink'], $sql);

	$total = mysqli_affected_rows($GLOBALS['dblink']);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//관리자 로그인 로그 기록하기
function setAdminLoginLog($id,$login){
    $sql  = "INSERT INTO tbl_admin_login_log SET ";
    $sql .= "a_id = '$id', ";
    $sql .= "a_ip = '".$_SERVER['REMOTE_ADDR']."', ";
    $sql .= "a_login = '".$login."', ";
    $sql .= "a_date = now() ";
    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_affected_rows($GLOBALS['dblink']);

    return $total_rs;
}

//관리자 정보 가져오기
function getAdminMenu(){
    $sql  = "SELECT * ";
    $sql .= "FROM ".$GLOBALS["_conf_tbl"]["admin_menu_code"]." ";
    $sql .= "WHERE is_use = 'Y' order by m_name ";
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

function updateShopSet() {

	$sql = "UPDATE ".$GLOBALS["_conf_tbl"]["shop_set"]." SET
		shop_name = '".postNullCheck('shop_name')."',
		shop_url = '".postNullCheck('shop_url')."',
		admin_email = '".postNullCheck('admin_email')."',
		shop_title = '".postNullCheck('shop_title')."',
		shop_keyword = '".postNullCheck('shop_keyword')."',
		shop_content = '".postNullCheck('shop_content')."',
		shop_point_min = '".postNullCheck('shop_point_min')."',
		shop_point_max = '".postNullCheck('shop_point_max')."',
		shop_badWord = '".postNullCheck('shop_badWord')."'
	";
	//echo $sql;

	$rsf = mysqli_query($GLOBALS['dblink'], $sql);

	if($rsf){
		return true;
	}else{
		return false;
	}
}

function updatePolicySet($policy_name) {
	$re_policy_cont = str_replace("'","&#39;",postNullCheck('policy_contents'));
	$sql = "UPDATE tbl_policy SET
		policy_contents = '".$re_policy_cont."'
		where policy_name='".$policy_name."'
	";
	//echo $sql;

	$rsf = mysqli_query($GLOBALS['dblink'], $sql);

	if($rsf){
		return true;
	}else{
		return false;
	}
}
?>