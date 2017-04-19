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
    // update score

    if ($_GET["score_1"]==null) $score_1="null"; else $score_1=$_GET["score_1"];
    if ($_GET["score_2"]==null) $score_2="null"; else $score_2=$_GET["score_2"];
    if ($_GET["score_3"]==null) $score_3="null"; else $score_3=$_GET["score_3"];
    $result1=updateScoreMemberPosById($_GET["id"],$_GET["position_id1"],$score_1,1);
    $result2=updateScoreMemberPosById($_GET["id"],$_GET["position_id2"],$score_2,2);
    $result3=updateScoreMemberPosById($_GET["id"],$_GET["position_id3"],$score_3,3);

    if ($result1 && $result2 && $result3) {
      alertMessage("Update score complete","success");
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
<form method="get" action="score.php">
<input type="hidden" name="id" value="<?=$_GET["id"];?>">
<div class="row">
  <div class="col-12">
    <img width="128px" class="img-circle" src="img/<?=getImageProfile($_GET["id"]);?>"> <h2><?=$row['name'];?></h2>
  </div>
</div>
<div class="row">
<?php
      // list position
      $i=1;
      while($row_pos = mysqli_fetch_array($result_pos)){
?>
<div class="col-sm-3 col-md-4 col-lg-4">
  <h2><?=$i;?> : <?=getPositionNameById($row_pos['position_id']);?></h2>
  <input type="hidden" name="position_id<?=$i;?>" value="<?=$row_pos['position_id'];?>">
  <div class="form-group">
    <input type="number" class="form-control" id="" placeholder="score <?=$i;?>" name="score_<?=$i;?>" value="<?=$row_pos['score'];?>" min="0" max="1000" step="1" required>
    <p class="help-block">Help text here.</p>
  </div>
  <div class="well">
    <div class="row"><h4>Statistic </h4></div>
    <div class="row">Total = <?=getTotalNumByPosId($row_pos['position_id']); ?></div>
    <div class="row">Max = <?=getMaxScoreByPosId($row_pos['position_id']); ?></div>
    <div class="row">Min = <?=getMinScoreByPosId($row_pos['position_id']); ?></div>
  </div>
  <div class="well">
    <div class="row"><h4>Top score </h4></div>
    <?php
        // get top 3 position by id
        $result_top_pos=getTop3PosById($row_pos['position_id']);
        if ($result_top_pos!=null) {
          // list top pos
          while($row_top_pos = mysqli_fetch_array($result_top_pos)){
    ?>
    <div class="row">
        <div class="col-sm"><img class="img-circle" width="24px" src="img/<?=getImageProfile($row_top_pos['id']);?>"> <?=$row_top_pos['name'];?> = <?=$row_top_pos['score'];?></div>
    </div>
    <?
          }
        }
    ?>
  </div>
</div>
<?php
          $i++;
      }

?>
</div>
<button type="submit" class="btn btn-default btn-primary" name="submit">Update</button>
</form>
<?php
      } // while
    } // if get member by id
