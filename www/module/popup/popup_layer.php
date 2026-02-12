<script language=javascript> 
 function popupClose<?=$arrPopupList["list"][$i]['idx']?>(){
	if ( document.frm<?=$arrPopupList["list"][$i]['idx']?>.no_popup.checked ){
		setCookie("POPUP<?=$arrPopupList["list"][$i]['idx']?>", "done", 1);
	}
	popup<?=$arrPopupList["list"][$i]['idx']?>.style.display = 'none';
  }

//이미지 클릭시 이동
function go<?=$arrPopupList["list"][$i]['idx']?>(){
	<?if($arrPopupList["list"][$i]['p_target']=="O"):?>
	document.location.href='<?=$arrPopupList["list"][$i]['p_url']?>';
	<?else:?>
	obj = window.open('<?=$arrPopupList["list"][$i]['p_url']?>','','');
	<?endif;?>
	//self.close();
}
</script>

<div id="popup<?=$arrPopupList["list"][$i]['idx']?>" style="z-index:1000; position:absolute; left: <?=$arrPopupList["list"][$i]['pop_left']?>px; top: <?=$arrPopupList["list"][$i]['pop_top']?>px; background-color:#fff; border:1px solid black;">
<table border="0"  cellspacing="0" cellpadding="0" style="width:<?=$arrPopupList["list"][$i]['width']?>px;">
<form name="frm<?=$arrPopupList["list"][$i]['idx']?>">
  <tr>
    <td valign="top">
    
      <table border="0" width="<?=$arrPopupList["list"][$i]['width']?>" height="<?=$arrPopupList["list"][$i]['height']?>" cellpadding="0" cellspacing="0" >
	   <tr>
	    <td>
		  <? if($arrPopupList["list"][$i]['p_type']=="IMG")://이미지타입일경우?>
			<? if($arrPopupList["list"][$i]['p_url']){?>
				<a href="javascript:go<?=$arrPopupList["list"][$i]['idx']?>();"><img src="/uploaded/popup/<?=stripslashes($arrPopupList["list"][$i]['p_image'])?>" border="0" style="width:<?=$arrPopupList["list"][$i]['width']?>px;"></a>
			<? }else{?>
				<img src="/uploaded/popup/<?=stripslashes($arrPopupList["list"][$i]['p_image'])?>" border="0">
			<? }?>
		<? else:?>
			<?=stripslashes($arrPopupList["list"][$i]['contents'])?>
		<?endif;?>
		  </td>
	    </tr>
      </table>

      <table width="100%" height="25" bgcolor="#000000" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>&nbsp;<font color=#ffffff>오늘하루 열지않음</font> <input type="checkbox" name="no_popup" onClick="popupClose<?=$arrPopupList["list"][$i]['idx']?>();">&nbsp; </td>
		  <td align="right"><a href="javascript:popupClose<?=$arrPopupList["list"][$i]['idx']?>()" style="color:#FFCC66;font-size:9pt">[닫기]</a>&nbsp;</td>
        </tr>
      </table>

      </td>
  </tr>
</form>
</table>
</div>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script language="javascript">
<!--
jQuery("#popup<?=$arrPopupList["list"][$i]['idx']?>").draggable();
if ( getCookie( "POPUP<?=$arrPopupList["list"][$i]['idx']?>" ) == "done" ){
  popup<?=$arrPopupList["list"][$i]['idx']?>.style.display = 'none';
}
-->
</script>
