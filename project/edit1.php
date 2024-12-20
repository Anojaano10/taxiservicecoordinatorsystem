<?php
require "con1.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["new_name"])) {
    $nameToEdit = $_POST["new_name"];
    $newName = $_POST["new_name"];
    $newVehicleType = $_POST["new_vehicle_type"];
    $newPlateNumber = $_POST["new_plate_number"];
    $newVehicleModel = $_POST["new_vehicle_model"];

    $sql = "UPDATE Vehicle SET vehicle_name='$newName', vehicle_type='$newVehicleType', plate_number='$newPlateNumber', vehicle_model='$newVehicleModel' WHERE vehicle_name='$nameToEdit'";
    
    if ($con->query($sql) === TRUE) {
        // Redirect back to vc.php after successful update
        header("Location: vc.php");
        exit();
    } else {
        echo "Error updating record: " . $con->error;
    }
} 

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["i1"])) {
    $nameToEdit = $_GET["i1"];
    $sql = "SELECT * FROM Vehicle WHERE vehicle_name='$nameToEdit'";
    $result = $con->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Display a form with the existing data pre-filled for editing
        ?>
        <style>
            .form-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            
            form {
                background-color: #f2f2f2;
                padding: 20px;
                border-radius: 5px;
            }
            
            input[type="text"],
            input[type="submit"] {
                padding: 10px;
                margin-bottom: 10px;
                width: 100%;
            }
        </style>
        
        <div class="form-container">
            <form method="post" action="update1.php">
                Name: <input type="text" name="new_name" value="<?php echo $row['vehicle_name']; ?>" required><br>
                Vehicle Type: <input type="text" name="new_vehicle_type" value="<?php echo $row['vehicle_type']; ?>" required><br>
                Plate Number: <input type="text" name="new_plate_number" value="<?php echo $row['plate_number']; ?>" required><br>
                Vehicle Model: <input type="text" name="new_vehicle_model" value="<?php echo $row['vehicle_model']; ?>" required><br>
                <input type="submit" name="submit" value="Update">
            </form>
        </div>
        <?php
    } else {
        echo "Record not found.";
    }
} else {
    echo "Invalid request.";
}

$con->close();
?>
