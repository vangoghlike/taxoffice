<?
header("Content-Type: text/html; charset=UTF-8");

ob_start();

$filename			= $_GET['filename'];
$orgfilename	= $_GET['orgfilename'];
$upfilefolder		= $_GET['upfilefolder'];
$dir					= $_SERVER['DOCUMENT_ROOT'].$upfilefolder."/";

$orgfilename = iconv('UTF-8', 'euc-kr', $orgfilename);

if (file_exists($dir.$filename)){

		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=$orgfilename");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: ".(string)(filesize($dir.$filename)));
		header("Cache-control: cache, must-revalidate");
		header("Pragma: no-cache");
		header("Expires: 0");

		$fp = fopen($dir.$filename, "rb");   //rb 읽기전용 바이러니 타입

		while(!feof($fp)){
			echo fread($fp, 100*1024);
		}

		fclose ($fp);
		flush();

}else{

		echo "<script>alert('존재하지 않는 파일입니다.');</script>";

}

?>