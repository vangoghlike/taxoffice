<?php
/* --------------------------------------------------------------------------
   [로그 조회 하이브리드 함수]
   - 파라미터로 전달받은 DB 연결($dblink)을 사용하여 조회
   - 기준일 이전은 파일 시스템, 이후는 DB에서 조회
-------------------------------------------------------------------------- */
function getLogData($searchDate, $dblink, $tbl_log_name) {
    $data = [];

    // DB 보존 기준일 계산
    $thisMonthFirst = date('Y-m-01');
    $dbKeepStartDate = date('Y-m-d', strtotime('-1 month', strtotime($thisMonthFirst)));

    if ($searchDate < $dbKeepStartDate) {
        // [파일 조회]
        $year = substr($searchDate, 0, 4);
        $month = substr($searchDate, 5, 2);
        $filePath = $_SERVER['DOCUMENT_ROOT'] . "/data/logs/{$year}/{$month}/{$searchDate}.json";

        if (file_exists($filePath)) {
            $jsonContent = file_get_contents($filePath);
            $data = json_decode($jsonContent, true);
        }
    } else {
        // [DB 조회]
        $sql = "SELECT * FROM {$tbl_log_name} WHERE wdate LIKE '{$searchDate}%' ORDER BY wdate DESC";
        $result = mysqli_query($dblink, $sql);
        if($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
    }

    return $data;
}
?>