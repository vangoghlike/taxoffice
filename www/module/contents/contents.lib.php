<?
/*********************************** ī�װ�� *************************************/

//ī�װ�� ���� ��������
function getContentsInfo($idx, $val=''){
	//���̺�
	$tbl = "tbl_contents";

	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl." ";
	if ( $val == 'wrq' ) {
		$sql .= "WHERE cat_no='$idx' ";
	} else {
		$sql .= "WHERE idx='$idx' ";
	}

//echo $sql;
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total_rs = mysqli_num_rows($rs);

	if($total_rs > 0){
			$list['total'] = $total_rs;
			for($i=0; $i < $total_rs; $i++){
				$list['list'][$i] = mysqli_fetch_assoc($rs);
				$list['list'][$i]["contents"] = str_replace("’","'",$list['list'][$i]['contents']);
			}
	}else{
			$list['total'] = 0;
	}

  return $list;
}

//ī�װ�� ����
function editContents() {
	//���̺�
	$tbl = "tbl_contents";

	$idx = postNullCheck('idx');
	$subject = postNullCheck('subject');
	$is_use = postNullCheck('is_use');
	$contents = str_replace("'","’",postNullCheck('contents'));

	// ������ ī�װ�� ����
	$update_que = "update $tbl set
			subject='".$subject."',
			is_use='".$is_use."',
			contents='".$contents."',
			upt_date = now(),
			upt_user_id = '".$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]."',
			upt_ip = '".$_SERVER['REMOTE_ADDR']."'
		where idx='".$idx."'";
	$update_result = mysqli_query($GLOBALS['dblink'], $update_que);

	if($update_result){
		return true;
	}else{
		return false;
	}
}


function edit_cat_work_request($tbl_category="") {
	// table choice
	$tbl = "tbl_contents";

	$idx = postNullCheck('idx');
	$cat_no = postNullCheck('cat_no');
	$wrq_num = postNullCheck('work_request_num');
	$wrq_mem = postNullCheck('work_request_member');
	$data_location = postNullCheck('location');
	$wrq_num_val = '';
	$wrq_mem_val = '';
	foreach ($wrq_num as $item) {
		$wrq_num_val .= $item . ',';
	}
	$wrq_num_val = substr($wrq_num_val,0,-1);
	foreach ($wrq_mem as $item) {
		$wrq_mem_val .= $item . ',';
	}
	$wrq_mem_val = substr($wrq_mem_val,0,-1);

	$tbl_name = "";
	if($tbl_category) {
		$tbl_name = $tbl_category;
	} else {
		$tbl_name = 'tbl_category';
	}

	$update_cate_que = "update `{$tbl_name}` set
			location = '".$data_location."'
		where cat_no='".$cat_no."'";
	$update_cate_result = mysqli_query($GLOBALS['dblink'], $update_cate_que);

	// sql
	$update_que = "update $tbl set
			work_request_num = '".$wrq_num_val."', 
			work_request_member = '".$wrq_mem_val."'
		where idx='".$idx."'";

	//echo $update_que;
	$update_result = mysqli_query($GLOBALS['dblink'], $update_que);

	if($update_result){
		return true;
	}else{
		return false;
	}
}

?>
