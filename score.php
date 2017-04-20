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
    if ($_GET["score_0"]==null) $score_0="null"; else $score_0=$_GET["score_0"];
    if ($_GET["score_1"]==null) $score_1="null"; else $score_1=$_GET["score_1"];
    if ($_GET["score_2"]==null) $score_2="null"; else $score_2=$_GET["score_2"];
    if ($_GET["score_3"]==null) $score_3="null"; else $score_3=$_GET["score_3"];

    $result1=updateScoreMemberPosById($_GET["id"],$_GET["position_id1"],$score_1,$score_0,1);
    $result2=updateScoreMemberPosById($_GET["id"],$_GET["position_id2"],$score_2,$score_0,2);
    $result3=updateScoreMemberPosById($_GET["id"],$_GET["position_id3"],$score_3,$score_0,3);

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

<!-- name -->
<div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="profile image">
      <img width="128px" class="img-circle profile" src="img/<?=getImageProfile($_GET["id"]);?>">
    </div>
    <div class="profile name">
      <h1><?=$row['name'];?></h1>
    </div>
  </div>
</div>


<!-- row base score  -->
<div class="row">
<?php
      // list position
      $i=1;
      while($row_pos = mysqli_fetch_array($result_pos)){
        // first row render base score or score_0
        if ($i==1) {
?>
<!-- base score -->
<div class="form-group">
  <input type="number" class="form-control" id="score_0" placeholder="คะแนนคุณสมบัติทั่วไป" name="score_0" value="<?=$row_pos['base'];?>" min="0" max="35" step="1" required>
</div>
<?
        } // end if first row
?>

<!-- column position -->
<div class="col-sm-3 col-md-4 col-lg-4">
  <div class="rank">
    <input type="hidden" name="position_id<?=$i;?>" value="<?=$row_pos['position_id'];?>">
    <div class="form-group">
      <input type="number" class="form-control" id="score_<?=$i;?>" placeholder="คะแนนของตำแหน่งที่เลือก <?=$i;?>" name="score_<?=$i;?>" value="<?=$row_pos['score'];?>" min="0" max="65" step="1" required>
    </div>
  </div>
  <!-- position score -->
  <div class="">
    <div class="position-title">
      <h3><?=$i;?> : <?=getPositionNameById($row_pos['position_id']);?></h3>
    </div>
    <div class="rank">
      คะแนนรวมของผู้สมัคร ในตำแหน่งนี้ =
      <!-- total readonly inputbox -->
      <input type="number" id="total_<?=$i;?>" name="total_<?=$i;?>" value="<?=$row_pos['total'];?>" readonly>
      <!-- statitic -->
      <div class="well">
        <div class="row">ผู้สมัครตำแหน่งนี้ = <?=getTotalNumByPosId($row_pos['position_id']); ?></div>
        <div class="row">คะแนนสูงที่สุด = <?=getMaxScoreByPosId($row_pos['position_id']); ?></div>
        <div class="row">คะแนนต่ำที่สุด = <?=getMinScoreByPosId($row_pos['position_id']); ?></div>
      </div>
      <div class="well candidate">
        <div class="row">
          <h4>ผู้ได้คะแนนสูงที่สุด</h4>
        </div>
        <?php
            // get top 3 position by id
            $result_top_pos=getTop3PosById($row_pos['position_id']);
            if ($result_top_pos!=null) {
              // get position total
              $pos_total=getPositionTotalById($row_pos['position_id']);
              // list top pos
              $ii=1;
              while($row_top_pos = mysqli_fetch_array($result_top_pos)){
        ?>
        <div class="row">
          <div class="col-sm">
            <img class="img-circle" width="24px" src="img/<?=getImageProfile($row_top_pos['id']);?>"> <?=$row_top_pos['name'];?> = <?=$row_top_pos['total'];?>
          </div>
        </div>
        <?
                // check for cut score
                if ($ii==$pos_total) {
                  ?><hr><?
                } // cut score
                $ii++;

              } // while top pos
            } // end if top pos not null
        ?>
        </div>
      </div>
    </div>
  </div>
  <?php
            $i++;
        } // while list position

  ?>
</div>
<button type="submit" class="btn btn-default btn-primary pull-right" name="submit">Update</button>
</form>
<?php
      } // while member info
    } // if get member by id
?>
