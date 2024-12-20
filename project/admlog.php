<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['usertxt'];
  $password = $_POST['userpass'];

  // Perform your validation logic here
  if ($username === 'admin' && $password === 'admin123') {
    $_SESSION['username'] = $username; // Set session variable
    header('Location: adm.php'); // Redirect to admin page
    exit();
  } else {
    $error = 'Login failed. Please try again.'; // Error message
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <style>
    body {
      background-image: url('images/saa.JPG'); /* Set your image path here */
      background-size: cover;
            background-position: center;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f4f4f4;
    }
    
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    
    form {
      width: 300px;
      background-color: #fff;
      padding: 20px;
      border-radius: 4px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    label {
      display: block;
      margin-bottom: 10px;
      text-align: center;
    }
    
    input[type="text"],
    input[type="password"] {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      width: 200px;
      margin: 0 auto 10px auto;
      display: block;
      text-align: center;
    }
    
    button {
      padding: 10px 20px;
      background: linear-gradient(to right,rgb(241, 170, 15),rgb(55, 53, 37));

      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 200px;
      margin: 0 auto;
      display: block;
    }
    
    button:hover {
      background: linear-gradient(to right,rgb(96, 51, 20),rgb(89, 76, 25));
      transform: scale(1.02);
    }
  </style>
  <script>
    // JavaScript code here
  </script>
</head>
<body>
  <form method="POST">
    <h1>Login Page</h1>
    <?php if (isset($error)) { echo '<p>' . $error . '</p>'; } ?>
    <label for="usertxt">Username:</label>
    <input type="text" id="usertxt" name="usertxt" /><br />
    <label for="userpass">Password:</label>
    <input type="password" id="userpass" name="userpass" /><br />
    <button type="submit">Login</button>
  </form>
</body>
</html>
