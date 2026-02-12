<?if($_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["ID"] && $_SERVER[PHP_SELF]=="/backoffice/module/board/board_view.php"){
###################################################### 관리자 페이지 ######################################################?>
<script language="javascript">
function fileDownload(boardid,b_idx,idx){
	obj = window.open("/module/board/download.php?boardid="+boardid+"&b_idx="+b_idx+"&idx="+idx,"download","width=100,height=100,menubars=0, toolbars=0");
}
<?
//댓글 사용시

if($arrBoardInfo["list"][0]["usememo"]=="Y"){
?>
function checkComment(frm){
	<?if(!$_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"]){?>
	alert("로그인을 하셔야 댓글입력이 가능합니다.");
	return false;
	
	<?}else if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["LEVEL"] >= $arrBoardInfo["list"][0]["replylevel"]){?>
	if (frm.comment.value==""){
		alert("댓글 내용을 입력해 주세요.");
		frm.comment.focus();
		return false;
	}
	<?}else{?>

	alert("<?=$arrLevelInfo[$arrBoardInfo["list"][0]["replylevel"]]?> 이상 댓글입력이 가능합니다.");
	return false;
	<?}?>
}
<?
}
//댓글 사용시
?>
</script>
<script type="text/javascript">
function boardDel(val){
	if(confirm("삭제 하시겠습니까?")) {
		$.post("/module/board/ajax_board_del.php", { evnMode: "delete", g_idx: val, boardid: "<?=$arrBoardInfo["list"][0]["boardid"]?>" },
		function(data){		
			//alert(data);
			doLoad();
		});
	}
}
function doLoad(){	
	location.href="<?=$_SERVER[PHP_SELF]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list&sk=<?=$_GET[sk]?>&sw=<?=$_GET[sw]?>&offset=<?=$_GET[offset]?>&category=<?=$_GET[category]?>";
}	
//-->
</script>
<div id="admin-content">
	<h2 class="admin-title"><?=$arrBoardInfo["list"][0]["boardname"]?> - View</h2>
	<table class="viewTable">
		<colgroup><col width="110px" /><col width="*" /><col width="110px" /><col width="20%" /><col width="110px" /><col width="20%" /></colgroup>
		<thead>
		<tr>
			<th colspan="6"><?=stripslashes($arrBoardArticle["list"][0][subject])?></th>
		</tr>
		</thead>
		<tbody>
			<tr>
			<th>작성자</th>
			<td><?=stripslashes($arrBoardArticle["list"][0][name])?></td>
			<th>조회수</th>
			<td colspan="3"><?=number_format($arrBoardArticle["list"][0][hit])?></td>
		</tr>
		<tr>
			<td class="ct" colspan="6">
				<div style="min-height:100px;"><?=stripslashes($arrBoardArticle["list"][0][contents])?></div>
			</td>
		</tr>
		<tr>
			<th>키워드</th>
			<td colspan="5">
			<?=stripslashes($arrBoardArticle["list"][0][etc_1])?>
			</td>
		</tr>
			<tr>
			<th>첨부파일</th>
			<td colspan="5" class="file">
			<?for($i=0;$i<$arrBoardArticle["total_files"];$i++){?>
                <?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){?>
                    <a href="javascript:void(0);" onclick="fileDownload('<?=$arrBoardArticle["files"][$i][boardid]?>','<?=$arrBoardArticle["files"][$i][b_idx]?>','<?=$arrBoardArticle["files"][$i][idx]?>');"><?=$arrBoardArticle["files"][$i][ori_name]?></a>
                <?}else{?>
                    <a class="no_login_down"><?=$arrBoardArticle["files"][$i][ori_name]?></a>
                <?}?>
			<?}?>
			<?if($i<1){?>
			첨부파일이 없습니다.
			<?}?>	
			</td>
		</tr>
			<tr>
			<th>등록일시</th>
			<td><?=$arrBoardArticle["list"][0][wdate]?></td>
			<th>등록IP</th>
			<td colspan="3"><?=stripslashes($arrBoardArticle["list"][0][ip])?></td>
		</tr>
		</tbody>
	</table>
	<p class="btn_l">
		<a href="<?=$_SERVER[PHP_SELF]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list&sk=<?=$_GET[sk]?>&sw=<?=$_GET[sw]?>&offset=<?=$_GET[offset]?>&category=<?=$_GET[category]?>" class="btn_box act_list">목록보기</a>
	</p>
	<p class="btn_r">
		<a href="javascript:void(0);" onclick="boardDel(<?=$arrBoardArticle["list"][0][idx]?>)" class="btn_box black act_del">삭제</a>
		<a href="<?=$_SERVER[PHP_SELF]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=modify&idx=<?=$arrBoardArticle["list"][0][idx]?>&category=<?=$_GET[category]?>" class="btn_box act_upt">수정</a>		
	</p>
	<dl class="more_list">
		<dt>이전글</dt><dd><?if($arrBoardArticle["prev"]["idx"] !=0):?><a href="<?=$_SERVER[PHP_SELF]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=view&idx=<?=$arrBoardArticle["prev"]["idx"]?>&category=<?=$_GET[category]?>" title="<?=$arrBoardArticle["prev"]["subject"]?>" class="act_view"><?=text_cut($arrBoardArticle["prev"]["subject"],$arrBoardInfo["list"][0][subjectcut])?></a><?else:?><a href="javascript:void(0);">이전글이 없습니다.</a><?endif;?></dd>
		<dt>다음글</dt><dd><?if($arrBoardArticle["next"]["idx"] !=0):?><a href="<?=$_SERVER[PHP_SELF]?>?boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=view&idx=<?=$arrBoardArticle["next"]["idx"]?>&category=<?=$_GET[category]?>" title="<?=$arrBoardArticle["next"]["subject"]?>" class="act_view"><?=text_cut($arrBoardArticle["next"]["subject"],$arrBoardInfo["list"][0][subjectcut])?></a><?else:?><a href="javascript:void(0);">다음글이 없습니다.</a><?endif;?></dd>
	</dl> 
</div>
<?}else{###################################################### 사용자 페이지 ######################################################?>
<link rel="stylesheet" href="/module/board/skin/hanpage/css/style.css?v=3">
<script language="javascript">
function download(boardid,b_idx,idx){
	obj = window.open("/module/board/download.php?boardid="+boardid+"&b_idx="+b_idx+"&idx="+idx,"download","width=100,height=100,menubars=0, toolbars=0");
}
function boardDel(val){
    if(confirm("삭제 하시겠습니까?")) {
        $.post("/module/board/ajax_board_del_user.php", { evnMode: "delete", g_idx: val, boardid: "<?=$arrBoardInfo["list"][0]["boardid"]?>" },
            function(data){
                console.log('data=',data);
                if ( data == 'true' ) {
                    alert('게시글이 정상적으로 삭제되었습니다.');
                }
                doLoad();
            });
    }
}
function doLoad(){
    location.href="<?=$_SERVER[PHP_SELF]?>?cat_no=<?=$_GET["cat_no"]?>&boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list&sk=<?=$_GET[sk]?>&sw=<?=$_GET[sw]?>&offset=<?=$_GET[offset]?>&category=<?=$_GET[category]?>";
}
</script>
<div class="viewWrap">
	<div class="line">
		<div class="left">
			<div class="box">
                <?php if ( $arrBoardArticle["list"][0]['category'] != '질문함' ) { ?>
				<div class="tit">상담제목</div>
                <?php } else { ?>
                <div class="tit">상담제목</div>
                <?php } ?>
				<div class="txt bold">
                    <?php if ( $arrBoardArticle["list"][0]['category'] != '질문함' ) { ?>
                        <tag>
                            <?php
                            if ($arrBoardArticle["list"][0]['category'] == '부가가치세 및 수출입 세무') {
                                echo '부가가치세 (주세,개별소비세)';
                            } else {
                                echo $arrBoardArticle["list"][0]['category'];
                            }
                            ?>
                        </tag>&nbsp;&nbsp;
                    <?php } ?>
                    <span class="sbj"><?=stripslashes($arrBoardArticle["list"][0][subject])?></span>
                </div>
			</div>
		</div>
        <div class="page-top-btn-wrap">
            <?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){?>
                <button id="kakao-link-btn" class="kakao-link-btn" data-login-status="yes" data-thumb="/pub/images/share/kakaoshare.png">
                    <img src="https://developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_small.png" alt="세무Chat 답변 공유">
                    <div class="txt"><span class="hidden-txt">세림세무법인 정보</span><span>공유</span></div>
                </button>
                <a class="bbs_print_btn"><i class="fa fa-print"></i>&nbsp;인쇄</a>
            <?}else{?>
                <button id="kakao-link-btn" class="kakao-link-btn nouser" data-login-status="no">
                    <img src="https://developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_small.png" alt="세무Chat 답변 공유">
                    <div class="txt"><span class="hidden-txt">세림세무법인 정보</span><span>공유</span></div>
                </button>
                <a class="bbs_print_btn nouser"><i class="fa fa-print"></i>&nbsp;인쇄</a>
            <?}?>
        </div>
	</div>
    <?php if ( $arrBoardArticle["list"][0]['category'] != '질문함' ) { ?>
    <div class="line">
        <div class="left">
            <div class="box">
                <div class="tit">상담자</div>
                <div class="txt">
                    <?php
                    echo $arrBoardArticle["list"][0]['r_user'];
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
	<div class="line">
		<div class="left">
			<div class="box">
				<div class="tit">작성자</div>
				<div class="txt">
                    <?php
                    echo mb_substr(stripslashes($arrBoardArticle["list"][0][name]),0,1).'**';
                    ?>
                </div>
			</div>
		</div>
		<div class="right">
			<div class="box">
				<div class="tit">조회수</div>
				<div class="txt"><?=number_format($arrBoardArticle["list"][0]['hit'])?></div>
			</div>
		</div>
		<div class="right mr50">
			<div class="box">
				<div class="tit">날짜</div>
				<div class="txt"><?=substr($arrBoardArticle["list"][0]['wdate'],0,10)?></div>
			</div>
		</div>
	</div>
	<div class="line">
		<div class="left">
			<div class="box">
				<div class="tit">첨부파일</div>
				<div class="txt">
				<?
				for($i=0;$i<$arrBoardArticle["total_files"];$i++){
					if(substr($arrBoardArticle["files"][$i][re_name],0,2) != "l_") {
						$imgsrc[$i] = "/uploaded/board/".$arrBoardInfo["list"][0]["boardid"]."/".$arrBoardArticle["files"][$i][re_name];
				?>
                    <?if($_SESSION[$_SITE["DOMAIN"]]["MEMBER"]["ID"] != ""){?>
                        <div><a href="<?=$imgsrc[$i]?>" class="btnDownload file-download" download="<?=$arrBoardArticle["files"][$i][ori_name]?>"><?=$arrBoardArticle["files"][$i][ori_name]?></a></div>
                    <?}else{?>
                        <div><a class="btnDownload file-download no_login_down"><?=$arrBoardArticle["files"][$i][ori_name]?></a></div>
                    <?}?>
				<?}}?>
				</div>
			</div>
		</div>
	</div>
	<div class="viewContent">
		<?=stripslashes($arrBoardArticle["list"][0][contents])?>
	</div>

    <?php if ($arrBoardArticle["list"][0][r_contents]) { ?>
    <div class="viewWrap kl_view">
        <div class="viewContent">
            <tag class="mb20">답변 내용</tag>
            <?=stripslashes($arrBoardArticle["list"][0][r_contents])?>
        </div>

        <div class="post-credit">
            <div class="img-wrap">
                <img src="/pub/images/logo2.png" alt="세림세무법인">
            </div>
            <div class="txt">ⓒ 세림세무법인 | 제공</div>
        </div>

        <div id="sns_share">
            <div id="sns_sbj">게시글 SNS 공유</div>
            <div id="sns_list">
                <a href="#" onclick="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=' +encodeURIComponent(document.URL)+'&t='+encodeURIComponent(document.title), 'facebooksharedialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=540,width=600');return false;" target="_blank" alt="Share on Facebook"><img src="/pages/default/images/common/facebook.png"></a>
                <a href="#" onclick="javascript:window.open('https://twitter.com/intent/tweet?text=[%EA%B3%B5%EC%9C%A0]%20' +encodeURIComponent(document.URL)+'%20-%20'+encodeURIComponent(document.title), 'twittersharedialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=360,width=600');return false;" target="_blank" alt="Share on Twitter"><img src="/pages/default/images/common/twitter.png"></a>
                <a href="#" onclick="javascript:window.open('http://share.naver.com/web/shareView.nhn?url=' +encodeURIComponent(document.URL)+'&title='+encodeURIComponent(document.title), 'naversharedialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank" alt="Share on Naver"><img src="/pages/default/images/common/naver.png"></a>
                <a href="#" onclick="javascript:window.open('https://story.kakao.com/s/share?url=' +encodeURIComponent(document.URL), 'kakaostorysharedialog', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes, height=600,width=600');return false;" target="_blank" alt="Share on kakaostory"> <img src="/pages/default/images/common/kakaostory.png"></a>
                <!-- &nbsp;&nbsp;&nbsp;<a style="cursor:pointer;" target="_blank" class="pdf-down"><i class="fa fa-file-pdf-o" style="font-size:24px"></i></a> -->
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<div class="btnBbs bbNone ">
	<div class="left">
		<a href="<?=$_SERVER[PHP_SELF]?>?cat_no=<?=$_GET["cat_no"]?>&boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=list&sk=<?=$_GET[sk]?>&sw=<?=$_GET[sw]?>&offset=<?=$_GET[offset]?>&category=<?=$_GET[category]?>">목록</a>
	</div>
	<div class="right">
        <?php
        $_mode_txt = '';
        if ($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"] == '') {
            $_mode_txt = 'unlock';
        }
        else if ($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"] == $arrBoardArticle["list"][0]['etc_4']) {
            $_mode_txt = 'modify';
        }
        ?>
        <a href="javascript:void(0);" onclick="boardDel(<?=$arrBoardArticle["list"][0][idx]?>)" class="btn_box black act_del">삭제</a>
        <?php if ( $_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"] != $arrBoardArticle["list"][0]['etc_4'] ) { ?>
        <?php }else{ ?>
        <a href="<?=$_SERVER[PHP_SELF]?>?cat_no=<?=$_GET["cat_no"]?>&boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=<?=$_mode_txt?>&type=write&idx=<?=$arrBoardArticle["list"][0][idx]?>&category=<?=$_GET[category]?>" class="btn_box act_upt">수정</a>
        <?php } ?>
        <?php if ( $arrBoardArticle["list"][0][r_contents] != '' ) { ?>
        <a href="<?=$_SERVER[PHP_SELF]?>?cat_no=<?=$_GET["cat_no"]?>&boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=modify&idx=<?=$arrBoardArticle["list"][0][idx]?>&category=<?=$_GET[category]?>" class="btn_box act_upt">답변수정</a>
        <a class="cpl_btn">답변완료</a>
        <?php } else { ?>
            <?php if ($_SESSION[$GLOBALS["_SITE"]["DOMAIN"]]["MEMBER"]["ID"]){ ?>
        <a href="<?=$_SERVER[PHP_SELF]?>?cat_no=<?=$_GET["cat_no"]?>&boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=modify&idx=<?=$arrBoardArticle["list"][0][idx]?>&category=<?=$_GET[category]?>" class="btn_box act_upt">답변하기</a>
            <?php } ?>
        <?php } ?>
	</div>
</div>
<table summary="윗글/아랫글" class="basic_tb">
	<caption></caption>
	<colgroup>
		<col style="width:6rem;">
		<col width="auto">
	</colgroup>
	<tbody>
		<tr class="prev">
			<th scope="row"><span class="up_bul">이전글</span></th>
			<td colspan="5"><?if($arrBoardArticle["prev"]["idx"] !=0):?><a href="<?=$_SERVER[PHP_SELF]?>?cat_no=<?=$_GET["cat_no"]?>&boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=view&idx=<?=$arrBoardArticle["prev"]["idx"]?>&category=<?=$_GET[category]?>" title="<?=$arrBoardArticle["prev"]["subject"]?>" class="text-ellipsis"><?=text_cut($arrBoardArticle["prev"]["subject"],100)?></a><?else:?><a href="javascript:void(0);" class="text-ellipsis">이전글이 없습니다.</a><?endif;?></td>
		</tr>
		<tr>
			<th scope="row"><span class="down_bul">다음글</span></th>
			<td colspan="5"><?if($arrBoardArticle["next"]["idx"] !=0):?><a href="<?=$_SERVER[PHP_SELF]?>?cat_no=<?=$_GET["cat_no"]?>&boardid=<?=$arrBoardInfo["list"][0]["boardid"]?>&mode=view&idx=<?=$arrBoardArticle["next"]["idx"]?>&category=<?=$_GET[category]?>" title="<?=$arrBoardArticle["next"]["subject"]?>" class="text-ellipsis"><?=text_cut($arrBoardArticle["next"]["subject"],100)?></a><?else:?><a href="javascript:void(0);" class="text-ellipsis">다음글이 없습니다.</a><?endif;?></td>
		</tr>
	</tbody>
</table>

    <?php
    echo $arrAuthCode;
    ?>
<?}###################################################### 사용자 페이지 ###################################################### END ?>