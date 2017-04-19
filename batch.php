<?php

// include config and utils functions
include "inc/config.php";
include "inc/utils.php";

// insert member
// for ($i=6;$i<=103;$i++) {
//   $sql="INSERT INTO `member` (`id`, `name`) VALUES ('".$i."', 'name ".$i."');";
//   echo $sql;
// }

// insert member position
for ($i=5;$i<=103;$i++) {
  for ($j=1;$j<=3;$j++) {
    $sql="INSERT INTO `position_has_member` (`position_id`, `member_id`, `order`, `score`) VALUES ('0', '".$i."', '".$j."', NULL);";
    echo $sql;
  }

}
