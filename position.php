<?php

// include config and utils functions
include "inc/config.php";
include "inc/utils.php";


// is authen ?
//isAuthen();

// include header
//include "inc/header.php";

// show table header
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
<table id="data_table" class="order-column" width="100%">
  <thead>
    <tr>
      <th>ลำดับ</th>
      <th>ชื่อ</th>
      <th>ตำแหน่งที่เลือก 1</th>
      <th>ตำแหน่งที่เลือก 2</th>
      <th>ตำแหน่งที่เลือก 3</th>
      <th>สถานะ</th>
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

      <a href="edit.php?id=<?=$row['id'];?>"><button type="submit" class="fa fa-edit btn btn-primary " > Edit</button></a>

    </td>
  </tr>
<?php
  } // while
?>
</tbody>
</table>
