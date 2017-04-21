<?php

// db query
function db_query_result($sql){
  global $conn,$debug;
  if ($debug==true) {
    echo "<pre>".$sql."</pre>";
  }
  if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
      // return result
      return $result;
    } else {
      // return null
      return null;
    }
  } else {
    // return null
    return null;
  }
}

function db_query($sql){
  global $conn,$debug;
  if ($debug==true) {
    echo "<pre>".$sql."</pre>";
  }
  return $conn->query($sql);
}


// get total of member position
// TODO : score over xx point
function getTotalMemberPos(){
  $sql="SELECT * FROM `position_has_member` WHERE score!='null' GROUP BY `member_id` ORDER BY `member_id` ASC";
  $result=db_query_result($sql);
  if ($result!=null) {
    return mysqli_num_rows($result);
  } else {
    return "0";
  }
}

// get list member position
// TODO : score over xx point
function getListMemberPos(){
  $sql="SELECT * FROM `position_has_member` WHERE score!='null' GROUP BY `member_id` ORDER BY `member_id` ASC";
  return db_query_result($sql);
}

// get pos by mem_id and order
function getMemberPosScoreById($id){
  $sql="SELECT * FROM `position_has_member` WHERE `member_id` = ".$id." ORDER BY `position_has_member`.`order` ASC";
  return db_query_result($sql);
}

// get pos by mem_id and order
function getMemberPosOrderById($pos_id,$mem_id){
  $sql="SELECT `order` FROM `position_has_member` WHERE member_id=".$mem_id." AND position_id=".$pos_id;
  $result=db_query_result($sql);
  if ($result!=null) {
    while($row = mysqli_fetch_array($result)){
        return $row['order'];
    }
  } else {
    return "0";
  }
}


// get all position
function getAllPosition() {
  $sql="SELECT * FROM position WHERE total > 0";
  return db_query_result($sql);
}

// get top 3 position by id
// TODO : total over xx point
function getTop3PosById($pos_id){
  $sql="SELECT * FROM member,position_has_member
            WHERE position_id = ".$pos_id."
                AND position_has_member.total!='null'
                AND member.id=position_has_member.member_id
            ORDER BY score DESC LIMIT 5";
  return db_query_result($sql);
}

// get total  by select position
function getTotalNumByPosId($pos_id){
  $sql="SELECT count(*) as total FROM `position_has_member` WHERE `position_id` = ".$pos_id;
  $result=db_query_result($sql);
  if ($result!=null) {
    while($row = mysqli_fetch_array($result)){
        return $row['total'];
    }
  } else {
    return "0";
  }
}

function getMaxScoreByPosId($pos_id) {
  $sql="SELECT MAX(total) as max FROM `position_has_member` WHERE `position_id` = ".$pos_id;
  $result=db_query_result($sql);
  if ($result!=null) {
    while($row = mysqli_fetch_array($result)){
        return $row['max'];
    }
  } else {
    return "0";
  }
}

function getMinScoreByPosId($pos_id) {
  $sql="SELECT MIN(total) as min FROM `position_has_member` WHERE `position_id` = ".$pos_id;
  $result=db_query_result($sql);
  if ($result!=null) {
    while($row = mysqli_fetch_array($result)){
        return $row['min'];
    }
  } else {
    return "0";
  }
}


// get position name by id
function getPositionNameById($id) {
  $sql="SELECT title FROM position WHERE id=".$id." LIMIT 1";
  $result=db_query_result($sql);
  if ($result!=null) {
    while($row = mysqli_fetch_array($result)){
        return $row['title'];
    }
  } else {
    return "?";
  }
}

// get position total by id
function getPositionTotalById($id) {
  $sql="SELECT total FROM position WHERE id=".$id." LIMIT 1";
  $result=db_query_result($sql);
  if ($result!=null) {
    while($row = mysqli_fetch_array($result)){
        return $row['total'];
    }
  } else {
    return "0";
  }
}

// get image profile if not exist eq 0.png
function getImageProfile($id) {
  $result=file_exists("img/".$id.".png");
  if ($result==false) {
    $file="0.png";
    return $file;
  } else {
    $file=$id.".png";
    return $file;
  }
}

function renderPositionSelect($select,$name){
  $sql="SELECT * FROM position WHERE total > 0 ORDER BY id ASC";
  $result=db_query_result($sql);
  ?>
  <select name="<?=$name?>" size="5" >
  <?
    if ($result!=null) {
      while($row = mysqli_fetch_array($result)){
        if ($select==$row['id']) {
          $selected="selected";
        } else {
          $selected="";
        }
  ?>
      <option value="<?=$row['id'];?>" <?=$selected;?>><?=$row['title']?></option>
  <?
      }
    }
  ?>
  </select>
  <?

}

function getScoreFieldState(){
  global $score_readonly;
  if ($score_readonly==true) {
    return "readonly";
  } else {
    return "";
  }
}


function getPositionFieldState(){
  global $position_readonly;
  if ($position_readonly==true) {
    return "readonly";
  } else {
    return "";
  }
}


function getMemberPosById($memid){
    $sql="SELECT member.id,position_has_member.position_id,position.title,position_has_member.order,position_has_member.score,position_has_member.base,position_has_member.total
              FROM member,position,position_has_member
              WHERE member.id=position_has_member.member_id
              AND member.id=position_has_member.member_id
              AND position.id=position_has_member.position_id
              AND member.id=".$memid."
              ORDER BY position_has_member.order ASC";
    return db_query_result($sql);
}

// update member by id : id, pos, score, order
function updateMemberPosById($mem_id, $pos_id, $order){
    global $conn;
    $sql="UPDATE `position_has_member` SET `position_id` = '".$pos_id."'
            WHERE `position_has_member`.`member_id` = ".$mem_id."
                AND `position_has_member`.`order` = ".$order;
    return db_query($sql);
}

// update member pos score by id
function updateScoreMemberPosById($mem_id, $pos_id, $score, $base, $order){
  global $conn;
  // sum total
  $total=$score+$base;
  $sql="UPDATE `position_has_member` SET  `score` = ".$score.", `base` = ".$base.", `total` = ".$total."
          WHERE `position_has_member`.`member_id` = ".$mem_id."
              AND `position_has_member`.`order` = ".$order."
              AND `position_id` = '".$pos_id."'";
  return db_query($sql);
}

// update member by id
function updateMemberById($id,$name){
    global $conn;
    $sql="UPDATE member SET name = '".$name."' WHERE id = ".$id;
    return db_query($sql);
}

// get member by id
function getMemberById($id){
  $sql="SELECT * FROM member WHERE id=".$id." LIMIT 1";
  return db_query_result($sql);
}


// list all member
function getMembers(){
  $sql="SELECT member.id,member.name
          FROM member,position,position_has_member
          WHERE member.id=position_has_member.member_id
          AND member.id=position_has_member.member_id
          AND position.id=position_has_member.position_id
          GROUP BY member.id";
  return db_query_result($sql);
}

// list member only score_1 == 0
function getMemberNotScore(){
  $sql="SELECT * FROM member WHERE score_1=0 ORDER BY id ASC";
  return db_query_result($sql);
}

// check authentication
function isAuthen() {
    if (!isset($_SESSION["id"])) {
        urlRedirect("login.php");
        die();
    } else {
        return true;
    }
}

// redirect url
function urlRedirect($url) {
  header('Location: '.$url);
}

//  authentication
function getAuthen($login,$password) {
    $sql="SELECT *
            FROM authen
            WHERE login = '".$login."'
            AND password = '".md5($password)."'
            LIMIT 1";
    $result=db_query_result($sql);
    if ($result!=null) {
        while($row = mysqli_fetch_array($result)){
            $session_id=$row['id'];
        }
        return $session_id;
    } else {
        return null;
    }
}

// info, error, seccess
function alertMessage($message,$type) {
  if ($type=="info") {
      ?>
<div class="alert alert-info"><strong>Success!</strong> <?=$message; ?>.</div>
      <?
  } else if ($type=="error")  {
    ?>
<div class="alert alert-danger"><strong>Success!</strong> <?=$message; ?>.</div>
    <?
  } else if ($type=="success")  {
    ?>
<div class="alert alert-success"><strong>Success!</strong> <?=$message; ?>.</div>
    <?
  }
}
