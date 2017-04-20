<?php

// include config and utils functions
include "inc/config.php";
include "inc/utils.php";

// is authen ?
isAuthen();

// include header
include "inc/header.php";


// load data from csv : output/calculated-score.csv

?>
<meta http-equiv="refresh" content="30">

<table id="data_table_result" class="table">
  <theader>
    <tr>
      <th>Name</th>
      <th>Position</th>
    </tr>
  </theader>
  <tbody>
<?

$row = 1;
if (($handle = fopen("output/calculated-score.csv", "r")) !== FALSE) {
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
                  $result_mem=getMemberById($data[$c]);
                  // fucking while T_T
                  while($row_mem = mysqli_fetch_array($result_mem)){
                    echo $row_mem['name'];
                  }

                } else {
                  // get position
                  $result_pos=getPositionNameById($data[$c]);
                  echo $result_pos;
                }
            ?>
            </td>
            <?
        }
        ?>
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


?>
