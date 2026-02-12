<div class="admin-snb">
	<div class="snb-title"><h2>메일 관리</h2></div>
    <ul class="snb-menu">
        <? if(in_array("mail_manage", $arrayMyMenu) && (in_array("mail_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
		<li><a href="/backoffice/module/mail/mail.php">메일 관리</a></li>
		<li><a href="/backoffice/module/mail/sms.php">문자발송내역</a></li>
		<?}?>

		<? if(in_array("send_manage", $arrayMyMenu) && (in_array("send_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) || $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]=="ROOT")){?>
		<li><a href="/backoffice/module/mail/send_list.php">메일발송 관리</a></li>
		<li><a href="/backoffice/module/mail/send_add.php">메일발송 추가</a></li>
		<?}?>
    </ul>
    <?include $_SERVER[DOCUMENT_ROOT] . "/backoffice/admin_info.php";?>
</div>
    	
        
