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
        $id = $_POST["i2"];
        $name = $_POST["i1"];
        $driverAddress = $_POST["da"];
        $driverAge = $_POST["dage"];
        $salary = $_POST["salary"];
        $licenceNo = $_POST["ln"];
        $status = $_POST["driver_status"];
        $sql = "INSERT INTO driver (driver_id, driver_name, driver_address, driver_age, salary, licence_no, driver_status) VALUES ('$id', '$name', '$driverAddress', '$driverAge', '$salary', '$licenceNo', '$status')";
        $con->query($sql);

        // Redirect to prevent form resubmission
        header("Location: dr.php");
        exit();
    }
}

if (isset($_GET["driver_id"])) {
    $driverToDelete = $_GET["driver_id"];
    $sql = "DELETE FROM Driver WHERE driver_id='$driverToDelete'";

    if ($con->query($sql) === TRUE) {
        $deleteMessage = "Record deleted successfully.";
        echo "<script>alert('$deleteMessage');</script>";
    } else {
        $deleteMessage = "Error deleting record: " . $con->error;
        echo "<script>alert('$deleteMessage');</script>";
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
        <form method="post" action="dr.php">
            <h3>Add Driver</h3>
            <table>
                <tr>
                    <td><label for="driver_id">Id:</label></td>
                    <td><input type="text" name="i2" id="driver_id" required></td>
                </tr>
                <tr>
                    <td><label for="driver_name">Name:</label></td>
                    <td><input type="text" name="i1" id="driver_name" required></td>
                </tr>
                <tr>
                    <td><label for="driver_address">Address:</label></td>
                    <td><input type="text" name="da" id="driver_address" required></td>
                </tr>
                <tr>
                    <td><label for="driver_age">Age:</label></td>
                    <td><input type="number" name="dage" id="driver_age" required></td>
                </tr>
                <tr>
                    <td><label for="salary">Salary:</label></td>
                    <td><input type="number" name="salary" id="salary" required></td>
                </tr>
                <tr>
                    <td><label for="licence_no">License No:</label></td>
                    <td><input type="text" name="ln" id="licence_no" required></td>
                </tr>
                <tr>
                    <td><label for="driver_status">Status:</label></td>
                    <td><input type="text" name="driver_status" id="driver_status" required></td>
                </tr>
            </table>
            <input type="submit" name="sub" value="Submit">
        </form>
    </div>

    <hr>
    <div style="text-align: center;">
        <h3>Driver List</h3>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Age</th>
                <th>Salary</th>
                <th>License No</th>
                <th>status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php
            $qry = "SELECT * FROM driver";
            $run = $con->query($qry);
            while ($row = $run->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["driver_id"]; ?></td>
                    <td><?php echo $row["driver_name"]; ?></td>
                    <td><?php echo $row["driver_address"]; ?></td>
                    <td><?php echo $row["driver_age"]; ?></td>
                    <td><?php echo $row["salary"]; ?></td>
                    <td><?php echo $row["licence_no"]; ?></td>
                    <td><?php echo $row["driver_status"]; ?></td>
                    <td>
                        <a href="edr.php?driver_id=<?php echo $row['driver_id']; ?>">Edit</a>
                    </td>
                    <td>
                        <a href="dr.php?driver_id=<?php echo $row['driver_id']; ?>" class="delete-button">Delete</a>
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
<?php
$con->close();
?>
