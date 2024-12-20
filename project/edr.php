<?php
require "con1.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["sub"])) {
        $driverId = $_POST["driver_id"];
        $name = $_POST["i1"];
        $driverAddress = $_POST["da"];
        $driverAge = $_POST["dage"];
        $salary = $_POST["salary"];
        $licenceNo = $_POST["ln"];
        $status = $_POST["driver_status"];

        $sql = "UPDATE driver SET driver_name='$name', driver_address='$driverAddress', driver_age='$driverAge', salary='$salary', licence_no='$licenceNo', driver_status='$status' WHERE driver_id='$driverId'";
        $con->query($sql);
    }

    // Redirect to prevent form resubmission
    header("Location: dr.php");
    exit();
}

if (isset($_GET["driver_id"])) {
    $driverId = $_GET["driver_id"];
    $sql = "SELECT * FROM driver WHERE driver_id='$driverId'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
}
?>

<html>
<head>
    <style>
        body {
            background-color: #F5F5F5;
        }

        form {
            margin: 0 auto;
            width: 50%;
            background-color: white;
            padding: 20px;
            border: 1px solid #DDDDDD;
            border-radius: 5px;
        }

        h3 {
            color: white;
            background-color: #666666;
            padding: 10px;
        }

        table {
            width: 100%;
        }

        table td {
            padding: 8px;
        }

        table input {
            width: 100%;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div style="text-align: center;">
        <form method="post" action="edr.php">
            <h3>Edit Driver</h3>
            
            <table>
                <tr>
                    <td><label for="driver_id">Driver ID:</label></td>
                    <td><input type="text" name="driver_id" value="<?php echo isset($row['driver_id']) ? $row['driver_id'] : ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="driver_name">Name:</label></td>
                    <td><input type="text" name="i1" id="driver_name" value="<?php echo isset($row['driver_name']) ? $row['driver_name'] : ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="driver_address">Address:</label></td>
                    <td><input type="text" name="da" id="driver_address" value="<?php echo isset($row['driver_address']) ? $row['driver_address'] : ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="driver_age">Age:</label></td>
                    <td><input type="number" name="dage" id="driver_age" value="<?php echo isset($row['driver_age']) ? $row['driver_age'] : ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="salary">Salary:</label></td>
                    <td><input type="number" name="salary" id="salary" value="<?php echo isset($row['salary']) ? $row['salary'] : ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="licence_no">License No:</label></td>
                    <td><input type="text" name="ln" id="licence_no" value="<?php echo isset($row['licence_no']) ? $row['licence_no'] : ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="driver_status">Status:</label></td>
                    <td><input type="text" name="driver_status" id="driver_status" value="<?php echo isset($row['driver_status']) ? $row['driver_status'] : ''; ?>" required></td>
                </tr>
            </table>
            
            <br>
            <input type="submit" name="sub" value="Submit">
        </form>
    </div>
</body>
</html>

<?php
$con->close();
?>


