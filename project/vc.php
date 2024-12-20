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





<?php
require "con1.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["sub"])) {
        $name = $_POST["i1"];
        $vehicleType = $_POST["vt"];
        $plateNumber = $_POST["pn"];
        $vehicleModel = $_POST["vm"];
        $sql = "INSERT INTO Vehicle (vehicle_name, vehicle_type, plate_number, vehicle_model) VALUES ('$name', '$vehicleType', '$plateNumber', '$vehicleModel')";
        $con->query($sql);

        // Redirect to prevent form resubmission
        header("Location: vc.php");
        exit();
    }
}

if (isset($_GET["i1"])) {
    $nameToDelete = $_GET["i1"];
    $sql = "DELETE FROM Vehicle WHERE vehicle_name='$nameToDelete'";

    if ($con->query($sql) === TRUE) {
        $deleteMessage = "Record deleted successfully.";
    } else {
        $deleteMessage = "Error deleting record: " . $con->error;
    }
}
?>

<html>
<head>
    <style>
        body {
            background-color: #F5F5F5; /* Ash background color */
        }

        form, table {
            margin: 0 auto; /* Center the form and table horizontally */
            width: 50%; /* Set the width of the form and table */
            background-color: white; /* White background color */
            padding: 20px; /* Add padding around the form and table */
            border: 1px solid #DDDDDD; /* Add a border to the form and table */
            border-radius: 5px; /* Add border radius to the form and table */
        }

        th {
            background-color: #CCCCCC; /* Gray background color for table header */
        }

        td, th {
            padding: 10px; /* Add padding to table cells */
        }

        a {
            text-decoration: none; /* Remove underline from links */
            color: blue; /* Change link color to blue */
        }

        h3 {
            color: white; /* Change text color to white */
            background-color: #666666; /* Gray background color for heading */
            padding: 10px; /* Add padding to heading */
        }

        .delete-button {
            color: white;
            background-color: red;
            padding: 5px 10px;
            border-radius: 3px;
        }

        .delete-message {
            color: red; /* Display delete message in red */
        }
    </style>
</head>
<body>
    <div style="text-align: center;">
    <form method="post" action="vc.php" id="userForm">
    <h3>Add Vehicle</h3>
    <table>
        <tr>
            <td><label for="name">Name:</label></td>
            <td><input type="text" name="i1" id="vehicle_name" required></td>
        </tr>
        <tr>
            <td><label for="vehicle_type">Vehicle Type:</label></td>
            <td><input type="text" name="vt" id="vehicle_type" required></td>
        </tr>
        <tr>
            <td><label for="plate_number">Plate Number:</label></td>
            <td><input type="text" name="pn" id="plate_number" required></td>
        </tr>
        <tr>
            <td><label for="vehicle_model">Vehicle Model:</label></td>
            <td><input type="text" name="vm" id="vehicle_model" required></td>
        </tr>
    </table>
    <input type="submit" name="sub" value="Submit">
</form>   </div>

    <hr>
    <div style="text-align: center;">
        <h3>Vehicle List</h3>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Vehicle Type</th>
                <th>Plate Number</th>
                <th>Vehicle Model</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php
            $qry = "SELECT * FROM Vehicle";
            $run = $con->query($qry);
            while ($row = $run->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["vehicle_name"]; ?></td>
                    <td><?php echo $row["vehicle_type"]; ?></td>
                    <td><?php echo $row["plate_number"]; ?></td>
                    <td><?php echo $row["vehicle_model"]; ?></td>
                    <td>
                        <a href="edit1.php?i1=<?php echo $row['vehicle_name']; ?>">Edit</a>
                    </td>
                    <td>
                        <a href="vc.php?i1=<?php echo $row['vehicle_name']; ?>" class="delete-button">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <?php
        if (isset($deleteMessage)) {
            echo '<p class="delete-message">' . $deleteMessage . '</p>';
        }
        ?>
    </div>
</body>
</html>
