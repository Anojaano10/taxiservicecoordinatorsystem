<?php
require "con1.php";

// Retrieve the values from the form
$customer_id = $_POST['customer_id'];
$driver_id = $_POST['driver_id'];

// Prepare the SQL query
$query = "INSERT INTO booking (customer_id, pickup_place, drop_place, pickup_time, drop_time, driver_id) 
          SELECT $customer_id, pickup_place, drop_place, pickup_time, drop_time, '$driver_id'
          FROM customer
          WHERE customer_id = $customer_id";

// Execute the query
if ($con->query($query) === TRUE) {
    header('Location: aj1.php');
    
    // Update the driver status
    $updateQuery = "UPDATE driver SET driver_status = 'Active' WHERE driver_id = '$driver_id'";

    // Execute the update query
    if ($con->query($updateQuery) === TRUE) {
        echo "<script>alert(Driver status updated successfully.)</script>";
    } else {
        echo "<script>alert(Error updating driver status:)</script>" . $con->error;
    }
} else {
    echo "Error assigning order: " . $con->error;
}

// Close the database connection
$con->close();
?>
