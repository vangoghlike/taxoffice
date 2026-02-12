	<form id="frm_pay" name="frm_pay" method="POST" >
{*	<input type="hidden" name="version" value="1.0" >*}
{*	<input type="hidden" name="mid" value="{ PG['mid'] }" >*}
{*	<input type="hidden" name="goodname" value="{ PG['goodname'] }" >*}
{*	<input type="hidden" name="oid" value="{ PG['oid'] }" >*}
{*	<input type="hidden" name="price" value="{ PG['price'] }" >*}
{*	<input type="hidden" name="currency" value="WON" >*}
{*	<input type="hidden" name="buyername" value="{ PG['buyername'] }" >*}
{*	<input type="hidden" name="buyertel" value="{ PG['buyertel'] }" >*}
{*	<input type="hidden" name="buyeremail" value="{ PG['buyeremail'] }" >*}
{*	<input type="hidden" name="timestamp" value="{ PG['timestamp'] }" >*}
{*	<input type="hidden" name="signature" value="{ PG['signature'] }" >*}
{*	<input type="hidden" name="returnUrl" value="{ PG['sitedomain'] }/pay_result.php" >*}
{*	<input type="hidden" name="mKey" value="{ PG['mkey'] }" >*}
{*	<input type="hidden" name="gopaymethod" value="Card" >*}
{*	<input type="hidden" name="offerPeriod" value="2015010120150331" >*}
{*	<input type="hidden" name="acceptmethod" value="HPP(1):no_receipt:va_receipt:vbanknoreg(0):below1000" >*}
{*	<input type="hidden" name="languageView" value="" >*}
{*	<input type="hidden" name="charset" value="" >*}
{*	<input type="hidden" name="payViewType" value="popup" >*}
{*	<input type="hidden" name="closeUrl" value="{ PG['sitedomain'] }/pay_close.php" >*}
{*	<input type="hidden" name="popupUrl" value="{ PG['sitedomain'] }/pay_popup.php" >*}
{*	<input type="hidden" name="nointerest" value="" >*}
{*	<input type="hidden" name="quotabase" value="2:3:4:5:6:11:12:24:36" >	*}
{*	<input type="hidden" name="vbankRegNo" value="" >*}
{*	<input type="hidden" name="merchantData" value='{ PG['data'] }' >*}


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
