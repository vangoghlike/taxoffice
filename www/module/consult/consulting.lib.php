<?
function getConsultingList($scale, $offset=0){
	$tbl = "tbl_consulting";

    $sql = "SELECT * FROM ".$tbl." WHERE 1=1 ";

    $rs = mysqli_query($GLOBALS['dblink'], $sql);
    $total_rs = mysqli_num_rows($rs);

	

	//echo $sql;

    if($total_rs > 0){
        $list['total'] = $total_rs;
        // ������ �׺���̼� ������ ����.
		    if(!$offset){
		        $offset=0;
		    }else{
		        $offset=$offset;
		    }

		    // offset �� ��ü �Խù������� ������ offset �� ��ü�Խù� - �������� ������ �� ���� offset ����
		    if($total_rs<=$offset){
		        $offset = $total_rs - $scale;
		    }

				//scale 0 ���� �����ÿ��� ��ü ������
			
			$sql .= " order by idx DESC ";
			if($scale > 0){
		    	$sql .= " limit $offset,$scale ";
			}
			//echo $sql;
		    $rs = mysqli_query($GLOBALS['dblink'], $sql);
		
		    // offset �� �̿��� limit �� ����� ����
		    $total = mysqli_num_rows($rs);
		    $list['list']['total'] = $total;
		    // ������ �׺���̼� ������ ����.
		    
        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
		$list['list']['total'] = 0;
    }
    
    return $list;
}

function getConsultingInfo($idx){
	$tbl = "tbl_consulting";

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



// ----------------------------------------------------------------------------- ���� ���� ���� -----------------------------------------------------------------------------// ST
function insertConsultingInfo($user_id){
	$tbl = "tbl_consulting";
	//�̹������� ó��

	//echo is_array($_POST["checklist"]);
	if(is_array($_POST["checklist"])){
		$_POST['contents2'] = implode("|",$_POST["checklist"]);
	}

	$_POST['send_yn']			= $_POST['send_yn'] == ""?"N":$_POST['send_yn'];
	$_POST['send_kakao_yn']		= $_POST['send_kakao_yn'] == ""?"N":$_POST['send_kakao_yn'];
	$_POST['hidden_yn']			= $_POST['hidden_yn'] == ""?"N":$_POST['hidden_yn'];
	$_POST['send_idx']			= $_POST['send_idx'] == ""?"0":$_POST['send_idx'];

	$sql = "
		insert into ".$tbl." SET 
		goods_idx= '".$_POST['goods_idx']."',
		goods_name= '".$_POST['goods_name']."',";

	if($_POST['category_idx'] != ""){
		$sql .= "category_idx = '".$_POST['category_idx']."',";
	}
	if($_POST['option_idx'] != ""){
		$sql .= "option_idx = '".$_POST['option_idx']."',";
	}
	$sql .= "send_idx = '".$_POST['send_idx']."',
	category_name = '".$_POST['category_name']."',
	option_name = '".$_POST['option_name']."',";
	if($_POST['price'] != ""){
		$sql .= "price = '".$_POST['price']."',";
	}

	$sql .= "pay_method = '".$_POST['pay_method']."',";

	if($_POST['pay_price'] != ""){
		$sql .= "pay_price = '".$_POST['pay_price']."',";
	}
	if($_POST['pay_point'] != ""){
		$sql .= "pay_point = '".$_POST['pay_point']."',";
	}
	if($_POST['save_point'] != ""){
		$sql .= "save_point = '".$_POST['save_point']."',";
	}
	if($_POST['mngr_idx'] != ""){
		$sql .= "mngr_idx = '".$_POST['mngr_idx']."',";
	}

	$sql .= "mngr_name = '".$_POST['mngr_name']."',";

	if($_POST['app_date'] != "" && $_POST['app_minutes'] != ""){
		$sql .= "
		app_date = '".$_POST['app_date']."',
		app_minutes = '".$_POST['app_minutes']."',
		";
	}
	$sql .= "
		method = '".$_POST['method']."',
		user_id = '".$user_id."',
		user_name = '".$_POST['user_name']."',
		phone = '".$_POST['phone']."',
		email = '".$_POST['email']."',
		company = '".$_POST['company']."',
		com_kind = '".$_POST['com_kind']."',
		com_regno = '".$_POST['com_regno']."',
		sales = '".$_POST['sales']."',
		addr = '".$_POST['addr']."',
		subject = '".$_POST['subject']."',
		contents = '".$_POST['contents']."',
		contents2 = '".$_POST['contents2']."',
		send_contents = '".$_POST['send_contents']."',
		etc01 = '".$_POST['etc01']."',
		status = '".$_POST['status']."',
		send_yn = '".$_POST['send_yn']."',
		send_kakao_yn = '".$_POST['send_kakao_yn']."',
		hidden_yn = '".$_POST['hidden_yn']."',
		reg_date = now(),
		reg_user_id = '".$user_id."',
		reg_ip = '".$_SERVER["REMOTE_ADDR"]."'
	";

	//echo $sql;

	$rsf = mysqli_query($GLOBALS['dblink'], $sql);
	$insert_idx = mysqli_insert_id($GLOBALS['dblink']);
	$total = mysqli_affected_rows($GLOBALS['dblink']);

	if($total > 0){
		return $insert_idx;
	}else{
		return false;
	}
}

function insertConsultingInfoGuest(){
	$tbl = "tbl_consulting";
	//�̹������� ó��

	if(is_array($_POST["checklist"])){
		$_POST['contents2'] = implode("|",$_POST["checklist"]);
	}

	$_POST['send_yn']			= $_POST['send_yn'] == ""?"N":$_POST['send_yn'];
	$_POST['send_kakao_yn']		= $_POST['send_kakao_yn'] == ""?"N":$_POST['send_kakao_yn'];
	$_POST['hidden_yn']			= $_POST['hidden_yn'] == ""?"N":$_POST['hidden_yn'];
	$_POST['send_idx']			= $_POST['send_idx'] == ""?"0":$_POST['send_idx'];

	$sql = "
		insert into ".$tbl." SET 
		goods_idx= '".$_POST['goods_idx']."',
		goods_name= '".$_POST['goods_name']."',";

	if($_POST['category_idx'] != ""){
		$sql .= "category_idx = '".$_POST['category_idx']."',";
	}
	if($_POST['option_idx'] != ""){
		$sql .= "option_idx = '".$_POST['option_idx']."',";
	}
	$sql .= "send_idx = '".$_POST['send_idx']."',
	category_name = '".$_POST['category_name']."',
	option_name = '".$_POST['option_name']."',";
	if($_POST['price'] != ""){
		$sql .= "price = '".$_POST['price']."',";
	}

	$sql .= "pay_method = '".$_POST['pay_method']."',";

	if($_POST['pay_price'] != ""){
		$sql .= "pay_price = '".$_POST['pay_price']."',";
	}
	if($_POST['pay_point'] != ""){
		$sql .= "pay_point = '".$_POST['pay_point']."',";
	}
	if($_POST['save_point'] != ""){
		$sql .= "save_point = '".$_POST['save_point']."',";
	}
	if($_POST['mngr_idx'] != ""){
		$sql .= "mngr_idx = '".$_POST['mngr_idx']."',";
	}

	$sql .= "mngr_name = '".$_POST['mngr_name']."',";

	if($_POST['app_date'] != "" && $_POST['app_minutes'] != ""){
		$sql .= "
		app_date = '".$_POST['app_date']."',
		app_minutes = '".$_POST['app_minutes']."',
		";
	}
	$sql .= "
		method = '".$_POST['method']."',
		user_id = '".$user_id."',
		user_name = '".$_POST['user_name']."',
		phone = '".$_POST['phone']."',
		email = '".$_POST['email']."',
		company = '".$_POST['company']."',
		com_kind = '".$_POST['com_kind']."',
		com_regno = '".$_POST['com_regno']."',
		sales = '".$_POST['sales']."',
		addr = '".$_POST['addr']."',
		subject = '".$_POST['subject']."',
		contents = '".$_POST['contents']."',
		contents2 = '".$_POST['contents2']."',
		send_contents = '".$_POST['send_contents']."',
		etc01 = '".$_POST['etc01']."',
		status = '".$_POST['status']."',
		send_yn = '".$_POST['send_yn']."',
		send_kakao_yn = '".$_POST['send_kakao_yn']."',
		hidden_yn = '".$_POST['hidden_yn']."',
		reg_date = now(),
		reg_user_id = '".$user_id."',
		reg_ip = '".$_SERVER["REMOTE_ADDR"]."'
	";

	//echo $sql;

	$rsf = mysqli_query($GLOBALS['dblink'], $sql);
	$insert_idx = mysqli_insert_id($GLOBALS['dblink']);
	$total = mysqli_affected_rows($GLOBALS['dblink']);

	if($total > 0){
		return $insert_idx;
	}else{
		return false;
	}
}
// ----------------------------------------------------------------------------- ���� ���� ���� -----------------------------------------------------------------------------// ED

// ----------------------------------------------------------------------------- ���� ���� ���� -----------------------------------------------------------------------------// ST

function updateConsultingInfo($idx){
	$tbl = "tbl_consulting";
	//�̹������� ó��

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
	if($_POST['status'] != ""){
		$sql .= " status = '".$_POST['status']."',";
	}
	if($_POST['remark'] != ""){
		$sql .= " remark = '".$_POST['remark']."',";
	}
	$sql .= " upt_date = now(),
		 upt_user_id = '".$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]."',
		 upt_ip = '".$_SERVER["REMOTE_ADDR"]."'
		 WHERE idx = ".$idx."
	";

	//echo $sql;
	$rsf = mysqli_query($GLOBALS['dblink'], $sql);

	if($rsf){
		return true;
	}else{
		return false;
	}
}

// ----------------------------------------------------------------------------- ���� ���� ���� -----------------------------------------------------------------------------// ED

// ----------------------------------------------------------------------------- ���� ���� ���� -----------------------------------------------------------------------------// ST
function deleteConsultingInfo($idx){
	$tbl = "tbl_consulting";

	//�̹������� ó��
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


// ----------------------------------------------------------------------------- ���� ���� ���� -----------------------------------------------------------------------------// ED
?>