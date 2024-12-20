<!DOCTYPE html>
<html>

<head>
  <title>Customer Booking Information</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    .booking-info {
      width: 800px;
      padding: 20px;
      background-color: #f4f4f4;
      border-radius: 4px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .booking-info h2 {
      margin-bottom: 20px;
      text-align: center;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    
    th {
      background-color: #f2f2f2;
    }
    
    .assign-button {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }
    
    .assign-button a {
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 4px;
      padding: 10px 20px;
      font-size: 16px;
      text-decoration: none;
    }
    
    .assign-button a:hover {
      background-color: #555;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="booking-info">
      <h2>Booking Information</h2>
      <?php
      require "con1.php";

      $run = $con->query("SELECT * FROM customer");

      echo "<table>";
      echo "<tr>";
      echo "<th>Customer ID</th>";
      echo "<th>Pickup Place</th>";
      echo "<th>Drop Place</th>";
      echo "<th>Pickup Time</th>";
      echo "<th>Drop Time</th>";
      
      echo "</tr>";

      while ($row = $run->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['customer_id'] . "</td>";
        echo "<td>" . $row['pickup_place'] . "</td>";
        echo "<td>" . $row['drop_place'] . "</td>";
        echo "<td>" . $row['pickup_time'] . "</td>";
        echo "<td>" . $row['drop_time'] . "</td>";
        
        echo "</tr>";
      }

      echo "</table>";

      $con->close();
      ?>
      <div class="assign-button">
        <a href="ass.php">Assign</a>
      </div>
    </div>
  </div>
</body>

</html>
