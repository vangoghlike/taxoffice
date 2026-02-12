<?
session_start();
//header("Content-Type: text/html; charset=euc-kr");
include $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/consult/consulting.lib.php";
include $_SERVER[DOCUMENT_ROOT] . "/module/member/member.lib.php";

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

if($_POST[evnMode]=="pay"){

	// 회원의 경우 회원아이디로 로그인 전이라면 세션 아이디로
	if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){
		
		$_POST['save_point'] = (int)((int)$_POST['pay_price'] / 50);
		$idx = insertConsultingInfo($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);
		if($_POST["pay_price"] != 0 && $_POST["pay_price"] >= 1000){ // 결제금액이 0원이 아닐 경우
			if($idx){
				$mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";
				if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])){
					jsGo("/sub/tax_loading_m.php?idx=".$idx,"","");
				}else{
					jsGo("/sub/tax_loading.php?idx=".$idx,"","");
				}
			}else{
				jsGo("/sub/tax4.php","","저장 되지 않았습니다. 다시 시도해 주세요.");
			}
		}else if($_POST["pay_price"] == 0){ // 전액 포인트 사용 일 경우
			$tbl = "tbl_consulting";

			$sql = "UPDATE ".$tbl." SET 
				tid = '".$TID."',
				pay_method = 'point',
				status = '4',
				pay_date = now(),
				comp_date = now(),
				upt_date = now(),
				upt_user_id = '".$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]."',
				upt_ip = '".$_SERVER["REMOTE_ADDR"]."'
				WHERE idx = ".$idx."
			";
			$rsf = mysqli_query($GLOBALS['dblink'], $sql);

			// 포인트 사용한 만큼 감소
			$memInfo = getUserInfo($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]);
			$nowPoint = (int)$memInfo["list"][0]["etc_2"] - (int)$_REQUEST["pay_point"];
			$tbl = "tbl_member";

			$sql = "UPDATE ".$tbl." SET 
				etc_2 = '".$nowPoint."'
				WHERE user_id = '".$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]."'
			";
			$rsf = mysqli_query($GLOBALS['dblink'], $sql);

			// 로그 저장

			$tbl = "tbl_member_point_log";

			$sql = "SELECT max(order_idx) as max_order_idx FROM $tbl WHERE 1=1 ";
			$rs = mysqli_query($GLOBALS[dblink],$sql);

			$total = mysqli_affected_rows($GLOBALS[dblink]);
			for($i=0; $i < $total; $i++){
				$list['list'][$i] = mysqli_fetch_assoc($rs);
			}
			$order_idx = $list['list'][0]["max_order_idx"]+1;

			$sql = "INSERT ".$tbl." set
				user_id = '".$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]."',
				order_idx = ".$order_idx.",
				pay_method = 'point',
				reci_message = '보수 결제로인한 포인트 감소',
				price = '-".$_REQUEST["pay_point"]."',
				reg_user_id = '".$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]."',
				reg_ip = '".$_SERVER["REMOTE_ADDR"]."',
				reg_date = now()
			";
			$rs = mysqli_query($GLOBALS['dblink'], $sql);

			jsGo("/sub/tax_result.php?idx=".$idx,"","");
		}else{

		}
	}else{
		jsGo("/member/login.php","","로그인 후 이용이 가능합니다. 로그인페이지로 이동합니다.");
	}
}else if($_POST[evnMode]=="cancel"){
	$idx = $_REQUEST["idx"];
	$arrInfo = getArticleList("tbl_consulting", 0, 0, " where idx =".$idx." and status = 4");
	if($arrInfo["total"] > 0){
		if((int)$arrInfo["list"][0]["pay_price"] > 0){

			$key = "BkpEbq6QRPELtAoM";  // INIpayTest 의 INIAPI key
			$type = "Refund";
			$paymethod = "Card";
			$timestamp = date("YmdHis");
			$clientIp = $_SERVER["REMOTE_ADDR"];
			$mid = "taxofficem";
			$tid = $arrInfo["list"][0]["tid"]; // 40byte 승인 TID 입력
			$msg = "거래취소요청";

			$hashData = hash("sha512",$key.$type.$paymethod.$timestamp.$clientIp.$mid.$tid); // hash 암호화


			//step2. key=value 로 post 요청

			$data = array(
				'type' => $type,
				'paymethod' => $paymethod,
				'timestamp' => $timestamp,
				'clientIp' => $clientIp,
				'mid' => $mid,
				'tid' => $tid,
				'msg' => $msg,
				'hashData' => $hashData
				);

			$url ="https://iniapi.inicis.com/api/v1/refund";  // 전송 URL

			$ch = curl_init();                                                   //curl 초기화
			curl_setopt($ch, CURLOPT_URL, $url);                        // 전송 URL 지정하기
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     //요청 결과를 문자열로 반환 
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);      //connection timeout 10초 
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));       //POST data
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=utf-8')); // 전송헤더 설정
			curl_setopt($ch, CURLOPT_POST, 1);                          // post 전송 
			 
			$response = curl_exec($ch);
			curl_close($ch);


			//step3. 요청 결과

			//echo $response;

			$json_data = json_decode($response);

			//var_dump($json_data);
			if($json_data->resultCode == "00"){ // 취소 성공
				$tbl = "tbl_consulting";

				$sql = "UPDATE ".$tbl." SET 
					status = '9',
					cancel_date = now(),
					upt_date = now(),
					upt_user_id = '".$arrInfo["list"][0]["user_id"]."',
					upt_ip = '".$_SERVER["REMOTE_ADDR"]."'
					WHERE idx = ".$idx."
				";
				//echo $sql;
				$rsf = mysqli_query($GLOBALS['dblink'], $sql);

				//------------------------------------------------------------------------- 포인트 획득 및 감소 처리 -----------------------------------------------------------------------//ST
						
				if((int)($arrInfo["list"][0]["pay_point"]) > 0){
					// 포인트 사용한 만큼 추가
					$memInfo = getArticleList("tbl_member", 0, 0, " where user_id = '".$arrInfo["list"][0]["user_id"]."'");
					$nowPoint = (int)$memInfo["list"][0]["etc_2"] + (int)$arrInfo["list"][0]["pay_point"];
					$tbl = "tbl_member";

					$sql = "UPDATE ".$tbl." SET 
						etc_2 = '".$nowPoint."'
						WHERE user_id = '".$arrInfo["list"][0]["user_id"]."'
					";
					//echo $sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $sql);

					//------------------------------------------------------------------------- 로그 저장 처리 -----------------------------------------------------------------------//ST

					$tbl = "tbl_member_point_log";

					$sql = "SELECT max(order_idx) as max_order_idx FROM $tbl WHERE 1=1 ";
					//echo $sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $sql);

					$total = mysqli_affected_rows($GLOBALS['dblink']);
					for($i=0; $i < $total; $i++){
						$list['list'][$i] = mysqli_fetch_assoc($rsf);
					}
					$order_idx = $list['list'][0]["max_order_idx"]+1;

					$sql = "INSERT ".$tbl." set
						user_id = '".$arrInfo["list"][0]["user_id"]."',
						order_idx = ".$order_idx.",
						pay_method = 'point',
						reci_message = '보수 결제 취소로 인한 포인트 반환',
						price = '".$arrInfo["list"][0]["pay_point"]."',
						reg_user_id = '".$arrInfo["list"][0]["user_id"]."',
						reg_ip = '".$_SERVER["REMOTE_ADDR"]."',
						reg_date = now()
					";
					//echo $sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $sql);
					//------------------------------------------------------------------------- 로그 저장 처리 -----------------------------------------------------------------------//ED
				}
				if((int)$arrInfo["list"][0]["save_point"] > 0){
					// 실 결제 금액에서 5% 적립 반환
					$memInfo = getArticleList("tbl_member", 0, 0, " where user_id = '".$arrInfo["list"][0]["user_id"]."'");
					$nowPoint = (int)$memInfo["list"][0]["etc_2"] - (int)$arrInfo["list"][0]["save_point"];

					//var_dump($memInfo);

					$tbl = "tbl_member";

					$sql = "UPDATE ".$tbl." SET 
						etc_2 = '".$nowPoint."'
						WHERE user_id = '".$arrInfo["list"][0]["user_id"]."'
					";
					//echo $sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $sql);

					//------------------------------------------------------------------------- 로그 저장 처리 -----------------------------------------------------------------------//ST

					$tbl = "tbl_member_point_log";

					$sql = "SELECT max(order_idx) as max_order_idx FROM $tbl WHERE 1=1 ";
					//echo $sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $sql);

					$total = mysqli_affected_rows($GLOBALS['dblink']);
					for($i=0; $i < $total; $i++){
						$list['list'][$i] = mysqli_fetch_assoc($rsf);
					}
					$order_idx = $list['list'][0]["max_order_idx"]+1;

					$sql = "INSERT ".$tbl." set
						user_id = '".$arrInfo["list"][0]["user_id"]."',
						order_idx = ".$order_idx.",
						pay_method = 'point',
						reci_message = '보수 결제 취소로 인한 적립금 반환',
						price = '".$arrInfo["list"][0]["save_point"]."',
						reg_user_id = '".$arrInfo["list"][0]["user_id"]."',
						reg_ip = '".$_SERVER["REMOTE_ADDR"]."',
						reg_date = now()
					";
					//echo $sql."<br>";
					$rsf = mysqli_query($GLOBALS['dblink'], $sql);
					//------------------------------------------------------------------------- 로그 저장 처리 -----------------------------------------------------------------------//ED
				}
				//------------------------------------------------------------------------- 포인트 획득 및 감소 처리 -----------------------------------------------------------------------//ED
				jsGo("/","","취소완료 되었습니다.");
			}else{
				jsGo("/","","취소에 실패 하셨습니다. 사유 : ".$json_data->resultMsg."");
			}
		}else{
			$tbl = "tbl_consulting";

			$sql = "UPDATE ".$tbl." SET 
				status = '9',
				cancel_date = now(),
				upt_date = now(),
				upt_user_id = '".$arrInfo["list"][0]["user_id"]."',
				upt_ip = '".$_SERVER["REMOTE_ADDR"]."'
				WHERE idx = ".$idx."
			";
			//echo $sql;
			$rsf = mysqli_query($GLOBALS['dblink'], $sql);

			//------------------------------------------------------------------------- 포인트 획득 및 감소 처리 -----------------------------------------------------------------------//ST
					
			if((int)($arrInfo["list"][0]["pay_point"]) > 0){
				// 포인트 사용한 만큼 추가
				$memInfo = getArticleList("tbl_member", 0, 0, " where user_id = '".$arrInfo["list"][0]["user_id"]."'");
				$nowPoint = (int)$memInfo["list"][0]["etc_2"] + (int)$arrInfo["list"][0]["pay_point"];
				$tbl = "tbl_member";

				$sql = "UPDATE ".$tbl." SET 
					etc_2 = '".$nowPoint."'
					WHERE user_id = '".$arrInfo["list"][0]["user_id"]."'
				";
				//echo $sql."<br>";
				$rsf = mysqli_query($GLOBALS['dblink'], $sql);

				//------------------------------------------------------------------------- 로그 저장 처리 -----------------------------------------------------------------------//ST

				$tbl = "tbl_member_point_log";

				$sql = "SELECT max(order_idx) as max_order_idx FROM $tbl WHERE 1=1 ";
				//echo $sql."<br>";
				$rsf = mysqli_query($GLOBALS['dblink'], $sql);

				$total = mysqli_affected_rows($GLOBALS['dblink']);
				for($i=0; $i < $total; $i++){
					$list['list'][$i] = mysqli_fetch_assoc($rsf);
				}
				$order_idx = $list['list'][0]["max_order_idx"]+1;

				$sql = "INSERT ".$tbl." set
					user_id = '".$arrInfo["list"][0]["user_id"]."',
					order_idx = ".$order_idx.",
					pay_method = 'point',
					reci_message = '보수 결제 취소로 인한 포인트 반환',
					price = '".$arrInfo["list"][0]["pay_point"]."',
					reg_user_id = '".$arrInfo["list"][0]["user_id"]."',
					reg_ip = '".$_SERVER["REMOTE_ADDR"]."',
					reg_date = now()
				";
				//echo $sql."<br>";
				$rsf = mysqli_query($GLOBALS['dblink'], $sql);
				//------------------------------------------------------------------------- 로그 저장 처리 -----------------------------------------------------------------------//ED
			}
			if((int)$arrInfo["list"][0]["save_point"] > 0){
				// 실 결제 금액에서 5% 적립 반환
				$memInfo = getArticleList("tbl_member", 0, 0, " where user_id = '".$arrInfo["list"][0]["user_id"]."'");
				$nowPoint = (int)$memInfo["list"][0]["etc_2"] - (int)$arrInfo["list"][0]["save_point"];

				//var_dump($memInfo);

				$tbl = "tbl_member";

				$sql = "UPDATE ".$tbl." SET 
					etc_2 = '".$nowPoint."'
					WHERE user_id = '".$arrInfo["list"][0]["user_id"]."'
				";
				//echo $sql."<br>";
				$rsf = mysqli_query($GLOBALS['dblink'], $sql);

				//------------------------------------------------------------------------- 로그 저장 처리 -----------------------------------------------------------------------//ST

				$tbl = "tbl_member_point_log";

				$sql = "SELECT max(order_idx) as max_order_idx FROM $tbl WHERE 1=1 ";
				//echo $sql."<br>";
				$rsf = mysqli_query($GLOBALS['dblink'], $sql);

				$total = mysqli_affected_rows($GLOBALS['dblink']);
				for($i=0; $i < $total; $i++){
					$list['list'][$i] = mysqli_fetch_assoc($rsf);
				}
				$order_idx = $list['list'][0]["max_order_idx"]+1;

				$sql = "INSERT ".$tbl." set
					user_id = '".$arrInfo["list"][0]["user_id"]."',
					order_idx = ".$order_idx.",
					pay_method = 'point',
					reci_message = '보수 결제 취소로 인한 적립금 반환',
					price = '".$arrInfo["list"][0]["save_point"]."',
					reg_user_id = '".$arrInfo["list"][0]["user_id"]."',
					reg_ip = '".$_SERVER["REMOTE_ADDR"]."',
					reg_date = now()
				";
				//echo $sql."<br>";
				$rsf = mysqli_query($GLOBALS['dblink'], $sql);
				//------------------------------------------------------------------------- 로그 저장 처리 -----------------------------------------------------------------------//ED
			}
			//------------------------------------------------------------------------- 포인트 획득 및 감소 처리 -----------------------------------------------------------------------//ED
			jsGo("/","","취소완료 되었습니다.");
		}
	}else{
		jsGo("/","","해당 내역은 이미 취소가 완료 혹은 미주문된 건입니다.");
	}
}

//DB해제
SetDisConn($dblink);
?>