<?php
if(isset($_POST['managerperform1'])){
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
$department = $_POST['department'];

$sql ="INSERT INTO `cwh_project`.`manager`(name, password, department) VALUES ('$name1','$password','$department')";
  $result=mysqli_query($con,$sql);
}
?>