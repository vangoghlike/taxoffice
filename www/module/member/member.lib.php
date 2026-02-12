<?
/*********************************** 회원관련 *************************************/
//회원등급 등록
function createMemberLevel($level_no, $level_name){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["member_level"];

	// 테이블에 입력
	$sql = "INSERT INTO ".$tbl." set
		level_no='$level_no',
		level_name='$level_name',
		wdate = now()
	";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}



//회원등급 수정하기
function editMemberLevel($idx){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["member_level"];

	// 테이블에 입력
	$sql = "UPDATE ".$tbl." set
		level_no='".mysqli_escape_string($_POST[level_no])."',
		level_name='".mysqli_escape_string($_POST[level_name])."'
		WHERE idx='".mysqli_escape_string($_POST[idx])."'
	";
	/*
	,
		level_point='".mysqli_escape_string($_POST[level_point])."',
		level_price='".mysqli_escape_string($_POST[level_price])."',
		coupon1='".mysqli_escape_string($_POST[coupon1])."',
		coupon2='".mysqli_escape_string($_POST[coupon2])."',
		favor1='".mysqli_escape_string($_POST[favor1])."',
		favor2='".mysqli_escape_string($_POST[favor2])."',
		favor1_ea='".mysqli_escape_string($_POST[favor1_ea])."'
	*/

	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_affected_rows($GLOBALS[dblink]);


	if($rs){
		return true;
	}else{
		return false;
	}
}

//회원등급정보
function getMemberLevelInfo($level){
	$tbl = $GLOBALS["_conf_tbl"]["member_level"];

	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl." ";
	$sql .= "WHERE level_no = '$level' ";

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


//회원목록
function getMemberList($sw, $sk, $scale, $offset=0){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["member"];

    $sql = "SELECT * FROM $tbl WHERE 1=1 ";

	if($_GET[level] == "90") {
		$sql .= " AND user_level = '90' ";
	} else if($_GET[level] == "80") {
		$sql .= " AND user_level = '80' ";
	} else {
		$sql .= " AND user_level != '80' AND user_level != '90' ";
	}

	if($_GET[user_level] == "3" || $_GET[user_level] == "4") {
		$sql .= " AND user_level = '$_GET[user_level]' ";
	}else{
		$sql .= " AND user_level != '3' AND user_level != '4' ";
	}
	if($sw == "id"){
		$sql .= " AND user_id like '%$sk%' ";
	}else if($sw == "name"){
		$sql .= " AND user_name like '%$sk%' ";
	}else if($sw == "mobile"){
		$sql .= " AND mobile like '%$sk%' ";
	}else if($sw == "ll2"){
		$sql .= " AND login_last <= '$sk 23:59:59' AND etc_2!='Y' ";
	}else if($sw == "ll"){
		$sql .= " AND login_last <= '$sk 23:59:59' ";
	}else if($sw == "all"){
		$sql .= " AND ( (user_name like '%$sk%') OR (user_id like '%$sk%') OR (mobile like '%$sk%') )";
	}

	if($_REQUEST[s_date]){
		$sql .= " AND wdate >= '".$_REQUEST[s_date]."' ";
	}
	if($_REQUEST[e_date]){
		$sql .= " AND wdate <= '".$_REQUEST[e_date]."' ";
	}
	$sql .= " order by idx desc ";
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
		    	$sql .= " limit $offset,$scale ";
			}
			//echo $sql;
		    $rs = mysqli_query($GLOBALS[dblink],$sql);

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


//회원가입
function joinMember(){
	$tbl = $GLOBALS["_conf_tbl"]["member"];
	$tbl_baby = $GLOBALS["_conf_tbl"]["member_baby"];

	$_POST['mobile'] = $_POST['mobile_1']."-".$_POST['mobile_2']."-".$_POST['mobile_3'];
	$_POST['email'] = $_POST['email_1']."@".$_POST['email_2'];
	$filtered=array(
			'user_id'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['user_id']),
			'user_pw'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['passwd']),
			'user_name'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['user_name']),
			'company'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['company']),
			'department'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['department']),
			'duty'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['duty']),
			'email'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['email']),
			'zip'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['zip']),
			'address'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['address']),
			'address_ext'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['address_ext']),
			'mobile'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['mobile']),
			'phone'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['phone']),
			'f_product'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['f_product']),
			'email_accept'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['email_accept']),
			'sms_accept'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['sms_accept']),
			'job'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['job']),
			'etc_1'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['etc_1']),
			'etc_4'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['etc_4']),
			'etc_5'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['etc_5']),
			'etc_6'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['etc_6']),
			'etc_7'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['etc_7']),
			'etc_8'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['etc_8']),
			'etc_9'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['etc_9']),
			'etc_10'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['etc_10'])
	);

	$email_accept_date='0000-00-00 00:00:00';
	$email_accept = $filtered['email_accept']=="Y"?"Y":"N";
	if($email_accept=="Y"){
		$email_accept_date = date("Y-m-d H:i:s");
	}
	$sms_accept_date='0000-00-00 00:00:00';
	$sms_accept = $filtered['sms_accept']=="Y"?"Y":"N";
	if($sms_accept=="Y"){
		$sms_accept_date = date("Y-m-d H:i:s");
	}

	$arrCheck = getUserInfo($filtered['user_id']);

	if($arrCheck["total"] > 0){
		return false;
	}else{
		$sql = "INSERT INTO ".$tbl." set
			user_id = '".$filtered['user_id']."',
			user_pw = '".shittyPassword($filtered['user_pw'])."',
			regnum1 = '',
			regnum2 = '',
			user_name = '".$filtered['user_name']."',
			user_status = '0',
			user_level = '0',
			user_memo = '',
			company = '".$filtered['company']."',
			department = '".$filtered['department']."',
			duty = '".$filtered['duty']."',
			solar = 'E',
			sex = 'M',
			email = '".$filtered['email']."',
			zip = '".$filtered['zip']."',
			address = '".$filtered['address']."',
			address_ext = '".$filtered['address_ext']."',
			address_type = '자택',
			phone = '".$filtered['phone']."',
			mobile = '".$filtered['mobile']."',
			fax = '',
			f_cat = '',
			f_product = '".$filtered['f_product']."',
			email_accept = '$email_accept',
			email_accept_date = '$email_accept_date',
			sms_accept = '$sms_accept',
			sms_accept_date = '$sms_accept_date',
			marriage = 'E',
			marriage_date = '0000-00-00 00:00:00',
			job = '".$filtered['job']."',
			etc_1 = '".$filtered['etc_1']."',
			etc_4 = '".$filtered['etc_4']."',
			etc_5 = '".$filtered['etc_5']."',
			etc_6 = '".$filtered['etc_6']."',
			etc_7 = '".$filtered['etc_7']."',
			etc_8 = '".$filtered['etc_8']."',
			etc_9 = '".$filtered['etc_9']."',
			etc_10 = '".$filtered['etc_10']."',
			login_last = now(),
			wdate = now(),
			udate = now()
		";
		//	echo $sql;
		$rs = mysqli_query($GLOBALS['dblink'], $sql);
		$total = mysqli_affected_rows($GLOBALS[dblink]);

		if($total > 0){
			/*
			//자녀가 있는경우
			if($_POST[babychk]=="Y") {
				for($i=0; $i<$_POST["count"]; $i++) {
					$baby_brith = mysqli_escape_string($_POST["babybirth_".$i]);

					if($_POST["children_value"]=="c_".$i) {
						$children_value = "Y";
					} else {
						$children_value = "N";
					}

					$sql = "INSERT INTO ".$tbl_baby." set
						user_id = '".$email."',
						babyname = '".mysqli_escape_string($_POST["babyname_".$i])."',
						prenatal = '".mysqli_escape_string($_POST["prenatal_".$i])."',
						sex = '".mysqli_escape_string($_POST["sex_".$i])."',
						birth = '".$baby_brith."',
						children = '".$children_value."',
						wdate = now()
					";
					$rs = mysqli_query($GLOBALS['dblink'], $sql);
				}
			}

			if($_SITE["SHOP"]["POINT"]["JOIN"]>0) {
			//	setPlusPoint($email, $_SITE["SHOP"]["POINT"]["JOIN"], "회원가입 포인트");
			}

			$arrInfo = getCouponInfo("8");

			$coupon_name="회원가입쿠폰";
			$serial = substr(strtoupper(md5($coupon_name.$email.microtime(true))),0,16);
			$edate =  date("Y-m-d", mktime(0,0,0,date("m")+$arrInfo["list"][0][coupon_content],date("d"),date("Y")));

			쿠폰발행
			$sql = "INSERT INTO tbl_mycoupon SET
				user_id='".$email."',
				e_idx='8',
				coupon_no='".$serial."',
				coupon_name='".$coupon_name."',
				coupon_dis='".$arrInfo["list"][0][coupon_dis]."',
				coupon_unit='".$arrInfo["list"][0][coupon_unit]."',
				coupon_sdate=now(),
				coupon_edate='".$edate."',
				coupon_use='N',
				over_price='".$arrInfo["list"][0][over_price]."',
				under_price='".$arrInfo["list"][0][under_price]."',
				wdate=now()
			";
			$rs = mysqli_query($GLOBALS['dblink'], $sql);
			*/
			return true;
		}else{
			return false;
		}
	}
}

//회원가입 - 관리자
function joinMemberAdmin(){
	$tbl = $GLOBALS["_conf_tbl"]["member"];

	$email = mysqli_escape_string($_POST[email_id]) . "@" . mysqli_escape_string($_POST[email_domain]);
	$zip = mysqli_escape_string($_POST[zip]);
	$phone = mysqli_escape_string($_POST[phone_1]) . "-" . mysqli_escape_string($_POST[phone_2]) . "-" . mysqli_escape_string($_POST[phone_3]);
	$mobile = mysqli_escape_string($_POST[mobile_1]) . "-" . mysqli_escape_string($_POST[mobile_2]) . "-" . mysqli_escape_string($_POST[mobile_3]);

	$arrCheck = getUserInfo(mysqli_escape_string($_POST[user_id]));

	$pw = shittyPassword(mysqli_escape_string($_POST[user_pw]));

	if($arrCheck["total"] > 0){
		return false;
	}else{
		$sql = "INSERT INTO ".$tbl." set
			user_id = '".mysqli_escape_string($_POST[user_id])."',
			user_pw = '".$pw."',
			user_name = '".mysqli_escape_string($_POST[user_name])."',
			user_status = '0',
			user_level = '1',
			company = '".mysqli_escape_string($_POST[company])."',
			department = '".mysqli_escape_string($_POST[department])."',
			duty = '".mysqli_escape_string($_POST[duty])."',
			birth = '".mysqli_escape_string($_POST[birth])."',
			sex = '".mysqli_escape_string($_POST[sex])."',
			email = '".$email."',
			zip = '".$zip."',
			address = '".mysqli_escape_string($_POST[address])."',
			address_ext = '".mysqli_escape_string($_POST[address_ext])."',
			phone = '".$phone."',
			mobile = '".$mobile."',
			etc_5 = '".mysqli_escape_string($_POST[etc_5])."',
			etc_6 = '".mysqli_escape_string($_POST[etc_6])."',
			etc_7 = '".mysqli_escape_string($_POST[etc_7])."',
			wdate = now(),
			udate = now()
		";

		$rs = mysqli_query($GLOBALS['dblink'], $sql);
		$total = mysqli_affected_rows($GLOBALS[dblink]);

		if($total > 0){
			return true;
		}else{
			return false;
		}
	}
}

//회원정보 수정 - 관리자용
function editMemberAdmin($id){
	$tbl = $GLOBALS["_conf_tbl"]["member"];

	if($_POST[user_pw] !="" && $_POST[user_pw] !="" && $_POST[user_pw] == $_POST[user_pw2]){
		$sql_pw = " user_pw = '".shittyPassword(mysqli_escape_string($_POST[user_pw]))."', ";
	}

	$birth = mysqli_escape_string($_POST[birth]);
	$solar = mysqli_escape_string($_POST[solar])=="S"?"S":"L";
	$sex = mysqli_escape_string($_POST[sex])=="M"?"M":"F";
	$email_accept = mysqli_escape_string($_POST[email_accept])=="Y"?"Y":"N";
	if($email_accept=="Y"){
		$email_accept_date = date("Y-m-d H:i:s");
	}
	$user_status = mysqli_escape_string($_POST[user_status])=="1"?"1":"0";
	$user_level = $_POST["user_level"];
	$zip = mysqli_escape_string($_POST[zip]);
	$address_type = mysqli_escape_string($_POST[address_type])=="자택"?"자택":"직장";
	$phone = mysqli_escape_string($_POST[phone_1]) . "-" . mysqli_escape_string($_POST[phone_2]) . "-" . mysqli_escape_string($_POST[phone_3]);
	$email = mysqli_escape_string($_POST[email_1]) . "@" . mysqli_escape_string($_POST[email_2]);
	$mobile = $_POST["mobile_1"] . "-" . $_POST["mobile_2"] . "-" . $_POST["mobile_3"];
	$fax = mysqli_escape_string($_POST[fax_1]) . "-" . mysqli_escape_string($_POST[fax_2]) . "-" . mysqli_escape_string($_POST[fax_3]);

	$marriage = mysqli_escape_string($_POST[marriage])!=""?mysqli_escape_string($_POST[marriage]):"E";
	$marriage_date = mysqli_escape_string($_POST[marriage_date]);
	$sms_accept = mysqli_escape_string($_POST[sms_accept])=="Y"?"Y":"N";
	if($sms_accept=="Y"){
		$sms_accept_date = date("Y-m-d H:i:s");
	}

	$sql = "UPDATE ".$tbl." SET
		$sql_pw
		user_status = '$user_status',
		user_level = '$user_level',
		user_memo = '".mysqli_escape_string($_POST[user_memo])."',
		company = '".mysqli_escape_string($_POST[company])."',
		department = '".mysqli_escape_string($_POST[department])."',
		duty = '".mysqli_escape_string($_POST[duty])."',
		zip = '".$zip."',
		address = '".mysqli_escape_string($_POST[address])."',
		address_ext = '".mysqli_escape_string($_POST[address_ext])."',
		address_type = '".$address_type."',
		phone = '".$phone."',
		mobile = '".$mobile."',
		fax = '".$fax."',
		email = '".$email."',
		job = '".mysqli_escape_string($_POST[job])."',
		etc_4 = '".mysqli_escape_string($_POST[etc_4])."',
		etc_5 = '".mysqli_escape_string($_POST[etc_5])."',
		etc_6 = '".mysqli_escape_string($_POST[etc_6])."',
		etc_7 = '".mysqli_escape_string($_POST[etc_7])."',
		etc_8 = '".mysqli_escape_string($_POST[etc_8])."',
		etc_9 = '".mysqli_escape_string($_POST[etc_9])."',
		etc_10 = '".mysqli_escape_string($_POST[etc_10])."',
		udate = now()
		WHERE user_id='$id'
	";
	//echo $sql;

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	}else{
		return false;
	}
}

//회원정보 수정
function editMember($id){
	$_POST['mobile'] = $_POST['mobile_1']."-".$_POST['mobile_2']."-".$_POST['mobile_3'];
	$_POST['email'] = $_POST['email_1']."@".$_POST['email_2'];
	$filtered=array(
			'member_id'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['member_id']),
			'user_pw'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['passwd']),
			'user_name'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['user_name']),
			'company'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['company']),
			'department'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['department']),
			'duty'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['duty']),
			'email'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['email']),
			'zip'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['zip']),
			'address'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['address']),
			'address_ext'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['address_ext']),
			'mobile'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['mobile']),
			'phone'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['phone']),
			'f_product'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['f_product']),
			'email_accept'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['email_accept']),
			'sms_accept'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['sms_accept']),
			'job'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['job']),
			'etc_1'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['etc_1']),
			'etc_4'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['etc_4']),
			'etc_5'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['etc_5']),
			'etc_6'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['etc_6']),
			'etc_7'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['etc_7']),
			'etc_8'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['etc_8']),
			'etc_9'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['etc_9']),
			'etc_10'=>mysqli_real_escape_string($GLOBALS['dblink'],$_POST['etc_10'])
	);

	$tbl = $GLOBALS["_conf_tbl"]["member"];
	$tbl_baby = $GLOBALS["_conf_tbl"]["member_baby"];

	if($_POST['passwd'] !="" && $_POST['passwd_conf'] !="" && $_POST['passwd'] == $_POST['passwd_conf']){
		$sql_pw = " user_pw = '".shittyPassword($filtered['user_pw'])."', ";
	}

	$email_accept_date='0000-00-00 00:00:00';
	$email_accept = $filtered['email_accept']=="Y"?"Y":"N";
	if($email_accept=="Y"){
		$email_accept_date = date("Y-m-d H:i:s");
	}
	$sms_accept_date='0000-00-00 00:00:00';
	$sms_accept = $filtered['sms_accept']=="Y"?"Y":"N";
	if($sms_accept=="Y"){
		$sms_accept_date = date("Y-m-d H:i:s");
	}

	$sql = "UPDATE ".$tbl." SET
		$sql_pw
		email = '".$filtered['email']."',
		company = '".$filtered['company']."',
		duty = '".$filtered['duty']."',
		department = '".$filtered['department']."',
		zip = '".$filtered['zip']."',
		address = '".$filtered['address']."',
		address_ext = '".$filtered['address_ext']."',
		phone = '".$filtered['phone']."',
		mobile = '".$filtered['mobile']."',
		f_product='".$filtered['f_product']."',
		sms_accept = '$email_accept',
		sms_accept_date = '$email_accept_date',
		sms_accept = '$sms_accept',
		sms_accept_date = '$sms_accept_date',
		job = '".$filtered['job']."',
		etc_1 = '".$filtered['etc_1']."',
		etc_4 = '".$filtered['etc_4']."',
		etc_5 = '".$filtered['etc_5']."',
		etc_6 = '".$filtered['etc_6']."',
		etc_7 = '".$filtered['etc_7']."',
		etc_8 = '".$filtered['etc_8']."',
		etc_9 = '".$filtered['etc_9']."',
		etc_10 = '".$filtered['etc_10']."',
		udate = now()
		WHERE user_id='$id'
	";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	}else{
		return false;
	}
}

//회원비밀번호 수정
function editPasswd($id){
	$tbl = $GLOBALS["_conf_tbl"]["member"];

	$arrCheck = getUserInfo($id);

	$sql = "UPDATE ".$tbl." SET
		user_pw = '".shittyPassword($_POST['user_pw'])."'
		WHERE user_id='$id'
	";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	}else{
		return false;
	}
}

//회원정보 가져오기 - 사업자번호 중복체크용
function getUserFindCompanyNumber($etc_1){
	$tbl = $GLOBALS["_conf_tbl"]["member"];

	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl." ";
	$sql .= "WHERE etc_1='$etc_1' ";
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


//회원정보 가져오기
function getUserInfo($id, $level=""){
	$tbl = $GLOBALS["_conf_tbl"]["member"];
	$tbl_baby = $GLOBALS["_conf_tbl"]["member_baby"];

	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl." ";
	$sql .= "WHERE user_id = '$id' ";
	if($level != "") {
		$sql .= " AND user_level !='80' AND user_level !='90' ";
	}
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

	//자녀정보 가져오기
//    $sql  = "SELECT * ";
//    $sql .= "FROM ".$tbl_baby." ";
//    $sql .= "WHERE user_id = '$id' order by idx";
//    $rs = mysqli_query($GLOBALS['dblink'], $sql);
//    $total_rs = mysqli_num_rows($rs);

//    if($total_rs > 0){
//        $list['total_baby'] = $total_rs;
//        for($i=0; $i < $total_rs; $i++){
//            $list['baby'][$i] = mysqli_fetch_assoc($rs);
//        }
//    }else{
//        $list['total_baby'] = 0;
//    }


	return $list;
}

//기간별회원
function getMemberInfo($sdate, $edate) {
	$tbl = $GLOBALS["_conf_tbl"]["member"];

	$sql  = "SELECT count(*) as num ";
	$sql .= "FROM ".$tbl." ";
	$sql .= "WHERE 1=1 ";
	if($sdate){
		$sql .= " AND wdate >= '".mysqli_escape_string($sdate)." 00:00:00' ";
	}
	if($edate){
		$sql .= " AND wdate <= '".mysqli_escape_string($edate)." 23:59:59' ";
	}
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

//회원정보 가져오기 - 핸드폰 중복체크용
function getUserFindMobile($mobile){
	$tbl = $GLOBALS["_conf_tbl"]["member"];

	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl." ";
	$sql .= "WHERE mobile='$mobile' ";
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


//회원정보 가져오기 - 아이디 찾기용
function getUserFindEmail($name, $email){
	$tbl = $GLOBALS["_conf_tbl"]["member"];

	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl." ";
	$sql .= "WHERE user_name = '$name' AND email='$email'";

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

//회원정보 가져오기 - 아이디 찾기용
function getUserFindID($user_name="", $email=""){
	$tbl = $GLOBALS["_conf_tbl"]["member"];

	$sql  = "SELECT * FROM ".$tbl." ";
	$sql .= "WHERE email = '$email' AND user_name='$user_name'";

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

//회원정보 가져오기 - 아이디 찾기용
function getUserFindPassW($uid, $name, $mobile){
	$tbl = $GLOBALS["_conf_tbl"]["member"];

	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl." ";
	$sql .= "WHERE user_id = '$uid' AND user_name = '$name' AND mobile='$mobile'";

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

//회원정보 가져오기 - 비밀번호 찾기용
function getUserFindPW($user_id, $user_name, $email){
	$tbl = $GLOBALS["_conf_tbl"]["member"];

	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl." ";
	$sql .= "WHERE user_name = '$user_name' AND  email='$email' AND user_id='$user_id' ";
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

//회원정보 가져오기 - 로그인용
function loginMember($id, $pw){

	$filtered=array(
			'id'=>mysqli_real_escape_string($GLOBALS['dblink'],$id),
			'pw'=>mysqli_real_escape_string($GLOBALS['dblink'],$pw)
	);

	$tbl = $GLOBALS["_conf_tbl"]["member"];

	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl." ";
	$sql .= "WHERE user_id = '".$filtered['id']."' AND user_pw = '".$filtered['pw']."' ";
	$sql .= " AND  user_level != '90' ";

	//echo $sql;
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total_rs = mysqli_num_rows($rs);

	if($total_rs > 0){
			//로그인정보 기록
			mysqli_query($GLOBALS['dblink'],"update ".$GLOBALS["_conf_tbl"]["member"]." set login_count = login_count + 1, login_last = now() WHERE user_id='".$filtered['id']."' ");
			$list['total'] = $total_rs;
			for($i=0; $i < $total_rs; $i++){
					$list['list'][$i] = mysqli_fetch_assoc($rs);
			}
	}else{
			$list['total'] = 0;
	}
	return $list;
}

//회원정보 가져오기 - 회원탈퇴용
/*
function withdrawalMember($id){
	$tbl = $GLOBALS["_conf_tbl"]["member"];

	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl." ";
	$sql .= "WHERE user_id = '$id' and user_pw = '".$_POST[user_pw]."'  ";
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
*/
//회원정보 가져오기 - 회원탈퇴용
function withdrawalMember($id){
	$tbl = $GLOBALS["_conf_tbl"]["member"];

	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl." ";
	$sql .= "WHERE user_id = '$id' ";
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

//회원 탈퇴
function out_Member($id){

	$tbl = $GLOBALS["_conf_tbl"]["member"];

	$sql = "UPDATE ".$tbl." SET
		user_level = '4',
		user_memo = '".mysqli_real_escape_string($GLOBALS['dblink'],$_POST['out_reason'])."'
		WHERE user_id='$id'
	";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	}else{
		return false;
	}
}

function memberLevelChange($id,$level){

	$tbl = $GLOBALS["_conf_tbl"]["member"];

	$sql = "UPDATE ".$tbl." SET
		user_level = '$level'
		WHERE user_id='$id'
	";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($rs){
		return true;
	}else{
		return false;
	}
}

//회원탈퇴
function deleteMember($id){
	//회원정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["member"];

	//회원 정보
	$sql = "UPDATE ".$tbl." SET user_level = '90' , mobile = '000-0000-0000' WHERE user_id='".$id."'	";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total_rs = mysqli_affected_rows($GLOBALS['dblink']);
	echo $total_rs;
	if($total_rs > 0){
		return true;
	}else{
		return false;
	}
}

//회원삭제
function outMember($id){
	$tbl = $GLOBALS["_conf_tbl"]["member"];					//회원정보 테이블
	$tbl_baby = $GLOBALS["_conf_tbl"]["member_baby"];	//회원자녀정보 테이블

	//회원 정보
	$sql = "DELETE FROM ".$tbl." WHERE user_id='".$id."'	";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total_rs = mysqli_affected_rows();

	$sql = "DELETE FROM ".$tbl_baby." WHERE user_id='".$id."'	";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);

	if($total_rs > 0){
		return true;
	}else{
		return false;
	}
}

//배송지 목록
function getAddressList($user_id, $scale, $offset=0){
	// 테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["member_address"];

    $sql = "SELECT * FROM $tbl WHERE user_id='$user_id' ";
	$sql .= " order by d_addr, idx desc ";


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
		    $rs = mysqli_query($sql,$GLOBALS[dblink]);

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

//회원정보 가져오기
function getAddressInfo($idx){
	$tbl = $GLOBALS["_conf_tbl"]["member_address"];

	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl." ";
	$sql .= "WHERE idx = '$idx' ";

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

//배송지입력
function insertAddress($user_id){
	$tbl = $GLOBALS["_conf_tbl"]["member_address"];

	$d_addr = mysqli_escape_string($_POST[d_addr])=="Y"?"Y":"N";
	$zip = mysqli_escape_string($_POST[zip]);
	$phone = mysqli_escape_string($_POST[phone_1]) . "-" . mysqli_escape_string($_POST[phone_2]) . "-" . mysqli_escape_string($_POST[phone_3]);
	$mobile = mysqli_escape_string($_POST[mobile_1]) . "-" . mysqli_escape_string($_POST[mobile_2]) . "-" . mysqli_escape_string($_POST[mobile_3]);

	if($d_addr=="Y") { //다른곳 기본주소초기화
		$sql_up = "UPDATE ".$tbl." set
			d_addr = 'N'
			where user_id = '".$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]."'
		";
		$rs_up = mysqli_query($sql_up, $GLOBALS[dblink]);
	}

	$sql = "INSERT INTO ".$tbl." set
		shipping = '".mysqli_escape_string($_POST[shipping])."',
		d_addr = '".$d_addr."',
		user_id = '".$user_id."',
		name = '".mysqli_escape_string($_POST[name])."',
		zip = '".$zip."',
		address = '".mysqli_escape_string($_POST[address])."',
		address_ext = '".mysqli_escape_string($_POST[address_ext])."',
		phone = '".$phone."',
		mobile = '".$mobile."',
		wdate = now()
	";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_affected_rows($GLOBALS[dblink]);


	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//배송지수정
function editAddress($idx){
	$tbl = $GLOBALS["_conf_tbl"]["member_address"];

	$d_addr = mysqli_escape_string($_POST[d_addr])=="Y"?"Y":"N";
	$zip = mysqli_escape_string($_POST[zip]);
	$phone = mysqli_escape_string($_POST[phone_1]) . "-" . mysqli_escape_string($_POST[phone_2]) . "-" . mysqli_escape_string($_POST[phone_3]);
	$mobile = mysqli_escape_string($_POST[mobile_1]) . "-" . mysqli_escape_string($_POST[mobile_2]) . "-" . mysqli_escape_string($_POST[mobile_3]);

	if($d_addr=="Y") { //다른곳 기본주소초기화
		$sql_up = "UPDATE ".$tbl." set
			d_addr = 'N'
			where user_id = '".$_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]."'
		";
		$rs_up = mysqli_query($sql_up, $GLOBALS[dblink]);
	}

	$sql = "UPDATE ".$tbl." set
		shipping = '".mysqli_escape_string($_POST[shipping])."',
		d_addr = '".$d_addr."',
		name = '".mysqli_escape_string($_POST[name])."',
		zip = '".$zip."',
		address = '".mysqli_escape_string($_POST[address])."',
		address_ext = '".mysqli_escape_string($_POST[address_ext])."',
		phone = '".$phone."',
		mobile = '".$mobile."'
		where idx = '".$idx."'
	";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//배송지 삭제
function deleteAddress($idx){
	//회원정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["member_address"];

	//회원 정보 삭제
	$sql = "DELETE FROM ".$tbl." WHERE idx='".$idx."'	";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total_rs = mysqli_affected_rows();

	if($total_rs > 0){
		return true;
	}else{
		return false;
	}
}

//회원정보 가져오기 - KTOA 전용
function getAppUserInfo($id){
	$tbl = "tbl_board_ktoamember";

	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl." ";
	$sql .= "WHERE subject = '$id' ";

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
//회원정보 가져오기 - 로그인용
function loginAppMember($id, $pw){
	$tbl = "tbl_member";

	$sql  = "SELECT * FROM ".$tbl." ";
	$sql .= "WHERE user_id = '$id' AND user_pw = '$pw' ";

	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total_rs = mysqli_num_rows($rs);

	if($total_rs > 0){
			//로그인정보 기록
			mysqli_query($GLOBALS[dblink], "update ".$GLOBALS["_conf_tbl"]["member"]." set login_count = login_count + 1, login_last = now() WHERE user_id='$id' ");
			$list['total'] = $total_rs;
			for($i=0; $i < $total_rs; $i++){
					$list['list'][$i] = mysqli_fetch_assoc($rs);
			}
	}else{
			$list['total'] = 0;
	}
	return $list;
}

function shittyPassword($input, $hex = true) {
	$nr    = 1345345333;
	$add   = 7;
	$nr2   = 0x12345671;
	$tmp   = null;
	$inlen = strlen($input);
	for ($i = 0; $i < $inlen; $i++) {
		$byte = substr($input, $i, 1);
		if ($byte == ' ' || $byte == "\t") {
			continue;
		}
		$tmp = ord($byte);
		$nr ^= ((($nr & 63) + $add) * $tmp) + (($nr << 8) & 0xFFFFFFFF);
		$nr2 += (($nr2 << 8) & 0xFFFFFFFF) ^ $nr;
		$add += $tmp;
	}
	$out_a  = $nr & ((1 << 31) - 1);
	$out_b  = $nr2 & ((1 << 31) - 1);
	$output = sprintf("%08x%08x", $out_a, $out_b);
	if ($hex) {
		return $output;
	}

	return hexHashToBin($output);
}

function hexHashToBin($hex) {
	$bin = "";
	$len = strlen($hex);
	for ($i = 0; $i < $len; $i += 2) {
		$byte_hex  = substr($hex, $i, 2);
		$byte_dec  = hexdec($byte_hex);
		$byte_char = chr($byte_dec);
		$bin .= $byte_char;
	}

	return $bin;
}

function copyOldMemberToNewMember(){
	$sql  = "SELECT * ";
    $sql .= "FROM HPK_USER";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_num_rows($rs);
	// 페이지 네비게이션 오프셋 지정.
	//echo $sql."<br><br>";
	for($i=0; $i < $total; $i++){
		$list['list'][$i] = mysqli_fetch_assoc($rs);
		if($list['list'][$i]["status"] == "N"){
			$member_level = 4;
		}else if($list['list'][$i]["status"] == "R"){
			$member_level = 3;
		}else{
			$member_level = 0;
		}
		if($list['list'][$i]["upt_date"] == ""){
			$udate = "now()";
		}else{
			$udate = "'".$list['list'][$i]["upt_date"]."'";
		}
		$insert_sql  = "INSERT INTO tbl_member set
			idx=".$list['list'][$i]["idno"].",
			user_id='".$list['list'][$i]["user_id"]."',
			user_pw='".$list['list'][$i]["passwd"]."',
			user_name='".$list['list'][$i]["user_name"]."',
			user_level='".$member_level."',
			company='".$list['list'][$i]["company"]."',
			phone='".$list['list'][$i]["tel"]."',
			mobile='".$list['list'][$i]["phone"]."',
			email='".$list['list'][$i]["email"]."',
			zip='".$list['list'][$i]["postcode"]."',
			address='".$list['list'][$i]["addr1"]."',
			address_ext='".$list['list'][$i]["addr2"]."',
			job='".$list['list'][$i]["job"]."',
			email_accept='".$list['list'][$i]["email_agree_yn"]."',
			sms_accept='".$list['list'][$i]["sms_agree_yn"]."',
			etc_1='".$list['list'][$i]["cms_auth"]."',
			etc_2='".$list['list'][$i]["point"]."',
			login_last='".$list['list'][$i]["login_date"]."',
			wdate='".$list['list'][$i]["reg_date"]."',
			udate=".$udate."
		";
		echo $insert_sql."<br>";
		$rsf = mysqli_query($GLOBALS['dblink'], $insert_sql);
	}
	
}

// 포인트 로그
function getMemberPointList($user_id, $scale, $offset=0){
	// 테이블 지정
	$tbl = "tbl_member_point_log";

    $sql = "SELECT * FROM $tbl WHERE 1=1 ";

	$sql .= "AND user_id = '".$user_id."'";


	$sql .= " order by idx desc ";
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
		    	$sql .= " limit $offset,$scale ";
			}
			//echo $sql;
		    $rs = mysqli_query($GLOBALS[dblink],$sql);

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

function pointAdd(){
	// 테이블 지정
	$tbl = "tbl_member";
	$tbllog = "tbl_member_point_log";

    $user_id = $_REQUEST['user_id'];
	$point = (int)($_REQUEST['point']);
	$point_subject = $_REQUEST['point_subject'];

	$sql = "SELECT * FROM $tbl where user_id = '".$user_id."' ";
	$rs = mysqli_query($GLOBALS[dblink],$sql);
	$total = mysqli_affected_rows($GLOBALS[dblink]);
	for($i=0; $i < $total; $i++){
		$list['list'][$i] = mysqli_fetch_assoc($rs);
	}
	$nowPoint = $list['list'][0]["etc_2"];
	if($nowPoint == ""){
		$nowPoint = "0";
	}
	$nowPoint = (int)$nowPoint + $point;

	$sql = "UPDATE ".$tbl." set
		etc_2 = '".$nowPoint."'
		where user_id = '".$user_id."'
	";
	$rs = mysqli_query($GLOBALS['dblink'], $sql);
	$total = mysqli_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		$sql = "SELECT max(order_idx) as max_order_idx FROM $tbllog WHERE 1=1 ";
		$rs = mysqli_query($GLOBALS[dblink],$sql);
		$total = mysqli_affected_rows($GLOBALS[dblink]);
		for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysqli_fetch_assoc($rs);
        }
		$order_idx = $list['list'][0]["max_order_idx"]+1;

		$sql = "INSERT ".$tbllog." set
			user_id = '".$user_id."',
			order_idx = ".$order_idx.",
			pay_method = 'point',
			reci_message = '".$point_subject."',
			price = '".$point."',
			reg_user_id = '".$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]."',
			reg_ip = '".$_SERVER["REMOTE_ADDR"]."',
			reg_date = now()
		";
		$rs = mysqli_query($GLOBALS['dblink'], $sql);
		//echo $sql;
		$insert_total = mysqli_affected_rows($GLOBALS[dblink]);
		if($insert_total > 0){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}
?>
