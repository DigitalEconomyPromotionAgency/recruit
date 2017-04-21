<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "recruitdbv5";
$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_errno) {
    error_log("Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error);
} else {
    // set name for utf8 content
    mysqli_query($conn,"SET NAMES UTF8");
}

$score_readonly=true;
$position_readonly=true;

// turn on/off position edit and score edit
$score_entry=true;

// turn on/off score edit
$pos_entry=false;

// trun debug on/off
$debug=false;


error_reporting(E_ERROR | E_WARNING | E_PARSE);

ob_start();
session_start();
