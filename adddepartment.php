<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Department Form</title>
</head>
<body>

<h2>Enter Department Name</h2>

<form action="adddepartment.php" method="POST">
  <label for="department_name">Department Name:</label><br>
  <input type="text" id="department_name" name="department_name"><br><br>
  <button type='submit' name='submit'>Add</button>
</form>

</body>
</html>


<?php
// Check if the form is submitted
if (isset($_POST['submit'])) {

    $link = mysqli_connect("localhost", "root", "", "cwh_project");
 
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $department_name=$_POST['department_name'];
  
$sql = "INSERT INTO add_department ( department) VALUES ( '$department_name')";

    if(mysqli_query($link, $sql)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
     
    // Close connection
    mysqli_close($link);
    
}

?>