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
$allowed_tags = '<table><tr><td><th><tbody><thead><tfoot><br><pre>';

$_excel_cate = '';
switch ( $_REQUEST['boardid'] ) {
    default:
        $_excel_cate = '';
        break;
}

$i = 0;
foreach($arrBoardList['list'] as $key => $value){
    if ( $i != 0 ) {
        $_excel_content = strip_tags($value['contents'],$allowed_tags);
        // $_excel_content_v2 = preg_replace('/<(\w+)(\s+[^>]+)>/', '<$1>', $_excel_content);
        $_excel_content_v2 = preg_replace_callback(
            '/<(\w+)([^>]*?)>/',
            function ($matches) {
                $tag = $matches[1]; // 태그 이름
                $attributes = $matches[2]; // 태그 안의 속성들

                // class 속성 추출 (없을 경우 빈 문자열)
                preg_match('/class="([^"]+)"/', $attributes, $class_match);
                $class_attr = isset($class_match[0]) ? ' ' . $class_match[0] : '';

                // 최종적으로 태그에 class 속성만 추가
                return "<$tag$class_attr>";
            },
            $_excel_content
        );
        if ( $_REQUEST['boardid'] == 'hanpage' ) {
            $_excel_subject = '[한페이지] '.$value['subject'];
            $_excel_Rcontent = strip_tags($value['r_contents'],$allowed_tags);
            // $_excel_Rcontent_v2 = preg_replace('/<(\w+)(\s+[^>]+)>/', '<$1>', $_excel_Rcontent);

            $_excel_Rcontent_v2 = preg_replace_callback(
                '/<(\w+)([^>]*?)>/',
                function ($matches) {
                    $tag = $matches[1]; // 태그 이름
                    $attributes = $matches[2]; // 태그 안의 속성들

                    // class 속성 추출 (없을 경우 빈 문자열)
                    preg_match('/class="([^"]+)"/', $attributes, $class_match);
                    $class_attr = isset($class_match[0]) ? ' ' . $class_match[0] : '';

                    // 최종적으로 태그에 class 속성만 추가
                    return "<$tag$class_attr>";
                },
                $_excel_Rcontent
            );
            $_excel_content_v2 = '<h4 class="tag type1">상세질문</h4>'.$_excel_content_v2.'<br/><h4 class="tag type2">답변 내용</h4>'.$_excel_Rcontent_v2;

            switch ( $value['category'] ) {
                case '양도소득세':
                    $_excel_cate = 'CAPITAL_GAINS';
                    break;
                case '상속세':
                    $_excel_cate = 'INHERITANCE';
                    break;
                case '증여세':
                    $_excel_cate = 'GIFT';
                    break;
                case '지방세':
                    $_excel_cate = 'LOCAL';
                    break;
                case '종합부동산세':
                    $_excel_cate = 'COMPREHENSIVE_REAL_ESTATE';
                    break;
                case '소득세':
                    $_excel_cate = 'INCOME';
                    break;
                case '법인세':
                    $_excel_cate = 'CORPORATE';
                    break;
                case '부가가치세 및 수출입 세무':
                    $_excel_cate = 'VALUE_ADDED';
                    break;
                case '급여 및 4대보험':
                    $_excel_cate = 'SALARY_INSURANCE';
                    break;
                case '기장실무(회계)':
                    $_excel_cate = 'SALARY_INSURANCE';
                    break;
                case '국제조세(외투기업)':
                    $_excel_cate = 'ADJUSTMENT_INTERNATIONAL';
                    break;
                case '주식 업무':
                    $_excel_cate = 'STOCK';
                    break;
                case '(주택) 부동산 임대':
                    $_excel_cate = 'HOUSING';
                    break;
                case '공통업무':
                    $_excel_cate = 'NATIONAL_BASIC';
                    break;
                default:
                    $_excel_cate = $_excel_cate;
                    break;
            }
        } else {
            $_excel_subject = $value['subject'];
        }
        $rows[] = array(
            $value['idx'],
            $value['sidx'],
            date('Y-m-d', strtotime($value['wdate'])),
            $_excel_cate,
            $_excel_subject,
            '',
            $_excel_content_v2,
            '',
        '');
    }
    $i++;
}
$data = array_merge(array($headers), $rows);

$rowNumber = 1;
foreach ($data as $row) {
    $col = 'A';
    foreach ($row as $cell) {
        $sheet->setCellValue($col . $rowNumber, $cell);
        $sheet->getStyle($col . $rowNumber)->getAlignment()->setWrapText(true);
        $col++;
    }
    $rowNumber++;
}

// 브라우저로 엑셀 파일 다운로드
//$filename = iconv("UTF-8", "EUC-KR", "gpt 엑셀");
//
//header('Content-Type: application/vnd.ms-excel');
//header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
//header('Cache-Control: max-age=0');
//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//$objWriter->save('php://output');
//
//// 출력 버퍼 비우기 및 종료
//ob_end_clean();
//exit;

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
$i = 0;
foreach ($data as $key) {
    echo 'IDX:' . $key[0];
    echo '<br/>';
    echo 'SIDX:' . $key[1];
    echo '<br/>';
    echo 'DATE:' . $key[2];
    echo '<br/>';
    echo 'CATEGORY:' . $key[3];
    echo '<br/>';
    echo 'SUBJECT:' . $key[4];
    echo '<br/>';
    echo 'ENG_SUBJECT:' . $key[5];
    echo '<br/>';
    echo 'CONTENT:' . $key[6];
    echo '<br/>';
    echo 'ENG_CONTENT:';
    echo '<br/>';
    echo '<br/>';

    $i++;
}

?>