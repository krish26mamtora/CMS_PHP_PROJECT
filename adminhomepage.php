<?php
session_start();

$server="localhost";
$username="root";
$password="";
$dbname="cwh_project";

$con = mysqli_connect($server, $username, $password, $dbname);

if(!$con){
    die("connection to this database failed due to " . mysqli_connect_error());
}

echo $_SESSION['name'];
echo $_SESSION['role'];
echo ("hello");
    echo $role;
mysqli_close($con); // Close connection
?>
