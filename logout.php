<?php

// include config and utils functions
include "inc/config.php";
include "inc/utils.php";

// if session is set redirect to index
unset($_SESSION["id"]);
session_destroy();
urlRedirect("login.php");
die();
