<? 
session_start();
include_once $_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php"; 
if ($_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"]) {
	Header ("Location: /module/intranet/intranet_01.php");
	exit;
}
?>
<script language="javascript">
function checkLogin(frm){
	if(frm.ID.value ==""){
		alert("아이디를 입력하세요.");
		frm.ID.focus();
		return false;
	}
	if(frm.Password.value ==""){
		alert("비밀번호를 입력하세요.");
		frm.Password.focus();
		return false;
	}
}
</script>
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       <td class="pad10"  valign="top"><? include "../include/sub_menu05.php"; ?></td>
       <td width="700" valign="top"><table width="700" border="0" cellspacing="0" cellpadding="0">
         <tr>
          <td><!--title & location 시작 -->
           <table width="100%" height="40" border="0" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
            <tr>
             <td width="400" ><img src="../images/title05_02.gif" width="240" height="40" /></td>
             <td width="300"  align="right" class="pad5r">Home &gt;인트라넷 </td>
            </tr>
           </table>
           <!--title & location 끝 -->
          </td>
         </tr>
         <tr>
          <td align="center" class="pad25tl"><!--컨텐츠시작 -->
           <table width="600" border="0" cellspacing="0" cellpadding="0">
            <tr>
             <td><!-- 로그인시작 -->
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                 <td height="80" valign="bottom"><img src="../images/member/intranet_login_top.gif" width="375" height="35"  hspace="5" vspace="15" /></td>
                </tr>
                <tr>
                 <td align="center"><table width="600" cellspacing="0" cellpadding="0" border="0">
                   <form name="loginForm" method="post" action="/backoffice/auth/admin_login.php" onsubmit="return checkLogin(this);">
				   <input type="hidden" name="evnMode" value="Login">
				   <input type="hidden" name="Prev_URL" value="<?=$_REQUEST[Prev_URL]?$_REQUEST[Prev_URL]:"/intranet/intranet_01.php"?>">
				   
                    <tr>
                     <td height="1" bgcolor="#b9d4ea"></td>
                    </tr>
                    <tr>
                     <td height="100" align="center"><table width="400" border="0" cellspacing="0" cellpadding="0">
                       <tr>
                        <td width="65" height="25"><img src="../images/member/login_text_id.gif" width="50" height="15" /></td>
                        <td width="140" rowspan="2" ><!-- id/pw  입력 시작 -->
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                            <td height="25"><input name="ID" type="text" class="input_bg01"  size="23" /></td>
                           </tr>
                           <tr>
                            <td height="25"><input name="Password" type="password" class="input_bg01"  size="23" />
                            </td>
                           </tr>
                          </table>
                         <!-- id/pw 입력 끝 -->
                        </td>
                        <td width="95" rowspan="2"><input type=image src="../images/member/btn_ok2.gif" style="cursor:hand;"></td>
                       </tr>
                       <tr>
                        <td height="25"><img src="../images/member/login_text_pw.gif" width="60" height="15" /></td>
                       </tr>
                     </table></td>
                    </tr>
                    <tr>
                     <td height="1" bgcolor="#b9d4ea"></td>
                    </tr>
                   </form>
                 </table></td>
                </tr>
               </table>
              <!-- 로그인끝 -->
             </td>
            </tr>
           </table>
           <p>&nbsp;</p>
          <!--컨텐츠 끝 --></td>
         </tr>
        </table>
