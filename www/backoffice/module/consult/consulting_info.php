<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/consult/consulting.lib.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/member/member.lib.php";
if(!in_array("banner_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
	jsMsg("권한이 없습니다.");
	jsHistory("-1");
endif;

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrInfo = getConsultingInfo($_GET["idx"]);

//DB해제
SetDisConn($dblink);
?>
<div id="admin-container">
	<? include "menu.php"; ?>
    <div id="admin-content">
	<div class="admin-title-top">
		<h2 class="admin-title">상담정보 수정</h2>
		<div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 상담정보 관리 &nbsp;&gt;&nbsp; 상담정보 수정</div>
	</div>

<script language="javascript">

</script>

<form name="frmInfo" method="post" action="consult_evn.php" ENCTYPE="multipart/form-data">
<input type="hidden" name="evnMode" value="consulting_update">
<input type="hidden" name="idx" value="<?=$arrInfo["list"][0]['idx']?>">
<input type="hidden" name="returnURL" value="<?=$_SERVER["PHP_SELF"]?>">


<!-- 기본정보 -->
<table class="admin-table-type1">
  <colgroup>
  <col width="140" />
  <col width="*" />
  <col width="140" />
  <col width="*" />
  </colgroup>
  <tbody>
	<tr>
		<th>담당세무사</th>
		<td colspan="3" class="space-left"><?=$arrInfo["list"][0]['mngr_name']?></td>
	</tr>
	<tr>
		<th>상담종류</th>
		<td class="space-left"><?=$arrInfo["list"][0]['goods_name']?></td>
		<th>상담구분</th>
		<td class="space-left"><?=$arrInfo["list"][0]['category_name']?></td>
	</tr>
	<tr>
		<th>성명</th>
		<td class="space-left">
            <?php if ( $arrInfo["list"][0]['user_id'] == '' ) { ?>
                <?=$arrInfo["list"][0]['user_name']?>
            <?php } else { ?>
                <?php
                $dblink = SetConn($_conf_db["main_db"]);

                $memInfo = getUserInfo($arrInfo["list"][0]['user_id']);
                echo $memInfo["list"][0]['user_name'];
                SetDisConn($dblink);
                ?>
                (<?=$arrInfo["list"][0]['user_id']?>)
            <?php } ?>
            </td>
		<th>이메일</th>
		<td class="space-left">
            <?php if ( $arrInfo["list"][0]['email'] != '' ) { ?>
                <?=$arrInfo["list"][0]['email']?>
            <?php } else { ?>
                <?php if ( $arrInfo["list"][0]['user_id'] != '' ) {
                    echo $memInfo["list"][0]['email'];
                } ?>
            <?php } ?>

        </td>
	</tr>
    <tr>
        <th>연락처</th>
        <td class="space-left" colspan="3">
            <?php if ( $arrInfo["list"][0]['phone'] != '' ) {
                echo $arrInfo["list"][0]['phone'];
            } else {
                if ( $arrInfo["list"][0]['user_id'] != '' ) {
                    echo $memInfo["list"][0]['mobile'];
                }
            } ?>
        </td>
    </tr>
	<tr>
		<th>내용</th>
		<td class="space-left"><?=nl2br($arrInfo["list"][0]['contents'])?></td>
		<th>전송 자료 리스트</th>
		<td class="space-left"><?=str_replace('|', '<br/>', $arrInfo["list"][0]['contents2'])?></td>
	</tr>
	<tr>
		<th>결제</th>
		<td class="sublist space-left">
			<div><span class="tit">금액</span><span class="num"><?=number_format($arrInfo["list"][0]['price'])?></span></div>
			<div><span class="tit">실결제금액</span><span class="num"><?=number_format($arrInfo["list"][0]['pay_price'])?></span></div>
			<div><span class="tit">결제포인트</span><span class="num"><?=number_format($arrInfo["list"][0]['pay_point'])?></span></div>
			<div><span class="tit">적립포인트</span><span class="num"><?=number_format($arrInfo["list"][0]['save_point'])?></span></div>
			<div><span class="tit">결제수단</span><?=$arrInfo["list"][0]['pay_type']?></div>
			<div><span class="tit">결제일시</span><?=$arrInfo["list"][0]['pay_date']?></div>
		</td>
		<th>상담메모</th>
		<td><textarea name="remark" style="height:130px;margin-bottom:4px;"><?=$arrInfo["list"][0]['remark']?></textarea></td>
	</tr>
	<tr>
		<th>등록일시</th>
		<td><?=$arrInfo["list"][0]['reg_date']?></td>
		<th>진행상태</th>
		<td>
			<select name="status" class="status<?=$arrInfo["list"][0]['status']?>" style="width:80px">
				<option value="1" class="status1" <?if($arrInfo["list"][0]['status'] == 1){?>selected<?}?>>접수중</option>
				<option value="2" class="status2" <?if($arrInfo["list"][0]['status'] == 2){?>selected<?}?>>추가요청중</option>
				<option value="3" class="status3" <?if($arrInfo["list"][0]['status'] == 3){?>selected<?}?>>결제대기중</option>
				<option value="4" class="status4" <?if($arrInfo["list"][0]['status'] == 4){?>selected<?}?>>결제완료</option>
				<option value="5" class="status5" <?if($arrInfo["list"][0]['status'] == 5){?>selected<?}?>>완료</option>
				<option value="9" class="status9" <?if($arrInfo["list"][0]['status'] == 9){?>selected<?}?>>취소</option>
			</select> <?=$arrInfo["list"][0]['comp_date'].$arrInfo["list"][0]['cancel_date']?>
		</td>
	</tr>
  </tbody>
</table>
<div class="admin-buttons">
	<div class="cen">
		<span class="btn_pack xlarge icon"><span class="refresh"></span><input type="submit" value="상담 내역 수정" style="font-weight:bold" /></span>
	</div>
</div>

</form>
  </div>
</div>
<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/footer.php";
?>