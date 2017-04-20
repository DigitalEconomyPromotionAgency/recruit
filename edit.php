<?php

// include config and utils functions
include "inc/config.php";
include "inc/utils.php";


// is authen ?
isAuthen();

// include header
include "inc/header.php";

// get submit value and update
if (isset($_GET["submit"])) {
    // get value and update
    //$result=updateMemberById($_GET["id"],$_GET["name"],$_GET["position_id1"],$_GET["position_id2"],$_GET["position_id3"],$_GET["score_1"],$_GET["score_2"],$_GET["score_3"]);
    $result1=updateMemberById($_GET["id"],$_GET["name"]);
    // fill null for null value
    // if ($_GET["score_1"]==null) $score_1="null"; else $score_1=$_GET["score_1"];
    // if ($_GET["score_2"]==null) $score_2="null"; else $score_2=$_GET["score_2"];
    // if ($_GET["score_3"]==null) $score_3="null"; else $score_3=$_GET["score_3"];
    $result2=updateMemberPosById($_GET["id"],$_GET["position_id1"],1);
    $result3=updateMemberPosById($_GET["id"],$_GET["position_id2"],2);
    $result4=updateMemberPosById($_GET["id"],$_GET["position_id3"],3);

    if ($result1 && $result2 && $result3 && $result4) {
      alertMessage("Update position complete","success");
    } else {
      alertMessage("Cannot update data, something went wrong, please turn debug=on for more infomation","danger");
    }

}

// get member by id fill in form
$result=getMemberById($_GET["id"]);
if ($result!=null) {
    while($row = mysqli_fetch_array($result)){
      // get member position
      $result_pos=getMemberPosById($_GET["id"]);
?>
<form method="get" action="edit.php">
<input type="hidden" name="id" value="<?=$_GET["id"];?>">
<div class="form-group">
  <label >Name</label>
  <input type="text" class="form-control" id="" placeholder="name" name="name" value="<?=$row['name'];?>" required>
</div>
<?php
      // list position
      $i=1;
      while($row_pos = mysqli_fetch_array($result_pos)){

?>
<div class="form-group">
  <label>Position <?=$i;?></label>
  <?php
      renderPositionSelect($row_pos['position_id'],"position_id".$i);
  ?>
</div>
<div class="form-group">
  <label>Score</label>
  <input type="number" class="form-control" id="" placeholder="score <?=$i;?>" name="score_<?=$i;?>" value="<?=$row_pos['score'];?>" <?=getScoreFieldState();?>>
</div>
<?php
          $i++;
      }

?>
<button type="submit" class="btn btn-default btn-primary" name="submit">Update</button>
<?php
      } // while
    } // if get member by id
