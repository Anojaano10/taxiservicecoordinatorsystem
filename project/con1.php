<?php $con = new mysqli("localhost", "root", "", "project");

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>