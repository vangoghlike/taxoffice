<?
@session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
include_once ($_SERVER[DOCUMENT_ROOT] . "/common/conf/config.inc.php");
include_once ($_SERVER[DOCUMENT_ROOT] . "/module/manager/manager.lib.php");

$dblink = SetConn($_conf_db["main_db"]);

$managerList = getManagerListBase();

//DB해제
SetDisConn($dblink);
?>
<link rel="stylesheet" href="/backoffice/css/fullcalendar.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<style>
TD {font-size:9pt}
</style>
<div id="admin-container">
	<? include "menu.php"; ?>
	<div id="admin-content">
		<div class="admin-title-top">
			<h2 class="admin-title">휴무관리</h2>
			<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 세무상담관리 &nbsp;&gt;&nbsp; 휴무관리</div>
		</div>
		<div id="schedule_head">
			<button class="btn_icon save act_move" data-move="today">오늘</button>
			<h3><button class="act_move" data-move="prev">이전</button><div id="current_date"></div><button class="act_move" data-move="next">다음</button></h3>
			<p>
				<button class="act_mode" data-mode="month">월</button>
				<button class="act_mode" data-mode="basicWeek">주</button>
			</p>
		</div>
		<div id="schedule"></div>

		<div id="lyr_view" title="휴무 설정">
			<form id="frm_off">
				<input type="hidden" name="evnMode" value="save" />
				<input type="hidden" name="idx" value="" />
				<input type="hidden" name="off_date" value="" />
				<p style="margin-top:8px;font-weight:bolder;">날짜 : <span id="off_date"></span></p>
				<div style="margin-top:8px">
				<label><span style="display:inline-block;width:50px">세무사 : </span>
				<select name="manager_idx" class="select" style="width:80%;padding:2px;">
				<option value="">-</option>
				<?
				if($managerList["total"] > 0){
					for($i=0;$i<$managerList["total"];$i++){
						echo '<option value="'.$managerList["list"][$i]["idx"].'">'.$managerList["list"][$i]["mngr_name"].'</option>';
					}
				}
				//foreach ($result['list'] as $_idx=>$row) {
				//	echo '<option value="'.$row['idno'].'">'.$row['mngr_name'].'</option>';
				//}
				?>
				</select></label>
				</div>
				<div style="margin-top:8px"><span style="display:inline-block;width:50px">시 간 : </span>
				<label><input type="radio" name="off_time" value="" />종일</label>
				<label><input type="radio" name="off_time" value="A" />오전</label>
				<label><input type="radio" name="off_time" value="P" />오후</label>
				</div>
				<div style="margin-top:8px">
				<label><span style="display:inline-block;width:50px">사 유 : </span><input type="text" name="reason" value="" class="txt" style="width:80%" /></label>
				</div>
				<div id="btn_del" style="margin-top:16px;"><button class="btn_icon del act_del">삭제</button></div>
			</form>
		</div>
<?
//_DEBUG($arrSolarCalendar);
//_DEBUG($arrLunarCalendar);
?>
	</div>
</div>
<script src="/backoffice/js/moment.min.js"></script>
<script src="/backoffice/js/fullcalendar/fullcalendar.min.js"></script>
<script src="/backoffice/js/fullcalendar/lang/ko.js"></script>
<script>
var dialog
$(function() {
	$(document).on('click', '#schedule_head button.act_move', function() {
		$('#schedule').fullCalendar($(this).data('move'));
		$('#schedule').fullCalendar('refetchEvents');
		return false;
	});
	$(document).on('click', '#schedule_head button.act_mode', function() {
		$('#schedule').fullCalendar('changeView', $(this).data('mode'));
		$('#schedule').fullCalendar('refetchEvents');
		return false;
	});
	$(document).on('click', 'button.fc-prev-button, button.fc-next-button', load_schedule);
	$(document).on('click', '.fc-button-group>button', set_title);
	$(document).on('click', '.act_del', function() {
		if (confirm('삭제하시겠습니까?')) {
			var idx = $(this).closest('form').find('input[name=idx]').val();
			$.ajax({
				type: 'post',
				dataType: 'json',
				data: {evnMode:'delete', idx:idx},
				url: './ajax_manager_off.php',
				success: function(resp) {
					alert(resp.message);
					if (resp.result == 'success') {
						load_schedule();
						dialog.dialog( "close" );
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert(errorThrown);
				}
			});
		}
		return false;
	});
	$(document).ready(function() {
		if ($('#schedule').length > 0) load_schedule();
		dialog = $('#lyr_view').dialog({
			autoOpen: false,
			resizable:false,
			modal:true,
			height:260,
			width:320,
			buttons: {
				"저장": function() {
					$.ajax({
						type: 'post',
						dataType: 'json',
						data: $('#frm_off').serialize(),
						url: './ajax_manager_off.php',
						success: function(resp) {
							alert(resp.message);
							if (resp.result == 'success') {
								load_schedule();
								dialog.dialog( "close" );
							}
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert(errorThrown);
						}
					});
				},
				"닫기": function() {
					dialog.dialog( "close" );
				}
			},
			close: function() {
				$('#lyr_view').hide();
			}
		});
	});
});

function load_schedule() {
	var defaultdate = '';
	if ($('#schedule').fullCalendar('getCalendar')) {
		if ($('#schedule').fullCalendar('getDate')) defaultdate = $('#schedule').fullCalendar('getDate');
		$('#schedule').fullCalendar('destroy');
	}
	$('#schedule').fullCalendar({
		header: {
			left: '',
			center: '',
			right: ''
		},
		height: 650,
		editable: false,
		eventLimit: true,
		defaultDate: defaultdate,
		events: {
			type: 'post',
			data: {'evnMode':'list'},
			url : './ajax_manager_off.php',
			dataType : 'json',
			success: function(resp) {
				set_title();
				var source = [];
				console.log(resp);
				$(resp).each(function (idx, data) {
					console.log(data);
					source.push({
						title: data.manager_name+' ('+data.off_time_title+')',
						start: data.off_date,
						end: data.off_date,
						idx: data.idx,
						manager_idx: data.manager_idx,
						off_time: data.off_time,
						reason: data.reason
					});
				});
				return source;
			},
			error: function () {
				alert('목록을 가져올 수 없습니다.');
			}
		},
		timeFormat: 'HH시(mm분) ',
		dayClick: function(date, jsEvent, view) {
			pop_form(date.format(), {idx:'',mngr_idx:'',off_time:'',reason:''});
		},
		eventClick: function(calEvent, jsEvent, view) {
			pop_form(calEvent.start.format(), calEvent);
		}
	});
}

function set_title() {
	var view = $('#schedule').fullCalendar('getView');
	$('#current_date').text(view.title);
}

function pop_form(date, data) {
	$('#off_date').empty().append(date);
	$('#lyr_view input[name=idx]').val(data.idx);
	$('#lyr_view select[name=manager_idx]>option[value="'+data.manager_idx+'"]').prop('selected', true);
	$('#lyr_view input[name=off_date]').val(date);
	$('#lyr_view input[name=off_time][value="'+data.off_time+'"]').prop('checked', true);
	$('#lyr_view input[name=reason]').val(data.reason);
	if (data.idx == '') $('#btn_del').hide();
	else $('#btn_del').show();
	dialog.dialog( "open" );
}
</script>
<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/footer.php";
?>