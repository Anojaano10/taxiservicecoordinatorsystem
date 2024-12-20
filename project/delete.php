<!DOCTYPE html>
<html>
<body>
<?php
 session_start();
 if (!isset($_SESSION['Cusername'])) {
    // User is not logged in, redirect to the login page
    header('Location: login.php');
    exit();
  }
    $con = new mysqli("localhost", "root", "", "project");
        if ($con->connect_error) 
        {
          die("Error: " . $con->connect_error);
        }

    $sql = "DELETE FROM customer WHERE username='{$_SESSION['Cusername']}'";
        if ($con->query($sql)) {
            echo "Delete successful";
        } 
        else 
        {
            echo "Error: " . $con->error;
        }

    $con->close();
?>
</body>
</html>
