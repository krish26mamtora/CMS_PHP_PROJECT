<?php
session_start();
include "partials/nav.php";
$server="localhost";
$username="root";
$password="";
$dbname="cwh_project";

$con = mysqli_connect($server, $username, $password, $dbname);

if(!$con){
    die("connection to this database failed due to " . mysqli_connect_error());
}

mysqli_close($con); // Close connection
?>
