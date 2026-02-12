<?php
header("Content-Type: text/html; charset=UTF-8");
include_once $_SERVER['DOCUMENT_ROOT'] . "/common/conf/dbconfig.inc.php";

/* --------------------------------------------------------------------------
   DB 연결 및 설정 (가벼운 설정 파일 사용)
-------------------------------------------------------------------------- */
$dblink = SetConn($_conf_db["main_db"]);
$tbl_log = $_conf_tbl["log"]["log"];

if (!$dblink) {
    die("DB Connection Error");
}

/* --------------------------------------------------------------------------
   기준일 계산 (전월 1일 기준, 그 이전 데이터 이관)
-------------------------------------------------------------------------- */
$thisMonthFirst = date('Y-m-01');
$dbKeepStartDate = date('Y-m-d', strtotime('-1 month', strtotime($thisMonthFirst)));
$cutOffDate = date('Y-m-d', strtotime('-1 day', strtotime($dbKeepStartDate)));

echo "Target Date: ~ " . $cutOffDate . "<br><hr>";

/* --------------------------------------------------------------------------
   메모리 초과 방지를 위한 '날짜별' 순차 처리 로직
   1. 이관 대상 날짜 목록만 먼저 조회 (DISTINCT)
   2. 각 날짜별로 SELECT -> JSON SAVE -> DELETE 반복
-------------------------------------------------------------------------- */
// 이관해야 할 날짜들만 중복 없이 가져옴
$dateSql = "SELECT DISTINCT LEFT(wdate, 10) as log_date 
            FROM {$tbl_log} 
            WHERE wdate <= '{$cutOffDate} 23:59:59' 
            ORDER BY log_date ASC";

$dateResult = mysqli_query($dblink, $dateSql);

$processCount = 0;

if ($dateResult) {
    while ($dateRow = mysqli_fetch_assoc($dateResult)) {
        $targetDate = $dateRow['log_date'];

        // 1. 해당 날짜 데이터 조회
        $sql = "SELECT * FROM {$tbl_log} 
                WHERE wdate >= '{$targetDate} 00:00:00' 
                  AND wdate <= '{$targetDate} 23:59:59'";
        $res = mysqli_query($dblink, $sql);

        $dayLogs = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $dayLogs[] = $row;
        }

        // 2. JSON 파일 저장
        if (count($dayLogs) > 0) {
            $year = substr($targetDate, 0, 4);
            $month = substr($targetDate, 5, 2);

            $dirPath = $_SERVER['DOCUMENT_ROOT'] . "/data/logs/{$year}/{$month}/";
            if (!is_dir($dirPath)) {
                mkdir($dirPath, 0777, true);
            }

            $filePath = $dirPath . "{$targetDate}.json";

            // 유니코드 지원 저장
            if (defined('JSON_UNESCAPED_UNICODE')) {
                $saveRes = file_put_contents($filePath, json_encode($dayLogs, JSON_UNESCAPED_UNICODE));
            } else {
                $saveRes = file_put_contents($filePath, json_encode($dayLogs));
            }

            // 3. 파일 저장 성공 시 DB 삭제 (해당 날짜만)
            if ($saveRes !== false) {
                $delSql = "DELETE FROM {$tbl_log} 
                           WHERE wdate >= '{$targetDate} 00:00:00' 
                             AND wdate <= '{$targetDate} 23:59:59'";
                mysqli_query($dblink, $delSql);

                echo "[OK] Archived: " . $targetDate . " (" . count($dayLogs) . " rows)<br>";
                $processCount++;

                // 스크립트 타임아웃 방지용 출력 버퍼 비우기
                flush();
            }
        }
    }
}

if ($processCount == 0) {
    echo "No data to archive.";
} else {
    echo "<hr>All Done.";
}

/* --------------------------------------------------------------------------
   DB 연결 해제
-------------------------------------------------------------------------- */
SetDisConn($dblink);
?>