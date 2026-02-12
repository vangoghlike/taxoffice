<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/consult/consult.lib.php";
if(!in_array("banner_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;
############################################## 변수 선언 ################################################ST
$b_type = $_REQUEST['b_type'] ?? "";


//DB연결
$dblink = SetConn($_conf_db["main_db"]);

//제품 리스트
$arrList = getConsultList(0, 0);
if($_REQUEST["idx"] != ""){
	$consult_idx = $_REQUEST["idx"];
	$arrInfo = getConsultInfo($_REQUEST["idx"]);
	$arrCatList = getConsultCatList(0, 0);
	$arrPayList = getPayList(0, 0);
}

//DB해제
SetDisConn($dblink);
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script language="javascript">
function delconsultCat(idx){
	var cfm;
	cfm =false;
	cfm = confirm("이 업무구분을 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmListHidden.evnMode.value = "";
		document.frmListHidden.idx.value = idx;
		document.frmListHidden.submit();
	}
}
function delPay(idx){
	var cfm;
	cfm =false;
	cfm = confirm("이 이용권을 삭제 하시겠습니까?");
	if(cfm==true){
		document.frmListHidden.evnMode.value = "";
		document.frmListHidden.idx.value = idx;
		document.frmListHidden.submit();
	}
}
function formchk(obj){
	if(obj[0].category_name.value.length < 1){
		alert("업무구분명을 입력해 주세요.");
		return false;
	}
	return true;
}
function form_val_chk(obj){
	if(obj[0].price.value.length < 1){
		alert("가격을 입력해 주세요.");
		return false;
	}
	return true;
}
</script>
<style>
.btn_icon.cont {
    background: #5a971f;
}
</style>
<div id="admin-container">
	<? include "menu.php"; ?>
	<div id="admin-content">
		<div class="admin-title-top">
			<h2 class="admin-title">상담정보 관리</h2>
			<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 세무상담관리 &nbsp;&gt;&nbsp; 상담정보 관리</div>
		</div>

	
	<ul class="tabMenu">
		<?
		for($i=0;$i<$arrList["total"];$i++){
			if($i!=2){
		?>
			<li><a href="?idx=<?=$arrList["list"][$i]["idx"]?>" class="category <?if($arrList["list"][$i]["idx"] == $_REQUEST["idx"]){?>on<?}?>"><?=$arrList["list"][$i]["consult_name"]?></a></li>
		<?
			}
		}
		?>
	</ul>

	<table class="writeTable">
		<colgroup>
			<col width="120px">
			<col width="*">
		</colgroup>
		<tbody>
			<?if($_GET["idx"]=="4"){?>
			<tr>
				<th>간략소개</th>
				<td>
					<input type="text" class="txt req" name="subject" title="간략소개를 입력해주세요." value="<?=$arrInfo["list"][0]["subject"]?>" style="width:80%">
					<a class="btn_icon save act_intro_save" href="#">저장</a>
				</td>
			</tr>
			<?}?>
			<?if($arrCatList["total"]>0){?>
			<tr>
				<th>업무구분<br><a class="btn_icon copy act_category_add" href="#">추가</a></th>
				<td>
					<table style="margin-bottom:4px">
						<tbody>
							<?for($i=0;$i<$arrCatList["total"];$i++){?>
								<tr data-idx="<?=$arrCatList["list"][$i]["idx"]?>">
									<td class="category_name" style="font-weight:bolder"><?=$arrCatList["list"][$i]["category_name"]?></td>
									<td>
									<? if ($arrCatList["list"][$i]['file_name_saved']) { ?> 
										<a class="file-download" href="/uploaded/consult_category/<?=$arrCatList["list"][$i]['file_name_saved']?>" data-filename="<?=$arrCatList["list"][$i]['file_name']?>" data-encname="<?=$arrCatList["list"][$i]['file_name_saved']?>" data-part="shop" download="<?=$arrCatList["list"][$i]['file_name']?>"><?=$arrCatList["list"][$i]['file_name']?></a>
									<? } ?>
									</td>
									<td>
									<a href="#" class="btn_icon modify act_category_modi">수정</a>
									<? if ($arrInfo["list"][0]["idx"] == 2) {?>
										<a class="btn_icon cont act_contents" data-name="contents" href="#">필수서류안내</a>
										<a class="btn_icon cont act_contents" data-name="contents1" href="#">보수안내</a>
										<a class="btn_icon cont act_checklist" href="#">체크리스트</a>
									<? } else { ?>
										<a class="btn_icon cont act_contents" data-name="contents" href="#">안내</a>
									<? } ?>
									<a class="btn_icon del act_category_del" href="#">삭제</a>
									</td>
								</tr>
							<?}?>
						</tbody>
					</table>
				</td>
			</tr>
			<?}?>
			<?if($arrPayList["total"]>0){?>
			<tr>
				<th>이용권<br><a class="btn_icon copy act_option_add" href="#">추가</a></th>
				<td>
					<table style="margin-bottom:4px">
						<tbody>
							<?for($i=0;$i<$arrPayList["total"];$i++){?>
								<tr data-idx="<?=$arrPayList["list"][$i]['idx']?>">
									<? if ($arrInfo["list"][0]["idx"] == 1 ) { ?><td class="option_name" style="font-weight:bolder"><?=$arrPayList["list"][$i]['pay_name']?></td><? } ?>
									<td style="text-align:right"><span class="price"><?=number_format($arrPayList["list"][$i]['price'])?></span>원</td>
									<? if ($arrInfo["list"][0]["idx"] == 1 ) { ?><td style="text-align:right"><span class="value"><?=$arrPayList["list"][$i]['value']?></span>분</td><? } ?>
									<td>
									<a href="#" class="btn_icon modify act_option_modi">수정</a>
									<a class="btn_icon del act_option_del" href="#">삭제</a>
									</td>
								</tr>
							<?}?>
						</tbody>
					</table>
				</td>
			</tr>
			<?}?>
		</tbody>
	</table>

	<div class="dialog" id="lyr_category" title="" style="display:none;">
		<form id="frm_category">
			<input type="hidden" name="evnMode" value="category_save" />
			<input type="hidden" name="consult_idx" value="<?=$consult_idx?>" />
			<input type="hidden" name="category_idx" value="" />
			<div>
				<span style="display:inline-block;width:70px">업무구분명 : </span><input type="text" name="category_name" value="" class="txt req" maxlength="100" style="width:360px" title="업무구분명을 입력해주세요." />
			</div>
			<div>
				<span style="display:inline-block;width:70px">자료파일 : </span><div class="in_file" style="display:inline-block;"><input type="text" class="txt" name="" value="" style="width:270px" /> <a class="btn_file" href="#">파일선택<input type="file" name="upfiles" value="" title="파일을 등록해주세요." /></a>
			</div>
			<div>
				<span style="display:inline-block;width:70px"></span><span class="filename"></span>
			</div>
		</form>
	</div>
</div>

<div class="dialog" id="lyr_contents" title="" style="display:none;">
    <form id="frm_contents">
        <input type="hidden" name="evnMode" value="contents_save" />
        <input type="hidden" name="consult_idx" value="<?=$consult_idx?>" />
        <input type="hidden" name="category_idx" value="" />
        <textarea id="contents" name="contents"></textarea>
		<?
		$CKContent = "contents";
		include $_SERVER[DOCUMENT_ROOT] . "/ckeditor/Editor.php";
		?>
    </form>
</div>

<div class="dialog" id="lyr_checklist" title="" style="display:none;">
    <form id="frm_checklist">
        <input type="hidden" name="evnMode" value="contents_save_checklist" />
        <input type="hidden" name="consult_idx" value="<?=$consult_idx?>" />
        <input type="hidden" name="category_idx" value="" />
        <div><span class="info_t">※ 각 항목을 엔터(줄바꿈)로 구분하여 입력해주세요.</span></div>
        <textarea name="checklist" style="width:100%;height:330px"></textarea>
    </form>
</div>

<div class="dialog" id="lyr_option" title="" style="display:none;">
    <form id="frm_option">
        <input type="hidden" name="evnMode" value="option_save" />
        <input type="hidden" name="consult_idx" value="<?=$consult_idx?>" />
        <input type="hidden" name="option_idx" value="" />
        <? if ($consult_idx == 1 ) { ?>
        <div><span style="display:inline-block;width:70px">이용권명 : </span><input type="text" name="option_name" value="" class="txt req" maxlength="100" style="width:300px" title="이용권명을 입력해주세요." /></div>
        <? } ?>
        <div><span style="display:inline-block;width:70px">가격 : </span><input type="text" name="price" value="" class="txt chknum req" maxlength="10" style="width:100px;text-align:right;" title="가격을 입력해주세요." /> 원</div>
        <? if ($consult_idx == 1 ) { ?>
        <div><span style="display:inline-block;width:70px">시간 : </span><input type="text" name="value" value="" class="txt chknum req" maxlength="10" style="width:100px;text-align:right;" title="시간을 입력해주세요." /> 분</div>
        <? } ?>
    </form>
</div>
<script src="/ckeditor/ckeditor.js"></script>
<script>
var dialog_category
var dialog_contents
var dialog_checklist
var dialog_option
var eno = 0;
$(function() {
	$(document).on('change', '.btn_file input', function() {
		$(this).parent().prev('input').val($(this).val());
	});
	$(document).on('click', '.act_category_add', function() {
		$('#lyr_category input[name=category_idx]').val('');
		$('#lyr_category input:text').val('');
		$('#lyr_category input:file').val('');
		$('#lyr_category .filename').empty();
		dialog_category.dialog( {'title':'업무구분추가'} ).dialog( "open" );
		return false;
	});
	$(document).on('click', '.act_category_modi', function() {
		$('#lyr_category input[name=category_idx]').val($(this).closest('tr').data('idx'));
		$('#lyr_category input[name=category_name]').val($(this).closest('tr').find('.category_name').text());
		$('#lyr_category input:file').val('');
		$('#lyr_category .filename').empty();
		if ($(this).closest('tr').find('.file-download').length > 0){
			$('#lyr_category .filename').append($(this).closest('tr').find('.file-download').clone());
		}
		dialog_category.dialog( {'title':'업무구분수정'} ).dialog( "open" );
		return false;
	});
	$(document).on('click', '.act_category_del', function() {
		if (confirm($(this).closest('tr').find('.category_name').text()+' - 삭제하시겠습니까?')) {
			var idx = $(this).closest('tr').data('idx');
			$.ajax({
				type: 'post',
				dataType: 'json',
				data: {'evnMode':'category_delete', 'idx':idx},
				url: './consult_evn.php',
				success: function(resp) {
					alert(resp.message);
					if (resp.result == 'success') {
						location.reload();
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert(errorThrown);
				}
			});
		}
		return false;
	});
	$(document).on('click', '.act_contents', function() {
		var title = $(this).closest('tr').find('.category_name').text()+' '+$(this).text();
		var idx = $(this).closest('tr').data('idx');
		var fld = $(this).data('name');
		$.ajax({
			type: 'post',
			dataType: 'json',
			data: {'evnMode':'category_contents', 'consult_idx':'<?=$consult_idx?>', 'idx':idx, 'fld':fld},
			url: './ajax_consult.php',
			success: function(resp) {
				if (resp.result == 'success') {
					$('#lyr_contents input[name=category_idx]').val(idx);
					$('#lyr_contents textarea').attr('name', fld).val(resp.contents);
					CKEDITOR.instances.contents.setData(resp.contents);
					dialog_contents.dialog( {'title':title} ).dialog( "open" );
				}
				else alert(resp.message);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
		return false;
	});
	$(document).on('click', '.act_checklist', function() {
		var title = $(this).closest('tr').find('.category_name').text()+' '+$(this).text();
		var idx = $(this).closest('tr').data('idx');
		$.ajax({
			type: 'post',
			dataType: 'json',
			data: {'evnMode':'category_contents', 'consult_idx':'<?=$consult_idx?>', 'idx':idx, 'fld':'checklist'},
			url: './ajax_consult.php',
			success: function(resp) {
				if (resp.result == 'success') {
					$('#lyr_checklist input[name=category_idx]').val(idx);
					$('#lyr_checklist textarea').val(resp.contents);
					dialog_checklist.dialog( {'title':title} ).dialog( "open" );
				}
				else alert(resp.message);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
		return false;
	});
	$(document).on('click', '.act_option_add', function() {
		$('#lyr_option input[name=option_idx]').val('');
		$('#lyr_option input:text').val('');
		dialog_option.dialog( {'title':'이용권추가'} ).dialog( "open" );
		return false;
	});
	$(document).on('click', '.act_option_modi', function() {
		$('#lyr_option input[name=option_idx]').val($(this).closest('tr').data('idx'));
		$('#lyr_option input[name=option_name]').val($(this).closest('tr').find('.option_name').text());
		$('#lyr_option input[name=price]').val($(this).closest('tr').find('.price').text().replace(/,/g, ''));
		$('#lyr_option input[name=value]').val($(this).closest('tr').find('.value').text());
		dialog_option.dialog( {'title':'이용권수정'} ).dialog( "open" );
		return false;
	});
	$(document).on('click', '.act_option_del', function() {
		if (confirm($(this).closest('tr').find('.option_name').text()+' - 삭제하시겠습니까?')) {
			var idx = $(this).closest('tr').data('idx');
			$.ajax({
				type: 'post',
				dataType: 'json',
				data: {'evnMode':'option_delete', 'idx':idx},
				url: './consult_evn.php',
				success: function(resp) {
					alert(resp.message);
					if (resp.result == 'success') {
						location.reload();
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert(errorThrown);
				}
			});
		}
		return false;
	});
	$(document).on('click', '.act_intro_save', function() {
		var subject = $.trim($(this).siblings('input[name=subject]').val());
		$.ajax({
			type: 'post',
			dataType: 'json',
			data: {'evnMode':'intro_save', 'consult_idx':'<?=$consult_idx?>', 'subject':subject},
			url: './consult_evn.php',
			success: function(resp) {
				alert(resp.message);
				if (resp.result == 'success') {
					location.reload();
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
		return false;
	});
	$(document).ready(function() {

		dialog_category = $('#lyr_category').dialog({
			autoOpen: false,
			resizable:false,
			modal:true,
			height:180,
			width:460,
			buttons: {
				"저장": function() {
					if (formchk($('#frm_category'))) {
						var formData = new FormData($('#frm_category')[0]);
						$.ajax({
							type: 'POST',
							processData: false,
							contentType: false,
							data: formData,
							dataType: 'json',
							url: './consult_evn.php',
							success: function(resp) {
								alert(resp.message);
								if (resp.result == 'success') {
									location.reload();
								}
							},
							error: function(jqXHR, textStatus, errorThrown) {
								alert(errorThrown);
							}
						});
					}
				},
				"닫기": function() {
					dialog_category.dialog( "close" );
				}
			},
			close: function() {
				$('#lyr_category').hide();
			}
		});
		dialog_contents = $('#lyr_contents').dialog({
			autoOpen: false,
			resizable:false,
			modal:true,
			height:520,
			width:800,
			buttons: {
				"저장": function() {
					$('#frm_contents')[0].contents.value = CKEDITOR.instances.contents.getData();
					$.ajax({
						type: 'post',
						dataType: 'json',
						data: $('#frm_contents').serialize(),
						url: './consult_evn.php',
						success: function(resp) {
							alert(resp.message);
							if (resp.result == 'success') {
								dialog_contents.dialog( "close" );
							}
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert(errorThrown);
						}
					});
				},
				"닫기": function() {
					dialog_contents.dialog( "close" );
				}
			},
			close: function() {
				$('#lyr_contents').hide();
			}
		});
		dialog_checklist = $('#lyr_checklist').dialog({
			autoOpen: false,
			resizable:false,
			modal:true,
			height:460,
			width:500,
			buttons: {
				"저장": function() {
					$.ajax({
						type: 'post',
						dataType: 'json',
						data: $('#frm_checklist').serialize(),
						url: './consult_evn.php',
						success: function(resp) {
							alert(resp.message);
							if (resp.result == 'success') {
								dialog_checklist.dialog( "close" );
							}
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert(errorThrown);
						}
					});
				},
				"닫기": function() {
					dialog_checklist.dialog( "close" );
				}
			},
			close: function() {
				$('#lyr_checklist').hide();
			}
		});
		dialog_option = $('#lyr_option').dialog({
			autoOpen: false,
			resizable:false,
			modal:true,
			height:180,
			width:420,
			buttons: {
				"저장": function() {
					if (form_val_chk($('#frm_option'))) {
						$.ajax({
							type: 'post',
							dataType: 'json',
							data: $('#frm_option').serialize(),
							url: './consult_evn.php',
							success: function(resp) {
								alert(resp.message);
								if (resp.result == 'success') {
									location.reload();
								}
							},
							error: function(jqXHR, textStatus, errorThrown) {
								alert(errorThrown);
							}
						});
					}
				},
				"닫기": function() {
					dialog_option.dialog( "close" );
				}
			},
			close: function() {
				$('#lyr_option').hide();
			}
		});
	});
});
</script>
<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/footer.php";
?>