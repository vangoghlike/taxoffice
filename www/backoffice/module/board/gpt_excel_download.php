<?php
include $_SERVER['DOCUMENT_ROOT'] . "/backoffice/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/module/board/board.lib.php";
include $_SERVER['DOCUMENT_ROOT'] . "/common/fckeditor/fckeditor.php";
include $_SERVER['DOCUMENT_ROOT'] . "/common/lib/phpexcel/PHPExcel.php";
include $_SERVER['DOCUMENT_ROOT'] . "/common/lib/phpexcel/PHPExcel/IOFactory.php";

if(!in_array("board_manage",$_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["AUTH"]) && $_SESSION[$_SITE["DOMAIN"]]["ADMIN"]["GRADE"]!="ROOT"):
    jsMsg("권한이 없습니다.");
    jsHistory("-1");
endif;

// header 세팅

//$objPHPExcel = new PHPExcel();
//$objPHPExcel->setActiveSheetIndex(0);
//$sheet = $objPHPExcel->getActiveSheet();

//$headers = array('idx', 'sidx', 'date', 'type', 'question', 'answer', 'englishQuestion','englishAnswer');
// $widths  = array(10, 10, 10, 10, 20, 40, 20, 40);
// $header_bgcolor = 'd2d2d2';

//DB연결
$dblink = SetConn($_conf_db["main_db"]);
$arrBoardList = getBoardListBase($_REQUEST['boardid'], "", "", "", "", "");

//DB해제
SetDisConn($dblink);

?>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0px;
        table-layout: fixed;
    }
    td {
        padding: 0.5rem 0.2rem;
        border: 1px solid rgb(238, 238, 238);
        text-align: center;
        word-break: break-all;
    }
</style>
<?php
/**
 * HTML 문자열에서 table 관련 태그(table, thead, tbody, tfoot, tr, td, th), <br>, <img>는 그대로 남기고,
 * 나머지 태그들은 태그 마크업만 제거(내부 내용은 유지)하는 함수.
 * - table 관련 태그는 colspan, rowspan 속성만 보존하고 나머지 속성은 제거.
 * - <br>, <img>는 모든 속성 제거.
 *
 * @param string $html 원본 HTML 문자열
 * @return string 정리된 HTML 문자열
 */
function extractContentParts($html) {
    libxml_use_internal_errors(true);
    $doc = new DOMDocument();
    // 불필요한 wrapper 없이 HTML 로드 (UTF-8)
    $doc->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'),
        LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();

    $xpath = new DOMXPath($doc);

    // 먼저 <style>와 <script> 태그 제거 (본문에 남지 않게)
    foreach ($xpath->query('//style | //script') as $node) {
        $node->parentNode->removeChild($node);
    }

    // --- 테이블타입 추출 ---
    $tablesHtml = '';
    $tableNodes = $xpath->query('//table');
    foreach ($tableNodes as $tableNode) {
        // 원본 테이블 HTML 저장
        $tablesHtml .= $doc->saveHTML($tableNode);
        // 새 빈 <table></table> 플레이스홀더 생성
        $placeholder = $doc->createElement('table');
        // 원본 table 노드를 빈 placeholder로 교체 (내부 내용, 속성 모두 제거됨)
        $tableNode->parentNode->replaceChild($placeholder, $tableNode);
    }

    // --- 이미지타입 추출 (필요시) ---
    $imgsHtml = '';
    $imgNodes = $xpath->query('//img');
    foreach ($imgNodes as $imgNode) {
        // 원본 이미지는 단순 <img/>로 저장 (속성 제거)
        $imgsHtml .= '<img/>';
        // placeholder: 새 단순 <img/> 생성
        $newImg = $doc->createElement('img');
        $imgNode->parentNode->replaceChild($newImg, $imgNode);
    }

    // --- 본문타입 처리 ---
    // 문서 전체의 HTML을 가져옴 (이미 table과 img는 플레이스홀더로 대체됨)
    $bodyHtml = '';
    if ($doc->getElementsByTagName('body')->length > 0) {
        $body = $doc->getElementsByTagName('body')->item(0);
        foreach ($body->childNodes as $child) {
            $bodyHtml .= $doc->saveHTML($child);
        }
    } else {
        $bodyHtml = $doc->saveHTML();
    }
    // 오직 <br>, <u>, <table>, <img> 태그만 남기고 나머지 태그 제거
    $allowed = '<br><u><table><img>';
    $mainHtml = strip_tags($bodyHtml, $allowed);

    return array(
        'main' => $mainHtml,
        'tables' => $tablesHtml,
        'imgs' => $imgsHtml
    );
}


// 게시글 출력 예제: 각 게시글을 3가지 타입으로 분리하여 하나의 div에 스타일을 적용해 출력
$articlesHtml = '';
if (!empty($arrBoardList['list'])) {
    foreach ($arrBoardList['list'] as $post) {
        // $post['contents']에 저장된 HTML을 처리
        $parts = extractContentParts($post['contents']);
        // 글번호는 $post['idx']로 대체
        $articlesHtml .= '<div class="article">';
        $articlesHtml .= '<div class="header">글번호: ' . htmlspecialchars($post['idx']) . '</div>';

        // 본문타입: table, img는 placeholder (빈 <table></table>, <img/>)로 남김
        $articlesHtml .= '<div class="section">';
        $articlesHtml .= '<div class="section-title">본문타입</div>';
        $articlesHtml .= '<div class="section-content">' . $parts['main'] . '</div>';
        $articlesHtml .= '</div>';

        // 테이블타입: 추출된 원본 <table> HTML
        $articlesHtml .= '<div class="section">';
        $articlesHtml .= '<div class="section-title">테이블타입</div>';
        $articlesHtml .= '<div class="section-content">' . $parts['tables'] . '</div>';
        $articlesHtml .= '</div>';

        // 이미지타입: 추출된 단순화한 <img/> HTML
        $articlesHtml .= '<div class="section">';
        $articlesHtml .= '<div class="section-title">이미지타입</div>';
        $articlesHtml .= '<div class="section-content">' . $parts['imgs'] . '</div>';
        $articlesHtml .= '</div>';

        $articlesHtml .= '</div>'; // .article
    }
} else {
    $articlesHtml = '게시글이 없습니다.';
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>글 내용 분리 예제</title>
    <style>
        .article { border: 2px solid #333; padding: 15px; margin: 20px; }
        .header { font-weight: bold; margin-bottom: 10px; }
        .section { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; }
        .section-title { background-color: #f0f0f0; padding: 5px; font-weight: bold; }
        .section-content { padding: 5px; }
    </style>
</head>
<body>
<?php echo $articlesHtml; ?>
</body>
</html>

