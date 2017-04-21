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

        $("#score_0,#score_1,#score_2,#score_3").keyup(function(){
          var score_0 =parseInt($("#score_0").val() || 0) ;
          var score_1 =parseInt($("#score_1").val() || 0);
          var score_2 =parseInt($("#score_2").val() || 0);
          var score_3 =parseInt($("#score_3").val() || 0);
          $("#total_1").val(score_0+score_1);
          $("#total_2").val(score_0+score_2);
          $("#total_3").val(score_0+score_3);
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
          <a class="navbar-brand" href="index.php">Recruit</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li ><a href="index.php">Home</a></li>
            <?php
                if (isset($_SESSION['id'])) {
            ?>
            <li ><a href="result.php">Result</a></li>
            <?php
                }
             ?>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <?php
                if (isset($_SESSION['id'])) {
            ?>
            <li><a href="logout.php"> Logout</a></li>
            <?
                } else {
             ?>
            <li><a href="login.php"> Login</a></li>
            <?  } // else if ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
