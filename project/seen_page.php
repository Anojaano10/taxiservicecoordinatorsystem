<!DOCTYPE html>
<html>
<head>
<style>
  table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #DDD;
}

tr:hover {background-color: #D6EEEE;}

#y{
  position: absolute;
  top: 0;
  left: 0;
}
</style>
</head>
<body>
<br>
<br>
<?php
  session_start();
  if (!isset($_SESSION['Cusername'])) {
    // User is not logged in, redirect to the login page
    header('Location: login.php');
    exit();
  }
$con = new mysqli("localhost", "root", "", "project");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql =" SELECT * FROM customer where username='{$_SESSION['Cusername']}'";

$res = $con->query($sql);

if ($res->num_rows > 0) {
    echo "<table>";
    echo "<tr>
          <th>Customer ID</th>
          <th>Pickup Place</th>
          <th>Drop Place</th>
          <th>Pickup Time</th>
          <th>Pickup Date</th> 
         </tr>";

    while ($row = $res->fetch_assoc()) {
        echo "<tr>
              <td>" . $row['customer_id'] . "</td>
              <td>" . $row['pickup_place'] . "</td>
              <td>" . $row['drop_place'] . "</td>
              <td>" . $row['pickup_time'] . "</td>
              <td>" . $row['drop_time'] . "</td>
              </tr>";
    }
    echo "</table>";
} 
else
 {
    echo "No records have been booked with your ID number";
}
if (isset($_POST['logout'])) {
  // Destroy the session and redirect to the login page
  session_destroy();
  header('Location: login.php');
  exit();
}

if (isset($_POST['sub'])) {

  header('Location: delete.php');
  exit();
}
$con->close();
?>
<form method="post">
  <button name="logout" id="y">logout</button>
 <button name="sub">delete</button>
</form>
</body>
</html>
