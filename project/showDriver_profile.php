<?php
session_start();
$id=$_SESSION["DuserName"];
// Check if the 'username' session variable is set
if (!isset($_SESSION["DuserName"])) {
  // User is not logged in, redirect to the login page
  header('Location: login.php');
  exit();
}
require "con1.php";
$query1= "SELECT driver_id,driver_name,driver_address,driver_age,salary,licence_no,driver_status FROM driver WHERE driver_id='{$_SESSION['DuserName']}'";
$result = $con->query($query1);
if($result->num_rows > 0) 
{

  $row = $result->fetch_assoc();  
  

  $driverid = $row["driver_id"];
  $name = $row["driver_name"];
  $ad = $row["driver_address"];
  $age = $row["driver_age"];
  $salary = $row["salary"];
  $license = $row["licence_no"];
  $staus = $row["driver_status"];

}

// Close database connection
$con->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show_profile</title>
    <style>
* {
  box-sizing: border-box;
  text-transform: capitalize;
}

label {
    display: inline-block;
    width: 150px;
    margin-bottom: 10px;
    font-weight: bold;
  }
  span {
    width: 200px;
    padding: 5px;
  }


#w1 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin-left:20%;
  margin-right:20%;
  margin-top:10%;
}
h2{
  margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
    color: black;
}
</style>
</head>
<body>

<section id="w1">
  <h2>My Profile</h2>

  <form action="update_profile.php" method="POST" >
    <label for="driverid">driverid :</label>
  <span class="c1"><?php echo $driverid; ?></span><br><br>
    <label for="name">Name :</label>
   <span class="c1"><?php echo $name;?></span><br><br>
    <label for="ad">address :</label>
   <span class="c1"> <?php echo $ad; ?></span><br><br>
    <label for="age">age :</label>
   <span class="c1"> <?php echo $age;?> </span><br><br>
    <label for="salary">salary Details :</label>
   <span class="c1"><?php echo $salary; ?></span><br><br>
    <label for="license">Drivers License :</label>
   <span class="c1"> <?php echo $license; ?></span><br><br>
    <label for="staus">staus :</label>
   <span class="c1"> <?php echo $staus; ?></span><br><br>
          
  </form>
</section>
</body>
</html>