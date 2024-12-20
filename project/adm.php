<?php
session_start(); // Start the session

// Check if the 'username' session variable is set
if (!isset($_SESSION['username'])) {
  // User is not logged in, redirect to the login page
  header('Location: admlog.php');
  exit();
}

// If the user clicks on the logout button
if (isset($_POST['logout'])) {
  // Destroy the session and redirect to the login page
  session_destroy();
  header('Location: admlog.php');
  exit();
}

$username = $_SESSION['username'];

require "con1.php";

$run = $con->query("SELECT COUNT(driver_id) AS no1 FROM driver");
$run2 = $con->query("SELECT COUNT(vehicle_type) AS no2 FROM vehicle");
$run3 = $con->query("SELECT COUNT(customer_id) AS no3 FROM booking");

$result = $run->fetch_assoc();
$result2 = $run2->fetch_assoc();
$result3 = $run3->fetch_assoc();

$count1 = $result['no1'];
$count2 = $result2['no2'];
$count3 = $result3['no3'];

$con->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    header {
      background-color: #333;
      color: #fff;
      padding: 10px;
      text-align: center;
    }
    
    nav {
      background-color: #f4f4f4;
      padding: 10px;
      text-align: center;
    }
    
    nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }
    
    nav ul li {
      display: inline-block;
      margin-right: 10px;
    }
    
    nav ul li a {
      display: block;
      padding: 10px;
      text-decoration: none;
      color: #333;
      background-color: #f4f4f4;
      border-radius: 4px;
      transition: background-color 0.3s;
    }
    
    nav ul li a:hover {
      background-color: #333;
      color: #fff;
    }
    
    .dashboard {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 20px;
    }
    
    .box {
      background-color:rgb(108, 105, 105);
      padding: 20px;
      margin: 10px;
      flex-basis: 30%;
      text-align: center;
      border-radius: 4px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .box h3 {
      margin-bottom: 10px;
    }
    
    .box p {
      font-size: 24px;
      font-weight: bold;
    }

    .logout-btn {
      position: absolute;
      top: 10px;
      left: 10px;
      padding: 5px 10px;
      background-color: #333;
      color: #fff;
      border-radius: 4px;
      text-decoration: none;
    }
  </style>
  <script>
  </script>
</head>
<body>
  <header>
    <h1>Admin Page</h1>
    <form method="post" action="">
      <button class="logout-btn" type="submit" name="logout">Logout</button>
    </form>
  </header>
  
  <nav>
    <ul>
      <li><a href="cust.php">Customers</a></li>
      <li><a href="dr.php">Drivers</a></li>
      <li><a href="vc.php">Vehicles</a></li>
      <li><a href="aj1.php">Booking</a></li>
    </ul>
  </nav>
  
  <div class="dashboard">
    <div class="box">
      <h3>Total ASSIGN BOOKINGS</h3>
      <p><?php echo $count3; ?></p>
    </div>
    <div class="box">
      <h3>Total Drivers</h3>
      <p><?php echo $count1; ?></p>
    </div>
    <div class="box">
      <h3>Total Vehicles</h3>
      <p><?php echo $count2; ?></p>
    </div>
  </div>
</body>
</html>
