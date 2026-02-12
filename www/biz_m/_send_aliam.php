<?



$data = array(
    'test' => 'test'
);

    // selim profile key
	$kn_url = 'https://dev-alimtalk-api.bizmsg.kr:1443/v2/sender/send'; // 개발 서버 // 작동안함
    //$kn_url = 'https://alimtalk-api.bizmsg.kr/v2/sender/send'; // 실서버
    $kn_type = 'at';
    $kn_key = '4d1f5568517156ec880a00522bd65d52006973e0';
    $kn_id_key = 'TwA3qnDQv+xiNxTwdAWU';
    $kn_id = 'selimbiz';
    $kn_tpl1_code = 'tax_tc_manager';
    $kn_tpl1_msg = '[#{TAXOFFICE}] 안녕하세요. 세무사님!

#{NAME}(#{U_PHONE})님께서
"#{CATEGORY}"에 대하여 #{MANAGER}님께 
#{TYPE} 예약 요청하였습니다

#{RETURN_MSG}

홈페이지 바로가기 : #{CENTER_SITE}

고객센터 : #{CENTER_NUMBER}';
    $kn_tpl2_code = 'tax_tc_user';
    $kn_tpl2_msg = '[#{TAXOFFICE}] 안녕하세요. #{NAME}님!

고객님께서 요청하신 "#{CATEGORY}"
#{TYPE} 예약이 완료되었습니다.

#{RETURN MSG}

상담예약해주셔서 감사합니다.

홈페이지 바로가기 : #{CENTER_SITE}

고객센터 : #{CENTER_NUMBER}';

    $input = array();

    $mp =	"010-5759-3902";//	$req_db['manager_phone'];
    $mp_st1 = str_replace("-", "", $mp);
    $mp_st2 = substr($mp_st1, 1);
    $mp = '82'.$mp_st2;
	$user_phone = "010-5759-3902"; //	$req_db['u_phone'];
    $upn =	$user_phone;
    $up_st1 = str_replace("-", "", $upn);
    $up_st2 = substr($up_st1, 1);
    $upn = '82'.$up_st2;
    $biz_url = 'www.taxoffice.co.kr';
    $biz_num = '02-854-2100';


    $input['tax_nick'] = "tax_nick";	//	$req_db['tax_nick'];
    $input['category'] = "category";	//	$req_db['category_name'];
    $input['manager_phone'] = $mp;
    $input['manager'] = "manager";	//	$req_db['manager'];
    $input['u_phone'] = $upn;
    $input['name'] = "name";	//	$req_db['name'];
    $input['type'] = "type";	//	$req_db['type'];
    $input['header'] = array(
        "Content-Type: application/json; charset=utf-8",
        "userId: ".$kn_id
    );
    $return_msg_manager = '1시간 이내로 전화상담 바랍니다.';
    $return_msg_user = '1시간 이내로 '.$input['manager'].'님이 고객님께 전화드릴 예정입니다.';

//    $kn_tpl1_msg_tf = $input['name'].'('.$req_db['u_phone'].')님께서 ['.$input['category'].']에 대하여 '.$input['manager'].'님께 '.$input['type'].' 예약 요청하였습니다.';
	$kn_tpl1_msg_tf = '['.$input['tax_nick'].'] 안녕하세요. 세무사님! 

'. $input['name'].'('.$req_db['u_phone'].')님께서 
"'.$input['category'].'"에 대하여 '.$input['manager'].'님께 
'.$input['type'].' 예약 요청하였습니다

'.$return_msg_manager.'

홈페이지 바로가기 : '.$biz_url.'

고객센터 : '.$biz_num;
//    $kn_tpl2_msg_tf = '['.$input['selimbiz'].'] 안녕하세요. '.$input['name'].'님! 고객님께서 요청하신 ['.$input['category'].']에 대하여 '.$input['manager'].'님께서 1시간내로 '.$input['type'].'드릴 것입니다! 감사합니다';

	$kn_tpl2_msg_tf ='['.$input['tax_nick'].'] 안녕하세요. '.$input['name'].'님!

고객님께서 요청하신 "'.$input['category'].'" 
'.$input['type'].'예약이 완료되었습니다.

'.$return_msg_user.'

상담예약해주셔서 감사합니다.

홈페이지 바로가기 : '.$biz_url.'

고객센터 : '.$biz_num;
    $kn_tpl2_sms = '['.$input['tax_nick'].'] 상담요청항목 ['.$input['category'].'] 1시간내 연락예정';

    $kn_pf_param = array(
        array(
            "message_type" => $kn_type,
            "profile" => $kn_key,
            "phn" => $input['manager_phone'],
            "tmplId" => $kn_tpl1_code,
            "msg" => $kn_tpl1_msg_tf,
            "reserved_time" => "00000000000000",
        ),
        array(
            "message_type" => $kn_type,
            "profile" => $kn_key,
            "phn" => $input['u_phone'],
            "tmplId" => $kn_tpl2_code,
            "msg" => $kn_tpl2_msg_tf,
            "smsKind" => "S",
            "msgSms" => $kn_tpl2_sms,
            "smsSender" => $up_st1,
            "reserved_time" => "00000000000000",
        )
    );

	echo $kn_url."<br>";
	echo $input['header']."<br>";
	echo json_encode($kn_pf_param)."<br>";


    $ch = curl_init();  //curl 초기화
    curl_setopt($ch, CURLOPT_URL, $kn_url);                             //URL 지정하기
    curl_setopt($ch, CURLOPT_HTTPHEADER, $input['header']);             //HEADER
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);             //요청 결과를 문자열로 반환
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);               //connection timeout 10초
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($kn_pf_param));   //POST data
    curl_setopt($ch, CURLOPT_POST, true);                       //true시 post 전송
    curl_setopt($ch, CURLOPT_ENCODING, "");
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    $rp = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);
	var_dump($rp);
    if ($err) {
        $response['result'] = 'error';
        $response['message'] = '상담문의 전송 오류가 발생하였습니다.';
		echo "error";
    } else {
        $response['result'] = 'success';
        $response['message'] = $input['name'].'님의 상담문의가 등록되었습니다.';
		echo "success";
    }

	//echo json_encode($response);

?>