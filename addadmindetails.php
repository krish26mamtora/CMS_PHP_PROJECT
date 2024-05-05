<?php
if(isset($_POST['adminperform1'])){
    $server="localhost";
$username="root";
$password="";
$dbname="cwh_project";
$con =mysqli_connect($server,$username,$password,$dbname);

if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
}
$name1 = $_POST['uname'];
$password = $_POST['password'];


$sql ="INSERT INTO `cwh_project`.`admin`(name, password) VALUES ('$name1','$password')";
  $result=mysqli_query($con,$sql);
}
?>