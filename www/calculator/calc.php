<?
@session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . "/common/conf/config.inc.php");
if ( $_SERVER['SERVER_NAME'] == 'taxoffice.co.kr' || $_SERVER['SERVER_NAME'] == 'www.taxoffice.co.kr'  ) {
    include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category.lib.php");
} else {
    include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/category/category_taxcall.lib.php");
}
include_once ($_SERVER['DOCUMENT_ROOT'] . "/module/manager/manager.lib.php");

//DB연결
$dblink = SetConn($_conf_db["main_db"]);

$arrList = getManagerListBase();

$arrMCList = getManagerCategoryList(2);

//_DEBUG($arrMenuList);

//DB해제
SetDisConn($dblink);
?>
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
<script  src="//code.jquery.com/jquery-latest.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/common/js/calc.js?v=4"></script>
<div class="listTyp01 cont_calc">
    <div class="subContainer myTax mt01" id="se_calc">
        <input class="se_sort" type="hidden" value="증여세">
        <article class="tit bll01">증여세</article>
        <div>
            <label for="se_pay">증여재산가액</label>
            <div>
                <input type="text" class="ip01" numberonly="" maxlength="16" placeholder="0">
                <span>원</span>
            </div>
        </div>
        <div>
            <label for="se_pay" class="ltm1">기증여재산가액(10년내)
                <div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
            </label>
            <div>
                <input type="text" class="ip02" numberonly="" maxlength="16" placeholder="0">
                <span>원</span>
            </div>
            <section>
                <div>
                    <strong>기증여재산가액</strong><br>
                    <p>10년 이내 증여 받은 증여재산가액을 적습니다.</p>
                </div>
            </section>
        </div>
        <div>
            <label for="se_pay">채무부담액
                <div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
            </label>
            <div>
                <input type="text" class="ip03" numberonly="" maxlength="16" placeholder="0">
                <span>원</span>
            </div>
            <section>
                <div>
                    <strong>채무부담액</strong><br>
                    <p>증여재산에 부담되어 있는 채무를 함께 승계 하는 경우 채무가액을 적습니다.<br>
                        (예 : 부동산 증여시 보증금액, 은행 담보대출금액 등)
                    </p>
                </div>
            </section>
        </div>
        <div>
            <label for="se_pay"><strong>증여세 과세가액</strong></label>
            <div>
                <input type="text" class="op01" readonly="" numberonly="" maxlength="16" placeholder="0">
                <span>원</span>
            </div>
        </div>
        <div class="mtSelect mtsFour">
            <label for="se-deduct01">증여재산공제액
                <div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
            </label>
            <div>
                <input type="radio" id="se-deduct01" name="ip04" value="600000000" checked=""><label for="se-deduct01">&nbsp;배우자</label><br>
                <input type="radio" id="se-deduct02" name="ip04" value="50000000"><label for="se-deduct02">&nbsp;직계존속(부모,조부모)</label>&nbsp;
                <input type="checkbox" id="se-deduct02-add" disabled="disabled"><label for="se-deduct02-add">미성년</label><br>
                <input type="radio" id="se-deduct03" name="ip04" value="50000000"><label for="se-deduct03">&nbsp;직계비속(자녀)</label><br>
                <input type="radio" id="se-deduct04" name="ip04" value="10000000"><label for="se-deduct04">&nbsp;기타친족(6촌이내 혈족,4촌 이내 인척)</label><br>
            </div>
            <section class="ptzero">
                <div>
                    <strong>증여재산공제 (증여자와의 관계)</strong><br>
                    <table>
                        <colgroup>
                            <col width="140px">
                            <col width="*">
                            <col width="120px">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>증여자 선택</th>
                                <th>공제</th>
                                <th>비고</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>배우자</td>
                                <td>600,000,000</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>직계존속(부모,조부모)</td>
                                <td>50,000,000</td>
                                <td>(미성년:2천만원)</td>
                            </tr>
                            <tr>
                                <td>직계비속(자녀)</td>
                                <td>50,000,000</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>기타친족</td>
                                <td>10,000,000</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <div>
            <label for="se_pay"><strong>과세표준</strong></label>
            <div>
                <input type="text" class="op02" readonly="" numberonly="" maxlength="16" placeholder="0">
                <span>원</span>
            </div>
        </div>
        <div>
            <label for="se_pay">적용세율</label>
            <div>
                <input type="text" class="op03" readonly="" numberonly="" maxlength="16" placeholder="0">
                <span>%</span>
            </div>
        </div>
        <div>
            <label for="se_pay">누진공제액</label>
            <div>
                <input type="text" class="op04" readonly="" numberonly="" maxlength="16" placeholder="0">
                <span>원</span>
            </div>
        </div>
        <div class="hidden">
            <label for="se_pay"></label>
            <div>
                <input type="text" class="op05" readonly="" numberonly="" maxlength="16" placeholder="0">
                <span>원</span>
            </div>
        </div>
        <div>
            <label for="se_pay"><strong>산출세액</strong>
            </label>
            <div>
                <input type="text" class="op06" readonly="" numberonly="" maxlength="16" placeholder="0">
                <span>원</span>
                <div class="lh20"><input type="checkbox" id="op06-add"><label for="op06-add">세대생략가산</label>
                    <div class="qt-mark poRel"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
                </div>
            </div>
            <section class="ptzero">
                <div>
                    <strong>세대생략 가산</strong><br>
                    <p>조부모(A)가 본인의 자녀(B)가 아닌 손자(C)에게 증여를 하는 경우 체크합니다.<br>
                        한 세대를 건너 띈 증여에 대해서는 30%로 할증 과세가 됩니다.<br>
                        (부모(B)가 생존에 있는 경우만 해당)
                    </p>
                </div>
            </section>
        </div>
        <div>
            <label for="se_pay">기납부세액공제
                <div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
            </label>
            <div>
                <input type="text" class="ip05" numberonly="" maxlength="16" placeholder="0">
                <span>원</span>
            </div>
            <section>
                <div>
                    <strong>기납부세액공제</strong><br>
                    <p>기증여재산 신고 시 이미 납부 완료 한 증여세의 산출세액을 적습니다.
                    </p>
                </div>
            </section>
        </div>
        <div>
            <label>신고세액공제(3%)
                <div class="qt-mark"><a><span>?</span><strong>&nbsp;&nbsp;참고사항</strong></a></div>
            </label>
            <div>
                <input type="text" class="op07" readonly="" numberonly="" maxlength="16" placeholder="0">
                <span>원</span>
            </div>
            <section>
                <div>
                    <strong>신고세액공제</strong><br>
                    <p>신고기한 내에 신고시 산출세액의 3%를 공제해줍니다.
                    </p>
                </div>
            </section>
        </div>
        <button id="cst-se_calc"><span></span> 계산</button>
        <div id="cst-se_result" class="off">
            <strong>예상 납부 세액</strong><span id="resVal"></span><br>
            <p>더욱 자세한 사항은 세림세무법인에 상담신청하시면 정성껏 답변드리겠습니다.</p>
        </div>
        <button id="cst-se_list" class="off"><a href="/calclist">세액 계산 목록</a></button>
    </div>
    <div class="calc_link_wrap">
        <ul class="calc_link">
<!--            <li class="">-->
<!--                <a href="/sub/?cat_no=214" target="_self">-->
<!--                    양도세<br>-->
<!--                    계산도우미-->
<!--                </a>-->
<!--            </li>-->
            <li class="on">
                <a href="/sub/?cat_no=179" target="_self">
                    증여세<br>
                    계산도우미
                </a>
            </li>
            <li class="">
                <a href="/sub/?cat_no=184" target="_self">
                    상속세<br>
                    계산도우미
                </a>
            </li>
        </ul>
    </div>

    <?php if ( $_SERVER['SERVER_NAME'] == 'taxoffice.co.kr' || $_SERVER['SERVER_NAME'] == 'www.taxoffice.co.kr'  ) { ?>
        <div class="calc_link_wrap">
            <ul class="calc_link">
                <!--            <li class="">-->
                <!--                <a href="/sub/?cat_no=214" target="_self">-->
                <!--                    양도세<br>-->
                <!--                    계산도우미-->
                <!--                </a>-->
                <!--            </li>-->
                <li class="on">
                    <a href="/sub/?cat_no=179" target="_self">
                        증여세<br>
                        계산도우미
                    </a>
                </li>
                <li class="">
                    <a href="/sub/?cat_no=184" target="_self">
                        상속세<br>
                        계산도우미
                    </a>
                </li>
            </ul>
        </div>
    <?php } else { ?>
        <div class="calc_link_wrap">
            <ul class="calc_link">
                <!--            <li>-->
                <!--                <a href="/sub/?cat_no=214" target="_self">-->
                <!--                    양도세<br>-->
                <!--                    계산도우미-->
                <!--                </a>-->
                <!--            </li>-->
                <li class="on">
                    <a href="/taxcall/sub/?cat_no=19" target="_self">
                        증여세<br>
                        계산도우미
                    </a>
                </li>
                <li class="">
                    <a href="/taxcall/sub/?cat_no=24" target="_self">
                        상속세<br>
                        계산도우미
                    </a>
                </li>
            </ul>
        </div>
    <?php } ?>


</div>
