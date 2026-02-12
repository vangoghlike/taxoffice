<?
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
if(!in_array("admin_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
    jsMsg("권한이 없습니다.");
    jsHistory("-1");
endif;

$scale="20";
$offset = "0";
//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getArticleList($_conf_tbl["ip_ban"], $scale, postNullCheck('offset'),"");

//_DEBUG($arrMenuList);

//DB해제
SetDisConn($dblink);

?>
<script language="javascript" src="/common/util.js"></script>
<script language="javascript">
    function delAdmin(idx){
        var cfm;
        cfm =false;
        cfm = confirm("이 관리자를 삭제 하시겠습니까?");
        if(cfm==true){
            document.frmBBSHidden.idx.value = idx;
            document.frmBBSHidden.submit();
        }
    }

    function CheckForm(frm){
        if (frm.id.value==""){
            alert("ID 를 입력하여 주십시요.");
            frm.id.focus();
            return false;
        }
        if (frm.id.value.length < 2 || frm.id.value.length > 20) {
            alert("ID는 2~20자리입니다.");
            frm.id.focus();
            return false;
        }
        if (hangul_chk(frm.id.value) != true ){
            alert("ID에 한글이나 여백은 사용할 수 없습니다.");
            frm.id.focus();
            return false;
        }

    }
</script>
<div id="admin-container">
    <? include "menu.php"; ?>
    <div id="admin-content">
        <div class="admin-title-top">
            <h2 class="admin-title">IP차단 리스트 목록</h2>
            <div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 기본설정 관리 &nbsp;&gt;&nbsp; IP 차단 리스트 목록</div>
        </div>

        <div class="admin-search">
            <form name="frmBBS" method="post" action="ip_ban_evn.php" onSubmit="return CheckForm(this)">
                <input type="hidden" name="evnMode" value="createIpBan">
                <div class="total">&nbsp;<strong>전체 : <?=number_format($arrList['total'])?> 개</strong></div>
                <div class="keyword"><label for="id">신규 IP 차단 :</label> <input type="text" name="id" id="id" maxlength="20" style="width:160px;" class="input"/> <input type="button" value="IP차단 추가" /></div>
            </form>
        </div>
        <table class="admin-table-type1">
            <colgroup>
                <col width="25%" />
                <col width="25%" />
                <col width="25%" />
                <col width="25%" />
            </colgroup>
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">IP</th>
                <th scope="col">차단 이유</th>
                <th scope="col">일자</th>
            </tr>
            </thead>
            <tbody>
            <?if($arrList['list']['total'] > 0):?>
                <?for ($i=0;$i<$arrList['list']['total'];$i++) {?>
                    <tr>
                        <td><?=number_format($arrList['total']-$i-$offset)?></td>
                        <td><?=$arrList['list'][$i]['ip']?></td>
                        <td><?=$arrList['list'][$i]['reason']?></td>
                        <td><?=substr($arrList['list'][$i]['date'],0,10)?></td>
                    </tr>
                <?}?>
            <?else:?>
                <tr height="100">
                    <td width="100%" colspan="10" >생성된 IP차단 리스트가 없습니다.</td>
                </tr>
            <?endif;?>
            </tbody>
        </table>

        <div class="paginate">
            <?=pageNavigation($arrList['total'],$scale,$pagescale,$offset,"")?>
        </div>

        <form name="frmBBSHidden" method="post" action="admin_evn.php">
            <input type="hidden" name="evnMode" value="deleteAdmin">
            <input type="hidden" name="idx">
        </form>

    </div>
</div>
<?
include $_SERVER[DOCUMENT_ROOT] . "/backoffice/footer.php";
?>
