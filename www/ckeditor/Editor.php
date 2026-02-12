<?
/*
엔터모드 - 시프트 엔터모드 : enterMode [ 1 = <p></p> , 2 = <br/> , 3 = <div></div> ]
Ckeditor Toolbar 설정 값
	Source , Cut , Copy , Paste , PasteText , PasteFromWord , Print , SpellChecker , Scayt

	Undo , Redo , Find , Replace , SelectAll , RemoveFormat
	
	Form , Checkbox , Radio , Textarea , Select , Button , ImageButton , HiddenField , DRM , GENERAL

	Bold , Italic , Underline , Strike , Subscript , Superscript , NumberedList , BulletedList , Outdent , Indent , Blockquote , CreateDiv , BidiLtr , BidRtl
	Link , Unlink , Anchor , Image , Flash , Table , HorizontalRule , Smiley , SpecialChar , PageBreak , Iframe

	Styles , Format , Font , FontSize , TextColor , BGcolor , Maximize , ShowBlocks
*/
$defaultHeight="250";
if(isset($boardHeight)){	$defaultHeight=$boardHeight; }
?>
<script src="/ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.config.allowedContent= true;
CKEDITOR.config.extraAllowedContent = '*(*)';
CKEDITOR.replace("<?=$CKContent?>",{
	filebrowserImageUploadUrl : "/ckeditor/upload.php?type=images",
	width			: "100%",
	height			: "<?=$defaultHeight?>",
	enterMode		: "3",
	shiftEnterMode	: "2",
	toolbar			: [
		['Undo', 'Redo','Replace'],	
		['Cut', 'Copy', 'Paste','Print'],
		['Image','Table', 'SpecialChar', 'Smiley'],
		//['Image', 'VideoEmbed', 'Video', 'SpecialChar', 'Smiley'],
		['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
		['Blockquote','Outdent','Indent'],
			
		['SelectAll','HorizontalRule'],
		['Link', 'Unlink'],
		['Source'],
		'/',
		['Font', 'FontSize','Styles','Format'],
		['TextColor', 'BGColor'],
		['Bold','Italic', 'Underline', 'Strike','-', 'Superscript', 'Subscript'],
		['Maximize','Iframe','CreateDiv']		
	]
});
</script>