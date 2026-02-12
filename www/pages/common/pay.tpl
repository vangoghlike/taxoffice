	<form id="frm_mpay" name="frm_mpay" method="post" action="" accept-charset="EUC-KR">
	<input type="hidden" name="inipaymobile_type" value="web" >
	<input type="hidden" name="paymethod" value="wcard" >
	<input type="hidden" name="P_MID" value="{ PG['mid'] }" >
	<input type="hidden" name="P_GOODS" value="{ PG['goodname'] }" >
	<input type="hidden" name="P_OID" value="{ PG['oid'] }" >
	<input type="hidden" name="P_AMT" value="{ PG['price'] }" >
	<input type="hidden" name="P_UNAME" value="{ PG['buyername'] }" >
	<input type="hidden" name="P_MOBILE" value="{ PG['buyertel'] }" >
	<input type="hidden" name="P_MNAME" value="세림세무법인" >
	<input type="hidden" name="P_EMAIL" value="{ PG['buyeremail'] }" >
	<input type="hidden" name="P_NEXT_URL" value="{ PG['sitedomain'] }/pay_result.php" >
	<input type="hidden" name="P_NOTI_URL" value="{ PG['sitedomain'] }/pay_noti.php" >
	<input type="hidden" name="P_RETURN_URL" value="{ PG['sitedomain'] }/pay_return.php" >
	<input type="hidden" name="P_CANCEL_URL" value="{ PG['sitedomain'] }/pay_noti.php">
	<!--<input type="hidden" name="P_RESERVED" value="twotrs_isp=Y&block_isp=Y&twotrs_isp_noti=N&ismart_use_sign=Y&vbank_receipt=Y&bank_receipt=N&apprun_check=Y">-->
	<input type="hidden" name="P_RESERVED" value="twotrs_isp=Y&block_isp=Y&twotrs_isp_noti=N&below1000=Y&apprun_check=Y">
	<input type="hidden" name="P_NOTI" value="{ PG['order_idno'] }" >
	<input type="hidden" name="P_HPP_METHOD" value="1">
	<input type="hidden" name="P_CHARSET" value="utf8" >
	</form>
