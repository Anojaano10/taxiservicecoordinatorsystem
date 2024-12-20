<?php
session_start();
if (!isset($_SESSION["DuserName"])) {
  // User is not logged in, redirect to the login page
  header('Location: login.php');
  exit();
}
require "con1.php";


$sql = $con->query("SELECT COUNT(customer_id) AS no1 FROM booking where driver_id='{$_SESSION['DuserName']}'");
$result = $sql->fetch_assoc();
$result2 = $sql->fetch_assoc();

$count1 = $result['no1'];
if (isset($_POST['logout'])) {
  // Destroy the session and redirect to the login page
  session_destroy();
  header('Location: login.php');
  exit();
}

// Close database connection
$con->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Driver Dashboard</title>
    <style>
      body {
        font-family:sans-serif;
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
        font-weight: bold;
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
      nav ul li a:hover{
        color: red;
      }
      a:active {
  background-color: yellow;
}
      
      .box {
        background-color: #f4f4f4;
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
        top: 30px;
        left: 15px;
        padding: 5px 10px;
        background-color: #333;
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
      }
  
  footer {
    background-color: #333; /* Background color of the footer */
    color: #fff; /* Font color of the footer */
    padding: 20px; /* Padding around the footer content */
    text-align: center; /* Center-align the footer text */
    position: absolute; /* Position the footer at the bottom of the page */
    bottom: 0; 
  width:97.4%;
  }
 
    </style>
   
  </head>
  <body>
    <header>
      <nav>
        <ul >
          <li><a href="" onclick="hide(); return false;">Dashboard</a></li>
          <li><a href="showDriver_profile.php" id="i2">My Profile</a></li>
          <li><a href="showbooking.php" id="i3">Trip Assignments</a></li>
        </ul>
      </nav>
      <form method="post" action="">
        <button class="logout-btn" type="submit" name="logout">Logout</button>
      </form>
    </header>
    <main id="k1" style="display: none;">
    <h1>Welcome to the Driver Dashboard</h1>
      <div class="box">
        <h3>Total ASSIGN BOOKINGS</h3>
        <p><?php echo $count1; ?></p>
      </div>
      <div class="box">
        <h3>Total customer</h3>
        <p><?php echo $count1; ?></p>
      </div>
    </main>
    <footer >
      <p>&copy; 2021 Driver Dashboard</p>
    </footer>
 <script>
  var main=document.getElementById("k1");
 
  function hide() {
  if (main.style.display === "none") {
    main.style.display = "block";
  } else {
    main.style.display = "none";
  }
}
</script>
  </body>
</html>
