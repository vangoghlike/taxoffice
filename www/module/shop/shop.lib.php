<?
//상품 등록하기
function insertGood(){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];
	$tbl_opt = $GLOBALS["_conf_tbl"]["shop_good_opt"];
	$tbl_opt_rel = $GLOBALS["_conf_tbl"]["shop_good_opt_rel"];
	$tbl_good_cat = $GLOBALS["_conf_tbl"]["shop_good_cat"];
	$tbl_good_search = $GLOBALS["_conf_tbl"]["shop_good_search"];

	$arrInfo = getCategoryInfo(mysql_escape_string($_POST[cat_no]));

	//아이콘등록
	for($i=0; $i < count($_POST[shop_icon]); $i++){
			$str_icons .= $_POST[shop_icon][$i];
			if($i != count($_POST[shop_icon])-1){
					$str_icons .= "|";
			}
	}

	//관련상품 데이터 조합
	$arrRelGood = explode("|",$_POST[rel_good_hidden]);
	if(count($arrRelGood)>0){
		//관련상품 중복 제거
		$arrRelGoodUnique = array_unique($arrRelGood);
		for($i=0;$i<count($arrRelGoodUnique);$i++){
			if($arrRelGoodUnique[$i]!=""){
				$str_rel_good .= $arrRelGoodUnique[$i] .",";
			}
		}
	}
	$str_rel_good = substr($str_rel_good,0,strlen($str_rel_good)-1);
	

	//상품정보 테이블에 입력
	$sql = "INSERT INTO ".$tbl." set 
		cat_no='".$arrInfo["list"][0][cat_no]."',
		cat_code='".$arrInfo["list"][0][cat_code]."',
		g_code='".mysql_escape_string($_POST[g_code])."',
		g_name='".mysql_escape_string($_POST[g_name])."',
		rel_g_idx='".$str_rel_good."',
		memo='".mysql_escape_string($_POST[memo])."',
		contents='".mysql_escape_string($_POST[contents])."',
		sort_num='".mysql_escape_string($_POST[sort_num])."',
		madein='".mysql_escape_string($_POST[madein])."',
		vendor='".mysql_escape_string($_POST[vendor])."',
		brand='".mysql_escape_string($_POST[brand])."',
		model='".mysql_escape_string($_POST[model])."',
		icons='".mysql_escape_string($str_icons)."',
		p_price='".mysql_escape_string($_POST[p_price])."',
		sale_price='".mysql_escape_string($_POST[sale_price])."',
		price='".mysql_escape_string($_POST[price])."',
		stock='".mysql_escape_string($_POST[stock])."',
		stock_type='".mysql_escape_string($_POST[stock_type])."',
		point='".mysql_escape_string($_POST[point])."',
		point_unit='".mysql_escape_string($_POST[point_unit])."',
		image_type='".mysql_escape_string($_POST[image_type])."',
		is_show='".mysql_escape_string($_POST[is_show])."',
		main_show='".mysql_escape_string($_POST[main_show])."',
		brand_show='".mysql_escape_string($_POST[brand_show])."',
		special_show='".mysql_escape_string($_POST[special_show])."',
		best_show='".mysql_escape_string($_POST[best_show])."',
		mokcha='".mysql_escape_string($_POST[mokcha])."',
		author_name='".mysql_escape_string($_POST[author_name])."',
		author_text='".mysql_escape_string($_POST[author_text])."',
		isbn='".mysql_escape_string($_POST[isbn])."',
		published_date='".mysql_escape_string($_POST[published_date])."',
		published_text='".mysql_escape_string($_POST[published_text])."',
		pages='".mysql_escape_string($_POST[pages])."',
		pan_color='".mysql_escape_string($_POST[pan_color])."',
		cdrom='".mysql_escape_string($_POST[cdrom])."',
		movie='".mysql_escape_string($_POST[movie])."',
		movie_url='".mysql_escape_string($_POST[movie_url])."',
		coupon_use='".mysql_escape_string($_POST[coupon_use])."',
		coupon_dis='".mysql_escape_string($_POST[coupon_dis])."',
		coupon_unit='".mysql_escape_string($_POST[coupon_unit])."',
		coupon_qty='".mysql_escape_string($_POST[coupon_qty])."',
		coupon_limit='".mysql_escape_string($_POST[coupon_limit])."',
		coupon_sdate='".mysql_escape_string($_POST[coupon_sdate])."',
		coupon_edate='".mysql_escape_string($_POST[coupon_edate])."',
		wdate=now()
	";


	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$insert_idx = mysql_insert_id($GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	//추가 카테고리 정보 입력
	$ext_cat_value_arr=explode("|:|",$_POST["ext_cat_hidden"]);

	for($j=0;$j<count($ext_cat_value_arr);$j++){
		$arrCatInfo = getCategoryInfo($ext_cat_value_arr[$j]);
		if($arrCatInfo["list"][0][cat_no] > 0){
			$sql = "INSERT INTO ".$tbl_good_cat." set 
				g_idx='".$insert_idx."',
				cat_no='".$arrCatInfo["list"][0][cat_no]."',
				cat_code='".$arrCatInfo["list"][0][cat_code]."'
			";
			mysql_query($sql, $GLOBALS[dblink]);
		}
	}

	//검색 카테고리 정보 입력
	$ext_search_value_arr=explode("|:|",$_POST["ext_search_hidden"]);

	for($j=0;$j<count($ext_search_value_arr);$j++){
		$arrSearchInfo = getCategoryInfo($ext_search_value_arr[$j]);
		if($arrSearchInfo["list"][0][cat_no] > 0){
			$sql = "INSERT INTO ".$tbl_good_search." set 
				g_idx='".$insert_idx."',
				cat_no='".$arrSearchInfo["list"][0][cat_no]."',
				cat_code='".$arrSearchInfo["list"][0][cat_code]."'
			";
			mysql_query($sql, $GLOBALS[dblink]);
		}
	}

	//선택한 카테고리 정보 입력
	$sql = "INSERT INTO ".$tbl_good_cat." set 
		g_idx='".$insert_idx."',
		cat_no='".$arrInfo["list"][0][cat_no]."',
		cat_code='".$arrInfo["list"][0][cat_code]."'
	";
	mysql_query($sql, $GLOBALS[dblink]);

	//옵션입력
	for($i=0; $i < $_POST[opt_hidden_count]; $i++){
		$opt_1=mysql_escape_string($_POST["opt_subject_".$i]);
		$opt_1_value_arr=explode("|:|",$_POST["opt_hidden_value_".$i]);

		for($j=0;$j<count($opt_1_value_arr);$j++){
			$arr_opt_value = explode("|",$opt_1_value_arr[$j]);
			$sql = "INSERT INTO ".$tbl_opt." set 
				g_idx='".$insert_idx."',
				opt_1='".$opt_1."',
				opt_1_value='".mysql_escape_string($arr_opt_value[0])."',
				price='".mysql_escape_string($arr_opt_value[1])."'
			";
			mysql_query($sql, $GLOBALS[dblink]);
		}
		
		if($i >= 5){
			break;
		}
	}


	//연계 재고관리
	if($_POST[stock_type]=="3"){
		for($i=0; $i<9; $i++){
			if($_POST["relOpt1_".$i] != ""){
				for($j=0; $j<9; $j++){
					if($_POST["relOpt2_".$j] != ""){
						$sql = "INSERT INTO ".$tbl_opt_rel." set 
							g_idx='".$insert_idx."',
							opt_1='".mysql_escape_string($_POST[relOptName1])."',
							opt_1_value='".mysql_escape_string($_POST["relOpt1_".$i])."',
							opt_2='".mysql_escape_string($_POST[relOptName2])."',
							opt_2_value='".mysql_escape_string($_POST["relOpt2_".$j])."',
							price='".mysql_escape_string($_POST["rel_price_".$j."_".$i])."',
							stock='".mysql_escape_string($_POST["rel_stock_".$j."_".$i])."'
						";
						mysql_query($sql);
					}
				}
			}
		}
	}

	//파일 저장 디렉토리 생성
	rmkdir($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$insert_idx, 0777);

	//이미지 파일처리
	inputGoodFiles($insert_idx, $_FILES, mysql_escape_string($_POST[image_type]));

	//카탈로그 파일처리
	inputCatalogFilesShop($insert_idx, $_FILES);

	if($total > 0){
		//echo "<img src='/backoffice/module/shop/naver_allep.php' width='0' height='0'>";  //네이버 전체 ep 새로 생성
		return $insert_idx;
	}else{
		return false;
	}

}


//상품 복사하기
function copyGood($idx){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];
	$tbl_opt = $GLOBALS["_conf_tbl"]["shop_good_opt"];
	$tbl_opt_rel = $GLOBALS["_conf_tbl"]["shop_good_opt_rel"];
	$tbl_good_cat = $GLOBALS["_conf_tbl"]["shop_good_cat"];
	$tbl_good_search = $GLOBALS["_conf_tbl"]["shop_good_search"];

	$arrInfo = getGoodInfo($idx);

	//상품정보 테이블에 입력
	$sql = "INSERT INTO ".$tbl." set 
		cat_no='".$arrInfo["list"][0][cat_no]."',
		cat_code='".$arrInfo["list"][0][cat_code]."',
		g_code='".$arrInfo["list"][0][g_code]."',
		g_name='".addslashes($arrInfo["list"][0][g_name])."',
		rel_g_idx='".$arrInfo["list"][0][rel_g_idx]."',
		memo='".addslashes($arrInfo["list"][0][memo])."',
		contents='".addslashes($arrInfo["list"][0][contents])."',
		sort_num='".$arrInfo["list"][0][sort_num]."',
		madein='".addslashes($arrInfo["list"][0][madein])."',
		vendor='".addslashes($arrInfo["list"][0][vendor])."',
		brand='".addslashes($arrInfo["list"][0][brand])."',
		model='".addslashes($arrInfo["list"][0][model])."',
		icons='".$arrInfo["list"][0][icons]."',
		image_s='".$arrInfo["list"][0][image_s]."',
		image_m='".$arrInfo["list"][0][image_m]."',
		image_l='".$arrInfo["list"][0][image_l]."',
		p_image='".$arrInfo["list"][0][p_image]."',
		p_price='".$arrInfo["list"][0][p_price]."',
		sale_price='".$arrInfo["list"][0][sale_price]."',
		price='".$arrInfo["list"][0][price]."',
		stock='".$arrInfo["list"][0][stock]."',
		stock_type='".$arrInfo["list"][0][stock_type]."',
		point='".$arrInfo["list"][0][point]."',
		point_unit='".$arrInfo["list"][0][point_unit]."',
		image_type='".$arrInfo["list"][0][image_type]."',
		is_show='".$arrInfo["list"][0][is_show]."',
		main_show='".$arrInfo["list"][0][main_show]."',
		brand_show='".$arrInfo["list"][0][brand_show]."',
		special_show='".$arrInfo["list"][0][special_show]."',
		best_show='".$arrInfo["list"][0][best_show]."',
		mokcha='".addslashes($arrInfo["list"][0][mokcha])."',
		author_name='".addslashes($arrInfo["list"][0][author_name])."',
		author_text='".addslashes($arrInfo["list"][0][author_text])."',
		isbn='".addslashes($arrInfo["list"][0][isbn])."',
		published_date='".$arrInfo["list"][0][published_date]."',
		published_text='".addslashes($arrInfo["list"][0][published_text])."',
		pages='".addslashes($arrInfo["list"][0][pages])."',
		pan_color='".addslashes($arrInfo["list"][0][pan_color])."',
		cdrom='".addslashes($arrInfo["list"][0][cdrom])."',
		movie='".addslashes($arrInfo["list"][0][movie])."',
		movie_url='".addslashes($arrInfo["list"][0][movie_url])."',
		wdate=now()
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$insert_idx = mysql_insert_id($GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	//관련상품
	$sql  = "select * from ".$tbl_good_cat." where g_idx='".$idx."' ";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total_rs = mysql_num_rows($rs);
	
	if($total_rs > 0){
		$list['total'] = $total_rs;
		for($i=0; $i < $total_rs; $i++){
			$row = mysql_fetch_assoc($rs);
			
			$sql = "INSERT INTO ".$tbl_good_cat." set 
			g_idx='".$insert_idx."',
			cat_no='".$row[cat_no]."',
			cat_code='".$row[cat_code]."'
			";	
			mysql_query($sql, $GLOBALS[dblink]);

		}
	}

	//옵션
	$sql  = "select * from ".$tbl_opt." where g_idx='".$idx."' ";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total_rs = mysql_num_rows($rs);
	
	if($total_rs > 0){
		$list['total'] = $total_rs;
		for($i=0; $i < $total_rs; $i++){
			$row = mysql_fetch_assoc($rs);
			
			$sql = "INSERT INTO ".$tbl_opt." set 
			g_idx='".$insert_idx."',
			opt_1='".$row[opt_1]."',
			opt_1_value='".$row[opt_1_value]."',
			price='".$row[price]."'
			";	
			mysql_query($sql, $GLOBALS[dblink]);

		}
	}

	//파일 저장 디렉토리 생성
	rmkdir($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$insert_idx, 0777);
	
	if($arrInfo["total_files"]>0){
		for($i=0; $i < $arrInfo["total_files"]; $i++){
			if(@file($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/".$arrInfo["files"][$i][re_name])) copy($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/".$arrInfo["files"][$i][re_name], $GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$insert_idx."/".$arrInfo["files"][$i][re_name]);
			if(@file($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/s_".$arrInfo["files"][$i][re_name])) copy($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/s_".$arrInfo["files"][$i][re_name], $GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$insert_idx."/s_".$arrInfo["files"][$i][re_name]);
			if(@file($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/m_".$arrInfo["files"][$i][re_name])) copy($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/m_".$arrInfo["files"][$i][re_name], $GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$insert_idx."/m_".$arrInfo["files"][$i][re_name]);
			if(@file($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/l_".$arrInfo["files"][$i][re_name])) copy($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/l_".$arrInfo["files"][$i][re_name], $GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$insert_idx."/l_".$arrInfo["files"][$i][re_name]);

				$sql = "insert into ".$GLOBALS["_conf_tbl"]["shop_good_files"]." set 
					b_idx='".$insert_idx."',
					ori_name='".$arrInfo["files"][$i][ori_name]."',
					re_name='".$arrInfo["files"][$i][re_name]."',
					type='".$arrInfo["files"][$i][type]."',
					ext ='".$arrInfo["files"][$i][ext]."',
					size='".$arrInfo["files"][$i][size]."',
					width='".$arrInfo["files"][$i][width]."',
					height='".$arrInfo["files"][$i][height]."',
					wdate=now()
				";
				mysql_query($sql, $GLOBALS[dblink]);

		}
	}

	if($total > 0){
		return $insert_idx;
	}else{
		return false;
	}

}

//상품 수정하기
function editGood($idx){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];
	$tbl_opt = $GLOBALS["_conf_tbl"]["shop_good_opt"];
	$tbl_opt_rel = $GLOBALS["_conf_tbl"]["shop_good_opt_rel"];
	$tbl_good_cat = $GLOBALS["_conf_tbl"]["shop_good_cat"];
	$tbl_good_search = $GLOBALS["_conf_tbl"]["shop_good_search"];

	$arrInfo = getCategoryInfo(mysql_escape_string($_POST[cat_no]));


	$arrGoodInfo = getGoodInfo($idx); //수정전상품과비교
	$u1 = 0; 
	$arrThisCatCode = explode("/", $arrInfo["list"][0][cat_code]);
	
	if($arrThisCatCode[0]!="3") {
		if($arrGoodInfo["list"][0]["g_name"]!=mysql_escape_string($_POST[g_name])) {
			$u1++;
		}
		if($arrGoodInfo["list"][0]["cat_no"]!=$arrInfo["list"][0][cat_no]) {
			//$u1++;
		}
		if($arrGoodInfo["list"][0]["price"]!=mysql_escape_string($_POST[price])) {
			$u1++;
		}
	}

	//아이콘등록
	for($i=0; $i < count($_POST[shop_icon]); $i++){
			$str_icons .= $_POST[shop_icon][$i];
			if($i != count($_POST[shop_icon])-1){
					$str_icons .= "|";
			}
	}

	//관련상품 데이터 조합
	$arrRelGood = explode("|",$_POST[rel_good_hidden]);
	if(count($arrRelGood)>0){
		//관련상품 중복 제거
		$arrRelGoodUnique = array_unique($arrRelGood);
		for($i=0;$i<count($arrRelGoodUnique);$i++){
			if($arrRelGoodUnique[$i]!=""){
				$str_rel_good .= $arrRelGoodUnique[$i] .",";
			}
		}
	}
	$str_rel_good = substr($str_rel_good,0,strlen($str_rel_good)-1);

	//상품정보 테이블에 입력
	$sql = "UPDATE ".$tbl." set 
		cat_no='".$arrInfo["list"][0][cat_no]."',
		cat_code='".$arrInfo["list"][0][cat_code]."',
		g_code='".mysql_escape_string($_POST[g_code])."',
		g_name='".mysql_escape_string($_POST[g_name])."',
		rel_g_idx='".$str_rel_good."',
		memo='".mysql_escape_string($_POST[memo])."',
		contents='".mysql_escape_string($_POST[contents])."',
		sort_num='".mysql_escape_string($_POST[sort_num])."',
		madein='".mysql_escape_string($_POST[madein])."',
		vendor='".mysql_escape_string($_POST[vendor])."',
		brand='".mysql_escape_string($_POST[brand])."',
		model='".mysql_escape_string($_POST[model])."',
		icons='".mysql_escape_string($str_icons)."',
		p_price='".mysql_escape_string($_POST[p_price])."',
		sale_price='".mysql_escape_string($_POST[sale_price])."',
		price='".mysql_escape_string($_POST[price])."',
		stock='".mysql_escape_string($_POST[stock])."',
		stock_type='".mysql_escape_string($_POST[stock_type])."',
		point='".mysql_escape_string($_POST[point])."',
		point_unit='".mysql_escape_string($_POST[point_unit])."',
		image_type='".mysql_escape_string($_POST[image_type])."',
		is_show='".mysql_escape_string($_POST[is_show])."',
		main_show='".mysql_escape_string($_POST[main_show])."',
		brand_show='".mysql_escape_string($_POST[brand_show])."',
		special_show='".mysql_escape_string($_POST[special_show])."',
		best_show='".mysql_escape_string($_POST[best_show])."',
		mokcha='".mysql_escape_string($_POST[mokcha])."',
		author_name='".mysql_escape_string($_POST[author_name])."',
		author_text='".mysql_escape_string($_POST[author_text])."',
		isbn='".mysql_escape_string($_POST[isbn])."',
		published_date='".mysql_escape_string($_POST[published_date])."',
		published_text='".mysql_escape_string($_POST[published_text])."',
		pages='".mysql_escape_string($_POST[pages])."',
		pan_color='".mysql_escape_string($_POST[pan_color])."',
		cdrom='".mysql_escape_string($_POST[cdrom])."',
		movie='".mysql_escape_string($_POST[movie])."',
		movie_url='".mysql_escape_string($_POST[movie_url])."',
		coupon_use='".mysql_escape_string($_POST[coupon_use])."',
		coupon_dis='".mysql_escape_string($_POST[coupon_dis])."',
		coupon_unit='".mysql_escape_string($_POST[coupon_unit])."',
		coupon_qty='".mysql_escape_string($_POST[coupon_qty])."',
		coupon_limit='".mysql_escape_string($_POST[coupon_limit])."',
		coupon_sdate='".mysql_escape_string($_POST[coupon_sdate])."',
		coupon_edate='".mysql_escape_string($_POST[coupon_edate])."'
		WHERE idx = '".$idx."'
	";

	$rs = mysql_query($sql, $GLOBALS[dblink]);

	//기존 카테고리 정보 삭제
	$sql = "DELETE FROM ".$tbl_good_cat." 
			WHERE g_idx='".$idx."'
		";
		mysql_query($sql, $GLOBALS[dblink]);

	//추가 카테고리 정보 입력
	$ext_cat_value_arr=explode("|:|",$_POST["ext_cat_hidden"]);

	for($j=0;$j<count($ext_cat_value_arr);$j++){
		$arrCatInfo = getCategoryInfo($ext_cat_value_arr[$j]);
		if($arrCatInfo["list"][0][cat_no] > 0){
			$sql = "INSERT INTO ".$tbl_good_cat." set 
				g_idx='".$idx."',
				cat_no='".$arrCatInfo["list"][0][cat_no]."',
				cat_code='".$arrCatInfo["list"][0][cat_code]."'
			";
			mysql_query($sql, $GLOBALS[dblink]);
		}
	}

	//기존 검색 정보 삭제
	$sql = "DELETE FROM ".$tbl_good_search." 
			WHERE g_idx='".$idx."'
		";
		mysql_query($sql, $GLOBALS[dblink]);

	//추가 카테고리 정보 입력
	$ext_search_value_arr=explode("|:|",$_POST["ext_search_hidden"]);

	for($j=0;$j<count($ext_search_value_arr);$j++){
		$arrSearchInfo = getCategoryInfo($ext_search_value_arr[$j]);
		if($arrSearchInfo["list"][0][cat_no] > 0){
			$sql = "INSERT INTO ".$tbl_good_search." set 
				g_idx='".$idx."',
				cat_no='".$arrSearchInfo["list"][0][cat_no]."',
				cat_code='".$arrSearchInfo["list"][0][cat_code]."'
			";
			mysql_query($sql, $GLOBALS[dblink]);
		}
	}




	//선택한 카테고리 정보 입력
	$sql = "INSERT INTO ".$tbl_good_cat." set 
		g_idx='".$idx."',
		cat_no='".$arrInfo["list"][0][cat_no]."',
		cat_code='".$arrInfo["list"][0][cat_code]."'
	";
	mysql_query($sql, $GLOBALS[dblink]);


	//기존 옵션 삭제
	$sql = "DELETE FROM ".$tbl_opt." 
			WHERE g_idx='".$idx."'
		";
		mysql_query($sql, $GLOBALS[dblink]);

	//옵션입력
	for($i=0; $i < $_POST[opt_hidden_count]; $i++){
		$opt_1=mysql_escape_string($_POST["opt_subject_".$i]);
		$opt_1_value_arr=explode("|:|",$_POST["opt_hidden_value_".$i]);

		for($j=0;$j<count($opt_1_value_arr);$j++){
			$arr_opt_value = explode("|",$opt_1_value_arr[$j]);
			
			if($opt_1 || $arr_opt_value[0] || $arr_opt_value[1]) {
				$sql = "INSERT INTO ".$tbl_opt." set 
					g_idx='".$idx."',
					opt_1='".$opt_1."',
					opt_1_value='".mysql_escape_string($arr_opt_value[0])."',
					price='".mysql_escape_string($arr_opt_value[1])."'
				";
				mysql_query($sql, $GLOBALS[dblink]);
			}
		}
		
		if($i >= 5){
			break;
		}
	}

	//연계 재고관리
	if($_POST[stock_type]=="3"){
		//기존 옵션 삭제
		$sql = "DELETE FROM ".$tbl_opt_rel." 
			WHERE g_idx='".$idx."'
		";
		mysql_query($sql, $GLOBALS[dblink]);

		for($i=0; $i<9; $i++){
			if($_POST["relOpt1_".$i] != ""){
				for($j=0; $j<9; $j++){
					if($_POST["relOpt2_".$j] != ""){
						$sql = "INSERT INTO ".$tbl_opt_rel." set 
							g_idx='".$idx."',
							opt_1='".mysql_escape_string($_POST[relOptName1])."',
							opt_1_value='".mysql_escape_string($_POST["relOpt1_".$i])."',
							opt_2='".mysql_escape_string($_POST[relOptName2])."',
							opt_2_value='".mysql_escape_string($_POST["relOpt2_".$j])."',
							price='".mysql_escape_string($_POST["rel_price_".$j."_".$i])."',
							stock='".mysql_escape_string($_POST["rel_stock_".$j."_".$i])."'
						";
						mysql_query($sql);
					}
				}
			}
		}
	}

	//이미지 파일처리
	delGoodFiles($idx, $_FILES);
	//이미지 파일처리
	inputGoodFiles($idx, $_FILES, mysql_escape_string($_POST[image_type]));

	//카탈로그 파일처리
	delCatalogFilesShop($idx, $_FILES);
	inputCatalogFilesShop($idx, $_FILES);

	if($rs > 0){
		/*
		if($u1 > 0) {
			echo "<img src='/backoffice/module/shop/naver_sumep.php?idx=".$idx."' width='0' height='0'>";  //네이버 요약 ep에 추가
			echo "<img src='/backoffice/module/shop/naver_allep.php' width='0' height='0'>";  //네이버 전체 ep 새로 생성
		}
		*/
		return true;
	}else{
		return false;
	}


}


//상품 노출여부 수정하기
function editGoodShow($idx, $gb){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];

	//상품정보 테이블에 입력
	$sql = "UPDATE ".$tbl." set 
		is_show='".$gb."'
		WHERE idx = '".$idx."'
	";

	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($rs > 0){
		return true;
	}else{
		return false;
	}
}

//상품 파일처리
function inputGoodFiles($idx, $_FILES, $image_type){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];

	//이미지파일 처리

	//현재 정보 가져오기
	$arrCurInfo = getArticleInfo($tbl, $idx);

	//대표이미지로 썸네일 만드는 방식 일경우
	if($image_type=="1"){
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
					move_uploaded_file ($_FILES[photo_file][tmp_name][$i],$GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/".$filerename);
					//썸네일 만들기
					if($filetype=="image/pjpeg" || $filetype=="image/x-png" || $filetype=="image/jpeg" || $filetype=="image/png" || $filetype=="image/gif"){
						$tmpImageSize = getimagesize($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/".$filerename);
						
						MakeThum($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/".$filerename, $GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/s_".$filerename, $GLOBALS["_SITE"]["SHOP"]["IMAGE_S_WIDTH"]);
						
						MakeThum($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/".$filerename, $GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/m_".$filerename, $GLOBALS["_SITE"]["SHOP"]["IMAGE_M_WIDTH"]);
						
						MakeThum($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/".$filerename, $GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/l_".$filerename, $GLOBALS["_SITE"]["SHOP"]["IMAGE_L_WIDTH"]);
						
					}
				}

				$sql = "insert into ".$GLOBALS["_conf_tbl"]["shop_good_files"]." set 
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

				//대표이미지 업데이트
				if($_POST[p_image] !="" && $_POST[p_image]==$i){
					$sql = "update ".$GLOBALS["_conf_tbl"]["shop_good"]." set 
					image_s='s_".$filerename."',
					image_m='m_".$filerename."',
					image_l='l_".$filerename."',
					p_image='$filerename' 
					WHERE idx='$idx' 
					";
					mysql_query($sql,$GLOBALS[dblink]);
					//echo $sql;
				}
			}
		}

	//장바구니, 목록, 상세이미지를 직접 올릴경우
	}else if($image_type=="2"){
		//장바구니 이미지 등록
		if ($_FILES[photo_file_s][error] == 0){
			//확장자 검사후 파일이름 생성
			$filename = $_FILES[photo_file_s][name];
			$attach_ext = explode(".",$filename);
			$extension = $attach_ext[sizeof($attach_ext)-1];
			$extension = strtolower($extension);		    
			$s_filerename = "s_" . md5(mktime()) . "." . $extension;
			$filesize = $_FILES[photo_file][size];
			$filetype = $_FILES[photo_file][type];
				
			// 파일 확장자 검사
			if(!strcmp($extension,"htm") ||!strcmp($extension,"html") ||!strcmp($extension,"phtml") ||!strcmp($extension,"php") ||!strcmp($extension,"php3") ||!strcmp($extension,"php4") ||!strcmp($extension,"inc") ||!strcmp($extension,"pl") ||!strcmp($extension,"cgi")){
				jsMsg("not allowed file extension");
				jsHistory("-1");
			}
			
			if (is_uploaded_file($_FILES[photo_file_s][tmp_name])) {	
				move_uploaded_file ($_FILES[photo_file_s][tmp_name],$GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/".$s_filerename);
			}
		}else{
			$s_filerename = $arrCurInfo["list"][0][image_s];
		}
		//목록 이미지 등록
		if ($_FILES[photo_file_m][error] == 0){
			//확장자 검사후 파일이름 생성
			$filename = $_FILES[photo_file_m][name];
			$attach_ext = explode(".",$filename);
			$extension = $attach_ext[sizeof($attach_ext)-1];
			$extension = strtolower($extension);		    
			$m_filerename = "m_" . md5(mktime()) .  "." . $extension;
			$filesize = $_FILES[photo_file][size];
			$filetype = $_FILES[photo_file][type];
				
			// 파일 확장자 검사
			if(!strcmp($extension,"htm") ||!strcmp($extension,"html") ||!strcmp($extension,"phtml") ||!strcmp($extension,"php") ||!strcmp($extension,"php3") ||!strcmp($extension,"php4") ||!strcmp($extension,"inc") ||!strcmp($extension,"pl") ||!strcmp($extension,"cgi")){
				jsMsg("not allowed file extension");
				jsHistory("-1");
			}
			
			if (is_uploaded_file($_FILES[photo_file_m][tmp_name])) {	
				move_uploaded_file ($_FILES[photo_file_m][tmp_name],$GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/".$m_filerename);
			}
		}else{
			$m_filerename = $arrCurInfo["list"][0][image_m];
		}
		//상세 이미지 등록
		if ($_FILES[photo_file_l][error] == 0){
			//확장자 검사후 파일이름 생성
			$filename = $_FILES[photo_file_l][name];
			$attach_ext = explode(".",$filename);
			$extension = $attach_ext[sizeof($attach_ext)-1];
			$extension = strtolower($extension);		    
			$l_filerename = "l_" . md5(mktime()) . "." . $extension;
			$filesize = $_FILES[photo_file][size];
			$filetype = $_FILES[photo_file][type];
				
			// 파일 확장자 검사
			if(!strcmp($extension,"htm") ||!strcmp($extension,"html") ||!strcmp($extension,"phtml") ||!strcmp($extension,"php") ||!strcmp($extension,"php3") ||!strcmp($extension,"php4") ||!strcmp($extension,"inc") ||!strcmp($extension,"pl") ||!strcmp($extension,"cgi")){
				jsMsg("not allowed file extension");
				jsHistory("-1");
			}
			
			if (is_uploaded_file($_FILES[photo_file_l][tmp_name])) {	
				move_uploaded_file ($_FILES[photo_file_l][tmp_name],$GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/".$l_filerename);
			}
		}else{
			$l_filerename = $arrCurInfo["list"][0][image_l];
		}

		//확대이미지 등록
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
					move_uploaded_file ($_FILES[photo_file][tmp_name][$i],$GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/".$filerename);
				}

				$sql = "insert into ".$GLOBALS["_conf_tbl"]["shop_good_files"]." set 
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

		//상품정보에 이미지 정보 업데이트
		$sql = "update ".$GLOBALS["_conf_tbl"]["shop_good"]." set 
		image_s='".$s_filerename."',
		image_m='".$m_filerename."',
		image_l='".$l_filerename."'
		WHERE idx='$idx' 
		";
		mysql_query($sql,$GLOBALS[dblink]);
	}
}


//파일정보 가져오기
function getGoodFileInfo($b_idx, $idx){
	$tbl = $GLOBALS["_conf_tbl"]["shop_good_files"];

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

//상품 파일 삭제 처리
function delGoodFiles($idx, $_FILES){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];
	$tbl_files = $GLOBALS["_conf_tbl"]["shop_good_files"];

	//현재 정보 가져오기
	$arrCurInfo = getArticleInfo($tbl, $idx);

	//이미지 파일삭제 코딩 시작 - 삭제체크 한것만 처리
	for($i=0;$i<count($_POST[delPhoto]);$i++){
		if($_POST[delPhoto][$i]>0){
			$fileinfo = getGoodFileInfo($arrCurInfo["list"][0][idx], $_POST[delPhoto][$i]);
			//디비에서 파일정보 삭제
			mysql_query("DELETE FROM ".$tbl_files." WHERE idx='".$fileinfo["list"][0][idx]."' ", $GLOBALS[dblink]);
			//디스크에서 파일 삭제
			@unlink($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/" . $arrCurInfo["list"][0][idx]."/".$fileinfo["list"][0][re_name]);
			@unlink($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/" . $arrCurInfo["list"][0][idx]."/s_".$fileinfo["list"][0][re_name]);
			@unlink($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/" . $arrCurInfo["list"][0][idx]."/m_".$fileinfo["list"][0][re_name]);
			@unlink($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/" . $arrCurInfo["list"][0][idx]."/l_".$fileinfo["list"][0][re_name]);
		}
	}
	//이미지 파일삭제 코딩 종료
}



//상품 가져오기 - 파일 포함
function getGoodListBaseNFile($cat_no, $orderby, $sw="", $sk="", $scale, $offset=0, $is_show=""){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];//상품정보
	$tbl_files = $GLOBALS["_conf_tbl"]["shop_good_files"];//상품파일
	$tbl_category = $GLOBALS["_conf_tbl"]["category"];//카테고리
	$tbl_opt = $GLOBALS["_conf_tbl"]["shop_good_opt"];//상품 옵션 정보
	$tbl_opt_rel = $GLOBALS["_conf_tbl"]["shop_good_opt_rel"];//연계재고옵션 정보

	//카테고리가 있을경우
	if($cat_no !=""){
		$arrCategoryInfo = getCategoryInfo(mysql_escape_string($cat_no));
		$que_where .= " and A.cat_code like '" . $arrCategoryInfo["list"][0][cat_code] . "%' ";
	}

	//진열하는 상품만 가져올 경우
	if($is_show !=""){
		$que_where .= " and A.is_show ='Y' ";
	}

	//검색키워드가 있을경우
	if($sk !=""){
		switch($sw){
		case("name") :
			$que_where .= " and (A.g_name like '%$sk%') ";
		break;
		case("category") :
			$que_where .= " and (C.cat_name like '%$sk%') ";
		break;
		case("author") :
			$que_where .= " and (A.author_name like '%$sk%') ";
		break;
		case("isbn") :
			$que_where .= " and (A.isbn like '%$sk%') ";
		break;
		case("contents") :
			$que_where .= " and (A.contents like '%$sk%') ";
		break;
		default :
			$que_where .= " and (A.g_name like '%$sk%' or C.cat_name like '%$sk%' or A.contents like '%$sk%' or A.author_name like '%$sk%' or A.isbn like '%$sk%' or A.g_code like '%$sk%') ";
		}
	}


	//order by 가 있을경우
	if($orderby !=""){
		$orderby = $orderby;
	}else{
		$orderby = "A.idx DESC";
	}
	
	//카운트
	$sql = "select count(A.idx) from $tbl A LEFT JOIN ".$tbl_category." C ON A.cat_no=C.cat_no WHERE 1=1 $que_where ";
	//echo $sql;
    $rs = mysql_query($sql, $GLOBALS[dblink]);
	$row = mysql_fetch_row($rs);
    $total_rs = $row[0];


	//목록
    $sql  = "SELECT A.*, B.idx AS f_idx, B.ori_name, B.re_name, B.type, B.size, C.cat_name ";
    $sql .= "FROM ".$tbl." A ";
		$sql .= "LEFT JOIN ".$tbl_files." B ON A.idx=B.b_idx ";
    $sql .= "LEFT JOIN ".$tbl_category." C ON A.cat_no=C.cat_no ";
    $sql .= "WHERE 1=1 $que_where group by A.idx order by $orderby ";


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
			$sql  = "SELECT MIN(stock) as min_stock FROM $tbl_opt_rel WHERE g_idx='".$list['list'][$i][idx]."' group by g_idx ";
			$rs_stock = mysql_fetch_assoc(mysql_query($sql,$GLOBALS[dblink]));
			$list['list'][$i][min_stock] = $rs_stock[min_stock];
        }
    }else{
        $list['total'] = 0;
    }
    return $list;
}

//상품 가져오기 - 파일 포함
function getGoodListBaseNFileFromCat($cat_no, $orderby, $sw="", $sk="", $scale, $offset=0, $is_show=""){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];//상품정보
	$tbl_files = $GLOBALS["_conf_tbl"]["shop_good_files"];//상품파일
	$tbl_category = $GLOBALS["_conf_tbl"]["category"];//카테고리
	$tbl_opt = $GLOBALS["_conf_tbl"]["shop_good_opt"];//상품 옵션 정보
	$tbl_good_cat = $GLOBALS["_conf_tbl"]["shop_good_cat"];//상품 추가 카테고리

	//카테고리가 있을경우
	if($cat_no !=""){
		$arrCategoryInfo = getCategoryInfo(mysql_escape_string($cat_no));
		$que_where .= " and D.cat_code like '" . $arrCategoryInfo["list"][0][cat_code] . "%' ";
	}

	//진열하는 상품만 가져올 경우
	if($is_show !=""){
		$que_where .= " and A.is_show ='Y' ";
	}

	if($_GET[isshow] !=""){
		$que_where .= " and A.is_show ='".$_GET[isshow]."' ";
	}

	if($_GET[show1]=="Y" || $_GET[show2]=="Y" || $_GET[show3]=="Y" || $_GET[show4]=="Y" ){
		
		$que_where .= " and (";
		
		if($_GET[show1]=="Y"){
			$que_where .= " A.main_show ='Y' ";
			if($_GET[show2]=="Y" || $_GET[show3]=="Y" || $_GET[show4]=="Y" ){
				$que_where .= " OR ";
			}
		}
		if($_GET[show2]=="Y"){
			$que_where .= " A.brand_show ='Y' ";
			if($_GET[show3]=="Y" || $_GET[show4]=="Y" ){
				$que_where .= " OR ";
			}
		}
		if($_GET[show3]=="Y"){
			$que_where .= " A.special_show ='Y' ";
			if($_GET[show4]=="Y" ){
				$que_where .= " OR ";
			}
		}
		if($_GET[show4]=="Y"){
			$que_where .= " A.best_show ='Y' ";
		}

		$que_where .= ")";
	}

	//개월수 검색
	if($_GET[age] && $_GET[age][0]!="A") {
		$que_where .= " AND (";
		for($i=0; $i < count($_GET[age]); $i++) {
			
			$que_where .= " A.movie = '".$_GET[age][$i]."'";
			if($i != count($_GET[age])-1){
				$que_where .= " OR ";
			}
		}
		$que_where .= ")";
	}	
	//성별 검색
	if($_GET[gender] && $_GET[gender][0]!="A") {
		$que_where .= " AND (";
		for($i=0; $i < count($_GET[gender]); $i++) {
			
			$que_where .= " A.cdrom = '".$_GET[gender][$i]."'";
			if($i != count($_GET[gender])-1){
				$que_where .= " OR ";
			}
		}
		$que_where .= ")";
	}
	//가격 검색
	if($_GET[sprice] && $_GET[sprice][0]!="A") {
		$que_where .= " AND (";
		for($i=0; $i < count($_GET[sprice]); $i++) {
			
			if($_GET[sprice][$i]=="1") {
				$que_where .= " A.price <= '30000' ";
			} else if($_GET[sprice][$i]=="2") {
				$que_where .= " (A.price >='30000' AND A.price <='50000') ";
			} else if($_GET[sprice][$i]=="3") {
				$que_where .= " (A.price >='50000' AND A.price <='80000') ";
			} else if($_GET[sprice][$i]=="4") {
				$que_where .= " (A.price >='80000' AND A.price <='100000') ";
			} else if($_GET[sprice][$i]=="5") {
				$que_where .= " (A.price >='100000' AND A.price <='150000') ";
			} else if($_GET[sprice][$i]=="6") {
				$que_where .= " A.price >= '150000' ";
			}

			if($i != count($_GET[sprice])-1){
				$que_where .= " OR ";
			}
		}
		$que_where .= ")";
	}	

	//왼쪽추가카테고리검색
	if($_GET[scat]) {
		$que_where .= "AND A.idx in (SELECT g_idx
			FROM tbl_shop_good_search
			WHERE g_idx = A.idx
			AND cat_no = '".$_GET[scat]."') ";
	}

	//검색키워드가 있을경우
	if($sk !=""){
		switch($sw){
		case("name") :
			$que_where .= " and (A.g_name like '%$sk%') ";
		break;
		case("category") :
			$que_where .= " and (C.cat_name like '%$sk%') ";
		break;
		case("author") :
			$que_where .= " and (A.author_name like '%$sk%') ";
		break;
		case("best") :
			$que_where .= " and A.main_show = '$sk' ";
		break;
		case("month") :
			if($sk=="all") {
				$que_where .= " and A.movie != '' ";
			} else { 
				$que_where .= " and A.movie = '$sk' ";
			}
		break;
		case("event") :
			$que_where .= " and A.cdrom = '$sk' ";
		break;
		case("isbn") :
			$que_where .= " and A.isbn = '$sk' ";
		break;
		case("recom") :
			$que_where .= " and A.pages = '$sk' ";
		break;
		case("contents") :
			$que_where .= " and (A.contents like '%$sk%') ";
		break;
		default :
			$que_where .= " and (A.g_name like '%$sk%' or C.cat_name like '%$sk%' or A.author_name like '%$sk%' or A.isbn like '%$sk%') ";
		}
	}


	//order by 가 있을경우
	if($orderby !=""){
		$orderby = $orderby;
	}else{
		$orderby = "A.idx DESC";
	}
	
	//카운트
	$sql = "select count(D.g_idx) from $tbl_good_cat D LEFT JOIN $tbl A ON D.g_idx=A.idx LEFT JOIN $tbl_category C ON A.cat_no=C.cat_no WHERE 1=1 $que_where group by D.g_idx ";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total_rs = mysql_num_rows($rs);
	/*
	$row = mysql_fetch_row($rs);
    $total_rs = $row[0];
	*/

	//목록
    $sql  = "SELECT A.*, B.idx AS f_idx, B.ori_name, B.re_name, B.type, B.size, C.cat_name, D.cat_no AS ext_cat_no, D.cat_code AS ext_cat_code ";
    $sql .= "FROM ".$tbl_good_cat." D ";
	$sql .= "LEFT JOIN ".$tbl." A ON D.g_idx=A.idx ";
	$sql .= "LEFT JOIN ".$tbl_files." B ON A.idx=B.b_idx ";
    $sql .= "LEFT JOIN ".$tbl_category." C ON A.cat_no=C.cat_no ";
    $sql .= "WHERE 1=1 $que_where group by A.idx order by $orderby ";

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


//상품 검색 - 파일 포함
function getGoodListBaseNFileFromSearch($orderby, $sw="", $sk="", $scale, $offset=0, $is_show=""){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];//상품정보
	$tbl_files = $GLOBALS["_conf_tbl"]["shop_good_files"];//상품파일
	$tbl_category = $GLOBALS["_conf_tbl"]["category"];//카테고리
	$tbl_opt = $GLOBALS["_conf_tbl"]["shop_good_opt"];//상품 옵션 정보
	$tbl_good_cat = $GLOBALS["_conf_tbl"]["shop_good_cat"];//상품 추가 카테고리

	//진열하는 상품만 가져올 경우
	if($is_show !=""){
		$que_where .= " and A.is_show ='Y' ";
	}

	//검색키워드가 있을경우
	if($sk !=""){
		switch($sw){
		case("name") :
			$que_where .= " and (A.g_name like '%$sk%') ";
		break;
		case("category") :
			$que_where .= " and (C.cat_name like '%$sk%') ";
		break;
		case("author") :
			$que_where .= " and (A.author_name like '%$sk%') ";
		break;
		case("best") :
			$que_where .= " and A.main_show = '$sk' ";
		break;
		case("new") :
			$que_where .= " and A.movie = '$sk' ";
		break;
		case("event") :
			$que_where .= " and A.cdrom = '$sk' ";
		break;
		case("isbn") :
			$que_where .= " and A.isbn = '$sk' ";
		break;
		case("top5") :
			$que_where .= " and A.published_text = '$sk' ";
		break;
		case("recom") :
			$que_where .= " and A.pages = '$sk' ";
		break;
		case("contents") :
			$que_where .= " and (A.contents like '%$sk%') ";
		break;
		default :
			$que_where .= " and (A.g_name like '%$sk%' or C.cat_name like '%$sk%' or A.author_name like '%$sk%' or A.isbn like '%$sk%') ";
		}
	}


	//order by 가 있을경우
	if($orderby !=""){
		$orderby = $orderby;
	}else{
		$orderby = "A.idx DESC";
	}
	
	//카운트
	$sql = "select count(D.g_idx) from $tbl_good_cat D LEFT JOIN $tbl A ON D.g_idx=A.idx LEFT JOIN $tbl_category C ON A.cat_no=C.cat_no WHERE A.cat_no!='3' $que_where group by D.g_idx ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
	$total_rs = mysql_num_rows($rs);
	/*
	$row = mysql_fetch_row($rs);
    $total_rs = $row[0];
	*/

	//목록
    $sql  = "SELECT A.*, B.idx AS f_idx, B.ori_name, B.re_name, B.type, B.size, C.cat_name, D.cat_no AS ext_cat_no, D.cat_code AS ext_cat_code ";
    $sql .= "FROM ".$tbl_good_cat." D ";
	$sql .= "LEFT JOIN ".$tbl." A ON D.g_idx=A.idx ";
	$sql .= "LEFT JOIN ".$tbl_files." B ON A.idx=B.b_idx ";
    $sql .= "LEFT JOIN ".$tbl_category." C ON A.cat_no=C.cat_no ";
    $sql .= "WHERE A.cat_no!='3' $que_where group by A.idx order by $orderby ";

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


//메인노출 상품 가져오기
function getGoodListMain($cat_no="", $scale, $offset=0, $gb){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];//상품정보
	$tbl_good_cat = $GLOBALS["_conf_tbl"]["shop_good_cat"];//상품 추가 카테고리

	//목록
    $sql  = "SELECT A.*, D.cat_no AS ext_cat_no, D.cat_code AS ext_cat_code ";
    $sql .= "FROM ".$tbl_good_cat." D ";
	$sql .= "LEFT JOIN ".$tbl." A ON D.g_idx=A.idx ";
    $sql .= "WHERE 1=1 AND A.is_show='Y' AND A.".$gb."='Y' ";
	if($cat_no) {
		$catno = explode(",",$cat_no);
		
		if(count($catno) > 1) {

			$sql .= " and (";
			for($k=0; $k < count($catno); $k++){
				$arrCategoryInfo[$k] = getCategoryInfo(mysql_escape_string($catno[$k]));

				$sql .= " D.cat_code like '".$arrCategoryInfo[$k]["list"][0][cat_code]."%'";
				if($k != count($catno)-1) {
					$sql .= " or ";
				}
			}
			$sql .= ")";
		} else {
			$arrCategoryInfo = getCategoryInfo(mysql_escape_string($cat_no));
			$sql .= " AND D.cat_code like '" . $arrCategoryInfo["list"][0][cat_code] . "%' ";
		}
	}
	$sql .= " group by A.idx order by A.sort_num desc, A.idx DESC ";
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

        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }
    return $list;
}

//상품 조회수 업데이트
function setGoodHitsUpdate($idx){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];//상품정보

	//기본정보 가져오기
	$sql .= "UPDATE ".$tbl." SET ";
	$sql .= "hit = hit + 1 ";
	$sql .= " WHERE idx = '$idx' ";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	if($rs){	
		return true;
	}else{
		return false;
	}
}


//카탈로그 파일처리
function inputCatalogFilesShop($idx, $_FILES){
	$tbl_files = $GLOBALS["_conf_tbl"]["shop_catalog_files"];

	for($i=0;$i<count($_FILES[catalog_file][error]);$i++){
		if ($_FILES[catalog_file][error][$i] == 0){
		    //확장자 검사후 파일이름 생성
		    $filename = $_FILES[catalog_file][name][$i];
		    $attach_ext = explode(".",$filename);
		    $extension = $attach_ext[sizeof($attach_ext)-1];
		    $extension = strtolower($extension);		    
		    $filerename = "sample_" . md5(mktime()) . $i . "." . $extension;
	  		$filesize = $_FILES[catalog_file][size][$i];
	  		$filetype = $_FILES[catalog_file][type][$i];
				
		    // 파일 확장자 검사
		    if(!strcmp($extension,"htm") ||!strcmp($extension,"html") ||!strcmp($extension,"phtml") ||!strcmp($extension,"php") ||!strcmp($extension,"php3") ||!strcmp($extension,"php4") ||!strcmp($extension,"inc") ||!strcmp($extension,"pl") ||!strcmp($extension,"cgi")){
				jsMsg("not allowed file extension");
		        jsHistory("-1");
		    }
			
			if (is_uploaded_file($_FILES[catalog_file][tmp_name][$i])) {	
				move_uploaded_file ($_FILES[catalog_file][tmp_name][$i],$GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/".$idx."/".$filerename);
			}

			$sql = "insert into ".$tbl_files." set 
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

//카탈로그 파일정보 가져오기
function getCatalogFileInfoShop($b_idx, $idx){
	$tbl = $GLOBALS["_conf_tbl"]["shop_catalog_files"];

    $sql  = "SELECT * ";
    $sql .= "FROM " .$tbl." ";
    $sql .= "WHERE b_idx = '$b_idx' ";
    $sql .= "AND idx = '$idx' ";
//	echo $sql;
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

//카탈로그 파일 삭제 처리
function delCatalogFilesShop($idx, $_FILES){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];
	$tbl_files = $GLOBALS["_conf_tbl"]["shop_catalog_files"];

	//현재 정보 가져오기
	$arrCurInfo = getArticleInfo($tbl, $idx);

	//파일삭제 코딩 시작 - 삭제체크 한것만 처리
	for($i=0;$i<count($_POST[delCatalog]);$i++){
		if($_POST[delCatalog][$i]>0){
			$fileinfo = getCatalogFileInfoShop($arrCurInfo["list"][0][idx], $_POST[delCatalog][$i]);
			//디비에서 파일정보 삭제
			mysql_query("DELETE FROM ".$tbl_files." WHERE idx='".$fileinfo["list"][0][idx]."' ", $GLOBALS[dblink]);
			//디스크에서 파일 삭제
			unlink($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/" . $arrCurInfo["list"][0][idx]."/".$fileinfo["list"][0][re_name]);
		}
	}
	//파일삭제 코딩 종료
}


//상품정보 가져오기 - id
function getGoodInfo($idx){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];//상품정보
	$tbl_files = $GLOBALS["_conf_tbl"]["shop_good_files"];//상품파일
	$tbl_catalog_files = $GLOBALS["_conf_tbl"]["shop_catalog_files"];//카탈로그 파일
	$tbl_opt = $GLOBALS["_conf_tbl"]["shop_good_opt"];//옵션정보
	$tbl_opt_rel = $GLOBALS["_conf_tbl"]["shop_good_opt_rel"];//연계재고
	$tbl_category = $GLOBALS["_conf_tbl"]["category"];//상품분류

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

	//옵션갯수 정보 가져오기(상품)
	$sql  = "SELECT opt_1 ";
	$sql .= "FROM ".$tbl_opt." ";
	$sql .= "WHERE g_idx = '$idx' group by opt_1 order by idx";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total_rs = mysql_num_rows($rs);
	
	if($total_rs > 0){
			$list['total_opt'] = $total_rs;
			for($i=0; $i < $total_rs; $i++){
					$list['opt'][$i] = mysql_fetch_assoc($rs);
			}
	}else{
			$list['total_opt'] = 0;
	}

	//옵션정보 가져오기(상품)
	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl_opt." ";
	$sql .= "WHERE g_idx = '$idx' order by idx";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total_rs = mysql_num_rows($rs);
	
	if($total_rs > 0){
			$list['total_opt_info'] = $total_rs;
			for($i=0; $i < $total_rs; $i++){
					$list['opt_info'][$i] = mysql_fetch_assoc($rs);
			}
	}else{
			$list['total_opt_info'] = 0;
	}


	//연계재고관리
	if($list["list"][0]["stock_type"]=="3"){
		//연계옵션 타이틀 정보 가져오기
		$sql  = "SELECT opt_1, opt_2 ";
		$sql .= "FROM ".$tbl_opt_rel." ";
		$sql .= "WHERE g_idx = '$idx' group by opt_1, opt_2 order by idx";
		$rs = mysql_query($sql, $GLOBALS[dblink]);
		$total_rs = mysql_num_rows($rs);
		
		if($total_rs > 0){
				$list['total_opt_rel'] = $total_rs;
				for($i=0; $i < $total_rs; $i++){
						$list['opt_rel'][$i] = mysql_fetch_assoc($rs);
				}
		}else{
				$list['total_opt_rel'] = 0;
		}

		//연계옵션 가로값 정보 가져오기
		$sql  = "SELECT opt_1_value ";
		$sql .= "FROM ".$tbl_opt_rel." ";
		$sql .= "WHERE g_idx = '$idx' group by opt_1_value order by idx";
		$rs = mysql_query($sql, $GLOBALS[dblink]);
		$total_rs = mysql_num_rows($rs);
		
		if($total_rs > 0){
				$list['total_opt_rel_1'] = $total_rs;
				for($i=0; $i < $total_rs; $i++){
						$list['opt_rel_1'][$i] = mysql_fetch_assoc($rs);
				}
		}else{
				$list['total_opt_rel_1'] = 0;
		}

		//연계옵션 세로값 정보 가져오기
		$sql  = "SELECT opt_2_value ";
		$sql .= "FROM ".$tbl_opt_rel." ";
		$sql .= "WHERE g_idx = '$idx' group by opt_2_value order by idx";
		$rs = mysql_query($sql, $GLOBALS[dblink]);
		$total_rs = mysql_num_rows($rs);
		
		if($total_rs > 0){
				$list['total_opt_rel_2'] = $total_rs;
				for($i=0; $i < $total_rs; $i++){
						$list['opt_rel_2'][$i] = mysql_fetch_assoc($rs);
				}
		}else{
				$list['total_opt_rel_2'] = 0;
		}

		//연계옵션 및 재고정보 가져오기
		$sql  = "SELECT * ";
		$sql .= "FROM ".$tbl_opt_rel." ";
		$sql .= "WHERE g_idx = '$idx' order by idx";
		$rs = mysql_query($sql, $GLOBALS[dblink]);
		$total_rs = mysql_num_rows($rs);
		
		if($total_rs > 0){
				$list['total_opt_rel_info'] = $total_rs;
				for($i=0; $i < $total_rs; $i++){
						$row = mysql_fetch_assoc($rs);
						$list['opt_rel_info'][$row['opt_1_value']][$row['opt_2_value']]['price'] = $row['price'];
						$list['opt_rel_info'][$row['opt_1_value']][$row['opt_2_value']]['stock'] = $row['stock'];
				}
		}else{
				$list['total_opt_rel_info'] = 0;
		}
	}


	//파일정보 가져오기(상품)
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


	//파일정보 가져오기(카탈로그)
	$sql  = "SELECT * ";
	$sql .= "FROM ".$tbl_catalog_files." ";
	$sql .= "WHERE b_idx = '$idx' order by idx ";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total_rs = mysql_num_rows($rs);
	
	if($total_rs > 0){
			$list['total_catalog_files'] = $total_rs;
			for($i=0; $i < $total_rs; $i++){
					$list['catalog_files'][$i] = mysql_fetch_assoc($rs);
			}
	}else{
			$list['catalog_total_files'] = 0;
	}

	//관련상품 가져오기
	if($list['list'][0][rel_g_idx]){
		$sql  = "SELECT A.idx, A.g_code, A.g_name, A.price, A.image_m ";
		$sql .= "FROM ".$tbl." A ";
		$sql .= " WHERE A.idx in (".$list['list'][0][rel_g_idx].") ORDER BY A.idx desc ";
		$rs = mysql_query($sql, $GLOBALS[dblink]);
		//echo $sql;
		$total_rs = mysql_num_rows($rs);
		
		if($total_rs > 0){
				$list['list_rel_good_total'] = $total_rs;
				for($i=0; $i < $total_rs; $i++){
						$list['list_rel_good'][$i] = mysql_fetch_assoc($rs);
				}
		}else{
				$list['list_rel_good_total'] = 0;
		}
	}


	return $list;
}

//연계옵션 정보 가져오기
function getOptRelInfo($g_idx, $opt_1_value){
	$tbl_opt_rel = $GLOBALS["_conf_tbl"]["shop_good_opt_rel"];//연계옵션
    
    $sql  = "SELECT * ";
    $sql .= "FROM $tbl_opt_rel ";
    $sql .= "WHERE g_idx = '$g_idx' AND opt_1_value='$opt_1_value' order by idx";
    $rs = mysql_query($sql);
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


//연계옵션 재고수량 가져오기
function checkStockRel($g_idx, $opt_1_value, $opt_2_value){
	$tbl_opt_rel = $GLOBALS["_conf_tbl"]["shop_good_opt_rel"];//연계옵션
    
	$opt_1 = explode("|",$opt_1_value);
	$opt_2 = explode("|",$opt_2_value);

    $sql  = "SELECT * ";
    $sql .= "FROM $tbl_opt_rel ";
    $sql .= "WHERE g_idx = '$g_idx' AND opt_1_value='".$opt_1[0]."' AND opt_2_value='".$opt_2[0]."' ";
    $rs = mysql_query($sql);
    $total_rs = mysql_num_rows($rs);
    
	if($total_rs > 0){
		$row = mysql_fetch_assoc($rs);
		$list['opt_1_name'] = stripslashes($row[opt_1]);
		$list['opt_1_value'] = stripslashes($row[opt_1_value]);
		$list['opt_2_name'] = stripslashes($row[opt_2]);
		$list['opt_2_value'] = stripslashes($row[opt_2_value]);
		$list['opt_stock'] = stripslashes($row[stock]);
	}else{
		$list['opt_stock'] = 0;
	}

	return $list;
}

//재고체크
function checkPreOderStock($arrList){
	if($arrList["total"]>0){
		for($i=0;$i<$arrList["total"];$i++){
			//재고관리를 안할경우에는 패스
			if($arrList["list"][$i][stock_type]=="1"){continue;}
			//일반재고관리를 할 경우에는 상품의 재고갯수 확인
			else if($arrList["list"][$i][stock_type]=="2"){
				if($arrList["list"][$i][stock] < $arrList["list"][$i][qty]){
					jsGo("/shop.php?goPage=Cart","",$arrList["list"][$i][g_name] . "\\n\\n의 재고가 현재 " . number_format($arrList["list"][$i][stock]) . "개 있습니다.\\n\\n주문수량을 낮춰 주시기 바랍니다.");
				}
			}
			//연계재고관리를 할 경우에는 옵션의 재고갯수 확인
			else if($arrList["list"][$i][stock_type]=="3"){
				$arrChkRS = checkStockRel($arrList["list"][$i][g_idx], $arrList["list"][$i]["opt_rel_1"], $arrList["list"][$i]["opt_rel_2"]);
				if($arrChkRS["opt_stock"] < $arrList["list"][$i][qty]){
					jsGo("/shop.php?goPage=Cart","",$arrList["list"][$i][g_name] . "\\n\\n[".$arrChkRS["opt_1_name"] . "] => [". $arrChkRS["opt_1_value"] . "] , [" . $arrChkRS["opt_2_name"] . "] => [". $arrChkRS["opt_2_value"] ."] 재고가 현재 " . number_format($arrChkRS["opt_stock"]) . "개 있습니다.\\n\\n주문수량을 낮춰 주시기 바랍니다.");
				}
			}
		}
	}
}


//추가 카테고리 가져오기
function getGoodExtCat($g_idx){
	$tbl = $GLOBALS["_conf_tbl"]["shop_good_cat"];

    $sql  = "SELECT * ";
    $sql .= "FROM " .$tbl." ";
    $sql .= "WHERE g_idx = '$g_idx' ";

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


//추가 검색 가져오기
function getGoodExtSearch($g_idx){
	$tbl = $GLOBALS["_conf_tbl"]["shop_good_search"];

    $sql  = "SELECT * ";
    $sql .= "FROM " .$tbl." ";
    $sql .= "WHERE g_idx = '$g_idx' ";

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


function deleteGood($idx){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];//상품정보
	$tbl_files = $GLOBALS["_conf_tbl"]["shop_good_files"];//상품파일
	$tbl_opt = $GLOBALS["_conf_tbl"]["shop_good_opt"];//상품옵션
	$tbl_opt_rel = $GLOBALS["_conf_tbl"]["shop_good_opt_rel"];//연계옵션
	$tbl_catalog_files = $GLOBALS["_conf_tbl"]["shop_catalog_files"];//카탈로그 파일
	$tbl_good_cat = $GLOBALS["_conf_tbl"]["shop_good_cat"];

	$arrInfo = getArticleInfo($tbl, $idx);

	if($arrInfo["total"] > 0){
		//상품 정보 삭제
		$sql = "DELETE FROM ".$tbl." WHERE idx='".$arrInfo["list"][0][idx]."'	";
		//echo $sql . "<br>";
		$rs1 = mysql_query($sql, $GLOBALS[dblink]);

		//상품 파일정보 삭제
		$sql = "DELETE FROM ".$tbl_files." WHERE b_idx='".$arrInfo["list"][0][idx]."'	";
		//echo $sql . "<br>";
		$rs2 = mysql_query($sql, $GLOBALS[dblink]);

		//상품 옵션정보 삭제
		$sql = "DELETE FROM ".$tbl_opt." WHERE g_idx='".$arrInfo["list"][0][idx]."'	";
		//echo $sql . "<br>";
		$rs3 = mysql_query($sql, $GLOBALS[dblink]);

		//상품 옵션정보 삭제
		$sql = "DELETE FROM ".$tbl_opt_rel." WHERE g_idx='".$arrInfo["list"][0][idx]."'	";
		//echo $sql . "<br>";
		$rs4 = mysql_query($sql, $GLOBALS[dblink]);

		//상품 카탈로그 파일 삭제
		$sql = "DELETE FROM ".$tbl_catalog_files." WHERE b_idx='".$arrInfo["list"][0][idx]."'	";
		//echo $sql . "<br>";
		$rs5 = mysql_query($sql, $GLOBALS[dblink]);

		//추가 카테고리에서 삭제
		$sql = "DELETE FROM ".$tbl_good_cat." WHERE g_idx='".$arrInfo["list"][0][idx]."'	";
		//echo $sql . "<br>";
		$rs6 = mysql_query($sql, $GLOBALS[dblink]);
		
		/*
		if($rs1 && $rs2 && $arrInfo["list"][0][idx]){
			//상품관련 파일삭제
			rrmdir ($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/" . $arrInfo["list"][0][idx]);
			//위 함수가 하위에 파일이 없으면 디렉토리를 삭제하지 못하는 버그로 아래줄 추가함
			@rmdir ($GLOBALS["_SITE"]["UPLOADED_DATA"]."/shop_good/" . $arrInfo["list"][0][idx]);
			return true;
		}else{
			return false;
		}
		*/
		return true;
	}else{
		return false;
	}
}


//장바구니에 담기
function addCart($session_id, $user_id, $tp, $g_idx, $qty){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_cart"];

	//있는 상품인지 체크
	$exists_chk = getGoodInfo($g_idx);

	if($exists_chk["total"] > 0){
		$sql  = "SELECT * ";
		$sql .= "FROM $tbl ";
		$sql .= "WHERE ";

		//세션아이디, 유저아이디중 선택
		if($tp =="1"){
			$sql .= "user_id='".$user_id."' ";
		}else{
			$sql .= "session_id='".$session_id."' ";
		}
		$sql .= "AND g_idx='".$g_idx."' ";
		$sql .= "AND opt_1='".mysql_escape_string($_REQUEST[opt_1])."' ";
		$sql .= "AND opt_2='".mysql_escape_string($_REQUEST[opt_2])."' ";
		$sql .= "AND opt_3='".mysql_escape_string($_REQUEST[opt_3])."' ";
		$sql .= "AND opt_4='".mysql_escape_string($_REQUEST[opt_4])."' ";
		$sql .= "AND opt_5='".mysql_escape_string($_REQUEST[opt_5])."' ";
		$sql .= "AND opt_rel_1='".mysql_escape_string($_REQUEST[opt_rel_1])."' ";
		$sql .= "AND opt_rel_2='".mysql_escape_string($_REQUEST[opt_rel_2])."' ";

		$rs = mysql_query($sql);
		$total_rs = mysql_num_rows($rs);

		//있다면 수량 업데이트
		if($total_rs > 0){
			$sql = "UPDATE ".$tbl." set 
				qty=qty+'".$qty."'
				WHERE ";
			
			if($tp=="1"){
				$sql .="user_id='".$user_id."' ";
			}else{
				$sql .="session_id='".$session_id."' ";
			}
			$sql .= "AND g_idx='".$g_idx."' ";

		//없다면 인서트
		}else{
			$sql = "INSERT INTO ".$tbl." set 
				session_id='".$session_id."',
				user_id='".$user_id."',
				g_idx='".$g_idx."',
				qty='".$qty."',
				opt_1='".mysql_escape_string($_REQUEST[opt_1])."',
				opt_2='".mysql_escape_string($_REQUEST[opt_2])."',
				opt_3='".mysql_escape_string($_REQUEST[opt_3])."',
				opt_4='".mysql_escape_string($_REQUEST[opt_4])."',
				opt_5='".mysql_escape_string($_REQUEST[opt_5])."',
				opt_rel_1='".mysql_escape_string($_REQUEST[opt_rel_1])."',
				opt_rel_2='".mysql_escape_string($_REQUEST[opt_rel_2])."',
				wdate=now()
			";
		}

		$rs = mysql_query($sql, $GLOBALS[dblink]);
		$total = mysql_affected_rows($GLOBALS[dblink]);

		if($total > 0){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}


//장바구니 아이템 수량 업데이트
function updateCart($session_id, $user_id, $tp){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_cart"];

	$sql = "UPDATE ".$tbl." set 
		qty='".mysql_escape_string($_REQUEST[qty])."'
		WHERE ";
	
	if($tp=="1"){
		$sql .="user_id='".$user_id."' ";
	}else{
		$sql .="session_id='".$session_id."' ";
	}

	$sql .=" AND c_idx='".mysql_escape_string($_REQUEST[c_idx])."'	";


	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($rs){
		return true;
	}else{
		return false;
	}

}


//장바구니에서 아이템 삭제
function deleteCart($session_id, $user_id, $tp){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_cart"];

	$sql = "DELETE FROM ".$tbl." 
		WHERE ";
		
	if($tp=="1"){
		$sql .="user_id='".$user_id."' ";
	}else{
		$sql .="session_id='".$session_id."' ";
	}

//	$sql .=" AND c_idx='".mysql_escape_string($_REQUEST[c_idx])."' ";
	$sql .=" AND c_idx in (".mysql_escape_string($_REQUEST[c_idx]).") ";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//장바구니에서 체크한 아이템 삭제
function deleteCartChecked($session_id, $user_id, $tp){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_cart"];

	if(count($_REQUEST[items]) > 0){
		foreach($_REQUEST[items] AS $key => $val){
			$sql = "DELETE FROM ".$tbl." 
				WHERE ";
	
			if($tp=="1"){
				$sql .="user_id='".$user_id."' ";
			}else{
				$sql .="session_id='".$session_id."' ";
			}

			$sql .= " AND c_idx='".mysql_escape_string($val)."' ";

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


//장바구니에 담겨진 상품 회원 아이디와 연결 - 로그인시 세션 업데이트
function updateCartSession($session_id, $user_id){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_cart"];
	$tbl_order_cart = $GLOBALS["_conf_tbl"]["shop_order_cart"];//주문직전 장바구니

	//장바구니에 담겨진것 회원아이디에 연결
	$sql = "UPDATE ".$tbl_order_cart." set 
		user_id='".$user_id."'
		WHERE 
		session_id='".$session_id."'
	";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
/*
	//주문직전 장바구니 비우기 (이미 주문신청한것 삭제)
	$sql = "DELETE FROM ".$tbl_order_cart." 
		WHERE 
		user_id='".$user_id."'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
*/

	//================================================
	// 이전 카트에 아이디로 등록된 값
	// 세션으로 현재적용되어 있는 아이디로변경
	// 카트에서 구매가능케 함
	// 20100629
	// 테스트후 적용할것
	//================================================
	$sql2 = "UPDATE ".$tbl." set 
		session_id='".$session_id."'
		WHERE 
		user_id='".$user_id."'
	";
	$rs = mysql_query($sql2, $GLOBALS[dblink]);
	//================================================

	//주문직전 장바구니에 담겨진것 회원아이디에 연결
	$sql = "UPDATE ".$tbl_order_cart." set 
		user_id='".$user_id."'
		WHERE 
		session_id='".$session_id."'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($rs){
		return true;
	}else{
		return false;
	}

}

//장바구니 가져오기
function getCartList($session_id, $user_id, $tp){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_cart"];//장바구니
	$tbl_good = $GLOBALS["_conf_tbl"]["shop_good"];

	//세션아이디, 유저아이디중 선택
	if($tp =="1"){
		$que_where .= " AND A.user_id='$user_id' ORDER BY A.wdate desc";
	}else{
		$que_where .= " AND A.session_id='$session_id' ORDER BY A.wdate desc";
	}

	
	//목록
    $sql  = "SELECT A.*, B.* ";
    $sql .= "FROM ".$tbl." A ";
    $sql .= "LEFT JOIN ".$tbl_good." B ON A.g_idx=B.idx ";
    $sql .= "WHERE 1=1 $que_where ";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total_rs = mysql_affected_rows($GLOBALS[dblink]);

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

//주문직전 장바구니 가져오기
function getPreOrderList($session_id, $user_id, $tp){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_order_cart"];//주문직전 장바구니
	$tbl_good = $GLOBALS["_conf_tbl"]["shop_good"];

	//세션아이디, 유저아이디중 선택
	if($tp =="1"){
		// 수정 20100309
		// 아래로 수정 결제까지는 정확히 되나 다른상품으로 주문한 결과페이지로 됨
		//$que_where .= " AND A.user_id='$user_id' ORDER BY A.wdate desc";	
		$que_where .= " AND A.user_id='$user_id' AND A.session_id='$session_id' ORDER BY A.wdate desc";

	}else{
		$que_where .= " AND A.session_id='$session_id' ORDER BY A.wdate desc";
	}

	
	//목록
    $sql  = "SELECT A.*, B.* ";
    $sql .= "FROM ".$tbl." A ";
    $sql .= "LEFT JOIN ".$tbl_good." B ON A.g_idx=B.idx ";
    $sql .= "WHERE 1=1 $que_where ";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total_rs = mysql_affected_rows($GLOBALS[dblink]);

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


//장바구니에서 체크한 아이템 구매
function preOrder($session_id, $user_id, $tp){
	//테이블
	$tbl_cart = $GLOBALS["_conf_tbl"]["shop_cart"];
	$tbl_order_cart = $GLOBALS["_conf_tbl"]["shop_order_cart"];

	//주문번호 생성
	$new_order_no = makeOrderNo();

	//테이블 비움
	$sql = "DELETE FROM ".$tbl_order_cart." 
		WHERE ";
	
	if($tp=="1"){
		$sql .="user_id='".$user_id."' ";
	}else{
		$sql .="session_id='".$session_id."' ";
	}


	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	if(count($_REQUEST[items]) > 0){
		foreach($_REQUEST[items] AS $key => $val){
			$sql = "INSERT INTO ".$tbl_order_cart." (
				c_idx,
				order_no,
				session_id,
				user_id,
				g_idx,
				qty,
				opt_1,
				opt_2,
				opt_3,
				opt_4,
				opt_5,
				opt_rel_1,
				opt_rel_2,
				wdate
			)
			SELECT 
				c_idx,
				'".$new_order_no."',
				session_id,
				user_id,
				g_idx,
				qty,
				opt_1,
				opt_2,
				opt_3,
				opt_4,
				opt_5,
				opt_rel_1,
				opt_rel_2,
				now()
			FROM ".$tbl_cart."
				WHERE ";

			if($tp=="1"){
				$sql .="user_id='".$user_id."' ";
			}else{
				$sql .="session_id='".$session_id."' ";
			}

			$sql .= " AND c_idx='".mysql_escape_string($val)."' ";

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

//장바구니에서 해당아이템 한개 구매
function preOrderOne($session_id, $user_id, $idx, $tp){
	//테이블
	$tbl_cart = $GLOBALS["_conf_tbl"]["shop_cart"];
	$tbl_order_cart = $GLOBALS["_conf_tbl"]["shop_order_cart"];

	//주문번호 생성
	$new_order_no = makeOrderNo();

	//테이블 비움
	$sql = "DELETE FROM ".$tbl_order_cart." 
		WHERE ";

	if($tp=="1"){
		$sql .="user_id='".$user_id."' ";
	}else{
		$sql .="session_id='".$session_id."' ";
	}

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	$sql = "INSERT INTO ".$tbl_order_cart." (
		c_idx,
		order_no,
		session_id,
		user_id,
		g_idx,
		qty,
		opt_1,
		opt_2,
		opt_3,
		opt_4,
		opt_5,
		opt_rel_1,
		opt_rel_2,
		wdate
	)
	SELECT 
		c_idx,
		'".$new_order_no."',
		session_id,
		user_id,
		g_idx,
		qty,
		opt_1,
		opt_2,
		opt_3,
		opt_4,
		opt_5,
		opt_rel_1,
		opt_rel_2,
		now()
	FROM ".$tbl_cart."
		WHERE 
	";

	if($tp=="1"){
		$sql .="user_id='".$user_id."' ";
	}else{
		$sql .="session_id='".$session_id."' ";
	}

	$sql .= "
		AND c_idx='".mysql_escape_string($idx)."'
	";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//바로구매
function directOrder($session_id, $user_id, $tp){
	//테이블
	$tbl_order_cart = $GLOBALS["_conf_tbl"]["shop_order_cart"];

	//주문번호 생성
	$new_order_no = makeOrderNo();

	//테이블 비움
	$sql = "DELETE FROM ".$tbl_order_cart." 
		WHERE 
	";
	if($tp=="1"){
		$sql .="user_id='".$user_id."' ";
	}else{
		$sql .="session_id='".$session_id."' ";
	}

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	$sql = "INSERT INTO ".$tbl_order_cart." set 
		order_no='".$new_order_no."',
		session_id='".$session_id."',
		user_id='".$user_id."',
		g_idx='".mysql_escape_string($_REQUEST[g_idx])."',
		qty='".mysql_escape_string($_REQUEST[qty])."',
		opt_1='".mysql_escape_string($_REQUEST[opt_1])."',
		opt_2='".mysql_escape_string($_REQUEST[opt_2])."',
		opt_3='".mysql_escape_string($_REQUEST[opt_3])."',
		opt_4='".mysql_escape_string($_REQUEST[opt_4])."',
		opt_5='".mysql_escape_string($_REQUEST[opt_5])."',
		opt_rel_1='".mysql_escape_string($_REQUEST[opt_rel_1])."',
		opt_rel_2='".mysql_escape_string($_REQUEST[opt_rel_2])."',
		wdate=now()
	";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);


	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//바로구매2
function directOrder2($session_id, $user_id, $tp){
	//테이블
	$tbl_order_cart = $GLOBALS["_conf_tbl"]["shop_order_cart"];

	//주문번호 생성
	$new_order_no = makeOrderNo();

	//테이블 비움
	$sql = "DELETE FROM ".$tbl_order_cart." 
		WHERE 
	";
	if($tp=="1"){
		$sql .="user_id='".$user_id."' ";
	}else{
		$sql .="session_id='".$session_id."' ";
	}

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	for($i=0; $i<$_REQUEST[topt]; $i++) {
		$j=$i+1;
		$sql = "INSERT INTO ".$tbl_order_cart." set 
			order_no='".$new_order_no."',
			session_id='".$session_id."',
			user_id='".$user_id."',
			g_idx='".mysql_escape_string($_REQUEST[g_idx])."',
			qty='".mysql_escape_string($_REQUEST["qty_".$j])."',
			opt_1='".mysql_escape_string($_REQUEST["opt_".$j])."',
			wdate=now()
		";
		$rs = mysql_query($sql, $GLOBALS[dblink]);
	}
	$total = mysql_affected_rows($GLOBALS[dblink]);


	if($total > 0){
		return true;
	}else{
		return false;
	}
}


//위시리스트에 담기
function addWish($user_id, $g_idx){
	//위시리스트 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_wish"];

	//있는 상품인지 체크
	$exists_chk = getGoodInfo($g_idx);

	if($exists_chk["total"] > 0){
		$sql  = "SELECT * ";
		$sql .= "FROM $tbl ";
		$sql .= "WHERE ";

		//세션아이디, 유저아이디중 선택
		$sql .= "user_id='".$user_id."' ";
		$sql .= "AND g_idx='".mysql_escape_string($_REQUEST[g_idx])."' ";

		$rs = mysql_query($sql);
		$total_rs = mysql_num_rows($rs);

		//있다면 그냥 리턴
		if($total_rs > 0){
			return true;
		//없다면 인서트
		}else{
			$sql = "INSERT INTO ".$tbl." set 
				user_id='".$user_id."',
				g_idx='".mysql_escape_string($_REQUEST[g_idx])."',
				wdate=now()
			";
		}

		$rs = mysql_query($sql, $GLOBALS[dblink]);
		$total = mysql_affected_rows($GLOBALS[dblink]);

		if($total > 0){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}



//위시리스트에서 아이템 삭제
function deleteWish($user_id, $c_idx){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_wish"];

	$sql = "DELETE FROM ".$tbl." 
		WHERE ";
		
	$sql .="user_id='".$user_id."' ";

	$sql .=" AND c_idx in (".$c_idx.") ";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//위시리스트에서 체크한 아이템 삭제
function deleteWishChecked($user_id){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_wish"];

	if(count($_REQUEST[items]) > 0){
		foreach($_REQUEST[items] AS $key => $val){
			$sql = "DELETE FROM ".$tbl." 
				WHERE ";
	
			$sql .="user_id='".$user_id."' ";

			$sql .= " AND c_idx='".mysql_escape_string($val)."' ";

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

//위시리스트 가져오기
function getWishList($user_id, $scale, $offset=0){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_wish"];//위시리스트
	$tbl_good = $GLOBALS["_conf_tbl"]["shop_good"];

	$que_where .= " AND A.user_id='$user_id' ORDER BY A.wdate desc";

	
	//목록
    $sql  = "SELECT A.*, B.* ";
    $sql .= "FROM ".$tbl." A ";
    $sql .= "LEFT JOIN ".$tbl_good." B ON A.g_idx=B.idx ";
    $sql .= "WHERE 1=1 $que_where ";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total_rs = mysql_affected_rows($GLOBALS[dblink]);

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



//주문번호 생성
function makeOrderNo(){
	return date("YmdHis"). "T" . substr(microtime(),2,5);
}

//해당 주문번호로 주문건이 있는지 체크
function checkVaildOrderNo($order_no){
	$tbl = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블
    
    $sql  = "SELECT order_no ";
    $sql .= "FROM $tbl ";
    $sql .= "WHERE order_no = '$order_no' ";
    $rs = mysql_query($sql);
    $total_rs = mysql_num_rows($rs);
    
	if($total_rs > 0){
			return true;
	}else{
			return false;
	}

	return $list;
}

//주문서 입력
function setOrderInfo($session_id, $user_id, $tp, $order_no, $order_state){
	$tbl_cart = $GLOBALS["_conf_tbl"]["shop_cart"];//장바구니
	$tbl_order_cart = $GLOBALS["_conf_tbl"]["shop_order_cart"];//주문직전 장바구니
	$tbl_order_info = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블
	$tbl_order_good = $GLOBALS["_conf_tbl"]["shop_order_good"];//상품 주문정보 테이블

	//주문직전 장바구니에서 해당 주문내역 가져옴
	$arrList = getPreOrderList($session_id, $user_id, $tp);

	//변수 설정
	if($tp=="1"){
		$order_id = $user_id;
	}else{
		$order_id = "guest";
	}
	$order_phone = mysql_escape_string($_POST[order_phone1]) . "-" . mysql_escape_string($_POST[order_phone2]) . "-" . mysql_escape_string($_POST[order_phone3]);
	$order_mobile = mysql_escape_string($_POST[order_mobile1]) . "-" . mysql_escape_string($_POST[order_mobile2]) . "-" . mysql_escape_string($_POST[order_mobile3]);
	$order_zip = mysql_escape_string($_POST[order_zip]);
	$ship_phone = mysql_escape_string($_POST[ship_phone1]) . "-" . mysql_escape_string($_POST[ship_phone2]) . "-" . mysql_escape_string($_POST[ship_phone3]);
	$ship_mobile = mysql_escape_string($_POST[ship_mobile1]) . "-" . mysql_escape_string($_POST[ship_mobile2]) . "-" . mysql_escape_string($_POST[ship_mobile3]);
	$ship_zip = mysql_escape_string($_POST[ship_zip]);
	$shipemail = mysql_escape_string($_POST[email_id]) . "@" . mysql_escape_string($_POST[email_domain]);
	//변수 설정

	//입금확인의 경우
	if($order_state=="6"){
		$order_state = "6";
		$ipkum_date = date("Y-m-d H:i:s");
	//입금대기로
	}else if($order_state=="10") {
		$order_state = "10";
		$ipkum_date = "";
	}else{
		$order_state = "1";
		$ipkum_date = "";
	}

	//적립금 사용체크
	$nowPoint = getNowPoint($user_id); 
	if($_POST[using_point] > intval($nowPoint[nowpoint])){
		jsMsg("사용하려는 적립금이 보유액보다 많습니다.");
		exit;
	}

	if($arrList["total"]>0){
		for($i=0;$i<$arrList["total"];$i++){
			$arrOpt1[$i] = explode("|",$arrList["list"][$i][opt_1]);
			$arrOpt2[$i] = explode("|",$arrList["list"][$i][opt_2]);
			$arrOpt3[$i] = explode("|",$arrList["list"][$i][opt_3]);
			$arrOpt4[$i] = explode("|",$arrList["list"][$i][opt_4]);
			$arrOpt5[$i] = explode("|",$arrList["list"][$i][opt_5]);
			$arrOptRel1[$i] = explode("|",$arrList["list"][$i][opt_rel_1]);
			$arrOptRel2[$i] = explode("|",$arrList["list"][$i][opt_rel_2]);

			//추가금액 계산
			$optionPrice = $arrOpt1[$i][1] + $arrOpt2[$i][1] + $arrOpt3[$i][1] + $arrOpt4[$i][1] + $arrOpt5[$i][1] + $arrOptRel1[$i][1] + $arrOptRel2[$i][1];

			//적립금계산
			//if($arrList["list"][$i][point_unit]=="P"){
				$thisPoint = (($_POST[pointunit]*($arrList["list"][$i][price]+$optionPrice))/100) * $arrList["list"][$i][qty];
			//}else{
			//	$thisPoint = $arrList["list"][$i][point] * $arrList["list"][$i][qty];
			//}

			//합계금액 계산 (적립금사용, 배송비를 포함하지 않은 순수 금액+옵션가격)
			$TotalAmount += ($arrList["list"][$i][price]*$arrList["list"][$i][qty])+($optionPrice * $arrList["list"][$i][qty]);

			//주문상품 정보 테이블에 입력
			$sql = "INSERT INTO ".$tbl_order_good." SET
				order_no='$order_no',
				order_id='$order_id',
				g_idx='".$arrList["list"][$i]["g_idx"]."',
				g_cat_no='".$arrList["list"][$i]["cat_no"]."',
				g_code='".$arrList["list"][$i]["g_code"]."',
				g_name='".$arrList["list"][$i]["g_name"]."',
				g_vendor='".$arrList["list"][$i]["vendor"]."',
				g_brand='".$arrList["list"][$i]["brand"]."',
				g_model='".$arrList["list"][$i]["model"]."',
				g_price='".$arrList["list"][$i]["price"]."',
				g_qty='".$arrList["list"][$i]["qty"]."',
				g_point='".$thisPoint."',
				g_opt_1='".$arrOpt1[$i][0]."',
				g_opt_1_price='".$arrOpt1[$i][1]."',
				g_opt_2='".$arrOpt2[$i][0]."',
				g_opt_2_price='".$arrOpt2[$i][1]."',
				g_opt_3='".$arrOpt3[$i][0]."',
				g_opt_3_price='".$arrOpt3[$i][1]."',
				g_opt_4='".$arrOpt4[$i][0]."',
				g_opt_4_price='".$arrOpt4[$i][1]."',
				g_opt_5='".$arrOpt5[$i][0]."',
				g_opt_5_price='".$arrOpt5[$i][1]."',
				g_opt_rel_1='".$arrOptRel1[$i][0]."',
				g_opt_rel_1_price='".$arrOptRel1[$i][1]."',
				g_opt_rel_2='".$arrOptRel2[$i][0]."',
				g_opt_rel_2_price='".$arrOptRel2[$i][1]."',
				order_status ='X'
			";
		    $rs = mysql_query($sql);
		}

		//for loop 뒤의 변수 설정
		//주문요약 정보
		if($arrList["total"]==1){
			$order_summary = $arrList["list"][0]["g_name"];
		}else{
			$order_summary = $arrList["list"][0]["g_name"] . " 외 " . ($arrList["total"]-1). "건";
		}
		
		//쿠폰사용처리
		$coupon_idx = mysql_escape_string(substr($_POST[coupon_idx],0,-1));
		$arrCoupon = explode("|", $coupon_idx);
		for($i=0; $i<count($arrCoupon); $i++) {
			$idx = mysql_escape_string($arrCoupon[$i]);
			$sql_up = "UPDATE tbl_mycoupon SET coupon_use='Y', udate=now()  WHERE idx='".$idx."' ";
			$rs_up = mysql_query($sql_up);
		}

		//상품권사용처리
		if($_POST[giftcard_idx]) {
			$sql_up = "UPDATE tbl_mygiftcard SET giftcard_use='Y', udate=now()  WHERE idx='".$_POST[giftcard_idx]."' ";
			$rs_up = mysql_query($sql_up);
		}
		
		//상품권사용후 잔액 적립금으로 전환
		if($_POST[addpoint]>0) {	
			$RS2 = setPlusPoint($order_id, $_POST[addpoint], mysql_escape_string($order_summary)." 구매, 상품권 잔액 적립");
		}


		//배송비 -> 합계금액 (적립금사용, 배송비를 포함하지 않은 순수 금액+옵션가격)이 무료배송금액보다 작을 때 배송비 포함시킴
		if($TotalAmount < $GLOBALS["_SITE"]["SHOP"]["SHIP"]["FREE_PRICE"]){
			$ship_price = $GLOBALS["_SITE"]["SHOP"]["SHIP"]["SHIP_PRICE"];
		}else{
			$ship_price = 0 ;
		}

		$couponPrice = str_replace(",","",$_POST[coupon_price]);
		$giftcardPrice = str_replace(",","",$_POST[giftcard_price]);

		//실 결제금액
		$PayAmount = $TotalAmount + $ship_price - $_POST[using_point] - $couponPrice - $giftcardPrice;
		
		if($PayAmount<0) {
			$PayAmount = 0;
		}
		//for loop 뒤의 변수 설정


		//사용한 적립금 차감
		if($order_id != "guest" && $_POST[using_point] > 0){
			$RS = setMinusPoint($order_id, $_POST[using_point], mysql_escape_string($order_summary)." 구매");
		}

		//주문정보 테이블에 입력
		$sql = "INSERT INTO ".$tbl_order_info." SET
			order_no='$order_no',
			order_summary='$order_summary',
			order_name='".mysql_escape_string($_POST[order_name])."',
			order_id='$order_id',
			order_regnum1='P',
			order_regnum2='".mysql_escape_string($_POST[order_pw])."',
			order_phone='$order_phone',
			order_mobile='$order_mobile',
			order_zip='$order_zip',
			order_address='".mysql_escape_string($_POST[order_address])."',
			order_address_ext='".mysql_escape_string($_POST[order_address_ext])."',
			order_email='".mysql_escape_string($_POST[order_email])."',
			ship_name='".mysql_escape_string($_POST[ship_name])."',
			ship_phone='$ship_phone',
			ship_mobile='$ship_mobile',
			ship_zip='$ship_zip',
			ship_address='".mysql_escape_string($_POST[ship_address])."',
			ship_address_ext='".mysql_escape_string($_POST[ship_address_ext])."',
			ship_email='".$shipemail."',
			pay_type='".mysql_escape_string($_POST[pay_type])."',
			bank_type='".mysql_escape_string($_POST[bank_type])."',
			bank_name='".mysql_escape_string($_POST[bank_name])."',
			bank_date='".mysql_escape_string($_POST[bank_date])."',
			using_point='".mysql_escape_string($_POST[using_point])."',
			using_point_idx='".$RS."',
			add_point='".mysql_escape_string($_POST[addpoint])."',
			add_point_idx='".$RS2."',
			coupon_amount='".mysql_escape_string($couponPrice)."',
			giftcard_amount='".mysql_escape_string($giftcardPrice)."',
			coupon_idx='".$coupon_idx."', 
			giftcard_idx='".$_POST[giftcard_idx]."',
			ship_amount='$ship_price',
			login_amount='".$_POST[loginsale]."',
			birth_amount='".$_POST[birthsale]."',
			total_amount='$TotalAmount',
			pay_amount='$PayAmount',
			order_date=now(),
			order_state='$order_state',
			ipkum_date='$ipkum_date',
			order_comment='".mysql_escape_string($_POST[order_comment])."',
			mail_sms='".$_POST[sendgb]."',
			giftgb='".$_POST[giftgb]."',
			ip='".$_SERVER[REMOTE_ADDR]."'
		";
	    $rs = mysql_query($sql);
		$total = mysql_affected_rows($GLOBALS[dblink]);

		if($total > 0){
			//주문직전 장바구니에서 장바구니 번호 선택
			/* 
			************************************************* 결제후 삭제로 변경됨 밥스누 201806
			$sql = "SELECT c_idx FROM ".$tbl_order_cart." 
				WHERE order_no='$order_no'
			";
			$rs = mysql_query($sql, $GLOBALS[dblink]);
			$oc_total = mysql_num_rows($rs);

			if($oc_total > 0){
				for($i=0;$i<$oc_total; $i++){
					$row = mysql_fetch_assoc($rs);
					//장바구니에서 주문한 상품 삭제
					$sql = "DELETE FROM ".$tbl_cart." 
						WHERE c_idx = '".$row[c_idx]."'
					";
					mysql_query($sql, $GLOBALS[dblink]);
				}
			}

			//주문직전 장바구니에서 삭제
			$sql = "DELETE FROM ".$tbl_order_cart." 
				WHERE order_no='$order_no'
			";
			$rs = mysql_query($sql, $GLOBALS[dblink]);
			***************************************************
			*/


			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

//장바구니에서 삭제 밥스누 적용
function delcartLast($order_no){
	$tbl_cart = $GLOBALS["_conf_tbl"]["shop_cart"];//장바구니
	$tbl_order_cart = $GLOBALS["_conf_tbl"]["shop_order_cart"];//주문직전 장바구니

	if($order_no){
		$sql = "SELECT c_idx FROM ".$tbl_order_cart." 
			WHERE order_no='$order_no'
		";
		$rs = mysql_query($sql, $GLOBALS[dblink]);
		$oc_total = mysql_num_rows($rs);

		if($oc_total > 0){
			for($i=0;$i<$oc_total; $i++){
				$row = mysql_fetch_assoc($rs);
				//장바구니에서 주문한 상품 삭제
				$sql = "DELETE FROM ".$tbl_cart." 
					WHERE c_idx = '".$row[c_idx]."'
				";
				mysql_query($sql, $GLOBALS[dblink]);
			}
		}

		//주문직전 장바구니에서 삭제
		$sql = "DELETE FROM ".$tbl_order_cart." 
			WHERE order_no='$order_no'
		";
		$rs = mysql_query($sql, $GLOBALS[dblink]);
		return true;
	}else{
		return false;
	}	
}

//주문서 입력
function setEscrowInfo($order_no, $bank_type, $bank_date){
	$tbl_order_info = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블

	//주문정보 테이블에 수정
	$sql = "UPDATE ".$tbl_order_info." SET
		bank_type='".mysql_escape_string($_POST[bank_type])."',
		bank_date='".mysql_escape_string($_POST[bank_date])."'
		WHERE order_no='$order_no'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	if($rs){
		return true;
	}else{
		return false;
	}
}


//주문정보 가져오기
function getOrderInfo($user_id, $tp, $order_no){
	$tbl_good = $GLOBALS["_conf_tbl"]["shop_good"];//상품 테이블
	$tbl_order_info = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블
	$tbl_order_good = $GLOBALS["_conf_tbl"]["shop_order_good"];//상품 주문정보 테이블

	//변수 설정
	if($tp=="1"){
		$order_id = $user_id;
	}else{
		$order_id = "guest";
	}
	
	//목록
    $sql  = "SELECT A.* ";
    $sql .= "FROM ".$tbl_order_info." A ";
    $sql .= "WHERE A.order_id='$order_id' AND A.order_no='$order_no' ";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total_rs = mysql_affected_rows($GLOBALS[dblink]);

    if($total_rs > 0){
        $list['total'] = $total_rs;

        for($i=0; $i < $total_rs; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }

		//주문상품 목록
		$sql  = "SELECT B.*, C.image_s ";
		$sql .= "FROM ".$tbl_order_good." B LEFT JOIN ".$tbl_good." C ON B.g_idx=C.idx ";
		$sql .= "WHERE B.order_no='$order_no' ";

		$rs_good = mysql_query($sql, $GLOBALS[dblink]);
		$total_good = mysql_affected_rows($GLOBALS[dblink]);
		if($total_good > 0){
			$list['good_total'] = $total_good;

			for($i=0; $i < $total_good; $i++){
				$list['good_list'][$i] = mysql_fetch_assoc($rs_good);
			}
		}

    }else{
        $list['total'] = 0;
    }
    return $list;
}

//주문정보 가져오기 - 손님
function getOrderInfoGuest($order_name, $pw, $order_no){
	$tbl_good = $GLOBALS["_conf_tbl"]["shop_good"];//상품 테이블
	$tbl_order_info = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블
	$tbl_order_good = $GLOBALS["_conf_tbl"]["shop_order_good"];//상품 주문정보 테이블

	$que_where = " AND A.order_id='guest' ";
	$que_where .= " AND A.order_name='$order_name' ";
	$que_where .= " AND A.order_regnum2='$pw' ";
	$que_where .= " AND A.order_no='$order_no' ";
	
	//목록
    //$sql  = "SELECT A.*, B.subject,B.contents ";
	$sql  = "SELECT A.* ";
    $sql .= "FROM ".$tbl_order_info." A ";
	//$sql .= "LEFT JOIN tbl_board_delivery B ON A.shipping_company=B.idx ";
    $sql .= "WHERE 1=1 $que_where ";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total_rs = mysql_affected_rows($GLOBALS[dblink]);

    if($total_rs > 0){
        $list['total'] = $total_rs;

        for($i=0; $i < $total_rs; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }

		//주문상품 목록
		$sql  = "SELECT B.*, C.image_s, C.author_name ";
		$sql .= "FROM ".$tbl_order_good." B LEFT JOIN ".$tbl_good." C ON B.g_idx=C.idx ";
		$sql .= "WHERE B.order_no='$order_no' ";

		$rs_good = mysql_query($sql, $GLOBALS[dblink]);
		$total_good = mysql_affected_rows($GLOBALS[dblink]);
		if($total_good > 0){
			$list['good_total'] = $total_good;

			for($i=0; $i < $total_good; $i++){
				$list['good_list'][$i] = mysql_fetch_assoc($rs_good);
			}
		}

    }else{
        $list['total'] = 0;
    }
    return $list;
}


//주문정보 가져오기 - 관리자
function getOrderInfoAdmin($order_no){
	$tbl_good = $GLOBALS["_conf_tbl"]["shop_good"];//상품 테이블
	$tbl_order_info = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블
	$tbl_order_good = $GLOBALS["_conf_tbl"]["shop_order_good"];//상품 주문정보 테이블


	//목록
    $sql  = "SELECT A.* ";
    $sql .= "FROM ".$tbl_order_info." A ";
    $sql .= "WHERE A.order_no='$order_no' ";

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total_rs = mysql_affected_rows($GLOBALS[dblink]);

    if($total_rs > 0){
        $list['total'] = $total_rs;

        for($i=0; $i < $total_rs; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }

		//주문상품 목록
		$sql  = "SELECT B.*, C.image_s ";
		$sql .= "FROM ".$tbl_order_good." B LEFT JOIN ".$tbl_good." C ON B.g_idx=C.idx ";
		$sql .= "WHERE B.order_no='$order_no' ";

		$rs_good = mysql_query($sql, $GLOBALS[dblink]);
		$total_good = mysql_affected_rows($GLOBALS[dblink]);
		if($total_good > 0){
			$list['good_total'] = $total_good;

			for($i=0; $i < $total_good; $i++){
				$list['good_list'][$i] = mysql_fetch_assoc($rs_good);
			}
		}

    }else{
        $list['total'] = 0;
    }
    return $list;
}


//주문정보 수정 - 관리자
function setOrderInfoAdmin($order_no){
	$tbl_good = $GLOBALS["_conf_tbl"]["shop_good"];//상품 테이블
	$tbl_good_opt_rel = $GLOBALS["_conf_tbl"]["shop_good_opt_rel"];//상품 주문정보 테이블
	$tbl_order_info = $GLOBALS["_conf_tbl"]["shop_order_info"];//주문정보 테이블
	$tbl_order_good = $GLOBALS["_conf_tbl"]["shop_order_good"];//주문상품 테이블


	//현재 주문정보 가져오기
	$arrInfo = getOrderInfoAdmin($order_no);


	//적립금 지급 처리
	//if($_POST[pay_point]=="Y"){
	if($_POST[order_state]=="9") {

		for($i=0;$i<$arrInfo["good_total"];$i++){
			//적립금 계산
			$pay_plus_point += $arrInfo["good_list"][$i][g_point];
		}
		//적립해줘야할 금액이 있다면 적립
		if($pay_plus_point > 0 && $arrInfo["list"][0]["order_id"] !="guest"){
			$RS = setPlusPoint($arrInfo["list"][0]["order_id"], $pay_plus_point, $arrInfo["list"][0]["order_summary"] . " 구매");
			if($RS > 0){
				$p_sql = " pay_point='Y', pay_point_date=now(), pay_point_idx='$RS', ";
			}else{
				//jsMsg("적립금 지금에 실패하였습니다.");
			}
		}
	}

	//재고수량 차감 처리
	if($_POST[stock_apply]=="Y"){
		for($i=0;$i<$arrInfo["good_total"];$i++){
			$arrList = getGoodInfo($arrInfo["good_list"][$i]["g_idx"]);

			//재고관리를 안할경우에는 패스
			if($arrList["list"][0][stock_type]=="1"){
				continue;

			}
			//일반재고관리를 할 경우에는 상품재고수량 감소시킴
			else if($arrList["list"][0][stock_type]=="2"){
				$sql = "UPDATE $tbl_good SET
				stock = stock - ".$arrInfo["good_list"][$i]["g_qty"]."
				WHERE idx = '".$arrInfo["good_list"][$i]["g_idx"]."'
				";
			}
			//연계재고관리를 할 경우에는 옵션의 재고갯수 확인
			else if($arrList["list"][0][stock_type]=="3"){
				$sql = "UPDATE $tbl_good_opt_rel SET
				stock = stock - ".$arrInfo["good_list"][$i]["g_qty"]."
				WHERE 
				g_idx = '".$arrInfo["good_list"][$i]["g_idx"]."'
				AND opt_1_value = '".$arrInfo["good_list"][$i]["g_opt_rel_1"]."' 
				AND opt_2_value = '".$arrInfo["good_list"][$i]["g_opt_rel_2"]."' 
				";
			}
			$rs = mysql_query($sql, $GLOBALS[dblink]);
		}
		$s_sql = " stock_apply='Y', stock_apply_date=now(), ";
	}

	//카드취소
	//if($_POST[card_cancel]=="Y"){
	if( ($_POST[order_state]=="3" || ($_POST[order_state]=="5" && $arrInfo["list"][0]["charge_type"]=="반품")) && $arrInfo["list"][0]["pay_type"]!="bank" && $arrInfo["list"][0]["tid"] && $arrInfo["list"][0]["handling_date"]=="0000-00-00 00:00:00") {

		$c_sql = " handling_date = now(), ";
?>
<form name="tranMgr" method="post" action="https://pay.smilepay.co.kr/cancel/payCancelProcess.jsp" target="frienpi">
<input type="hidden" name="TID" value="<?=$arrInfo["list"][0]["tid"]?>">
<input type="hidden" name="Cancelpw" value="93501">
<input type="hidden" name="CancelAmt" value="<?=$arrInfo["list"][0]["pay_amount"]?>">
<input type="hidden" name="CancelMSG" value="고객요청">
<input type="hidden" name="PartialCancelCode" value="0">
<input type="hidden" name="cc_ip" value="<?=$_SERVER['REMOTE_ADDR']?>"/>
<input type="hidden" name="EncodingType" value="utf8"/>
<input type="hidden" name="FORWARD" value="Y" />
<input type="hidden" name="NoPop" value="Y" />
<input type="hidden" name="ReturnURL" value="" />
</form>
<iframe name="frienpi" width="0" height="0" frameborder="0"></iframe>
<script type="text/javascript">
document.tranMgr.submit();
</script>
<?
	}

	//주문정보 테이블 수정
	$sql = "UPDATE ".$tbl_order_info." SET
		order_state='".mysql_escape_string($_POST[order_state])."',
		ipkum_date='".mysql_escape_string($_POST[ipkum_date])."',
		shipping_date='".mysql_escape_string($_POST[shipping_date])."',
		shipping_company='".mysql_escape_string($_POST[shipping_company])."',
		shipping_no='".mysql_escape_string($_POST[shipping_no])."',
		$p_sql
		$s_sql
		$c_sql
		admin_comment='".mysql_escape_string($_POST[admin_comment])."'
		WHERE order_no='$order_no'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($_POST[order_state] == "9" && $arrInfo["list"][0]["order_id"] !="guest"){ //구매완료시 회원별 등급판단

		$arrMemberInfo = getUserInfo($arrInfo["list"][0]["order_id"]);						//회원정보
				
		$arrOrder = getOrderList($arrInfo["list"][0]["order_id"], "", "", "9", 0, 0); //총구매액
		if($arrOrder["total"]>0) {
		for($i=0; $i<$arrOrder["total"]; $i++) {
			$totalPrice += $arrOrder["list"][$i]["total_amount"];
		}
		}

		$arrLevelList = getArticleList("tbl_member_level", 0, 0, " WHERE level_no!='99' order by level_no ");
		for($i=0;$i<$arrLevelList["total"];$i++){
			if($arrLevelList["list"][$i][level_price]>0) {
				$arrayLevel[$arrLevelList["list"][$i][level_no]] = $arrLevelList["list"][$i][level_price];
			}
		}

		if($arrayLevel[2] < $totalPrice) {
			$levelEnd = "2";
		}
		if($arrayLevel[3] < $totalPrice) {
			$levelEnd = "3";
		}
		if($arrayLevel[4] < $totalPrice) {
			$levelEnd = "4";
		}

		
		if($levelEnd == "2") {

			if($arrMemberInfo["list"][0]["user_level"]=="1") {
				$sql_up = "update tbl_member set user_level='2' where user_id='".$arrInfo["list"][0]["order_id"]."' "; //승급
				$rs_up = mysql_query($sql_up, $GLOBALS[dblink]);

				$arrLevelInfo  = getMemberLevelInfo("2"); //등급정보

				if($arrLevelInfo["list"][0]["favor1"]) { //승급혜택1
					
					$arrCouponInfo1 = getCouponInfo($arrLevelInfo["list"][0]["favor1"]); //쿠폰정보
					$edate =  date("Y-m-d", mktime(0,0,0,date("m")+$arrCouponInfo1["list"][0][coupon_content],date("d"),date("Y")));

					for($i=0; $i<$arrLevelInfo["list"][0][favor1_ea]; $i++) {
						$serial = substr(strtoupper(md5($arrCouponInfo1["list"][0][coupon_name].$i.microtime(true))),0,16);

						//쿠폰발행
						$sql = "INSERT INTO tbl_mycoupon SET
							user_id='".$arrInfo["list"][0]["order_id"]."',
							e_idx='".$arrLevelInfo["list"][0]["favor1"]."',
							coupon_no='".$serial."',
							coupon_name='".$arrCouponInfo1["list"][0][coupon_name]."',
							coupon_dis='".$arrCouponInfo1["list"][0][coupon_dis]."',
							coupon_unit='".$arrCouponInfo1["list"][0][coupon_unit]."',
							coupon_sdate=now(),
							coupon_edate='".$edate."',
							coupon_use='N',
							over_price='".$arrCouponInfo1["list"][0][over_price]."',
							under_price='".$arrCouponInfo1["list"][0][under_price]."',
							wdate=now()
						";
						$rs = mysql_query($sql, $GLOBALS[dblink]);
					}

				}

				if($arrLevelInfo["list"][0]["favor2"]) { //승급혜택2
					$arrCouponInfo2 = getCouponInfo($arrLevelInfo["list"][0]["favor2"]); //쿠폰정보
					$edate =  date("Y-m-d", mktime(0,0,0,date("m")+$arrCouponInfo2["list"][0][coupon_content],date("d"),date("Y")));
					$serial = substr(strtoupper(md5($arrCouponInfo2["list"][0][coupon_name].$arrInfo["list"][0]["order_id"].microtime(true))),0,16);

					//쿠폰발행
					$sql = "INSERT INTO tbl_mycoupon SET
						user_id='".$arrInfo["list"][0]["order_id"]."',
						e_idx='".$arrLevelInfo["list"][0]["favor2"]."',
						coupon_no='".$serial."',
						coupon_name='".$arrCouponInfo2["list"][0][coupon_name]."',
						coupon_dis='".$arrCouponInfo2["list"][0][coupon_dis]."',
						coupon_unit='".$arrCouponInfo2["list"][0][coupon_unit]."',
						coupon_sdate=now(),
						coupon_edate='".$edate."',
						coupon_use='N',
						over_price='".$arrCouponInfo2["list"][0][over_price]."',
						under_price='".$arrCouponInfo2["list"][0][under_price]."',
						wdate=now()
					";
					$rs = mysql_query($sql, $GLOBALS[dblink]);
				}
			}

		} else if($levelEnd == "3") {
				
			if($arrMemberInfo["list"][0]["user_level"] < "3" && $arrMemberInfo["list"][0]["user_level"] != "4") {
				$sql_up = "update tbl_member set user_level='3' where user_id='".$arrInfo["list"][0]["order_id"]."' "; //승급
				$rs_up = mysql_query($sql_up, $GLOBALS[dblink]);

				$arrLevelInfo  = getMemberLevelInfo("3"); //등급정보

				if($arrLevelInfo["list"][0]["favor1"]) { //승급혜택1
					
					$arrCouponInfo1 = getCouponInfo($arrLevelInfo["list"][0]["favor1"]); //쿠폰정보
					$edate =  date("Y-m-d", mktime(0,0,0,date("m")+$arrCouponInfo1["list"][0][coupon_content],date("d"),date("Y")));

					for($i=0; $i<$arrLevelInfo["list"][0][favor1_ea]; $i++) {
						$serial = substr(strtoupper(md5($arrCouponInfo1["list"][0][coupon_name].$i.microtime(true))),0,16);

						//쿠폰발행
						$sql = "INSERT INTO tbl_mycoupon SET
							user_id='".$arrInfo["list"][0]["order_id"]."',
							e_idx='".$arrLevelInfo["list"][0]["favor1"]."',
							coupon_no='".$serial."',
							coupon_name='".$arrCouponInfo1["list"][0][coupon_name]."',
							coupon_dis='".$arrCouponInfo1["list"][0][coupon_dis]."',
							coupon_unit='".$arrCouponInfo1["list"][0][coupon_unit]."',
							coupon_sdate=now(),
							coupon_edate='".$edate."',
							coupon_use='N',
							over_price='".$arrCouponInfo1["list"][0][over_price]."',
							under_price='".$arrCouponInfo1["list"][0][under_price]."',
							wdate=now()
						";
						$rs = mysql_query($sql, $GLOBALS[dblink]);
					}

				}

				if($arrLevelInfo["list"][0]["favor2"]) { //승급혜택2
					$arrCouponInfo2 = getCouponInfo($arrLevelInfo["list"][0]["favor2"]); //쿠폰정보
					$edate =  date("Y-m-d", mktime(0,0,0,date("m")+$arrCouponInfo2["list"][0][coupon_content],date("d"),date("Y")));
					$serial = substr(strtoupper(md5($arrCouponInfo2["list"][0][coupon_name].$arrInfo["list"][0]["order_id"].microtime(true))),0,16);

					//쿠폰발행
					$sql = "INSERT INTO tbl_mycoupon SET
						user_id='".$arrInfo["list"][0]["order_id"]."',
						e_idx='".$arrLevelInfo["list"][0]["favor2"]."',
						coupon_no='".$serial."',
						coupon_name='".$arrCouponInfo2["list"][0][coupon_name]."',
						coupon_dis='".$arrCouponInfo2["list"][0][coupon_dis]."',
						coupon_unit='".$arrCouponInfo2["list"][0][coupon_unit]."',
						coupon_sdate=now(),
						coupon_edate='".$edate."',
						coupon_use='N',
						over_price='".$arrCouponInfo2["list"][0][over_price]."',
						under_price='".$arrCouponInfo2["list"][0][under_price]."',
						wdate=now()
					";
					$rs = mysql_query($sql, $GLOBALS[dblink]);
				}
			}

		} else if($levelEnd == "4") {

			if($arrMemberInfo["list"][0]["user_level"] < "4") {
				$sql_up = "update tbl_member set user_level='4' where user_id='".$arrInfo["list"][0]["order_id"]."' "; //승급
				$rs_up = mysql_query($sql_up, $GLOBALS[dblink]);

				$arrLevelInfo  = getMemberLevelInfo("4"); //등급정보

				if($arrLevelInfo["list"][0]["favor1"]) { //승급혜택1
					
					$arrCouponInfo1 = getCouponInfo($arrLevelInfo["list"][0]["favor1"]); //쿠폰정보
					$edate =  date("Y-m-d", mktime(0,0,0,date("m")+$arrCouponInfo1["list"][0][coupon_content],date("d"),date("Y")));

					for($i=0; $i<$arrLevelInfo["list"][0][favor1_ea]; $i++) {
						$serial = substr(strtoupper(md5($arrCouponInfo1["list"][0][coupon_name].$i.microtime(true))),0,16);

						//쿠폰발행
						$sql = "INSERT INTO tbl_mycoupon SET
							user_id='".$arrInfo["list"][0]["order_id"]."',
							e_idx='".$arrLevelInfo["list"][0]["favor1"]."',
							coupon_no='".$serial."',
							coupon_name='".$arrCouponInfo1["list"][0][coupon_name]."',
							coupon_dis='".$arrCouponInfo1["list"][0][coupon_dis]."',
							coupon_unit='".$arrCouponInfo1["list"][0][coupon_unit]."',
							coupon_sdate=now(),
							coupon_edate='".$edate."',
							coupon_use='N',
							over_price='".$arrCouponInfo1["list"][0][over_price]."',
							under_price='".$arrCouponInfo1["list"][0][under_price]."',
							wdate=now()
						";
						$rs = mysql_query($sql, $GLOBALS[dblink]);
					}

				}

				if($arrLevelInfo["list"][0]["favor2"]) { //승급혜택2
					$arrCouponInfo2 = getCouponInfo($arrLevelInfo["list"][0]["favor2"]); //쿠폰정보
					$edate =  date("Y-m-d", mktime(0,0,0,date("m")+$arrCouponInfo2["list"][0][coupon_content],date("d"),date("Y")));
					$serial = substr(strtoupper(md5($arrCouponInfo2["list"][0][coupon_name].$arrInfo["list"][0]["order_id"].microtime(true))),0,16);

					//쿠폰발행
					$sql = "INSERT INTO tbl_mycoupon SET
						user_id='".$arrInfo["list"][0]["order_id"]."',
						e_idx='".$arrLevelInfo["list"][0]["favor2"]."',
						coupon_no='".$serial."',
						coupon_name='".$arrCouponInfo2["list"][0][coupon_name]."',
						coupon_dis='".$arrCouponInfo2["list"][0][coupon_dis]."',
						coupon_unit='".$arrCouponInfo2["list"][0][coupon_unit]."',
						coupon_sdate=now(),
						coupon_edate='".$edate."',
						coupon_use='N',
						over_price='".$arrCouponInfo2["list"][0][over_price]."',
						under_price='".$arrCouponInfo2["list"][0][under_price]."',
						wdate=now()
					";
					$rs = mysql_query($sql, $GLOBALS[dblink]);
				}
			}

		}

	}

	//주문상품 판매정보 업데이트
	if($_POST[order_state] > 5){
		$order_good_status = "o";
	}else{
		$order_good_status = "x";
	}
	$sql = "UPDATE ".$tbl_order_good." SET
		order_status='$order_good_status'
		WHERE order_no='$order_no'
	";
	mysql_query($sql, $GLOBALS[dblink]);

    if($rs){
		return true;

    }else{
        return false;
    }
}


//주문정보 삭제 - 관리자
function delOrderInfoAdmin($order_no, $direct_gb=""){
	$tbl_good = $GLOBALS["_conf_tbl"]["shop_good"];//상품 테이블
	$tbl_order_info = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블
	$tbl_order_good = $GLOBALS["_conf_tbl"]["shop_order_good"];//상품 주문정보 테이블
	$tbl_point = $GLOBALS["_conf_tbl"]["point"];//적립금 테이블

	$arrInfo = getOrderInfoAdmin($order_no);
	
	if($arrInfo["list"][0]["using_point_idx"]>0) { //적립금사용시 롤백
		if($direct_gb=="Y") {
			$sql_del = "DELETE FROM ".$tbl_point." WHERE idx='".$arrInfo["list"][0]["using_point_idx"]."' ";
			$rs_del = mysql_query($sql_del, $GLOBALS[dblink]);
		} else {
			$arrPointInfo = getArticleInfo($tbl_point, $arrInfo["list"][0]["using_point_idx"]);
			$RS = setPlusPoint($arrPointInfo["list"][0]["user_id"], $arrPointInfo["list"][0]["minus"], mysql_escape_string($arrPointInfo["list"][0]["contents"])." 구매취소");
		}
	}

	if($arrInfo["list"][0]["add_point_idx"]>0) { //상품권구입시 남은 적립금 환불 롤백
		if($direct_gb=="Y") {
			$sql_del = "DELETE FROM ".$tbl_point." WHERE idx='".$arrInfo["list"][0]["add_point_idx"]."' ";
			$rs_del = mysql_query($sql_del, $GLOBALS[dblink]);
		} else {
			$arrPointInfo2 = getArticleInfo($tbl_point, $arrInfo["list"][0]["add_point_idx"]);
			$RS = setMinusPoint($arrPointInfo2["list"][0]["user_id"], $arrPointInfo2["list"][0]["plus"], mysql_escape_string($arrPointInfo2["list"][0]["contents"]).", 구매취소");
		}
	}

	if($arrInfo["list"][0]["coupon_idx"]>0) { //쿠폰사용시 롤백
		
		$arrCoupon = explode("|", $arrInfo["list"][0]["coupon_idx"]);
		for($i=0; $i<count($arrCoupon); $i++) {
			$idx = mysql_escape_string($arrCoupon[$i]);

			$sql_up = "UPDATE tbl_mycoupon SET coupon_use='N', udate='' WHERE idx='".$idx."' ";
			$rs_up = mysql_query($sql_up, $GLOBALS[dblink]);
		}
	}
	if($arrInfo["list"][0]["giftcard_idx"]>0) { //상품권사용시 롤백
		$sql_up = "UPDATE tbl_mygiftcard SET giftcard_use='N', udate='' WHERE idx='".$arrInfo["list"][0]["giftcard_idx"]."' ";
		$rs_up = mysql_query($sql_up, $GLOBALS[dblink]);
	}
	
	if($arrInfo["list"][0]["tid"]!="") {
?>
<form name="tranMgr1" method="post" action="https://pay.smilepay.co.kr/cancel/payCancelProcess.jsp" target="frienpi">
<input type="hidden" name="TID" value="<?=$arrInfo["list"][0]["tid"]?>">
<input type="hidden" name="Cancelpw" value="93501">
<input type="hidden" name="CancelAmt" value="<?=$arrInfo["list"][0]["pay_amount"]?>">
<input type="hidden" name="CancelMSG" value="고객요청">
<input type="hidden" name="PartialCancelCode" value="0">
<input type="hidden" name="cc_ip" value="<?=$_SERVER['REMOTE_ADDR']?>"/>
<input type="hidden" name="EncodingType" value="utf8"/>
<input type="hidden" name="FORWARD" value="Y" />
<input type="hidden" name="NoPop" value="Y" />
<input type="hidden" name="ReturnURL" value="" />
</form>
<iframe name="frienpi" width="0" height="0" frameborder="0"></iframe>
<script type="text/javascript">
document.tranMgr1.submit();
</script>
<?
		sleep(2);
	}
	
	//주문정보 테이블 삭제
	$sql = "DELETE FROM ".$tbl_order_info." WHERE order_no='$order_no' ";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	//주문상품 테이블 삭제
	$sql = "DELETE FROM ".$tbl_order_good." WHERE order_no='$order_no' ";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

    if($rs){
		return true;
    }else{
        return false;
    }
}

//주문정보 가져오기
function getOrderList($order_id, $s_date, $e_date, $order_state, $scale, $offset=0){
	$tbl_order_info = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블
	$tbl_order_good = $GLOBALS["_conf_tbl"]["shop_order_good"];//상품 주문정보 테이블

	$que_where = "AND A.order_id='$order_id'";
	if($s_date){
		$que_where .= "AND A.order_date >='$s_date 00:00:00' ";
	}
	if($e_date){
		$que_where .= "AND A.order_date <='$e_date 23:59:59' ";
	}

	if($order_state) {
		$orderstate = explode(",", $order_state);
		for($i=0; $i < count($orderstate); $i++){
			$str_state .= "'".$orderstate[$i]."'";
			if($i != count($orderstate)-1){
					$str_state .= ",";
			}
		}
		$que_where .= "AND A.order_state in ($str_state) ";
	}


	//카운트
	$sql = "select count(A.idx) from $tbl_order_info A WHERE order_state!=10 $que_where ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT A.* ";
    $sql .= "FROM ".$tbl_order_info." A ";
    $sql .= "WHERE order_state!=10 $que_where ORDER BY A.idx DESC ";

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
//주문한 상품정보 가져오기
function getOrderImage($user_id, $order_no){
	$tbl_good = $GLOBALS["_conf_tbl"]["shop_good"];//상품 테이블
	$tbl_order_info = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블
	$tbl_order_good = $GLOBALS["_conf_tbl"]["shop_order_good"];//상품 주문정보 테이블

	$sql = "SELECT C.image_s,C.idx FROM ".$tbl_order_info." A ";
	$sql .= " join ". $tbl_order_good ." B ";
	$sql .= " on A.order_no = B.order_no ";
	$sql .= " join ". $tbl_good ." C ";
	$sql .= " on B.g_idx = C.idx ";
	$sql .= " WHERE A.order_id='$user_id' AND A.order_no='$order_no' ";

	//echo $sql;

	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total_rs = mysql_affected_rows($GLOBALS[dblink]);

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

//주문정보 가져오기 - 비회원
function getOrderListGuest($order_name, $pw, $scale, $offset=0, $order_state=""){
	$tbl_order_info = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블
	$tbl_order_good = $GLOBALS["_conf_tbl"]["shop_order_good"];//상품 주문정보 테이블

	$que_where = " AND A.order_id='guest' ";
	$que_where .= " AND A.order_name='$order_name' ";
	$que_where .= " AND A.order_regnum2='$pw' ";
	
	if($order_state) {
		$orderstate = explode(",", $order_state);
		for($i=0; $i < count($orderstate); $i++){
			$str_state .= "'".$orderstate[$i]."'";
			if($i != count($orderstate)-1){
					$str_state .= ",";
			}
		}
		$que_where .= "AND A.order_state in ($str_state) ";
	}

	//카운트
	$sql = "select count(A.idx) from $tbl_order_info A WHERE 1=1 $que_where ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    //$sql  = "SELECT A.*, B.subject,B.contents ";
	$sql  = "SELECT A.* ";
    $sql .= "FROM ".$tbl_order_info." A ";
	//$sql .= "LEFT JOIN tbl_board_delivery B ON A.shipping_company=B.idx ";
    $sql .= "WHERE 1=1 $que_where ORDER BY A.idx DESC ";

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

//주문정보 가져오기 - 관리자
function getOrderListAdmin($sw, $sk, $s_date, $e_date, $order_state, $scale, $offset=0){
	$tbl_order_info = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블
	$tbl_order_good = $GLOBALS["_conf_tbl"]["shop_order_good"];//주문 상품 테이블


	if($sw=="all"){
		$que_where .= "AND (A.order_name like '%$sk%' OR A.order_id like '%$sk%') ";
	}else if($sw=="name"){
		$que_where .= "AND A.order_name like '%$sk%' ";
	}else if($sw=="id"){
		$que_where .= "AND A.order_id like '%$sk%' ";
	}else if($sw=="id2"){
		$que_where .= "AND A.order_id = '$sk' ";
	}
	
	if($_REQUEST[sk2]) {
		$que_where .= "AND B.g_name like '%$_REQUEST[sk2]%' ";
	}

	if($s_date){
		$que_where .= "AND A.".$_REQUEST[sh_date]." >='$s_date 00:00:00' ";
	}
	if($e_date){
		$que_where .= "AND A.".$_REQUEST[sh_date]." <='$e_date 23:59:59' ";
	}
	
	if($_REQUEST[order_states]) {
		for($i=0; $i < count($_REQUEST[order_states]); $i++){
			$str_state .= "'".$_REQUEST[order_states][$i]."'";
			if($i != count($_REQUEST[order_states])-1){
					$str_state .= ",";
			}
		}
		$que_where .= "AND A.order_state in ($str_state) ";
	}
	if($_REQUEST[orderstate]){
		$arrOrder = str_replace("/", "", mysql_escape_string($_REQUEST[orderstate]));
		$str_state =  explode(",",$arrOrder); 
		$que_where .= " and A.order_state regexp '(";

		for($k=0; $k < count($str_state)-1; $k++){
			$que_where .= $str_state[$k];
			if($k != count($str_state)-2) {
				$que_where .= "|";
			}
		}
		$que_where .= ")' ";
	}
	
	if($_GET[mode] == "1") {
		$que_where .= " and (A.order_state='1' or  A.order_state='6' or  A.order_state='7' or  A.order_state='8' or  A.order_state='9')  ";
	} else if($_GET[mode] == "2") {
		$que_where .= " and A.order_state regexp '(2|3|4|5)' ";
	} else if($_GET[mode] == "3") {
		$que_where .= " and A.order_state = '10' ";
	}
	
	if($_REQUEST[pay_type]) {
		for($i=0; $i < count($_REQUEST[pay_type]); $i++){
			$str_type .= "'".$_REQUEST[pay_type][$i]."'";
			if($i != count($_REQUEST[pay_type])-1){
					$str_type .= ",";
			}
		}
		$que_where .= "AND A.pay_type in ($str_type) ";
	}
	if($_REQUEST[paytype]){
		
		$str_type =  explode(",",$_REQUEST[paytype]); 
		$que_where .= " and A.pay_type regexp '(";

		for($k=0; $k < count($str_type)-1; $k++){
			$que_where .= $str_type[$k];
			if($k != count($str_type)-2) {
				$que_where .= "|";
			}
		}
		$que_where .= ")' ";
	}

	if($_REQUEST[s_price]){
		$que_where .= "AND A.pay_amount >='".str_replace(",", "",$_REQUEST[s_price])."' ";
	}
	if($_REQUEST[e_price]){
		$que_where .= "AND A.pay_amount <='".str_replace(",", "",$_REQUEST[e_price])."' ";
	}

	if($order_state){
		$arr_state = explode(",",$order_state);
		for($i=0;$i<count($arr_state);$i++){
			$str_state .= "'".$arr_state[$i]."'";
			if($i != count($arr_state)-1){
				$str_state .= ",";
			}
		}
		
		$que_where .= "AND A.order_state in ($str_state) ";
	}

	//목록
    $sql  = "SELECT A.* ";
    $sql .= "FROM ".$tbl_order_info." A ";
	$sql .= "LEFT JOIN ".$tbl_order_good." B ON A.order_no=B.order_no ";
    $sql .= "WHERE 1=1  $que_where GROUP BY A.order_no ORDER BY A.idx DESC ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $total_rs = mysql_num_rows($rs);

	/******
	$sql = "select count(A.idx) from ".$tbl_order_good." A ";
	$sql .= "LEFT JOIN ".$tbl_order_info." B ON A.order_no=B.order_no ";
	$sql .= "WHERE 1=1 $que_where ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT A.idx AS sog_idx, A.*, B.* ";
    $sql .= "FROM ".$tbl_order_good." A ";
	$sql .= "LEFT JOIN ".$tbl_order_info." B ON A.order_no=B.order_no ";
    $sql .= "WHERE 1=1 $que_where ORDER BY A.idx DESC ";
	*******/

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
	//echo $sql;

    return $list;
}
/*
function getOrderListAdmin($sw, $sk, $s_date, $e_date, $order_state, $scale, $offset=0){
	$tbl_order_info = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블
	$tbl_order_good = $GLOBALS["_conf_tbl"]["shop_order_good"];//주문 상품 테이블


	if($sw=="all"){
		$que_where .= "AND (A.order_name like '%$sk%' OR A.order_id like '%$sk%') ";
	}else if($sw=="name"){
		$que_where .= "AND A.order_name like '%$sk%' ";
	}else if($sw=="id"){
		$que_where .= "AND A.order_id like '%$sk%' ";
	}

	if($s_date){
		$que_where .= "AND A.order_date >='$s_date 00:00:00' ";
	}
	if($e_date){
		$que_where .= "AND A.order_date <='$e_date 23:59:59' ";
	}

	if($order_state){
		$que_where .= "AND A.order_state='$order_state' ";
	}

	//카운트
	$sql = "select count(A.idx) from $tbl_order_info A WHERE 1=1 $que_where ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];

	//목록
    $sql  = "SELECT A.* ";
    $sql .= "FROM ".$tbl_order_info." A ";
    $sql .= "WHERE 1=1  $que_where ORDER BY A.idx DESC ";

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
	//echo $sql;

    return $list;
}
*/

//내가 주문한 상품인지 체크
function getMyOrderGood($order_no, $g_idx, $order_id){
	$tbl = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블

	$que_where = "AND A.order_no='$order_no' AND A.g_idx='$g_idx' AND A.order_id='$order_id'";

	//목록
    $sql  = "SELECT A.idx ";
    $sql .= "FROM ".$tbl." A ";
    $sql .= "WHERE 1=1 $que_where ";

	$rs = mysql_query($sql,$GLOBALS[dblink]);
	$total = mysql_num_rows($rs);

	if($total > 0){
		return true;
	}else{
		return false;
	}

}

//매출관리
function getAccountStatus($s_date, $e_date){
	$tbl_order_info = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블

	$sql  = "SELECT count(order_no) as order_count, ";
	$sql .= "SUM(using_point) as using_point, ";
	$sql .= "SUM(ship_amount) as ship_amount, ";
	$sql .= "SUM(total_amount) as total_amount, ";
	$sql .= "SUM(pay_amount) as pay_amount, ";
	$sql .= "LEFT(order_date,10) AS order_date, ";
	$sql .= "pay_type ";

	$sql .= "FROM $tbl_order_info ";

	$sql .= "WHERE order_state  >= '6' AND order_state != '10' ";
	$sql .= "AND order_date >= '$s_date 00:00:00' "; 
	$sql .= "AND order_date <= '$e_date 23:59:59' "; 

	if($_GET[site]) {
		$sql .= "AND order_regnum1='$_GET[site]' ";
	}

	//전체 매출뽑기
	$sql_total = $sql . "GROUP BY LEFT(order_date,10) ";
	$rs = mysql_query($sql_total, $GLOBALS[dblink]);
    $total_rs = mysql_num_rows($rs);

    if($total_rs > 0){
        $list['total'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
			$row =  mysql_fetch_assoc($rs);
            $list['list'][$row[order_date]] = $row;
            $list['list_sum'][order_count] += $row[order_count];
            $list['list_sum'][using_point] += $row[using_point];
            $list['list_sum'][ship_amount] += $row[ship_amount];
            $list['list_sum'][total_amount] += $row[total_amount];
            $list['list_sum'][pay_amount] += $row[pay_amount];
        }
	}else{
	    $list['total'] = 0;
	}

	//결제타입별 매출뽑기
	$sql_p_type = $sql . "GROUP BY LEFT(order_date,10), pay_type ";
	$rs = mysql_query($sql_p_type, $GLOBALS[dblink]);
    $total_rs = mysql_num_rows($rs);

    if($total_rs > 0){
        $list['p_total'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
			$row =  mysql_fetch_assoc($rs);
            $list['p_list'][$row[order_date]][$row[pay_type]] = $row;
            $list['p_list_sum'][$row[pay_type]][pay_amount] += $row[pay_amount];
        }
	}else{
	    $list['p_total'] = 0;
	}

	return $list;
}

function getBankNameByCode($VIRTUAL_CENTERCD){
	if($VIRTUAL_CENTERCD == "39"){
		return "경남은행";
	}else if($VIRTUAL_CENTERCD == "34"){
		return "광주은행";
	}else if($VIRTUAL_CENTERCD == "04"){
		return "국민은행";
	}else if($VIRTUAL_CENTERCD == "11"){
		return "농협중앙회";
	}else if($VIRTUAL_CENTERCD == "31"){
		return "대구은행";
	}else if($VIRTUAL_CENTERCD == "32"){
		return "부산은행";
	}else if($VIRTUAL_CENTERCD == "02"){
		return "산업은행";
	}else if($VIRTUAL_CENTERCD == "45"){
		return "새마을금고";
	}else if($VIRTUAL_CENTERCD == "07"){
		return "수협중앙회";
	}else if($VIRTUAL_CENTERCD == "48"){
		return "신용협동조합";
	}else if($VIRTUAL_CENTERCD == "26"){
		return "(구)신한은행";
	}else if($VIRTUAL_CENTERCD == "05"){
		return "외환은행";
	}else if($VIRTUAL_CENTERCD == "20"){
		return "우리은행";
	}else if($VIRTUAL_CENTERCD == "71"){
		return "우체국";
	}else if($VIRTUAL_CENTERCD == "37"){
		return "전북은행";
	}else if($VIRTUAL_CENTERCD == "23"){
		return "제일은행";
	}else if($VIRTUAL_CENTERCD == "35"){
		return "제주은행";
	}else if($VIRTUAL_CENTERCD == "21"){
		return "(구)조흥은행";
	}else if($VIRTUAL_CENTERCD == "03"){
		return "중소기업은행";
	}else if($VIRTUAL_CENTERCD == "81"){
		return "하나은행";
	}else if($VIRTUAL_CENTERCD == "88"){
		return "신한은행";
	}else if($VIRTUAL_CENTERCD == "27"){
		return "한미은행";
	}
}

//상품정보 가져오기 - g_code
function getGoodInfoGcode($g_code){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_good"];//상품정보

	//기본정보 가져오기
	$sql  = "SELECT idx ";
	$sql .= "FROM ".$tbl." A ";
	$sql .= " WHERE A.g_code = '$g_code' ";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$row = mysql_fetch_assoc($rs);
	
	return getGoodInfo($row[idx]);
}


//================================================
// 주문제품 목록 상품연동 CSV
// 주문관리에서 CSV 파일 만들기
// 20100614
//================================================
function getOrderListCSV($sw, $sk, $s_date, $e_date, $order_state, $scale, $offset=0){
	$tbl_order_info = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블
	$tbl_order_good = $GLOBALS["_conf_tbl"]["shop_order_good"];//주문 상품 테이블
	$tbl_category = $GLOBALS["_conf_tbl"]["category"];//카테고리


	if($sw=="all"){
		$que_where .= "AND ( B.order_name like '%$sk%' OR B.order_id like '%$sk%') ";
	}else if($sw=="name"){
		$que_where .= "AND B.order_name like '%$sk%' ";
	}else if($sw=="id"){
		$que_where .= "AND B.order_id like '%$sk%' ";
	}else if($sw=="id2"){
		$que_where .= "AND B.order_id = '$sk' ";
	}

	if($_REQUEST[sk2]) {
		$que_where .= "AND A.g_name like '%$_REQUEST[sk2]%' ";
	}

	if($_GET[mode] == "1") {
		$que_where .= " and (B.order_state='1' or  B.order_state='6' or  B.order_state='7' or  B.order_state='8' or  B.order_state='9')  ";
	} else if($_GET[mode] == "2") {
		$que_where .= " and B.order_state regexp '(2|3|4|5)' ";
	} else if($_GET[mode] == "3") {
		$que_where .= " and B.order_state = '10' ";
	}

	if($s_date){
		//$que_where .= "AND A.order_date >='$s_date 00:00:00' ";
		$que_where .= "AND order_date >='$s_date 00:00:00' ";		
	}
	if($e_date){
		//$que_where .= "AND A.order_date <='$e_date 23:59:59' ";
		$que_where .= "AND order_date <='$e_date 23:59:59' ";
	}

	if($_REQUEST[order_states]) {
		for($i=0; $i < count($_REQUEST[order_states]); $i++){
			$str_state .= "'".$_REQUEST[order_states][$i]."'";
			if($i != count($_REQUEST[order_states])-1){
					$str_state .= ",";
			}
		}
		$que_where .= "AND B.order_state in ($str_state) ";
	}
	if($_REQUEST[orderstate]){
		$arrOrder = str_replace("/", "", mysql_escape_string($_REQUEST[orderstate]));
		$str_state =  explode(",",$arrOrder); 
		$que_where .= " and B.order_state regexp '(";

		for($k=0; $k < count($str_state)-1; $k++){
			$que_where .= $str_state[$k];
			if($k != count($str_state)-2) {
				$que_where .= "|";
			}
		}
		$que_where .= ")' ";
	}

	if($_GET[mode] == "1") {
		$que_where .= " and (B.order_state='1' or  B.order_state='6' or  B.order_state='7' or  B.order_state='8' or  B.order_state='9')  ";
	} else if($_GET[mode] == "2") {
		$que_where .= " and B.order_state regexp '(2|3|4|5)' ";
	} else if($_GET[mode] == "3") {
		$que_where .= " and B.order_state = '10' ";
	}
	
	if($_REQUEST[pay_type]) {
		for($i=0; $i < count($_REQUEST[pay_type]); $i++){
			$str_type .= "'".$_REQUEST[pay_type][$i]."'";
			if($i != count($_REQUEST[pay_type])-1){
					$str_type .= ",";
			}
		}
		$que_where .= "AND B.pay_type in ($str_type) ";
	}
	if($_REQUEST[paytype]){
		
		$str_type =  explode(",",$_REQUEST[paytype]); 
		$que_where .= " and B.pay_type regexp '(";

		for($k=0; $k < count($str_type)-1; $k++){
			$que_where .= $str_type[$k];
			if($k != count($str_type)-2) {
				$que_where .= "|";
			}
		}
		$que_where .= ")' ";
	}

	if($_REQUEST[s_price]){
		$que_where .= "AND B.pay_amount >='".str_replace(",", "",$_REQUEST[s_price])."' ";
	}
	if($_REQUEST[e_price]){
		$que_where .= "AND B.pay_amount <='".str_replace(",", "",$_REQUEST[e_price])."' ";
	}

	if($order_state){
		$arr_state = explode(",",$order_state);
		for($i=0;$i<count($arr_state);$i++){
			$str_state .= "'".$arr_state[$i]."'";
			if($i != count($arr_state)-1){
				$str_state .= ",";
			}
		}
		
		$que_where .= "AND B.order_state in ($str_state) ";
	}


	//카운트
	$sql = "SELECT COUNT(A.idx)  ";
    $sql .= " FROM ".$tbl_order_good." A ";
    $sql .= " LEFT JOIN ".$tbl_order_info." B ";
	$sql .= " ON A.order_no = B.order_no ";
	$sql .= " WHERE 1=1  ".$que_where;

    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $row = mysql_fetch_row($rs);
    $total_rs = $row[0];
	
	/*
	//목록
    $sql  = "SELECT A.* ";
    $sql .= "FROM ".$tbl_order_info." A ";
    $sql .= "WHERE 1=1  $que_where ORDER BY A.idx DESC ";
	*/
	
	
	$sql  = " SELECT A. * ";
	$sql .= ", B.order_name AS join_name, B.ship_name AS ship_name , B.order_id AS join_id, B.order_date AS join_date";
	$sql .= ", B.ship_zip AS join_zip, B.ship_address AS join_address, C.cat_name ";	
	$sql .= ", B.ship_address_ext AS join_address_ext, B.ship_phone, B.ship_mobile, B.order_comment, B.pay_amount ";		
    $sql .= " FROM ".$tbl_order_good." A ";
    $sql .= " LEFT JOIN ".$tbl_order_info." B ON A.order_no = B.order_no ";
	$sql .= " LEFT JOIN ".$tbl_category." C ON A.g_cat_no=C.cat_no ";
	$sql .= " WHERE 1=1  ".$que_where;
    $sql .= " ORDER BY A.order_no DESC ";
	
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
	//echo $sql;

    return $list;
}


//옵션 가져오기
function getOptionList($sw="", $sk="", $scale, $offset=0){
	//테이블 지정
	$tbl = $GLOBALS["_conf_tbl"]["shop_opt"];//옵션정보

	if($sw=="all") {
		$que_where .= " and opt_name like '%$sk%' ";
	}
	
	//목록
    $sql  = "SELECT * ";
    $sql .= "FROM ".$tbl." ";
    $sql .= "WHERE 1=1 $que_where order by idx desc ";
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

function getOptionInfo($code){
	//옵션정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_opt"];
	$tbl_val = $GLOBALS["_conf_tbl"]["shop_opt_val"];

	$sql  = "SELECT * ";
    $sql .= "FROM $tbl ";
    $sql .= "WHERE opt_code = '$code' ";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
	//echo $sql;
    $total_rs = mysql_num_rows($rs);
    
    if($total_rs > 0){
        $list['total'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }

	//옵션정보 가져오기
    $sql  = "SELECT * ";
    $sql .= "FROM ".$tbl_val." ";
    $sql .= "WHERE opt_code = '$code' order by idx";
    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $total_rs = mysql_num_rows($rs);
    
    if($total_rs > 0){
        $list['total_opt'] = $total_rs;
        for($i=0; $i < $total_rs; $i++){
            $list['opt'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total_opt'] = 0;
    }

    return $list;

}

//상품옵션 등록
function insertOption(){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_opt"];
	$tbl_val = $GLOBALS["_conf_tbl"]["shop_opt_val"];

	// 옵션넘버 만들기
	$sql = "select max(opt_code) as optcode from $tbl ";
	$result = mysql_query($sql) or error(mysql_error());
	if($row = mysql_fetch_object($result)){

		$opt_num = substr($row->optcode,1,4);
		$opt_code = substr("000".(++$opt_num),-4);
		
		if($opt_num) {
			$opt_code = "O".$opt_code;
		} else {
			$opt_code = "O0001";
		}
	}else{
		$opt_code = "O0001";
	}

	$sql = "INSERT INTO ".$tbl." set 
		opt_code='".$opt_code."',
		opt_name='".mysql_escape_string($_POST["option_name"])."'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);


	for($i=0; $i < count($_POST[o_name]); $i++){
		$sql_opt = "INSERT INTO ".$tbl_val." set 
			opt_code='".$opt_code."',
			opt_value='".mysql_escape_string($_POST[o_name][$i])."',
			opt_price='".mysql_escape_string($_POST[o_price][$i])."'
		";
		$rs_opt = mysql_query($sql_opt, $GLOBALS[dblink]);
	}

	if($total > 0){
		return true;
	}else{
		return false;
	}

}

//상품옵션 수정
function editOption($code){
	//상품정보 테이블
	$tbl = $GLOBALS["_conf_tbl"]["shop_opt"];
	$tbl_val = $GLOBALS["_conf_tbl"]["shop_opt_val"];

	$sql = "UPDATE ".$tbl." set 
			opt_name='".mysql_escape_string($_POST["option_name"])."'
		WHERE opt_code='".$code."'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	$total = mysql_affected_rows($GLOBALS[dblink]);
	
	//기존 항목
	for($i=0; $i < count($_POST[edit_opt]); $i++){
		$idx = mysql_escape_string($_POST[edit_opt][$i]);
		$sql = "UPDATE ".$tbl_val." set 
				opt_value='".mysql_escape_string($_POST[e_o_name][$idx])."',
				opt_price='".mysql_escape_string($_POST[e_o_price][$idx])."'
			WHERE idx='".$idx."'
		";
		$rs = mysql_query($sql, $GLOBALS[dblink]);

	}

	//새로운 항목
	for($i=0; $i < count($_POST[o_name]); $i++){
		$sql_opt = "INSERT INTO ".$tbl_val." set 
			opt_code='".$code."',
			opt_value='".mysql_escape_string($_POST[o_name][$i])."',
			opt_price='".mysql_escape_string($_POST[o_price][$i])."'
		";
		$rs_opt = mysql_query($sql_opt, $GLOBALS[dblink]);
	}

	return true;
}

//옵션 삭제
function deleteOption($code) {
	$tbl = $GLOBALS["_conf_tbl"]["shop_opt"];
	$tbl_val = $GLOBALS["_conf_tbl"]["shop_opt_val"];

	//옵션 정보 삭제
	$sql = "DELETE FROM ".$tbl." WHERE opt_code='".$code."'	";
	$rs1 = mysql_query($sql, $GLOBALS[dblink]);

	//옵션 상세정보 삭제
	$sql = "DELETE FROM ".$tbl_val." WHERE opt_code='".$code."'	";
	$rs2 = mysql_query($sql, $GLOBALS[dblink]);

	if($rs1 > 0){
		return true;
	}else{
		return false;
	}
}


//옵션 항목삭제
function deleteOptionValue($idx) {
	$tbl = $GLOBALS["_conf_tbl"]["shop_opt_val"];

	//옵션 상세정보 삭제
	$sql = "DELETE FROM ".$tbl." WHERE idx='".$idx."'	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	if($rs > 0){
		return true;
	}else{
		return false;
	}
}

//반품/교환 입력
function setOrderReturn($order_no){
	$tbl_order_info = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블

	//주문정보 테이블에 수정
	$sql = "UPDATE ".$tbl_order_info." SET
		order_state='4',
		charge_type='".mysql_escape_string($_POST[status])."',
		claim_comment='".mysql_escape_string($_POST[comment])."',
		claim_date=now()
		WHERE order_no='$order_no'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	if($rs){
		return true;
	}else{
		return false;
	}
}

//취소신청 입력
function setOrderCancel($order_no){
	$tbl_order_info = $GLOBALS["_conf_tbl"]["shop_order_info"];//상품 주문정보 테이블

	//주문정보 테이블에 수정
	$sql = "UPDATE ".$tbl_order_info." SET
		order_state='2',
		claim_date=now()
		WHERE order_no='$order_no'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);
	if($rs){
		return true;
	}else{
		return false;
	}
}


//상품권구매후 상품권 발행
function setGiftCard($idx, $price){
	$tbl_my = $GLOBALS["_conf_tbl"]["mygiftcard"];//상품권 테이블
	$tbl_order_good = $GLOBALS["_conf_tbl"]["shop_order_good"];//주문 상품 테이블
	
	if($price=="50000") {
		$arrGiftCardInfo = getGiftcardInfo(5); //상품권정보
	} else if($price=="100000") {
		$arrGiftCardInfo = getGiftcardInfo(6); //상품권정보
	} else if($price=="300000") {
		$arrGiftCardInfo = getGiftcardInfo(7); //상품권정보
	} 
	
	$arrInfo = getArticleInfo($tbl_order_good, $idx);
	if($arrInfo["list"][0]["order_id"]=="guest") {
		$sql_add = "";
	} else {
		$sql_add = "user_id='".$arrInfo["list"][0]["order_id"]."', ";
	}

	$serial = substr(strtoupper(md5($arrGiftCardInfo["list"][0][giftcard_name].$i.microtime(true))),0,16);
	$edate =  date("Y-m-d", mktime(0,0,0,date("m"),date("d"),date("Y")+1));


	$sql = "INSERT INTO ".$tbl_my." set 
		$sql_add
		e_idx = '".$arrGiftCardInfo["list"][0][idx]."',
		giftcard_no = '".$serial."',
		giftcard_name = '".$arrGiftCardInfo["list"][0][giftcard_name]."',
		giftcard_content = '".$arrGiftCardInfo["list"][0][giftcard_content]."',
		giftcard_sdate = now(),
		giftcard_edate = '".$edate."',
		giftcard_dis = '".$arrGiftCardInfo["list"][0][giftcard_dis]."',
		giftcard_unit = '".$arrGiftCardInfo["list"][0][giftcard_unit]."',
		over_price = '".$arrGiftCardInfo["list"][0][over_price]."',
		under_price = '".$arrGiftCardInfo["list"][0][under_price]."',
		giftcard_use = 'N',
		order_no = '".mysql_escape_string($_POST[order_no])."'
	";
	$rs = mysql_query($sql, $GLOBALS[dblink]);

	$sql_up = "UPDATE ".$tbl_order_good." set
			g_vendor='".$serial."'
		WHERE idx='".$idx."'
	";
	$rs_up = mysql_query($sql_up, $GLOBALS[dblink]);
    
	if($rs){
		return true;
    }else{
        return false;
    }

}
?>
