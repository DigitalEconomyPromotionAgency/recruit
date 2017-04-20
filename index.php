<?php

// include config and utils functions
include "inc/config.php";
include "inc/utils.php";


// is authen ?
isAuthen();

// include header
include "inc/header.php";

// show table header
?>

<table id="data_table" class="order-column" width="100%">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Position 1</th>
      <th>Position 2</th>
      <th>Position 3</th>
      <th>Status</th>
      <th></th>
    </tr>
  </thead>

<tbody>
<?php
  // get all member
  $result=getMembers();
  // list result
  while($row = mysqli_fetch_array($result)){
?>
  <tr>
    <td><?=$row['id'];?></td>
    <td><img class="img-circle" width="36px" height="36px" src="img/<?=getImageProfile($row['id']); ?>"> <?=$row['name'];?></td>
    <?php
          // get mem position by id
          $result_pos=getMemberPosById($row['id']);

          while($row_post = mysqli_fetch_array($result_pos)){
              $score=true;
              if ($row_post['score']!=null) {
                  $row_score=true;
              } else {
                  $row_score=false;
              }
              $score=$score && $row_score;
     ?>
    <td><?=getPositionNameById($row_post['position_id']); ?></td>
    <?php
          }
        // check row status if score_1 is noy null
        if ($score==false) {
    ?>
    <td><span class="label label-warning">Not Complete</span></td>
    <?php
  } else {
    ?>
    <td><span class="label label-success">Complete</span></td>
    <?php
  }
     ?>
    <td>
      <?php
        if ($pos_entry==true) {
      ?>
      <a href="edit.php?id=<?=$row['id'];?>"><button type="submit" class="fa fa-edit btn btn-primary " > Edit</button></a>
      <?php
        } // if pos entry
        if ($score_entry==true) {
       ?>
      <a href="score.php?id=<?=$row['id'];?>"><button type="submit" class="fa fa-star btn btn-success" > Score</button></a>
      <?php
        } // if score entry
      ?>
    </td>
  </tr>
<?php
  } // while
?>
</tbody>
</table>
