<?php

// include config and utils functions
include "inc/config.php";
include "inc/utils.php";

// is authen ?
//isAuthen();

// include header
include "inc/header.php";

// load data from csv : output/calculated-score.

$filename = "output/calculated-score.csv";

if (file_exists($filename)) {
  if (filesize($filename)>1){
    ?>
    <div class="lastupdate">ข้อมูลวันที่ : <?=date("d F Y H:i:s", filemtime($filename)); ?></div>
    <?


?>

<table id="data_table_result" class="table">
  <thead>
    <tr>
      <th>ชื่อ</th>
      <th>ตำแหน่ง</th>
      <th>ลำดับที่เลือก</th>
    </tr>
  </thead>
  <tbody>
<?

$row = 1;
if (($handle = fopen($filename, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        ?>
        <tr>
        <?
        for ($c=0; $c < $num; $c++) {
            ?>
            <td>

            <?php
                // if $c=0 means name, $c=1 means position
                if ($c==0) {
                  // get name
                  $mem_id=$data[$c];
                  $result_mem=getMemberById($mem_id);
                  // fucking while T_T
                  while($row_mem = mysqli_fetch_array($result_mem)){
                    ?>
                    <img class="img-circle" width="36px" height="36px" src="img/<?=getImageProfile($mem_id); ?>">
                    <a href="score.php?id=<?=$mem_id;?>"><?=$row_mem['name'];?></a>
                    <?
                  }

                } else {
                  // get position
                  $pos_id=$data[$c];
                  $result_pos=getPositionNameById($pos_id);
                  echo $result_pos;
                }
            ?>
            </td>
            <?
        }
        ?>
        <td>
          <?=getMemberPosOrderById($pos_id,$mem_id);?>
        </td>
        </tr>
        <?

    }
    fclose($handle);
    ?>
    </tbody>
    <?
} else {
  alertMessage("Cannot read file output/calculated-score.csv or file not exist","danger");
}
}
}

?>
