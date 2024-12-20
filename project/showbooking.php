
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trip assign details</title>
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
</style>
</head>
<body>

        <h2>Trip Assignments</h2><br><br>
        <table>
          <thead>
            <tr>
              <th>Pickup Location</th>
              <th>Drop-off Location</th>
              <th>pickup_time</th>
              <th>drop_time</th>
              <th>customer_id</th>
            </tr>
          </thead>
          <tbody>
          <?php
session_start();
if (!isset($_SESSION["DuserName"])) {
  // User is not logged in, redirect to the login page
  header('Location: login.php');
  exit();
}

require "con1.php";
$id=$_SESSION["DuserName"];

$query = "SELECT * FROM booking WHERE driver_id='{$_SESSION['DuserName']}'";
$result2 = $con->query($query);
if($result2->num_rows > 0) {

while ($row = $result2->fetch_assoc()){
echo"<tr>
                  <td>".$row["pickup_place"]."</td>
                  <td>".$row["drop_place"]."</td>
                  <td>".  $row["pickup_time"]."</td>
                  <td>". $row['drop_time']."</td>
                  <td>".$row["customer_id"]."</td>
                </tr>";
}
}
// Close database connection
$con->close();
?>
             
          </tbody>
        </table>
   
        
    
</body>
</html>