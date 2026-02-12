<?
/*********************************** Ä®·»´Ù°ü¸® *************************************/
//Ä®·»´Ù µî·Ï
function insertCalendar(){
	$tbl = $GLOBALS["_conf_tbl"]["calendar"];

	$sql = "insert into ".$tbl." SET 
		b_subject= '".mysql_escape_string($_POST[b_subject])."',
		b_image= '".$filerename."',
		b_url= '".mysql_escape_string($_POST[b_url])."',
		b_target = '".mysql_escape_string($_POST[b_target])."',
		b_show = '".mysql_escape_string($_POST[b_show])."',
		b_sort = '".mysql_escape_string($_POST[b_sort])."',
		b_type = '".mysql_escape_string($_POST[b_type])."',
		b_date = now()
	";


	$rs = mysql_query($sql,$GLOBALS[dblink]);
	
	$total = mysql_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

//Ä®·»´Ù ¼öÁ¤
function updateCalendar($idx){
	$tbl = $GLOBALS["_conf_tbl"]["calendar"];

	$sql = "UPDATE ".$tbl." SET 
		b_subject= '".mysql_escape_string($_POST[b_subject])."',
		b_image= '".$filerename."',
		b_url= '".mysql_escape_string($_POST[b_url])."',
		b_target = '".mysql_escape_string($_POST[b_target])."',
		b_show = '".mysql_escape_string($_POST[b_show])."',
		b_sort = '".mysql_escape_string($_POST[b_sort])."',
		b_type = '".mysql_escape_string($_POST[b_type])."'
		WHERE idx = '$idx'
	";
	$rs = mysql_query($sql,$GLOBALS[dblink]);

	if($rs){
		return true;
	}else{
		return false;
	}
}


//Ä®·»´Ù »èÁ¦
function deleteCalendar($idx){
	$tbl = $GLOBALS["_conf_tbl"]["calendar"];

	$sql = "DELETE FROM ".$tbl." WHERE idx = '$idx' ";
	$rs = mysql_query($sql,$GLOBALS[dblink]);

	$total = mysql_affected_rows($GLOBALS[dblink]);

	if($total > 0){
		return true;
	}else{
		return false;
	}
}

function getCalendarList($yyyy, $mm){
	$tbl = $GLOBALS["_conf_tbl"]["calendar"];

    $sql = "SELECT * FROM ".$tbl." WHERE c_year='$yyyy' AND c_mm='$mm' ";

	$sql .= " order by idx asc ";

    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $total = mysql_num_rows($rs);

	//echo $sql;

    if($total > 0){
        $list['total'] = $total;
		    
        for($i=0; $i < $total; $i++){
            $list['list'][$i] = mysql_fetch_assoc($rs);
        }
    }else{
        $list['total'] = 0;
    }
    
    return $list;
}



function getCalendarLunar($start, $end){
	$tbl = $GLOBALS["_conf_tbl"]["calendar_data"];

    $sql = "SELECT cd_sy , cd_sm , cd_sd , cd_ly , cd_lm , cd_ld, cd_kweek, cd_sol_plan, cd_lun_plan, holiday FROM ".$tbl ;
	$sql.= " WHERE 
	concat( cd_sy, '-', cd_sm, '-', cd_sd ) >= '$start'
	AND concat( cd_sy, '-', cd_sm, '-', cd_sd ) <= '$end'
	";

	$sql.= " order by cd_no asc ";

    $rs = mysql_query($sql, $GLOBALS[dblink]);
    $total = mysql_num_rows($rs);

//echo $sql;

    if($total > 0){
        //$list['total'] = $total;
		    
        for($i=0; $i < $total; $i++){
			$row = mysql_fetch_assoc($rs);
            $list[$row[cd_sy]."-".$row[cd_sm]."-".$row[cd_sd]] = $row;
        }
    }else{
        $list = null;
    }
    
    return $list;
}
?>