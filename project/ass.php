<?php
session_start(); // Start the session

// Check if the 'username' session variable is set
if (!isset($_SESSION['username'])) {
  // User is not logged in, redirect to the login page
  header('Location: admlog.php');
  exit();
}

// If the session variable is set, the user is logged in
// You can retrieve the username using $_SESSION['username']
$username = $_SESSION['username'];

// Rest of your code for the logged-in pages
// ...
?>







<!DOCTYPE html>
<html>

<head>
  <title>Assign Order</title>
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
    
    form {
      width: 300px;
      padding: 20px;
      background-color: #f4f4f4;
      border-radius: 4px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    label {
      display: block;
      margin-bottom: 10px;
    }
    
    input[type="text"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 10px;
    }
    
    input[type="submit"] {
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 4px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }
    
    input[type="submit"]:hover {
      background-color: #555;
    }
  </style>
</head>

<body>
  <div class="container">
    <form action="assign_order.php" method="post">
      <label for="customer_id">Customer ID:</label>
      <input type="text" id="customer_id" name="customer_id" required>
      <br>
      <label for="driver_id">Driver ID:</label>
      <input type="text" id="driver_id" name="driver_id" required>
      <br>
      <input type="submit" value="Assign Order">
    </form>
  </div>
</body>

</html>
