<?php

// include config and utils functions
include "inc/config.php";
require "inc/utils.php";

// include header
include "inc/header.php";

// if session is set redirect to index
if (isset($_SESSION["id"])) {
  urlRedirect("index.php");
  die();
}

// check login after submit

if (isset($_POST["submit"])) {
  $result=getAuthen($_POST["login"],$_POST["password"]);
  if ($result!=null) {
    $_SESSION['id']=$result;
    urlRedirect("index.php");
    die();
  } else {
    errorMessage("Cannot login, please try again.");
  }
}

// login form here
?>
<form class="form-inline" action="login.php" method="post">
    <div class="form-group">
        <label for="">Login</label>
        <input type="text" name="login" id="login" class="form-control" placeholder="username">
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="password">
    </div>
    <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
</form>
