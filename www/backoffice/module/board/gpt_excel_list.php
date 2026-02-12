<?php
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php";
include $_SERVER['DOCUMENT_ROOT'] . "/common/fckeditor/fckeditor.php";
if(!in_array("board_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
    jsMsg("권한이 없습니다.");
    jsHistory("-1");
endif;

?>

<div id="admin-container">
    <?php include "menu.php"; ?>
    <div id="admin-content">
        <div class="admin-title-top">
            <h2 class="admin-title">GPT 엑셀 분류</h2>
            <div class="admin-title-right">HOME &nbsp;&gt;&nbsp; 게시판 관리 &nbsp;&gt;&nbsp; GPT 엑셀 분류</div>
        </div>

        <table class="admin-table-type1">
            <thead>
            <tr>
                <th>
                    카테고리명
                </th>
                <th>
                    다운로드
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    양도소득세
                </td>
                <td>
                    <form action="gpt_excel_category_download.php?category=TRANSFER_INCOME?>" method="post">
                        <button type="submit">GPT 엑셀 다운로드</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    주식 관련 세금
                </td>
                <td>
                    <form action="gpt_excel_category_download.php?category=STOCK?>" method="post">
                        <button type="submit">GPT 엑셀 다운로드</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    상속세 및 증여세
                </td>
                <td>
                    <form action="gpt_excel_category_download.php?category=INHERITANCE?>" method="post">
                        <button type="submit">GPT 엑셀 다운로드</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    소득세
                </td>
                <td>
                    <form action="gpt_excel_category_download.php?category=INCOME?>" method="post">
                        <button type="submit">GPT 엑셀 다운로드</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    법인세
                </td>
                <td>
                    <form action="gpt_excel_category_download.php?category=CORPORATE?>" method="post">
                        <button type="submit">GPT 엑셀 다운로드</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    부가가치세 및 수출입 세무
                </td>
                <td>
                    <form action="gpt_excel_category_download.php?category=VALUE_ADDED?>" method="post">
                        <button type="submit">GPT 엑셀 다운로드</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    급여 및 4대보험
                </td>
                <td>
                    <form action="gpt_excel_category_download.php?category=SALARY_INSURANCE?>" method="post">
                        <button type="submit">GPT 엑셀 다운로드</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    종합부동산세
                </td>
                <td>
                    <form action="gpt_excel_category_download.php?category=COMPREHENSIVE_REAL_ESTATE?>" method="post">
                        <button type="submit">GPT 엑셀 다운로드</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    지방세
                </td>
                <td>
                    <form action="gpt_excel_category_download.php?category=LOCAL?>" method="post">
                        <button type="submit">GPT 엑셀 다운로드</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    국제조세(외투기업)
                </td>
                <td>
                    <form action="gpt_excel_category_download.php?category=ADJUSTMENT_INTERNATIONAL?>" method="post">
                        <button type="submit">GPT 엑셀 다운로드</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    세법일반
                </td>
                <td>
                    <form action="gpt_excel_category_download.php?category=TAX_NORMAL?>" method="post">
                        <button type="submit">GPT 엑셀 다운로드</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/footer.php";
?>
