<?php

// include config and utils functions
include "inc/config.php";
include "inc/utils.php";


// is authen ?
//isAuthen();

// include header
// include "inc/header.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>


    <!-- Bootstrap -->
    <link rel="stylesheet" href="style/font-awesome.min.css">

    <link rel="stylesheet" href="style/style.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- data table -->
    <link rel="stylesheet" type="text/css" href="style/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>

    <script>
      $(document).ready( function () {
        $('#data_table').DataTable({
          "lengthMenu": [ 25, 50, 100, 200 ],
          "columnDefs": [
              {
                  "targets": [ 2 ],
                  "searchable": false
              },
              {
                  "targets": [ 3 ],
                  "searchable": false
              },
              {
                  "targets": [ 4 ],
                  "searchable": false
              },
              {
                  "targets": [ 5 ],
                  "searchable": false
              }
          ],
          "order": [[ 0, "asc" ]],
          "language": {
              "lengthMenu": "Display _MENU_ records per page",
              "zeroRecords": "Nothing found - sorry",
              "info": "Showing page _PAGE_ of _PAGES_",
              "infoEmpty": "No records available",
              "infoFiltered": "(filtered from _MAX_ total records)"
          },
          stateSave: true
        });
      });
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="position.php">Position Edit</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li ><a href="position.php">Home</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
<!-- body -->

<?
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
  <input type="text" class="form-control" id="" placeholder="name" name="name" value="<?=$row['name'];?>" readonly required>
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
<?php
          $i++;
      }

?>
<button type="submit" class="btn btn-default btn-primary" name="submit">Update</button>
<?php
      } // while
    } // if get member by id
