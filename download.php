<?php

// include config and utils functions
include "inc/config.php";
include "inc/utils.php";

date_default_timezone_set('Asia/Bangkok');


header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=data_".date("Ymdhis").".csv");
header("Pragma: no-cache");
header("Expires: 0");

// count number position
$result_pos=getAllPosition();
$total_pos=mysqli_num_rows($result_pos);
echo $total_pos."\n";
// list pos : pos_id,total
while($row_pos = mysqli_fetch_array($result_pos)){
    echo $row_pos['id'].",".$row_pos['total']."\n";
}

// count member position
echo getTotalMemberPos(),"\n";
// list member position : mem_id,pos_1,pos_2,pos_3
$result_mempos=getListMemberPos();
while($row_mempos = mysqli_fetch_array($result_mempos)){
    $posstr=$row_mempos['member_id'].",";
        $result_mem_pos=getMemberPosScoreById($row_mempos['member_id']);
        while($row_mem_pos = mysqli_fetch_array($result_mem_pos)){
          $posstr=$posstr.$row_mem_pos['position_id'].",";
        }
    echo substr($posstr ,0, strlen($posstr)-1),"\n";
}
// list member position score : mem_id,score_1,score_2,score_3
$result_mempos=getListMemberPos();
while($row_mempos = mysqli_fetch_array($result_mempos)){
    $posstr=$row_mempos['member_id'].",";
        $result_mem_pos=getMemberPosScoreById($row_mempos['member_id']);
        while($row_mem_pos = mysqli_fetch_array($result_mem_pos)){
          $posstr=$posstr.$row_mem_pos['score'].",";
        }
    echo substr($posstr ,0, strlen($posstr)-1),"\n";
}
